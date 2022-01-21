
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
  <div class="paddinger"></div>
  <div class="alert alert-warning text-center">
    <h4 class="text-center">Ваши данные на модерации.</h4>
    <p>
      Чтобы начать продавать нужно, что-бы администратор подтвердил вашу учетную запись. <br>
      Обычно это занимает 2-3 рабочних дня.
    </p>
  </div>
  <div class="paddinger"></div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
