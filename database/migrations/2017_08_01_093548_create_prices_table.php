<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            //$table->engine = 'InnoDB';
            $table->float('price');
            $table->integer('price_id')->unsigned();
            /*  $table->foreign('user_id')->references('id')->on('users')
   ->onDelete('restrict')
   ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('prices', function (Blueprint $table) {
            $table->foreign('price_id')->references('id')->on('prices')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
