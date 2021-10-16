@extends('layouts.app')

@section('metatag')
	<title>{{ getMetaByKey('orders') ? getMetaByKey('orders')->translate()->metatags_title :  __('admin::lang.orders') }}</title>
	<meta name="description" content="{{ getMetaByKey('orders') ? getMetaByKey('orders')->translate()->metatags_desc :''}}">
 @endsection

@section('content')
 

<section class="py-5 text-center container">

<div class="card">
          <div class="card-body">
            
              <div class="row">
                <div class="form-group col-12 col-md-3 text-center">
	                <a href="{{ route('orders.add_order') }}" class="btn btn-success btn-sm">{{__('lang.add_order')}}<i class="fa fa-plus"></i></a>
                </div>
             
              </div>
              <!-- /.row-->
        
          </div>
        </div>

    {{-- Header Section --}}
    <div class="card d-none d-md-block">
        <div class="card-header">
        <div class="row">
            <div class="col-12 col-md-2 text-center"><strong>{{ __('admin::lang.orders_id') }}</strong></div>
            <div class="col-12 col-md-3 text-center"><strong>{{ __('admin::lang.diseases_title') }}</strong></div>
            <div class="col-12 col-md-3 text-center"><strong>{{ __('admin::lang.hospital') }}</strong></div>
            <div class="col-12 col-md-2 text-center"><strong>{{ __('admin::lang.status') }}</strong></div>
            <div class="col-12 col-md-2 text-center"><strong>{{ __('admin::lang.actions') }}</strong></div>
        </div>
        </div>
    </div>

    {{-- Data Section --}}
    @forelse ($orders as $order)
        <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-md-2 text-md-center">
                    <div class="row mb-2 mb-md-0">
                        <div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.orders_id') }}</strong></div>
                        <div class="col-8 col-md-12">{{ $order->orders_id }}</div>
                    </div>
                </div>
                <div class="col-12 col-md-3 text-md-center">
                    <div class="row mb-2 mb-md-0">
                        <div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.diseases_title') }}</strong></div>
                        <div class="col-8 col-md-12">{{ $order->disease ? $order->disease->diseases_title : $order->diseases_title }}</div>
                    </div>
                </div>
                    
                <div class="col-12 col-md-3 text-md-center">
                    <div class="row mb-2 mb-md-0">
                        <div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.hospital') }}</strong></div>
                        <div class="col-8 col-md-12">{{ $order->hospital ? $order->hospital->hospital_title : '' }}</div>
                    </div>
                </div>

                <div class="col-12 col-md-2 text-md-center">
                    <div class="row mb-2 mb-md-0">
                        <div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.status') }}</strong></div>
                        <div class="col-8 col-md-12">
                            <span class="badge badge-info">{{ __('admin::lang.status_'.$order->orders_status) }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-2 text-md-center">
                    <div class="row mb-2 mb-md-0">
                        <div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.actions') }}</strong></div>
                        <div class="col-8 col-md-12">
                            <a href="{{ route('clients.orders.show', $order->orders_id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    @empty
        <div class="card">
            <div class="card-body text-center text-danger">
            {{ __('admin::lang.noData') }}
            </div>
        </div>
    @endforelse
</section>

 
@endsection

 
 
