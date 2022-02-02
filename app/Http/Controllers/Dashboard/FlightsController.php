<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFlightRequest;
use App\Models\Flights;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlightsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.flights.index', ['flights' => Flights::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.flights.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFlightRequest $request)
    {
        $newFlight = Flights::create($request->all());

        $newFlight->rating = '0';

        $newFlight->user_id = Auth::user()->id;

        $newFlight->storeFiles();

        $newFlight->save();

        return redirect()->route('dashboard.flights.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('flights.show', ['flight' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.flights.edit', ['flight' => Flights::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFlightRequest $request, $id)
    {


        $flight = Flights::findOrFail($id);

        $validatedData = $request->all();

        $flight->fill($validatedData);

        $flight->storeFiles(true);

        $flight->save();

        return redirect()->route('dashboard.flights.edit', ['flight' => $flight->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flight = Flights::findOrFail($id);
        $flight->delete();

        return redirect()->route('dashboard.flights.index');
    }
}
