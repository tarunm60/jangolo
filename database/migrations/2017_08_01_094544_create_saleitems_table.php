<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saleitems', function (Blueprint $table) {
            $table->increments('id');
            //$table->engine = 'InnoDB';
            $table->integer('sale_id')->unsigned();
            $table->integer('article_id')->unsigned();
            $table->integer('value');
            $table->integer('quantity');
           /* $table->foreign('article_id')->references('id')->on('articles')
              ->onDelete('restrict')
              ->onUpdate('restrict');
            $table->foreign('sale_id')->references('id')->on('sales')
                ->onDelete('restrict')
                ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('saleitems', function (Blueprint $table) {
            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('no action');
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
        Schema::dropIfExists('saleitems');
    }
}
