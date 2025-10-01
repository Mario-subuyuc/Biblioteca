<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'start',
        'end',
        'color',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'event_user')->withTimestamps();
    }
}
