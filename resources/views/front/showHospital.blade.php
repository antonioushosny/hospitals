@extends('layouts.app')

@section('metatag')
	<title>{{ getMetaByKey('hospitals') ? getMetaByKey('hospitals')->translate()->metatags_title :  __('admin::lang.hospitals') }}</title>
	<meta name="description" content="{{ getMetaByKey('hospitals') ? getMetaByKey('hospitals')->translate()->metatags_desc :''}}">
 @endsection

@section('content')
 
<!-- last hospital section  -->
  

<section class="py-5 text-center container">
		@include('admin::layouts.includes.messages')
	<div class="row py-lg-5">
		<div class="col-md-6 card order-md-2 order-1">
			<div class="card-body">
				<h2 class="= mb-4">{{ __('admin::lang.makeOrder') }}  </h2>
				<form class="form-horizontal" action="{{ route('orders.save') }}" method="post">
					@csrf
					<input type="hidden" name="hospitals_id" value="{{$hospital->hospitals_id}}">
					<div class="row  ">
					<div class="col-md-12 row p-0 m-0 ">
						<div class="form-group col-12 col-md-12 text-center">
							<input class="form-control" type="text" name="orders_patient_name" placeholder="{{ __('admin::lang.name') }}" value="{{ old('name') }}" required>
						</div>
						<div class="form-group col-12 col-md-12 text-center">
							<input class="form-control" type="text" name="orders_patient_address" placeholder="{{ __('admin::lang.address') }}" value="{{ old('address') }}" required>
						</div>
						<div class="form-group col-12 col-md-12 text-center">
							<input class="form-control" type="text" name="orders_patient_phone" placeholder="{{ __('admin::lang.phone') }}" value="{{ old('phone') }}" required>
						</div>
						<div class="form-group col-12 col-md-12 text-center">
							{{ Form::select('diseases_id',$specialties,old('diseases_id'),['placeholder'=> __('admin::lang.specialty'),'class'=>'select2 form-control', 'required'=>'required'])}}
						</div>
						<div class="form-group col-12 col-md-12 text-center">
							<input class="form-control" type="text" name="diseases_title" placeholder="{{ __('admin::lang.notes') }}" value="{{ old('diseases_title') }}" required>
						</div>
						<div class="col-12 text-left mx-4">
							<div class="form-check ">
								<input class="form-check-input" type="radio" name="orders_patient_blood_type" id="ambulance" value="ambulance" checked>
								<label class="form-check-label" for="ambulance">
									{{__('admin::lang.ambulance')}}
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="orders_patient_blood_type" id="appointment" value="appointment">
								<label class="form-check-label" for="appointment">
									{{__('admin::lang.appointmentBooking')}}
								</label>
							</div>
						</div>
						<div class="form-group col-12 col-md-12 mt-4 text-center">
							<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i></button>
						</div>
					</div>
					
					
				
				
					</div>
					<!-- /.row-->
				</form>
			</div>
		</div>
		<div class="col-md-6 row order-md-1 order-2">
		
			<div class="col-12  mx-auto">
				<h1 class="fw-light">{{ $hospital->hospitals_title }}</h1>
		
				<hr/>
			</div>
			<div class="col-md-12 col-12">
				<img src="{{$hospital->hospitals_image ? asset($hospital->images_url($hospital->hospitals_image, 'original')) : asset('img/no-image.png') }}" class="card-img-top" alt="..." height="300px">
			</div>
			<div class="col-md-12 col-12 pt-3 text-left">
				<h3>{{__('admin::lang.city')}} : {{$hospital->city ? $hospital->city->cities_title :'' }}</h3>
				<h3>{{__('admin::lang.phone')}} : {{$hospital->hospitals_phone }}</h3>
				<h3>{{__('admin::lang.areas')}} : </h3>
				@foreach($hospital->areas as $area)
				<span class="badge badge-success">{{$area->areas_title }}</span>
				@endforeach
				<h3>{{__('admin::lang.departments')}} : </h3>
				@foreach($hospital->departments as $department)
				<span class="badge badge-success">{{$department->departments_title }}</span>
				@endforeach
				<h3>{{__('admin::lang.specialties')}} : </h3>
				@foreach($hospital->specialties as $specialty)
				<span class="badge badge-success">{{$specialty->specialties_title }}</span>
				@endforeach
				
				<h3>{{__('admin::lang.address')}} : </h3> {!!  $hospital->hospitals_address !!}
				<h3>{{__('lang.aboutHospital')}} : </h3> {!!  $hospital->hospitals_desc !!}
			</div>
			<div class="col-md-12 col-12 pt-3 text-left">
			<h3>{{__('admin::lang.images')}} : </h3>
				<div class="row">
					@foreach($hospital->images as $image)
						<div class="col-12 mb-2 col-md-6 ">
							<img src="{{ $image->hospital_images_name ? asset($image->images_url($image->hospital_images_name, 'medium')) : asset('img/no-image.png') }}"
							alt="img" width="100%" class="img-fluid " />
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	
</section>

 
@endsection

 
 
