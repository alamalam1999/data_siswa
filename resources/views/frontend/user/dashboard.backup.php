@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard'))


@section('content')

    <div class="row mb-4">
        <div class="col">

            @if (!empty($ppdbs))

                @foreach ($ppdbs as $ppdb)
                    <div class="card overflow-hidden h-xl-100 mb-10">
                        <div class="card-header border-bottom-1">
                            <h3 class="card-title text-gray-800 fw-bold">Registration : {{ $ppdb->document_no }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row border-bottom-1">
                                <div class="col-lg-3">
                                    <div class="card border mb-5">
                                        <div class="card-body p-5">
                                            <?php
                                            $sidebarInfo = [
                                                'Nama Siswa' => $ppdb->fullname,
                                                'Tanggal Daftar' => $ppdb->created_at,
                                                'Gelombang' => $ppdb->schedule_name,
                                                'Tujuan Sekolah' => 'Sekolah Avicenna -' . $ppdb->school,
                                                'Jenjang & Kelas' => $ppdb->stage . ' - ' . $ppdb->classes,
                                            ];
                                            ?>
                                            @foreach ($sidebarInfo as $field => $item)
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control form-control-transparent"
                                                        value="{{ $item }}" placeholder="Banawi Usada" readonly>
                                                    <label for="floatingInput">{{ $field }}</label>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>

                                    <div class="card mb-4 bg-white border">

                                        <div class="card-body">
                                            <h4 class="card-title">
                                                {{ $logged_in_user->name }}<br />
                                            </h4>

                                            <p class="card-text">
                                                <small>
                                                    <i class="fas fa-envelope"></i> {{ $logged_in_user->email }}<br />
                                                    <i class="fas fa-calendar-check"></i> @lang('strings.frontend.general.joined')
                                                    {{ timezone()->convertToLocal($logged_in_user->created_at, 'F jS, Y') }}
                                                </small>
                                            </p>

                                            <p class="card-text">

                                                <a href="{{ route('frontend.user.account') }}"
                                                    class="btn btn-info btn-sm mb-1">
                                                    <i class="fas fa-user-circle"></i> @lang('navs.frontend.user.account')
                                                </a>

                                                @can('view backend')
                                                    &nbsp;<a href="{{ route('admin.dashboard') }}"
                                                        class="btn btn-danger btn-sm mb-1">
                                                        <i class="fas fa-user-secret"></i> @lang('navs.frontend.user.administration')
                                                    </a>
                                                @endcan
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9">

                                    <div class="row mb-5">
                                        <h3 class="btn btn-light">
                                            <span class="card-label fw-bold text-dark">STATUS PENDAFTARAN</span>
                                        </h3>
                                    </div>


                                    <div class="row g-5 g-xl-10 mb-5">

                                        {{-- DOCUMENT STATUS --}}
                                        {{-- 
                                            0 : NEW
                                            1 : WAITING APPROVAL FORMULIR
                                            2 : INTERVIEW 
                                            3 : ADMINISTRATION PAYMENT
                                            4 : WAITING APPROVAL ADMINISTRATION PAYMENT
                                            5 : RE-REGISTER 
                                            6 : WAITING APPROVAL RE-REGISTER 
                                            7 : COMPLETED 
                                        --}}

                                        {{-- STATUS CURRENT --}}
                                        {{-- linear-gradient(112.14deg, #3AB4F2 0%, #0078aa 100%); --}}

                                        {{-- STATUS DONE --}}
                                        {{-- linear-gradient(112.14deg, #00C897 0%, #019267 100%); --}}

                                        {{-- STATUS MENUNGGU --}}
                                        {{-- linear-gradient(112.14deg, #F0E161 0%, #C0B236 100%); --}}

                                        {{-- KONFIRMASI PEMBAYARAN FORMULIR --}}
                                        <?php
                                        $bg_ppdb = 'background: linear-gradient(112.14deg, #3AB4F2 0%, #0078aa 100%);';
                                        if ($ppdb->document_status > 0) {
                                            $bg_ppdb = 'background: linear-gradient(112.14deg, #F0E161 0%, #C0B236 100%);';
                                            if ($ppdb->document_status > 1) {
                                                $bg_ppdb = 'background: linear-gradient(112.14deg, #00C897 0%, #019267 100%);';
                                            }
                                        }
                                        ?>
                                        <div class="col-md-3">
                                            <div class="card card-flush h-md-100 shadow opacity-25x"
                                                style="{{ $bg_ppdb }}">
                                                <!--begin::Body-->
                                                <div class="card-body px-0 d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0"
                                                    style="background-position: 100% 50%; background-image:url('{{ asset('assets/media/stock/900x600/42.png') }}');">
                                                    <!--begin::Wrapper-->
                                                    <div class="mb-10 px-5">
                                                        <!--begin::Title-->
                                                        <div class="fs-5 fw-bold text-gray-100 text-center mb-5">
                                                            Pendaftaran PPDB & Konfirmasi Pembayaran
                                                        </div>
                                                        <!--end::Title-->
                                                        <div class="text-center">
                                                            @if ($ppdb->document_status > 0)
                                                                @if ($ppdb->document_status > 1)
                                                                    <span class="svg-icon svg-icon-3x svg-icon-success">
                                                                        <svg viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24">
                                                                            <path opacity="0.3"
                                                                                d="M10.3 14.3L11 13.6L7.70002 10.3C7.30002 9.9 6.7 9.9 6.3 10.3C5.9 10.7 5.9 11.3 6.3 11.7L10.3 15.7C9.9 15.3 9.9 14.7 10.3 14.3Z"
                                                                                fill="currentColor"></path>
                                                                            <path
                                                                                d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM11.7 15.7L17.7 9.70001C18.1 9.30001 18.1 8.69999 17.7 8.29999C17.3 7.89999 16.7 7.89999 16.3 8.29999L11 13.6L7.70001 10.3C7.30001 9.89999 6.69999 9.89999 6.29999 10.3C5.89999 10.7 5.89999 11.3 6.29999 11.7L10.3 15.7C10.5 15.9 10.8 16 11 16C11.2 16 11.5 15.9 11.7 15.7Z"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </span>
                                                                @else
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-light fw-bold"
                                                                        disabled>Menunggu Persetujuan</button>
                                                                @endif
                                                            @else
                                                                <a href="{{ route('frontend.user.payment.formulir', $ppdb->id) }}"
                                                                    class="btn btn-sm btn-dark fw-bold">Konfirmasi
                                                                    Sekarang</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <!--begin::Wrapper-->
                                                    <!--begin::Illustration-->
                                                    <img class="mx-auto w-100 theme-light-show"
                                                        src="{{ asset('assets/media/illustrations/sigma-1/17.png') }}"
                                                        alt="">
                                                    <img class="mx-auto w-100 theme-dark-show"
                                                        src="{{ asset('assets/media/illustrations/sigma-1/17-dark.png') }}"
                                                        alt="">
                                                    <!--end::Illustration-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                        </div>

                                        {{-- TEST SELEKSI ORANG TUA DAN SISWA --}}
                                        {{-- linear-gradient(112.14deg, #3AB4F2 0%, #0078aa 100%); --}}
                                        <?php
                                        $bg_seleksi = '';
                                        if ($ppdb->document_status > 2) {
                                            $bg_seleksi = 'background: linear-gradient(112.14deg, #00C897 0%, #019267 100%);';
                                        }
                                        ?>
                                        <div class="col-md-3">
                                            <div class="card card-flush h-md-100 border shadow {{ $ppdb->document_status < 2 ? 'opacity-25' : '' }}"
                                                style="{{ $bg_seleksi }}">
                                                <!--begin::Body-->
                                                <div class="card-body px-0 d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0"
                                                    style="background-position: 100% 50%;background-image:url('{{ asset('assets/media/stock/900x600/42.png') }}');/* background: linear-gradient(112.14deg, #00D2FF 0%, #3A7BD5 100%); */">
                                                    <!--begin::Wrapper-->
                                                    <div class="mb-10 px-5">
                                                        <!--begin::Title-->
                                                        <div
                                                            class="fs-5 fw-bold text-center mb-5 {{ $ppdb->document_status > 2 ? 'text-gray-100 ' : 'text-gray-800' }}">
                                                            <span class="me-2">Test Seleksi Murid dan Wawancara Orang Tua
                                                                wali</span>
                                                        </div>
                                                        <!--end::Title-->
                                                        <!--begin::Action-->
                                                        <div class="text-center">
                                                            @if ($ppdb->document_status > 1)
                                                                @if ($ppdb->document_status > 2)
                                                                    <span class="svg-icon svg-icon-3x svg-icon-success">
                                                                        <svg viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24">
                                                                            <path opacity="0.3"
                                                                                d="M10.3 14.3L11 13.6L7.70002 10.3C7.30002 9.9 6.7 9.9 6.3 10.3C5.9 10.7 5.9 11.3 6.3 11.7L10.3 15.7C9.9 15.3 9.9 14.7 10.3 14.3Z"
                                                                                fill="currentColor"></path>
                                                                            <path
                                                                                d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM11.7 15.7L17.7 9.70001C18.1 9.30001 18.1 8.69999 17.7 8.29999C17.3 7.89999 16.7 7.89999 16.3 8.29999L11 13.6L7.70001 10.3C7.30001 9.89999 6.69999 9.89999 6.29999 10.3C5.89999 10.7 5.89999 11.3 6.29999 11.7L10.3 15.7C10.5 15.9 10.8 16 11 16C11.2 16 11.5 15.9 11.7 15.7Z"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </span>
                                                                @else
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-dark fw-bold"
                                                                        disabled>Menunggu Persetujuan</button>
                                                                @endif
                                                            @else
                                                                <button type="button" class="btn btn-sm btn-dark fw-bold"
                                                                    disabled>Menunggu Persetujuan</button>
                                                            @endif

                                                        </div>
                                                        <!--begin::Action-->
                                                    </div>
                                                    <!--begin::Wrapper-->
                                                    <!--begin::Illustration-->
                                                    <img class="mx-auto w-100 theme-light-show"
                                                        src="{{ asset('assets/media/illustrations/sigma-1/10.png') }}"
                                                        alt="">
                                                    <img class="mx-auto w-100 theme-dark-show"
                                                        src="{{ asset('assets/media/illustrations/sigma-1/10-dark.png') }}"
                                                        alt="">
                                                    <!--end::Illustration-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                        </div>

                                        {{-- ADMINISTRASI SEKOLAH --}}
                                        <?php
                                        $bg_administrasi = '';
                                        if ($ppdb->document_status > 3) {
                                            $bg_administrasi = 'background: linear-gradient(112.14deg, #3AB4F2 0%, #0078aa 100%);';
                                            if ($ppdb->document_status > 4) {
                                                $bg_administrasi = 'background: linear-gradient(112.14deg, #F0E161 0%, #C0B236 100%);';
                                                if ($ppdb->document_status > 5) {
                                                    $bg_administrasi = 'background: linear-gradient(112.14deg, #00C897 0%, #019267 100%);';
                                                }
                                            }
                                        }
                                        ?>

                                        <div class="col-md-3">
                                            <div class="card px-0 card-flush h-md-100 border shadow {{ $ppdb->document_status < 4 ? 'opacity-25' : '' }}"
                                                style="{{ $bg_administrasi }}">
                                                <!--begin::Body-->
                                                <div class="card-body px-0 d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0"
                                                    style="background-position: 100% 50%;background-image:url('{{ asset('assets/media/stock/900x600/42.png') }}');/* background: linear-gradient(112.14deg, #00D2FF 0%, #3A7BD5 100%); */">
                                                    <!--begin::Wrapper-->
                                                    <div class="mb-10">
                                                        <!--begin::Title-->
                                                        <div
                                                            class="fs-5 fw-bold text-center mb-13 {{ $ppdb->document_status > 3 ? 'text-gray-100 ' : 'text-gray-800' }}">
                                                            <span class="me-2">Administrasi Sekolah
                                                                <br>
                                                                <span class="position-relative d-inline-block text-danger">
                                                                    <a span
                                                                        class="text-danger opacity-75-hover">Sekolah</a>
                                                                    <!--begin::Separator-->
                                                                    <span
                                                                        class="position-absolute opacity-15 bottom-0 start-0 border-4 border-danger border-bottom w-100"></span>
                                                                    <!--end::Separator-->
                                                                </span>
                                                            </span>
                                                        </div>
                                                        <!--end::Title-->
                                                        <!--begin::Action-->
                                                        <div class="text-center">
                                                            @if ($ppdb->document_status > 4)
                                                                @if ($ppdb->document_status > 5)
                                                                    <span class="svg-icon svg-icon-3x svg-icon-success">
                                                                        <svg viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24">
                                                                            <path opacity="0.3"
                                                                                d="M10.3 14.3L11 13.6L7.70002 10.3C7.30002 9.9 6.7 9.9 6.3 10.3C5.9 10.7 5.9 11.3 6.3 11.7L10.3 15.7C9.9 15.3 9.9 14.7 10.3 14.3Z"
                                                                                fill="currentColor"></path>
                                                                            <path
                                                                                d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM11.7 15.7L17.7 9.70001C18.1 9.30001 18.1 8.69999 17.7 8.29999C17.3 7.89999 16.7 7.89999 16.3 8.29999L11 13.6L7.70001 10.3C7.30001 9.89999 6.69999 9.89999 6.29999 10.3C5.89999 10.7 5.89999 11.3 6.29999 11.7L10.3 15.7C10.5 15.9 10.8 16 11 16C11.2 16 11.5 15.9 11.7 15.7Z"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </span>
                                                                @else
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-light fw-bold"
                                                                        disabled>Menunggu Persetujuan</button>
                                                                @endif
                                                            @else
                                                                @if ($ppdb->document_status > 3)
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-dark fw-bold"
                                                                        disabled>Konfirmasi
                                                                        Pembayaran</button>
                                                                @else
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-dark fw-bold"
                                                                        disabled>Konfirmasi
                                                                        Pembayaran</button>
                                                                @endif
                                                            @endif
                                                        </div>
                                                        <!--begin::Action-->
                                                    </div>
                                                    <!--begin::Wrapper-->
                                                    <!--begin::Illustration-->
                                                    <img class="mx-auto w-100 theme-light-show"
                                                        src="{{ asset('assets/media/illustrations/misc/upgrade.svg') }}"
                                                        alt="">
                                                    <img class="mx-auto w-100 theme-dark-show"
                                                        src="{{ asset('assets/media/illustrations/misc/upgrade-dark.svg') }}"
                                                        alt="">
                                                    <!--end::Illustration-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                        </div>


                                        {{-- DAFTAR ULANG --}}
                                        <?php
                                        $bg_register = '';
                                        if ($ppdb->document_status > 5) {
                                            $bg_register = 'background: linear-gradient(112.14deg, #3AB4F2 0%, #0078aa 100%);';
                                            if ($ppdb->document_status > 6) {
                                                $bg_register = 'background: linear-gradient(112.14deg, #F0E161 0%, #C0B236 100%);';
                                                if ($ppdb->document_status > 7) {
                                                    $bg_register = 'background: linear-gradient(112.14deg, #00C897 0%, #019267 100%);';
                                                }
                                            }
                                        }
                                        ?>
                                        <div class="col-md-3">
                                            <div class="card card-flush h-md-100 border shadow {{ $ppdb->document_status < 6 ? 'opacity-25' : '' }}"
                                                style="{{ $bg_register }}">
                                                <!--begin::Body-->
                                                <div class="card-body px-0 d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0"
                                                    style="background-position: 100% 50%;background-image:url('{{ asset('assets/media/stock/900x600/42.png') }}');/* background: linear-gradient(112.14deg, #00D2FF 0%, #3A7BD5 100%); */">
                                                    <!--begin::Wrapper-->
                                                    <div class="mb-10 px-5">
                                                        <!--begin::Title-->
                                                        <div class="fs-5 fw-bold text-center mb-13 {{ $ppdb->document_status > 5 ? 'text-gray-100 ' : 'text-gray-800' }}">
                                                            <span class="me-2">Daftar Ulang
                                                                <br>
                                                                <span class="position-relative d-inline-block text-danger">
                                                                    <span class="text-danger opacity-75-hover">data
                                                                        siswa</span>
                                                                    <!--begin::Separator-->
                                                                    <span
                                                                        class="position-absolute opacity-15 bottom-0 start-0 border-4 border-danger border-bottom w-100"></span>
                                                                    <!--end::Separator-->
                                                                </span></span>
                                                        </div>
                                                        <!--end::Title-->
                                                        <!--begin::Action-->
                                                        <div class="text-center">
                                                            @if ($ppdb->document_status > 5)
                                                                @if ($ppdb->document_status > 6)
                                                                    <span class="svg-icon svg-icon-3x svg-icon-success">
                                                                        <svg viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24">
                                                                            <path opacity="0.3"
                                                                                d="M10.3 14.3L11 13.6L7.70002 10.3C7.30002 9.9 6.7 9.9 6.3 10.3C5.9 10.7 5.9 11.3 6.3 11.7L10.3 15.7C9.9 15.3 9.9 14.7 10.3 14.3Z"
                                                                                fill="currentColor"></path>
                                                                            <path
                                                                                d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM11.7 15.7L17.7 9.70001C18.1 9.30001 18.1 8.69999 17.7 8.29999C17.3 7.89999 16.7 7.89999 16.3 8.29999L11 13.6L7.70001 10.3C7.30001 9.89999 6.69999 9.89999 6.29999 10.3C5.89999 10.7 5.89999 11.3 6.29999 11.7L10.3 15.7C10.5 15.9 10.8 16 11 16C11.2 16 11.5 15.9 11.7 15.7Z"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </span>
                                                                @else
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-light fw-bold"
                                                                        disabled>Menunggu Persetujuan</button>
                                                                @endif
                                                            @else
                                                                @if ($ppdb->document_status > 4)
                                                                    <a href="{{ route('frontend.user.registration', $ppdb->id) }}"
                                                                        class="btn btn-sm btn-dark fw-bold">Konfirmasi
                                                                        Sekarang</a>
                                                                @else
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-dark fw-bold"
                                                                        disabled>Konfirmasi
                                                                        Sekarang</button>
                                                                @endif
                                                            @endif
                                                        </div>
                                                        <!--begin::Action-->
                                                    </div>
                                                    <!--begin::Wrapper-->
                                                    <!--begin::Illustration-->
                                                    <img class="mx-auto w-100 theme-light-show"
                                                        src="{{ asset('assets/media/illustrations/sigma-1/4.png') }}"
                                                        alt="">
                                                    <img class="mx-auto w-100 theme-dark-show"
                                                        src="{{ asset('assets/media/illustrations/sigma-1/4-dark.png') }}"
                                                        alt="">
                                                    <!--end::Illustration-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                        </div>



                                    </div>


                                    <div class="row d-none">
                                        <div class="col-lg-6">
                                            <div class="row mb-5 px-5">
                                                <h3 class="btn btn-light">
                                                    <span class="card-label fw-bold text-dark">B. TEST SELEKSI</span>
                                                </h3>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-row-dashed table-row-gray-300 gy-4">
                                                            <thead>
                                                                <tr class="fw-bold text-gray-800">
                                                                    <th>
                                                                    </th>
                                                                    <th class="w-70px">Sudah</th>
                                                                    <th class="w-70px">Belum</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Wawancara Orang Tua</td>
                                                                    <td>
                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input"
                                                                                name="wot_{{ $ppdb->id }}"
                                                                                type="radio" value="1" disabled />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input"
                                                                                name="wot_{{ $ppdb->id }}"
                                                                                type="radio" value="0" disabled
                                                                                checked />
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Wawancara Siswa</td>
                                                                    <td>
                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input"
                                                                                name="ws_{{ $ppdb->id }}"
                                                                                type="radio" value="1" disabled />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input"
                                                                                name="ws_{{ $ppdb->id }}"
                                                                                type="radio" value="0" disabled
                                                                                checked />
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Test Akademik</td>
                                                                    <td>
                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input"
                                                                                name="ta_{{ $ppdb->id }}"
                                                                                type="radio" value="1" disabled />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input"
                                                                                name="ta_{{ $ppdb->id }}"
                                                                                type="radio" value="0" disabled
                                                                                checked />
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Psikotest</td>
                                                                    <td>
                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input"
                                                                                name="ps_{{ $ppdb->id }}"
                                                                                type="radio" value="1" disabled />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input"
                                                                                name="ps_{{ $ppdb->id }}"
                                                                                type="radio" value="0" disabled
                                                                                checked />
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Observasi</td>
                                                                    <td>
                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input"
                                                                                name="ob_{{ $ppdb->id }}"
                                                                                type="radio" value="1" disabled />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input"
                                                                                name="ob_{{ $ppdb->id }}"
                                                                                type="radio" value="0" disabled
                                                                                checked />
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Lulus Seleksi</td>
                                                                    <td>
                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input"
                                                                                name="ls_{{ $ppdb->id }}"
                                                                                type="radio" value="1" disabled />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input"
                                                                                name="ls_{{ $ppdb->id }}"
                                                                                type="radio" value="0" disabled
                                                                                checked />
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-5 px-5">
                                                <h3 class="btn btn-light">
                                                    <span class="card-label fw-bold text-dark">C. DAFTAR ULANG</span>
                                                </h3>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-row-dashed table-row-gray-300 gy-4">
                                                            <thead>
                                                                <tr class="fw-bold text-gray-800">
                                                                    <th>
                                                                    </th>
                                                                    <th class="w-70px">Verifikasi</th>
                                                                    <th class="w-70px">Belum<br />Verifikasi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Pembayaran UP</td>
                                                                    <td>
                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input"
                                                                                name="pup_{{ $ppdb->id }}"
                                                                                type="radio" value="1" disabled />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input"
                                                                                name="pup_{{ $ppdb->id }}"
                                                                                type="radio" value="0" disabled
                                                                                checked />
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Pembayaran SPP</td>
                                                                    <td>
                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input"
                                                                                name="spp_{{ $ppdb->id }}"
                                                                                type="radio" value="1" disabled />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input"
                                                                                name="spp_{{ $ppdb->id }}"
                                                                                type="radio" value="0" disabled
                                                                                checked />
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Pengisian Form Daftar Ulang</td>
                                                                    <td>
                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input"
                                                                                name="fdu_{{ $ppdb->id }}"
                                                                                type="radio" value="1" disabled />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input"
                                                                                name="fdu_{{ $ppdb->id }}"
                                                                                type="radio" value="0" disabled
                                                                                checked />
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="card overflow-hidden h-xl-100 mb-10">
                    <div class="card-header border-bottom-1">
                        <h3 class="card-title text-gray-800 fw-bold">Jadwal Pendaftaran</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="site-heading">
                                <div class="col-md-12">
                                    @if (isset($registration_schedule))
                                        <p>
                                            <b class="text-capitalize">{{ $registration_schedule->description }} - Tahun
                                                Ajaran {{ $registration_schedule->academicYear->academic_label }}</b> -
                                            Sudah Dibuka.
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
                                        Berikut ini adalah jadwal dari pendaftaran siswa baru yang dapat orang tua
                                        ataupun wali murid ikuti.
                                    </p>


                                    <table class="table table-rounded table-striped border gy-4 gs-4">
                                        <thead>
                                            <tr class="fw-bold fs-8 text-gray-800">
                                                <th rowspan="2" class="mw-300px text-center fs-5 border"
                                                    style="vertical-align: middle;">NAMA JADWAL</th>
                                                <th colspan="2" class="text-center mw-300px py-2">TANGGAL
                                                    PENDAFTARAN
                                                </th>
                                            </tr>
                                            <tr class="fw-bold fs-8 text-gray-800 border">
                                                <th class="py-2">Tanggal Awal</th>
                                                <th class="py-2">Tanggal Akhir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($registration_schedules->isEmpty())
                                                <tr>
                                                    <td colspan="3">
                                                        <h4 class="text-center">Maaf, Jadwal Pendaftaran belum dibuka
                                                        </h4>
                                                    </td>
                                                </tr>
                                            @else
                                                @foreach ($registration_schedules as $schedule)
                                                    <?php
                                                    $current = !empty($registration_schedule) && $schedule->id == $registration_schedule->id ? 'bg-success' : '';
                                                    ?>
                                                    <tr class="{{ $current }}">
                                                        <td class="text-capitalize text-capitalize fw-bold">
                                                            {{ $schedule->description }}</td>
                                                        <td class="text-center">
                                                            {{ date_format(date_create($schedule->date_from), 'd M Y') }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ date_format(date_create($schedule->date_to), 'd M Y') }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <!-- Single Item -->

                            <div class="p-5 mb-5 text-center">
                                @if (isset($registration_schedule))
                                    <a href="{{ route('frontend.auth.register') }}"
                                        class="btn btn-dark effect btn-sm w-500px">
                                        <i class="fas fa-chart-bar"></i>
                                        {{ $registration_schedule->description }}</a>
                                @endisset
                        </div>
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
                                        <span class="badge badge-secondary" style="margin-right: 10px">1</span>
                                        Warga Negara Indonesia (WNI), laki-laki dan perempuan.
                                    </li>

                                    <li class="list-group-item justify-content-between">
                                        <span class="badge badge-secondary" style="margin-right: 10px">2</span>
                                        Lulus Ujian Nasional SLTP/setingkat
                                    </li>

                                    <li class="list-group-item justify-content-between">
                                        <span class="badge badge-secondary" style="margin-right: 10px">3</span>
                                        Berijazah SLTP/setingkat.
                                    </li>

                                    <li class="list-group-item justify-content-between">
                                        <span class="badge badge-secondary" style="margin-right: 10px">4</span>
                                        Melengkapi Data Pribadi, Data Pendidikan dan Data Orang Tua / Wali
                                    </li>

                                    <li class="list-group-item justify-content-between">
                                        <span class="badge badge-secondary" style="margin-right: 10px">5</span>
                                        Melakukan Pembayaran Registrasi sebesar Rp. 100.000,-
                                    </li>

                                    <li class="list-group-item justify-content-between">
                                        <span class="badge badge-secondary" style="margin-right: 10px">6</span>
                                        Melakukan Tes Seleksi
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif

</div><!-- row -->
</div><!-- row -->
@endsection



@push('after-scripts')
<script></script>
@endpush
