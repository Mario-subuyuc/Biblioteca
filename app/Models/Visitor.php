<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
     protected $fillable = [
        'name',
        'location',
        'birth_year',
        'gender',
        'ethnicity',
        'occupation',
        'visit_date',
        'visit_time',
        'user_id', // Para relacionar con usuario, opcional
    ];

    // Relación con usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
