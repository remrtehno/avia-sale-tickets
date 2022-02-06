@extends('layout')

@section('content')

  <div class="container">
    <div class="min-50vh">
      <h2 class="card-header">{{ __('common.register') }}</h2>

      <div class="register-forms-wrapper loaded_hiding loaded_transition overflow-hidden" style="height: 30vh;">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs ask-modal" role="tablist">
          <li class="active"><a href="#org" class="as-org-link" role="tab"
              data-toggle="tab">{{ __('common.org') }}</a></li>
          <li><a href="#individual" role="tab" class="as-ind-link" data-toggle="tab">{{ __('common.individual') }}</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content my-25">
          <div class="tab-pane fade in active" id="org">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="card">
                  <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                      @csrf
                      <input type="hidden" name="role" value="{{ \App\Models\User::ORG }}">

                      @include('auth.partial._input', [
                      "title" => __('common.name.org'),
                      "name" => 'name',
                      "placeholder" => __("org.org_placeholder"),
                      "required" => true,
                      ])

                      @include('auth.partial._input', [
                      "title" => __('common.address'),
                      "name" => 'address',
                      "placeholder" => __("common.address_placeholder"),
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
                      "placeholder" => __("common.surname"),
                      "required" => true,
                      ])


                      @include('auth.partial._input', [
                      "name" => 'dir_name',
                      "placeholder" => __("common.name"),
                      "required" => true,
                      ])

                      @include('auth.partial._input', [
                      "name" => 'dir_surname2',
                      "placeholder" => __("common.surname2"),
                      "required" => true,
                      ])


                      @include('auth.partial._input_file', [
                      "title" => __("org.scan_passport_file"),
                      "name" => 'dir_passport_file',
                      "required" => true,
                      "hint" => __("common.only_face_page_and_home")
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
                      "title" => __("org.scan_inn"),
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
                      "title" => __('org.scan_license'),
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
                      "title" => __('org.scan_agreements_with_avia_and_cons'),
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
                      "title" => __('org.scan_cadastre'),
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

                      @include('auth.partial._submit', ['title' => __('common.register')])
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="individual">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="card">
                  <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="role" value="{{ \App\Models\User::IND }}">

                      @include('auth.partial._input', [
                      "title" => __('common.fullname'),
                      "name" => 'name',
                      "placeholder" => "Имя",
                      "required" => true,
                      ])

                      @include('auth.partial._input', [
                      "name" => 'surname',
                      "placeholder" => __('common.surname'),
                      "required" => true,
                      ])

                      @include('auth.partial._input', [
                      "name" => 'surname2',
                      "placeholder" => __('common.surname2'),
                      "required" => true,
                      ])

                      @include('auth.partial._input', [
                      "title" => __('common.birthday'),
                      "name" => 'birthday',
                      "placeholder" => "____-__-__",
                      "required" => true,
                      'alias' => 'birthday'
                      ])

                      @include('auth.partial._input', [
                      "title" => __('common.address'),
                      "name" => 'address',
                      "placeholder" => __('common.address_placeholder'),
                      "required" => true,
                      ])

                      @include('auth.partial._input_file', [
                      "title" => __('common.scan_passport'),
                      "name" => 'passport_file',
                      "required" => true,
                      "hint" => __('common.only_face_page_and_home')
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


                      @include('auth.partial._submit', ['title' => __('common.register')])

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
