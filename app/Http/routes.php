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
    //Static pages
    Route::get('/', 'PagesController@homepage')->name('landing');
    Route::get('contact', 'PagesController@contact')->name('contact');
    Route::post('contact', 'PagesController@sendContactMessage');
    Route::get('faq', 'PagesController@faq')->name('faq');
    Route::get('about', 'PagesController@about')->name('about');

    //Authentication
    Route::auth();
    Route::get('register/confirm/{token}', 'Auth\AuthController@confirmEmail');
    
    //Users
    Route::resource('user', 'UserController', [
        'only' => [
            'update', 'show', 'edit'
        ]]);
    Route::get('user/dashboard', 'UserController@dashboard')->name('dashboard');
    Route::get('/subscribe/{user}', ['uses' => 'UserController@subscribe', 'as' => 'subscribe']);
    
    //Events
    Route::resource('events', 'EventsController', ['names' => [
            'index' => 'browse'
        ]]);
    Route::get('events/{event}/attend', 'EventsController@attend')->name('events.attend');
    
    //Tags
    Route::resource('tags', 'TagsController', [
        'only' => [
            'index', 'store'
        ]]);    
});