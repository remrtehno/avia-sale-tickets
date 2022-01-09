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

                    <p class="address">{{ $seat_flight->from }} / {{ $seat_flight->to }}</p>

                      <div class="post-story">
                        <hr>
                        <figure>
                            <img src="{{ $seat_flight->img }}" alt="{{ $seat_flight->title }}"
                            class="img-responsive">
                        </figure>

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
                              <h5>Rating: </h5>
                              <star-rating 
                                    read-only
                                    :size="20" 
                                    :rating="{{ $seat_flight->rating }}"
                                ></star-rating>
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

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <hr>
                <h3 class="text-center hch2">Забронировать</h3>

                <div class="clearfix"></div>


                <div class="clearfix"></div>
                <div class="col-md-5 booking-row">
                    <h3 class="line">ИНФОРМАЦИЯ О ПАССАЖИРЕ</h3>

                    <div class="input2_wrapper">
                        <label class="col-md-5" style="padding-left:0;padding-top:12px;">Имя <span red>*</span></label>

                        <div class="col-md-7" style="padding-right:0;padding-left:0;">
                            <input type="text" class="form-control" placeholder="Michael" spellcheck="false">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="input2_wrapper">
                        <label class="col-md-5" style="padding-left:0;padding-top:12px;">Фамилия <span red>*</span></label>

                        <div class="col-md-7" style="padding-right:0;padding-left:0;">
                            <input type="text" class="form-control" placeholder="Dragan" spellcheck="false">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="input2_wrapper">
                        <label class="col-md-5" style="padding-left:0;padding-top:12px;">Отчество <span red>*</span></label>

                        <div class="col-md-7" style="padding-right:0;padding-left:0;">
                            <input type="text" class="form-control" placeholder="Berkovich" spellcheck="false">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="input2_wrapper">
                        <label class="col-md-5" style="padding-left:0;padding-top:12px;">Email <span red>*</span></label>

                        <div class="col-md-7" style="padding-right:0;padding-left:0;">
                            <input data-inputmask="'alias': 'email'" class="form-control"  placeholder="your@email.com" spellcheck="false">
                        </div>
                    </div>
                    <div class="input2_wrapper">
                        <label class="col-md-5" style="padding-left:0;padding-top:12px;">Дата рождения <span red>*</span></label>

                        <div class="col-md-7" style="padding-right:0;padding-left:0;">
                            <input name="birthday" data-inputmask="'alias': 'dategood'"  type="text" class="form-control" placeholder="____-__-__" spellcheck="false">    
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="input2_wrapper">
                        <label class="col-md-5" style="padding-left:0;padding-top:12px;">Пол <span red>*</span></label>

                        <div class="col-md-7" style="padding-top:11px;padding-left:0;">
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="m" {{ request('gender') === "m" ? 'checked' : null }}> Мужской
                            </label>
                            <label class="radio-inline py-8 mx-15">
                                <input type="radio" name="gender" value="f" {{ request('gender') === 'f' ? 'checked' : null }}> Женский
                            </label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="input2_wrapper">
                        <label class="col-md-5" style="padding-left:0;padding-top:12px;">Cрок паспорта <span red>*</span></label>

                        <div class="col-md-7" style="padding-right:0;padding-left:0;">
                            <input data-inputmask="'alias': 'dategood'"  type="text" class="form-control" placeholder="____-__-__" spellcheck="false">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="input2_wrapper">
                        <label class="col-md-5" style="padding-left:0;padding-top:12px;">Серия паспорта <span red>*</span></label>

                        <div class="col-md-7" style="padding-right:0;padding-left:0;">
                            <input type="text" class="form-control" placeholder="AA_______" spellcheck="false">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="input2_wrapper">
                        <label class="col-md-5" style="padding-left:0;padding-top:12px;">Гражданство <span red>*</span></label>

                        <div class="col-md-7" style="padding-right:0;padding-left:0;">
                            <input type="text" name="citizenship" class="form-control" placeholder="пример: Узбекистан" spellcheck="false">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="input2_wrapper">
                        <div class="col-md-5" style="padding-left:0;padding-top:12px;">
                            <label class="my-0">Телефон пассажира</label>
                            <small class="text-muted" style="line-height: 10px; display: block;">Не свой, а именно пассажира <span red>*</span></small>
                        </div>

                        <div class="col-md-7" style="padding-right:0;padding-left:0;">
                            <input  data-inputmask="'mask': '+\\9\\98(99) 999-99-99'" type="tel" class="form-control" placeholder="+998(__) ___-__-__" spellcheck="false">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="input2_wrapper">
                        <div class="col-md-5" style="padding-left:0;padding-top:12px;">
                            <label class="my-0">Виза</label>
                            <small class="text-muted" style="line-height: 10px; display: block;">(если требуется)</small>
                        </div>

                        <div class="col-md-7" style="padding-right:0;padding-left:0;">
                            <input type="text" name="citizenship" class="form-control" placeholder="пример: Узбекистан" spellcheck="false">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="input2_wrapper">
                        <div class="col-md-5" style="padding-left:0;padding-top:12px;">
                            <label class="my-0">Адрес</label>
                            <small class="text-muted" style="line-height: 10px; display: block;">(если требуется)</small>
                        </div>

                        <div class="col-md-7" style="padding-right:0;padding-left:0;">
                            <input type="text" class="form-control" name="address" placeholder="г. Ташкент ул. Истиклол д. 11" spellcheck="false">
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <br>
                    <small class="text-muted" style="line-height: 10px; display: block;">Поля обозначеные <span middle red>*</span> - обязательны к заполнению.</small>
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

                    <div class="input2_wrapper">
                        <label class="col-md-6" style="padding-left:0;padding-top:12px;">Тариф:</label>

                        <div class="col-md-6" style="padding-right:0;padding-left:0;">
                            <span class="red">{{ $seat_flight->class }}</span>
                        </div>
                    </div>
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
                            <span class="red">${{ $seat_flight->getTotal() }}</span>
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
                            <span class="red" style="font-size:30px;">${{ $seat_flight->getGrandTotal() }}</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="margin-top"></div>
                    <a href="booking-success.html" class="btn btn-default btn-cf-submit3">ЗАБРОНИРОВАТЬ СЕЙЧАС</a>

                </div>
            </div>
        </div>
        <br>
        <br>
        <hr>
        <br>
    </div>
</div>



@endsection