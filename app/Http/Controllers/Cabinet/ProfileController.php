<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\Countrie;
use App\Models\DocumentType;
use App\Models\GenderCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            $document_types_all = DB::table('document_types')->select('id','name_document')->get()->sortBy('id');
            $gender_codes_all = DB::table('gender_codes')->select('id','gender_name_rus')->get()->sortBy('id');

            if (!empty($user_gender_code_name) && !empty($user_document_type) && !empty($user_country_of_issue)) {
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
                    'gender_codes_all' => $gender_codes_all
                ];
                // return view('Cabinet.my_profile',["auth_user" => json_encode($response)]);
                // return view('Cabinet.my_profile',["auth_user" => json_encode($response)]);
                return view('Cabinet.my_profile',['auth_user' => $response]);
            }
            
        }
        
    }
}
