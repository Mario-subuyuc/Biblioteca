<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'dewey',
        'isbn',
        'ubication',
        'disabled_at',
        'disabled_by',
        'enabled_at',
        'enabled_by'
    ];

    protected $dates = ['deleted_at']; // importante para usar SoftDeletes

        // Relaciones con usuarios
    public function disabledBy()
    {
        return $this->belongsTo(Directive::class, 'disabled_by');
    }

    public function enabledBy()
    {
        return $this->belongsTo(Directive::class, 'enabled_by');
    }

    // Relación con préstamos
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
