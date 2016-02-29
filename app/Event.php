<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Event extends Model
{

  protected $table = "events";
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'event_type', 'tickets', 'event_time', 'host_id', 'description', 'ticket_cap', 'ticket_left', 'venue_id', 'location_id', 'photo_id', 'gmaps_id'
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

  public function photo(){
    return $this->belongsTo('App\Photo');
  }


  /* Event Scopes */ 

  public function scopePopular($query)
  {
    return $query->where('tickets', '>', 100);
  }

  public function scopeNextWeek($query, $amount)
  {
    return $query->where('event_time', '<', new Carbon('next week'))->take($amount);
  }

  public function scopeSuggested($query) {
    //Same as upcoming, just a place holder
    return $query->where('event_time', '>', Carbon::now());
  }

  public function scopeUpcoming($query, User $user = null)
  {
    if($user == null) {
      return $query->where('event_time', '>', Carbon::now())->orderBy('event_time');
    }
    else if($user->hasType('normal')) {
      return $query->where('event_time', '>', Carbon::now())->orderBy('event_time');
    }
    else {
      return $query->where('host_id', $user->id)->where('event_time', '>', Carbon::now())->orderBy('event_time');
    }
  }

  public function scopePast($query, User $user = null)
  {
    if($user == null) {
      return $query->where('event_time', '<', Carbon::now())->orderBy('event_time');
    }
    else if($user->hasType('normal')) {
      $eventIds = DB::table('attending')->where('user_id', $user->id)->lists('event_id');
      return $query->whereIn('id', $eventIds)->where('event_time', '<', Carbon::now());
    }
    else {
      return $query->where('host_id', $user->id)->where('event_time', '<', Carbon::now())->orderBy('event_time');
    }
  }


}
