<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {   
        
        $hrEmailArray = User::whereHas('roles', function($q) {
    $q->whereIn('roles.id', [1, 2]); // 👈 specify roles.id
})->pluck('email')->toArray();
        return $hrEmailArray;
    }
}
