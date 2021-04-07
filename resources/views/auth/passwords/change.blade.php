@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center align-items-center login-form">
        <div class="col-md-8">
            <div class="card  rounded-0   ">

                <div class="   text-center py-5 ">
                    <img src="{{ asset($locale == 'ar' ? 'backend/img/logo.jpeg' : 'backend/img/logo.jpeg') }}" class="img-fluid" width="250px" alt="">
                 </div>

            </div>
            <div class="card rounded-0 client-auth-card ">
                <div class="card-header bg-marine color-white">{{ $title }}</div>

                <div class="card-body">
                    @include('includes.errors')
                    <form method="POST" action="{{ route('SavePassword') }}">
                        @csrf

                        <input type="hidden" name="type" value="{{ $type }}">

                        <div class="form-group row">
                            <label for="current_password" class="col-md-4 px-0  col-form-label text-md-right">{{ __('lang.oldPassword') }}</label>

                            <div class="col-md-6">
                                <input id="current_password" type="password" class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }}" name="current_password" value="{{ $current_password ?? old('current_password') }}" required autofocus>

                                @if ($errors->has('current_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('lang.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('lang.passwordConfirmation') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary bg-marine">
                                    {{ __('lang.changePassword') }}
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
