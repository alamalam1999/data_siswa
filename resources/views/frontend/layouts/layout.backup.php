<!doctype html>
@langrtl
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl

<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge" /><![endif]-->
    <title>@yield('title', app_name())</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')

    {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
    @stack('before-styles')


    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="{{ asset('assets-fe/apple-touch-icon.png') }}">
    <link rel="icon" href="https://sekolah-avicenna.sch.id/images/favicon.ico">

    <link href="#https://fonts.googleapis.com/css?family=Lato:100,300,400,600,700,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets-fe/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-fe/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-fe/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-fe/css/odometer-theme-minimal.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-fe/css/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-fe/css/style.css') }}">

    @stack('after-styles')
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="#http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


    
<!-- Main Navigation -->
@include('frontend.includes.nav')

<main >

    @yield('content')

</main>


    <!-- Footer -->
<footer class="site-footer section bg-dark text-contrast edge top-left">
    <div class="container py-3">
        <div class="row gap-y text-center text-md-left">
            <div class="col-md-4 mr-auto">
                <img src="{{ asset('assets/media/logos/logo-avicenna-ppdb.png') }}" alt="" class="logo" width="226" height="50">

                <p>Laapp, a carefully crafted and powerful HTML5 template, it's perfect to showcase your App or Startup</p>
            </div>

            <div class="col-md-2">
                <nav class="nav flex-column">
                    <a class="nav-item py-2 text-contrast" href="##">About</a>
                    <a class="nav-item py-2 text-contrast" href="##">Services</a>
                    <a class="nav-item py-2 text-contrast" href="##">Blog</a>
                </nav>
            </div>

            <div class="col-md-2">
                <nav class="nav flex-column">
                    <a class="nav-item py-2 text-contrast" href="##">Features</a>
                    <a class="nav-item py-2 text-contrast" href="##">API</a>
                    <a class="nav-item py-2 text-contrast" href="##">Customers</a>
                </nav>
            </div>

            <div class="col-md-2">
                <nav class="nav flex-column">
                    <a class="nav-item py-2 text-contrast" href="##">Careers</a>
                    <a class="nav-item py-2 text-contrast" href="##">Contact</a>
                    <a class="nav-item py-2 text-contrast" href="##">Search</a>
                </nav>
            </div>

            <div class="col-md-2">
                <h6 class="py-2 small">Follow us</h6>

                <nav class="nav justify-content-around">
                    <a href="#https://facebook.com/5studios.net" target="_blank" class="btn btn-circle btn-sm brand-facebook"><i class="fab fa-facebook"></i></a>
                    <a href="##" class="btn btn-circle btn-sm brand-twitter"><i class="fab fa-twitter"></i></a>
                    <a href="##" class="btn btn-circle btn-sm brand-instagram"><i class="fab fa-instagram"></i></a>
                </nav>
            </div>
        </div>

        <hr class="mt-5 op-5" />
        <div class="row small">
            <div class="col-md-4">
                <p class="mt-2 mb-0 text-center text-md-left">© 2019 <a href="#https://5studios.net">5studios</a>. All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>

@stack('before-scripts')

<script src="{{ asset('assets-fe/js/jquery.js') }}"></script>
<script src="{{ asset('assets-fe/js/popper.js') }}"></script>
<script src="{{ asset('assets-fe/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets-fe/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets-fe/js/jquery.validate.js') }}"></script>
<script src="{{ asset('assets-fe/js/aos.js') }}"></script>
<script src="{{ asset('assets-fe/js/counterup2.js') }}"></script>
<script src="{{ asset('assets-fe/js/odometer.js') }}"></script>
<script src="{{ asset('assets-fe/js/swiper.js') }}"></script>
<script src="{{ asset('assets-fe/js/snap.svg.js') }}"></script>
<script src="{{ asset('assets-fe/js/tilt.jquery.js') }}"></script>
<script src="{{ asset('assets-fe/js/typed.js') }}"></script>
<script src="{{ asset('assets-fe/js/noframework.waypoints.js') }}"></script>
<script src="{{ asset('assets-fe/js/forms.js') }}"></script>
<script src="{{ asset('assets-fe/js/scrollspy.js') }}"></script>
<script src="{{ asset('assets-fe/js/site.js') }}"></script>

@stack('after-scripts')
@section('scripts')

</body>
</html>
