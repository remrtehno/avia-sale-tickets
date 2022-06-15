@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.top')</h1>
@stop

@section('content')
  @livewire('dashboard.deposit-create', ['depositId' => $id])
@stop

@push('js')
  @livewireScripts
@endpush

@push('css')
  @livewireStyles
@endpush
