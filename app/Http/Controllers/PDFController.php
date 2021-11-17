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
        // foreach ($response_mail as $key => $value) {
        //     echo $value["flight_from"];
        //     echo $value["flight_back"];
        // }
        // echo json_encode($response_mail);
        $pdf = PDF::loadView('PDF.payment_ticket_complete_PDF',["response_mail" => $response_mail]);
        $output = $pdf->output();
        $upload_folder = 'public/pdf/';
        $filename = Carbon::now()->format("d_m_Y") . '_' . Str::random(10) .'.pdf';
        // Storage::putFileAs($upload_folder, $output, $filename);
        // file_put_contents($upload_folder . $filename, $output); // сохраняет файл в папку 100%
        Storage::put($upload_folder . $filename, $output);
        $file_url = Storage::url($upload_folder . $filename);
        // return $pdf;
        return $file_url;
    }

    public function generatePDF_email()
    {
        $file_url = $this->generatePDF([]);
        // return $file_url;
        Mail::send('emails.after_payment_fight', [], function ($message) use($file_url) {
            $message->from('mailForTestsOfMy.webProjects@gmail.com', 'RichAirlines');
            $message->to('dima.site1806@gmail.com', 'Dima');
            $message->subject('Регистрация на рейс');
            $message->attach('http://richairlines/' . $file_url);
        });
    }
}
