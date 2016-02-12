<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longtext('description');
            $table->dateTime('event_time');
            $table->enum('event_type', 
                array('music', 'comedy', 'conference', 'talk'));
            $table->integer('ticket_cap')->unsigned();
            $table->integer('ticket_left')->unsigned()->nullable();
            
            $table->integer('photo_id')->unsigned()->nullable();

            $table->integer('venue_id')->unsigned()->nullable();

            $table->integer('host_id')->unsigned();
   

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
