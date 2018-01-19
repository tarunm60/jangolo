<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->string('name',100);
            $table->string('logo',100);
            $table->integer('intranet_id')->unsigned();
            $table->string('website',100);
            $table->string('telephone',20);
            $table->string('email',100);
            $table->integer('sector_id')->unsigned();
            $table->tinyInteger('is_supplier');
            /*  $table->foreign('user_id')->references('id')->on('users')
             ->onDelete('restrict')
             ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('companies', function (Blueprint $table) {
            $table->foreign('is_supplier')->references('id')->on('suppliers')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
