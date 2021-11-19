<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternationalCountryCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('international_country_codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country_name_rus');
            $table->string('country_name_eng');
            $table->string('country_iso');
            $table->integer('country_code');
            $table->integer('phone_number_length');
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
        Schema::dropIfExists('international_country_codes');
    }
}
