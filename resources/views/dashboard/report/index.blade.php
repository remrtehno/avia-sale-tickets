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

$configDate = ['format' => 'YYYY-MM-DD HH:mm'];

@endphp

@section('content')

  <h4 class="mb-4">Данные показаны за период {{ $from->format('Y-m-d H:i') }} -
    {{ $to->format('Y-m-d H:i') }}
  </h4>

  @include('dashboard.report.partials.date-filter')


  <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
    @foreach ($tickets as $ticket)
      @include('dashboard.report.partials.row')
    @endforeach
  </x-adminlte-datatable>
@endsection
