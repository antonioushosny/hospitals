@extends('layouts.app')

@section('metatag')
	<title>{{ getMetaByKey('orders') ? getMetaByKey('orders')->translate()->metatags_title :  __('admin::lang.orders') }}</title>
	<meta name="description" content="{{ getMetaByKey('orders') ? getMetaByKey('orders')->translate()->metatags_desc :''}}">
@endsection

@section('content')


    <div class="container mt-4">
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
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.type') }}</strong></div>
                  <div class="col-12 col-md-10">{{ __('admin::lang.'.$order->orders_patient_blood_type) }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.patient_address') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->orders_patient_address }}</div>
                </div>
              </li>
               
               
              <h2>{{__('lang.order_data')}}</h2>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.specialty') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->specialty ?  $order->specialty->specialties_title  : '' }}</div>
                </div>
              </li>
           
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.notes') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->diseases_title }}</div>
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
                  <div class="col-12 col-md-2"><strong>{{ __('lang.created_at') }}</strong></div>
                  <div class="col-12 col-md-10">
                    {{ $order->orders_created_at }} 
                  </div>
                </div>
              </li>

            
             
             
              
            </ul>
          </div>
           
        </div>
      </div>
    </div>
@endsection