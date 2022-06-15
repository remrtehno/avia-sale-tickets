@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.top')</h1>
@stop

@php
$heads = ['дата платежки', 'сумма', 'Покупатель', 'Рейс', 'тариф'];

$config = [
    'order' => [[1, 'desc']],
    'language' => ['url' => '/lang/datatable/ru.json'],
];
@endphp

@section('content')
  <x-adminlte-datatable wire:ignore id="table1" :heads="$heads" :config="$config">
    @foreach ($topPayments as $topPaymentItem)
      <tr>
        <td>{{ $topPaymentItem->date->format('d-m-Y H:i:s') }}</td>
        <td>{{ $topPaymentItem->getSum() }} UZS</td>
        <td>{{ $topPaymentItem->customer->name }} {{ $topPaymentItem->customer->email }}</td>
        <td>{{ $topPaymentItem->flight->getSummary() }}</td>
        <td>{{ $topPaymentItem->tariff }}</td>
      </tr>
    @endforeach

  </x-adminlte-datatable>
@endsection
