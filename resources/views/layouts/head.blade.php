<!-- Title -->
<title>@yield('title')</title>

<!-- Favicon -->
<link rel="icon" href="{{ URL::asset('assets/img/brand/favicon.png') }}" type="image/x-icon" />

<!-- Icons css -->
<link href="{{ URL::asset('assets/css/icons.css') }}" rel="stylesheet">

<!-- Bootstrap css -->
<link href="{{ URL::asset('assets/plugins/bootstrap/css/bootstrap.rtl.min.css') }}" rel="stylesheet">

<!--  Owl-carousel css-->
<link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />

<!-- P-scroll bar css-->
<link href="{{ URL::asset('assets/plugins/perfect-scrollbar/p-scrollbar.css') }}" rel="stylesheet" />

<!--  Right-sidemenu css -->
<link href="{{ URL::asset('assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

<!-- Sidemenu css -->
<link rel="stylesheet" href="{{ URL::asset('assets/css-rtl/sidemenu.css') }}">

<!-- Maps css -->
<link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">

<!-- style css -->
<link href="{{ URL::asset('assets/css-rtl/style.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css-rtl/boxed.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css-rtl/dark-boxed.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css-rtl/style-dark.css') }}" rel="stylesheet">

<!---Skinmodes css-->
<link href="{{ URL::asset('assets/css-rtl/skin-modes.css') }}" rel="stylesheet" />

@yield('css')
