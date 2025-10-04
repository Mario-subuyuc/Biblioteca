<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'description',
        'location',
        'acquisition_type',
        'responsible',
        'discard_or_sale',
        'discard_or_sale_date',
    ];

    protected $dates = ['discard_or_sale_date', 'deleted_at'];//sofdele
}
