@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.orders')</h1>
@stop


@section('content')
  <x-adminlte-input name="iBasic" value="{{ $order->status }}" label="Статус" />
@stop
