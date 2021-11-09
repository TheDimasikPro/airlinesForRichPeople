<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class FlightsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 11; $i++) { 
            DB::table('flights')->insert([
                'flight_code' => Str::random(6),
                "id_airport_start" => rand(1,10),
                "id_airport_end" =>  rand(1,10),
                "time_start" => Carbon::now()->format('H:i:s'),
                "time_end" => Carbon::now()->format('H:i:s'),
                "date_start" => Carbon::now(),
                "date_end" => Carbon::now(),
                "cost" => rand(3000,10000),
                "travel_time" => '02:30:00',
                "number_of_seats" => rand(100,200),
                "number_of_free_seats" => rand(20,50),
                // "travel_time_back" => '02:30:00'

            ]);
        }
        
    }
}
