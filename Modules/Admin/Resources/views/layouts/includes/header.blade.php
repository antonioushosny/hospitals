 
@php
  $nav = $dir == 'ltr' ? 'ml-auto' : 'mr-auto';
  $dropdown = $dir == 'ltr' ? 'dropdown-menu-left' : 'dropdown-menu-right';
  $dropdown2 = $dir == 'ltr' ? 'dropdown-menu-right' : 'dropdown-menu-left';
  $dropdown3 = $dir == 'ltr' ? 'header-submenu-left' : 'header-submenu';
@endphp

<header class="app-header  navbar ">
 
  <div class="container-fluid row " >
        <button class="   navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class=" col-lg-1 col-md-2 navbar-brand" href="{{ route('admin.dashboard.home') }}">
          <img class="d-md-down-none" src="{{ asset('backend/img/logo.jpeg') }}" height="25" alt="{{__('admin::lang.siteTitle')}}">

          <img class="d-lg-none" src="{{ asset($locale == 'ar' ? 'backend/img/logo.jpeg' : 'backend/img/logo.jpeg') }}" height="30" alt="{{__('admin::lang.siteTitle')}}">
        </a>

          <div class="col-lg-9  col-md-7   row m-0 p-0 d-md-down-none">
            <ul class="nav navbar-nav d-md-down-none">


                {{-- About Company --}}
                @canany(['view infos','view contactus','view metatags'])
                  <li class="nav-item px-3">
               
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                      {{ __('admin::lang.aboutProject') }}
                      <i class="fa fa-arrow-circle-down"></i>
                    </a>
                    <div class="dropdown-menu {{ $dropdown }}">
                      {{-- Infos Link --}}
                      @can('view infos')
                        <a class="dropdown-item" href="{{ route('admin.infos.show', [1, 'activeLocale' => $locale]) }}">
                          {{ __('admin::lang.aboutus') }}
                        </a>
                      @endcan
   
                      {{-- privacyPolicy Link --}}
                      @can('view infos')
                        <a class="dropdown-item" href="{{ route('admin.infos.show', [2, 'activeLocale' => $locale]) }}">
                          {{ __('admin::lang.privacyPolicy') }}
                        </a>
                      @endcan

                      {{-- termsConditions Link --}}
                      @can('view infos')
                        <a class="dropdown-item" href="{{ route('admin.infos.show', [3, 'activeLocale' => $locale]) }}">
                          {{ __('admin::lang.termsConditions') }}
                        </a>
                      @endcan

                      {{-- MetaTags Link --}}
                      <!-- @can('view metatags')
                        <a class="dropdown-item" href="{{ route('admin.metatags.index') }}">
                          {{ __('admin::lang.metatagsLink') }}
                        </a>
                      @endcan -->

                
                    </div>
                  </li>
                @endcanany

                {{-- advertisements Links --}}
                @canany(['view advertisements'])
                  <li class="nav-item px-3">
                    <a class="nav-link"   href="{{ route('admin.advertisements.index') }}" >
                      {{ __('admin::lang.advertisements') }}
                    </a>
                  </li>
                @endcanany

                {{-- news Links --}}
                @canany(['view news'])
                  <li class="nav-item px-3">
                    <a class="nav-link"   href="{{ route('admin.news.index') }}" >
                      {{ __('admin::lang.news') }}
                    </a>
                  </li>
                @endcanany

                {{-- countries Links --}}
                <!-- @canany(['view countries'])
                  <li class="nav-item px-3">
                    <a class="nav-link"   href="{{ route('admin.countries.index') }}" >
                      {{ __('admin::lang.countries') }}
                    </a>
                  </li>
                @endcanany -->
                
                {{-- cities Links --}}
                @canany(['view cities'])
                  <li class="nav-item px-3">
                    <a class="nav-link"   href="{{ route('admin.cities.index') }}" >
                      {{ __('admin::lang.cities') }}
                    </a>
                  </li>
                @endcanany
                {{-- areas Links --}}
                @canany(['view areas'])
                  <li class="nav-item px-3">
                    <a class="nav-link"   href="{{ route('admin.areas.index') }}" >
                      {{ __('admin::lang.areas') }}
                    </a>
                  </li>
                @endcanany
                
                {{-- hospitals Links --}}
                @canany(['view hospitals'])
                  <li class="nav-item px-3">
                    <a class="nav-link"   href="{{ route('admin.hospitals.index') }}" >
                      {{ __('admin::lang.hospitals') }}
                    </a>
                  </li>
                @endcanany
                
                {{-- departments Links --}}
                @canany(['view departments'])
                  <li class="nav-item px-3">
                    <a class="nav-link"   href="{{ route('admin.departments.index') }}" >
                      {{ __('admin::lang.departments') }}
                    </a>
                  </li>
                @endcanany

                {{-- specialties Links --}}
                @canany(['view specialties'])
                  <li class="nav-item px-3">
                    <a class="nav-link"   href="{{ route('admin.specialties.index') }}" >
                      {{ __('admin::lang.specialties') }}
                    </a>
                  </li>
                @endcanany

                {{-- diseases Links --}}
                @canany(['view diseases'])
                  <li class="nav-item px-3">
                    <a class="nav-link"   href="{{ route('admin.diseases.index') }}" >
                      {{ __('admin::lang.diseases') }}
                    </a>
                  </li>
                @endcanany

                {{-- clients Links --}}
                @canany(['view clients'])
                  <li class="nav-item px-3">
                    <a class="nav-link"   href="{{ route('admin.clients.index') }}" >
                      {{ __('admin::lang.clients') }}
                    </a>
                  </li>
                @endcanany

                {{-- orders Links --}}
                @canany(['view orders'])
                  <li class="nav-item px-3">
                    <a class="nav-link"   href="{{ route('admin.orders.index') }}" >
                      {{ __('admin::lang.orders') }}
                    </a>
                  </li>
                @endcanany
                
                {{-- contactus Links --}}
                @canany(['view contactus'])
                  <li class="nav-item px-3">
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                      {{ __('admin::lang.connectWithUs') }}
                      <i class="fa fa-arrow-circle-down"></i>
                    </a>

                    <div class="dropdown-menu {{ $dropdown }}">
                       {{-- contactus Link --}}
                        @can('view contactus')
                          <a class="dropdown-item" href="{{ route('admin.contactus.index') }}">
                            {{ __('admin::lang.contactus') }}
                          </a>
                        @endcan

                        {{-- contacts Link --}}
                        @can('view contactus')
                          <a class="dropdown-item" href="{{ route('admin.contacts.show', [1, 'activeLocale' => $locale]) }}">
                            {{ __('admin::lang.contacts') }}
                          </a>
                        @endcan

                    </div>
                  </li>
                @endcanany
                {{-- blood_types Links --}}
                @canany(['view blood_types'])
                  <li class="nav-item px-3">
                    <a class="nav-link"   href="{{ route('admin.blood_types.index') }}" >
                      {{ __('admin::lang.blood_types') }}
                    </a>
                  </li>
                @endcanany

                {{-- Admins Links --}}
                @canany(['view admins', 'view roles'])
                  <li class="nav-item px-3">
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                      {{ __('admin::lang.admins') }}
                      <i class="fa fa-arrow-circle-down"></i>
                    </a>

                    <div class="dropdown-menu {{ $dropdown }}">

                      {{-- Roles Link --}}
                      @can('view roles')
                        <a class="dropdown-item" href="{{ route('admin.roles.index') }}">
                          {{ __('admin::lang.permissions') }}
                        </a>
                      @endcan

                      {{-- Admins Link --}}
                      @can('view admins')
                        <a class="dropdown-item" href="{{ route('admin.admins.index') }}">
                          {{ __('admin::lang.admins') }}
                        </a>
                      @endcan

                    

                    </div>
                  </li>
                @endcanany

                {{-- Settings Links --}}
                @canany(['view settings'])
                  <li class="nav-item px-3">
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                      {{ __('admin::lang.settings') }}
                      <i class="fa fa-arrow-circle-down"></i>
                    </a>

                    <div class="dropdown-menu {{ $dropdown }}">
                      {{-- settings Link --}}
                      @can('view settings')
                        <a class="dropdown-item" href="{{ route('admin.settings.edit') }}">
                          {{ __('admin::lang.general_data') }}
                        </a>
                      @endcan

                    </div>
                  </li>
                @endcanany
 


            </ul>
          </div>

          <div class="col-lg-2 col-md-2 col-4 row m-0 p-0  ">

            <ul class="nav navbar-nav {{ $nav }}">
            @can('view contactus')
              <li class="nav-item dropdown d-md-down-none  ">
         
                  <a class="" href="{{route('admin.contactus.index')}}">
                      <span class="cart-span font-10 fb-700">{{Modules\Admin\Http\Controllers\Admin\ContactUsController::getCountContactUs()}}</span>
                      <span class="    "> <i class="fa fa-envelope-open-o color-greyish-brown" aria-hidden="true"></i></span>
                  </a>
              </li>
            @endcan
        
  
              {{-- <li class="nav-item d-md-down-none  ">
                  @php
                    $NotLocale = $locale == 'ar' ? 'en' : 'ar';
                  @endphp
                  <a class="nav-link"
                  href="{{ str_replace(env('REDIRECT') .'/'. $locale, env('REDIRECT') .'/'. $NotLocale , url()->full()) }}">
                    <i class="icon-globe"></i>
                    {{ __('admin::lang.'. $NotLocale . '-inverse' ) }}
                  </a>
              </li> --}}

              <li class="nav-item dropdown  ">
                <a class="nav-link px-2" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-globe"></i>  </a>
                <div class="dropdown-menu {{ $dropdown2  }}">

                  @foreach ($langs as $lang)
                    <a class="dropdown-item" href="{{ str_replace(env('REDIRECT') .'/'. $locale, env('REDIRECT') .'/'. $lang->locale , url()->full()) }}">
                      {{ __('admin::lang.'. $lang->locale) }}
                    </a>
                  @endforeach
                </div>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link px-2" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  <i class="nav-icon icon-user"></i>
                </a>
                <div class="dropdown-menu {{ $dropdown2 }}">
                  <div class="dropdown-header text-center">
                    <strong>{{ auth()->user()->name }}</strong>
                  </div>
                  <a class="dropdown-item" href="{{ route('admin.admins.show', auth()->id()) }}">
                    <i class="fa fa-user"></i> {{ __('admin::lang.profile') }}</a>
                  <a class="dropdown-item" href="{{ route('admin.auth.logout') }}">
                    <i class="fa fa-lock"></i> {{ __('admin::lang.logout') }}</a>
                </div>
              </li>
            </ul>
          </div>

   </div>


  {{-- URLs --}}



</header>
