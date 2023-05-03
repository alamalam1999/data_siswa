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
                                    <input type="text" class="form-control form-control-transparent" value="{{ $item }}" placeholder="Banawi Usada" readonly>
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

                                    <a href="{{ route('frontend.user.account') }}" class="btn btn-info btn-sm mb-1">
                                        <i class="fas fa-user-circle"></i> @lang('navs.frontend.user.account')
                                    </a>

                                    @can('view backend')
                                    &nbsp;<a href="{{ route('admin.dashboard') }}" class="btn btn-danger btn-sm mb-1">
                                        <i class="fas fa-user-secret"></i> @lang('navs.frontend.user.administration')
                                    </a>
                                    @endcan
                                </p>
                            </div>
                        </div>
                        {{-- FOR WHATSAPP --}}
                        <tr>
                            <td>
                                <a href="https://api.whatsapp.com/send?phone=628111297881&text=" target="_blank" class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-3 mb-7">
                                        <i class="bi bi-whatsapp text-success fs-3x"></i>
                                    </div>
                                    <div class="d-flex justify-content-start flex-column mb-7">
                                        <div class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Sekolah Avicenna Jagakarsa</div>
                                        <span class="text-gray-400 fw-semibold d-block fs-7">Admin Jagakarsa</span>
                                    </div>
                                </a>
                            </td>
                            <td class="text-end">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="https://api.whatsapp.com/send?phone=628111507516&text=" target="_blank" class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-3 mb-7">
                                        <i class="bi bi-whatsapp text-success fs-3x"></i>
                                    </div>
                                    <div class="d-flex justify-content-start flex-column mb-7">
                                        <div class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Sekolah Avicenna Cinere</div>
                                        <span class="text-gray-400 fw-semibold d-block fs-7">Admin Cinere</span>
                                    </div>
                                </a>
                            </td>
                            <td class="text-end">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="https://api.whatsapp.com/send?phone=6281399390497&text=" target="_blank" class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-3 mb-7">
                                        <i class="bi bi-whatsapp text-success fs-3x"></i>
                                    </div>
                                    <div class="d-flex justify-content-start flex-column mb-7">
                                        <div class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Sekolah Avicenna Pamulang</div>
                                        <span class="text-gray-400 fw-semibold d-block fs-7">Admin Pamulang</span>
                                    </div>
                                </a>
                            </td>
                            <td class="text-end">
                            </td>
                        </tr>
                    </div>
                    <div class="col-lg-9">


                    <div class="row mb-5">
                            <div class="col-md-12">
                                <div class="card border-0 h-md-100" data-theme="light" style="background: linear-gradient(112.14deg, #FF8C32 70%, #F5C7A9 100%)">
                                    <!--begin::Body-->
                                    <div class="card-body" style="padding: 0.5rem 2rem; background-position: 100% 50%; background-image:url('{{ asset('assets/media/stock/900x600/42.png') }}');">
                                        <!--begin::Row-->
                                        <div class="row align-items-center">
                                            <!--begin::Col-->
                                            <div class="col-7 ps-xl-13">
                                                <!--begin::Title-->
                                                <div class="text-white mb-2">
                                                    <span class="fs-4 fw-semibold me-2 d-block lh-1 pb-2 opacity-75">Informasi Calon Siswa</span>
                                                    <span class="fs-2qx fw-bold">Unggah Dokumen Pendukung</span>
                                                </div>
                                                <!--end::Title-->
                                                <!--begin::Text-->
                                                <span class="fw-semibold text-white fs-6 mb-4 d-block opacity-75">Anda dapat menggunggah kembali dokumen-dokumen pendukung yang terlupa saat awal pendaftaran.</span>
                                                <!--end::Text-->
                                                <!--begin::Items-->

                                                <!--end::Items-->
                                                <!--begin::Action-->
                                                <div class="d-flex flex-column flex-sm-row d-grid gap-2">
                                                    <a href="{{ route('frontend.user.upload', $ppdb->id) }}" class="btn btn-info flex-shrink-0 me-2">Unggah Data</a>
                                                </div>
                                                <!--end::Action-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-5">
                                                <!--begin::Illustration-->
                                                <div class="bgi-no-repeat bgi-size-contain bgi-position-x-end h-200px" style="background-image:url('assets/media/illustrations/sigma-1/8.png"></div>
                                                <!--end::Illustration-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Body-->
                                </div>

                                
                            </div>
                        </div>

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
                            <div class="col-md-3">
                                <div class="card card-flush h-md-100 shadow dashboard-user-{{ strtolower($ppdb->FEE_FORMULIR_STATE) }}">
                                    <!--begin::Body-->
                                    <div class="card-body px-0 d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0" style="background-position: 100% 50%; background-image:url('{{ asset('assets/media/stock/900x600/42.png') }}');">
                                        <!--begin::Wrapper-->
                                        <div class="mb-10 px-5">
                                            <!--begin::Title-->
                                            <div class="fs-5 fw-bold text-gray-100 text-center mb-5">
                                                Pendaftaran PPDB & Konfirmasi Pembayaran
                                            </div>

                                            <!--end::Title-->
                                            <div class="text-center">
                                                @if ($ppdb->FEE_FORMULIR_STATE == 'COMPLETED')
                                                <span class="svg-icon svg-icon-3x svg-icon-success">
                                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                                                        <path opacity="0.3" d="M10.3 14.3L11 13.6L7.70002 10.3C7.30002 9.9 6.7 9.9 6.3 10.3C5.9 10.7 5.9 11.3 6.3 11.7L10.3 15.7C9.9 15.3 9.9 14.7 10.3 14.3Z" fill="currentColor"></path>
                                                        <path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM11.7 15.7L17.7 9.70001C18.1 9.30001 18.1 8.69999 17.7 8.29999C17.3 7.89999 16.7 7.89999 16.3 8.29999L11 13.6L7.70001 10.3C7.30001 9.89999 6.69999 9.89999 6.29999 10.3C5.89999 10.7 5.89999 11.3 6.29999 11.7L10.3 15.7C10.5 15.9 10.8 16 11 16C11.2 16 11.5 15.9 11.7 15.7Z" fill="currentColor"></path>
                                                    </svg>
                                                    <div class="btn btn-sm btn-white fw-bold mt-5 disabled">
                                                        <div class="text-gray-700 fw-semibold fs-8">Jadwal tes akan dikirimkan melalui whatsapp</div>
                                                    </div>
                                                </span>
                                                @elseif ($ppdb->FEE_FORMULIR_STATE == 'NEW') 
                                                <a href="{{ route('frontend.user.payment.formulir', $ppdb->id) }}" class="btn btn-sm btn-dark fw-bold">Pembayaran Registrasi Awal
                                                </a>
                                                @else
                                                <button type="button" class="btn btn-sm btn-light fw-bold" disabled>Menunggu Persetujuan</button>
                                                @endif
                                            </div>
                                        </div>
                                        <!--begin::Wrapper-->
                                        <!--begin::Illustration-->
                                        <img class="mx-auto w-100 theme-light-show" src="{{ asset('assets/media/illustrations/sigma-1/17.png') }}" alt="">
                                        <img class="mx-auto w-100 theme-dark-show" src="{{ asset('assets/media/illustrations/sigma-1/17-dark.png') }}" alt="">
                                        <!--end::Illustration-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                            </div>

                            {{-- TEST SELEKSI ORANG TUA DAN SISWA --}}
                            <div class="col-md-3">
                                <?php
                                if ($ppdb->INTERVIEW_STATE == 'WAITING' && $ppdb->interview_result == 3) {
                                    $ppdb->INTERVIEW_STATE = 'WAITING';
                                } else if ($ppdb->INTERVIEW_STATE == 'WAITING') {
                                    $ppdb->INTERVIEW_STATE = 'WAITINGCUSTOM';
                                } else if ($ppdb->document_status == 7) {
                                    $ppdb->REGISTRATION_STATE = 'COMPLETED';
                                }
                                ?>
                                <div class="card card-flush h-md-100 border shadow dashboard-user-{{ strtolower($ppdb->INTERVIEW_STATE) }}">
                                    <!--begin::Body-->
                                    <div class="card-body px-0 d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0" style="background-position: 100% 50%;background-image:url('{{ asset('assets/media/stock/900x600/42.png') }}');/* background: linear-gradient(112.14deg, #00D2FF 0%, #3A7BD5 100%); */">
                                        <!--begin::Wrapper-->
                                        <div class="mb-10 px-5">
                                            <!--begin::Title-->
                                            <div class="fs-5 fw-bold text-center mb-5 {{ $ppdb->INTERVIEW_STATE == 'DISABLED' ? 'text-gray-800' : 'text-gray-100' }}">
                                                <span class="me-2">Hasil Tes Seleksi</span>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Action-->
                                            <div class="text-center">
                                                @if ($ppdb->INTERVIEW_STATE == 'COMPLETED')
                                                <span class="svg-icon svg-icon-3x svg-icon-success">
                                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                                                        <path opacity="0.3" d="M10.3 14.3L11 13.6L7.70002 10.3C7.30002 9.9 6.7 9.9 6.3 10.3C5.9 10.7 5.9 11.3 6.3 11.7L10.3 15.7C9.9 15.3 9.9 14.7 10.3 14.3Z" fill="currentColor"></path>
                                                        <path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM11.7 15.7L17.7 9.70001C18.1 9.30001 18.1 8.69999 17.7 8.29999C17.3 7.89999 16.7 7.89999 16.3 8.29999L11 13.6L7.70001 10.3C7.30001 9.89999 6.69999 9.89999 6.29999 10.3C5.89999 10.7 5.89999 11.3 6.29999 11.7L10.3 15.7C10.5 15.9 10.8 16 11 16C11.2 16 11.5 15.9 11.7 15.7Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <div class="btn btn-sm btn-white fw-bold mt-5 disabled">
                                                    <div class="text-gray-700 fw-semibold fs-8">Selamat Anda Lulus Ke Tahap Berikutnya</div>
                                                </div>
                                                @elseif ($ppdb->INTERVIEW_STATE == 'WAITING' && $ppdb->interview_result == 3)
                                                <button type="button" class="btn btn-sm btn-light fw-bold" disabled>Waiting List </button>
                                                <div> </div>
                                                <div style="margin-top:15px; margin-bottom:10px; font-size:2px;">
                                                    <font size="-2"> <strong>Hasil Tes Seleksi sedang dalam Pertimbangan</strong> </font>
                                                    <font size="-2"> <strong>silahkan menunggu</strong> </font>
                                                </div>
                                                @elseif ($ppdb->INTERVIEW_STATE == 'REJECT')
                                                <button type="button" class="btn btn-sm btn-light fw-bold" disabled>Tidak Lulus</button>
                                                <div> </div>
                                                <div style="margin-top:15px; margin-bottom:10px; font-size:2px;">
                                                    <font size="-2"><strong>Maaf Hasil Tes Seleksi Tidak Lulus</strong> </font>
                                                </div>
                                                @else
                                                <a href="" class="btn btn-sm btn-dark fw-bold disabled">Menunggu Hasil Tes</a>
                                                @endif

                                            </div>
                                            <!--begin::Action-->
                                        </div>
                                        <!--begin::Wrapper-->
                                        <!--begin::Illustration-->

                                        @if ($ppdb->INTERVIEW_STATE != 'REJECT' || $ppdb->INTERVIEW_STATE == 'REJECT')
                                        <img class="mx-auto w-100 theme-light-show" src="{{ asset('assets/media/illustrations/sigma-1/10.png') }}" alt="">
                                        <img class="mx-auto w-100 theme-dark-show" src="{{ asset('assets/media/illustrations/sigma-1/10-dark.png') }}" alt="">
                                        @endif

                                        <!--end::Illustration-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                            </div>

                            {{-- ADMINISTRASI SEKOLAH --}}
                            <div class="col-md-3">
                                <div class="card px-0 card-flush h-md-100 border shadow  dashboard-user-{{ strtolower($ppdb->FEE_TOTAL_STATE) }}">
                                    <!--begin::Body-->
                                    <div class="card-body px-0 d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0" style="background-position: 100% 50%;background-image:url('{{ asset('assets/media/stock/900x600/42.png') }}');/* background: linear-gradient(112.14deg, #00D2FF 0%, #3A7BD5 100%); */">
                                        <!--begin::Wrapper-->
                                        <div class="mb-10 px-5">
                                            <!--begin::Title-->
                                            <div class="fs-5 fw-bold text-center mb-4 {{ $ppdb->FEE_TOTAL_STATE == 'DISABLED' ? 'text-gray-800' : 'text-gray-100' }}">
                                                <span class="me-2">Pembayaran UP & SPP Sekolah</span>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Action-->
                                            <div class="text-center">
                                                @if ($ppdb->FEE_TOTAL_STATE == 'COMPLETED')
                                                <span class="svg-icon svg-icon-3x svg-icon-success">
                                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                                                        <path opacity="0.3" d="M10.3 14.3L11 13.6L7.70002 10.3C7.30002 9.9 6.7 9.9 6.3 10.3C5.9 10.7 5.9 11.3 6.3 11.7L10.3 15.7C9.9 15.3 9.9 14.7 10.3 14.3Z" fill="currentColor"></path>
                                                        <path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM11.7 15.7L17.7 9.70001C18.1 9.30001 18.1 8.69999 17.7 8.29999C17.3 7.89999 16.7 7.89999 16.3 8.29999L11 13.6L7.70001 10.3C7.30001 9.89999 6.69999 9.89999 6.29999 10.3C5.89999 10.7 5.89999 11.3 6.29999 11.7L10.3 15.7C10.5 15.9 10.8 16 11 16C11.2 16 11.5 15.9 11.7 15.7Z" fill="currentColor"></path>
                                                    </svg>
                                                    <div class="btn btn-sm btn-white fw-bold mt-5 disabled">
                                                        <div class="text-gray-700 fw-semibold fs-8">Pembayaran UP & SPP telah Tervalidasi</div>
                                                    </div>
                                                </span>
                                                @elseif ($ppdb->FEE_TOTAL_STATE == 'NEW')
                                                <a href="{{ route('frontend.user.payment.administration', $ppdb->id) }}" class="btn btn-sm btn-dark fw-bold">Konfirmasi
                                                    Sekarang</a>
                                                @else
                                                <a href="" class="btn btn-sm btn-dark fw-bold disabled">Konfirmasi Pembayaran UP & SPP</a>
                                                @endif
                                            </div>
                                            <!--begin::Action-->
                                        </div>
                                        <!--begin::Wrapper-->
                                        <!--begin::Illustration-->
                                        <img class="mx-auto w-100 theme-light-show" src="{{ asset('assets/media/illustrations/misc/upgrade.svg') }}" alt="">
                                        <img class="mx-auto w-100 theme-dark-show" src="{{ asset('assets/media/illustrations/misc/upgrade-dark.svg') }}" alt="">
                                        <!--end::Illustration-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                            </div>


                            {{-- DAFTAR ULANG --}}
                            <div class="col-md-3">
                                <div class="card card-flush h-md-100 border shadow dashboard-user-{{ strtolower($ppdb->REGISTRATION_STATE) }}">
                                    <!--begin::Body-->
                                    <div class="card-body px-0 d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0" style="background-position: 100% 50%;background-image:url('{{ asset('assets/media/stock/900x600/42.png') }}');/* background: linear-gradient(112.14deg, #00D2FF 0%, #3A7BD5 100%); */">
                                        <!--begin::Wrapper-->
                                        <div class="mb-10 px-5">
                                            <!--begin::Title-->
                                            <div class="fs-5 fw-bold text-center mb-4 {{ $ppdb->REGISTRATION_STATE == 'DISABLED' ? 'text-gray-800' : 'text-gray-100' }}">
                                                <span class="me-2">Daftar Ulang Calon Siswa </span>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Action-->
                                            <div class="text-center">
                                                @if ($ppdb->document_status > 5)
                                                @if ($ppdb->document_status > 6)
                                                <span class="svg-icon svg-icon-3x svg-icon-success">
                                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                                                        <path opacity="0.3" d="M10.3 14.3L11 13.6L7.70002 10.3C7.30002 9.9 6.7 9.9 6.3 10.3C5.9 10.7 5.9 11.3 6.3 11.7L10.3 15.7C9.9 15.3 9.9 14.7 10.3 14.3Z" fill="currentColor"></path>
                                                        <path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM11.7 15.7L17.7 9.70001C18.1 9.30001 18.1 8.69999 17.7 8.29999C17.3 7.89999 16.7 7.89999 16.3 8.29999L11 13.6L7.70001 10.3C7.30001 9.89999 6.69999 9.89999 6.29999 10.3C5.89999 10.7 5.89999 11.3 6.29999 11.7L10.3 15.7C10.5 15.9 10.8 16 11 16C11.2 16 11.5 15.9 11.7 15.7Z" fill="currentColor"></path>
                                                    </svg>
                                                    <div class="btn btn-sm btn-white fw-bold mt-5 disabled">
                                                        <div class="text-gray-700 fw-semibold fs-8">Daftar Ulang Berhasil Selamat Datang Siswa / Siswi Baru</div>
                                                    </div>
                                                </span>
                                                @else
                                                <button type="button" class="btn btn-sm btn-light fw-bold" disabled>Menunggu Persetujuan</button>
                                                @endif
                                                @else
                                                @if ($ppdb->document_status > 4)
                                                <a href="{{ route('frontend.user.reregistration', $ppdb->id) }}" class="btn btn-sm btn-dark fw-bold">Konfirmasi
                                                    Sekarang</a>
                                                @else
                                                <button type="button" class="btn btn-sm btn-dark fw-bold" disabled>Pengisian Berkas Daftar Ulang
                                                </button>
                                                @endif
                                                @endif
                                            </div>
                                            <!--begin::Action-->
                                        </div>
                                        <!--begin::Wrapper-->
                                        <!--begin::Illustration-->
                                        <img class="mx-auto w-100 theme-light-show" src="{{ asset('assets/media/illustrations/sigma-1/4.png') }}" alt="">
                                        <img class="mx-auto w-100 theme-dark-show" src="{{ asset('assets/media/illustrations/sigma-1/4-dark.png') }}" alt="">
                                        <!--end::Illustration-->
                                    </div>
                                    <!--end::Body-->
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
                                            <th rowspan="2" class="mw-300px text-center fs-5 border" style="vertical-align: middle;">NAMA JADWAL</th>
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
                                                {{ $schedule->description }}
                                            </td>
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
                            <a href="{{ route('frontend.auth.register') }}" class="btn btn-dark effect btn-sm w-500px">
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
