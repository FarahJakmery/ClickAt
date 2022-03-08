<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />
    {{-- Include The head file here --}}
    @include('layouts.head')
</head>

<body class="main-body app sidebar-mini">

    <!-- Loader -->
    <div id="global-loader">
        <img src="../../assets/img/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    <!-- Page -->
    <div class="page">

        {{-- Include The main-sidebar file here --}}
        @include('layouts.main-sidebar')

        <!-- main-content -->
        <div class="main-content app-content">

            {{-- Include The main-headerbar file here --}}
            @include('layouts.main-headerbar')

            <!-- container -->
            <div class="container-fluid">

                @yield('page-header')

                {{-- This section will be change in every page --}}
                @yield('content')

            </div>
            <!-- /Container -->
        </div>
        <!-- /main-content -->

        {{-- Include The sidebar-left here --}}
        @include('layouts.sidebar-left')

        {{-- Include The models file here --}}
        @include('layouts.models')

        {{-- Include The footer file here --}}
        @include('layouts.footer')

    </div>
    <!-- End Page -->

    <!-- Back-to-top -->
    <a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

    {{-- Include The footer-scripts  file here --}}
    @include('layouts.footer-scripts')

</body>

</html>
