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
            <form action="" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="d-flex flex-wrap gap-5">       
                <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                    <label class="form-label fw-bolder text-dark">Unit</label>
                    <select id="school_site" name="unit" class="form-control form-control-lg form-control-solid" name="" id="">
                        <option value="PML">PML</option>
                        <option value="JGK">JGK</option>
                        <option value="CNR">CNR</option>
                    </select>
                </div>
                <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                    <label class="form-label fw-bolder text-dark">Jenjang</label>
                    <select id="stage" name="jenjang" class="form-control form-control-lg form-control-solid" name="" id="">
                        <option value="TK">TK</option>
                        <option value="KB">KB</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                    </select>
                </div>
                <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                    <label class="form-label fw-bolder text-dark">Type</label>
                    <select id="checktable" name="type" class="form-control form-control-lg form-control-solid" name="" id="">
                        <option value="ppdb">PPDB</option>
                        <option value="dapodik">DAPODIK</option>
                    </select>
                </div>          
            </div>
        </form>
        </div>
        <!--end::Card body-->
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
                    <select id="kelas_utama" class="form-control mb-4" name="kategori_kelas" required>

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
    $(document).ready(function() {   
        var school_site = document.getElementById("school_site").value;
        var stage  = document.getElementById("stage").value;
        var checkppdb = document.getElementById("checktable").value;

        $('#checktable').change(function() {
            var checkppdb = $(this).val();
            location.reload();
        })

        $('#stage').change(function() {
            var stage  = $(this).val();
            location.reload();          
        });

        $('#school_site').change(function() {
            var school_site  = $(this).val();
            location.reload();          
        });
                $.ajax({
                    type: "GET",
                    url:  hostBaseUrl+"admin/fetch-kelas?object="+checkppdb,
                    dataType: "json",
                    success: function (response) {   
                        var lookup = {};
                        var items = response.kelas;
                        var result = [];
                        for (var item, i = 0; item = items[i++];) {
                            if (school_site == item.school_site && stage == item.stage) {
                                var classes = item.classes;
                                    if (!(classes in lookup)) {
                                        lookup[classes] = 1;
                                        result.push(classes);
                                        // alert(result);
                                        $('#kelas_utama').append(
                                            '<option value="'+classes+'">'+classes+'</option>'
                                        ); 
                                    }
                            }
                        }
                    }
                });  
    });
</script>


@stop