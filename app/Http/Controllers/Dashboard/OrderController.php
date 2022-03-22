<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Chairs;
use App\Models\Flights;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order)
    {

        $orders = $order->getOrders();

        return view('dashboard.orders.index', [
            'orders' => $orders
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
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('dashboard.orders.edit', [
            'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->validated());

        return redirect()->route('dashboard.orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }



    public function returnToOwner(Request $request, Order $order)
    {
        $flight = $order->flight;

        if ($request->count_chairs > $flight->getChairs()->count()) {
            return back()->withErrors(['count_chairs' => 'Не верное кол-во мест']);
        }

        Order::create([
            'status' => Order::RETURNED,
            'user_id' => Auth::user()->id,
            'flight_id' =>  $flight->id,
            'total' => $order->price_adult * $request->count_chairs * -1,
            'count_chairs' => $request->count_chairs,
            'exchange_rate' => 0,
            'seller_id' => $flight->user_id,
            'price_adult' => $order->price_adult,
            'is_returned' => 1,
            'user_returned_id' => Auth::user()->id
        ]);

        $noBookedChairs = $flight->chairs()
            ->where('user_id', Auth::user()->id)
            ->whereNull('status')
            ->limit($request->count_chairs)
            ->update(['user_id' => null, 'seller_id' => $flight->user_id, 'order_id' => $order->id]);

        return back();
    }
}
