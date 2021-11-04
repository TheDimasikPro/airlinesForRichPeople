<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->foreignId('id_role')->constrained('user_roles');
            $table->string('email',255)->nullable(false)->unique('email');
            $table->string('phone',50)->unique('phone')->nullable(false);
            $table->string('full_name',255)->nullable(false);
            $table->date('date_of_birthday',50)->nullable(false);
            $table->foreignId('id_gender_code')->constrained('gender_codes');
            $table->string('city_of_residence',255)->nullable(false);
            $table->foreignId('id_document_type')->constrained('document_types');
            $table->string('series_and_document_number',20)->nullable(false)->unique('series_and_document_number')->nullable(false);
            $table->foreignId('id_country_of_issue')->constrained('countries');
            $table->string('password',255)->nullable(false);
            $table->string('remember_token',100)->nullable(true);
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
        Schema::dropIfExists('users');
    }
}
