<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Ticket;

class BookingService
{
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
      $ticket = Ticket::make($infant);
      $ticket->booking_id = $booking->id;
      $ticket->save();
    }
  }
}
