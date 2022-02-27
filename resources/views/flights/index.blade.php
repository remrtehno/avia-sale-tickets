@extends('layout')


@section('content')
  <hr>
  <x-breadcrumbs :route="'seat-flight'"></x-breadcrumbs>

  <div id="content">
    <div class="container">

      <div class="tabs_wrapper tabs1_wrapper">
        @include('flights._search-flights', ['route' => '?'])

        <div class="row">
          <div class="col-sm-12">
            <form action="{{ request()->fullUrl() }}" method="GET" onsubmit="alert"
              class="form3 clearfix autoSubmitAfterChange">

              @foreach (request()->except(['sort_by', 'page']) as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
              @endforeach


              <div class="select1_wrapper txt">
                <label>Сортировка:</label>
              </div>
              <div class="select1_wrapper sel" style="width: 200px;">
                <div class="select1_inner">
                  <select-component name="sort_by" class-name="select2 select"
                    options="{{ json_encode(['Самые новые', 'Самые дешевые', 'Самые дорогие', 'Самые популярные']) }}"
                    values="{{ json_encode([['date', 'ASC'], ['price_adult', 'ASC'], ['price_adult', 'DESC'], ['rating', 'DESC']]) }}"
                    value="{{ json_encode(explode(',', request('sort_by'))) }}" value-type="JSON">
                  </select-component>
                </div>
              </div>
            </form>

            <div class="row">
              @foreach ($flights as $flight)
                @include('flights.flight-item', ['flight' => $flight])
              @endforeach

              @if (!$flights->count())
                <div class="col-xs-12">
                  <div class="alert alert-warning">
                    @if ($closestDateFound)
                      К сожалению на указанную дату ничего не найдено,
                      <b>
                        показать результаты на другую
                        <a href="{{ $closestDateFound->getUrlWithChangedDates() }}"> ближайшую дату.</a>
                      </b>
                    @else
                      К сожалению ничего не найдено,
                      <b>попробуйте изменить параметры поиска.</b>
                    @endif
                  </div>
                </div>
              @endif

              {{ $flights->withQueryString()->links() }}
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
@endsection


@section('js')
  <script>
    $('#searchForm').twidget({
      type: 'avia',
      locale: 'ru',
      open_in_new_tab: false,
      default_origin: "{{ request('origin_iata') }}",
      default_destination: "{{ request('destination_iata') }}",

    })

    setTimeout(() => {
      // $('#searchForm [name="depart_date"]').datepicker('setDate', new Date("{{ request('depart_date') }}"))
      // $('#searchForm [name="return_date"]').datepicker('setDate', new Date("{{ request('return_date') }}"))

    }, 500);
  </script>
@endsection
