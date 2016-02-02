<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Auth, Redirect;
use App\Http\Requests;
use App\User;
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

    return Redirect::route('/');

  }

  public function index()
  {
     $users = User::all();

     return view('users.all', compact('users') );
  }

  public function show(User $user, $id)
  {
    $user = User::find($id);
    return view('users.show', compact('user'));
  }

  public function logout()
  {
    Auth::logout();

    return redirect('../');
  }

  public function test(){
    Auth::login(User::find(1));
    return view('welcome');
  }

}
