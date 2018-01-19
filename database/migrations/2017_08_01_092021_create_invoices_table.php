<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->date('date');
            $table->integer('sale_id')->unsigned();
            $table->integer('client_id')->unsigned();
            /*$table->foreign('sale_id')->references('id')->on('sales')
                ->onDelete('restrict')
                ->onUpdate('restrict');*/
            $table->timestamps();
        });
       Schema::table('invoices', function (Blueprint $table) {
            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('no action');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
