@extends('adminlte::page')

@section('content_top_nav_left')
  <li class="nav-item d-flex align-items-center">
    @include('dashboard.partials.assign-chairs')
  </li>
  <li class="nav-item d-flex align-items-center">
    @include('dashboard.partials.return-chairs')
  </li>
@stop

@push('css')
  <style>
    .main-header .navbar-nav:first-child {
      overflow: auto;
    }

    /* @TODO Hack need to delete all h1 in all views */
    .content-header h1 {
      display: none !important;
    }
  </style>
@endpush
