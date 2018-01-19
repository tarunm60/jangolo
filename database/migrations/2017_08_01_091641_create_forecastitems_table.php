<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForecastitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forecastitems', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->integer('forecast_id')->unsigned();
            $table->integer('week');
            $table->integer('year');
            $table->integer('value');
            /*$table->foreign('forecast_id')->references('id')->on('forecasts')
               ->onDelete('restrict')
               ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('forecastitems', function (Blueprint $table) {
            $table->foreign('forecast_id')->references('id')->on('forecasts')->onDelete('no action');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forecastitems');
    }
}
