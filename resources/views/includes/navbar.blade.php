

<nav class="navbar navbar-expand-md navbar-light bg-marine color-white  sidebarNavigation    " id="navbar" data-sidebarClass=" navbar-light bg-marine  color-white ">
    <div class="container px-0 flex-md-row flex-row-reverse">
        <a href="{{route('home')}}" class="float-left"> <img src="{{asset('backend/img/logo.jpeg')}}" alt="{{__('lang.projectTitle')}}" class=" navbar-brand d-md-none d-inline  " width="70px" height="50px"></a>
        <!-- <button class="navbar-toggler  custom-toggler leftNavbarToggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->

        <div class="collapse navbar-collapse d-md-inline d-none px-0" id="navbarSupportedContent">
            <span class="closebtn d-md-none d-inline" onclick="$('.sideMenu').removeClass('open') ; $('.overlay').removeClass('open') ">×</span>

            <ul class="nav navbar-nav nav-flex-icons ">
                <li class="nav-item {{ isset($mainPageTitle) && $mainPageTitle == 'home' ? 'active' : '' }} m-md-0 m-2">
                    <a class="nav-link" href="{{route('home')}}">{{__('lang.home')}} <span class="sr-only">(current)</span></a>
                </li>


                <li class="nav-item {{ isset($mainPageTitle) && $mainPageTitle == 'news' ? 'active' : '' }} m-md-0 m-2">
                    <a class="nav-link" href="{{route('news')}}">{{__('admin::lang.news')}} <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item {{ isset($mainPageTitle) && $mainPageTitle == 'contactus' ? 'active' : '' }} m-md-0 m-2   ">
                    <a class="nav-link" href="{{route('contactus')}}">{{__('lang.ContactUs')}} <span class="sr-only">(current)</span></a>
                </li>
 

                @if(auth('client')->check())

                    <li class="nav-item {{ isset($mainPageTitle) && $mainPageTitle == 'orders' ? 'active' : '' }} m-md-0 m-2   ">
                        <a class="nav-link" href="{{route('orders.client_orders')}}">{{__('lang.orders')}} <span class="sr-only">(current)</span></a>
                    </li>
 
                    <li class="nav-item d-md-none d-inline m-md-0 m-2 {{ isset($mainPageTitle) &&  $mainPageTitle == 'myProfile'  ? 'active' : ''  }}">
                        <a class="nav-link" href="{{ route('getProfile','client') }}">{{ __('lang.myProfile') }}</a>
                    </li>

                    <li class="nav-item d-md-none d-inline m-md-0 m-2">
                        <a class="nav-link" href="{{route('logout', ['type'  =>  'client'])}}"> {{__('lang.logout') }} <span class="sr-only">(current)</span></a>
                    </li>


                @endif

                @if(!auth('client')->check() && !auth('doctor')->check())
                <li class="nav-item   m-md-0 m-2">
                    <a href="{{route('doctorLogin',['type'=>'doctor'])}}" class="nav-link "  > {{__('lang.doctorLogin')}}</a>
                </li>
                @endif

                @if(auth('doctor')->check())
                    <li class="nav-item {{ isset($mainPageTitle) && $mainPageTitle == 'orders' ? 'active' : '' }} m-md-0 m-2   ">
                        <a class="nav-link" href="{{route('orders.doctor_orders')}}">{{__('lang.doctor_orders')}} <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item {{ isset($mainPageTitle) && $mainPageTitle == 'orders' ? 'active' : '' }} m-md-0 m-2   ">
                        <a class="nav-link" href="{{route('orders.doctor_following_orders')}}">{{__('lang.doctor_following_orders')}} <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item {{ isset($mainPageTitle) && $mainPageTitle == 'hospitals_treatments' ? 'active' : '' }} m-md-0 m-2   ">
                        <a class="nav-link" href="{{route('hospitals_treatments.index')}}">{{__('admin::lang.hospitals_treatments')}} <span class="sr-only">(current)</span></a>
                    </li>
                 @endif
                <li class="nav-item d-md-none d-inline  m-md-0 m-2">
                    @if($dir == 'ltr')
                        <a class="nav-link" href="{{route('lang','ar')}}"> العربية</a>
                    @else
                        <a class="nav-link" href="{{route('lang','en')}}"> English</a>
                    @endif
                </li>

            </ul>
        <!--  <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>
    </div>
</nav>
