@extends('layout')


@section('content')
  <x-breadcrumbs :route="'seat-flight'">
    {{ $flights->title }}
  </x-breadcrumbs>

  <form action="{{ route('booking.store') }}" method="post">
    @csrf

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

                    <h5>Продавец "{{ $flights->user->name }} {{ $flights->user->email }}"</h5>
                    <div style="text-overflow: ellipsis; overflow: hidden;" class="text-left">
                      <a href="{{ route('users.show', ['user' => $flights->user->id]) }}">
                        Посмотреть отзывы продавца
                      </a>
                    </div>

                    <h5>Rating: </h5>
                    <star-rating read-only :size="20" :rating="{{ $flights->getRating() }}"></star-rating>
                    @if ($flights->getSeats() < 10)
                      <div class="alert alert-warning my-15" style="display: inline-block">
                        Осталось мест: {{ $flights->getSeats() }}
                      </div>
                    @endif
                    @include('flights._passenger-form', ['flights' => $flights])
                  </div>

                </div>
              </div>


            </div>
          </div>
        </div>
        <div class="flight-prices">
          <table>
            <tr>
              <td>
                <h5>Взрослый: </h5>
              </td>
              <td>
                <h5 class="mx-15">UZS <span red>{{ $flights->getPriceFormatted() }}</span></h5>
              </td>
            </tr>
            <tr>
              <td>
                <h5>Детский: </h5>
              </td>
              <td>
                <h5 class="mx-15">UZS <span red>{{ $flights->getPriceFormatted('child') }}</span></h5>
              </td>
            </tr>
            <tr>
              <td>
                <h5>Младенческий: </h5>
              </td>
              <td>
                <h5 class="mx-15">UZS <span red>{{ $flights->getPriceFormatted('infant') }}</span></h5>
              </td>
            </tr>
          </table>



        </div>

      </div>

      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
      <input type="hidden" name="flight_id" value="{{ $flights->id }}">
      <input type="hidden" name="seats_left" value="{{ $flights->getSeats() }}">




      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <hr>
            <h3 class="text-center hch2">Забронировать</h3>

            <div class="clearfix"></div>


            <div class="clearfix"></div>
            <div class="col-md-5 booking-row">
              <h3 class="line">ИНФОРМАЦИЯ О ПАССАЖИРАХ</h3>
              @error('*')
                {{-- TODO Replace to separate errors messages --}}
                <div class="alert alert-danger">
                  Проверьте все поля.
                </div>
              @enderror
              @error('date_error')
                <div class="alert alert-danger"> {!! $message !!} </div>
              @enderror
              @include('flights._booking-form')
            </div>


            <div class="col-md-2"></div>
            <div class="col-md-5 booking-row">
              <h3 class="line">РЕЙС</h3>

              <div class="input2_wrapper">
                <label class="col-md-6" style="padding-left:0;padding-top:12px;">Откуда:</label>

                <div class="col-md-6" style="padding-right:0;padding-left:0;">
                  <span class="red">{{ $flights->direction_from }}</span>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="input2_wrapper">
                <label class="col-md-6" style="padding-left:0;padding-top:12px;">Куда:</label>

                <div class="col-md-6" style="padding-right:0;padding-left:0;">
                  <span class="red">{{ $flights->direction_to }}</span>
                  {{-- @TODO Do we need create separate codenames "JFK,TAS,PRG...."? --}}
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="input2_wrapper">
                <label class="col-md-6" style="padding-left:0;padding-top:12px;">Отправление:</label>

                <div class="col-md-6" style="padding-right:0;padding-left:0;">
                  <span class="red">
                    {{ $flights->getDate() }}
                  </span>
                  <br>
                  Время: {{ $flights->getTime() }}
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="input2_wrapper">
                <label class="col-md-6" style="padding-left:0;padding-top:12px;">Возвращение:</label>

                <div class="col-md-6" style="padding-right:0;padding-left:0;">
                  <span class="red">
                    {{ $flights->getDateArrival() }}
                  </span>
                  <br>
                  Время: {{ $flights->getTimeArrival() }}
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
              {{-- @TODO In case we need fees --}}
              {{-- <div class="input2_wrapper">
                <label class="col-md-6" style="padding-left:0;padding-top:12px;">ОБЩЕЕ</label>

                <div class="col-md-6" style="padding-right:0;padding-left:0;">
                  <span class="red">${{ $flights->getTotal() }}</span>
                </div>
              </div> --}}
              <div class="wysiwyg py-15">
                {!! $flights->comment !!}
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
                <label class="col-md-5" style="padding-left:0;padding-top:18px;font-size:16px;">ОБЩИЙ
                  ИТОГ:</label>

                <div class="col-md-7" style="padding-right:0;padding-left:0;">
                  <input type="hidden" name="price_adult" value="{{ $flights->price_adult }}">
                  <input type="hidden" name="price_child" value="{{ $flights->price_child }}">
                  <input type="hidden" name="price_infant" value="{{ $flights->price_infant }}">
                  <Total :price-adult="{{ $flights->price_adult }}" :price-child="{{ $flights->price_child }}"
                    :price-infant="{{ $flights->price_infant }}" :additional="0" />
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

    </div>

  </form>
@endsection
