@extends('backend.layouts.app')

@section('title', app_name() . ' | PPDB Management')

@section('breadcrumb-links')

@endsection

@section('content')
    <div class="card">
        <div class="card-header pt-7">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800">PPDB</span>
                <span class="text-gray-400 mt-1 fw-semibold fs-6">List Data Peserta</span>
            </h3>
            <!--end::Title-->
            <!--begin::Toolbar-->
            <div class="card-toolbar">
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="black"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" id="search_general" class="form-control form-control-solid w-250px ps-14"
                        placeholder="Cari Nama Peserta">
                </div>
                <div class="m-0">
                    <!--begin::Menu toggle-->
                    <a href="#" class="btn btn-flex btn-secondary ms-5" data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                        <span class="svg-icon svg-icon-6 svg-icon-muted me-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Filter
                    </a>
                    <!--end::Menu toggle-->
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-400px w-md-400px" data-kt-menu="true"
                        id="kt_menu_62c3e6db3d43a" style="">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bold">Filter Options</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Menu separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Menu separator-->
                        <!--begin::Form-->
                        <div class="px-7 py-5">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold">Tahun Ajaran:</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div>
                                    <select id="academic-year" class="form-select form-select-solid">
                                        @foreach ($academic_years as $item)
                                            <option value="{{ $item->id }}">{{ $item->academic_label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold">Jadwal Pendaftaran:</label>
                                <!--end::Label-->
                                <div>
                                    <select id="registration-schedule" class="form-select form-select-solid">
                                        <option value="ALL">All</option>
                                    </select>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold">Sekolah:</label>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <div>
                                    <select id="school" class="form-select form-select-solid">
                                        @if (count($schools) > 1)
                                            <option value="ALL">ALL</option>
                                        @endif
                                        @foreach ($schools as $school)
                                            <option value="{{ $school->school_code }}">{{ $school->school_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--end::Switch-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold">Kelas:</label>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <div>
                                    <select id="stage" class="form-select form-select-solid">
                                    </select>
                                </div>
                                <!--end::Switch-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold">Status:</label>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <div>
                                    <select id="search_status" class="form-select form-select-solid">
                                        <option value="">Pilih</option>
                                        <option value="0">Pendaftar Baru</option>
                                        <option value="1">Verifikasi Formulir</option>
                                        <option value="2">Tes Seleksi</option>
                                        <option value="3">Pembayaran UP & SPP</option>
                                        <option value="4">Ver. Pembayaran</option>
                                        <option value="5">Daftar Ulang</option>
                                        <option value="6">Ver. Daftar Ulang</option>
                                        <option value="7">Proses Selesai</option>
                                    </select>
                                </div>
                                <!--end::Switch-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                             <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold">Status Siswa:</label>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <div>
                                    <select id="status_siswa" class="form-select form-select-solid">
                                        <option value="">ALL</option>
                                        <option value="siswa dalam">Siswa Dalam</option>
                                        <option value="siswa luar">Siswa Luar</option>
                                    </select>
                                </div>
                                <!--end::Switch-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                               <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold">Diskon:</label>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <div>
                                    <select id="diskon" class="form-select form-select-solid">
                                        <option value="">ALL</option>
                                        <option value="all check">All Check</option>
                                        <option value="Sudah Validasi">Sudah Validasi</option>
                                        <option value="Belum Validasi">Belum Validasi</option>
                                    </select>
                                </div>
                                <!--end::Switch-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2"
                                    data-kt-menu-dismiss="true">Reset</button>
                                <button type="button" class="btn btn-sm btn-primary"
                                    data-kt-menu-dismiss="true">Apply</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Menu 1-->
                </div>
                <button id="btn-search" type="button" class="btn btn-flex btn-primary ms-5">
                    Search
                </button>
            </div>
            <!--end::Toolbar-->
        </div>
        <div class="card-body">
            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table id="ppdb-table"
                            class="table table-rounded border gy-2 gs-4 align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                            data-ajax_url="{{ route('admin.ppdb.get') }}">
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-100px w-250px sorting">Registration No</th>
                                    <th class="min-w-100px w-250px sorting">Nama Lengkap</th>
                                    <th class="min-w-100px sorting">Sekolah</th>
                                    <th class="min-w-100px sorting">Kelas</th>
                                    <th class="min-w-150px sorting">Status Siswa</th>
                                    <th class="min-w-150px sorting">Diskon</th>
                                    <th class="min-w-200px sorting" style="width: 150px;">Status</th>
                                    <th class="text-end min-w-100px sorting_disabled w-100px" rowspan="1" colspan="1"
                                        aria-label="Actions" style="width: 141.766px;"></th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--col-->
            </div>
            <!--row-->

        </div>
        <!--card-body-->
    </div>
    <!--card-->

    <div class="modal fade" tabindex="-1" id="kt_modal_status">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">INFORMATION STATUS</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body p-0">
                    <div class="table-responsive">
                        <table class="table table-row-dashed table-row-gray-300 gy-2 gs-6">
                            <tbody>
                                <tr>
                                    <td class="w-200px"><button type="button" class="btn btn-sm w-100 ppdb-bg-status-new">PENDAFTAR BARU</button></td>
                                    <td class="py-4">PENDAFTAR BARU</td>
                                </tr>
                                <tr>
                                    <td><button type="button" class="btn btn-sm w-100 ppdb-bg-status-approval_formulir">VERIFIKASI FORMULIR</button></td>
                                    <td class="py-4">MENUNGGU VERIFIKASI FORMULIR</td>
                                </tr>
                                <tr>
                                    <td><button type="button" class="btn btn-sm w-100 ppdb-bg-status-interview">TES SELEKSI</button></td>
                                    <td class="py-4">PROSES TES SELEKSI </td>
                                </tr>
                                <tr>
                                    <td><button type="button" class="btn btn-sm w-100 ppdb-bg-status-payment">PEMBAYARAN UP & SPP</button></td>
                                    <td class="py-4">PEMBAYARAN UP & SPP </td>
                                </tr>
                                <tr>
                                    <td><button type="button" class="btn btn-sm w-100 ppdb-bg-status-approval_payment">VER. PEMBAYARAN</button></td>
                                    <td class="py-4">MENUNGGU VERIFIKASI PEMBAYARANG UP & SPP </td>
                                </tr>
                                <tr>
                                    <td><button type="button" class="btn btn-sm w-100 ppdb-bg-status-re_register">DAFTAR ULANG</button></td>
                                    <td class="py-4">PROSES PENGISIAN BERKAS DAFTAR ULANG</td>
                                </tr>
                                <tr>
                                    <td><button type="button" class="btn btn-sm w-100 ppdb-bg-status-approval_register">VER. DAFTAR ULANG</button></td>
                                    <td class="py-4">MENUNGGU VERFIKASI BERKAS DAFTAR ULANG  </td>
                                </tr>
                                <tr>
                                    <td><button type="button" class="btn btn-sm w-100 ppdb-bg-status-completed">PROSES SELESAI</button></td>
                                    <td class="py-4">PESERTA DIDIK TELAH MENYELESAIKAN SELURUH ADMINISTRASI PPDB </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="uri_edit" value="{{ route('admin.ppdb.edit', '::target::') }}" />
@endsection

@section('pagescript')
    <script>
        var registration_schedules = <?php echo json_encode($registration_schedules); ?>;
        var site_access = <?php echo json_encode($site_access); ?>;

        console.log(registration_schedules);
        console.log(site_access);

        // FTX.PPDB.list.init();
    </script>

    <script src="{{ asset('assets/js/pages/admin/ppdb.js') }}"></script>

@stop
