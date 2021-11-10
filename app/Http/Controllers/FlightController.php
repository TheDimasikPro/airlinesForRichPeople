<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Airport;
use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        if (count(explode(' ',$request["airport_from"])) == 2 && count(explode(' ',$request["airport_back"])) < 2 && $date_from != null && $date_back == null) {
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
                ['id_airport_end','10'],
                ['number_of_free_seats','>',0]
            ])->get();
            
            
            
            if (count($flight_from) > 0) {
                return view('search_tickets', [
                    'flight_list' => $flight_from,
                    'fligth_status' => 'one_way',
                    'count_pass' => $count_pass
                ]);
                // return json_encode($flight_from);
            }
            return redirect()->route('index__page')->withErrors([
                'errors' => "Рейсов с введенными данными не найдено"
            ]);
        }
        if (count(explode(' ',$request["airport_back"])) == 2 && count(explode(' ',$request["airport_from"])) == 2 && $date_back != "" && $date_from != "") {
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
            if ($date_from > $date_back) {
                return redirect()->route('index__page')->withErrors([
                    'errors' => "Дата вылета Обратно не может быть больше даты вылета Туда"
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
                ['id_airport_end','10'],
                ['number_of_free_seats','>',0]
            ])->get();

            $flight_back = Flight::with(['airport_start' => function ($query)
            {
                $query->select('id','iata_code','name_rus','name_eng','city_rus','city_eng')->where([
                    ['id','10'],
                ]);
            }])->with(['airport_end' => function ($query)
            {
                $query->select('id','iata_code','name_rus','name_eng','city_rus','city_eng')->where([
                    ['id','5'],
                ]);
            }])->where([
                ['id_airport_start','10'],
                ['id_airport_end','5'],
                ['number_of_free_seats','>',0]
            ])->get();
            
            
            
            if (count($flight_from) > 0 && count($flight_back) > 0) {
                return view('search_tickets', [
                    'flight_list' => $flight_from,
                    'flight_back' => $flight_back,
                    'fligth_status' => 'both_sides',
                    'count_pass' => $count_pass
                ]);
                return json_encode($flight_back);
            }


            // return $date_back;
        }
        // return $date_from;
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

    public function returnViewPassengerInfo(Request $request)
    {
        // return $request;
        $validationFileds = Validator::make($request->all(), [
            "old_count_people" => [
                "required",
                "integer"
            ],
            "kids_count_people" => [
                "required",
                "integer"
            ],
            "baby_count_people" => [
                "required",
                "integer"
            ],
            "date_from" => [
                "required",
                "date"
            ],
            "id_flight_start" => [
                "required",
                "integer"
            ],
            "id_flight_end" => [
                "required",
                "integer"
            ]
        ]);
        if ($validationFileds->fails()) {
            // return $request;
            // return $validationFileds->errors();
            return redirect()->route('search_tickets__page')->withErrors([
                "errors" => "Что-то пошло не так, обновите страниц и перепроверьте данные"
            ]);
        }

        $old_count_people = $request["old_count_people"];
        $kids_count_people = $request["kids_count_people"];
        $baby_count_people = $request["baby_count_people"];
        $date_from = $request["date_from"];
        $date_back = $request["date_back"];
        $id_flight_start = $request["id_flight_start"];
        $id_flight_end = $request["id_flight_end"];
        $airport_from = $request["airport_from"];
        $iata_code_airport_from = explode('(',$request["airport_from"])[0];
        $airport_back = $request["airport_back"];
        $iata_code_airport_back = explode('(',$request["airport_back"])[0];
        $id_flight_end = $request["id_flight_end"];
        $id_flight_end = $request["id_flight_end"];

        if ($old_count_people != null && $kids_count_people != null && $baby_count_people != null && $date_from != null && $id_flight_start != null && $id_flight_end != null) {
            $countries_all = DB::table('countries')->select('id','name_country')->get()->sortBy('id');
            $document_types_all = DB::table('document_types')->select('id','name_document','mask_input')->get()->sortBy('id');
            $gender_codes_all = DB::table('gender_codes')->select('id','gender_name_rus')->get()->sortBy('id');
            $passenger_array = [
                "old_count_people" => $old_count_people,
                "kids_count_people" => $kids_count_people,
                "baby_count_people" => $baby_count_people,
                "date_from" => $date_from,
                "date_back" => $date_back,
                "id_flight_start" => $id_flight_start,
                "id_flight_end" => $id_flight_end,
                "countries_all" => $countries_all,
                "document_types_all" => $document_types_all,
                "gender_codes_all" => $gender_codes_all,
                "airport_from" => $airport_from,
                "airport_back" => $airport_back,
            ];
            return view('passenger_info',$passenger_array);
        }
        
        
        
    }
    function objectToarray($data)
    {
        $array = (array)$data;
        foreach($array as $key => &$field){
            if(is_object($field))$field = $this->objectToarray($field);
        }
        return $array;
    }
    public function returnViewPaymentTickets(Request $request)
    {
        $data = $request['formDataArray'];
        $request_array = $this->objectToarray(json_decode($data));
        // print_r(json_decode($data));
        // var_dump(json_decode($data));
        
        // return $request_array;
        $flag = false;
        $count_done = 0;
        $array_values_req = [];
        foreach ($request_array as $key => $value) {
            $validationFileds = Validator::make($value, [
                "last_name" => [
                    "required",
                    "string"
                ],
                "first_name" => [
                    "required",
                    "string"
                ],
                "other_name" => [
                    "string"
                ],
                "date_bithday" => [
                    "required",
                    "date"
                ],
                "citizenship_id_country" => [
                    "required",
                    "integer"
                ],
                "type_document" => [
                    "required",
                    "integer"
                ],
                "series_numbers_document" => [
                    "required",
                    "string"
                ],
                "gender_code" => [
                    "required",
                    "integer"
                ]
            ]);
            if ($validationFileds->fails()) {
                $response = [
                    'status' => false,
                    'errors_fields' => $validationFileds->errors()
                ];
                $flag = false;
                return response()->json($response)->header('Content-Type', 'application/json');
                // return redirect()->route('passenger_info__page')->withErrors([
                //     "errors" => "Все данные должны быть на английском языке. Все поля кроме Отчества, обязательны к заполнению"
                // ]);
            }
            array_push($array_values_req,$value);
            $count_done++;
            if ($count_done == count($request_array)) {
                $flag = true;
            }
            
            // return redirect()->guest('payment_tickets');
            // return json_encode([
            //     "values_input" => $value
            // ]);
        }
        
        if ($flag) {
            // return response()->json([
            //     "count_done" => $count_done,
            //     "request_array" => count($request_array),
            //     "array_values_req" => $array_values_req,
            // ],200)->header('Content-Type', 'application/json');;
            // return json_encode([
            //     "count_done" => $count_done,
            //     "request_array" => count($request_array),
            //     "array_values_req" => $array_values_req,
            // ]);
            return view('payment_tickets',$array_values_req);
        }
    }
}
