<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_items', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->integer('exp_id');
            $table->decimal('unit_value');
            $table->integer('amount');
            $table->text('note');
            $table->integer('expensetype_id')->unsigned();
            $table->integer('currency_id');
            $table->double('depreciation');
            $table->tinyInteger('asset');
            $table->dateTime('date');
            $table->integer('expense_id');
            $table->double('quantity');
            $table->double('value');
            $table->integer('user_id')->unsigned();
            /*$table->foreign('user_id')->references('id')->on('users')
               ->onDelete('restrict')
               ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('expense_items', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
            $table->foreign('expensetype_id')->references('id')->on('expense_types')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expense_items');
    }
}
