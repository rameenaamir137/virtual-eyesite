<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HospitalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// Eyesight pages
Route::get('/eyetests', function () {
    return view('eyetests/index');
})->name('eyetest');

Route::get('/eyetests/eyesighttest0', function () {
    return view('eyetests/eyesighttest0');
})->name('eyesighttest0');

Route::get('/eyetests/eyesighttest1', function () {
    return view('eyetests/eyesighttest1');
})->name('eyesighttest1');

Route::get('/eyetests/reactionspeedtest', function () {
    return view('eyetests/reactionspeedtest');
})->name('reactionspeedtest');

Route::get('/eyetests/colorblindnesstest', function () {
    return view('eyetests/colorblindnesstest');
})->name('colorblindnesstest');

Route::get('/eyetests/farnsworthtest', function () {
    return view('eyetests/farnsworthtest');
})->name('farnsworthtest');


// About us page
Route::get('/About Us', function () {
    return view('AboutUs');
})->name('About Us');


// Hospitals page
Route::get('/hospitals', [HospitalController::class, 'index'])->name('hospitals');


// Articles pages
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');

Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');


// Chat page
Route::get('/chat', function () {
    return view('chat');
})->name('chat');


// Dashboard page
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Reports page
Route::get('/reports', [ReportController::class, 'index'])->middleware('auth')->name('reports');

Route::post('/reports', [ReportController::class, 'store'])->middleware('auth')->name('reports.create');

Route::delete('/reports/{report}', [ReportController::class, 'destroy'])->middleware('auth')->name('reports.destory');

// Profile editing pages
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
