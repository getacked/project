<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mailers\UserMailer;
use App\User;
use Hash;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Validator; 

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $mailer;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(UserMailer $mailer)
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->mailer = $mailer;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255',
            'username'   => 'required|unique:users',
            'email'      => 'required|email|unique:users|max:255',
            'password'   => 'required|confirmed|min:6',
            'tel_no'     => 'required_if:type,1',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
                'first_name' => $data['first_name'],
                'last_name'  => $data['last_name'],
                'username'   => $data['username'],
                'email'      => $data['email'],
                'password'   => bcrypt($data['password']),
                'tel_no'     => $data['tel_no'],
                'verified'   => false,
        ]);
    }

    public function confirmEmail($token) {
        User::whereToken($token)->firstOrFail()->confirmEmail();
        session()->flash('message', 'Thank you for confirming your email.');
        return redirect('login');
    }

    public function sendConfirmationLink(User $user) {
        $user->generateConfirmationLink();
        $this->mailer->sendEmailConfirmation($user);
        session()->flash('message', 'An email confirmation link has been sent.  Please confirm your email');
        return redirect('login');    }
}