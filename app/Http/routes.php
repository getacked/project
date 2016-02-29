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
    
    // Email Confirmation
    Route::get('register/confirm/{token}', 'Auth\AuthController@confirmEmail');
    Route::get('resend', 'Auth\AuthController@getResendForm')->name('resend-link');
    Route::post('resend', 'Auth\AuthController@resendLink')->name('resend-link');
    
    //Users
    Route::resource('user', 'UserController', [
        'only' => [
            'index', 'show'
        ]]);
    
    Route::get('dashboard', 'UserController@dashboard')->name('dashboard');
    
    // Ajax routes
    Route::post('dashboard/tag/add', 'UserController@addTag')->name('addTag');
    Route::post('dashboard/tag/remove', 'UserController@removeTag');

    // Cant use user.edit or user.update as it takes in a user id as part of the URI
    Route::get('dashboard/edit', 'UserController@edit')->name('edit-account');
    Route::match(array('PUT', 'PATCH'), "dashboard/edit", array(
          'uses' => 'UserController@update',
          'as' => 'user.update'
    ));

    Route::get('/subscribe/{user}', 'UserController@subscribe')->name('subscribe');
    
    //Events
    Route::resource('events', 'EventsController', ['names' => [
            'index' => 'browse'
        ]]);
    Route::post('events/{event}/attend', 'EventsController@attend')->name('events.attend');
    
    //Tags
    Route::resource('tags', 'TagsController', [
        'only' => [
            'index', 'store', 'show'
        ]]);    
});