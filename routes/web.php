<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\IndexController;
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

Route::get('/', [IndexController::class,'index']);
Route::get('/login', [LoginController::class,'index']);
Route::get('/reg', [RegisterController::class,'index']);

// определние ip пользователя и его страны
Route::get('/ip', function () {
    if ($position = Location::get()) {
        // Successfully retrieved position.
        echo $_SERVER['REMOTE_ADDR']; // ip
        echo $position->countryName;
    } else {
        // Failed retrieving position.
    }
    // $ip = $_SERVER['REMOTE_ADDR'];
    // $data = \Location::get($ip);
    // dd($data);
});