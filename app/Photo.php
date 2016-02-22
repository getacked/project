<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = "photos";

    protected $fillable = ["id", "filename"];



    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function event()
    {
      return $this->belongsTo('App\Event');
    }
}
