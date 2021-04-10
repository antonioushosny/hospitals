@extends('admin::layouts.master')

@section('main')
  <main class="main">
  	{{-- Breadcrumb Section --}}
    <ol class="breadcrumb">
		<li class="breadcrumb-item">  <a href="{{ route('admin.dashboard.home') }}">{{ __('admin::lang.home') }} </a></li>
       	<li class="breadcrumb-item  active"> {{ __('admin::lang.orders') }} </li>
    </ol>
	{{-- end Breadcrumb Section --}}
    <div class="container-fluid">
      <div class="animated fadeIn">
      	@include('admin::layouts.includes.messages')

      	{{-- Search Section --}}
        <div class="card">
          <div class="card-body">
            <form class="form-horizontal" action="{{ route('admin.orders.index') }}" method="get">
              <div class="row">
                <div class="form-group col-12 col-md-1 text-center">
                	@can('create orders')
	                	<!-- <a href="{{ route('admin.orders.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a> -->
                	@endcan
                </div>
                <div class="form-group col-12 col-md-2 text-center">
                  <input class="form-control" type="text" name="name" placeholder="{{ __('admin::lang.name') }}" value="{{ old('name') }}">
                </div>

				<div class="form-group col-12 col-md-2 text-center">
				<input class="form-control" type="text" name="phone" placeholder="{{ __('admin::lang.phone') }}" value="{{ old('phone') }}">
                </div>

                <div class="form-group col-12 col-md-2 text-center">
				<input class="form-control" type="text" name="email" placeholder="{{ __('admin::lang.email') }}" value="{{ old('email') }}">
                </div>

				<div class="form-group col-12 col-md-2 text-center">
				<input class="form-control" type="text" name="civil_no" placeholder="{{ __('admin::lang.civil_no') }}" value="{{ old('civil_no') }}">
                </div>
		
				
				<div class="form-group col-12 col-md-2 text-center">
					{{ Form::select('countries_id',$countries,old('countries_id'),['placeholder'=> __('admin::lang.country'),'class'=>'select2 form-control'])}}
				</div>
				<div class="form-group col-12 col-md-3 text-center">
					{{ Form::select('hospitals_id',$hospitals,old('hospitals_id'),['placeholder'=> __('admin::lang.hospital'),'class'=>'select2 form-control'])}}
				</div>
				<div class="form-group col-12 col-md-3 text-center">
					{{ Form::select('doctors_id',$doctors,old('doctors_id'),['placeholder'=> __('admin::lang.doctor'),'class'=>'select2 form-control'])}}
				</div>
				<div class="form-group col-12 col-md-3 text-center">
					{{ Form::select('clients_id',$clients,old('clients_id'),['placeholder'=> __('admin::lang.client'),'class'=>'select2 form-control'])}}
				</div>
                <div class="form-group col-12 col-md-2 text-center">
					<select class="form-control" name="status">
						<option value="">{{ __('admin::lang.selectStatus') }}</option>
						<option value="0" {{ old('status') == '0' ? 'selected' : '' }}>{{ __('admin::lang.status_0') }}</option>
						<option value="1" {{ old('status') == '1' ? 'selected' : '' }}>{{ __('admin::lang.status_1') }}</option>
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
          		<div class="col-12 col-md-1 text-center"><strong>{{ __('admin::lang.orders_id') }}</strong></div>
          		<div class="col-12 col-md-1 text-center"><strong>{{ __('admin::lang.client') }}</strong></div>
          		<div class="col-12 col-md-1 text-center"><strong>{{ __('admin::lang.doctor_following') }}</strong></div>
          		<div class="col-12 col-md-1 text-center"><strong>{{ __('admin::lang.disease') }}</strong></div>
          		<div class="col-12 col-md-1 text-center"><strong>{{ __('admin::lang.created_at') }}</strong></div>
          		<div class="col-12 col-md-2 text-center"><strong>{{ __('admin::lang.country') }}</strong></div>
          		<div class="col-12 col-md-2 text-center"><strong>{{ __('admin::lang.hospital') }}</strong></div>
          		<div class="col-12 col-md-1 text-center"><strong>{{ __('admin::lang.doctor') }}</strong></div>
          		<div class="col-12 col-md-1 text-center"><strong>{{ __('admin::lang.status') }}</strong></div>
          		<div class="col-12 col-md-1 text-center"><strong>{{ __('admin::lang.actions') }}</strong></div>
          	</div>
          </div>
        </div>

      	{{-- Data Section --}}
		@forelse ($orders as $order)
	        <div class="card">
	          <div class="card-body">
	          	<div class="row">
	          	 
	          		<div class="col-12 col-md-1 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.orders_id') }}</strong></div>
	          				<div class="col-8 col-md-12">{{ $order->orders_id }}</div>
	          			</div>
	          		</div>
			
	          		<div class="col-12 col-md-1 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.client') }}</strong></div>
							  <div class="col-8 col-md-12">{{ $order->client ? $order->client->clients_name : '' }}</div>
	          			</div>
	          		</div>
					<div class="col-12 col-md-1 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.doctor_following') }}</strong></div>
							  <div class="col-8 col-md-12">{{ $order->doctor_following ?  $order->doctor_following->doctors_name : '' }}</div>
	          			</div>
	          		</div>
					<div class="col-12 col-md-1 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.disease') }}</strong></div>
							  <div class="col-8 col-md-12">{{  $order->disease ?  $order->disease->diseases_title  : $order->diseases_title  }}</div>
	          			</div>
	          		</div>
					<div class="col-12 col-md-1 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.created_at') }}</strong></div>
							  <div class="col-8 col-md-12">{{ $order->orders_created_at  }}</div>
	          			</div>
	          		</div>
					<div class="col-12 col-md-2 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.country') }}</strong></div>
	          				<div class="col-8 col-md-12">{{ $order->country ? $order->country->countries_title : '' }}</div>
	          			</div>
	          		</div>
					<div class="col-12 col-md-2 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.hospital') }}</strong></div>
	          				<div class="col-8 col-md-12">{{ $order->hospital ? $order->hospital->hospitals_title : ''}}</div>
	          			</div>
	          		</div>
					  
					<div class="col-12 col-md-1 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.doctor') }}</strong></div>
							  <div class="col-8 col-md-12">{{ $order->doctor ?  $order->doctor->doctors_name : '' }}</div>
	          			</div>
	          		</div>
				
				
	          		<div class="col-12 col-md-1 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.status') }}</strong></div>
	          				<div class="col-8 col-md-12">
 	          					<span class="badge badge-warning">{{ __('admin::lang.status_'.$order->orders_status) }}</span>
	          				</div>
	          			</div>
	          		</div>
	          		<div class="col-12 col-md-1 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin::lang.actions') }}</strong></div>
	          				<div class="col-8 col-md-12">
	          					<form method="POST" action="{{ route('admin.orders.destroy', $order->orders_id) }}">
	          						@csrf
	          						@method('DELETE')
	          						@can('view orders')
			          					<a href="{{ route('admin.orders.show', $order->orders_id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
	          						@endcan
	          						@can('update orders')
			          					<a href="{{ route('admin.orders.edit', $order->orders_id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
	          						@endcan
	          						@can('delete orders')
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

				{{ $orders->appends(request()->except('page'))->links() }}
      </div>
    </div>
  </main>
@endsection
