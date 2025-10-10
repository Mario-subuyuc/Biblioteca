<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reader;
use App\Models\Book;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reader_id',
        'book_id',
        'date',
        'state',
    ];

    /**
     * Relación: una reserva pertenece a un lector
     */
    public function reader()
    {
        return $this->belongsTo(Reader::class);
    }

    /**
     * Relación: una reserva pertenece a un libro
     */
    public function book()
    {
        return $this->belongsTo(Book::class)->withTrashed();
    }
}
