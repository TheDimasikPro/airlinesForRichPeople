<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BaggageController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Stevebauman\Location\Facades\Location;

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
Route::get('/login', [LoginController::class,'index'])->name('login__page');
Route::get('/reg', [RegisterController::class,'index'])->name('reg__page');

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

Route::get('/about',[MainController::class,'returnViewAbout'])->name('about_page');
Route::get('/order_management',[OrderController::class,'returnViewOrderManagment'])->name('order_management__page');
Route::prefix('baggage_info')->group(function () {
    Route::get('/',[MainController::class,'returnViewBaggageInfo'])->name('baggage_info__page');
    Route::get('/#carriage_of_animals',[MainController::class,'returnViewBaggageInfo'])->name('baggage_info__page__carriage_of_animals');
    Route::get('/#baggage_tracing',[MainController::class,'returnViewBaggageInfo'])->name('baggage_info__page__baggage_tracing');
});

Route::get('/payment_methods',[MainController::class,'returnViewPaymentsMethod'])->name('payment_methods__page');
Route::get('/contacts',[MainController::class,'returnViewIndexContacts'])->name('contacts__page');
Route::get('/404_page',[MainController::class,'returnView404Page'])->name('404__page');
Route::get('/food_info',[MainController::class,'returnViewFoodInfo'])->name('food_info__page');

// nutrition