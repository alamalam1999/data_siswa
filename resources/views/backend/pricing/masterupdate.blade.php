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
                <label for=""> <strong style="font-size: 20px">Master Kelas Update</strong></label>
            </div>
            
            <div class="col">
                List Master Kelas
            </div>
            
        </div>       
    </div>
    

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header bg-light">
            <div class="card-title">
                <h2>Edit Kelas</h2>
            </div>
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body">
            <!--begin::Input group-->

            <form action="{{ route('admin.masterdone.class') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

            <div class="d-flex flex-wrap gap-5">
                {{-- input 1 --}}
                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">               
                   <!--begin::Label-->
                   <label class="form-label fw-bolder text-dark">Kelas Utama</label>
                   <!--end::Label-->
                    <select class="form-control mb-4" name="kategori_kelas" required>
                        <option value="{{ $masterupdate->kategori }}">{{ $masterupdate->kategori }}</option>
                        <option value="TK-A">TK-A</option>
                        <option value="TK-B">TK-B</option>
                        <option value="KB-A">KB-A</option>
                        <option value="KB-B">KB-B</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                <!--end::Input-->
                   <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root">
                    <!--begin::Label-->
                    <label class="form-label fw-bolder text-dark">Sub Kelas</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="text" name="nama_kelas" class="form-control mb-4" value="{{ $masterupdate->kelas }}">
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
                    <label class="form-label fw-bolder text-dark">Unit</label>
                    <!--end::Label-->
 
                    <!--begin::Input-->
                    <input type="text" name="unit" class="form-control mb-4" value="{{ $masterupdate->unit }}">
                    <!--end::Input-->
                 </div>
                 <!--end::Input group-->

                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root">
                    <!--begin::Label-->
                    <label class="form-label fw-bolder text-dark">Sekolah</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="text" name="sekolah" class="form-control mb-4" value="{{ $masterupdate->sekolah }}">
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
                    <label class="form-label fw-bolder text-dark">Kepala Sekolah</label>
                    <!--end::Label-->
 
                    <!--begin::Input-->
                    <input type="text" name="kepala_sekolah" class="form-control mb-4" value="{{ $masterupdate->kepala_sekolah }}">
                    <!--end::Input-->
                 </div>
                 <!--end::Input group-->

                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root">
                    <!--begin::Label-->
                    <label class="form-label fw-bolder text-dark">Wali Kelas</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="text" name="wali_kelas" class="form-control mb-4" value="{{ $masterupdate->wali_kelas }}">
                    <!--end::Input-->

                    <input type="hidden" name="id_item" value="{{ $masterupdate->id }}">
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
       
        
      
        <!--end::Card header-->
    </div>  
</div>







@endsection


@section('pagescript')
    <script>
        


    </script>


@stop