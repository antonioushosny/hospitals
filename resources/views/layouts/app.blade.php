
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @yield('metatag')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('backend/img/logo.jpeg') }}" type="image/png" sizes="16x16">
    {{-- Styles --}}
    @if($dir == 'rtl')
        {{-- RTL Styles --}}
        <link rel="stylesheet" href="{{ asset('front/css/bootstrap-rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('front/css/bootstrap.css') }}">
    @endif
    
    <link rel="stylesheet" href="{{ asset('front/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/select2/css/select2.css') }}">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">    
    <link rel="stylesheet" href="{{ asset('front/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/sidebar.css') }}">

    @if($dir == 'rtl')
        {{-- RTL Styles --}}
        <link rel="stylesheet" href="{{ asset('front/css/sidebar-rtl.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/custom-rtl.css') }}">
    @endif
    @yield('style')
  
 </head>

<!-- class="rtl" -->
<body class="{{ $dir == 'rtl' ? 'rtl' : ''  }} p-0 m-0 ">
 
   @include('includes.header')
   @include('includes.navbar')
    <div id="overlayer"></div>
    <span class="loader">
        <span class="loader-inner"></span>
    </span>  
    

    <div class="page-wrapper chiller-theme  ">
        @include('includes.sidebar')
        <!-- sidebar-wrapper  -->
        <main class=" content-div ">
            @yield('content')
        </main>
        <!-- page-content" -->
    </div>
    <!-- page-wrapper -->

    @include('includes.footer')
  
    {{-- Scripts --}}
    <script src="{{ asset('front/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    @if($dir == 'rtl')
        {{-- RTL Scripts --}}
        <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    @else
        <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    @endif

    <script src="{{ asset('front/js/sidebar.js') }}"></script>
    <script src="{{ asset('vendors/select2/js/select2.min.js') }}"></script>
    @include('includes.scripts')
    @yield('script1')
    @yield('script2')
    @yield('script')

   
</body>
</html>
