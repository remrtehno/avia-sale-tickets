@extends('dashboard.page')

@section('content')
  <form action="{{ route('dashboard.flights.update', ['flight' => $flight->id]) }}" method="POST"
    enctype="multipart/form-data">
    @method('PUT')
    @csrf
    @include('dashboard.flights.partials.form')

    <div class="col-md-6">
      @include('dashboard.partials.messages')
    </div>
    <div class="col-md-12">
      <x-adminlte-button type="submit" label="{{ __('common.edit') }}" theme="primary" />

      <a class="btn btn-xs btn-default text-teal mx-1 shadow float-right" target="_blank"
        href="{{ route('dashboard.flights.show', ['flight' => $flight->id]) }}" title="Details">
        <i class="fa fa-lg fa-fw fa-eye"></i>
      </a>
    </div>
  </form>



  @include('dashboard.flights.partials.chairs', ['chairs' => $flight->chairs])
@endsection
