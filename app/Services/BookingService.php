<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Chairs;
use App\Models\Flights;
use App\Models\MetaInfo;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Support\Str;


class BookingService
{


  public $textError = "Неверная дата рождения для:";
  public $errors = [];

  public function store(Flights $flight)
  {
    $booking = Booking::create([
      'uuid' => (string) Str::uuid(),
      'flights_id' => request('flight_id')
    ]);

    $this->storeTickets($booking, $flight);
    $this->assignChairs($booking, $flight);
    $this->createOrder($booking, $flight->id);

    $flight->booking_id = $booking->id;
    $flight->save();

    return $booking;
  }

  public function isDateValidInfants(CarbonImmutable $departureValue)
  {
    $departureInfant = $departureValue->subYears(2);
    $infants = request()->get('infants', []);

    foreach ($infants as $infant) {
      $infantBirthday = new Carbon($infant['birthday']);
      if (!$infantBirthday->greaterThan($departureInfant)) {
        $this->errors[] = "$this->textError Младенец";
        return false;
      }
    }

    return true;
  }

  public function isDateValidChidren(CarbonImmutable $departureValue)
  {
    $departureInfant = $departureValue->subYears(2);
    $departureChildren = $departureValue->subYears(12);
    $children = request()->get('children', []);

    foreach ($children as $child) {
      $childBirthday = new Carbon($child['birthday']);

      $lessThanOrEqualToInfant = $childBirthday->lessThanOrEqualTo($departureInfant);
      $greaterThanChild = $childBirthday->greaterThan($departureChildren);

      if (!($lessThanOrEqualToInfant && $greaterThanChild)) {
        $this->errors[] = "$this->textError Детский";
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
        $this->errors[] = "$this->textError Взрослый";
        return false;
      }
    }

    return true;
  }

  public function isDatesValid(Flights $flight)
  {

    $this->errors = [];

    $departureValue = $flight->getDeparute();
    $departureValue->hour = 0;
    $departureValue->minute = 0;
    $departureValue->second = 0;

    $departure = new CarbonImmutable($departureValue);

    $isDateValidInfants = $this->isDateValidInfants($departure);
    $isDateValidChidren = $this->isDateValidChidren($departure);
    $isDateValidAdults = $this->isDateValidAdults($departure);

    return
      $isDateValidInfants
      &&  $isDateValidChidren
      &&  $isDateValidAdults;
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

  public function createOrder(Booking $booking, $flight_id)
  {

    $exchangeRate = app('exchange-rate');

    $totalPrice = (int) $booking->tickets->pluck('price')->reduce(function ($sum, $price) {
      return $sum + $price;
    });

    $orderTotal = $totalPrice * $exchangeRate;

    // dd($booking->chairs);

    return $booking->order()->create([
      'status' => Booking::BOOKED,
      'flight_id' => $flight_id,
      'booking_id' => $booking->id,
      'total' =>  $orderTotal,
      'exchange_rate' => $exchangeRate
    ]);
  }

  public function unassignChairs(Booking $booking)
  {
    foreach ($booking->chairs as $chair) {
      $chair->booking()->dissociate($booking);
      $chair->save();
    }
  }
}
