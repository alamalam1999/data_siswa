@extends('frontend.layouts.layout')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
<!-- Header  ============================================= -->
<header id="home">

    <!-- Start Navigation -->
    <nav class="navbar navbar-default navbar-fixed dark no-background bootsnav">

        <div class="container">

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ route('frontend.index') }}">
                    <img src="{{ asset('assets/media/logos/logo-avicenna-ppdb.png') }}" class="logo" alt="Logo" width="226" height="50">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                    <li><a href="{{ route('frontend.auth.login') }}"><i class="fa fa-user"></i> Login</a></li>
                    <li>
                        <a href="{{ route('frontend.index') }}"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li><a href="https://drive.google.com/file/d/1W8nfYoccuSYBH--Il4O8E76hzgGHPNEv/view?usp=sharing"><i class="fa fa-map"></i> Panduan Pendaftaran</a></li>
                    <li><a href="{{ route('frontend.auth.register') }}"><i class="fa fa-calendar"></i> Informasi & Jadwal </a></li>
                    <li>
                        <a href="#"><i class="fa fa-calendar"></i> contact</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>

    </nav>
    <!-- End Navigation -->

</header>
<!-- End Header -->


<!-- Start Banner 
    ============================================= -->
<div class="banner-area standard text-default bg-gray-hard">

    <div class="item">
        <div class="box-table">
            <div class="box-cell">
                <div class="container">
                    <div class="row item-flex center">
                        <div class="col-md-6">
                            <div class="content-box">
                                <h1>{{ trans('Selamat Datang Calon Siswa Baru') }}</h1>
                                <p>
                                    Avicenna Leadership School adalah Sekolah Swasta Unggulan yang berlokasi di Jagakarsa, Cinere dan Pamulang.
                                    Avicenna Leadership School memiliki visi mewujudkan sekolah berkarakter kepemimpinan, berbasis sains dan teknologi, peduli pada lingkungan dan berprestasi.<br /><br />
                                    <i><b>Indonesia Leadership School</b></i>
                                </p>
                                <form action="#">
                                    @if(isset($registration_schedule))
                                    <div style="text-align: center;">
                                    <a href="{{ route('frontend.ppdb') }}" class="btn btn-dark effect btn-sm">
                                        <i class="fas fa-chart-bar"></i>
                                        <div class="fs-10">
                                            {{ $registration_schedule->description }}
                                        </div> </a>
                                    </div>
                                    @else
                                    <div style="text-align: center;">
                                    <a href="" class="btn btn-dark effect btn-sm">
                                        <i class="fas fa-chart-bar"></i>
                                        Belum Ada Jadwal</a>
                                    </div>
                                    @endisset
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 thumb">
                            <img src="{{ asset('frontend/img/header-jagakarsa.jpg') }}" alt="Thumb">
                            <img src="{{ asset('frontend/img/header-cinere.jpg') }}" alt="Thumb">
                            <img src="{{ asset('frontend/img/header-pamulang.jpg') }}" alt="Thumb">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner -->

