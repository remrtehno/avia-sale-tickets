<div class="popular">
  <div class="popular_inner">
    <div class="caption">
      <div class="row">
        <div class="col-md-12">
          {{ $item->direction_from }}
          {{ Config::get('constants.time_separator') }}
          {{ $item->direction_to }}
        </div>
        <div class="col-md-4">
          <figure>
            <img src="{{ $item->logo }}" alt="" style="max-width: 93px" class="img-responsive my-15" />
          </figure>
        </div>
        <div class="col-md-8  my-5">
          <div class="txt1">
            <span>Рейс: {{ $item->flight }}</span>
          </div>
          <div class="txt2 text-capitalize">
            {{-- <svg class="icon">
              <use xlink:href="/static/svg/sprite.svg#plane-arrival"></use>
            </svg> --}}
            {{ $item->getDate() }}
            <div class="flight-details">
              <svg class="icon">
                <use xlink:href="/static/svg/sprite.svg#plane-departure"></use>
              </svg>
              <b>{{ $item->getTime() }}</b>
            </div>
          </div>
        </div>
      </div>



      <div class="txt3 clearfix">
        <div class="left_side">
          <div class="stars1">
            <star-rating read-only :rating="{{ $item->getRating() }}"></star-rating>
          </div>
        </div>
        <div class="right_side">
          <a href="{{ route('flights.show', ['flight' => $item->id]) }}" class="btn-default btn1">Просмотреть</a>
        </div>
      </div>
    </div>
  </div>
</div>
