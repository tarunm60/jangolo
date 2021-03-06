<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChickenWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chicken_weights', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->dateTime('date');
            $table->double('weight');
            $table->text('comment');
            $table->integer('user_id')->unsigned();
            $table->integer('bande_id')->unsigned();
           /*$table->foreign('user_id')->references('id')->on('users')
               ->onDelete('restrict')
               ->onUpdate('restrict');
            $table->foreign('bande_id')->references('id')->on('bandes')
                ->onDelete('restrict')
                ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('chicken_weights', function (Blueprint $table) {
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
        Schema::dropIfExists('chicken_weights');
    }
}
