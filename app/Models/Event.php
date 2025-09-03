<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Event extends Model
{
    protected $fillable = [
        'name', 'date', 'message'
    ];
    public function attendees()
    {
        return $this->belongsToMany(
            User::class,       // موديل اليوزر
            'event_attendees',    // اسم جدول الربط
            'event_id',           // العمود اللي بيربط بالـ meeting
            'attendee_id'           // العمود اللي بيربط بالـ user
        );
    }
}
