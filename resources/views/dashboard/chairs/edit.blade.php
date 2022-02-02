@extends('adminlte::page')

@section('content_header')
  <h1>Редактировать {{ $chairs->uuid }} </h1>
@stop

@section('content')
  <form action="{{ route('dashboard.chairs.update', ['chair' => $chairs->id]) }}" method="POST">
    @method('PUT')
    @csrf

    <x-adminlte-input label="ID" value="{{ $chairs->uuid ?? null }}" name="uuid" fgroup-class="col-md-6"
      enable-old-support />

    <x-adminlte-input label="Тип билета" value="{{ $chairs->type ?? null }}" name="type" fgroup-class="col-md-6"
      enable-old-support />

    <x-adminlte-input label="Цена" value="{{ $chairs->price ?? null }}" name="price" fgroup-class="col-md-6"
      enable-old-support />
    <div class="col-md-6">
      @include('dashboard.partials.messages')
      <x-adminlte-button type="submit" label="{{ __('common.edit') }}" theme="primary" />
    </div>
  </form>

@endsection
