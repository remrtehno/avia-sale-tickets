@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.top')</h1>
@stop

@php
$heads = ['дата платежки', 'сумма', 'Продавец', 'Комментарий'];

$config = [
    'order' => [[1, 'desc']],
    'language' => ['url' => '/lang/datatable/ru.json'],
];
@endphp


@section('content')
  <x-adminlte-datatable wire:ignore id="table1" :heads="$heads" :config="$config">
    @foreach ($deposits as $row)
      <tr>
        <td>{{ $row->date->format('d-m-Y H:i:s') }}</td>
        <td>{{ $row->getSum() }} UZS</td>
        <td>{{ $row->seller->getSummary() }}</td>
        <td>{{ $row->comment }}</td>
      </tr>
    @endforeach
  </x-adminlte-datatable>
  <div class="p-3"></div>
  <hr>
  <h3>Общая сумма депозита к каждому юзеру</h3>

  <x-adminlte-datatable wire:ignore id="table2" :heads="['Пользователь', 'Общая сумма', 'Остаток']" :config="$config">
    @foreach ($mergedByUsers as $row)
      <tr>
        <td>{{ $row->seller->getSummary() }}</td>
        <td>{{ $row->getSum() }} UZS</td>
        <td>{{ $row->getSum($row->leftSum) }} UZS</td>
      </tr>
    @endforeach
  </x-adminlte-datatable>

@endsection
