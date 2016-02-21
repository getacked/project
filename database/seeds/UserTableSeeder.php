<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
    	
    	//Create Hosts
    	factory(App\User::class, 25)->create([
    		'type' => 'host',
    		]);

    	//Create Attendee's
    	factory(App\User::class, 25)->create([
    		'type' => 'normal',
    		]);

    }
}
