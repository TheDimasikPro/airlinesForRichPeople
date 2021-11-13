<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MailController extends Controller
{
    public function send(Request $request)
    {
        $validationFiled = Validator::make($request->only('email'),[
            "email" => [
                "required",
                "email"
            ]
        ]);
        if ($validationFiled->fails()) {
            return back()->withErrors(['email' => "Неверный формат почты"]);
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
        }
        
    }
}
