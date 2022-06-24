@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.orders')</h1>
@stop

@php
$heads = ['ID', 'Цена', 'Дата создания', 'Типа билета', 'Статус', 'Личные данные пассажира', ['label' => 'Действия', 'no-export' => true, 'width' => 5]];

$config = [
    'order' => [[2, 'desc']],
    'language' => ['url' => '/lang/datatable/ru.json'],
];
@endphp


@section('content')

  <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
    @foreach ($booking as $row)
      <tr>
        <td>{{ $row->id }}</td>
        <td>{{ $row->price }}</td>
        <td>{{ $row->created_at }}</td>
        <td>{{ $row->type }}</td>
        <td>{{ $row->status }}</td>
        <td>

        </td>
      </tr>
    @endforeach
  </x-adminlte-datatable>
@endsection
