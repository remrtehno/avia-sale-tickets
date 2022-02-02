@extends('adminlte::page')

@section('content')
  <form action="{{ route('dashboard.flights.update', ['flight' => $flight->id]) }}" method="POST"
    enctype="multipart/form-data">
    @method('PUT')
    @csrf
    @include('dashboard.flights.partials.form')
    <div class="col-md-6">
      <x-adminlte-button type="submit" label="{{ __('common.edit') }}" theme="primary" />
    </div>
  </form>
@endsection
