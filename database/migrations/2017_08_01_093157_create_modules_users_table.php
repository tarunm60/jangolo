<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules_users', function (Blueprint $table) {
            $table->increments('id');
            //$table->engine = 'InnoDB';
            $table->integer('module_id')->unsigned();
            $table->integer('user_id')->unsigned();
            /*$table->foreign('user_id')->references('id')->on('users')
               ->onDelete('restrict')
               ->onUpdate('restrict');
            $table->foreign('module_id')->references('id')->on('modules')
                ->onDelete('restrict')
                ->onUpdate('restrict');*/

            $table->timestamps();
        });
        Schema::table('modules_users', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('no action');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules_users');
    }
}
