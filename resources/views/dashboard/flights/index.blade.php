@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.profile')</h1>
@stop

@php
$heads = ['ID', 'Авиакомпания', 'Рейс', 'Доступно мест', 'Дата', ['label' => 'Действия', 'no-export' => true, 'width' => 5]];

$config = [
    'order' => [[0, 'desc']],
    'language' => ['url' => '/lang/datatable/ru.json'],
];
@endphp

@section('content')
  <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
    @foreach ($flights as $row)
      @include('dashboard.flights.partials.row', ['row' => $row])
    @endforeach
    @foreach ($assignedFlights as $row)
      @include('dashboard.flights.partials.row', [
          'row' => $row,
          'assignedFlihts' => true,
      ])
    @endforeach
  </x-adminlte-datatable>
@endsection
