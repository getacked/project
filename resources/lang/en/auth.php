<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'These credentials do not match our records.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'unverified' => 'Your email has not been verified.  Please verify your email to access your account. <br> Not received link? <a href="' 
                . url(route('resend-link'))
                . '">Click here to resend.</a>'
];
