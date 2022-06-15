@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.top')</h1>
@stop

@section('content')
  @livewire('top-payments')
@endsection

@push('js')
  @livewireScripts
@endpush

@push('css')
  @livewireStyles
@endpush
