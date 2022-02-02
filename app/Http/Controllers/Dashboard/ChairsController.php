<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Chairs;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chairs = Chairs::findOrFail($id);
        $this->authorize($chairs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chairs = Chairs::findOrFail($id);
        $this->authorize($chairs);

        return view('dashboard.chairs.edit', ['chairs' => $chairs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $chairs = Chairs::findOrFail($id);
        $this->authorize($chairs);
        $chairs->update($request->all());

        return redirect()->route('dashboard.flights.edit', ['flight' =>  $chairs->chairsable->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flight = Chairs::findOrFail($id);
        $flight->delete();

        return redirect()->back();
    }
}
