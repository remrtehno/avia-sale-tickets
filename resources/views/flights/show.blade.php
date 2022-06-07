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

                {{-- <p class="address">{{ $flights->getFrom() }} / {{ $flights->getTo() }}</p> --}}

                <div class="post-story">
                  {{-- <hr> --}}


                  <div class="post-story-body clearfix">

                    <div class="row">

                    </div>

                    <div class="row flight-detail">
                      <div class="col-md-2">
                        <h4 class="py-4">{{ $flights->getDeparute()->translatedFormat('d F Y') }}</h4>
                        <b class="h4"
                          style="color: black">{{ $flights->getDeparute()->translatedFormat('l') }}</b>
                      </div>

                      <div class="col-md-2">
                        <b class="h4" style="color: black">{{ $flights->getFrom() }}</b>
                      </div>

                      <div class="col-md-3">
                        <h4 class="text-center py-4">
                          {{ $flights->getDeparute()->format('H:i') }}
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                            style="width: 22px; vertical-align: bottom;margin: 0 10px;color: red;fill: #31bbb4;">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path
                              d=" M502.6 278.6l-128 128c-12.51 12.51-32.76 12.49-45.25 0c-12.5-12.5-12.5-32.75
                                                                                                                                                                                      0-45.25L402.8 288H32C14.31 288 0 273.7 0 255.1S14.31 224 32
                                                                                                                                                                                      224h370.8l-73.38-73.38c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l128 128C515.1 245.9
                                                                                                                                                                                      515.1 266.1 502.6 278.6z" />
                          </svg>
                          {{ $flights->getArrival()->format('H:i') }}
                        </h4>
                        <p class="h5 text-center">
                          {{ $flights->getDuration() }} в пути
                        </p>
                      </div>

                      <div class="col-md-3">
                        <b class="h4" style="color: black"> {{ $flights->getTo() }} </b>
                      </div>

                      <div class="col-md-2">
                        <b class="h4">
                          <img loading="lazy" src="{{ $flights->getImage() }}" style="max-width: 93px" alt="">
                        </b>
                        <br>
                        Рейс: {{ $flights->flight }}
                        <br>
                      </div>
                    </div>

                    <hr>


                    <div class="row">
                      <div class="col-md-6">
                        <h5>Продавец "{{ $flights->user->name }} {{ $flights->user->email }}"</h5>
                        <div style="text-overflow: ellipsis; overflow: hidden;" class="text-left">
                          <a href="{{ route('users.show', ['user' => $flights->user->id]) }}">
                            Посмотреть отзывы продавца
                          </a>
                        </div>
                      </div>

                      <div class="col-md-6" style="display: flex; align-items: center">
                        <h5 class="mx-25" style="margin-left: 0">Rating: </h5>
                        <star-rating read-only :size="20" :rating="{{ $flights->getRating() }}">
                        </star-rating>
                      </div>
                    </div>

                    <hr>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="flight-prices">
                          <table>
                            <tr>
                              <td>
                                <h5>Взрослый: </h5>
                              </td>
                              <td>
                                <h5 class="mx-15">UZS <span red>{{ $flights->getPriceFormatted() }}</span>
                                </h5>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <h5>Детский: </h5>
                              </td>
                              <td>
                                <h5 class="mx-15">UZS <span
                                    red>{{ $flights->getPriceFormatted('child') }}</span></h5>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <h5>Младенческий: </h5>
                              </td>
                              <td>
                                <h5 class="mx-15">UZS <span
                                    red>{{ $flights->getPriceFormatted('infant') }}</span></h5>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>

                      <div class="col-md-6">
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
          </div>
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
            <div class="col-md-12 booking-row">
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
            <div class="col-md-12 booking-row">
              <h3 class="line">РЕЙС</h3>
            </div>
            <div class="col-md-12 booking-row columns-2">
              <div class="row">
                <div class="col-md-6">
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
                </div>
                <div class="col-md-6">
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
