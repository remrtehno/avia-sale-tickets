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
              <div class="">
                <div class="carousel-box">
                  <div class="inner">
                    <div class="carousel main">
                      <ul>
                        <li>
                          <div class="slider">
                            <div
                              class="
                                                                slider_inner
                                                            ">
                              <div class="txt1">
                                <span>Welcome
                                  To
                                  Our</span>
                              </div>
                              <div class="txt2">
                                <span>TRAVEL
                                  AGENCY</span>
                              </div>
                              <div class="txt3">
                                <span>Nam
                                  liber
                                  tempor
                                  cum
                                  soluta
                                  nobis
                                  eleifend
                                  option
                                  congue
                                  nihil
                                  imperdiet
                                  doming
                                  id
                                  quod.</span>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="slider">
                            <div
                              class="
                                                                slider_inner
                                                            ">
                              <div class="txt1">
                                <span>7 - Day
                                  Tour</span>
                              </div>
                              <div class="txt2">
                                <span>AMAZING
                                  CARIBBEAN</span>
                              </div>
                              <div class="txt3">
                                <span>Lorem
                                  ipsum
                                  dolor
                                  eleifend
                                  option
                                  congue
                                  nihil
                                  imperdiet
                                  doming
                                  id
                                  quod.</span>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="slider">
                            <div
                              class="
                                                                slider_inner
                                                            ">
                              <div class="txt1">
                                <span>5 Days
                                  In</span>
                              </div>
                              <div class="txt2">
                                <span>PARIS
                                  (Capital
                                  Of
                                  World)</span>
                              </div>
                              <div class="txt3">
                                <span>Nam
                                  liber
                                  tempor
                                  cum
                                  soluta
                                  nobis
                                  eleifend
                                  option
                                  congue
                                  nihil
                                  imperdiet
                                  doming
                                  id
                                  quod.</span>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="slider">
                            <div
                              class="
                                                                slider_inner
                                                            ">
                              <div class="txt1">
                                <span>12 -
                                  Day
                                  Cruises</span>
                              </div>
                              <div class="txt2">
                                <span>FROM
                                  GREECE
                                  TO
                                  SPAIN</span>
                              </div>
                              <div class="txt3">
                                <span>MEDITERRANEAN
                                  - 12 -
                                  Day
                                  Cruises
                                  By
                                  "GRAND
                                  VICTORIA
                                  III"
                                  Cruise
                                  Liner.</span>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
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


    <div id="popular_cruises1">
      <div class="container">
        <h2 class="animated">POPULAR CRUISES</h2>

        <div class="title1 animated">
          Lorem ipsum dolor sit amet, consectetuer adipiscing
          elit, sed diam nonummy nibh euismod <br />tincidunt ut
          laoreet dolore magna aliquam erat volutpat.
        </div>

        <br /><br />

        <div id="popular_wrapper" class="animated" data-animation="fadeIn" data-animation-delay="300">
          <div id="popular_inner">
            <div class="">
              <div id="popular">
                <div class="">
                  <div class="carousel-box">
                    <div class="inner">
                      <div class="carousel main">
                        <ul>
                          @foreach ($flights as $item)
                            <li>
                              @include('partials.flight-item-slider', ['item' => $item])
                            </li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="popular_pagination"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>

@endsection
