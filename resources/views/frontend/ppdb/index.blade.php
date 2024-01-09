@extends('frontend.layouts.ppdb')
@section('title', app_name() . ' | ' . 'PPDB Registration')



@section('content')

<!--begin::Row-->
<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
  <div class="col-xl-12 p-0">

    @if(!empty($registration_schedule))
    <div class="card bg-light card-xl-stretch mb-xl-8">
      <!--begin::Card body-->
      <div class="card-body p-0">
        <!--begin::Stepper-->
        <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_create_account_stepper">

          <!--begin::Aside-->
          <div class="card d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px me-9 mb-5">
            <!--begin::Wrapper-->
            <div class="card-body px-6 px-lg-10 px-xxl-15 py-20">
              <!--begin::Nav-->
              <div class="stepper-nav">
                <!--begin::Step 1-->
                <div class="stepper-item current" data-kt-stepper-element="nav">
                  <!--begin::Wrapper-->
                  <div class="stepper-wrapper">
                    <!--begin::Icon-->
                    <div class="stepper-icon w-40px h-40px">
                      <i class="stepper-check fas fa-check"></i>
                      <span class="stepper-number">1</span>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Label-->
                    <div class="stepper-label">
                      <h3 class="stepper-title">Pendaftaran Akun</h3>
                      <div class="stepper-desc fw-semibold">Siapkan Detail Akun Anda</div>
                    </div>
                    <!--end::Label-->
                  </div>
                  <!--end::Wrapper-->
                  <!--begin::Line-->
                  <div class="stepper-line h-40px"></div>
                  <!--end::Line-->
                </div>
                <!--end::Step 1-->
                <!--begin::Step 2-->
                <div class="stepper-item" data-kt-stepper-element="nav">
                  <div class="stepper-wrapper">
                    <!--begin::Icon-->
                    <div class="stepper-icon w-40px h-40px">
                      <i class="stepper-check fas fa-check"></i>
                      <span class="stepper-number">2</span>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Label-->
                    <div class="stepper-label">
                      <h3 class="stepper-title">Sekolah Tujuan</h3>
                      <div class="stepper-desc fw-bold">Tentukan Tujuan Sekolah</div>
                    </div>
                    <!--end::Label-->
                  </div>
                  <!--begin::Line-->
                  <div class="stepper-line h-40px"></div>
                  <!--end::Line-->
                </div>
                <!--end::Step 2-->
                <!--begin::Step 3-->
                <div class="stepper-item" data-kt-stepper-element="nav">
                  <div class="stepper-wrapper">
                    <!--begin::Icon-->
                    <div class="stepper-icon w-40px h-40px">
                      <i class="stepper-check fas fa-check"></i>
                      <span class="stepper-number">3</span>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Label-->
                    <div class="stepper-label">
                      <h3 class="stepper-title">Biodata Calon Siswa</h3>
                      <div class="stepper-desc fw-bold">Lengkapi Data Calon Siswa</div>
                    </div>
                    <!--end::Label-->
                  </div>
                  <!--begin::Line-->
                  <div class="stepper-line h-40px"></div>
                  <!--end::Line-->
                </div>
                <!--end::Step 3-->
                 <!--begin::Step 4-->
                 <div class="stepper-item" data-kt-stepper-element="nav">
                  <!--begin::Wrapper-->
                  <div class="stepper-wrapper">
                    <!--begin::Icon-->
                    <div class="stepper-icon w-40px h-40px">
                      <i class="stepper-check fas fa-check"></i>
                      <span class="stepper-number">4</span>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Label-->
                    <div class="stepper-label">
                      <h3 class="stepper-title">Biodata Orang Tua</h3>
                      <div class="stepper-desc fw-semibold">Lengkapi Data Orang Tua</div>
                    </div>
                    <!--end::Label-->
                  </div>
                  <!--end::Wrapper-->
                  <!--begin::Line-->
                  <div class="stepper-line h-40px"></div>
                  <!--end::Line-->
                </div>
                <!--begin::Step 4-->
                <!--begin::Step 5-->
                <div class="stepper-item" data-kt-stepper-element="nav">
                  <div class="stepper-wrapper">
                    <!--begin::Icon-->
                    <div class="stepper-icon w-40px h-40px">
                      <i class="stepper-check fas fa-check"></i>
                      <span class="stepper-number">5</span>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Label-->
                    <div class="stepper-label">
                      <h3 class="stepper-title">Unggah Dokumen</h3>
                      <div class="stepper-desc fw-bold">Lengkapi Dokumen yang dibutuhkan</div>
                    </div>
                    <!--end::Label-->
                  </div>
                  <!--begin::Line-->
                  <div class="stepper-line h-40px"></div>
                  <!--end::Line-->
                </div>
                <!--end::Step 5-->
                <!--begin::Step 5-->
                <div class="stepper-item" data-kt-stepper-element="nav">
                  <div class="stepper-wrapper">
                    <!--begin::Icon-->
                    <div class="stepper-icon w-40px h-40px">
                      <i class="stepper-check fas fa-check"></i>
                      <span class="stepper-number">6</span>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Label-->
                    <div class="stepper-label">
                      <h3 class="stepper-title">Selesai</h3>
                      <div class="stepper-desc fw-bold">Data Selesai Dilengkapi</div>
                    </div>
                    <!--end::Label-->
                  </div>
                  <!--begin::Line-->
                  <div class="stepper-line h-40px"></div>
                  <!--end::Line-->
                </div>
                <!--end::Step 5-->
              </div>
              <!--end::Nav-->
            </div>
            <!--end::Wrapper-->
          </div>
          <!--begin::Aside-->

          <!--begin::Content-->
          <div id="ppdb-register-container" class="card d-flex flex-row-fluid flex-center mb-5">
            <!--begin::Form-->
            <form id="kt_create_account_form" action="{{ route('frontend.ppdb.store') }}" class="card-body py-20 w-200 w-xl-900px px-9 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
              <!--begin::Step 1-->
              <div class="current" data-kt-stepper-element="content">


                <!--begin::Wrapper-->
                <div class="w-100">

                  <!--begin::Heading-->
                  <div class="pb-10 pb-lg-15">
                    <!--begin::Title-->
                    <h2 class="fw-bolder d-flex align-items-center text-dark">Pendaftaran Peserta Didik Baru
                      <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Berikut Data yang dibutuhkan untuk pembuatan akun"></i>
                    </h2>
                    <!--end::Title-->
                    <!--begin::Notice-->
                    <div class="text-muted fw-bold fs-6">{{ $registration_schedule->description }}. Jika Anda membutuhkan info lebih lanjut, silakan periksa
                      <a href="#" class="link-primary fw-bolder">Halaman Bantuan</a>.
                    </div>
                    <!--end::Notice-->
                  </div>
                  <!--end::Heading-->

                  @guest

                  <!--begin::Input group-->
                  <div class="row fv-row mb-7">
                    <!--begin::Col-->
                    <div class="col-xl-6">
                      <label class="form-label fw-bolder text-dark fs-6">Nama Depan Orang Tua</label>
                      <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="first_name" autocomplete="off" />
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-6">
                      <label class="form-label fw-bolder text-dark fs-6">Nama Belakang Orang Tua</label>
                      <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="last_name" autocomplete="off" />
                    </div>
                    <!--end::Col-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="fv-row mb-7">
                    <label class="form-label fw-bolder text-dark fs-6">Nomor Handphone (Whatsapp)</label>
                    <input class="form-control form-control-lg form-control-solid" type="number" placeholder="Masukan nomor handphone" name="phone" autocomplete="off" />
                  </div>
                  <!--end::Input group-->


                  <!--begin::Input group-->
                  <div class="fv-row mb-7">
                    <label class="form-label fw-bolder text-dark fs-6">Email</label>
                    <input class="form-control form-control-lg form-control-solid" type="email" placeholder="Masukan email" name="email" autocomplete="off" />
                  </div>
                  <!--end::Input group-->

                  <!--begin::Input group-->
                  <div class="mb-10 fv-row" data-kt-password-meter="true">
                    <!--begin::Wrapper-->
                    <div class="mb-1">
                      <!--begin::Label-->
                      <label class="form-label fw-bolder text-dark fs-6">Kata Sandi</label>
                      <!--end::Label-->
                      <!--begin::Input wrapper-->
                      <div class="position-relative mb-3">
                        <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                          <i class="bi bi-eye-slash fs-2"></i>
                          <i class="bi bi-eye fs-2 d-none"></i>
                        </span>
                      </div>
                      <!--end::Input wrapper-->
                      <!--begin::Meter-->
                      <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                      </div>
                      <!--end::Meter-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Hint-->
                    <div class="text-muted">Gunakan 8 karakter atau lebih dengan campuran huruf, angka &amp; simbol.</div>
                    <!--end::Hint-->
                  </div>
                  <!--end::Input group=-->

                  <!--begin::Input group-->
                  <div class="fv-row mb-5">
                    <label class="form-label fw-bolder text-dark fs-6">Konfirmasi Kata Sandi</label>
                    <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm-password" autocomplete="off" />
                  </div>
                  <!--end::Input group-->
                  @else

                  <div class="row fv-row mb-7">
                      <h1>Anda Sudah Mendaftar</h1>
                  </div>
                  {{-- 
                  <!--begin::Input group-->
                  <div class="row fv-row mb-7">
                    <!--begin::Col-->
                    <div class="col-xl-6">
                      <label class="form-label fw-bolder text-dark fs-6">Nama Depan Orang Tua</label>
                      <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="first_name" autocomplete="off" value="{{ $logged_in_user->first_name }}" readonly />
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-6">
                      <label class="form-label fw-bolder text-dark fs-6">Nama Belakang Orang Tua</label>
                      <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="last_name" autocomplete="off" value="{{ $logged_in_user->last_name }}" readonly />
                    </div>
                    <!--end::Col-->
                  </div>
                  <!--end::Input group-->


                  <!--begin::Input group-->
                  <div class="fv-row mb-7">
                    <label class="form-label fw-bolder text-dark fs-6">Nomor Handphone (Whatsapp)</label>
                    <input class="form-control form-control-lg form-control-solid" type="number" placeholder="Masukan nomor handphone" name="phone" autocomplete="off" value="{{ $logged_in_user->phone }}" readonly />
                  </div>
                  <!--end::Input group-->


                  <!--begin::Input group-->
                  <div class="fv-row mb-7">
                    <label class="form-label fw-bolder text-dark fs-6">Email</label>
                    <input class="form-control form-control-lg form-control-solid" type="email" placeholder="Masukan email" name="email" autocomplete="off" value="{{ $logged_in_user->email }}" readonly />
                  </div>
                  <!--end::Input group--> --}}

                  @endguest

                  <!--begin::Input group-->
                  <div class="border-top mt-15 border border-primary p-5 border-2 rounded">
                    <div class="d-flex w-lg-100">
                      <!--begin::Label-->
                      <label class="form-check form-switch form-check-custom form-check-solid w-70px">
                        <input id="is-employee-medco" class="form-check-input" type="checkbox" value="true">
                      </label>
                      <div class="me-5">
                        <label class="fs-6 fw-semibold form-label">Jika Pendaftar Merupakan Karyawan Medco Group</label>
                        <div class="fs-7 fw-semibold text-muted">Dibutuhkan surat keterangan dari tempat bekerja</div>
                      </div>
                      <!--end::Label-->
                    </div>

                    <div id="box-employee-medco" class="d-none mt-10">
                      <div class="fv-row mb-7 fv-plugins-icon-container">
                        <label class="required form-label fw-bold text-dark fs-6">Tempat Bekerja &amp; Nama Posisi</label>
                        <input name="medco_employee" class="form-control form-control-lg form-control-solid" type="text" placeholder="Keterangan Pekerjaan" name="phone" autocomplete="off">
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                      </div>
                      <div class="fv-row mb-7 fv-plugins-icon-container">
                        <div class="col-md-6 fv-row mb-10">
                          <!--begin::Label-->
                          <label class="required fs-6 fw-bold form-label mb-2">Surat Keterangan Dari Tempat Bekerja</label>
                          <!--end::Label-->



                          <!--begin::Row-->
                          <div class="row fv-row fv-plugins-icon-container">
                            <!--begin::Col-->
                            <div class="col-12">

                              <!--begin::Image input-->
                              <div class="input-group mb-5" style="display: none;">
                                <input type="text" class="form-control" value="nama file" readonly="">
                                <button type="button" class="btn-remove-file input-group-text btn-danger">
                                  <i class="fas fa-trash fs-4 text-danger"></i>
                                </button>
                              </div>
                              <input type="file" class="form-control-file" name="medco_employee_file_input" data-image="medco_employee_file" accept="application/pdf, image/*" style="display: none;">
                              <input type="hidden" name="medco_employee_file">
                              <!--end::Image input-->

                              <!--begin::Dropzone-->
                              <div class="btn-upload-file dropzone">
                                <!--begin::Message-->
                                <div class="dz-message needsclick">
                                  <!--begin::Icon-->
                                  <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                  <!--end::Icon-->

                                  <!--begin::Info-->
                                  <div class="ms-4">
                                    <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Click to upload.</h3>
                                    <span class="fs-7 fw-bold text-gray-400">Upload file</span>
                                  </div>
                                  <!--end::Info-->
                                </div>
                              </div>
                              <!--end::Dropzone-->
                              <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Col-->
                          </div>
                          <!--end::Row-->
                        </div>

                      </div>
                    </div>

                  </div>
                  <!--end::Input group-->



                </div>
                <!--end::Wrapper-->
              </div>
              <!--end::Step 1-->

              <!--begin::Step 2-->
              <div data-kt-stepper-element="content">
                <!--begin::Wrapper-->
                <div class="w-100">
                  <!--begin::Heading-->
                  <div class="pb-10 pb-lg-15">
                    <!--begin::Title-->
                    <h2 class="fw-bolder text-dark">Pilih Sekolah Tujuan</h2>
                    <!--end::Title-->
                    <!--begin::Notice-->
                    <div class="text-muted fw-bold fs-6">Jika Anda membutuhkan info lebih lanjut, silakan periksa
                      <a href="#" class="link-primary fw-bolder">Halaman Bantuan</a>.
                    </div>
                    <!--end::Notice-->
                  </div>
                  <!--end::Heading-->

                  <!--begin::Input group-->
                  <div class="mb-10 fv-row" id="school_site">
                    <input type="hidden" name="school_site" />
                    <!--begin::Row-->
                    <div class="row">

                      @foreach ($schools as $school)
                      <div class="col-lg-4">
                        <a href="#kt_create_account_stepper" class="box-school" data-site="{{ $school->school_code }}">
                          <img src="{{ asset("$school->school_image") }}" class="img-fluid" alt="...">
                          <h1>{{ $school->school_name }}</h1>
                        </a>
                      </div>
                      @endforeach

                    </div>
                    <!--end::Row-->
                  </div>
                  <!--end::Input group-->


                  <div class="mb-10 fv-row min-h-100px">

                    <label class="d-flex align-items-center form-label mb-3">Pilih Jenjang</label>

                    <!--begin::Row-->
                    <div id="school-stage" class="row mb-2" data-kt-buttons="true" style="display: none;">

                    </div>

                    <div id="school-stage-default" class="col">
                      <label class="btn btn-outline btn-outline-dashed btn-outline-default w-100 p-4">
                        <input type="radio" class="btn-check" name="stage-option" value="" disabled>
                        <span class="fw-bolder fs-3">Pilih Sekolah Dahulu</span>
                      </label>
                    </div>
                    <!--end::Row-->
                  </div>


                  <div class="mb-10 fv-row">
                    <input type="hidden" name="stage" />
                  </div>



                  <!--begin::Input group-->
                  <div id="school-grade" class="row mb-10 fv-row">

                    <!--begin::Col-->
                    <div class="col-md-6">
                      <!--begin::Label-->
                      <label class="required fs-6 fw-bold form-label mb-2">Kelas</label>
                      <!--end::Label-->
                      <!--begin::Row-->
                      <div class="row">
                        <!--begin::Col-->
                        <div class="col-12">
                          <select name="grade" class="form-select form-select-solid">
                            <option></option>
                          </select>
                        </div>
                        <!--end::Col-->
                      </div>
                      <!--end::Row-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-md-6">
                      <!--begin::Label-->
                      <label class="required fs-6 fw-bold form-label mb-2">Status Siswa</label>
                      <!--end::Label-->
                      <!--begin::Row-->
                      <div class="row">
                        <!--begin::Col-->
                        <div class="col-12">
                          <select name="student_status" class="form-select form-select-solid">
                            <option selected value="">Pilih Status</option>
                            <option value="Peserta Didik Baru">Peserta Didik Baru</option>
                            <option value="Peserta Didik Pindahan">Peserta Didik Pindahan</option>
                          </select>
                        </div>
                        <!--end::Col-->
                      </div>
                      <!--end::Row-->
                    </div>
                    <!--end::Col-->
                  </div>
                  <!--end::Input group-->

                </div>
                <!--end::Wrapper-->
              </div>
              <!--end::Step 2-->

              <!--begin::Step 3-->
              <div data-kt-stepper-element="content">
                <!--begin::Wrapper-->
                <div class="w-100">
                  <!--begin::Heading-->
                  <div class="pb-10 pb-lg-12">
                    <!--begin::Title-->
                    <h2 class="fw-bolder text-dark">Biodata Calon Siswa</h2>
                    <!--end::Title-->
                    <!--begin::Notice-->
                    <div class="text-muted fw-bold fs-6">Jika Anda membutuhkan info lebih lanjut, silakan periksa
                      <a href="#" class="link-primary fw-bolder">Halaman Bantuan</a>.
                    </div>
                    <!--end::Notice-->
                  </div>
                  <!--end::Heading-->


                  <!-- BEGIN :: BIODATA SISWA -->
                  <div class="row mb-10">
                    <!--begin::Col-->
                    <div class="col-md-8 fv-row">
                      <!--begin::Label-->
                      <label class="required fs-6 fw-bold form-label mb-2">Nama Calon Siswa</label>
                      <!--end::Label-->
                      <!--begin::Row-->
                      <div class="row fv-row">
                        <!--begin::Col-->
                        <div class="col-12">
                          <input type="text" class="form-control" name="fullname">
                        </div>
                        <!--end::Col-->
                      </div>
                      <!--end::Row-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-md-4 fv-row">
                      <!--begin::Label-->
                      <label class="required fs-6 fw-bold form-label mb-2">Jenis Kelamin</label>
                      <!--end::Label-->
                      <!--begin::Row-->
                      <div class="row fv-row">
                        <!--begin::Col-->
                        <div class="col-12">
                          <select class="form-select" name="gender" required="required">
                            <option value="">Pilih</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
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
                      <label class="required fs-6 fw-bold form-label mb-2">Tempat Lahir</label>
                      <!--end::Label-->
                      <!--begin::Row-->
                      <div class="row fv-row">
                        <!--begin::Col-->
                        <div class="col-12">
                          <input type="text" class="form-control" name="place_of_birth">
                        </div>
                        <!--end::Col-->
                      </div>
                      <!--end::Row-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-md-3 fv-row">
                      <!--begin::Label-->
                      <label class="required fs-6 fw-bold form-label mb-2">Tanggal Lahir</label>
                      <!--end::Label-->
                      <!--begin::Row-->
                      <div class="row fv-row">
                        <!--begin::Col-->
                        <div class="col-12">
                          <input type="text" class="form-control" name="date_of_birth">
                        </div>
                        <!--end::Col-->
                      </div>
                      <!--end::Row-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-md-3 fv-row">
                      <!--begin::Label-->
                      <label class="required fs-6 fw-bold form-label mb-2">Agama</label>
                      <!--end::Label-->
                      <!--begin::Row-->
                      <div class="row fv-row">
                        <!--begin::Col-->
                        <div class="col-12">
                          <select class="form-select" name="religion" required="required">
                            <option value="">Pilih</option>
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="katolik">Katolik</option>
                            <option value="hindu">Hindu</option>
                            <option value="budha">Budha</option>
                          </select>
                        </div>
                        <!--end::Col-->
                      </div>
                      <!--end::Row-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-md-3 fv-row">
                      <!--begin::Label-->
                      <label class="required fs-6 fw-bold form-label mb-2">Kebangsaan</label>
                      <!--end::Label-->
                      <!--begin::Row-->
                      <div class="row fv-row">
                        <!--begin::Col-->
                        <div class="col-12">
                          <select name="nationality" class="form-select">
                            <option value="">Pilih</option>
                            <option value="WNI">Warga Negara Indonesia</option>
                            <option value="WNA">Warga Negara Asing</option>
                            <option value="OTHER">Lainnya</option>
                          </select>
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
                      <label class="required fs-6 fw-bold form-label mb-2">Alamat</label>
                      <!--end::Label-->
                      <!--begin::Row-->
                      <div class="row fv-row">
                        <!--begin::Col-->
                        <div class="col-12">
                          <textarea name="address" class="form-control" rows="5" required="required"></textarea>
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
                          <input type="text" class="form-control" name="home_phone">
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
                      <label class="required fs-6 fw-bold form-label mb-2">Asal Sekolah</label>
                      <!--end::Label-->
                      <!--begin::Row-->
                      <div class="row fv-row">
                        <!--begin::Col-->
                        <div class="col-12">
                          <input type="text" class="form-control" name="school_origin">
                        </div>
                        <!--end::Col-->
                      </div>
                      <!--end::Row-->
                    </div>
                    <!--begin::Col-->
                    <div class="col-md-3 fv-row">
                      <!--begin::Label-->
                      <label class="required fs-6 fw-bold form-label mb-2">Status Siswa</label>
                      <!--end::Label-->
                      <!--begin::Row-->
                      <div class="row fv-row">
                        <!--begin::Col-->
                        <div class="col-12">
                          <select name="status_siswa" class="form-select" required>
                            <option value="">Pilih</option>
                            <option value="Siswa Luar">Siswa Luar Avicenna</option>
                            <option value="Siswa Dalam">Siswa Dalam Avicenna</option>
                          </select>
                        </div>
                        <!--end::Col-->
                      </div>
                      <!--end::Row-->
                    </div>
                    <!--end::Col-->
                    <!--end::Col-->
                  </div>

                  <!-- END :: BIODATA SISWA -->



                </div>
                <!--end::Wrapper-->
              </div>
              <!--end::Step 3-->

                    
               <!--begin::Step 4-->
               <div data-kt-stepper-element="content">
                <!--begin::Wrapper-->
                <div class="w-100">
                 
                  <div id="school-grade" class="row mb-10 fv-row">
                    <div class="col-md-6">
                      <!--begin::Input group-->
                      <div class=" mb-5">
                        <label class="required form-label fw-bolder text-dark fs-6">Nama Ayah</label>
                        <input name="name_father" class="form-control form-control-lg form-control-solid" type="text" autocomplete="off"/>
                      </div>
                      <!--end::Input group-->
                    </div>
                    <div class="col-md-6">
                      <!--begin::Input group-->
                      <div class=" mb-5">
                        <label class="required form-label fw-bolder text-dark fs-6">Nama Ibu</label>
                        <input name="name_mother" class="form-control form-control-lg form-control-solid" type="text" autocomplete="off"  />
                      </div>
                      <!--end::Input group-->
                    </div>
                  </div>

                  <div id="school-grade" class="row mb-10 fv-row">

                    <div class="col-md-6">
                      <!--begin::Input group-->
                      <div class=" mb-5">
                        <label class="required form-label fw-bolder text-dark fs-6">Pekerjaan Ayah</label>
                        <select name="name_work_father" class="form-select form-select-solid" value="">
                            <option value="" selected>Pilih Pekerjaan</option>
                            <option value="1">Badan Swasta</option>
                            <option value="2">Badan Pemerintahan</option>
                            <option value="3">Wirausaha</option>
                            <option value="4">Pensiunan</option>
                            <option value="5">Tidak Bekerja</option>
                        </select>
                      </div>
                      <!--end::Input group-->
                    </div>

                    <div class="col-md-6">
                      <!--begin::Input group-->
                      <div class=" mb-5">
                        <label class="required form-label fw-bolder text-dark fs-6">Pekerjaan Ibu</label>
                        <select name="name_work_mother" class="form-select form-select-solid" value="">
                            <option value="" selected>Pilih Pekerjaan</option>
                            <option value="1">Badan Swasta</option>
                            <option value="2">Badan Pemerintahan</option>
                            <option value="3">Wirausaha</option>
                            <option value="4">Pensiunan</option>
                            <option value="5">Ibu Rumah Tangga</option>
                        </select>
                      </div>
                      <!--end::Input group-->
                    </div>

                  </div>

                  <div id="school-grade" class="row mb-10 fv-row">
                    <div class="col-md-6">
                      <!--begin::Input group-->
                      <div class=" mb-5">
                        <label class="required form-label fw-bolder text-dark fs-6">Tempat Pekerjaan Ayah</label>
                        <input name="place_work_father" class="form-control form-control-lg form-control-solid" type="text"  />
                      </div>
                      <!--end::Input group-->
                    </div>
                    <div class="col-md-6">
                      <!--begin::Input group-->
                      <div class=" mb-5">
                        <label class="required form-label fw-bolder text-dark fs-6">Tempat Pekerjaan Ibu</label>
                        <input name="place_work_mother" class="form-control form-control-lg form-control-solid" type="text"  />
                      </div>
                      <!--end::Input group-->
                    </div>
                  </div>

                  <div id="school-grade" class="row mb-10 fv-row">
                    <div class="col-md-6">
                        <!--begin::Input group-->
                        <div class=" mb-5">
                          <label class="required form-label fw-bolder text-dark fs-6">Jabatan dalam pekerjaan Ayah</label>
                          <select name="title_work_father" class="form-select form-select-solid" value="">
                              <option value="" selected>Pilih Jabatan</option>
                              <option value="1">Staff (Tetap)</option>
                              <option value="2">Dosen/Guru (Tetap)</option>
                              <option value="3">Supervisor</option>
                              <option value="4">Manager</option>
                              <option value="5">Direksi</option>
                              <option value="6">Pegawai Honorer</option>
                              <option value="7">Pegawai Kontrak</option>
                              <option value="8">Lainnya</option>
                          </select>
                        </div>
                        <!--end::Input group-->
                    </div>
                    <div class="col-md-6">
                      <!--begin::Input group-->
                      <div class=" mb-5">
                        <label class="required form-label fw-bolder text-dark fs-6">Jabatan dalam pekerjaan Ibu</label>
                        <select name="title_work_mother" class="form-select form-select-solid" value="">
                            <option value="" selected>Pilih Jabatan</option>
                            <option value="1">Staff (Tetap)</option>
                            <option value="2">Dosen/Guru (Tetap)</option>
                            <option value="3">Supervisor</option>
                            <option value="4">Manager</option>
                            <option value="5">Direksi</option>
                            <option value="6">Pegawai Honorer</option>
                            <option value="7">Pegawai Kontrak</option>
                            <option value="8">Lainnya</option>
                        </select>
                      </div>
                      <!--end::Input group-->
                  </div>
                  </div>

                  <div id="school-grade" class="row mb-3 fv-row">
                    <div class="col-md-6">
                      <div class="row mb-5 fv-row">
                        <div class="col-md-6">
                          <!--begin::Input group-->
                          <div class="fv-row mb-5">
                            <label class="required form-label fw-bolder text-dark fs-6">Penghasilan Tetap</label>
                            <input class="form-control form-control-lg form-control-solid" type="number" value="0" placeholder="Nominal Tetap" name="gaji_tetap_ayah" autocomplete="off" />
                          </div>
                          <!--end::Input group-->
                        </div>
                        <div class="col-md-6">
                          <!--begin::Input group-->
                          <div class="fv-row mb-5">
                              <label class="required form-label fw-bolder text-dark fs-6">Penghasilan Tidak Tetap</label>
                              <select name="income_work_father" class="form-select form-select-solid" value=""  >
                                <option value="0" selected>Nominal Tidak Tetap</option>
                                <option value="1">Rp. 1.000.000 - 2.000.000</option>
                                <option value="2">Rp. 3.000.000 - 5.000.000</option>
                                <option value="3">Rp. 6.000.000 - 10.000.000</option>
                                <option value="4">Rp. 11.000.000 - 15.000.000</option>
                                <option value="5">> Rp. 20.000.000</option>
                              </select>
                          </div>
                          <!--end::Input group-->
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row mb-5 fv-row">
                        <div class="col-md-6">
                          <!--begin::Input group-->
                          <div class="fv-row mb-5">
                            <label class="required form-label fw-bolder text-dark fs-6">Penghasilan Tetap</label>
                            <input class="form-control form-control-lg form-control-solid" value="0" type="number" placeholder="Nominal Tetap" name="gaji_tetap_ibu" autocomplete="off" />
                          </div>
                          <!--end::Input group-->
                        </div>
                        <div class="col-md-6">
                          <!--begin::Input group-->
                          <div class="fv-row mb-5">
                            <label class="required form-label fw-bolder text-dark fs-6">Penghasilan Tidak Tetap</label>
                            <select name="income_work_mother" class="form-select form-select-solid" value=""  >
                              <option value="0" selected>Nominal Tidak Tetap</option>
                              <option value="1">Rp. 1.000.000 - 2.000.000</option>
                              <option value="2">Rp. 3.000.000 - 5.000.000</option>
                              <option value="3">Rp. 6.000.000 - 10.000.000</option>
                              <option value="4">Rp. 11.000.000 - 15.000.000</option>
                              <option value="5">> Rp. 20.000.000</option>
                            </select>
                          </div>
                          <!--end::Input group-->
                        </div>
                      </div>
                    </div>
                  </div>

                  <div id="school-grade" class="row mb-5 fv-row">
                    <div class="col-md-6">
                        <!--begin::Row-->
                        <label class="form-label fw-bolder text-dark fs-6">Slip Gaji Ayah</label>
                        <div class="row fv-row fv-plugins-icon-container">
                          <!--begin::Col-->
                          <div class="col-12">

                            <!--begin::Image input-->
                            <div class="input-group mb-5" style="display: none;">
                              <input type="text" class="form-control" value="nama file" readonly="">
                              <button type="button" class="btn-remove-file input-group-text btn-danger">
                                <i class="fas fa-trash fs-4 text-danger"></i>
                              </button>
                            </div>
                            <input type="file" class="form-control-file" name="medco_employee_file_input" data-image="medco_employee_file" accept="application/pdf, image/*" style="display: none;">
                            <input type="hidden" name="slip_gaji_father">
                            <!--end::Image input-->

                            <!--begin::Dropzone-->
                            <div class="btn-upload-file dropzone">
                              <!--begin::Message-->
                              <div class="dz-message needsclick">
                                <!--begin::Icon-->
                                <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                <!--end::Icon-->

                                <!--begin::Info-->
                                <div class="ms-4">
                                  <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Click to upload.</h3>
                                  <span class="fs-7 fw-bold text-gray-400">Upload file</span>
                                </div>
                                <!--end::Info-->
                              </div>
                            </div>
                            <!--end::Dropzone-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                          </div>
                          <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <div class="col-md-6">
                      <!--begin::Row-->
                      <label class="form-label fw-bolder text-dark fs-6">Slip Gaji Ibu</label>
                      <div class="row fv-row fv-plugins-icon-container">
                        <!--begin::Col-->
                        <div class="col-12">

                          <!--begin::Image input-->
                          <div class="input-group mb-5" style="display: none;">
                            <input type="text" class="form-control" value="nama file" readonly="">
                            <button type="button" class="btn-remove-file input-group-text btn-danger">
                              <i class="fas fa-trash fs-4 text-danger"></i>
                            </button>
                          </div>
                          <input type="file" class="form-control-file" name="medco_employee_file_input" data-image="medco_employee_file" accept="application/pdf, image/*" style="display: none;">
                          <input type="hidden" name="slip_gaji_mother">
                          <!--end::Image input-->

                          <!--begin::Dropzone-->
                          <div class="btn-upload-file dropzone">
                            <!--begin::Message-->
                            <div class="dz-message needsclick">
                              <!--begin::Icon-->
                              <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                              <!--end::Icon-->

                              <!--begin::Info-->
                              <div class="ms-4">
                                <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Click to upload.</h3>
                                <span class="fs-7 fw-bold text-gray-400">Upload file</span>
                              </div>
                              <!--end::Info-->
                            </div>
                          </div>
                          <!--end::Dropzone-->
                          <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Col-->
                      </div>
                      <!--end::Row-->
                  </div>
                  </div>
                </div>
                <!--begin::Wrapper-->
              </div>
            <!--begin::Step 4-->
             

              <!--begin::Step 5-->
              <div data-kt-stepper-element="content">
                <!--begin::Wrapper-->
                <div class="w-100">
                  <!--begin::Heading-->
                  <div class="pb-10 pb-lg-10">
                    <!--begin::Title-->
                    <h2 class="fw-bolder text-dark">Dokumen Pendukung</h2>
                    <!--end::Title-->
                    <!--begin::Notice-->
                    <div class="text-muted fw-bold fs-6">Jika Anda membutuhkan info lebih lanjut, silakan periksa
                      <a href="#" class="link-primary fw-bolder">Halaman Bantuan</a>.
                    </div>
                    <!--end::Notice-->
                  </div>
                  <!--end::Heading-->


                  <!--begin::Alert-->
                  <div class="alert alert-info d-flex align-items-center p-5 mb-10">
                    <!--begin::Icon-->
                    <span class="svg-icon svg-icon-2hx svg-icon-info me-4">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                        <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
                      </svg>
                    </span>
                    <!--end::Icon-->

                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column">
                      <!--begin::Title-->
                      <h4 class="mb-1 text-dark">Informasi Upload File</h4>
                      <!--end::Title-->
                      <!--begin::Content-->
                      <span>Mengunggah file dengan kapasitas maksimal 2 MB dengan format JPG, PNG, Image dan Pdf.</span>
                      <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                  </div>
                  <!--end::Alert-->

                  <!-- BEGIN :: DOCUMENT UPLOAD -->
                  <div id="upload-form-document" class="row mb-10">

                    @foreach ($file_uploaded as $file)

                    <!--begin::Col-->
                    <div class="col-md-4 fv-row mb-10">
                      <!--begin::Label-->
                      <label class="{{ ($file['name'] == 'family_card') || ($file['name'] == 'birth_certificate') ? 'required':'' }} fs-6 fw-bold form-label mb-2">{{ $file['label'] }}</label>
                      <!--end::Label-->

                      @if($file['name'] == "Buku KIA")
                      <br /><span class="fs-8">(Khusus Pendaftaran TK dan SD)</span>
                      @endif


                      <!--begin::Row-->
                      <div class="row fv-row">
                        <!--begin::Col-->
                        <div class="col-12">

                          <!--begin::Image input-->
                          <div class="input-group mb-5" style="display: none;">
                            <input type="text" class="form-control" value="nama file" readonly="">
                            <button type="button" class="btn-remove-file input-group-text btn-danger">
                              <i class="fas fa-trash fs-4 text-danger"></i>
                            </button>
                          </div>
                          <input type="file" class="form-control-file" name="{{ $file['name'] }}_input" data-image="{{ $file['name'] }}" accept="application/pdf, image/*" style="display: none;">
                          <input type="hidden" name="{{ $file['name'] }}" />
                          <!--end::Image input-->

                          <!--begin::Dropzone-->
                          <div class="btn-upload-file dropzone">
                            <!--begin::Message-->
                            <div class="dz-message needsclick">
                              <!--begin::Icon-->
                              <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                              <!--end::Icon-->

                              <!--begin::Info-->
                              <div class="ms-4">
                                <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Click to upload.</h3>
                                <span class="fs-7 fw-bold text-gray-400">Upload file</span>
                              </div>
                              <!--end::Info-->
                            </div>
                          </div>
                          <!--end::Dropzone-->
                        </div>
                        <!--end::Col-->
                      </div>
                      <!--end::Row-->
                    </div>
                    <!--end::Col-->
                    @endforeach

                  </div>

                  {{-- TESTING --}}
                  <!--begin::Label-->
                  <label class="family_card fs-2 fw-bold form-label mb-2">Document Prestasi</label>
                  <div class="text-muted fw-bold fs-6 mb-5">Jika calon siswa memiliki beberepa prestasi dapat dicantumkan dibawah ini</div>
                  <!--end::Label-->

                  {{-- @foreach ($file_additional as $file) --}}

                  <div class="row fv-row mb-7 border p-5">
                    {{-- firts column --}}
                    <div class="col-xl-5">
                      <label class="{{ $file['name'] == 'file_additional_satu' ? 'required':'' }}  fs-6 fw-bolder form-label text-dark mb-5">Prestasi</label>

                      @foreach ($file_deskripsi as $file)

                      <div class="input-group mb-3">
                        <input name="{{ $file['name']}}" type="text" class="form-control" placeholder="Contoh juara 1 olimpiade bahasa inggris, global youth action, jakarta" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        {{-- <div class="input-group-append">
                        </div> --}}
                      </div>

                      @endforeach
                    </div>
                    {{-- end column first --}}

                    {{-- second column --}}
                    <div class="col-xl-3">
                      <label class="fs-6 fw-bolder form-label text-dark mb-5">Tingkat</label>
                      @foreach ($file_tingkat as $file)

                      <div class="mb-3">
                        <select name="{{ $file['name']}}" class="form-select" aria-label=".form-select-lg example">
                          <option value="" selected>Tingkat</option>
                          <option value="Internasional">Internasional</option>
                          <option value="Nasional">Nasional</option>
                          <option value="Provinsi">Provinsi</option>
                          <option value="Kota/Kabupaten">Kota/Kabupaten</option>
                          <option value="Klub/Komunitas">Klub/Komunitas</option>
                        </select>
                      </div>

                      @endforeach
                    </div>
                    {{-- end column second --}}

                    {{-- thre column --}}
                    <div class="col-xl-4">
                      <label class="fs-6 fw-bolder form-label text-dark mb-5">Upload Piagam atau Photo Piala</label>
                      @foreach ($file_additional as $file)
                      <div class="mb-3">
                        @if($file['name'] == "File Additional Satu")
                        <br /><span class="fs-8">(Khusus Pendaftaran)</span>
                        @endif

                        <!--begin::Row-->
                        <div class="row fv-row">
                          <!--begin::Col-->
                          <div class="col-12">

                            <!--begin::Image input-->
                            <div class="input-group" style="display: none;">
                              <input type="text" class="form-control" value="nama file" readonly="">
                              <button type="button" class="btn-remove-file input-group-text btn-danger">
                                <i class="fas fa-trash fs-9 text-danger"></i>
                              </button>
                            </div>
                            <input type="file" class="form-control-file" name="{{ $file['name'] }}_input" data-image="{{ $file['name'] }}" accept="application/pdf, image/*" style="display: none;">
                            <input type="hidden" name="{{ $file['name'] }}" />
                            <!--end::Image input-->

                            <button type="button" class="btn-upload-file dropzone btn btn-light-primary border w-100">
                              <i class="bi bi-cloud-arrow-up-fill fs-4 me-2"></i>Upload File
                            </button>

                          </div>
                          <!--end::Col-->
                        </div>
                        <!--end::Row-->

                      </div>
                      @endforeach
                    </div>
                    {{-- end column thre --}}
                  </div>

                  {{-- TESTING --}}

                  <!-- END :: DOCUMENT UPLOAD -->
                  <div class="row mb-10">
                    <div class="col-md-12 fv-row">
                      <!--begin::Input group-->
                      <div class="d-flex flex-stack bg-light-dark p-5">
                        <!--begin::Label-->
                        <div class="me-5">
                          <label class="fs-6 fw-bold form-label">Periksa Syarat dan Ketentuan</label>
                          <div class="fs-7 fw-bold text-muted">Jika Anda membutuhkan info lebih lanjut, silakan hubungi admin PPDB</div>
                        </div>
                        <!--end::Label-->
                        <!--begin::Switch-->
                        <label class="bg-danger p-3 rounded border form-check form-switch form-check-custom form-check-solid pulse pulse-primary">
                          <input class="form-check-input" type="checkbox" value="1" name="toc" />
                          <span class="form-check-label fw-bold text-white">Setuju</span>
                          <span class="pulse-ring"></span>
                        </label>
                        <!--end::Switch-->
                      </div>
                      <!--end::Input group-->
                    </div>
                  </div>


                  <div class="row mb-5">
                    <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                      <!--begin::Table head-->
                      <thead>
                        <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                          <th class="p-0 pb-3 min-w-150px text-start">Admin PPDB Avicenna</th>
                          <th class="p-0 pb-3 min-w-100px text-end pe-13"></th>


                        </tr>
                      </thead>
                      <!--end::Table head-->
                      <!--begin::Table body-->
                      <tbody>
                        <tr>
                          <td>
                            <a href="https://api.whatsapp.com/send?phone=628111297881&text=" target="_blank" class="d-flex align-items-center">
                              <div class="symbol symbol-50px me-3">
                                <i class="bi bi-whatsapp text-success fs-3x"></i>
                              </div>
                              <div class="d-flex justify-content-start flex-column">
                                <div class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Sekolah Avicenna Jagakarsa</div>
                                <span class="text-gray-400 fw-semibold d-block fs-7">Admin Jagakarsa</span>
                              </div>
                            </a>
                          </td>
                          <td class="text-end">
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <a href="https://api.whatsapp.com/send?phone=628111507516&text=" target="_blank" class="d-flex align-items-center">
                              <div class="symbol symbol-50px me-3">
                                <i class="bi bi-whatsapp text-success fs-3x"></i>
                              </div>
                              <div class="d-flex justify-content-start flex-column">
                                <div class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Sekolah Avicenna Cinere</div>
                                <span class="text-gray-400 fw-semibold d-block fs-7">Admin Cinere</span>
                              </div>
                            </a>
                          </td>
                          <td class="text-end">
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <a href="https://api.whatsapp.com/send?phone=6281399390497&text=" target="_blank" class="d-flex align-items-center">
                              <div class="symbol symbol-50px me-3">
                                <i class="bi bi-whatsapp text-success fs-3x"></i>
                              </div>
                              <div class="d-flex justify-content-start flex-column">
                                <div class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Sekolah Avicenna Pamulang</div>
                                <span class="text-gray-400 fw-semibold d-block fs-7">Admin Pamulang</span>
                              </div>
                            </a>
                          </td>
                          <td class="text-end">
                          </td>
                        </tr>



                      </tbody>
                      <!--end::Table body-->
                    </table>
                  </div>



                </div>
                <!--end::Wrapper-->
              </div>
              <!--end::Step 5-->

              <!--begin::Step 6-->
              <div data-kt-stepper-element="content">
                <!--begin::Wrapper-->
                <div class="w-100">
                  <!--begin::Heading-->
                  <div class="pb-8 pb-lg-10">
                    <!--begin::Title-->
                    <h2 class="fw-bolder text-dark">Selamat, Anda Berhasil Mendaftar!</h2>
                    <!--end::Title-->
                    <!--begin::Notice-->
                    <div class="text-muted fw-bold fs-6">Jika Anda membutuhkan info lebih lanjut, silakan periksa
                      <a href="{{ url('login') }}" class="link-primary fw-bolder">Login</a>.
                    </div>
                    <!--end::Notice-->
                  </div>
                  <!--end::Heading-->
                  <!--begin::Body-->
                  <div class="mb-0">
                    <!--begin::Text-->
                    <div class="fs-6 text-gray-600 mb-5">
                      Periksa email anda atau pesan di whatsapp untuk melakukan konfirmasi pendaftaran & pembayaran.
                      Setelah itu anda dapat login kembali dan memeriksa status Pendaftaran Calon Siswa.
                    </div>
                    <!--end::Text-->
                    <!--begin::Alert-->
                    <!--begin::Notice-->
                    <div class="notice d-flex bg-light-success rounded border-success border border-dashed p-6">
                      <!--begin::Icon-->
                      <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                      <span class="svg-icon svg-icon-2tx svg-icon-success me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                          <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
                          <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
                        </svg>
                      </span>
                      <!--end::Svg Icon-->
                      <!--end::Icon-->
                      <!--begin::Wrapper-->
                      <div class="d-flex flex-stack flex-grow-1">
                        <!--begin::Content-->
                        <div class="fw-bold">
                          <h4 class="text-gray-900 fw-bolder">Perhatian!</h4>
                          <div class="fs-6 text-gray-700">Untuk memahami proses Penerimaan Peserta Didik Baru Sekolah Avicenna, anda dapat melihatnya lagi ke
                            <a href="#" target="_blank" class="fw-bolder">Halaman Bantuan Cara Pendaftaran</a>
                          </div>
                        </div>
                        <!--end::Content-->
                      </div>
                      <!--end::Wrapper-->
                    </div>
                    <!--end::Notice-->
                    <!--end::Alert-->
                  </div>
                  <!--end::Body-->
                </div>
                <!--end::Wrapper-->
              </div>
              <!--end::Step 6-->

              <!--begin::Actions-->
              <div data-kt-stepper-action="area" class="d-flex flex-stack pt-10">
                <!--begin::Wrapper-->
                <div class="mr-2">
                  <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                    <span class="svg-icon svg-icon-4 me-1">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
                        <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
                      </svg>
                    </span>
                    <!--end::Svg Icon-->Kembali
                  </button>
                </div>
                <!--end::Wrapper-->
                <!--begin::Wrapper-->
                <div>
                  <button type="button" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
                    <span class="indicator-label">Kirim
                      <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                      <span class="svg-icon svg-icon-3 ms-2 me-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                          <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                          <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                        </svg>
                      </span>
                      <!--end::Svg Icon-->
                    </span>
                    <span class="indicator-progress">Please wait...
                      <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                  </button>
                  <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Selanjutnya
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                    <span class="svg-icon svg-icon-4 ms-1 me-0">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                        <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                      </svg>
                    </span>
                    <!--end::Svg Icon-->
                  </button>
                </div>
                <!--end::Wrapper-->
              </div>
              <!--end::Actions-->
            </form>
            <!--end::Form-->
          </div>
          <!--end::Content-->
        </div>
        <!--end::Stepper-->
      </div>
      <!--end::Card body-->
    </div>

    @else
    <div class="card">
      <div class="card-body">

        <div class="row">
          <div class="event-items">
            <!-- Single Item -->
            <div class="item horizontal col-md-12">
              <div class="col-md-12 info" style="float: inherit;">
                <h1 class="d-flex flex-column text-dark fw-bolder mb-5">
                  Jadwal Pendaftaran Online Siswa Baru
                  </h4>
                  <p>
                    Berikut ini adalah jadwal dari pendaftaran siswa baru yang dapat orang tua ataupun wali murid ikuti.
                  </p>


                  <table class="table table-row-dashed table-row-gray-300 gy-2">
                    <thead>
                      <tr>
                        <th class="mw-300px">NAMA JADWAL</th>
                        <th colspan="2" class="text-center">TANGGAL PENDAFTARAN</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($registration_schedules->isEmpty())
                      <tr>
                        <td colspan="3">
                          <h4 class="text-center">Maaf, Jadwal Pendaftaran belum dibuka</h4>
                        </td>
                      </tr>
                      @else
                      @foreach($registration_schedules as $schedule)
                      <?php
                      $current = (!empty($registration_schedule) && $schedule->id == $registration_schedule->id) ? "bg-success" : "";
                      ?>
                      <tr class="{{ $current }}">
                        <td class="text-capitalize">{{ $schedule->description }}</td>
                        <td class=" text-center">{{ date_format(date_create($schedule->date_from),"d M Y") }}</td>
                        <td class="text-center">{{ date_format(date_create($schedule->date_to),"d M Y") }}</td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                  @if(isset($jadwal_terbuka))
                  <a href="#" class="btn btn-dark effect btn-sm">
                    <i class="fas fa-chart-bar"></i>
                    Pendaftaran Tahun Ajaran {{ $jadwal_terbuka->th_ajaran }}</a>
                  @endisset
              </div>
            </div>
            <!-- Single Item -->
          </div>
        </div>

      </div>
    </div>

    @endif

  </div>
