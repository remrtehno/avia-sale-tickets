@extends('layout')

@section('content')
<div class="container">
        <h2 class="card-header">{{ __('register.register') }}</h2>


        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#org" role="tab" data-toggle="tab">{{ __('common.org') }}</a></li>
            <li><a href="#individual" role="tab" data-toggle="tab">{{ __('common.individual') }}</a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content my-25">
            <div class="tab-pane active" id="org">
                <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                @include('auth.partial._input', [
                                    "title" => __('common.name.org'),
                                    "name" => 'name',
                                    "placeholder" => "OOO Ваша организация",
                                    "required" => true,
                                ])
                                
                                @include('auth.partial._input', [
                                    "title" => __('common.address'),
                                    "name" => 'address',
                                    "placeholder" => "г. Ташкент ул. Истиклол д. 11",
                                    "required" => true,
                                ])

                                @include('auth.partial._input', [
                                    "title" => __('common.tel'),
                                    "name" => 'tel',
                                    "placeholder" => "+998(__) ___-__-__",
                                    "mask" => "+\\\9\\\98(99) 999-99-99",
                                    "required" => true,
                                ])

                                @include('auth.partial._input', [
                                    "title" => __('Email'),
                                    "name" => 'email',
                                    "placeholder" => "example@com.com",
                                    "required" => true,
                                    "type" => 'email',
                                    "alias" => "email"
                                ])


                                @include('auth.partial._input', [
                                    "title" => __('org.fullname_director'),
                                    "name" => 'dir_surname',
                                    "placeholder" => "Фамилия",
                                    "required" => true,
                                ])

                                
                                @include('auth.partial._input', [
                                    "name" => 'dir_name',
                                    "placeholder" => "Имя",
                                    "required" => true,
                                ])

                                @include('auth.partial._input', [
                                    "name" => 'dir_surname2',
                                    "placeholder" => "Отчество",
                                    "required" => true,
                                ])
                                                                
                                
                                @include('auth.partial._input_file', [
                                    "title" => 'Скан паспорта директора',
                                    "name" => 'dir_passport',
                                    "required" => true,
                                ])


                                @include('auth.partial._input', [
                                    "title" => __('org.tel_director'),
                                    "name" => 'tel_director',
                                    "placeholder" => "+998(__) ___-__-__",
                                    "mask" => "+\\\9\\\98(99) 999-99-99",
                                    "required" => true,
                                ])

                                @include('auth.partial._input', [
                                    "title" => __('org.inn'),
                                    "name" => 'inn',
                                    "placeholder" => "___________________",
                                    "mask" => "9999999999999999999",
                                    "required" => true,
                                ])


                                @include('auth.partial._input_file', [
                                    "title" => 'Скан ИНН',
                                    "name" => 'inn_file',
                                    "required" => true,
                                ])


                                @include('auth.partial._input', [
                                    "title" => __('org.license'),
                                    "name" => 'license',
                                    "placeholder" => "___________________",
                                    "mask" => "9999999999999999999",
                                    "required" => true,
                                ])

                                @include('auth.partial._input_file', [
                                    "title" => 'Скан лицензии',
                                    "name" => 'license_file',
                                    "required" => true,
                                ])

 
                                @include('auth.partial._input', [
                                    "title" => __('org.agreement_contract'),
                                    "name" => 'agreement_contract',
                                    "placeholder" => "___________________",
                                    "mask" => "9999999999999999999",
                                    "required" => true,
                                ])

                                @include('auth.partial._input_file', [
                                    "title" => 'Скан договора с авиакомпаниями или консолидаторами ',
                                    "name" => 'agreement_contract_file',
                                    "required" => true,
                                ])

                                @include('auth.partial._input', [
                                    "title" => __('org.cadastre'),
                                    "name" => 'cadastre',
                                    "placeholder" => "___________________",
                                    "required" => true,
                                ])

                                @include('auth.partial._input_file', [
                                    "title" => 'Скан кадастра',
                                    "name" => 'cadastre_file',
                                    "required" => true,
                                ])


                                @include('auth.partial._input', [
                                    "title" => __('common.password'),
                                    "name" => "password",
                                    "required" => true,
                                    "type" => "password"
                                ])

                                @include('auth.partial._input', [
                                    "title" => __('common.password_confirmation'),
                                    "name" => "password_confirmation",
                                    "required" => true,
                                    "type" => "password"
                                ])

                                <div class="row">
                                    <div class="py-25"></div>
                                    <div class="col-md-6 offset-md-4 my-25">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('register.register') }}
                                        </button>
                                    </div>
                                    <div class="py-25"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="tab-pane" id="individual">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
            
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('common.name') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('common.password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('common.password.confirm') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
            
                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('register.register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



</div>
@endsection
