
  <a id="show-sidebar" class="btn btn-sm bg-marine color-white d-md-none d-inline" href="#">
    <i class="fa fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper d-md-none d-inline">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="{{route('home')}}">{{__('admin::lang.siteTitle')}}</a>
        <div id="close-sidebar">
          <i class="fa fa-times"></i>
        </div>
      </div>


      <div class="sidebar-menu">
        <ul>
 
              <li class="header-menu" >
                <img src="{{asset('backend/img/logo.jpeg')}}" alt="{{__('admin::lang.siteTitle')}}" class="  object-fit-contain " width="100%" height="100px" >
              </li>

              <li class=" {{ isset($mainPageTitle) && $mainPageTitle == 'home' ? 'active' : '' }} ">
                <a href="{{route('home')}}">
                  <!-- <i class="fa fa-folder"></i> -->
                  <span>{{__('lang.home')}} </span>
                </a>
              </li>

              <li class=" {{ isset($mainPageTitle) && $mainPageTitle == 'news' ? 'active' : '' }} ">
                <a href="{{route('news')}}">
                  <!-- <i class="fa fa-folder"></i> -->
                  <span>{{__('admin::lang.news')}} </span>
                </a>
              </li>
              @if(!auth('client')->check() && !auth('hospital')->check())
             
                <li class=" {{ isset($mainPageTitle) && $mainPageTitle == 'hospitalLogin' ? 'active' : '' }} ">
                  <a href="{{route('hospitalLogin',['type'=>'hospital'])}}"  > {{__('lang.hospitalLogin')}}</a>
                </li>
              @endif

              @if(auth('hospital')->check())
                    <li class=" {{ isset($mainPageTitle) && $mainPageTitle == 'orders' ? 'active' : '' }} m-md-0 m-2   ">
                      <a  href="{{route('orders.hospital_orders')}}">{{__('lang.hospital_orders')}} <span class="sr-only">(current)</span></a>
                    </li>
                 
                 @endif
               
              @if(auth('client')->check() && !auth('hospital')->check())
                <li class=" {{ isset($mainPageTitle) && $mainPageTitle == 'orders' ? 'active' : '' }} ">
                  <a href="{{route('orders.hospital_orders')}}">
                    <span>{{__('lang.orders')}} </span>
                  </a>
                </li>
                 
                <li class="{{ isset($mainPageTitle) &&  $mainPageTitle == 'myProfile'  ? 'active' : ''  }} ">
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">{{auth::guard('client')->user()->clients_name}} </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li class="{{ isset($mainPageTitle) &&  $mainPageTitle == 'myProfile'  ? 'active' : ''  }} ">
                        <a href="{{ route('getProfile','client') }}">{{ __('lang.myProfile') }}</a>
                    </li>

                </ul>
                </li>
                <li class="">
                  <a href="{{route('logout', ['type'  =>  'client'])}}"><span> {{__('lang.logout') }}  </span></a>
                </li>
              @else
                <li class=" ">
                  <a href="{{route('login','client')}}"><span> {{__('lang.login') }}  </span></a>
                </li>
              @endif
 
               
 
              @if(!auth('client')->check() && !auth('hospital')->check())
                <li class=" ">
                    <a href="{{route('hospitalLogin',['type'=>'hospital'])}}" > {{__('lang.hospitalLogin')}}</a>
                </li>
              @endif

              <li class=" ">
                @if($dir == 'ltr')
                <a href="{{route('lang','ar')}}" class="btn-lang ">  العربية </a>
                @else
                <a href="{{route('lang','en')}}" class="btn-lang  "> English</a>
                @endif
              </li>


        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>

  </nav>

