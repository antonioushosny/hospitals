
@extends('layouts.app')
@section('metatag')

    <title>{{ getMetaByKey('orders') ? getMetaByKey('orders')->translate()->metatags_title : __('lang.orders') }}</title>

    <meta name="description" content="{{ getMetaByKey('orders') ? getMetaByKey('orders')->translate()->metatags_desc : '' }}">
@endsection
@section('content')
<div class="container my-5">
    <div class="row justify-content-center align-items-center login-form">
        <div class="col-md-12">
              <!--Form with header-->
            <form action="{{ route('orders.save') }}" method="post"  enctype="multipart/form-data">

                @csrf
                <input type="hidden" name="type" value="client">

                <div class="card  rounded-0 client-auth-card ">
                    <div class="card-header p-0  ">
                        <div class=" text-white text-center py-2 bg-marine">
                            <h3><i class="fa fa-user"></i> {{ __('lang.add_order') }} </h3>
                             
                        </div>
                    </div>

                    <div class="card-body p-3">
                        @include('admin::layouts.includes.messages')
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
                        <h2>{{__('lang.patient_data')}}</h2>
                        <!--Body-->
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-id-card"></i></div>
                                </div>
                                <input type="text" class="form-control {{ $errors->first('orders_patient_civil_no') ? 'is-invalid' : '' }}" id="orders_patient_civil_no" name="orders_patient_civil_no" value="{{ old('orders_patient_civil_no',isset($client->clients_civil_no) ? $client->clients_civil_no : '' ) }}" placeholder="{{ __('lang.civil_no') }}" required>
                                @if ($errors->first('orders_patient_civil_no'))
                                    <div class="invalid-feedback">{{ $errors->first('orders_patient_civil_no') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control {{ $errors->first('orders_patient_name') ? 'is-invalid' : '' }}" id="orders_patient_name" name="orders_patient_name" value="{{ old('orders_patient_name',isset($client->clients_name) ? $client->clients_name : '' ) }}" placeholder="{{ __('lang.name') }}" required>
                                @if ($errors->first('orders_patient_name'))
                                    <div class="invalid-feedback">{{ $errors->first('orders_patient_name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                                </div>
                                <input type="email" class="form-control {{ $errors->first('orders_patient_email') ? 'is-invalid' : '' }}" id="orders_patient_email" name="orders_patient_email" value="{{ old('orders_patient_email',isset($client->email) ? $client->email : '') }}" placeholder="{{ __('lang.email') }}" >
                                @if ($errors->first('orders_patient_email'))
                                    <div class="invalid-feedback">{{ $errors->first('orders_patient_email') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-id-card"></i></div>
                                </div>
                                <input type="text"  class="form-control {{ $errors->first('orders_patient_passport') ? 'is-invalid' : '' }}" id="orders_patient_passport" name="orders_patient_passport" value="{{ old('orders_patient_passport') }}" placeholder="{{ __('lang.passport') }}" required>
                                @if ($errors->first('orders_patient_passport'))
                                    <div class="invalid-feedback">{{ $errors->first('orders_patient_passport') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                </div>
                                <input type="text"  class="form-control {{ $errors->first('orders_patient_phone') ? 'is-invalid' : '' }}" id="orders_patient_phone" name="orders_patient_phone" value="{{ old('orders_patient_phone',isset($client->clients_phone) ? $client->clients_phone : '') }}" placeholder="{{ __('lang.phone') }}" required>
                                @if ($errors->first('orders_patient_phone'))
                                    <div class="invalid-feedback">{{ $errors->first('orders_patient_phone') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-globe"></i></div>
                                </div>
                                <input type="text"  class="form-control {{ $errors->first('orders_patient_nationality') ? 'is-invalid' : '' }}" id="orders_patient_nationality" name="orders_patient_nationality" value="{{ old('orders_patient_nationality') }}" placeholder="{{ __('lang.nationality') }}" required>
                                @if ($errors->first('orders_patient_nationality'))
                                    <div class="invalid-feedback">{{ $errors->first('orders_patient_nationality') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-heartbeat"></i></div>
                                </div>
                                <input type="text"  class="form-control {{ $errors->first('orders_patient_blood_type') ? 'is-invalid' : '' }}" id="orders_patient_blood_type" name="orders_patient_blood_type" value="{{ old('orders_patient_blood_type') }}" placeholder="{{ __('lang.blood_type') }}" required>
                                @if ($errors->first('orders_patient_blood_type'))
                                    <div class="invalid-feedback">{{ $errors->first('orders_patient_blood_type') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-map-marker"></i></div>
                                </div>
                                <input type="text"  class="form-control {{ $errors->first('orders_patient_address') ? 'is-invalid' : '' }}" id="orders_patient_address" name="orders_patient_address" value="{{ old('orders_patient_address') }}" placeholder="{{ __('lang.patient_address') }}" required>
                                @if ($errors->first('orders_patient_address'))
                                    <div class="invalid-feedback">{{ $errors->first('orders_patient_address') }}</div>
                                @endif
                            </div>
                        </div>

                        <h2>{{__('lang.companion_data')}}</h2>
                        <!--Body-->
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-id-card"></i></div>
                                </div>
                                <input type="text" class="form-control {{ $errors->first('orders_companion_civil_no') ? 'is-invalid' : '' }}" id="orders_companion_civil_no" name="orders_companion_civil_no" value="{{ old('orders_companion_civil_no') }}" placeholder="{{ __('lang.civil_no') }}" required>
                                @if ($errors->first('orders_companion_civil_no'))
                                    <div class="invalid-feedback">{{ $errors->first('orders_companion_civil_no') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control {{ $errors->first('orders_companion_name') ? 'is-invalid' : '' }}" id="orders_companion_name" name="orders_companion_name" value="{{ old('orders_companion_name') }}" placeholder="{{ __('lang.name') }}" required>
                                @if ($errors->first('orders_companion_name'))
                                    <div class="invalid-feedback">{{ $errors->first('orders_companion_name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                </div>
                                <input type="text"  class="form-control {{ $errors->first('orders_companion_phone') ? 'is-invalid' : '' }}" id="orders_companion_phone" name="orders_companion_phone" value="{{ old('orders_companion_phone') }}" placeholder="{{ __('lang.phone') }}" required>
                                @if ($errors->first('orders_companion_phone'))
                                    <div class="invalid-feedback">{{ $errors->first('orders_companion_phone') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-map-marker"></i></div>
                                </div>
                                <input type="text"  class="form-control {{ $errors->first('orders_companion_address') ? 'is-invalid' : '' }}" id="orders_companion_address" name="orders_companion_address" value="{{ old('orders_companion_address') }}" placeholder="{{ __('lang.companion_address') }}" required>
                                @if ($errors->first('orders_companion_address'))
                                    <div class="invalid-feedback">{{ $errors->first('orders_companion_address') }}</div>
                                @endif
                            </div>
                        </div>

                        <h2>{{__('lang.order_data')}}</h2>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <select name="diseases_id" id="diseases_id" class="form-control select2 {{ $errors->first('diseases_id') ? 'is-invalid' : '' }}" placeholder="{{ __('lang.disease') }}" required>
                                    <option value="">{{ __('lang.choose_disease') }}</option>
                                    @foreach($diseases as $disease)
                                        <option value="{{$disease->diseases_id}}">{{$disease->diseases_title}}</option>
                                    @endforeach
                                    <option value="0">{{__('lang.other')}}</option>
                                </select>
                                 
                                @if ($errors->first('diseases_id'))
                                    <div class="invalid-feedback">{{ $errors->first('diseases_id') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                              
                                <input type="text"  class="form-control {{ $errors->first('diseases_title') ? 'is-invalid' : '' }}" id="diseases_title" name="diseases_title" value="{{ old('diseases_title') }}" placeholder="{{ __('lang.diseases_title') }}" >
                                @if ($errors->first('diseases_title'))
                                    <div class="invalid-feedback">{{ $errors->first('diseases_title') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="order_images">{{ __('lang.order_images') }}<span class="text-danger">  </span></label>
                            <div class="col-md-9">
                            <input type="file" id="order_images" name="order_images[]" multiple>
                            @if ($errors->first('order_images'))
                                <div class="invalid-feedback">{{ $errors->first('order_images') }}</div>
                            @endif
                            
                            </div>
                        </div>

                        <input type="hidden" name="clients_id" value="{{$client->clients_id}}">
                        <div class="text-center">
                            <input type="submit" value="{{ __('lang.Save') }}" class="btn text-white bg-marine  btn-block rounded-0 py-2">
                        </div>
         

                    </div>

                </div>
            </form>
            <!--Form with header-->

        </div>
    </div>
</div>
@endsection
@section('style')
    <!-- Styles for File Input Plugin-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/file-input/fileinput.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/file-input/fileinput-rtl.css') }}" rel="stylesheet">
@endsection
@section('script')
    <!-- JS for File Input Plugin-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/piexif.min.js" type="text/javascript"></script>
    <script src="{{ asset('backend/js/file-input/fileinput.min.js') }}"></script>
    <script src="{{ asset('backend/js/file-input/themes/theme.min.js') }}"></script>
    <script src="{{ asset('backend/js/file-input/ar.js') }}"></script>
  <script>

$(document).ready(function(){

    // Initialize File Input Plugin
    $("#order_images").fileinput({
        'showUpload':false,
        'showCancel':false,
        'previewFileType':'any',
        theme: "fa",
        language: "{{ $dir == 'rtl' ? 'ar' : '' }}",
        required: true,
        rtl: "{{ $dir == 'rtl' ? true : false }}",
        autoReplace: true,
        overwriteInitial: false,
        allowedFileTypes: ['image'],
        maxFileCount: 3
    });

 
    
});

</script>

@endsection