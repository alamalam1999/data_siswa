@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.faqs.management'))

@section('breadcrumb-links')
@include('backend.faqs.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card card-flush">
    <!--begin::Card header-->
    <div class="card-header align-items-center py-5 gap-2 gap-md-5" data-select2-id="select2-data-124-vahm">
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <input type="text" class="form-control form-control-solid w-250px ps-14" placeholder="Cari Nama Peserta">
            </div>
            <!--end::Search-->
        </div>
        <!--end::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar flex-row-fluid justify-content-end gap-5" data-select2-id="select2-data-123-2fgf">
            <!--begin::Flatpickr-->
            <div class="input-group w-250px">
                <select class="form-control">
                    @foreach($academic_years as $ay)
                    <option value="{{ $ay->id }}">{{ $ay->academic_label}}</option>
                    @endforeach
                </select>
            </div>
            <!--end::Flatpickr-->
            <div class="w-350px mw-350px" data-select2-id="select2-data-122-ik13">
                <select class="form-control">
                    @foreach($registration_schedules as $rs)
                    <option value="{{ $rs->id }}">{{ $rs->description}}</option>
                    @endforeach
                </select>
            </div>
            <!--begin::Add product-->
            <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/add-product.html" class="btn btn-primary">Cari</a>
            <!--end::Add product-->
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Table-->
        <div id="kt_ecommerce_sales_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="table-responsive">
                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="table-ppdb">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th class="min-w-100px w-250px sorting">Registration No</th>
                            <th class="min-w-100px w-250px sorting">Nama Lengkap</th>
                            <th class="min-w-100px sorting">Sekolah</th>
                            <th class="min-w-100px sorting">Pembayaran</th>
                            <th class="min-w-100px sorting">Biodata</th>
                            <!-- <th class="min-w-100px sorting">Kelas</th> -->
                            <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 141.766px;"></th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-bold text-gray-600">
                        @foreach($ppdbs as $ppdb)
                        <tr>
                            <td>
                                <a href="{{ route('admin.ppdb.edit', $ppdb->id) }}" class="text-dark fw-bolder text-hover-primary d-block fs-5">{{ $ppdb->document_no }}</a>
                                <span class="text-muted fw-bold text-muted d-block fs-9">{{ $ppdb->schedule_name }}</span>
                            </td>
                            <td>
                                <a href="# class=" text-dark fw-bolder text-hover-primary d-block fs-4">{{ $ppdb->fullname }}</a>
                            </td>
                            <td>
                                <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $ppdb->school }}</span>
                                <span class="text-muted fw-bold text-muted d-block fs-7">{{ $ppdb->stage }} - {{ $ppdb->classes }}</span>
                            </td>
                            <td>
                                @switch($ppdb->is_verify)
                                @case(0)
                                <span class="badge badge-light fs-7"><i class="bi bi-square fs-3"></i></span>
                                @break

                                @case(1)
                                <span class="badge badge-light-success fs-7"><i class="bi bi-check2-square text-success fs-1"></i></span>
                                @break
                                @endswitch
                            </td>
                            <td>
                                @switch($ppdb->is_completed_bio)
                                @case(0)
                                <span class="badge badge-light fs-7"><i class="bi bi-square fs-3"></i></span>
                                @break

                                @case(1)
                                <span class="badge badge-light-success fs-7"><i class="bi bi-check2-square text-success fs-1"></i></span>                                
                                @break
                                @endswitch
                            </td>

                            <!--begin::Action=-->
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="{{ route('admin.ppdb.edit', $ppdb->id) }}" class="menu-link px-3">Lihat</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                            <!--end::Action=-->
                        </tr>
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
            </div>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>

@endsection

@section('pagestyle')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('pagescript')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}">
</script>

<script>
    $("#table-ppdb").DataTable();
</script>
@stop