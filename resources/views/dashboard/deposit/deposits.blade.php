@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.top')</h1>
@stop

@php
$heads = ['дата платежки', 'сумма', 'Покупатель', 'Рейс', 'тариф', ['label' => 'Действия', 'no-export' => true, 'width' => 5]];

$config = [
    'order' => [[1, 'desc']],
    'language' => ['url' => '/lang/datatable/ru.json'],
];
@endphp


@section('content')
  <x-adminlte-datatable wire:ignore id="table1" :heads="$heads" :config="$config">
    @foreach ($deposits as $row)
      <tr>
        <td>{{ $row->date }}</td>
        <td>{{ $row->getSum() }} UZS</td>
        <td>{{ $row->customer->name }} {{ $row->customer->email }}</td>
        <td>{{ $row->flight->getSummary() }}</td>
        <td>{{ $row->tariff }}</td>
        <td>
          <button wire:click="edit({{ $row->id }})" class="btn btn-primary btn-sm reset-select2"><i
              class="fa fa-lg fa-fw fa-pen"></i></button>
          <button wire:click="delete({{ $row->id }})" class="btn btn-danger btn-sm"><i
              class="fa fa-lg fa-fw fa-trash"></i></button>
        </td>
      </tr>
    @endforeach

  </x-adminlte-datatable>

@endsection

