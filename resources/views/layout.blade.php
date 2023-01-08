<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>{{ config('app.name', 'InAvia Online') }}</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  {{-- //seo --}}
  <meta name="description" content="Your description">
  <meta name="keywords" content="Your keywords">
  <meta name="author" content="Your name">


  <link href="/static/css/bootstrap.css" rel="stylesheet">
  <link href="/static/css/font-awesome.css" rel="stylesheet">
  <link href="/static/css/animate.css" rel="stylesheet">
  <link href="/static/css/select2.css" rel="stylesheet">
  <link href="/static/css/smoothness/jquery-ui-1.10.0.custom.css" rel="stylesheet">
  <link href="/static/css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="/static/avia-ru/css/bootstrap-datepicker3.standalone.css" />
  <link rel="stylesheet" href="/static/avia-ru/css/style.css" />

  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="/css/custom.css">

</head>

<body class="front {{ env('APP_DEBUG') ? '' : 'loaded_hiding' }}">
  @if ($errors->any())
    <div class="error"
      style="padding: 9px;margin: 0;font-size: 12px;color: red;position: fixed;z-index: 99;left: 0;right: 0;   ">
      @error('no_seats')
        Нет мест
      @enderror
      <script>
        setTimeout(() => {
          var errorMessage = document.querySelector('.error')
          errorMessage && errorMessage.remove()
        }, 5000);
      </script>
    </div>
  @endif
  <div id="app">
    <div class="header">
      <div class="top1_wrapper">
        <div class="container">
          <div class="top1 clearfix">
            <div class="email1">
              <a href='mailto:{{ $contacts->email_header }}'>{{ $contacts->email_header }}</a>
            </div>
            <div class="phone1">{!! $contacts->phone_header !!}</div>
            @if (Auth::check())
              <div class="greetings" style="float: right; padding-left: 25px;">
                Привет, {{ Auth::user()->name }}
              </div>
            @endif
          </div>
        </div>
      </div>


      <div class="top2_wrapper">
        <div class="container">
          <div class="top2 clearfix">
            <header>
                <div id="google_translate_element"></div>
              <div class="logo_wrapper">
                <a href="{{ route('home') }}" class="logo">
                  <img loading="lazy" src="/static/images/logo.svg" style="width: 110px; margin-top: -7px;"
                    class="img-responsive" />
                </a>
              </div>
            </header>
            <div class="navbar navbar_ navbar-default">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <div
                class="
                                        navbar-collapse navbar-collapse_
                                        collapse
                                    ">
                {{-- @TODO: Replace Route::is to something better --}}
                <ul class="nav navbar-nav sf-menu clearfix">
                  <li class="{{ (request()->is('home') or request()->is('/')) ? 'active' : '' }}">
                    <a href="{{ route('home') }}">Главная</a>
                  </li>
                  <li class="{{ (request()->is('flights/*') or request()->is('flights')) ? 'active' : '' }}">
                    <a href="{{ route('flights.index') }}">Все рейсы</a>
                  </li>
                  @guest
                    <li class="{{ request()->is('register') ? 'active' : '' }}">
                      <a href="{{ route('register') }}">Регистрация</a>
                    </li>
                    <li class="{{ request()->is('login') ? 'active' : '' }}">
                      <a href="{{ route('login') }}">Авторизация</a>
                    </li>
                  @else
                    <li>
                      <a href="/dashboard">Личный кабинет</a>
                    </li>
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
              <h5 class="py-0">Есть вопросы?</h5>
              <div class="py-10"></div>
              <ul class="list-unstyled">
                <li>Тел. <a style="color: #1cbbb4" href="tel:{!! $contacts->phone_footer !!}">
                    <u>{!! $contacts->phone_footer !!}</u>
                  </a></li>
                <li>Email: <a href='mailto:{{ $contacts->email_footer }}'>{{ $contacts->email_footer }}</a></li>
                <li>Адрес: {!! $contacts->address !!}</li>
              </ul>
              <div class="py-25"></div>
            </div>
            <div class="col-sm-3">

            </div>
            <div class="col-sm-3">

            </div>
            <div class="col-sm-3">
              <h5 class="py-0">Ссылки</h5>
              <div class="py-10"></div>
              {{-- @foreach ($footerMenu as $link)
                <a href="{{ $link->slug }}">{{ $link->title }}</a>
              @endforeach --}}
              <a href="/О-проекте%24">О проекте</a> <br>
              <a href="/feedback">Форма для жалоб и предложений</a> <br>
              <a href="{{ $footerMenu[3]->slug }}%24">Наши партнеры</a> <br>
              <a href="/faq%24">FAQ</a> <br>
              <div class="py-10"></div>
            </div>
          </div>
        </div>

        <div class="bot2_wrapper">
          <div class="container">
            <div class="text-center">
              <a href="{{ route('page', ['page' => $footerMenu[0]->slug]) }}">{{ $footerMenu[0]->title }}</a>
              <span>|</span>
              Copyright © {{ date('Y') }}
            </div>
          </div>
        </div>
    </footer>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <h4 class="modal-title text-lowercase" id="myModalLabel">Зарегистрироваться как:</h4>
          <button type="button" class="btn btn-default as-org" data-dismiss="modal">Юридическое лицо</button>
          <button type="button" class="btn btn-default as-ind" data-dismiss="modal">Физическое лицо</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        </div>
      </div>
    </div>
  </div>

  <script src="/static/js/jquery.js"></script>
  <script src="/static/js/bootstrap.min.js"></script>
  <script src="/static/js/jquery-ui.js"></script>
  <script src="/static/js/jquery-migrate-1.2.1.min.js"></script>
  <script src="/static/js/jquery.easing.1.3.js"></script>
  <script src="/static/js/superfish.js"></script>
  <script src="/static/js/cform.js"></script>

  <script src="/static/js/select2.js"></script>

  <script src="/static/js/jquery.parallax-1.1.3.resize.js"></script>

  <script src="/static/js/jquery.appear.js"></script>

  <script src="/static/js/jquery.caroufredsel.js"></script>
  <script src="/static/js/jquery.touchSwipe.min.js"></script>

  <script src="/static/js/jquery.ui.totop.js"></script>


  <script src="/static/avia-ru/js/jquery.dateFormat.js"></script>
  <script src="/static/avia-ru/js/bootstrap-datepicker.min.js"></script>
  <script src="/static/avia-ru/js/jquery.twidget.js?v_1207"></script>

  <script src="/static/js/script.js"></script>


  <script src="{{ mix('js/app.js') }}"></script>


  @hasSection('js')
    @yield('js')
  @else
    <script>
      $('#searchForm').twidget({
        type: 'avia',
        locale: 'ru',
        open_in_new_tab: false,
        default_origin: "TAS",
      })
    </script>
  @endif


  <script src="https://api.imbachat.com/imbachat/v1/16375/widget"></script>
  <script>
    window.imbaApi.load();
  </script>

  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>



  <script type="text/javascript">
      function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
      }
  </script>



</body>

</html>
