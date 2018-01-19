<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobilePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_payments', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->string('service',300);
            $table->integer('transaction_id')->unsigned();
            $table->integer('phone');
            $table->double('amount');
            $table->tinyInteger('status');
            $table->text('message');
            $table->string('country');
            $table->string('mccmnc',100);
            $table->string('operator',100);
            $table->string('currency',100);
            $table->integer('user');
            $table->integer('item_ref');
            $table->string('payment_ref',100);
            $table->string('fisrt_name',100);
            $table->string('last_name',100);
            $table->string('email',100);
            $table->string('sign',200);
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
        Schema::dropIfExists('mobile_payments');
    }
}
