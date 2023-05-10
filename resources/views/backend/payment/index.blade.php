@extends('backend.layouts.app')

@section('title', app_name() . ' | Payment Management')

@section('breadcrumb-links')

@endsection
@section('pagestyle')
@stop

@section('content')


    <div id="page-formulir">
        <div class="card">
            <div class="card-header pt-7">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Data Kelas</span>
                    <span class="text-gray-400 mt-1 fw-semibold fs-6">List Data Kelas</span>
                </h3>
                <!--end::Title-->
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                    <div class="d-flex align-items-center position-relative my-1 me-5">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                    rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="black"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" id="search_general" class="form-control form-control-solid w-250px ps-14"
                            placeholder="Cari Document No">
                    </div>
                    <div class="d-flex align-items-center position-relative my-1 w-250px">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text"><i class="bi bi-bookmarks-fill fs-4"></i></span>
                            <div class="overflow-hidden flex-grow-1">
                                <select id="search_status" class="form-select rounded-start-0" data-control="select2"
                                    data-placeholder="Payment Status" data-allow-clear="true">
                                    <option></option>
                                    <option value="0">New</option>
                                    <option value="1">Completed</option>
                                    <option value="2">Reject</option>
                                </select>
                            </div>
                        </div>
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
                                                <option value="{{ $school->school_code }}">{{ $school->school_name }}
                                                </option>
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
                                    <label class="form-label fw-semibold">Tipe Pembayaran:</label>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <div>
                                        <select id="tipe_pembayaran" class="form-select form-select-solid">
                                            <option value="     ">ALL</option>
                                            <option value="formulir">Formulir</option>
                                            <option value="updanspp">UP & SPP</option>
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
                            <table id="payment-table"
                                class="table table-rounded border gy-2 gs-4 align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                data-ajax_url="{{ route('admin.payment.get') }}">
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-100px w-250px sorting">Registration No</th>
                                        <th class="w-150px sorting">Tipe Pembayaran</th>
                                        <th class="w-150px sorting">Tanggal Pembayaran</th>
                                        <th class="min-w-150px sorting">Peserta</th>
                                        <th class="min-w-150px sorting">Status Siswa</th>
                                        <th class="min-w-150px sorting">Diskon</th>
                                        <th class="w-100px sorting">Status</th>
                                        <th class="text-end min-w-100px sorting_disabled w-100px" rowspan="1"
                                            colspan="1" aria-label="Actions" style="width: 141.766px;"></th>
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
    </div>



    <div class="modal fade" tabindex="-1" id="kt_modal_payment_formulir">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div id="kt_modal_payment_formulir_body" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Approval Payment</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body p-5">
                    <div class="card">
                        <!--begin::Body-->
                        <div class="card-body p-0">
                            <!--begin::Layout-->
                            <div class="d-flex flex-column flex-xl-row">

                                <div class="flex-lg-row-fluid mb-5 mb-xl-0  me-xl-10">
                                    <!--begin::Invoice 2 content-->
                                    <div class="mt-n1">
                                        <!--begin::Wrapper-->
                                        <div class="m-0 mb-10">
                                            <!--begin::Content-->
                                            <div class="flex-grow-1">
                                                <!--begin::Table-->
                                                <div class="table-responsive border-bottom mb-9">
                                                    <table class="table mb-3">
                                                        <thead>
                                                            <tr class="border-bottom fs-6 fw-bold text-gray-800">
                                                                <th class="min-w-175px pb-2">Deskripsi</th>
                                                                <th class="min-w-100px text-end">Sub Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="payment-detail">
                                                            <tr class="fw-bold text-muted text-gray-600 fs-6">
                                                                <td class="d-flex align-items-center py-2">
                                                                    <div class="d-flex justify-content-start flex-column">
                                                                        <span
                                                                            class="text-gray-600 fw-bold text-hover-primary mb-1 fs-6">Uang
                                                                            Pangkal</span>
                                                                        <span
                                                                            class="text-gray-400 fw-semibold d-block fs-7">(Lunas)</span>
                                                                    </div>
                                                                </td>
                                                                <td class="pt-6 text-dark fw-bold text-end">100000</td>
                                                            </tr>
                                                            <tr class="fw-bold text-muted text-gray-600 fs-6">
                                                                <td class="d-flex align-items-center py-2">

                                                                    <div class="d-flex justify-content-start flex-column">
                                                                        <span
                                                                            class="text-gray-600 fw-bold text-hover-primary mb-1 fs-6">Uang
                                                                            Pangkal</span>
                                                                        <span
                                                                            class="text-gray-400 fw-semibold d-block fs-7">(Lunas)</span>
                                                                    </div>

                                                                </td>
                                                                <td class="pt-6 text-dark fw-bold text-end">0</td>
                                                            </tr>

                                                        </tbody>
                                                        <tfoot>
                                                            <tr class="border-top fs-6 fw-bolder text-gray-700 fs-2">
                                                                <td class="text-dark fw-bolder text-end">
                                                                    TOTAL
                                                                </td>

                                                                <td class="text-dark fw-bolder text-end"
                                                                    id="payment_total">0</td>
                                                            </tr>



                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <div class="m-0">
                                            <a href="#" target="_blank">
                                                <img id="payment-image_confirmation"
                                                src="{{ asset('assets/media/illustrations/misc/blank.jpg') }}"
                                                class="img-fluid zoom border shadow w-100" alt="Bukti Pembayaran">
                                            </a>
                                        </div>
                                        <div id="display2" class="m-0" style="display:none;">
                                            <a href="#" target="_blank">
                                                <img id="payment-image_confirmation_pengajuan"
                                                src="{{ asset('assets/media/illustrations/misc/blank.jpg') }}"
                                                class="img-fluid zoom border shadow w-100" alt="Bukti Pengajuan">
                                            </a>
                                        </div>
                                    </div>
                                    <!--end::Invoice 2 content-->
                                </div>

                                <!--begin::Sidebar-->
                                <div class="m-0">
                                    <!--begin::Invoice 2 sidebar-->
                                    <div
                                        class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 min-w-md-300px p-5 bg-lighten">

                                        <h6 class="mb-5 fw-bolder text-gray-800 text-hover-primary border-bottom py-3">
                                            INFORMASI PEMBAYARAN
                                        </h6>
                                        <input id="payment_id" type="hidden" name="payment_id" value="-1" />


                                        <div class="mb-3">
                                            <div class="fw-semibold text-gray-600 fs-7">Registration No</div>
                                            <div class="fw-bold fs-6 text-gray-800" id="ppdb_documentno">Transfer Bank
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="fw-semibold text-gray-600 fs-7">Sekolah Tujuan</div>
                                            <div class="fw-bold fs-6 text-gray-800" id="ppdb_school">Transfer Bank</div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="fw-semibold text-gray-600 fs-7">Nama Siswa</div>
                                            <div class="fw-bold fs-6 text-gray-800" id="ppdb_fullname">Transfer Bank</div>
                                        </div>
                                        <h6
                                            class="mt-10 mb-5 fw-bolder text-gray-800 text-hover-primary border-bottom py-3">
                                            INFORMASI
                                            PEMBAYARAN
                                        </h6>
                                        <div class="mb-3">
                                            <div class="fw-semibold text-gray-600 fs-7">Metode Pembayaran</div>
                                            <div class="fw-bold fs-6 text-gray-800">Transfer Bank</div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="fw-semibold text-gray-600 fs-7">Bank</div>
                                            <div class="fw-bold text-gray-800 fs-6" id="payment_bank_code">BCA</div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="fw-semibold text-gray-600 fs-7">Nomor Rekening</div>
                                            <div class="fw-bold fs-6 text-gray-800 d-flex align-items-center"
                                                id="payment_account_number">123456789
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="fw-semibold text-gray-600 fs-7">Atas Nama</div>
                                            <div class="fw-bold text-gray-800 fs-6" id="payment_bank_owner_name">BCA</div>
                                        </div>
                                        <div class="mb-3 pb-5 border-bottom">
                                            <div class="fw-bold text-gray-600 fs-2">Nominal Transfer</div>
                                            <div class="fw-bolder text-gray-800 fs-1" id="payment_cost">BCA</div>
                                        </div>


                                        <h6 class="mb-3 fw-bolder text-gray-800 text-hover-primary">KONFIRMASI PEMBAYARAN
                                        </h6>


                                        <!--begin::Title-->
                                        <div class="mb-3">
                                            <div
                                                class="form-check form-check-custom form-check-success form-check-solid mb-5">
                                                <input name="action" class="form-check-input" type="radio"
                                                    value="APPROVE" id="action-approve">
                                                <label class="form-check-label" for="action-approve">Approve</label>
                                            </div>

                                            <div class="form-check form-check-custom form-check-danger form-check-solid">
                                                <input class="form-check-input" type="radio" value="REJECT"
                                                    name="action" id="action-reject">
                                                <label class="form-check-label" for="action-reject">Reject</label>
                                            </div>

                                        </div>


                                        <!--end::Title-->




                                    </div>
                                    <!--end::Invoice 2 sidebar-->
                                </div>
                                <!--end::Sidebar-->

                            </div>
                            <!--end::Layout-->
                        </div>
                        <!--end::Body-->
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button id="btn-payment-action" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <input type="hidden" name="admin_payment_edit" value="{{ route('admin.payment.edit', '::target::') }}" />
    <input type="hidden" name="admin_ppdb_edit" value="{{ route('admin.ppdb.edit', '::target::') }}" />
    <input type="hidden" name="uri_payment_detail" value="{{ route('admin.payment.detail', '::target::') }}" />
    <input type="hidden" name="uri_payment_action" value="{{ route('admin.payment.action') }}" />
    <input type="hidden" name="uri_edit" value="{{ route('admin.ppdb.edit', '::target::') }}" />
@endsection

@section('pagescript')
    <script>
        var registration_schedules = <?php echo json_encode($registration_schedules); ?>;
        var site_access = <?php echo json_encode($site_access); ?>;

        // FTX.Payment.list.init();
    </script>

    <script src="{{ asset('assets/js/pages/admin/payment.js') }}"></script>

@stop
