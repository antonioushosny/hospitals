
  <a id="show-sidebar" class="btn btn-sm bg-marine color-white d-md-none d-inline" href="#">
    <i class="fa fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper d-md-none d-inline">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="{{route('home')}}">{{__('lang.projectTitleAcademy')}}</a>
        <div id="close-sidebar">
          <i class="fa fa-times"></i>
        </div>
      </div>


      <div class="sidebar-menu">
        <ul>



              <li class="header-menu" >
                <img src="{{asset('backend/img/logo.jpeg')}}" alt="{{__('lang.projectTitle')}}" class="  object-fit-contain " width="100%" height="100px" >
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
              



                @if(auth('client')->check())
                <li class=" {{ isset($mainPageTitle) && $mainPageTitle == 'courses' ? 'active' : '' }} ">
                  <a href="{{route('courses')}}">
                    <span>{{__('lang.myCourses')}} </span>
                  </a>
                </li>
                <li class=" {{ isset($mainPageTitle) && $mainPageTitle == 'skills' ? 'active' : '' }} ">
                  <a href="{{route('skills')}}">
                    <span>{{__('lang.mySkills')}} </span>
                  </a>
                </li>

                @endif
                <li class=" {{ isset($mainPageTitle) && $mainPageTitle == 'contactus' ? 'active' : '' }}   ">
                  <a href="{{route('contactus')}}">
                    <span>{{__('lang.ContactUs')}} </span>
                  </a>
                </li>

                <li class=" {{ isset($mainPageTitle) && $mainPageTitle == 'diplomas' ? 'active' : '' }} ">
                    <a href="{{route('diplomas')}}">
                      <span>{{__('lang.projectTitleDiplomas')}} </span>
                    </a>
                </li>
              @if(auth('client')->check())


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
                <a href="{{route('getLogin','client')}}"><span> {{__('lang.login') }}  </span></a>
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
