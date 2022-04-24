@extends('layout')

@php
$storeId = 7667;
$amount = number_format($booking->order->get(0)->total, 2, '', '');
$orderId = $booking->order->get(0)->uuid;
$apiKey = 'rykSOxffSB9rOkCxrspPSbF1vgEn7VRR';
$sha256 = hash('sha256', $storeId . $amount . $orderId . $apiKey);
@endphp

@section('content')
  <div id="content" class="booking">
    <div class="container booking-success">
      <div class="row">
        <div class="col-md-6 col-centered">
          <h3 class="text-center">Бронирование</h3>
          <p class="text-center border-bottom">После оплаты, вам придет уведомление на почту, с деталями заказа.</p>

          <p>

          </p>

          @include('booking.partials._confirm-form')

          <p style="height: 20px"></p>

          <button type="submit" onclick="makePay()" class="btn btn-default btn-cf-submit3 w-100 booking-submit">
            ОПЛАТИТЬ
          </button>
          <div class="paddinger"></div>
        </div>
      </div>

    </div>
  </div>

  <div id="parent-frame"></div>


  <input type="hidden" id="sha256" value=" {{ $sha256 }}">
@endsection


@section('js')
  <script>
    var store_id = "7667";
    var amount = "{{ number_format($booking->order->get(0)->total, 2, '', '') }}";
    var invoiceId = "{{ $booking->order->get(0)->uuid }}";
    var apiKey = "rykSOxffSB9rOkCxrspPSbF1vgEn7VRR"
  </script>
  <script src="https://cdn.pays.uz/checkout/js/v1.0.1/test-checkout.js"></script>

  <script>
    function makePay() {
      paymo_open_widget({
        parent_id: "parent-frame",
        store_id: '{{ $storeId }}',
        account: '{{ $orderId }}',
        success_redirect: "http://localhost/payment/success/" + '{{ $sha256 }}',
        fail_redirect: "http://localhost/404",
        version: "1.0.0",
        amount: '{{ $amount }}',
        details: "",
        lang: "ru",
        key: '{{ $sha256 }}',
      });

    }
  </script>
@endsection
