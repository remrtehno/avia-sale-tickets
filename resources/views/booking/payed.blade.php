@extends('layout')


@section('content')
  <div id="content" class="booking">
    <div class="container booking-success">
      <div class="row">
        <div class="col-md-6 col-centered">
          <h3 class="text-center">Заказ оплачен</h3>
          <p class="text-center border-bottom">Проверьте вашу почту</p>
          <p class="py-5"></p>
          <h5 class="text-dark my-5 py-5">ID Заказа: <b red>{{ $booking->order->first()->uuid }}</b></h5>

          <h5 class="text-dark py-5">Вы оплатили за авиабилет(ы) в сумме:
            <b red>{{ $booking->order->first()->getTotalFormatted() }}
              UZS</b>
          </h5>

          <h5 class="text-dark py-5">

          </h5>


          <p style="height: 20px"></p>
          <div class="paddinger"></div>
        </div>
      </div>

    </div>
  </div>
@endsection
