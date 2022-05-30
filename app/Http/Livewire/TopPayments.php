<?php

namespace App\Http\Livewire;

use App\Models\Flights;
use App\Models\TopPayments as ModelsTopPayments;
use App\Models\TopPeriodsToFlights;
use App\Models\User;
use Livewire\Component;

class TopPayments extends Component
{

    public $topPayments;
    public $topPayment;
    public $isOpen;
    public $flights;
    public $users;
    public $periods;

    protected $rules = [
        'topPayment.date' => 'required',
        'topPayment.sum' => 'required',
        'topPayment.customer_id' => 'required',
        'topPayment.flight_id' => 'required',
        'topPayment.tariff' => 'required'
    ];

    public function render()
    {
        return view('livewire.top-payments');
    }

    public function mount()
    {
        $this->topPayments = ModelsTopPayments::all();
        $this->topPayment = new ModelsTopPayments;
        $this->flights = Flights::all();
        $this->users = User::where('is_approved', 1)->get();
        $this->periods = TopPeriodsToFlights::periods();
    }

    public function create()
    {
        $this->topPayment = new ModelsTopPayments;
    }

    public function edit($id)
    {
        $this->topPayment = ModelsTopPayments::findOrFail($id);
    }

    public function delete($id)
    {
        ModelsTopPayments::find($id)->delete();
        session()->flash('success', 'Record Deleted Successfully.');
    }

    public function store()
    {
        $this->topPayment->seller_id = auth()->user()->id;
        $this->validate();
        $this->topPayment->save();

        session()->flash('success', 'Post Created Successfully.');
    }
}
