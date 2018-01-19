<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesNewslettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_newsletters', function (Blueprint $table) {
            $table->increments('id');
            //$table->engine = 'InnoDB';
            $table->integer('article_id')->unsigned();
            $table->integer('newsletter_id')->unsigned();

            //$table->foreign('article_id')->references('id')->on('articles')
            //   ->onDelete('restrict')
            //   ->onUpdate('restrict');
            // $table->foreign('newsletter_id')->references('id')->on('newsletters')
            //    ->onDelete('restrict')
            //    ->onUpdate('restrict');
            // $table->timestamps();
        });
        Schema::table('articles_newsletters', function (Blueprint $table) {
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('no action');
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
        Schema::dropIfExists('articles_newsletters');
    }
}
