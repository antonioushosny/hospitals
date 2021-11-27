@extends('admin::layouts.master')

@section('main')
  <main class="main">
  	{{-- Breadcrumb Section --}}
    <ol class="breadcrumb">
		<li class="breadcrumb-item">  <a href="{{ route('admin.dashboard.home') }}">{{ __('admin::lang.home') }} </a></li>
       	<li class="breadcrumb-item  active"> {{ __('admin::lang.diseases') }} </li>
    </ol>
	{{-- end Breadcrumb Section --}}
    <div class="container-fluid">
      <div class="animated fadeIn">
      	@include('admin::layouts.includes.messages')

      	{{-- Search Section --}}
        <div class="card">
          <div class="card-body">
            <form class="form-horizontal" action="{{ route('admin.diseases.index') }}" method="get">
              <div class="row">
                <div class="form-group col-12 col-md-1 text-center">
                	@can('create diseases')
	                	<a href="{{ route('admin.diseases.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                	@endcan
                </div>
                <div class="form-group col-12 col-md-3 text-center">
					{{ Form::select('specialty',$specialties,old('specialty'),['placeholder'=> __('admin::lang.specialty'),'class'=>'select2 form-control'])}}
                </div>
                <div class="form-group col-12 col-md-4 text-center">
                  <input class="form-control" type="text" name="name" placeholder="{{ __('admin::lang.name') }}" value="{{ old('name') }}">
                </div>
                <div class="form-group col-12 col-md-2 text-center">
					<select class="form-control" name="status">
						<option value="">{{ __('admin::lang.selectStatus') }}</option>
						<option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>{{ __('admin::lang.active') }}</option>
						<option value="stop" {{ old('status') == 'stop' ? 'selected' : '' }}>{{ __('admin::lang.stopped') }}</option>
					</select>
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
          		<div class="col-12 col-md-2 text-center"><strong>{{ __('admin::lang.specialty') }}</strong></div>
          		<div class="col-12 col-md-3 text-center"><strong>{{ __('admin::lang.title') }}</strong></div>
          		<div class="col-12 col-md-2 text-center"><strong>{{ __('admin::lang.status') }}</strong></div>
          		<div class="col-12 col-md-3 text-center"><strong>{{ __('admin::lang.actions') }}</strong></div>
          	</div>
          </div>
        </div>

      	{{-- Data Section --}}
		@forelse ($diseases as $disease)
	        <div class="card">
	          <div class="card-body">
	          	<div class="row">
	          		<div class="col-xs-12 col-md-2 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.id') }}</strong></div>
	          				<div class="col-8 col-md-12">{{ $disease->diseases_id }}</div>
	          			</div>
	          		</div>
	          		<div class="col-12 col-md-2 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.specialty') }}</strong></div>
	          				<div class="col-8 col-md-12">{{ $disease->specialty ? $disease->specialty->specialties_title : ''  }}</div>
	          			</div>
	          		</div>

					<div class="col-12 col-md-3 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.title') }}</strong></div>
	          				<div class="col-8 col-md-12">{{ $disease->diseases_title }}</div>
	          			</div>
	          		</div>
	          		 
	          		<div class="col-12 col-md-2 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.status') }}</strong></div>
	          				<div class="col-8 col-md-12">
	          					@if ($disease->diseases_status == 'active')
	          						<span class="badge badge-warning">{{ __('admin::lang.active') }}</span>
	          					@else
	          						<span class="badge badge-secondary">{{ __('admin::lang.stopped') }}</span>
	          					@endif
	          				</div>
	          			</div>
	          		</div>
	          		<div class="col-12 col-md-3 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.actions') }}</strong></div>
	          				<div class="col-8 col-md-12">
	          					<form method="POST" action="{{ route('admin.diseases.destroy', $disease->diseases_id) }}">
	          						@csrf
	          						@method('DELETE')
	          						@can('view diseases')
			          					<a href="{{ route('admin.diseases.show', $disease->diseases_id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
	          						@endcan
	          						@can('update diseases')
			          					<a href="{{ route('admin.diseases.edit', $disease->diseases_id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
	          						@endcan
	          						@can('delete diseases')
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

				{{ $diseases->appends(request()->except('page'))->links() }}
      </div>
    </div>
  </main>
@endsection
