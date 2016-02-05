<?php

namespace App;

use Hash;
use Carbon\Carbon;
use Http\Controllers\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'location',
    ];

    protected $table = "users";

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function events(){
        // return $this->hasMany('App\Event')->orderBy('event_time')->where('event_time', '>', Carbon::now() );
        return $this->hasMany('App\Event')->orderBy('event_time')->popular();
    }

}