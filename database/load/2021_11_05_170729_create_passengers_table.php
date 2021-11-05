<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passengers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('other_name');
            $table->foreignId('id_gender_code')->constrained('gender_codes');
            $table->foreignId('id_citizenship')->constrained('countries');
            $table->date('date_of_birthday',50)->nullable(false);
            $table->foreignId('id_document_type')->constrained('document_types');
            $table->string('series_and_document_number',20)->nullable(false)->unique('series_and_document_number')->nullable(false);
            $table->integer('row_number_from');
            $table->integer('row_number_back');
            $table->integer('place_number_from');
            $table->integer('place_number_back');
            $table->foreignId('id_booking')->constrained('bookings');
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
        Schema::dropIfExists('passengers');
    }
}
