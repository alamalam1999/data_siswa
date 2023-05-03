@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
<div class="row g-5 g-xl-10">
	<!--begin::Col-->
	<div class="col-xl-4 mb-xl-10">
		<!--begin::Lists Widget 19-->
		<div class="card h-xl-100">
			<!--begin::Heading-->
			<div class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-250px" style="background-image:url('{{ asset('assets/media/logos/img-avicenna-jagakarsa-dashboard.jpg') }}')">
				<!--begin::Title-->
				<h3 class="card-title align-items-start flex-column text-white pt-20 d-none">
					<span class="fw-bolder fs-2x mb-3">Hello, {{ Auth::user()->name }}</span>
				</h3>
				<!--end::Title-->
				<!--begin::Toolbar-->
				<div class="card-toolbar pt-5 d-none">
					<!--begin::Menu-->
					<button class="btn btn-sm btn-icon btn-active-color-primary btn-color-white bg-white bg-opacity-25 bg-hover-opacity-100 bg-hover-white bg-active-opacity-25 w-20px h-20px" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
						<!--begin::Svg Icon | path: icons/duotune/general/gen052.svg-->
						<span class="svg-icon svg-icon-4">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect x="10" y="10" width="4" height="4" rx="2" fill="black"></rect>
								<rect x="17" y="10" width="4" height="4" rx="2" fill="black"></rect>
								<rect x="3" y="10" width="4" height="4" rx="2" fill="black"></rect>
							</svg>
						</span>
						<!--end::Svg Icon-->
					</button>
					<!--end::Menu-->
				</div>
				<!--end::Toolbar-->
			</div>
			<!--end::Heading-->
			<!--begin::Body-->
			<div class="card-body mt-n20">
				<!--begin::Stats-->
				<div class="mt-n20 position-relative">
					<!--begin::Row-->
					<div class="row g-3 g-lg-6">
						<!--begin::Col-->
						<div class="col-6">
							<!--begin::Items-->
							<div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
								<!--begin::Symbol-->
								<div class="symbol symbol-30px me-5 mb-8">
									<span class="symbol-label">
										<!--begin::Svg Icon | path: icons/duotune/medicine/med005.svg-->
										<span class="svg-icon svg-icon-1 svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="black" />
												<rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="black" />
												<path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="black" />
												<rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->
									</span>
								</div>
								<!--end::Symbol-->
								<!--begin::Stats-->
								<div class="m-0">
									<!--begin::Number-->
									<span class="text-gray-700 fw-boldest d-block fs-2qx lh-1 ls-n1 mb-1">{{ $ppdb->count() }}</span>
									<!--end::Number-->
									<!--begin::Desc-->
									<span class="text-gray-500 fw-bold fs-6">Peserta Baru</span>
									<!--end::Desc-->
								</div> 
								<!--end::Stats-->
							</div>
							<!--end::Items-->
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-6">
							<!--begin::Items-->
							<div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
								<!--begin::Symbol-->
								<div class="symbol symbol-30px me-5 mb-8">
									<span class="symbol-label">
										<!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->
										<span class="svg-icon svg-icon-1 svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z" fill="black"></path>
												<path opacity="0.3" d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z" fill="black"></path>
											</svg>
										</span>
										<!--end::Svg Icon-->
									</span>
								</div>
								<!--end::Symbol-->
								<!--begin::Stats-->
								<div class="m-0">
									<!--begin::Number-->
									<span class="text-gray-700 fw-boldest d-block fs-2qx lh-1 ls-n1 mb-1">{{ $confirmation->count() }}</span>
									<!--end::Number-->
									<!--begin::Desc-->
									<span class="text-gray-500 fw-bold fs-6">Konfirmasi</span>
									<!--end::Desc-->
								</div>
								<!--end::Stats-->
							</div>
							<!--end::Items-->
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-6">
							<!--begin::Items-->
							<div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
								<!--begin::Symbol-->
								<div class="symbol symbol-30px me-5 mb-2">
									<span class="symbol-label">
										<!--begin::Svg Icon | path: icons/duotune/general/gen020.svg-->
										<span class="svg-icon svg-icon-1 svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M14 18V16H10V18L9 20H15L14 18Z" fill="black"></path>
												<path opacity="0.3" d="M20 4H17V3C17 2.4 16.6 2 16 2H8C7.4 2 7 2.4 7 3V4H4C3.4 4 3 4.4 3 5V9C3 11.2 4.8 13 7 13C8.2 14.2 8.8 14.8 10 16H14C15.2 14.8 15.8 14.2 17 13C19.2 13 21 11.2 21 9V5C21 4.4 20.6 4 20 4ZM5 9V6H7V11C5.9 11 5 10.1 5 9ZM19 9C19 10.1 18.1 11 17 11V6H19V9ZM17 21V22H7V21C7 20.4 7.4 20 8 20H16C16.6 20 17 20.4 17 21ZM10 9C9.4 9 9 8.6 9 8V5C9 4.4 9.4 4 10 4C10.6 4 11 4.4 11 5V8C11 8.6 10.6 9 10 9ZM10 13C9.4 13 9 12.6 9 12V11C9 10.4 9.4 10 10 10C10.6 10 11 10.4 11 11V12C11 12.6 10.6 13 10 13Z" fill="black"></path>
											</svg>
										</span>
										<!--end::Svg Icon-->
									</span>
								</div>
								<!--end::Symbol-->
								<!--begin::Stats-->
								<div class="m-0">
									<!--begin::Number-->
									<span class="text-gray-700 fw-boldest d-block fs-2qx lh-1 ls-n1 mb-1">{{ $confirmation_waiting->count() }}</span>
									<!--end::Number-->
									<!--begin::Desc-->
									<span class="text-gray-500 fw-bold fs-6">Menunggu Konfirmasi</span>
									<!--end::Desc-->
								</div>
								<!--end::Stats-->
							</div>
							<!--end::Items-->
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-6">
							<!--begin::Items-->
							<div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 pe-2">
								<!--begin::Symbol-->
								<div class="symbol symbol-30px me-5 mb-2">
									<span class="symbol-label">
										<!--begin::Svg Icon | path: icons/duotune/general/gen013.svg-->
										<span class="svg-icon svg-icon-1 svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path opacity="0.3" d="M20.9 12.9C20.3 12.9 19.9 12.5 19.9 11.9C19.9 11.3 20.3 10.9 20.9 10.9H21.8C21.3 6.2 17.6 2.4 12.9 2V2.9C12.9 3.5 12.5 3.9 11.9 3.9C11.3 3.9 10.9 3.5 10.9 2.9V2C6.19999 2.5 2.4 6.2 2 10.9H2.89999C3.49999 10.9 3.89999 11.3 3.89999 11.9C3.89999 12.5 3.49999 12.9 2.89999 12.9H2C2.5 17.6 6.19999 21.4 10.9 21.8V20.9C10.9 20.3 11.3 19.9 11.9 19.9C12.5 19.9 12.9 20.3 12.9 20.9V21.8C17.6 21.3 21.4 17.6 21.8 12.9H20.9Z" fill="black"></path>
												<path d="M16.9 10.9H13.6C13.4 10.6 13.2 10.4 12.9 10.2V5.90002C12.9 5.30002 12.5 4.90002 11.9 4.90002C11.3 4.90002 10.9 5.30002 10.9 5.90002V10.2C10.6 10.4 10.4 10.6 10.2 10.9H9.89999C9.29999 10.9 8.89999 11.3 8.89999 11.9C8.89999 12.5 9.29999 12.9 9.89999 12.9H10.2C10.4 13.2 10.6 13.4 10.9 13.6V13.9C10.9 14.5 11.3 14.9 11.9 14.9C12.5 14.9 12.9 14.5 12.9 13.9V13.6C13.2 13.4 13.4 13.2 13.6 12.9H16.9C17.5 12.9 17.9 12.5 17.9 11.9C17.9 11.3 17.5 10.9 16.9 10.9Z" fill="black"></path>
											</svg>
										</span>
										<!--end::Svg Icon-->
									</span>
								</div>
								<!--end::Symbol-->
								<!--begin::Stats-->
								<div class="m-0">
									<!--begin::Number-->
									<span class="text-gray-700 fw-boldest d-block fs-2qx lh-1 ls-n1 mb-1">{{ $data_not_done->count() }}</span>
									<!--end::Number-->
									<!--begin::Desc-->
									<span class="text-gray-500 fw-bold fs-6">Menunggu Kelekapan Data</span>
									<!--end::Desc-->
								</div>
								<!--end::Stats-->
							</div>
							<!--end::Items-->
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
				</div>
				<!--end::Stats-->
			</div>
			<!--end::Body-->
		</div>
		<!--end::Lists Widget 19-->
	</div>
	<!--end::Col-->
	<!--begin::Col-->
	<div class="col-xl-8 mb-5 mb-xl-10">
		<!--begin::Row-->
		<div class="row g-5 g-xl-10">
			<!--begin::Col-->
			<div class="col-xl-6 mb-xl-10">
				<!--begin::Slider Widget 1-->
				<div id="kt_sliders_widget_1_slider" class="card card-flush carousel carousel-custom carousel-stretch slide h-xl-100 pointer-event" data-bs-ride="carousel" data-bs-interval="5000">
					<!--begin::Header-->
					<div class="card-header pt-5">
						<!--begin::Title-->
						<h4 class="card-title d-flex align-items-start flex-column">
							<span class="card-label fw-bolder text-gray-800">Statistic Bulan Ini</span>
							<span class="text-gray-400 mt-1 fw-bolder fs-7">{{ $date_month_dh }}</span>
						</h4>
						<!--end::Title-->
						<!--begin::Toolbar-->
						<div class="card-toolbar">
							<!--begin::Carousel Indicators-->
							<ol class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-primary">
								<li data-bs-target="#kt_sliders_widget_1_slider" data-bs-slide-to="0" class="ms-1"></li>
								<li data-bs-target="#kt_sliders_widget_1_slider" data-bs-slide-to="1" class="ms-1"></li>
								<li data-bs-target="#kt_sliders_widget_1_slider" data-bs-slide-to="2" class="ms-1 active" aria-current="true"></li>
							</ol>
							<!--end::Carousel Indicators-->
						</div>
						<!--end::Toolbar-->
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body pt-6">
						<!--begin::Carousel-->
						<div class="carousel-inner mt-n5">
							<!--begin::Item-->
							<div class="carousel-item show">
								<h1>Jagakarsa</h1>
								<!--begin::Wrapper-->
								<div class="align-items-center mb-7">
									<!--begin::Chart-->
									<div id="chart3">					
									</div>
									<?php 
											$arr=[$month_ppdb_jgk->count(), $conf_month_ppdb_jgk->count(), $conf_bef_month_ppdb_jgk->count(), $student_month_ppdb_jgk->count()];
										?>
									<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>					
									<script>
										var dataArray = [<?php echo join(',',$arr); ?>]
											var month_ppdb_jgk 		= <?php echo $month_ppdb_jgk->count(); ?>;
											var conf_month_ppdb_jgk = <?php echo $conf_month_ppdb_jgk->count(); ?>;
											var conf_bef_month_ppdb_jgk = <?php echo $conf_bef_month_ppdb_jgk->count(); ?>;
											var student_month_ppdb_jgk = <?php echo $student_month_ppdb_jgk->count(); ?>;
										
										var options = {
												series: dataArray,
													chart: {
													type: 'donut',
													},
													labels: ['Pendaftar '+month_ppdb_jgk, 'Konfirmasi '+conf_month_ppdb_jgk, 'Belum Konfirmasi '+conf_bef_month_ppdb_jgk, 'Student '+student_month_ppdb_jgk],
													responsive: [{
													breakpoint: 480,
													options: {
														chart: {
														width: 200
														},
														legend: {
														position: 'bottom'
														}
													}
												}]
											};
											var chart = new ApexCharts(document.querySelector("#chart3"), options);
											chart.render();
									</script>
									<!--end::Chart-->
									<!--begin::Info-->
									
									<!--end::Info-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Action-->
								<div class="mb-1">
									<a href="#" class="btn btn-sm btn-light me-2">Lihat Data</a>
									<a href="#" class="btn btn-sm btn-primary d-none" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Continue</a>
								</div>
								<!--end::Action-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="carousel-item">
								<h1>Cinere</h1>
								<!--begin::Wrapper-->
								<div class="align-items-center mb-7">
									<!--begin::Chart-->
									<div id="chart2">					
									</div>
									<?php 
											$arr=[$month_ppdb_cnr->count(), $conf_month_ppdb_cnr->count(), $conf_bef_month_ppdb_cnr->count(), $student_month_ppdb_cnr->count()];
										?>
									<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>					
									<script>
										var dataArray = [<?php echo join(',',$arr); ?>]
											var month_ppdb_cnr 		= <?php echo $month_ppdb_cnr->count(); ?>;
											var conf_month_ppdb_cnr = <?php echo $conf_month_ppdb_cnr->count(); ?>;
											var conf_bef_month_ppdb_cnr = <?php echo $conf_bef_month_ppdb_cnr->count(); ?>;
											var student_month_ppdb_cnr = <?php echo $student_month_ppdb_cnr->count(); ?>;
								
										var options = {
												series: dataArray,
													chart: {
													type: 'donut',
													},
													labels: ['Pendaftar '+month_ppdb_cnr, 'Konfirmasi '+conf_month_ppdb_cnr, 'Belum Konfirmasi '+conf_bef_month_ppdb_cnr, 'Student '+student_month_ppdb_cnr],
													responsive: [{
													breakpoint: 480,
													options: {
														chart: {
														width: 200
														},
														legend: {
														position: 'bottom'
														}
													}
												}]
											};
											var chart = new ApexCharts(document.querySelector("#chart2"), options);
											chart.render();
									</script>
									<!--end::Chart-->
									<!--begin::Info-->
									
									<!--end::Info-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Action-->
								<div class="mb-1">
									<a href="#" class="btn btn-sm btn-light me-2">Skip This</a>
									<a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Continue</a>
								</div>
								<!--end::Action-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="carousel-item active">
								<h1>Pamulang</h1>
								<!--begin::Wrapper-->
								<div class="align-items-center mb-7">
									<!--begin::Chart-->
									<div id="chart">					
									</div>
									<?php 
											$arr=[$month_ppdb_pml->count(), $conf_month_ppdb_pml->count(), $conf_bef_month_ppdb_pml->count(), $student_month_ppdb_pml->count()];
										?>
									<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>					
									<script>
										var dataArray = [<?php echo join(',',$arr); ?>]
											var month_ppdb_pml 		= <?php echo $month_ppdb_pml->count(); ?>;
											var conf_month_ppdb_pml = <?php echo $conf_month_ppdb_pml->count(); ?>;
											var conf_bef_month_ppdb_pml = <?php echo $conf_bef_month_ppdb_pml->count(); ?>;
											var student_month_ppdb_pml = <?php echo $student_month_ppdb_pml->count(); ?>;
													
										var options = {
												series: dataArray,
													chart: {
													type: 'donut',
													},
													labels: ['Pendaftar '+month_ppdb_pml, 'Konfirmasi '+conf_month_ppdb_pml, 'Belum Konfirmasi '+conf_bef_month_ppdb_pml, 'Student '+student_month_ppdb_pml],
													responsive: [{
													breakpoint: 480,
													options: {
														chart: {
														width: 200
														},
														legend: {
														position: 'bottom'
														}
													}
												}]
											};
											var chart = new ApexCharts(document.querySelector("#chart"), options);
											chart.render();
									</script>
									<!--end::Chart-->
									<!--begin::Info-->
									
									<!--end::Info-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Action-->
								<div class="mb-1">
									<a href="#" class="btn btn-sm btn-light me-2">Skip This</a>
									<a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Continue</a>
								</div>
								<!--end::Action-->
							</div>
							<!--end::Item-->
						</div>
						<!--end::Carousel-->
					</div>
					<!--end::Body-->
				</div>
				<!--end::Slider Widget 1-->
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-xl-6 mb-xl-10">
				<!--begin::Slider Widget 1-->
				<div id="kt_sliders_widget_1_slider" class="card card-flush carousel carousel-custom carousel-stretch slide h-xl-100 pointer-event" data-bs-ride="carousel" data-bs-interval="5000">
					<!--begin::Header-->
					<div class="card-header pt-5">
						<!--begin::Title-->
						<h4 class="card-title d-flex align-items-start flex-column">
							<span class="card-label fw-bolder text-gray-800">Statistic Tahun Ini</span>
							<span class="text-gray-400 mt-1 fw-bolder fs-7">{{ $years_now }}</span>
						</h4>
						<!--end::Title-->
						<!--begin::Toolbar-->
						<div class="card-toolbar">
							<!--begin::Carousel Indicators-->
							<ol class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-primary">
								<li data-bs-target="#kt_sliders_widget_1_slider" data-bs-slide-to="0" class="ms-1"></li>
								<li data-bs-target="#kt_sliders_widget_1_slider" data-bs-slide-to="1" class="ms-1"></li>
								<li data-bs-target="#kt_sliders_widget_1_slider" data-bs-slide-to="2" class="ms-1 active" aria-current="true"></li>
							</ol>
							<!--end::Carousel Indicators-->
						</div>
						<!--end::Toolbar-->
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body pt-6">
						<!--begin::Carousel-->
						<div class="carousel-inner mt-n5">
							<!--begin::Item-->
							<div class="carousel-item show">
								<h1>Cinere</h1>
								<!--begin::Wrapper-->
								<div class="align-items-center mb-5">
									<!--begin::Chart-->
									<div id="chart6">					
									</div>
									<?php 
											$arr=[$year_ppdb_cnr->count(), $conf_year_ppdb_cnr->count(), $conf_bef_year_ppdb_cnr->count(), $student_year_ppdb_cnr->count()];
										?>
									<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>					
									<script>
										var dataArray = [<?php echo join(',',$arr); ?>]
											var year_ppdb_cnr 		= <?php echo $year_ppdb_cnr->count(); ?>;
											var conf_year_ppdb_cnr = <?php echo $conf_year_ppdb_cnr->count(); ?>;
											var conf_bef_year_ppdb_cnr = <?php echo $conf_bef_year_ppdb_cnr->count(); ?>;
											var student_year_ppdb_cnr = <?php echo $student_year_ppdb_cnr->count(); ?>;
													
										var options = {
												series: dataArray,
													chart: {
													type: 'donut',
													},
													labels: ['Pendaftar '+year_ppdb_cnr, 'Konfirmasi '+conf_year_ppdb_cnr, 'Belum Konfirmasi '+conf_bef_year_ppdb_cnr, 'Student '+student_year_ppdb_cnr],
													responsive: [{
													breakpoint: 480,
													options: {
														chart: {
														width: 200
														},
														legend: {
														position: 'bottom'
														}
													}
												}]
											};
											var chart = new ApexCharts(document.querySelector("#chart6"), options);
											chart.render();
									</script>
									<!--end::Chart-->

									<!--begin::Info-->
									<!--end::Info-->

								</div>
								<!--end::Wrapper-->

								<!--begin::Action-->
								<div class="mb-1">
									<a href="#" class="btn btn-sm btn-light me-2">Lihat Data</a>
									<a href="#" class="btn btn-sm btn-primary d-none" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Continue</a>
								</div>
								<!--end::Action-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="carousel-item">
								<h1>Jagakarsa</h1>
								<!--begin::Wrapper-->
								<div class="align-items-center mb-7">
									<!--begin::Chart-->
									<div id="chart5">					
									</div>
									<?php 
											$arr=[$year_ppdb_jgk->count(), $conf_year_ppdb_jgk->count(), $conf_bef_year_ppdb_jgk->count(), $student_year_ppdb_jgk->count()];
										?>
									<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>					
									<script>
										var dataArray = [<?php echo join(',',$arr); ?>]
											var year_ppdb_jgk 		= <?php echo $year_ppdb_jgk->count(); ?>;
											var conf_year_ppdb_jgk = <?php echo $conf_year_ppdb_jgk->count(); ?>;
											var conf_bef_year_ppdb_jgk = <?php echo $conf_bef_year_ppdb_jgk->count(); ?>;
											var student_year_ppdb_jgk = <?php echo $student_year_ppdb_jgk->count(); ?>;
													
										var options = {
												series: dataArray,
													chart: {
													type: 'donut',
													},
													labels: ['Pendaftar '+year_ppdb_jgk, 'Konfirmasi '+conf_year_ppdb_jgk, 'Belum Konfirmasi '+conf_bef_year_ppdb_jgk, 'Student '+student_year_ppdb_jgk],
													responsive: [{
													breakpoint: 480,
													options: {
														chart: {
														width: 200
														},
														legend: {
														position: 'bottom'
														}
													}
												}]
											};
											var chart = new ApexCharts(document.querySelector("#chart5"), options);
											chart.render();
									</script>

									<!--end::Chart-->			
									<!--begin::Info-->

									<!--end::Info-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Action-->
								<div class="mb-1">
									<a href="#" class="btn btn-sm btn-light me-2">Skip This</a>
									<a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Continue</a>
								</div>
								<!--end::Action-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="carousel-item active">
								<h1>Pamulang</h1>
								<!--begin::Wrapper-->
								<div class="align-items-center mb-7">
									<!--begin::Chart-->
									<div id="chart4">					
									</div>
									<?php 
											$arr=[$year_ppdb_pml->count(), $conf_year_ppdb_pml->count(), $conf_bef_year_ppdb_pml->count(), $student_year_ppdb_pml->count()];
										?>
									<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>					
									<script>
										var dataArray = [<?php echo join(',',$arr); ?>]
											var year_ppdb_pml 		= <?php echo $year_ppdb_pml->count(); ?>;
											var conf_year_ppdb_pml = <?php echo $conf_year_ppdb_pml->count(); ?>;
											var conf_bef_year_ppdb_pml = <?php echo $conf_bef_year_ppdb_pml->count(); ?>;
											var student_year_ppdb_pml = <?php echo $student_year_ppdb_pml->count(); ?>;
													
										var options = {
												series: dataArray,
													chart: {
													type: 'donut',
													},
													labels: ['Pendaftar '+year_ppdb_pml, 'Konfirmasi '+conf_year_ppdb_pml, 'Belum Konfirmasi '+conf_bef_year_ppdb_pml, 'Student '+student_year_ppdb_pml],
													responsive: [{
													breakpoint: 480,
													options: {
														chart: {
														width: 200
														},
														legend: {
														position: 'bottom'
														}
													}
												}]
											};
											var chart = new ApexCharts(document.querySelector("#chart4"), options);
											chart.render();
									</script>
									
									<!--end::Chart-->
									<!--begin::Info-->
									
									<!--end::Info-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Action-->
								<div class="mb-1">
									<a href="#" class="btn btn-sm btn-light me-2">Skip This</a>
									<a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Continue</a>
								</div>
								<!--end::Action-->
							</div>
							<!--end::Item-->
						</div>
						<!--end::Carousel-->
					</div>
					<!--end::Body-->
				</div>
				<!--end::Slider Widget 1-->
			</div>
			<!--end::Col-->
		</div>
		<!--end::Row-->

		<!--begin::Engage widget 4-->
		<div class="card" style="background: #1C325E;">
			<!--begin::Body-->
			<div class="card-body d-flex ps-xl-15">
				<!--begin::Action-->
				<div class="m-0">
					<!--begin::Title-->
					<div class="position-relative fs-2x z-index-2 fw-bolder text-white mb-7">
						<span class="me-2">Saat ini sedang berlangsung Penerimaan Peserta Didik Baru
							<span class="position-relative d-inline-block text-danger">
								<a href="#" class="text-warning opacity-75-hover">Gelombang Ke 1 - 2023</a>
								<!--begin::Separator-->
								<span class="position-absolute opacity-50 bottom-0 start-0 border-4 border-danger border-bottom w-100"></span>
								<!--end::Separator-->
							</span></span>.
					</div>
					<!--end::Title-->
					<!--begin::Action-->
					<div class="mb-3">
						<a href="#" class="btn btn-primary fw-bold me-2">Lihat Peserta</a>
					</div>
					<!--begin::Action-->
				</div>
				<!--begin::Action-->
				<!--begin::Illustration-->
				<img src="{{ asset('assets/media/illustrations/sigma-1/17-dark.png') }}" class="position-absolute me-3 bottom-0 end-0 h-200px" alt="">
				<!--end::Illustration-->
			</div>
			<!--end::Body-->
		</div>
		

				

						
		<!--end::Engage widget 4-->
	</div>
	<!--end::Col-->
</div>
@endsection
