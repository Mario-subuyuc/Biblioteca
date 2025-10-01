<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;


class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reader_id',
        'directive_id',
        'amount',
        'method',
        'donation_date',
        'note',
    ];

    public function reader()
    {
        return $this->belongsTo(User::class, 'reader_id');
    }

    public function directive()
    {
        return $this->belongsTo(User::class, 'directive_id');
    }
}
