<?php

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
    Route::resource('tags', 'TagsController');
    Route::controller('profile', 'TestController');

    Route::get('/subscribe/{user}', ['uses' => 'TestController@subscribe', 'as' => 'subscribe']);
    
});