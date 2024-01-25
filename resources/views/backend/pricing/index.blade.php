@extends('backend.layouts.app')

@section('title', app_name() . ' | Pricing Management')

@section('breadcrumb-links')

@endsection
@section('pagestyle')
@stop

@section('content')
<div id="page-formulir">
    <div class="card">
        <form action="{{ route('admin.import.upload') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-header">
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                    <a href="{{ asset('uploads/file/data_siswa_new.xlsx') }}" class="btn btn-light-success"><i class="bi bi-file-earmark-spreadsheet fs-4 me-2"></i> Download Template</a>
                    <div class="d-flex align-items-center position-relative my-1 ms-15">
                        <input name="file_pricing" class="form-control" type="file" id="formFile" required>
                    </div>
                    <button id="btn-search" type="submit" class="btn btn-flex btn-primary ms-5">Upload Data Siswa PPDB<i class="bi bi-cloud-arrow-up fs-4 ms-4"></i>
                    </button>
                </div>
                <!--end::Toolbar-->
            </div>
        </form>

        <form action="{{ route('admin.import.dapodik') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-header">
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                    <a href="{{ asset('uploads/file/new_check_dapodik.xlsx') }}" target="blank" class="btn btn-light-success"><i class="bi bi-file-earmark-spreadsheet fs-4 me-2"></i> Download Template</a>
                    <div class="d-flex align-items-center position-relative my-1 ms-15">
                        <input name="file_dapodik" class="form-control" type="file" id="formFile" required>
                    </div>
                    <button id="btn-search" type="submit" class="btn btn-flex btn-primary ms-5">Upload Data Siswa DAPODIK<i class="bi bi-cloud-arrow-up fs-4 ms-4"></i></button>
                </div>
                <!--end::Toolbar-->
            </div>
        </form>
        <!--card-body-->
    </div>  
    <div class="card">
        <p><strong>* Pastikan data import DATA SISWA sesuai Format</strong></p>

        <p><strong>* Pastikan data import Dapodik NIS dan NISN Lengkap dan Terisi</strong></p>
    </div>
    {{-- <div style="opacity: 0.1;">
       <strong><a href="{{ route('admin.import.deletedapodik') }}"> Delete Dapodik & PPDB</a></strong> 
    </div>
    <div style="opacity: 0.1;">
        <strong><a href="{{ route('admin.import.deleteallsystem') }}">Delete All Siswa</a></strong> 
    </div> --}}
</div>

@endsection

@section('pagescript')
<script>

</script>
@stop