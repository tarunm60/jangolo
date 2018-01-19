<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewslettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsletters', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->string('title',100);
            $table->dateTime('date');
            $table->integer('user_id')->unsigned();
            $table->text('description');
            $table->string('status',100);
            $table->integer('conversion');
          /*  $table->foreign('user_id')->references('id')->on('users')
                   ->onDelete('restrict')
                   ->onUpdate('restrict');*/

            $table->timestamps();
        });
        Schema::table('newsletters', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newsletters');
    }
}
