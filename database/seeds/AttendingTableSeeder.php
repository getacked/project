<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class AttendingTableSeeder extends Seeder
{
    public function run()
    {
    	for($i = 1; $i < 15; $i++) {
	    	DB::table('attending')->insert([
	            'user_id' => 51,
	            'event_id' => $i
	    	]);
	    }

    	for($i = 1; $i < 35; $i++) {
	    	DB::table('attending')->insert([
	            'user_id' => rand(25,50),
	            'event_id' => rand(1,50)
	    	]);
	    }
    }
}
