@extends('frontend.layouts.auth')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')



<!--begin::Form-->
<div class="d-flex flex-center flex-column flex-lg-row-fluid">

    <div class="text-center">
            <!--begin::Input group-->   
           <div class="card mb-3">
            <div class="card-header bg-light">
                <!--begin::Title-->
                <h1 class="card-title card-body align-items-center d-flex justify-content-center">
                    <span class="card-label fw-bolder text-dark">DATA PELAJAR</span>
                </h1>
                <!--end::Title-->
            </div>
          </div>

     <div class="row">
            <div class="col-3">

              <div class="card-header mt-7 mb-7">
                  <!--begin::Card title-->
                  <div class="card-title">
                      <h2>Fhoto</h2>
                  </div>
                  <!--end::Card title-->
              </div>
                                       
                <div class="card-body text-center pt-0">
                    <!--begin::Image input-->
                            
                    <div class="image-input image-input-outline image-input-placeholder image-input-changed" data-kt-image-input="true">
                        <!--begin::Preview existing avatar-->
                          <div class="image-input-wrapper w-165px h-200px" style="background-image: url(
                          
                            );"></div>                                                          <!--end::Preview existing avatar-->
            
                        <!--begin::Label-->
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                            <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
                            <!--begin::Inputs-->
                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                            <input type="hidden" name="avatar_remove" value="1">
                            <!--end::Inputs-->
                        </label>
                        <!--end::Label-->
            
                        <!--begin::Cancel-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
                            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>            </span>
                        <!--end::Cancel-->
            
                        <!--begin::Remove-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1">
                            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>            </span>
                        <!--end::Remove-->
                    </div>
                    <!--end::Image input-->
                </div>
                
                        </div>
                        
                        <div class="col">

                            <div class="row fv-row mb-10">
                                <!--begin::Col-->
                                   <div class="col-xl-6">
                                       <label class="form-label fw-bolder text-dark fs-6">Kelas Utama</label>
                                       <select class="form-control form-control-lg form-control-solid" id="kelas_utama" name="kelas_utama">
                                          <option value="">Pilih</option>
                                       <option value="2">Kelas 1</option><option value="3">1</option><option value="4">7</option><option value="5">Kelas 4</option></select>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                   <div class="col-xl-6">
                                    <label class="form-label fw-bolder text-dark fs-6">Nama Kelas</label>
                                        <select class="form-control form-control-lg form-control-solid" id="nama_kelas" name="nama_kelas">
                                          <option value="">Pilih</option>
                                        <option value="2">A - 2</option><option value="3">1 - F</option><option value="4">A-5</option><option value="5">null</option></select>                              
                                   </div>
                                   <!--end::Col-->
                              </div>

                               <!--begin::Input group-->
                       <div class="row fv-row mb-10">
                        <!--begin::Col-->
                          <div class="col-xl-6">
                              <label class="form-label fw-bolder text-dark fs-6">Unit</label>
                              <!--begin::Switch-->
                        <div>
                          <select id="" class="form-select form-select-solid">
                          <option value="">Pilih Unit</option>
                          <option value="">KB</option>
                          <option value="">TK</option>
                          <option value="">SD</option>
                          <option value="">SMP</option>
                          <option value="">SMA</option>
                          </select>
                        </div>
                        <!--end::Switch-->
                          </div>
                         <!--end::Col-->
                         <!--begin::Col-->
                          <div class="col-xl-6">
                              <label class="form-label fw-bolder text-dark fs-6">Wilayah</label>
                        <!--begin::Switch-->
                        <div>
                          <select id="" class="form-select form-select-solid">
                          <option value="">Pilih Wilayah</option>
                          <option value="">Jagakarsa</option>
                          <option value="">Cinere</option>
                          <option value="">Pamulang</option>
                          </select>
                        </div>
                        <!--end::Switch-->
                          </div>
                          <!--end::Col-->
                       </div>

                         <!--begin::Input group-->
                      <div class="row fv-row mb-10">
                        <!--begin::Col-->
                        <div class="col-xl-6">
                              <label class="form-label fw-bolder text-dark fs-6">Nama Kepala Sekolah</label>
                              <input id="nama_kepala_sekolah" class="form-control form-control-lg form-control-solid" type="text" placeholder="Otomatis muncul jika memilih kelas utama, unit dan wiayah sekolah" name="nama_kepala_sekolah" autocomplete="off">
                        </div>
                       <!--end::Col-->
                       <!--begin::Col-->
                       <div class="col-xl-6">
                              <label class="form-label fw-bolder text-dark fs-6">Nama Wali Kelas</label>
                              <input id="nama_wali_kelas" class="form-control form-control-lg form-control-solid" type="text" placeholder="Otomatis muncul jika memilih Nama Kelas" name="nama_wali_kelas" autocomplete="off">
                        </div>
                       <!--end::Col-->
                       </div>

                        </div>
                        
                      </div>

                    

                 

                    


                   
   

                 
</div>
</div>
<!--end::Footer-->





@endsection

@push('after-scripts')
@if(config('access.captcha.login'))
@captchaScripts
@endif
@endpush