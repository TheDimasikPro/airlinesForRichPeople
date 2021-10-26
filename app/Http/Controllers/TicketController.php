<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function search(Request $request)
    {
        // echo json_encode($request->all()) ;
        return view('search_tickets');
    }
}
