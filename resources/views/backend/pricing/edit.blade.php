@extends('backend.layouts.app')

@section('title', __('labels.backend.access.ppdb.management') . ' | ' . __('labels.backend.access.ppdb.edit'))

@section('breadcrumb-links')

@endsection

@section('content')
    <div class="row mb-4">
        <div class="col">


            <div class="card overflow-hidden h-xl-100 mb-10">
                <div class="card-header border-bottom-1">
                    <h3 class="card-title text-gray-800 fw-bold">Registration : {{ $ppdb->document_no }}</h3>
                </div>
                <div class="card-body">
                    <div class="row border-bottom-1">
                        <div class="col-lg-4">
                            <div class="card bg-light mb-5">
                                <div class="card-body">

                                    <div class="d-flex align-items-center flex-wrap d-grid gap-2 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="m-0">
                                                <span class="fw-semibold text-gray-400 d-block fs-6">Nama Siswa</span>
                                                <span
                                                    class="fw-bold text-gray-800 text-hover-primary fs-5">{{ $ppdb->fullname }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center flex-wrap d-grid gap-2 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="m-0">
                                                <span class="fw-semibold text-gray-400 d-block fs-6">Tanggal Daftar</span>
                                                <span
                                                    class="fw-bold text-gray-800 text-hover-primary fs-5">{{ $ppdb->created_at }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center flex-wrap d-grid gap-2 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="m-0">
                                                <span class="fw-semibold text-gray-400 d-block fs-6">Gelombang</span>
                                                <span
                                                    class="fw-bold text-gray-800 text-hover-primary fs-5">{{ $ppdb->schedule->description }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center flex-wrap d-grid gap-2 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="m-0">
                                                <span class="fw-semibold text-gray-400 d-block fs-6">Tujuan Sekolah</span>
                                                <span class="fw-bold text-gray-800 text-hover-primary fs-5">Sekolah Avicenna
                                                    - {{ $ppdb->school->school_name }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                                        <div class="d-flex align-items-center">
                                            <div class="m-0">
                                                <span class="fw-semibold text-gray-400 d-block fs-6">Jenjang & Kelas</span>
                                                <span
                                                    class="fw-bold text-gray-800 text-hover-primary fs-5">{{ $ppdb->stage }}
                                                    - {{ $ppdb->classes }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                                        <div class="d-flex align-items-center">
                                            <div class="m-0">
                                                <span class="fw-semibold text-gray-400 d-block fs-6">Status Siswa</span>
                                                <span
                                                    class="fw-bold text-gray-800 text-hover-primary fs-5">{{ $ppdb->student_status }}
                                                    - {{ $ppdb->classes }}</span>
                                            </div>
                                        </div>
                                    </div>





                                </div>
                            </div>

                            <div class="card mb-4 bg-white border">

                                <div class="card-body">
                                    <h4 class="card-title">
                                        {{ $user->name }}<br />
                                    </h4>

                                    <p class="card-text">
                                        <small>
                                            <i class="fas fa-envelope"></i> {{ $user->email }}<br />
                                            <i class="fas fa-calendar-check"></i> @lang('strings.frontend.general.joined')
                                            {{ timezone()->convertToLocal($user->created_at, 'F jS, Y') }}
                                        </small>
                                    </p>

                                    <?php
                                    $wa_number = $user->phone;
                                    if (substr($wa_number, 0, 1) == '0') {
                                        $wa_number = '62' . substr($wa_number, 1);
                                    }
                                    ?>
                                    <a href="https://wa.me/{{ $wa_number }}" target="_blank"
                                        class="btn btn-light-primary d-flex align-items-center me-5 me-xl-13">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-30px symbol-circle me-3">
                                            <i class="bi bi-whatsapp text-success fs-1"></i>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <span class="fw-semibold d-block fs-8"> Whatsapp / Call</span>
                                            <span
                                                class="fw-bold text-gray-800 text-hover-success fs-7">{{ $user->phone }}</span>
                                        </div>
                                        <!--end::Info-->
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row mb-5">
                                <h3 class="btn btn-light">
                                    <span class="card-label fw-bold text-dark">STATUS PENDAFTARAN</span>
                                </h3>
                            </div>
                            <div class="row">
                                <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
                                    <li class="nav-item col-lg-3">
                                        <div class="">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">
                                                <div class="card card-flush bg-light-success">
                                                    <div class="card-header flex-nowrap">
                                                        <h3 class="card-title align-items-start flex-column">
                                                            <span class="card-label fw-bold fs-4 text-gray-800">Pendaftaran
                                                                Akun</span>
                                                        </h3>
                                                    </div>
                                                    <div class="card-body text-center py-15 pt-5">
                                                        <span class="svg-icon svg-icon-success"><svg class="h-80px w-80px"
                                                                viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.3"
                                                                    d="M10.3 14.3L11 13.6L7.70002 10.3C7.30002 9.9 6.7 9.9 6.3 10.3C5.9 10.7 5.9 11.3 6.3 11.7L10.3 15.7C9.9 15.3 9.9 14.7 10.3 14.3Z"
                                                                    fill="currentColor"></path>
                                                                <path
                                                                    d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM11.7 15.7L17.7 9.70001C18.1 9.30001 18.1 8.69999 17.7 8.29999C17.3 7.89999 16.7 7.89999 16.3 8.29999L11 13.6L7.70001 10.3C7.30001 9.89999 6.69999 9.89999 6.29999 10.3C5.89999 10.7 5.89999 11.3 6.29999 11.7L10.3 15.7C10.5 15.9 10.8 16 11 16C11.2 16 11.5 15.9 11.7 15.7Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="nav-item col-lg-3">
                                        <div class="">
                                            <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">
                                                <div class="card card-flush bg-secondary">
                                                    <div class="card-header flex-nowrap">
                                                        <h3 class="card-title align-items-start flex-column">
                                                            <span class="card-label fw-bold fs-4 text-gray-800">Biodata
                                                                Siswa</span>
                                                        </h3>
                                                    </div>
                                                    <div class="card-body text-center py-15 pt-5">
                                                        <span class="svg-icon svg-icon-muted">
                                                            <svg class="h-80px w-80px" viewBox="0 0 18 18" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.3"
                                                                    d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z"
                                                                    fill="currentColor" />
                                                                <rect x="7" y="6" width="4"
                                                                    height="4" rx="2" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="nav-item col-lg-3">
                                        <div class="">
                                            <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_3">
                                                <div class="card card-flush bg-secondary">
                                                    <div class="card-header flex-nowrap">
                                                        <h3 class="card-title align-items-start flex-column">
                                                            <span class="card-label fw-bold fs-5 text-gray-800">Kelengkapan
                                                                Dokumen</span>
                                                        </h3>
                                                    </div>
                                                    <div class="card-body text-center py-15 pt-5">
                                                        <span class="svg-icon svg-icon-muted">
                                                            <svg class="h-80px w-80px" viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.3"
                                                                    d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z"
                                                                    fill="currentColor" />
                                                                <rect x="7" y="17" width="6"
                                                                    height="2" rx="1" fill="currentColor" />
                                                                <rect x="7" y="12" width="10"
                                                                    height="2" rx="1" fill="currentColor" />
                                                                <rect x="7" y="7" width="6"
                                                                    height="2" rx="1" fill="currentColor" />
                                                                <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="nav-item col-lg-3">
                                        <div class="">
                                            <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_4">
                                                <div class="card card-flush bg-secondary h-xl-100">
                                                    <div class="card-header flex-nowrap ">
                                                        <h3 class="card-title align-items-start flex-column">
                                                            <span class="card-label fw-bold fs-6 text-gray-800">Pembayaran
                                                                Formulir</span>
                                                        </h3>
                                                    </div>
                                                    <div class="card-body text-center py-15 pt-5">
                                                        <span class="svg-icon svg-icon-muted">
                                                            <svg class="h-80px w-80px" viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.3"
                                                                    d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z"
                                                                    fill="currentColor" />
                                                                <path opacity="0.3"
                                                                    d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">

                                    <div class="card border shadow-sm">
                                        <div class="card-header">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bold text-gray-800">Ringkasan Pendaftaran</span>
                                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Berikut ringkasan dari
                                                    pendaftaran siswa</span>
                                            </h3>
                                        </div>

                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="row mb-5 px-5">
                                                        <h3 class="btn btn-light">
                                                            <span class="card-label fw-bold text-dark">TEST SELEKSI</span>
                                                        </h3>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table
                                                                    class="table table-row-dashed table-row-gray-300 gy-4">
                                                                    <thead>
                                                                        <tr class="fw-bold fs-6 text-gray-800">
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
                                                                                        type="radio" value="1"
                                                                                        disabled />
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div
                                                                                    class="form-check form-check-custom form-check-solid">
                                                                                    <input class="form-check-input"
                                                                                        name="wot_{{ $ppdb->id }}"
                                                                                        type="radio" value="0"
                                                                                        disabled checked />
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
                                                                                        type="radio" value="1"
                                                                                        disabled />
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div
                                                                                    class="form-check form-check-custom form-check-solid">
                                                                                    <input class="form-check-input"
                                                                                        name="ws_{{ $ppdb->id }}"
                                                                                        type="radio" value="0"
                                                                                        disabled checked />
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
                                                                                        type="radio" value="1"
                                                                                        disabled />
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div
                                                                                    class="form-check form-check-custom form-check-solid">
                                                                                    <input class="form-check-input"
                                                                                        name="ta_{{ $ppdb->id }}"
                                                                                        type="radio" value="0"
                                                                                        disabled checked />
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
                                                                                        type="radio" value="1"
                                                                                        disabled />
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div
                                                                                    class="form-check form-check-custom form-check-solid">
                                                                                    <input class="form-check-input"
                                                                                        name="ps_{{ $ppdb->id }}"
                                                                                        type="radio" value="0"
                                                                                        disabled checked />
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
                                                                                        type="radio" value="1"
                                                                                        disabled />
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div
                                                                                    class="form-check form-check-custom form-check-solid">
                                                                                    <input class="form-check-input"
                                                                                        name="ob_{{ $ppdb->id }}"
                                                                                        type="radio" value="0"
                                                                                        disabled checked />
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
                                                                                        type="radio" value="1"
                                                                                        disabled />
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div
                                                                                    class="form-check form-check-custom form-check-solid">
                                                                                    <input class="form-check-input"
                                                                                        name="ls_{{ $ppdb->id }}"
                                                                                        type="radio" value="0"
                                                                                        disabled checked />
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
                                                            <span class="card-label fw-bold text-dark">DAFTAR ULANG</span>
                                                        </h3>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table
                                                                    class="table table-row-dashed table-row-gray-300 gy-4">
                                                                    <thead>
                                                                        <tr class="fw-bold fs-6 text-gray-800">
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
                                                                                        type="radio" value="1"
                                                                                        disabled />
                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                <div
                                                                                    class="form-check form-check-custom form-check-solid">
                                                                                    <input class="form-check-input"
                                                                                        name="pup_{{ $ppdb->id }}"
                                                                                        type="radio" value="0"
                                                                                        disabled checked />
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
                                                                                        type="radio" value="1"
                                                                                        disabled />
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div
                                                                                    class="form-check form-check-custom form-check-solid">
                                                                                    <input class="form-check-input"
                                                                                        name="spp_{{ $ppdb->id }}"
                                                                                        type="radio" value="0"
                                                                                        disabled checked />
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
                                                                                        type="radio" value="1"
                                                                                        disabled />
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div
                                                                                    class="form-check form-check-custom form-check-solid">
                                                                                    <input class="form-check-input"
                                                                                        name="fdu_{{ $ppdb->id }}"
                                                                                        type="radio" value="0"
                                                                                        disabled checked />
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
                                <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">

                                    <div class="card border shadow-sm">
                                        <div class="card-header">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bold text-gray-800">Biodata Calon Siswa</span>
                                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Periksa dahulu Biodata
                                                    Siswa sebelum disetujui</span>
                                            </h3>
                                        </div>

                                        <div class="card-body">
                                            <div class="w-100">

                                                <!-- BEGIN :: BIODATA SISWA -->
                                                <div class="row mb-10">
                                                    <!--begin::Col-->
                                                    <div class="col-md-8 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required fs-6 fw-bold form-label mb-2">Nama Calon
                                                            Siswa</label>
                                                        <!--end::Label-->
                                                        <!--begin::Row-->
                                                        <div class="row fv-row">
                                                            <!--begin::Col-->
                                                            <div class="col-12">
                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    name="fullname" value="{{ $ppdb->fullname }}"
                                                                    readonly />
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                    </div>
                                                    <!--end::Col-->

                                                    <!--begin::Col-->
                                                    <div class="col-md-4 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required fs-6 fw-bold form-label mb-2">Jenis
                                                            Kelamin</label>
                                                        <!--end::Label-->
                                                        <!--begin::Row-->
                                                        <div class="row fv-row">
                                                            <!--begin::Col-->
                                                            <div class="col-12">
                                                                <input type="text"
                                                                    class="form-control form-control-solid" name="gender"
                                                                    value="{{ $ppdb->gender }}" readonly />
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>




                                                <div class="row mb-10">

                                                    <!--begin::Col-->
                                                    <div class="col-md-3 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required fs-6 fw-bold form-label mb-2">Tempat
                                                            Lahir</label>
                                                        <!--end::Label-->
                                                        <!--begin::Row-->
                                                        <div class="row fv-row">
                                                            <!--begin::Col-->
                                                            <div class="col-12">
                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    name="place_of_birth"
                                                                    value="{{ $ppdb->place_of_birth }}" readonly />
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                    </div>
                                                    <!--end::Col-->

                                                    <!--begin::Col-->
                                                    <div class="col-md-3 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required fs-6 fw-bold form-label mb-2">Tanggal
                                                            Lahir</label>
                                                        <!--end::Label-->
                                                        <!--begin::Row-->
                                                        <div class="row fv-row">
                                                            <!--begin::Col-->
                                                            <div class="col-12">
                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    name="date_of_birth"
                                                                    value="{{ $ppdb->date_of_birth }}" readonly />
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                    </div>
                                                    <!--end::Col-->

                                                    <!--begin::Col-->
                                                    <div class="col-md-3 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required fs-6 fw-bold form-label mb-2">Agama</label>
                                                        <!--end::Label-->
                                                        <!--begin::Row-->
                                                        <div class="row fv-row">
                                                            <!--begin::Col-->
                                                            <div class="col-12">
                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    name="religion" value="{{ $ppdb->religion }}"
                                                                    readonly />
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                    </div>
                                                    <!--end::Col-->

                                                    <!--begin::Col-->
                                                    <div class="col-md-3 fv-row">
                                                        <!--begin::Label-->
                                                        <label
                                                            class="required fs-6 fw-bold form-label mb-2">Kebangsaan</label>
                                                        <!--end::Label-->
                                                        <!--begin::Row-->
                                                        <div class="row fv-row">
                                                            <!--begin::Col-->
                                                            <div class="col-12">
                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    name="nationality" value="{{ $ppdb->nationality }}"
                                                                    readonly />
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>




                                                <div class="row mb-10">
                                                    <!--begin::Col-->
                                                    <div class="col-md-8 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required fs-6 fw-bold form-label mb-2">Alamat</label>
                                                        <!--end::Label-->
                                                        <!--begin::Row-->
                                                        <div class="row fv-row">
                                                            <!--begin::Col-->
                                                            <div class="col-12">
                                                                <textarea name="address" class="form-control form-control-solid" rows="5" required="required">{{ $ppdb->address }}</textarea>
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                <div class="row mb-10">
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="fs-6 fw-bold form-label mb-2">Telephone Rumah</label>
                                                        <!--end::Label-->
                                                        <!--begin::Row-->
                                                        <div class="row fv-row">
                                                            <!--begin::Col-->
                                                            <div class="col-12">
                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    name="home_phone" value="{{ $ppdb->home_phone }}"
                                                                    readonly />
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>


                                                <div class="row mb-10">
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required fs-6 fw-bold form-label mb-2">Asal
                                                            Sekolah</label>
                                                        <!--end::Label-->
                                                        <!--begin::Row-->
                                                        <div class="row fv-row">
                                                            <!--begin::Col-->
                                                            <div class="col-12">
                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    name="school_origin"
                                                                    value="{{ $ppdb->school_origin }}" readonly />
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                <!-- END :: BIODATA SISWA -->



                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
                                    <div class="card border shadow-sm">
                                        <div class="card-header">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bold text-gray-800">Kelengkapan Dokumen</span>
                                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Periksa dahulu dokumen
                                                    Siswa sebelum disetujui</span>
                                            </h3>
                                            <div class="card-toolbar">
                                                <button type="button" class="btn btn-sm btn-success">
                                                    <!--begin::Svg Icon | path: icons/duotune/files/fil018.svg-->
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.5"
                                                                d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Approved
                                                </button>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="kt_file_manager_list" data-kt-filemanager-table="files"
                                                    class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <!--begin::Table row-->
                                                        <tr
                                                            class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                            <th class="min-w-250px">Name</th>
                                                            <th class="min-w-125px" style="width: 250.062px;">Status</th>
                                                            <th class="w-125px sorting_disabled" style="width: 125px;">
                                                            </th>
                                                        </tr>
                                                        <!--end::Table row-->
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody class="fw-semibold text-gray-600">
                                                        </thead>
                                                    <tbody>
                                                        @foreach ($file_uploaded as $file)
                                                            <?php
                                                            $is_uploaded = false;
                                                            $link_image = '#';
                                                            switch ($file['name']) {
                                                                case 'family_card':
                                                                    if ($ppdb->family_card != '') {
                                                                        $is_uploaded = true;
                                                                    }
                                                                    $link_image = $ppdb->family_card;
                                                                    break;
                                                            
                                                                case 'birth_certificate':
                                                                    if ($ppdb->birth_certificate != '') {
                                                                        $is_uploaded = true;
                                                                    }
                                                                    $link_image = $ppdb->birth_certificate;
                                                                    break;
                                                            
                                                                case 'last_report':
                                                                    if ($ppdb->last_report != '') {
                                                                        $is_uploaded = true;
                                                                    }
                                                                    $link_image = $ppdb->last_report;
                                                                    break;
                                                            
                                                                case 'academic_certificate':
                                                                    if ($ppdb->academic_certificate != '') {
                                                                        $is_uploaded = true;
                                                                    }
                                                                    $link_image = $ppdb->academic_certificate;
                                                                    break;
                                                            
                                                                case 'kia_book':
                                                                    if ($ppdb->kia_book != '') {
                                                                        $is_uploaded = true;
                                                                    }
                                                                    $link_image = $ppdb->kia_book;
                                                                    break;
                                                            
                                                                default:
                                                                    break;
                                                            }
                                                            
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <!--begin::Svg Icon | path: icons/duotune/files/fil003.svg-->
                                                                        <span
                                                                            class="svg-icon svg-icon-2x svg-icon-primary me-4">
                                                                            <svg width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path opacity="0.3"
                                                                                    d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22Z"
                                                                                    fill="currentColor"></path>
                                                                                <path
                                                                                    d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z"
                                                                                    fill="currentColor"></path>
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                        <a href="#"
                                                                            class="text-gray-800 text-hover-primary">{{ $file['label'] }}</a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    @if ($is_uploaded)
                                                                        <i
                                                                            class="bi bi-check-circle-fill text-success"></i>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex justify-content-end flex-shrink-0">
                                                                        <?php
                                                                        if ($is_uploaded) {
                                                                            $link_image = asset($link_image);
                                                                        } else {
                                                                            $link_image = 'javascript:void(0)';
                                                                        }
                                                                        ?>
                                                                        @if ($is_uploaded)
                                                                            <a href="{{ $link_image }}" target="_blank"
                                                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                                                <span class="svg-icon svg-icon-5 m-0">
                                                                                    <svg width="24" height="24"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <path opacity="0.3"
                                                                                            d="M18.4 5.59998C18.7766 5.9772 18.9881 6.48846 18.9881 7.02148C18.9881 7.55451 18.7766 8.06577 18.4 8.44299L14.843 12C14.466 12.377 13.9547 12.5887 13.4215 12.5887C12.8883 12.5887 12.377 12.377 12 12C11.623 11.623 11.4112 11.1117 11.4112 10.5785C11.4112 10.0453 11.623 9.53399 12 9.15698L15.553 5.604C15.9302 5.22741 16.4415 5.01587 16.9745 5.01587C17.5075 5.01587 18.0188 5.22741 18.396 5.604L18.4 5.59998ZM20.528 3.47205C20.0614 3.00535 19.5074 2.63503 18.8977 2.38245C18.288 2.12987 17.6344 1.99988 16.9745 1.99988C16.3145 1.99988 15.661 2.12987 15.0513 2.38245C14.4416 2.63503 13.8876 3.00535 13.421 3.47205L9.86801 7.02502C9.40136 7.49168 9.03118 8.04568 8.77863 8.6554C8.52608 9.26511 8.39609 9.91855 8.39609 10.5785C8.39609 11.2384 8.52608 11.8919 8.77863 12.5016C9.03118 13.1113 9.40136 13.6653 9.86801 14.132C10.3347 14.5986 10.8886 14.9688 11.4984 15.2213C12.1081 15.4739 12.7616 15.6039 13.4215 15.6039C14.0815 15.6039 14.7349 15.4739 15.3446 15.2213C15.9543 14.9688 16.5084 14.5986 16.975 14.132L20.528 10.579C20.9947 10.1124 21.3649 9.55844 21.6175 8.94873C21.8701 8.33902 22.0001 7.68547 22.0001 7.02551C22.0001 6.36555 21.8701 5.71201 21.6175 5.10229C21.3649 4.49258 20.9947 3.93867 20.528 3.47205Z"
                                                                                            fill="currentColor"></path>
                                                                                        <path
                                                                                            d="M14.132 9.86804C13.6421 9.37931 13.0561 8.99749 12.411 8.74695L12 9.15698C11.6234 9.53421 11.4119 10.0455 11.4119 10.5785C11.4119 11.1115 11.6234 11.6228 12 12C12.3766 12.3772 12.5881 12.8885 12.5881 13.4215C12.5881 13.9545 12.3766 14.4658 12 14.843L8.44699 18.396C8.06999 18.773 7.55868 18.9849 7.02551 18.9849C6.49235 18.9849 5.98101 18.773 5.604 18.396C5.227 18.019 5.0152 17.5077 5.0152 16.9745C5.0152 16.4413 5.227 15.93 5.604 15.553L8.74701 12.411C8.28705 11.233 8.28705 9.92498 8.74701 8.74695C8.10159 8.99737 7.5152 9.37919 7.02499 9.86804L3.47198 13.421C2.52954 14.3635 2.00009 15.6417 2.00009 16.9745C2.00009 18.3073 2.52957 19.5855 3.47202 20.528C4.41446 21.4704 5.69269 21.9999 7.02551 21.9999C8.35833 21.9999 9.63656 21.4704 10.579 20.528L14.132 16.975C14.5987 16.5084 14.9689 15.9544 15.2215 15.3447C15.4741 14.735 15.6041 14.0815 15.6041 13.4215C15.6041 12.7615 15.4741 12.108 15.2215 11.4983C14.9689 10.8886 14.5987 10.3347 14.132 9.86804Z"
                                                                                            fill="currentColor"></path>
                                                                                    </svg>
                                                                                </span>
                                                                                <!--end::Svg Icon-->
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach


                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_4" role="tabpanel">
                                    <div class="card border shadow-sm">
                                        <div class="card-header">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bold text-gray-800">Pembayaran Formulir</span>
                                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Periksa dahulu bukti
                                                    pembayaran sebelum disetujui</span>
                                            </h3>
                                        </div>

                                        <div class="card-body">

                                        </div>
                                    </div>
                                </div>
                            </div>






                        </div>
                    </div>


                </div>
            </div>

        </div><!-- row -->
    </div><!-- row -->
@endsection
