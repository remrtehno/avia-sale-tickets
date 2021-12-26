@extends('layout')


@section('content')
<x-banner>
</x-banner>


<x-breadcrumbs :route="'seat-flight'">
  {{ $seat_flight->title }}
</x-breadcrumbs>



<div id="content">
  <div class="container">

      <div class="row">
          <div class="col-sm-3">
              <img src="/static/images/advertise.png" class="img-responsive" />

          </div>
          <div class="col-sm-9">
              <div class="blog_content">


                  <div class="post post-full">
                      <h3 class="hch">{{ $seat_flight->title }}</h3>

                      <div class="clearfix"></div>

                      <p class="address">
                        {{ $seat_flight->from }}
                        /
                        {{ $seat_flight->to }}
                    </p>

                      <div class="post-story">
                          <hr>

                          <div class="post-story-body clearfix">


                              <h3>{{ $seat_flight->date->format('M d, Y')   }}</h3>
                              <ul>

                                  <li>Откуда: {{ $seat_flight->from }}</li>
                                  <li>Куда: {{ $seat_flight->to }}</li>

                              </ul>
                              <h5> {{ $seat_flight->getInfoTimeAndAirports() }}</h5>
                              <hr>
                              <h4>Details:</h4>
                              <h5>{{ $seat_flight->getTimeOnly() }} /{{ $seat_flight->getDuration() }}</h5>
                              <ul>
                                  <li>From Vaclav Havel (PRG)</li>
                                  <li>To Schiphol (AMS)</li>
                                  <li>KLM 1356</li>
                                  <li>BOEING 737-800 (WINGLETS) PASSENGER | Snack</li>
                                  <li>Economy/Coach (L)</li>
                                  <li><a href="">Preview availability</a></li>
                                  <li>Total distance: 439 mi</li>
                                  <li><b>1h 20m stop / in Amsterdam (AMS)</b></li>
                              </ul>
                              <h5>5:20pm -> 7:25pm / 8h 5m</h5>
                              <ul>
                                  <li>From: Schiphol (AMS)</li>
                                  <li>To: John F. Kennedy Intl. (JFK)</li>
                                  <li>KLM 643</li>
                                  <li>BOEING 787-9 | Meal</li>
                                  <li>Economy/Coach (R)</li>
                                  <li><a href="">Preview availability</a></li>
                                  <li>Total distance: 3,632 mi</li>

                              </ul>
                              <p>
                                  BAG FEES: Baggage fees when purchased at the airport (Prices may be cheaper if
                                  purchased online
                                  with KLM) </p>
                              <ul>
                                  <li>Carry on: No fee</li>
                                  <li>1st checked bag: No fee up to 23 kg</li>
                                  <li>2nd checked bag: $91.00 up to 23 kg</li>
                                  <li>How to pay: KLM</li>
                              </ul>
                          </div>
                         
                      </div>
                  </div>


              </div>
          </div>
      </div>


  </div>
</div>




@endsection