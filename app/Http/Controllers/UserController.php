<?php

namespace App\Http\Controllers;

use DB;
use App\Event;
use App\Mailers\AppMailer;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use App\Tag;
use View;
use Carbon\Carbon;
use App\Photo;
use Storage;
use Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator, Auth, Redirect;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth',
          ['except' => [
            'show'
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

    public function show(User $user)
    {
      if( $user->isHost() ){
        return View::make('users.show', compact('user') );   
      }else{
        return Redirect::url('/');
      }
    }


    public function index(){
      $hosts = User::host();

      return View::make('users.index', compact('hosts'));
    }

    public function update(Request $request, AppMailer $mailer) {
 
        $user = Auth::user();

        // Validate request
        $this->validate($request, [
            'email'      => 'required|unique:users,email,'.$user->id,
            'tel_no'     => 'required_if:type,1|unique:users,tel_no,'.$user->id
        ]);

        $message = 'Your account has been updated!';
        
        // Email update
        if($user->email != $request->email) {
          $user->email = $request->email;
          $user->verified = false;
          $user->generateConfirmationLink();
          $mailer->sendEmailConfirmation($user, true);
          $message = $message . ' Please confirm your email.';
        }

        // Phone update
        $user->tel_no = $request->tel_no;

        // Description update
        $user->description = $request->description;

        if( $request->file('image') ) {
          //IMAGE STUFF
          //make timestamp and append username for filename
          $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
          $imageFile = Input::file('image');
          $mime = "." . substr($imageFile->getMimeType(), 6);
       
          //move file to /public/images/
          $filename = $timestamp . '-' . $user->username;

          $photoData = array('fileName' => $filename, 'mime' => $mime);

          $photo = Photo::create( $photoData );
          $imageFile->move( public_path().'/images/uploads/', $filename . $mime );

          //associate the image with the user
          $user->photo_id = $photo->id;
          $user->photo()->associate( $photo );
        }

        $user->save();
        session()->flash('message', $message);

        return redirect(route('edit-account'));
    }

    public function dashboard()
    {
        // User
        $user = Auth::user();

        // Upcoming events
        $upcomingEvents = Event::upcoming($user)->get();
        
        // Past events
        $pastEvents = $user->attending()->past();

        if($user->hasType('normal')) {
          // Tags
          $tags = $user->tags;

          // Suggested events
          $suggestedEvents = Event::suggested()->limit(4)->get();

          return view('users.dashboard.base-normal', compact('user', 'tags', 'suggestedEvents', 'upcomingEvents', 'pastEvents'));
        }
        else {
          return view('users.dashboard.base-organiser', compact('user', 'upcomingEvents', 'pastEvents'));
        }
    }

    public function edit() 
    {
        // User
        $user = Auth::user();

        return view('users.edit', compact('user'));
    }

    public function addTag(Request $request) {      
      // Validate request
      $this->validate($request, [
          'tag' => 'required|max:255|alpha',
      ]);

      $tag = Tag::firstOrCreate(array('name' => strtolower($request->tag)));
      $status = 'done';

      // Add user intrest in tag
      if(! DB::table('tag_user')->where(['user_id' => Auth::id(), 'tag_id' => $tag->id])->count() > 0) {
        DB::table('tag_user')->insert(['user_id' => Auth::id(), 'tag_id' => $tag->id]);
      }

      $response = array(
        'status' => $status,
        'tag' => strtolower($tag->name)
      );

      return Response::json($response);
    }

    public function removeTag(Request $request) {
      $tagId = Tag::where('name', $request->tag)->lists('id');
      DB::table('tag_user')->where('user_id', Auth::id())->whereIn('tag_id', $tagId)->delete();

      $response = array(
        'status' => 'removed',
        'tag' => $request->tag
      );

      return Response::json($response);
    }
}