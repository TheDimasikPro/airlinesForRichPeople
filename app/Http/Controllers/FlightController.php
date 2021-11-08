<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Airport;
use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FlightController extends Controller
{
    public function returnViewSearchTickets(Request $request)
    {
        $validationFileds = Validator::make($request->all(),[
            "airport_from" => [
                "required",
                "string"
            ],
            "date_from" => [
                "required",
                "string"
            ],
            "count_pass" => [
                "required",
                "string"
            ]
        ]);
        if ($validationFileds->fails()) {
            return $validationFileds->errors();
            return redirect()->route('index__page')->withErrors([
                'errors' => "Пожалуйста проверьте все свои данные. Если у вас есть обратный билет, выберите данные для обратного полета и кол-во пассажиров должно быть больше 0."
            ]);
        }

        
        $date_from = $request["date_from"];
        $date_back = $request["date_back"];
        $count_pass = explode(' ', $request["count_pass"])[0];
        if ($count_pass == 0) {
            return redirect()->route('index__page')->withErrors([
                'errors' => "Кол-во пассажиров должно быть больше 0."
            ]);
        }
        if (count(explode(' ',$request["airport_from"])) == 2 && count(explode(' ',$request["airport_back"])) < 2 && $date_from != null) {
            $airport_from__iata_code = str_replace(array('(',')'),'', explode(' ',$request["airport_from"])[1]);
            $valid_array = [
                "airport_from__iata_code" => $airport_from__iata_code,
                "date_from" => $date_from,
                "date_back" => $date_back,
                "count_pass" => $count_pass,
            ];
            $validationFileds = Validator::make($valid_array,[
                "airport_from__iata_code" => [
                    "required",
                    "string",
                    "max:4"
                ],
                "date_from" => [
                    "required",
                    "date"
                ],
                "count_pass" => [
                    "required",
                    "integer"
                ]
            ]);
            if ($validationFileds->fails()) {
                return redirect()->route('index__page')->withErrors([
                    'errors' => "Проверьте все введеные данные"
                ]);
            }


            $id_airport_from = Airport::where([
                ['iata_code',$airport_from__iata_code]
            ]);
            $flight_from = Flight::with(['airport_start' => function ($query)
            {
                $query->select('id','iata_code','name_rus','name_eng','city_rus','city_eng')->where([
                    ['id','5'],
                ]);
            }])->with(['airport_end' => function ($query)
            {
                $query->select('id','iata_code','name_rus','name_eng','city_rus','city_eng')->where([
                    ['id','10'],
                ]);
            }])->where([
                ['id_airport_start','5'],
                ['id_airport_end','10']
            ])->get();
            
            
            
            if (count($flight_from) > 0) {
                return view('search_tickets', [
                    'flight_list' => $flight_from,
                    'fligth_status' => 'one_way'
                ]);
                // return json_encode($flight_from);
            }
            return redirect()->route('index__page')->withErrors([
                'errors' => "Рейсов с введенными данными не найдено"
            ]);
        }
        if (count(explode(' ',$request["airport_back"])) == 2 && count(explode(' ',$request["airport_from"])) == 2 && $date_back != null && $date_from!= null) {
            if ($date_from == null) {
                return redirect()->route('index__page')->withErrors([
                    'errors' => "Выберите дату вылета"
                ]);
            }
            if ($date_back == null) {
                return redirect()->route('index__page')->withErrors([
                    'errors' => "Выберите дату вылета обратно"
                ]);
            }
            $airport_from__iata_code = str_replace(array('(',')'),'', explode(' ',$request["airport_from"])[1]);
            $airport_back__iata_code = str_replace(array('(',')'),'', explode(' ',$request["airport_back"])[1]);
            if ($airport_from__iata_code == $airport_back__iata_code) {
                return redirect()->route('index__page')->withErrors([
                    'errors' => "Аэропорты 'Туда' и 'Обратно' должны быть разные"
                ]);
            }
            $valid_array = [
                "airport_from__iata_code" => $airport_from__iata_code,
                "airport_back__iata_code" => $airport_back__iata_code,
                "date_from" => $date_from,
                "date_back" => $date_back,
                "count_pass" => $count_pass,
            ];
            $validationFileds = Validator::make($valid_array,[
                "airport_from__iata_code" => [
                    "required",
                    "string",
                    "max:4"
                ],
                "airport_back__iata_code" => [
                    "string",
                    "max:4"
                ],
                "date_from" => [
                    "required",
                    "date"
                ],
                "date_back" => [
                    "date"
                ],
                "count_pass" => [
                    "required",
                    "integer"
                ]
            ]);
            if ($validationFileds->fails()) {
                return redirect()->route('index__page')->withErrors([
                    'errors' => "Если у вас есть обратный билет, выберите данные для обратного полета и кол-во пассажиров должно быть больше 0."
                ]);
            }

            return $date_back;
        }
        return redirect()->route('index__page')->withErrors([
            'errors' => "Проверьте все введеные данные"
        ]);
       

        


        
        
        // if ($validationFileds->fails()) {
        //     return redirect()->route('index__page')->withErrors([
        //         'errors' => "Если у вас есть обратный билет, выберите данные для обратного полета и кол-во пассажиров должно быть больше 0."
        //     ]);
        // }
        // return $airport_from__iata_code;


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
