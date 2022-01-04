<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\SeatFlight;
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

        $seat_flights = SeatFlight::betweenDate()
            ->withExcludes()
            ->withPassengers()
            ->orderByClosest()
            ->paginate(9);

        $closestDateFound = $seat_flights->count()
            ? null
            : SeatFlight::withExcludes()->withPassengers()->orderByClosest()->first();

        return view('seat-flights.index', [
            'seat_flights' => $seat_flights,
            'search_list_cities' => SeatFlight::select('from', 'to')->get(),
            'closestDateFound' => $closestDateFound,
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
