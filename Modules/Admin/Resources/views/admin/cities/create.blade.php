@extends('admin::layouts.master')

@section('main') 
  <main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">  <a href="{{ route('admin.dashboard.home') }}">{{ __('admin::lang.home') }} </a></li>
      <li class="breadcrumb-item"> <a href="{{ route('admin.cities.index') }}">{{ __('admin::lang.cities') }}</a></li>
      <li class="breadcrumb-item  active">{{ __('admin::lang.create') }}</li>
    </ol>
    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="card">
          <div class="card-header">
            <strong>{{ __('admin::lang.create') }}</strong>
          </div>
          <form class="form-horizontal" action="{{ route('admin.cities.store') }}" method="post" enctype="multipart/form-data">
          	@csrf
          	@include('admin::admin.cities.form')
	          <div class="card-footer">
              @can('view cities')
                <a href="{{ route('admin.cities.index') }}" class="btn btn-sm btn-secondary">
                  <i class="fa fa-arrow-left"></i>
                </a>
              @endcan
              <button class="btn btn-sm btn-success" type="submit">
                <i class="fa fa-save"></i>
              </button>
	          </div>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection
