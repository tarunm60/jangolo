<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->string('title',200);
            $table->text('description');
            $table->integer('emp_id_to');
            $table->integer('emp_id_by');
            $table->dateTime('date');
            $table->dateTime('deadline');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->integer('dept_id');
            $table->integer('project_id')->unsigned();
            $table->tinyInteger('priority');
            $table->integer('skill_id');
            $table->tinyInteger('weight');
            $table->tinyInteger('status');
            $table->integer('comment_id');
            $table->integer('ticket_id')->unsigned();

           /* $table->foreign('ticket_id')->references('id')->on('tickets')
              ->onDelete('restrict')
              ->onUpdate('restrict');
            $table->foreign('project_id')->references('id')->on('projects')
                ->onDelete('restrict')
                ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('no action');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
