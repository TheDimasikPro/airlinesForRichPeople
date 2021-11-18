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
use Illuminate\Support\Facades\Session;
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
            ])->get()->sortBy('time_start');
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
            ])->get()->sortBy('time_start');

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
            ])->get()->sortBy('time_start');
            
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
                "errors" => "Что-то пошло не так, обновите страницу и перепроверьте данные"
            ]);
        }

        $old_count_people = $request["old_count_people"];
        $kids_count_people = $request["kids_count_people"];
        $baby_count_people = $request["baby_count_people"];
        $date_from = $request["date_from"];
        $date_back = $request["date_back"];
        $id_flight_start = $request["id_flight_start"];
        $cost = $request["cost"] *($old_count_people + $kids_count_people + $baby_count_people);
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
        $messages = [
            'last_name.required' => 'Поле "Фамилия" обязательно к заполнению',
            'last_name.string' => 'Поле "Фамилия" может принимать только буквенные символы',
            'first_name.required' => 'Поле "Имя" обязательно к заполнению',
            'first_name.string' => 'Поле "Имя" может принимать только буквенные символы',
            'other_name.string' => 'Поле "Фамилия" может принимать только буквенные символы',
            'date_birthday.required' => 'Поле "Дата рождения" обязательно к заполнению',
            'date_birthday.date' => 'Поле "Дата рождения" может принимать только дату',
            'date_birthday.date_format' => 'Поле "Дата рождения" может принимать только дату в формате Y-m-d',
            'series_numbers_document.required' => 'Поле "Серия и номер документа" обязательно к заполнению',
            'gender_code.required' => 'Поле "Пол" обязательно к заполнению',
            'gender_code.regex' => 'Поле "Пол" может принимать только цифры от 1-9 в кол-ве один',
            'type_document.required' => 'Поле "Тип документа" обязательно к заполнению',
            'type_document.regex' => 'Поле "Тип документа" может принимать только цифры от 1-9 в кол-ве один',
            'citizenship.required' => 'Поле "Гражданство" обязательно к заполнению',
            'citizenship.regex' => 'Поле "Гражданство" может принимать только цифры от 1-9 в кол-ве один',
        ];
        $rules = [
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
            "date_birthday" => [
                "required",
                "date",
                "date_format:Y-m-d"
            ],
            "citizenship" => [
                "required",
                "regex:/^[1-9]*$/"
            ],
            "type_document" => [
                "required",
                "regex:/^[1-9]{1}$/"
            ],
            "series_numbers_document" => [
                "required",
                "string"
            ],
            "gender_code" => [
                "required",
                "regex:/^[1-9]*$/"
            ]
        ];
        foreach ($request_array as $key => $value) {
            $validationFileds = Validator::make($value, $rules, $messages);
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
                    $place_passenger__start = 1;
                    
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
                        'booking_code' => "RA_booking_" . Str::random(6),
                        'id_booking_status' => 1,
                        "created_at" => Carbon::now(),
                        "updated_at" => Carbon::now()
                    ]);

                    $new_passenger_id_start = Passenger::insertGetId([
                        'ticket_code' => "RA_" . Str::random(4),
                        'last_name' => $value["last_name"],
                        'first_name' => $value["first_name"],
                        'other_name' => $value["other_name"],
                        'date_of_birthday' => $value["date_birthday"],
                        'id_gender_code' => $value["gender_code"],
                        'id_citizenship' => $value["citizenship"],
                        'id_document_type' => $value["type_document"],
                        'series_and_document_number' => str_replace(' ','',$value["series_numbers_document"]),
                        'row_number' => 1,
                        'place_number' => $place_passenger__start,
                        'email_feedback' => $email_feedback,
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
                        $place_passenger__end = 1;
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
                            'booking_code' => "RA_booking_" . Str::random(6),
                            'id_booking_status' => 1,
                            "created_at" => Carbon::now(),
                            "updated_at" => Carbon::now()
                        ]);
                        $new_passenger_id_end = Passenger::insertGetId([
                            'ticket_code' => "RA_" . Str::random(4),
                            'last_name' => $value["last_name"],
                            'first_name' => $value["first_name"],
                            'other_name' => $value["other_name"],
                            'date_of_birthday' => $value["date_birthday"],
                            'id_gender_code' => $value["gender_code"],
                            'id_citizenship' => $value["citizenship"],
                            'id_document_type' => $value["type_document"],
                            'series_and_document_number' => str_replace(' ','',$value["series_numbers_document"]),
                            'email_feedback' => $email_feedback,
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
                // "count_done" => $count_done,
                // "request_array" => count($request_array),
                "array_values_req" => $array_values_req,
                "route" => route('payment_tickets__page'),
                // "flight_order_info__id_start" => session("flight_order_info")["id_flight_start"]
            ],200)->header('Content-Type', 'application/json');
        }
    }

    public function returnViewPaymentTickets()
    {
        // return view('payment_tickets');
        if (!empty(session("passenger_info")) && !empty(session("new_passenger_ids")) && !empty(session("cost_tickets__all_passenger"))) {
            return view('payment_tickets', [
                "cost_tickets" => session("cost_tickets__all_passenger"),
                "new_passenger_ids" => session("new_passenger_ids")
            ]);
        }
        else{
            return redirect()->route('index__page');
        }
    }

    public function paymentTickets(Request $request)
    {
        $messages = [
            'name_on_card.required' => 'Поле "Имя указанное на карте" обязательно к заполнению',
            'name_on_card.string' => 'Поле "Имя указанное на карте" может принимать только буквенные символы',
            'name_on_card.regex' => 'Поле "Имя указанное на карте" может принимать только заглавные буквы',
            'card_number.required' => 'Поле "Номер карты" обязательно к заполнению',
            'card_number.regex' => 'Поле "Номер карты" должно содержать 16 цифр',
            'expity_date_card.required' => 'Поле "Истечение срока действия" обязательно к заполнению',
            'expity_date_card.regex' => 'В поле "Истечение срока действия" месяц должен быть не больше 12, а год не меньше 21',
            'security_code_card.required' => 'Поле "Секретный код" обязательно к заполнению',
            'security_code_card.regex' => 'В поле "Секретный код" должно быть 3 цифры',
        ];
        $rules = [
            "name_on_card" => [
                "required",
                "string",
                "regex:/^[A-Z]+$/"
            ],
            "card_number" => [
                "required",
                "string",
                "regex:/^[0-9]{4}\s[0-9]{4}\s[0-9]{4}\s[0-9]{4}$/"
            ],
            "expity_date_card" => [
                "required",
                "string",
                "regex:/^[0-1]{1}[0-9]{1}\/[2]{1}[1-9]{1}$/"
            ],
            "security_code_card" => [
                "required",
                "string",
                "regex:/^[0-9]{3}$/"
            ],
        ];
        $validationFields = Validator::make($request->only(['name_on_card','card_number','expity_date_card','security_code_card']),$rules,$messages);
        if ($validationFields->fails()) {
            $response = [
                "status" => false,
                "errors_fields" => $validationFields->errors()
            ];
            return json_encode($response);
        }

        $new_passenger_ids = session("new_passenger_ids");
        $id_booking_status_payment = DB::table('booking_statuses')->select('id')->where('name_status','Оплачено')->get();
        $id_booking_status_pay = $id_booking_status_payment[0]->id;

        foreach ($new_passenger_ids as $new_passenger_ids_item) {
            $id_booking_passenger = Passenger::select('id_booking')->where('id',$new_passenger_ids_item)->get();

            Booking::where('id',$id_booking_passenger[0]->id_booking)->update([
                'id_booking_status' => $id_booking_status_pay,
                "updated_at" => Carbon::now()
            ]);

            $flight_arr = [];
            $booking = Booking::orWhere([
                ["id",$id_booking_passenger[0]->id_booking]
            ]);
            if ($booking->get()!=null) {
                $count_pass = count($new_passenger_ids);
                
                
                foreach ($booking->get() as $key => $value) {
                    // $count_pass++;
                    $id_flight_from = $value["id_flight_from"];
                    $id_flight_back = $value["id_flight_back"];
                    $airport_flight_from_start = null;
                    $airport_flight_from_end = null;
                    $airport_flight_back_start = null;
                    $airport_flight_back_end = null;

                    $booking_id = $value["id_booking_status"];
                    $booking_status = DB::table('booking_statuses')->select('name_status')->where('id',$booking_id)->first();
                    
                    
                    if ($id_flight_from != null) {
                        $flight_from = Flight::select('id','flight_code','time_start','time_end','cost','date_start','date_end','id_airport_start','id_airport_end')->where('id',$id_flight_from)->first();
                        $airport_flight_from_start = Airport::select('id','iata_code','city_rus','city_eng')->where('id',$flight_from['id_airport_start'])->first();
                        $airport_flight_from_end = Airport::select('id','iata_code','city_rus','city_eng')->where('id',$flight_from['id_airport_end'])->first();
    
                        $flight_arr['flight_info_' . $key]['flight_from'] = $flight_from;
                        $flight_arr['flight_info_' . $key]['flight_from']["airport_flight_from_start"] = $airport_flight_from_start;
                        $flight_arr['flight_info_' . $key]['flight_from']["airport_flight_from_end"] = $airport_flight_from_end;
                        // $all_cost += $flight_from["cost"];
                    }
                    if ($id_flight_back != null) {
                        $flight_back = Flight::select('id','flight_code','time_start','time_end','cost','date_start','date_end','id_airport_start','id_airport_end')->where('id',$id_flight_back)->first();
                        $airport_flight_back_start = Airport::select('id','iata_code','city_rus','city_eng')->where('id',$flight_back['id_airport_start'])->first();
                        $airport_flight_back_end = Airport::select('id','iata_code','city_rus','city_eng')->where('id',$flight_back['id_airport_end'])->first();
    
                        $flight_arr['flight_info_' . $key]['flight_back'] = $flight_back;
                        $flight_arr['flight_info_' . $key]['flight_back']["airport_flight_back_start"] = $airport_flight_back_start;
                        $flight_arr['flight_info_' . $key]['flight_back']["airport_flight_back_end"] = $airport_flight_back_end;
                        // $all_cost += $flight_back["cost"];
                    }
                }
                $flight_arr['count_pass'] = $count_pass;
                $flight_arr['all_cost'] = session("cost_tickets__all_passenger");
            }
            // echo $id_booking_passenger;
        }
        $mailController = new MailController();
        $mailController->sendMailAfterPaymentFlight($flight_arr,"email");

        Session::forget('flight_order_info');
        Session::forget('new_passenger_ids');
        Session::forget('cost_tickets__all_passenger');
        Session::forget('passenger_info');

        // return $flight_arr;
        $response = [
            "status" => true,
            "message" => "Оплата успешно произведена",
            "flights" => $flight_arr
        ];
        return $response;

    }

    public function registerFlight(Request $request)
    {
        $validationFields = Validator::make($request->only(['last_name','number_ticket_booking']),[
            "last_name" => [
                "required",
                "string"
            ],
            "number_flight" => [
                "string",
            ],
            "series_number_document" => [
                "string"
            ],
        ]);
        if ($validationFields->fails()) {
            // return $request["series_number_document"];
            return $validationFields->errors();
            return redirect()->route('index__page')->withErrors([
                'errors' => "Проверьте свои данные"
            ]);
        }

        $ticket = Passenger::where([
            // ['ticket_code',$request["number_ticket_booking"]],
            ['last_name',$request["last_name"]],
            ['series_and_document_number',str_replace(' ','',$request["series_number_document"])],
            ])->first();
        if ($ticket != null) {
            // $email_passneger = $ticket["email_feedback"];
            $email_passneger = 'dima.site@gmail.com';
            $id_booking = $ticket["id_booking"];
            $booking = Booking::where([
                ['id',$id_booking],
                ['id_booking_status',2]
            ])->first();
            if ($booking != null) {
                $id_flight_from = $booking["id_flight_from"];
                $id_flight_back = $booking["id_flight_back"];
                $flight_arr = [];
                $airport_flight_from_start = null;
                $airport_flight_from_end = null;
                if ($id_flight_from != null) {
                    $flight_from = Flight::where('id',$id_flight_from)->first();
                    $airport_flight_from_start = Airport::where('id',$flight_from['id_airport_start'])->first();
                    $airport_flight_from_end = Airport::where('id',$flight_from['id_airport_end'])->first();

                    $flight_arr["flight_from"]=$flight_from;
                    $flight_arr["airport_flight_from_start"]=$airport_flight_from_start;
                    $flight_arr["airport_flight_from_end"]=$airport_flight_from_end;
                }
                if ($id_flight_back != null) {
                    $flight_back = Flight::where('id',$id_flight_back)->first();
                    $airport_flight_back_start = Airport::where('id',$flight_back['id_airport_start'])->first();
                    $airport_flight_back_end = Airport::where('id',$flight_back['id_airport_end'])->first();

                    $flight_arr["flight_back"]=$flight_back;
                    $flight_arr["airport_flight_back_start"]=$airport_flight_back_start;
                    $flight_arr["airport_flight_back_end"]=$airport_flight_back_end;
                }

                Booking::where([
                    ['id',$id_booking]
                ])->update([
                    'id_booking_status'=>4,
                ]);
                $response_mail = [
                    "flights" => $flight_arr,
                    "ticket_code" => $ticket["ticket_code"]
                ];
                // return $response_mail;
                $mailController = new MailController();
                $mailController->sendMailAfterRegistrationFlight($response_mail,$email_passneger);
                return redirect()->route('index__page');
            }
            return redirect()->route('index__page')->withErrors([
                "errors" => "Данный билет уже зарегистрирован"
            ]);
        }
        return redirect()->route('index__page')->withErrors([
            "errors" => "Пассажира с такой фамилией и билетом не существует"
        ]);
    }
}
