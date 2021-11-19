<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(DocumentTypesSeeder::class);
        // $this->call(CountriesSeeder::class);
        // $this->call(GenderCodesSeeder::class);
        // $this->call(UserRolesSeeder::class);
        // $this->call(AirplanesSeeder::class);
        // $this->call(AirlineCompaniesSeeder::class);
        // $this->call(FlightsSeeder::class);
        // $this->call(BookingStatusesSeeder::class);
        // $this->call(BookingsSeeder::class);
        // $this->call(PassengersSeeder::class);
        $this->call(InternationalCountryCodesSeeder::class);
    }
}
