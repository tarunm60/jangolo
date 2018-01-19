<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->integer('expense_id');
            $table->decimal('value',10,0);
            $table->integer('recorded_by')->unsigned();
            $table->integer('provided_by')->unsigned();
            $table->integer('incometype_id')->unsigned();
            $table->date('date');
           /* $table->foreign('incometype_id')->references('id')->on('incometypes')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('incomes', function (Blueprint $table) {
            $table->foreign('incometype_id')->references('id')->on('incometypes')->onDelete('no action');
            $table->foreign('expense_id')->references('id')->on('expenses')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}
