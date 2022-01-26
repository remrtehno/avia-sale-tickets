<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChairsRequest;
use App\Http\Requests\UpdateChairsRequest;
use App\Models\Chairs;

class ChairsController extends Controller
{
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
     * @param  \App\Http\Requests\StoreChairsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChairsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chairs  $chairs
     * @return \Illuminate\Http\Response
     */
    public function show(Chairs $chairs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chairs  $chairs
     * @return \Illuminate\Http\Response
     */
    public function edit(Chairs $chairs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChairsRequest  $request
     * @param  \App\Models\Chairs  $chairs
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChairsRequest $request, Chairs $chairs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chairs  $chairs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chairs $chairs)
    {
        //
    }
}
