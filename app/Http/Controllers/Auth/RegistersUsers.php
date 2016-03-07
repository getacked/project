<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Mailers\UserMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Input;
use Carbon\Carbon;
use App\Photo;
use Illuminate\Foundation\Auth\RedirectsUsers;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return $this->showRegistrationForm();
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        if (property_exists($this, 'registerView')) {
            return view($this->registerView);
        }

        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        return $this->register($request);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // Get validator.
        $validator = $this->validator($request->all());

        // Validate.
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $attributes = $request->only(array('username', 'first_name', 'last_name', 'description', 'email', 'tel_no', 'type', 'password'));
        
        // Create user.
        $user = $this->create($attributes);


        if( $request->file('image') ) {
          //make timestamp and append username for filename
          $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
          $imageFile = Input::file('image');
          $mime = "." . substr($imageFile->getMimeType(), 6);
        
          //move file to /public/images/
          $filename = $timestamp . '-' . $user->username;

          $photoData = array('fileName' => $filename, 'mime' => $mime);

          $photo = Photo::create( $photoData );
          $imageFile->move( public_path().'/images/', $filename . $mime );

          //associate the image with the user
          $user->photo_id = $photo->id;
          $user->photo()->associate( $photo );
        }

        $user->save();

        // Send confirmation link.
        return $this->sendConfirmationLink($user);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return string|null
     */
    protected function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }
}