<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->string('name',100);
            $table->text('description');
            $table->integer('company_id')->unsigned();
           /* $table->foreign('company_id')->references('id')->on('companies')
               ->onDelete('restrict')
               ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('brands', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
