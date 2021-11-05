<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $airport_data = DB::table('airports')->select('id','iata_code','name_eng','city_eng','country_eng')->limit(50)->get();

        $min_select_date = "10.09.2021";
        $max_select_date = "10.12.2021";
        $response = [
            "airport_data" => $airport_data,
            "min_select_date" => $min_select_date,
            "max_select_date" => $max_select_date
        ];
        return view('index', ["index_data" => $response]);
    }
}
