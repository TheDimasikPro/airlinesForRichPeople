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
                "id_airport_from" => rand(1,10),
                "id_airport_back" =>  rand(1,10),
                "time_from" => Carbon::now()->format('H:i:s'),
                "time_back" => Carbon::now()->format('H:i:s'),
                "cost" => '4000',
                "travel_time_from" => '02:30:00',
                "travel_time_back" => '02:30:00'
            ]);
        }
        
    }
}
