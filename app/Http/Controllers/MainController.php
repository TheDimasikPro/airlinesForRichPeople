<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function returnViewAbout()
    {
        return view('about');
    }
    public function returnViewBaggageInfo()
    {
        return view('baggage_info');
    }
    public function returnViewPaymentsMethod()
    {
        return view('payment_methods');
    }
    public function returnViewIndexCheckIn()
    {
        return view('index',[
            "check_in" => true
        ]);
    }
    public function returnViewIndexContacts()
    {
        return view('contacts');
    }
    public function returnView404Page()
    {
        return view('errors.404');
    }
    public function returnViewFoodInfo()
    {
        return view('food_info');
    }
}
