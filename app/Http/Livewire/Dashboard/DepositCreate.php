<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Deposit;
use App\Models\User;
use Livewire\Component;

class DepositCreate extends Component
{
    public $deposit, $users, $depositId, $updateMode;

    protected $rules = [
        'deposit.date' => 'required|string',
        'deposit.sum' => 'required|string',
        'deposit.customer_id' => 'required|string',
        'deposit.comment' => 'required|string',
    ];


    public function render()
    {
        return view('livewire.dashboard.deposit-create');
    }

    public function mount()
    {
        $this->deposit = $this->depositId ? Deposit::findOrFail($this->depositId) : new Deposit;
        $this->users = User::where('is_approved', 1)->get();
    }

    public function store()
    {
        $this->validate();

        $this->deposit->seller_id = auth()->user()->id;
        $this->deposit->save();

        session()->flash('success', 'Record Created Successfully.');
    }
}
