<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Flights;
use App\Models\Order;
use App\Services\BookingService;
use App\Services\CustomerContactsService;
use App\Services\DepositService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;



class BookingController extends Controller
{
    private $service;
    private $customerContactsService;
    private $depositService;

    public function __construct(BookingService $bookingService, CustomerContactsService $customerContactsService, DepositService $depositService)
    {
        $this->service = $bookingService;
        $this->customerContactsService = $customerContactsService;
        $this->depositService = $depositService;
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

        $this->customerContactsService->store($request->all());
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
        $deposit = $this->depositService->getDepositBySeller($booking->order->first()->seller_id)->leftSum ?? 0;

        $order = $booking->order->first();
        $options = ['booking' => $booking, 'order' => $order, 'deposit' => $deposit];

        if ($booking->isOrderPaid()) {
            return view('booking.payed', $options);
        }

        if (!$order->canBePayed()) {
            return view('booking.expired', $options);
        }

        if ($order->status === Order::BOOKED) {
            return view('booking.index', $options);
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
