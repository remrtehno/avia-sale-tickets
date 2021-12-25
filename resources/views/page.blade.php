@extends('layout')

@section('content')
  <x-breadcrumbs>
    {{ $page->title }}
  </x-breadcrumbs>

  {{ $page->content }}
@endsection