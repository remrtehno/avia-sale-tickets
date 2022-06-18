@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.orders')</h1>
@stop

@php
$heads = ['ID', 'Рейс', 'Общая сумма', 'Дата создания', 'Статус', 'Билеты пассажиров', ['label' => 'Действия', 'no-export' => true, 'width' => 5]];

$config = [
    'order' => [[3, 'desc']],
    'language' => ['url' => '/lang/datatable/ru.json'],
];
@endphp

@section('content')
  <table id="table1" :heads="$heads" :config="$config" class="table dataTable no-footer">
    <thead>
      <tr>
        @foreach ($heads as $th)
          <th @isset($th['width']) style="width:{{ $th['width'] }}%" @endisset
            @isset($th['no-export']) dt-no-export @endisset>
            {{ is_array($th) ? $th['label'] ?? '' : $th }}
          </th>
        @endforeach
      </tr>
    </thead>

    @foreach ($orders as $row)
      @include('dashboard.orders.partials.row')
    @endforeach
  </table>
@endsection


@push('js')
  <script>
    $(document).ready(function() {
      $.fn.dataTable.moment('DD-MM-YYYY HH:mm:ss');

      $('#table1').DataTable(@json($config));
    });
  </script>
@endpush
