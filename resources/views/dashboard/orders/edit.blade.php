@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.orders')</h1>
@stop


@section('content')
  <form action="{{ route('dashboard.orders.update', ['order' => $order->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <x-adminlte-select name="status" label="Статус"
      onchange="confirm('Вы точно хотите поменять статус?') && this.closest('form').submit();">
      @foreach ($order::getStatuses() as $status)
        <option @if ($order->status === $status) selected @endif>{{ $status }}</option>
      @endforeach
    </x-adminlte-select>
  </form>
@stop
