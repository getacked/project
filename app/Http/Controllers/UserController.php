<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use Carbon\Carbon;
use App\Photo;
use Storage;
use Input;
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
        Auth::user()->subs()->attach($user->id);
        return view('users.follows');
    }

    public function update(Request $request) {
 
        $user = Auth::user();

        if( $request->file('image') ){
          //make timestamp and append username for filename
          $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
          

          $imageFile = Input::file('image');

          $mime = "." . substr($imageFile->getMimeType(), 6);
       
          // dd($mime);
          //move file to /public/images/
          $filename = $timestamp . '-' . $user->username;
          // dd($filename);
          $photoData = array('fileName' => $filename, 'mime' => $mime);

          $photo = Photo::create( $photoData );
          $imageFile->move( public_path().'/images/', $filename . $mime );

          //associate the image with the user
          $user->photo_id = $photo->id;
          $user->photo()->associate( $photo );
          $user->save();
        }

        return view('users.edit');
    }

    public function show()
    {
        return view('users.dashboard');
    }

    public function edit() {
        return view('users.edit');
    }
}