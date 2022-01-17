<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SeatFlightController;

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

//single pages
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index']);
//@TODO $ - need to replace because we can see {page}%24
Route::get('/{page}$', [PagesController::class, 'show'])->name('page');


//resources
Route::resource('seat-flights', SeatFlightController::class);
Route::resource('booking', BookingController::class);




//prebuilted functions
Auth::routes();
