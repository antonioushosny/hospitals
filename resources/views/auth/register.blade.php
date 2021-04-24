@extends('layouts.auth')
@section('metatag')
    <title>{{ getMetaByKey('register') ? getMetaByKey('register')->translate()->metatags_title : __('lang.clientregisterTitle') }}</title>
    <meta name="description" content="{{ getMetaByKey('register') ?  getMetaByKey('register')->translate()->metatags_desc : ''}}">
@endsection
@section('content')

    <div class="row justify-content-center align-items-center login-form">
        <div class="col-md-8">
            <div class="card  rounded-0   ">

                <div class="   text-center py-5 ">
                    <img src="{{ asset($locale == 'ar' ? 'backend/img/logo.jpeg' : 'front/img/logo.jpeg') }}" class="img-fluid" width="250px" alt="">
                 </div>

            </div>
            <!--Form with header-->
            <form action="{{ route('postRegister') }}" method="post">

                @csrf
                <input type="hidden" name="type" value="client">
                <input type="hidden" name="clients_status" value="1">
                <input type="hidden" name="device_token" value="{{session('device_token')}}">
                <div class="card  rounded-0 client-auth-card">
                    <div class="card-header p-0">
                        <div class=" text-white text-center py-2 bg-marine">
                            <h4><i class="fa fa-user"></i> {{ __('lang.clientregisterTitle') }} </h4>
                            <p class="m-0">{{ __('lang.registerHint') }}</p>
                        </div>
                    </div>

                    <div class="card-body p-3">

                        @if (session()->has('status_danger'))
                            <div class="alert alert-danger text-sm-center">
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h6>{{ session('status_danger') }}</h6>
                            </div>
                        @endif

                        <!--Body-->
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control {{ $errors->first('clients_civil_no') ? 'is-invalid' : '' }}" id="clients_civil_no" name="clients_civil_no" value="{{ old('clients_civil_no') }}" placeholder="{{ __('lang.civil_no') }}" required>
                                @if ($errors->first('clients_civil_no'))
                                    <div class="invalid-feedback">{{ $errors->first('clients_civil_no') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control {{ $errors->first('clients_name') ? 'is-invalid' : '' }}" id="clients_name" name="clients_name" value="{{ old('clients_name') }}" placeholder="{{ __('lang.name') }}" required>
                                @if ($errors->first('clients_name'))
                                    <div class="invalid-feedback">{{ $errors->first('clients_name') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                                </div>
                                <input type="email" class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('lang.email') }}" >
                                @if ($errors->first('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row   align-items-center   " >
                            <div class="input-group  col-md-12 col-12 " dir="ltr">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                </div>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+965</div>
                                </div>
                                <input type="text" dir="ltr" class="form-control {{ $errors->first('clients_phone') ? 'is-invalid' : '' }}" id="clients_phone" name="clients_phone" value="{{ old('clients_phone') }}" placeholder="{{ __('lang.placeholderPhone') }}" required>
                                @if ($errors->first('clients_phone'))
                                    <div class="invalid-feedback">{{ $errors->first('clients_phone') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                </div>
                                <input type="password" class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }}" id="password" name="password" placeholder="{{ __('lang.password') }}" value="{{ old('password') }}" autocomplete="new-password">
                                @if ($errors->first('password'))
                                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                  @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                </div>
                                <input type="password" class="form-control {{ $errors->first('password_confirmation') ? 'is-invalid' : '' }}" id="password_confirmation" name="password_confirmation" placeholder="{{ __('lang.passwordConfirmation') }}" value="{{ old('password_confirmation') }}" >
                                @if ($errors->first('password_confirmation'))
                                    <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
                                  @endif
                            </div>
                        </div>


                        <div class="text-center">
                            <input type="submit" value="{{ __('lang.register') }}" class="btn text-white btn-block bg-marine rounded-0 py-2">
                        </div>

                        <div class="my-3">
                            <p class="m-0">
                                {{ __('lang.hasUser') }}
                                <a href="{{ route('login' ) }}" class="gr-color">{{ __('lang.login') }}</a>
                            </p>
                        </div>

                    </div>

                </div>
            </form>
       
        </div>
    </div>

@endsection
@section('script')
    <script>

    </script>
@endsection
