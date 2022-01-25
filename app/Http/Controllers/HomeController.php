<?php

namespace App\Http\Controllers;

use App\Models\Partners;
use App\Models\Flights;

class HomeController extends Controller
{
    public function index()
    {

        return view('home', [
            "seatFlight" => Flights::orderBy('rating', 'desc')->take(6)->get(),
            "partners" => Partners::take(7)->get(),
            "search_list_cities" => Flights::select('from', 'to')->get(),
        ]);
    }
}
