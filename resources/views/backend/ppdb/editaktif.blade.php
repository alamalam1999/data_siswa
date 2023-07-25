<?php $__env->startSection('title', __('labels.backend.access.ppdb.management') . ' | ' . __('labels.backend.access.ppdb.edit')); ?>

<?php $__env->startSection('breadcrumb-links'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
    <div class="col">


        <div class="card overflow-hidden h-xl-100 mb-10">
            <div class="card-header border-bottom-1">
                <h3 class="card-title text-gray-800 fw-bold">No. Registrasi (Kode Siswa) : <?php echo e($ppdb->document_no); ?></h3>

                <div class="card-toolbar">
                    <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
                    <a href="<?php echo e(route('admin.ppdb.index')); ?>" class="btn btn-sm btn-light d-flex align-items-center px-4" data-kt-initialized="1">
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.60001 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13H9.60001V11Z" fill="currentColor"></path>
                                <path d="M6.2238 13.2561C5.54282 12.5572 5.54281 11.4429 6.22379 10.7439L10.377 6.48107C10.8779 5.96697 11.75 6.32158 11.75 7.03934V16.9607C11.75 17.6785 10.8779 18.0331 10.377 17.519L6.2238 13.2561Z" fill="currentColor"></path>
                                <rect opacity="0.3" x="2" y="4" width="2" height="16" rx="1" fill="currentColor"></rect>
                            </svg>
                        </span>
                        <!--begin::Display range-->
                        <div class="text-gray-600 fw-bold  ms-2 me-0">Back List</div>
                        <!--end::Display range-->
                        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->

                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Daterangepicker-->
                </div>
            </div>
            <div class="card-body">
                <div class="row border-bottom-1">


                    <div class="col-lg-3">
                        <div class="card border mb-5">
                            <div class="card-body p-5">
                              <div class="form-floating mb-3">
                                <div class="col">

                                    <!-- Upload image input-->
                                    <div class="card card-flush py-4">
                                      <!--begin::Card header-->
                                      <div class="card-header">
                                        
                                      </div>
                                      <!--end::Card header-->
                                  
                                      <!--begin::Card body-->
                                      <div class="card-body text-center pt-0">
                                        <form action="<?php echo e(route('admin.upload_fhoto.get')); ?>" method="POST" enctype="multipart/form-data">
                                          <?php echo e(csrf_field()); ?>
                                          <!--begin::Image input-->

                                           <!--begin::Card title-->
                                           <div class="card-title" style="padding-left: 5px">
                                            <h5>Pas Photo Siswa</h5>
                                        </div>
                                        <!--end::Card title-->
                                                  
                                          <div class="image-input image-input-outline image-input-placeholder mb-3 image-input-changed" data-kt-image-input="true">
                                              <!--begin::Preview existing avatar-->
                                              <?php
                                                  $foto = "";
                                                  if($foto_siswa != null && $foto_siswa != "" && !empty($foto_siswa)) {
                                                      $foto = $foto_siswa->fhoto_siswa;
                                                  }
                                              ?>
                                                <div class="image-input-wrapper w-165px h-200px" style="background-image: url(&quot;data:image/png;base64,{{ $foto }}&quot;);"></div>                                                          <!--end::Preview existing avatar-->
                                  
                                              <!--begin::Label-->
                                              <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                                                  <i class="bi bi-cloud-arrow-up-fill fs-7" style="color: #45f215"><span class="path1"></span><span class="path2"></span></i>
                                                  <!--begin::Inputs-->
                                                  <input type="file" name="fhoto_siswa" >
                                                  <input type="hidden" name="avatar_remove" value="1">
                                                  <!--end::Inputs-->
                                              </label>
                                              <!--end::Label-->
                                  
                                              <!--begin::Cancel-->
                                              <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
                                                  <i class="bi bi-trash-fill fs-7" style="color: #ed1014"><span class="path1"></span><span class="path2"></span></i>            </span>
                                              <!--end::Cancel-->
                                  
                                              <!--begin::Remove-->
                                              <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1">
                                                  <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>            </span>
                                              <!--end::Remove-->
                                          </div>
                                          <!--end::Image input-->
                                  
                                          <!--begin::Description-->
                                          <div class="text-muted fs-7">Set the phot thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
                                          <!--end::Description-->                                   
                                        <button class="btn btn-primary btn-sm fs-9" value="{{ $ppdb->ppdb_id }}" name="id_ppdb" >Submit</button>                                    
                                        </form>
                                      </div>
                                      <!--end::Card body-->
                                  </div>
                                    <!-- Uploaded image area-->
                                    <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p>
                                    <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card mb-4 bg-white border">

                            <div class="card-body">
                                <h4 class="card-title">
                                    <?php echo e($user_account->name); ?><br />
                                </h4>

                                <p class="card-text">
                                    <small>
                                        <i class="fas fa-envelope"></i> <?php echo e($user_account->email); ?><br />
                                        <i class="fas fa-calendar-check"></i> <?php echo app('translator')->get('strings.frontend.general.joined'); ?>
                                        <?php echo e(timezone()->convertToLocal($user_account->created_at, 'F jS, Y')); ?>

                                    </small>
                                </p>

                                <?php
                                $wa_number = $user_account->phone;
                                if (substr($wa_number, 0, 1) == '0') {
                                    $wa_number = '62' . substr($wa_number, 1);
                                }
                                ?>
                                <a href="https://wa.me/<?php echo e($wa_number); ?>" target="_blank" class="btn btn-light-primary d-flex align-items-center me-5 me-xl-13">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-30px symbol-circle me-3">
                                        <i class="bi bi-whatsapp text-success fs-1"></i>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Info-->
                                    <div class="m-0">
                                        <span class="fw-semibold d-block fs-8"> Whatsapp / Call</span>
                                        <span class="fw-bold text-gray-800 text-hover-success fs-7"><?php echo e($user_account->phone); ?></span>
                                    </div>
                                    <!--end::Info-->
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9">

                        <div class="row">
                            <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
                                <li class="nav-item col-lg-3" >
                                    <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">
                                        <div class="card card-flush">
                                            <div class="card-body p-5 py-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-3">
                                                        <i class="bi bi-person-square fs-3x" style="color:#5a595a;"></i>
                                                    </div>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <div class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            PROFILE</div>
                                                        <span class="text-gray-400 fw-semibold d-block fs-7">
                                                            Data Siswa</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item col-lg-3" >
                                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">
                                        <div class="card card-flush">
                                            <div class="card-body p-5 py-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-3">
                                                        <i class="bi bi-people-fill fs-3x" style="color:#5a595a;"></i>
                                                    </div>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <div class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            DATA</div>
                                                        <span class="text-gray-400 fw-semibold d-block fs-7">Orangtua/Wali</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item col-lg-3" >
                                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_3">
                                        <div class="card card-flush">
                                            <div class="card-body p-5 py-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-3">
                                                        <i class="bi bi-file-earmark-pdf-fill fs-3x" style="color:#5a595a;"></i>
                                                    </div>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <div class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            DOKUMEN</div>
                                                        <span class="text-gray-400 fw-semibold d-block fs-7">Pemberkasan</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item col-lg-3" >
                                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_4">
                                        <div class="card card-flush">
                                            <div class="card-body p-5 py-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-3">
                                                        <i class="bi bi-hourglass-split fs-3x" style="color:#5a595a;"></i>
                                                    </div>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <div class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            RIWAYAT</div>
                                                        <span class="text-gray-400 fw-semibold d-block fs-7">PPDB
                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                              
                            </ul>
                        </div>

                <div class="tab-content" id="myTabContent">
 
                            <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                                <div class="card border shadow-sm">
                                    <div class="card-header bg-light">
                                        <!--begin::Title-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bolder text-dark">BIODATA SISWA</span><span style="color:#5a595a">diisi pada saat pendaftaraan</span>
                                        </h3>
                                        <!--end::Title-->
                                    </div>

                                    <div class="card-body">

                                        <div class="w-100">

                                      <!-- BEGIN :: BIODATA SISWA -->
                                      <div class="row mb-10">
                                        <!--begin::Col-->
                                        <div class="col-md-8 fv-row">
                                            <!--begin::Label-->
                                            <label class="text-muted fs-6 fw-bold form-label mb-2">Nama
                                                Siswa</label>
                                            <!--end::Label-->
                                            <!--begin::Row-->
                                            <div class="row fv-row fv-plugins-icon-container">
                                                <!--begin::Col-->
                                                <div class="col-12">
                                                    <input type="text" class="form-control form-control-transparent border-bottom" name="fullname" value="<?php echo e($ppdb->fullname); ?>" readonly>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <!--begin::Label-->
                                            <label class="text-muted fs-6 fw-bold form-label mb-2">Jenis
                                                Kelamin</label>
                                            <!--end::Label-->
                                            <!--begin::Row-->
                                            <div class="row fv-row fv-plugins-icon-container">
                                                <!--begin::Col-->
                                                <div class="col-12">
                                                    <input type="text" class="form-control form-control-transparent border-bottom" name="gender" value="<?php echo e($ppdb->gender); ?>" readonly>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->
                                      </div>

                                      <div class="row mb-10">

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <!--begin::Label-->
                                            <label class="text-muted fs-6 fw-bold form-label mb-2">Tempat
                                                Lahir</label>
                                            <!--end::Label-->
                                            <!--begin::Row-->
                                            <div class="row fv-row fv-plugins-icon-container">
                                                <!--begin::Col-->
                                                <div class="col-12">
                                                    <input type="text" class="form-control form-control-transparent border-bottom" name="place_of_birth" value="<?php echo e($ppdb->place_of_birth); ?>" readonly />
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <!--begin::Label-->
                                            <label class="text-muted fs-6 fw-bold form-label mb-2">Tanggal
                                                Lahir</label>
                                            <!--end::Label-->
                                            <!--begin::Row-->
                                            <div class="row fv-row fv-plugins-icon-container">
                                                <!--begin::Col-->
                                                <div class="col-12">
                                                    <input type="text" class="form-control form-control-transparent border-bottom" name="date_of_birth" value="<?php echo e($ppdb->date_of_birth); ?>" readonly />
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <!--begin::Label-->
                                            <label class="text-muted fs-6 fw-bold form-label mb-2">Agama</label>
                                            <!--end::Label-->
                                            <!--begin::Row-->
                                            <div class="row fv-row fv-plugins-icon-container">
                                                <!--begin::Col-->
                                                <div class="col-12">
                                                    <input type="text" class="form-control form-control-transparent border-bottom" name="religion" value="<?php echo e($ppdb->religion); ?>" readonly />
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <!--begin::Label-->
                                            <label class="text-muted fs-6 fw-bold form-label mb-2">Kebangsaan</label>
                                            <!--end::Label-->
                                            <!--begin::Row-->
                                            <div class="row fv-row fv-plugins-icon-container">
                                                <!--begin::Col-->
                                                <div class="col-12">
                                                    <input type="text" class="form-control form-control-transparent border-bottom" name="nationality" value="<?php echo e($ppdb->nationality); ?>" readonly />
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="row mb-10">
                                      <!--begin::Col-->
                                      <div class="col-md-8 fv-row">
                                          <!--begin::Label-->
                                          <label class="text-muted fs-6 fw-bold form-label mb-2">Alamat</label>
                                          <!--end::Label-->
                                          <!--begin::Row-->
                                          <div class="row fv-row fv-plugins-icon-container">
                                              <!--begin::Col-->
                                              <div class="col-12">
                                                  <textarea name="address" class="form-control form-control-transparent border-bottom" rows="5" required="required" readonly><?php echo e($ppdb->address); ?></textarea>
                                              </div>
                                              <!--end::Col-->
                                          </div>
                                          <!--end::Row-->
                                      </div>
                                      <!--end::Col-->
                                  </div>

                                  <div class="row mb-10">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label mb-2">Telephone Rumah</label>
                                        <!--end::Label-->
                                        <!--begin::Row-->
                                        <div class="row fv-row">
                                            <!--begin::Col-->
                                            <div class="col-12">
                                                <input type="text" class="form-control form-control-transparent border-bottom" name="home_phone" value="<?php echo e($ppdb->home_phone); ?>" readonly />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                              
                            <div class=" shadow-sm">
                              <div class="card-header bg-light">
                               <!--begin::Title-->
                                    <h3 class="card-title align-items-start flex-column">
                                      <span class="card-label fw-bolder text-dark">DATA SISWA</span>
                                    </h3>
                               <!--end::Title-->
                               </div>
                          </div>

                         
                     <div class="card-body" >  
                       {{-- FORM START --}}
                       <form action="{{ route('admin.ppdb.addclass') }}" method="POST" >
                        <?php echo e(csrf_field()); ?>
                        <!--begin::Input group-->
                        <div class="row fv-row mb-5">
                          <input type="hidden" name="id" value="<?php echo e($ppdb->id); ?>" />
                          <!--begin::Col-->
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Unit</label>
                                <!--begin::Switch-->
                          <div>
                            <input type="text" name="ppdb_id" value="<?php echo e($ppdb->ppdb_id); ?>" />
                            <select id="unit" class="form-select form-select-solid" name="unit">
                            <option value="{{ !empty($data_kelas->unit) ? $data_kelas->unit : '' }}">{{ !empty($data_kelas->unit)  ? $data_kelas->unit : 'Pilih Unit' }}</option>
                            <option value="KB">KB</option>
                            <option value="TK">TK</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            </select>
                          </div>
                          <!--end::Switch-->
                            </div>
                           <!--end::Col-->
                           <!--begin::Col-->
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Sekolah</label>
                          <!--begin::Switch-->
                          <div>
                            <select id="sekolah" class="form-select form-select-solid" name="sekolah">
                            <option value="{{ !empty($data_kelas->sekolah) ? $data_kelas->sekolah : '' }}">{{ !empty($data_kelas->sekolah) ? $data_kelas->sekolah : 'Pilih Wilayah' }}</option>
                            <option value="JAGAKARSA">Jagakarsa</option>
                            <option value="CINERE">Cinere</option>
                            <option value="PAMULANG">Pamulang</option>
                            </select>
                          </div>
                          <!--end::Switch-->
                            </div>
                            <!--end::Col-->
                         </div>

                      <!--begin::Input group-->
                          <div class="row fv-row mb-5">
                            <!--begin::Col-->
                               <div class="col-xl-6">
                                   <label class="form-label fw-bolder text-dark fs-6">Kelas Utama</label>
                                   <select class="form-control form-control-lg form-control-solid" id="kelas_utama" name="kelas_utama">
                                      <option value="{{ !empty($data_kelas->kelas_utama) ? $data_kelas->kelas_utama : '' }}">{{ !empty($data_kelas->kelas_utama) ? $data_kelas->kelas_utama : 'Pilih' }}</option>
                                   </select>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                               <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Sub Kelas</label>
                                    <select class="form-control form-control-lg form-control-solid" id="nama_kelas" name="sub_kelas" >
                                      <option value="{{ !empty($data_kelas->sub_kelas) ? $data_kelas->sub_kelas : '' }}">{{ !empty($data_kelas->sub_kelas) ? $data_kelas->sub_kelas : 'Pilih' }}</option>
                                    </select>                              
                               </div>
                               <!--end::Col-->
                          </div>

                     

                          <!--begin::Input group-->
                          <div class="row fv-row mb-5">
                          <!--begin::Col-->
                          <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Nama Kepala Sekolah</label>
                                <input value="{{ !empty($data_kelas->nama_kepala_sekolah) ? $data_kelas->nama_kepala_sekolah : '' }}" id="nama_kepala_sekolah" class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="nama_kepala_sekolah" autocomplete="off" />
                          </div>
                         <!--end::Col-->


                         @if(empty($data_kelas->nama_wali_kelas_2))
                         <!--begin::Col-->
                              <div class="col-xl-6">
                                <div class="btndowninfo">
                                      <label class="form-label fw-bolder text-dark fs-6">Nama Wali Kelas</label>
                                      <label class="form-label text-danger fw-bolder fs-7" style="padding-left: 143px">(+) wali kelas</label>
                                </div>
                                      <input value="{{ !empty($data_kelas->nama_wali_kelas) ? $data_kelas->nama_wali_kelas : '' }}" id="nama_wali_kelas" class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="nama_wali_kelas" autocomplete="off" />
                                      <div class="informasiinfo">
                                        <div class="mt-3 mb-3" id='input-cont1'>
                                        </div>
                                      <div class="btn btn-primary btn-sm fs-9" onclick="tambahInput()">+Tambah input</div> <div class="btn btn-danger btn-sm fs-9" onclick="kurangInput()">-Kurang input</div>
                                      </div>
                              </div>
                         <!--end::Col-->


                          @else
                          <!--begin::Col-->
                          <div class="col-xl-6">
                            <div class="btndowninfo">
                                  <label class="form-label fw-bolder text-dark fs-6">Nama Wali Kelas</label>
                                  <label class="form-label text-danger fw-bolder fs-7" style="padding-left: 143px">(+) wali kelas</label>
                            </div>
                                  <input value="{{ !empty($data_kelas->nama_wali_kelas) ? $data_kelas->nama_wali_kelas : '' }}" id="nama_wali_kelas" class="form-control form-control-lg form-control-solid mb-4" type="text" placeholder="Otomatis muncul jika memilih Nama Kelas" name="nama_wali_kelas" autocomplete="off" />
                                  <input value="{{ !empty($data_kelas->nama_wali_kelas_2) ? $data_kelas->nama_wali_kelas_2 : '' }}" id="nama_wali_kelas" class="form-control form-control-lg form-control-solid" type="text" placeholder="Otomatis muncul jika memilih Nama Kelas" name="nama_wali_kelas_2" autocomplete="off" />
                                  <div class="informasiinfo">
                                    <div class="mt-3 mb-3" id='input-cont1'>
                                    </div>
                                  <div class="btn btn-primary btn-sm fs-9" onclick="tambahInput()">+Tambah input</div> <div class="btn btn-danger btn-sm fs-9" onclick="kurangInput()">-Kurang input</div>
                                  </div>
                          </div>
                          <!--end::Col-->
                          @endif

                         </div>
                        
                              <!--begin::Input group-->
                              <div class="row fv-row mb-3">
                                <!--begin::Col-->
                                  <div class="col-xl-6">
                                      <label class="form-label fw-bolder text-dark fs-6">Nomor Induk Sekolah Nasional</label>
                                      <input value="{{ !empty($data_siswa->nisn) ? $data_siswa->nisn : '' }}" class="form-control form-control-lg form-control-solid" type="text"  name="nisn" autocomplete="off">
                                      <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                  <div class="col-xl-6">
                                        <label class="form-label fw-bolder text-dark fs-6">Nomor Induk Sekolah</label>
                                        <input value="{{ !empty($ppdb_system->nis) ? $ppdb_system->nis : '' }}" class="form-control form-control-lg form-control-solid" type="text"  name="nis" autocomplete="off" />
                                  </div>
                                  <!--end::Col-->
                              </div>

                              <!--begin::Input group-->
                              <div class="row fv-row mb-3">
                                <!--begin::Col-->
                                  <div class="col-xl-6">
                                      <label class="form-label fw-bolder text-dark fs-6">No. Ijazah</label>
                                      <input value="{{ !empty($data_siswa_system->no_seri_ijazah) ? $data_siswa_system->no_seri_ijazah : '' }}" class="form-control form-control-lg form-control-solid" type="text"  name="no_seri_ijazah" autocomplete="off">
                                      <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                  <div class="col-xl-6">
                                        <label class="form-label fw-bolder text-dark fs-6">NIK Siswa</label>
                                        <input value="{{ !empty($data_kelas->nik_siswa) ? $data_kelas->nik_siswa : '' }}" class="form-control form-control-lg form-control-solid" type="text"  name="nik_siswa" autocomplete="off" />
                                  </div>
                                  <!--end::Col-->
                              </div>


                                      <!--begin::Input group-->
                                      <div class="row fv-row mb-5">
                                        <!--begin::Col-->
                                          <div class="col-xl-6">
                                              <label class="form-label fw-bolder text-dark fs-6">Status Siswa</label>
                                              <!--begin::Switch-->
                                        <div>
                                          <select id="" class="form-select form-select-solid" name="status_siswa">
                                          <option value="{{ !empty($data_kelas->status_siswa) ? $data_kelas->status_siswa : '' }}">{{ !empty($data_kelas->status_siswa) ? $data_kelas->status_siswa : 'Pilih Status' }}</option>
                                          <option value="Aktif">Aktif</option>
                                          <option value="Tidak aktif">Tidak Aktif</option>
                                          <option value="Alumni">Alumni</option>
                                          </select>
                                        </div>
                                        <!--end::Switch-->
                                          </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                          <div class="col-xl-6">
                                              <label class="form-label fw-bolder text-dark fs-6">Keterangan</label>
                                        <!--begin::Switch-->
                                        <div>
                                          <select id="" class="form-select form-select-solid" name="keterangan">
                                          <option value="{{ !empty($data_kelas->keterangan) ? $data_kelas->keterangan : '' }}">{{ !empty($data_kelas->keterangan) ? $data_kelas->keterangan : 'Pilih Keterangan' }}</option>
                                          <option value="Aktif">Aktif</option>
                                          <option value="Lulus">Lulus</option>
                                          <option value="Pindah sekolah">Pindah Sekolah</option>
                                          <option value="Tidak naik kelas">Tidak Naik Kelas</option>
                                          <option value="Drop Out">Drop Out</option>
                                          </select>
                                        </div>
                                        <!--end::Switch-->
                                          </div>
                                          <!--end::Col-->
                                      </div>

                                      <div class="container-flex justify-content-end">
                                        <button class="btn btn-primary btn-sm fs-9" >Submit</button>                     
                                       </form>
                                       <a href="{{ route('admin.ppdb.cekhistory', $ppdb->ppdb_id) }}">
                                        <div class="btn btn-success btn-sm fs-9">Edit</div>
                                      </a>
                                      </div>
                                </div>

                                <div class="mt-5">
                                  <div class="card-header bg-light">
                                    <!--begin::Title-->
                                      <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder text-dark">DATA PRESTASI SEKOLAH ASAL</span><span style="color:#5a595a">diisi pada saat pendaftaraan</span>
                                      </h3>
                                    <!--end::Title-->
                                  </div>
                                </div>
                                
                                <div class="card-body">
                                  <div class="table-responsive">
                                      <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                          <thead>
                                              <tr class="fw-bolder fs-6 text-gray-800">
                                                  <th class="min-w-200px">Deskripsi</th>
                                                  <th class="min-w-200px">Tingkat</th>
                                                  <th class="w-50px text-end">File</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <?php
                                              $file_download = '#';
                                              ?>
                                              <?php $__currentLoopData = $file_additional; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <tr>
                                                  <td><?php echo e($file->deskripsi); ?></td>
                                                  <td><?php echo e($file->tingkat); ?></td>
                                                  <td><a href="https://ppdb.sekolah-avicenna.sch.id/{{ e($file->file) }}" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                          <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                          <span class="svg-icon svg-icon-3">
                                                              <i class="bi bi-cloud-arrow-down"></i>
                                                          </span>
                                                          <!--end::Svg Icon-->
                                                      </a></td>
                                              </tr>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                          </tbody>
                                      </table>
                                  </div>
                                </div>

                                <div class="mt-5">
                                  <div class="card-header bg-light">
                                    <!--begin::Title-->
                                      <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder text-dark">DATA PRESTASI SEKOLAH AVICENNA</span>
                                    <!--end::Title-->
                                  </div>
                                </div>
                                
                                <div class="card-body">
                                  <div class="table-responsive">
                                      <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                          <thead>
                                              <tr class="fw-bolder fs-9 text-gray-800">
                                                  <th class="min-w-50px">Nama Prestasi</th>
                                                  <th class="min-w-50px">Nama Event</th>
                                                  <th class="min-w-50px">Penyelenggara</th>
                                                  <th class="min-w-50px">Negara</th>
                                                  <th class="min-w-50px">Penghargaan</th>
                                                  <th class="min-w-50px">Tingkat</th>
                                                  <th class="min-w-50px">Bidang</th>
                                                  <th class="w-50px text-end">Tanggal</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                             

                                          </tbody>
                                      </table>
                                  </div>
                                </div>

                                </div>
                            </div>
                          </div>
                        </div>




                       <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                              <div class="car border shadow-sm">
                                <div class="card-header bg-light"> 
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder text-dark">INFORMASI ORANG TUA/WALI</span><span style="color:#5a595a">diisi pada saat pendaftaraan</span>
                                </h3>
                                <!--end::Title-->
                                </div>
                              
                            
                              <div class="card-body">
  
                                <div class="w-100">
  
                              <!--begin::Input group-->
                              <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                  <?php
                                if ($file_additional_satu !='' && $file_additional_satu != null && !empty($file_additional_satu) && $file_additional_satu != '[]') { 
                                    $array= array_column($file_additional_satu, 'name_father');
                                      if ($array != '' && $array != null) {
                                        $data1 = $array;
                                      } else {
                                        $data1 = '';
                                      }
                                    }else {
                                      $data1 = '';
                                    }
                                  ?>
                                    <label class="form-label fw-bolder text-muted fs-6">Nama
                                        ayah/Wali</label>
                                    <input class="form-control form-control-transparent border-bottom" type="text" value="<?php echo e(($data1 =='' && $data1 == null) ? '' : $data1[0]); ?>" readonly autocomplete="off">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                  <?php
                                if ($file_additional_satu !='' && $file_additional_satu != null && !empty($file_additional_satu) && $file_additional_satu != '[]') { 
                                    $array= array_column($file_additional_satu, 'name_mother');
                                      if ($array != '' && $array != null) {
                                        $data1 = $array;
                                      } else {
                                        $data1 = '';
                                      }
                                    }else {
                                      $data1 = '';
                                    }
                                  ?>
                                    <label class="form-label fw-bolder text-muted fs-6">Nama
                                        Ibu/Wali</label>
                                    <input class="form-control form-control-transparent border-bottom" type="text" value="<?php echo e(($data1 =='' && $data1 == null) ? '' : $data1[0]); ?>" readonly autocomplete="off">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                            </div>
                              <!--begin::Input group-->
                              <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                  <?php
  
                                  if ($file_additional_dua !='' && $file_additional_dua != null && !empty($file_additional_dua) && $file_additional_dua != '[]') { 
                                    $array= array_column($file_additional_dua, 'name_work_father');
                                    if ($array !='' && $array != null && !empty($array) && $array != '[]') {
                                      if ($array != '' && $array != null) { $dataworkfather = $array;
                                      } else { $dataworkfather = ''; }
  
                                      if ($dataworkfather[0] == 1) { $dataworkfather = 'Badan Swasta';
                                      } else if ($dataworkfather[0] == 2) { $dataworkfather = 'Badan Pemerintahan';
                                      } else if ($dataworkfather[0] == 3) { $dataworkfather = 'Wirausaha';
                                      } else if ($dataworkfather[0] == 4) { $dataworkfather = 'Pensiuanan';
                                      } else if ($dataworkfather[0] == 5) { $dataworkfather = 'Tidak Bekerja'; } 
                                    } else {
                                      $dataworkfather = '';
                                    }
                                  } else {
                                    $dataworkfather = '';
                                  }
  
                                    ?>
                                    <label class="form-label fw-bolder text-muted fs-6">Nama
                                        Pekerjaan Ayah/Wali</label>
                                    <input class="form-control form-control-transparent border-bottom" type="text" value="<?php echo e(($dataworkfather =='' && $dataworkfather == null) ? '' : $dataworkfather); ?>" readonly autocomplete="off">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                  <?php
                                  if ($file_additional_dua !='' && $file_additional_dua != null && !empty($file_additional_dua) && $file_additional_dua != '[]') { 
                                    $array= array_column($file_additional_dua, 'name_work_mother');
                                      if ($array != '' && $array != null) { $dataworkmother = $array;
                                      } else { $dataworkmother = ''; }
  
                                      if ($dataworkmother[0] == 1) { $dataworkmother = 'Badan Swasta';
                                      } else if ($dataworkmother[0] == 2) { $dataworkmother = 'Badan Pemerintahan';
                                      } else if ($dataworkmother[0] == 3) { $dataworkmother = 'Wirausaha';
                                      } else if ($dataworkmother[0] == 4) { $dataworkmother = 'Pensiuanan';
                                      } else if ($dataworkmother[0] == 5) { $dataworkmother = 'Ibu Rumah Tangga'; } 
                                    } else {
                                    $dataworkmother = '';
                                  }
                                  ?>
                                    <label class="form-label fw-bolder text-muted fs-6">Nama
                                        Pekerjaan Ibu/Wali</label>
                                    <input class="form-control form-control-transparent border-bottom" type="text" value="<?php echo e(($dataworkmother =='' && $dataworkmother == null) ? '' : $dataworkmother); ?>" readonly autocomplete="off">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                              </div>
                              <!--end::Input group-->
                              <!--begin::Input group-->
                              <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                  <?php
                                if ($file_additional_tiga !='' && $file_additional_tiga != null && !empty($file_additional_tiga) && $file_additional_tiga != '[]') { 
                                      $array= array_column($file_additional_tiga, 'place_work_father');
                                        if ($array != '' && $array != null) { $placeworkfather = $array; } 
                                        else { $placeworkfather = ''; }
                                    }else {
                                      $placeworkfather = '';
                                    }
                                  ?>
                                    <label class="form-label fw-bolder text-muted fs-6">Tempat
                                        Pekerjaan Ayah/Wali</label>
                                    <input class="form-control form-control-transparent border-bottom" type="text" value="<?php echo e(($placeworkfather =='' && $placeworkfather == null) ? '' : $placeworkfather[0]); ?>" readonly autocomplete="off">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                  <?php
                                  if ($file_additional_tiga !='' && $file_additional_tiga != null && !empty($file_additional_tiga) && $file_additional_tiga != '[]') { 
                                    $array= array_column($file_additional_tiga, 'place_work_mother');
                                      if ($array != '' && $array != null) { $placeworkmother = $array; } 
                                      else { $placeworkmother = ''; }
  
                                    }else {
                                      $placeworkmother = '';
                                    }
                                  ?>
                                    <label class="form-label fw-bolder text-muted fs-6">Tempat
                                        Pekerjaan Ibu/Wali</label>
                                    <input class="form-control form-control-transparent border-bottom" type="text" value="<?php echo e(($placeworkmother =='' && $placeworkmother == null) ? '' : $placeworkmother[0]); ?>" readonly autocomplete="off">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                              </div>
                              <!--end::Input group-->
                              <!--begin::Input group-->
                              <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                  <?php
                                  if ($file_additional_empat !='' && $file_additional_empat != null && !empty($file_additional_empat) && $file_additional_empat != '[]') { 
                                    $array= array_column($file_additional_empat, 'title_work_father');
                                      if ($array != '' && $array != null) { $titleworkfather = $array;
                                      } else { $titleworkfather = ''; }
  
                                      if ($titleworkfather[0] == 1) { $titleworkfather = 'Staff (Tetap)';
                                      } else if ($titleworkfather[0] == 2) { $titleworkfather = 'Dosen / Guru';
                                      } else if ($titleworkfather[0] == 3) { $titleworkfather = 'Supervisor';
                                      } else if ($titleworkfather[0] == 4) { $titleworkfather = 'Manager';
                                      } else if ($titleworkfather[0] == 5) { $titleworkfather = 'Direksi'; 
                                      } else if ($titleworkfather[0] == 6) { $titleworkfather = 'Pegawai Honorer'; 
                                      } else if ($titleworkfather[0] == 7) { $titleworkfather = 'Pegawai Kontrak'; 
                                      } else if ($titleworkfather[0] == 8) { $titleworkfather = 'Lainnya'; } 
                                    }else {
                                      $titleworkfather = '';
                                    }
                                  ?>
                                    <label class="form-label fw-bolder text-muted fs-6">Title
                                        Pekerjaan Ayah</label>
                                    <input class="form-control form-control-transparent border-bottom" type="text" value="<?php echo e(($titleworkfather =='' && $titleworkfather == null) ? '' : $titleworkfather); ?>" readonly autocomplete="off">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                  <?php
                                  if ($file_additional_empat !='' && $file_additional_empat != null && !empty($file_additional_empat) && $file_additional_empat != '[]') { 
                                    $array= array_column($file_additional_empat, 'title_work_mother');
                                      if ($array != '' && $array != null) { $titleworkmother = $array;
                                      } else { $titleworkmother = ''; }
  
                                      if ($titleworkmother[0] == 1) { $titleworkmother = 'Staff (Tetap)';
                                      } else if ($titleworkmother[0] == 2) { $titleworkmother = 'Dosen / Guru';
                                      } else if ($titleworkmother[0] == 3) { $titleworkmother = 'Supervisor';
                                      } else if ($titleworkmother[0] == 4) { $titleworkmother = 'Manager';
                                      } else if ($titleworkmother[0] == 5) { $titleworkmother = 'Direksi'; 
                                      } else if ($titleworkmother[0] == 6) { $titleworkmother = 'Pegawai Honorer'; 
                                      } else if ($titleworkmother[0] == 7) { $titleworkmother = 'Pegawai Kontrak'; 
                                      } else if ($titleworkmother[0] == 8) { $titleworkmother = 'Lainnya'; } 
                                    }else {
                                      $titleworkmother = '';
                                    }
                                  ?>
                                    <label class="form-label fw-bolder text-muted fs-6">Title
                                        Pekerjaan Ibu</label>
                                    <input class="form-control form-control-transparent border-bottom" type="text" value="<?php echo e(($titleworkmother =='' && $titleworkmother == null) ? '' : $titleworkmother); ?>" readonly autocomplete="off">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                              </div>
                              <!--end::Input group-->
                              <!--begin::Input group-->
                              <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                <div class="row">
                                  <div class="col">
                                    <?php
                                      if ($file_additional_lima !='' && $file_additional_lima != null && !empty($file_additional_lima) && $file_additional_lima != '[]') { 
                                        $array= array_column($file_additional_lima, 'gaji_tetap_ayah');
                                          if ($array != '' && $array != null) { $gajiworkayah = $array;
                                          } else { $gajiworkayah = ''; }
                                        }else {
                                          $gajiworkayah = '0';
                                        }
                                      ?>
                                        <label class="form-label fw-bolder text-muted fs-6">penghasilan
                                          Tetap Ayah</label>
                                      <input class="form-control form-control-transparent border-bottom" type="text" value="<?php echo e(($gajiworkayah =='' && $gajiworkayah == null) ? '' : $gajiworkayah[0]); ?>" name="last_name" readonly>
                                      <div class="fv-plugins-message-container invalid-feedback"></div>
                                  </div>
                                  <div class="col">
                                    <?php
                                      if ($file_additional_lima !='' && $file_additional_lima != null && !empty($file_additional_lima) && $file_additional_lima != '[]') { 
                                      $array= array_column($file_additional_lima, 'income_work_father');
  
                                      if ($array !='' && $array != null && !empty($array) && $array != '[]') {
                                        if ($array != '' && $array != null) { $incomeworkayah = $array; } 
                                        else { $incomeworkayah = ''; }
                                      
                                        if ($incomeworkayah[0] == 1) { $incomeworkayah = 'Rp. 1.000.000 - 2.000.000';
                                            } else if ($incomeworkayah[0] == 2) { $incomeworkayah = 'Rp. 3.000.000 - 5.000.000';
                                            } else if ($incomeworkayah[0] == 3) { $incomeworkayah = 'Rp. 6.000.000 - 10.000.000';
                                            } else if ($incomeworkayah[0] == 4) { $incomeworkayah = 'Rp. 11.000.000 - 15.000.000';
                                            } else if ($incomeworkayah[0] == 5) { $incomeworkayah = ' > Rp. 20.000.000'; 
                                           } else { $incomeworkayah = '0'; }   
  
                                      }else {
                                            $incomeworkayah = '0';
                                      }
                                      }else {
                                          $incomeworkayah = '0';
                                        }
                                    ?>
                                        <label class="form-label fw-bolder text-muted fs-6">Gaji Tidak
                                          Tetap Ayah</label>
                                      <input class="form-control form-control-transparent border-bottom" type="text" value="<?php echo e(($incomeworkayah =='' && $incomeworkayah == null) ? '' : $incomeworkayah); ?>" name="last_name" readonly>
                                      <div class="fv-plugins-message-container invalid-feedback"></div>
                                  </div>
                                </div>
                              </div>
                              <!--end::Col-->
                              <!--begin::Col-->
                              <div class="col-xl-6">
                              <div class="row">
                                <div class="col">
                                  <?php
                                if ($file_additional_lima !='' && $file_additional_lima != null && !empty($file_additional_lima) && $file_additional_lima != '[]') { 
                                        $array= array_column($file_additional_lima, 'gaji_tetap_ibu');
                                          if ($array != '' && $array != null) { $gajiworkmother = $array;
                                          } else { $gajiworkmother = ''; }     
                                          
                                        }else {
                                          $gajiworkmother = '0';
                                        }
                                      ?>
                                      <label class="form-label fw-bolder text-muted fs-6">penghasilan
                                        Tetap Ibu</label>
                                    <input class="form-control form-control-transparent border-bottom" type="text" value="<?php echo e(($gajiworkmother =='' && $gajiworkmother == null) ? '' : $gajiworkmother[0]); ?>" name="last_name" readonly>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <div class="col">
                                  <?php
                                if ($file_additional_lima !='' && $file_additional_lima != null && !empty($file_additional_lima) && $file_additional_lima != '[]') { 
                                    $array= array_column($file_additional_lima, 'income_work_mother');
  
  
                                    if ($array !='' && $array != null && !empty($array) && $array != '[]') {
                                      if ($array != '' && $array != null) { $incomeworkmother = $array; } 
                                      else { $incomeworkmother = ''; }
  
                                      if ($incomeworkmother[0] == 1) { $incomeworkmother = 'Rp. 1.000.000 - 2.000.000';
                                          } else if ($incomeworkmother[0] == 2) { $incomeworkmother = 'Rp. 3.000.000 - 5.000.000';
                                          } else if ($incomeworkmother[0] == 3) { $incomeworkmother = 'Rp. 6.000.000 - 10.000.000';
                                          } else if ($incomeworkmother[0] == 4) { $incomeworkmother = 'Rp. 11.000.000 - 15.000.000';
                                          } else if ($incomeworkmother[0] == 5) { $incomeworkmother = ' > Rp. 20.000.000'; 
                                          } else { $incomeworkmother = '0'; }  
  
                                      }else {
                                            $incomeworkmother = '0';
                                      }
                                    }else {
                                          $incomeworkmother = '0';
                                        }
                                  ?>
                                      <label class="form-label fw-bolder text-muted fs-6">Gaji Tidak
                                        Tetap Ibu</label>
                                    <input class="form-control form-control-transparent border-bottom" type="text" value="<?php echo e(($incomeworkmother =='' && $incomeworkmother == null) ? '' : $incomeworkmother); ?>" name="last_name" readonly>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                              </div>
                              </div>
                              <!--end::Col-->  
                              </div>
                              <!--end::Input group-->
                              <div class="row fv-row mb-10 fv-plugins-icon-container">
                                <div class="col-xl-6">  
                                  <?php
                            if ($slip_gaji_parent !='' && $slip_gaji_parent != null && !empty($slip_gaji_parent) && $slip_gaji_parent != '[]') { 
                                      $array= array_column($slip_gaji_parent, 'slip_gaji_father');
  
                                      if ($array !='' && $array != null && !empty($array) && $array != '[]') {
                                        if ($array != '' && $array != null) { $slipworkfather = $array;
                                        } else { $slipworkfather = ''; }    
                                        
                                      }else {
                                                $slipworkfather = '';
                                          }
  
                                        }else {
                                              $slipworkfather = '';
                                            }
                                    ?>
                                          <label class="form-label fw-bolder text-muted fs-6">Slip Gaji Ayah</label> 
                                          <a href="https://ppdb.sekolah-avicenna.sch.id/{{ e(($slipworkfather =='' && $slipworkfather == null) ? '' : $slipworkfather[0]) }}" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                          <span class="svg-icon svg-icon-3">
                                              <i class="bi bi-cloud-arrow-down"></i>
                                          </span>
                                          </a>   
                                </div>
                                <div class="col-xl-6">
                                  <?php
                             if ($slip_gaji_parent !='' && $slip_gaji_parent != null && !empty($slip_gaji_parent) && $slip_gaji_parent != '[]') { 
                                      $array= array_column($slip_gaji_parent, 'slip_gaji_mother');
                                        if ($array != '' && $array != null) { $slipworkmother = $array;
                                        } else { $slipworkmother = ''; }     
                                      }else {
                                              $slipworkmother = '';
                                            } 
                                    ?>
                                          <label class="form-label fw-bolder text-muted fs-6">Slip Gaji Ibu</label> 
                                              <a href="https://ppdb.sekolah-avicenna.sch.id/{{ e(($slipworkmother =='' && $slipworkmother == null) ? '' : $slipworkmother[0]) }}" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                              <span class="svg-icon svg-icon-3">
                                                  <i class="bi bi-cloud-arrow-down"></i>
                                              </span>
                                            </a>
                                </div>
                            </div>
                            <div class="card-header bg-light">
                              <!--begin::Title-->
                              <h3 class="card-title align-items-start flex-column">
                                  <span class="card-label fw-bolder">VERIFY STATUS PEKERJAAN (JIKA MEDCO GROUP)</span><span style="color:#5a595a">divalidasi pada saat pendaftaraan</span>
                              </h3>
                              <!--end::Title-->
                          </div>
                        
                          <div class="card-body">
                            <div class="row fv-row mb-10">
                            <form action="<?php echo e(route('admin.ppdb.discount')); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="id" value="<?php echo e($ppdb->id); ?>" />
                                
                                <div class="w-100">
  
                                  <div class="row fv-row mb-7 fv-plugins-icon-container p-5 border">
                                    <div class="d-flex w-lg-100">
                                        <!--begin::Label-->
  
                                        <div class="me-5">
                                            <label class="fs-6 fw-semibold form-label">Orangtua/Wali merupakan pekerja yang berada di ruang lingkup Medco Group</label>
                                            <div class="fs-7 fw-semibold text-muted">Berikut ini adalah surat keterangan dari tempat bekerja</div>
                                        </div>
                                        <!--end::Label-->
                                    </div>
  
                                    <div id="box-employee-medco" class="mt-10">
                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="form-label fw-bold text-dark fs-6">Tempat Bekerja &amp; Nama Posisi</label>
                                            <input name="medco_employee" value="<?php echo e($ppdb->medco_employee); ?>" class="form-control form-control-lg form-control-solid" type="text" placeholder="Keterangan Pekerjaan" autocomplete="off" readonly>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="fv-row mb-2 fv-plugins-icon-container">
                                            <div class="col-md-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-6 fw-bold form-label mb-2">Lampiran Surat Keterangan Bekerja</label>
                                                <!--end::Label-->
  
                                                <!--begin::Row-->
                                                <div class="row fv-row fv-plugins-icon-container">
                                                    <!--begin::Col-->
                                                    <div class="col-12">
                                                        <?php if(!empty($ppdb->medco_employee_file) && $ppdb->medco_employee_file != ""): ?>
                                                        <!--begin::Image input-->
                                                        <div class="input-group mb-5">
                                                            <input type="text" value="<?php echo e($ppdb->medco_employee_file); ?>" class="form-control" value="nama file" readonly="">
                                                            <a href="/<?php echo e($ppdb->medco_employee_file); ?>" target="_blank" class="btn-remove-file input-group-text btn-danger">
                                                                View
                                                            </a>
                                                        </div>
                                                        <!--end::Image input-->
                                                        <?php else: ?>
                                                        <label class="required fs-6 fw-bolder form-label mb-2 text-dark">Tidak Ada</label>
                                                        <?php endif; ?>
                                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
  
                                        </div>
                                    </div>
  
                                    <!--begin::Input group-->
                                    
                                        <!--begin::Col-->
                                        <div class="col-xl-6">
                                            <label class="required fs-6 fw-bold form-label mb-2">Pekerjaan di Medco Group sebagai</label>
                                            <select name="discount_code" class="form-select">
                                                <option value="">Pilih</option>
                                                <?php $__currentLoopData = $discount_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->enum_value); ?>" <?php echo e(($ppdb->ppdb_discount == $item->enum_value) ? "selected":""); ?>><?php echo e($item->enum_label); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
  
                                </div>
                            </form>
  
                        </div>
                      </div>
                    </div>
                  </div>
                    
                  </div>
                </div>



