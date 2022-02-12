<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Chairs;
use App\Models\Flights;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\PseudoTypes\True_;

class BookingService
{
  public function isAvailable()
  {
    $totalPassengers =
      count(request()->get('adults', []))
      + count(request()->get('children', []));

    return $totalPassengers <= request()->seats_left;
  }

  public function storeTickets(Booking $booking)
  {
    $adults = request()->get('adults', []);
    $children = request()->get('children', []);
    $infants = request()->get('infants', []);

    $tickets = $booking->tickets();

    foreach ($adults as $adult) {
      $tickets->create($adult);
    }

    foreach ($children as $child) {
      $tickets->create($child);
    }

    foreach ($infants as $infant) {
      $tickets->create($infant);
    }
  }

  public function assignChairs(Booking $booking, Flights $flight)
  {
    $free_seats = $flight->chairs->filter(function ($chair) {
      return $chair->booking_id === null;
    })->values();

    $tickets = $booking->tickets->filter(function ($ticket) {
      return $ticket->type !== $ticket::INFANTS;
    });

    if ($free_seats->count() < $tickets->count()) {
      abort(403, 'Недостаточно мест');
    }

    for ($i = 0; $i < $tickets->count(); $i++) {
      $chair = $free_seats[$i];
      $chair->booking()->associate($booking);
      $chair->save();
    }
  }

  public function unassignChairs(Booking $booking)
  {
    foreach ($booking->chairs as $chair) {
      $chair->booking()->dissociate($booking);
      $chair->save();
    }
  }
}
