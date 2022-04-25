@extends('layout')


@section('content')
  <div id="content" class="booking">
    <div class="container booking-success">
      <div class="row">
        <div class="col-md-6 col-centered">
          <h3 class="text-center">Бронь просрочена</h3>
          <p class="text-center border-bottom">{{ $order::BOOKING_MINUTES_LIMIT }} минут истекло с момента создания брони
          </p>
          <p class="text-center">Вам нужно заново приобрести билеты</p>
          <p class="py-5"></p>
          <div class="paddinger"></div>
        </div>
      </div>

    </div>
  </div>
@endsection
