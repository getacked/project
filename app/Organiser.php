<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hash;
use Carbon\Carbon;
use Http\Controllers\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Organiser extends Authenticatable
{

  protected $table = "organisers";

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'email', 'location',
  ];


  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

}
