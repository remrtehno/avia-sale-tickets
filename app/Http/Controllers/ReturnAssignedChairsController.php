<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ReturnAssignedChairs;
use App\Services\OrderService;
use App\Services\ReturnAssignedChairsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ReturnAssignedChairsController extends Controller
{
    private $service;
    private $orderService;

    function __construct(ReturnAssignedChairsService $returnAssignedChairsService, OrderService $orderService)
    {
        $this->service = $returnAssignedChairsService;
        $this->orderService = $orderService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\ReturnAssignedChairs  $returnAssignedChairs
     * @return \Illuminate\Http\Response
     */
    public function show(ReturnAssignedChairs $returnAssignedChairs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReturnAssignedChairs  $returnAssignedChairs
     * @return \Illuminate\Http\Response
     */
    public function edit(ReturnAssignedChairs $returnAssignedChairs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReturnAssignedChairs  $returnAssignedChairs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReturnAssignedChairs $id)
    {
        $order = Order::where('id', $id->order_id)
            ->firstOrFail();

        $userReturnedId = $id->owner_id;

        $this->orderService->createReturendOrder($id->flight, $id->count_chairs,  $order, $userReturnedId);
        $this->orderService->returnBackChairs($id->flight, $id->count_chairs, $order, $userReturnedId);

        $id->delete();

        Cache::forget('return-assigned-chairs');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReturnAssignedChairs  $returnAssignedChairs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReturnAssignedChairs $id)
    {
        $id->delete();

        Cache::forget('return-assigned-chairs');
        return back();
    }
}
