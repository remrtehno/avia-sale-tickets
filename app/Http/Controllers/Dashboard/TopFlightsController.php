<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Flights;
use Illuminate\Http\Request;

class TopFlightsController extends Controller
{
    public function index()
    {
        return view('dashboard.top-flights.index', [
            'flights' => Flights::orderBy('top', 'desc')->get(),
        ]);
    }

    public function edit($id)
    {
        return view('dashboard.top-flights.edit', [
            'flights' => Flights::findOrFail($id),
        ]);
    }


    public function update(Request $request, $id)
    {

        $flight = Flights::findOrFail($id);

        $flight->top = $request->top ? 1 : 0;
        $flight->save();

        return back();
    }
}
