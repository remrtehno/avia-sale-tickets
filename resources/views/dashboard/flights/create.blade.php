@extends('adminlte::page')

@section('content_header')
  <h1>@lang('dashboard.profile')</h1>
@stop

@php
$config = ['format' => 'YYYY-MM-DD'];
@endphp

@section('content')

  <form action="/foo/bar" method="POST">
    @method('PUT')
    <div class="row">

      <x-adminlte-input-date name="idBasic" :config="$config" label="{{ __('dashboard.date_flight') }}"
        fgroup-class="col-md-3" />

      <x-adminlte-input name="iLabel" label="{{ __('dashboard.number_of_flight') }}" fgroup-class="col-md-3" />

      <div class="col-md-6">
        <div>
          <label for="iLabel">
            {{ __('dashboard.direction_flight') }}
          </label>
        </div>
        <div class="row">
          <x-adminlte-input name="iLabel" fgroup-class="col-md-6" placeholder="Откуда" />
          <x-adminlte-input name="iLabel" fgroup-class="col-md-6" placeholder="Куда" />
        </div>

      </div>


      <x-adminlte-input name="iLabel" label="{{ __('dashboard.count_seats_flight') }}" fgroup-class="col-md-2" />
      <x-adminlte-input name="iLabel" label="{{ __('dashboard.price_per_seat_flight') }}"
        fgroup-class="col-md-4" />

      <x-adminlte-input-file name="ifPholder" label="23" fgroup-class="col-md-6" placeholder="Choose a file...">
        <x-slot name="prependSlot">
          <div class="input-group-text bg-lightblue">
            <i class="fas fa-upload"></i>
          </div>
        </x-slot>
      </x-adminlte-input-file>

      <div class="col-md-6">
        <x-adminlte-button type="submit" label="Primary" theme="primary" />
      </div>
    </div>


  </form>
@endsection
