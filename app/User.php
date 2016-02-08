<?php

namespace App;

use Hash;
use Carbon\Carbon;
use Http\Controllers\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $table = "users";

    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'location', 'type', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function events(){
        return $this->hasMany('App\Event')->orderBy('event_time')->popular();
    }
    
    public function subs(){
        return $this->belongsToMany('App\User', 'subscriptions', 'subscriber_id', 'subscribee_id');
    }

    public function subscribers(){
        return $this->belongsToMany('App\User', 'subscriptions', 'subscribee_id', 'subscriber_id');
    }

}