@extends('admin::layouts.master')

@section('main')
  <main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">  <a href="{{ route('admin.dashboard.home') }}">{{ __('admin::lang.home') }} </a></li>
      <li class="breadcrumb-item"> <a href="{{ route('admin.blood_types.index') }}">{{ __('admin::lang.blood_types') }}</a></li>
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
                  <div class="col-12 col-md-10">{{ $blood_type->blood_types_id }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.type') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $blood_type->blood_types_type }}</div>
                </div>
              </li>
             
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.amount') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $blood_type->blood_types_amount }} %</div>
                </div>
              </li>
            </ul>
          </div>
          <div class="card-footer">
            @can('view blood_types')
              <a href="{{ route('admin.blood_types.index') }}" class="btn btn-sm btn-secondary">
                <i class="fa fa-arrow-left"></i>
              </a>
            @endcan
            @can('update blood_types')
              <a href="{{ route('admin.blood_types.edit', $blood_type->blood_types_id) }}" class="btn btn-sm btn-warning">
                <i class="fa fa-edit"></i>
              </a>
            @endcan
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
