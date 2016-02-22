<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class EventsTableSeeder extends Seeder
{
 	protected $hosts;

    public function run()
    {
    	//Create past events
    	factory('App\Event', 40)->create();
    	factory('App\Event', 10)->create([
    			'host_id' => 52
    		]);
    }
}
