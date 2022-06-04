@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.top')</h1>
@stop

@php
$heads = ['дата платежки', 'сумма', 'Покупатель', 'Коментарий', ['label' => 'Действия', 'no-export' => true, 'width' => 5]];

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
        <td>{{ $row->customer->getSummary() }} </td>
        <td>{{ $row->comment }}</td>
        <td>
          <a href="{{ route('dashboard.deposit.edit', ['deposit' => $row->id]) }}"
            class="btn btn-primary btn-sm reset-select2"><i class="fa fa-lg fa-fw fa-pen"></i></a>

          <form method="POST" class="d-inline"
            action="{{ route('dashboard.deposit.destroy', ['deposit' => $row->id]) }}">
            @method('delete')
            @csrf
            <button onclick="confirm('Delete?')" type="submit" class="btn btn-danger btn-sm"><i
                class="fa fa-lg fa-fw fa-trash"></i>
            </button>
          </form>

        </td>
      </tr>
    @endforeach

  </x-adminlte-datatable>


  <a class="btn btn-primary btn-md" href="{{ route('dashboard.deposit.create') }}">@lang('common.create')</a>

@endsection

{{-- @push('js')
  @livewireScripts
@endpush

@push('css')
  @livewireStyles
@endpush --}}
