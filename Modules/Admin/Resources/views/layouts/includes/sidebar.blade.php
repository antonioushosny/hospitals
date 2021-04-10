
<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">

      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard.home') }}">
          <i class="nav-icon icon-home"></i> {{ __('admin::lang.home') }}
        </a>
      </li>
 
      
      {{-- About Company Links --}}
      @canany(['view infos'])

        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#">
            <i class="nav-icon fa fa-arrow-circle-down"></i> {{ __('admin::lang.aboutProject') }}</a>
          <ul class="nav-dropdown-items">

            {{-- Infos Link --}}
            @can('view infos')
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.infos.show', [1, 'activeLocale' => $locale]) }}">
                  {{ __('admin::lang.infos') }}</a>
              </li>
            @endcan

         

            {{-- Infos Link --}}
            @can('view infos')
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.infos.show', [2, 'activeLocale' => $locale]) }}">
                  {{ __('admin::lang.privacyPolicy') }}</a>
              </li>
            @endcan

            {{-- Infos Link --}}
            @can('view infos')
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.infos.show', [3, 'activeLocale' => $locale]) }}">
                  {{ __('admin::lang.termsConditions') }}</a>
              </li>
            @endcan
 
          </ul>
        </li>
      @endcanany
  
     
      {{-- advertisements Link --}}
      @canany(['view advertisements'])
        <li class="nav-item">
            @can('view advertisements')
              <a class="nav-link" href="{{ route('admin.advertisements.index') }}" >
                <i class="nav-icon fa fa-list"></i> {{ __('admin::lang.advertisements') }}
              </a>
            @endcan
        </li>
      @endcanany

      {{-- news Link --}}
      @canany(['view news'])
        <li class="nav-item">
            @can('view news')
              <a class="nav-link" href="{{ route('admin.news.index') }}" >
                <i class="nav-icon fa fa-list"></i> {{ __('admin::lang.news') }}
              </a>
            @endcan
        </li>
      @endcanany

      {{-- countries Link --}}
      @canany(['view countries'])
        <li class="nav-item">
            @can('view countries')
              <a class="nav-link" href="{{ route('admin.countries.index') }}" >
                <i class="nav-icon fa fa-list"></i> {{ __('admin::lang.countries') }}
              </a>
            @endcan
        </li>
      @endcanany
      
      {{-- hospitals Link --}}
      @canany(['view hospitals'])
        <li class="nav-item">
            @can('view hospitals')
              <a class="nav-link" href="{{ route('admin.hospitals.index') }}" >
                <i class="nav-icon fa fa-list"></i> {{ __('admin::lang.hospitals') }}
              </a>
            @endcan
        </li>
      @endcanany
      
      {{-- specialties Link --}}
      @canany(['view specialties'])
        <li class="nav-item">
            @can('view specialties')
              <a class="nav-link" href="{{ route('admin.specialties.index') }}" >
                <i class="nav-icon fa fa-list"></i> {{ __('admin::lang.specialties') }}
              </a>
            @endcan
        </li>
      @endcanany

      {{-- departments Link --}}
      @canany(['view departments'])
        <li class="nav-item">
            @can('view departments')
              <a class="nav-link" href="{{ route('admin.departments.index') }}" >
                <i class="nav-icon fa fa-list"></i> {{ __('admin::lang.departments') }}
              </a>
            @endcan
        </li>
      @endcanany

      {{-- doctors Link --}}
      @canany(['view doctors'])
        <li class="nav-item">
            @can('view doctors')
              <a class="nav-link" href="{{ route('admin.doctors.index') }}" >
                <i class="nav-icon fa fa-list"></i> {{ __('admin::lang.doctors') }}
              </a>
            @endcan
        </li>
      @endcanany
      {{-- diseases Link --}}
      @canany(['view diseases'])
        <li class="nav-item">
            @can('view diseases')
              <a class="nav-link" href="{{ route('admin.diseases.index') }}" >
                <i class="nav-icon fa fa-list"></i> {{ __('admin::lang.diseases') }}
              </a>
            @endcan
        </li>
      @endcanany

      {{-- clients Link --}}
      @canany(['view clients'])
        <li class="nav-item">
            @can('view clients')
              <a class="nav-link" href="{{ route('admin.clients.index') }}" >
                <i class="nav-icon fa fa-list"></i> {{ __('admin::lang.clients') }}
              </a>
            @endcan
        </li>
      @endcanany

      {{-- orders Link --}}
      @canany(['view orders'])
        <li class="nav-item">
            @can('view orders')
              <a class="nav-link" href="{{ route('admin.orders.index') }}" >
                <i class="nav-icon fa fa-list"></i> {{ __('admin::lang.orders') }}
              </a>
            @endcan
        </li>
      @endcanany

      
      {{-- Admins Links --}}
      @canany(['view admins', 'view roles'])
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#">
            <i class="nav-icon icon-people"></i> {{ __('admin::lang.users') }}</a>
          <ul class="nav-dropdown-items">

            @can('view admins')
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.admins.index') }}">
                  <i class="nav-icon icon-people"></i> {{ __('admin::lang.admins') }}</a>
              </li>
            @endcan
            @can('view roles')
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.roles.index') }}">
                  <i class="nav-icon fa fa-user-plus"></i> {{ __('admin::lang.permissions') }}</a>
              </li>
            @endcan
          </ul>
        </li>
      @endcanany
      
      {{-- MetaTags Link --}}
      @canany(['view metatags'])
        <li class="nav-item">
            @can('view metatags')
              <a class="nav-link" href="{{ route('admin.metatags.index') }}" >
                <i class="nav-icon fa fa-globe"></i> {{ __('admin::lang.metatagsLink') }}
              </a>
            @endcan
        </li>
      @endcanany

      {{-- MetaTags Link --}}
      @canany(['view settings'])
        <li class="nav-item">
            @can('view settings')
              <a class="nav-link" href="{{ route('admin.settings.index') }}" >
                <i class="nav-icon fa fa-cogs"></i> {{ __('admin::lang.settings') }}
              </a>
            @endcan
        </li>
      @endcanany

      
       
    </ul>
  </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
