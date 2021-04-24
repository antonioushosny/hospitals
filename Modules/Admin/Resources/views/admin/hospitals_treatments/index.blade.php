@extends('admin::layouts.master')

@section('main')
  <main class="main">
  	{{-- Breadcrumb Section --}}
    <ol class="breadcrumb">
		<li class="breadcrumb-item">  <a href="{{ route('admin.dashboard.home') }}">{{ __('admin::lang.home') }} </a></li>
       	<li class="breadcrumb-item  active"> {{ __('admin::lang.hospitals_treatments') }} </li>
    </ol>
	{{-- end Breadcrumb Section --}}
    <div class="container-fluid">
      <div class="animated fadeIn">
      	@include('admin::layouts.includes.messages')

      	{{-- Search Section --}}
        <div class="card">
          <div class="card-body">
            <form class="form-horizontal" action="{{ route('admin.hospitals_treatments.index') }}" method="get">
              <div class="row">
                <div class="form-group col-12 col-md-1 text-center">
                	@can('create hospitals_treatments')
	                	<a href="{{ route('admin.hospitals_treatments.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                	@endcan
                </div>
				<div class="form-group col-12 col-md-3 text-center">
					{{ Form::select('hospitals_id',$hospitals,old('hospitals_id'),['placeholder'=> __('admin::lang.hospital'),'class'=>'select2 form-control'])}}
				</div>
				<div class="form-group col-12 col-md-3 text-center">
					{{ Form::select('doctors_id',$doctors,old('doctors_id'),['placeholder'=> __('admin::lang.doctor'),'class'=>'select2 form-control'])}}
				</div>
				<div class="form-group col-12 col-md-2 text-center">
					{{ Form::select('diseases_id',$diseases,old('diseases_id'),['placeholder'=> __('admin::lang.disease'),'class'=>'select2 form-control'])}}
				</div>
                <div class="form-group col-12 col-md-2 text-center">
					<select class="form-control" name="status">
						<option value="">{{ __('admin::lang.selectStatus') }}</option>
						<option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>{{ __('admin::lang.active') }}</option>
						<option value="stop" {{ old('status') == 'stop' ? 'selected' : '' }}>{{ __('admin::lang.stopped') }}</option>
					</select>
                </div>
                <div class="form-group col-12 col-md-1 text-center">
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
          		
          		<div class="col-12 col-md-2 text-center"><strong>{{ __('admin::lang.hospital') }}</strong></div>
          		<div class="col-12 col-md-2 text-center"><strong>{{ __('admin::lang.doctor') }}</strong></div>
          		<div class="col-12 col-md-1 text-center"><strong>{{ __('admin::lang.disease') }}</strong></div>
          		<div class="col-12 col-md-2 text-center"><strong>{{ __('admin::lang.treatments_period') }}</strong></div>
          		<div class="col-12 col-md-2 text-center"><strong>{{ __('admin::lang.treatments_cost') }}</strong></div>
          		<div class="col-12 col-md-1 text-center"><strong>{{ __('admin::lang.status') }}</strong></div>
          		<div class="col-12 col-md-2 text-center"><strong>{{ __('admin::lang.actions') }}</strong></div>
          	</div>
          </div>
        </div>

      	{{-- Data Section --}}
		@forelse ($hospitals_treatments as $hospitals_treatment)
	        <div class="card">
	          <div class="card-body">
	          	<div class="row">
	          	 
					<div class="col-12 col-md-2 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.hospital') }}</strong></div>
							  <div class="col-8 col-md-12">{{ $hospitals_treatment->hospital ?  $hospitals_treatment->hospital->hospitals_title : '' }}</div>
	          			</div>
	          		</div>
			
					<div class="col-12 col-md-2 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.doctor') }}</strong></div>
							  <div class="col-8 col-md-12">{{ $hospitals_treatment->doctor ?  $hospitals_treatment->doctor->doctors_name : '' }}</div>
	          			</div>
	          		</div>
					<div class="col-12 col-md-1 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.disease') }}</strong></div>
							  <div class="col-8 col-md-12">{{ $hospitals_treatment->disease ?  $hospitals_treatment->disease->diseases_title : '' }}</div>
	          			</div>
	          		</div>
	          		<div class="col-12 col-md-2 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.treatments_period') }}</strong></div>
	          				<div class="col-8 col-md-12">{{ $hospitals_treatment->hospitals_treatments_period }}</div>
	          			</div>
	          		</div>

					<div class="col-12 col-md-2 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.treatments_cost') }}</strong></div>
	          				<div class="col-8 col-md-12">{{ $hospitals_treatment->hospitals_treatments_cost }}</div>
	          			</div>
	          		</div>
	          		<div class="col-12 col-md-1 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.status') }}</strong></div>
	          				<div class="col-8 col-md-12">
	          					@if ($hospitals_treatment->hospitals_treatments_status == 'active')
	          						<span class="badge badge-warning">{{ __('admin::lang.active') }}</span>
	          					@else
	          						<span class="badge badge-secondary">{{ __('admin::lang.stopped') }}</span>
	          					@endif
	          				</div>
	          			</div>
	          		</div>
	          		<div class="col-12 col-md-2 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.actions') }}</strong></div>
	          				<div class="col-8 col-md-12">
	          					<form method="POST" action="{{ route('admin.hospitals_treatments.destroy', $hospitals_treatment->hospitals_treatments_id) }}">
	          						@csrf
	          						@method('DELETE')
	          						@can('view hospitals_treatments')
			          					<a href="{{ route('admin.hospitals_treatments.show', $hospitals_treatment->hospitals_treatments_id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
	          						@endcan
	          						@can('update hospitals_treatments')
			          					<a href="{{ route('admin.hospitals_treatments.edit', $hospitals_treatment->hospitals_treatments_id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
	          						@endcan
	          						@can('delete hospitals_treatments')
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

				{{ $hospitals_treatments->appends(request()->except('page'))->links() }}
      </div>
    </div>
  </main>
@endsection
