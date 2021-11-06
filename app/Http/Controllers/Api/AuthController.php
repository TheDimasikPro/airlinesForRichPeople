<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validateFields = Validator::make($request->only(['phone','password']),
        [
            'phone' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check validateFields
        if ($validateFields->fails()) {
            return response([
                'error' => [
                    'code' => 422,
                    "message" => "Validation error",
                    "errors" => $validateFields->errors()
                ]
            ],422);
        }

        // Check phone
        $user = User::where([
            ['phone', $request["phone"]]
        ])->first();

        // Check password
        if (!$user || !Hash::check($request["password"], $user->password)) {
            return response([
                'error' => [
                    'code' => 401,
                    "message" => "Unauthorized",
                    "errors" => $validateFields->errors()
                ]
            ],401);
        }

        // Token generate

        $token = $user->createToken('myapptoken')->plainTextToken;
        return response([
            'data' => [
                'token' => $token
            ]
        ],200,['Content-Type' => 'application/json; charset=UTF-8']);
    }
}
