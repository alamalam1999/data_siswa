@extends('backend.layouts.app')

@section('title', app_name() . ' | Interview Siswa & Orang Tua')

@section('breadcrumb-links')

@endsection

@section('content')
<div class="card">
    <div class="card-header pt-7">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold text-gray-800">TES SELEKSI</span>
            <span class="text-gray-400 mt-1 fw-semibold fs-6">List Data Peserta Tes Seleksi</span>
        </h3>
        <!--end::Title-->
        <!--begin::Toolbar-->
        <div class="card-toolbar">
            <div class="d-flex align-items-center position-relative my-1">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <input type="text" id="search_general" class="form-control form-control-solid w-250px ps-14" placeholder="Cari Nama Peserta">
            </div>
            <div class="m-0">
                <!--begin::Menu toggle-->
                <a href="#" class="btn btn-flex btn-secondary ms-5" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                    <span class="svg-icon svg-icon-6 svg-icon-muted me-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->Filter
                </a>
                <!--end::Menu toggle-->
                <!--begin::Menu 1-->
                <div class="menu menu-sub menu-sub-dropdown w-400px w-md-400px" data-kt-menu="true" id="kt_menu_62c3e6db3d43a" style="">
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
                                    @if(count($schools) > 1)
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
                                        <option value="0">Pilih</option>
                                        <option value="1">Lulus</option>
                                        <option value="2">Konfirmasi Sekolah</option>
                                        <option value="3">Tidak Lulus</option>
                                        <option value="4">Dipertimbangkan</option>
                                        <option value="5">Review BPS</option>
                                        <option value="6">New</option>
                                    </select>
                                </div>
                                <!--end::Switch-->
                            </div>
                         <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                            <button type="button" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
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
                    <table id="ppdb-table" class="table table-rounded border gy-2 gs-4 align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" data-ajax_url="{{ route("admin.interview.get") }}">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-100px w-250px sorting" onclick="sortTable(0)">Registration No</th>
                                <th class="min-w-100px w-250px sorting" onclick="sortTable(1)">Nama Lengkap</th>
                                <th class="min-w-100px sorting" onclick="sortTable(2)">Sekolah</th>
                                <th class="min-w-100px sorting" onclick="sortTable(3)">Kelas</th>
                                <th class="min-w-150px mw-170px sorting" onclick="sortTable(4)">Status</th>
                                <th class="text-end min-w-100px sorting_disabled w-100px" rowspan="1" colspan="1" aria-label="Actions" style="width: 141.766px;"></th>
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

<input type="hidden" name="uri_edit" value="{{ route('admin.interview.detail', '::target::') }}" />

@endsection

@section('pagescript')
<script>
    var registration_schedules =  <?php echo json_encode($registration_schedules); ?>;
    var site_access = <?php echo json_encode($site_access); ?>;
    var is_interviewer = <?php echo ($is_interviewer ? 'true': 'false'); ?>;
    var is_rnd = <?php echo ($is_rnd ? 'true': 'false'); ?>;

    // FTX.PPDB.list.init();

    function sortTable(n) {
                var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                table = document.getElementById("ppdb-table");
                switching = true;
                //Set the sorting direction to ascending:
                dir = "asc"; 
                /*Make a loop that will continue until
                no switching has been done:*/
                while (switching) {
                    //start by saying: no switching is done:
                    switching = false;
                    rows = table.rows;
                    /*Loop through all table rows (except the
                    first, which contains table headers):*/
                    for (i = 1; i < (rows.length - 1); i++) {
                    //start by saying there should be no switching:
                    shouldSwitch = false;
                    /*Get the two elements you want to compare,
                    one from current row and one from the next:*/
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    /*check if the two rows should switch place,
                    based on the direction, asc or desc:*/
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch= true;
                        break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                        }
                    }
                    }
                    if (shouldSwitch) {
                    /*If a switch has been marked, make the switch
                    and mark that a switch has been done:*/
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    //Each time a switch is done, increase this count by 1:
                    switchcount ++;      
                    } else {
                    /*If no switching has been done AND the direction is "asc",
                    set the direction to "desc" and run the while loop again.*/
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                    }
                }
    }
</script>

<script src="{{ asset('assets/js/pages/admin/interview.js') }}?v=1.0.1"></script>

@stop