<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mailers\AppMailer;
use App\User;
use Hash;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use View;
use Validator;
use Auth;

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

    protected $redirectAfterLogout = '/logedout';

    protected $mailer;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(AppMailer $mailer)
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
            'tel_no'     => 'required_if:type,1|unique:users',
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
                'type'       => $data['type'] == 0 ? 'normal' : 'host',
                'description' => $data['description']
        ]);
    }

    public function getResendForm() {
        return view('auth/resend-link');
    }

    public function resendLink(Request $request) {
        // Validate request.
        $this->validateLogin($request);

        // Get credentials.
        $credentials = $this->getCredentials($request);

        // Check credentials.
        $credientials_verified = Auth::guard($this->getGuard())->attempt($credentials, $request->has('remember'), false);

        // Send resend link
        if($credientials_verified) {
            return $this->sendConfirmationLink(User::where('email', $request->email)->first(), true);
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function confirmEmail($token) {
        try {
            $user = User::whereToken($token)->firstOrFail();
            $user->confirmEmail();
            session()->flash('message', 'Thank you for confirming your email.');
            $this->mailer->sendEmailHasBeenConfirmed($user);
        }
        catch(ModelNotFoundException $e) {
            session()->flash('message', 'This link has already been used or is invalid.');
        }

        return redirect('login');
    }

    public function sendConfirmationLink(User $user, $changeOfEmail = false) {
        $user->generateConfirmationLink();
        $this->mailer->sendEmailConfirmation($user, $changeOfEmail);
        session()->flash('message', 'An email confirmation link has been sent.  Please confirm your email');
        return redirect('login');    
    }

    public function postLogout() {
        return View::make('auth.logedout');
    }
}