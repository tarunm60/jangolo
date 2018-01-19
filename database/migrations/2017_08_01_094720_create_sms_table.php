<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->string('from',20);
            $table->text('message');
            $table->dateTime('date');
            $table->string('to',100);
            $table->string('status',20);
            $table->integer('user_id');
            $table->string('client',100);
            $table->string('device_id',100);
            $table->integer('leed_id');
            $table->integer('smsgensid');
            $table->timestamp('sent_date');
           /* $table->foreign('user_id')->references('id')->on('users')
              ->onDelete('restrict')
              ->onUpdate('restrict');*/
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
        Schema::dropIfExists('sms');
    }
}
