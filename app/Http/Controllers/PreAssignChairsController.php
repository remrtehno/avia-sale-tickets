<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignChairsToUser;
use App\Models\Flights;
use App\Models\PreAssignChairs;
use App\Models\User;
use App\Services\FlightService;
use App\Services\PreAssignChairsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreAssignChairsController extends Controller
{

    private $flightService;
    private $service;

    function __construct(FlightService $flightService, PreAssignChairsService $preAssignChairsService)
    {
        $this->flightService = $flightService;
        $this->service = $preAssignChairsService;
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
    public function store(AssignChairsToUser $request, PreAssignChairs $preAssignChairs)
    {
        $owner_id = Auth::user()->id;

        $flight = Flights::findOrFail($request->flight_id);
        $availableChairs = $flight->countChairs();

        $totalAmountChairs = $this->service->getTotalAmountOfChairs($flight, $preAssignChairs);

        $canBeCreated = $this->service->canBeCreated($availableChairs, $totalAmountChairs, $request->count_chairs);


        if (!$canBeCreated) {
            return back()->withErrors(['count_chairs' => 'Не верное кол-во мест или нету доступных мест']);
        };

        $countChairs = $this->flightService->validateCount($availableChairs, $request->count_chairs);

        PreAssignChairs::create([
            'user_id' =>  $request->user_id,
            'count_chairs' => $countChairs,
            'owner_id' =>  $owner_id,
            'flight_id' => $request->flight_id
        ]);

        return back();
    }


    /**
     * Eventually assign to User.
     *
     * @param  \Illuminate\Http\Request  $requestv
     * @param  \App\Models\PreAssignChairs  $id
     * @return \Illuminate\Http\Response
     */
    public function acceptAndAssignToUser(Request $request, PreAssignChairs $id)
    {
        $user_id = Auth::user()->id;

        if ($id->user_id !== $user_id) {
            return abort(404);
        }
        $flight = Flights::findOrFail($id->flight_id);
        $userCustomer = User::findOrFail($id->user_id);

        $count = $this->flightService->assignChairs($flight, $userCustomer, $id->count_chairs);
        $ownerUser = $id->ownerUser;

        $id->delete();

        if ($count > 0) {
            return back()->with('assigned_to', "Вы купили кресла $count шт. у пользователя $ownerUser->name $ownerUser->email для рейса $flight->flight");
        } else {
            return back()->with('not_avaliable', "Свободные кресла $count шт.");
        }
    }


    /**
     * Eventually assign to User.
     *
     * @param  \Illuminate\Http\Request  $requestv
     * @param  \App\Models\PreAssignChairs  $id
     * @return \Illuminate\Http\Response
     */
    public function rejectAndAssignToUser(Request $request, PreAssignChairs $id)
    {
        $id->delete();
        return back()->with('not_avaliable', "Вы отказались от покупки.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PreAssignChairs  $preAssignChairs
     * @return \Illuminate\Http\Response
     */
    public function show(PreAssignChairs $preAssignChairs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PreAssignChairs  $preAssignChairs
     * @return \Illuminate\Http\Response
     */
    public function edit(PreAssignChairs $preAssignChairs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PreAssignChairs  $preAssignChairs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PreAssignChairs $preAssignChairs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PreAssignChairs  $preAssignChairs
     * @return \Illuminate\Http\Response
     */
    public function destroy(PreAssignChairs $preAssignChairs)
    {
        //
    }
}
