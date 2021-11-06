<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FlightController extends Controller
{
    public function searchFlight(Request $request)
    {
        $validateFields = Validator::make($request->all(),[
            "from"=>[
                "required",
                "string",
                "min:3",
                "max:4"
            ],
            "to"=>[
                "required",
                "string",
                "min:3",
                "max:4"
            ],
            "date1"=>[
                "required",
                "date",
                "format:YYYY-MM-DD"
            ],
            "date2"=>[
                "required",
                "date",
                "format:YYYY-MM-DD"
            ],
            "passengers"=>[
                "required",
                "regex:/^[1-8]{1}$/"
            ]
        ]);

        if ($validateFields->fails()) {
            return response([
                "error" => [
                    "code" => 422,
                    "message" => "Validation error",
                    "errors" => $validateFields->errors()
                ]
            ],422);
        }
        else{
            $flight = Flight::where([
                ['']
            ]);
        }
    }
}
