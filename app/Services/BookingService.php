<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Flights;
use Carbon\Carbon;
use Illuminate\Support\Str;


class BookingService
{

  public function store(Flights $flight)
  {
    $booking = Booking::create([
      'uuid' => (string) Str::uuid(),
      'flights_id' => request('flight_id')
    ]);

    $this->storeTickets($booking, $flight);
    $this->assignChairs($booking, $flight);

    $flight->booking_id = $booking->id;
    $flight->save();

    return $booking;
  }

  public function isDateValidInfants(Carbon $departure)
  {
    $departure->subYears(2);
    $infants = request()->get('infants', []);

    foreach ($infants as $infant) {
      $infant = new Carbon($infant['birthday']);
      if (!$infant->greaterThan($departure)) {
        return false;
      }
    }

    return true;
  }

  public function isDateValidChidren(Carbon $departure)
  {
    $children = request()->get('children', []);

    return true;

    dd($departure);

    foreach ($children as $child) {
      $child = new Carbon($child['birthday']);
      if (!$child->greaterThan($departure)) {
        return false;
      }
    }

    return true;
  }

  public function isDatesValid(Flights $flight)
  {
    $departure = $flight->getDeparute();
    $departure->hour = 0;
    $departure->minute = 0;
    $departure->second = 0;

    return $this->isDateValidInfants($departure) && $this->isDateValidChidren($departure);
  }

  public function isAvailable()
  {
    $totalPassengers =
      count(request()->get('adults', []))
      + count(request()->get('children', []));

    return $totalPassengers <= request()->seats_left;
  }

  public function storeTickets(Booking $booking, Flights $flight)
  {
    $adults = request()->get('adults', []);
    $children = request()->get('children', []);
    $infants = request()->get('infants', []);

    $tickets = $booking->tickets();

    foreach ($adults as $adult) {

      $tickets->create(array_merge($adult, [
        'status' => Booking::BOOKED,
        'price' => $flight->price_adult
      ]));
    }

    foreach ($children as $child) {
      $tickets->create(array_merge($child, [
        'status' => Booking::BOOKED,
        'price' => $flight->price_child
      ]));
    }

    foreach ($infants as $infant) {
      $tickets->create(array_merge($infant, [
        'status' => Booking::BOOKED,
        'price' => $flight->price_infant
      ]));
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
