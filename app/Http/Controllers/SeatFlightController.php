<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\SeatFlight;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SeatFlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request)
    {

        $returning = new Carbon($request->get('returning'));
        $returning->addHours(23)->addMinutes(59);
        $departure = new Carbon($request->get('departure'));


        // $seat_flights = SeatFlight::whereBetween('date', [$departure, $returning]);
        $returning = new Carbon($request->get('returning'));
        $returning->addHours(23)->addMinutes(59);
        $departure = new Carbon($request->get('departure'));
        // if ($request->has('to')) {
        //     $seat_flights->where('to', $request->get('to'));
        // }

        // if ($request->has('from')) {
        //     $seat_flights->where('from', $request->get('from'));
        // }

        // if ($request->has('adult')) {
        //     $seat_flights->where('adult', $request->get('adult'));
        // }

        // if ($request->has('child')) {
        //     $seat_flights->where('child', $request->get('child'));
        // }

        // dd($request->all());

        // $seat_flights =
        //     SeatFlight::where(function ($query) use ($request) {
        //         $returning = new Carbon($request->get('returning'));
        //         $returning->addHours(23)->addMinutes(59);
        //         $departure = new Carbon($request->get('departure'));

        //         $query->whereBetween('date', [$departure, $returning]);

        //         // $query->where('datefield', '<', '')
        //         //     ->orWhereNull('datefield');
        //     });

        $seat_flights = SeatFlight::betweenDate()->withouDateBetween();

        return view('seat-flights.index', [
            'seat_flights' => $seat_flights->latest()->paginate(9),
            "search_list_cities" => SeatFlight::select('from', 'to')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('seat-flights.show', [
            'seat_flight' => SeatFlight::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
