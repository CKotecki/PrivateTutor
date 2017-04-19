<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $events = ['event'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
