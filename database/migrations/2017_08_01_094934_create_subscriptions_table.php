<?php

use Illuminate\Support\Facades\Schema;
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
            $table->increments('id');
          //  $table->engine = 'InnoDB';
            $table->integer('subscriber_id')->unsigned();
            $table->integer('newsletter_id');
            $table->string('status',100);
            $table->dateTime('go_date');
            $table->integer('message_id')->unsigned();

           /* $table->foreign('message_id')->references('id')->on('messages')
              ->onDelete('restrict')
              ->onUpdate('restrict');
            $table->foreign('newsletter_id')->references('id')->on('newsletters')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('subscriber_id')->references('id')->on('subscribers')
                ->onDelete('restrict')
                ->onUpdate('restrict');*/
            
            $table->timestamps();
        });
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
