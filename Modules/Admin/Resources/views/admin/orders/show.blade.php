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
                  <div class="col-12 col-md-2"><strong>{{ __('lang.type') }}</strong></div>
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
                  <div class="col-12 col-md-2"><strong>{{ __('lang.disease') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $order->disease ?  $order->disease->diseases_title  : $order->diseases_title }}</div>
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
