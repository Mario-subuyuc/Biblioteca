<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Computer extends Model
{
     use HasFactory;

    // Tabla asociada
    protected $table = 'computers';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'user_id',
        'name',
        'gender',
        'birth_date',
        'internet_access',
        'usage_purpose',
    ];

    // Conversión automática de tipos
    protected $casts = [
        'internet_access' => 'boolean',
        'birth_date' => 'date',
    ];

    /**
     * Relación opcional con usuario
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Accesor para obtener los usos como array
     * Si guardas múltiples usos separados por comas en usage_purpose
     */
    public function getUsageArrayAttribute()
    {
        return explode(',', $this->usage_purpose);
    }

    /**
     * Mutador opcional para guardar múltiples usos como string
     * Si se recibe un array desde el formulario
     */
    public function setUsagePurposeAttribute($value)
    {
        $this->attributes['usage_purpose'] = is_array($value) ? implode(',', $value) : $value;
    }
}
