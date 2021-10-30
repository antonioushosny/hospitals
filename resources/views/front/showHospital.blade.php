@extends('layouts.app')

@section('metatag')
	<title>{{ getMetaByKey('hospitals') ? getMetaByKey('hospitals')->translate()->metatags_title :  __('admin::lang.hospitals') }}</title>
	<meta name="description" content="{{ getMetaByKey('hospitals') ? getMetaByKey('hospitals')->translate()->metatags_desc :''}}">
 @endsection

@section('content')
 
<!-- last hospital section  -->
  

<section class="py-5 text-center container">
	<div class="row py-lg-5">
      	<div class="col-12  mx-auto">
        	<h1 class="fw-light">{{ $hospital->hospitals_title }}</h1>
	 
			<hr/>
		</div>
		<div class="col-md-12 col-12">
			<img src="{{$hospital->hospitals_image ? asset($hospital->images_url($hospital->hospitals_image, 'original')) : asset('img/no-image.png') }}" class="card-img-top" alt="..." height="300px">
		</div>
		<div class="col-md-6 col-12 pt-3 text-left">
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
		<div class="col-md-6 col-12 pt-3 text-left">
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
  
</section>

 
@endsection

 
 
