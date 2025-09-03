<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    
    protected $table = 'meetings';
    protected $fillable = ['name', 'date', 'message'];
    public function attendees()
    {
        return $this->belongsToMany(
            User::class,       // موديل اليوزر
            'meeting_attendees',    // اسم جدول الربط
            'meeting_id',           // العمود اللي بيربط بالـ meeting
            'attendee_id'           // العمود اللي بيربط بالـ user
        );
    }
}
