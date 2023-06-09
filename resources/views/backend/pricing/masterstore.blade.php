@extends('backend.layouts.app')

@section('title', app_name() . ' | Pricing Management')

@section('breadcrumb-links')

@endsection
@section('pagestyle')
@stop

@section('content')

<div class="card">
    <div class="card-header pt-7 pb-7">
        <div>
            <div class="col">
                <label for=""> <strong style="font-size: 20px">Master Kelas</strong></label>
            </div>
            
            <div class="col">
                List Master Kelas
            </div>
            
        </div>          
    </div>
    
</div>

<div class="card">
    <!--begin::Card header-->
    <div class="card-header bg-light">
        <div class="card-title">
            <h2>Update Kelas</h2>
        </div>
    </div>
    <!--end::Card header-->


        <!--begin::Card body-->
        <div class="card-body">
            <!--begin::Input group-->

            <form action="{{ route('admin.masterinsert.class') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

            <div class="d-flex flex-wrap gap-5">
                {{-- input 1 --}}
                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">               
                <!--begin::Label-->
                <label class="form-label">Kategori Kelas</label>
                <!--end::Label-->

                <!--begin::Input-->
                <input type="text" name="kategori_kelas" class="form-control mb-2" value="">
                <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root">
                    <!--begin::Label-->
                    <label class="form-label">Nama Kelas</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="text" name="nama_kelas" class="form-control mb-2" value="">
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                {{-- input 1 --}}    
            </div>

            <div class="d-flex flex-wrap gap-5">
                {{-- Input 2 --}}
                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">               
                    <!--begin::Label-->
                    <label class="form-label">Unit</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="text" name="unit" class="form-control mb-2" value="">
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root">
                    <!--begin::Label-->
                    <label class="form-label">Sekolah</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="text" name="sekolah" class="form-control mb-2" value="">
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                {{-- Input 2 --}}
            </div>

            <div class="d-flex flex-wrap gap-5">
                {{-- Input 2 --}}
                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">               
                    <!--begin::Label-->
                    <label class="form-label">Kepala Sekolah</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="text" name="kepala_sekolah" class="form-control mb-2" value="">
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root">
                    <!--begin::Label-->
                    <label class="form-label">Wali Kelas</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="text" name="wali_kelas" class="form-control mb-2" value="">
                    <!--end::Input-->

                    <input type="hidden" name="id_item" value="">
                </div>
                <!--end::Input group-->
                {{-- Input 2 --}}
            </div>
            <!--end::Input group-->

            <div class="card-body d-flex justify-content-end">
                    <!--begin::Button-->             
                    <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                        <span class="indicator-label">
                            Save
                        </span>
                        <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>            
                    <!--end::Button-->      
            </div>

        </form>
        </div>

</div>







@endsection


@section('pagescript')
    <script>
        


    </script>


@stop