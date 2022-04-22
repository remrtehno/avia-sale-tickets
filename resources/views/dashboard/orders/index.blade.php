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
  <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
    @foreach ($orders as $row)
      @include('dashboard.orders.partials.row')
    @endforeach
  </x-adminlte-datatable>
@endsection
