@extends('layouts.app')

@section('metatag')
	<title>{{ getMetaByKey('hospitals_treatments') ? getMetaByKey('hospitals_treatments')->translate()->metatags_title :  __('admin::lang.hospitals_treatments') }}</title>
	<meta name="description" content="{{ getMetaByKey('hospitals_treatments') ? getMetaByKey('hospitals_treatments')->translate()->metatags_desc :''}}">
 @endsection

@section('content')
	  <section class="py-5 text-center container">
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
                  <div class="col-12 col-md-10">{{ $hospitals_treatment->hospitals_treatments_id }}</div>
                </div>
              </li>
             
            
            
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.hospital') }}</strong></div>
                  <div class="col-12 col-md-10">
                    {{ $hospitals_treatment->hospital ? $hospitals_treatment->hospital->hospitals_title : '' }} 
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.doctor') }}</strong></div>
                  <div class="col-12 col-md-10">
                    {{ $hospitals_treatment->doctor ? $hospitals_treatment->doctor->doctors_name : '' }} 
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.disease') }}</strong></div>
                  <div class="col-12 col-md-10">
                    {{ $hospitals_treatment->disease ? $hospitals_treatment->disease->diseases_title : '' }} 
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.treatments_period') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $hospitals_treatment->hospitals_treatments_period }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.treatments_cost') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $hospitals_treatment->hospitals_treatments_cost }}</div>
                </div>
              </li>

              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.treatments_program') }}</strong></div>
                  <div class="col-12 col-md-10">{!! $hospitals_treatment->hospitals_treatments_program !!}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.status') }}</strong></div>
                  <div class="col-12 col-md-10">{{ __('admin::lang.'. $hospitals_treatment->hospitals_treatments_status) }}</div>
                </div>
              </li>
            </ul>
          </div>
          
        </div>
      </div>
    </section>
@endsection
