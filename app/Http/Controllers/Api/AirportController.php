<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Airport;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    public function listAirports($query)
    {
        // return "cccccc";
        if (!empty($query)) {
            $airport = Airport::query();
            $airport = $airport->where('city_eng','LIKE',trim($query).'%')
            ->orWhere('city_eng','LIKE','%'.trim($query))
            ->orWhere('city_eng',trim($query))
            ->orWhere('name_eng','LIKE','%'.trim($query))
            ->orWhere('name_eng','LIKE',trim($query).'%')
            ->orWhere('name_eng','LIKE','%'.trim($query))
            ->orWhere('iata_code','%'.trim($query))
            ->orWhere('iata_code',trim($query).'%')
            ->orWhere('iata_code',trim($query))->get();

            if (!$airport) {
                return response([
                    "data" => [
                        "items" => [
                            "name" => $airport
                        ]
                    ]
                ],200);
            }
            return response([
                "data" => [
                    "items" => []
                ]
            ],200);
        }
    }
}
