<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'username' 		 => $faker->userName,
        'first_name' 	 => $faker->firstName,
        'last_name' 	 => $faker->lastName,
        'description' 	 => $faker->paragraph,
        'email' 		 => $faker->email,
        'password' 		 => bcrypt('password'),
        'tel_no' 		 => $faker->phoneNumber,
        'remember_token' => str_random(10),
        'verified'	     => true,
    ];
});

$factory->define(App\Event::class, function (Faker\Generator $faker) {
    return [
		'name' 			=> $faker->title,
		'description' 	=> $faker->paragraph,
		'ticket_cap' 	=> rand(10, 200),
		'ticket_left'	=> rand(0, 9),
		'event_type' 	=> rand(0,1) == 0 ? (rand(0,1) == 0 ? 'music' : 'comedy') : (rand(0,1) == 0 ? 'conference' : 'talk'),
		'host_id'		=> rand(1, 25),
		'event_time' 	=> $faker->dateTimeBetween($startDate = '-1 years', $endDate = '+1 years'),
		'gmaps_id'		=> 'ChIJiThzOXmSREgRYNwxl6nHAAo'
    ];
});
