<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('menuses', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->string('title',50);
            $table->text('description');
            $table->integer('parent_id')->unsigned();
            $table->integer('module_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('newsletter_id')->unsigned();
            $table->integer('status');
            $table->string('url',200);
          /*  $table->foreign('module_id')->references('id')->on('modules')
                ->onDelete('restrict')
                ->onUpdate('restrict');*/
            $table->timestamps();
        });
      Schema::table('menuses', function (Blueprint $table) {
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('no action');
          $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
          $table->foreign('newsletter_id')->references('id')->on('newsletters')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void*/
     
    public function down()
    {
        Schema::dropIfExists('menuses');
    }
}
