<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function login_check(Request $request)
    {
        if(Auth::check()){
            return redirect()->route('my_profile__page');
        }

        $validateFields = $request->only(['email','password']);
        if (Auth::attempt($validateFields)) {
            return redirect()->route('my_profile__page');
        }

        return redirect()->route('login')->withErrors([
            "error" => "Пользователя с такими данными не существует"
        ]);
    }
}
