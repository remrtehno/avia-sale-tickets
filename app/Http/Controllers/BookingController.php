<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Flights;
use App\Models\Order;
use App\Services\BookingService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;



class BookingController extends Controller
{
    private $service;

    public function __construct(BookingService $bookingService)
    {
        $this->service = $bookingService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 1;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flight = Flights::find($request->flight_id);

        if (!$this->service->isDatesValid($flight)) {
            return back()->withInput()->withErrors(['date_error' => implode("<br> ", $this->service->errors)]);
        };

        if (!$this->service->isAvailable()) {
            return back()->withInput()->withErrors(['no_seats' => 'Не достаточно мест']);
        };


        $booking = $this->service->store($flight);

        return redirect()->route('booking.show', ['booking' => $booking]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        $order = $booking->order->first();

        if ($booking->isOrderPaid()) {
            return view('booking.payed', ['booking' => $booking, 'order' => $order]);
        }

        if (!$order->canBePayed()) {
            return view('booking.expired', ['booking' => $booking, 'order' => $order]);
        }

        if ($order->status === Order::BOOKED) {
            return view('booking.index', ['booking' => $booking, 'order' => $order]);
        }

        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
