@extends('layouts.auth')

@section('content')

@if(gettype($token) == 'string'  )
<!-- <div class="container my-5  "> -->
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
                    <form method="POST" action="{{ route($passwordUpdateRoute) }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('lang.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
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
                                    {{ __('lang.ResetPassword') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
@else
<!-- <div class="container my-5 "> -->
    <div class="row justify-content-center align-items-center login-form">
        <div class="col-md-8">
            <div class="card rounded-0 client-auth-card ">
                <div class="card-header bg-marine color-white">{{ $title }}</div>

                <div class="card-body">
                @include('includes.errors')
                    <form method="POST" action="{{ route($passwordUpdateRoute) }}">
                        @csrf

                        <input type="hidden" name="clients_id" value="{{ $token->clients_id }}">

                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('lang.code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ $code ?? old('code') }}" required autofocus>

                                @if ($errors->has('code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('code') }}</strong>
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
                                    {{ __('lang.ResetPassword') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
@endif
@endsection
