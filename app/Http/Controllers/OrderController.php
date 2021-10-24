<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function returnViewOrderManagment()
    {
        return view('order_management');
    }
}
