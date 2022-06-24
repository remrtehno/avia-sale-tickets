@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.reports')</h1>
@stop

@php
$heads = ['Дата продажи', 'Зарегистрирован ', 'Личные данные', 'Номер рейса', 'Номер заказа', 'Номер билета', 'Тип билета', 'Цена'];

$configDate = ['format' => 'DD-MM-YYYY HH:mm'];
@endphp

@section('content')

  <h4 class="mb-4">Данные показаны за период {{ $from->format('d-m-Y H:i') }} -
    {{ $to->format('d-m-Y H:i') }}
  </h4>

  @if ($user?->name)
    <h4 class="mb-4">
      Данные показаны для пользователя: {{ $user->name }}
    </h4>
  @endif

  @include('dashboard.report.partials.date-filter')

  <x-data-table :heads="$heads">
    @foreach ($tickets as $ticket)
      @include('dashboard.report.partials.row')
    @endforeach
    @foreach ($soldToUser as $item)
      @include('dashboard.report.partials.row-to-user')
    @endforeach
  </x-data-table>
@endsection
