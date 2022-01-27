@extends('adminlte::page')

@section('content_header')
  <h1>@lang('dashboard.new_flight')</h1>
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
      <x-adminlte-input-file name="ifPholder" label="{{ __('dashboard.avia_logo') }}" fgroup-class="col-md-4"
        placeholder="Choose a file...">
        <x-slot name="prependSlot">
          <div class="input-group-text bg-lightblue">
            <i class="fas fa-upload"></i>
          </div>
        </x-slot>
      </x-adminlte-input-file>

      <div class="col-md-12"></div>

      <div class="col-md-5">
        <div class="row">
          <div class="col-md-12">
            <label>{{ __('dashboard.price_ticket') }}</label>
          </div>
          <x-adminlte-input name="iLabel" label="{{ __('dashboard.adult') }}" fgroup-class="col-md-4" />
          <x-adminlte-input name="iLabel" label="{{ __('dashboard.child') }}" fgroup-class="col-md-4" />
          <x-adminlte-input name="iLabel" label="{{ __('dashboard.infant') }}" fgroup-class="col-md-4" />
        </div>
      </div>

      <div class="col-md-12"></div>




      <div class="col-md-6">
        <x-adminlte-button type="submit" label="{{ __('common.create') }}" theme="primary" />
      </div>
    </div>


  </form>
@endsection
