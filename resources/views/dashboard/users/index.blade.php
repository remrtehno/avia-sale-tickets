@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.customer-contacts')</h1>
@stop

@php
$heads = ['На модерации', 'Тип юзера', 'Полное имя', 'Email', 'Год рождения', ['label' => 'Действия', 'no-export' => true, 'width' => 5]];

$config = [
    'order' => [[0, 'asc']],
    'language' => ['url' => '/lang/datatable/ru.json'],
];
@endphp


@section('content')
  @if (!empty($success))
    <div class="alert alert-success"> {{ $success }}</div>
  @endif
  <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
    @foreach ($users as $row)
      <tr>
        <td class=" {{ $row->isApproved() ? 'bg-green' : 'bg-red' }}">{{ $row->isApprovedText() }}</td>
        <td>{{ $row->roleText() }}</td>
        <td>{{ $row->name }} {{ $row->surname }} {{ $row->surname2 }}</td>
        <td>{{ $row->email }}</td>
        <td>{{ $row->birthday?->format('d-m-Y') }}</td>
        <td>
          <nobr>
            @include('components.edit-btn-form', [
                'route' => route('dashboard.users.edit', ['user' => $row->id]),
            ])
            @if ($row->canBeDeleted())
              @include('components.delete-btn-form', [
                  'route' => route('dashboard.users.destroy', ['user' => $row->id]),
              ])
            @endif
          </nobr>
        </td>
      </tr>
    @endforeach
  </x-adminlte-datatable>
@endsection
