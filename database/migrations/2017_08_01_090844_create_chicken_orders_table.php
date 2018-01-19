<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChickenOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chicken_orders', function (Blueprint $table) {
            $table->increments('id');
            //$table->engine = 'InnoDB';
            $table->double('weight');
            $table->integer('quantity');
            $table->date('delivery_date');
            $table->string('delivery_period',100);
            $table->string('profile',100);
            $table->string('telephone',100);
            $table->string('name',100);
            $table->string('email',100);
            $table->text('location');
            $table->string('area',100);
            $table->text('message');
            $table->dateTime('date');
            $table->double('price',100);
            $table->double('cleaning_fee',100);
            $table->double('transport_fee',100);
            $table->string('status',100);
            $table->timestamps();
            /*  $table->foreign('user_id')->references('id')->on('users')
               ->onDelete('restrict')
               ->onUpdate('restrict');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chicken_orders');
    }
}
