<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class EventsTableSeeder extends Seeder
{
 	protected $hosts;

    public function run()
    {
    	// Create events.
    	factory('App\Event', 50)->create();

    	// Users Attend
    	for($i = 0; $i < 50; $i++) {
	    	DB::table('attending')->insert([
	    			'user_id' => rand(25,50),
	    			'event_id' => rand(1, 50)
	    		]);
	    }

    }
}
