<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('flight_code');
            // $table->foreignId('id_airline_company')->constrained('airline_companies');
            $table->foreignId('id_airport_from')->constrained('airports');
            $table->foreignId('id_airport_back')->constrained('airports');
            $table->time('time_from');
            $table->time('time_back');
            $table->integer('cost');
            // $table->foreignId('id_airplane')->constrained('airplanes');
            $table->time('travel_time_from');
            $table->time('travel_time_back');
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
        Schema::dropIfExists('flights');
    }
}
