<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->integer('user_id')->unsigned();
            $table->dateTime('request_date');
            $table->integer('amount');
            $table->text('note');
            $table->dateTime('accepted_date');
            $table->dateTime('rejected_date');
            $table->dateTime('received_date');
            $table->text('rejected_reason');
            $table->text('accepted_file');
            /*$table->foreign('user_id')->references('id')->on('users')
              ->onDelete('restrict')
              ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('requests', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
