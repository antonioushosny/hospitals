<!-- search hospitals section  -->
  {{-- Search Section --}}
  <div class="card">
    <div class="card-body">
      <h4>{{ __('lang.searchForHospital') }} : </h4>
      <form class="form-horizontal" action="{{ route('hospitals') }}" method="get">
        <div class="row">
          <div class="form-group col-12 col-md-4 text-center">
            <input class="form-control" type="text" name="name" placeholder="{{ __('admin::lang.name') }}" value="{{ old('name') }}">
          </div>
          
          <div class="form-group col-12 col-md-4 text-center">
            {{ Form::select('cities_id',$cities,old('cities_id'),['placeholder'=> __('admin::lang.city'),'class'=>'select2 form-control'])}}
          </div>

          <div class="form-group col-12 col-md-4 text-center">
            {{ Form::select('areas_id',$areas,old('areas_id'),['placeholder'=> __('admin::lang.area'),'class'=>'select2 form-control'])}}
          </div>

                  <div class="form-group col-12 col-md-4 text-center">
            {{ Form::select('departments_id',$departments,old('departments_id'),['placeholder'=> __('admin::lang.department'),'class'=>'select2 form-control'])}}
          </div>

          <div class="form-group col-12 col-md-4 text-center">
            {{ Form::select('specialties_id',$specialties,old('specialties_id'),['placeholder'=> __('admin::lang.specialty'),'class'=>'select2 form-control'])}}
          </div>

          <div class="form-group col-12 col-md-4 text-center">
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i></button>
          </div>
          <div class="form-group col-12 col-md-12 text-right">
              <button type="button" class="btn btn-secondary btn-sm search-reset"><i class="fa fa-ban"></i> {{__('lang.clearFilter')}}</button>
          </div>
        </div>
        <!-- /.row-->
      </form>
    </div>
  </div>
<!-- end search hospitals section  -->