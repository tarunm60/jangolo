<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTraductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traductions', function (Blueprint $table) {
            $table->increments('id');
            //$table->engine = 'InnoDB';
            $table->string('title_en',100);
            $table->string('title_fr',100);
            $table->text('desc_en');
            $table->text('desc_fr');
            $table->string('tag',100);
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
        Schema::dropIfExists('traductions');
    }
}
