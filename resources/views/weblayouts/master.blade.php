<!DOCTYPE html>
<html lang="ar">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Include The head file here --}}
    @include('weblayouts.head')
</head>

<body>
    {{-- Include The preloader file here --}}
    @include('weblayouts.preloader')

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    {{-- Include The header file here --}}
    @include('weblayouts.header')

    <!-- main-area -->
    <main>

        {{-- This section will be change in every page --}}
        @yield('web_content')

    </main>
    <!-- main-area-end -->

    {{-- Include The footer file here --}}
    @include('weblayouts.footer')

    {{-- Include The footer-scripts  file here --}}
    @include('weblayouts.footer-scripts')

</body>

</html>
