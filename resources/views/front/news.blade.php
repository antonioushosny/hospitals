@extends('layouts.app')

@section('metatag')
	<title>{{ getMetaByKey('news') ? getMetaByKey('news')->translate()->metatags_title :  __('admin::lang.news') }}</title>
	<meta name="description" content="{{ getMetaByKey('news') ? getMetaByKey('news')->translate()->metatags_desc :''}}">
 @endsection

@section('content')
 

<!-- last new section  -->
  

<section class="py-5 text-center container">
	<div class="row py-lg-5">
      	<div class="col-lg-6 col-md-8 mx-auto">
        	<h1 class="fw-light">{{__('admin::lang.news')}}</h1>
		</div>
	</div>
	<div class="row">
		@foreach($news as $new)
			<div class="col-md-4 col-sm-6 col-12 py-2">
				@include('includes.newsCard',['new'=>$new])
			</div>
		@endforeach		
		
	</div>
	{{ $news->links() }}
</section>

 
@endsection

 
 
