<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookingStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('booking_statuses')->insert([
            'name_status' => 'Не подтвержден',
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        DB::table('booking_statuses')->insert([
            'name_status' => 'Подтвержден',
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        DB::table('booking_statuses')->insert([
            'name_status' => 'Не действителен',
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);



        // 'last_name' => $this->faker->lastName(),
        //     "first_name" => $this->faker->firstName(),
        //     "other_name" => Str::random(10),
        //     "id_gender_code" => rand(1,2),
        //     "id_citizenship" => rand(1,100),
        //     "date_of_birthday" => Carbon::now(),
        //     "id_document_type" => rand(1,3),
        //     "series_and_document_number" => mt_rand(),
        //     "row_number_from" => rand(1,10),
        //     "row_number_back" => rand(1,10),
        //     "place_number_from" => rand(1,10),
        //     "place_number_back" => rand(1,10),
        //     "id_booking" => rand(1,10),
        //     "created_at" => Carbon::now(),
        //     "updated_at" => Carbon::now(),
    }
}
