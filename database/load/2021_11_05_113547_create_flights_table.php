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
        // поля id_airport_end, time_end и date_end должны быть null
        Schema::create('flights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('flight_code');
            // $table->foreignId('id_airline_company')->constrained('airline_companies');
            $table->foreignId('id_airport_start')->constrained('airports');
            $table->foreignId('id_airport_end')->constrained('airports');
            $table->time('time_start');
            $table->time('time_end')->nullable(true);
            $table->integer('cost');
            $table->date('date_start');
            $table->date('date_end')->nullable(true);
            // $table->foreignId('id_airplane')->constrained('airplanes');
            $table->time('travel_time');
            // $table->time('travel_time_back');
            $table->integer('number_of_free_seats');
            $table->integer('number_of_seats');
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
