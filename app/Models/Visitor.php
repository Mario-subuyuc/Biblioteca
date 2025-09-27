<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visitor extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'location',
        'birth_year',
        'gender',
        'ethnicity',
        'occupation',
        'visit_date',
        'visit_time',
        'user_id', // Para relacionar con usuario,
    ];

    // Relación con usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