<div class="tab-pane fade" id="kt_tab_pane_4" role="tabpanel">
    <div class="card border shadow-sm">
      

        <div class="car border shadow-sm">
          <div class="card-header bg-light"> 
          <!--begin::Title-->
          <h3 class="card-title align-items-start flex-column">
              <span class="card-label fw-bolder text-dark">INFORMASI PENDAFTARAN</span><span style="color:#5a595a">diisi pada saat pendaftaraan</span>
          </h3>
          <!--end::Title-->
          </div>
        
      
        <div class="card-body">

          <div class="w-100">

        <!--begin::Input group-->
        <div class="row fv-row mb-7 fv-plugins-icon-container">
          <!--begin::Col-->
          <div class="col-xl-6">
            
              <label class="form-label fw-bolder text-muted fs-6">No. Registrasi (Kode Siswa)</label>
              <input class="form-control form-control-transparent border-bottom" type="text" value="<?php echo $ppdb->document_no; ?>" readonly autocomplete="off">
              <div class="fv-plugins-message-container invalid-feedback"></div>
          </div>
          <!--end::Col-->

          <!--begin::Col-->
          <div class="col-xl-6">

            
              <label class="form-label fw-bolder text-muted fs-6">Gelombang Daftar</label>
              <input class="form-control form-control-transparent border-bottom" type="text" value="<?php echo ($ppdb->registration_schedule_id == 5 ? "Gelombang 1" : "Gelombang 2"); ?>" readonly autocomplete="off">
              <div class="fv-plugins-message-container invalid-feedback"></div>
          </div>
          <!--end::Col-->
      </div>

        <!--begin::Input group-->
        <div class="row fv-row mb-7 fv-plugins-icon-container">
          <!--begin::Col-->
          <div class="col-xl-6">
            
              <label class="form-label fw-bolder text-muted fs-6">Waktu Daftar</label>
              <input class="form-control form-control-transparent border-bottom" type="text" value="<?php echo $ppdb->created_at; ?>" readonly autocomplete="off">
              <div class="fv-plugins-message-container invalid-feedback"></div>
          </div>
          <!--end::Col-->

          <!--begin::Col-->
          <div class="col-xl-6">
           
              <label class="form-label fw-bolder text-muted fs-6">Status Mendaftar</label>
              <input class="form-control form-control-transparent border-bottom" type="text" value="<?php echo $ppdb->student_status; ?>" readonly autocomplete="off">
              <div class="fv-plugins-message-container invalid-feedback"></div>
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row fv-row mb-7 fv-plugins-icon-container">

          <!--begin::Col-->
          <div class="col-xl-6">
            
              <label class="form-label fw-bolder text-muted fs-6">Tujuan Sekolah</label>
              <input class="form-control form-control-transparent border-bottom" type="text" value="<?php echo $ppdb->school_site; ?>" readonly autocomplete="off">
              <div class="fv-plugins-message-container invalid-feedback"></div>
          </div>
          <!--end::Col-->

          <!--begin::Col-->
          <div class="col-xl-6">
            
              <label class="form-label fw-bolder text-muted fs-6">Jenjang & Kelas</label>
              <input class="form-control form-control-transparent border-bottom" type="text" value="<?php echo $ppdb->stage."-";  echo $ppdb->classes; ?>" readonly autocomplete="off">
              <div class="fv-plugins-message-container invalid-feedback"></div>
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row fv-row mb-7 fv-plugins-icon-container">

          <!--begin::Col-->
          <div class="col-xl-6">
            
              <label class="form-label fw-bolder text-muted fs-6">Status Kesiswaan</label>
              <input class="form-control form-control-transparent border-bottom" type="text" value="<?php echo $ppdb->status_siswa; ?>" readonly autocomplete="off">
              <div class="fv-plugins-message-container invalid-feedback"></div>
          </div>
          <!--end::Col-->

          <!--begin::Col-->
          <div class="col-xl-6">
           
              <label class="form-label fw-bolder text-muted fs-6">Asal Sekolah</label>
              <input class="form-control form-control-transparent border-bottom" type="text" value="<?php echo $ppdb->school_origin; ?>" readonly autocomplete="off">
              <div class="fv-plugins-message-container invalid-feedback"></div>
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
</div>
</div>

</div>

<div class="btndowntes card-header bg-light mb-6">
  <!--begin::Title-->
  <h3 class="card-title align-items-start flex-column mb-1">
      <span class="card-label fw-bolder mb-1">HASIL TES SELEKSI MASUK SEKOLAH</span><span style="color:#5a595a">dinilai pada saat pendaftaraan</span>
       </h3>
       </h3>
  <!--end::Title-->
</div>

<div class="informasites">