</div>
<!--end::Row-->


@endsection

@section('pagescript')
<input type="hidden" name="uri_image_upload" value="{{ route('file-upload') }}" />

<!--begin::Page Custom Javascript(used by this page)-->
<script>
  var URI_UPLOAD_IMAGE = $('input[name="uri_image_upload"]').val();
  var URI_REGISTER = $('input[name="uri_register"]').val();

  var ENUM_DATA = <?= json_encode($enum_datas) ?>;
  // console.table(ENUM_DATA);


  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var functionResize = function(fileItem) {

  }

  window.uploadPhotos = function(url) {
    // Read in file
    var file = event.target.files[0];

    // Ensure it's an image
    if (file.type.match(/image.*/)) {
      console.log('An image has been loaded');

      // Load the image
      var reader = new FileReader();
      reader.onload = function(readerEvent) {
        var image = new Image();
        image.onload = function(imageEvent) {

          // Resize the image
          var canvas = document.createElement('canvas'),
            max_size = 1024, // TODO : pull max size from a site config
            width = image.width,
            height = image.height;
          if (width > height) {
            if (width > max_size) {
              height *= max_size / width;
              width = max_size;
            }
          } else {
            if (height > max_size) {
              width *= max_size / height;
              height = max_size;
            }
          }
          canvas.width = width;
          canvas.height = height;
          canvas.getContext('2d').drawImage(image, 0, 0, width, height);
          var dataUrl = canvas.toDataURL('image/jpeg');
          var resizedImage = dataURLToBlob(dataUrl);
          $.event.trigger({
            type: "imageResized",
            blob: resizedImage,
            url: dataUrl
          });
        }
        image.src = readerEvent.target.result;
      }
      reader.readAsDataURL(file);
    }
  };

  /* Utility function to convert a canvas to a BLOB */
  var dataURLToBlob = function(dataURL) {
    var BASE64_MARKER = ';base64,';
    if (dataURL.indexOf(BASE64_MARKER) == -1) {
      var parts = dataURL.split(',');
      var contentType = parts[0].split(':')[1];
      var raw = parts[1];

      return new Blob([raw], {
        type: contentType
      });
    }

    var parts = dataURL.split(BASE64_MARKER);
    var contentType = parts[0].split(':')[1];
    var raw = window.atob(parts[1]);
    var rawLength = raw.length;

    var uInt8Array = new Uint8Array(rawLength);

    for (var i = 0; i < rawLength; ++i) {
      uInt8Array[i] = raw.charCodeAt(i);
    }

    return new Blob([uInt8Array], {
      type: contentType
    });
  }
  /* End Utility function to convert a canvas to a BLOB      */

  $(document).on("imageResized", function(event) {
    var data = new FormData($("form[id*='uploadImageForm']")[0]);
    if (event.blob && event.url) {
      data.append('image', event.blob, "upload-resize.jpg");
      data.append('type', 'resize');

      let formData = new FormData();
      formData.append('image', event.blob);
      formData.append('type', 'resize');

      $.ajax({
        type: 'POST',
        url: URI_UPLOAD_IMAGE,
        data: data,
        contentType: false,
        processData: false,
        success: (response) => {
          console.log(response);
        },
        error: function(response) {
          console.log(response);
        }
      });


    }
  });
</script>

<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('assets/js/pages/create-account.js') }}?v=1.0.2"></script>
@stop