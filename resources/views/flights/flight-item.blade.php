<div class="col-sm-12 seat-flight-item">
  <div class="bg-" style="box-shadow: 0 5px 10px rgb(0 8 19 / 15%);">
    <div class="row">
      <div class="col-md-9">
        <div class="thumb4">
          <div class="thumbnail clearfix">
            <div class="caption">
              <div class="row">
                <div class="col-md-2">
                  <figure>
                    <img src="{{ $flight->logo }}" style="max-width: 93px" alt="{{ $flight->title }}"
                      class="img-responsive">
                  </figure>
                </div>
                <div class="col-md-5">
                  <div class="txt1 seat-flight-title">
                    {{ $flight->direction_from }} - {{ $flight->direction_to }}
                  </div>
                </div>
                <div class="col-md-2">
                  Рейтинг: <star-rating read-only :size="14" :rating="{{ $flight->rating }}"></star-rating>
                </div>
                @if ($flight->getSeats() < 10)
                  <div class="col-md-2">
                    Осталось мест: {{ $flight->getSeats() }}
                  </div>
                @endif
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="text-capitalize">
                    {{ $flight->getDate() }}
                  </div>
                </div>
                <div class="col-md-9">
                  <svg class="icon">
                    <use xlink:href="/static/svg/sprite.svg#plane-departure"></use>
                  </svg>
                  {{ $flight->getTime() }}
                  {{ $flight->direction_from }}

                  <span class="mx-10">|</span>

                  <svg class="icon">
                    <use xlink:href="/static/svg/sprite.svg#plane-arrival"></use>
                  </svg>
                  {{ $flight->getTimeArrival() }}
                  {{ $flight->direction_to }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="price-block">
          <div class="price my-8"><b>{{ $flight->price_adult }} $</b></div>
          <a href="{{ route('flights.show', array_merge(['flight' => $flight->id], $_GET)) }}"
            class="btn-default btn1">
            Купить
          </a>
        </div>
      </div>
    </div>
  </div>

</div>
