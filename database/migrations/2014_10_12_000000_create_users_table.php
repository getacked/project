<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('username')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->longText('description')->nullable();
            $table->string('email')->unique();
            $table->string('password', 64);
            $table->string('tel_no')->nullable();
            $table->integer('location_id')->unsigned();
            $table->integer('photo_id')->unsigned();
            $table->enum('type', array('normal', 'host'));
            $table->rememberToken();
            $table->timestamps();

            // $table->foreign('location_id')->references('id')->on('locations');
            // $table->foreign('photo_id')->references('id')->on('photos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
