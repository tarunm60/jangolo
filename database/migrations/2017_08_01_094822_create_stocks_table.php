<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            //$table->engine = 'InnoDB';
            $table->integer('product_id')->unsigned();
            $table->integer('quantity');
            $table->double('price');
            $table->dateTime('date');
            $table->integer('supplier_id')->unsigned();

            /*$table->foreign('product_id')->references('id')->on('products')
              ->onDelete('restrict')
              ->onUpdate('restrict');
            $table->foreign('supplier_id')->references('id')->on('suppliers')
                ->onDelete('restrict')
                ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('stocks', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('no action');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
