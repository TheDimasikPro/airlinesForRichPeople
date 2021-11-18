<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class MailController extends Controller
{
    public function sendMailResetPassword(Request $request)
    {
        // if (Auth::check()) {
        //     return redirect()->to(route('my_profile__page'));
        // }
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
                ["remember_token" => $token],
                ["updated_at" => Carbon::now()]
            );
            $response_mail = [
                "full_name" => $check_user->full_name,
                "token" => $token,
            ];
            $email = $request["email"];
            $full_name = $check_user->full_name;
            Mail::send('emails.reset_password', $response_mail, function ($message) use($email,$full_name) {
                $message->from('mailForTestsOfMy.webProjects@gmail.com', 'RichAirlines');
                $message->to($email, $full_name);
                $message->subject('Сброс пароля');
            });
            Auth::logout();
            Session::forget('flight_order_info');
            Session::forget('new_passenger_ids');
            Session::forget('cost_tickets__all_passenger');
            Session::forget('passenger_info');
            return redirect()->route('login')->withSuccess("");
        }

        return redirect()->route('forgot_password__page')->withErrors([
            'errors' => 'Пользователя с такой почтой не существует'
        ]);
        
    }

    public function sendMailResetPasswordComplete($response_mail,$email_user,$full_name)
    {
        Mail::send('emails.reset_password_complete', $response_mail, function ($message) use($email_user,$full_name) {
            $message->from('mailForTestsOfMy.webProjects@gmail.com', 'RichAirlines');
            $message->to($email_user, $full_name);
            $message->subject('Успешный сброс пароля');
        });

        User::where([
            ["email", $email_user]
        ])->update(
            ["remember_token" => null],
            ["updated_at" => Carbon::now()]
        );
    }

    public function sendMailWelcome($response_mail,$email_user,$full_name)
    {
        Mail::send('emails.welcome', $response_mail, function ($message) use($email_user,$full_name) {
            $message->from('mailForTestsOfMy.webProjects@gmail.com', 'RichAirlines');
            $message->to($email_user, $full_name);
            $message->subject('Добро пожаловать');
        });
    }

    public function sendMailAfterRegistrationFlight($response_mail,$email_user,$full_name)
    {
        Mail::send('emails.after_registration_fight', $response_mail, function ($message) use($email_user,$full_name) {
            $message->from('mailForTestsOfMy.webProjects@gmail.com', 'RichAirlines');
            $message->to($email_user, $full_name);
            $message->subject('Регистрация на рейс');
        });
    }
    public function sendMailAfterPaymentFlight($response_mail,$email_user)
    {
        $pdf = new PDFController();
        $urls = [];
        $urls = $pdf->generatePDF($response_mail);
        // return $urls->stream();
        // // return count([])
        Mail::send('emails.after_payment_fight', $response_mail, function ($message) use($urls,$email_user) {
            $message->from('mailForTestsOfMy.webProjects@gmail.com', 'RichAirlines');
            $message->to($email_user, '');
            $message->subject('Регистрация на рейс');
            $message->attach('http://richairlines/' . $urls);
        });
    }
}
