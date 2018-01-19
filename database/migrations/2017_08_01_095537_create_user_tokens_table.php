<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tokens', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->integer('user_id');
            $table->string('user_agent',40);
            $table->string('token',100);
            $table->string('type',40);
            $table->integer('created');
            $table->integer('expires');
            $table->timestamps();
           /* $table->foreign('user_id')->references('id')->on('users')
              ->onDelete('restrict');*/
        });
        Schema::table('user_tokens', function (Blueprint $table) {
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
        Schema::dropIfExists('user_tokens');
    }
}
