<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlecommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articlecomments', function (Blueprint $table) {
           // $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('article_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->dateTime('date');
            $table->text('comment');
            $table->tinyInteger('read');
            $table->tinyInteger('reply');
            $table->integer('tempemail_id')->unsigned();

        });
        Schema::table('articlecomments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('no action');
            $table->foreign('tempemail_id')->references('id')->on('tempemails')->onDelete('no action');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articlecomments');
    }
}
