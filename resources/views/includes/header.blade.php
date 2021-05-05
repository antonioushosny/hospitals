
    <div class="container bg-white  d-md-block d-none" id="header-id">
        <div class="row main-header align-items-center text-md-left  mb-md-0 mb-3 {{auth('client')->check() ? 'mt-md-0 mt-3' : ''}} ">


            <div class="col-md-6 col-12 row p-0 m-0   my-md-2 my-0 justify-content-end align-items-end     ">
                <div class=" col-md-12 {{isset($mob) && $mob == 'mob' ? 'd-none' : 'col-4'}} ">
                   <a href="{{route('home')}}"> <img src="{{asset('backend/img/logo.jpeg')}}" alt="{{__('lang.projectTitle')}}" class="  d-md-inline " width="70px" height="50px"></a>
                </div>

            </div>



            <div class="col-md-2 col-4 d-md-inline d-none  text-lg-right text-center">
                <div class="d-inline-block">
                @if($dir == 'ltr')
                <a href="{{route('lang','ar')}}" class="btn-lang {{$dir == 'ltr' ? 'not-active-lang' : '' }}">  العربية </a>
                @else
                <a href="{{route('lang','en')}}" class="btn-lang {{$dir == 'rtl' ? 'not-active-lang' : '' }}"> English</a>
                @endif
                </div>


            </div>

            @if(auth('client')->check() )
                <div class="col-md-3  col-4 mb-4 d-md-inline d-none justify-content-center align-items-center ">

                    <div class="d-inline ml-md-2  ">
                        <span class=" color-black d-block  " > {{__('lang.welcome')}} </span>
                        <a class="  color-black fb-700  " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{auth::guard('client')->user()->clients_name}}  <i class="fa fa-angle-down" aria-hidden="true"></i>

                        </a>
                        <div class="dropdown-menu dropdown-user {{ $dir == 'rtl' ? 'dropdown-menu-right' :'dropdown-menu-left' }}  mt-2  " aria-labelledby="dropdownMenuLink">
                           
                            <a class="dropdown-item {{ isset($mainPageTitle) && $mainPageTitle == 'myProfile' ? 'active' : '' }}"  href="{{ route('getProfile','client') }}" >{{ __('lang.myProfile') }}</a>

                            <a class="dropdown-item bt-user-menue" href="{{ route('logout', ['type'  =>  'client']) }}">{{ __('lang.logout') }} </a>
                        </div>
                    </div>
                </div>
            @elseif(auth('doctor')->check())
                <div class="col-md-3  col-4 mb-4 d-md-inline d-none justify-content-center align-items-center ">

                    <div class="d-inline ml-md-2  ">
                        <span class=" color-black d-block  " > {{__('lang.welcome')}} </span>
                        <a class="  color-black fb-700  " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{auth::guard('doctor')->user()->doctors_name}}  <i class="fa fa-angle-down" aria-hidden="true"></i>

                        </a>
                        <div class="dropdown-menu dropdown-user {{ $dir == 'rtl' ? 'dropdown-menu-right' :'dropdown-menu-left' }}  mt-2  " aria-labelledby="dropdownMenuLink">
                           
                            <!-- <a class="dropdown-item {{ isset($mainPageTitle) && $mainPageTitle == 'myProfile' ? 'active' : '' }}"  href="{{ route('getProfile','client') }}" >{{ __('lang.myProfile') }}</a> -->

                            <a class="dropdown-item bt-user-menue" href="{{ route('logout', ['type'  =>  'doctor']) }}">{{ __('lang.logout') }} </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-lg-4 col-md-5 col-5    d-md-inline d-none  ">
                    <a href="{{route('login')}}" class="btn btn-turquoise-blue ml-3  "  > {{__('lang.login')}}</a> /
                    <a href="{{ route('getRegister', ['type' => 'client'] )}}" class="btn btn-turquoise-blue ml-3  "  > {{__('lang.register')}}</a>
                </div>
            @endif


        </div>

    </div>


