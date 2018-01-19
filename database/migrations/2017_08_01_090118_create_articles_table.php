<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->string('title',100);
            $table->text('description');
            $table->double('price');
            $table->integer('city_id');
            $table->integer('pricing_id');
            $table->integer('category');
            $table->string('picture',100);
            $table->dateTime('date');
            $table->integer('hits');
            $table->integer('user_id')->unsigned();
            $table->tinyInteger('new');
            $table->string('phone',50);
            $table->string('status',50);
            $table->dateTime('sale_date');
            $table->tinyInteger('expired');
            $table->tinyInteger('featured');
            $table->tinyInteger('selected_for_newsletter');
            $table->dateTime('last_update');
            $table->tinyInteger('make_offer');
            $table->integer('company_id');
            $table->tinyInteger('is_for_sale');

            // $table->foreign('city_id')->references('id')->on('cities')
            //  ->onDelete('restrict')
            //    ->onUpdate('restrict');
            // $table->foreign('pricing_id')->references('id')->on('pricings')
               // ->onDelete('restrict')
               // ->onUpdate('restrict');
            //  $table->foreign('company_id')->references('id')->on('companies')
            //    ->onDelete('restrict')
            //    ->onUpdate('restrict');
            $table->timestamps();
        });
        Schema::table('articles', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('no action');
            $table->foreign('pricing_id')->references('id')->on('pricings')->onDelete('no action');
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
        Schema::dropIfExists('articles');
    }
}
