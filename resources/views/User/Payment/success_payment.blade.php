<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Clickat</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('Web/assets/img/logo-sm.png') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ URL::asset('Web/assets/css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('Web/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('Web/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('Web/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('Web/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('Web/assets/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('Web/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('Web/assets/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('Web/assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('Web/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('Web/assets/css/default-rtl.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('Web/assets/css/progress-circle.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('Web/assets/css/style-rtl.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('Web/assets/css/responsive-rtl.css') }}">
</head>

<body>

    <section class="done">
        <img src="{{ URL::asset('Web/assets/img/icon/check.png') }}" alt="">
        <p class="text">تمت عملية الدفع بنجاح</p>
        <a href="{{ route('user.home') }}">
            <button class="btn">الرجوع للصفحة الرئيسية</button>
        </a>
    </section>

    <!-- JS here -->
    <script src="{{ URL::asset('Web/assets/js/vendor/jquery-3.5.0.min.js') }}"></script>
    <script src="{{ URL::asset('Web/assets/js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('Web/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('Web/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('Web/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('Web/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('Web/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('Web/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('Web/assets/js/jquery.odometer.min.js') }}"></script>
    <script src="{{ URL::asset('Web/assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ URL::asset('Web/assets/js/jquery.appear.js') }}"></script>
    <script src="{{ URL::asset('Web/assets/js/slick.min.js') }}"></script>
    <script src="{{ URL::asset('Web/assets/js/ajax-form.js') }}"></script>
    <script src="{{ URL::asset('Web/assets/js/wow.min.js') }}"></script>
    <script src="{{ URL::asset('Web/assets/js/aos.js') }}"></script>
    <script src="{{ URL::asset('Web/assets/js/plugins.js') }}"></script>
    <script src="{{ URL::asset('Web/assets/js/main.js') }}"></script>
</body>

</html>
