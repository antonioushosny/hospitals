@extends('layouts.auth')
@section('metatag')
    <title>{{ getMetaByKey('login') ? getMetaByKey('login')->translate()->metatags_title : __('lang.login') }}</title>
    <meta name="description" content="{{ getMetaByKey('login') ?  getMetaByKey('login')->translate()->metatags_desc : ''}}">
@endsection

@php
if(!session('type') ){
    session(['type' => 'client']) ;
}
if(session('device_token')){
    setcookie("device_token", session('device_token'), time()+3600);
}
$device_token = isset($_COOKIE["device_token"]) ?  $_COOKIE["device_token"] : ''  ;
$pageType = session('pageType');


@endphp
@section('content')
      <div class="row justify-content-center login-form">
        <div class="col-md-8">

            <div class="card  rounded-0   ">

                <div class="   text-center py-5 ">
                    <img src="{{ asset($locale == 'ar' ? 'backend/img/logo.jpeg' : 'backend/img/logo.jpeg') }}" class="img-fluid" width="250px" alt="">
                 </div>

            </div>


            <div class="card  rounded-0 client-auth-card">
                <div class="card-header p-0">
                    <div class="card-header bg-marine color-white">
                        <div><i class="fa fa-user"></i> {{ __('lang.login') }}  </div>
                        <!-- <p class="m-0">{{ __('lang.loginHint') }}</p> -->
                    </div>
                </div>

                <div class="card-body p-0">

                    <!--Form with header-->
                    <form action="{{ route('postLogin') }}" method="post">

                        @csrf
                        <input type="hidden" name="type" value="{{session('type')}}">
                        <input type="hidden" name="pageType" value="{{$pageType}}">
                        <input type="hidden" name="device_token" value="{{session('device_token')}}">

                        <div class=" rounded-0 client-auth-card ">

                            <div class="card-body p-3 mt-4">

                                @if(  session()->has('status_danger'))
                                    <div class="alert alert-danger text-sm-center">
                                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <h6>{{ session('status_danger') }}</h6>
                                    </div>
                                @endif

                                <!--Body-->
                                <div class="form-group mobile-form-group ">
                                    <div class="input-group   " dir="ltr">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-mobile"></i></div>
                                        </div>
                                        <!-- <div class="input-group-prepend">
                                            <div class="input-group-text">+965</i></div>
                                        </div> -->
                                        <input type="text" class="form-control {{ $errors->first('clients_phone') ? 'is-invalid' : '' }}" id="clients_phone" name="clients_phone" value="{{ old('clients_phone') }}" placeholder="{{ __('lang.placeholderPhone') }}" >
                                        @if( $errors->first('clients_phone'))
                                            <div class="invalid-feedback">{{ $errors->first('clients_phone') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group mobile-form-group">
                                    <div class="input-group mb-2" dir="ltr">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text px-2"><i class="fa fa-unlock"></i></div>
                                        </div>
                                        <input type="password" class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }}" id="password" name="password" placeholder="{{ __('lang.password') }}" value="{{ old('password') }}" >
                                        @if (  $errors->first('password'))
                                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                            @endif
                                    </div>
                                </div>
                                <div class="form-group d-none ">
                                   
                                    <p class="m-0 mobile-login-text forget-text ml-3">
                                        {{ __('lang.forgetPassword') }} {{ $dir == 'ltr' ? '?' :'؟' }}
                                        <a href="{{ route('client.password.request') }}" class="gr-color ">{{ __('lang.ResetPassword') }} </a>
                                    </p>
                                </div>
                                <div class="form-group ">
                                    <div class="custom-control custom-checkbox hidden">
                                        <input type="checkbox" name="remember" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label  " for="remember"> {{ __('lang.rememberMe') }} </label>
                                    </div>
                                </div>


                                <div class=" text-center py-3">
                                    <input type="submit" value="{{ __('lang.login') }}" class="btn bg-marine text-white">
                                </div>

                                <div class="mt-5 mb-2 text-center">
                                    <p class="m-0 mobile-login-text">
                                        {{ __('lang.dontHaveUserAccount') }}
                                        <a href="{{ route('getRegister', ['type' => 'client'] ) }}" class="gr-color ">{{ __('lang.join') }}</a>
                                    </p>
                                </div>


                            </div>

                        </div>
                    </form>
                    <!--Form with header-->

                </div>
            </div>
        </div>
    </div>
@endsection
