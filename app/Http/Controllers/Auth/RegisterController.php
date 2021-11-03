<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        return view('Auth.reg');
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
            "gender_code" => [
                "required",
                "regex:/^[1-9]{1}$/"
            ],
            "city_name" => [
                "required",
                "string"
            ],
            "type_document" => [
                "required",
                "regex:/^[1-9]{1}$/"
            ],
            "series_document_number" => [
                "required",
                "regex:/^[0-9]{6,12}$/"
            ],
            "country_of_issue" => [
                "required",
                "regex:/^[0-9]*$/"
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
        $gender_code = $request['gender_code'];
        $city_of_residence = $request['city_name'];
        $id_document_type = $request['type_document'];
        $series_document_number = $request['series_document_number'];
        $id_country_of_issue = $request['country_of_issue'];

        $hashed_password = Hash::make($password);

        $user_check = User::Where([
            ['id_document_type',$id_document_type],
            ['series_and_document_number',$series_document_number]
        ])->first();

        if ($user_check) {
            $response = [
                'status' => false,
                'error_message' => 'Пользователь с такими данными уже существует. Проверьте свои данные'
            ];
            return json_encode($response);
        }
        else{
            $user = User::insertGetId([
                'email' => $email,
                'phone' => $phone,
                'full_name' => $full_name,
                'date_of_birthday' => $date_of_birthday,
                'gender_code' => $gender_code,
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
                $response = [
                    'status' => true,
                    'message' => 'Регистрация произошла успешно',
                    'url_redirect' => route('my_profile__page')
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

    public function checkContactDataRegister(Request $request)
    {
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
            "gender_code" => [
                "required",
                "regex:/^[1-9]{1}$/"
            ],
            "city_name" => [
                "required",
                "string"
            ],
            "type_document" => [
                "required",
                "regex:/^[1-9]{1}$/"
            ],
            "series_document_number" => [
                "required",
                "regex:/^[0-9]{6,12}$/"
            ],
            "country_of_issue" => [
                "required",
                "regex:/^[0-9]*$/"
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
            $id_document_type = $request['type_document'];
            $series_document_number = $request['series_document_number'];
            // $id_country_of_issue = $request['country_of_issue'];

            $user_check = User::Where([
                ['id_document_type',$id_document_type],
                ['series_and_document_number',$series_document_number]
            ])->first();

            if ($user_check) {
                $response = [
                    'status' => false,
                    'message' => 'Пользователь с такими данными уже существует. Проверьте свои данные'
                ];
                return json_encode($response);
            }
            else{
                $response = [
                    'status' => true,
                    'message' => 'Все супер, чики'
                ];
                return json_encode($response);
            }
        }
    }

    public function checkPasswordDataRegister(Request $request)
    {
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
        $user_password_array = DB::table('users')->pluck('password');
        $flag_password = false;
        if (isset($user_password_array) && count($user_password_array) > 0) {
           
            foreach ($user_password_array as $password_db) {
                if(!Hash::check($password,$password_db)){
                    $flag_password = true;
                }
            }
        }
        else{
            $flag_password = true;
        }
        

        if (!$flag_password) {
            $response = [
                "status" => false,
                "error_message" => "Пользователь с таким паролем уже существует",
                "flag_password" => $flag_password
            ];
            return json_encode($response);
        }
        else{
            $response = [
                "status" => true,
                "error_message" => "Пароля нет"
            ];
            return json_encode($response); 
        }
    }
}
