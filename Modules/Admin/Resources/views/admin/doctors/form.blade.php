
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
 
        </ul>

        {{-- Tabs Content --}}
        <div class="tab-content" id="langsTabsContent">
          <div class="tab-pane fade {{ $activeLocale == 'general' ? 'show active' : '' }}" id="general" role="tabpanel" aria-labelledby="general-tab">
            <div class="row">
              <div class="col-lg-9">

                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="doctors_name">{{ __('admin::lang.name') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::text('doctors_name',old('doctors_name',isset($doctor) ? $doctor->doctors_name : ''),['placeholder'=> __('admin::lang.name'),'class'=>' form-control'])}}              
                      @if ($errors->first('doctors_name'))
                        <div class="invalid-feedback">{{ $errors->first('doctors_name') }}</div>
                      @endif
                  </div>
                </div>
   

                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="countries_id">{{ __('admin::lang.country') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::select('countries_id',$countries,old('countries_id',isset($doctor) ? $doctor->countries_id : ''),['placeholder'=> __('admin::lang.country'),'class'=>'select2 form-control'])}}              
                      @if ($errors->first('countries_id'))
                        <div class="invalid-feedback">{{ $errors->first('countries_id') }}</div>
                      @endif
                  </div>
                </div>
 
                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="countries_id">{{ __('admin::lang.hospital') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::select('hospitals_id',$hospitals,old('hospitals_id',isset($doctor) ? $doctor->hospitals_id : ''),['placeholder'=> __('admin::lang.hospital'),'class'=>'select2 form-control'])}}              
                      @if ($errors->first('hospitals_id'))
                        <div class="invalid-feedback">{{ $errors->first('hospitals_id') }}</div>
                      @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="countries_id">{{ __('admin::lang.department') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::select('departments_id',$departments,old('departments_id',isset($doctor) ? $doctor->departments_id : ''),['placeholder'=> __('admin::lang.department'),'class'=>'select2 form-control'])}}              
                      @if ($errors->first('departments_id'))
                        <div class="invalid-feedback">{{ $errors->first('departments_id') }}</div>
                      @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="countries_id">{{ __('admin::lang.specialty') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::select('specialties_id',$specialties,old('specialties_id',isset($doctor) ? $doctor->specialties_id : ''),['placeholder'=> __('admin::lang.specialty'),'class'=>'select2 form-control'])}}              
                      @if ($errors->first('specialties_id'))
                        <div class="invalid-feedback">{{ $errors->first('specialties_id') }}</div>
                      @endif
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="doctors_phone">{{ __('admin::lang.phone') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::text('doctors_phone',old('doctors_phone',isset($doctor) ? $doctor->doctors_phone : ''),['placeholder'=> __('admin::lang.phone'),'class'=>' form-control'])}}              
                      @if ($errors->first('doctors_phone'))
                        <div class="invalid-feedback">{{ $errors->first('doctors_phone') }}</div>
                      @endif
                  </div>
                </div>
   
                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="doctors_phone">{{ __('admin::lang.email') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::email('doctors_email',old('doctors_email',isset($doctor) ? $doctor->doctors_email : ''),['placeholder'=> __('admin::lang.email'),'class'=>' form-control'])}}              
                      @if ($errors->first('doctors_email'))
                        <div class="invalid-feedback">{{ $errors->first('doctors_email') }}</div>
                      @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="doctors_phone">{{ __('admin::lang.civil_no') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::text('doctors_civil_no',old('doctorsdoctors_civil_no',isset($doctor) ? $doctor->doctors_civil_no : ''),['placeholder'=> __('admin::lang.civil_no'),'class'=>' form-control'])}}              
                      @if ($errors->first('doctors_civil_no'))
                        <div class="invalid-feedback">{{ $errors->first('doctors_civil_no') }}</div>
                      @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="doctors_phone">{{ __('admin::lang.password') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::password('password',['placeholder'=> __('admin::lang.password'),'class'=>' form-control'])}}              
                      @if ($errors->first('password'))
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                      @endif
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-md-3 col-form-label">{{ __('admin::lang.status') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9 col-form-label">
                    @php
                      $status = old('doctors_status', isset($doctor) ? $doctor->doctors_status : 'active');
                    @endphp
                    <div class="form-check form-check-inline mr-1">
                      <input class="form-check-input" id="active" type="radio" value="active" name="doctors_status" {{ $status == 'active' ? 'checked' : '' }}>
                      <label class="form-check-label" for="active">{{ __('admin::lang.active') }}</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                      <input class="form-check-input" id="stopped" type="radio" value="stop" name="doctors_status" {{ $status == 'stop' ? 'checked' : '' }}>
                      <label class="form-check-label" for="stopped">{{ __('admin::lang.stopped') }}</label>
                    </div>
                    @if ($errors->first('doctors_status'))
                      <div class="invalid-feedback">{{ $errors->first('doctors_status') }}</div>
                    @endif
                  </div>
                </div>

              </div>
            </div>
          </div>
    
        </div>

       
    </div>
  </div>
</div>

 