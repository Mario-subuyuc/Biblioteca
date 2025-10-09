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
        'dpi',
        'occupation',
        'ethnicity'
    ];

    // Relación con Tabla/User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con préstamos
    public function loans()
    {
        return $this->hasMany(Loan::class, 'reader_id');
    }
}
