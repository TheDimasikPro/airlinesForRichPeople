<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('iata_code',3);
            $table->string('icao_code',5);
            $table->string('name_rus',100);
            $table->string('name_eng',100);
            $table->string('city_rus',100);
            $table->string('city_eng',100);
            $table->string('country_rus',150);
            $table->string('country_eng',150);
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
        Schema::dropIfExists('airports');
    }
}
