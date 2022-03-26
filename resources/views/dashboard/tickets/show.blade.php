@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.tickets')</h1>
@stop


@section('content')
  <h4>Рейс: {{ $ticket->booking->flight->flight }} {{ $ticket->booking->flight->getDate() }}
    {{ $ticket->booking->flight->getTime() }} </h4>

  <h4>Заказ: {{ $ticket->booking->order->first()->id }}</h4>


  @include('dashboard.tickets.partials.form', [
      'disabled' => true,
  ])
@endsection
