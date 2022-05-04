<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Flights;
use App\Models\Ticket;
use App\Services\TicketService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class TicketController extends Controller
{
    private $service;


    public function __construct(TicketService $ticketService)
    {
        $this->service = $ticketService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $flight = Flights::find($request->flight_id);
        $user = Auth::user();

        if ($flight && $user->id !== $flight->user_id && !$user->is_admin) {
            return abort('401');
        }

        $flights = $user->is_admin ? Flights::all() : Auth::user()->flights;

        return view('dashboard.tickets.index', [
            'tickets' => $flight ? $flight->getTickets() : [],
            'flights' => $flights
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
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $this->authorize($ticket);

        return view('dashboard.tickets.show', [
            'ticket' => $ticket,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $this->authorize($ticket);

        return view('dashboard.tickets.edit', [
            'ticket' => $ticket,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketRequest  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $this->authorize($ticket);
        $ticket->update($request->all());

        return redirect()->route('dashboard.tickets.index', ['flight_id' => $request->flight_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }


    public function export(Request $request)
    {
        $flight = Flights::find($request->flight_id);

        if ($flight && Auth::user()->id !== $flight->user_id) {
            return abort('401');
        }

        $table = $flight ? $flight->getTickets() : [];

        return $this->service->exportCSV($table);
    }
}
