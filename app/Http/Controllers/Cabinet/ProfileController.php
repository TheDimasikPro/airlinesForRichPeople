<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Countrie;
use App\Models\DocumentType;
use App\Models\Flight;
use App\Models\GenderCode;
use App\Models\Passenger;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user_gender_code_name = GenderCode::where([
                ['id', Auth::user()->id_gender_code]
            ])->first();
            $user_document_type = DocumentType::where([
                ['id',Auth::user()->id_document_type]
            ])->first();
            $user_country_of_issue = Countrie::where([
                ['id',Auth::user()->id_country_of_issue]
            ])->first();

            // $countries_all = DB::table('countries')->pluck('');
            $countries_all = DB::table('countries')->select('id','name_country')->get()->sortBy('id');
            $document_types_all = DB::table('document_types')->select('id','name_document','mask_input')->get()->sortBy('id');
            $gender_codes_all = DB::table('gender_codes')->select('id','gender_name_rus')->get()->sortBy('id');


            $passenger_bookings = Passenger::select('id_booking')->where([
                // ['series_and_document_number',Auth::user()->series_and_document_number]
                ['series_and_document_number',"6516346972"]
            ])->get();



            // $travel_for_the_year = Flight::with(['bookings_from' => function ($query)
            // {
                // $query->with(['passengers' => function ($query_passengers)
                // {
            //     //     $query_passengers->where([
            //     //         ['series_and_document_number',Auth::user()->series_and_document_number]
            //     //     ])->select('id_booking','series_and_document_number');
            //     // }]);
            //     // echo $query->get() . "ccccccccccc";
            // }])->with(['bookings_back' => function ($query)
            // {
            //     // $query->with(['passengers' => function ($query_passengers)
            //     // {
            //     //     $query_passengers->where([
            //     //         ['series_and_document_number',Auth::user()->series_and_document_number]
            //     //     ])->select('id_booking','series_and_document_number');
            //     // }]);
            //     // echo $query->get() . "fffffffffffff";
            // }])->whereBetween(
            //     'date_start', [Carbon::now()->subYear()->format('Y-m-d'),Carbon::now()->format('Y-m-d')]
            // )->with('airport_start')->with('airport_end')->
            // get();


            $response = [
                "flights" => [
                    "flights_item" => [
                        "flight_code" => "U234FD",
                        "booking_code" => "11111D",
                        "flight_info" => [
                            "name_city_from" => "Екатеринбург",
                            "name_city_to" => "Москва",
                            "code_airport_from" => "SVX",
                            "code_airport_back" => "DME",
                            "time_start" => "18:40",
                            "time_end" => "20:10",
                            "date_start" => "21-10-2021",
                            "date_end" => "21-10-2021"
                        ],
                        "status_flight" => "Прошедший", // это статус booking
                        "price_flight" => "6200"
                    ]
                ]
            ];

            $response_page = [];
            $response_page_item = [];
            $passenger_bookings = Passenger::select('id_booking')->where([
                ['series_and_document_number',Auth::user()->series_and_document_number]
            ])->get();
            if (count($passenger_bookings) >0) {
                // $passenger_bookings__arr = []; // массив с id booking пользователя
                // foreach ($passenger_bookings as $id_booking) {
                //     array_push($passenger_bookings__arr,$id_booking["id_booking"]);
                // }

                // $flights_value_passenger = Flight::query();
                // foreach ($passenger_bookings__arr as $passenger_bookings__arr_item) {
                //     // echo $passenger_bookings__arr_item;
                //     $flights_value_passenger->with(['bookings_from' => function ($query) use($passenger_bookings__arr_item)
                //     {
                //         $query->orWhere('id',$passenger_bookings__arr_item);
                //     }])->with(['airport_start' => function ($query)
                //     {
                //         // $query->orWhere('id',$passenger_bookings__arr_item);
                //     }]);
                // }
                // $booking_value__passenger = Booking::query(); // данные о booking пользователя
                // foreach ($passenger_bookings__arr as $passenger_bookings__arr_item) {
                //     // echo $passenger_bookings__arr_item , ';';
                //     $booking_value__passenger->with(['flights_from' => function ($query)
                //     {
                //         $query->select('id');
                //     }])->with(['flights_back' => function ($query)
                //     {
                //         $query->select('id');
                //     }])->orWhere('id',$passenger_bookings__arr_item);
                //     array_push($response_page_item,$id_booking["booking_code"]);
                // }

                // $flights_passenger = Flight::query();
                // foreach ($   ->get() as $booking_value__passenger__item) {
                //     // echo $booking_value__passenger__item["id_flight_from"];
                //     $flights_passenger->orWhere([
                //         ['id',$booking_value__passenger__item["id_flight_from"]]
                //     ]);
                //     // if (!empty($booking_value__passenger__item["id_flight_back"])) {
                //     //     $flights_passenger->orWhere([
                //     //         ['id',$booking_value__passenger__item["id_flight_back"]]
                //     //     ]);
                //     // }
                // }
                // return $flights_value_passenger->get();
            }
            $travel__array = [];
            // foreach ($travel_for_the_year as $key => $value) {
            //     foreach ($value["bookings_from"] as $key => $bookings_from_item) {
            //         if (count($bookings_from_item["passengers"]) > 0) {
            //             // echo $bookings_from_item["passengers"] . "\n";
            //             // echo $bookings_from_item;
            //             // echo $value["airport_end"];
            //             // echo $value["airport_start"];
            //             // echo array_slice($bookings_from_item, -1)[0] . "\n";
            //             // array_push($travel__array,$value);
            //         }
            //     }
            //     foreach ($value["bookings_back"] as $key => $bookings_back_item) {
            //         if (count($bookings_back_item["passengers"]) > 0) {
            //             // echo $value["airport_end"];
            //             // echo $bookings_back_item;
            //             // echo $bookings_back_item["passengers"];
            //             // array_push($travel__array,$value);
            //         }
            //     }
            // }
            // return $travel_for_the_year;
            // return "нету";

            // $travel_for_the_year = Booking::with('passengers')->get();
            // $travel_for_the_year_in_profile_page = [];
            // foreach ($travel_for_the_year as $travel_for_the_year__item) {
            //     if(count($travel_for_the_year__item["passengers"]) > 0){
            //         array_push($travel_for_the_year_in_profile_page,$travel_for_the_year__item);
            //     }
            // }   
            
            // return $travel_for_the_year_in_profile_page;
            // return Auth::user()->series_and_document_number;
            if (!empty($user_gender_code_name) && !empty($user_document_type) && !empty($user_country_of_issue) 
            && !empty($countries_all) && !empty($document_types_all) && !empty($gender_codes_all) ) {
                $response = [
                    'full_name' =>Auth::user()->full_name,
                    'email' =>Auth::user()->email,
                    'phone' =>Auth::user()->phone,
                    'date_of_birthday' => Auth::user()->date_of_birthday,
                    'city_of_residence' => Auth::user()->city_of_residence,
                    'id_gender_code' => Auth::user()->id_gender_code,
                    'id_document_type' => Auth::user()->id_document_type,
                    'series_and_document_number' => Auth::user()->series_and_document_number,
                    'id_country_of_issue' => Auth::user()->id_country_of_issue,
                    'id_role' => Auth::user()->id_role,
                    'user_gender_code_name' => $user_gender_code_name->gender_name_rus,
                    'user_document_type' => $user_document_type->name_document,
                    'user_country_of_issue' => $user_country_of_issue->name_country,
                    'countries_all' => $countries_all,
                    'document_types_all' => $document_types_all,
                    'gender_codes_all' => $gender_codes_all,
                    // 'travel_for_the_year' => $travel_for_the_year_in_profile_page
                ];
                return view('Cabinet.my_profile',["auth_user" => $response]);
            }
            
        }
    }

    public function updatePersonalData(Request $request)
    {
        $validationfields = Validator::make($request->only(["full_name","email","phone","date_birthday",
        "gender_code_id","city","type_document_id","series_numbers_document","country_of_issue_id"]),[
            "full_name" => [
                "required",
                "string"
            ],
            "email" => [
                "required",
                "email"
            ],
            "phone" => [
                "required",
                "string"
            ],
            "date_birthday" => [
                "required",
                "date"
            ],
            "gender_code_id" => [
                "required",
                "integer"
            ],
            "city" => [
                "required",
                "string"
            ],
            "type_document_id" => [
                "required",
                "integer"
            ],
            "series_numbers_document" => [
                "required",
                "string"
            ],
            "country_of_issue_id" => [
                "required",
                "integer"
            ]
        ]);
        if ($validationfields->fails()) {
            $response = [
                "status" => false,
                "error_message" => "Проверьте правильность написания ваших данных"
            ];
            return json_encode($response);
        }


        $user_id = Auth::user()->id;
        $user = User::where([['id', $user_id]])->update([
            'full_name' => $request["full_name"],
            'email' => $request["email"],
            'phone' => $request["phone"],
            'date_of_birthday' => $request["date_birthday"],
            'id_gender_code' => $request["gender_code_id"],
            'city_of_residence' => $request["city"],
            'id_document_type' => $request["type_document_id"],
            'series_and_document_number' => $request["series_numbers_document"],
            'id_country_of_issue' => $request["country_of_issue_id"]
        ]);
        
        if ($user) {
            $response = [
                "status" => true,
                "message" => "Ваши данные успешно обновлены"
            ];
            return json_encode($response);
        }
        $response = [
            "status" => false,
            "error_message" => "Возникла непредвиденная ошибка, повторите процедуру позже"
        ];
        return json_encode($response);
    }
}
