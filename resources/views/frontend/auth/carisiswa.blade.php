@extends('frontend.layouts.auth')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')

<div class="card-header">
<div class="card-toolbar">
  <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
  <a href="<?php echo asset ('/'); ?>" class="btn btn-sm btn-light" data-kt-initialized="1">
    
      <span class="svg-icon"> Back Home</i>
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-left: 5px">
              <path d="M9.60001 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13H9.60001V11Z" fill="currentColor"></path>
              <path d="M6.2238 13.2561C5.54282 12.5572 5.54281 11.4429 6.22379 10.7439L10.377 6.48107C10.8779 5.96697 11.75 6.32158 11.75 7.03934V16.9607C11.75 17.6785 10.8779 18.0331 10.377 17.519L6.2238 13.2561Z" fill="currentColor"></path>
              <rect opacity="0.3" x="2" y="4" width="2" height="16" rx="1" fill="currentColor"></rect>
          </svg>
      </span>
      <!--begin::Display range-->
      
      <!--end::Display range-->
      <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->

      <!--end::Svg Icon-->
  </a>
  <!--end::Daterangepicker-->
</div>
</div>

<!--begin::Form-->
<div class="d-flex flex-center flex-column flex-lg-row-fluid">

    <div class="text-center">
            <!--begin::Input group-->   
           <div class="card mb-5">
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
                  <div class="card-title" style="padding-top: 9px">
                      <h2></h2>
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
                        
                        <!--end::Label-->
            
                        <!--begin::Cancel-->
                        
                        <!--end::Cancel-->
            
                        <!--begin::Remove-->
                        
                        <!--end::Remove-->
                    </div>
                    <!--end::Image input-->
                </div>
                
                        </div>
                        
                        <div class="col">

                            <div class="row fv-row mb-3">
                                <!--begin::Col-->
                                   <div class="col-xl-6">
                                       <label class="form-label fw-bolder text-dark fs-7" style="padding-right: 240px">Nama</label>
                                       <select class="form-control form-control-lg form-control-solid" id="kelas_utama" name="kelas_utama">
                                          <option value="">Pilih</option>
                                       <option value="2">Kelas 1</option><option value="3">1</option><option value="4">7</option><option value="5">Kelas 4</option></select>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                   <div class="col-xl-6">
                                    <label class="form-label fw-bolder text-dark fs-7"  style="padding-right: 250px">Sekolah</label>
                                        <select class="form-control form-control-lg form-control-solid" id="nama_kelas" name="nama_kelas">
                                          <option value="">Pilih</option>
                                        <option value="2">A - 2</option><option value="3">1 - F</option><option value="4">A-5</option><option value="5">null</option></select>                              
                                   </div>
                                   <!--end::Col-->
                              </div>

                               <!--begin::Input group-->
                       <div class="row fv-row mb-3">
                        <!--begin::Col-->
                          <div class="col-xl-6">
                              <label class="form-label fw-bolder text-dark fs-7"  style="padding-right: 260px">NISN</label>
                              <!--begin::Switch-->
                        <div>
                          <input class="form-control form-control-solid" type="text" value="{{ $nisn }}">
                        </div>
                        <!--end::Switch-->
                          </div>
                         <!--end::Col-->
                         <!--begin::Col-->
                          <div class="col-xl-6">
                              <label class="form-label fw-bolder text-dark fs-7"  style="padding-right: 260px">Kelas</label>
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
                      <div class="row fv-row mb-3">
                        <!--begin::Col-->
                        <div class="col-xl-6">
                              <label class="form-label fw-bolder text-dark fs-7"  style="padding-right: 190px">No. Registrasi</label>
                              <input id="nama_kepala_sekolah" class="form-control form-control-lg form-control-solid" type="text" placeholder="Otomatis muncul jika memilih kelas utama, unit dan wiayah sekolah" name="nama_kepala_sekolah" autocomplete="off">
                        </div>
                       <!--end::Col-->
                       <!--begin::Col-->
                       <div class="col-xl-6">
                              <label class="form-label fw-bolder text-dark fs-7"  style="padding-right: 240px">Agama</label>
                              <input id="nama_wali_kelas" class="form-control form-control-lg form-control-solid" type="text" placeholder="Otomatis muncul jika memilih Nama Kelas" name="nama_wali_kelas" autocomplete="off">
                        </div>
                       <!--end::Col-->
                       </div>

                        <!--begin::Input group-->
                        <div class="row fv-row mb-20">
                          <!--begin::Col-->
                          <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-7"  style="padding-right: 190px">Jenis kelamin</label>
                                <input id="nama_kepala_sekolah" class="form-control form-control-lg form-control-solid" type="text" placeholder="Otomatis muncul jika memilih kelas utama, unit dan wiayah sekolah" name="nama_kepala_sekolah" autocomplete="off">
                          </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-7"  style="padding-right: 200px">Status Siswa</label>
                                <input id="nama_wali_kelas" class="form-control form-control-lg form-control-solid" type="text" placeholder="Otomatis muncul jika memilih Nama Kelas" name="nama_wali_kelas" autocomplete="off">
                          </div>
                        <!--end::Col-->
                        </div>

                        </div>
                        
                      </div>

                                 
</div>
</div>


<div class="footer-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12" style="bottom: 35px";>
                                    <div class="text-center">
                                        <b><p>© Copyright 2023. All Rights Reserved by <a href="https://sekolah-avicenna.sch.id/">Dept. Transformasi Digital BPS YPAP</a></p></b>
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