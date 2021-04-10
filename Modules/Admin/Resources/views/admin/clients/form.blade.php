
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
                  <label class="col-md-3 col-form-label" for="clients_name">{{ __('admin::lang.name') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::text('clients_name',old('clients_name',isset($client) ? $client->clients_name : ''),['placeholder'=> __('admin::lang.name'),'class'=>' form-control'])}}              
                      @if ($errors->first('clients_name'))
                        <div class="invalid-feedback">{{ $errors->first('clients_name') }}</div>
                      @endif
                  </div>
                </div>
      
                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="clients_phone">{{ __('admin::lang.phone') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::text('clients_phone',old('clients_phone',isset($client) ? $client->clients_phone : ''),['placeholder'=> __('admin::lang.phone'),'class'=>' form-control'])}}              
                      @if ($errors->first('clients_phone'))
                        <div class="invalid-feedback">{{ $errors->first('clients_phone') }}</div>
                      @endif
                  </div>
                </div>
   
                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="clients_phone">{{ __('admin::lang.email') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::email('email',old('email',isset($client) ? $client->email : ''),['placeholder'=> __('admin::lang.email'),'class'=>' form-control'])}}              
                      @if ($errors->first('email'))
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                      @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="clients_phone">{{ __('admin::lang.civil_no') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9">
                    {{ Form::text('clients_civil_no',old('clients_civil_no',isset($client) ? $client->clients_civil_no : ''),['placeholder'=> __('admin::lang.civil_no'),'class'=>' form-control'])}}              
                      @if ($errors->first('clients_civil_no'))
                        <div class="invalid-feedback">{{ $errors->first('clients_civil_no') }}</div>
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
                  <label class="col-md-3 col-form-label">{{ __('admin::lang.status') }}<span class="text-danger"> *</span></label>
                  <div class="col-md-9 col-form-label">
                    @php
                      $status = old('clients_status', isset($client) ? $client->clients_status : '1');
                    @endphp
                    <div class="form-check form-check-inline mr-1">
                      <input class="form-check-input" id="active" type="radio" value="1" name="clients_status" {{ $status == '1' ? 'checked' : '' }}>
                      <label class="form-check-label" for="active">{{ __('admin::lang.active') }}</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                      <input class="form-check-input" id="stopped" type="radio" value="0" name="clients_status" {{ $status == '0' ? 'checked' : '' }}>
                      <label class="form-check-label" for="stopped">{{ __('admin::lang.stopped') }}</label>
                    </div>
                    @if ($errors->first('clients_status'))
                      <div class="invalid-feedback">{{ $errors->first('clients_status') }}</div>
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

 