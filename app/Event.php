<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['event'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
