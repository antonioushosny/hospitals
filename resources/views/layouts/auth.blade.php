<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.12
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
@php
if(!session('type') ){
    session(['type' => 'client']) ;
}
if(session('device_token')){
    setcookie("device_token", session('device_token'), time()+3600);
}
$device_token = isset($_COOKIE["device_token"]) ?  $_COOKIE["device_token"] : ''  ;
$pageType = session('pageType');
$products_id = session('products_id');

@endphp
<html dir="{{ $dir }}" lang="{{ $locale }}" class="{{ $dir == 'rtl' ? 'fa-dir-flip' : '' }}">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <link rel="icon" href="{{ asset('backend/img/logo.jpeg') }}" type="image/png" sizes="16x16">
    @yield('metatag')
    <!-- Icons-->
    <link href="{{ asset('backend/vendors/@coreui/icons/css/coreui-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/pace-progress/css/pace.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendors/select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/custom.css') }}">

    @if($dir == 'rtl')
        {{-- RTL Styles --}}
        <link rel="stylesheet" href="{{ asset('front/css/custom-rtl.css') }}">
    @endif
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
   
  </head>
  <body class="app flex-row align-items-center">
    @if(getSettingByKey('website_status') == '1')
    <div class="container">
        @yield('content')
    </div>
    @else
    @include('includes.504')
    @endif
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('backend/vendors/jquery/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/popper.js/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/pace-progress/js/pace.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/@coreui/coreui/js/coreui.min.js') }}"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('vendors/select2/js/select2.min.js') }}"></script>

    @include('includes.scripts')
    @yield('script')
  </body>
</html>
