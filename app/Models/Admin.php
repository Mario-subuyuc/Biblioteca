<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'user_id',
        // Otros campos específicos del administrador
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
