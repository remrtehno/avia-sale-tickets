<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Flights;
use App\Services\BookingService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


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
        if (!$this->service->isAvailable()) {
            return redirect()->back()->withErrors(['no_seats' => 'Не достаточно мест']);
        };

        $flight = Flights::find($request->flight_id);

        $booking = Booking::create([
            'uuid' => (string) Str::uuid(),
            'flight_id' => $request->flight_id
        ]);

        $this->service->storeTickets($booking);

        $this->service->assignChairs($booking, $flight);

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

        return view('booking.index', ['booking' => $booking]);
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
