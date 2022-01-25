@extends('adminlte::page')

@section('content_header')
    <h1>@lang('dashboard.profile')</h1>
@stop

@section('content')

<div class="row">
        <x-adminlte-date-range name="date_flight" label="{{ __('dashboard.date_flight') }}" fgroup-class="col-md-6">
        </x-adminlte-date-range>

        <x-adminlte-input name="iLabel" label="{{__('dashboard.number_of_flight')}}" 
        fgroup-class="col-md-6"/>

        <div class="col-md-6">
          <div>
            <label for="iLabel">
              {{__('dashboard.direction_flight')}}
            </label>
          </div>
          <div class="row">
            <x-adminlte-input name="iLabel" fgroup-class="col-md-6" placeholder="Откуда"/>
            <x-adminlte-input name="iLabel" fgroup-class="col-md-6" placeholder="Куда"/>
          </div>

        </div>


        <x-adminlte-input name="iLabel" label="{{__('dashboard.count_seats_flight')}}" 
        fgroup-class="col-md-6"/>
        <x-adminlte-input name="iLabel" label="{{__('dashboard.price_per_seat_flight')}}" 
        fgroup-class="col-md-6"/>
</div>




@endsection



