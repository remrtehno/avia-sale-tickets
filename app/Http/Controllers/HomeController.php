<?php

namespace App\Http\Controllers;

use App\Models\Partners;
use App\Models\SeatFlight;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return view('home', [
            "seatFlight" => SeatFlight::orderBy('rating', 'desc')->take(6)->get(),
            "partners" => Partners::take(7)->get(),
            "search_list_cities" => SeatFlight::select('from', 'to')->get(),
        ]);
    }
}
