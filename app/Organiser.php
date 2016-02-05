<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hash;
use Carbon\Carbon;
use Http\Controllers\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Organiser extends Authenticatable
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'email', 'location',
  ];

  protected $table = "organisers";

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

  // public function events(){
  //     return $this->hasMany('App\Event')->orderBy('event_time')->upcoming();
  // }
}
