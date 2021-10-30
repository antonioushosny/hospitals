@extends('layouts.app')

@section('metatag')
	<title>{{ getMetaByKey('hospitals') ? getMetaByKey('hospitals')->translate()->metatags_title :  __('admin::lang.hospitals') }}</title>
	<meta name="description" content="{{ getMetaByKey('hospitals') ? getMetaByKey('hospitals')->translate()->metatags_desc :''}}">
 @endsection

@section('content')
 
<div class="container pt-3">
	@include('search')
</div>

<!-- last hospital section  -->
  

<section class="py-3 text-center container">
	<div class="row py-lg-2">
      	<div class="col-lg-6 col-md-8 mx-auto">
        	<h1 class="fw-light">{{__('admin::lang.hospitals')}}</h1>
		</div>
	</div>
	<div class="row">
		@foreach($hospitals as $hospital)
			<div class="col-md-4 col-sm-6 col-12 py-2">
				<div class="card shadow-sm">
					<img src="{{$hospital->hospitals_image ? asset($hospital->images_url($hospital->hospitals_image, 'medium')) : asset('img/no-image.png') }}" class="card-img-top" alt="..." height="300px">
					<div class="card-footer  text-center bg-pale-grey-dark color-marine">
						<h3 class="card-title"><a href="{{route('hospitals.show',$hospital->hospitals_id)}}" class="color-marine">{{$hospital->hospitals_title}}</a></h3>
						<a href="{{route('hospitals.show',$hospital->hospitals_id)}}" class="btn btn-info">{{__('lang.more')}}</a>
					</div>
				</div>
			</div>
		@endforeach		
		
	</div>
	{{ $hospitals->links() }}
</section>

 
@endsection

 
 
