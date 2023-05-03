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

    
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}?v=1.0.0" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}?v=1.0.0" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    @stack('after-styles')
</head>

	<!--begin::Body-->
	<body data-kt-name="metronic" id="kt_body" class="app-blank app-blank">
		<!--begin::Theme mode setup on page load-->
		<script>
			if ( document.documentElement ) { const defaultThemeMode = "system"; const name = document.body.getAttribute("data-kt-name"); let themeMode = localStorage.getItem("kt_" + ( name !== null ? name + "_" : "" ) + "theme_mode_value"); if ( themeMode === null ) { if ( defaultThemeMode === "system" ) { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } else { themeMode = defaultThemeMode; } } document.documentElement.setAttribute("data-theme", themeMode); }
		</script>

		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                    @yield('content')
				</div>
				<!--end::Body-->
				<!--begin::Aside-->
				<div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url({{ asset('assets/media/misc/auth-bg.png') }})">
					<!--begin::Content-->
					<div class="d-flex flex-column flex-center py-15 px-5 px-md-15 w-100">
						<!--begin::Logo-->
						<a href="{{ route('frontend.index') }}">
							<img alt="Logo" src="{{ asset('assets/media/logos/logo-avicenna-ppdb.png') }}" class="h-50px" width="226" height="50" />
						</a>
						<!--end::Logo-->				
					</div>
					<!--end::Content-->
				</div>
				<!--end::Aside-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->

		
		<!--begin::Javascript-->
		<script>var hostUrl = "{{ asset('assets/') }}";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->

</html>