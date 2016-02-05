<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('logged', function () {
        return "wow you are logged in";
    });

    Route::get('logout', ['as' => 'logout', 'uses' => 'TestController@logout']);
    Route::get('login', ['as' => 'loginTest', 'uses' => 'TestController@test']);

    Route::put('organisers/login', ['as' => 'orgLogin', 'uses' => 'OrganisersController@handleLogin'] );
    Route::get('organisers/logout', ['as' => 'orgLogout', 'uses' => 'OrganisersController@logout'] );


    Route::resource('users', 'TestController');
    Route::resource('events', 'EventsController');
    Route::resource('organisers', 'OrganisersController');
    Route::resource('tags', 'TagsController');


    // Route::controllers([
    //   'auth' => 'Auth\AuthController',
    //   'password' => 'Auth\PasswordController',
    // ]);

});