<!-- Jadwal Pendaftaran ============================================= -->
<section id="event" class="event-area default-padding">
    <div class="container">
        <div class="row">
            <div class="site-heading text-center">
                <div class="col-md-8 col-md-offset-2">
                    <h2>Jadwal Pendaftaran</h2>

                    @if(isset($registration_schedule))
                    <p>
                        <b class="text-capitalize">{{ $registration_schedule->description }} - Tahun Ajaran {{ $registration_schedule->academicYear->academic_label }}</b> - Sudah Dibuka.
                        Berikut ini adalah jadwal dari pendaftaran Siswa Baru
                    </p>
                    @else
                    <p>
                        Saat ini belum ada jadwal untuk pendaftaran
                    </p>
                    @endisset
                </div>
            </div>
        </div>
        <div class="row">
            <div class="event-items">
                <!-- Single Item -->
                <div class="item horizontal col-md-12">
                    <div class="col-md-12 info" style="float: inherit;">
                        <h4>
                            <a href="#">Jadwal Pendaftaran Online Siswa Baru</a>
                        </h4>
                        <p>
                            Berikut ini adalah jadwal dari pendaftaran siswa baru yang dapat orang tua ataupun wali murid ikuti.
                        </p>


                        <table class="table table-bordered table-stripped align-middle">
                            <thead>
                                <tr>
                                    <th class="mw-300px">NAMA JADWAL</th>
                                    <th colspan="2" class="text-center">TANGGAL PENDAFTARAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($registration_schedules->isEmpty())
                                <tr>
                                    <td colspan="3">
                                        <h4 class="text-center">Maaf, Jadwal Pendaftaran belum dibuka</h4>
                                    </td>
                                </tr>
                                @else
                                @foreach($registration_schedules as $schedule)
                                <?php
                                $current = (!empty($registration_schedule) && $schedule->id == $registration_schedule->id) ? "bg-success" : "";
                                ?>
                                <tr class="{{ $current }}">
                                    <td class="text-capitalize">{{ $schedule->description }}</td>
                                    <td class=" text-center">{{ date_format(date_create($schedule->date_from),"d M Y") }}</td>
                                    <td class="text-center">{{ date_format(date_create($schedule->date_to),"d M Y") }}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        @if(isset($jadwal_terbuka))
                        <a href="#" class="btn btn-dark effect btn-sm">
                            <i class="fas fa-chart-bar"></i>
                            Pendaftaran Tahun Ajaran {{ $jadwal_terbuka->th_ajaran }}</a>
                        @endisset
                    </div>
                </div>
                <!-- Single Item -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border" style="margin-bottom: 10px;">
                        <div class="box-title">
                            Syarat-syarat Pendaftaran Calon Siswa:
                        </div>
                    </div>
                    <div class="box-body">
                        <ul class="list-group">
                            {{-- <li class="list-group-item justify-content-between">
                                <span class="badge badge-default badge-pill pull-left" style="margin-right: 10px">1</span>
                                Membayar Formulir Pendaftaran, Tes Akademik dan Tes Psikotes sebesar Rp 300.000,- (tiga ratus ribu rupiah)
                            </li> --}}

                            <li class="list-group-item justify-content-between">
                                <span class="badge badge-default badge-pill pull-left" style="margin-right: 10px">1</span>
                                Warga Negara Indonesia (WNI) atau Asing (WNA) laki-laki dan perempuan.
                            </li>

                            <li class="list-group-item justify-content-between">
                                <span class="badge badge-default badge-pill pull-left" style="margin-right: 10px">2</span>
                                Melengkapi data Orang Tua/Wali dan Melengkapi data Calon Peserta Didik Baru
                            </li>

                            <li class="list-group-item justify-content-between">
                                <span class="badge badge-default badge-pill pull-left" style="margin-right: 10px">3</span>
                                Melakukan Pembayaran Registrasi Awal (Formulir sesuai Dengan Syarat dan Ketentuan yang Berlaku) 
                            </li>

                            <li class="list-group-item justify-content-between">
                                <span class="badge badge-default badge-pill pull-left" style="margin-right: 10px">4</span>
                                Melengkapi Data Pribadi, Data Pendidikan dan Data Orang Tua / Wali
                            </li>

                            <li class="list-group-item justify-content-between">
                                <span class="badge badge-default badge-pill pull-left" style="margin-right: 10px">5</span>
                                Melakukan Pembayaran UP & SPP
                            </li>

                            <li class="list-group-item justify-content-between">
                                <span class="badge badge-default badge-pill pull-left" style="margin-right: 10px">6</span>
                                Melakukan pengisian berkas Daftar Ulang
                            </li>

                            <li class="list-group-item justify-content-between">
                                <span class="badge badge-default badge-pill pull-left" style="margin-right: 10px">7</span>
                                Selesai
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Event -->


@endsection