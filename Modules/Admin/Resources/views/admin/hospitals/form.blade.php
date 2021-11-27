
@php
  $activeLocale = old('activeLocale', 'general');
  $activeLocale = 'general';
@endphp
<div class="card-body">
	@include('admin::layouts.includes.messages')
  <div class="row">
    <div class="col-lg-12">
      
         {{-- Tabs --}}
        <ul class="nav nav-tabs" id="langsTabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link {{ $activeLocale == 'general' ? 'active' : '' }}" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">
            {{ __('admin::lang.general') }}</a>
          </li>
          @foreach ($langs as $lang)
            <li class="nav-item">
              <a class="nav-link {{ $activeLocale == $lang->locale ? 'active' : '' }}" id="{{ $lang->locale }}-tab" data-toggle="tab" href="#{{ $lang->locale }}"
                role="tab" aria-controls="{{ $lang->locale }}" aria-selected="false">
                {{ __('admin::lang.'. $lang->locale) }}
              </a>
            </li>
          @endforeach
        </ul>

        {{-- Tabs Content --}}
        <div class="tab-content" id="langsTabsContent">
          <div class="tab-pane fade {{ $activeLocale == 'general' ? 'show active' : '' }}" id="general" role="tabpanel" aria-labelledby="general-tab">
            <div class="row">
              <div class="col-lg-9">

                
                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="cities_id">{{ __('admin::lang.city') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::select('cities_id',$cities,old('cities_id',isset($hospital) ? $hospital->cities_id : ''),['placeholder'=> __('admin::lang.city'),'class'=>'select2 form-control'])}}              
                      @if ($errors->first('cities_id'))
                        <div class="invalid-feedback">{{ $errors->first('cities_id') }}</div>
                      @endif
                  </div>
                </div>
                  
                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="areas_id">{{ __('admin::lang.areas') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::select('areas_ids[]',$areas,old('areas_ids',isset($hospital) ? $hospital->areas->pluck('areas_id') : []),['class'=>'select2 form-control','multiple'=>'multiple'])}}              
                    @if ($errors->first('areas_id'))
                      <div class="invalid-feedback">{{ $errors->first('areas_id') }}</div>
                    @endif
                  </div>
                </div>

                <!-- <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="departments_id">{{ __('admin::lang.departments') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::select('departments_ids[]',$departments,old('departments_ids',isset($hospital) ? $hospital->departments->pluck('departments_id') : []),['class'=>'select2 form-control','multiple'=>'multiple'])}}              
                    @if ($errors->first('departments_id'))
                      <div class="invalid-feedback">{{ $errors->first('departments_id') }}</div>
                    @endif
                  </div>
                </div> -->

                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="specialties_id">{{ __('admin::lang.specialties') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::select('specialties_ids[]',$specialties,old('specialties_ids',isset($hospital) ? $hospital->specialties->pluck('specialties_id') : []),['class'=>'select2 form-control','multiple'=>'multiple'])}}              
                    @if ($errors->first('specialties_id'))
                      <div class="invalid-feedback">{{ $errors->first('specialties_id') }}</div>
                    @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="hospitals_phone">{{ __('admin::lang.phone') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::text('hospitals_phone',old('hospitals_phone',isset($hospital) ? $hospital->hospitals_phone : ''),['placeholder'=> __('admin::lang.phone'),'class'=>'select2 form-control'])}}              
                      @if ($errors->first('hospitals_phone'))
                        <div class="invalid-feedback">{{ $errors->first('hospitals_phone') }}</div>
                      @endif
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="clients_phone">{{ __('admin::lang.password') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::password('password',['placeholder'=> __('admin::lang.password'),'class'=>' form-control'])}}              
                      @if ($errors->first('password'))
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                      @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="hospitals_intensive_care">{{ __('admin::lang.hospitals_intensive_care') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::number('hospitals_intensive_care',old('hospitals_intensive_care',isset($hospital) ? $hospital->hospitals_intensive_care : ''),['placeholder'=> __('admin::lang.hospitals_intensive_care'),'class'=>'select2 form-control'])}}              
                      @if ($errors->first('hospitals_intensive_care'))
                        <div class="invalid-feedback">{{ $errors->first('hospitals_intensive_care') }}</div>
                      @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="hospitals_recovery_rooms">{{ __('admin::lang.hospitals_recovery_rooms') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::number('hospitals_recovery_rooms',old('hospitals_recovery_rooms',isset($hospital) ? $hospital->hospitals_recovery_rooms : ''),['placeholder'=> __('admin::lang.hospitals_recovery_rooms'),'class'=>'select2 form-control'])}}              
                      @if ($errors->first('hospitals_recovery_rooms'))
                        <div class="invalid-feedback">{{ $errors->first('hospitals_recovery_rooms') }}</div>
                      @endif
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="hospitals_analysis_laboratories">{{ __('admin::lang.hospitals_analysis_laboratories') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::number('hospitals_analysis_laboratories',old('hospitals_analysis_laboratories',isset($hospital) ? $hospital->hospitals_analysis_laboratories : ''),['placeholder'=> __('admin::lang.hospitals_analysis_laboratories'),'class'=>'select2 form-control'])}}              
                      @if ($errors->first('hospitals_analysis_laboratories'))
                        <div class="invalid-feedback">{{ $errors->first('hospitals_analysis_laboratories') }}</div>
                      @endif
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="hospitals_rays_centers">{{ __('admin::lang.hospitals_rays_centers') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::number('hospitals_rays_centers',old('hospitals_rays_centers',isset($hospital) ? $hospital->hospitals_rays_centers : ''),['placeholder'=> __('admin::lang.hospitals_rays_centers'),'class'=>'select2 form-control'])}}              
                      @if ($errors->first('hospitals_rays_centers'))
                        <div class="invalid-feedback">{{ $errors->first('hospitals_rays_centers') }}</div>
                      @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="hospitals_public_rooms">{{ __('admin::lang.hospitals_public_rooms') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::number('hospitals_public_rooms',old('hospitals_public_rooms',isset($hospital) ? $hospital->hospitals_public_rooms : ''),['placeholder'=> __('admin::lang.hospitals_public_rooms'),'class'=>'select2 form-control'])}}              
                      @if ($errors->first('hospitals_public_rooms'))
                        <div class="invalid-feedback">{{ $errors->first('hospitals_public_rooms') }}</div>
                      @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="hospitals_private_rooms">{{ __('admin::lang.hospitals_private_rooms') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::number('hospitals_private_rooms',old('hospitals_private_rooms',isset($hospital) ? $hospital->hospitals_private_rooms : ''),['placeholder'=> __('admin::lang.hospitals_private_rooms'),'class'=>'select2 form-control'])}}              
                      @if ($errors->first('hospitals_private_rooms'))
                        <div class="invalid-feedback">{{ $errors->first('hospitals_private_rooms') }}</div>
                      @endif
                  </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hospitals_image">{{ __('admin::lang.img') }}<span class="text-danger"> *</span></label>
                    <div class="col-md-9">
                      @include('admin::layouts.includes.imagePreview', ['name' =>'hospitals_image', 'value' => isset($hospital) ? $hospital->hospitals_image : null])
                      @if ($errors->first('hospitals_image'))
                        <div class="invalid-feedback">{{ $errors->first('hospitals_image') }}</div>
                      @endif
                    </div>
                </div>

                <!-- @if (isset($hospital))
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hospital_images">{{ __('admin::lang.images') }}</label>
                    <div class="col-md-9">
                      <div class="row">
                        @foreach($hospital->images as $image)
                          <div class="col-12 mb-2 col-md-2 hospitalImageContainer">
                                
                              <img src="{{ $image->hospital_images_name ? asset($image->images_url($image->hospital_images_name, 'medium')) : asset('img/no-image.png') }}"
                                alt="img" width="100px" class="img-fluid file-input-old" />

                                <button class="btn btn-danger btn-sm deleteHospitalImage" type="button" 
                                  data-id="{{ $image->hospital_images_id }}">
                                  <i class="fa fa-trash"></i>
                                </button>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                @endif
                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="hospital_images">{{ __('admin::lang.images') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    <input type="file" id="hospitalImage" name="hospital_images[]" multiple>
                    @if ($errors->first('hospital_images'))
                      <div class="invalid-feedback">{{ $errors->first('hospital_images') }}</div>
                    @endif
                  </div>
                </div> -->

                <div class="form-group row">
                  <label class="col-md-3 col-form-label">{{ __('admin::lang.status') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9 col-form-label">
                    @php
                      $status = old('hospitals_status', isset($hospital) ? $hospital->hospitals_status : 'active');
                    @endphp
                    <div class="form-check form-check-inline mr-1">
                      <input class="form-check-input" id="active" type="radio" value="active" name="hospitals_status" {{ $status == 'active' ? 'checked' : '' }}>
                      <label class="form-check-label" for="active">{{ __('admin::lang.active') }}</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                      <input class="form-check-input" id="stopped" type="radio" value="stop" name="hospitals_status" {{ $status == 'stop' ? 'checked' : '' }}>
                      <label class="form-check-label" for="stopped">{{ __('admin::lang.stopped') }}</label>
                    </div>
                    @if ($errors->first('hospitals_status'))
                      <div class="invalid-feedback">{{ $errors->first('hospitals_status') }}</div>
                    @endif
                  </div>
                </div>

                <!-- {{-- location gps --}} -->
                <div class="form-group row mt-3">
                  <label class="col-md-3 col-form-label" for="gps">{{ __('admin::lang.gps') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    
                    <!-- {{--  for map      --}}  -->

                    <div class="form-group form-float">
                        <span style="color: black "> 
                            {!! Form::label('gps',trans('admin::lang.gps')) !!}
                        </span>
                        <input id="pac-input" class="controls form-control addproduct-input w-50 mt-2 " placeholder= "{{__('admin:::lang.search')}}">
                      
                        <div class="col-md-12" id="map" style="width:100%;height:400px;"></div>
                        
                    </div><br/>        

                    <div class="form-group">
                        {{--  {!! Form::label('lat',trans('lang.lat')) !!}  --}}
                        {!! Form::hidden('hospitals_lat',isset($hospital ) ? $hospital->hospitals_lat : '',['class'=>  $errors->first('hospitals_lat') ? 'form-control is-invalid' : 'form-control ' , 'id' => 'hospitals_lat','placeholder' => trans('lang.lat')]) !!}
                        @if($errors->first('lat') || $errors->first('lng'))
                            <div class="invalid-feedback ">{{ $errors->first('hospitals_lat') }}</div>
                        @endif
                        {{--  {!! Form::label('hospitals_lng',trans('lang.lng')) !!}  --}}
                        {!! Form::hidden('hospitals_lng',isset($hospital ) ? $hospital->hospitals_lng : '',['class'=>'form-control', 'id' => 'hospitals_lng','placeholder' => trans('lang.lng')]) !!}

                    </div><br/> 
                    <!-- end map -->
                    @if ($errors->first('hospitals_lat')  )
                      <div class="invalid-feedback">{{ $errors->first('hospitals_lat') }}</div>
                    @endif
                  </div>
                </div> 
              </div>
            </div>
          </div>
          {{-- Languages Tabs --}}
          @foreach ($langs as $lang)
            <div class="tab-pane fade {{ $activeLocale == $lang->locale ? 'show active' : '' }}" id="{{ $lang->locale }}" role="tabpanel" aria-labelledby="{{ $lang->locale }}-tab">

              <div class="row">

                <div class="col-lg-9">

                  <div class="form-group row"  id="{{ $lang->locale }}-hospitals_title" >
                    <label class="col-md-3 col-form-label" for="hospitals_title">{{ __('admin::lang.name') }}<span class="text-danger"> *</span></label>
                    <div class="col-md-9">
                    
                      <input class="form-control {{ $errors->first($lang->locale .'.hospitals_title') ? 'is-invalid' : '' }}" id="{{ $lang->locale .'[hospitals_title]' }}" type="text" name="{{ $lang->locale .'[hospitals_title]' }}" placeholder="{{ __('admin::lang.name') }}" value="{{old($lang->locale .'.hospitals_title', isset($hospital) ? $hospital->translate($lang->locale)->hospitals_title : '' ) }}">

                      @if ($errors->first($lang->locale .'.hospitals_title'))
                        <div class="invalid-feedback">{{ $errors->first($lang->locale .'.hospitals_title') }}</div>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row"  id="{{ $lang->locale }}-hospitals_address" >
                    <label class="col-md-3 col-form-label" for="hospitals_address">{{ __('admin::lang.address') }}<span class="text-danger"> *</span></label>
                    <div class="col-md-9">
                    
                      <input class="form-control {{ $errors->first($lang->locale .'.hospitals_address') ? 'is-invalid' : '' }}" id="{{ $lang->locale .'[hospitals_address]' }}" type="text" name="{{ $lang->locale .'[hospitals_address]' }}" placeholder="{{ __('admin::lang.address') }}"  value="{{ old($lang->locale .'.hospitals_address', isset($hospital) ? $hospital->hospitals_address : '') }}">

                      @if ($errors->first($lang->locale .'.hospitals_address'))
                        <div class="invalid-feedback">{{ $errors->first($lang->locale .'.hospitals_address') }}</div>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-2 col-form-label">{{ __('admin::lang.hospitals_desc') }}<span class="text-danger"> *</span></label>
                    <div class="col-md-10">
                      <textarea id="{{ $lang->locale }}-ckeditor" class="form-control ckeditor {{ $errors->first($lang->locale .'.hospitals_desc') ? 'is-invalid' : '' }}"
                      name="{{ $lang->locale .'[hospitals_desc]' }}" rows="9" placeholder="{{ __('admin::lang.hospitals_desc') }}"
                      >{{ old($lang->locale .'.hospitals_desc', isset($hospital) ? $hospital->translate($lang->locale)->hospitals_desc : '') }}</textarea>
                      @if ($errors->first($lang->locale .'.hospitals_desc'))
                        <div class="invalid-feedback">{{ $errors->first($lang->locale .'.hospitals_desc') }}</div>
                      @endif
                    </div>
                  </div>

                </div>

              </div>
 
            
            </div>
          @endforeach
        </div>

       
    </div>
  </div>
</div>

@section('script')

<script>
  $(document).ready(function(){

    // Initialize File Input Plugin
    $("#hospitalImage").fileinput({
      'showUpload':false, 
      'showCancel':false, 
      'previewFileType':'any',
      theme: "fa",
      language: "{{ $dir == 'rtl' ? 'ar' : '' }}",
      required: true,
      rtl: "{{ $dir == 'rtl' ? true : false }}",
      autoReplace: true,
      overwriteInitial: false,
      allowedFileTypes: ['image'],
      // maxFileCount: 5
      });

    // Delete Old Images individually
    $('.deleteHospitalImage').click(function(){
      let btn =  $(this);
      let con = confirm("Are you sure?");

      if (con) {
        const hospital_images_id = $(this).data('id');
        $.ajax({
            url: "{{ route('admin.hospitals.deleteHospitalImage') }}",
            method: 'POST',
            dataType: 'json', // type of response data
            data: {
              hospital_images_id
            },
            success: function (data) {   // success callback function
                if (data.msg == 1) {
                  btn.closest('.hospitalImageContainer').hide("slow");
                } else if(data.msg == 0) {
                  alert("Something wrong happens, try again!")
                }
            }
        });


      }

    });
  });
  
</script>
 

 <script>
   function initMap() {

       @if(isset($hospital ) && $hospital->hospitals_lat && $hospital->hospitals_lng)
          lat =  "{{ $hospital->hospitals_lat }}"
           lng =  "{{ $hospital->hospitals_lng }}"
       @else 
           lat =  "24.54376380"
           lng =  "46.65610380"
       @endif 
       console.log(lat)
       console.log(lng)
       lat = parseFloat(lat)
       lng = parseFloat(lng)
        var map = new google.maps.Map(document.getElementById('map'), {
           center: {lat: lat, lng: lng},
           zoom: 18,
           mapTypeId: 'terrain'
       });
       var marker = new google.maps.Marker({
           position: {lat: lat, lng: lng},
           map: map
       });
       var infoWindow = new google.maps.InfoWindow({map: map});
       // Try HTML5 geolocation.
       @if(!isset($hospital ) )
         // console.log('not found data') 
         if (navigator.geolocation) {
           navigator.geolocation.getCurrentPosition(function(position) {
             var pos = {
                 lat: position.coords.latitude,
                 lng: position.coords.longitude
             };
   
             infoWindow.setPosition(pos);
           
             infoWindow.setContent('{{ __('lang.locationfound') }}');
             map.setCenter(pos);
           }, function() {
               handleLocationError(true, infoWindow, map.getCenter());
           }); 
         } else {
           // Browser doesn't support Geolocation
           handleLocationError(false, infoWindow, map.getCenter());
         }
       @endif
       // Create the search box and link it to the UI element.
       var input = document.getElementById('pac-input');
       var searchBox = new google.maps.places.SearchBox(input);
       map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

       // Bias the SearchBox results towards current map's viewport.
       map.addListener('bounds_changed', function() {
         searchBox.setBounds(map.getBounds());
       });

       //addListener for click on map to choose location
       map.addListener('click', function(event) {
         //clear previous marker
         marker.setMap(null);
         //set new marker
         marker = new google.maps.Marker({
           position: event.latLng,
           map: map
         });
         document.getElementById('hospitals_lat').value = event.latLng.lat();
         document.getElementById('hospitals_lng').value = event.latLng.lng();
       });


        // Listen for the event fired when the user selects a prediction and retrieve
       // more details for that place.
       var markers = [];
       searchBox.addListener('places_changed', function() {
         var places = searchBox.getPlaces();
         if (places.length == 0) {
           return;
         }
         // Clear out the old markers.
         markers.forEach(function(marker) {
           marker.setMap(null);
         });
         markers = [];
         // For each place, get the icon, name and location.
         var bounds = new google.maps.LatLngBounds();
         places.forEach(function(place) {
           var icon = {
             url: place.icon,
             size: new google.maps.Size(71, 71),
             origin: new google.maps.Point(0, 0),
             anchor: new google.maps.Point(17, 34),
             scaledSize: new google.maps.Size(25, 25)
           };

           // Create a marker for each place.
           markers.push(new google.maps.Marker({
             map: map,
             icon: icon,
             title: place.name,
             position: place.geometry.location
           }));

           document.getElementById('hospitals_lat').value = place.geometry.location.lat();
           document.getElementById('hospitals_lng').value = place.geometry.location.lng();

           if (place.geometry.viewport) {
             // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
           } else {
             bounds.extend(place.geometry.location);
           }
         });
         map.fitBounds(bounds);
       }); 
   }
   function handleLocationError(browserHasGeolocation, infoWindow, pos) {
     infoWindow.setPosition(pos);
     infoWindow.setContent(browserHasGeolocation ?
           'The Geolocation service failed.  ' :
           'Your browser doesnt support geolocation. ');
   }
 </script> 
 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-A44M149_C_j4zWAZ8rTCFRwvtZzAOBE&libraries=places&signed_in=true&callback=initMap"></script>
@endsection