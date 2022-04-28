<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\CustomerContacts;
use App\Services\CustomerContactsService;
use Illuminate\Http\Request;

class CustomerContactsController extends Controller
{
    private $service;
    function __construct(CustomerContactsService $customerContactsService)
    {
        $this->service = $customerContactsService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->passport_number;
        $user_id = $request->user_id;
        $type = $request->type;

        $canBeShowed = strlen($query) > 2 && $user_id;

        return response()->json([
            'customers' =>
            $canBeShowed
                ? CustomerContacts::where([
                    'user_id' => $user_id,
                    'type' => $type,
                ])->where("passport_number", "like", "%$query%")->limit(20)->get()
                : null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $query = $request->input('passport_number');

        return response()->json([
            'customers' => $this->service->store($query)
        ]);
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
