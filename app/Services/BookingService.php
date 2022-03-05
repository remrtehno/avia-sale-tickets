<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Chairs;
use App\Models\Flights;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
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

  public function isDateValidInfants(CarbonImmutable $departureValue)
  {
    if (!request()->has('infants')) {
      return true;
    }

    $departureInfant = $departureValue->subYears(2);

    $infants = request()->get('infants', []);

    foreach ($infants as $infant) {
      $infantBirthday = new Carbon($infant['birthday']);
      if (!$infantBirthday->greaterThan($departureInfant)) {
        return false;
      }
    }

    return true;
  }

  public function isDateValidChidren(CarbonImmutable $departureValue)
  {
    if (!request()->has('children')) {
      return true;
    }

    $departureInfant = $departureValue->subYears(2);
    $departureChildren = $departureValue->subYears(12);
    $children = request()->get('children', []);

    foreach ($children as $child) {
      $childBirthday = new Carbon($child['birthday']);

      $lessThanOrEqualToInfant = $childBirthday->lessThanOrEqualTo($departureInfant);
      $greaterThanChild = $childBirthday->greaterThan($departureChildren);

      if (!($lessThanOrEqualToInfant && $greaterThanChild)) {
        return false;
      }
    }

    return true;
  }

  public function isDateValidAdults(CarbonImmutable $departureValue)
  {
    if (!request()->has('adults')) {
      return true;
    }

    $departureAdult = $departureValue->subYears(18);

    $adults = request()->get('adults', []);

    foreach ($adults as $adult) {
      $adultBirthday = new Carbon($adult['birthday']);
      if (!$adultBirthday->lessThan($departureAdult)) {
        return false;
      }
    }

    return true;
  }

  public function isDatesValid(Flights $flight)
  {
    $departureValue = $flight->getDeparute();
    $departureValue->hour = 0;
    $departureValue->minute = 0;
    $departureValue->second = 0;

    $departure = new CarbonImmutable($departureValue);

    return
      $this->isDateValidInfants($departure)
      && $this->isDateValidChidren($departure)
      && $this->isDateValidAdults($departure);
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
      $chair->status = Chairs::BOOKED;
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
