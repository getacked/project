<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->integer('subscriber_id')->unsigned()->index();
            $table->foreign('subscriber_id')->references('id')->on('users')
                    ->onDelete('cascade');

            $table->integer('subscribee_id')->unsigned()->index();
            $table->foreign('subscribee_id')->references('id')->on('users')
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
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropForeign('subscriptions_subscriber_id_foreign');
            $table->dropForeign('subscriptions_subscribee_id_foreign');
        });
        Schema::drop('subscriptions');
    }
}
