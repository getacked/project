<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{

  protected $table = "events";
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'event_name', 'type', 'tickets', 'event_time', 'user_id'
  ];

  /**
   *  The attributes to be converted into Carbon instances.
   *
   *  @var array
   */
  protected $dates = [ 'created_at', 'updated_at', 'event_time' ];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = [ 'password', 'remember_token' ];


  public function tags(){
    return $this->belongsToMany('App\Tag');
  }

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function scopePopular($query)
  {
    return $query->where('tickets', '>', 100);
  }

  public function scopeUpcoming($query)
  {
    return $query->where('event_time', '>', Carbon::now() );
  }


}
