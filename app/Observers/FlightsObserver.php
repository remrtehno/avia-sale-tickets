<?php

namespace App\Observers;

use App\Models\Flights;
use App\Services\EmailService;

class FlightsObserver
{

    private $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    /**
     * Handle the Flights "created" event.
     *
     * @param  \App\Models\Flights  $flights
     * @return void
     */
    public function created(Flights $flights)
    {
        //
    }

    /**
     * Handle the Flights "updated" event.
     *
     * @param  \App\Models\Flights  $flights
     * @return void
     */
    public function updated(Flights $flights)
    {
        if ($flights->wasChanged(Flights::OBSERVE_COLUMNS)) {
            //, $flights->getChanges()
            dd($this->emailService, $flights->getAllCustomersEmails());
        }
    }

    /**
     * Handle the Flights "deleted" event.
     *
     * @param  \App\Models\Flights  $flights
     * @return void
     */
    public function deleted(Flights $flights)
    {
        //
    }

    /**
     * Handle the Flights "restored" event.
     *
     * @param  \App\Models\Flights  $flights
     * @return void
     */
    public function restored(Flights $flights)
    {
        //
    }

    /**
     * Handle the Flights "force deleted" event.
     *
     * @param  \App\Models\Flights  $flights
     * @return void
     */
    public function forceDeleted(Flights $flights)
    {
        //
    }
}
