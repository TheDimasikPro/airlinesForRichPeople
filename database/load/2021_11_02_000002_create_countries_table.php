<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_country')->unique('name_country')->nullable(false);
            $table->string('fullname_country')->unique('fullname_country')->nullable(true);
            $table->string('english_name_country')->unique('english_name_country')->nullable(false);
            $table->string('alpha2')->nullable(false);
            $table->string('alpha3')->nullable(false);
            $table->string('iso')->nullable(false);
            $table->string('location')->nullable(true);
            $table->string('location_precise')->nullable(true);
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
        Schema::dropIfExists('countries');
    }
}
