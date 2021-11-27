@extends('layouts.app')

@section('metatag')
	<title>{{ getMetaByKey('home') ? getMetaByKey('home')->translate()->metatags_title : __('lang.projectTitle') }}</title>
	<meta name="description" content="{{ getMetaByKey('home') ? getMetaByKey('home')->translate()->metatags_desc :''}}">
 @endsection

@section('content')
@include('includes.banner')
<div class="py-3 font-20">
	@include('admin::layouts.includes.messages')
</div>
<div class="container pt-3">

	<a href="{{route('hospitals')}}">
 		<img src="{{asset('backend/img/search.jpeg')}}" width="100%"  height="250">
	</a>
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
			<div class="col-md-6 col-sm-6 col-12 py-2">
				@include('includes.hospital-card',['hospital'=>$hospital])
			</div>
		@endforeach		 
	</div>
</section>
<hr/>
<!-- blood types -->
<section class="container-fluid py-5 bg-ice-blue">
	<div class="container ">
		<h3 class="text-center mb-5 fb-700"> {{__('lang.areYouWantToDonateBlood')}}</h3>
		<div>
			<form action="{{route('donate')}}" method="get" >
				<div class="form-group">
					<label for="exampleInputEmail1">{{__('lang.enterYourBloodType')}}</label>
					{{ Form::select('blood_type',$blood_types,old('blood_type'),['placeholder'=> __('lang.enterYourBloodType'),'class'=>'  form-control'])}}
				</div>
				<button type="submit" class="btn btn-primary fb-700 font-20 btn-block">{{__('lang.check')}}</button>
			</form>
		</div>
	</div>
</section>
<hr/>
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
				@include('includes.newsCard',['new'=>$new])
			</div>
		@endforeach		 
	</div>
</section>
<hr/>
<!-- Corona check -->
<section class="container-fluid py-5 bg-ice-blue">
	<div class="container ">
		<h3 class="text-center mb-5 fb-700"> {{__('lang.coronaTitle')}}</h3>
		<div>
			<form action="{{route('corona')}}" method="get" >
				<div class="form-group">
					<label for="firstDate">{{__('lang.firstDate')}}</label>
					{{ Form::date('firstDate',old('firstDate'),['placeholder'=> __('lang.firstDate'),'class'=>'select2 form-control'])}}
				</div>
				<div class="form-group">
					<label for="secondDate">{{__('lang.secondDate')}}</label>
					{{ Form::date('secondDate',old('secondDate'),['placeholder'=> __('lang.secondDate'),'class'=>'select2 form-control'])}}
				</div>
				<button type="submit" class="btn btn-success fb-700 font-20 btn-block">{{__('lang.check')}}</button>
			</form>
		</div>
	</div>
</section>
<hr/>
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

 
 
