<?php

namespace App;

use Hash;
use Carbon\Carbon;
use Http\Controllers\Auth;
use App\Mailers\UserMailer;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = "users";

    protected $fillable = [
        'first_name', 'last_name', 'username', 'description', 'tel_no', 'location_id', 'photo_id', 'email', 'location', 'type', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeUpcoming()
    {
        return $query->where('user_type', '=', 'host');
    }


    public function events()
    {
        return $this->hasMany('App\Event', 'host_id');
    }

    public function attending()
    {  
        return $this->belongsToMany('App\Event', 'attending', 'user_id', 'event_id');
    }

    public function subs()
    {
        return $this->belongsToMany('App\User', 'subscriptions', 'subscriber_id', 'subscribee_id');
    }

    public function subscribers()
    {
        return $this->belongsToMany('App\User', 'subscriptions', 'subscribee_id', 'subscriber_id');
    }

    public function hasType($type) {
        return $this->type == $type;
    }

    public function generateConfirmationLink() {
        $this->token = str_random(30);

        $this->save();
    }

    public function confirmEmail() {
        $this->verified = true;
        $this->token = null;
        
        $this->save();
    }
}