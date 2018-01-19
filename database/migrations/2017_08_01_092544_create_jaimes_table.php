<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJaimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jaimes', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->integer('article_id')->unsigned();
            $table->string('ip_user',100);
            /*$table->foreign('article_id')->references('id')->on('articles')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('jaimes', function (Blueprint $table) {
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
        Schema::dropIfExists('jaimes');
    }
}
