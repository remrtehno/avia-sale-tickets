@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.customer-contacts')</h1>
@stop

@php
$heads = ['Серия паспорта', 'Полное имя', 'Email', 'Типа билета', 'Год рождения', ['label' => 'Действия', 'no-export' => true, 'width' => 5]];

$config = [
    'order' => [[0, 'desc']],
    'language' => ['url' => '/lang/datatable/ru.json'],
];
@endphp


@section('content')

  <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
    @foreach ($customerContacts as $row)
      <tr>
        <td>{{ $row->passport_number }}</td>
        <td>{{ $row->name }} {{ $row->surname }} {{ $row->surname2 }}</td>
        <td>{{ $row->email }}</td>
        <td>{{ $row->type }}</td>
        <td>{{ $row->birthday }}</td>
        <td>
          <nobr>
            @include('components.edit-btn-form', [
                'route' => route('dashboard.customer-contacts.edit', ['customer_contact' => $row->id]),
            ])
            @include('components.delete-btn-form', [
                'route' => route('dashboard.customer-contacts.destroy', ['customer_contact' => $row->id]),
            ])
          </nobr>
        </td>
      </tr>
    @endforeach
  </x-adminlte-datatable>
@endsection
