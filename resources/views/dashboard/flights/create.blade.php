@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.new_flight')</h1>
@stop

@php
$config = ['format' => 'YYYY-MM-DD H:i'];
@endphp

@section('content')
  <form action="{{ route('dashboard.flights.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    @include('dashboard.flights.partials.form')
    <div class="col-md-6">
      <x-adminlte-button type="submit" label="{{ __('common.create') }}" theme="primary" />
    </div>
  </form>
@endsection
