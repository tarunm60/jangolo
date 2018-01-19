<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->engine = 'InnoDB';
            $table->date('date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->string('reference')->nullable();
            $table->integer('expense_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->text('location')->nullable();
            $table->text('message')->nullable();
            $table->text('session_id')->nullable();
            $table->string('period',200)->nullable();
            $table->string('area',100)->nullable();
            $table->string('delivery_period',100)->nullable();
            $table->integer('contact_id')->nullable();
            $table->float('transport_fee')->nullable();
            $table->string('status',100)->nullable();
            $table->integer('transport_cost')->nullable();
            $table->integer('checked_by')->nullable();

            /*  $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('orders');
    }
}
