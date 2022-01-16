@extends('layout')

@section('content')
<div class="container">
    <div class="min-50vh">
        <div class="row justify-content-center">
            <div class="col-xs-12">
                <h2 class="card-header">{{ __('common.login') }}</h2>
            </div>
            <div class="col-md-8">
                <div class="card">
                    

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            @include('auth.partial._input', [
                                "title" => __('E-Mail'),
                                "name" => 'email',
                                "placeholder" => "_@_._",
                                "alias" => "email",
                                "required" => true,
                            ])

                            @include('auth.partial._input', [
                                "title" => __('common.password'),
                                "name" => 'password',
                                "type" => 'password',
                                "required" => true,
                            ])

                            

                            <div class="row my-20">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('common.remember_me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row my-25">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('common.login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('common.forgot_pass') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
