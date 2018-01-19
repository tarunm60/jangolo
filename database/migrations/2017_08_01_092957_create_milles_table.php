<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('milles', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->text('column5');
            $table->date('date');
            $table->integer('kilometer');
            $table->integer('vehecule_id')->unsigned();
            $table->integer('driver_id')->unsigned();
            /*  $table->foreign('user_id')->references('id')->on('users')
   ->onDelete('restrict')
   ->onUpdate('restrict');*/
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('milles');
    }
}
