
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
              
                <!-- hospital -->
                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="countries_id">{{ __('admin::lang.hospital') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::select('hospitals_id',$hospitals,old('hospitals_id',isset($hospitals_treatment) ? $hospitals_treatment->hospitals_id : ''),['placeholder'=> __('admin::lang.hospital'),'class'=>'select2 form-control'])}}              
                      @if ($errors->first('hospitals_id'))
                        <div class="invalid-feedback">{{ $errors->first('hospitals_id') }}</div>
                      @endif
                  </div>
                </div>
                <!-- doctor -->
                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="countries_id">{{ __('admin::lang.doctor') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::select('doctors_id',$doctors,old('doctors_id',isset($hospitals_treatment) ? $hospitals_treatment->doctors_id : ''),['placeholder'=> __('admin::lang.doctor'),'class'=>'select2 form-control'])}}              
                      @if ($errors->first('doctors_id'))
                        <div class="invalid-feedback">{{ $errors->first('doctors_id') }}</div>
                      @endif
                  </div>
                </div>
                <!-- disease -->
                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="countries_id">{{ __('admin::lang.disease') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::select('diseases_id',$diseases,old('diseases_id',isset($hospitals_treatment) ? $hospitals_treatment->diseases_id : ''),['placeholder'=> __('admin::lang.disease'),'class'=>'select2 form-control'])}}              
                      @if ($errors->first('diseases_id'))
                        <div class="invalid-feedback">{{ $errors->first('diseases_id') }}</div>
                      @endif
                  </div>
                </div>
                <!-- treatments_period -->
                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="hospitals_treatments_period">{{ __('admin::lang.treatments_period') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::text('hospitals_treatments_period',old('hospitals_treatments_period',isset($hospitals_treatment) ? $hospitals_treatment->hospitals_treatments_period : ''),['placeholder'=> __('admin::lang.treatments_period'),'class'=>' form-control'])}}              
                      @if ($errors->first('hospitals_treatments_period'))
                        <div class="invalid-feedback">{{ $errors->first('hospitals_treatments_period') }}</div>
                      @endif
                  </div>
                </div>
                <!-- treatments_cost -->
                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="hospitals_treatments_cost">{{ __('admin::lang.treatments_cost') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::text('hospitals_treatments_cost',old('hospitals_treatments_cost',isset($hospitals_treatment) ? $hospitals_treatment->hospitals_treatments_cost : ''),['placeholder'=> __('admin::lang.treatments_cost'),'class'=>' form-control'])}}              
                      @if ($errors->first('hospitals_treatments_cost'))
                        <div class="invalid-feedback">{{ $errors->first('hospitals_treatments_cost') }}</div>
                      @endif
                  </div>
                </div>
                <!-- treatments_program -->
                <div class="form-group row">
                  <label class="col-md-2 col-form-label">{{ __('admin::lang.treatments_program') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-10">
                    <textarea id="{{ $locale }}-ckeditor" class="form-control ckeditor {{ $errors->first('hospitals_treatments_program') ? 'is-invalid' : '' }}"
                    name="hospitals_treatments_program" rows="9" placeholder="{{ __('admin::lang.treatments_program') }}"
                    >{{ old('hospitals_treatments_program', isset($hospitals_treatment) ? $hospitals_treatment->hospitals_treatments_program : '') }}</textarea>
                    @if ($errors->first('hospitals_treatments_program'))
                      <div class="invalid-feedback">{{ $errors->first('hospitals_treatments_program') }}</div>
                    @endif
                  </div>
                </div>

                
                <div class="form-group row">
                  <label class="col-md-3 col-form-label">{{ __('admin::lang.status') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9 col-form-label">
                    @php
                      $status = old('hospitals_treatments_status', isset($hospitals_treatment) ? $hospitals_treatment->hospitals_treatments_status : 'active');
                    @endphp
                    <div class="form-check form-check-inline mr-1">
                      <input class="form-check-input" id="active" type="radio" value="active" name="hospitals_treatments_status" {{ $status == 'active' ? 'checked' : '' }}>
                      <label class="form-check-label" for="active">{{ __('admin::lang.active') }}</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                      <input class="form-check-input" id="stopped" type="radio" value="stop" name="hospitals_treatments_status" {{ $status == 'stop' ? 'checked' : '' }}>
                      <label class="form-check-label" for="stopped">{{ __('admin::lang.stopped') }}</label>
                    </div>
                    @if ($errors->first('hospitals_treatments_status'))
                      <div class="invalid-feedback">{{ $errors->first('hospitals_treatments_status') }}</div>
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

 