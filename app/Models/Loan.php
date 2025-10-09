<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class Loan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'reader_id',
        'book_id',
        'loan_date',
        'return_date',
        'status',
    ];

    protected $dates = ['loan_date', 'return_date', 'deleted_at'];

    protected $casts = [
        'loan_date' => 'date',
        'return_date' => 'date',
    ];
    // RELACIÓN CON READER
    public function reader()
    {
        return $this->belongsTo(Reader::class);
    }

    // RELACIÓN CON BOOK
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Scope para préstamos activos o atrasados
    public function scopeActiveOrOverdue($query)
    {
        return $query->whereIn('status', ['activo', 'atrasado']);
    }

    // Accessor: está atrasado
    public function getIsOverdueAttribute(): bool
    {
        if ($this->status !== 'activo' || !$this->return_date) {
            return false;
        }

        return Carbon::now()->gt(Carbon::parse($this->return_date));
    }
}
