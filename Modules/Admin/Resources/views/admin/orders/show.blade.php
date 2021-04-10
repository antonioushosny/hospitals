@extends('admin::layouts.master')

@section('main')
  <main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">  <a href="{{ route('admin.dashboard.home') }}">{{ __('admin::lang.home') }} </a></li>
      <li class="breadcrumb-item"> <a href="{{ route('admin.orders.index') }}">{{ __('admin::lang.orders') }}</a></li>
      <li class="breadcrumb-item  active">{{ __('admin::lang.show') }}</li>
    </ol>
    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> {{ __('admin::lang.show') }}
          </div>
          <div class="card-body">
          <ul class="list-group">
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.id') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->orders_id }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.status') }}</strong></div>
                  <div class="col-12 col-md-10">{{ __('lang.status_'.$order->orders_status) }}</div>
                </div>
              </li>
              <h2>{{__('lang.patient_data')}}</h2>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.patient_name') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->orders_patient_name }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.patient_phone') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->orders_patient_phone }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.civil_no') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->orders_patient_civil_no }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.passport') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->orders_patient_passport }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.nationality') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->orders_patient_nationality }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.blood_type') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->orders_patient_blood_type }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.patient_address') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->orders_patient_address }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.email') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->orders_patient_email }}</div>
                </div>
              </li>
              <h2>{{__('lang.companion_data')}}</h2>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.companion_name') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->orders_companion_name }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.companion_phone') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->orders_companion_phone }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.companion_civil_no') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->orders_companion_civil_no }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.companion_address') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->orders_companion_address }}</div>
                </div>
              </li>
              <h2>{{__('lang.order_data')}}</h2>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.disease') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->disease ?  $order->disease->diseases_title  : $order->diseases_title }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.doctor_following') }}</strong></div>
                  <div class="col-12 col-md-10">{{  $order->doctor_following  ? $order->doctor_following->doctors_name : '' }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.country') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->country ?  $order->country->countries_title  : '' }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.hospital') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->hospital ?  $order->hospital->hospitals_title  : '' }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.doctor') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->doctor ?  $order->doctor->doctors_name  : '' }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.treatment_budget') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->orders_treatment_budget   }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.prescription_img') }}</strong></div>
                  <div class="col-12 col-md-10">
                    <a href="{{  $order->orders_prescription_img  ? asset($order->images_url($order->orders_prescription_img, 'original')) : asset('img/no-image.png') }}" target="_blank">
                     <img src="{{$order->orders_prescription_img ? asset($order->images_url($order->orders_prescription_img, 'medium')) : asset('img/no-image.png') }}"
                     alt="img" class="img-fluid img-thumbnail" />
                    </a> 
                    </div>
                    
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.treatment_period') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->orders_treatment_period }}</div>
                </div>
              </li>
              
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.treatment_cost') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->orders_treatment_cost }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.notes') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->orders_doctor_following_notes }}</div>
                </div>
              </li>
              
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.created_at') }}</strong></div>
                  <div class="col-12 col-md-10">
                    {{ $order->orders_created_at }} 
                  </div>
                </div>
              </li>

            
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.order_images') }}</strong></div>
                  @foreach($order->images as $image)

                  <div class="col-md-4 col-12">
                    <a href="{{ $image->orders_img ? asset($image->images_url($image->orders_img, 'original')) : asset('img/no-image.png') }}" target="_blank">
                    <img src="{{ $image->orders_img ? asset($image->images_url($image->orders_img, 'medium')) : asset('img/no-image.png') }}"
                     alt="img" class="img-fluid img-thumbnail" />
                    </a>
                  </div>
                  @endforeach
                </div>
              </li>
             
              
            </ul>
          </div>
          <div class="card-footer">
            @can('view orders')
              <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-secondary">
                <i class="fa fa-arrow-left"></i>
              </a>
            @endcan
            @can('update orders')
              <a href="{{ route('admin.orders.edit', $order->orders_id) }}" class="btn btn-sm btn-warning">
                <i class="fa fa-edit"></i>
              </a>
            @endcan
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
