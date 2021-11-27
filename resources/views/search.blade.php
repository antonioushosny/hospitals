<!-- search hospitals section  -->
  {{-- Search Section --}}
  <div class="bg-ice-blue">
    <div class="card-body">
      <h4>{{ __('lang.searchForHospital') }} : </h4>
      <form class="form-horizontal search-form" action="{{ route('hospitals') }}" method="get">
        <div class="row">
     
          
          <div class="form-group col-12 col-md-4 text-center">
            {{ Form::select('cities_id',$cities,old('cities_id'),['placeholder'=> __('admin::lang.city'),'class'=>'select2 form-control'])}}
          </div>

          <div class="form-group col-12 col-md-4 text-center">
            {{ Form::select('areas_id',$areas,old('areas_id'),['placeholder'=> __('admin::lang.area'),'class'=>'select2 form-control'])}}
          </div>

          <!-- <div class="form-group col-12 col-md-4 text-center">
            {{ Form::select('departments_id',$departments,old('departments_id'),['placeholder'=> __('admin::lang.department'),'class'=>'select2 form-control'])}}
          </div> -->

          <div class="form-group col-12 col-md-4 text-center">
            {{ Form::select('specialties_id',$specialties,old('specialties_id'),['placeholder'=> __('admin::lang.specialty'),'class'=>'select2 form-control'])}}
          </div>

          <div class="form-group col-12 col-md-4 text-center">
            {{ Form::select('diseases_id',$diseases,old('diseases_id'),['placeholder'=> __('admin::lang.disease'),'class'=>'select2 form-control'])}}
          </div>
          <div class="form-group col-12 col-md-4 text-center">
            <input class="form-control" type="number" name="hospitals_intensive_care" placeholder="{{ __('admin::lang.hospitals_intensive_care') }}" value="{{ old('hospitals_intensive_care') }}">
          </div>
          <div class="form-group col-12 col-md-4 text-center">
            <input class="form-control" type="number" name="hospitals_recovery_rooms" placeholder="{{ __('admin::lang.hospitals_recovery_rooms') }}" value="{{ old('hospitals_recovery_rooms') }}">
          </div>
          <div class="form-group col-12 col-md-4 text-center">
            <input class="form-control" type="number" name="hospitals_private_rooms" placeholder="{{ __('admin::lang.hospitals_private_rooms') }}" value="{{ old('hospitals_private_rooms') }}">
          </div>
          <div class="form-group col-12 col-md-4 text-center">
            <input class="form-control" type="number" name="hospitals_public_rooms" placeholder="{{ __('admin::lang.hospitals_public_rooms') }}" value="{{ old('hospitals_public_rooms') }}">
          </div>
          <div class="form-group col-12 col-md-4 text-center">
            <input class="form-control" type="number" name="hospitals_rays_centers" placeholder="{{ __('admin::lang.hospitals_rays_centers') }}" value="{{ old('hospitals_rays_centers') }}">
          </div>
          <div class="form-group col-12 col-md-4 text-center">
            <input class="form-control" type="number" name="hospitals_analysis_laboratories" placeholder="{{ __('admin::lang.hospitals_analysis_laboratories') }}" value="{{ old('hospitals_analysis_laboratories') }}">
          </div>

          <div class="form-group col-12 col-md-4 text-center">
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i></button>
          </div>
          <div class="form-group col-12 col-md-12 text-right mt-4">
              <button type="button" class="btn btn-secondary btn-sm search-reset"><i class="fa fa-ban"></i> {{__('lang.clearFilter')}}</button>
          </div>
        </div>
        <!-- /.row-->
      </form>
    </div>
  </div>
<!-- end search hospitals section  -->