<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Airport;
use App\Models\Booking;
use App\Models\Flight;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Mockery\Generator\StringManipulation\Pass\Pass;

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
            // return $validationFileds->errors();
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
        $string_airport_from = $request["airport_from"];
        $exploded_airport_from = explode(' ', $string_airport_from);
        $airport_from__iata_code = str_replace(array('(',')'),'',end($exploded_airport_from));


        $string_airport_back = $request["airport_back"];
        $exploded_airport_back = explode(' ', $string_airport_back);
        $airport_back__iata_code = str_replace(array('(',')'),'',end($exploded_airport_back));
        // в один конец
        if (count(explode(' ',$request["airport_from"])) >= 2 && count(explode(' ',$request["airport_back"])) >= 2 && !empty($date_from) && empty($date_back)) {
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
                // return $validationFileds->errors();
                return redirect()->route('index__page')->withErrors([
                    'errors' => "Проверьте все введеные данные"
                ]);
            }


            $id_airport_start = Airport::where([
                ['iata_code',$airport_from__iata_code]
            ])->get()[0]["id"];
            
            $id_airport_back = Airport::where([
                ['iata_code',$airport_back__iata_code]
            ])->get()[0]["id"];
           
            // return $id_airport_back;
            $flight_from = Flight::with(['airport_start' => function ($query) use($id_airport_start)
            {
                $query->select('id','iata_code','name_rus','name_eng','city_rus','city_eng')->where([
                    ['id', $id_airport_start],
                ]);
            }])->with(['airport_end' => function ($query) use($id_airport_back)
            {
                $query->select('id','iata_code','name_rus','name_eng','city_rus','city_eng')->where([
                    ['id',$id_airport_back],
                ]);
            }])->where([
                ['id_airport_start',$id_airport_start],
                ['id_airport_end',$id_airport_back],
                ['date_start',$date_from],
                ['number_of_free_seats','>',$count_pass]
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
        if (count(explode(' ',$request["airport_back"])) >= 2 && count(explode(' ',$request["airport_from"])) >= 2 && !empty($date_from) && !empty($date_back)) {
            // return "в обе стороны";
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
                    "required",
                    "string",
                    "max:4"
                ],
                "date_from" => [
                    "required",
                    "date"
                ],
                "date_back" => [
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
                    'errors' => "Если у вас есть обратный билет, выберите данные для обратного полета и кол-во пассажиров должно быть больше 0."
                ]);
            }

            $id_airport_from = Airport::where([
                ['iata_code',$airport_from__iata_code]
            ])->get()[0]["id"];
            $id_airport_back = Airport::where([
                ['iata_code',$airport_back__iata_code]
            ])->get()[0]["id"];
            $flight_from = Flight::with(['airport_start' => function ($query) use($id_airport_from)
            {
                $query->select('id','iata_code','name_rus','name_eng','city_rus','city_eng')->where([
                    ['id',$id_airport_from],
                ]);
            }])->with(['airport_end' => function ($query) use($id_airport_back)
            {
                $query->select('id','iata_code','name_rus','name_eng','city_rus','city_eng')->where([
                    ['id',$id_airport_back],
                ]);
            }])->where([
                ['id_airport_start',$id_airport_from],
                ['id_airport_end',$id_airport_back],
                ['date_start',$date_from],
                ['date_end',$date_back],
                ['number_of_free_seats','>',$count_pass]
            ])->get();

            $flight_back = Flight::with(['airport_start' => function ($query) use($id_airport_back)
            {
                $query->select('id','iata_code','name_rus','name_eng','city_rus','city_eng')->where([
                    ['id',$id_airport_back],
                ]);
            }])->with(['airport_end' => function ($query) use($id_airport_from)
            {
                $query->select('id','iata_code','name_rus','name_eng','city_rus','city_eng')->where([
                    ['id',$id_airport_from],
                ]);
            }])->where([
                ['id_airport_start',$id_airport_back],
                ['id_airport_end',$id_airport_from],
                ['date_start',$date_back],
                // ['date_end',$date_from],
                ['number_of_free_seats','>',$count_pass]
            ])->get();
            
            // return $flight_back;
            
            if (count($flight_from) > 0 && count($flight_back) > 0) {
                return view('search_tickets', [
                    'flight_list' => $flight_from,
                    'flight_back' => $flight_back,
                    'fligth_status' => 'both_sides',
                    'count_pass' => $count_pass
                ]);
                // return json_encode($flight_back);
            }
            return redirect()->route('index__page')->withErrors([
                'errors' => "Рейсов с введенными данными не найдено, так как либо ваши данные неверные, либо для такого кол-ва человек не хватает мест"
            ]);

            // return $date_back;
        }
        // return $date_from;
        // return count(explode(' ',$request["airport_back"]));
        // $response = [
        //     "count_air_from" => count(explode(' ',$request["airport_from"])),
        //     "count_air_back" => count(explode(' ',$request["airport_back"])),
        //     "date_from" => $date_from,
        //     "date_back" => $date_back,
        // ];
        // return $response;
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
            ],
            "cost" => [
                "required"
            ]
        ]);
        if ($validationFileds->fails()) {
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
        $cost = $request["cost"];
        if ($request["id_flight_end"] == 0) {
            $id_flight_end = null;
        }
        else{
            $id_flight_end = $request["id_flight_end"];

        }
        $airport_from = $request["airport_from"];
        $iata_code_airport_from = explode('(',$request["airport_from"])[0];
        $airport_back = $request["airport_back"];
        $iata_code_airport_back = explode('(',$request["airport_back"])[0];
        // $id_flight_end = $request["id_flight_end"];
        // $id_flight_end = $request["id_flight_end"];

        if ($old_count_people != null && $kids_count_people != null && $baby_count_people != null && $date_from != null && $id_flight_start != null && $id_flight_end != -1) {
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

            $passenger_array__session = [
                "old_count_people" => $old_count_people,
                "kids_count_people" => $kids_count_people,
                "baby_count_people" => $baby_count_people,
                "date_from" => $date_from,
                "date_back" => $date_back,
                "id_flight_start" => $id_flight_start,
                "id_flight_end" => $id_flight_end,
                "airport_from" => $airport_from,
                "airport_back" => $airport_back,
                "cost" => $cost
            ];

            session(['flight_order_info' => $passenger_array__session]);
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
    public function redirectViewPaymentTickets(Request $request)
    {
        $data = $request['formDataArray'];
        $email_feedback = $request['email_feedback'];
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
                "citizenship" => [
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
            // найти рейс в базе из сессии, рандомно выбрать 1 место в рандомном ряду, выесть 1 из числа свободных мест, в ряду всегда 6 мест
            // сделать проверку, что пассажира с таким местом и рядом нет, если кол-во мест = 0, ошибка, если человек с таким местом и рядом есть - ошибка.
            
            if (!empty(session("flight_order_info"))) {
                $checkBooking_end = null;
                $checkBooking_start = Booking::where([
                    ['id_flight_from', session("flight_order_info")["id_flight_start"]],
                    ['id_flight_back', session("flight_order_info")["id_flight_end"]],
                    ['id_booking_status','!=',3]
                ])->select('id')->get();
                $checkBooking_start_arr_id = [];
                foreach ($checkBooking_start as $key => $value) {
                    array_push($checkBooking_start_arr_id,$value->id);
                }
                $checkPassenger_start = Passenger::query(); // пассажиры на таком же рейсе ТУДА
                foreach($checkBooking_start_arr_id as $id_booking_db){
                    $checkPassenger_start->orWhere('id_booking', $id_booking_db);
                    // echo $id_booking_db;
                }

                // если есть обратный билет
                $checkPassenger_end = Passenger::query(); // пассажиры на таком же  ОБРАТНО
                if (!empty(session("flight_order_info")["id_flight_end"])) {
                    $checkBooking_end = Booking::where([
                        ['id_flight_from', session("flight_order_info")["id_flight_end"]],
                        ['id_flight_back', session("flight_order_info")["id_flight_start"]],
                        ['id_booking_status','!=',3]
                    ])->select('id')->get();
                    $checkBooking_end_arr_id = [];
                    foreach ($checkBooking_end as $key => $value) {
                        array_push($checkBooking_end_arr_id,$value->id);
                    }
                    
                    foreach($checkBooking_end_arr_id as $id_booking_db){
                        $checkPassenger_end->orWhere('id_booking', $id_booking_db);
                        // echo $id_booking_db;
                    }
                }

                $place_free__start = Flight::query(); // запрос на кол-во свободных мест ТУДА
                $place_free__end = null; // запрос на кол-во свободных мест ОБРАТНО

                $count_free_place__start = 0; // кол-во свободных мест ТУДА
                $count_free_place__end = 0; // кол-во свободных мест ОБРАТНО

                $place_free__start->select('number_of_free_seats')->where([
                    ['id',session("flight_order_info")["id_flight_start"]]
                ]);
                $count_free_place__start = $place_free__start->get()[0]["number_of_free_seats"];
                if (!empty(session("flight_order_info")["id_flight_end"])) {
                    $place_free__end = Flight::query(); 
                    $place_free__end->select('number_of_free_seats')->where([
                        ['id',session("flight_order_info")["id_flight_end"]]
                    ])->get()[0]["number_of_free_seats"];
                    $count_free_place__end = $place_free__end->get()[0]["number_of_free_seats"];
                }
                $array_new_passenger_ids = [];
               
                $arr_places_start = [];
                foreach ($checkPassenger_start->get() as $checkPassenger_start_value) {
                    array_push($arr_places_start,$checkPassenger_start_value["place_number"]);
                }
                $arr_places_end = [];
                foreach ($checkPassenger_end->get() as $checkPassenger_end_value) {
                    array_push($arr_places_end,$checkPassenger_end_value["place_number"]);
                }
                
                foreach ($array_values_req as $value) {
                    // выборка мест для пассажира
                    $place_passenger__start = 0;
                    
                    foreach ($arr_places_start as $arr_places_start__item) {
                        $rand_place_start = rand(1,$count_free_place__start);
                        while($rand_place_start == $arr_places_start__item){
                            $rand_place_start = rand(1,$count_free_place__start);
                        }
                        $place_passenger__start = $rand_place_start;
                    }

                    // return $place_passenger__start;
                    $new_booking_id_start = Booking::insertGetId([
                        'id_flight_from' => session("flight_order_info")["id_flight_start"],
                        'id_flight_back' => session("flight_order_info")["id_flight_end"],
                        'booking_code' => "booking__" . Str::random(6),
                        'id_booking_status' => 1,
                        "created_at" => Carbon::now(),
                        "updated_at" => Carbon::now()
                    ]);

                    $new_passenger_id_start = Passenger::insertGetId([
                        'last_name' => $value["last_name"],
                        'first_name' => $value["first_name"],
                        'other_name' => $value["other_name"],
                        'date_of_birthday' => $value["date_bithday"],
                        'id_gender_code' => $value["gender_code"],
                        'id_citizenship' => $value["citizenship"],
                        'id_document_type' => $value["type_document"],
                        'series_and_document_number' => str_replace(' ','',$value["series_numbers_document"]),
                        'row_number' => 1,
                        'place_number' => $place_passenger__start,
                        'id_booking' => $new_booking_id_start,
                        "created_at" => Carbon::now(),
                        "updated_at" => Carbon::now()
                    ]);
                    array_push($array_new_passenger_ids,$new_passenger_id_start);
                    array_push($arr_places_start,$place_passenger__start);

                    $flightFromUpdate = Flight::findOrFail(session("flight_order_info")["id_flight_start"]); // рейс ТУДА
                    if ($flightFromUpdate->number_of_free_seats > 0) {
                        $flightFromUpdate->number_of_free_seats = $flightFromUpdate->number_of_free_seats - 1;
                        $flightFromUpdate->save();
                    }
                    
                    if (!empty(session("flight_order_info")["id_flight_end"])) {
                        $place_passenger__end = 0;
                        $rand_place_end = rand(1,$count_free_place__end);
                        foreach ($arr_places_end as $arr_places_end__item) {
                            $rand_place_start = rand(1,$count_free_place__start);
                            while($rand_place_end == $arr_places_end__item){
                                $rand_place_end = rand(1,$count_free_place__end);
                            }
                            $place_passenger__end = $rand_place_end;
                        }
                        $new_booking_id_end = Booking::insertGetId([
                            'id_flight_from' => session("flight_order_info")["id_flight_end"],
                            'id_flight_back' => session("flight_order_info")["id_flight_start"],
                            'booking_code' => "booking__" . Str::random(6),
                            'id_booking_status' => 1,
                            "created_at" => Carbon::now(),
                            "updated_at" => Carbon::now()
                        ]);
                        $new_passenger_id_end = Passenger::insertGetId([
                            'last_name' => $value["last_name"],
                            'first_name' => $value["first_name"],
                            'other_name' => $value["other_name"],
                            'date_of_birthday' => $value["date_bithday"],
                            'id_gender_code' => $value["gender_code"],
                            'id_citizenship' => $value["citizenship"],
                            'id_document_type' => $value["type_document"],
                            'series_and_document_number' => str_replace(' ','',$value["series_numbers_document"]),
                            'row_number' => 1,
                            'place_number' => $place_passenger__end,
                            'id_booking' => $new_booking_id_end,
                            "created_at" => Carbon::now(),
                            "updated_at" => Carbon::now()
                        ]);
                        $flightFromUpdate = Flight::findOrFail(session("flight_order_info")["id_flight_end"]); // рейс ОБРАТНО
                        if ($flightFromUpdate->number_of_free_seats > 0) {
                            $flightFromUpdate->number_of_free_seats = $flightFromUpdate->number_of_free_seats - 1;
                            $flightFromUpdate->save();
                        }
                        array_push($array_new_passenger_ids,$new_passenger_id_end);
                        array_push($arr_places_end,$place_passenger__end);
                    }
                }
                $arr_places_start = [];
                $arr_places_end = [];
            }
            session(["new_passenger_ids" => $array_new_passenger_ids]);
            session(["cost_tickets__all_passenger" => session("flight_order_info")["cost"]]);
            // return json_encode($array_new_passenger_ids);
            session(["passenger_info" => $array_values_req]);
            return response()->json([
                "status" => true,
                "count_done" => $count_done,
                "request_array" => count($request_array),
                "array_values_req" => $array_values_req,
                "route" => route('payment_tickets__page'),
                // "flight_order_info__id_start" => session("flight_order_info")["id_flight_start"]
            ],200)->header('Content-Type', 'application/json');
        }
    }

    public function returnViewPaymentTickets()
    {
        // return session("passenger_info");
        if (!empty(session("passenger_info")) && !empty(session("new_passenger_ids")) && !empty(session("cost_tickets__all_passenger"))) {
            $response = [
                "cost_tickets" => session("cost_tickets__all_passenger"),
                "new_passenger_ids" => session("new_passenger_ids")
            ];
            // return $response;
            return view('payment_tickets', [
                "cost_tickets" => session("cost_tickets__all_passenger"),
                "new_passenger_ids" => session("new_passenger_ids")
            ]);
        }
        else{
            return redirect()->route('index__page');
        }
    }
}
