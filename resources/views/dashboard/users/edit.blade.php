@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.users')</h1>
@stop




@section('content')
  <div class="row">
    <div class="col-md-6">
      <h4>{{ $user->roleText() }}</h4>
      <h5 class="bg-gray alert">{{ $user->isApprovedText() }}</h5>

      @if ($user->isOrg())
        @include('dashboard.users._partials.org-files')
      @else
        @include('dashboard.users._partials.ind-files')
      @endif

      <h4><b> Подтвердить пользователя или деактивировать.</b></h4>

      <div class="row py-5 px-2">
        <form action="{{ route('dashboard.users.approve', ['user' => $user->id]) }}" method="post">
          @csrf
          @method('put')
          <x-adminlte-button type="submit" label="{{ __('common.approve') }}" theme="primary" />
        </form>
        <div class="p-1"></div>
        <form action="{{ route('dashboard.users.deactivate', ['user' => $user->id]) }}" method="post">
          @csrf
          @method('put')

          <x-adminlte-button type="submit" label="{{ __('common.deactivate') }}" theme="danger" />
        </form>
      </div>

      <p></p>
    </div>
  </div>

@endsection
