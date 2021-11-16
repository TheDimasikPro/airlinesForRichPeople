<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BaggageController;
use App\Http\Controllers\Cabinet\ProfileController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\TicketController;
use App\Notifications\HelloUser;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class,'index'])->name('index__page');
Route::get('/#section__add_services',[IndexController::class,'index'])->name('add_services__block_index');



Route::get('/forgot_password', [ForgotPasswordController::class,'index'])->name('forgot_password__page');
Route::get('/send_mail_reset_password', [MailController::class,'sendMailResetPassword'])->name('send_mail_reset_password');
Route::get('/reset_password/{token}', function ($token) {
    return view('Auth.reset_password',["token" => $token]);
})->name('reset_password_link_email');

Route::post('/reset_password', [ForgotPasswordController::class,'update'])->name('reset_password_update');

Route::get('/about',[MainController::class,'returnViewAbout'])->name('about_page');
Route::get('/order_management',[OrderController::class,'returnViewOrderManagment'])->name('order_management__page');
Route::prefix('baggage_info')->group(function () {
    Route::get('/',[MainController::class,'returnViewBaggageInfo'])->name('baggage_info__page');
    Route::get('/#carriage_of_animals',[MainController::class,'returnViewBaggageInfo'])->name('baggage_info__page__carriage_of_animals');
    Route::get('/#baggage_tracing',[MainController::class,'returnViewBaggageInfo'])->name('baggage_info__page__baggage_tracing');
});

Route::post('/regiser_flight',[FlightController::class,'registerFlight'])->name('regiser_flight');

Route::get('/payment_methods',[MainController::class,'returnViewPaymentsMethod'])->name('payment_methods__page');
Route::get('/contacts',[MainController::class,'returnViewIndexContacts'])->name('contacts__page');
Route::get('/404_page',[MainController::class,'returnView404Page'])->name('404__page');
Route::get('/food_info',[MainController::class,'returnViewFoodInfo'])->name('food_info__page');

Route::prefix('search_tickets')->group(function () {
    Route::get('/',[FlightController::class,'returnViewSearchTickets'])->name('search_tickets__page');
    Route::get('/passenger_info',[FlightController::class,'returnViewPassengerInfo'])->name('passenger_info__page');
    Route::post('/payment_tickets_redirect',[FlightController::class,'redirectViewPaymentTickets'])->name('payment_tickets_redirect__page');
    Route::get('/payment_tickets',[FlightController::class,'returnViewPaymentTickets'])->name('payment_tickets__page');
    Route::post('/payment_tickets',[FlightController::class,'paymentTickets'])->name('payment_tickets');
});

route::prefix('pdf')->group(function ()
{
    Route::get('/preview',[PDFController::class,'previewPDF'])->name('preview_pdf');
    Route::get('/generate',[PDFController::class,'generatePDF'])->name('generate_pdf');
    Route::get('/generatePDF_email',[PDFController::class,'generatePDF_email'])->name('generatePDF_email');
});

Route::prefix('profile')->group(function () {
    
    Route::get('/login', function () {
        if(Auth::check()){
            return redirect()->route('my_profile__page');
        }
        return view('Auth.login');
    })->name('login');

    Route::get('/logoout',function(){
        Auth::logout();
        Session::forget('flight_order_info');
        Session::forget('new_passenger_ids');
        Session::forget('cost_tickets__all_passenger');
        Session::forget('passenger_info');
        return redirect()->route('index__page');
    })->name('logout');

    Route::get('/registration', function () {
        if(Auth::check()){
            return redirect()->route('my_profile__page');
        }
        return redirect()->route('reg__page');
    })->name('registration');

    Route::get('/',[ProfileController::class,'index'])->middleware('auth')->name('my_profile__page');

    Route::get('/reg_page', function () {
        if(Auth::check()){
            return redirect()->route('my_profile__page');
        }
        return redirect()->route('registration_page');
    })->name('reg__page');

    Route::post("/update_data",[ProfileController::class,'updatePersonalData'])->name("update_data");

    Route::get('/registration_page', [RegisterController::class,'index'])->name('registration_page');
    Route::post('/registration', [RegisterController::class,'save'])->name('registration__save');
    Route::post('/check_email_phone__reg', [RegisterController::class,'checkContactDataRegister'])->name('registration__check_email_phone');
    Route::post('/check_personal_data__reg', [RegisterController::class,'checkPersonalDataRegister'])->name('registration__check_personal_data');
    Route::post('/check_password_data__reg', [RegisterController::class,'checkPasswordDataRegister'])->name('registration__check_password_data');
    Route::get('/fun_redirect_profile', [RegisterController::class,'redirectProfileRegister'])->name('registration__redirect_profile');

    Route::post('/login', [LoginController::class,'login_check'])->name('login_check');
});


// Route::post('/search_flight', [FlightController::class,'search'])->name('search_flight');



// Route::post('/login', [LoginController::class,'index'])->name('login__page');





// Route::get('/logout', []);


// определние ip пользователя и его страны
Route::get('/ip', function () {
    if ($position = Location::get()) {

        $ip = $_SERVER['REMOTE_ADDR'];
        $data = Location::get($ip);
        dd($data);
        // Successfully retrieved position.
        // echo $_SERVER['REMOTE_ADDR']; // ip
        // echo Location::get($_SERVER['REMOTE_ADDR']);
    } else {
        // Failed retrieving position.
    }
    // $ip = $_SERVER['REMOTE_ADDR'];
    // $data = \Location::get($ip);
    // dd($data);
});