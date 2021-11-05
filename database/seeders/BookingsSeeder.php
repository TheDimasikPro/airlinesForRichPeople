<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            DB::table('bookings')->insert([
                'id_flight_from' => rand(1,10),
                "id_flight_back" => rand(1,10),
                "date_from" => Carbon::now(),
                "date_back" => Carbon::now(),
                "booking_code" => Str::random(6),
                "id_booking_status" => rand(1,3),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]);
        }
    }
}
