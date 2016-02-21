<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class EventsTableSeeder extends Seeder
{
 	protected $hosts;

    public function run()
    {
    	//Create past events
    	factory('App\Event', 50)->create();
    }
}
