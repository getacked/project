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
      'event_name', 'event_type', 'tickets', 'event_time', 'host_id', 'description', 'ticket_cap', 'ticket_left', 'venue_id', 'location_id', 'photo_id'
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


  /* Event Relations */
 
  public function host(){
    return $this->belongsTo('App\User', 'host_id', 'id');
  }

  public function attendees()
  {
    return $this->belongsToMany('App\User', 'attending', 'event_id', 'user_id');
  }

  public function tags(){
    return $this->belongsToMany('App\Tag');
  }



  /* Event Scopes */ 

  public function scopePopular($query)
  {
    return $query->where('tickets', '>', 100);
  }

  public function scopeUpcoming($query)
  {
    return $query->where('event_time', '>', Carbon::now());
  }

  public function scopeNextWeek($query, $amount)
  {
    return $query->where('event_time', '<', new Carbon('next week'))->take($amount);
  }


}
