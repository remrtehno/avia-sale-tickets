@extends('layout')

@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
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
                                                            "
                                                        >
                                                            <div
                                                                class="txt1"
                                                            >
                                                                <span
                                                                    >Welcome
                                                                    To
                                                                    Our</span
                                                                >
                                                            </div>
                                                            <div
                                                                class="txt2"
                                                            >
                                                                <span
                                                                    >TRAVEL
                                                                    AGENCY</span
                                                                >
                                                            </div>
                                                            <div
                                                                class="txt3"
                                                            >
                                                                <span
                                                                    >Nam
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
                                                                    quod.</span
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="slider">
                                                        <div
                                                            class="
                                                                slider_inner
                                                            "
                                                        >
                                                            <div
                                                                class="txt1"
                                                            >
                                                                <span
                                                                    >7 - Day
                                                                    Tour</span
                                                                >
                                                            </div>
                                                            <div
                                                                class="txt2"
                                                            >
                                                                <span
                                                                    >AMAZING
                                                                    CARIBBEAN</span
                                                                >
                                                            </div>
                                                            <div
                                                                class="txt3"
                                                            >
                                                                <span
                                                                    >Lorem
                                                                    ipsum
                                                                    dolor
                                                                    eleifend
                                                                    option
                                                                    congue
                                                                    nihil
                                                                    imperdiet
                                                                    doming
                                                                    id
                                                                    quod.</span
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="slider">
                                                        <div
                                                            class="
                                                                slider_inner
                                                            "
                                                        >
                                                            <div
                                                                class="txt1"
                                                            >
                                                                <span
                                                                    >5 Days
                                                                    In</span
                                                                >
                                                            </div>
                                                            <div
                                                                class="txt2"
                                                            >
                                                                <span
                                                                    >PARIS
                                                                    (Capital
                                                                    Of
                                                                    World)</span
                                                                >
                                                            </div>
                                                            <div
                                                                class="txt3"
                                                            >
                                                                <span
                                                                    >Nam
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
                                                                    quod.</span
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="slider">
                                                        <div
                                                            class="
                                                                slider_inner
                                                            "
                                                        >
                                                            <div
                                                                class="txt1"
                                                            >
                                                                <span
                                                                    >12 -
                                                                    Day
                                                                    Cruises</span
                                                                >
                                                            </div>
                                                            <div
                                                                class="txt2"
                                                            >
                                                                <span
                                                                    >FROM
                                                                    GREECE
                                                                    TO
                                                                    SPAIN</span
                                                                >
                                                            </div>
                                                            <div
                                                                class="txt3"
                                                            >
                                                                <span
                                                                    >MEDITERRANEAN
                                                                    - 12 -
                                                                    Day
                                                                    Cruises
                                                                    By
                                                                    "GRAND
                                                                    VICTORIA
                                                                    III"
                                                                    Cruise
                                                                    Liner.</span
                                                                >
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
                @include('seat-flights._search-flight', ['route' => route('seat-flights.index')])
            </div>
        </div>

        <div id="why1">
            <div class="container">
                <h2 class="animated">WHY WE ARE THE BEST</h2>

                <div class="title1 animated">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing
                    elit, sed diam nonummy nibh euismod <br />tincidunt ut
                    laoreet dolore magna aliquam erat volutpat.
                </div>

                <br /><br />

                <div class="row">
                    <div class="col-sm-3">
                        <div
                            class="thumb2 animated"
                            data-animation="flipInY"
                            data-animation-delay="200"
                        >
                            <div class="thumbnail clearfix">
                                <a href="#">
                                    <figure class="">
                                        <img
                                            src="/static/images/why1.png"
                                            alt=""
                                            class="img1 img-responsive"
                                        />
                                        <img
                                            src="/static/images/why1_hover.png"
                                            alt=""
                                            class="img2 img-responsive"
                                        />
                                    </figure>
                                    <div class="caption">
                                        <div class="txt1">
                                            Amazing Travel
                                        </div>
                                        <div class="txt2">
                                            Nam liber tempor cum soluta
                                            nobis eleifend option congue
                                            nihil imperdiet doming id quod
                                            mazim.
                                        </div>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div
                            class="thumb2 animated"
                            data-animation="flipInY"
                            data-animation-delay="300"
                        >
                            <div class="thumbnail clearfix">
                                <a href="#">
                                    <figure class="">
                                        <img
                                            src="/static/images/why2.png"
                                            alt=""
                                            class="img1 img-responsive"
                                        />
                                        <img
                                            src="/static/images/why2_hover.png"
                                            alt=""
                                            class="img2 img-responsive"
                                        />
                                    </figure>
                                    <div class="caption">
                                        <div class="txt1">Discover</div>
                                        <div class="txt2">
                                            Nam liber tempor cum soluta
                                            nobis eleifend option congue
                                            nihil imperdiet doming id quod
                                            mazim.
                                        </div>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div
                            class="thumb2 animated"
                            data-animation="flipInY"
                            data-animation-delay="400"
                        >
                            <div class="thumbnail clearfix">
                                <a href="#">
                                    <figure class="">
                                        <img
                                            src="/static/images/why3.png"
                                            alt=""
                                            class="img1 img-responsive"
                                        />
                                        <img
                                            src="/static/images/why3_hover.png"
                                            alt=""
                                            class="img2 img-responsive"
                                        />
                                    </figure>
                                    <div class="caption">
                                        <div class="txt1">
                                            Book Your Trip
                                        </div>
                                        <div class="txt2">
                                            Nam liber tempor cum soluta
                                            nobis eleifend option congue
                                            nihil imperdiet doming id quod
                                            mazim.
                                        </div>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div
                            class="thumb2 animated"
                            data-animation="flipInY"
                            data-animation-delay="500"
                        >
                            <div class="thumbnail clearfix">
                                <a href="#">
                                    <figure class="">
                                        <img
                                            src="/static/images/why4.png"
                                            alt=""
                                            class="img1 img-responsive"
                                        />
                                        <img
                                            src="/static/images/why4_hover.png"
                                            alt=""
                                            class="img2 img-responsive"
                                        />
                                    </figure>
                                    <div class="caption">
                                        <div class="txt1">Nice Support</div>
                                        <div class="txt2">
                                            Nam liber tempor cum soluta
                                            nobis eleifend option congue
                                            nihil imperdiet doming id quod
                                            mazim.
                                        </div>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="parallax1" class="parallax">
            <div class="bg1 parallax-bg"></div>
            <div class="overlay"></div>
            <div class="parallax-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 animated">
                            <div class="txt1">
                                Caucasus Vacation Packages
                            </div>
                            <div class="txt2">
                                Lorem ipsum dolor sit amet, consectetuer
                                adipiscing elit, sed diam nonummy nibh
                                euismod tincidunt ut laoreet dolore magna
                                aliquam erat volutpat. Ut wisi enim ad minim
                                veniam, quis nostrud exerci tation
                                ullamcorper.
                            </div>
                            <div class="txt3">
                                From: Khazbegi (Goergia)
                                <strong>$159.00</strong><span>person</span>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <a href="#" class="btn-default btn0">Details</a>
                        </div>
                    </div>
                </div>
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

                <div
                    id="popular_wrapper"
                    class="animated"
                    data-animation="fadeIn"
                    data-animation-delay="300"
                >
                    <div id="popular_inner">
                        <div class="">
                            <div id="popular">
                                <div class="">
                                    <div class="carousel-box">
                                        <div class="inner">
                                            <div class="carousel main">
                                                <ul>
                                                    @foreach ($seatFlight as $item)
                                                    <li>
                                                        <div class="popular">
                                                            <div class="popular_inner">
                                                                <figure>
                                                                    <img
                                                                        src="{{ $item->img }}"
                                                                        alt=""
                                                                        class="img-responsive"
                                                                    />
                                                                    <div
                                                                        class="
                                                                            over
                                                                        "
                                                                    >
                                                                        <div
                                                                            class="
                                                                                v1
                                                                            "
                                                                        >
                                                                        {{ $item->intro_title }}
                                                                            <span> {{ $item->rating }} оценка </span>
                                                                        </div>
                                                                        <div
                                                                            class="
                                                                                v2
                                                                            "
                                                                        >
                                                                            {{ $item->intro }}
                                                                        </div>
                                                                    </div>
                                                                </figure>
                                                                <div
                                                                    class="
                                                                        caption
                                                                    "
                                                                >
                                                                    <div
                                                                        class="
                                                                            txt1
                                                                        "
                                                                    >
                                                                        <span>
                                                                            {{ $item->title  }}</span
                                                                        >
                                                                    </div>
                                                                    <div
                                                                        class="
                                                                            txt2
                                                                        "
                                                                    >
                                                                       {{ $item->description }}
                                                                    </div>
                                                                    <div
                                                                        class="
                                                                            txt3
                                                                            clearfix
                                                                        "
                                                                    >
                                                                        <div
                                                                            class="
                                                                                left_side
                                                                            "
                                                                        >
                                                                            <div
                                                                                class="
                                                                                    stars1
                                                                                "
                                                                            >
                                                                            {{ $item->rating }}
                                                                            @for ($i = $item->rating; $i >= 1; $i--)
                                                                                <img
                                                                                    src="/static/images/star1.png"
                                                                                    alt=""
                                                                                />
                                                                            @endfor
                                                                            </div>
                                                                        
                                                                        </div>
                                                                        <div
                                                                            class="
                                                                                right_side
                                                                            "
                                                                        >
                                                                            <a
                                                                                href="{{ route('seat-flights.show', ['seat_flight' => $item->id]) }}"
                                                                                class="
                                                                                    btn-default
                                                                                    btn1
                                                                                "
                                                                                >Просмотреть</a
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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

        <div id="partners">
            <div class="container">
                <div class="row">
                    @foreach ($partners as $partner)
                        <div class="col-sm-4 col-md-2 col-xs-6">
                            <div class="thumb1 animated">
                                <div class="thumbnail clearfix">
                                    <a href="#">
                                        <figure>
                                            <img
                                                src="{{ $partner->img }}"
                                                alt=""
                                                class="img1 img-responsive"
                                            />
                                            <img
                                                src="{{ $partner->img }}"
                                                alt=""
                                                class="img2 img-responsive"
                                            />
                                        </figure>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>

@endsection