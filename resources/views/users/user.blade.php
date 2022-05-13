@extends('layout')

@section('content')
  @livewireStyles
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

  @livewire('user-ratings', ['user' => $user, 'currentUser' => auth()->user()], key($user->id))


  @livewireScripts
@endsection
