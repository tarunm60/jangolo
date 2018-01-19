<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->increments('id');
          //  $table->engine = 'InnoDB';
            $table->date('date');
            $table->integer('invoice_id')->unsigned();
            $table->integer('kilometer_start');
            $table->integer('kilometer_shop');
            $table->text('comment');
            $table->integer('corder_id');
            $table->dateTime('start_date');
            $table->dateTime('stop_date');
            $table->double('receive_amount');
            $table->string('evaluation',100);
            $table->string('rejection_reason',100);
            $table->integer('user_id')->unsigned();
            /*$table->foreign('user_id')->references('id')->on('users')
               ->onDelete('restrict')
               ->onUpdate('restrict');
            $table->foreign('invoice_id')->references('id')->on('invoices')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('corder_id')->references('id')->on('orders')
                ->onDelete('restrict')
                ->onUpdate('restrict');*/

            $table->timestamps();
        });
        Schema::table('deliveries', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('no action');
            $table->foreign('corder_id')->references('id')->on('orders')->onDelete('no action');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
}
