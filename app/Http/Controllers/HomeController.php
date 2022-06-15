<?php

namespace App\Http\Controllers;

use App\Models\Partners;
use App\Models\Flights;
use App\Models\TopPeriodsToFlights;
use App\Services\TopPeriodsToFlightService;

class HomeController extends Controller
{
    private $topPeriodsToFlightService;

    public function __construct(TopPeriodsToFlightService $topPeriodsToFlightService)
    {
        $this->topPeriodsToFlightService = $topPeriodsToFlightService;
    }

    public function index()
    {
        //clean expired flights
        $this->topPeriodsToFlightService->cleanExpiredFlights();

        return view('home', [
            "flightsTop" => TopPeriodsToFlights::getFlights(),
            "flights" => Flights::orderBy('rating', 'desc')->take(10)->get(),
            "partners" => Partners::take(7)->get(),
            "search_list_cities" => Flights::select('direction_from', 'direction_to')->get(),
        ]);
    }
}
