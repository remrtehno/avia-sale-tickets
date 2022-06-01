<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\User;
use App\Services\DepositService;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    private $depositService;

    function __construct(DepositService $depositService)
    {
        $this->depositService = $depositService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.deposit.index', [
            'deposits' => Deposit::where('seller_id', auth()->user()->id)->get(),
        ]);
    }

    public function deposits()
    {
        $deposits = Deposit::where('customer_id', auth()->user()?->id)->get();

        return view('dashboard.deposit.deposits', [
            'deposits' =>  $deposits,
            'mergedByUsers' => $this->depositService->getTotalDeposit($deposits),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.deposit.create');
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
     * @param  Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show($deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        return view('dashboard.deposit.edit', ['id' => $deposit->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $deposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        $deposit->delete();

        return redirect()->route('dashboard.deposit.index');
    }
}
