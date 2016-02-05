<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_tag', function (Blueprint $table) {
            
            $table->integer('event_id')->unsigned()->index();
            $table->integer('tag_id')->unsigned()->index();


            $table->foreign('event_id')->references('id')->on('events')
                    ->onDelete('null');
            $table->foreign('tag_id')->references('id')->on('tags')
                    ->onDelete('cascade');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('event_tag', function (Blueprint $table) {
            $table->dropForeign('event_tag_event_id_foreign');
            $table->dropForeign('event_tag_tag_id_foreign');
        });
        Schema::drop('event_tag');
    }
}
