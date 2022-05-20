@extends('dashboard.page')

@section('content')
  @livewire('dashboard.site-settings')
@endsection


@push('js')
  @livewireScripts
@endpush

@push('css')
  @livewireStyles
@endpush
