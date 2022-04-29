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
        @php
          $labels = ['Скан паспорта директора', 'ИНН', 'Лицензия', 'Соглашение', 'Файл кадастра'];
          $images = ['dir_passport_file', 'inn_file', 'license_file', 'agreement_contract_file', 'cadastre_file'];
        @endphp

        <div class="border border-rounded p-3 mb-4">
          <h5><b>ФИО Директора.</b></h5>
          <x-adminlte-input name="name" value="{{ $user->name }}" />
          <x-adminlte-input name="dir_surname" value="{{ $user->dir_surname }}" />
          <x-adminlte-input name="dir_surname2" value="{{ $user->dir_surname2 }}" />
        </div>

        <div class="border border-rounded p-3 mb-4">
          <h5><b>Сканы документов.</b></h5>
          <div class="row">
            @foreach ($images as $key => $image)
              <div class="col-md-6 mb-3">
                <h5>{{ $labels[$key] }}</h5>
                @include('dashboard.users._partials.users-image', [
                    'url' => $user[$image],
                ])
              </div>
            @endforeach
          </div>
        </div>
      @else
        <div class="border border-rounded p-3 mb-4">
          <h5><b>Скан паспорта.</b></h5>
          <div class="col-md-6 mb-3">

            @include('dashboard.users._partials.users-image', [
                'url' => $user['passport_file'],
            ])
          </div>
        </div>
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
