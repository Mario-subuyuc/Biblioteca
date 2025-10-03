<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'birth_date',
        'gender',
        'dpi',
        'occupation',
        'ethnicity',
    ];

    // Relación con Tabla/User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