<div class="card rounded-0">
                                            <div class="card-body">
                                    
                                                <div class="table-responsive mb-5">
                                                    <table class="table table-rounded table-striped border gy-4 gs-4">
                                                        <thead>
                                                            <tr class="fw-semibold fs-4 bg-dark text-white border-bottom border-gray-200">
                                                                <th>Deskripsi</th>
                                                                <th>File</th>
                                                                <th class="w-100px">Nilai</th>
                                                                <th style="text-align: center;" class="w-150px">Keputusan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if($ppdb->stage=="SD")
                                                            <tr>
                                                                <td>
                                                                    <div class="mt-4 fw-bold fs-5">Tes Kesiapan Sekolah</div>
                                                                </td>
                                                                <td>
                                                                    <div class="mt-4 fw-bold fs-5">
                                                                      <?php                                                              
                                                                            $array= ($kesiapan_file->{'file_path'} ?? '');
                                                                            if ($array != '' && $array != null) {
                                                                              $result = $array;
                                                                            } else {
                                                                              $result = '';
                                                                            }
                                                                        ?>
                                                                        <a href="{{ ($result =='' && $result == null) ? '' : $result }}" target="_blank" class="linkhref3">view</a>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                  <?php if (!empty($ppdb_interview->kesiapan_value)) { ?>
                                                                    <input name="academic_value_result" id="academic_value_result" type="number" class="form-control form-control-solid w-150px form-control-transparent" value="{{ $ppdb_interview->kesiapan_value }}" readonly />
                                                                 <?php } else { ?>
                                                                  <input name="academic_value_result" id="academic_value_result" type="number" class="form-control form-control-solid w-150px form-control-transparent" value="Belum Ada" readonly />
                                                                 <?php } ?>
                                                                </td>
                                                                <td id="academic_value_label">
                                                                  <?php if (empty($ppdb_interview->kesiapan_result)) { ?>
                                                                    <div style="text-align: center;"  class="mt-3 fw-bold fs-5"><span class="badge badge-info">Belum Ada</span></div>
                                                                  <?php }else if ($ppdb_interview->kesiapan_result == 4) { ?>
                                                                  <div style="text-align: center;"  class="mt-3 fw-bold fs-5"><span class="badge badge-success">Siap Sekolah</span></div>
                                                                  <?php }else if ($ppdb_interview->kesiapan_result == 5) { ?>
                                                                     <div style="text-align: center;" class="mt-3 fw-bold fs-5"><span class="badge badge-danger">Tidak Direkomendasikan</span></div>
                                                                  <?php }else if ($ppdb_interview->kesiapan_result == 6) {?>
                                                                   <div class="mt-3 fw-bold fs-5"><span class="badge badge-warning">Dipertimbangkan dengan cacatan</span></div>
                                                                  <?php }?>
                                                                </td>
                                                            </tr>
                                                            @endif
                                    
                                                            @if($ppdb->stage=="SMP" || $ppdb->stage=="SMA")
                                                            <tr>
                                                                <td>
                                                                    <div class="mt-4 fw-bold fs-5">
                                                                        Psikotes
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mt-4 fw-bold fs-5">
                                                                      <?php                                                              
                                                                            $array= ($psikotest_file->{'file_path'} ?? '');
                                                                            if ($array != '' && $array != null) {
                                                                              $result = $array;
                                                                            } else {
                                                                              $result = '';
                                                                            }
                                                                        ?>
                                                                        <a href="{{ ($result =='' && $result == null) ? '' : $result }}" target="_blank" class="linkhref7">view</a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                  <?php if(!empty($ppdb_interview->psikotest_value)){ ?>
                                                                    <input name="psikotest_value_result" id="psikotest_value_result" type="number" class="form-control form-control-solid w-100px form-control-transparent" value="{{ $ppdb_interview->psikotest_value }}" readonly />
                                                                
                                                                <?php  } else { ?>
                                                                  <input name="psikotest_value_result" id="psikotest_value_result" type="number" class="form-control form-control-solid w-100px form-control-transparent" value="Belum Ada" readonly />
                                                                  <?php } ?>
                                                                  </td>
                                                                <td id="psikotest_value_label" class="mt-4 fw-bold fs-1">
                                                                    <?php if (empty($ppdb_interview->psikotest_result)) { ?>
                                                                      <div style="text-align: center;"  class="mt-3 fw-bold fs-5"><span class="badge badge-info">Belum Ada</span></div>
                                                                    <?php }else if ($ppdb_interview->psikotest_result == 1) { ?>
                                                                    <div style="text-align: center;"  class="mt-3 fw-bold fs-5"><span class="badge badge-success">Direkomendasikan</span></div>
                                                                    <?php }else if ($ppdb_interview->psikotest_result == 2) { ?>
                                                                       <div style="text-align: center;" class="mt-3 fw-bold fs-5"><span class="badge badge-danger">Tidak Direkomendasikan</span></div>
                                                                    <?php }else if ($ppdb_interview->psikotest_result == 3) {?>
                                                                     <div class="mt-3 fw-bold fs-5"><span class="badge badge-warning">Dipertimbangkan dengan cacatan</span></div>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="mt-4 fw-bold fs-5">
                                                                        Tes Literasi & Numerasi
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mt-4 fw-bold fs-5">
                                                                      <?php                                                              
                                                                            $array= ($academic_file->{'file_path'} ?? '');
                                                                            if ($array != '' && $array != null) {
                                                                              $result = $array;
                                                                            } else {
                                                                              $result = '';
                                                                            }
                                                                        ?>
                                                                        <a href="{{ ($result =='' && $result == null) ? '' : $result }}" target="_blank" class="linkhref8">view</a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                  <?php if (!empty($ppdb_interview->academic_value)) { ?>
                                                                    <input name="academic_value_result" id="academic_value_result" type="number" class="form-control form-control-solid w-150px form-control-transparent" value="{{ $ppdb_interview->academic_value }}" readonly />
                                                                 <?php } else { ?>
                                                                  <input name="academic_value_result" id="academic_value_result" type="number" class="form-control form-control-solid w-150px form-control-transparent" value="Belum Ada" readonly />
                                                                 <?php } ?>
                                                                </td>
                                                                <td id="academic_value_label">
                                                                  <?php if (empty($ppdb_interview->academic_result)) { ?>
                                                                    <div style="text-align: center;"  class="mt-3 fw-bold fs-5"><span class="badge badge-info">Belum Ada</span></div>
                                                                  <?php }else if ($ppdb_interview->academic_result == 1) { ?>
                                                                  <div style="text-align: center;"  class="mt-3 fw-bold fs-5"><span class="badge badge-success">Direkomendasikan</span></div>
                                                                  <?php }else if ($ppdb_interview->academic_result == 2) { ?>
                                                                     <div style="text-align: center;" class="mt-3 fw-bold fs-5"><span class="badge badge-danger">Tidak Direkomendasikan</span></div>
                                                                  <?php }else if ($ppdb_interview->academic_result == 3) {?>
                                                                   <div class="mt-3 fw-bold fs-5"><span class="badge badge-warning">Dipertimbangkan dengan cacatan</span></div>
                                                                  <?php }?>
                                                                </td>
                                                            </tr>
                                                            @endif
                                    
                                                            <tr>
                                                                <td class="fs-5 fw-bold">Wawancara Orang Tua</td>
                                                                <td>
                                                                    <div class="mt-4 fw-bold fs-5">
                                                                      <?php                                                              
                                                                            $array= ($interview_parent_file->{'file_path'} ?? '');
                                                                            if ($array != '' && $array != null) {
                                                                              $result = $array;
                                                                            } else {
                                                                              $result = '';
                                                                            }
                                                                        ?>
                                                                        <a href="{{ ($result =='' && $result == null) ? '' : $result }}" target="_blank" class="linkhref4 fs-6">view</a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <input id="interview_parent" type="text" class="form-control form-control-solid w-150px form-control-transparent d-none" value="" readonly />
                                                                </td>
                                                                <td id="interview_parent_value_label">
                                                                  <?php if (empty($ppdb_interview->interview_parent_result)) { ?>
                                                                    <div style="text-align: center;"  class="mt-3 fw-bold fs-5"><span class="badge badge-info">Belum Ada</span></div>
                                                                  <?php }else if ($ppdb_interview->interview_parent_result == 1) { ?>
                                                                  <div style="text-align: center;"  class="mt-3 fw-bold fs-5"><span class="badge badge-success">Direkomendasikan</span></div>
                                                                  <?php }else if ($ppdb_interview->interview_parent_result == 2) { ?>
                                                                     <div style="text-align: center;" class="mt-3 fw-bold fs-5"><span class="badge badge-danger">Tidak Direkomendasikan</span></div>
                                                                  <?php }else if ($ppdb_interview->interview_parent_result == 3) {?>
                                                                   <div class="mt-3 fw-bold fs-5"><span class="badge badge-warning">Dipertimbangkan dengan cacatan</span></div>
                                                                  <?php }?>
                                                                </td>
                                                            </tr>
                                                            @if($ppdb->stage=="SMP" || $ppdb->stage=="SMA")
                                                            <tr>
                                                                <td class="fs-5 fw-bold">Wawancara Siswa</td>
                                                                <td>
                                                                    <div class="mt-4 fw-bold fs-5">
                                                                      <?php                                                              
                                                                            $array= ($interview_student_file->{'file_path'} ?? '');
                                                                            if ($array != '' && $array != null) {
                                                                              $result = $array;
                                                                            } else {
                                                                              $result = '';
                                                                            }
                                                                        ?>
                                                                        <a href="{{ ($result =='' && $result == null) ? '' : $result }}" target="_blank" class="linkhref6 fs-6">view</a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <input id="interview_student_value_result" type="text" class="form-control form-control-solid w-150px form-control-transparent d-none" value="" readonly />
                                                                </td>
                                                                <td id="interview_student_value_label">
                                                                  <?php if (empty($ppdb_interview->interview_student_result)) { ?>
                                                                    <div style="text-align: center;"  class="mt-3 fw-bold fs-5"><span class="badge badge-info">Belum Ada</span></div>
                                                                  <?php }else if ($ppdb_interview->interview_student_result == 1) { ?>
                                                                  <div style="text-align: center;"  class="mt-3 fw-bold fs-5"><span class="badge badge-success">Direkomendasikan</span></div>
                                                                  <?php }else if ($ppdb_interview->interview_student_result == 2) { ?>
                                                                     <div style="text-align: center;" class="mt-3 fw-bold fs-5"><span class="badge badge-danger">Tidak Direkomendasikan</span></div>
                                                                  <?php }else if ($ppdb_interview->interview_student_result == 3) {?>
                                                                   <div class="mt-3 fw-bold fs-5"><span class="badge badge-warning">Dipertimbangkan dengan cacatan</span></div>
                                                                  <?php }?>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            @if($ppdb->stage=="KB" || $ppdb->stage=="TK" || $ppdb->stage=="SD")
                                                            <tr>
                                                                <td>
                                                                    <div class="mt-4 fw-bold fs-5">Observasi Siswa</div>
                                                                </td>
                                                                <td>
                                                                    <div class="mt-4 fw-bold fs-5">
                                                                      <?php                                                              
                                                                            $array= ($observasi_file->{'file_path'} ?? '');
                                                                            if ($array != '' && $array != null) {
                                                                              $result = $array;
                                                                            } else {
                                                                              $result = '';
                                                                            }
                                                                        ?>
                                                                        <a href="{{ ($result =='' && $result == null) ? '' : $result }}" target="_blank" class="linkhref5 fs-6">view</a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                  <?php if (!empty($ppdb_interview->observasi_value)) { ?>
                                                                    <input name="academic_value_result" id="academic_value_result" type="number" class="form-control form-control-solid w-150px form-control-transparent" value="{{ $ppdb_interview->observasi_value }}" readonly />
                                                                 <?php } else { ?>
                                                                  <input name="academic_value_result" id="academic_value_result" type="number" class="form-control form-control-solid w-150px form-control-transparent" value="Belum Ada" readonly />
                                                                 <?php } ?>
                                                                </td>
                                                                <td id="academic_value_label">
                                                                  <?php if (empty($ppdb_interview->observasi_result)) { ?>
                                                                    <div style="text-align: center;"  class="mt-3 fw-bold fs-5"><span class="badge badge-info">Belum Ada</span></div>
                                                                  <?php }else if ($ppdb_interview->observasi_result == 1) { ?>
                                                                  <div style="text-align: center;"  class="mt-3 fw-bold fs-5"><span class="badge badge-success">Direkomendasikan</span></div>
                                                                  <?php }else if ($ppdb_interview->observasi_result == 2) { ?>
                                                                     <div style="text-align: center;" class="mt-3 fw-bold fs-5"><span class="badge badge-danger">Tidak Direkomendasikan</span></div>
                                                                  <?php }else if ($ppdb_interview->observasi_result == 3) {?>
                                                                   <div class="mt-3 fw-bold fs-5"><span class="badge badge-warning">Dipertimbangkan dengan cacatan</span></div>
                                                                  <?php }?>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                      
                                                <div class="border-top my-5 border border-secondary p-5 border-2 rounded bg-light">
                                                    <div class="d-flex flex-stack mb-5">
                                                        <div class="fs-5 fw-bolder form-label px-5">Berdasarkan hasil penilaian dari pihak perwakilan sekolah, maka dengan ini calon siswa tersebut
                                                            dinyatakan :</div>
                                                    </div>
                                    
                                                    <div class="mb-5 pb-5 px-5 row border-bottom">
                                                        <div class="col-lg-7">
                                                            <label for="school_recomendation_result_file_upload" class="form-label">Upload
                                                                Surat
                                                                Keterangan</label>
                                                            <input class="form-control interview-file-upload-teacher interview-file-upload" type="file" name="school_recomendation_file_upload" id="school_recomendation_file_upload" data-target="school_recomendation_file">
                                                            <input type="hidden" name="school_recomendation_file" id="school_recomendation_file" value="{{ $ppdb_interview->school_recomendation_file ?? ' ' }}" />
                                    
                                                            <div class="d-none interview_file_result">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control bg-light" value="nama file tersebut.jpg" readonly="">
                                    
                                                                    <button class="btn btn-danger btn-remove-file-teacher btn-remove-file {{ $is_enabled_form ? '':'d-none' }}" type="button">Delete</button>
                                                                </div>
                                                                <a href="#" target="_blank" class="ms-3">Download File</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                    
                                                    <div class="mb-10 px-5">
                                                        
                                                        <!--begin::Radio group-->
                                                        <div class="btn-group w-100" {{ $is_enabled_form ? 'data-kt-buttons=true data-kt-buttons-target=[data-kt-button]':''}}>
                                                            <!--begin::Radio-->
                                                            <?php
                                                              if(empty($ppdb_interview->school_recomendation_result) )
                                                              {
                                                                ?>
                                                                <label class="btn bg-white btn-outline-secondary text-gray-800 text-hover-white text-active-white btn-outline btn-active-success min-w-300px {{ !empty($ppdb_interview->school_recomendation_result) == 1 ? 'active':'' }}" data-kt-button="true">
                                                                <!--begin::Input-->
                                                                <input class="btn-check" type="radio" name="school_recomendation_result" value="1" checked disabled/>
                                                                <!--end::Input-->
                                                                Belum Ada Inputan
                                                                </label>
                                                            <?php
                                                              }else if($ppdb_interview->school_recomendation_result == 1){ ?>
                                                                <label class="btn bg-white btn-outline-secondary text-gray-800 text-hover-white text-active-white btn-outline btn-active-success min-w-300px {{ !empty($ppdb_interview->school_recomendation_result) == 1 ? 'active':'' }}" data-kt-button="true">
                                                                <!--begin::Input-->
                                                                <input class="btn-check" type="radio" name="school_recomendation_result" value="1" checked disabled />
                                                                <!--end::Input-->
                                                                Direkomendasikan
                                                                </label>
                                                             <?php  }else if($ppdb_interview->school_recomendation_result == 2){ ?>
                                                                <label class="btn bg-white btn-outline-secondary text-gray-800 text-hover-white text-active-white btn-outline btn-active-danger min-w-300px {{ !empty($ppdb_interview->school_recomendation_result) == 2 ? 'active':'' }}" data-kt-button="true">
                                                                <!--begin::Input-->
                                                                <input class="btn-check" type="radio" name="school_recomendation_result" value="2" checked disabled />
                                                                <!--end::Input-->
                                                                Tidak direkomendasikan
                                                                </label>
                                                           <?php   }else if($ppdb_interview->school_recomendation_result == 3){ ?>
                                                                <label class="btn bg-white btn-outline-secondary text-gray-800 text-hover-white text-active-white btn-outline btn-active-warning min-w-300px fs-6 {{ !empty($ppdb_interview->school_recomendation_result) == 3 ? 'active':'' }}" data-kt-button="true">
                                                                <!--begin::Input-->
                                                                <input class="btn-check" type="radio" name="school_recomendation_result" value="3" checked disabled />
                                                                <!--end::Input-->
                                                                Di pertimbangkan
                                                                </label>
                                                             <?php } ?>
                                                            
                                                        </div>
                                                        <!--end::Radio group-->
                                                    </div>
                                    
                                                    <div class="mb-5 ps-5">
                                                        <label class="form-label">Note</label>
                                                        <textarea name="school_recomendation_note" rows="5" class="textarea-teacher form-control" {{ $is_enabled_form ? '':'readonly' }}>{{ !empty($ppdb_interview->school_recomendation_note) }}</textarea>
                                                    </div>
                                    
                                                </div>
                  
                                                @if(!empty($ppdb_interview->school_recomendation_result) > 0)
                                                <div class="border-top my-5 border border-success p-5 border-2 rounded bg-light-success">
                                                    <div class="fs-5 fw-bolder form-label px-5">Berikut ini adalah penilaian dan rekomendasi dari R&D YPAP :</div>
                                    
                                                    <div class="mb-10 px-5">
                                                        <!--begin::Radio group-->
                                                        <div class="btn-group w-100"  {{ $is_enabled_rnd ? 'data-kt-buttons=true data-kt-buttons-target=[data-kt-button]':''}}>
                                                            <?php 
                                                              if($ppdb_interview->interview_result == 1) { ?>
                                                                <label class="btn bg-white btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success min-w-300px {{ $ppdb_interview->interview_result == 1 ? 'active':'' }}" data-kt-button="true">
                                                                    <!--begin::Input-->
                                                                    <input class="btn-check" type="radio" name="interview_result" value="1" {{ $ppdb_interview->interview_result == 1 ? 'checked':'' }} {{ $is_enabled_rnd ? 'disabled':''}} />
                                                                    <!--end::Input-->
                                                                    Lulus
                                                                </label>
                                                            <?php  } else if($ppdb_interview->interview_result == 2) { ?>
                                                                <label class="btn bg-white btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-danger min-w-300px {{ $ppdb_interview->interview_result == 2 ? 'active':'' }}" data-kt-button="true">
                                                                <!--begin::Input-->
                                                                <input class="btn-check" type="radio" name="interview_result" value="2" {{ $ppdb_interview->interview_result == 2 ? 'checked':'' }} {{ $is_enabled_rnd ? 'disabled':''}}  />
                                                                <!--end::Input-->
                                                                Tidak Lulus
                                                                </label>
                                                            <?php  } ?>
                                                        </div>
                                                        <!--end::Radio group-->
                                                    </div>
                                    
                                                    <div class="mb-5 pb-5 px-5 row border-bottom">
                                                        <div class="col-lg-7">
                                                            <label for="school_recomendation_result_file_upload" class="form-label">Upload
                                                                Surat
                                                                Keterangan</label>
                                                            <input class="form-control interview-file-upload-rnd interview-file-upload" type="file" name="interview_result_file_upload" id="interview_result_file_upload" data-target="interview_result_file">
                                                            <input type="hidden" name="interview_result_file" id="interview_result_file" value="{{ $ppdb_interview->interview_result_file }}" />
                                    
                                                            <div class="d-none interview_file_result">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control bg-light" value="nama file tersebut.jpg" readonly="">
                                    
                                                                    <button class="btn btn-danger btn-remove-file-rnd btn-remove-file {{ $is_enabled_rnd ? '':'d-none'}} " type="button">Delete</button>
                                                                </div>
                                                                <a href="#" target="_blank" class="ms-3">Download File</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                    
                                                    <div class="mb-5 ps-5">
                                                        <label class="form-label">Note</label>
                                                        <textarea name="interview_result_note" rows="5" class="textarea-rnd form-control" {{ $is_enabled_rnd ? '':'readonly'}} >{{ $ppdb_interview->interview_result_note }}</textarea>
                                                    </div>
                                                </div>
                                                                    
                                                @endif
                                    
                                            </div>
                                                                    
                                        </div>
                                      </div>

                                        {{-- tutup --}}

      <div class="btndownupspp card-header bg-light mb-6">
          <!--begin::Title-->
          <h3 class="card-title align-items-start flex-column mb-1">
              <span class="card-label fw-bolder mb-1">PEMBAYARAN AWAL UP & SPP</span><span style="color:#5a595a">dibayar pada saat pendaftaraan</span>
               </h3>
               </h3>
          <!--end::Title-->
      </div>

      <div class="informasiupspp">
      
      <div class="card-body">
          <div class="w-100">
              <?php if(!empty($payment_up_spp)): ?>
              <div class="d-flex flex-column flex-xl-row">

                  <div class="flex-lg-row-fluid mb-5 mb-xl-0  me-xl-10">
                      <!--begin::Invoice 2 content-->
                      <div class="mt-n1">
                        <!--begin::Wrapper-->

                        <!--end::Wrapper-->

                        <div class="m-0">
                            <a href="{{ asset($payment_up_spp->image_confirmation) }}" target="_blank">
                                <img id="payment-image_confirmation" src="{{ asset($payment_up_spp->image_confirmation) }}" class="img-fluid zoom border shadow w-100" alt="Bukti Pembayaran">
                            </a>
                        </div>
                        @if($fee_up_pengajuan != '')
                        <div class="m-0">
                            <a href="{{ asset($fee_up_pengajuan->image_confirmation) }}" target="_blank">
                                <img id="payment-image_confirmation" src="{{ asset($fee_up_pengajuan->image_confirmation) }}" class="img-fluid zoom border shadow w-100" alt="Bukti Pembayaran">
                            </a>
                        </div>
                        @endif

                        @if($diskon_pengajuan != '')
                        <div class="m-0">
                            <a href="{{ asset($diskon_pengajuan->image_confirmation) }}" target="_blank">
                                <img id="payment-image_confirmation" src="{{ asset($diskon_pengajuan->image_confirmation) }}" class="img-fluid zoom border shadow w-100" alt="Bukti Pembayaran">
                            </a>
                        </div>
                        @endif
                    </div>
                      <!--end::Invoice 2 content-->
                  </div>

                  <!--begin::Sidebar-->
                  <div class="m-0">
                      <!--begin::Invoice 2 sidebar-->
                      <div class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 min-w-md-300px p-5 bg-lighten">

                          <h6 class="mb-5 fw-bolder text-gray-800 text-hover-primary border-bottom py-3">
                              INFORMASI PEMBAYARAN
                          </h6>

                          <?php
                              if($fee_up->payment_code == 'FEE_UP_LUNAS') {
                                $up = 'Lunas';
                              } else if($fee_up->payment_code == 'FEE_UP') {
                                $up = 'Cicilan';
                              }

                              if($fee_spp->payment_code == 'FEE_SPP_12') {
                                $spp = '12 Bulan';
                              } else if($fee_spp->payment_code == 'FEE_SPP') {
                                $spp = 'Normal';
                              }
                          ?>

                            @if($fee_up_pengajuan == '')
                            <div class="mb-3">
                                <div class="fw-semibold text-gray-600 fs-7">Uang Pangkal {{ $up }}
                                </div>
                                <div class="fw-bold fs-6 text-gray-800">@currency($fee_up->cost)</div>
                            </div>
                            @else 
                            <div class="mb-3">
                                <div class="fw-semibold text-gray-600 fs-7">Uang Pangkal Pengajuan
                                </div>
                                <div class="fw-bold fs-6 text-gray-800">@currency($fee_up_pengajuan->cost)</div>
                            </div>
                            @endif

                          <div class="mb-3">
                              <div class="fw-semibold text-gray-600 fs-7">Uang SPP <?php echo e($spp); ?>

                              </div>
                              <div class="fw-bold fs-6 text-gray-800">Rp. <?php echo number_format($fee_spp->cost,0,',','.'); ?></div>
                          </div>

                          @if ($diskon_pengajuan != '')
                          <div class="mb-3">
                              <div class="fw-semibold text-gray-600 fs-7">Pengajuan Diskon
                              </div>
                              <div class="fw-bold fs-6 text-gray-800">@currency($diskon_pengajuan->cost)</div>
                          </div>
                          @endif
                        
                          <h6 class="mt-10 mb-5 fw-bolder text-gray-800 text-hover-primary border-bottom py-3">
                              INFORMASI
                              DETAIL
                          </h6>
                        
                        <div>
                            <div>Bukti Upload Transfer</div>
                            <div class="fw-bold fs-6 text-gray-800" id="bukti_upload_transfer"> <a href="{{ asset($payment_up_spp->image_confirmation) }}" target="_blank">view</a> </div>
                            
                            @if($diskon_pengajuan != '')
                            <div>Bukti Upload Surat Persetujuan Diskon</div>
                            <div class="fw-bold fs-6 text-gray-800" id="bukti_upload_surat_pengajuan_diskon"> <a href="{{ asset($diskon_pengajuan->image_confirmation) }}" target="_blank">view</a> </div>
                            @endif

                            @if($fee_up_pengajuan != '')
                            <div>Bukti Upload Surat Persetujuan Pembayaran UP Diluar Nominal</div>
                            <div class="fw-bold fs-6 text-gray-800" id="bukti_upload_surat_pengajuan_cicilan"> <a href="{{ asset($fee_up_pengajuan->image_confirmation) }}" target="_blank">view</a> </div>
                            @endif
                        </div>

                          <h6 class="mt-10 mb-5 fw-bolder text-gray-800 text-hover-primary border-bottom py-3">
                              INFORMASI
                              PEMBAYARAN
                          </h6>
                          <div class="mb-3">
                              <div class="fw-semibold text-gray-600 fs-7">Metode
                                  Pembayaran</div>
                              <div class="fw-bold fs-6 text-gray-800">Transfer Bank</div>
                          </div>
                          <div class="mb-3">
                              <div class="fw-semibold text-gray-600 fs-7">Bank</div>
                              <div class="fw-bold text-gray-800 fs-6" id="payment_bank_code"><?php echo e($payment_up_spp->bank_code); ?></div>
                          </div>

                          <div class="mb-3">
                              <div class="fw-semibold text-gray-600 fs-7">Nomor Rekening
                              </div>
                              <div class="fw-bold fs-6 text-gray-800 d-flex align-items-center" id="payment_account_number"><?php echo e($payment_up_spp->account_number); ?></div>
                          </div>
                          <div class="mb-3">
                              <div class="fw-semibold text-gray-600 fs-7">Atas Nama</div>
                              <div class="fw-bold text-gray-800 fs-6" id="payment_bank_owner_name"><?php echo e($payment_up_spp->bank_owner_name); ?></div>
                          </div>
                          <div class="mb-3">
                              <div class="fw-bold text-gray-600 fs-2">Nominal Transfer
                              </div>
                              <div class="fw-bolder text-gray-800 fs-1" id="payment_cost">Rp. <?php echo number_format($payment_up_spp->cost,0,',','.'); ?></div>
                          </div>

                      </div>
                      <!--end::Invoice 2 sidebar-->
                  </div>
                  <!--end::Sidebar-->

              </div>
              <?php else: ?>

              <?php endif; ?>


          </div>
      </div>
  </div>
  </div>

       <div class="btndownformulir card-header bg-light mb-6">
          <!--begin::Title-->
          <h3 class="card-title align-items-start flex-column mb-1">
              <span class="card-label fw-bolder mb-1">PEMBAYARAN FORMULIR PPDB</span><span style="color:#5a595a">dibayar pada saat pendaftaraan</span>
               </h3>
               </h3>
          <!--end::Title-->
      </div>

<div class="informasiformulir">
  <div class="card border shadow-sm">
    <div class="card-body">
        <div class="w-100">
            <?php if(!empty($payment_formulir)): ?>
            <div class="d-flex flex-column flex-xl-row">

                <div class="flex-lg-row-fluid mb-5 mb-xl-0  me-xl-10">
                    <!--begin::Invoice 2 content-->
                    <div class="mt-n1">
                        <!--begin::Wrapper-->

                        <!--end::Wrapper-->

                        <div class="m-0">
                            <a href="https://ppdb.sekolah-avicenna.sch.id/<?php echo e($payment_formulir->image_confirmation); ?>" target="_blank">
                                <img id="payment-image_confirmation" src="https://ppdb.sekolah-avicenna.sch.id/<?php echo e($payment_formulir->image_confirmation); ?>" class="img-fluid zoom border shadow w-100" alt="Bukti Pembayaran">
                            </a>
                        </div>
                    </div>
                    <!--end::Invoice 2 content-->
                </div>

                <!--begin::Sidebar-->
                <div class="m-0">
                    <!--begin::Invoice 2 sidebar-->
                    <div class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 min-w-md-300px p-5 bg-lighten">

                        <h6 class="mb-5 fw-bolder text-gray-800 text-hover-primary border-bottom py-3">
                            INFORMASI PEMBAYARAN
                        </h6>


                        <div class="mb-3">
                            <div class="fw-semibold text-gray-600 fs-7">Biaya Formulir
                            </div>
                            <div class="fw-bold fs-6 text-gray-800" id="ppdb_school">
                                <?php echo e($school_stage[0]); ?></div>   
                        </div>

                        <h6 class="mt-10 mb-5 fw-bolder text-gray-800 text-hover-primary border-bottom py-3">
                            INFORMASI
                            PEMBAYARAN
                        </h6>
                        <div class="mb-3">
                            <div class="fw-semibold text-gray-600 fs-7">Metode
                                Pembayaran</div>
                            <div class="fw-bold fs-6 text-gray-800">Transfer Bank</div>
                        </div>
                        <div class="mb-3">
                            <div class="fw-semibold text-gray-600 fs-7">Bank</div>
                            <div class="fw-bold text-gray-800 fs-6" id="payment_bank_code"><?php echo e($payment_formulir->bank_code); ?></div>
                        </div>

                        <div class="mb-3">
                            <div class="fw-semibold text-gray-600 fs-7">Nomor Rekening
                            </div>
                            <div class="fw-bold fs-6 text-gray-800 d-flex align-items-center" id="payment_account_number"><?php echo e($payment_formulir->account_number); ?></div>
                        </div>
                        <div class="mb-3">
                            <div class="fw-semibold text-gray-600 fs-7">Atas Nama</div>
                            <div class="fw-bold text-gray-800 fs-6" id="payment_bank_owner_name"><?php echo e($payment_formulir->bank_owner_name); ?></div>
                        </div>
                        <div class="mb-3">
                            <div class="fw-bold text-gray-600 fs-2">Nominal Transfer
                            </div>
                            <div class="fw-bolder text-gray-800 fs-1" id="payment_cost">Rp. <?php echo number_format($payment_formulir->cost,0,',','.'); ?></div>
                        </div>

                    </div>
                    <!--end::Invoice 2 sidebar-->
                </div>

            </div>
            <?php endif; ?>
        </div>
    </div>
  </div>
</div>
</div>







                            <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
                                <div class="card border shadow-sm">
                                  <div class="card-header bg-light"> 
                                    <!--begin::Title-->
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder text-dark">DOKUMEN KENEGARAAN</span><span style="color:#5a595a">diunggah pada saat pendaftaraan</span>
                                    </h3>
                                    <!--end::Title-->
                                    </div>
                                    <div class="card-body">
                                      <div class="table-responsive">
                                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                            <thead>
                                                <tr class="fw-bolder fs-6 text-gray-800">
                                                    <th>Nama File</th>
                                                    <th class="w-50px">Uploaded</th>
                                                    <th class="min-w-50px text-end"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $file_uploaded; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                $file_download = '#';
                                                ?>
                                                <tr>
                                                    <td>
                                                        <a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6"><?php echo e($file['label']); ?></a>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $is_uploaded = false;
                                                        $file_download = '#';
                                                        switch ($file['name']) {
                                                            case 'family_card':
                                                                if ($ppdb->family_card != '') {
                                                                    $is_uploaded = true;
                                                                }
                                                                $file_download = $ppdb->family_card;
                                                                break;

                                                            case 'birth_certificate':
                                                                if ($ppdb->birth_certificate != '') {
                                                                    $is_uploaded = true;
                                                                }
                                                                $file_download = $ppdb->birth_certificate;
                                                                break;

                                                            case 'last_report':
                                                                if ($ppdb->last_report != '') {
                                                                    $is_uploaded = true;
                                                                }
                                                                $file_download = $ppdb->last_report;
                                                                break;

                                                            case 'academic_certificate':
                                                                if ($ppdb->academic_certificate != '') {
                                                                    $is_uploaded = true;
                                                                }
                                                                $file_download = $ppdb->academic_certificate;
                                                                break;

                                                            case 'kia_book':
                                                                if ($ppdb->kia_book != '') {
                                                                    $is_uploaded = true;
                                                                }
                                                                $file_download = $ppdb->kia_book;
                                                                break;

                                                            default:
                                                                break;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-end flex-shrink-0">
                                                            <?php if($file_download != '#' && $file_download != null): ?>
                                                            <a href="https://ppdb.sekolah-avicenna.sch.id/<?php echo e($file_download); ?>" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                                <span class="svg-icon svg-icon-3">
                                                                    <i class="bi bi-cloud-arrow-down"></i>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>

                                  <div class="btndown1 card-header bg-light mb-6">
                                      <!--begin::Title-->
                                      <h3 class="card-title align-items-start flex-column mb-1">
                                          <span class="card-label fw-bolder mb-1">FORMULIR PESERTA DIDIK (KEBUTUHAN DATA DAPODIK)</span><span style="color:#5a595a">diisi pada saat pendaftaraan</span>
                                        </h3>
                                      </h3>
                                      <!--end::Title-->
                                  </div>

                                <div class="btnregister1 mb-4 mt-6" style="background-color: #EBEBEB;"> <h5>1. Formulir Peserta Didik</h5> </div>
                                <div class="register1">
                                  <div style="color:rgb(255, 255, 255); background-color: #caaf35; text-align:center;" class="mb-4 mt-3">FORMULIR PESERTA DIDIK</div>
                    
                                    <div class="form-group mb-4">
                                      <?php
                                          $array= array_column($file_additionaldua, 'data1');
                                          if ($array != '' && $array != null) {
                                            $data1 = $array;
                                          } else {
                                            $data1 = '';
                                          }
                                      ?>
                                      <label for="exampleFormControlInput1">No Formulir</label>
                                      <input name="data1" type="text" class="form-control" id="noformulir" placeholder="Masukkan No Formulir" value="<?php echo e(($data1 =='' && $data1 == null) ? '' : $data1[0]); ?>">
                                    </div>
                    
                                    <div class="form-group mb-4">
                                      <?php
                                          $array= array_column($file_additionaldua, 'data2');
                                          if ($array != '' && $array != null) {
                                            $data2 = $array;
                                          } else {
                                            $data2 = '';
                                          }
                                      ?>
                                      <label for="exampleFormControlInput1">Tahun Ajaran</label>
                                      <input name="data2" type="text" class="form-control" id="tahunajaran" placeholder="Tahun Ajaran" value="<?php echo e(($data2 =='' && $data2 == null) ? '' : $data2[0]); ?>">
                                    </div>
                    
                                    <div class="form-group mb-4">
                                      <?php
                                          $array= array_column($file_additionaldua, 'data3');
                                          if ($array != '' && $array != null) {
                                            $data3 = $array;
                                          } else {
                                            $data3 = '';
                                          }
                                      ?>
                                      <label for="exampleFormControlInput1">Tanggal Pendaftaran</label>
                                      <input name="data3" type="date" class="form-control" id="tanggalpendaftaran" placeholder="Tanngal Pendaftaran" value="<?php echo e(($data3 =='' && $data3 == null) ? '' : $data3[0]); ?>">
                                    </div>
                    
                                    <div class="form-group mb-4">
                                      <?php
                                          $array= array_column($file_additionaldua, 'data4');
                                          if ($array != '' && $array != null) {
                                            $data4 = $array;
                                          } else {
                                            $data4 = '';
                                          }

                                          if(!empty($data4[0])){
                                            if($data4[0] == 1) {
                                              $data4[0] = 'Peserta didik Baru';
                                            } else {
                                              $data4[0] = 'Peserta didik Pindahan';
                                            }
                                          }
                                      ?>
                                      <label for="exampleFormControlInput1">Status Siswa</label>
                                      <select name="data4" id="statussiswa" class="form-control">
                                        <option value="<?php echo e(($data4 =='' && $data4 == null) ? '' : $data4[0]); ?>"><?php echo e(($data4 =='' && $data4 == null) ? 'Pilih' : $data4[0]); ?></option>
                                      </select>
                                    </div>
                    
                                    <div style="color:rgb(255, 255, 255); background-color: #c003ff; text-align:center;" class="mb-4 mt-3">DATA PRIBADI</div>
                    
                                    <div class="form-group mb-4">
                                      <?php
                                          $array= array_column($file_additionaldua, 'data5');
                                          if ($array != '' && $array != null) {
                                            $data5 = $array;
                                          } else {
                                            $data5 = '';
                                          }
                                      ?>
                                      <label for="exampleFormControlInput1">Nama Lengkap</label>
                                      <input name="data5" type="text" class="form-control" id="namalengkap" placeholder="Masukkan Lengkap" value="<?php echo e(($data5 =='' && $data5 == null) ? '' : $data5[0]); ?>">
                                      <p style="color: #c003ff" class="fs-8">Nama peserta didik sesuai dokumen resmi yang berlaku (Akta atau Ijazah sebelumnya ). Hanya bisa diubah melalui <a href="https://vervalpd.data.kemdikbud.go.id">vervalpd.data.kemdikbud.go.id</a></p>
                                    </div>
                    
                                    <div class="form-group mb-4">
                                      <?php
                                          $array= array_column($file_additionaldua, 'data6');
                                          if ($array != '' && $array != null) {
                                            $data6 = $array;
                                          } else {
                                            $data6 = '';
                                          }

                                          if(!empty($data6[0])) {
                                            if ($data6[0] == 1) {
                                              $data6[0] = 'Perempuan';
                                            } else {
                                              $data6[0] = 'Laki - Laki';
                                            }
                                          }
                                      ?>
                                      <label for="exampleFormControlInput1">Jenis Kelamin</label>
                                      <select name="data6" id="statussiswa" class="form-control">
                                        <option value="<?php echo e(($data6 =='' && $data6 == null) ? '' : $data6[0]); ?>"><?php echo e(($data6 =='' && $data6 == null) ? 'Pilih' : $data6[0]); ?></option>
                                      </select>
                                    </div>
                    
                                    <div class="form-group mb-4">
                                      <?php
                                          $array= array_column($file_additionaldua, 'data7');
                                          if ($array != '' && $array != null) {
                                            $data7 = $array;
                                          } else {
                                            $data7 = '';
                                          }
                                      ?>
                                      <label for="exampleFormControlInput1">Nisn</label>
                                      <input name="data7" type="text" class="form-control" id="nisn" placeholder="Masukkan Nisn" value="<?php echo e(($data7 =='' && $data7 == null) ? '' : $data7[0]); ?>">
                                      <p style="color: #c003ff" class="fs-8">Nomor Induk Siswa Nasional peserta didik (jika memiliki), jika belum memiliki, maka wajib dikosongkan. NISN memiliki format 10 digit angka. contoh: 0009321234  Untuk memeriksa NISN, dapat mengunjungi laman <a href="http://nisn.data.kemdikbud.go.id">http:// nisn.data.kemdikbud.go.id</a></p>
                                    </div>
                    
                                    <div class="form-group mb-4">
                                      <?php
                                          $array= array_column($file_additionaldua, 'data8');
                                          if ($array != '' && $array != null) {
                                            $data8 = $array;
                                          } else {
                                            $data8 = '';
                                          }
                                      ?>
                                      <label for="exampleFormControlInput1">Nik / No.KITAS (Untuk WNA)</label>
                                      <input name="data8" type="text" class="form-control" id="nik" placeholder="Masukkan Nik / Kitas" value="<?php echo e(($data8 =='' && $data8 == null) ? '' : $data8[0]); ?>">
                                      <p style="color: #c003ff" class="fs-8">Nomor Induk Kependudukan yang tercantum pada Kartu Keluarga, Kartu identitas Anak, atau KTP (jika sudah Memiliki) bagi WNI. NIK memiliki format angka 16 digit angka. Contoh:6112090906021104
                                       <br> Pastikan NIK tidak tertukar dengan No. Kartu Keluarga , Karena keduanya memiliki format yang sama. Bagi WNA, diisi dengan nomor Kartu Izin TInggak Terbatas (KITAS)</p>
                                    </div>
                    
                    
                                    <div class="form-group mb-4">
                                      <?php
                                          $array= array_column($file_additionaldua, 'data9');
                                          if ($array != '' && $array != null) {
                                            $data9 = $array;
                                          } else {
                                            $data9 = '';
                                          }
                                      ?>
                                      <label for="exampleFormControlInput1">Tempat Lahir</label>
                                      <input name="data9" type="text" class="form-control" id="tempatlahir" placeholder="Masukkan Tempat Lahir" value="<?php echo e(($data9 =='' && $data9 == null) ? '' : $data9[0]); ?>">
                                      <p style="color: #c003ff" class="fs-8">Tempat lahir peserta didik sesuai dokumen resmi yang berlaku</p>
                                    </div>
                    
                                    <div class="form-group mb-4">
                                      <?php
                                          $array= array_column($file_additionaldua, 'data10');
                                          if ($array != '' && $array != null) {
                                            $data10 = $array;
                                          } else {
                                            $data10 = '';
                                          }
                                      ?>
                                      <label for="exampleFormControlInput1">Tanggal Lahir</label>
                                      <input name="data10" type="date" class="form-control" id="tanggallahir" placeholder="Tanngal Lahir" value="<?php echo e(($data10 =='' && $data10 == null) ? '' : $data10[0]); ?>">
                                      <p style="color: #c003ff" class="fs-8">Tanggal lahir peserta didik sesuai dokumen resmi yang berlaku, Hanya bisa diubah melalui <a href="http://vervalpd.data.kemdikbud.go.id">http://vervalpd.data.kemdikbud.go.id</a> </p>
                                    </div>
                    
                                    <div class="form-group mb-4">
                                      <?php
                                          $array= array_column($file_additionaldua, 'data11');
                                          if ($array != '' && $array != null) {
                                            $data11 = $array;
                                          } else {
                                            $data11 = '';
                                          }
                                      ?>
                                      <label for="exampleFormControlInput1">No Registrasi Akta Kelahiran</label>
                                      <input name="data11" type="text" class="form-control" id="noregistrasiaktakelahiran" placeholder="No Registrasi Akta Kelahiran" value="<?php echo e(($data11 =='' && $data11 == null) ? '' : $data11[0]); ?>">
                                      <p style="color: #c003ff" class="fs-8">Nomor Registrasi Akta Kelahiran. Nomor registrasi yang dimaksud umumnya tercantum pada bagian tengah atas lembar kutipan akta kelahiran</p>
                                    </div>
                    
                                    <div class="form-group mb-4">
                                      <?php
                                          $array= array_column($file_additionaldua, 'data12');
                                          if ($array != '' && $array != null) {
                                            $data12 = $array;
                                          } else {
                                            $data12 = '';
                                          }

                                          if(!empty($data12[0])) {
                                            if ($data12[0] == 1) {
                                              $data12[0] = 'Islam';
                                            } else if ($data12[0] == 2) {
                                              $data12[0] = 'Kristen';
                                            } else if ($data12[0] == 3) {
                                              $data12[0] = 'Katholik';
                                            } else if ($data12[0] == 4) {
                                              $data12[0] = 'Hindu';
                                            } else if ($data12[0] == 5) {
                                              $data12[0] = 'Budha';
                                            } else if ($data12[0] == 6) {
                                              $data12[0] = 'Khong Hu Chu';
                                            } else if ($data12[0] == 7) {
                                              $data12[0] = 'Kepercayaan Kpd Tuhan YME';
                                            } else if ($data12[0] == 8) {
                                              $data12[0] = 'Lainnya';
                                            }
                                          }
                                      ?>
                                      <label for="exampleFormControlInput1">Agama & Kepercayaan</label>
                                      <select name="data12" id="agamadankepercayaan" class="form-control">
                                        <option value="<?php echo e(($data12 =='' && $data12 == null) ? '' : $data12[0]); ?>"><?php echo e(($data12 =='' && $data12 == null) ? 'Pilih' : $data12[0]); ?></option>
                                      </select>
                                      <p style="color: #c003ff" class="fs-8">Agama atau kepercayaan yang dianut oleh peserta didik. apabila peserta didik adalah penghayat kepercayaan (misanya pada daerah tertentu yang masih memiliki penganut kepercayaan), dapat memilih opsi Kepercayaan kpd Tuhan YME</a> </p>
                                    </div>
                    
                                    <div class="form-group mb-4">
                                      <?php
                                          $array= array_column($file_additionaldua, 'data13');
                                          if ($array != '' && $array != null) {
                                            $data13 = $array;
                                          } else {
                                            $data13 = '';
                                          }

                                          if(!empty($data13[0])) {
                                            if ($data13[0] == 1) {
                                              $data13[0] = 'Indonesia';
                                            } else {
                                              $data13[0] = 'Asing (WNA)';
                                            }
                                          }
                                      ?>
                                      <label for="exampleFormControlInput1">Kewarganegaraan</label>
                                      <select name="data13" id="agamadankepercayaan" class="form-control">
                                        <option value="<?php echo e(($data13 =='' && $data13 == null) ? '' : $data13[0]); ?>"><?php echo e(($data13 =='' && $data13 == null) ? 'Pilih' : $data13[0]); ?></option>
                                      </select>
                                    </div>
                                    <div class="form-group mb-4">
                                      <?php
                                          $array= array_column($file_additionaldua, 'data14');
                                          if ($array != '' && $array != null) {
                                            $data14 = $array;
                                          } else {
                                            $data14 = '';
                                          }
                                      ?>
                                      <label for="" >Nama Negara</label>
                                      <input name="data14" type="text" class="form-control" placeholder="Masukkan Nama Negara" value="<?php echo e(($data14 =='' && $data14 == null) ? '' : $data14[0]); ?>">
                                      <p style="color: #c003ff" class="fs-8">Kewarganegaraan peserta didik </p>
                                    </div>
                    
                                    <div class="form-group mb-4">
                                      <?php
                                          $array= array_column($file_additionaldua, 'data15');
                                          if ($array != '' && $array != null) {
                                            $data15 = $array;
                                          } else {
                                            $data15 = '';
                                          }       
                                          
                                          if (!empty($data15[0])) {
                                            if ($data15[0] == 1) {
                                                $data15[0] = 'Tidak';
                                            } else if ($data15[0] == 2) {
                                              $data15[0] = 'Netra';
                                            } else if ($data15[0] == 3) {
                                              $data15[0] = 'Rungu';
                                            } else if ($data15[0] == 4) {
                                              $data15[0] = 'Grahita Ringan';
                                            } else if ($data15[0] == 5) {
                                              $data15[0] = 'Grahita Sedang';
                                            } else if ($data15[0] == 6) {
                                              $data15[0] = 'Daksa Ringan';
                                            } else if ($data15[0] == 7) {
                                              $data15[0] = 'Daksa Sedang';
                                            } else if ($data15[0] == 8) {
                                              $data15[0] = 'Laras';
                                            } else if ($data15[0] == 9) {
                                              $data15[0] = 'Wicara F';
                                            } else if ($data15[0] == 10) {
                                              $data15[0] = 'Tuna Ganda';
                                            } else if ($data15[0] == 11) {
                                              $data15[0] = 'Hiper Aktif';
                                            } else if ($data15[0] == 12) {
                                              $data15[0] = 'Cerdas Istimewa';
                                            } else if ($data15[0] == 13) {
                                              $data15[0] = 'Bakat Istimewa';
                                            } else if ($data15[0] == 14) {
                                              $data15[0] = 'Kesulitan Belajar';
                                            } else if ($data15[0] == 15) {
                                              $data15[0] = 'Narkoba';
                                            } else if ($data15[0] == 16) {
                                              $data15[0] = 'Indigo';
                                            } else if ($data15[0] == 17) {
                                              $data15[0] = 'Down Sindrome';
                                            } else if ($data15[0] == 18) {
                                              $data15[0] = 'Autis';
                                            }
                                          }
                                      ?>
                                        <label for="">Berkebutuhan Khusus</label>
                                      <div class="row">
                                        <div class="col-sm">
                                          <select name="data15" id="berkebutuhankhusus1" class="form-control">
                                            <option value="<?php echo e(($data15 =='' && $data15 == null) ? '' : $data15[0]); ?>"><?php echo e(($data15 =='' && $data15 == null) ? 'Pilih' : $data15[0]); ?></option>
                                          </select>
                                        </div>
                                        <?php
                                              $array= array_column($file_additionaldua, 'data16');
                                              if ($array != '' && $array != null) {
                                                $data16 = $array;
                                              } else {
                                                $data16 = '';
                                              }
                                              if(!empty($data16[0])) {
                                                if ($data16[0] == 1) {
                                                $data16[0] = 'Tidak';
                                                } else if ($data16[0] == 2) {
                                                  $data16[0] = 'Netra';
                                                } else if ($data16[0] == 3) {
                                                  $data16[0] = 'Rungu';
                                                } else if ($data16[0] == 4) {
                                                  $data16[0] = 'Grahita Ringan';
                                                } else if ($data16[0] == 5) {
                                                  $data16[0] = 'Grahita Sedang';
                                                } else if ($data16[0] == 6) {
                                                  $data16[0] = 'Daksa Ringan';
                                                } else if ($data16[0] == 7) {
                                                  $data16[0] = 'Daksa Sedang';
                                                } else if ($data16[0] == 8) {
                                                  $data16[0] = 'Laras';
                                                } else if ($data16[0] == 9) {
                                                  $data16[0] = 'Wicara F';
                                                } else if ($data16[0] == 10) {
                                                  $data16[0] = 'Tuna Ganda';
                                                } else if ($data16[0] == 11) {
                                                  $data16[0] = 'Hiper Aktif';
                                                } else if ($data16[0] == 12) {
                                                  $data16[0] = 'Cerdas Istimewa';
                                                } else if ($data16[0] == 13) {
                                                  $data16[0] = 'Bakat Istimewa';
                                                } else if ($data16[0] == 14) {
                                                  $data16[0] = 'Kesulitan Belajar';
                                                } else if ($data16[0] == 15) {
                                                  $data16[0] = 'Narkoba';
                                                } else if ($data16[0] == 16) {
                                                  $data16[0] = 'Indigo';
                                                } else if ($data16[0] == 17) {
                                                  $data16[0] = 'Down Sindrome';
                                                } else if ($data16[0] == 18) {
                                                  $data16[0] = 'Autis';
                                                }
                                              }
                                          ?>
                                        <div class="col-sm">
                                          <select name="data16" id="berkebutuhankhusus2" class="form-control">
                                            <option value="<?php echo e(($data16 =='' && $data16 == null) ? '' : $data16[0]); ?>"><?php echo e(($data16 =='' && $data16 == null) ? 'Pilih' : $data16[0]); ?></option>
                                          </select>
                                        </div>
                                      </div>
                                      <p style="color: #c003ff" class="fs-8">Kebutuhan khusus yang disandang oleh peserta didik, Dapat dipilih lebih dari satu</p>
                                    </div>
                                  </div>

                                  <div class="btnregister2 mb-4 mt-6" style="background-color:#EBEBEB;"> <p>a. Detail 1</p> </div>
                                  <div class="register2">
  
                                    <div class="form-group mb-4">
                                      <?php
                                        $array= array_column($file_additionaldua, 'data17');
                                        if ($array != '' && $array != null) {
                                          $data17 = $array;
                                        } else {
                                          $data17 = '';
                                        }
                                    ?>
                                      <label for="exampleFormControlInput1">Alamat Jalan</label>
                                      <textarea name="data17" class="form-control" id="alamatjalan" placeholder="Masukkan Alamat Jalan" rows="3"><?php echo e(($data17 =='' && $data17 == null) ? '' : $data17[0]); ?></textarea>
                                      <p style="color: #c003ff" class="fs-8">Jalur tempat tinggal peserta didik, terdiri atas gang, kompleks, blok, nomor rumah , dan sebagainya selain informasi yang diminta oleh kolom-kolom yang lain pada bagian ini, sebagai contoh ,peserta didik tinggal di sebuah kompleks perumahan griya adam yang berada pada jalan kemanggisan, dengan nomor rumah 4-c, di lingkungan rt 005 dan rw 011, dusun cempaka,desa salatiga, maka dapat di isi dengan jl.kemanggisan,komp. Griya Adam No 4-c</p>
                                    </div>
              
                                    <div class="form-group mb-4">
                                      <div class="row" >
                                        <div class="col-sm">
              
                                            <?php
                                                $array= array_column($file_additionaldua, 'data18');
                                                if ($array != '' && $array != null) {
                                                  $data18 = $array;
                                                } else {
                                                  $data18 = '';
                                                }
                                            ?>
                                          <label for="exampleFormControlInput1">RT</label>
                                          <input name="data18" type="text" class="form-control" id="rt" placeholder="Masukkan No Rt" value="<?php echo e(($data18 =='' && $data18 == null) ? '' : $data18[0]); ?>">
                                        </div>
                                        <div class="col-sm">
                                          <?php
                                                $array= array_column($file_additionaldua, 'data19');
                                                if ($array != '' && $array != null) {
                                                  $data19 = $array;
                                                } else {
                                                  $data19 = '';
                                                }
                                            ?>
                                          <label for="exampleFormControlInput1">Rw</label>
                                          <input name="data19" type="text" class="form-control" id="rw" placeholder="Masukkan No Rw" value="<?php echo e(($data19 =='' && $data19 == null) ? '' : $data19[0]); ?>">
                                        </div>
                                      </div>
                                      <p style="color: #c003ff" class="fs-8">Nomor RT dan Nomor Rw tempat tinggal peserta didik saat ini, Dari contoh di atas ,misalnya dapat di isi angka 5 dan rw angka 11</p>
                                    </div>
              
                                    <div class="form-group mb-4">
                                           <?php
                                                $array= array_column($file_additionaldua, 'data20');
                                                if ($array != '' && $array != null) {
                                                  $data20 = $array;
                                                } else {
                                                  $data20 = '';
                                                }
                                            ?>
                                      <label for="">Nama Dusun</label>
                                      <input name="data20" type="text" class="form-control" id="namadusun" placeholder="Masukkan nama dusun" value="<?php echo e(($data20 =='' && $data20 == null) ? '' : $data20[0]); ?>">
                                      <p style="color: #c003ff" class="fs-8">Nama dusun tempat tinggal peserta didik saat ini,dari contoh diatas ,misalnya dapat diisi dengan Campaka</p>
                                    </div>
              
                                    <div class="form-group mb-4">
                                          <?php
                                                $array= array_column($file_additionaldua, 'data21');
                                                if ($array != '' && $array != null) {
                                                  $data21 = $array;
                                                } else {
                                                  $data21 = '';
                                                }
                                            ?>
                                      <label for="">Nama Kelurahan / Desa</label>
                                      <input name="data21" type="text" class="form-control" id="namakelurahandesa" placeholder="Masukkan nama Kelurahan atau desa" value="<?php echo e(($data21 =='' && $data21 == null) ? '' : $data21[0]); ?>">
                                      <p style="color: #c003ff" class="fs-8">Nama desa atau kelurahan tempat tinggal peserta saat ini, Dari contoh diatas, dapat di isi dengan Bayongbong</p>
                                    </div>
              
                                    <div class="form-group mb-4">
                                           <?php
                                                $array= array_column($file_additionaldua, 'data22');
                                                if ($array != '' && $array != null) {
                                                  $data22 = $array;
                                                } else {
                                                  $data22 = '';
                                                }
                                            ?>
                                      <label for="">Nama Kelurahan / Desa</label>
                                      <input name="data22" type="text" class="form-control" id="namakelurahandesa" placeholder="Masukkan nama Kelurahan atau desa" value="<?php echo e(($data22 =='' && $data22 == null) ? '' : $data22[0]); ?>">
                                      <p style="color: #c003ff" class="fs-8">Nama desa atau kelurahan tempat tinggal peserta saat ini, Dari contoh diatas, dapat di isi dengan Bayongbong</p>
                                    </div>
              
                                    <div class="form-group mb-4">
                                          <?php
                                                $array= array_column($file_additionaldua, 'data23');
                                                if ($array != '' && $array != null) {
                                                  $data23 = $array;
                                                } else {
                                                  $data23 = '';
                                                }
                                            ?>
                                      <label for="">Kecamatan</label>
                                      <input name="data23" type="text" class="form-control" id="kecamatan" placeholder="Masukkan nama Kecamatan" value="<?php echo e(($data23 =='' && $data23 == null) ? '' : $data23[0]); ?>">
                                      <p style="color: #c003ff" class="fs-8">Kecamatan tempat tinggal peserta didik saat ini</p>
                                    </div>
              
                                    <div class="form-group mb-4">
                                          <?php
                                                $array= array_column($file_additionaldua, 'data24');
                                                if ($array != '' && $array != null) {
                                                  $data24 = $array;
                                                } else {
                                                  $data24 = '';
                                                }
                                            ?>
                                      <label for="">Kode Pos</label>
                                      <input name="data24" type="text" class="form-control" id="kodepos" placeholder="Masukkan Kode Pos" value="<?php echo e(($data24 =='' && $data24 == null) ? '' : $data24[0]); ?>">
                                      <p style="color: #c003ff" class="fs-8">Kode Pos tempat tinggal saat ini</p>
                                    </div>
              
                                    <div class="form-group mb-4">
                                          <?php
                                                $array= array_column($file_additionaldua, 'data25');
                                                if ($array != '' && $array != null) {
                                                  $data25 = $array;
                                                } else {
                                                  $data25 = '';
                                                }
  
                                                if(!empty($data25[0])) {
                                                  if ($data25[0] == 1) {
                                                    $data25[0] = 'Bersama Orang Tua';
                                                  } else if ($data25[0] == 2) {
                                                    $data25[0] = 'Wali';
                                                  } else if ($data25[0] == 3) {
                                                    $data25[0] = 'Kos';
                                                  } else if ($data25[0] == 4) {
                                                    $data25[0] = 'Asrama';
                                                  } else if ($data25[0] == 5) {
                                                    $data25[0] = 'Panti Asuhan';
                                                  } else if ($data25[0] == 6) {
                                                    $data25[0] = 'Pesantren';
                                                  } else if ($data25[0] == 7) {
                                                    $data25[0] = 'Lainnya';
                                                  }
                                                }
                                            ?>
                                      <label for="">Tempat Tinggal</label>
                                      <select name="data25" id="tempattinggal" class="form-control">
                                        <option value="<?php echo e(($data25 =='' && $data25 == null) ? '' : $data25[0]); ?>"><?php echo e(($data25 =='' && $data25 == null) ? 'pilih' : $data25[0]); ?></option>
                                      </select>
                                      <p style="color: #c003ff" class="fs-8">Kepemilikan tempat tinggal peserta didik saat ini(yang telah di isi pada kolom-kolom sebelumnya diatas)</p>
                                    </div>
              
                                    <div class="form-group mb-4">
                                      <?php
                                                $array= array_column($file_additionaldua, 'data26');
                                                if ($array != '' && $array != null) {
                                                  $data26 = $array;
                                                } else {
                                                  $data26 = '';
                                                }
  
                                                if(!empty($data26[0])) {
                                                  if ($data26[0] == 1) {
                                                      $data26[0] = 'Jalan Kaki';
                                                  } else if ($data26[0] == 2) {
                                                    $data26[0] = 'Kendaraan Pribadi';
                                                  } else if ($data26[0] == 3) {
                                                    $data26[0] = 'Kendaraan Umum/angkot/pete-pete';
                                                  } else if ($data26[0] == 4) {
                                                    $data26[0] = 'Jemputan Sekolah';
                                                  } else if ($data26[0] == 5) {
                                                    $data26[0] = 'Kereta Api';
                                                  } else if ($data26[0] == 6) {
                                                    $data26[0] = 'Ojek';
                                                  } else if ($data26[0] == 7) {
                                                    $data26[0] = 'Andong/Bendi/Sado/Dokar/Delman/Beca';
                                                  } else if ($data26[0] == 8) {
                                                    $data26[0] = 'Lainnya';
                                                  }
                                                }
                                            ?>
                                      <label for="">Moda Transportasi</label>
                                      <select name="data26" id="modatransportasi" class="form-control">
                                        <option value="<?php echo e(($data26 =='' && $data26 == null) ? '' : $data26[0]); ?>"><?php echo e(($data26 =='' && $data26 == null) ? 'pilih' : $data26[0]); ?></option>
                                      </select>
                                      <p style="color: #c003ff" class="fs-8">Jenis transportasi utama atau yang paling sering digunakan peserta didik untuk berangkat ke sekolah</p>
                                    </div>
              
                                    <div class="form-group mb-4">
                                      <?php
                                                $array= array_column($file_additionaldua, 'data27');
                                                if ($array != '' && $array != null) {
                                                  $data27 = $array;
                                                } else {
                                                  $data27 = '';
                                                }
                                            ?>
                                      <label for="">Nomor KKS (Kamu Keluarga Sejahtera)</label>
                                      <input name="data27" type="text" id="nomorkks" class="form-control" placeholder="Masukkan Nomor KKS" value="<?php echo e(($data27 =='' && $data27 == null) ? '' : $data27[0]); ?>">
                                      <p style="color: #c003ff" class="fs-8">Nomor Kartu Keluarga Sejahtera (Jika Memiliki) Nomor yang dimaksud adalah 6 digit kode yang tertera pada sisi belakang kiri atas kartu (di bawah lambang Garuda Pancasila)</p>
                                      <p style="color: #c003ff" class="fs-8">Peserta didik dinyatakan sebagai anggota KKS apabila tercantum di dalam kartu keluarga dengan kepala keluarga pemegang KKS. Sebagai contoh,peserta didik tercantum pada KK dengan keluarganya adalah kakek ,Apabila kakek peserta didik tersebut pemegang KKS,maka nomor KKS milik kakek peserta didik yang bersangkutan dapat di isikan pada kolom ini</p>
                                    </div>
              
                                    <div class="form-group mb-4">
                                      <?php
                                                $array= array_column($file_additionaldua, 'data28');
                                                if ($array != '' && $array != null) {
                                                  $data28 = $array;
                                                } else {
                                                  $data28 = '';
                                                }
                                            ?>
                                      <label for="">Anak Keberapa</label>
                                      <input name="data28" type="text" id="anakkeberapa" class="form-control" placeholder="Masukkan sesuai dengan Kartu Keluarga" value="<?php echo e(($data28 =='' && $data28 == null) ? '' : $data28[0]); ?>">
                                    </div>
              
                                    <div class="form-group mb-4">
                                      <?php
                                            $array= array_column($file_additionaldua, 'data29');
                                            if ($array != '' && $array != null) {
                                              $data29 = $array;
                                            } else {
                                              $data29 = '';
                                            }
  
                                            if(!empty($data29[0])) {
                                              if ($data29[0] == 1) {
                                                $data29[0] = 'Ya';
                                              } else {
                                                $data29[0] = 'Tidak';
                                              }     
                                            }
                                        ?>
                                       <label for="">Penerima KPS/PKH</label>
                                       <select name="data29" id="penerimakpspkh" class="form-control">
                                        <option value="<?php echo e(($data29 =='' && $data29 == null) ? '' : $data29[0]); ?>"><?php echo e(($data29 =='' && $data29 == null) ? 'Pilih' : $data29[0]); ?></option>
                                       </select>
                                       <p style="color: #c003ff" class="fs-8">Status peserta didik sebagai penerima manfaat KPS (Kartu Perlindungan Sosial)/PKH(Program Keluarga Harapan).
                                        Peserta didik dinyatakan sebagai penerima KPS/PKH apabila tercantum di dalam kartu keluarga dengan kepala keluarga pemegang KPS/PKH Sebagai
                                        contoh, peserta didik tercantum pada KK dengan kepada keluarganya adalah kakek. Apabila kakek didik peserta didik disebut pemegang KPS/PKH,
                                        maka peserta didik yang bersangkutan dinyatakan penerima KPS/PKH</p>
                                    </div>
              
                            </div>

                              <div class="btnregister3 mb-4 mt-6" style="background-color: #EBEBEB;"><p>b. Detail 2</p> </div>
                                <div class="register3">

                                      <div class="form-group mb-4">
                                                <?php
                                                    $array= array_column($file_additionaldua, 'data30');
                                                    if ($array != '' && $array != null) {
                                                      $data30 = $array;
                                                    } else {
                                                      $data30 = '';
                                                    }
                                                ?>
                                        <label for="">No. KPH/PKH (apabila penerima)</label>
                                        <input name="data30" type="text" id="nokphpkh" class="form-control" placeholder="Masukkan Nomor KPH/PKH (apabila penerima)" value="<?php echo e(($data30 =='' && $data30 == null) ? '' : $data30[0]); ?>">
                                        <p style="color: #c003ff" class="fs-8">Nomor KPS atau PKH yang masih berlaku jika sebelumnya dipilih sebagai penerima KPS/PKH </p>
                                      </div>
                      
                                      <div class="form-group mb-4">
                                              <?php
                                                    $array= array_column($file_additionaldua, 'data31');
                                                    if ($array != '' && $array != null) {
                                                      $data31 = $array;
                                                    } else {
                                                      $data31 = '';
                                                    }

                                                    if(!empty($data31[0])) {
                                                      if ($data31[0] == 1) {
                                                        $data31[0] = 'Ya';
                                                      } else {
                                                        $data31[0] = "Tidak";
                                                      }
                                                    }
                                                ?>
                                        <div class="row">
                                          <div class="col-sm">
                                            <label for="">Usulan dari Sekolah (layak PIP)</label>
                                            <select name="data31" id="penerimakpspkh" class="form-control">
                                            <option value="<?php echo e(($data31 =='' && $data31 == null) ? '' : $data31[0]); ?>"><?php echo e(($data31 =='' && $data31 == null) ? 'Pilih' : $data31[0]); ?></option>
                                            </select>
                                            <p style="color: #c003ff" class="fs-8">Pilih Ya apabila peserta didik layak diajukan sebagai penerima manfaat Program Indonesia Pintar .Pilih tidak jika tidak memenuhi kriteria Opsi ini khusus bagi peserta didik yang tidak memiliki KIP.Peserta didik yang memiliki KIP silahkan pilih Tidak</p>
                                          </div>
                                          <div class="col-sm">
                                            <?php
                                                  $array= array_column($file_additionaldua, 'data32');
                                                  if ($array != '' && $array != null) {
                                                    $data32 = $array;
                                                  } else {
                                                    $data32 = '';
                                                  }

                                                  if(!empty($data32[0])) {
                                                    if ($data32[0] == 1) {
                                                      $data32[0] = 'Ya';
                                                    } else {
                                                      $data32[0] = 'Tidak';
                                                    }
                                                  }
                                              ?>
                                            <label for="">Penerima KIP (Kartu Indonesia Pintar)</label>
                                            <select name="data32" id="penerimakip" class="form-control">
                                            <option value="<?php echo e(($data32 =='' && $data32 == null) ? '' : $data32[0]); ?>"><?php echo e(($data32 =='' && $data32 == null) ? 'Pilih' : $data32[0]); ?></option>
                                            </select>
                                            <p style="color: #c003ff" class="fs-8">Pilih Ya apabila peserta didik memiliki Kartu Indonesia Pintar (KIP) .Pilih Tidak jika tidak memiliki</p>
                                          </div>
                                        </div>
                                      </div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                                  $array= array_column($file_additionaldua, 'data33');
                                                  if ($array != '' && $array != null) {
                                                    $data33 = $array;
                                                  } else {
                                                    $data33 = '';
                                                  }
                                              ?>
                                        <label for="">Nomor KIP</label>
                                        <input name="data33" type="text" id="nomorkip" class="form-control" placeholder="Masukkan Nomor KIP" value="<?php echo e(($data33 =='' && $data33 == null) ? '' : $data33[0]); ?>">
                                        <p style="color: #c003ff" class="fs-8">Nomor Kip milik peserta didik apabila sebelumnya telah dipilih sebagai penerima KIP,Nomor yang dimaksud adalah 6 digit kode yang tertera pada sisi belakang kanan atas kartu (di bawah lambang toga) </p>
                                      </div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                                  $array= array_column($file_additionaldua, 'data34');
                                                  if ($array != '' && $array != null) {
                                                    $data34 = $array;
                                                  } else {
                                                    $data34 = '';
                                                  }
                                              ?>
                                        <label for="">Nama tertera pada KIP</label>
                                        <input name="data34" type="text" id="namakip" class="form-control" placeholder="Masukkan Nama KIP" value="<?php echo e(($data34 =='' && $data34 == null) ? '' : $data34[0]); ?>">
                                        <p style="color: #c003ff" class="fs-8"> Nama Yang tertera pada KIP milik peserta didik</p>
                                      </div>
                      
                      
                                      <div class="form-group mb-4">
                                        <?php
                                                  $array= array_column($file_additionaldua, 'data35');
                                                  if ($array != '' && $array != null) {
                                                    $data35 = $array;
                                                  } else {
                                                    $data35 = '';
                                                  }

                                                  if(!empty($data35[0])) {
                                                    if ($data35[0] == 1) {
                                                      $data35[0] = 'Ya';
                                                    } else {
                                                      $data35[0] = 'Tidak';
                                                    }
                                                  }
                                              ?>
                                        <label for="">Terima fisik Kartu (KIP)</label>
                                        <select name="data35" id="terimakip" class="form-control">
                                        <option value="<?php echo e(($data35 =='' && $data35 == null) ? '' : $data35[0]); ?>"><?php echo e(($data35 =='' && $data35 == null) ? 'Pilih' : $data35[0]); ?></option>
                                        </select>
                                        <p style="color: #c003ff" class="fs-8">Status bahwa peserta didik sudah menerima atau belum menerima Kartu Indonesia Pintar secara fisik</p>
                                      </div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                                  $array= array_column($file_additionaldua, 'data36');
                                                  if ($array != '' && $array != null) {
                                                    $data36 = $array;
                                                  } else {
                                                    $data36 = '';
                                                  }


                                                  if (!empty($data36[0])) {
                                                  if ($data36[0] == 1) {
                                                    $data36[0] = 'Pemegang PKH/LPS/KIP';
                                                  } else if ($data36[0] == 2){
                                                    $data36[0] = 'Penerima BSM 2014';
                                                  } else if ($data36[0] == 3){
                                                    $data36[0] = 'Yatim Piatu/ Panti Asuhan/ Panti Sosial';
                                                  } else if ($data36[0] == 4){
                                                    $data36[0] = 'Dampak Bencana';
                                                  } else if ($data36[0] == 5){
                                                    $data36[0] = 'Pernah Drop Out';
                                                  } else if ($data36[0] == 6){
                                                    $data36[0] = 'Siswa Miskin/Rentan Miskin';
                                                  } else if ($data36[0] == 7){
                                                    $data36[0] = 'Daerah Konflik';
                                                  } else if ($data36[0] == 8){
                                                    $data36[0] = 'Keluarga Terpidana';
                                                  } else if ($data36[0] == 9){
                                                    $data36[0] = 'Kelainan Fisik';
                                                  } 
                                                }
                                              ?>
                                        <label for="">Alasan layak PIP</label>
                                        <select name="data36" id="layakpip" class="form-control">
                                          <option value="<?php echo e(($data36 =='' && $data36 == null) ? '' : $data36[0]); ?>"><?php echo e(($data36 =='' && $data36 == null) ? 'Pilih' : $data36[0]); ?></option>
                                        </select>
                                        <p style="color: #c003ff" class="fs-8">Alasan utama peserta didik jika layak menerima mamfaat PIP. kolom ini akan muncul apabila dipilih Ya untuk mengisi kolom Usulan dari Sekolah (Layak PIP)</p>
                                      </div>
                      
                                      <div class="form-group mb-1">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data37');
                                            if ($array != '' && $array != null) {
                                              $data37 = $array;
                                            } else {
                                              $data37 = '';
                                            }
                                        ?>
                                        <label for="">Bank (diisi oleh pusat)</label>
                                        <input name="data37" type="text" id="bank" class="form-control" placeholder="Diisi oleh Pusat" value="<?php echo e(($data37 =='' && $data37 == null) ? '' : $data37[0]); ?>">
                                        <p style="color: #c003ff" class="fs-8"></p>
                                      </div>
                      
                                      <div class="form-group mb-1">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data38');
                                            if ($array != '' && $array != null) {
                                              $data38 = $array;
                                            } else {
                                              $data38 = '';
                                            }
                                        ?>
                                        <label for="">No Rekening (diisi oleh pusat)</label>
                                        <input name="data38" type="text" id="norekening" class="form-control" placeholder="Diisi oleh Pusat" value="<?php echo e(($data38 =='' && $data38 == null) ? '' : $data38[0]); ?>">
                                        <p style="color: #c003ff" class="fs-8"></p>
                                      </div>
                      
                                      <div class="form-group mb-1">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data39');
                                            if ($array != '' && $array != null) {
                                              $data39 = $array;
                                            } else {
                                              $data39 = '';
                                            }
                                        ?>
                                        <label for="">Rekening atas nama (diisi oleh pusat)</label>
                                        <input name="data39" type="text" id="rekatasnama" class="form-control" placeholder="Diisi oleh Pusat" value="<?php echo e(($data39 =='' && $data39 == null) ? '' : $data39[0]); ?>">
                                        <p style="color: #c003ff" class="fs-8">Untuk menampilkan data bank terkait penyaluran manfaat PIP (Program Indonesia Pintar) .Data pada bagian ini di isi oleh Kemendikbud</p>
                                      </div>
                  
                                </div>



                                <div class="btnregister4 mb-4 mt-6" style="background-color: #EBEBEB;"><p>c. Data Ayah Kandung</p> </div>
                                <div class="register4">
                                        <div style="color:rgb(255, 255, 255); background-color: #dd00ff; text-align:center;" class="mb-4 mt-3">DATA AYAH KANDUNG</div>
                      
                                        <div class="form-group mb-4">
                                          <?php
                                              $array= array_column($file_additionaldua, 'data40');
                                              if ($array != '' && $array != null) {
                                                $data40 = $array;
                                              } else {
                                                $data40 = '';
                                              }
                                          ?>
                                          <label for="">Nama Ayah Kandung</label>
                                          <input name="data40" type="text" id="namaayah" class="form-control" placeholder="Masukkan Nama Ayah" value="<?php echo e(($data40 =='' && $data40 == null) ? '' : $data40[0]); ?>">
                                          <p style="color: #c003ff" class="fs-8">Nama Ayah kandung peserta didik sesuai dokumen resmi yang berlaku.Hindari penggunaan gelar Akademik atau sosial (seperti Alm.Dr.Drs.S.pd.)</p>
                                        </div>
                      
                                        <div class="form-group mb-4">
                                          <?php
                                              $array= array_column($file_additionaldua, 'data41');
                                              if ($array != '' && $array != null) {
                                                $data41 = $array;
                                              } else {
                                                $data41 = '';
                                              }
                                          ?>
                                          <label for="">NIK Ayah</label>
                                          <input name="data41" type="text" id="nikayah" class="form-control" placeholder="Masukkan NIK Ayah" value="<?php echo e(($data41 =='' && $data41 == null) ? '' : $data41[0]); ?>">
                                          <p style="color: #c003ff" class="fs-8">Nomor Induk Kependudukan yang tercantum pada Kartu Keluarga atau KTP ayah kandung peserta didik</p>
                                        </div>
                      
                                        <div class="form-group mb-4">
                                          <?php
                                              $array= array_column($file_additionaldua, 'data42');
                                              if ($array != '' && $array != null) {
                                                $data42 = $array;
                                              } else {
                                                $data42 = '';
                                              }
                                          ?>
                                          <label for="">Tahun Lahir</label>
                                          <input name="data42" type="text" id="tahunlahir" class="form-control" placeholder="Masukkan Tahun Lahir" value="<?php echo e(($data42 =='' && $data42 == null) ? '' : $data42[0]); ?>">
                                          <p style="color: #c003ff" class="fs-8">Tahun lahir ayah kandung peserta didik</p>
                                        </div>
                      
                                        <div class="form-group mb-4">
                                          <?php
                                              $array= array_column($file_additionaldua, 'data43');
                                              if ($array != '' && $array != null) {
                                                $data43 = $array;
                                              } else {
                                                $data43 = '';
                                              }

                                              if(!empty($data43[0])) {
                                                if ($data43[0] == 1) {
                                                  $data43[0] = 'Tidak Sekolah';
                                                } else if ($data43[0] == 2) {
                                                  $data43[0] = 'Putus SD';
                                                } else if ($data43[0] == 3) {
                                                  $data43[0] = 'SD Sederajat';
                                                } else if ($data43[0] == 4) {
                                                  $data43[0] = 'SMP Sederajat';
                                                } else if ($data43[0] == 5) {
                                                  $data43[0] = 'SMA Sederajat';
                                                } else if ($data43[0] == 6) {
                                                  $data43[0] = 'D1';
                                                } else if ($data43[0] == 7) {
                                                  $data43[0] = 'D2';
                                                } else if ($data43[0] == 8) {
                                                  $data43[0] = 'D3';
                                                } else if ($data43[0] == 9) {
                                                  $data43[0] = 'D4/S1';
                                                } else if ($data43[0] == 10) {
                                                  $data43[0] = 'S2';
                                                } else if ($data43[0] == 11) {
                                                  $data43[0] = 'S3';
                                                } else if ($data43[0] == 12) {
                                                  $data43[0] = 'S4';
                                                }
                                              }
                                          ?>
                                          <label for="">Pendidikan</label>
                                          <select name="data43" id="pendidikanayah" class="form-control">
                                            <option value="<?php echo e(($data43 =='' && $data43 == null) ? '' : $data43[0]); ?>"><?php echo e(($data43 =='' && $data43 == null) ? 'Pilih' : $data43[0]); ?></option>
                                          </select>
                                          <p style="color: #c003ff" class="fs-8">Pendidikan terakhir ayah kandung peserta didik</p>
                                        </div>
                      
                                        <div class="form-group mb-4">
                                          <?php
                                              $array= array_column($file_additionaldua, 'data44');
                                              if ($array != '' && $array != null) {
                                                $data44 = $array;
                                              } else {
                                                $data44 = '';
                                              }

                                              if(!empty($data44[0])) {
                                                if ($data44[0] == 1) {
                                                  $data44[0] = 'Tidak Bekerja';
                                                } else if ($data44[0] == 2) {
                                                  $data44[0] = 'Nelayan';
                                                } else if ($data44[0] == 3) {
                                                  $data44[0] = 'Petani';
                                                } else if ($data44[0] == 4) {
                                                  $data44[0] = 'Peternak';
                                                } else if ($data44[0] == 5) {
                                                  $data44[0] = 'PNS/TNI/POLRI';
                                                } else if ($data44[0] == 6) {
                                                  $data44[0] = 'Karyawan Swasta';
                                                } else if ($data44[0] == 7) {
                                                  $data44[0] = 'Pedagang Kecil';
                                                } else if ($data44[0] == 8) {
                                                  $data44[0] = 'Pedagang Besar';
                                                } else if ($data44[0] == 9) {
                                                  $data44[0] = 'Wiraswasta';
                                                } else if ($data44[0] == 10) {
                                                  $data44[0] = 'Wirausaha';
                                                } else if ($data44[0] == 11) {
                                                  $data44[0] = 'Buruh';
                                                } else if ($data44[0] == 12) {
                                                  $data44[0] = 'Pensiunan';
                                                } else if ($data44[0] == 13) {
                                                  $data44[0] = 'Meninggal Dunia';
                                                } else if ($data44[0] == 14) {
                                                  $data44[0] = 'Lain - Lain';
                                                } 
                                              }
                                          ?>
                                          <label for="">Pekerjaan</label>
                                          <select name="data44" id="pekerjaanayah" class="form-control">
                                            <option value="<?php echo e(($data44 =='' && $data44 == null) ? '' : $data44[0]); ?>"><?php echo e(($data44 =='' && $data44 == null) ? 'Pilih' : $data44[0]); ?></option>
                                          </select>
                                          <p style="color: #c003ff" class="fs-8">Pekerjaan utama ayah kandung peserta didik, Pilih Meninggal Dunia apabila didik telah meninggal dunia</p>
                                        </div>
                      
                                        <div class="form-group mb-4">
                                          <?php
                                              $array= array_column($file_additionaldua, 'data45');
                                              if ($array != '' && $array != null) {
                                                $data45 = $array;
                                              } else {
                                                $data45 = '';
                                              }

                                              if(!empty($data45[0])) {
                                                if ($data45[0] == 1) {
                                                  $data45[0] = '2 juta - 5 juta';
                                                } else if ($data45[0] == 2) {
                                                  $data45[0] = '5 juta - 10 juta';
                                                } else if ($data45[0] == 3) {
                                                  $data45[0] = '10 juta - 20 juta';
                                                } else if ($data45[0] == 4) {
                                                  $data45[0] = 'lebih dari 20 juta';
                                                }
                                              }
                                          ?>
                                          <label for="">Penghasilan bulanan</label>
                                          <select name="data45" id="penghasilanayah" class="form-control">
                                            <option value="<?php echo e(($data45 =='' && $data45 == null) ? '' : $data45[0]); ?>"><?php echo e(($data45 =='' && $data45 == null) ? 'Pilih' : $data45[0]); ?></option>
                                          </select>
                                          <p style="color: #c003ff" class="fs-8">Rentang penghasilan ayah kandung peserta didik, Kosongkan kolom ini apabila ayah kandung peserta didik telah meninggal</p>
                                        </div>
                      
                                        <div class="form-group mb-4">
                                          <?php
                                              $array= array_column($file_additionaldua, 'data46');
                                              if ($array != '' && $array != null) {
                                                $data46 = $array;
                                              } else {
                                                $data46 = '';
                                              }

                                                  if(!empty($data46[0])) {
                                                    if ($data46[0] == 1) {
                                                    $data46[0] = 'Tidak';
                                                    } else if ($data46[0] == 2) {
                                                      $data46[0] = 'Netra';
                                                    } else if ($data46[0] == 3) {
                                                      $data46[0] = 'Rungu';
                                                    } else if ($data46[0] == 4) {
                                                      $data46[0] = 'Grahita Ringan';
                                                    } else if ($data46[0] == 5) {
                                                      $data46[0] = 'Grahita Sedang';
                                                    } else if ($data46[0] == 6) {
                                                      $data46[0] = 'Daksa Ringan';
                                                    } else if ($data46[0] == 7) {
                                                      $data46[0] = 'Daksa Sedang';
                                                    } else if ($data46[0] == 8) {
                                                      $data46[0] = 'Laras';
                                                    } else if ($data46[0] == 9) {
                                                      $data46[0] = 'Wicara F';
                                                    } else if ($data46[0] == 10) {
                                                      $data46[0] = 'Tuna Ganda';
                                                    } else if ($data46[0] == 11) {
                                                      $data46[0] = 'Hiper Aktif';
                                                    } else if ($data46[0] == 12) {
                                                      $data46[0] = 'Cerdas Istimewa';
                                                    } else if ($data46[0] == 13) {
                                                      $data46[0] = 'Bakat Istimewa';
                                                    } else if ($data46[0] == 14) {
                                                      $data46[0] = 'Kesulitan Belajar';
                                                    } else if ($data46[0] == 15) {
                                                      $data46[0] = 'Narkoba';
                                                    } else if ($data46[0] == 16) {
                                                      $data46[0] = 'Indigo';
                                                    } else if ($data46[0] == 17) {
                                                      $data46[0] = 'Down Sindrome';
                                                    } else if ($data46[0] == 18) {
                                                      $data46[0] = 'Autis';
                                                    } 
                                                  }                                   
                                          ?>
                                          <label for="">Berkebutuhan Khusus</label>
                                          <select name="data46" id="berkebutuhankhusus3" class="form-control">
                                            <option value="<?php echo e(($data46 =='' && $data46 == null) ? '' : $data46[0]); ?>"><?php echo e(($data46 =='' && $data46 == null) ? 'Pilih' : $data46[0]); ?></option>
                                          </select>
                                          <p style="color: #c003ff" class="fs-8">Kebutuhan khusus yang disandang oleh ayah peserta didik . Dapat dipilih lebih dari satu</p>
                                        </div>
                
                              </div>

                              


                            <div class="btnregister5 mb-4 mt-6" style="background-color: #EBEBEB;"> <p>d. Data Ibu Kandung</p></div>
                            <div class="register5">
                                      <div style="color:rgb(255, 255, 255); background-color: #dd00ff; text-align:center;" class="mb-4 mt-3">DATA IBU KANDUNG</div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                              $array= array_column($file_additionaldua, 'data47');
                                              if ($array != '' && $array != null) {
                                                $data47 = $array;
                                              } else {
                                                $data47 = '';
                                              }
                                          ?>
                                        <label for="">Nama Ibu Kandung</label>
                                        <input name="data47" type="text" id="namaibu" class="form-control" placeholder="Masukkan Nama Ibu" value="<?php echo e(($data47 =='' && $data47 == null) ? '' : $data47[0]); ?>">
                                        <p style="color: #c003ff" class="fs-8">Nama Ibu kandung peserta didik sesuai dokumen resmi yang berlaku.Hindari penggunaan gelar Akademik atau sosial (seperti Alm.Dr.Drs.S.pd.)</p>
                                      </div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                              $array= array_column($file_additionaldua, 'data48');
                                              if ($array != '' && $array != null) {
                                                $data48 = $array;
                                              } else {
                                                $data48 = '';
                                              }
                                          ?>
                                        <label for="">NIK Ibu</label>
                                        <input name="data48" type="text" id="nikibu" class="form-control" placeholder="Masukkan NIK Ibu" value="<?php echo e(($data48 =='' && $data48 == null) ? '' : $data48[0]); ?>">
                                        <p style="color: #c003ff" class="fs-8">Nomor Induk Kependudukan yang tercantum pada Kartu Keluarga atau KTP ibu kandung peserta didik</p>
                                      </div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                        $array= array_column($file_additionaldua, 'data49');
                                        if ($array != '' && $array != null) {
                                          $data49 = $array;
                                        } else {
                                          $data49 = '';
                                        }
                                    ?>
                                        <label for="">Tahun Lahir</label>
                                        <input name="data49" type="text" id="tahunlahiribu" class="form-control" placeholder="Masukkan Tahun Lahir" value="<?php echo e(($data49 =='' && $data49 == null) ? '' : $data49[0]); ?>">
                                        <p style="color: #c003ff" class="fs-8">Tahun lahir ibu kandung peserta didik</p>
                                      </div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data50');
                                            if ($array != '' && $array != null) {
                                              $data50 = $array;
                                            } else {
                                              $data50 = '';
                                            }

                                            if(!empty($data50[0])) {
                                              if ($data50[0] == 1) {
                                                $data50[0] = 'Tidak Sekolah';
                                              } else if ($data50[0] == 2) {
                                                $data50[0] = 'Putus SD';
                                              } else if ($data50[0] == 3) {
                                                $data50[0] = 'SD Sederajat';
                                              } else if ($data50[0] == 4) {
                                                $data50[0] = 'SMP Sederajat';
                                              } else if ($data50[0] == 5) {
                                                $data50[0] = 'SMA Sederajat';
                                              } else if ($data50[0] == 6) {
                                                $data50[0] = 'D1';
                                              } else if ($data50[0] == 7) {
                                                $data50[0] = 'D2';
                                              } else if ($data50[0] == 8) {
                                                $data50[0] = 'D3';
                                              } else if ($data50[0] == 9) {
                                                $data50[0] = 'D4/S1';
                                              } else if ($data50[0] == 10) {
                                                $data50[0] = 'S2';
                                              } else if ($data50[0] == 11) {
                                                $data50[0] = 'S3';
                                              } else if ($data50[0] == 12) {
                                                $data50[0] = 'S4';
                                              }
                                            }
                                        ?>
                                        <label for="">Pendidikan</label>
                                        <select name="data50" id="pendidikanibu" class="form-control">
                                          <option value="<?php echo e(($data50 =='' && $data50 == null) ? '' : $data50[0]); ?>"><?php echo e(($data50 =='' && $data50 == null) ? 'Pilih' : $data50[0]); ?></option>
                                        </select>
                                        <p style="color: #c003ff" class="fs-8">Pendidikan terakhir ibu kandung peserta didik</p>
                                      </div>
                      
                                      <div class="form-group mb-4">
                                            <?php
                                                $array= array_column($file_additionaldua, 'data51');
                                                if ($array != '' && $array != null) {
                                                  $data51 = $array;
                                                } else {
                                                  $data51 = '';
                                                }

                                                if(!empty($data51[0])) {
                                                      if ($data51[0] == 1) {
                                                    $data51[0] = 'Tidak Bekerja';
                                                  } else if ($data51[0] == 2) {
                                                    $data51[0] = 'Nelayan';
                                                  } else if ($data51[0] == 3) {
                                                    $data51[0] = 'Petani';
                                                  } else if ($data51[0] == 4) {
                                                    $data51[0] = 'Peternak';
                                                  } else if ($data51[0] == 5) {
                                                    $data51[0] = 'PNS/TNI/POLRI';
                                                  } else if ($data51[0] == 6) {
                                                    $data51[0] = 'Karyawan Swasta';
                                                  } else if ($data51[0] == 7) {
                                                    $data51[0] = 'Pedagang Kecil';
                                                  } else if ($data51[0] == 8) {
                                                    $data51[0] = 'Pedagang Besar';
                                                  } else if ($data51[0] == 9) {
                                                    $data51[0] = 'Wiraswasta';
                                                  } else if ($data51[0] == 10) {
                                                    $data51[0] = 'Wirausaha';
                                                  } else if ($data51[0] == 11) {
                                                    $data51[0] = 'Buruh';
                                                  } else if ($data51[0] == 12) {
                                                    $data51[0] = 'Pensiunan';
                                                  } else if ($data51[0] == 13) {
                                                    $data51[0] = 'Meninggal Dunia';
                                                  } else if ($data51[0] == 14) {
                                                    $data51[0] = 'Lain - Lain';
                                                  } 
                                                }
                                            ?>
                                        <label for="">Pekerjaan</label>
                                        <select name="data51" id="pekerjaanibu" class="form-control" >
                                          <option value="<?php echo e(($data51 =='' && $data51 == null) ? '' : $data51[0]); ?>"><?php echo e(($data51 =='' && $data51 == null) ? 'Pilih' : $data51[0]); ?></option>
                                        </select>
                                        <p style="color: #c003ff" class="fs-8">Pekerjaan utama ibu kandung peserta didik, Pilih Meninggal Dunia apabila didik telah meninggal dunia</p>
                                      </div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                                $array= array_column($file_additionaldua, 'data52');
                                                if ($array != '' && $array != null) {
                                                  $data52 = $array;
                                                } else {
                                                  $data52 = '';
                                                }

                                                if (!empty($data52[0])) {
                                                  if ($data52[0] == 1) {
                                                    $data52[0] = '2 juta - 5 juta';
                                                  } else if ($data52[0] == 2) {
                                                    $data52[0] = '5 juta - 10 juta';
                                                  } else if ($data52[0] == 3) {
                                                    $data52[0] = '10 juta - 20 juta';
                                                  } else if ($data52[0] == 4) {
                                                    $data52[0] = 'lebih dari 20 juta';
                                                  }
                                                }
                                            ?>
                                        <label for="">Penghasilan bulanan</label>
                                        <select name="data52" id="penghasilanibu" class="form-control">
                                          <option value="<?php echo e(($data52 =='' && $data52 == null) ? '' : $data52[0]); ?>"><?php echo e(($data52 =='' && $data52 == null) ? 'Pilih' : $data52[0]); ?></option>
                                        </select>
                                        <p style="color: #c003ff" class="fs-8">Rentang penghasilan ibu kandung peserta didik, Kosongkan kolom ini apabila ibu kandung peserta didik telah meninggal</p>
                                      </div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                                $array= array_column($file_additionaldua, 'data53');
                                                if ($array != '' && $array != null) {
                                                  $data53 = $array;
                                                } else {
                                                  $data53 = '';
                                                }

                                                if(!empty($data53[0])) {
                                                  if ($data53[0] == 1) {
                                                    $data53[0] = 'Tidak';
                                                    } else if ($data53[0] == 2) {
                                                      $data53[0] = 'Netra';
                                                    } else if ($data53[0] == 3) {
                                                      $data53[0] = 'Rungu';
                                                    } else if ($data53[0] == 4) {
                                                      $data53[0] = 'Grahita Ringan';
                                                    } else if ($data53[0] == 5) {
                                                      $data53[0] = 'Grahita Sedang';
                                                    } else if ($data53[0] == 6) {
                                                      $data53[0] = 'Daksa Ringan';
                                                    } else if ($data53[0] == 7) {
                                                      $data53[0] = 'Daksa Sedang';
                                                    } else if ($data53[0] == 8) {
                                                      $data53[0] = 'Laras';
                                                    } else if ($data53[0] == 9) {
                                                      $data53[0] = 'Wicara F';
                                                    } else if ($data53[0] == 10) {
                                                      $data53[0] = 'Tuna Ganda';
                                                    } else if ($data53[0] == 11) {
                                                      $data53[0] = 'Hiper Aktif';
                                                    } else if ($data53[0] == 12) {
                                                      $data53[0] = 'Cerdas Istimewa';
                                                    } else if ($data53[0] == 13) {
                                                      $data53[0] = 'Bakat Istimewa';
                                                    } else if ($data53[0] == 14) {
                                                      $data53[0] = 'Kesulitan Belajar';
                                                    } else if ($data53[0] == 15) {
                                                      $data53[0] = 'Narkoba';
                                                    } else if ($data53[0] == 16) {
                                                      $data53[0] = 'Indigo';
                                                    } else if ($data53[0] == 17) {
                                                      $data53[0] = 'Down Sindrome';
                                                    } else if ($data53[0] == 18) {
                                                      $data53[0] = 'Autis';
                                                    }   
                                                }
                                            ?>
                                        <label for="">Berkebutuhan Khusus</label>
                                        <select name="data53" id="berkebutuhankhusus4" class="form-control">
                                          <option value="<?php echo e(($data53 =='' && $data53 == null) ? '' : $data53[0]); ?>"><?php echo e(($data53 =='' && $data53 == null) ? 'Pilih' : $data53[0]); ?></option>
                                        </select>
                                        <p style="color: #c003ff" class="fs-8">Kebutuhan khusus yang disandang oleh ibu peserta didik . Dapat dipilih lebih dari satu</p>
                                      </div>
                      
                            </div>

                            <div class="btnregister6 mb-4 mt-6" style="background-color: #EBEBEB;"><p>e. Data Wali</p> </div>
                              <div class="register6">
                                  <div style="color:rgb(255, 255, 255); background-color: #dd00ff; text-align:center;" class="mb-4 mt-3">DATA WALI</div>
                    
                    
                                  <div class="form-group mb-4">
                                        <?php
                                              $array= array_column($file_additionaldua, 'data54');
                                              if ($array != '' && $array != null) {
                                                $data54 = $array;
                                              } else {
                                                $data54 = '';
                                              }
                                          ?>
                                    <label for="">Nama Wali</label>
                                    <input name="data54" type="text" id="namawali" class="form-control" placeholder="Masukkan Nama wali" value="<?php echo e(($data54 =='' && $data54 == null) ? '' : $data54[0]); ?>">
                                    <p style="color: #c003ff" class="fs-8">Nama Wali peserta didik sesuai dokumen resmi yang berlaku.Hindari penggunaan gelar Akademik atau sosial (seperti Alm.Dr.Drs.S.pd.)</p>
                                  </div>
                    
                                  <div class="form-group mb-4">
                                    <?php
                                          $array= array_column($file_additionaldua, 'data55');
                                          if ($array != '' && $array != null) {
                                            $data55 = $array;
                                          } else {
                                            $data55 = '';
                                          }
                                    ?>
                                    <label for="">NIK Wali</label>
                                    <input name="data55" type="text" id="nikwali" class="form-control" placeholder="Masukkan NIK Wali" value="<?php echo e(($data55 =='' && $data55 == null) ? '' : $data55[0]); ?>">
                                    <p style="color: #c003ff" class="fs-8">Nomor Induk Kependudukan yang tercantum pada Kartu Keluarga atau KTP Wali peserta didik</p>
                                  </div>
                    
                                  <div class="form-group mb-4">
                                    <?php
                                          $array= array_column($file_additionaldua, 'data56');
                                          if ($array != '' && $array != null) {
                                            $data56 = $array;
                                          } else {
                                            $data56 = '';
                                          }
                                    ?>
                                    <label for="">Tahun Lahir</label>
                                    <input name="data56" type="text" id="tahunlahiribu" class="form-control" placeholder="Masukkan Tahun Lahir" value="<?php echo e(($data56 =='' && $data56 == null) ? '' : $data56[0]); ?>">
                                    <p style="color: #c003ff" class="fs-8">Tahun lahir wali peserta didik</p>
                                  </div>
                    
                                  <div class="form-group mb-4">
                                    <?php
                                          $array= array_column($file_additionaldua, 'data57');
                                          if ($array != '' && $array != null) {
                                            $data57 = $array;
                                          } else {
                                            $data57 = '';
                                          }
                                          
                                        if (!empty($data57[0])) {
                                            if ($data57[0] == 1) {
                                            $data57[0] = 'Tidak Sekolah';
                                          } else if ($data57[0] == 2) {
                                            $data57[0] = 'Putus SD';
                                          } else if ($data57[0] == 3) {
                                            $data57[0] = 'SD Sederajat';
                                          } else if ($data57[0] == 4) {
                                            $data57[0] = 'SMP Sederajat';
                                          } else if ($data57[0] == 5) {
                                            $data57[0] = 'SMA Sederajat';
                                          } else if ($data57[0] == 6) {
                                            $data57[0] = 'D1';
                                          } else if ($data57[0] == 7) {
                                            $data57[0] = 'D2';
                                          } else if ($data57[0] == 8) {
                                            $data57[0] = 'D3';
                                          } else if ($data57[0] == 9) {
                                            $data57[0] = 'D4/S1';
                                          } else if ($data57[0] == 10) {
                                            $data57[0] = 'S2';
                                          } else if ($data57[0] == 11) {
                                            $data57[0] = 'S3';
                                          } else if ($data57[0] == 12) {
                                            $data57[0] = 'S4';
                                          }
                                      }
                                    ?>
                                    <label for="">Pendidikan</label>
                                    <select name="data57" id="pendidikanwali" class="form-control" >
                                      <option value="<?php echo e(($data57 =='' && $data57 == null) ? '' : $data57[0]); ?>"><?php echo e(($data57 =='' && $data57 == null) ? 'Pilih' : $data57[0]); ?></option>
                                    </select>
                                    <p style="color: #c003ff" class="fs-8">Pendidikan terakhir wali peserta didik</p>
                                  </div>
                    
                                  <div class="form-group mb-4">
                                    <?php
                                          $array= array_column($file_additionaldua, 'data58');
                                          if ($array != '' && $array != null) {
                                            $data58 = $array;
                                          } else {
                                            $data58 = '';
                                          }

                                        if(!empty($data58[0])) {
                                              if ($data58[0] == 1) {
                                              $data58[0] = 'Tidak Bekerja';
                                            } else if ($data58[0] == 2) {
                                              $data58[0] = 'Nelayan';
                                            } else if ($data58[0] == 3) {
                                              $data58[0] = 'Petani';
                                            } else if ($data58[0] == 4) {
                                              $data58[0] = 'Peternak';
                                            } else if ($data58[0] == 5) {
                                              $data58[0] = 'PNS/TNI/POLRI';
                                            } else if ($data58[0] == 6) {
                                              $data58[0] = 'Karyawan Swasta';
                                            } else if ($data58[0] == 7) {
                                              $data58[0] = 'Pedagang Kecil';
                                            } else if ($data58[0] == 8) {
                                              $data58[0] = 'Pedagang Besar';
                                            } else if ($data58[0] == 9) {
                                              $data58[0] = 'Wiraswasta';
                                            } else if ($data58[0] == 10) {
                                              $data58[0] = 'Wirausaha';
                                            } else if ($data58[0] == 11) {
                                              $data58[0] = 'Buruh';
                                            } else if ($data58[0] == 12) {
                                              $data58[0] = 'Pensiunan';
                                            } else if ($data58[0] == 13) {
                                              $data58[0] = 'Meninggal Dunia';
                                            } else if ($data58[0] == 14) {
                                              $data58[0] = 'Lain - Lain';
                                            } 
                                         }
                                    ?>
                                    <label for="">Pekerjaan</label>
                                    <select name="data58" id="pekerjaanwali" class="form-control">
                                      <option value="<?php echo e(($data58 =='' && $data58 == null) ? '' : $data58[0]); ?>"><?php echo e(($data58 =='' && $data58 == null) ? 'Pilih' : $data58[0]); ?></option>
                                    </select>
                                    <p style="color: #c003ff" class="fs-8">Pekerjaan utama wali kandung peserta didik, Pilih Meninggal Dunia apabila didik telah meninggal dunia</p>
                                  </div>
                    
                                  <div class="form-group mb-4">
                                    <?php
                                          $array= array_column($file_additionaldua, 'data59');
                                          if ($array != '' && $array != null) {
                                            $data59 = $array;
                                          } else {
                                            $data59 = '';
                                          }

                                          if(!empty($data59[0])) {
                                            if ($data59[0] == 1) {
                                                $data59[0] = '2 juta - 5 juta';
                                              } else if ($data59[0] == 2) {
                                                $data59[0] = '5 juta - 10 juta';
                                              } else if ($data59[0] == 3) {
                                                $data59[0] = '10 juta - 20 juta';
                                              } else if ($data59[0] == 4) {
                                                $data59[0] = 'lebih dari 20 juta';
                                              }
                                          }
                                    ?>
                                    <label for="">Penghasilan bulanan</label>
                                    <select name="data59" id="penghasilanwali" class="form-control">
                                      <option value="<?php echo e(($data59 =='' && $data59 == null) ? '' : $data59[0]); ?>"><?php echo e(($data59 =='' && $data59 == null) ? 'Pilih' : $data59[0]); ?></option>
                                    </select>
                                    <p style="color: #c003ff" class="fs-8">Rentang penghasilan wali kandung peserta didik, Kosongkan kolom ini apabila wali kandung peserta didik telah meninggal</p>
                                  </div>
                    
                                  <div style="color:rgb(255, 255, 255); background-color: #dd00ff; text-align:center;" class="mb-4 mt-3">KONTAK</div>
                    
                                  <div class="form-group mb-4">
                                    <?php
                                          $array= array_column($file_additionaldua, 'data60');
                                          if ($array != '' && $array != null) {
                                            $data60 = $array;
                                          } else {
                                            $data60 = '';
                                          }
                                    ?>
                                      <label for="">Nomor Telepon Rumah</label>
                                      <input name="data60" type="text" id="nomortelepon" class="form-control" placeholder="Masukkan Nomor Telepon Rumah" value="<?php echo e(($data60 =='' && $data60 == null) ? '' : $data60[0]); ?>">
                                      <p style="color: #c003ff" class="fs-8">Di isi nomor telepon peserta didik yang dapat dihubungi (milik pribadi , orang tua, atau wali) dangan format (kode area)-(nomor telepon) contoh: 021-775577</p>
                                  </div>
                    
                                  <div class="form-group mb-4">
                                    <?php
                                          $array= array_column($file_additionaldua, 'data61');
                                          if ($array != '' && $array != null) {
                                            $data61 = $array;
                                          } else {
                                            $data61 = '';
                                          }
                                    ?>
                                    <label for="">Nomor HP</label>
                                    <input name="data61" type="text" id="nomorhandphone" class="form-control" placeholder="Masukkan Nomor Handphone" value="<?php echo e(($data61 =='' && $data61 == null) ? '' : $data61[0]); ?>">
                                    <p style="color: #c003ff" class="fs-8">Di isi nomor telepon seluler (ponsel) peserta didik yang dapat dihubungi (milik pribadi, orang tua, atau wali)</p>
                                  </div>
                    
                                  <div class="form-group mb-4">
                                    <?php
                                          $array= array_column($file_additionaldua, 'data62');
                                          if ($array != '' && $array != null) {
                                            $data62 = $array;
                                          } else {
                                            $data62 = '';
                                          }
                                    ?>
                                    <label for="">Email</label>
                                    <input name="data62" type="text" id="email" class="form-control" placeholder="Masukkan Email" value="<?php echo e(($data62 =='' && $data62 == null) ? '' : $data62[0]); ?>">
                                    <p style="color: #c003ff" class="fs-8">Di isi alamat surat elektronik (surel) peserta didik yang dapat dihubungi (milik pribadi, orang tua, atau wali)</p>
                                  </div>
                    
                                  <div class="form-group mb-4">
                                    <?php
                                          $array= array_column($file_additionaldua, 'data63');
                                          if ($array != '' && $array != null) {
                                            $data63 = $array;
                                          } else {
                                            $data63 = '';
                                          }

                                          if(!empty($data63[0])) {
                                              if ($data63[0] == 1) {
                                              $data63[0] = 'Bahasa';
                                            } else if ($data63[0] == 2) {
                                              $data63[0] = 'Karya Ilmiah Remaja/Sains KIR';
                                            } else if ($data63[0] == 3) {
                                              $data63[0] = 'Kerohanian';
                                            } else if ($data63[0] == 4) {
                                              $data63[0] = 'Komputer dan teknologi';
                                            } else if ($data63[0] == 5) {
                                              $data63[0] = 'Olahraga / Beladiri';
                                            } else if ($data63[0] == 6) {
                                              $data63[0] = 'Otomotif / Bengkel / Bikers';
                                            } else if ($data63[0] == 7) {
                                              $data63[0] = 'Palang Merah Remaja(PMR)';
                                            } else if ($data63[0] == 8) {
                                              $data63[0] = 'Paskibra';
                                            } else if ($data63[0] == 9) {
                                              $data63[0] = 'Palang Keamanan Sekolah (PKS)';
                                            } else if ($data63[0] == 10) {
                                              $data63[0] = 'Pencipta Alam';
                                            } else if ($data63[0] == 11) {
                                              $data63[0] = 'Pramuka';
                                            } else if ($data63[0] == 12) {
                                              $data63[0] = 'Seni Media, Jurnalistik';
                                            } else if ($data63[0] == 13) {
                                              $data63[0] = 'Seni Musik';
                                            } else if ($data63[0] == 14) {
                                              $data63[0] = 'Seni Tari dan Peran';
                                            } else if ($data63[0] == 15) {
                                              $data63[0] = 'Unit Kesehatan Sekolah (UKS)';
                                            } else if ($data63[0] == 16) {
                                              $data63[0] = 'Wirausaha/Koperasi/Keterampilan produktif';
                                            }
                                          }
                                    ?>
                                    <label for="">Jenis Ekstrakulikuler</label>
                                    <select name="data63" id="ekstrakulikuler" class="form-control">
                                      <option value="<?php echo e(($data63 =='' && $data63 == null) ? '' : $data63[0]); ?>"><?php echo e(($data63 =='' && $data63 == null) ? 'Pilih' : $data63[0]); ?></option>
                                    </select>
                                  </div>
                    
                             </div>



                             <div class="btnregister7 mb-4 mt-6" style="background-color: #EBEBEB;"> <p>f. Data Rincian Peserta Didik</p> </div>
                             <div class="register7">
                                  <div style="color:rgb(255, 255, 255); background-color: #24d73c; text-align:center;" class="mb-4 mt-3">DATA RINCIAN PESERTA DIDIK</div>
                                  <div style="color:rgb(255, 255, 255); background-color: #dd00ff; text-align:center;" class="mb-4 mt-3">DATA PERIODIK</div>
                    
                                  <div class="form-group mb-4">
                                    <?php
                                          $array= array_column($file_additionaldua, 'data64');
                                          if ($array != '' && $array != null) {
                                            $data64 = $array;
                                          } else {
                                            $data64 = '';
                                          }
                                    ?>
                                    <label for="">Tinggi Badan</label>
                                    <input name="data64" type="text" id="tinggibadan" class="form-control" placeholder="Masukkan Tinggi Badan" value="<?php echo e(($data64 =='' && $data64 == null) ? '' : $data64[0]); ?>">
                                    <p style="color: #c003ff" class="fs-8">Tinggi badan peserta didik dalam satuan centimeter</p>
                                  </div>
                    
                                  <div class="form-group mb-4">
                                    <?php
                                          $array= array_column($file_additionaldua, 'data65');
                                          if ($array != '' && $array != null) {
                                            $data65 = $array;
                                          } else {
                                            $data65 = '';
                                          }
                                    ?>
                                    <label for="">Berat Badan</label>
                                    <input name="data65" type="text" id="beratbadan" class="form-control" placeholder="Masukkan Berat Badan" value="<?php echo e(($data65 =='' && $data65 == null) ? '' : $data65[0]); ?>">
                                    <p style="color: #c003ff" class="fs-8">Berat badan peserta didik dalam satuan kg</p>
                                  </div>
                    
                                  <div class="form-group mb-4">
                                    <?php
                                            $array= array_column($file_additionaldua, 'data66');
                                            if ($array != '' && $array != null) {
                                              $data66 = $array;
                                            } else {
                                              $data66 = '';
                                            }
                                      ?>
                                    <label for="">Jarak Tempat</label>
                                    <input name="data66" type="text" id="jaraktempat" class="form-control" placeholder="Masukkan jarak tempat" value="<?php echo e(($data66 =='' && $data66 == null) ? '' : $data66[0]); ?>">
                                    <p style="color: #c003ff" class="fs-8">Jarak rumah peserta didik</p>
                                  </div>
                    
                                  
                    
                                  <div class="form-group mb-4">
                                    <?php
                                              $array= array_column($file_additionaldua, 'data67');
                                              if ($array != '' && $array != null) {
                                                $data67 = $array;
                                              } else {
                                                $data67 = '';
                                              }
                                        ?>
                                    <label for="">Waktu Tempuh ke Sekolah</label>
                                    <input name="data67" type="text" id="waktutempuh" class="form-control" placeholder="Masukkan waktu Tempat" value="<?php echo e(($data67 =='' && $data67 == null) ? '' : $data67[0]); ?>">
                                    <p style="color: #c003ff" class="fs-8">Lama waktu peserta didik ke sekolah Kolom kanan adalah menit,Misalnya peserta didik memerlukan waktu tempuh 1 jam 15 menit, maka tambahkan angkat menit 15 dibelakang 1 sesudah : (1:15) ,Apabila memerlukan waktu 25 menit, maka tambahkan dibelakang 25 , maka kotak akan berisi (1:25)</p>
                                  </div>
                    
                                  <div class="form-group mb-4">
                                    <?php
                                          $array= array_column($file_additionaldua, 'data68');
                                          if ($array != '' && $array != null) {
                                            $data68 = $array;
                                          } else {
                                            $data68 = '';
                                          }
                                    ?>
                                    <label for="">Jumlah Saudara Kandung</label>
                                    <input name="data68" type="text" id="saudarakandung" class="form-control" placeholder="Masukkan jumlah Saudara Kandung" value="<?php echo e(($data68 =='' && $data68 == null) ? '' : $data68[0]); ?>">
                                    <p style="color: #c003ff" class="fs-8">Jumlah saudara yang dimiliki peserta didik. jumlah saudara kandung dihitung tanpa menyertakan peserta didik , dangan rumus jumlah kakak ditambah jumlah adik, isikan 0 apabila anak tunggal</p>
                                  </div>
                    
                                </div>

                                <div class="btnregister8 mb-4 mt-6" style="background-color: #EBEBEB;"> <p>g. Prestasi</p> </div>
                                <div class="register8">
                                  <div style="color:rgb(255, 255, 255); background-color: #dd00ff; text-align:center;" class="mb-4 mt-3">PRESTASI</div>
                    
                                  <div class="form-group mb-4">
                                    <div class="row" style="text-align: center">
                                        <div class="col-sm">
                                          <label for="">Jenis</label>
                                        </div>
                                        <div class="col-sm">
                                          <label for="">Tingkat</label>
                                        </div>
                                        <div class="col-sm">
                                          <label for="">Nama Prestasi</label>
                                        </div>
                                        <div class="col-sm">
                                          <label for="">Tahun</label>
                                        </div>
                                        <div class="col-sm">
                                          <label for="">Penyelenggara</label>
                                        </div>
                                    </div>
                    
                                      
                                    <div class="row">
                                        <div class="col-sm">
                                          <?php
                                              $array= array_column($file_additionaldua, 'data81');
                                              if ($array != '' && $array != null) {
                                                $data81 = $array;
                                              } else {
                                                $data81 = '';
                                              }


                                              if (!empty($data81[0])) {
                                                if ($data81[0] == 1) {
                                                  $data81[0] = 'Sains';
                                                } else if ($data81[0] == 2) {
                                                  $data81[0] = 'Seni';
                                                } else if ($data81[0] == 3) {
                                                  $data81[0] = 'Olahraga';
                                                } else if ($data81[0] == 4) {
                                                  $data81[0] = 'Lain - lain';
                                                }
                                              }
                                          ?>
                                          <select name="data81" id="tingkat" class="form-control">
                                            <option value="<?php echo e(($data81 =='' && $data81 == null) ? '' : $data81[0]); ?>"><?php echo e(($data81 =='' && $data81 == null) ? 'Pilih' : $data81[0]); ?></option>
                                          </select>
                                        </div>
                                        <div class="col-sm">
                                          <?php
                                              $array= array_column($file_additionaldua, 'data82');
                                              if ($array != '' && $array != null) {
                                                $data82 = $array;
                                              } else {
                                                $data82 = '';
                                              }
                                              
                                              if (!empty($data82[0])) {
                                                if ($data82[0] == 1) {
                                                  $data82[0] = 'Sekolah';
                                                } else if ($data82[0] == 2) {
                                                  $data82[0] = 'Kecamatan';
                                                } else if ($data82[0] == 3) {
                                                  $data82[0] = 'Kabupaten';
                                                } else if ($data82[0] == 4) {
                                                  $data82[0] = 'Provinsi';
                                                } else if ($data82[0] == 5) {
                                                  $data82[0] = 'Nasional';
                                                } else if ($data82[0] == 6) {
                                                  $data82[0] = 'Internasional';
                                                } 
                                              }
                                          ?>
                                          <select name="data82" id="namaprestasi" class="form-control">
                                            <option value="<?php echo e(($data82 =='' && $data82 == null) ? '' : $data82[0]); ?>"><?php echo e(($data82 =='' && $data82 == null) ? 'Pilih' : $data82[0]); ?></option>
                                          </select>
                                        </div>
                                        <div class="col-sm">
                                          <?php
                                                $array= array_column($file_additionaldua, 'data83');
                                                if ($array != '' && $array != null) {
                                                  $data83 = $array;
                                                } else {
                                                  $data83 = '';
                                                }
                                            ?>
                                          <input name="data83" class="form-control" type="text" value="<?php echo e(($data83 =='' && $data83 == null) ? '' : $data83[0]); ?>">
                                        </div>
                                        <div class="col-sm">
                                          <?php
                                                $array= array_column($file_additionaldua, 'data84');
                                                if ($array != '' && $array != null) {
                                                  $data84 = $array;
                                                } else {
                                                  $data84 = '';
                                                }
                                            ?>
                                          <input name="data84" class="form-control" type="text" value="<?php echo e(($data84 =='' && $data84 == null) ? '' : $data84[0]); ?>">
                                        </div>
                                        <div class="col-sm">
                                          <?php
                                              $array= array_column($file_additionaldua, 'data85');
                                              if ($array != '' && $array != null) {
                                                $data85 = $array;
                                              } else {
                                                $data85 = '';
                                              }
                                          ?>
                                          <input name="data85" class="form-control" type="text" value="<?php echo e(($data85 =='' && $data85 == null) ? '' : $data85[0]); ?>">
                                        </div>
                                    </div>
                                    
                    
                                    
                                    <div class="row">
                                      <div class="col-sm">
                                        <?php
                                                $array= array_column($file_additionaldua, 'data86');
                                                if ($array != '' && $array != null) {
                                                  $data86 = $array;
                                                } else {
                                                  $data86 = '';
                                                }

                                                if (!empty($data86[0])) {
                                                if ($data86[0] == 1) {
                                                  $data86[0] = 'Sains';
                                                } else if ($data86[0] == 2) {
                                                  $data86[0] = 'Seni';
                                                } else if ($data86[0] == 3) {
                                                  $data86[0] = 'Olahraga';
                                                } else if ($data86[0] == 4) {
                                                  $data86[0] = 'Lain - Lain';
                                                } 
                                              }
                                            ?>
                                        <select name="data86" id="tingkat" class="form-control">
                                          <option value="<?php echo e(($data86 =='' && $data86 == null) ? '' : $data86[0]); ?>"><?php echo e(($data86 =='' && $data86 == null) ? 'Pilih' : $data86[0]); ?></option>
                                        </select>
                                      </div>
                                      <div class="col-sm">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data87');
                                            if ($array != '' && $array != null) {
                                              $data87 = $array;
                                            } else {
                                              $data87 = '';
                                            }

                                            if (!empty($data87)) {
                                              if ($data87[0] == 1) {
                                                  $data87[0] = 'Sekolah';
                                                } else if ($data87[0] == 2) {
                                                  $data87[0] = 'Kecamatan';
                                                } else if ($data87[0] == 3) {
                                                  $data87[0] = 'Kabupaten';
                                                } else if ($data87[0] == 4) {
                                                  $data87[0] = 'Provinsi';
                                                } else if ($data87[0] == 5) {
                                                  $data87[0] = 'Nasional';
                                                } else if ($data87[0] == 6) {
                                                  $data87[0] = 'Internasional';
                                                }
                                            }
                                        ?>
                                        <select name="data87" id="namaprestasi" class="form-control">
                                          <option value="<?php echo e(($data87 =='' && $data87 == null) ? '' : $data87[0]); ?>"><?php echo e(($data87 =='' && $data87 == null) ? 'Pilih' : $data87[0]); ?></option>
                                        </select>
                                      </div>
                                      <div class="col-sm">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data88');
                                            if ($array != '' && $array != null) {
                                              $data88 = $array;
                                            } else {
                                              $data88 = '';
                                            }
                                        ?>
                                        <input name="data88" class="form-control" type="text" value="<?php echo e(($data88 =='' && $data88 == null) ? '' : $data88[0]); ?>">
                                      </div>
                                      <div class="col-sm">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data89');
                                            if ($array != '' && $array != null) {
                                              $data89 = $array;
                                            } else {
                                              $data89 = '';
                                            }
                                        ?>
                                        <input name="data89" class="form-control" type="text" value="<?php echo e(($data89 =='' && $data89 == null) ? '' : $data89[0]); ?>">
                                      </div>
                                      <div class="col-sm">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data90');
                                            if ($array != '' && $array != null) {
                                              $data90 = $array;
                                            } else {
                                              $data90 = '';
                                            }
                                        ?>
                                        <input name="data90" class="form-control" type="text" value="<?php echo e(($data90 =='' && $data90 == null) ? '' : $data90[0]); ?>">
                                      </div>
                                  </div>
                                  
                    
                                  
                                  <div class="row">
                                    <div class="col-sm">
                                      <?php
                                            $array= array_column($file_additionaldua, 'data91');
                                            if ($array != '' && $array != null) {
                                              $data91 = $array;
                                            } else {
                                              $data91 = '';
                                            }

                                            if (!empty($data91[0])) {
                                              if ($data91[0] == 1) {
                                                    $data91[0] = 'Sains';
                                                  } else if ($data91[0] == 2) {
                                                    $data91[0] = 'Seni';
                                                  } else if ($data91[0] == 3) {
                                                    $data91[0] = 'Olahraga';
                                                  } else if ($data91[0] == 4) {
                                                    $data91[0] = 'Lain - Lain';
                                                  } 
                                            }
                                            
                                        ?>
                                      <select name="data91" id="tingkat" class="form-control" >
                                        <option value="<?php echo e(($data91 =='' && $data91 == null) ? '' : $data91[0]); ?>"><?php echo e(($data91 =='' && $data91 == null) ? 'Pilih' : $data91[0]); ?></option>
                                      </select>
                                    </div>
                                    <div class="col-sm">
                                      <?php
                                            $array= array_column($file_additionaldua, 'data92');
                                            if ($array != '' && $array != null) {
                                              $data92 = $array;
                                            } else {
                                              $data92 = '';
                                            }

                                            if (!empty($data92)) {
                                              if ($data92[0] == 1) {
                                                  $data92[0] = 'Sekolah';
                                                } else if ($data92[0] == 2) {
                                                  $data92[0] = 'Kecamatan';
                                                } else if ($data92[0] == 3) {
                                                  $data92[0] = 'Kabupaten';
                                                } else if ($data92[0] == 4) {
                                                  $data92[0] = 'Provinsi';
                                                } else if ($data92[0] == 5) {
                                                  $data92[0] = 'Nasional';
                                                } else if ($data92[0] == 6) {
                                                  $data92[0] = 'Internasional';
                                                }
                                            }
                                        ?>
                                      <select name="data92" id="namaprestasi" class="form-control">
                                        <option value="<?php echo e(($data92 =='' && $data92 == null) ? '' : $data92[0]); ?>"><?php echo e(($data92 =='' && $data92 == null) ? 'Pilih' : $data92[0]); ?></option>
                                      </select>
                                    </div>
                                    <div class="col-sm">
                                      <?php
                                            $array= array_column($file_additionaldua, 'data93');
                                            if ($array != '' && $array != null) {
                                              $data93 = $array;
                                            } else {
                                              $data93 = '';
                                            }
                                        ?>
                                      <input name="data93" class="form-control" type="text" value="<?php echo e(($data93 =='' && $data93 == null) ? '' : $data93[0]); ?>">
                                    </div>
                                    <div class="col-sm">
                                      <?php
                                            $array= array_column($file_additionaldua, 'data94');
                                            if ($array != '' && $array != null) {
                                              $data94 = $array;
                                            } else {
                                              $data94 = '';
                                            }
                                        ?>
                                      <input name="data94" class="form-control" type="text" value="<?php echo e(($data94 =='' && $data94 == null) ? '' : $data94[0]); ?>">
                                    </div>
                                    <div class="col-sm">
                                      <?php
                                            $array= array_column($file_additionaldua, 'data95');
                                            if ($array != '' && $array != null) {
                                              $data95 = $array;
                                            } else {
                                              $data95 = '';
                                            }
                                        ?>
                                      <input name="data95" class="form-control" type="text" value="<?php echo e(($data95 =='' && $data95 == null) ? '' : $data95[0]); ?>">
                                    </div>
                                  </div>
                                  
                    
                    
                                    <div class="mb-4 mt-4">
                                    <p style="color: #c003ff" class="fs-8">Jenis Prestasi        : jenis Prestasi yang pernah diraih oleh peserta didik</p>
                                    <p style="color: #c003ff" class="fs-8">Tingkat Prestasi       : Tingkat Penyelenggara prestasi yang pernah diraih  oleh peserta didik</p>
                                    <p style="color: #c003ff" class="fs-8">Nama Prestasi       : Nama kegiatan / acara dari prestasi yang pernah diraih oleh peserta didik Contoh:Lomba Cerdas Cermat Bahasa Indonesia Tingkat SMP. Sesuaikan menurut piagam yang diperoleh</p>
                                    <p style="color: #c003ff" class="fs-8">Tahun Prestasi       : Tahun prestasi yang pernah diraih oleh peserta didik</p>
                                    <p style="color: #c003ff" class="fs-8">Penyelenggara       : Nama Penyelenggara/ panitia kegiatan dari prestasi yang pernah diraih oleh peserta didik. Contoh: Panitia O2SN dan FL2SN Kab.Bengkayang Sesuaikan menurut piagam yang diterima</p>
                                    <p style="color: #c003ff" class="fs-8">Peringkat       : Diisi angka peringkat prestasi yang pernah diraih oleh peserta didik</p>
                                    </div>
                                  </div>
                                  <div style="color:rgb(255, 255, 255); background-color: #dd00ff; text-align:center;" class="mb-4 mt-3">BEASISWA</div>
                                  <div class="form-group mb-4">
                                    <div class="row" style="text-align: center">
                                        <div class="col-sm">
                                          <label for="">Jenis</label>
                                        </div>
                                        <div class="col-sm">
                                          <label for="">Keterangan</label>
                                        </div>
                                        <div class="col-sm">
                                          <label for="">Tahun Mulai</label>
                                        </div>
                                        <div class="col-sm">
                                          <label for="">Tahun Selesai</label>
                                        </div>
                    
                                    </div>
                    
                                    <div class="row">
                                        <div class="col-sm">
                                          <?php
                                            $array= array_column($file_additionaldua, 'data96');
                                            if ($array != '' && $array != null) {
                                              $data96 = $array;
                                            } else {
                                              $data96 = '';
                                            }
                                            
                                            if (!empty($data96[0])) {
                                              if ($data96[0] == 1) {
                                                $data96[0] = 'Anak Berprestasi';
                                              } else if ($data96[0] == 2) {
                                                $data96[0] = 'Kurang Mampu';
                                              } else if ($data96[0] == 3) {
                                                $data96[0] = 'Pendidikan';
                                              } else if ($data96[0] == 4) {
                                                $data96[0] = 'Unggulan';
                                              } else if ($data96[0] == 5) {
                                                $data96[0] = 'Lain - Lain';
                                              } 
                                            }
                                        ?>
                                          <select name="data96" id="tingkat" class="form-control">
                                            <option value="<?php echo e(($data96 =='' && $data96 == null) ? '' : $data96[0]); ?>"><?php echo e(($data96 =='' && $data96 == null) ? 'Pilih' : $data96[0]); ?></option>
                                          </select>
                                        </div>
                                        <div class="col-sm">
                                          <?php
                                            $array= array_column($file_additionaldua, 'data97');
                                            if ($array != '' && $array != null) {
                                              $data97 = $array;
                                            } else {
                                              $data97 = '';
                                            }
                                        ?>
                                          <input name="data97" class="form-control" type="text" value="<?php echo e(($data97 =='' && $data97 == null) ? '' : $data97[0]); ?>">
                                        </div>
                                        <div class="col-sm">
                                          <?php
                                              $array= array_column($file_additionaldua, 'data98');
                                              if ($array != '' && $array != null) {
                                                $data98 = $array;
                                              } else {
                                                $data98 = '';
                                              }
                                          ?>
                                          <input name="data98" class="form-control" type="text" value="<?php echo e(($data98 =='' && $data98 == null) ? '' : $data98[0]); ?>">
                                        </div>
                                        <div class="col-sm">
                                          <?php
                                              $array= array_column($file_additionaldua, 'data99');
                                              if ($array != '' && $array != null) {
                                                $data99 = $array;
                                              } else {
                                                $data99 = '';
                                              }
                                          ?>
                                          <input name="data99" class="form-control" type="text" value="<?php echo e(($data98 =='' && $data98 == null) ? '' : $data98[0]); ?>">
                                        </div>
                    
                                    </div>
                                    <div class="row">
                                      <div class="col-sm">
                                        <?php
                                              $array= array_column($file_additionaldua, 'data100');
                                              if ($array != '' && $array != null) {
                                                $data100 = $array;
                                              } else {
                                                $data100 = '';
                                              }

                                              if (!empty($data100[0])) {
                                                if ($data100[0] == 1) {
                                                  $data100[0] = 'Anak Berprestasi';
                                                } else if ($data100[0] == 2) {
                                                  $$data100[0] = 'Kurang Mampu';
                                                } else if ($data100[0] == 3) {
                                                  $data100[0] = 'Pendidikan';
                                                } else if ($data100[0] == 4) {
                                                  $data100[0] = 'Unggulan';
                                                } else if ($data100[0] == 5) {
                                                  $data100[0] = 'Lain - Lain';
                                                }  
                                              }
                                          ?>
                                        <select name="data100" id="tingkat" class="form-control" >
                                          <option value="<?php echo e(($data100 =='' && $data100 == null) ? '' : $data100[0]); ?>"><?php echo e(($data100 =='' && $data100 == null) ? 'Pilih' : $data100[0]); ?></option>
                                        </select>
                                      </div>
                                      <div class="col-sm">
                                        <?php
                                              $array= array_column($file_additionaldua, 'data101');
                                              if ($array != '' && $array != null) {
                                                $data101 = $array;
                                              } else {
                                                $data101 = '';
                                              }
                                          ?>
                                        <input name="data101" class="form-control" type="text" value="<?php echo e(($data101 =='' && $data101 == null) ? '' : $data101[0]); ?>">
                                      </div>
                                      <div class="col-sm">
                                        <?php
                                              $array= array_column($file_additionaldua, 'data102');
                                              if ($array != '' && $array != null) {
                                                $data102 = $array;
                                              } else {
                                                $data102 = '';
                                              }
                                          ?>
                                        <input name="data102" class="form-control" type="text" value="<?php echo e(($data102 =='' && $data102 == null) ? '' : $data102[0]); ?>">
                                      </div>
                                      <div class="col-sm">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data103');
                                            if ($array != '' && $array != null) {
                                              $data103 = $array;
                                            } else {
                                              $data103 = '';
                                            }
                                        ?>
                                        <input name="data103" class="form-control" type="text" value="<?php echo e(($data103 =='' && $data103 == null) ? '' : $data103[0]); ?>">
                                      </div>
                    
                                    </div>
                                    <div class="row">
                                      <div class="col-sm">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data104');
                                            if ($array != '' && $array != null) {
                                              $data104 = $array;
                                            } else {
                                              $data104 = '';
                                            }

                                            if (!empty($data104[0])) {
                                              if ($data104[0] == 1) {
                                                  $data104[0] = 'Anak Berprestasi';
                                                } else if ($data104[0] == 2) {
                                                  $$data104[0] = 'Kurang Mampu';
                                                } else if ($data104[0] == 3) {
                                                  $data104[0] = 'Pendidikan';
                                                } else if ($data104[0] == 4) {
                                                  $data104[0] = 'Unggulan';
                                                } else if ($data104[0] == 5) {
                                                  $data104[0] = 'Lain - Lain';
                                                }  
                                            }
                                        ?>
                                        <select name="data104" id="tingkat" class="form-control" >
                                          <option value="<?php echo e(($data104 =='' && $data104 == null) ? '' : $data104[0]); ?>"><?php echo e(($data104 =='' && $data104 == null) ? 'Pilih' : $data104[0]); ?></option>
                                        </select>
                                      </div>
                                      <div class="col-sm">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data105');
                                            if ($array != '' && $array != null) {
                                              $data105 = $array;
                                            } else {
                                              $data105 = '';
                                            }
                                        ?>
                                        <input name="data105" class="form-control" type="text" value="<?php echo e(($data105 =='' && $data105 == null) ? '' : $data105[0]); ?>">
                                      </div>
                                      <div class="col-sm">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data106');
                                            if ($array != '' && $array != null) {
                                              $data106 = $array;
                                            } else {
                                              $data106 = '';
                                            }
                                        ?>
                                        <input name="data106" class="form-control" type="text" value="<?php echo e(($data106 =='' && $data106 == null) ? '' : $data106[0]); ?>">
                                      </div>
                                      <div class="col-sm">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data107');
                                            if ($array != '' && $array != null) {
                                              $data107 = $array;
                                            } else {
                                              $data107 = '';
                                            }
                                        ?>
                                        <input name="data107" class="form-control" type="text" value="<?php echo e(($data107 =='' && $data107 == null) ? '' : $data107[0]); ?>">
                                      </div>
                    
                                    </div>
                    
                                    <div class="mb-4 mt-4">
                                    <p style="color: #c003ff" class="fs-8">Jenis Beasiswa        : 01)Anak berprestasi 02)Kurang Mampu 03)Pendidikan 04)Unggulan 99)lainnya</p>
                                    <p style="color: #c003ff" class="fs-8">Jenis Beasiswa        : jenis beasiswa yang pernah diterima oleh peserta didik</p>
                                    <p style="color: #c003ff" class="fs-8">Keterangan        : Keterangan terkait beasiswa yang pernah diterima oleh peserta didik. Misalnya dapat diisi dengan nama beasiswa , seperti Beasiswa Murid Berprestasi Tahun 2017, atau keterangan lain yang relevan</p>
                                    <p style="color: #c003ff" class="fs-8">Tahun Mulai        : Tahun mulai diterimanya beasiswa oleh peserta didik</p>
                                    <p style="color: #c003ff" class="fs-8">Tahun Selesai        : Tahun selesai diterimanya beasiswa oleh peserta didik, Apabila beasiswa tersebut hanya diterima sekali dalam tahun yang sama, maka diisi sama seperti Tahun mulai</p>
                    
                    
                                    </div>
                                  </div>
                    
                                </div>

                                <div class="btnregister9 mb-4 mt-6" style="background-color: #EBEBEB;"><p>h. Registrasi Peserta Didik</p> </div>
                                <div class="register9">
                                    <div style="color:rgb(255, 255, 255); background-color: #6dd31a; text-align:center;" class="mb-4 mt-3">REGISTRASI PESERTA DIDIK</div>
                      
                                    <div class="form-group mb-4">
                                      <?php
                                            $array= array_column($file_additionaldua, 'data69');
                                            if ($array != '' && $array != null) {
                                              $data69 = $array;
                                            } else {
                                              $data69 = '';
                                            }
                                      ?>
                                      <label for="">Jurusan</label>
                                      <input name="data69" type="text" class="form-control" value="<?php echo e(($data69 =='' && $data69 == null) ? '' : $data69[0]); ?>">
                                      <p style="color: #c003ff" class="fs-8">Jurusan yang dipilih oleh peserta didik saat diterima disekolah ini (khusus SMK)</p>
                                    </div>
                      
                                    <div>
                                      <label for="">Jenis Pendaftaran</label>
                                      <?php
                                            $array= array_column($file_additionaldua, 'data70');
                                            if ($array != '' && $array != null) {
                                              $data70 = $array;
                                            } else {
                                              $data70 = '';
                                            }

                                            if(!empty($data70[0])) {
                                              if ($data70[0] == 1) {
                                                $data70[0] = 'Siswa Baru';
                                              } else if ($data70[0] == 2) {
                                                $data70[0] = 'Pindahan';
                                              } else if ($data70[0] == 3) {
                                                $data70[0] = 'Kembali Bersekolah';
                                              }
                                            }
                                      ?>
                                      <select name="data70" id="jenispendaftaran" class="form-control">
                                        <option value="<?php echo e(($data70 =='' && $data70 == null) ? '' : $data70[0]); ?>"><?php echo e(($data70 =='' && $data70 == null) ? 'Pilih' : $data70[0]); ?></option>
                                      </select>
                                      <p style="color: #c003ff" class="fs-8">Status peserta pendidik saat pertama kali diterima di sekolah ini.</p>
                                    </div>
                      
                                    <div class="form-group mb-4">
                                      <?php
                                      $array= array_column($file_additionaldua, 'data71');
                                            if ($array != '' && $array != null) {
                                              $data71 = $array;
                                            } else {
                                              $data71 = '';
                                            }
                                      ?>
                                      <label for="">NIS</label>
                                      <input name="data71" type="text" class="form-control" value="<?php echo e(($data71 =='' && $data71 == null) ? '' : $data71[0]); ?>">
                                      <p style="color: #c003ff" class="fs-8">Nomor induk peserta Pendidik sesuai yang tercantum pada buku induk</p>
                                    </div>
                      
                                    <div class="form-group mb-4">
                                      <?php
                                            $array= array_column($file_additionaldua, 'data72');
                                            if ($array != '' && $array != null) {
                                              $data72 = $array;
                                            } else {
                                              $data72 = '';
                                            }
                                      ?>
                                      <label for="">Tanggal Masuk Sekolah</label>
                                      <input name="data72" type="date" class="form-control" value="<?php echo e(($data72 =='' && $data72 == null) ? '' : $data72[0]); ?>">
                                      <p style="color: #c003ff" class="fs-8">Tanggal pertama kali peserta didik diterima di sekolah ini, jika siswa baru,maka isikan tanggal awal tahun pelajaran saat peserta didik masuk. jika siswa mutasi/pindahan, maka isikan tanggal sesuai tanggal diterimanya peserta didik di sekolah ini atau tanggal yang tercantum pada lembar mutasi masuk yang umumnya terdapat di bagian akhir buku rapor</p>
                                    </div>
                      
                                    <div class="form-group mb-4">
                                      <?php
                                            $array= array_column($file_additionaldua, 'data73');
                                            if ($array != '' && $array != null) {
                                              $data73 = $array;
                                            } else {
                                              $data73 = '';
                                            }
                                      ?>
                                      <label for="">Asal Sekolah</label>
                                      <input name="data73" type="text" class="form-control" value="<?php echo e(($data73 =='' && $data73 == null) ? '' : $data73[0]); ?>">
                                      <p style="color: #c003ff" class="fs-8">Nama Sekolah peserta didik  sebelumnya .untuk peserta didik baru .isikan nama sekolah pada jenjang sebelumnya ,Sedangkan bagi peserta didik mutasi /pindahan diisi dengan nama sekolah sebelumnya pindah sekolah saat ini.</p>
                                    </div>
                      
                                    <div class="form-group mb-4">
                                      <?php
                                            $array= array_column($file_additionaldua, 'data74');
                                            if ($array != '' && $array != null) {
                                              $data74 = $array;
                                            } else {
                                              $data74 = '';
                                            }
                                      ?>
                                      <label for="">Nomor Peserta Ujian</label>
                                      <input name="data74" type="text" class="form-control" value="<?php echo e(($data74 =='' && $data74 == null) ? '' : $data74[0]); ?>">
                                      <p style="color: #000000" class="fs-8"><em>* Nomor peserta Ujian adalah 20 digit yang tertera dalam SKHU (Format baku 2-12-02-01-001-002-7), diisi bagi peserta didik jenjang Sebelumnya</em> </p>
                                      <p style="color: #c003ff" class="fs-8">Nomor peserta ujian saat peserta didik masih jenjang sebelumnya .Formatnya adalah x-xx-xx-xx-xxx-xxx-x (20 digit). Untuk peserta didik WNA ,diisi dengan luar Negeri.</p>
                                    </div>
                      
                                    <div class="form-group mb-4">
                                      <?php
                                            $array= array_column($file_additionaldua, 'data75');
                                            if ($array != '' && $array != null) {
                                              $data75 = $array;
                                            } else {
                                              $data75 = '';
                                            }
                                      ?>
                                      <label for="">No. Seri Ijazah</label>
                                      <input name="data75" type="text" class="form-control" value="<?php echo e(($data75 =='' && $data75 == null) ? '' : $data75[0]); ?>">
                                      <p style="color: #000000" class="fs-8"><em>Diisi 16 digit yang tertera di ijazah - diisi sesuai dengan ijazah jenjang sebelumnya</em> </p>
                                      <p style="color: #c003ff" class="fs-8">Nomor seri ijazah peserta didik pada jenjang sebelumnya</p>
                                    </div>
                      
                                    <div class="form-group mb-4">
                                      <?php
                                            $array= array_column($file_additionaldua, 'data76');
                                            if ($array != '' && $array != null) {
                                              $data76 = $array;
                                            } else {
                                              $data76 = '';
                                            }
                                      ?>
                                      <label for="">No. Seri SKHUN</label>
                                      <input name="data76" type="text" class="form-control" value="<?php echo e(($data76 =='' && $data76 == null) ? '' : $data76[0]); ?>">
                                      <p style="color: #000000" class="fs-8"><em>Diisi 16 digit yang tertera di SKHUN/SHUN - diisi sesuai dengan ijazah jenjang sebelumnya</em> </p>
                                      <p style="color: #c003ff" class="fs-8">Nomor seri SKHUN/SHUN peserta didik pada jenjang sebelumnya (jika memiliki)</p>
                                    </div>
                      
                                    <div style="color:rgb(255, 255, 255); background-color: #c003ff; text-align:center;" class="mb-4 mt-3">PENDAFTARAN KELUAR (Diisi jika peserta didik sudah keluar)</div>
                      
                                    <div class="form-group mb-4">
                                      <?php
                                              $array= array_column($file_additionaldua, 'data77');
                                              if ($array != '' && $array != null) {
                                                $data77 = $array;
                                              } else {
                                                $data77 = '';
                                              }

                                              if (!empty($data77[0])) {
                                                if ($data77[0] == 1) {
                                                  $data77[0] = 'Lulus';
                                                } else if ($data77[0] == 2) {
                                                  $data77[0] = 'Mutasi';
                                                } else if ($data77[0] == 3) {
                                                  $data77[0] = 'Dikeluarkan';
                                                } else if ($data77[0] == 4) {
                                                  $data77[0] = 'Mengundurkan diri';
                                                } else if ($data77[0] == 5) {
                                                  $data77[0] = 'Putus Sekolah';
                                                } else if ($data77[0] == 6) {
                                                  $data77[0] = 'Wafat';
                                                } else if ($data77[0] == 7) {
                                                  $data77[0] = 'Hilang';
                                                } else if ($data77[0] == 8) {
                                                  $data77[0] = 'Lainnya';
                                                } 
                                              }
                                        ?>
                                      <label for="">Keluar Karena</label>
                                      <select name="data77" id="keluarkarena" class="form-control">
                                        <option value="<?php echo e(($data77 =='' && $data77 == null) ? '' : $data77[0]); ?>"><?php echo e(($data77 =='' && $data77 == null) ? 'Pilih' : $data77[0]); ?></option>
                                      </select>
                                      <p style="color: #c003ff" class="fs-8">Alasan utama peserta peserta didik keluar dari sekolah. Pilih Lulus apabila peserta didik telah lulus dari sekolah ,pilih Mengundurkan diri apabila peserta didik keluar sekolah karena mengundurkan diri dengan catatan (dibuktikan adanya surat pengunduran diri), pilih Putus sekolah apabila peserta didik meninggalkan sekolah tanpa keterangan yang jelas</p>
                                    </div>
                      
                                    <div class="form-group mb-4">
                                      <?php
                                              $array= array_column($file_additionaldua, 'data78');
                                              if ($array != '' && $array != null) {
                                                $data78 = $array;
                                              } else {
                                                $data78 = '';
                                              }
                                        ?>
                                      <label for="">Tanggal Keluar</label>
                                      <input name="data78" type="date" class="form-control" value="<?php echo e(($data78 =='' && $data78 == null) ? '' : $data78[0]); ?>">
                                      <p style="color: #c003ff" class="fs-8">Tanggal saat peserta didik diketahui / tercatat keluar dari sekolah</p>
                                    </div>
                      
                                    <div class="form-group mb-4">
                                      <?php
                                              $array= array_column($file_additionaldua, 'data79');
                                              if ($array != '' && $array != null) {
                                                $data79 = $array;
                                              } else {
                                                $data79 = '';
                                              }
                                        ?>
                                      <label for="">Alasan</label>
                                      <textarea name="data79" id="alasan" cols="30" rows="2" class="form-control"><?php echo e(($data79 =='' && $data79 == null) ? '' : $data79[0]); ?></textarea>
                                      <p style="color: #c003ff" class="fs-8">Alasan khusus yang melatar belakangi peserta didik keluar dari sekolah</p>
                                    </div>
                      
                                    <div class="custom-control custom-switch mb-4">
                                      <?php
                                              $array= array_column($file_additionaldua, 'data80');
                                              if ($array != '' && $array != null) {
                                                $data80 = $array;
                                              } else {
                                                $data80 = '';
                                              }
                                        ?>
                                        <div class="row">
                                          <div class="col-sm">
                                            <div class="mb-2 mt-6" style="text-align:center">
                                              <input name="data80" type="checkbox" class="finalcheck custom-control-input" id="customSwitch1" <?php echo e(($data80 =='' && $data80 == null) ? '' : 'checked'); ?>>
                                            </div>
                                          </div>
                                          <div class="col-sm-11">
                                            <label class="custom-control-label fs-5" for="customSwitch1">Saya menyetujui akan semua persyaratan yang telah dibuat dan saya akan bertanggung jawab akan apa yang telah saya cantumkan apabila terjadi hal atau sesuatu dikemudian hari</label>
                                          </div>
                                        </div>
                                    </div>

                      
                                </div>

                                  <div class="formulircheck1 card-header">
                                     <span class="fw-border" style="color:#9b389b"> Title Formulir</span> 
                                  </div>
                                  <div class="formulircheckisi"> TITLE </div>
                                  <div></div>

                                  <div class="btndowncheck1">
                                  
                                  <div class="down1">
                                    <div style="color:rgb(255, 255, 255); background-color: #caaf35; text-align:center;" class="mb-4 mt-3">FORMULIR PESERTA DIDIK
                                    </div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data1');
                                            if ($array != '' && $array != null) {
                                              $data1 = $array;
                                            } else {
                                              $data1 = '';
                                            }
                                        ?>
                                        <label for="exampleFormControlInput1">No Formulir</label>
                                        <input name="data1" type="text" class="form-control" id="noformulir" placeholder="Masukkan No Formulir" value="<?php echo e(($data1 =='' && $data1 == null) ? '' : $data1[0]); ?>">
                                      </div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data2');
                                            if ($array != '' && $array != null) {
                                              $data2 = $array;
                                            } else {
                                              $data2 = '';
                                            }
                                        ?>
                                        <label for="exampleFormControlInput1">Tahun Ajaran</label>
                                        <input name="data2" type="text" class="form-control" id="tahunajaran" placeholder="Tahun Ajaran" value="<?php echo e(($data2 =='' && $data2 == null) ? '' : $data2[0]); ?>">
                                      </div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data3');
                                            if ($array != '' && $array != null) {
                                              $data3 = $array;
                                            } else {
                                              $data3 = '';
                                            }
                                        ?>
                                        <label for="exampleFormControlInput1">Tanggal Pendaftaran</label>
                                        <input name="data3" type="date" class="form-control" id="tanggalpendaftaran" placeholder="Tanngal Pendaftaran" value="<?php echo e(($data3 =='' && $data3 == null) ? '' : $data3[0]); ?>">
                                      </div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data4');
                                            if ($array != '' && $array != null) {
                                              $data4 = $array;
                                            } else {
                                              $data4 = '';
                                            }
  
                                            if(!empty($data4[0])){
                                              if($data4[0] == 1) {
                                                $data4[0] = 'Peserta didik Baru';
                                              } else {
                                                $data4[0] = 'Peserta didik Pindahan';
                                              }
                                            }
                                        ?>
                                        <label for="exampleFormControlInput1">Status Siswa</label>
                                        <select name="data4" id="statussiswa" class="form-control">
                                          <option value="<?php echo e(($data4 =='' && $data4 == null) ? '' : $data4[0]); ?>"><?php echo e(($data4 =='' && $data4 == null) ? 'Pilih' : $data4[0]); ?></option>
                                        </select>
                                      </div>
                      
                                      <div style="color:rgb(255, 255, 255); background-color: #c003ff; text-align:center;" class="mb-4 mt-3">DATA PRIBADI</div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data5');
                                            if ($array != '' && $array != null) {
                                              $data5 = $array;
                                            } else {
                                              $data5 = '';
                                            }
                                        ?>
                                        <label for="exampleFormControlInput1">Nama Lengkap</label>
                                        <input name="data5" type="text" class="form-control" id="namalengkap" placeholder="Masukkan Lengkap" value="<?php echo e(($data5 =='' && $data5 == null) ? '' : $data5[0]); ?>">
                                        <p style="color: #c003ff" class="fs-8">Nama peserta didik sesuai dokumen resmi yang berlaku (Akta atau Ijazah sebelumnya ). Hanya bisa diubah melalui <a href="https://vervalpd.data.kemdikbud.go.id">vervalpd.data.kemdikbud.go.id</a></p>
                                      </div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data6');
                                            if ($array != '' && $array != null) {
                                              $data6 = $array;
                                            } else {
                                              $data6 = '';
                                            }
  
                                            if(!empty($data6[0])) {
                                              if ($data6[0] == 1) {
                                                $data6[0] = 'Perempuan';
                                              } else {
                                                $data6[0] = 'Laki - Laki';
                                              }
                                            }
                                        ?>
                                        <label for="exampleFormControlInput1">Jenis Kelamin</label>
                                        <select name="data6" id="statussiswa" class="form-control">
                                          <option value="<?php echo e(($data6 =='' && $data6 == null) ? '' : $data6[0]); ?>"><?php echo e(($data6 =='' && $data6 == null) ? 'Pilih' : $data6[0]); ?></option>
                                        </select>
                                      </div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data7');
                                            if ($array != '' && $array != null) {
                                              $data7 = $array;
                                            } else {
                                              $data7 = '';
                                            }
                                        ?>
                                        <label for="exampleFormControlInput1">Nisn</label>
                                        <input name="data7" type="text" class="form-control" id="nisn" placeholder="Masukkan Nisn" value="<?php echo e(($data7 =='' && $data7 == null) ? '' : $data7[0]); ?>">
                                        <p style="color: #c003ff" class="fs-8">Nomor Induk Siswa Nasional peserta didik (jika memiliki), jika belum memiliki, maka wajib dikosongkan. NISN memiliki format 10 digit angka. contoh: 0009321234  Untuk memeriksa NISN, dapat mengunjungi laman <a href="http://nisn.data.kemdikbud.go.id">http:// nisn.data.kemdikbud.go.id</a></p>
                                      </div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data8');
                                            if ($array != '' && $array != null) {
                                              $data8 = $array;
                                            } else {
                                              $data8 = '';
                                            }
                                        ?>
                                        <label for="exampleFormControlInput1">Nik / No.KITAS (Untuk WNA)</label>
                                        <input name="data8" type="text" class="form-control" id="nik" placeholder="Masukkan Nik / Kitas" value="<?php echo e(($data8 =='' && $data8 == null) ? '' : $data8[0]); ?>">
                                        <p style="color: #c003ff" class="fs-8">Nomor Induk Kependudukan yang tercantum pada Kartu Keluarga, Kartu identitas Anak, atau KTP (jika sudah Memiliki) bagi WNI. NIK memiliki format angka 16 digit angka. Contoh:6112090906021104
                                         <br> Pastikan NIK tidak tertukar dengan No. Kartu Keluarga , Karena keduanya memiliki format yang sama. Bagi WNA, diisi dengan nomor Kartu Izin TInggak Terbatas (KITAS)</p>
                                      </div>
                      
                      
                                      <div class="form-group mb-4">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data9');
                                            if ($array != '' && $array != null) {
                                              $data9 = $array;
                                            } else {
                                              $data9 = '';
                                            }
                                        ?>
                                        <label for="exampleFormControlInput1">Tempat Lahir</label>
                                        <input name="data9" type="text" class="form-control" id="tempatlahir" placeholder="Masukkan Tempat Lahir" value="<?php echo e(($data9 =='' && $data9 == null) ? '' : $data9[0]); ?>">
                                        <p style="color: #c003ff" class="fs-8">Tempat lahir peserta didik sesuai dokumen resmi yang berlaku</p>
                                      </div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data10');
                                            if ($array != '' && $array != null) {
                                              $data10 = $array;
                                            } else {
                                              $data10 = '';
                                            }
                                        ?>
                                        <label for="exampleFormControlInput1">Tanggal Lahir</label>
                                        <input name="data10" type="date" class="form-control" id="tanggallahir" placeholder="Tanngal Lahir" value="<?php echo e(($data10 =='' && $data10 == null) ? '' : $data10[0]); ?>">
                                        <p style="color: #c003ff" class="fs-8">Tanggal lahir peserta didik sesuai dokumen resmi yang berlaku, Hanya bisa diubah melalui <a href="http://vervalpd.data.kemdikbud.go.id">http://vervalpd.data.kemdikbud.go.id</a> </p>
                                      </div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data11');
                                            if ($array != '' && $array != null) {
                                              $data11 = $array;
                                            } else {
                                              $data11 = '';
                                            }
                                        ?>
                                        <label for="exampleFormControlInput1">No Registrasi Akta Kelahiran</label>
                                        <input name="data11" type="text" class="form-control" id="noregistrasiaktakelahiran" placeholder="No Registrasi Akta Kelahiran" value="<?php echo e(($data11 =='' && $data11 == null) ? '' : $data11[0]); ?>">
                                        <p style="color: #c003ff" class="fs-8">Nomor Registrasi Akta Kelahiran. Nomor registrasi yang dimaksud umumnya tercantum pada bagian tengah atas lembar kutipan akta kelahiran</p>
                                      </div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data12');
                                            if ($array != '' && $array != null) {
                                              $data12 = $array;
                                            } else {
                                              $data12 = '';
                                            }
  
                                            if(!empty($data12[0])) {
                                              if ($data12[0] == 1) {
                                                $data12[0] = 'Islam';
                                              } else if ($data12[0] == 2) {
                                                $data12[0] = 'Kristen';
                                              } else if ($data12[0] == 3) {
                                                $data12[0] = 'Katholik';
                                              } else if ($data12[0] == 4) {
                                                $data12[0] = 'Hindu';
                                              } else if ($data12[0] == 5) {
                                                $data12[0] = 'Budha';
                                              } else if ($data12[0] == 6) {
                                                $data12[0] = 'Khong Hu Chu';
                                              } else if ($data12[0] == 7) {
                                                $data12[0] = 'Kepercayaan Kpd Tuhan YME';
                                              } else if ($data12[0] == 8) {
                                                $data12[0] = 'Lainnya';
                                              }
                                            }
                                        ?>
                                        <label for="exampleFormControlInput1">Agama & Kepercayaan</label>
                                        <select name="data12" id="agamadankepercayaan" class="form-control">
                                          <option value="<?php echo e(($data12 =='' && $data12 == null) ? '' : $data12[0]); ?>"><?php echo e(($data12 =='' && $data12 == null) ? 'Pilih' : $data12[0]); ?></option>
                                        </select>
                                        <p style="color: #c003ff" class="fs-8">Agama atau kepercayaan yang dianut oleh peserta didik. apabila peserta didik adalah penghayat kepercayaan (misanya pada daerah tertentu yang masih memiliki penganut kepercayaan), dapat memilih opsi Kepercayaan kpd Tuhan YME</a> </p>
                                      </div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data13');
                                            if ($array != '' && $array != null) {
                                              $data13 = $array;
                                            } else {
                                              $data13 = '';
                                            }
  
                                            if(!empty($data13[0])) {
                                              if ($data13[0] == 1) {
                                                $data13[0] = 'Indonesia';
                                              } else {
                                                $data13[0] = 'Asing (WNA)';
                                              }
                                            }
                                        ?>
                                        <label for="exampleFormControlInput1">Kewarganegaraan</label>
                                        <select name="data13" id="agamadankepercayaan" class="form-control">
                                          <option value="<?php echo e(($data13 =='' && $data13 == null) ? '' : $data13[0]); ?>"><?php echo e(($data13 =='' && $data13 == null) ? 'Pilih' : $data13[0]); ?></option>
                                        </select>
                                      </div>
                                      <div class="form-group mb-4">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data14');
                                            if ($array != '' && $array != null) {
                                              $data14 = $array;
                                            } else {
                                              $data14 = '';
                                            }
                                        ?>
                                        <label for="" >Nama Negara</label>
                                        <input name="data14" type="text" class="form-control" placeholder="Masukkan Nama Negara" value="<?php echo e(($data14 =='' && $data14 == null) ? '' : $data14[0]); ?>">
                                        <p style="color: #c003ff" class="fs-8">Kewarganegaraan peserta didik </p>
                                      </div>
                      
                                      <div class="form-group mb-4">
                                        <?php
                                            $array= array_column($file_additionaldua, 'data15');
                                            if ($array != '' && $array != null) {
                                              $data15 = $array;
                                            } else {
                                              $data15 = '';
                                            }       
                                            
                                            if (!empty($data15[0])) {
                                              if ($data15[0] == 1) {
                                                  $data15[0] = 'Tidak';
                                              } else if ($data15[0] == 2) {
                                                $data15[0] = 'Netra';
                                              } else if ($data15[0] == 3) {
                                                $data15[0] = 'Rungu';
                                              } else if ($data15[0] == 4) {
                                                $data15[0] = 'Grahita Ringan';
                                              } else if ($data15[0] == 5) {
                                                $data15[0] = 'Grahita Sedang';
                                              } else if ($data15[0] == 6) {
                                                $data15[0] = 'Daksa Ringan';
                                              } else if ($data15[0] == 7) {
                                                $data15[0] = 'Daksa Sedang';
                                              } else if ($data15[0] == 8) {
                                                $data15[0] = 'Laras';
                                              } else if ($data15[0] == 9) {
                                                $data15[0] = 'Wicara F';
                                              } else if ($data15[0] == 10) {
                                                $data15[0] = 'Tuna Ganda';
                                              } else if ($data15[0] == 11) {
                                                $data15[0] = 'Hiper Aktif';
                                              } else if ($data15[0] == 12) {
                                                $data15[0] = 'Cerdas Istimewa';
                                              } else if ($data15[0] == 13) {
                                                $data15[0] = 'Bakat Istimewa';
                                              } else if ($data15[0] == 14) {
                                                $data15[0] = 'Kesulitan Belajar';
                                              } else if ($data15[0] == 15) {
                                                $data15[0] = 'Narkoba';
                                              } else if ($data15[0] == 16) {
                                                $data15[0] = 'Indigo';
                                              } else if ($data15[0] == 17) {
                                                $data15[0] = 'Down Sindrome';
                                              } else if ($data15[0] == 18) {
                                                $data15[0] = 'Autis';
                                              }
                                            }
                                        ?>
                                          <label for="">Berkebutuhan Khusus</label>
                                        <div class="row">
                                          <div class="col-sm">
                                            <select name="data15" id="berkebutuhankhusus1" class="form-control">
                                              <option value="<?php echo e(($data15 =='' && $data15 == null) ? '' : $data15[0]); ?>"><?php echo e(($data15 =='' && $data15 == null) ? 'Pilih' : $data15[0]); ?></option>
                                            </select>
                                          </div>
                                          <?php
                                                $array= array_column($file_additionaldua, 'data16');
                                                if ($array != '' && $array != null) {
                                                  $data16 = $array;
                                                } else {
                                                  $data16 = '';
                                                }
                                                if(!empty($data16[0])) {
                                                  if ($data16[0] == 1) {
                                                  $data16[0] = 'Tidak';
                                                  } else if ($data16[0] == 2) {
                                                    $data16[0] = 'Netra';
                                                  } else if ($data16[0] == 3) {
                                                    $data16[0] = 'Rungu';
                                                  } else if ($data16[0] == 4) {
                                                    $data16[0] = 'Grahita Ringan';
                                                  } else if ($data16[0] == 5) {
                                                    $data16[0] = 'Grahita Sedang';
                                                  } else if ($data16[0] == 6) {
                                                    $data16[0] = 'Daksa Ringan';
                                                  } else if ($data16[0] == 7) {
                                                    $data16[0] = 'Daksa Sedang';
                                                  } else if ($data16[0] == 8) {
                                                    $data16[0] = 'Laras';
                                                  } else if ($data16[0] == 9) {
                                                    $data16[0] = 'Wicara F';
                                                  } else if ($data16[0] == 10) {
                                                    $data16[0] = 'Tuna Ganda';
                                                  } else if ($data16[0] == 11) {
                                                    $data16[0] = 'Hiper Aktif';
                                                  } else if ($data16[0] == 12) {
                                                    $data16[0] = 'Cerdas Istimewa';
                                                  } else if ($data16[0] == 13) {
                                                    $data16[0] = 'Bakat Istimewa';
                                                  } else if ($data16[0] == 14) {
                                                    $data16[0] = 'Kesulitan Belajar';
                                                  } else if ($data16[0] == 15) {
                                                    $data16[0] = 'Narkoba';
                                                  } else if ($data16[0] == 16) {
                                                    $data16[0] = 'Indigo';
                                                  } else if ($data16[0] == 17) {
                                                    $data16[0] = 'Down Sindrome';
                                                  } else if ($data16[0] == 18) {
                                                    $data16[0] = 'Autis';
                                                  }
                                                }
                                            ?>
                                          <div class="col-sm">
                                            <select name="data16" id="berkebutuhankhusus2" class="form-control">
                                              <option value="<?php echo e(($data16 =='' && $data16 == null) ? '' : $data16[0]); ?>"><?php echo e(($data16 =='' && $data16 == null) ? 'Pilih' : $data16[0]); ?></option>
                                            </select>
                                          </div>
                                        </div>
                                        <p style="color: #c003ff" class="fs-8">Kebutuhan khusus yang disandang oleh peserta didik, Dapat dipilih lebih dari satu</p>
                                      </div>
                                    </div>
                                  
                                  </div>


                                  <div class="btndown2 card-header bg-light mb-6">
                                      <!--begin::Title-->
                                      <h3 class="card-title align-items-start flex-column mb-1">
                                          <span class="card-label fw-bolder mb-1">PERNYATAAN ORANG TUA</span><span style="color:#5a595a">diisi pada saat pendaftaraan</span>
                                        </h3>
                                      </h3>
                                      <!--end::Title-->
                                  </div>

                                  <div class="informasi2">
                                  
                                    <div class="form-group mb-4">
                                      <label for="exampleFormControlInput1">Nama Orang Tua / Wali</label>
                                      <?php
                                        $array= array_column($file_additionalsatu, 'nameparent');
                                        if ($array != '' && $array != null) {
                                          $result = $array;
                                        } else {
                                          $result = '';
                                        }
                                    ?>
                                      <input name="nameparent" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="<?php echo e(($result =='' && $result == null) ? '' : $result[0]); ?>">
                                    </div>
                    
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Alamat Orang Tua / Wali</label>
                                        <?php
                                        $array= array_column($file_additionalsatu, 'addressparent');
                                        if ($array != '' && $array != null) {
                                          $result = $array;
                                        } else {
                                          $result = '';
                                        }
                                    ?>
                                        <input name="addressparent" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="<?php echo e(($result =='' && $result == null) ? '' : $result[0]); ?>">
                                    </div>
                    
                                    <div class="bg-white rounded-3 form-group mb-4">
                                      <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Membayar Uang Pangkal (UP) sesuai yang tertera pada Prosedur Penerimaan Peserta Didik Baru secara</label>
                                      </div>
                                      <div class="form-check mb-2">
                                        <?php
                                        $array= array_column($file_additionalsatu, 'firstpayment');
                                        if ($array != '' && $array != null) {
                                          $result = $array;
                                        } else {
                                          $result = '';
                                        }
                                    ?>
                                        <input name="firstpayment" class="checkbox1 form-check-input" type="checkbox" value="Lunas" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck1">
                                          Lunas
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <?php
                                        $array= array_column($file_additionalsatu, 'firstpayment2');
                                        if ($array != '' && $array != null) {
                                          $result = $array;
                                        } else {
                                          $result = '';
                                        }
                                    ?>
                                        <input name="firstpayment2" class="checkbox2 form-check-input" type="checkbox" value="cicilan" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck2">
                                          Cicilan
                                        </label>
                                      </div>
                                    </div>
                    
                                    <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1"><strong>1 .</strong> Pembayaran SPP Bulan Juli 2023 akan dibayarkan bersamaan dengan Uang Pangkal Lunas atau Cicilan Pertama</label>
                                        </div>
                                        <div class="form-check">
                                          <?php
                                              $array= array_column($file_additionalsatu, 'datasatu');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                          ?>
                                          <input id="datasatu" name="datasatu" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?> >
                                          <label class="form-check-label" for="defaultCheck1">
                                            Setuju
                                          </label>
                    
                                        </div>
                                    </div>
                    
                                    <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1"> <strong>2 .</strong> Pembayaran SPP setiap bulannya selambat-lambatnya pada tanggal 10 (sepuluh)</label>
                                        </div>
                                            <div class="form-check">
                                              <?php
                                              $array= array_column($file_additionalsatu, 'datadua');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                          ?>
                                          <input id="datadua" name="datadua" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?> >
                                          <label class="form-check-label" for="defaultCheck1">
                                            Setuju
                                          </label>
                                        </div>
                                    </div>
                    
                                    <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1"> <strong>3 .</strong> Jika Putra/Putri kami sudah melaksanakan tes dan dinyatakan lulus diterima sebagai siswa sekolah avicenna tetapi kami belum memenuhi kewajiban UP atau masih mempuyai tunggakan cicilan UP,maka kami Besedia dianggap mengundurkan diri dari sekolah Avicenna</label>
                                        </div>
                                        <div class="form-check">
                                          <?php
                                              $array= array_column($file_additionalsatu, 'datatiga');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                          ?>
                                          <input id="datatiga" name="datatiga" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck1">
                                            Setuju
                                          </label>
                                        </div>
                                    </div>
                    
                    
                                    <?php if($ppdb->stage == 'SD' || $ppdb->stage == 'SMP' || $ppdb->stage == 'SMA'): ?>
                                    <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1"> <strong>4 .</strong> Jika Putra-putri kami diterima di Sekolah Negeri dan Kami membayar lunas UP, maka UP kami hanya dikembalikan sebesar 50%</label>
                                        </div>
                                        <div class="form-check">
                                          <?php
                                              $array= array_column($file_additionalsatu, 'dataempat');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                          ?>
                                          <input id="dataempat" name="dataempat" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck1">
                                            Setuju
                                          </label>
                                        </div>
                                    </div>
                    
                                    <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1"> <strong>5 .</strong> Apabila Putra/Putri kami sudah bersekolah di Avicenna dan kami memiliki tunggakan UP & SPP,maka kami tidak berkeberatan jika dihubungi kembali oleh pihak Sekolah Avicenna, serta sanksi bahwa Putra/Putri kami tidak dapat menerima hasil laporan semester sampai dengan tunggakan UP & SPP tersebut kami Lunasi</label>
                                        </div>
                                        <div class="form-check">
                                          <?php
                                              $array= array_column($file_additionalsatu, 'datalima');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                          ?>
                                          <input id="datalima" name="datalima" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" <?php echo e(($result == '' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck1">
                                            Setuju
                                          </label>
                                        </div>
                                    </div>
                    
                                    <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1"><strong>6 .</strong> Apabila Putra/Putri kami sudah bersekolah di Avicenna dan kami  memiliki tunggakan UP & SPP maka kami tidak berkeberatan jika dihubungi kembali oleh pihak Sekolah Avicenna ,serta saksi bahwa Putra/Putri kami tidak dapat mengikuti PTS/PAS dan tidak dapat menerima hasil laporan semester sampai dengan tunggakan UP & SPP tersebut kami lunasi:</label>
                                        </div>
                                        <div class="form-check">
                                          <?php
                                              $array= array_column($file_additionalsatu, 'dataenam');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                          ?>
                                          <input id="dataenam" name="dataenam" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" <?php echo e(($result == '' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck1">
                                            Setuju
                                          </label>
                                        </div>
                                    </div>
                    
                                    <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1"> <strong>7 .</strong> Kami akan mematuhi seluruh Tata Tertib Sekolah, baik tertulis maupun tidak tertulis :</label>
                                        </div>
                                        <div class="form-check">
                                          <?php
                                              $array= array_column($file_additionalsatu, 'datatujuh');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                          ?>
                                          <input id="datatujuh" name="datatujuh" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" <?php echo e(($result == '' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck1">
                                            Setuju
                                          </label>
                                        </div>
                                    </div>
                    
                                    <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1"><strong>8 .</strong> Seluruh aktivitas Putra/Putri kami dalam photo/video kegiatan sekolah, pemotretan-pemotretan terkait sebagai model untuk promosi khusus sekolah adalah sepenuhnya menjadi hak Sekolah Avicenna :</label>
                                        </div>
                                        <div class="form-check">
                                          <?php
                                              $array= array_column($file_additionalsatu, 'datadelapan');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                          ?>
                                          <input id="datadelapan" name="datadelapan" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" <?php echo e(($result == '' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck1">
                                            Setuju
                                          </label>
                                        </div>
                                    </div>
                    
                                    <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1"><strong>9 .</strong> Seluruh hasil karya peserta didik diijinkan untuk dipublikasikan oleh pihak Sekolah Avicenna :</label>
                                        </div>
                                        <div class="form-check">
                                          <?php
                                              $array= array_column($file_additionalsatu, 'datasembilan');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                          ?>
                                          <input id="datasembilan" name="datasembilan" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" <?php echo e(($result == '' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck1">
                                            Setuju
                                          </label>
                                        </div>
                                    </div>
                    
                                    <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Berdasarkan apa yang telah saya baca dan pahami terhadap semua persyaratan, prosedur dan TataTertib Sekolah Avicenna, maka Surat Pernyataan ini saya buat dengan sungguh-sungguh tanpa ada paksaan dari pihak manapun, sehingga saya tidak akan melakukan tuntutan apapun baik secara materil maupun immateril kepada pihak Sekolah Avicenna dan Yayasan Pendidikan Avicenna Prestasi.</label>
                                        </div>
                                        <div class="form-check">
                                          <?php
                                          $array= array_column($file_additionalsatu, 'datasepuluh');
                                          if ($array != '' && $array != null) {
                                            $result = $array;
                                          } else {
                                            $result = '';
                                          }
                                      ?>
                                          <input name="datasepuluh" class="form-check-input" type="checkbox" value="Saya menyetujui seluruh pernyataan saya di atas" id="defaultCheck1" <?php echo e(($result == '' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck1">
                                            Saya menyetujui seluruh pernyataan saya di atas
                                          </label>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                    
                                    <?php if($ppdb->stage == 'TK' || $ppdb->stage == 'KB'): ?>
                                    <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1"> <strong>4 .</strong>Jika kami masih memiliki tunggakan cicilan UP sampai dengan bulan Mei 2023 ,maka kami bersedia dianggap mengundurkan diri dari Sekolah Avicenna</label>
                                        </div>
                                        <div class="form-check">
                                          <?php
                                          $array= array_column($file_additionalsatu, 'dataempat');
                                          if ($array != '' && $array != null) {
                                            $result = $array;
                                          } else {
                                            $result = '';
                                          }
                                      ?>
                                          <input name="dataempat" class="form-check-input" type="checkbox" value="Setuju" id="defaultCheck1" <?php echo e(($result == '' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck1">
                                            Setuju
                                          </label>
                                        </div>
                                    </div>
                    
                                    <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1"> <strong>5 .</strong> Bagi siswa yang mengundurkan diri sebelum Tahun Ajaran dimulai, maka dana yang dapat dikembalikan adalah : UP sebesar 50% (bagi yang sudah membayar UP lunas) dan SPP juli 2023 sebesar 100% (bagi yang sudah membayar SPP)</label>
                                        </div>
                                        <div class="form-check">
                                          <?php
                                          $array= array_column($file_additionalsatu, 'datalima');
                                          if ($array != '' && $array != null) {
                                            $result = $array;
                                          } else {
                                            $result = '';
                                          }
                                      ?>
                                          <input name="datalima" class="form-check-input" type="checkbox" value="Setuju" id="defaultCheck1" <?php echo e(($result == '' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck1">
                                            Setuju
                                          </label>
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1"> <strong>6 .</strong> Apabila Putra/Putri kami sudah bersekolah di Avicenna dan tidak melakukan pembayaran SPP tepat waktu (tanggal 10 setiap bulannya), kami bersedia dikenakan denda sebesar 10% dari nilai SPP yang dibayarkan</label>
                                        </div>
                                        <div class="form-check">
                                          <?php
                                          $array= array_column($file_additionalsatu, 'dataenam');
                                          if ($array != '' && $array != null) {
                                            $result = $array;
                                          } else {
                                            $result = '';
                                          }
                                      ?>
                                          <input name="dataenam" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" <?php echo e(($result == '' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck1">
                                            Setuju
                                          </label>
                                        </div>
                                    </div>
                    
                                    <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1"> <strong>7 .</strong> Apabila Putra/Putri kami sudah bersekolah di Avicenna dan kami memiliki tunggakan SPP,maka kami tidak berkeberatan jika dihubungi kembali oleh pihak Sekolah Avicenna, serta sanksi bahwa Putra/Putri kami tidak dapat menerima hasil laporan semester sampai dengan tunggakan SPP tersebut kami Lunasi</label>
                                        </div>
                                        <div class="form-check">
                                          <?php
                                          $array= array_column($file_additionalsatu, 'datatujuh');
                                          if ($array != '' && $array != null) {
                                            $result = $array;
                                          } else {
                                            $result = '';
                                          }
                                      ?>
                                          <input name="datatujuh" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" <?php echo e(($result == '' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck1">
                                            Setuju
                                          </label>
                                        </div>
                                    </div>
                    
                                    <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1"><strong>8 .</strong> Apabila Putra / Putri kami sudah bersekolah di Avicenna dan kami  memiliki tunggakan SPP maka kami tidak berkeberatan jika dihubungi kembali oleh pihak Sekolah Avicenna ,serta saksi bahwa Putra /Putri kami tidak dapat mengikuti PTS /PAS dan tidak dapat menerima hasil laporan semester sampai dengan tunggakan SPP tersebut kami lunasi:</label>
                                        </div>
                                        <div class="form-check">
                                          <?php
                                          $array= array_column($file_additionalsatu, 'datadelapan');
                                          if ($array != '' && $array != null) {
                                            $result = $array;
                                          } else {
                                            $result = '';
                                          }
                                      ?>
                                          <input name="datadelapan" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" <?php echo e(($result == '' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck1">
                                            Setuju
                                          </label>
                                        </div>
                                    </div>
                    
                                    <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1"> <strong>9 .</strong> Kami akan mematuhi seluruh Tata Tertib Sekolah, baik tertulis maupun tidak tertulis :</label>
                                        </div>
                                        <div class="form-check">
                                          <?php
                                          $array= array_column($file_additionalsatu, 'datasembilan');
                                          if ($array != '' && $array != null) {
                                            $result = $array;
                                          } else {
                                            $result = '';
                                          }
                                      ?>
                                          <input name="datasembilan" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" <?php echo e(($result == '' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck1">
                                            Setuju
                                          </label>
                                        </div>
                                    </div>
                    
                                    <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1"><strong>10 .</strong> Seluruh aktivitas Putra/i kami dalam photo/video kegiatan sekolah, pemotretanpemotretan terkait sebagai model untuk promosi khusus sekolah adalah sepenuhnya menjadi hak Sekolah Avicenna :</label>
                                        </div>
                                        <div class="form-check">
                                          <?php
                                          $array= array_column($file_additionalsatu, 'datasepuluh');
                                          if ($array != '' && $array != null) {
                                            $result = $array;
                                          } else {
                                            $result = '';
                                          }
                                      ?>
                                          <input name="datasepuluh" class="form-check-input" type="checkbox" value="Setuju" id="defaultCheck1" <?php echo e(($result == '' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck1">
                                            Setuju
                                          </label>
                                        </div>
                                    </div>
                    
                                    <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1"><strong>11 .</strong> Seluruh hasil karya peserta didik diijinkan untuk dipublikasikan oleh pihak Sekolah Avicenna :</label>
                                        </div>
                                        <div class="form-check">
                                          <?php
                                          $array= array_column($file_additionalsatu, 'datasebelas');
                                          if ($array != '' && $array != null) {
                                            $result = $array;
                                          } else {
                                            $result = '';
                                          }
                                      ?>
                                          <input name="datasebelas" class="form-check-input" type="checkbox" value="Setuju" id="defaultCheck1" <?php echo e(($result == '' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck1">
                                            Setuju
                                          </label>
                                        </div>
                                    </div>
                    
                                    <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Kami telah memahami semua Persyaratan, Prosedur dan Tata Tertib Sekolah Avicenna dan surat pernyataan ini kami isi dengan sungguh - sungguh tanpa ada paksaan dari pihak manapun Kami tidak akan melakukan tuntutan apapun baik secara materii maupun materi kepada pihak Sekolah Avicenna maupun Yayasan Pendidikan Avicenna Prestasi.</label>
                                        </div>
                                        <div class="form-check">
                                          <?php
                                          $array= array_column($file_additionalsatu, 'dataduabelas');
                                          if ($array != '' && $array != null) {
                                            $result = $array;
                                          } else {
                                            $result = '';
                                          }
                                      ?>
                                          <input name="dataduabelas" class="form-check-input" type="checkbox" value="Saya memahami dan menyetujui seluruh pernyataan di atas" id="defaultCheck1" <?php echo e(($result == '' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck1">
                                            Saya memahami dan menyetujui seluruh pernyataan di atas
                                          </label>
                                        </div>
                                    </div>
                                    <?php endif; ?>                         

                                  </div>
                                  

                                  <div class="btndown3 card-header bg-light mb-6">
                                      <!--begin::Title-->
                                      <h3 class="card-title align-items-start flex-column mb-1">
                                          <span class="card-label fw-bolder mb-1">PERSETUJUAN TATA TERTIB</span><span style="color: #5a595a">diisi pada saat pendaftaraan</span>
                                        </h3>
                                      </h3>
                                      <!--end::Title-->
                                  </div>
                                  <div class="informasi3">
                                    <div class="form-group mb-4">
                                      <label for="exampleFormControlInput1">Nama Orang Tua / Wali</label>
                                      <?php
                                          $array= array_column($file_additionalsatu, 'nameparent');
                                          if ($array != '' && $array != null) {
                                            $result = $array;
                                          } else {
                                            $result = '';
                                          }
                                      ?>
                                      <input name="nameparent" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="<?php echo e(($result =='' && $result == null) ? '' : $result[0]); ?>">
                                    </div>
                  
                                    <div class="form-group mb-4">
                                      <?php
                                          $array= array_column($file_additionalsatu, 'data13');
                                          if ($array != '' && $array != null) {
                                            $result = $array;
                                          } else {
                                            $result = '';
                                          }
                                      ?>
                                        <label for="exampleFormControlInput1">Nama Calon Murid</label>
                                        <input name="data13" type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo e(!empty($result[0]) ? $result[0] : $result); ?>" placeholder="Jawaban Anda" required>
                                    </div>
                  
                                    <div class="bg-white rounded-3 form-group mb-4">
                                      <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Kelas</label>
                                      </div>
                                      <div class="mb-2">
                                                <?php
                                                $array= array_column($file_additionalsatu, 'data14');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }
                                                ?>
                                            <?php if($ppdb->stage == "SD"): ?>
                                            <select name="data14" id="">
                                              <option value="<?php echo e(!empty($result[0]) ? $result[0] :  $result); ?>"><?php echo e(!empty($result[0]) ? $result[0] : 'Pilih'); ?></option>
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5">5</option>
                                              <option value="6">6</option>
                                            </select>
                                            <?php endif; ?>
                  
                  
                                            <?php if($ppdb->stage == "TK" || $ppdb->stage == "KB"): ?>
                                            <select name="data14" id="">
                                              <option value="<?php echo e(!empty($result[0]) ? $result[0] :  $result); ?>"><?php echo e(!empty($result[0]) ? $result[0] : 'Pilih'); ?></option>
                                              <option value="<?php echo e($ppdb->stage == "KB" ? 'KB-A' : 'TK-A'); ?>"><?php echo e($ppdb->stage == "KB" ? 'KB-A' : 'TK-A'); ?></option>
                                              <option value="<?php echo e($ppdb->stage == "KB" ? 'KB-B' : 'TK-B'); ?>"><?php echo e($ppdb->stage == "KB" ? 'KB-B' : 'TK-B'); ?></option>
                                            </select>
                                            <?php endif; ?>
                  
                                            <?php if($ppdb->stage == "SMP" || $ppdb->stage == "SMA"): ?>
                                            <select name="data14" id="">
                                              <option value="<?php echo e(!empty($result[0]) ? $result[0] :  $result); ?>"><?php echo e(!empty($result[0]) ? $result[0] : 'Pilih'); ?></option>
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                            </select>
                                            <?php endif; ?>
                                      </div>
                                    </div>
                  
                                    <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1"> Dengan ini telah membaca dan menyetujui Tata Tertib yang berlaku untuk putra/putri kai selama bersekolah di Sekolah Avicenna</label>
                                        </div>
                                            <div class="form-check">
                                              <?php
                                              $array= array_column($file_additionalsatu, 'data15');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                          ?>
                                          <input id="datadua" name="data15" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?> >
                                          <label class="form-check-label" for="defaultCheck1">
                                            Ya saya Setuju
                                          </label>
                                        </div>
                                    </div>
                  
                                  </div>

                                  <div class="btndown4 card-header bg-light mb-6">
                                        <!--begin::Title-->
                                        <h3 class="card-title align-items-start flex-column mb-1">
                                            <span class="card-label fw-bolder mb-1">INFORMASI KEADAAN JASMANI</span><span style="color: #5a595a">diisi pada saat pendaftaraan</span>
                                          </h3>
                                        </h3>
                                        <!--end::Title-->
                                  </div>
                                  <div class="informasi4">
                                    <div class="form-group mb-4">
                                      <?php
                                          $array= array_column($file_additionalsatu, 'data16');
                                          if ($array != '' && $array != null) {
                                            $result = $array;
                                          } else {
                                            $result = '';
                                          }
                                      ?>
                                      <label for="exampleFormControlInput1">Nama Lengkap Peserta Didik</label>
                                      <input name="data16" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="<?php echo e(!empty($result[0]) ? $result[0] :  $result); ?>" required>
                                    </div>
            
            
            
                                    <div class="bg-white rounded-3 form-group mb-4">
                                      <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                      </div>
                                      <div class="form-check mb-2">
                                        <?php
                                        $array= array_column($file_additionalsatu, 'data17');
                                        if ($array != '' && $array != null) {
                                          $result = $array;
                                        } else {
                                          $result = '';
                                        }
                                    ?>
                                        <input name="data17" class="checkboxsex1 form-check-input" type="checkbox" value="Laki-laki" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck1">
                                          Laki-laki
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <?php
                                        $array= array_column($file_additionalsatu, 'data18');
                                        if ($array != '' && $array != null) {
                                          $result = $array;
                                        } else {
                                          $result = '';
                                        }
                                    ?>
                                        <input name="data18" class="checkboxsex2 form-check-input" type="checkbox" value="Perempuan" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck2">
                                          Perempuan
                                        </label>
                                      </div>
                                    </div>
            
                                    <div class="form-group mb-4">
                                      <?php
                                          $array= array_column($file_additionalsatu, 'data19');
                                          if ($array != '' && $array != null) {
                                            $result = $array;
                                          } else {
                                            $result = '';
                                          }
                                      ?>
                                      <label for="exampleFormControlInput1">Tempat Lahir</label>
                                      <input name="data19" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="<?php echo e(!empty($result[0]) ? $result[0] :  $result); ?>">
                                    </div>
            
                                    <div class="form-group mb-4">
                                      <?php
                                          $array= array_column($file_additionalsatu, 'data20');
                                          if ($array != '' && $array != null) {
                                            $result = $array;
                                          } else {
                                            $result = '';
                                          }
                                      ?>
                                      <label for="exampleFormControlInput1">Tanggal Lahir</label>
                                      <input name="data20" type="date" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="<?php echo e(!empty($result[0]) ? $result[0] :  $result); ?>" required>
                                    </div>
            
                                    <div class="form-group mb-4">
                                      <?php
                                          $array= array_column($file_additionalsatu, 'data21');
                                          if ($array != '' && $array != null) {
                                            $result = $array;
                                          } else {
                                            $result = '';
                                          }
                                       ?>
                                      <label for="exampleFormControlInput1">Berat Badan (kg)</label>
                                      <input name="data21" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="<?php echo e(!empty($result[0]) ? $result[0] :  $result); ?>">
                                    </div>
            
                                  <div class="form-group mb-4">
                                    <?php
                                          $array= array_column($file_additionalsatu, 'data22');
                                          if ($array != '' && $array != null) {
                                            $result = $array;
                                          } else {
                                            $result = '';
                                          }
                                       ?>
                                    <label for="exampleFormControlInput1">Tinggi Badan (cm)</label>
                                    <input name="data22" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="<?php echo e(!empty($result[0]) ? $result[0] :  $result); ?>">
                                  </div>
            
                                  <div class="form-group mb-4">
                                    <?php
                                    $array= array_column($file_additionalsatu, 'data23');
                                    if ($array != '' && $array != null) {
                                      $result = $array;
                                    } else {
                                      $result = '';
                                    }
                                 ?>
                                    <label for="exampleFormControlInput1">Golongan Darah</label>
                                    <input name="data23" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="<?php echo e(!empty($result[0]) ? $result[0] :  $result); ?>">
                                  </div>
            
                                  
                                  <div class="bg-white rounded-3 form-group mb-4">
                                    <label class="form-label fs-6 fw-bolder text-dark">Riwayat Imunisasi (Khusus TK, KB dan SD)</label>
                                    <div class="mb-3">
                                          <label for="exampleFormControlSelect1">Status Imunisasi (Boleh lebih dari satu)</label>
                                    </div>
                                    <div class="form-check mb-2">
                                      <?php
                                          $array= array_column($file_additionalsatu, 'data24');
                                          if ($array != '' && $array != null) {
                                            $result = $array;
                                          } else {
                                            $result = '';
                                          }
                                      ?>
                                      <input name="data24" class=" form-check-input" type="checkbox" value="1" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                      <label class="form-check-label" for="defaultCheck1">
                                        Memiliki catatan imunisasi
                                      </label>
                                    </div>
                                    <div class="form-check mb-2">
                                      <?php
                                            $array= array_column($file_additionalsatu, 'data25');
                                            if ($array != '' && $array != null) {
                                              $result = $array;
                                            } else {
                                              $result = '';
                                            }
                                      ?>
                                      <input name="data25" class=" form-check-input" type="checkbox" value="2" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                      <label class="form-check-label" for="defaultCheck2">
                                        Saat bayi mendapatkan imunisasi
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <?php
                                            $array= array_column($file_additionalsatu, 'data26');
                                            if ($array != '' && $array != null) {
                                              $result = $array;
                                            } else {
                                              $result = '';
                                            }
                                      ?>
                                      <input name="data26" class=" form-check-input" type="checkbox" value="3" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                      <label class="form-check-label" for="defaultCheck2">
                                        imunisasi lengkap
                                      </label>
                                    </div>
                                  </div>
                                  
            
                                  <div class="fv-row mb-10 has-feedback">
                                    <label class="form-label fs-6 fw-bolder text-dark">sertifikat Imunisasi</label>
            
                                    
                                    <?php
                                          $array= array_column($medco_employee_file, 'gambar');
                                          if ($array != '' && $array != null) {
                                              $result = $array;
                                          } else {
                                              $result = '';
                                          }
                                      ?>
                                      

                                      <a href="https://ppdb.sekolah-avicenna.sch.id/{{ e(($result =='' && $result == null) ? '' : $result[0]) }}" target="_blank" class="linkhref ms-3">Download File</a>
                                    
                                  </div>          
            
                                  
                                  <div class="bg-white rounded-3 form-group mb-4">
                                    <label class="form-label fs-6 fw-bolder text-dark">Riwayat Vaksin</label>
                                    <div class="mb-3">
                                          <label for="exampleFormControlSelect1">Status Vaksin (Boleh lebih dari satu)</label>
                                    </div>
                                    <div class="form-check mb-2">
                                      <?php
                                          $array= array_column($file_additionalsatu, 'datavaksin24');
                                          if ($array != '' && $array != null) {
                                            $result = $array;
                                          } else {
                                            $result = '';
                                          }
                                      ?>
                                      <input name="datavaksin24" class=" form-check-input" type="checkbox" value="1" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                      <label class="form-check-label" for="defaultCheck1">
                                        booster 1
                                      </label>
                                    </div>
                                    <div class="form-check mb-2">
                                      <?php
                                            $array= array_column($file_additionalsatu, 'datavaksin25');
                                            if ($array != '' && $array != null) {
                                              $result = $array;
                                            } else {
                                              $result = '';
                                            }
                                      ?>
                                      <input name="datavaksin25" class=" form-check-input" type="checkbox" value="2" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                      <label class="form-check-label" for="defaultCheck2">
                                        booster 2
                                      </label>
                                    </div>
                                    <div class="form-check mb-2">
                                      <?php
                                            $array= array_column($file_additionalsatu, 'datavaksin26');
                                            if ($array != '' && $array != null) {
                                              $result = $array;
                                            } else {
                                              $result = '';
                                            }
                                      ?>
                                      <input name="datavaksin26" class=" form-check-input" type="checkbox" value="3" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                      <label class="form-check-label" for="defaultCheck2">
                                        booster 3
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <?php
                                            $array= array_column($file_additionalsatu, 'datavaksin27');
                                            if ($array != '' && $array != null) {
                                              $result = $array;
                                            } else {
                                              $result = '';
                                            }
                                      ?>
                                      <input name="datavaksin27" class=" form-check-input" type="checkbox" value="4" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                      <label class="form-check-label" for="defaultCheck2">
                                        belum vaksin
                                      </label>
                                    </div>
                                  </div>
                                  
            
                                  <div class="fv-row mb-10 has-feedback">
                                    <label class="form-label fs-6 fw-bolder text-dark">sertifikat Vaksin</label>
            
                                    
                                    <?php
                                    $array= array_column($medco_employee_file, 'gambarvaksin');
                                    if ($array != '' && $array != null) {
                                        $result = $array;
                                    } else {
                                        $result = '';
                                    }
                                ?>
                                <a href="https://ppdb.sekolah-avicenna.sch.id/{{ e(($result =='' && $result == null) ? '' : $result[0]) }}" target="_blank" class="linkhref2">Check File</a>
                                    
                                  </div>
                                      
                                      <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Catatan riwayat kesehatan anak dalam kendungan anak untuk melihat adanya kelainan kogenital untuk penyakit bawaan pada anak terutama yang harus diwaspadai atau butuh pengawasan khusus</label>
                                        
                                      </div>
                                      <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                              <label for="exampleFormControlSelect1">(Keadaan pada waktu anak dalam kandungan ) apakah ada keterangan kelainnan bayi ketika berada dalam kandungan ? jika iya apakah berbahaya? (boleh dijawab lebih dari satu)</label>
                                        </div>
                                        <div class="form-check mb-2">
                                          <?php
                                              $array= array_column($file_additionalsatu, 'data27');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                          ?>
                                          <input name="data27" class="form-check-input" type="checkbox" value="1" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck1">
                                            Ada Gangguan dan Kelainan
                                          </label>
                                        </div>
                                        <div class="form-check mb-2">
                                          <?php
                                                $array= array_column($file_additionalsatu, 'data28');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }
                                          ?>
                                          <input name="data28" class="form-check-input" type="checkbox" value="2" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck2">
                                            Tidak Ada Gangguan dan Kelainan
                                          </label>
                                        </div>
                                        <div class="form-check mb-2">
                                          <?php
                                                $array= array_column($file_additionalsatu, 'data29');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }
                                          ?>
                                          <input name="data29" class="form-check-input" type="checkbox" value="3" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck2">
                                            Berbahaya
                                          </label>
                                        </div>
            
                                        <div class="form-check mb-2">
                                          <?php
                                                $array= array_column($file_additionalsatu, 'data30');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }
                                          ?>
                                          <input name="data30" class="form-check-input" type="checkbox" value="4" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck2">
                                            Tidak Berbahaya
                                          </label>
                                        </div>
            
                                        <div class="form-check mb-2">
                                          <?php
                                                $array= array_column($file_additionalsatu, 'data31');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }
                                          ?>
                                          <input name="data31" class="form-check-input" type="checkbox" value="4" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck2">
                                            Yang Lain
                                          </label>
                                        </div>
                                      </div>
                                      
            
                                            
                                      <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                              <label for="exampleFormControlSelect1">Bagaimana gambaran Waktu Kelahiran anak dan kondisi anak ketika dilahirkan? (Boleh dijawab lebih dari satu)</label>
                                        </div>
                                        <div class="form-check mb-2">
                                          <?php
                                              $array= array_column($file_additionalsatu, 'data32');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                          ?>
                                          <input name="data32" class="form-check-input" type="checkbox" value="1" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck1">
                                            Normal, tidak ada gangguan
                                          </label>
                                        </div>
                                        <div class="form-check mb-2">
                                          <?php
                                                $array= array_column($file_additionalsatu, 'data33');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }
                                          ?>
                                          <input name="data33" class="form-check-input" type="checkbox" value="2" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck2">
                                            Ada komplikasi ketika melahirkan
                                          </label>
                                        </div>
                                        <div class="form-check mb-2">
                                          <?php
                                                $array= array_column($file_additionalsatu, 'data34');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }
                                          ?>
                                          <input name="data34" class="form-check-input" type="checkbox" value="3" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck2">
                                            Normal tidak ada cacat bawaan
                                          </label>
                                        </div>
            
                                        <div class="form-check">
                                          <?php
                                                $array= array_column($file_additionalsatu, 'data35');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }
                                          ?>
                                          <input name="data35" class="form-check-input" type="checkbox" value="4" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck2">
                                            Ada Cacat bawaan
                                          </label>
                                        </div>
                                      </div>
                                      

                                                           
                                        <div class="bg-white rounded-3 form-group mb-4">
                                          <div style="text-align: center;" class="mb-3">
                                                <label for="exampleFormControlSelect1 "><strong>Bagaimana gambaran Pertumbuhan anak pada 12 bulan pertama</strong></label>
                                          </div>
            
                                          
                                          <div class="container">
                                            <div class="row">
                                              <div class="col-sm">
                                                Miring
                                              </div>
                                              <div class="col-sm">
                                                <div class="form-check mb-2">
                                                  <?php
                                                  $array= array_column($file_additionalsatu, 'data36');
                                                  if ($array != '' && $array != null) {
                                                    $result = $array;
                                                  } else {
                                                    $result = '';
                                                  }
                                              ?>
                                                  <input name="data36" class="checkboxnormalon form-check-input" type="checkbox" value="Normal" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                                  <label class="form-check-label" for="defaultCheck1">
                                                    Normal
                                                  </label>
                                                </div>
            
                                              </div>
                                              <div class="col-sm">
                                                <div class="form-check">
                                                  <?php
                                                  $array= array_column($file_additionalsatu, 'data37');
                                                  if ($array != '' && $array != null) {
                                                    $result = $array;
                                                  } else {
                                                    $result = '';
                                                  }
                                              ?>
                                                  <input name="data37" class="checkboxnormaloff form-check-input" type="checkbox" value="Terlambat" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                                  <label class="form-check-label" for="defaultCheck2">
                                                    Terlambat
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          
            
                                          
                                          <div class="container">
                                            <div class="row">
                                              <div class="col-sm">
                                                Tengkurap
                                              </div>
                                              <div class="col-sm">
                                                <div class="form-check mb-2">
                                                  <?php
                                                  $array= array_column($file_additionalsatu, 'data38');
                                                  if ($array != '' && $array != null) {
                                                    $result = $array;
                                                  } else {
                                                    $result = '';
                                                  }
                                              ?>
                                                  <input name="data38" class="checkboxtengkurapon form-check-input" type="checkbox" value="Normal" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                                  <label class="form-check-label" for="defaultCheck1">
                                                    Normal
                                                  </label>
                                                </div>
            
                                              </div>
                                              <div class="col-sm">
                                                <div class="form-check">
                                                  <?php
                                                  $array= array_column($file_additionalsatu, 'data39');
                                                  if ($array != '' && $array != null) {
                                                    $result = $array;
                                                  } else {
                                                    $result = '';
                                                  }
                                              ?>
                                                  <input name="data39" class="checkboxtengkurapoff form-check-input" type="checkbox" value="Terlambat" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                                  <label class="form-check-label" for="defaultCheck2">
                                                    Terlambat
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          
            
                                          
            
                                          <div class="container">
                                            <div class="row">
                                              <div class="col-sm">
                                                Merangkak
                                              </div>
                                              <div class="col-sm">
                                                <div class="form-check mb-2">
                                                  <?php
                                                  $array= array_column($file_additionalsatu, 'data40');
                                                  if ($array != '' && $array != null) {
                                                    $result = $array;
                                                  } else {
                                                    $result = '';
                                                  }
                                              ?>
                                                  <input name="data40" class="checkboxmerangkakon form-check-input" type="checkbox" value="Normal" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                                  <label class="form-check-label" for="defaultCheck1">
                                                    Normal
                                                  </label>
                                                </div>
            
                                              </div>
                                              <div class="col-sm">
                                                <div class="form-check">
                                                  <?php
                                                  $array= array_column($file_additionalsatu, 'data41');
                                                  if ($array != '' && $array != null) {
                                                    $result = $array;
                                                  } else {
                                                    $result = '';
                                                  }
                                              ?>
                                                  <input name="data41" class="checkboxmerangkakoff form-check-input" type="checkbox" value="Terlambat" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                                  <label class="form-check-label" for="defaultCheck2">
                                                    Terlambat
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
            
                                          
            
                                          
            
                                          <div class="container">
                                            <div class="row">
                                              <div class="col-sm">
                                                Duduk
                                              </div>
                                              <div class="col-sm">
                                                <div class="form-check mb-2">
                                                  <?php
                                                  $array= array_column($file_additionalsatu, 'data42');
                                                  if ($array != '' && $array != null) {
                                                    $result = $array;
                                                  } else {
                                                    $result = '';
                                                  }
                                              ?>
                                                  <input name="data42" class="checkboxdudukon form-check-input" type="checkbox" value="Normal" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                                  <label class="form-check-label" for="defaultCheck1">
                                                    Normal
                                                  </label>
                                                </div>
            
                                              </div>
                                              <div class="col-sm">
                                                <div class="form-check">
                                                  <?php
                                                  $array= array_column($file_additionalsatu, 'data43');
                                                  if ($array != '' && $array != null) {
                                                    $result = $array;
                                                  } else {
                                                    $result = '';
                                                  }
                                              ?>
                                                  <input name="data43" class="checkboxdudukoff form-check-input" type="checkbox" value="Terlambat" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                                  <label class="form-check-label" for="defaultCheck2">
                                                    Terlambat
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
            
                                          
            
                                          
            
                                          <div class="container">
                                            <div class="row">
                                              <div class="col-sm">
                                                Kemampuan Bicara dan Bahasa
                                              </div>
                                              <div class="col-sm">
                                                <div class="form-check mb-2">
                                                  <?php
                                                  $array= array_column($file_additionalsatu, 'data44');
                                                  if ($array != '' && $array != null) {
                                                    $result = $array;
                                                  } else {
                                                    $result = '';
                                                  }
                                              ?>
                                                  <input name="data44" class="checkboxspeakon form-check-input" type="checkbox" value="Normal" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                                  <label class="form-check-label" for="defaultCheck1">
                                                    Normal
                                                  </label>
                                                </div>
            
                                              </div>
                                              <div class="col-sm">
                                                <div class="form-check">
                                                  <?php
                                                  $array= array_column($file_additionalsatu, 'data45');
                                                  if ($array != '' && $array != null) {
                                                    $result = $array;
                                                  } else {
                                                    $result = '';
                                                  }
                                              ?>
                                                  <input name="data45" class="checkboxspeakoff form-check-input" type="checkbox" value="Terlambat" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                                  <label class="form-check-label" for="defaultCheck2">
                                                    Terlambat
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
            
                                                             
            
                                        </div>
                                        
                               
                                          <div class="bg-white rounded-3 form-group mb-4">
                                                  <div class="mb-3">
                                                    <label for="exampleFormControlSelect1"> catatan riwayat penyakit</label>
                                                  </div>
                                                  <div class="mb-3">
                                                      <label for="exampleFormControlSelect1"> Apakah ada cacat fisik</label>
                                                  </div>
            
                                              
            
                                                <div class="form-check mb-2">
                                                  <?php
                                                  $array= array_column($file_additionalsatu, 'data46');
                                                  if ($array != '' && $array != null) {
                                                    $result = $array;
                                                  } else {
                                                    $result = '';
                                                  }
                                              ?>
                                                  <input name="data46" class="checkboxfisik1 form-check-input" type="checkbox" value="Ada" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                                  <label class="form-check-label" for="defaultCheck1">
                                                    Ada
                                                  </label>
                                                </div>
            
                                                <div class="form-check">
                                                  <?php
                                                  $array= array_column($file_additionalsatu, 'data47');
                                                  if ($array != '' && $array != null) {
                                                    $result = $array;
                                                  } else {
                                                    $result = '';
                                                  }
                                              ?>
                                                  <input name="data47" class="checkboxfisik2 form-check-input" type="checkbox" value="Tidak Ada" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                                  <label class="form-check-label" for="defaultCheck2">
                                                    Tidak Ada
                                                  </label>
                                                </div>
            
                                                
            
                                          </div>                  
            
                                      
            
                                    <div class="bg-white rounded-3 form-group mb-4">
                                      <div class="mb-3">
                                            <label for="exampleFormControlSelect1">apakah pernah mengalami kejang ketika demam atau memiliki riwayat kejang demam ?( Jawaban boleh lebih dari satu )</label>
                                      </div>
                                      <div class="form-check mb-2">
                                        <?php
                                            $array= array_column($file_additionalsatu, 'data48');
                                            if ($array != '' && $array != null) {
                                              $result = $array;
                                            } else {
                                              $result = '';
                                            }
                                        ?>
                                        <input name="data48" class="form-check-input" type="checkbox" value="1" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck1">
                                         Ya , Pernah
                                        </label>
                                      </div>
                                      <div class="form-check mb-2">
                                        <?php
                                              $array= array_column($file_additionalsatu, 'data49');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                        ?>
                                        <input name="data49" class="form-check-input" type="checkbox" value="2" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck2">
                                          Tidak Pernah
                                        </label>
                                      </div>
                                      <div class="form-check mb-2">
                                        <?php
                                              $array= array_column($file_additionalsatu, 'data50');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                        ?>
                                        <input name="data50" class="form-check-input" type="checkbox" value="3" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck2">
                                         Ya, Punya Riwayat kejang demam (tiap demam pasti kejang)
                                        </label>
                                      </div>
            
                                      <div class="form-check mb-2">
                                        <?php
                                              $array= array_column($file_additionalsatu, 'data51');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                        ?>
                                        <input name="data51" class="form-check-input" type="checkbox" value="4" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck2">
                                          Tidak ada riwayat kejang demam
                                        </label>
                                      </div>
                                    </div>
                                    
            
                                  
            
                                  <div class="form-group mb-4">
                                    <?php
                                          $array= array_column($file_additionalsatu, 'data52');
                                          if ($array != '' && $array != null) {
                                            $result = $array;
                                          } else {
                                            $result = '';
                                          }
                                       ?>
                                    <label for="exampleFormControlInput1"> apakah memiliki riwayat penyakit yang di derita ? penyakit apa,pada usia berapa ketika mengalami sakit ? lama sakitnya ? apakah masih menjalani medikasi sampai saat ini ? , apakah penyakit ini kambuhan?</label>
                                    <input name="data52" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="<?php echo e(!empty($result[0]) ? $result[0] :  $result); ?>">
                                  </div>
            
                                  
            
                              
            
                              <div class="form-group mb-4">
                                <?php
                                      $array= array_column($file_additionalsatu, 'data53');
                                      if ($array != '' && $array != null) {
                                        $result = $array;
                                      } else {
                                        $result = '';
                                      }
                                   ?>
                                <label for="exampleFormControlInput1"> apakah pernah dirawat di rumah sakit? karena sakit apa ? tahun berapa ?</label>
                                <input name="data53" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="<?php echo e(!empty($result[0]) ? $result[0] :  $result); ?>">
                              </div>
                              
            
                                    
            
                                    <div class="form-group mb-4">
                                      <?php
                                            $array= array_column($file_additionalsatu, 'data54');
                                            if ($array != '' && $array != null) {
                                              $result = $array;
                                            } else {
                                              $result = '';
                                            }
                                         ?>
                                      <label for="exampleFormControlInput1"> catatan lain jika ada</label>
                                      <input name="data54" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="<?php echo e(!empty($result[0]) ? $result[0] :  $result); ?>">
                                    </div>
            
                                                         
            
                            </div>
      

                                  <div class="btndown5 card-header bg-light mb-6">
                                    <!--begin::Title-->
                                    <h3 class="card-title align-items-start flex-column mb-1">
                                        <span class="card-label fw-bolder mb-1">INFORMASI ANGKET</span><span style="color:#5a595a">diisi pada saat pendaftaraan</span>
                                    </h3>
                                    <!--end::Title-->
                                   </div>

                                   <div class="informasi5">
                                    
                                    <div class="form-group mb-4">
                                      <?php
                                            $array= array_column($file_additionalsatu, 'data55');
                                            if ($array != '' && $array != null) {
                                              $result = $array;
                                            } else {
                                              $result = '';
                                            }
                                         ?>
                                      <label for="exampleFormControlInput1">Sekolah Asal</label>
                                      <input name="data55" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="<?php echo e(!empty($result[0]) ? $result[0] :  $result); ?>">
                                    </div>
                                    
                  
                                    <div class="form-group mb-4">
                                      <label for="exampleFormControlInput1">Saya Mengetahui sekolah Avicenna melalui ?</label>
                                      
                                    </div>
                  
                                    
                  
                                    <div class="bg-white rounded-3 form-group mb-4">
                                      <div class="mb-3">
                                            <label for="exampleFormControlSelect1">A. Brand</label>
                                      </div>
                                      <div class="mb-2">
                                                <?php
                                                $array= array_column($file_additionalsatu, 'data56');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }

                                                if ($brand == 1) {
                                                  $brand = 'Keluarga';
                                                } else if ($brand == 2)  {
                                                  $brand = 'Tetangga';
                                                } else if ($brand == 3) {
                                                  $brand = 'Teman';
                                                } else if ($brand == 4) {
                                                  $brand = 'Tidak Melalui Brand';
                                                }
                                                ?>
                  
                                            <select name="data56" id="">
                                              <option value="<?php echo e($brand); ?>"><?php echo e($brand); ?></option>
                                            </select>
                  
                                      </div>
                                    </div>
                  
                                    <div class="bg-white rounded-3 form-group mb-4">
                                      <div class="mb-3">
                                            <label for="exampleFormControlSelect1">B. Kegiatan Sekolah</label>
                                      </div>
                                      <div class="mb-2">
                                                <?php
                                                $array= array_column($file_additionalsatu, 'data57');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }

                                                if ($kegiatan_sekolah == 1) {
                                                  $kegiatan_sekolah = 'Open House';
                                                } else if ($kegiatan_sekolah == 2)  {
                                                  $kegiatan_sekolah = 'Lomba antar Sekolah';
                                                } else if ($kegiatan_sekolah == 3) {
                                                  $kegiatan_sekolah = 'Tidak Melalui Kegiatan Sekolah';
                                                } 
                                                ?>
                  
                                            <select name="data57" id="">
                                              <option value="<?php echo e($kegiatan_sekolah); ?>"><?php echo e($kegiatan_sekolah); ?></option>
                                            </select>
                  
                                      </div>
                                    </div>
                  
                                    <div class="bg-white rounded-3 form-group mb-4">
                                      <div class="mb-3">
                                            <label for="exampleFormControlSelect1">C. Media Cetak</label>
                                      </div>
                                      <div class="mb-2">
                                                <?php
                                                $array= array_column($file_additionalsatu, 'data58');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }
                                                
                                                if ($media_cetak == 1) {
                                                  $media_cetak = 'Spanduk';
                                                } else if ($media_cetak == 2) {
                                                  $media_cetak = 'Brosur';
                                                } else if ($media_cetak == 3) {
                                                  $media_cetak = 'Koran';
                                                } else if ($media_cetak == 4) {
                                                  $media_cetak = 'Tidak Melalui Media Cetak';
                                                }
                                                ?>
                  
                                            <select name="data58" id="">
                                              <option value="<?php echo e($media_cetak); ?>"><?php echo e($media_cetak); ?></option>
                                            </select>
                  
                                      </div>
                                    </div>
                  
                                    <div class="bg-white rounded-3 form-group mb-4">
                                      <div class="mb-3">
                                            <label for="exampleFormControlSelect1">D. Media Elektronik</label>
                                      </div>
                                      <div class="mb-2">
                                                <?php
                                                $array= array_column($file_additionalsatu, 'data59');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }

                                                if ($media_elektronik == 1) {
                                                  $media_elektronik = 'Televisi';
                                                } else if ($media_elektronik == 2) {
                                                  $media_elektronik = 'Radio'; 
                                                } else if ($media_elektronik == 3) {
                                                  $media_elektronik = 'SMS'; 
                                                } else if ($media_elektronik == 4) {
                                                  $media_elektronik = 'Tidak Melalui Media Elektronik'; 
                                                }
                                                ?>
                  
                                            <select name="data59" id="">
                                              <option value="<?php echo e($media_elektronik); ?>"><?php echo e($media_elektronik); ?></option>
                                            </select>
                  
                                      </div>
                                    </div>
                  
                  
                                    <div class="bg-white rounded-3 form-group mb-4">
                                      <div class="mb-3">
                                            <label for="exampleFormControlSelect1">E. Media Sosial</label>
                                      </div>
                                      <div class="mb-2">
                                                <?php
                                                $array= array_column($file_additionalsatu, 'data60');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }

                                                if ($media_sosial == 1) {
                                                  $media_sosial = 'Instagram';
                                                } else if ($media_sosial == 2) {
                                                  $media_sosial = 'Facebook';
                                                } else if ($media_sosial == 3) {
                                                  $media_sosial = 'Twitter';
                                                } else if ($media_sosial == 4) {
                                                  $media_sosial = 'Linkedin';
                                                } else if ($media_sosial == 5) {
                                                  $media_sosial = 'Tidak Melalui Media Sosial';
                                                }
                                                ?>
                  
                                            <select name="data60" id="">
                                              <option value="<?php echo e($media_sosial); ?>"><?php echo e($media_sosial); ?></option>
                                            </select>
                  
                                      </div>
                                    </div>
                  
                                    <div class="bg-white rounded-3 form-group mb-4">
                                      <div class="mb-3">
                                            <label for="exampleFormControlSelect1">F. Internet</label>
                                      </div>
                                      <div class="mb-2">
                                                <?php
                                                $array= array_column($file_additionalsatu, 'data61');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }
                                                ?>
                  
                                            <select name="data61" id="">
                                              <option value="<?php echo e($internet); ?>"><?php echo e($internet); ?></option>
                                              <option value="1">Website</option>
                                              <option value="2">Google</option>
                                              <option value="3">Forum</option>
                                              <option value="4">Tidak Melalui Internet</option>
                                            </select>
                  
                                      </div>
                                    </div>
                  
                                    
                  
                                     
                                     <div class="bg-white rounded-3 form-group mb-4">
                                      <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Hal Membuat saya memilih sekolah Avicenna ?</label>
                                      </div>
                                      <div class="form-check mb-2">
                                        <?php
                                            $array= array_column($file_additionalsatu, 'data62');
                                            if ($array != '' && $array != null) {
                                              $result = $array;
                                            } else {
                                              $result = '';
                                            }
                                        ?>
                                        <input name="data62" class="form-check-input" type="checkbox" value="1" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck1">
                                          Program Sekolah
                                        </label>
                                      </div>
                                      <div class="form-check mb-2">
                                        <?php
                                              $array= array_column($file_additionalsatu, 'data63');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                        ?>
                                        <input name="data63" class="form-check-input" type="checkbox" value="2" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck2">
                                          Fasilitas % pelayanan
                                        </label>
                                      </div>
                                      <div class="form-check mb-2">
                                        <?php
                                              $array= array_column($file_additionalsatu, 'data64');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                        ?>
                                        <input name="data64" class="form-check-input" type="checkbox" value="3" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck2">
                                          Jarak
                                        </label>
                                      </div>
                  
                                      <div class="form-check mb-2">
                                        <?php
                                              $array= array_column($file_additionalsatu, 'data65');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                        ?>
                                        <input name="data65" class="form-check-input" type="checkbox" value="4" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck2">
                                          Uang Sekolah Terjangkau
                                        </label>
                                      </div>
                                    </div>
                                    
                  
                                      
                                      <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                              <label for="exampleFormControlSelect1">Alasan memilih program Sekolah ?</label>
                                        </div>
                                        <div class="form-check mb-2">
                                          <?php
                                              $array= array_column($file_additionalsatu, 'dataschool62');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                          ?>
                                          <input name="dataschool62" class="form-check-input" type="checkbox" value="1" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck1">
                                            Memiliki Program Habits  7 "Leader in Me"
                                          </label>
                                        </div>
                                        <div class="form-check mb-2">
                                          <?php
                                                $array= array_column($file_additionalsatu, 'dataschool63');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }
                                          ?>
                                          <input name="dataschool63" class="form-check-input" type="checkbox" value="2" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck2">
                                            Prestasi Sekolah
                                          </label>
                                        </div>
                                        <div class="form-check mb-2">
                                          <?php
                                                $array= array_column($file_additionalsatu, 'dataschool64');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }
                                          ?>
                                          <input name="dataschool64" class="form-check-input" type="checkbox" value="3" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck2">
                                           Ekstrakulikuler
                                          </label>
                                        </div>
                  
                                        <div class="form-check mb-2">
                                          <?php
                                                $array= array_column($file_additionalsatu, 'dataschool65');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }
                                          ?>
                                          <input name="dataschool65" class="form-check-input" type="checkbox" value="4" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck2">
                                            Tidak Memilih Program
                                          </label>
                                        </div>
                                      </div>
                                      
                  
                  
                                    
                                    <div class="bg-white rounded-3 form-group mb-4">
                                      <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Alasan memilih "Fasilitas dan Pelayanan" ?</label>
                                      </div>
                                      <div class="form-check mb-2">
                                        <?php
                                            $array= array_column($file_additionalsatu, 'data66');
                                            if ($array != '' && $array != null) {
                                              $result = $array;
                                            } else {
                                              $result = '';
                                            }
                                        ?>
                                        <input name="data66" class="form-check-input" type="checkbox" value="1" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck1">
                                          Fasilitas Sekolah lengkap
                                        </label>
                                      </div>
                                      <div class="form-check mb-2">
                                        <?php
                                              $array= array_column($file_additionalsatu, 'data67');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                        ?>
                                        <input name="data67" class="form-check-input" type="checkbox" value="2" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck2">
                                          Kebersihan Gedung Sekolah
                                        </label>
                                      </div>
                                      <div class="form-check mb-2">
                                        <?php
                                              $array= array_column($file_additionalsatu, 'data68');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                        ?>
                                        <input name="data68" class="form-check-input" type="checkbox" value="3" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck2">
                                         Pelayanan baik penyampaian informasi cukup jelas
                                        </label>
                                      </div>
                  
                                      <div class="form-check mb-2">
                                        <?php
                                              $array= array_column($file_additionalsatu, 'data69');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                        ?>
                                        <input name="data69" class="form-check-input" type="checkbox" value="4" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck2">
                                          Tenaga pendidik yang Berkompeten & Profesional
                                        </label>
                                      </div>
                  
                                      <div class="form-check mb-2">
                                        <?php
                                              $array= array_column($file_additionalsatu, 'data70');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                        ?>
                                        <input name="data70" class="form-check-input" type="checkbox" value="4" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck2">
                                          Tidak Memilih Fasilitas & Pelayanan
                                        </label>
                                      </div>
                                    </div>
                                    
                  
                  
                                       
                                       <div class="bg-white rounded-3 form-group mb-4">
                                        <div class="mb-3">
                                              <label for="exampleFormControlSelect1">Alasan memilih Jarak ?</label>
                                        </div>
                                        <div class="form-check mb-2">
                                          <?php
                                              $array= array_column($file_additionalsatu, 'data71');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                          ?>
                                          <input name="data71" class="form-check-input" type="checkbox" value="1" id="defaultdata71" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck1">
                                            < 1Km dari tempat tinggal
                                          </label>
                                        </div>
                                        <div class="form-check mb-2">
                                          <?php
                                                $array= array_column($file_additionalsatu, 'data72');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }
                                          ?>
                                          <input name="data72" class="form-check-input" type="checkbox" value="2" id="defaultdata72" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck2">
                                            1 - 5 Km dari tempat tinggal
                                          </label>
                                        </div>
                                        <div class="form-check mb-2">
                                          <?php
                                                $array= array_column($file_additionalsatu, 'data73');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }
                                          ?>
                                          <input name="data73" class="form-check-input" type="checkbox" value="3" id="defaultdata73" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck3">
                                           6 - 10 Km dari tempat Tinggal
                                          </label>
                                        </div>
                  
                                        <div class="form-check mb-2">
                                          <?php
                                                $array= array_column($file_additionalsatu, 'data74');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }
                                          ?>
                                          <input name="data74" class="form-check-input" type="checkbox" value="4" id="defaultdata74" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck4">
                                            11 - 20 Km dan tempat tinggal
                                          </label>
                                        </div>
                  
                                        <div class="form-check mb-2">
                                          <?php
                                                $array= array_column($file_additionalsatu, 'data75');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }
                                          ?>
                                          <input name="data75" class="form-check-input" type="checkbox" value="5" id="defaultdata75" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck5">
                                            21 - 30 Km dari tempat tinggal
                                          </label>
                                        </div>
                  
                  
                                        <div class="form-check mb-2">
                                          <?php
                                                $array= array_column($file_additionalsatu, 'data76');
                                                if ($array != '' && $array != null) {
                                                  $result = $array;
                                                } else {
                                                  $result = '';
                                                }
                                          ?>
                                          <input name="data76" class="form-check-input" type="checkbox" value="6" id="defaultdata76" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                          <label class="form-check-label" for="defaultCheck6">
                                            Tidak memilih 'Jarak'
                                          </label>
                                        </div>
                                      </div>
                                      
                  
                                    
                                    <div class="bg-white rounded-3 form-group mb-4">
                                      <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Alasan memilih uang Sekolah Terjangkau ?</label>
                                      </div>
                                      <div class="form-check mb-2">
                                        <?php
                                            $array= array_column($file_additionalsatu, 'data77');
                                            if ($array != '' && $array != null) {
                                              $result = $array;
                                            } else {
                                              $result = '';
                                            }
                                        ?>
                                        <input name="data77" class="form-check-input" type="checkbox" value="1" id="defaultCheck1" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck1">
                                          Uang Pangkal
                                        </label>
                                      </div>
                                      <div class="form-check mb-2">
                                        <?php
                                              $array= array_column($file_additionalsatu, 'data78');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                        ?>
                                        <input name="data78" class="form-check-input" type="checkbox" value="2" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck2">
                                          SPP
                                        </label>
                                      </div>
                                      <div class="form-check mb-2">
                                        <?php
                                              $array= array_column($file_additionalsatu, 'data79');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                        ?>
                                        <input name="data79" class="form-check-input" type="checkbox" value="3" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck2">
                                        Tanda Adanya biaya Tambahan
                                        </label>
                                      </div>
                  
                                      <div class="form-check mb-2">
                                        <?php
                                              $array= array_column($file_additionalsatu, 'data80');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                        ?>
                                        <input name="data80" class="form-check-input" type="checkbox" value="4" id="defaultCheck2" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck2">
                                          Tidak Memiliki Uang Sekolah Terjangkau
                                        </label>
                                      </div>
                                    </div>
                                    
                  
                                    
                                    <div class="bg-white rounded-3 form-group mb-4">
                                      <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Bagaimana Prosedur penerima PPDB sekolah Avicenna ?</label>
                                      </div>
                                      <div class="form-check mb-2">
                                        <?php
                                            $array= array_column($file_additionalsatu, 'data81');
                                            if ($array != '' && $array != null) {
                                              $result = $array;
                                            } else {
                                              $result = '';
                                            }
                                        ?>
                                        <input name="data81" class="form-check-input" type="checkbox" value="1" id="defaultdata81" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck1">
                                          Sederhana dan Mudah
                                        </label>
                                      </div>
                                      <div class="form-check mb-2">
                                        <?php
                                              $array= array_column($file_additionalsatu, 'data82');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                        ?>
                                        <input name="data82" class="form-check-input" type="checkbox" value="2" id="defaultdata82" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck2">
                                          Standar seperti disekolah lain
                                        </label>
                                      </div>
                                      <div class="form-check mb-2">
                                        <?php
                                              $array= array_column($file_additionalsatu, 'data83');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                        ?>
                                        <input name="data83" class="form-check-input" type="checkbox" value="3" id="defaultdata83" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck2">
                                        Berbelit belit dan perlu disederhanakan
                                        </label>
                                      </div>
                  
                                      <div class="form-check mb-2">
                                        <?php
                                              $array= array_column($file_additionalsatu, 'data84');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                        ?>
                                        <input name="data84" class="form-check-input" type="checkbox" value="4" id="defaultdata84" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck3">
                                          Tidak Memiliki Uang Sekolah Terjangkau
                                        </label>
                                      </div>
                  
                                      <div class="form-check mb-2">
                                        <?php
                                              $array= array_column($file_additionalsatu, 'data85');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                        ?>
                                        <input name="data85" class="form-check-input" type="checkbox" value="5" id="defaultdata85" <?php echo e(($result =='' && $result == null) ? '' : 'checked'); ?>>
                                        <label class="form-check-label" for="defaultCheck4">
                                          Merepotkan
                                        </label>
                                      </div>
                                    </div>
                  
                  
                                      
                                      <div class="form-group mb-4">
                                        <?php
                                              $array= array_column($file_additionalsatu, 'data86');
                                              if ($array != '' && $array != null) {
                                                $result = $array;
                                              } else {
                                                $result = '';
                                              }
                                           ?>
                                        <label for="exampleFormControlInput1">Pendapat Saya</label>
                                        <input name="data86" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="<?php echo e(!empty($result[0]) ? $result[0] :  $result); ?>">
                                      </div>
                                      
                  
                  
                           
                  
                  
                  
                                  </div>
                                                             
                                    </div>
                                </div>
                            </div>
                            

                            
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div><!-- row -->
</div><!-- row -->
<?php $__env->stopSection(); ?>



<?php $__env->startPush('after-scripts'); ?>

@section('pagescript')
<input type="hidden" name="URI_UPLOAD_IMAGE" value="{{ route('admin.interview.upload') }}" />
<input type="hidden" name="URI_INTERVIEW_LIST" value="{{ route('admin.interview.index') }}" />
<input type="hidden" name="URI_INTERVIEW_STORE" value="{{ route('admin.interview.store') }}" />

<script>
    var result_interview = <?php echo json_encode($result_interview); ?>;

    var URI_UPLOAD_IMAGE = $('input[name="URI_UPLOAD_IMAGE"]').val();
    var URI_INTERVIEW_LIST = $('input[name="URI_INTERVIEW_LIST"]').val();
    var URI_INTERVIEW_STORE = $('input[name="URI_INTERVIEW_STORE"]').val();
</script>

<script src="{{ asset('assets/js/pages/admin/interview.form.js') }}?v=1.0.0"></script>
<script src="{{ asset('assets/js/pages/admin/master.form.js') }}?v=1.0.0"></script>
@stop

@endpush


<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ppdb\resources\views/backend/ppdb/edit.blade.php ENDPATH**/ ?>