<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    private $emailService;

    function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorizeOnlyAdmins();

        return view(
            'dashboard.users.index',
            ['users' => User::all()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorizeOnlyAdmins();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorizeOnlyAdmins();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorizeOnlyAdmins();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorizeOnlyAdmins();


        return view(
            'dashboard.users.edit',
            ['user' => User::find($id)]
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
        $this->authorizeOnlyAdmins();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorizeOnlyAdmins();

        User::find($id)->delete();

        return back();
    }

    public function approve(User $user)
    {
        $user->is_approved = 1;
        $this->emailService->approveEmail($user->email);
        return $user->save() ? $this->index()->with('success', 'Пользователь подтвержден') : abort(505);
    }

    public function deactivate(User $user)
    {
        $user->is_approved = 0;
        return $user->save() ? $this->index()->with('success', 'Пользователь деактивирован') : abort(505);
    }

    public function authorizeOnlyAdmins()
    {
        if (!Auth::user()?->is_admin) {
            return abort('401');
        }
    }
}
