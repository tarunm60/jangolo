<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderitems', function (Blueprint $table) {
            $table->increments('id');
            $table->engine = 'InnoDB';
            $table->integer('order_id');
            $table->integer('article_id')->nullable();
            $table->integer('quantity');
            $table->integer('value');
            $table->integer('product_id');
            $table->integer('image_id')->nullable();
            $table->integer('supplyer_id')->nullable();

            /*  $table->foreign('user_id')->references('id')->on('users')
              ->onDelete('restrict')
              ->onUpdate('restrict');*/
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderitems');
    }
}
