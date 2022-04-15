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

  <div id="parent-frame"></div>
@endsection


@section('js')
  <script src="https://cdn.pays.uz/checkout/js/v1.0.1/test-checkout.js"></script>
  7667500000998991234567rykSOxffSB9rOkCxrspPSbF1vgEn7VRR

  <script th:inline="javascript">
    /*<![CDATA[*/
    paymo_open_widget({
      parent_id: "parent-frame",
      store_id: "7667",
      account: "998991234567",
      // terminal_id: "31",
      success_redirect: "http://localhost/payment/success/561d9ab8-53ba-41ed-8768-90707e6a56c4",
      fail_redirect: "http://localhost/404",
      // version: "1.0.0",
      amount: 500000, //500000 тийин = 5000 сумов
      details: "",
      // lang: "ru",
      key: "dc7e19338cbaadd62c5bddbcafd017961dae3f95131040ac638260981f3da201",
      // theme: "blue"
    });
    /*]]>*/
  </script>
@endsection
