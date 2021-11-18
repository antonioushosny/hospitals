@extends('layouts.app')

@section('metatag')
	<title>{{ getMetaByKey('home') ? getMetaByKey('home')->translate()->metatags_title : __('lang.projectTitle') }}</title>
	<meta name="description" content="{{ getMetaByKey('home') ? getMetaByKey('home')->translate()->metatags_desc :''}}">
 @endsection

@section('content')
@include('includes.banner')

<div class="container pt-3">
	@include('search')
</div>

<!-- hospitals section  -->

<section class=" mt-4 text-center container ">
	<div class="row">
      	<div class="col-12  mx-auto  text-left">
        	<span class="font-24 fb-700 px-5 fw-light bg-marine color-white">{{__('lang.hospitals')}}</h1>
		</div>
	</div>
	<br/>
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
</section>

<!-- last news section  -->
<section class=" mt-4 text-center container ">
	<div class="row">
      	<div class="col-12  mx-auto text-left">
        	<span class="font-24 fb-700 px-5 fw-light bg-marine color-white">{{__('lang.lastNews')}}</h1>
		</div>
	</div>
	<br/>
	<div class="row">
		@foreach($last_news as $new)
			<div class="col-md-4 col-sm-6 col-12 py-2">
				<div class="card shadow-sm">
					<img src="{{$new->news_image ? asset($new->images_url($new->news_image, 'medium')) : asset('img/no-image.png') }}" class="card-img-top" alt="..." height="300px">
					<div class="card-footer  text-center bg-pale-grey-dark color-marine">
						<h3 class="card-title"><a href="{{route('news.show',$new->news_id)}}" class="color-marine">{{$new->news_title}}</a></h3>
						<p class="card-text font-12"> {{$new->news_created_at}}</p>
						<a href="{{route('news.show',$new->news_id)}}" class="btn btn-info">{{__('lang.more')}}</a>
					</div>
				</div>
			</div>
		@endforeach		 
	</div>
</section>

<section class=" text-center container-fluid bg-pale-grey ">
	<div class="row">
      	<div class="col-lg-6 col-md-8 mx-auto">
        	<h1 class="fw-light">{{__('lang.contactUs')}}</h1>
			<form action="{{ route('postcontactus') }}" method="post" class= ">
				@csrf

	
			<div class="form-group row">

				<label for="contact_us_name" class="col-sm-2 fb-700 col-form-label">
					{{ __('lang.name') }} *
				</label>

				<div class="col-sm-10">
					<input class="form-control {{ $errors->first('contact_us_name') ? 'is-invalid' : '' }}"
						id="contact_us_name" type="text" name="contact_us_name"
						placeholder="{{ __('lang.name') }}" value="{{ old('contact_us_name') }}"
					>

				@if ($errors->first('contact_us_name'))
					<div class="invalid-feedback">{{ $errors->first('contact_us_name') }}</div>
				@endif
				</div>

			</div>
			<div class="form-group row">

				<label for="contact_us_phone" class="col-sm-2 fb-700 col-form-label">
					{{ __('lang.phone') }} *
				</label>

				<div class="col-sm-10">
					<input class="form-control price-number {{ $errors->first('contact_us_phone') ? 'is-invalid' : '' }}"
						id="contact_us_phone" type="text" name="contact_us_phone"
						placeholder="{{ __('lang.phone') }}" value="{{ old('contact_us_phone') }}"
					>

				@if ($errors->first('contact_us_phone'))
					<div class="invalid-feedback">{{ $errors->first('contact_us_phone') }}</div>
				@endif
				</div>

			</div>

			<div class="form-group row">

				<label for="contact_us_email" class="col-sm-2 fb-700 col-form-label">
					{{ __('lang.email') }}
				</label>

				<div class="col-sm-10">
					<input class="form-control {{ $errors->first('contact_us_email') ? 'is-invalid' : '' }}"
						id="contact_us_email" type="text" name="contact_us_email"
						placeholder="{{ __('lang.email') }}" value="{{ old('contact_us_email') }}"
					>

				@if ($errors->first('contact_us_email'))
					<div class="invalid-feedback">{{ $errors->first('contact_us_email') }}</div>
				@endif
				</div>

			</div>

			<div class="form-group row">

				<label for="contact_us_message" class="col-sm-2 fb-700 col-form-label">
					{{ __('lang.text') }} *
				</label>

				<div class="col-sm-10">
					<textarea name="contact_us_message" id="text" rows="5"
						class="form-control {{ $errors->first('contact_us_message') ? 'is-invalid' : '' }}"
						placeholder="{{ __('lang.text') }}">{{ old('contact_us_message') }}</textarea>
					@if ($errors->first('contact_us_message'))
						<div class="invalid-feedback">{{ $errors->first('contact_us_message') }}</div>
					@endif
				</div>

			</div>


			<div class="form-group row">

				<label for="contact_us_message" class="col-sm-2 fb-700 col-form-label"></label>


				<div class="col-sm-10">
					<span class="float-right sycamore-color fb-700 mb-2">
						{{-- {{ __('lang.filledMust') }} --}}
					</span>
					<button type="submit" class="btn btn-bluish float-none float-md-{{ $dir == 'rtl' ? 'left' : 'right' }} ">
						{{ __('lang.send') }}
					</button>
					
					
				</div>

			</div>


			</form>
		</div>
	</div>
 
  
 
</section>
@endsection

 
 
