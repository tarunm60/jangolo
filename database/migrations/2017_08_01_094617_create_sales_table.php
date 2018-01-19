<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->integer('seller_id')->unsigned();
            $table->integer('buyer_id')->unsigned();
            $table->date('date');
            $table->integer('expense_id');
            $table->text('note');
            $table->integer('tvcustomer_id');
            $table->integer('versement_id');
            /*$table->foreign('expense_id')->references('id')->on('expenses')
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
        Schema::dropIfExists('sales');
    }
}
