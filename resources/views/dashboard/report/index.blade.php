@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.reports')</h1>
@stop

@php
$heads = ['Дата продажи', 'Имя покупателя', 'Номер заказа', 'Номер билета', 'Тип билета', 'Цена'];

$config = [
    'order' => [[0, 'desc']],
    'language' => ['url' => '/lang/datatable/ru.json'],
];
@endphp

@section('content')
  <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
    @foreach ($tickets as $ticket)
      <tr>
        <td>{{ $ticket->updated_at }}</td>
        <td>{{ $ticket->name }}</td>
        <td>
          <a
            href="{{ route('dashboard.orders.show', ['order' => ($orderID = $ticket->booking->order->first()->id)]) }}">
            {{ $orderID }}
          </a>
        </td>
        <td>
          <a href="{{ route('dashboard.tickets.show', ['ticket' => $ticket->id]) }}">
            {{ $ticket->id }}
          </a>
        </td>
        <td>{{ $ticket->type }}</td>
        <td>{{ number_format($ticket->price, 2, '.', ' ') }}</td>
      </tr>
    @endforeach
  </x-adminlte-datatable>
@endsection
