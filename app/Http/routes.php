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
    // Pages
    Route::get('/', 'PagesController@homepage')->name('landing');
    Route::get('contact', 'PagesController@contact')->name('contact');
    Route::post('contact', 'PagesController@sendContactMessage');
    Route::get('faq', 'PagesController@faq')->name('faq');
    Route::get('about', 'PagesController@about')->name('about');
    Route::get('browse', 'EventsController@index')->name('browse');

    // Authentication
    Route::auth();
    Route::get('register/confirm/{token}', 'Auth\AuthController@confirmEmail');
    Route::get('logedout', 'Auth\AuthController@logedout');

    Route::get('events/{event}/attend', ['as' => 'events.attend', 'uses' => 'EventsController@follow']);
    Route::resource('users', 'TestController');
    Route::resource('events', 'EventsController');
    Route::resource('tags', 'TagsController');
    Route::controller('profile', 'TestController');

    Route::get('/subscribe/{user}', ['uses' => 'TestController@subscribe', 'as' => 'subscribe']);
    
});