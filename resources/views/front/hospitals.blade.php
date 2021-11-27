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
			<div class="col-md-6 col-sm-6 col-12 py-2">
				@include('includes.hospital-card',['hospital'=>$hospital])
			</div>
		@endforeach		
		
	</div>
	{{ $hospitals->links() }}
</section>

 
@endsection

 
 
