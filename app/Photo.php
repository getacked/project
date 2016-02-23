<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = "photos";

    protected $fillable = ["id", "fileName", "mime"];



    public function user()
    {
      return $this->hasOne('App\User');
    }

    public function event()
    {
      return $this->hasOne('App\Event');
    }
}
