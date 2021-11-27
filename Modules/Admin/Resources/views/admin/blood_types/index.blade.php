@extends('admin::layouts.master')

@section('main')
  <main class="main">
  	{{-- Breadcrumb Section --}}
    <ol class="breadcrumb">
		<li class="breadcrumb-item">  <a href="{{ route('admin.dashboard.home') }}">{{ __('admin::lang.home') }} </a></li>
       	<li class="breadcrumb-item  active"> {{ __('admin::lang.blood_types') }} </li>
    </ol>
	{{-- end Breadcrumb Section --}}
    <div class="container-fluid">
      <div class="animated fadeIn">
      	@include('admin::layouts.includes.messages')

      	{{-- Search Section --}}
        <div class="card">
          <div class="card-body">
            <form class="form-horizontal" action="{{ route('admin.blood_types.index') }}" method="get">
              <div class="row">
                <div class="form-group col-12 col-md-1 text-center">
                	@can('create blood_types')
	                	<a href="{{ route('admin.blood_types.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                	@endcan
                </div>
                <div class="form-group col-12 col-md-4 text-center">
                  <input class="form-control" type="text" name="type" placeholder="{{ __('admin::lang.type') }}" value="{{ old('type') }}">
                </div>
                <div class="form-group col-12 col-md-2 text-center">
					<input class="form-control" type="number" name="amount" placeholder="{{ __('admin::lang.amount') }}" value="{{ old('amount') }}">
                </div>
                <div class="form-group col-12 col-md-3 text-center">
                </div>
                <div class="form-group col-12 col-md-2 text-center">
                	<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>
                	<button type="button" class="btn btn-secondary btn-sm search-reset"><i class="fa fa-ban"></i></button>
                </div>
              </div>
              <!-- /.row-->
            </form>
          </div>
        </div>

      	{{-- Header Section --}}
        <div class="card d-none d-md-block">
          <div class="card-header">
          	<div class="row">
          		<div class="col-12 col-md-2 text-center"><strong>{{ __('admin::lang.id') }}</strong></div>
          		<div class="col-12 col-md-4 text-center"><strong>{{ __('admin::lang.type') }}</strong></div>
          		<div class="col-12 col-md-3 text-center"><strong>{{ __('admin::lang.amount') }}</strong></div>
          		<div class="col-12 col-md-3 text-center"><strong>{{ __('admin::lang.actions') }}</strong></div>
          	</div>
          </div>
        </div>

      	{{-- Data Section --}}
		@forelse ($blood_types as $blood_type)
	        <div class="card">
	          <div class="card-body">
	          	<div class="row">
	          		<div class="col-xs-12 col-md-2 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.id') }}</strong></div>
	          				<div class="col-8 col-md-12">{{ $blood_type->blood_types_id }}</div>
	          			</div>
	          		</div>
	          		<div class="col-12 col-md-4 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.type') }}</strong></div>
	          				<div class="col-8 col-md-12">{{ $blood_type->blood_types_type }}</div>
	          			</div>
	          		</div>
	          		
	          		 
	          		<div class="col-12 col-md-3 text-md-center">
					  	<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.amount') }}</strong></div>
	          				<div class="col-8 col-md-12">{{ $blood_type->blood_types_amount }} % </div>
	          			</div>
	          		</div>
	          		<div class="col-12 col-md-3 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.actions') }}</strong></div>
	          				<div class="col-8 col-md-12">
	          					<form method="POST" action="{{ route('admin.blood_types.destroy', $blood_type->blood_types_id) }}">
	          						@csrf
	          						@method('DELETE')
									
	          						@can('view blood_types')
			          					<a href="{{ route('admin.blood_types.show', $blood_type->blood_types_id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
	          						@endcan
	          						@can('update blood_types')
			          					<a href="{{ route('admin.blood_types.edit', $blood_type->blood_types_id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
	          						@endcan
								 
	          						@can('delete blood_types')
	          							<button type="submit" class="btn btn-danger btn-sm delete-form">
	          								<i class="fa fa-trash"></i>
	          							</button>
	          						@endcan
	          					 
	          					</form>
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

				{{ $blood_types->appends(request()->except('page'))->links() }}
      </div>
    </div>
  </main>
@endsection
