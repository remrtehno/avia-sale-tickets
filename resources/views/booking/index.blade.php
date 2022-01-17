@extends('layout')

@section('content')
<div id="content">
  <div class="container booking-success">
      <div class="row">
          <div class="col-md-6 col-centered">
              <div class="paddinger"></div>
              <h3 class="text-center"><span>Thank you</span>,<br> Your booking is Complete!</h3>

              <p class="text-center border-bottom">Your confirmation number is: <span>{{ $booking->uuid }}</span></p>

              <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Aenean luctus lectus ac libero faucibus, eget feugiat nulla ornare.
                  Duis ut pellentesque massa.
                  Aenean fringilla mauris leo, quis ornare est blandit ut.
              </p>

              <div class="paddinger"></div>
          </div>
      </div>

  </div>
</div>
@endsection