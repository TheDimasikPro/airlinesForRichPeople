<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PDFController extends Controller
{
    public function previewPDF()
    {
        return view('PDF.payment_ticket_complete_PDF');
    }
    public function generatePDF($response_mail)
    {
        $pdf = PDF::loadView('PDF.payment_ticket_complete_PDF',["response_mail" => $response_mail]);
        $output = $pdf->output();
        $upload_folder = 'public/pdf/';
        $now_date = Carbon::now()->format("d_m_Y");
        if(!Storage::exists($upload_folder . $now_date)) {
            Storage::makeDirectory($upload_folder . $now_date, 0775, true); //creates directory
        }
        $filename = Str::random(20) .'.pdf';
        Storage::put($upload_folder . $now_date . '/' . $filename, $output);
        $file_url = Storage::url($upload_folder . $now_date . '/' . $filename);
        return $file_url;

        
    }

    public function generatePDF_email()
    {
        $file_url = $this->generatePDF([]);
        Mail::send('emails.after_payment_fight', [], function ($message) use($file_url) {
            $message->from('mailForTestsOfMy.webProjects@gmail.com', 'RichAirlines');
            $message->to('dima.site1806@gmail.com', 'Dima');
            $message->subject('Регистрация на рейс');
            $message->attach('http://richairlines/' . $file_url);
        });
    }
}




