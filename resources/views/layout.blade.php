<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Avia</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Your description">
        <meta name="keywords" content="Your keywords">
        <meta name="author" content="Your name">
    
        <link href="/static/css/bootstrap.css" rel="stylesheet">
        <link href="/static/css/font-awesome.css" rel="stylesheet">
        <link href="/static/css/animate.css" rel="stylesheet">
        <link href="/static/css/select2.css" rel="stylesheet">
        <link href="/static/css/smoothness/jquery-ui-1.10.0.custom.css" rel="stylesheet">
        <link href="/static/css/style.css" rel="stylesheet">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="/css/custom.css">
    </head>
    <body class="front">

        <div class="header">
            <div class="top1_wrapper">
                <div class="container">
                    <div class="top1 clearfix">
                        <div class="email1">
                            <a href="#">support@travelagency.com</a>
                        </div>
                        <div class="phone1">+917 3386831</div>
                        @if (Auth::check())
                            <div class="greetings" style="float: right; padding-left: 25px;">
                                Привет, {{ Auth::user()->name }}
                            </div>
                        @endif
                        <div class="social_wrapper">
                            <ul class="social clearfix">
                                <li>
                                    <a href="#"
                                        ><i class="fa fa-facebook"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href="#"
                                        ><i class="fa fa-twitter"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google-plus"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href="#"
                                        ><i class="fa fa-instagram"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href="#"
                                        ><i class="fa fa-vimeo-square"></i
                                    ></a>
                                </li>
                            </ul>
                        </div>
                        <div class="lang1">
                            <div class="dropdown">
                                <button
                                    class="btn btn-default dropdown-toggle"
                                    type="button"
                                    id="dropdownMenu1"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="true"
                                >
                                    English<span class="caret"></span>
                                </button>
                                <ul
                                    class="dropdown-menu"
                                    aria-labelledby="dropdownMenu1"
                                >
                                    <li><a class="ge" href="#">German</a></li>
                                    <li><a class="ru" href="#">Russian</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                
            <div class="top2_wrapper">
                <div class="container">
                    <div class="top2 clearfix">
                        <header>
                            <div class="logo_wrapper">
                                <a href="{{ route('home') }}" class="logo">
                                    <img
                                        src="/static/images/logo.png"
                                        alt=""
                                        class="img-responsive"
                                    />
                                </a>
                            </div>
                        </header>
                        <div class="navbar navbar_ navbar-default">
                            <button
                                type="button"
                                class="navbar-toggle collapsed"
                                data-toggle="collapse"
                                data-target=".navbar-collapse"
                            >
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div
                                class="
                                    navbar-collapse navbar-collapse_
                                    collapse
                                "
                            >
                                <ul class="nav navbar-nav sf-menu clearfix">
                                    <li class="active">
                                        <a href="{{ route('home') }}">Главная</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('seat-flights.index') }}">Все рейсы</a>
                                    </li>
                                    @guest
                                        <li><a href="{{ route('register') }}">Регистрация</a></li>
                                        <li><a href="{{ route('login') }}">Авторизация</a></li>
                                    @else
                                        <li>
                                            
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Выйти') }}
                                            </a>
        
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>

                                        
                                        </li>
                                        <li></li>
                                    @endguest

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

    @yield('content')

    <footer>

        <div class="bot1_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="logo2_wrapper">
                            <a href="{{ route('home') }}" class="logo2">
                                <img
                                    src="/static/images/logo2.png"
                                    alt=""
                                    class="img-responsive"
                                />
                            </a>
                        </div>
                        <p>
                            Nam liber tempor cum soluta nobis option congue
                            nihil imperdiet doming id quod mazim. Lorem
                            ipsum dolor sit amet, consectetuer adipiscing
                            elit, sed diam nonummy nibh euismod tincidunt ut
                            laoreet dolore magna.
                        </p>
                    </div>
                    <div class="col-sm-3">
                        
                    </div>
                    <div class="col-sm-3">
                        
                    </div>
                    <div class="col-sm-3">
                        <div class="phone2">1-917-338-6831</div>
                        <div class="support1">
                            <a href="#">support@templates-support.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bot2_wrapper">
            <div class="container">
                <div class="left_side">
                    Copyright © {{ date('Y') }}
                    <span>|</span> <a href="#">Privacy Policy</a>
                    <span>|</span> <a href="#">About Us</a> <span>|</span>
                    <a href="#">FAQ</a> <span>|</span>
                    <a href="#">Contact</a>
                </div>
                <div class="right_side">
                    
                </div>
            </div>
        </div>
    </footer>

    <script src="/static/js/jquery.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
    <script src="/static/js/jquery-ui.js"></script>
    <script src="/static/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="/static/js/jquery.easing.1.3.js"></script>
    <script src="/static/js/superfish.js"></script>

    <script src="/static/js/select2.js"></script>

    <script src="/static/js/jquery.parallax-1.1.3.resize.js"></script>

    <script src="/static/js/SmoothScroll.js"></script>

    <script src="/static/js/jquery.appear.js"></script>

    <script src="/static/js/jquery.caroufredsel.js"></script>
    <script src="/static/js/jquery.touchSwipe.min.js"></script>

    <script src="/static/js/jquery.ui.totop.js"></script>

    <script src="/static/js/script.js"></script>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>