@extends('adminlte::page')

@section('content_top_nav_left')
  <li class="nav-item d-flex align-items-center">
    @include('dashboard.partials.assign-chairs')
  </li>
  <li class="nav-item d-flex align-items-center">
    @include('dashboard.partials.return-chairs')
  </li>
@stop
