@extends('layout')

@section('content')
  <div
    class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
      <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
          <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
        @else
          <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

          @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
          @endif
        @endauth
      </div>
    @endif


  </div>


  <div id="main">
    <div id="slider_wrapper">
      <div class="container">
        <div id="slider_inner">
          <div class="">
            <div id="slider">
              <div class="slider_pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="front_tabs">
      <div class="container">
        @include('flights._search-flights', [
            'route' => route('flights.index'),
            'search_list_cities' => $search_list_cities,
        ])
      </div>
    </div>

    @if (count($flightsTop))
      <div id="popular_cruises1">
        <div class="container">
          <h2 class="animated">TOP</h2>

          <br /><br />

          <div class="animated row brick-flights" data-animation="fadeIn" data-animation-delay="300">
            @foreach ($flightsTop as $item)
              <div class="col-md-2">
                @include('partials.flight-item', [
                    'item' => $item,
                ])
              </div>
            @endforeach

          </div>
        </div>
      </div>
    @endif

    <div id="popular_cruises1">
      <div class="container">
        <h2 class="animated">POPULAR CRUISES</h2>


        <br /><br />

        <div id="popular_wrapper" class="animated" data-animation="fadeIn" data-animation-delay="300">
          <div id="popular_inner">
            <div class="">
              <div id="popular" class="popular-main">
                <div class="">
                  <div class="carousel-box">
                    <div class="inner">
                      <div class="carousel main">
                        <ul>
                          @foreach ($flights as $item)
                            <li>
                              @include('partials.flight-item-slider', [
                                  'item' => $item,
                              ])
                            </li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="popular_pagination popular_pagination-driver"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>

@endsection
