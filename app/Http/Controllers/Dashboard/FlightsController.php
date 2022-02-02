<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFlightRequest;
use App\Models\Chairs;
use App\Models\Flights;
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
        return view('dashboard.flights.index', ['flights' => Flights::where('user_id', Auth::user()->id)->get()]);
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
        $newFlight = Flights::make($request->all());

        $newFlight->rating = '0';
        $newFlight->user_id = Auth::user()->id;

        $newFlight->save();

        $newFlight->storeFiles();

        for ($i = 0; $i < $request->count_chairs; $i++) {
            $newFlight->chairs()->create([
                'uuid' => $newFlight->date->format('Y-m-d') .
                    '-' . $newFlight->flight .
                    '-' . $i,
                'flight_id' => $newFlight->id,
                'price' => $newFlight->price_adult,
                'type' => Chairs::ADULT
            ]);
        }

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
        $flight = Flights::findOrFail($id);
        $this->authorize($flight);


        return view('dashboard.flights.edit', ['flight' => $flight]);
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
        $this->authorize($flight);

        $validatedData = $request->all();

        $flight->fill($validatedData);

        $flight->save();

        $flight->storeFiles(true);

        return redirect()->route('dashboard.flights.edit', ['flight' => $flight->id])->withStatus('Обновленно');
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
