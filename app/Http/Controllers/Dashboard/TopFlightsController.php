<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Flights;
use App\Models\TopPeriodsToFlights;
use Illuminate\Http\Request;

class TopFlightsController extends Controller
{
    public function index()
    {
        return view('dashboard.top-flights.index', [
            'flights' => Flights::actual()->orderBy('top', 'desc')->get(),
        ]);
    }

    public function edit($id)
    {
        return view('dashboard.top-flights.edit', [
            'flights' => Flights::findOrFail($id),
            'periods' => array_keys(TopPeriodsToFlights::periods()),
        ]);
    }


    public function update(Request $request, $id)
    {

        $flight = Flights::findOrFail($id);

        $flight->top = $request->top ? 1 : 0;
        $flight->save();

        TopPeriodsToFlights::updateOrCreate(['flight_id' => $id], [
            'user_id' => $flight->user_id,
            'period' => TopPeriodsToFlights::periods($request->period),
            'top_report_id' => 0,
        ]);

        return $this->index();
    }
}
