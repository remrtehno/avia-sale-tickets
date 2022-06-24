@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.orders')</h1>
@stop

@php
$heads = ['ID', 'Рейс', 'Общая сумма', 'Дата создания', 'Статус', 'Билеты пассажиров', ['label' => 'Действия', 'no-export' => true, 'width' => 5]];
@endphp

@section('content')
  <x-data-table :heads="$heads" :sort-cells="[[3, 'desc']]">
    @foreach ($orders as $row)
      @include('dashboard.orders.partials.row')
    @endforeach
  </x-data-table>
@endsection
