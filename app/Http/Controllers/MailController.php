<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MailController extends Controller
{
    public function sendMailResetPassword(Request $request)
    {
        if (Auth::check()) {
            return redirect()->to(route('my_profile__page'));
        }
        $validationFiled = Validator::make($request->only('email'),[
            "email" => [
                "required",
                "email"
            ]
        ]);
        if ($validationFiled->fails()) {
            return redirect()->route('forgot_password__page')->withErrors(['email' => "Неверный формат почты"]);
        }

        $check_user = User::where([
            ["email", $request["email"]]
        ])->first();
        if ($check_user != null) {

            $token = Str::random(60);
            User::where([
                ["email", $request["email"]]
            ])->update(
                ["remember_token" => $token]
            );
            $response_mail = [
                "full_name" => $check_user->full_name,
                "token" => $token,
            ];
            Mail::send('emails.reset_password', $response_mail, function ($message) {
                $message->from('mailForTestsOfMy.webProjects@gmail.com', 'RichAirlines');
                $message->to('dima.site1806@gmail.com', 'Dima');
                $message->subject('Test');
            });


            return redirect()->route('my_profile__page');
        }

        return redirect()->route('forgot_password__page')->withErrors([
            'errors' => 'Пользователя с такой почтой не существует'
        ]);
        
    }

    public function sendMailResetPasswordComplete($response_mail,$email_user)
    {
        Mail::send('emails.reset_password_complete', $response_mail, function ($message) {
            $message->from('mailForTestsOfMy.webProjects@gmail.com', 'RichAirlines');
            $message->to('dima.site1806@gmail.com', 'Dima');
            $message->subject('Test');
        });

        User::where([
            ["email", $email_user]
        ])->update(
            ["remember_token" => null]
        );
    }

    public function sendMailWelcome($response_mail,$email_user)
    {
        Mail::send('emails.welcome', $response_mail, function ($message) {
            $message->from('mailForTestsOfMy.webProjects@gmail.com', 'RichAirlines');
            $message->to('dima.site1806@gmail.com', 'Dima');
            $message->subject('Добро пожаловать');
        });
    }

    public function sendMailAfterRegistrationFlight($response_mail,$email_user)
    {
        Mail::send('emails.after_registration_fight', $response_mail, function ($message) {
            $message->from('mailForTestsOfMy.webProjects@gmail.com', 'RichAirlines');
            $message->to('dima.site1806@gmail.com', 'Dima');
            $message->subject('Регистрация на рейс');
        });
    }
    public function sendMailAfterPaymentFlight($response_mail,$email_user)
    {
        Mail::send('emails.after_payment_fight', $response_mail, function ($message) {
            $message->from('mailForTestsOfMy.webProjects@gmail.com', 'RichAirlines');
            $message->to('dima.site1806@gmail.com', 'Dima');
            $message->subject('Регистрация на рейс');
        });
    }
}
