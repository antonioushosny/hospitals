<div class="row">
    <img src="{{$hospital->hospitals_image ? asset($hospital->images_url($hospital->hospitals_image, 'medium')) : asset('img/no-image.png') }}" class="col-4" alt="..." width="100%" height="auto">
    <div class="col-8 text-left">
        <div class="row">
            <div class="col">
                <h5 class="card-title">
                    <a href="{{route('hospitals.show',$hospital->hospitals_id)}}" class="color-marine">{{$hospital->hospitals_title}}</a>
                </h5>
            </div>
            <div class="col">
                <a href="{{route('hospitals.show',$hospital->hospitals_id)}}" class="btn btn-success btn-sm color-white mx-0">{{ __('admin::lang.makeOrder')}}</a>
            </div>
        </div>
      
        <span class="d-block">{{__('admin::lang.hospitals_intensive_care')}} : {{ $hospital->hospitals_intensive_care }} </span>
        <span class="d-block">{{__('admin::lang.hospitals_recovery_rooms')}} : {{ $hospital->hospitals_recovery_rooms }} </span>
        <span class="d-block">{{__('admin::lang.hospitals_private_rooms')}} : {{ $hospital->hospitals_private_rooms }} </span>
        <span class="d-block">{{__('admin::lang.hospitals_public_rooms')}} : {{ $hospital->hospitals_public_rooms }} </span>
        <span class="d-block">{{__('admin::lang.hospitals_rays_centers')}} : {{ $hospital->hospitals_rays_centers }} </span>
        <span class="d-block">{{__('admin::lang.hospitals_analysis_laboratories')}} : {{ $hospital->hospitals_analysis_laboratories }} </span>

    </div>
</div>