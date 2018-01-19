<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->string('city');
            $table->integer('country_id')->unsigned();
            $table->tinyInteger('status');
            $table->string('region',100);
           /* $table->foreign('country_id')->references('id')->on('countries')
              ->onDelete('restrict')
              ->onUpdate('restrict');*/

            $table->timestamps();
        });
        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
