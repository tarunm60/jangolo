<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->text('content');
            $table->integer('leed_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('contact_id')->unsigned();
            $table->string('status',100);
            $table->integer('sender');
            /*$table->foreign('user_id')->references('id')->on('users')
               ->onDelete('restrict')
               ->onUpdate('restrict');
            $table->foreign('contact_id')->references('id')->on('contacts')
                ->onDelete('restrict')
                ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('emails', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('no action');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emails');
    }
}
