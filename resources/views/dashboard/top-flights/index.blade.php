@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.top')</h1>
@stop

@php
$heads = ['ID', 'top', 'Рейс', 'Дата', ['label' => 'Действия', 'no-export' => true, 'width' => 5]];

$config = [
    'order' => [[1, 'desc']],
    'language' => ['url' => '/lang/datatable/ru.json'],
];
@endphp

@section('content')
  <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
    @foreach ($flights as $row)
      <tr>
        <td>{{ $row->id }}</td>
        <td>{{ $row->top ? 'TOP' : '' }}</td>
        <td>{{ $row->flight }}
          <span class="p-1 bg-gray rounded">
            {{ $row->user->name }}
            {{ $row->user->email }}
          </span>
        </td>
        <td class="text-capitalize">
          {{ $row->getTime() }} <span class="p-1"></span> {{ $row->getFullDate() }}
        </td>
        <td>
          <a class="btn btn-xs btn-default text-teal mx-1 shadow" target="_blank"
            href="{{ route('dashboard.top-flights.show', ['top_flight' => $row->id]) }}" title="Details">
            <i class="fa fa-lg fa-fw fa-eye"></i>
          </a>
          <a class="btn btn-xs btn-default text-primary mx-1 shadow"
            href="{{ route('dashboard.top-flights.edit', ['top_flight' => $row->id]) }}" title="Edit">
            <i class="fa fa-lg fa-fw fa-pen"></i>
          </a>
        </td>
      </tr>
    @endforeach

  </x-adminlte-datatable>
@endsection
