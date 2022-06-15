<?php

namespace App\Services;

use App\Jobs\MonitorPendingOrder;
use App\Models\Booking;
use App\Models\Chairs;
use App\Models\Flights;
use App\Models\Order;
use App\Models\Ticket;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Auth;
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

    MonitorPendingOrder::dispatch($booking->order->first())->delay(Order::BOOKED_SECONDS_LIMIT);

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
    $adults = request()->get(Ticket::ADULTS, []);
    $children = request()->get(Ticket::CHILDREN, []);
    $infants = request()->get(Ticket::INFANTS, []);

    $tickets = $booking->tickets();

    $user_id = Auth::check() ? Auth::user()->id : 0;

    foreach ($adults as $adult) {
      $tickets->create(array_merge($adult, [
        'uuid' => $this->UUID(),
        'user_id' => $user_id,
        'status' => Booking::BOOKED,
        'price' => $this->getPriceFromFlight('adult', $adult, $flight),
      ]));
    }

    foreach ($children as $child) {
      $tickets->create(array_merge($child, [
        'uuid' => $this->UUID(),
        'user_id' => $user_id,
        'status' => Booking::BOOKED,
        'price' => $this->getPriceFromFlight('child', $child, $flight),
      ]));
    }

    foreach ($infants as $infant) {
      $tickets->create(array_merge($infant, [
        'uuid' => $this->UUID(),
        'user_id' => $user_id,
        'status' => Booking::BOOKED,
        'price' => $this->getPriceFromFlight('infant', $infant, $flight),
      ]));
    }
  }

  public function getPriceFromFlight($type = 'adult', $passengerData, $flight)
  {
    $price = 'price_' . $type;
    $price .= array_key_exists('bag', $passengerData) ? "_bag" : '';

    return $flight->{$price};
  }

  public function assignChairs(Booking $booking, Flights $flight)
  {
    $free_seats = $flight->chairs->filter(function ($chair) {
      return $chair->booking_id === null || $chair->status === Order::AVAILABLE;
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

    $totalPrice = (int) $booking->tickets->pluck('price')->reduce(function ($sum, $price) {
      return $sum + $price;
    });


    //@TODO Split between users
    // dd($booking->chairs->groupBy('user_id')->toArray());
    // dd($booking->chairs->first()->seller_id);
    $sellerId = $booking->chairs->first()?->seller_id;
    $priceAdult = $booking->chairs->first()?->flight->price_adult;

    return $booking->order()->create([
      'uuid' => $this->UUIDOrder(),
      'status' => Booking::BOOKED,
      'flight_id' => $flight_id,
      'booking_id' => $booking->id,
      'total' =>  $totalPrice,
      'exchange_rate' => 1,
      'seller_id' => $sellerId ? $sellerId : 0,
      'count_chairs' => $booking->chairs->count(),
      //@TODO getPrice()
      'price_adult' => $priceAdult ? $priceAdult : 0
    ]);
  }

  public function unassignChairs(Booking $booking)
  {
    foreach ($booking->chairs as $chair) {
      $chair->booking()->dissociate($booking);
      $chair->save();
    }
  }

  public function UUID()
  {
    return random_int(000000000000, 1000000000000);
  }
  static function UUIDOrder()
  {
    $uuid = strtoupper(bin2hex(openssl_random_pseudo_bytes(3)));
    return substr($uuid, 1);
  }
}
