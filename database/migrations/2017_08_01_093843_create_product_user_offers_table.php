<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductUserOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_user_offers', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->integer('user_id');
            $table->integer('product_id');
            $table->integer('price');
            $table->string('varchar',100);
          /*  $table->foreign('user_id')->references('id')->on('users')
                   ->onDelete('restrict')
                   ->onUpdate('restrict');
            $table->foreign('product_id')->references('id')->on('products')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('product_user_offers', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('no action');
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
        Schema::dropIfExists('product_user_offers');
    }
}
