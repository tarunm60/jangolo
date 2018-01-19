<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
           // $table->engine = 'InnoDB';
            $table->string('title',50);
            $table->text('description');
            $table->dateTime('date');
            $table->integer('parent_id');
            $table->string('picture',100)->nullable();
            $table->integer('marge')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('image_id')->nullable();

            $table->integer('sale_price');
            $table->integer('category_id');
            $table->tinyInteger('is_promo')->nullable();
            $table->dateTime('publish_date');

            $table->string('status',100)->default('UNPUBLISHED');
            $table->string('code',100)->nullable();
            $table->boolean('selected_for_newsletter');

            $table->integer('measure_id');
            $table->text('quality_check')->nullable();
            $table->integer('brand_id')->nullable();
            $table->timestamps();
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('no action');
            $table->foreign('image_id')->references('id')->on('images')->onDelete('no action');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
