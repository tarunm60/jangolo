<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queues', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->integer('newsletter_id')->unsigned();
            $table->dateTime('create_date');
            $table->dateTime('sent_date');
            $table->integer('sender');
            $table->integer('receiver')->unsigned();
            $table->integer('creator')->unsigned();
            $table->integer('leed_id')->unsigned();
            $table->integer('dealer_id');
            $table->tinyInteger('sent')->unsigned();
            $table->integer('message_id');
            
            /*$table->foreign('message_id')->references('id')->on('messages')
               ->onDelete('restrict')
               ->onUpdate('restrict');
            $table->foreign('newsletter_id')->references('id')->on('newsletters')
              ->onDelete('restrict')
              ->onUpdate('restrict');
            $table->timestamps();*/
        });
        Schema::table('queues', function (Blueprint $table) {
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('no action');
            $table->foreign('newsletter_id')->references('id')->on('newsletters')->onDelete('no action');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('queues');
    }
}
