<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [ 'name' ];
  protected $table = "tags";

  public function events(){
      return $this->belongsToMany('App\Event');
  }

  public function scopeUserPopular(){
    // some query for count of how many users are interested in tags
    //return $query->where
  }

  public function scopeEventPopular(){
    // some query for count of which tags event (of a certain type?) use most
    //return $query->where
  }

}