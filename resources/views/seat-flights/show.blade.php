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
                                <h5 class="seat-flight-intro-title">
                                    {!! $seat_flight->intro_title !!}
                                </h5>
                                <div class="seat-flight-description">
                                    {!! $seat_flight->description !!}
                                </div>

                              <h3>{{ $seat_flight->getDate() }}</h3>
                              <ul>

                                  <li>Откуда: {{ $seat_flight->from }}</li>
                                  <li>Куда: {{ $seat_flight->to }}</li>

                              </ul>
                              <h5> {{ $seat_flight->getInfoTimeAndAirports() }}</h5>
                              <hr>
                              <h4>Details:</h4>
                              <h5>{{ $seat_flight->getTimeOnly() }} /{{ $seat_flight->getDuration() }}</h5>
                              
                              <div class="seat-flight-content">
                                  {!! $seat_flight->content !!}
                              </div>
                            
                          </div>
                         
                      </div>
                  </div>


              </div>
          </div>
      </div>


  </div>
</div>




@endsection