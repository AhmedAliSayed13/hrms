<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = array('name','description');


    public function users()
    {
        // return $this->hasMany('App\Models\UserRole', 'role_id', 'id');
        return $this->belongsToMany('App\User', 'user_roles', 'role_id', 'user_id');
    }
}
