<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->dateTime('date');
            $table->text('comment');
            $table->integer('caller_id');
            $table->integer('dealler_id');
            $table->string('feedback',100);
            $table->dateTime('callback');
            $table->integer('leed_id');
            $table->string('reason',200);
            $table->integer('user_id')->unsigned();
           /* $table->foreign('user_id')->references('id')->on('users')
               ->onDelete('restrict')
               ->onUpdate('restrict');*/

            $table->timestamps();
        });
        Schema::table('calls', function (Blueprint $table) {
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
        Schema::dropIfExists('calls');
    }
}
