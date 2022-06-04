<div class="tab-content">
  <div role="tabpanel" class="tab-pane fade in active" id="cash-or-card-transfer">
    <div id="radio-card-cash">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
        <label class="form-check-label" for="flexRadioDefault1">
          Онлайн картой
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
        <label class="form-check-label" for="flexRadioDefault2">
          Наличными
        </label>
      </div>
    </div>

    @include('booking.partials._order-info')

    <div class="contacts">
      <p>Для того чтобы оплатить за авиабилет(ы) обратитесь по нижеуказанному адресу и контактам:</p>
      <br>
      {!! $contacts->email_footer !!}
      <br>
      {!! $contacts->phone_header !!}

      <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
      <script>
        ymaps.ready(function() {
          var latlist = [41.3194678, 41.3192356, 41.3195783, 41.3193455, 41.3190455, 41.31934, 41.3191234, 41.319876,
            41.3190816, 41.319233
          ];
          var gavList = [69.31922325, 69.3191223, 69.3191233, 69.3195653, 69.3192345, 69.3195433, 69.31913456, 69.3193232,
            69.31942232, 69.31932222
          ];
          var i = 0;
          var myMap = new ymaps.Map('map', {
            center: [41.289163, 69.203509, ],
            zoom: 16
          }, {
            searchControlProvider: 'yandex#search'
          });

          // Создаём макет содержимого.
          var MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
            '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
          );
          var lat = 0,
            gavnitud = 0;
          var myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
            hintContent: 'ALAN-TAILOR ООО',
            balloonContent: 'ALAN-TAILOR ООО'
          }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: '/public/uploads/company-marker.png',
            // Размеры метки.
            iconImageSize: [70, 82],
            iconImageOffset: [-24, -24],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            /*iconImageOffset: [-5, -38]*/
          });
          lat = 41.289166;
          gavnitud = 69.203507;


          i = i + 1;
          myPlacemarkWithContent = new ymaps.Placemark([lat, gavnitud], {
            hintContent: 'ЧИЛАНЗАРСКОЕ РУВД',
            balloonContent: 'ЧИЛАНЗАРСКОЕ РУВД',

          }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: '/i/Attractions/31.png',
            // Размеры метки.
            iconImageSize: [30, 40],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.

            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
          });

          myMap.geoObjects
            .add(myPlacemark)
            .add(myPlacemarkWithContent);
          lat = 41.291714;
          gavnitud = 69.203696;


          i = i + 1;
          myPlacemarkWithContent = new ymaps.Placemark([lat, gavnitud], {
            hintContent: 'ШКОЛА №183  г. ТАШКЕНТА',
            balloonContent: 'ШКОЛА №183  г. ТАШКЕНТА',

          }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: '/i/Attractions/13.png',
            // Размеры метки.
            iconImageSize: [30, 40],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.

            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
          });

          myMap.geoObjects
            .add(myPlacemark)
            .add(myPlacemarkWithContent);
          lat = 41.289041;
          gavnitud = 69.206528;


          i = i + 1;
          myPlacemarkWithContent = new ymaps.Placemark([lat, gavnitud], {
            hintContent: 'ЗАГС ЧИЛАНЗАРСКОГО РАЙОНА г. ТАШКЕНТА',
            balloonContent: 'ЗАГС ЧИЛАНЗАРСКОГО РАЙОНА г. ТАШКЕНТА',

          }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: '/i/Attractions/47.png',
            // Размеры метки.
            iconImageSize: [30, 40],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.

            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
          });

          myMap.geoObjects
            .add(myPlacemark)
            .add(myPlacemarkWithContent);
          lat = 41.289077;
          gavnitud = 69.196989;


          i = i + 1;
          myPlacemarkWithContent = new ymaps.Placemark([lat, gavnitud], {
            hintContent: '1-Й АКАДЕМИЧЕСКИЙ ЛИЦЕЙ имени СИРОЖИДДИНОВА',
            balloonContent: '1-Й АКАДЕМИЧЕСКИЙ ЛИЦЕЙ имени СИРОЖИДДИНОВА',

          }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: '/i/Attractions/39.png',
            // Размеры метки.
            iconImageSize: [30, 40],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.

            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
          });

          myMap.geoObjects
            .add(myPlacemark)
            .add(myPlacemarkWithContent);
          lat = 41.285931;
          gavnitud = 69.205782;


          i = i + 1;
          myPlacemarkWithContent = new ymaps.Placemark([lat, gavnitud], {
            hintContent: 'RAYHON РЕСТОРАН - ЧИЛАНЗАР',
            balloonContent: 'RAYHON РЕСТОРАН - ЧИЛАНЗАР',

          }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: '/i/Attractions/45.png',
            // Размеры метки.
            iconImageSize: [30, 40],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.

            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
          });

          myMap.geoObjects
            .add(myPlacemark)
            .add(myPlacemarkWithContent);
          lat = 41.285095;
          gavnitud = 69.200349;


          i = i + 1;
          myPlacemarkWithContent = new ymaps.Placemark([lat, gavnitud], {
            hintContent: 'ШКОЛА №184  г. ТАШКЕНТА',
            balloonContent: 'ШКОЛА №184  г. ТАШКЕНТА',

          }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: '/i/Attractions/13.png',
            // Размеры метки.
            iconImageSize: [30, 40],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.

            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
          });

          myMap.geoObjects
            .add(myPlacemark)
            .add(myPlacemarkWithContent);
          lat = 41.283592;
          gavnitud = 69.202174;


          i = i + 1;
          myPlacemarkWithContent = new ymaps.Placemark([lat, gavnitud], {
            hintContent: 'HOSILOT КАФЕ',
            balloonContent: 'HOSILOT КАФЕ',

          }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: '/i/Attractions/45.png',
            // Размеры метки.
            iconImageSize: [30, 40],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.

            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
          });

          myMap.geoObjects
            .add(myPlacemark)
            .add(myPlacemarkWithContent);
          lat = 41.291818;
          gavnitud = 69.19463;


          i = i + 1;
          myPlacemarkWithContent = new ymaps.Placemark([lat, gavnitud], {
            hintContent: 'БАНКЕТНЫЙ ЗАЛ АФРУЗ',
            balloonContent: 'БАНКЕТНЫЙ ЗАЛ АФРУЗ',

          }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: '/i/Attractions/45.png',
            // Размеры метки.
            iconImageSize: [30, 40],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.

            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
          });

          myMap.geoObjects
            .add(myPlacemark)
            .add(myPlacemarkWithContent);
          lat = 41.282775;
          gavnitud = 69.202603;


          i = i + 1;
          myPlacemarkWithContent = new ymaps.Placemark([lat, gavnitud], {
            hintContent: 'IPOTEKA BANK ЧИЛАНЗАРСКИЙ ФИЛИАЛ',
            balloonContent: 'IPOTEKA BANK ЧИЛАНЗАРСКИЙ ФИЛИАЛ',

          }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: '/i/Attractions/20.png',
            // Размеры метки.
            iconImageSize: [30, 40],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.

            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
          });

          myMap.geoObjects
            .add(myPlacemark)
            .add(myPlacemarkWithContent);
          lat = 41.292991;
          gavnitud = 69.194801;


          i = i + 1;
          myPlacemarkWithContent = new ymaps.Placemark([lat, gavnitud], {
            hintContent: 'UZBEKNEFTEGAZ АВТОЗАПРАВОЧНАЯ СТАНЦИЯ №34',
            balloonContent: 'UZBEKNEFTEGAZ АВТОЗАПРАВОЧНАЯ СТАНЦИЯ №34',

          }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: '/i/Attractions/24.png',
            // Размеры метки.
            iconImageSize: [30, 40],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.

            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
          });

          myMap.geoObjects
            .add(myPlacemark)
            .add(myPlacemarkWithContent);
          lat = 41.296071;
          gavnitud = 69.203039;


          i = i + 1;
          myPlacemarkWithContent = new ymaps.Placemark([lat, gavnitud], {
            hintContent: 'МЕЧЕТЬ ХАСАН КОРИ',
            balloonContent: 'МЕЧЕТЬ ХАСАН КОРИ',

          }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: '/i/Attractions/54.png',
            // Размеры метки.
            iconImageSize: [30, 40],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.

            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
          });

          myMap.geoObjects
            .add(myPlacemark)
            .add(myPlacemarkWithContent);
          lat = 41.291873;
          gavnitud = 69.211112;


          i = i + 1;
          myPlacemarkWithContent = new ymaps.Placemark([lat, gavnitud], {
            hintContent: 'PARUS СЕМЕЙНЫЙ РАЗВЛЕКАТЕЛЬНЫЙ ЦЕНТР',
            balloonContent: 'PARUS СЕМЕЙНЫЙ РАЗВЛЕКАТЕЛЬНЫЙ ЦЕНТР',

          }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: '/i/Attractions/11.png',
            // Размеры метки.
            iconImageSize: [30, 40],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.

            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
          });

          myMap.geoObjects
            .add(myPlacemark)
            .add(myPlacemarkWithContent);
          lat = 41.283331;
          gavnitud = 69.207594;


          i = i + 1;
          myPlacemarkWithContent = new ymaps.Placemark([lat, gavnitud], {
            hintContent: 'ТАШКЕНТСКИЙ ГОСУДАРСТВЕННЫЙ ТЕАТР МУЗЫКАЛЬНОЙ КОМЕДИИ',
            balloonContent: 'ТАШКЕНТСКИЙ ГОСУДАРСТВЕННЫЙ ТЕАТР МУЗЫКАЛЬНОЙ КОМЕДИИ',

          }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: '/i/Attractions/7.png',
            // Размеры метки.
            iconImageSize: [30, 40],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.

            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
          });

          myMap.geoObjects
            .add(myPlacemark)
            .add(myPlacemarkWithContent);
          lat = 41.295333;
          gavnitud = 69.207687;


          i = i + 1;
          myPlacemarkWithContent = new ymaps.Placemark([lat, gavnitud], {
            hintContent: 'ШКОЛА №179  г. ТАШКЕНТА',
            balloonContent: 'ШКОЛА №179  г. ТАШКЕНТА',

          }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: '/i/Attractions/13.png',
            // Размеры метки.
            iconImageSize: [30, 40],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.

            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
          });

          myMap.geoObjects
            .add(myPlacemark)
            .add(myPlacemarkWithContent);
          lat = 41.285326;
          gavnitud = 69.193844;


          i = i + 1;
          myPlacemarkWithContent = new ymaps.Placemark([lat, gavnitud], {
            hintContent: 'УЗБЕКСКИЙ ГОСУДАРСТВЕННЫЙ УНИВЕРСИТЕТ МИРОВЫХ ЯЗЫКОВ',
            balloonContent: 'УЗБЕКСКИЙ ГОСУДАРСТВЕННЫЙ УНИВЕРСИТЕТ МИРОВЫХ ЯЗЫКОВ',

          }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: '/i/Attractions/14.png',
            // Размеры метки.
            iconImageSize: [30, 40],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.

            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
          });

          myMap.geoObjects
            .add(myPlacemark)
            .add(myPlacemarkWithContent);
          lat = 41.294151;
          gavnitud = 69.210194;


          i = i + 1;
          myPlacemarkWithContent = new ymaps.Placemark([lat, gavnitud], {
            hintContent: 'РОДИЛЬНЫЙ КОМПЛЕКС №7',
            balloonContent: 'РОДИЛЬНЫЙ КОМПЛЕКС №7',

          }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: '/i/Attractions/34.png',
            // Размеры метки.
            iconImageSize: [30, 40],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.

            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
          });

          myMap.geoObjects
            .add(myPlacemark)
            .add(myPlacemarkWithContent);
          lat = 41.291539;
          gavnitud = 69.212106;


          i = i + 1;
          myPlacemarkWithContent = new ymaps.Placemark([lat, gavnitud], {
            hintContent: 'XALQ BANKI АКБ ГОЛОВНОЙ ОФИС',
            balloonContent: 'XALQ BANKI АКБ ГОЛОВНОЙ ОФИС',

          }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: '/i/Attractions/20.png',
            // Размеры метки.
            iconImageSize: [30, 40],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.

            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
          });

          myMap.geoObjects
            .add(myPlacemark)
            .add(myPlacemarkWithContent);
          lat = 41.281600;
          gavnitud = 69.201653;


          i = i + 1;
          myPlacemarkWithContent = new ymaps.Placemark([lat, gavnitud], {
            hintContent: 'ТРЦ ATLAS НА ЧИЛАНЗАРЕ',
            balloonContent: 'ТРЦ ATLAS НА ЧИЛАНЗАРЕ',

          }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: '/i/Attractions/11.png',
            // Размеры метки.
            iconImageSize: [30, 40],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.

            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
          });

          myMap.geoObjects
            .add(myPlacemark)
            .add(myPlacemarkWithContent);
          lat = 41.281529;
          gavnitud = 69.201460;


          i = i + 1;
          myPlacemarkWithContent = new ymaps.Placemark([lat, gavnitud], {
            hintContent: 'MEDIA PARK - ЧИЛАНЗАР',
            balloonContent: 'MEDIA PARK - ЧИЛАНЗАР',

          }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: '/i/Attractions/11.png',
            // Размеры метки.
            iconImageSize: [30, 40],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.

            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
          });

          myMap.geoObjects
            .add(myPlacemark)
            .add(myPlacemarkWithContent);
          lat = 41.287836;
          gavnitud = 69.21273;


          i = i + 1;
          myPlacemarkWithContent = new ymaps.Placemark([lat, gavnitud], {
            hintContent: 'ШКОЛА №178  г. ТАШКЕНТА',
            balloonContent: 'ШКОЛА №178  г. ТАШКЕНТА',

          }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: '/i/Attractions/13.png',
            // Размеры метки.
            iconImageSize: [30, 40],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.

            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
          });

          myMap.geoObjects
            .add(myPlacemark)
            .add(myPlacemarkWithContent);


        });
      </script>

      <p class="my-15"></p>
      <div id="map" style="height: 400px;"></div>
    </div>

    <p style="height: 20px"></p>

    <button type="submit" onclick="makePay()" class="btn btn-default btn-cf-submit3 w-100 booking-submit">
      ОПЛАТИТЬ
    </button>
  </div>
  <div role="tabpanel" class="tab-pane fade" id="transfer">

    @auth
      @include('booking.partials._registered_users-pay-by-bank')
    @endauth

    <p style="height: 20px"></p>
    <form action="{{ route('dashboard.order.pay_deposit') }}" method="POST">
      @csrf
      <input name="order_id" type="hidden" value="{{ $order->uuid }}">
      <button @if ($deposit < $booking->order->get(0)->total) disabled @endif type="submit"
        class="btn btn-default btn-cf-submit3 w-100 booking-submit">
        ОПЛАТИТЬ ИЗ ДЕПОЗИТА
      </button>
    </form>

  </div>
</div>
