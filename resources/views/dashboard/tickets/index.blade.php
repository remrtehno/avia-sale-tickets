@extends('adminlte::page')

@section('content_header')
  <h1>@lang('dashboard.tickets')</h1>
@stop

@php
$heads = ['ID', 'Цена', 'Дата создания', 'Типа билета', 'Статус', 'Личные данные пассажира', ['label' => 'Действия', 'no-export' => true, 'width' => 5]];

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
  <form action="{{ route('dashboard.tickets.index') }}" id="flightSelect">
    <x-adminlte-select2 name="flight_id" :config="$configSelect2" lang="ru" onchange="this.closest('form').submit();">
      @foreach ($flights as $row)
        @php
          $selected = $row->id == request('flight_id');
        @endphp
        <option value="{{ $row->id }}" @if ($selected) selected @endif>
          {{ $row->getTime() }} {{ $row->getDeparute()->isoFormat('L') }}
          |
          {{ $row->flight }}
          |
          <small>{{ $row->getTickets()->count() }}</small> - Билетов
        </option>
      @endforeach
    </x-adminlte-select2>
  </form>

  <a class="btn btn-danger my-3"
    href="{{ route('dashboard.tickets.csv', ['flight_id' => request('flight_id')]) }}">CSV</a>


  <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
    @foreach ($tickets as $row)
      <tr>
        <td>{{ $row->id }}</td>
        <td>{{ $row->price }}</td>
        <td>{{ $row->created_at }}</td>
        <td>{{ $row->type }}</td>
        <td>{{ $row->status }}</td>
        <td>
          <x-adminlte-modal id="modalMin-{{ $row->id }}">
            @include('dashboard.tickets.partials.render-fields', [
                'row' => $row,
            ])
          </x-adminlte-modal>
          <x-adminlte-button label="Просмотреть" data-toggle="modal" data-target="#modalMin-{{ $row->id }}" />
        </td>

        <td>
          @include('dashboard.tickets.partials.action-buttons', [
              'id' => $row->id,
          ])
        </td>
      </tr>
    @endforeach
  </x-adminlte-datatable>
@endsection


@section('js')
  <script>
    window.location.search || flightSelect.submit()
  </script>
@stop
