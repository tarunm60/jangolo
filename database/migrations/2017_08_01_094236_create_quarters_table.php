<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quarters', function (Blueprint $table) {
            $table->increments('id');
          //  $table->engine = 'InnoDB';
            $table->string('name',50);
            $table->integer('city_id')->unsigned();
           /* $table->foreign('city_id')
            ->references('id')->on('cities')
               ->onDelete('restrict')
               ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('quarters', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('no action');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quarters');
    }
}
