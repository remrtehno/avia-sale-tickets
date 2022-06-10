@extends('layout')

@section('content')
  <x-breadcrumbs>
    {{ $page->title }}
  </x-breadcrumbs>

  <div id="content" style="min-height: 40vh; padding: 0 15px;">
    <div class="container" style="padding: 0;">
      {!! $page->content !!}
    </div>
  </div>
@endsection
