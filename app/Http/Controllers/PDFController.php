<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use PDF;
use Illuminate\Support\Facades\Mail;

class PDFController extends Controller
{
    public function previewPDF()
    {
        return view('PDF.payment_ticket_complete_PDF');
    }
    public function generatePDF()
    {
        $pdf = PDF::loadView('PDF.payment_ticket_complete_PDF');
        // $pdf = PDF::loadView('emails.after_payment_fight');
        return $pdf;
    }

    public function generatePDF_email()
    {
        $file = $this->generatePDF();

        File::put('assets/pdf/',$file);
        // Mail::send('emails.after_payment_fight', [], function ($message) use($file) {
        //     $message->from('mailForTestsOfMy.webProjects@gmail.com', 'RichAirlines');
        //     $message->to('dima.site1806@gmail.com', 'Dima');
        //     $message->subject('Регистрация на рейс');
        //     $message->attach($file);
        // });
    }
}
