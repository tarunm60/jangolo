<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bandes', function (Blueprint $table) {
            $table->increments('id');
            //$table->engine = 'InnoDB';
            $table->date('date');
            $table->date('end_date');
            $table->integer('initial_total_subjects');
            $table->integer('dead_subjects');
            $table->string('status',100);
            $table->string('title',200);
            $table->integer('expense_id')->unsigned();
            $table->integer('product_id')->unsigned();
           /* $table->foreign('expense_id')->references('id')->on('expenses')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('restrict')
                ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('bandes', function (Blueprint $table) {
            $table->foreign('expense_id')->references('id')->on('expenses')->onDelete('no action');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bandes');
    }
}
