<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_types')->insert([
            'name_document' => 'Паспорт РФ',
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        DB::table('document_types')->insert([
            'name_document' => 'Заграничный паспорт',
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        DB::table('document_types')->insert([
            'name_document' => 'Свидетельство о рождении',
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
    }
}
