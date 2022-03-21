@extends('dashboard.page')

@php
$isAssigned = $flight->isAssignedTo();
$chairs = $isAssigned ? $flight->getAssignedChairs() : $flight->getAvailableBookedChairs();
$flightOwner = $isAssigned ? $flight->getOwner() : null;
@endphp

@section('content')
  @if (!$isAssigned)
    <form action="{{ route('dashboard.flights.update', ['flight' => $flight->id]) }}" method="POST"
      enctype="multipart/form-data">
      @method('PUT')
      @csrf
    @else
      <div class="alert alert-warning">
        Места этого рейса были приобретены у другого пользователя
        {{ $flightOwner?->name }} {{ $flightOwner?->email }},
        вы не можете редактировать рейс
      </div>
  @endif

  @include('dashboard.flights.partials.form')

  <div class="col-md-6">
    @include('dashboard.partials.messages')
  </div>
  <div class="col-md-12">
    <x-adminlte-button type="submit" label="{{ __('common.edit') }}" :disabled="$isAssigned" theme="primary" />

    <a class="btn btn-xs btn-default text-teal mx-1 shadow float-right" target="_blank"
      href="{{ route('dashboard.flights.show', ['flight' => $flight->id]) }}" title="Details">
      <i class="fa fa-lg fa-fw fa-eye"></i>
    </a>
  </div>

  @if (!$isAssigned)
    </form>
  @endif


  @include('dashboard.flights.partials.chairs')

  @if (!$isAssigned)
    @include('dashboard.flights.partials.assigned-chairs')
  @endif
@endsection
