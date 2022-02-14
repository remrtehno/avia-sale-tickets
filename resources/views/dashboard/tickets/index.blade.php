@extends('adminlte::page')

@section('content_header')
  <h1>@lang('dashboard.tickets')</h1>
@stop

@php
$heads = ['ID', 'Авиакомпания', 'Рейс', 'Осталось мест', 'Дата', ['label' => 'Действия', 'no-export' => true, 'width' => 5]];

$config = [
    'order' => [[0, 'desc']],
    'language' => ['url' => '/lang/datatable/ru.json'],
];
@endphp

@section('content')

  <h4>Выберите рейс</h4>

  <x-adminlte-select2 name="sel2Basic">
    @foreach ($flights as $row)
      <option>{{ $row->flight }}</option>
    @endforeach
  </x-adminlte-select2>

  <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
    @foreach ($tickets as $row)
      <tr>
        <td>{{ $row->id }}</td>
        <td>{{ $row->type }}</td>
        <td>{{ $row->booking->flight->flight }}</td>
        <td>{{ $row->id }}</td>
      </tr>
    @endforeach
  </x-adminlte-datatable>



@endsection
