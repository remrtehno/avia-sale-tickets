@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.tickets')</h1>
@stop


@section('content')

  <form method="POST" action="{{ route('dashboard.tickets.update', [
      'ticket' => $ticket->uuid,
  ]) }}">
    @csrf
    @method('PUT')

    <input type="hidden" name="flight_id" value="{{ $ticket->booking->flight->id }}">

    <h3> ID: {{ $ticket->uuid }}</h3>
    @include('dashboard.tickets.partials.form')

    <x-adminlte-button type="submit" label="{{ __('common.save') }}" theme="primary" />
    <x-adminlte-button type="button" label="{{ __('common.back') }}" theme="primary" onclick="window.history.back()" />
  </form>
@endsection
