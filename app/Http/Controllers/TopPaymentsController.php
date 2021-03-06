<?php

namespace App\Http\Controllers;

use App\Models\TopPayments;
use Auth;
use Illuminate\Http\Request;

class TopPaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('dashboard.top.report');
        }
        return view('dashboard.top-payments.index');
    }

    public function report()
    {
        return view('dashboard.top-payments.report', [
            'topPayments' => TopPayments::where('customer_id', auth()->user()->id)->get()
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
     * @param  \App\Models\TopPayments  $topPayments
     * @return \Illuminate\Http\Response
     */
    public function show(TopPayments $topPayments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TopPayments  $topPayments
     * @return \Illuminate\Http\Response
     */
    public function edit(TopPayments $topPayments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TopPayments  $topPayments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TopPayments $topPayments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TopPayments  $topPayments
     * @return \Illuminate\Http\Response
     */
    public function destroy(TopPayments $topPayments)
    {
        //
    }
}
