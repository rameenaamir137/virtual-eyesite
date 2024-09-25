<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    public function scopeFilter($query, $filter) {
        if ($filter['city'] ?? false) {
            $query->where('city', '=', $filter['city']);
        }

        if ($filter['search'] ?? false) {
            $query->where('name', 'like', '%'.$filter['search'].'%')
            ->orWhere('city', 'like', '%'.$filter['search'].'%')
            ->orWhere('address', 'like', '%'.$filter['search'].'%')
            ->orWhere('contact_no', 'like', '%'.$filter['search'].'%')
            ->orWhere('email', 'like', '%'.$filter['search'].'%');
        }
    }

    public function scopeGetCities($query) {
        return $query->select('city')->distinct()->orderBy('city');
    }
}
