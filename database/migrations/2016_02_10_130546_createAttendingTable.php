<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attending', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade');

            $table->integer('event_id')->unsigned()->index();
            $table->foreign('event_id')->references('id')->on('events')
                    ->onDelete('cascade');
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
        Schema::table('attending', function (Blueprint $table) {
            $table->dropForeign('attending_user_id_foreign');
            $table->dropForeign('attending_event_id_foreign');
        });
        Schema::dropIfExists('attending');
    }
}
