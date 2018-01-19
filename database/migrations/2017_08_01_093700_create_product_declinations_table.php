/*<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDeclinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_declinations', function (Blueprint $table) {
            $table->increments('id');
            //$table->engine = 'InnoDB';
            $table->string('type',150);
            $table->string('status',150);
            $table->integer('product_id')->unsigned();
            $table->integer('price_impact');
            $table->tinyInteger('is_default');
            /*$table->foreign('product_id')->references('id')->on('products')
                   ->onDelete('restrict')
                   ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('product_declinations', function (Blueprint $table) {
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
        Schema::dropIfExists('product_declinations');
    }
}
