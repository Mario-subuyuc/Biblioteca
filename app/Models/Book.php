<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'pages',
        'dewey_classification',
        'edition',
        'isbn',
        'published_year',
        'total_copies',
        'available_copies',
    ];
}
