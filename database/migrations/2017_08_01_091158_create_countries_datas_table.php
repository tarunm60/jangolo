<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries_datas', function (Blueprint $table) {
            $table->increments('id');
            //$table->engine = 'InnoDB';
            $table->string('name',100);
            $table->string('official_name',100);
            $table->string('ISO3166-1-Alpha-2',100);
            $table->string('ISO3166-1-Alpha-3',100);
            $table->string('M49',100);
            $table->string('ITU',100);
            $table->string('MARC',100);
            $table->string('WMO',100);
            $table->string('DS',100);
            $table->string('Dial',100);
            $table->string('FIFA',100);
            $table->string('FIPS',100);
            $table->string('GAUL',100);
            $table->string('IOC',100);
            $table->string('ISO4217-currency_alphabetic_code',100);
            $table->string('ISO4217-currency_country_name',100);
            $table->string('ISO4217-currency_minor_unit',100);
            $table->string('ISO4217-currency_name',100);
            $table->string('ISO4217-currency_numeric_code',100);
            $table->string('is_independent',100);
            $table->string('Capital',100);
            $table->string('Continent',100);
            $table->string('TLD',100);
            $table->string('Languages',100);
            $table->string('Geoname ID',100);
            $table->string('EDGAR',100);

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
        Schema::dropIfExists('countries_datas');
    }
}
