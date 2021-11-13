<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('Auth.forgot_password');
    }

    public function update(Request $request)
    {
        $validationFields = Validator::make($request->only('token_user','email','password','password_confirmation'),[
            "token_user" => [
                "required",
                "min:60",
                "max:60"
            ],
            "email" => [
                "required",
                "email"
            ],
            "password" => [
                "required",
                "regex:/(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{8,}/"
            ],
            "password_confirmation" => [
                "required"
            ]
        ]);
        if ($validationFields->fails()) {
            return back()->withErrors([
                "errors" => "Слабый пароль. Используйте заглавные и прописные латинские буквы, а также цифры и минимум один из следюущий символов: !@#$%^&*"
            ]);
        }

        $token_user = $request["token_user"];
        $email = $request["email"];
        $password = $request["password"];
        $password_confirmation = $request["password_confirmation"];
        if ($password_confirmation != $password) {
            return back()->withErrors([
                "errors" => "Пароли не совпадают"
            ]);
        }

        $hashed_password = Hash::make($password_confirmation);

        $user = User::where([
            ["email", $email],
            ["remember_token", $token_user]
        ])->update(
            ["password" => $hashed_password]
        );

        if ($user) {
            $response_mail = [
                "email" => $email,
                "password" => $password
            ];
            $mailController = new MailController();
            $mailController->sendMailResetPasswordComplete($response_mail,$email);
            return redirect()->route('my_profile__page');
        }
        return back()->withErrors([
            "errors" => "У пользователя, запрашимаево сброс пароля - другая почта. Проверьте своли данные"
        ]);
    }
}
