<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->string('subject',255);
            $table->tinyInteger('template_id')->unsigned();
            $table->text('column1');
            $table->text('column2');
            $table->text('column3');
            $table->text('column4');
            $table->text('column5');
            $table->string('status',100);
            $table->integer('newsletter_id')->unsigned();
            $table->integer('user_id')->unsigned();
           /* $table->foreign('user_id')->references('id')->on('users')
                   ->onDelete('restrict')
                   ->onUpdate('restrict');
            $table->foreign('newsletter_id')->references('id')->on('newsletters')
                ->onDelete('restrict')
                ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('menuses', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
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
        Schema::dropIfExists('messages');
    }
}
