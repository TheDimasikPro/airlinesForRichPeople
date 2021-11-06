<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    public function returnViewSearchTickets(Request $request)
    {
        // return view('search_tickets');
        // {flights_from}/{flights_back}/{date_from}/{date_back}/{count_pass}
        $validationFileds = Validator::make($request->all(),[
            "airport_from" => [
                "required",
                "string"
            ],
            "airport_back" => [
                "string"
            ],
            "date_from" => [
                "required",
                "string"
            ],
            "date_back" => [
                "date"
            ],
            "count_pass" => [
                "required",
                "string"
            ]
        ]);
        if ($validationFileds->fails()) {
            // $response = [
            //     'status' => false,
            //     'error_message' => $validationFileds->errors()
            // ];

            return redirect()->route('index__page')->withErrors([
                'errors' => $validationFileds->errors()->messages()
            ]);
        }

        $letters = array('я', 'о');
        $fruit   = array('яблоко', 'орех');
        $text    = 'я о';
        $output  = str_replace($letters, $fruit, $text);
        $airport_from__iata_code = str_replace(array('(',')'),'', explode(' ',$request["airport_from"])[1]);
        $airport_back__iata_code = str_replace(array('(',')'),'', explode(' ',$request["airport_back"])[1]);

        
        return $airport_back__iata_code;


        // return view('search_tickets');
    }

    public function returnViewPassengerInfo()
    {
        return view('passenger_info');
    }
    public function returnViewPaymentTickets()
    {
        return view('payment_tickets');
    }
}
