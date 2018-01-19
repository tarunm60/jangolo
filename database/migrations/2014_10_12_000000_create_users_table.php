<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('users', function (Blueprint $table) {
             $table->increments('id');
             $table->string('firstname');
             $table->string('lastname');
             $table->string('email')->unique();
             $table->string('password');
             $table->integer('logins')->nullable();
             $table->integer('last_login')->nullable();
             $table->string('username')->nullable();
             $table->string('shopname',500)->nullable();
             $table->integer('recommendations')->nullable();
             $table->tinyInteger('status')->nullable();
             $table->dateTime('date');
             $table->integer('relation_id')->nullable();
             $table->integer('ressource_id')->nullable();
             $table->integer('access_id')->nullable();
             $table->string('picture')->nullable();
             $table->integer('department_id')->nullable();
             $table->integer('contact_id')->nullable();
             $table->integer('tvcustomer_id')->nullable();
             $table->string('website')->nullable();
             $table->string('telephone')->nullable();
             $table->string('mobile')->nullable();
             $table->boolean('is_farm')->default(false);
             $table->boolean('is_emp')->default(false);
             $table->boolean('is_supplier')->default(false);
             $table->text('facebook_token')->nullable();
             $table->decimal('latitude')->nullable();
             $table->decimal('longitude')->nullable();
             $table->integer('leed_id')->nullable();
             $table->text('note')->nullable();
             $table->dateTime('updated_at');
             $table->dateTime('created_at');
             $table->rememberToken();
             $table->foreign('access_id')->references('id')->on('accesses')
              ->onDelete('no action')
              ->onUpdate('no action');
             $table->foreign('contact_id')->references('id')->on('contacts')
             ->onDelete('no action')
             ->onUpdate('no action');
            
            // $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
