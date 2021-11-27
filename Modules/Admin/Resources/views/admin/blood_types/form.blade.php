
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
                  <label class="col-md-3 col-form-label" for="blood_types_type">{{ __('admin::lang.type') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    <input class="form-control {{ $errors->first('blood_types_type') ? 'is-invalid' : '' }}" id="blood_types_type" type="text" name="blood_types_type" placeholder="{{ __('admin::lang.type') }}"
                     value="{{ old('blood_types_type', isset($blood_type) ? $blood_type->blood_types_type : '') }}">
                    @if ($errors->first('blood_types_type'))
                      <div class="invalid-feedback">{{ $errors->first('blood_types_type') }}</div>
                    @endif
                  </div>
                </div>
               
                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="blood_types_amount">{{ __('admin::lang.amount') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    <input class="form-control {{ $errors->first('blood_types_amount') ? 'is-invalid' : '' }}" id="blood_types_amount" type="text" name="blood_types_amount" placeholder="{{ __('admin::lang.amount') }}"
                     value="{{ old('blood_types_amount', isset($blood_type) ? $blood_type->blood_types_amount : '') }}">
                    @if ($errors->first('blood_types_amount'))
                      <div class="invalid-feedback">{{ $errors->first('blood_types_amount') }}</div>
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

 