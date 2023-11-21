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
                    <a href="#" class="btn btn-light-success"><i class="bi bi-file-earmark-spreadsheet fs-4 me-2"></i> Download Template</a>
                    <div class="d-flex align-items-center position-relative my-1 ms-15">
                        <input name="file_pricing" class="form-control" type="file" id="formFile" required>
                    </div>
                    <button id="btn-search" type="submit" class="btn btn-flex btn-primary ms-5">Upload Data Siswa PPDB<i class="bi bi-cloud-arrow-up fs-4 ms-4"></i>
                    </button>
                </div>
                <!--end::Toolbar-->
            </div>
        </form>

            <div class="card-header">
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                    <form action="{{ route('admin.import.dapodik') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <a href="#" class="btn btn-light-success"><i class="bi bi-file-earmark-spreadsheet fs-4 me-2"></i> Download Template</a>
                        <div class="d-flex align-items-center position-relative my-1 ms-15">
                            <input name="file_dapodik" class="form-control" type="file" id="formFile" required>
                        </div>
                        <button id="btn-search" type="submit" class="btn btn-flex btn-primary ms-5">Upload Data Siswa DAPODIK<i class="bi bi-cloud-arrow-up fs-4 ms-4"></i></button>
                    </form>
                        <button id="btn-search" type="submit" class="btn btn-flex btn-primary ms-5">Data Dapodik Delete <i class="bi bi-cloud-arrow-up fs-4 ms-4"></i></button>
                </div>
                <!--end::Toolbar-->
            </div>
        <!--card-body-->
    </div>  
    <div>
        <a href="{{ route('admin.import.deletedapodik') }}"> Delete Dapodik</a>
    </div>
    <div>
        <a href="{{ route('admin.import.deleteallsystem') }}">Delete All Siswa</a>
    </div>
</div>

@endsection

@section('pagescript')
<script>

</script>
@stop