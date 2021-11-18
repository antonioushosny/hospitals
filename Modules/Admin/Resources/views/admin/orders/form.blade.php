
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

                 

                <!-- orders_doctor_following_notes -->
                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="orders_doctor_following_notes">{{ __('admin::lang.notes') }}<span class="text-danger">  </span></label>
                  <div class="col-md-9">
                    {{ Form::text('orders_doctor_following_notes',old('orders_doctor_following_notes',isset($order) ? $order->orders_doctor_following_notes : ''),['placeholder'=> __('admin::lang.notes'),'class'=>' form-control'])}}              
                      @if ($errors->first('orders_doctor_following_notes'))
                        <div class="invalid-feedback">{{ $errors->first('orders_doctor_following_notes') }}</div>
                      @endif
                  </div>
                </div>
 
                <div class="form-group row">
                  <label class="col-md-3 col-form-label">{{ __('admin::lang.status') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9 col-form-label">
                    @php
                      $status = old('orders_status', isset($order) ? $order->orders_status : 'active');
                    @endphp
                    <div class="form-check form-check-inline mr-1">
                      <input class="form-check-input" id="status_0" type="radio" value="0" name="orders_status" {{ $status == '0' ? 'checked' : '' }}>
                      <label class="form-check-label" for="status_0">{{ __('admin::lang.status_0') }}</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                      <input class="form-check-input" id="status_1" type="radio" value="1" name="orders_status" {{ $status == '1' ? 'checked' : '' }}>
                      <label class="form-check-label" for="status_1">{{ __('admin::lang.status_1') }}</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                      <input class="form-check-input" id="status_2" type="radio" value="2" name="orders_status" {{ $status == '2' ? 'checked' : '' }}>
                      <label class="form-check-label" for="status_2">{{ __('admin::lang.status_2') }}</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                      <input class="form-check-input" id="status_3" type="radio" value="3" name="orders_status" {{ $status == '3' ? 'checked' : '' }}>
                      <label class="form-check-label" for="status_3">{{ __('admin::lang.status_3') }}</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                      <input class="form-check-input" id="status_4" type="radio" value="4" name="orders_status" {{ $status == '4' ? 'checked' : '' }}>
                      <label class="form-check-label" for="status_4">{{ __('admin::lang.status_4') }}</label>
                    </div>
                    @if ($errors->first('orders_status'))
                      <div class="invalid-feedback">{{ $errors->first('orders_status') }}</div>
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

 