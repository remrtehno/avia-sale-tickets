<?php

use App\Http\Controllers\Dashboard\BookingController as DashboardBookingController;
use App\Http\Controllers\Dashboard\ChairsController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\FlightsController as DashboardFlightsController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\TicketController;
use App\Http\Controllers\Dashboard\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\FlightsController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Auth;


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
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index']);
//@TODO $ - need to replace because we can see {page}%24
Route::get('/{page}$', [PagesController::class, 'show'])->name('page');


//resources
Route::resource('flights', FlightsController::class);
Route::resource('booking', BookingController::class);





//prebuilt functions
Auth::routes();



//groups
Route::group(['as' => 'dashboard.', 'prefix' => 'dashboard'], function () {

  Route::middleware(['auth', 'dashboard'])->group(function () {
    //resources
    Route::resource('flights', DashboardFlightsController::class);
    Route::get('flights/{flight}/chairs', [DashboardFlightsController::class, 'createChair'])->name('flight.chairs.create');
    Route::resource('chairs', ChairsController::class);
    Route::resource('tickets', TicketController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('booking', DashboardBookingController::class);



    //single
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/export', [TicketController::class, 'export'])->name('tickets.csv');
    Route::put('flights/{flight}', [DashboardFlightsController::class, 'assignChairsToUser'])->name('flight.chairs.assign');

    Route::group(['as' => 'profile.', 'prefix' => 'profile'], function () {


      Route::get('/', [ProfileController::class, 'edit'])->name('edit');
      Route::put('/update', [ProfileController::class, 'update'])->name('update');
    });
  });


  Route::get('not-approved', function () {
    if (Auth::user()->is_approved) {
      return redirect('/dashboard');
    }

    return view('dashboard.not-approved');
  });
});
