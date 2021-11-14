<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Carbon\CarbonImmutable;

class FlightsSeeder extends Seeder
{
    function randomDate($start_date, $end_date)
    {
        // Convert to timetamps
        $min = strtotime($start_date);
        $max = strtotime($end_date);

        // Generate random number using above bounds
        $val = rand($min, $max);

        // Convert back to desired date format
        return date('Y-m-d H:i:s', $val);
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 2; $i++) {
            $date_start = $this->randomDate(Carbon::now(),Carbon::now()->addWeek());
            $date_end = $this->randomDate($date_start,CarbonImmutable::parse($date_start)->addWeek());

            $id_airport_start = 2;
            $id_airport_end = 1;
            if ($id_airport_start != $id_airport_end) {
                DB::table('flights')->insert([
                    'flight_code' => "RA_" . Str::random(4),
                    "id_airport_start" => $id_airport_start,
                    "id_airport_end" =>  $id_airport_end,
                    "time_start" => Carbon::now()->format('H:i:s'),
                    "time_end" => Carbon::now()->format('H:i:s'),
                    "date_start" => $date_start,
                    "date_end" => $date_end,
                    "cost" => rand(3000,5000),
                    "travel_time" => "03:20:00",
                    "number_of_seats" => 50,
                    "number_of_free_seats" => rand(5,50),
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ]);
            }
            
        }
        
    }
}
