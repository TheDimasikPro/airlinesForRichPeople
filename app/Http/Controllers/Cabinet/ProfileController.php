<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\Airport;
use App\Models\Booking;
use App\Models\Countrie;
use App\Models\DocumentType;
use App\Models\Flight;
use App\Models\GenderCode;
use App\Models\Passenger;
use App\Models\User;
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

            // RA_MBK5 = 6
            $series_and_document_number = str_replace(' ','',Auth::user()->series_and_document_number);
            $booking_ids = Passenger::select('id_booking')->where([
                ['series_and_document_number',$series_and_document_number]
            ])->get();

            $booking_ids_array = []; // id всех бронь пассажиров с серией и номером $series_and_document_number
            foreach ($booking_ids as $booking_id) {
                array_push($booking_ids_array,$booking_id["id_booking"]);
            }

            $flight_arr = [];
            if (count($booking_ids_array) > 0) {
                $booking = Booking::query();
                foreach ($booking_ids_array as $value) {
                    $booking->orWhere([
                        ["id",$value]
                    ]);
                }
                if ($booking->get()!=null) {
                    foreach ($booking->get() as $key => $value) {
                        $id_flight_from = $value["id_flight_from"];
                        $airport_flight_from_start = null;
                        $airport_flight_from_end = null;

                        $booking_id = $value["id_booking_status"];
                        $booking_status = DB::table('booking_statuses')->select('name_status')->where('id',$booking_id)->first();
                        
                        if ($id_flight_from != null) {
                            $flight_from = Flight::select('id','flight_code','time_start','time_end','cost','date_start','date_end','id_airport_start','id_airport_end')->where('id',$id_flight_from)->first();
                            $airport_flight_from_start = Airport::select('id','iata_code','city_rus','city_eng')->where('id',$flight_from['id_airport_start'])->first();
                            $airport_flight_from_end = Airport::select('id','iata_code','city_rus','city_eng')->where('id',$flight_from['id_airport_end'])->first();
        
                            $flight_arr['flight_info_' . $key]['flight_from'] = $flight_from;
                            $flight_arr['flight_info_' . $key]["airport_flight_from_start"] = $airport_flight_from_start;
                            $flight_arr['flight_info_' . $key]["airport_flight_from_end"] = $airport_flight_from_end;
                            $flight_arr['flight_info_' . $key]["booking_status_from"] = $booking_status;
                        }
                    }
                }
            }
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
                    'flight_arr' => $flight_arr
                ];
                return view('Cabinet.my_profile',["auth_user" => $response]);
            }
            
        }
    }

    public function updatePersonalData(Request $request)
    {
        $messages = [
            'full_name.required' => 'Поле full_name обязательно к заполнению',
            'full_name.string' => 'Поле full_name может принимать только буквенные символы',
            'date_birthday.required' => 'Поле date_birthday обязательно к заполнению',
            'date_birthday.date' => 'Поле date_birthday может принимать только дату',
            'date_birthday.date_format' => 'Поле date_birthday может принимать только дату в формате Y-m-d',
            'gender_code_id.required' => 'Поле gender_code_id обязательно к заполнению',
            'gender_code_id.regex' => 'Поле gender_code_id может принимать только цифры от 1-9 в кол-ве один',
            'city_name.required' => 'Поле city_name обязательно к заполнению',
            'city_name.string' => 'Поле city_name может принимать только буквенные символы',
            'type_document_id.required' => 'Поле type_document_id обязательно к заполнению',
            'type_document_id.regex' => 'Поле type_document_id может принимать только цифры от 1-9 в кол-ве один',
            'series_numbers_document.required' => 'Поле series_numbers_document обязательно к заполнению',
            'country_of_issue_id.required' => 'Поле country_of_issue_id обязательно к заполнению',
            'country_of_issue_id.regex' => 'Поле country_of_issue_id может принимать только цифры от 1-9 в кол-ве один',
            "email.required" => "Поле email обязательно к заполнению",
            "email.email" => "Поле email должно быть опредленного формата",
            "phone.required" => "Поле phone обязательно к заполнению"
        ];

        $rules = [
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
                "date",
                "date_format:Y-m-d"
            ],
            "gender_code_id" => [
                "required",
                "regex:/^[1-9]{1}$/"
            ],
            "city" => [
                "required",
                "string"
            ],
            "type_document_id" => [
                "required",
                "regex:/^[1-9]{1}$/"
            ],
            "series_numbers_document" => [
                "required",
                "string"
            ],
            "country_of_issue_id" => [
                "required",
                "regex:/^[1-9]*$/"
            ]
        ];

        $validationfields = Validator::make($request->only(["full_name","email","phone","date_birthday",
        "gender_code_id","city","type_document_id","series_numbers_document","country_of_issue_id"]),$rules,$messages);
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
