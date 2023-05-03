@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard'))

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="col lg-30">
            {{-- mt-15 for edit move up --}}
            <div class="card mb-4 bg-white border">  
                <div class="card-body">
                    {{-- BATAS --}}
                    <h4 class="card-title">
                        <div style="font-size: 13px;"><strong>INFORMASI BIAYA FORMULIR</strong></div>
                        <br />
                    </h4>
                    <p class="card-text">
                        <small>
                            <i class=""></i>Metode Pembayaran <br />
                            <i class=""></i><strong>Transfer Bank</strong> <br /> <br />
                            <i class=""></i>Bank Tujuan <br />
                            <i class=""></i><strong>{{ $school_location[0] }}</strong> <br /> <br />
                            <i class=""></i>Nomor Rekening <br />
                            <i class=""></i><strong>{{ $school_location[1] }}</strong> <br />
                        </small>
                    </p>
                </div>
            </div>

            <div class="card mb-4 bg-white border">
                <div class="card-body">
                    <h4 class="card-title">
                        <div style="font-size: 13px;"><strong>INFORMASI BIAYA FORMULIR</strong></div>
                        <br />
                    </h4>
                    <p class="card-text">
                        <small>
                            @for ($i = 2; $i < count($school_location); $i++)
                            <i class=""></i>  {{ $school_location[$i] }}  <br />
                            @endfor
                        </small>
                    </p>
                </div>
            </div>
            {{-- akhir --}}
        </div>
      </div>
      <div class="col">
        <div class="card d-flex flex-center flex-column flex-column-fluid">
            <!--begin::Wrapper-->
     
            <div class="w-lg-700px p-10 p-lg-15 mx-auto">
                @if (empty($user))
                    <!--begin::Alert-->
                    <div
                        class="alert alert-dismissible bg-light-danger border border-danger d-flex flex-column flex-sm-row p-5 mb-10">
                        <!--begin::Icon-->
                        <span class="svg-icon svg-icon-2hx svg-icon-danger me-4 mb-5 mb-sm-0"><i
                                class="fas fa-times-circle fs-3x text-danger"></i></span>
                        <!--end::Icon-->
    
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column pe-0 pe-sm-10">
                            <!--begin::Title-->
                            <h5 class="mb-1">Informasi Kesalahan</h5>
                            <!--end::Title-->
                            <!--begin::Content-->
                            <span>Pengguna yang akan dikonfirmasi tidak ditemukan</span>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
    
                        <!--begin::Close-->
                        <button type="button"
                            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                            data-bs-dismiss="alert">
                            <i class="bi bi-x fs-1 text-danger"></i>
                        </button>
                        <!--end::Close-->
                    </div>
                    <!--end::Alert-->
                @else
                    <div class="">
                        <div class="mb-9 card-header-stretch">
                            <h2>KONFIRMASI BIAYA PENDAFTARAN</h2>
                        </div>
                        <div class="">
                            <!--begin::Form-->
                            <form role="form" method="post" action="{{ route('frontend.user.ppdb.payment.formulir_post', $ppdb) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" class="form-control" name="ppdb_id" value="{{ $ppdb->id }}" required="">
                                @if (Session::has('berhasil'))
                                    <!--begin::Alert--> 
                                    <div
                                        class="alert alert-dismissible bg-light-success border border-success d-flex flex-column flex-sm-row p-5 mb-10">
                                        <!--begin::Icon-->
                                        <span class="svg-icon svg-icon-2hx svg-icon-success me-4 mb-5 mb-sm-0"><i
                                                class="fas fa-times-circle fs-3x text-success"></i></span>
                                        <!--end::Icon-->
    
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column pe-0 pe-sm-10">
                                            <!--begin::Title-->
                                            <h5 class="mb-1">Berhasil</h5>
                                            <!--end::Title-->
                                            <!--begin::Content-->
                                            <span>{{ Session::get('berhasil') }}</span>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Wrapper-->
    
                                        <!--begin::Close-->
                                        <button type="button"
                                            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                            data-bs-dismiss="alert">
                                            <i class="bi bi-x fs-1 text-success"></i>
                                        </button>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Alert-->
                                @endif
                                <!--begin::Heading-->
                                @if (Session::has('gagal'))
                                    <!--begin::Alert-->
                                    <div
                                        class="alert alert-dismissible bg-light-danger border border-danger d-flex flex-column flex-sm-row p-5 mb-10">
                                        <!--begin::Icon-->
                                        <span class="svg-icon svg-icon-2hx svg-icon-danger me-4 mb-5 mb-sm-0"><i
                                                class="fas fa-times-circle fs-3x text-danger"></i></span>
                                        <!--end::Icon-->
    
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column pe-0 pe-sm-10">
                                            <!--begin::Title-->
                                            <h5 class="mb-1">Error login alert</h5>
                                            <!--end::Title-->
                                            <!--begin::Content-->
                                            <span>{{ Session::get('gagal') }}.</span>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Wrapper-->
    
                                        <!--begin::Close-->
                                        <button type="button"
                                            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                            data-bs-dismiss="alert">
                                            <i class="bi bi-x fs-1 text-danger"></i>
                                        </button>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Alert-->
                                @endif
    
    
                                <div class="fv-row mb-5">
                                    <!--begin::Label-->
                                    <label class="form-label fs-6 fw-bolder text-dark">Nama Lengkap <span
                                            style="color: red">*</span></label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <div class="form-group has-feedback">
                                        <input type="text" class="form-control form-control-solid" name="nama"
                                            placeholder="Nama Lengkap" value="{{ $user->name }}" readonly="">
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
                                    <!--end::Input-->
                                </div>
    
                                <div class="fv-row mb-5">
                                    <label class="form-label fs-6 fw-bolder text-dark">Email<span style="color: red">
                                            *</span></label>
                                    <input type="text" class="form-control form-control-solid" name="email"
                                        placeholder="Email" value="{{ $user->email }}" readonly="">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>
    
                                <div class="fv-row mb-5">
                                    <label class="form-label fs-6 fw-bolder text-dark">Bank Pengirim<span style="color: red">
                                            *</span></label>
                                    <select class="form-control" name="bank_code" data-control="select2"
                                        data-placeholder="Pilih Bank" required="">
                                        <option value="" selected>Pilih Bank</option>
                                        @foreach ($banks as $bk)
                                            <option value="{{ $bk->enum_value }}">{{ $bk->enum_label }}</option>
                                        @endforeach
                                        <option value="OTHERS">Bank Lainnya</option>
                                    </select>
                                </div>
    
                                <div class="fv-row mb-5 has-feedback">
                                    <label class="form-label fs-6 fw-bolder text-dark">Atas Nama<span style="color: red">
                                            *</span></label>
                                    <input type="text" class="form-control" name="bank_owner_name" placeholder="Atas Nama"
                                        required="">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>
    
                                <div class="fv-row mb-5 has-feedback">
                                    <label class="form-label fs-6 fw-bolder text-dark">Nomor Rekening<span style="color: red">
                                            *</span></label>
                                    <input type="text" class="form-control" name="account_number"
                                        placeholFder="Nomor Rekening" required="">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>
    
                                <div class="fv-row mb-5 has-feedback">
                                    <label class="form-label fs-6 fw-bolder text-dark">Nominal<span style="color: red">
                                            *</span></label>
                                    <input type="number" class="form-control" name="cost" placeholder="Nominal"
                                        required="">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>

                                <div class="fv-row mb-10 has-feedback">
                                    <label class="form-label fs-6 fw-bolder text-dark">Upload Foto Bukti</label>
                                    <input type="file" name="photo" class="form-control" id="exampleInputFile"
                                        required="">
                                    <span class="glyphicon glyphicon-file form-control-feedback"></span>
                                </div>

                                <div style="margin-top:-30px; margin-bottom:10px; font-size:2px;"> 
                                    <font class="text-danger" size="-2">* mengunggah file dengan kapasitas maksimal 2 MB dengan format JPEG dan PNG.</font>
                                    {{-- <h6 class="text-danger">* mengunggah file dengan kapasitas maksimal 2 MB dengan format JPEG dan PNG</h6> --}}
                                </div>

                                <div class="fv-row mb-5 has-feedback">
                                    <div class="col-xs-8">
                                        <b>Ket: </b><span style="color: red">*)</span> wajib diisi <br>
                                    </div>
                                </div>
    
                                <!--begin::Actions-->
                                <div class="text-center">
                                    <!--begin::Submit button-->
                                    <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-success w-100 mb-5">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <!--end::Submit button-->
                                </div>
                                <!--end::Actions-->
    
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                @endif
            </div>
            <!--end::Wrapper-->
        </div>
      </div>
    </div>
  </div>


    






@endsection
