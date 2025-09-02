<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['name', 'team_id', 'manager_id', 'members'];

    protected $casts = [
    'members' => 'array',
];
    public function employee()
    {
        return $this->hasOne(User::class, 'id', 'member_id');
    }

    public function manager()
    {
        return $this->hasOne(User::class, 'id', 'manager_id');
    }

    
}
