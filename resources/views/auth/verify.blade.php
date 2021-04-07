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
            <div class="card rounded-0 client-auth-card">
                <div class="card-header">{{ __('lang.verifyTitle') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('lang.verifydesc1') }}
                        </div>
                    @endif
                     {{ __('lang.verifydesc2') }}
                     , <a href="{{ route($resendRoute,$id) }}">{{ __('lang.verfiyclick') }}</a>.
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
@endsection
