<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InternationalCountryCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = 'app/SQLScripts/international_country_codes.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
