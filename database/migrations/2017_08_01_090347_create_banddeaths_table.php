<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanddeathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banddeaths', function (Blueprint $table) {
            $table->increments('id');
          //  $table->engine = 'InnoDB';
            $table->integer('bande_id')->unsigned();
            $table->date('date');
            $table->integer('quantity');
            $table->text('description');
            $table->integer('user_id')->unsigned();
           /* $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('bande_id')->references('id')->on('bandes')
                ->onDelete('restrict')
                ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('banddeaths', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
            $table->foreign('bande_id')->references('id')->on('bandes')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banddeaths');
    }
}
