@extends('dashboard.page')

@section('content_header')
  <h1>Профиль</h1>
@stop

@section('content')
  <div id="app">
    <form method="POST" enctype="multipart/form-data"
      action="{{ route('dashboard.profile.update', ['id' => $user->id]) }}">
      @csrf
      @method('PUT')



      @include('auth.partial._input', [
          'title' => __('common.name.org'),
          'name' => 'name',
          'placeholder' => __('org.org_placeholder'),
          'value' => $user->name,
      ])

      @include('auth.partial._input', [
          'title' => __('common.address'),
          'name' => 'address',
          'placeholder' => __('common.address_placeholder'),
      
          'value' => $user->address,
      ])

      @include('auth.partial._input', [
          'title' => __('common.tel'),
          'name' => 'tel',
          'placeholder' => '+998(__) ___-__-__',
          'mask' => '+\\\9\\\98(99) 999-99-99',
      
          'value' => $user->tel,
      ])

      @include('auth.partial._input', [
          'title' => __('Email'),
          'name' => 'email',
          'placeholder' => 'example@com.com',
      
          'type' => 'email',
          'alias' => 'email',
          'value' => $user->email,
      ])


      @include('auth.partial._input', [
          'title' => __('org.fullname_director'),
          'name' => 'dir_surname',
          'placeholder' => __('common.surname'),
      
          'value' => $user->dir_surname,
      ])


      @include('auth.partial._input', [
          'name' => 'dir_name',
          'placeholder' => __('common.name'),
      
          'value' => $user->dir_name,
      ])

      @include('auth.partial._input', [
          'name' => 'dir_surname2',
          'placeholder' => __('common.surname2'),
          'value' => $user->dir_surname2,
      ])


      @include('auth.partial._input_file', [
          'title' => __('org.scan_passport_file'),
          'name' => 'dir_passport_file',
          'hint' => __('common.only_face_page_and_home'),
      ])


      @include('dashboard.profile.partials.images', [
          'images' => $user->getImages('dir_passport_file'),
      ])



      @include('auth.partial._input', [
          'title' => __('org.tel_director'),
          'name' => 'tel_director',
          'placeholder' => '+998(__) ___-__-__',
          'mask' => '+\\\9\\\98(99) 999-99-99',
      
          'value' => $user->tel_director,
      ])

      @include('auth.partial._input', [
          'title' => __('org.inn'),
          'name' => 'inn',
          'placeholder' => '___________________',
          'mask' => '9999999999999999999',
      
          'value' => $user->inn,
      ])


      @include('auth.partial._input_file', [
          'title' => __('org.scan_inn'),
          'name' => 'inn_file',
      ])

      @include('dashboard.profile.partials.images', [
          'images' => $user->getImages('inn_file'),
      ])



      @include('auth.partial._input', [
          'title' => __('org.license'),
          'name' => 'license',
          'placeholder' => '___________________',
          'mask' => '9999999999999999999',
      
          'value' => $user->license,
      ])

      @include('auth.partial._input_file', [
          'title' => __('org.scan_license'),
          'name' => 'license_file',
      ])

      @include('dashboard.profile.partials.images', [
          'images' => $user->getImages('license_file'),
      ])


      @include('auth.partial._input', [
          'title' => __('org.agreement_contract'),
          'name' => 'agreement_contract',
          'placeholder' => '___________________',
          'mask' => '*******************',
      
          'value' => $user->agreement_contract,
      ])

      @include('auth.partial._input_file', [
          'title' => __('org.scan_agreements_with_avia_and_cons'),
          'name' => 'agreement_contract_file',
      ])
      @include('dashboard.profile.partials.images', [
          'images' => $user->getImages('agreement_contract_file'),
      ])

      @include('auth.partial._input', [
          'title' => __('org.cadastre'),
          'name' => 'cadastre',
          'placeholder' => '___________________',
      
          'value' => $user->cadastre,
      ])


      @include('auth.partial._input_file', [
          'title' => __('org.scan_cadastre'),
          'name' => 'cadastre_file',
      ])

      @include('dashboard.profile.partials.images', [
          'images' => $user->getImages('cadastre_file'),
      ])

      @include('auth.partial._input', [
          'title' => __('common.password'),
          'name' => 'password',
      
          'type' => 'password',
      ])

      @include('auth.partial._input', [
          'title' => __('common.password_confirmation'),
          'name' => 'password_confirmation',
      
          'type' => 'password',
      ])

      @include('auth.partial._submit', ['title' => __('common.save')])
    </form>
  </div>
@endsection


@section('js')
  <script src="{{ mix('js/app.js') }}"></script>
@stop

@section('css')
  <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
@stop
