
@extends('layouts.app')
@section('metatag')

    <title>{{ getMetaByKey('myProfile') ? getMetaByKey('myProfile')->translate()->metatags_title : __('lang.myProfile') }}</title>

    <meta name="description" content="{{ getMetaByKey('myProfile') ? getMetaByKey('myProfile')->translate()->metatags_desc : '' }}">
@endsection
@section('content')
<div class="container my-5">
    <div class="row justify-content-center align-items-center login-form">
        <div class="col-md-8">
              <!--Form with header-->
            <form action="{{ route('postProfile') }}" method="post">

                @csrf
                <input type="hidden" name="type" value="client">

                <div class="card  rounded-0 client-auth-card ">
                    <div class="card-header p-0  ">
                        <div class=" text-white text-center py-2 bg-marine">
                            <h3><i class="fa fa-user"></i> {{ __('lang.ProfileTitle') }} </h3>
                            {{-- <p class="m-0">{{ __('lang.ProfileHint') }}</p> --}}
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

                        @if (session()->has('success'))
                            <div class="alert alert-success text-sm-center">
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h6>{{ session('success') }}</h6>
                            </div>
                        @endif

                        <!--Body-->
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-id-card"></i></div>
                                </div>
                                <input type="text" class="form-control {{ $errors->first('clients_civil_no') ? 'is-invalid' : '' }}" id="clients_civil_no" name="clients_civil_no" value="{{ old('clients_civil_no',isset($client->clients_civil_no) ? $client->clients_civil_no : '' ) }}" placeholder="{{ __('lang.civil_no') }}" required>
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
                                <input type="text" class="form-control {{ $errors->first('clients_name') ? 'is-invalid' : '' }}" id="clients_name" name="clients_name" value="{{ old('clients_name',isset($client->clients_name) ? $client->clients_name : '' ) }}" placeholder="{{ __('lang.name') }}" required>
                                @if ($errors->first('clients_name'))
                                    <div class="invalid-feedback">{{ $errors->first('clients_name') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                                </div>
                                <input type="email" class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}" id="email" name="email" value="{{ old('email',isset($client->email) ? $client->email : '') }}" placeholder="{{ __('lang.email') }}" >
                                @if ($errors->first('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                </div>
                                <input type="text" disabled class="form-control {{ $errors->first('clients_phone') ? 'is-invalid' : '' }}" id="clients_phone" name="clients_phone" value="{{ old('clients_phone',isset($client->clients_phone) ? $client->clients_phone : '') }}" placeholder="{{ __('lang.phone') }}" required>
                                @if ($errors->first('clients_phone'))
                                    <div class="invalid-feedback">{{ $errors->first('clients_phone') }}</div>
                                @endif
                            </div>
                        </div>
                      
                        <div class="text-center">
                            <input type="submit" value="{{ __('lang.Save') }}" class="btn text-white bg-marine  btn-block rounded-0 py-2">
                        </div>

                       <div class="my-3">
                            <p class="m-0">
                                {{ __('lang.changePassword') }}
                                <a href="{{ route('client.changePassword') }}" class="gr-color">{{ __('lang.changePassword') }}</a>
                            </p>
                        </div>

                    </div>

                </div>
            </form>
            <!--Form with header-->

        </div>
    </div>
</div>
@endsection
