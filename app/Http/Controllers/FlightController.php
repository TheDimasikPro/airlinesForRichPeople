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
use Illuminate\Pagination\LengthAwarePaginator;
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
            session(["email_feedback" => $email_feedback]);
            return response()->json([
                "status" => true,
                "array_values_req" => $array_values_req,
                "route" => route('payment_tickets__page'),
            ],200)->header('Content-Type', 'application/json');
        }
    }

    public function returnViewPaymentTickets()
    {
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
        $flight_arr = [];
        $codes = '';
        $flight_from_back_ids = [];
        
        foreach ($new_passenger_ids as $new_passenger_ids_item) {
            $id_booking_passenger = Passenger::select('id_booking')->where('id',$new_passenger_ids_item)->get();
            Booking::where('id',$id_booking_passenger[0]->id_booking)->update([
                'id_booking_status' => $id_booking_status_pay,
                "updated_at" => Carbon::now()
            ]);
            $booking = Booking::orWhere([
                ["id",$id_booking_passenger[0]->id_booking]
            ]);
            if ($booking->get()!=null) {
                $count_pass = count($new_passenger_ids);
                foreach ($booking->get() as $key => $value) {
                    $codes .= $value["booking_code"] . ' ';
                    $flight_ids = [];
                    array_push($flight_ids,$value["id_flight_from"]); 
                    array_push($flight_ids,$value["id_flight_back"]);
                    array_push($flight_from_back_ids,$flight_ids);
                }
            }
        }

        foreach ($flight_from_back_ids as $key => $flight_from_back_ids__item) {
            $id_flight_from = $flight_from_back_ids__item[0];
            $airport_flight_from_start = null;
            $airport_flight_from_end = null;
            $flight_arr[$key]['booking_codes'] = explode(' ',$codes);
            if ($id_flight_from != null) {
                $flight_from = Flight::select('id','flight_code','time_start','time_end','cost','date_start','date_end','id_airport_start','id_airport_end')->where('id',$id_flight_from)->first();
                $airport_flight_from_start = Airport::select('id','iata_code','city_rus','city_eng')->where('id',$flight_from['id_airport_start'])->first();
                $airport_flight_from_end = Airport::select('id','iata_code','city_rus','city_eng')->where('id',$flight_from['id_airport_end'])->first();

                $flight_arr[$key]['flight_from'] = $flight_from;
                $flight_arr[$key]["airport_flight_from_start"] = $airport_flight_from_start;
                $flight_arr[$key]["airport_flight_from_end"] = $airport_flight_from_end;
            }
        }
        $flight_arr['count_pass'] = $count_pass;
        $flight_arr['all_cost'] = session("cost_tickets__all_passenger");
        $mailController = new MailController();
        $mailController->sendMailAfterPaymentFlight($flight_arr,session("email_feedback"));

        Session::forget('flight_order_info');
        Session::forget('new_passenger_ids');
        Session::forget('cost_tickets__all_passenger');
        Session::forget('passenger_info');

        $response = [
            "status" => true,
            "message" => "Оплата успешно произведена",
            "flights" => $flight_arr
        ];
        return $response;

    }

    public function registerFlight(Request $request)
    {
        $validationFields = Validator::make($request->only(['last_name','number_booking','series_number_document']),[
            "last_name" => [
                "required",
                "string"
            ],
            "number_booking" => [
                "string",
                "required"
            ],
            "series_number_document" => [
                "string",
                "required"
            ],
        ]);
        if ($validationFields->fails()) {
            return redirect()->route('index__page')->withErrors([
                'errors' => "Проверьте свои данные"
            ]);
        }


        $booking = Booking::where([
            ['booking_code',$request['number_booking']],
            ['id_booking_status',2]
        ])->first();

        if ($booking != null) {
            $id_booking = $booking["id"];
            $passenger = Passenger::where([
                ['id_booking',$id_booking],
                ['last_name',$request["last_name"]],
                ['series_and_document_number',str_replace(' ','',$request["series_number_document"])],
            ])->first();
            if ($passenger != null) {
                $email_passneger = $passenger["email_feedback"];
                $full_name = $passenger["last_name"] . ' ' .  $passenger["first_name"] . ' ' .  $passenger["other_name"];

                $id_flight_from = $booking["id_flight_from"];
                $id_flight_back = $booking["id_flight_back"];
                $flight_arr = [];
                $airport_flight_from_start = null;
                $airport_flight_from_end = null;
                if ($id_flight_from != null) {
                    $flight_from = Flight::where([
                        ['id',$id_flight_from],
                        // ['flight_code',$request["number_flight"]]
                    ])->first();
                    if ($flight_from != null) {
                        $airport_flight_from_start = Airport::where('id',$flight_from['id_airport_start'])->first();
                        $airport_flight_from_end = Airport::where('id',$flight_from['id_airport_end'])->first();
    
                        $flight_arr["flight_from"]=$flight_from;
                        $flight_arr["airport_flight_from_start"] = $airport_flight_from_start;
                        $flight_arr["airport_flight_from_end"] = $airport_flight_from_end;
                    }
                   
                }
                if ($id_flight_back != null) {
                    $flight_back = Flight::where([
                        ['id',$id_flight_back],
                        // ['flight_cde',$request["number_flight"]]
                    ])->first();
                    if ($flight_back != null) {
                        $airport_flight_back_start = Airport::where('id',$flight_back['id_airport_start'])->first();
                        $airport_flight_back_end = Airport::where('id',$flight_back['id_airport_end'])->first();

                        $flight_arr["flight_back"]=$flight_back;
                        $flight_arr["airport_flight_back_start"] = $airport_flight_back_start;
                        $flight_arr["airport_flight_back_end"] = $airport_flight_back_end;
                    }
                }
                if ($flight_arr == []) {
                    return redirect()->route('index__page')->withErrors([
                        // "errors" => "Пассажира с такими данными в рейсе с таким номером не существует00000"
                        "errors" => $booking
                    ]);
                }
                Booking::where([
                    ['id',$id_booking]
                ])->update([
                    'id_booking_status'=>4,
                ]);
                $response_mail = [
                    "flights" => $flight_arr,
                    "ticket_code" => $passenger["ticket_code"],
                                
                ];
                // return $response_mail;
                $mailController = new MailController();
                $mailController->sendMailAfterRegistrationFlight($response_mail,$email_passneger,$full_name);
                return redirect()->route('index__page');
            }
            return redirect()->route('index__page')->withErrors([
                "errors" => "Пассажира с такой фамилией и документом не существует"
            ]);
        }
        return redirect()->route('index__page')->withErrors([
            "errors" => "Пассажира с таким номером брони не существует"
        ]);
    }

    public function returnViewOperatorWelcome()
    {
        return view('Operator.operator_welcome');
    }

    public function returnViewEditFutureFlight()
    {
        $flight_arr = [];
        $date_now = Carbon::now()->format('Y-m-d');
        $date_add_3month = Carbon::now()->addMonths(3)->format('Y-m-d');
        $booking_ids_arr = [];
        $flights_ids = Flight::select('id','date_start')->orderBy('date_start');
        if ($flights_ids->get()!=null) {
            foreach ($flights_ids->get() as $key => $value) {
                if (!in_array($value["id"],$booking_ids_arr)) {
                    array_push($booking_ids_arr,$value["id"]);
                    $id_flight_from = $value["id"];
                    $airport_flight_from_start = null;
                    $airport_flight_from_end = null;
                    if ($id_flight_from != null) {
                        
                        $flight_from = Flight::select('id','flight_code','time_start','time_end','travel_time','cost','date_start','date_end','id_airport_start','id_airport_end')
                        ->where([
                            ['id',$id_flight_from]
                        ])->whereBetween('date_start',[$date_now,$date_add_3month])->first();
                        
                        if ($flight_from != null) {
                            $airport_flight_from_start = Airport::select('id','iata_code','city_rus','city_eng')->where('id',$flight_from['id_airport_start'])->first();
                            $airport_flight_from_end = Airport::select('id','iata_code','city_rus','city_eng')->where('id',$flight_from['id_airport_end'])->first();
                            $flight_arr[$key]['flight'] = $flight_from;
                            $flight_arr[$key]["airport_flight_start"] = $airport_flight_from_start;
                            $flight_arr[$key]["airport_flight_end"] = $airport_flight_from_end;
                            // $flight_arr[$key]["booking_status"] = $booking_status;
                        }
                    }
                }
                
            }
        }
        $airport_data = DB::table('airports')->select('id','iata_code','name_eng','desc_airport_eng')->limit(50)->get();


        // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        // Create a new Laravel collection from the array data
        $itemCollection = collect($flight_arr);

        // Define how many items we want to be visible in each page
        $perPage = 8;

        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();

        // Create our paginator and pass it to the view
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);

        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $url = $url[0];
        $path_page = $url;
        // set url path for generted links
        $paginatedItems->setPath($path_page);

        $response = [
            "status" => "future",
            "airport_data" => $airport_data,
            "flight_arr" => $paginatedItems
        ];

        return view('Operator.flights',['operator' => array_reverse($response)] );
    }

    public function validateFutureFlight(Request $request)
    {
        
    }

    public function sendEditFutureFlight(Request $request)
    {
        
        $id_airport_start = $request["id_airport_start"];
        $id_airport_end = $request["id_airport_end"];
        $date_start = $request["date_start"];
        $date_end = $request["date_end"];
        $time_start = $request["time_start"];
        $time_end = $request["time_end"];

        $datetime1 = date_create($date_start);
        $datetime2 = date_create($date_end);
        $interval = date_diff($datetime1, $datetime2);
        
        $interval_day = $interval->format('%d');
        $time1 = strtotime('2021-01-01 ' . $time_end); // это время "сейчас" (как целое число)
        $time2 = strtotime('2021-01-01 ' . $time_start); // а это время в недавнем прошлом
        
        $diff = $time1 - $time2; // разница в секундах
        $travel_time = gmdate('H:i:s', $diff); //

        $this->validateFutureFlight($request);
        $flight_code = "RA_" . Str::random(4);
        $cost = rand(3000,5000);
        $rules = [
            'id_airport_start' => [
                'required',
                'integer'
            ],
            'id_airport_end' => [
                'required',
                'integer'
            ],
            'date_start' => [
                'date',
                'required',
                "date_format:Y-m-d"
            ],
            'date_end' => [
                'date',
                'required',
                "date_format:Y-m-d"
            ],
            'time_start' => [
                'required',
                'regex:/^(0[0-9]|1[0-9]|2[0-3]|[0-9]):[0-5][0-9]$/'
            ],
            'time_end' => [
                'required',
                'regex:/^(0[0-9]|1[0-9]|2[0-3]|[0-9]):[0-5][0-9]$/'
            ]
        ];
        $messages = [
            'id_airport_start.required' => 'Поле "Аэропорт старта" не выбрано',
            'id_airport_start.integer' => 'Поле "Аэропорт старта" не выбрано',
            'id_airport_end.required' => 'Поле "Аэропорт прибытия" не выбрано',
            'id_airport_end.integer' => 'Поле "Аэропорт прибытия" не выбрано',
            'date_start.required' => 'Поле "Дата старта" не выбрано',
            'date_start.date' => 'Поле "Дата старта" имеет не тот формат',
            'date_start.date_format' => 'Поле "Дата старта" имеет не тот формат',
            'date_end.required' => 'Поле "Дата прибытия" не выбрано',
            'date_end.date' => 'Поле "Дата прибытия" имеет не тот формат',
            'date_end.date_format' => 'Поле "Дата прибытия" имеет не тот формат',
            'time_start.required' => 'Поле "Время взлета" не выбрано',
            'time_start.regex' => 'Поле "Время взлета" имеет не тот формат',
            'time_end.required' => 'Поле "Время прибытия" не выбрано',
            'time_end.regex' => 'Поле "Время прибытия" имеет не тот формат'
        ];
        $validationFields = Validator::make($request->all(),$rules,$messages);
        if ($validationFields->fails()) {
            $response = [
                'status' => false,
                'type_error' => 1,
                'errors_fields' => $validationFields->errors()
            ];
            return json_encode($response);
        }
        
        $id_airport_start = $request["id_airport_start"];
        $id_airport_end = $request["id_airport_end"];
        $date_start = $request["date_start"];
        $date_end = $request["date_end"];
        $time_start = $request["time_start"];
        $time_end = $request["time_end"];

        if ($date_start < Carbon::now()->format('Y-m-d')) {
            $response = [
                'status' => false,
                'type_error' => 2,
                'error_message' => "Дата старта не может меньше сегодняшней"
            ];
            return json_encode($response);
        }
        if ($date_start > $date_end) {
            $response = [
                'status' => false,
                'type_error' => 2,
                'error_message' => "Дата старта не может быть больше даты прибытия"
            ];
            return json_encode($response);
        }
        if ($id_airport_start == $id_airport_end) {
            $response = [
                'status' => false,
                'type_error' => 2,
                'error_message' => "Аэропорт старта не может быть равен аэропорту прибытия"
            ];
            return json_encode($response);
        }

        if ($date_start == $date_end) {
            if ($time_start == $time_end) {
                $response = [
                    'status' => false,
                    'type_error' => 2,
                    'error_message' => "В одинаковые дни взлета и прибытия время должно различаться"
                ];
                return json_encode($response);
            }
            if($time_start < $time_end){
                $response = [
                    'status' => false,
                    'type_error' => 2,
                    'error_message' => "В одинаковые дни взлета и прибытия время старта должно быть меньше времени прибытия"
                ];
                return json_encode($response);
            }
        }

        $datetime1 = date_create($date_start);
        $datetime2 = date_create($date_end);
        $interval = date_diff($datetime1, $datetime2);
        
        $interval_day = $interval->format('%d');
        $interval_month = $interval->format('%m');
        if ($interval_day > 1) {
            $response = [
                'status' => false,
                'type_error' => 2,
                'error_message' => "Нельзя добавить рейс, где полет идет больше 24 часов"
            ];
            return json_encode($response);
        }

        $time1 = strtotime('2021-01-01 ' . $time_end); // это время "сейчас" (как целое число)
        $time2 = strtotime('2021-01-01 ' . $time_start); // а это время в недавнем прошлом
        
        $diff = $time1 - $time2; // разница в секундах
        $travel_time = gmdate('H:i:s', $diff); //
        $travel_time_in_page = gmdate('H:i', $diff); //

        $check_flight = Flight::where([
            "id_airport_start" => $id_airport_start,
            "id_airport_end" =>  $id_airport_end,
            "time_start" => $time_start,
            "time_end" => $time_end,
            "date_start" => $date_start,
            "date_end" => $date_end,
            "travel_time" => $travel_time,
            "number_of_seats" => 50,
            "number_of_free_seats" => 50,
        ])->count();

        $date_start_page = date('d-m-Y', strtotime($date_start));
        $date_end_page = date('d-m-Y', strtotime($date_end));
        if ($check_flight > 4) {
            $response = [
                'status' => false,
                'type_error' => 2,
                'error_message' => "Рейсов с такими данными уже больше 4...слишком много"
            ];
            return json_encode($response);
        }
        $id_new_flight = Flight::insertGetId([
            "flight_code" => $flight_code,
            "id_airport_start" => $id_airport_start,
            "id_airport_end" =>  $id_airport_end,
            "time_start" => $time_start,
            "time_end" => $time_end,
            "date_start" => $date_start,
            "date_end" => $date_end,
            "cost" => $cost,
            "travel_time" => $travel_time,
            "number_of_seats" => 50,
            "number_of_free_seats" => 50,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        $airport_start = Airport::where('id',$id_airport_start)->get();
        $airport_end = Airport::where('id',$id_airport_end)->get();
        $response = [
            'status' => true,
            'flight_code' => $flight_code,
            'airport_start__city_name' => $airport_start[0]["city_eng"],
            'airport_end__city_name' => $airport_end[0]["city_eng"],
            'airport_start__iata_code' => $airport_start[0]["iata_code"],
            'airport_end__iata_code' => $airport_end[0]["iata_code"],
            "time_start" => $time_start,
            "time_end" => $time_end,
            "date_start" => $date_start_page,
            "date_end" => $date_end_page,
            "travel_time" => $travel_time_in_page,
            "cost" => $cost,
            "temporary_id" => 'new_' . Str::random(3)
        ];
        return json_encode($response);
    }

    public function deleteEditFutureFlight(Request $request)
    {
        $rules = [
            'flight_code_delete' => [
                "required",
                "string"
            ]
        ];

        $messages = [
            'flight_code_delete.required' => "Возникла ошибка - элемент удаления не выбран",
            'flight_code_delete.string' => "Код рейса должен иметь строковый тип данных"
        ];
        $validationFields = Validator::make($request->only('flight_code_delete'),$rules,$messages);

        if ($validationFields->fails()) {
            $response = [
                'status' => false,
                'error_message' => 'Возникла ошибка - элемент удаления не выбран или у кода рейса неверынй тип данных'
            ];

            return json_encode($response);
        }

        $check_flight = Flight::where('flight_code',$request["flight_code_delete"])->first();
        if (!empty($check_flight) && $check_flight && $check_flight != null) {

            $check_flight_id = $check_flight["id"];
            $deletedRows = Flight::destroy($check_flight_id);
            if ($deletedRows) {
                $response = [
                    "status" => true,
                    'id' => $check_flight_id
                ];
                return json_encode($response);
            }
            $response = [
                'status' => false,
                'error_message' => 'Ошибка удаления строки из базы данных.'
            ];
    
            return json_encode($response);
        }

        $response = [
            'status' => false,
            'error_message' => 'Рейса с кодом ' . $request["flight_code_delete"] . ' не существует.'
        ];

        return json_encode($response);
        

        
    }

    public function updateEditFutureFlight(Request $request)
    {
        $id_airport_start = $request["id_airport_start"];
        $id_airport_end = $request["id_airport_end"];
        $date_start = $request["date_start"];
        $date_end = $request["date_end"];
        $time_start = $request["time_start"];
        $time_end = $request["time_end"];

        $datetime1 = date_create($date_start);
        $datetime2 = date_create($date_end);
        $interval = date_diff($datetime1, $datetime2);
        
        $interval_day = $interval->format('%d');
        $time1 = strtotime('2021-01-01 ' . $time_end); // это время "сейчас" (как целое число)
        $time2 = strtotime('2021-01-01 ' . $time_start); // а это время в недавнем прошлом
        
        $diff = $time1 - $time2; // разница в секундах
        $travel_time = gmdate('H:i:s', $diff); //
        $cost = rand(3000,5000);
        $rules = [
            'id_airport_start' => [
                'required',
                'integer'
            ],
            'id_airport_end' => [
                'required',
                'integer'
            ],
            'date_start' => [
                'date',
                'required',
                "date_format:Y-m-d"
            ],
            'date_end' => [
                'date',
                'required',
                "date_format:Y-m-d"
            ],
            'time_start' => [
                'required',
                'regex:/^(0[0-9]|1[0-9]|2[0-3]|[0-9]):[0-5][0-9]$/'
            ],
            'time_end' => [
                'required',
                'regex:/^(0[0-9]|1[0-9]|2[0-3]|[0-9]):[0-5][0-9]$/'
            ]
        ];
        $messages = [
            'id_airport_start.required' => 'Поле "Аэропорт старта" не выбрано',
            'id_airport_start.integer' => 'Поле "Аэропорт старта" не выбрано',
            'id_airport_end.required' => 'Поле "Аэропорт прибытия" не выбрано',
            'id_airport_end.integer' => 'Поле "Аэропорт прибытия" не выбрано',
            'date_start.required' => 'Поле "Дата старта" не выбрано',
            'date_start.date' => 'Поле "Дата старта" имеет не тот формат',
            'date_start.date_format' => 'Поле "Дата старта" имеет не тот формат',
            'date_end.required' => 'Поле "Дата прибытия" не выбрано',
            'date_end.date' => 'Поле "Дата прибытия" имеет не тот формат',
            'date_end.date_format' => 'Поле "Дата прибытия" имеет не тот формат',
            'time_start.required' => 'Поле "Время взлета" не выбрано',
            'time_start.regex' => 'Поле "Время взлета" имеет не тот формат',
            'time_end.required' => 'Поле "Время прибытия" не выбрано',
            'time_end.regex' => 'Поле "Время прибытия" имеет не тот формат'
        ];
        $validationFields = Validator::make($request->all(),$rules,$messages);
        if ($validationFields->fails()) {
            $response = [
                'status' => false,
                'type_error' => 1,
                'errors_fields' => $validationFields->errors()
            ];
            return json_encode($response);
        }
        
        $id_airport_start = $request["id_airport_start"];
        $id_airport_end = $request["id_airport_end"];
        $date_start = $request["date_start"];
        $date_end = $request["date_end"];
        $time_start = $request["time_start"];
        $time_end = $request["time_end"];

        if ($date_start < Carbon::now()->format('Y-m-d')) {
            $response = [
                'status' => false,
                'type_error' => 2,
                'error_message' => "Дата старта не может меньше сегодняшней"
            ];
            return json_encode($response);
        }
        if ($date_start > $date_end) {
            $response = [
                'status' => false,
                'type_error' => 2,
                'error_message' => "Дата старта не может быть больше даты прибытия"
            ];
            return json_encode($response);
        }
        if ($id_airport_start == $id_airport_end) {
            $response = [
                'status' => false,
                'type_error' => 2,
                'error_message' => "Аэропорт старта не может быть равен аэропорту прибытия"
            ];
            return json_encode($response);
        }

        if ($date_start == $date_end) {
            if ($time_start == $time_end) {
                $response = [
                    'status' => false,
                    'type_error' => 2,
                    'error_message' => "В одинаковые дни взлета и прибытия время должно различаться"
                ];
                return json_encode($response);
            }
        }

        $datetime1 = date_create($date_start);
        $datetime2 = date_create($date_end);
        $interval = date_diff($datetime1, $datetime2);
        
        $interval_day = $interval->format('%d');
        $interval_month = $interval->format('%m');
        if ($interval_day > 1) {
            $response = [
                'status' => false,
                'type_error' => 2,
                'error_message' => "Нельзя добавить рейс, где полет идет больше 24 часов"
            ];
            return json_encode($response);
        }

        $time1 = strtotime('2021-01-01 ' . $time_end); // это время "сейчас" (как целое число)
        $time2 = strtotime('2021-01-01 ' . $time_start); // а это время в недавнем прошлом
        
        $diff = $time1 - $time2; // разница в секундах
        $travel_time = gmdate('H:i:s', $diff); //
        $travel_time_in_page = gmdate('H:i', $diff); //

        $date = '25/05/2010';
        $date_start_page = date('d-m-Y', strtotime($date_start));
        $date_end_page = date('d-m-Y', strtotime($date_end));


        $check_flight = Flight::where([
            "id_airport_start" => $id_airport_start,
            "id_airport_end" =>  $id_airport_end,
            "time_start" => $time_start,
            "time_end" => $time_end,
            "date_start" => $date_start,
            "date_end" => $date_end,
            "travel_time" => $travel_time,
            "number_of_seats" => 50,
            "number_of_free_seats" => 50,
        ])->count();

        
        if ($check_flight > 4) {
            $response = [
                'status' => false,
                'type_error' => 2,
                'error_message' => "Рейсов с такими данными уже больше 4...слишком много"
            ];
            return json_encode($response);
        }
        $flight_code = $request["flight_code"];
        Flight::where('flight_code',$flight_code)->update([
            "id_airport_start" => $id_airport_start,
            "id_airport_end" =>  $id_airport_end,
            "time_start" => $time_start,
            "time_end" => $time_end,
            "date_start" => $date_start,
            "date_end" => $date_end,
            "travel_time" => $travel_time,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        $airport_start = Airport::where('id',$id_airport_start)->get();
        $airport_end = Airport::where('id',$id_airport_end)->get();
        $response = [
            'status' => true,
            'flight_code' => $flight_code,
            'airport_start__city_name' => $airport_start[0]["city_eng"],
            'airport_end__city_name' => $airport_end[0]["city_eng"],
            'airport_start__iata_code' => $airport_start[0]["iata_code"],
            'airport_end__iata_code' => $airport_end[0]["iata_code"],
            "time_start" => $time_start,
            "time_end" => $time_end,
            "date_start" => $date_start_page,
            "date_end" => $date_end_page,
            "travel_time" => $travel_time_in_page,
            // "cost" => $cost,
            // "temporary_id" => 'new_' . Str::random(3)
        ];
        return json_encode($response);

    }

    public function returnViewEditOperatingFlight()
    {
        $flight_arr = [];
        $date_now = Carbon::now()->format('Y-m-d');
        $time_start = Carbon::now()->subHour(2)->format('H:i:s');
        $time_end = Carbon::now()->addHour(2)->format('H:i:s');
        $date_add_3month = Carbon::now()->addMonths(3)->format('Y-m-d');
        $booking_ids_arr = [];
        $flights_ids = Flight::select('id','date_start')->orderBy('date_start');
        if ($flights_ids->get()!=null) {
            foreach ($flights_ids->get() as $key => $value) {
                if (!in_array($value["id"],$booking_ids_arr)) {
                    array_push($booking_ids_arr,$value["id"]);
                    $id_flight_from = $value["id"];
                    $airport_flight_from_start = null;
                    $airport_flight_from_end = null;
                    if ($id_flight_from != null) {
                        
                        $flight_from = Flight::select('id','flight_code','time_start','time_end','travel_time','cost','date_start','date_end','id_airport_start','id_airport_end')
                        ->where([
                            ['id',$id_flight_from],
                            ['date_start', $date_now],
                            ['date_end', $date_now],
                            ['time_start', '<', $time_start],
                            ['time_end', '>', $time_end]
                        ])->first();
                        
                        if ($flight_from != null) {
                            $airport_flight_from_start = Airport::select('id','iata_code','city_rus','city_eng')->where('id',$flight_from['id_airport_start'])->first();
                            $airport_flight_from_end = Airport::select('id','iata_code','city_rus','city_eng')->where('id',$flight_from['id_airport_end'])->first();
                            $flight_arr[$key]['flight'] = $flight_from;
                            $flight_arr[$key]["airport_flight_start"] = $airport_flight_from_start;
                            $flight_arr[$key]["airport_flight_end"] = $airport_flight_from_end;
                            // $flight_arr[$key]["booking_status"] = $booking_status;
                        }
                    }
                }
                
            }
        }
        $airport_data = DB::table('airports')->select('id','iata_code','name_eng','desc_airport_eng')->limit(50)->get();


        // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        // Create a new Laravel collection from the array data
        $itemCollection = collect($flight_arr);

        // Define how many items we want to be visible in each page
        $perPage = 8;

        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();

        // Create our paginator and pass it to the view
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $url = $url[0];
        $path_page = $url;
        // set url path for generted links
        $paginatedItems->setPath($path_page);

        $response = [
            "status" => "future",
            "airport_data" => $airport_data,
            "flight_arr" => $paginatedItems
        ];

        return view('Operator.flights',['operator' => array_reverse($response)] );
    }
}