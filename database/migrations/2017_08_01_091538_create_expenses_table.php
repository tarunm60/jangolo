<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            //$table->engine = 'InnoDB';
            $table->text('description');
            $table->date('exp_date');
            $table->integer('recorded_by');
            $table->integer('beneficiary');
            $table->integer('approved_by');
            $table->integer('dept_by');
            $table->string('title',200);
            $table->integer('owner_id');
            $table->integer('project_id')->unsigned();
            $table->dateTime('date');
            $table->tinyInteger('is_farm');
            $table->integer('parent_id');
            /*$table->foreign('project_id')->references('id')->on('projects')
              ->onDelete('restrict')
              ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('expenses', function (Blueprint $table) {
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
        Schema::dropIfExists('expenses');
    }
}
