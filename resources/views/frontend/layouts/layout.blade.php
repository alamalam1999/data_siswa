<!DOCTYPE html>
@langrtl
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <title>@yield('title', app_name())</title>
    <meta name="description" content="@yield('meta_description', 'Sekolah Avicenna - Penerimaan Peserta Didik Baru')">
    <meta name="author" content="@yield('meta_author', '@nurilumam')">
    @yield('meta')



    {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
    @stack('before-styles')

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    <!-- {{ style(mix('css/frontend.css')) }} -->

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="https://sekolah-avicenna.sch.id/images/favicon.ico" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/flaticon-set.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/elegant-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/bootsnav.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="{{ asset('frontend/js/html5/html5shiv.min.js') }}"></script>
        <script src="{{ asset('frontend/js/html5/respond.min.js') }}"></script>
        <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/timeline.css') }}">
    <style type="text/css">
        .content-wrapper {
            background: #ffffff;
        }
    </style>

    @stack('after-styles')
</head>

<body>
    @include('includes.partials.read-only')

    <div class="wrapper">
        <!-- Preloader Start -->
        <div class="se-pre-con"></div>
        <!-- Preloader Ends -->

        <!-- Start Header Top ============================================= -->
        @include('includes.partials.logged-in-as')
        @include('frontend.includes.nav')
        <!-- End Header Top -->


        @yield('content')



        <!-- Start Footer 
    ============================================= -->
        
        <!-- End Footer -->
    </div>



    <!-- Scripts -->
    @stack('before-scripts')
    <!-- jQuery Frameworks
        ============================================= -->
    <script src="{{ asset('frontend/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/equal-height.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/modernizr.custom.13711.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/count-to.js') }}"></script>
    <script src="{{ asset('frontend/js/loopcounter.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/loopcounter.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootsnav.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    @stack('after-scripts')
    @section('scripts')

    <!-- @include('includes.partials.ga') -->
</body>

</html>