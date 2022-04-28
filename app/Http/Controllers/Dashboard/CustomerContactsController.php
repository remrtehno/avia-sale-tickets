<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CustomerContacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'dashboard.customer-contacts.index',
            [
                'customerContacts' => CustomerContacts::where('user_id', Auth::id())->get()
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
        return view(
            'dashboard.customer-contacts.edit',
            [
                'customerContact' => CustomerContacts::where([
                    'user_id' => Auth::id(),
                    'id' => $id
                ])->first()
            ]
        );
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

        /// @TODO FUUU NEED TO REFACTORING
        $validated = $request->validate([
            "name" => "required",
            "surname" => "required",
            "surname2" => "required",
            "email" => "required",
            "birthday" => "required",
            "gender" => "required",
            "passport_date" => "required",
            "passport_number" => "required",
            "citizenship" => "required",
            "tel" => "required",
            "visa" => "required",
            "address" => "required"

        ]);

        CustomerContacts::where('id', $id)->update($validated);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        CustomerContacts::findOrfail($id)->delete();

        return back();
    }
}
