<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $airport_data = DB::table('airports')->select('id','iata_code','name_eng','desc_airport_eng')->limit(50)->get();
        $reviews = Review::select('id','name_user','text_review','created_at')->limit(9)->get();
        $reviews_count = Review::all()->count();
        $min_select_date = "10.09.2021";
        $max_select_date = "10.12.2021";
        $response = [
            "airport_data" => $airport_data,
            "min_select_date" => $min_select_date,
            "max_select_date" => $max_select_date,
            'reviews' => $reviews,
            'reviews_count' => $reviews_count
        ];
        return view('index', ["index_data" => $response]);
    }
}
