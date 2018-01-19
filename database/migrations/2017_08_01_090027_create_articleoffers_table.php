<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleoffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articleoffers', function (Blueprint $table) {
           // $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('value');
            $table->dateTime('date');
            $table->integer('buyer_id');
            $table->integer('seller_id');
            $table->string('status',50);
            $table->integer('article_id');
            //  $table->foreign('article_id')->references('id')->on('articles')
            // ->onDelete('restrict')
            //->onUpdate('restrict');
            // $table->timestamps();
        });
        Schema::table('articleoffers', function (Blueprint $table) {
            
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('no action');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articleoffers');
    }
}
