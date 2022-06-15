<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Contacts;
use App\Models\Pages;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class SiteSettings extends Component
{

    public $contacts, $emailHeader, $emailFooter, $phoneHeader, $phoneFooter, $address;
    public $pages;
    public $updateMode = false;

    protected $rules = [
        'pages.*.title' => 'required|string|min:6',
        'pages.*.content' => 'required|string|max:500',
    ];

    public function render()
    {
        return view('livewire.dashboard.site-settings');
    }

    public function mount()
    {
        $this->contacts = Contacts::first();
        $this->emailHeader = $this->contacts->email_header;
        $this->emailFooter = $this->contacts->email_footer;
        $this->phoneHeader = $this->contacts->phone_header;
        $this->phoneFooter = $this->contacts->phone_footer;
        $this->address = $this->contacts->address;

        $this->pages = Pages::all();
    }


    public function update()
    {

        $this->validate([
            'emailHeader' => 'required',
            'emailFooter' => 'required',
            'phoneHeader' => 'required',
            'phoneFooter' => 'required',
            'address'     => 'required',
        ]);

        $record = Contacts::first();
        $result = $record->update([
            'email_header' => $this->emailHeader,
            'email_footer' => $this->emailFooter,
            'phone_header' => $this->phoneHeader,
            'phone_footer' => $this->phoneFooter,
            'address' => $this->address,
        ]);

        $this->success($result);
    }

    public function updatePages()
    {
        foreach ($this->pages as $post) {
            $post->save();
        }

        $this->success();
    }

    public function success($result = true)
    {
        if ($result) {
            session()->flash('success', 'Updated Successfully!!');
        }
    }
}
