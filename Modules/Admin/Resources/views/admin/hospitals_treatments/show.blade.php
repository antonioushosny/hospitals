@extends('admin::layouts.master')

@section('main')
  <main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">  <a href="{{ route('admin.dashboard.home') }}">{{ __('admin::lang.home') }} </a></li>
      <li class="breadcrumb-item"> <a href="{{ route('admin.hospitals_treatments.index') }}">{{ __('admin::lang.hospitals_treatments') }}</a></li>
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
          <div class="card-footer">
            @can('view hospitals_treatments')
              <a href="{{ route('admin.hospitals_treatments.index') }}" class="btn btn-sm btn-secondary">
                <i class="fa fa-arrow-left"></i>
              </a>
            @endcan
            @can('update hospitals_treatments')
              <a href="{{ route('admin.hospitals_treatments.edit', $hospitals_treatment->hospitals_treatments_id) }}" class="btn btn-sm btn-warning">
                <i class="fa fa-edit"></i>
              </a>
            @endcan
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
