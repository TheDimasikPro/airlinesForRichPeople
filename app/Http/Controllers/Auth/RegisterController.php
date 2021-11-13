<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Models\User;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('my_profile__page');
        }
        $countries_all = DB::table('countries')->select('id','name_country')->get()->sortBy('id');
        $document_types_all = DB::table('document_types')->select('id','name_document')->get()->sortBy('id');
        $gender_codes_all = DB::table('gender_codes')->select('id','gender_name_rus')->get()->sortBy('id');
        if (!empty($countries_all) && !empty($document_types_all) && !empty($gender_codes_all)) {
            $response = [
                'countries_all' => $countries_all,
                'document_types_all' => $document_types_all,
                'gender_codes_all' => $gender_codes_all
            ];
            return view('Auth.reg', ['reg_info' => $response]);
        }
    }

    public function checkContactDataRegister(Request $request)
    {
        if (Auth::check()) {
            return redirect()->to(route('my_profile__page'));
        }
        $validateFileds = Validator::make($request->all(),
        [
            "email" => [
                "required",
                "string",
                "email"
            ]
        ]);

        if ($validateFileds->fails()) {
            $response = [
                "status" => false,
                "error_message" => "Что-то пошло не так, проверьте правильность заполнения полей в настройках",
                'errors' => $validateFileds->errors()
            ];
            return json_encode($response);
        }


        $email = $request['email'];
        $phone = $request['phone'];
        if (User::where([
            ['email',$email],
            ['phone',$phone]
            ])->first()) {
                $response = [
                    'status' => false,
                    'message' => 'Пользователь с такой почтой и таким телефоном уже есть'
                ];
                return json_encode($response);
        }
        if (User::where([
            ['email',$email]])->first()) {
                $response = [
                    'status' => false,
                    'message' => 'Пользователь с такой почтой уже есть'
                ];
                return json_encode($response);
        }
        if (User::where([
            ['phone',$phone]])->first()) {
                $response = [
                    'status' => false,
                    'message' => 'Пользователь с таким телефоном уже есть'
                ];
                return json_encode($response);
        }
        $response = [
            'status' => true,
            'message' => 'все супер'
        ];
        return json_encode($response);

    }

    public function checkPersonalDataRegister(Request $request)
    {
        if (Auth::check()) {
            return redirect()->to(route('my_profile__page'));
        }
        $validateFileds = Validator::make($request->all(),
        [
            "full_name" => [
                "required",
                "string"
            ],
            "date_birthday" => [
                "required",
                "date",
                "date_format:Y-m-d"
            ],
            "id_gender_code" => [
                "required",
                "regex:/^[1-9]{1}$/"
            ],
            "city_name" => [
                "required",
                "string"
            ],
            "id_type_document" => [
                "required",
                "regex:/^[1-9]{1}$/"
            ],
            "series_document_number" => [
                "required",
                "regex:/^[0-9]{6,12}$/"
            ],
            "id_country_of_issue" => [
                "required",
                "regex:/^[1-9]*$/"
            ]
        ]);
        if ($validateFileds->fails()) {
            $response = [
                "status" => false,
                "error_message" => "Что-то пошло не так, проверьте правильность заполнения полей в настройках",
                'errors_fields' => $validateFileds->errors()
            ];
            return json_encode($response);
        }
        else{
            // $full_name = $request['full_name'];
            // $date_of_birthday = $request['date_birthday'];
            // $gender_code = $request['gender_code'];
            // $city_of_residence = $request['city_name'];
            $id_document_type = $request['id_type_document'];
            $series_document_number = $request['series_document_number'];
            // $id_country_of_issue = $request['country_of_issue'];

            $user_check = User::Where([
                ['series_and_document_number',$series_document_number]
            ])->first();

            if ($user_check) {
                $response = [
                    'status' => false,
                    'error_message' => 'Пользователь с такой серией и номером паспорта уже существует. Проверьте свои данные'
                ];
                return json_encode($response);
            }
            else{
                $response = [
                    'status' => true,
                    'error_message' => 'Все супер, чики'
                ];
                return json_encode($response);
            }
        }
    }

    public function checkPasswordDataRegister(Request $request)
    {
        if (Auth::check()) {
            return redirect()->to(route('my_profile__page'));
        }
        $validateFileds = Validator::make($request->all(),[
            "password" => [
                "required",
                "regex:/(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{8,}/"
            ]
        ]);
        if ($validateFileds->fails()) {
            $response = [
                "status" => false,
                "error_message" => "Слабый пароль. Используйте заглавные и прописные латинские буквы, а также цифры и минимум один из следюущий символов: !@#$%^&*",
                'errors_fields' => $validateFileds->errors()
            ];
            return json_encode($response);
        }
        $password = $request['password'];
        $email = $request['email'];
        $user_password_array = User::where([
            ['email',$email]
        ])->first();
        if ($user_password_array) {
            if(!Hash::check($password,$user_password_array->password)){
                $response = [
                    "status" => true,
                    "error_message" => "Пароля нет",
                    "passwords" => $user_password_array
                ];
                return json_encode($response); 
            }
            else{
                $response = [
                    "status" => false,
                    "error_message" => "Пользователь с таким паролем уже существует"
                ];
                return json_encode($response);
            }
        }
        $response = [
            "status" => true,
            "error_message" => "Пароля нет",
            "passwords" => $user_password_array
        ];
        return json_encode($response); 


        // $flag_password = false;
        // if (isset($user_password_array) && count($user_password_array) > 0) {
           
        //     foreach ($user_password_array as $password_db) {
        //         if(!Hash::check($password,$password_db)){
        //             $flag_password = true;
        //         }
        //     }
        // }
        // else{
        //     $flag_password = true;
        // }
        

        // if (!$flag_password) {
        //     $response = [
        //         "status" => false,
        //         "error_message" => "Пользователь с таким паролем уже существует",
        //         "flag_password" => $flag_password
        //     ];
        //     return json_encode($response);
        // }
        // else{
        //     $response = [
        //         "status" => true,
        //         "error_message" => "Пароля нет",
        //         "passwords" => $user_password_array
        //     ];
        //     return json_encode($response); 
        // }
    }

    public function save(Request $request)
    {
        if (Auth::check()) {
            return redirect()->to(route('my_profile__page'));
        }
        $validateFileds = Validator::make($request->all(),
        [
            "full_name" => [
                "required",
                "string"
            ],
            "date_birthday" => [
                "required",
                "date",
                "date_format:Y-m-d"
            ],
            "id_gender_code" => [
                "required",
                "regex:/^[1-9]{1}$/"
            ],
            "city_name" => [
                "required",
                "string"
            ],
            "id_type_document" => [
                "required",
                "regex:/^[1-9]{1}$/"
            ],
            "series_document_number" => [
                "required",
                "regex:/^[0-9]{6,12}$/"
            ],
            "id_country_of_issue" => [
                "required",
                "regex:/^[1-9]*$/"
            ]
        ]);
        if ($validateFileds->fails()) {
            $response = [
                "status" => false,
                "error_message" => "Что-то пошло не так, проверьте правильность заполнения полей в настройках",
                'errors' => $validateFileds->errors()
            ];
            return json_encode($response);
        }
        $full_name = $request['full_name'];
        $email = $request['email'];
        $phone = $request['phone'];
        $password = $request['password'];
        $date_of_birthday = $request['date_birthday'];
        $id_gender_code = $request['id_gender_code'];
        $city_of_residence = $request['city_name'];
        $id_document_type = $request['id_type_document'];
        $series_document_number = $request['series_document_number'];
        $id_country_of_issue = $request['id_country_of_issue'];

        $hashed_password = Hash::make($password);

        $user_check = User::Where([
            ['id_document_type',$id_document_type],
            ['series_and_document_number',$series_document_number]
        ])->orWhere([
            ['password',$password]
        ])->first();

        if ($user_check) {
            $response = [
                'status' => false,
                'error_message' => 'Пользователь с такими данными уже существует. Проверьте свои данные'
            ];
            return json_encode($response);
        }
        else{
            $user_roles = UserRole::where([
                ['role_name','User'],
            ])->first();
            $user = User::insertGetId([
                'email' => $email,
                'id_role' => $user_roles->id,
                'phone' => $phone,
                'full_name' => $full_name,
                'date_of_birthday' => $date_of_birthday,
                'id_gender_code' => $id_gender_code,
                'city_of_residence' => $city_of_residence,
                'id_document_type' => $id_document_type,
                'series_and_document_number' => $series_document_number,
                'id_country_of_issue' => $id_country_of_issue,
                'password' => $hashed_password,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]);
            if ($user) {
                Auth::loginUsingId($user);
                $response_mail = [
                    "full_name" => $full_name,
                    "email" => $email,
                    "password" => $password
                ];
                $mailController = new MailController();
                $mailController->sendMailWelcome($response_mail,$email);
                $response = [
                    'status' => true,
                    'message' => 'Регистрация произошла успешно',
                    'url_redirect' => route('my_profile__page')
                    // 'url_redirect' => route('registration')
                    // 'user_info' => Auth::user()
                ];
                return json_encode($response);
                
            }
            else{
                $response = [
                    'status' => false,
                    'error_message' => 'произошла ошибка регистрации пользователя'
                ];
                return json_encode($response);
            }
        }

        // $validateFileds = $request->validate([
        //     'email' => 'required|email',
        //     'phone' => 'required',
        //     // 'password' => 'required',
        // ]);

        // $user = User::create($validateFileds);
        // if ($user) {
        //     Auth::login($user);
        //     return redirect()->route('my_profile__page');
        // }
        // return redirect(route('login'))->withErrors([
        //     'foromError' => 'произошла ошибка регистрации пользователя'
        // ]);
    }

    public function redirectProfileRegister()
    {
        if(Auth::check()){
            return redirect()->route('my_profile__page');
        }
    }
    
}
