/*<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmsgensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smsgens', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->text('message');
            $table->dateTime('date');
            $table->integer('user_id');
            $table->string('phone',20);

            /*/$table->foreign('user_id')->references('id')->on('users')
              ->onDelete('restrict')
              ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('smsgens', function (Blueprint $table) {
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
        Schema::dropIfExists('smsgens');
    }
}
