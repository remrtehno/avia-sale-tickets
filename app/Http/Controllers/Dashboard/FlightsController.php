<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignChairsToUser;
use App\Http\Requests\StoreFlightRequest;
use App\Models\Chairs;
use App\Models\Flights;
use App\Models\MetaInfo;
use App\Models\User;
use App\Services\FlightService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlightsController extends Controller
{

    private $service;

    function __construct(FlightService $flightService)
    {
        $this->service = $flightService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.flights.index', ['flights' => Flights::where('user_id', Auth::user()->id)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flight_comment = MetaInfo::where('meta_name', 'flight_comment')->first();

        return view('dashboard.flights.create', [
            'flight_comment' =>  $flight_comment->meta_content
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFlightRequest $request)
    {
        $newFlight = Flights::make($request->all());

        $newFlight->rating = '0';
        $newFlight->user_id = Auth::user()->id;

        $newFlight->save();

        $newFlight->storeFiles();

        for ($i = 0; $i < $request->count_chairs; $i++) {
            $newFlight->chairs()->create([
                'uuid' => $newFlight->date->format('Y-m-d') .
                    '-' . $newFlight->flight .
                    '-' . $i,
                'flight_id' => $newFlight->id,
                'type' => Chairs::ADULT
            ]);
        }

        return redirect()->route('dashboard.flights.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return redirect()->route('flights.show', ['flight' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flight = Flights::findOrFail($id);
        $this->authorize($flight);

        $flight_comment = MetaInfo::where('meta_name', 'flight_comment')->first();

        $users = User::all();

        // dd($flight->chairs()->where('user_id', '!=', null)->groupBy('user_id')->get());

        return view('dashboard.flights.edit', [
            'users' => $users,
            'flight' => $flight,
            'flight_comment' =>  $flight_comment->meta_content,
            'assignedChairs' => Collection::unwrap($flight->chairs->whereNotNull('user_id')->groupBy('user_id'))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFlightRequest $request, $id)
    {

        $flight = Flights::findOrFail($id);
        $this->authorize($flight);

        $validatedData = $request->all();

        $flight->fill($validatedData);

        $flight->save();

        $flight->storeFiles(true);

        return redirect()->route('dashboard.flights.edit', ['flight' => $flight->id])->withStatus('Обновленно');
    }

    public function createChair(Flights $flight)
    {
        $totalChairs = $flight->chairs->count();

        $newChair = $flight->chairs()->create([
            'uuid' => $flight->date->format('Y-m-d') .
                '-' . $flight->flight .
                '-' . ++$totalChairs,
            'flight_id' => $flight->id,
            'type' => Chairs::ADULT
        ]);

        return
            redirect()
            ->route('dashboard.flights.edit', ['flight' => $flight->id])
            ->withStatus("Новое место добавлено ID: $newChair->uuid");
    }


    public function assignChairsToUser(AssignChairsToUser $request, Flights $flight)
    {
        $userCustomer = User::findOrFail($request->user_id);
        $count = $this->service->assignChairs($flight, $userCustomer);

        if ($count > 0) {
            return back()->with('assigned_to', "Вы продали кресла $count шт. пользователю $userCustomer->name $userCustomer->email");
        } else {
            return back()->with('not_avaliable', "Свободные кресла $count шт.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flight = Flights::findOrFail($id);
        $flight->delete();

        return redirect()->route('dashboard.flights.index');
    }
}
