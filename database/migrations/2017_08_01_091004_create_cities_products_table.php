<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities_products', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->integer('city_id')->unsigned();
            $table->integer('product_id')->unsigned();
           /*$table->foreign('city_id')->references('id')->on('cities')
              ->onDelete('restrict')
              ->onUpdate('restrict');
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('restrict')
                ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('cities_products', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('no action');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities_products');
    }
}
