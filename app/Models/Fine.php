<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Fine extends Model
{
    use HasFactory;

    protected $fillable = [
        'reader_id',
        'loan_id',
        'amount',
        'status',
        'description'
    ];




    // Relación con Reader
    public function reader()
    {
        return $this->belongsTo(Reader::class);
    }

    // Relación con Loan
    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
