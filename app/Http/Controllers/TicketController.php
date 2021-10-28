<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function returnViewSearchTickets(Request $request)
    {
        // echo json_encode($request->all()) ;
        return view('search_tickets');
    }

    public function returnViewPassengerInfo()
    {
        return view('passenger_info');
    }
    public function returnViewPaymentTickets()
    {
        return view('payment_tickets');
    }
}
