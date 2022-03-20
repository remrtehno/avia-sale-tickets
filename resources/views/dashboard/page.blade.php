@extends('adminlte::page')

@section('content_top_nav_left')
  <li class="nav-item d-flex align-items-center">
    1USD = {{ $dollarExchangeRate }}
  </li>
@stop

{{-- @yield('content') --}}
