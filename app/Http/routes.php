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

    Route::auth();

    Route::get('logoutTest', ['as' => 'testOut', 'uses' => 'TestController@logout']);
    Route::get('loginTest', ['as' => 'loginTest', 'uses' => 'TestController@test']);

    Route::resource('users', 'TestController');
    Route::resource('events', 'EventsController');
    // Route::resource('organisers', 'OrganisersController');
    Route::resource('tags', 'TagsController');

    Route::get('subscriptions', ['uses' => 'TestController@subscriptions', 'as' => 'subscriptions']);

    Route::get('events/{{id}}/tags', ['as' => 'events.addTag', 'uses' => 'EventsController@addTag']);

    Route::get('/subscribe/{user}', ['uses' => 'TestController@subscribe', 'as' => 'subscribe']);

    // Route::controllers([
    //   'auth' => 'Auth\AuthController',
    //   'password' => 'Auth\PasswordController',
    // ]);

});
