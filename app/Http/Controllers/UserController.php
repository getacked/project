<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Auth, Redirect;
use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth',
          ['except' => [
            'index'
          ]]);

        $this->middleware('user.type:normal', 
            ['only' => [
                'subscribe'
            ]]);
    }

    public function subscribe(User $user)
    {
        Auth::user()->subs()->attach($user->id);
        return view('users.follows');
    }

    public function update() {
        
    }

    public function show()
    {
        return view('users.dashboard', compact('user') );
    }

    public function edit() {
        dd('blah');
    }
}