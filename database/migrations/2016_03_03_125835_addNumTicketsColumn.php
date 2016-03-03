<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNumTicketsColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attending', function (Blueprint $table) {
            $table->integer('num_tickets')->unsigned();
            $table->increments('id');
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
            $table->dropColumn('num_tickets');
        });
    }
}
