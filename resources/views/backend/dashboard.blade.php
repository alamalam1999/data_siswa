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
								<div class="symbol symbol-30px me-5 mb-3">
									<span class="symbol-label">
										<!--begin::Svg Icon | path: icons/duotune/medicine/med005.svg-->
										<span class="svg-icon svg-icon-1 svg-icon-info">
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
									<span class="text-red-500 fw-bold fs-7">Total Siswa Avicenna</span>
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
								<div class="symbol symbol-30px me-5 mb-3">
									<span class="symbol-label">
										<!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->
										<span class="svg-icon svg-icon-1 svg-icon-info">
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
									<span class="text-gray-700 fw-boldest d-block fs-2qx lh-1 ls-n1 mb-1">{{ $confirmation->count() }}</span>
									<!--end::Number-->
									<!--begin::Desc-->
									<span class="text-gray-500 fw-bold fs-7">Avicenna Jagakarsa</span>
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
								<div class="symbol symbol-30px me-5 mb-3">
									<span class="symbol-label">
										<!--begin::Svg Icon | path: icons/duotune/general/gen020.svg-->
										<span class="svg-icon svg-icon-1 svg-icon-info">
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
									<span class="text-gray-700 fw-boldest d-block fs-2qx lh-1 ls-n1 mb-1">{{ $confirmation_waiting->count() }}</span>
									<!--end::Number-->
									<!--begin::Desc-->
									<span class="text-gray-500 fw-bold fs-6">Avicenna Cinere</span>
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
								<div class="symbol symbol-30px me-5 mb-3">
									<span class="symbol-label">
										<!--begin::Svg Icon | path: icons/duotune/general/gen013.svg-->
										<span class="svg-icon svg-icon-1 svg-icon-info">
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
									<span class="text-gray-700 fw-boldest d-block fs-2qx lh-1 ls-n1 mb-1">{{ $data_not_done->count() }}</span>
									<!--end::Number-->
									<!--begin::Desc-->
									<span class="text-gray-500 fw-bold fs-7">Avicenna Pamulang</span>
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
							<span class="card-label fw-bolder text-gray-800">Total Siswa Avicenna</span>
							<span class="text-gray-400 mt-1 fw-bolder fs-7"></span>
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


							<!--begin::Item-->
							<div class="carousel-item active">
								<h1></h1>
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
											var student_month_ppdb_pml = <?php echo $student_month_ppdb_pml->count(); ?>;
													
										var options = {
												series: dataArray,
													chart: {
													type: 'donut',
													},
													labels: ['KB Avicenna '+month_ppdb_pml, 'TK Avicenna '+conf_month_ppdb_pml, 'SD Avicenna '+conf_bef_month_ppdb_pml, 'SMP Avicenna '+student_month_ppdb_pml, 'SMA Avicenna '+student_month_ppdb_pml],
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
							<span class="card-label fw-bolder text-gray-800">Avicenna Jagakarsa</span>
							<span class="text-gray-400 mt-1 fw-bolder fs-7"></span>
						<h4></h4>
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
						<div class="carousel-inner mt-5">
							
							
							<!--begin::Item-->
							<div class="carousel-item active">
								<h1></h1>
								<!--begin::Wrapper-->
								<div class="align-items-center mb-10">
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
													labels: ['TK Jagakarsa : '+year_ppdb_pml, 'SD Jagakarsa : '+conf_year_ppdb_pml, 'SMP Jagakarsa : '+conf_bef_year_ppdb_pml, 'SMA Jagakarsa : '+student_year_ppdb_pml],
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
									<a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Lihat Data</a>
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
	</div>	
	<!--end::Engage widget 4-->
 </div>
<!--end::Col-->

	
</div>
@endsection


