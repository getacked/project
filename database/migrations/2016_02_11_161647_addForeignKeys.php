<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('events', function (Blueprint $table) {
            $table->foreign('photo_id')->references('id')->on('photos');
            $table->foreign('venue_id')->references('id')->on('venues');
            $table->foreign('host_id')->references('id')->on('users')->onDelete('cascade');
        });
        
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('photo_id')->references('id')->on('photos');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign('events_host_id_foreign');
            $table->dropForeign('events_photo_id_foreign');
            $table->dropForeign('events_venue_id_foreign');
        });
        
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_location_id_foreign');
            $table->dropForeign('users_photo_id_foreign');
        });
    }
}
