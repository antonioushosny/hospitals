@extends('layouts.auth')

@section('content')

<!-- <div class="container my-5"> -->
    <div class="row justify-content-center align-items-center login-form">
        <div class="col-md-8">
            <div class="card  rounded-0   ">

                <div class="   text-center py-5 ">
                    <img src="{{ asset($locale == 'ar' ? 'backend/img/logo.jpeg' : 'backend/img/logo.jpeg') }}" class="img-fluid" width="250px" alt="">
                 </div>

            </div>
            <div class="card rounded-0 client-auth-card " >
                <div class="card-header bg-marine color-white">{{ $title }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('includes.errors')

                    <form method="POST" action="{{ route('client.resetPassword.form') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('lang.phone') }}</label>

                            <div class="col-md-9">
                                <div class="input-group   " dir="ltr">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-mobile"></i></div>
                                    </div>

                                    <input id="clients_phone" type="text" class="form-control{{ $errors->has('clients_phone') ? ' is-invalid' : '' }}" name="clients_phone" value="{{ old('clients_phone') }}" required>
                                </div>


                                @if ($errors->has('clients_phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('clients_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary bg-marine">
                                    {{ __('lang.Send_Reset_code') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
@endsection
