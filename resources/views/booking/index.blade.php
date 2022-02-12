@extends('layout')

@section('content')
  <div id="content">
    <div class="container booking-success">
      <div class="row">
        <div class="col-md-6 col-centered">
          <h3 class="text-center">Бронирование</h3>
          <p class="text-center border-bottom">ID бронирования: <span>{{ $booking->uuid }}</span></p>

          <p>
            После оплаты, вам придет уведомление на почту, с деталями заказа.
          </p>

          {{ $booking->id }}
          @foreach ($booking->tickets as $tk)
            {{ $tk->name }}
          @endforeach

          @foreach ($booking->chairs as $tk)
            id: {{ $tk->id }} ---
            bk: {{ $tk->booking_id }} <br>
          @endforeach


          @if (Auth::check())
            @include('booking.partials._confirm-form')
          @else
            @include('booking.partials._confirm-form-user')
          @endif


          <p></p>
          <button type="submit" class="btn btn-default btn-cf-submit3 w-100">
            ОПЛАТИТЬ
          </button>
          <div class="paddinger"></div>
        </div>
      </div>

    </div>
  </div>
@endsection
