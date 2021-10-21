<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MainController;
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

Route::get('/', [IndexController::class,'index'])->name('index_page');
Route::get('/login', [LoginController::class,'index'])->name('login_page');
Route::get('/reg', [RegisterController::class,'index'])->name('reg_page');

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