<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index() {
        return view('reports/index', [
            'reports' => auth()->user()->reports()->latest()->get()
        ]);
    }

    public function store(Request $request) {
        $reportData = $request->validate([
            'test_type' => 'required',
            'result' => 'required',
            'score' => 'required|min:0|max:10'
        ]);
        $reportData['user_id'] = auth()->id();
        Report::create($reportData);

        return redirect('/reports');
    }

    public function destroy(Report $report) {
        if($report->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $report->delete();

        return redirect('/reports');
    }
}
