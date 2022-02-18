@extends('adminlte::page')

@section('content_header')
  <h1>@lang('dashboard.tickets')</h1>
@stop

@php
$heads = ['ID', 'Авиакомпания', 'Рейс', 'Статус', ['label' => 'Действия', 'no-export' => true, 'width' => 5]];

$config = [
    'order' => [[0, 'desc']],
    'language' => ['url' => '/lang/datatable/ru.json'],
];

$configSelect2 = [
    'language' => 'ru',
];
@endphp

@section('plugins.Select2', true)

@section('content')

  <h4>Выберите рейс</h4>
  <form action="">
    <x-adminlte-select2 name="flight_id" :config="$configSelect2" lang="ru" onchange="this.closest('form').submit();">
      @foreach ($flights as $row)
        @php
          $selected = $row->id == request('flight_id');
        @endphp
        <option value="{{ $row->id }}" @if ($selected) selected @endif>
          {{ $row->flight }}
          |
          <small>{{ $row->getTickets()->count() }}</small> - Билетов
        </option>
      @endforeach
    </x-adminlte-select2>

  </form>

  <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
    @foreach ($tickets as $row)
      <tr>
        <td>{{ $row->id }}</td>
        <td>{{ $row->type }}</td>
        <td>{{ $row->booking->flight }}</td>
        <td>{{ $row->id }}</td>
        <td>q</td>
      </tr>
    @endforeach
  </x-adminlte-datatable>



@endsection
