<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
           // $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->date('date');
            $table->dateTime('appointment');
            $table->integer('user_id')->unsigned()->nullable();
            $table->text('comment');
            $table->integer('ressource_id')->unsigned();
            $table->tinyInteger('status');
            $table->timestamps();
        });
        Schema::table('appointments', function (Blueprint $table) {
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
        Schema::dropIfExists('appointments');
    }
}
