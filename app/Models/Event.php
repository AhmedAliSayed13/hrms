<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'date', 'message'
    ];
    public function attendees()
    {
        return $this->hasMany('App\Models\EventAttendee', 'event_id');
    }
}
