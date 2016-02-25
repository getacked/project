<?php


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	// protected $toTruncate = ['users', 'events'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->call(EventsTableSeeder::class);

        Model::reguard();

    }
}
