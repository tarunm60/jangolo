<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            //$table->engine = 'InnoDB';
            $table->string('image',200);
            $table->integer('article_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->integer('banner_id')->unsigned();
            $table->integer('user_id')->unsigned();
           /* $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('article_id')->references('id')->on('articles')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('post_id')->references('id')->on('posts')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('banner_id')->references('id')->on('banners')
                ->onDelete('restrict')
                ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('images', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('no action');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('no action');
            $table->foreign('banner_id')->references('id')->on('banners')->onDelete('no action');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
