<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Auth, Redirect;
use App\Http\Requests;
use App\User;
use App\Organiser;   //dont need
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

class TestController extends Controller
{

  public function __construct()
  {
      $this->middleware('guest', ['only' => 'create']);
  }

  public function create(){
    return view('forms.signup');  
  }

  public function store(UserRequest $request)
  {
    User::create( $request->toArray() );

    Auth::attempt(['email' => $request->email, 'password' => $request->password ]);

    return redirect('/');

  }

  public function index()
  {
     $users = User::all();

     return view('users.all', compact('users') );
  }

  public function show(User $user, $id)
  {
    $user = User::find($id);
    // dd($user);
    return view('users.show', compact('user'));
  }

  public function logout()
  {
    Auth::logout();

    return redirect('/');
  }

  public function test(){

    Auth::login(User::find(2));

    return view('welcome');

  }

  public function subscribe(User $user)
  {
    Auth::user()->subs()->attach($user->id);
    
    // show all subscriptions
    return view('users.follows');
  }

  public function subscriptions()
  {

    return view('users.follows');
  }

  public function follows()
  {
    return view('users.follows', Auth::user() );
  }

}
