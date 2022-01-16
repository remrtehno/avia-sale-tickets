@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center min-50vh">
        <h2 class="card-header">{{ __('common.reset_pass') }}</h2>
        <div class="col-md-8">
            <div class="card">
       

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        @include('auth.partial._input', [
                                "title" => __('E-Mail'),
                                "name" => 'email',
                                "placeholder" => "_@_._",
                                "alias" => "email",
                                "required" => true,
                            ])

                        <div class="row my-25">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('common.reset_pass') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
