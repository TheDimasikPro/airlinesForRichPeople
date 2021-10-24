<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaggageController extends Controller
{
    public function index()
    {
        return view('baggage_info');
    }
}
