@extends('layout')


@section('content')

  <x-breadcrumbs :route="'seat-flight'">
    {{ $flights->title }}
  </x-breadcrumbs>



  <div id="content">
    <div class="container">

      <div class="row">
        <div class="col-sm-12">
          <div class="blog_content">


            <div class="post post-full">
              <h3 class="hch">{{ $flights->title }}</h3>

              <div class="clearfix"></div>

              <p class="address">{{ $flights->getFrom() }} / {{ $flights->getTo() }}</p>

              <div class="post-story">
                <hr>


                <div class="post-story-body clearfix">


                  <h4>{{ $flights->getDeparute()->translatedFormat('d F Y, l') }}</h4>
                  <ul>

                    <li>Откуда: {{ $flights->getFrom() }}</li>
                    <li>Куда: {{ $flights->getTo() }}</li>

                  </ul>
                  <hr>
                  <h5> Авиалинии: <img src="{{ $flights->getImage() }}" style="max-width: 93px" class="mx-15"
                      alt="">
                  </h5>
                  <h5>Рейс: {{ $flights->flight }}</h5>

                  <h4>Details:</h4>

                  <svg class="icon">
                    <use xlink:href="/static/svg/sprite.svg#plane-departure"></use>
                  </svg>
                  {{ $flights->getDeparute()->format('H:i') }}
                  {{ $flights->getFrom() }}

                  <br>
                  <svg class="icon">
                    <use xlink:href="/static/svg/sprite.svg#plane-arrival"></use>
                  </svg>
                  {{ $flights->getArrival()->format('H:i') }}
                  {{ $flights->getTo() }}

                  <h5>Длительность: {{ $flights->getDuration() }}</h5>

                  <h5>Rating: </h5>
                  <star-rating read-only :size="20" :rating="{{ $flights->rating }}"></star-rating>

                  @include('flights._passenger-form', ['flights' => $flights])
                </div>

              </div>
            </div>


          </div>
        </div>
      </div>


    </div>
    <form action="{{ route('booking.store') }}" method="post">
      @csrf

      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <hr>
            <h3 class="text-center hch2">Забронировать</h3>

            <div class="clearfix"></div>


            <div class="clearfix"></div>
            <div class="col-md-5 booking-row">
              <h3 class="line">ИНФОРМАЦИЯ О ПАССАЖИРАХ</h3>

              @include('flights._booking-form')

            </div>


            <div class="col-md-2"></div>
            <div class="col-md-5 booking-row">
              <h3 class="line">РЕЙС</h3>

              <div class="input2_wrapper">
                <label class="col-md-6" style="padding-left:0;padding-top:12px;">Откуда:</label>

                <div class="col-md-6" style="padding-right:0;padding-left:0;">
                  <span class="red">Prague</span>
                  <br>Vaclav Havel (PRG)


                </div>
              </div>
              <div class="clearfix"></div>
              <div class="input2_wrapper">
                <label class="col-md-6" style="padding-left:0;padding-top:12px;">Куда:</label>

                <div class="col-md-6" style="padding-right:0;padding-left:0;">
                  <span class="red">New-York</span>
                  {{-- @TODO Do we need create separate codenames "JFK,TAS,PRG...."? --}}
                  <br>John F.Kennedy lntl. (JFK)
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="input2_wrapper">
                <label class="col-md-6" style="padding-left:0;padding-top:12px;">Отправление:</label>

                <div class="col-md-6" style="padding-right:0;padding-left:0;">
                  <span class="red">20 - Apr - 2017</span>
                  <ul>
                    <li>2:25pm (PRG)</li>
                    <li>7:25pm (JFK)</li>
                  </ul>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="input2_wrapper">
                <label class="col-md-6" style="padding-left:0;padding-top:12px;">Возвращение:</label>

                <div class="col-md-6" style="padding-right:0;padding-left:0;">
                  <span class="red">20 - May - 2017</span>
                  <ul>
                    <li>4:20pm (JFK)</li>
                    <li>8:50pm (PRG)</li>
                  </ul>

                </div>
              </div>
              <div class="clearfix"></div>
              <div class="margin-top"></div>
              <h3>СБОРЫ</h3>

              <div class="clearfix"></div>
              <div class="input2_wrapper">
                <label class="col-md-6" style="padding-left:0;padding-top:12px;">Сборы</label>

                <div class="col-md-6" style="padding-right:0;padding-left:0;">
                  <span class="red">Включены</span>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="input2_wrapper">
                <label class="col-md-6" style="padding-left:0;padding-top:12px;">ОБЩЕЕ</label>

                <div class="col-md-6" style="padding-right:0;padding-left:0;">
                  <span class="red">${{ $flights->getTotal() }}</span>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="margin-top" style="margin-top:40px;"></div>
              <div class="border-3px"></div>
              <div class="clearfix"></div>
              <div class="margin-top"></div>
              <h3>ПРИНЯТЬ И ПОДТВЕРДИТЬ</h3>

              <label>
                <input type="checkbox" required id="conditions">
                <b style="color:#464646;padding-left:10px;">
                  Я ознакомлен и согласен с действующими правилами авиакомпании и
                  даю свое согласие на обработку своих персональных данных
                </b>
              </label>

              <div class="margin-top"></div>
              <div class="clearfix"></div>
              <div class="input2_wrapper">
                <label class="col-md-6" style="padding-left:0;padding-top:18px;font-size:16px;">ОБЩИЙ ИТОГ:</label>

                <div class="col-md-6" style="padding-right:0;padding-left:0;">
                  <span class="red" style="font-size:30px;">${{ $flights->getGrandTotal() }}</span>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="margin-top"></div>
              <button type="submit" class="btn btn-default btn-cf-submit3 w-100">
                ЗАБРОНИРОВАТЬ СЕЙЧАС
              </button>

            </div>
          </div>
        </div>
        <br>
        <br>
        <hr>
        <br>
      </div>
    </form>
  </div>



@endsection
