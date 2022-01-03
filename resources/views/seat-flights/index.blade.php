@extends('layout')


@section('content')
<x-banner>
</x-banner>


<x-breadcrumbs :route="'seat-flight'"></x-breadcrumbs>

<div id="content">
  <div class="container">

      <div class="tabs_wrapper tabs1_wrapper">
          @include('seat-flights._search-flight', ['route' => '?'])

          <div class="row">
            <div class="col-sm-3">

                <form action="javascript:;" class="form2 form2_flights">
                    <div class="select1_wrapper clearfix">
                        <label>Passenger:</label>
                        <div class="select1_inner">
                            <select class="select2 select select3" style="width: 100%">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>
                    </div>
                </form>

                <ul class="ul3">
                    <li><a href="#">Star Raiting</a></li>
                    <li><a href="#">Price Range</a></li>
                    <li><a href="#">Departure Ports</a></li>
                    <li><a href="#">Trip Duration</a></li>
                    <li><a href="#">Ships</a></li>
                </ul>

                <div class="sm_slider sm_slider1">
                    <a class="sm_slider_prev" href="#"></a>
                    <a class="sm_slider_next" href="#"></a>
                    <div class="">
                        <div class="carousel-box">
                            <div class="inner">
                                <div class="carousel main">
                                    <ul>
                                        <li>
                                            <div class="sm_slider_inner">
                                                <div class="txt1">Lorem ipsum dolor sit amet,
                                                    consectetuer adipiscing elit, sed diam nonummy
                                                    nibh euismod tincidunt ut laoreet dolore magna
                                                    aliquam erat volutpat. Ut wisi enim ad minim
                                                    veniam.
                                                </div>
                                                <div class="txt2">George Smith</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sm_slider_inner">
                                                <div class="txt1">Lorem ipsum dolor sit amet,
                                                    consectetuer adipiscing elit, sed diam nonummy
                                                    nibh euismod tincidunt ut laoreet dolore magna
                                                    aliquam erat volutpat. Ut wisi enim ad minim
                                                    veniam.
                                                </div>
                                                <div class="txt2">Adam Parker</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-sm-9">

                <form action="javascript:;" class="form3 clearfix">
                    <div class="select1_wrapper txt">
                        <label>Sort by:</label>
                    </div>
                    <div class="select1_wrapper sel">
                        <div class="select1_inner">
                            <select class="select2 select" style="width: 100%">
                                <option value="1">Name</option>
                                <option value="2">Name2</option>
                                <option value="2">Name3</option>
                            </select>
                        </div>
                    </div>
                    <div class="select1_wrapper sel">
                        <div class="select1_inner">
                            <select class="select2 select" style="width: 100%">
                                <option value="1">Price</option>
                                <option value="2">Price2</option>
                                <option value="2">Price3</option>
                            </select>
                        </div>
                    </div>
                    <div class="select1_wrapper sel">
                        <div class="select1_inner">
                            <select class="select2 select" style="width: 100%">
                                <option value="1">Raiting</option>
                                <option value="2">Raiting2</option>
                                <option value="2">Raiting3</option>
                            </select>
                        </div>
                    </div>
                    <div class="select1_wrapper sel">
                        <div class="select1_inner">
                            <select class="select2 select" style="width: 100%">
                                <option value="1">Popularity</option>
                                <option value="2">Popularity2</option>
                                <option value="2">Popularity3</option>
                            </select>
                        </div>
                    </div>
                    <div class="select1_wrapper buttons">
                        <a href="#" class="btn-default s1"></a>
                        <a href="#" class="btn-default s2"></a>
                        <a href="#" class="btn-default s3"></a>
                    </div>
                </form>

                <div class="row">
                  @foreach ($seat_flights as $seat_flight )
                     <div class="col-sm-4 seat-flight-item">
                        <div class="thumb4">
                            <div class="thumbnail clearfix">
                                <figure>
                                    <img src="{{ $seat_flight->img }}" alt="{{ $seat_flight->title }}"
                                         class="img-responsive">
                                </figure>
                                <div class="caption">
                                    <div class="txt1 seat-flight-title">{{ $seat_flight->from }} - {{ $seat_flight->to }}</div>
                                    
                                    <div class="txt1 seat-flight-title">{{ $seat_flight->getDate() }}</div>
                                   
                                    <div class="txt3 clearfix">
                                        <div class="left_side">
                                            <div class="price">{{ $seat_flight->price }}$</div>
                                            <div class="nums">avg/person</div>
                                        </div>
                                        <div class="right_side">
                                          <a href="{{ route('seat-flights.show', ['seat_flight' => $seat_flight->id]) }}"
                                                                   class="btn-default btn1">Перейти</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  @endforeach

                  @if (!$seat_flights->count())
                    <div class="col-xs-12">
                        <div class="alert alert-warning">
                            @if ($closestDateFound)
                                К сожалению на указанную дату ничего не найдено, 
                                <b>
                                   показать результаты на другую 
                                   <a href="{{ $closestDateFound->date }}"> ближайшую дату.</a>
                                </b>
                            @else
                                К сожалению ничего не найдено, 
                                <b>попробуйте изменить параметры поиска.</b>
                            @endif
                        </div>
                    </div> 
                  @endif

                  {{ $seat_flights->withQueryString()->links() }}
                </div>
            </div>
        </div>
      </div>


  </div>
</div>
@endsection