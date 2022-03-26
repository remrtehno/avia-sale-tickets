@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.reports')</h1>
@stop

@php
$heads = ['Дата продажи', 'Имя покупателя', 'Личные данные', 'Номер рейса', 'Номер заказа', 'Номер билета', 'Тип билета', 'Цена'];

$config = [
    'order' => [[0, 'desc']],
    'language' => ['url' => '/lang/datatable/ru.json'],
];
@endphp

@section('content')
  <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
    @foreach ($tickets as $ticket)
      @include('dashboard.report.partials.row')
    @endforeach
  </x-adminlte-datatable>
@endsection
