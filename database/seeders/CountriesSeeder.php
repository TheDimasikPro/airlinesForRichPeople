<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $path = public_path('/app/SQLScripts/countries.sql');
        $path = 'app/SQLScripts/countries.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
