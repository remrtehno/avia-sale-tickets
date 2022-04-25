<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $from = new Carbon('-1 day 00:00');
        $to = now();

        $tickets = Ticket::whereHas('booking', function (Builder $query) {
            $query->whereHas('flight', function (Builder $queryFight) {
                $queryFight->where('user_id', Auth::user()->id);
            });
        })->where('status', Order::PAID);

        if ($request->from && $request->to) {
            $from = new Carbon($request->from);
            $to = new Carbon($request->to);

            $tickets->whereBetween('updated_at', [$from, $to]);
        }

        if ($request->user_id) {
            $tickets->where('user_id', $request->user_id);
        }

        return view(
            'dashboard.report.index',
            [
                'tickets' => $tickets->get(),
                'from' => $from,
                'to' => $to,
                'user' => User::find($request->user_id)

            ]
        );
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
        //
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
