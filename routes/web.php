<?php

use App\Http\Controllers\Dashboard\CustomerContactsController;
use App\Http\Controllers\Dashboard\BookingController as DashboardBookingController;
use App\Http\Controllers\Dashboard\ChairsController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\FlightsController as DashboardFlightsController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\TicketController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\FlightsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Dashboard\SiteSettingsController;
use App\Http\Controllers\Dashboard\TopFlightsController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\PreAssignChairsController;
use App\Http\Controllers\ReturnAssignedChairsController;
use App\Http\Controllers\UserController as ControllersUserController;
use App\Models\Flights;
use App\Models\Order;
use App\Models\Ticket;
use App\Services\PDFService;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
Route::post('/paymo-callback', [OrderController::class, 'paymoCallback']);

//@TODO $ - need to replace because we can see {page}%24
Route::get('/{page}$', [PagesController::class, 'show'])->name('page');
Route::get('/feedback', function () {
  return view('pages.feedback');
});

//resources
Route::resource('flights', FlightsController::class);
Route::resource('booking', BookingController::class);
Route::resource('users', ControllersUserController::class);





//prebuilt functions
Auth::routes();



//groups
Route::group(['as' => 'dashboard.', 'prefix' => 'dashboard'], function () {

  Route::middleware(['auth', 'dashboard'])->group(function () {
    //resources
    Route::resource('flights', DashboardFlightsController::class);
    Route::resource('top-flights', TopFlightsController::class);
    Route::get('flights/{flight}/chairs', [DashboardFlightsController::class, 'createChair'])->name('flight.chairs.create');
    Route::resource('chairs', ChairsController::class);
    Route::resource('tickets', TicketController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('booking', DashboardBookingController::class);
    Route::resource('reports', ReportController::class);
    Route::resource('customer-contacts', CustomerContactsController::class);
    Route::resource('users', UserController::class);
    Route::resource('settings', SiteSettingsController::class);


    //single
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/export', [TicketController::class, 'export'])->name('tickets.csv');
    Route::put('flights/{flight}/assign', [PreAssignChairsController::class, 'store'])->name('flight.chairs.assign');

    Route::get('pre-assign-chairs-accept/{id}', [PreAssignChairsController::class, 'acceptAndAssignToUser'])->name('flight.chairs.assign.accept');
    Route::get('pre-assign-chairs-reject/{id}', [PreAssignChairsController::class, 'rejectAndAssignToUser'])->name('flight.chairs.assign.reject');

    Route::get('return-chairs-reject/{id}', [ReturnAssignedChairsController::class, 'destroy'])->name('return.assigned.chairs.reject');
    Route::get('return-chairs-accept/{id}', [ReturnAssignedChairsController::class, 'update'])->name('return.assigned.chairs.accept');

    Route::post('orders/{order}/return', [OrderController::class, 'returnToOwner'])->name('order.return');

    //Start pdf
    Route::get('orders/{order}/tickets/print', [OrderController::class, 'gerateTicketsPDF'])->name('order.tickets.pdf');
    Route::get('orders/{order}/tickets/email', [OrderController::class, 'emailTickets'])->name('order.tickets.pdf.email');

    Route::get('orders/tickets/email/success', function () {
      return view('emails.success.success')->with([
        'back' => route('dashboard.orders.index'),
      ]);
    })->name('order.tickets.pdf.email.success');
    // END df


    Route::put('users/{user}/approve', [UserController::class, 'approve'])->name('users.approve');
    Route::put('users/{user}/deactivate', [UserController::class, 'deactivate'])->name('users.deactivate');

    Route::get('mailable', function () {
      $pdf = new PDFService();

      $order = Order::find(1);
      $seller = User::find(11);

      //order
      $data['order'] =  $order;

      //seller
      $data['seller'] = $seller;

      //flight
      $data['flight'] = Flights::find(3);
      $data["logo"] = ''; //Storage::disk('local')->get(($data['flight']->getImages()[0]?->getPath()));

      //tickets
      $data['passengers'] = [Ticket::find(1)];

      // return Response::make(($pdf->generatePDF($data)), 200, [
      //   'Content-Type' => 'application/pdf',
      //   'Content-Disposition' => 'inline; filename="pdf.file"'
      // ]);

      $ticket = \App\Models\Ticket::find(1);
      return new \App\Mail\TicketMarkDown($ticket);
    });


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
