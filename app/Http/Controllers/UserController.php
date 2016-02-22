<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Validator, Auth, Redirect;

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
        if($user->hasType('host')) {
            Auth::user()->subs()->attach($user->id);
        }
        return route('dashboard', Auth::user());
    }

    public function organiser() {
        
    }

    public function update() {
        
    }

    public function show()
    {
        // User
        $user = Auth::user();

        if($user->hasType('normal')) {

            // Tags

            // Suggested events
            $suggestedEvents = Event::suggested($user)->get();

            // Upcoming events
            $upcomingEvents = Event::upcoming()->get();
            
            // Past events
            $pastEvents = Event::past($user)->get();

            return view('users.dashboard', compact('user', 'pastEvents', 'suggestedEvents', 'upcomingEvents') );
        }

        else {
            dd('Organiser landing'); 
        }
    }

    public function edit() {
        dd('Edit page');
    }
}