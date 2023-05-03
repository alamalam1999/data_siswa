@extends('frontend.layouts.app')
@section('title', app_name() . ' | ' . 'PPDB Payment Administration')



@section('content')

    <!--begin::Stepper-->
    <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
        id="kt_create_account_stepper">
        <!--begin::Aside-->
        <div
            class="card d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px me-9">
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
                                <h3 class="stepper-title">Pernyataan Orang Tua</h3>
                                <div class="stepper-desc fw-semibold">Lengkapi Surat Pernyataan</div>
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
                        <!--begin::Wrapper-->
                        <div class="stepper-wrapper">
                            <!--begin::Icon-->
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">2</span>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Label-->
                            <div class="stepper-label">
                                <h3 class="stepper-title">Formulir Tata Tertib</h3>
                                <div class="stepper-desc fw-semibold">Lengkapi Surat Pernyataan</div>
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Line-->
                        <div class="stepper-line h-40px"></div>
                        <!--end::Line-->
                    </div>
                    <!--end::Step 2-->
                    <!--begin::Step 3-->
                    <div class="stepper-item" data-kt-stepper-element="nav">
                        <!--begin::Wrapper-->
                        <div class="stepper-wrapper">
                            <!--begin::Icon-->
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">3</span>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Label-->
                            <div class="stepper-label">
                                <h3 class="stepper-title">Formulir Kesehatan</h3>
                                <div class="stepper-desc fw-semibold">Lengkapi Surat Kesehatan</div>
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Wrapper-->
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
                                <h3 class="stepper-title">Formulir Angket</h3>
                                <div class="stepper-desc fw-semibold">Lengkapi Angket</div>
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Line-->
                        <div class="stepper-line h-40px"></div>
                        <!--end::Line-->
                    </div>
                    <!--end::Step 4-->
                    <!--begin::Step 5-->
                    <div class="stepper-item" data-kt-stepper-element="nav">
                        <!--begin::Wrapper-->
                        <div class="stepper-wrapper">
                            <!--begin::Icon-->
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">5</span>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Label-->
                            <div class="stepper-label">
                                <h3 class="stepper-title">Formulir Biodata</h3>
                                <div class="stepper-desc fw-semibold">Lengkapi Biodata Siswa</div>
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Line-->
                        <div class="stepper-line h-40px"></div>
                        <!--end::Line-->
                    </div>
                    <!--end::Step 5-->
                    <!--begin::Step 6-->
                    <div class="stepper-item" data-kt-stepper-element="nav">
                        <!--begin::Wrapper-->
                        <div class="stepper-wrapper">
                            <!--begin::Icon-->
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">6</span>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Label-->
                            <div class="stepper-label">
                                <h3 class="stepper-title">Lengkap</h3>
                                <div class="stepper-desc fw-semibold">Selesai Pendaftaran Ulang</div>
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Step 6-->
                </div>
                <!--end::Nav-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--begin::Aside-->
        <!--begin::Content-->
        <div class="card d-flex flex-row-fluid flex-center">
            <!--begin::Form-->
            <form class="card-body py-20 w-100 w-xl-800px px-9" novalidate="novalidate" id="kt_registraion">
                <!--begin::Step 1-->
                <div class="current" data-kt-stepper-element="content">
                    <!--begin::Wrapper-->
                    <div class="w-100">
                        <!--begin::Heading-->
                        <div class="pb-10 pb-lg-15">
                            <!--begin::Title-->
                            <h2 class="fw-bold d-flex align-items-center text-dark">Pernyataan Orang Tua</h2>
                            <!--end::Title-->
                            <!--begin::Notice-->
                            <div class="text-muted fw-semibold fs-6">Lengkapi Surat Pernyataan.</div>
                            <!--end::Notice-->
                        </div>
                        <!--end::Heading-->

                        <div class="table-responsive">
                            <table class="table gs-7 gy-7 gx-7">
                                <thead>
                                    <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                        <th>Pernyataan Orang Tua</th>
                                        <th class="w-50px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($pernyataan_orang_tua_questions); $i++)
                                        <tr>
                                            <td><label for="pernyataan_ortu_{{ $i }}"
                                                    class="fs-6 fw-semibold text-gray-800 form-label">{{ $pernyataan_orang_tua_questions[$i] }}</label>
                                            </td>
                                            <td>
                                                <label class="form-check form-switch form-check-custom form-check-solid">
                                                    <input id="pernyataan_ortu_{{ $i }}" class="form-check-input"
                                                        type="checkbox" value="1" />
                                                </label>
                                            </td>
                                        </tr>
                                    @endfor


                                </tbody>
                            </table>
                        </div>

                        <!--begin::Input group-->
                        <div class="fv-row py-5">

                            <div class="rounded border p-10">
                                <!--begin::Input group-->
                                <div class="d-flex flex-stack w-lg-100">
                                    <!--begin::Label-->
                                    <div class="me-5">
                                        <label class="fs-6 fw-semibold form-label">Kami telah memahami semua Persyaratan,
                                            Prosedur dan Tata Tertib Sekolah Avicenna dan surat pernyataan ini kami isi
                                            dengan sungguh sungguh tanpa ada paksaan dari pihak manapun. Kami tidak akan
                                            melakukan tuntutan apapun baik secara materil maupun imateril kepada pihak
                                            Sekolah Avicenna maupun Yayasan Pendidikan Avicenna Prestasi.</label>
                                        <div class="fs-7 fw-semibold text-danger">Saya memahami dan menyetuju seluruh
                                            pernyataan di atas.</div>
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" checked="checked">
                                        <span class="form-check-label fw-semibold text-nowrap text-muted">Setuju</span>
                                    </label>
                                    <!--end::Switch-->
                                </div>
                                <!--end::Input group-->
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
                            <h2 class="fw-bold text-dark">Formulir Tata Tertib</h2>
                            <!--end::Title-->
                            <!--begin::Notice-->
                            <div class="text-muted fw-semibold fs-6">Lengkapi Surat Pernyataan.
                            </div>
                            <!--end::Notice-->
                        </div>
                        <!--end::Heading-->

                        <!--begin::Input group-->
                        <div class="fv-row py-5">

                            <div class="rounded border p-10">
                                <!--begin::Input group-->
                                <div class="d-flex flex-stack w-lg-100">
                                    <!--begin::Label-->
                                    <div class="me-5">
                                        <label class="fs-6 fw-semibold form-label">Dengan ini telah Membaca dan Menyetujui
                                            Tata Tertib yang berlaku untuk putra/i kami selama bersekolah di Sekolah
                                            Avicenna</label>
                                        <div class="fs-7 fw-semibold text-danger">Saya memahami dan menyetuju seluruh
                                            pernyataan di atas.</div>
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            checked="checked">
                                        <span class="form-check-label fw-semibold text-nowrap text-muted">Setuju</span>
                                    </label>
                                    <!--end::Switch-->
                                </div>
                                <!--end::Input group-->
                            </div>

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
                            <h2 class="fw-bold text-dark">Formulir Kesehatan</h2>
                            <!--end::Title-->
                            <!--begin::Notice-->
                            <div class="text-muted fw-semibold fs-6">Lengkapi Surat Kesehatan.</div>
                            <!--end::Notice-->
                        </div>
                        <!--end::Heading-->








                        <div class="row mb-10">

                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold form-label mb-2">Berat Badan ( Kg)*</label>
                                <!--end::Label-->
                                <!--begin::Row-->
                                <div class="row fv-row">
                                    <!--begin::Col-->
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="weight">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold form-label mb-2">Tinggi Badan (Cm)</label>
                                <!--end::Label-->
                                <!--begin::Row-->
                                <div class="row fv-row">
                                    <!--begin::Col-->
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="height">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold form-label mb-2">Golongan Darah</label>
                                <!--end::Label-->
                                <!--begin::Row-->
                                <div class="row fv-row">
                                    <!--begin::Col-->
                                    <div class="col-12">
                                        <select name="business_type" class="form-select form-select-lg form-select-solid"
                                        data-control="select2" data-placeholder="Select..." data-allow-clear="true"
                                        data-hide-search="true">
                                        <option></option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="O">O</option>
                                        <option value="AB">AB</option>
                                        <option value="Tidak Tahu">Tidak Tahu</option>
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
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold form-label mb-2">Status Imunisasi ( Boleh Lebih Dari Satu )</label>
                                <!--end::Label-->
                                <!--begin::Row-->
                                <div class="row fv-row">
                                    <!--begin::Col-->
                                    <div class="col-12">
                                        <select class="form-select form-select-lg" data-control="select2"
                                        data-close-on-select="false" data-placeholder="Select an option"
                                        data-allow-clear="true" multiple="multiple">
                                        <option></option>
                                        <option value="Memiliki catatan imunisasi">Memiliki catatan imunisasi</option>
                                        <option value="Saat bayi mendapatkan imunisasi">Saat bayi mendapatkan imunisasi</option>
                                        <option value="Prestasi Sekolah">Prestasi Sekolah</option>
                                        <option value="Ekstrakurikuler">Ekstrakurikuler</option>
                                    </select>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->
                        </div>





                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label required">Business Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input name="business_name" class="form-control form-control-lg form-control-solid"
                                value="Keenthemes Inc." />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center form-label">
                                <span class="required">Shortened Descriptor</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover"
                                    data-bs-trigger="hover" data-bs-html="true"
                                    data-bs-content="&lt;div class='p-4 rounded bg-light'&gt; &lt;div class='d-flex flex-stack text-muted mb-4'&gt; &lt;i class='fas fa-university fs-3 me-3'&gt;&lt;/i&gt; &lt;div class='fw-bold'&gt;INCBANK **** 1245 STATEMENT&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack fw-semibold text-gray-600'&gt; &lt;div&gt;Amount&lt;/div&gt; &lt;div&gt;Transaction&lt;/div&gt; &lt;/div&gt; &lt;div class='separator separator-dashed my-2'&gt;&lt;/div&gt; &lt;div class='d-flex flex-stack text-dark fw-bold mb-2'&gt; &lt;div&gt;USD345.00&lt;/div&gt; &lt;div&gt;KEENTHEMES*&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack text-muted mb-2'&gt; &lt;div&gt;USD75.00&lt;/div&gt; &lt;div&gt;Hosting fee&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack text-muted'&gt; &lt;div&gt;USD3,950.00&lt;/div&gt; &lt;div&gt;Payrol&lt;/div&gt; &lt;/div&gt; &lt;/div&gt;"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input name="business_descriptor" class="form-control form-control-lg form-control-solid"
                                value="KEENTHEMES" />
                            <!--end::Input-->
                            <!--begin::Hint-->
                            <div class="form-text">Customers will see this shortened version of your statement descriptor
                            </div>
                            <!--end::Hint-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label required">Corporation Type</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="business_type" class="form-select form-select-lg form-select-solid"
                                data-control="select2" data-placeholder="Select..." data-allow-clear="true"
                                data-hide-search="true">
                                <option></option>
                                <option value="1">S Corporation</option>
                                <option value="1">C Corporation</option>
                                <option value="2">Sole Proprietorship</option>
                                <option value="3">Non-profit</option>
                                <option value="4">Limited Liability</option>
                                <option value="5">General Partnership</option>
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--end::Label-->
                            <label class="form-label">Business Description</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea name="business_description" class="form-control form-control-lg form-control-solid" rows="3"></textarea>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-0">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label required">Contact Email</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input name="business_email" class="form-control form-control-lg form-control-solid"
                                value="corp@support.com" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Step 3-->
                <!--begin::Step 4-->
                <div data-kt-stepper-element="content">
                    <!--begin::Wrapper-->
                    <div class="w-100">
                        <!--begin::Heading-->
                        <div class="pb-5 pb-lg-5">
                            <!--begin::Title-->
                            <h2 class="fw-bold d-flex align-items-center text-dark">Saya mengetahui Sekolah Avicenna
                                melalui ?
                            </h2>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="fv-row pb-10 pb-lg-15">
                            <select class="form-select form-select-lg" data-control="select2"
                                data-placeholder="Select an option">
                                <option></option>
                                <optgroup label="Brand">
                                    <option value="Keluarga">Keluarga</option>
                                    <option value="Tetangga">Tetangga</option>
                                    <option value="Teman">Teman</option>
                                </optgroup>
                                <optgroup label="Kegiatan Sekolah">
                                    <option value="Open House">Open House</option>
                                    <option value="Lomba antar sekolah">Lomba antar sekolah</option>
                                </optgroup>
                                <optgroup label="Media Cetak">
                                    <option value="Spanduk">Spanduk</option>
                                    <option value="Brosur">Brosur</option>
                                    <option value="Koran">Koran</option>
                                </optgroup>
                                <optgroup label="Media Elektronik">
                                    <option value="Televisi">Televisi</option>
                                    <option value="Radio">Radio</option>
                                    <option value="SMS">SMS</option>
                                </optgroup>
                                <optgroup label="Media Sosial">
                                    <option value="Instagram">Instagram</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Twitter">Twitter</option>
                                    <option value="Linkedin">Linkedin</option>
                                </optgroup>
                                <optgroup label="Internet">
                                    <option value="Website">Website</option>
                                    <option value="Google">Google</option>
                                    <option value="Forum">Forum</option>
                                </optgroup>
                            </select>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Heading-->
                        <div class="pb-5 pb-lg-5">
                            <!--begin::Title-->
                            <h2 class="fw-bold d-flex align-items-center text-dark">Hal yang membuat saya memilih
                                Sekolah Avicenna ?</h2>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="fv-row pb-10 pb-lg-15">
                            <select class="form-select form-select-lg" data-control="select2"
                                data-close-on-select="false" data-placeholder="Select an option"
                                data-allow-clear="true" multiple="multiple">
                                <option></option>
                                <optgroup label="Program Sekolah">
                                    <option value="Memiliki Program 7 Habits 'Leader In Me'">Memiliki Program 7 Habits
                                        "Leader In Me"</option>
                                    <option value="Kurikulum Avicenna">Kurikulum Avicenna</option>
                                    <option value="Prestasi Sekolah">Prestasi Sekolah</option>
                                    <option value="Ekstrakurikuler">Ekstrakurikuler</option>
                                </optgroup>
                                <optgroup label="Fasilitas & Pelayanan">
                                    <option value="Fasilitas Sekolah lengkap">Fasilitas Sekolah lengkap</option>
                                    <option value="Kebersihan gedung Sekolah">Kebersihan gedung Sekolah</option>
                                    <option value="Pelayanan baik, penyampaian informasi cukup jelas">Pelayanan baik,
                                        penyampaian informasi cukup jelas</option>
                                    <option value="Tenaga Pendidik yang Berkompeten & Profesional">Tenaga Pendidik yang
                                        Berkompeten & Profesional</option>
                                </optgroup>
                                <optgroup label="Jarak">
                                    <option value="< 1 Km dari tempat tinggal">
                                        < 1 Km dari tempat tinggal</option>
                                    <option value="1 - 5 Km dari tempat tinggal">1 - 5 Km dari tempat tinggal</option>
                                    <option value="6 - 10 Km dari tempat tinggal">6 - 10 Km dari tempat tinggal
                                    </option>
                                    <option value="11 - 20 Km dari tempat tinggal">11 - 20 Km dari tempat tinggal
                                    </option>
                                    <option value="21 - 30 Km dari tempat tinggal">21 - 30 Km dari tempat tinggal
                                    </option>
                                </optgroup>
                                <optgroup label="Uang Sekolah Terjangkau">
                                    <option value="Uang Pangkal">Uang Pangkal</option>
                                    <option value="SPP">SPP</option>
                                    <option value="Tanpa adanya biaya tambahan">Tanpa adanya biaya tambahan</option>
                                </optgroup>
                            </select>
                        </div>
                        <!--end::Input group-->


                        <!--begin::Heading-->
                        <div class="pb-5 pb-lg-5">
                            <!--begin::Title-->
                            <h2 class="fw-bold d-flex align-items-center text-dark">Bagaimana prosedur penerimaan PPDB
                                Sekolah Avicenna ?</h2>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="fv-row pb-10 pb-lg-15">
                            <select class="form-select form-select-lg" data-control="select2"
                                data-placeholder="Select an option">
                                <option></option>
                                <option value="Sederhana dan mudah">Sederhana dan mudah</option>
                                <option value="Standar seperti di sekolah lain">Standar seperti di sekolah lain
                                </option>
                                <option value="Berbelit-belit, perlu disederhanakan">Berbelit-belit, perlu
                                    disederhanakan</option>
                                <option value="Merepotkan">Merepotkan</option>
                            </select>
                        </div>
                        <!--end::Input group-->


                        <!--begin::Heading-->
                        <div class="pb-5 pb-lg-5">
                            <!--begin::Title-->
                            <h2 class="fw-bold d-flex align-items-center text-dark">Pendapat saya</h2>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <textarea class="form-control" rows="5" aria-label="Pendapat saya mengenai Prosedur PPDB di Avicenna"></textarea>
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Step 4-->
                <!--begin::Step 5-->
                <div data-kt-stepper-element="content">
                    <!--begin::Wrapper-->
                    <div class="w-100">
                        <!--begin::Heading-->
                        <div class="pb-8 pb-lg-10">
                            <!--begin::Title-->
                            <h2 class="fw-bold text-dark">Your Are Done!</h2>
                            <!--end::Title-->
                            <!--begin::Notice-->
                            <div class="text-muted fw-semibold fs-6">If you need more info, please
                                <a href="../../demo1/dist/authentication/sign-in/basic.html"
                                    class="link-primary fw-bold">Sign In</a>.
                            </div>
                            <!--end::Notice-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Body-->
                        <div class="mb-0">
                            <!--begin::Text-->
                            <div class="fs-6 text-gray-600 mb-5">Writing headlines for blog posts is as much an art as it
                                is a science and probably warrants its own post, but for all advise is with what works for
                                your great &amp; amazing audience.</div>
                            <!--end::Text-->
                            <!--begin::Alert-->
                            <!--begin::Notice-->
                            <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20"
                                            height="20" rx="10" fill="currentColor" />
                                        <rect x="11" y="14" width="7" height="2"
                                            rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
                                        <rect x="11" y="17" width="2" height="2"
                                            rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-grow-1">
                                    <!--begin::Content-->
                                    <div class="fw-semibold">
                                        <h4 class="text-gray-900 fw-bold">We need your attention!</h4>
                                        <div class="fs-6 text-gray-700">To start using great tools, please, please
                                            <a href="#" class="fw-bold">Create Team Platform</a>
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
                <!--end::Step 5-->
                <!--begin::Actions-->
                <div class="d-flex flex-stack pt-10">
                    <!--begin::Wrapper-->
                    <div class="mr-2">
                        <button type="button" class="btn btn-lg btn-light-primary me-3"
                            data-kt-stepper-action="previous">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                            <span class="svg-icon svg-icon-4 me-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="6" y="11" width="13" height="2"
                                        rx="1" fill="currentColor" />
                                    <path
                                        d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Back
                        </button>
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Wrapper-->
                    <div>
                        <button type="button" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
                            <span class="indicator-label">Submit
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                <span class="svg-icon svg-icon-3 ms-2 me-0">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="18" y="13" width="13"
                                            height="2" rx="1" transform="rotate(-180 18 13)"
                                            fill="currentColor" />
                                        <path
                                            d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                            <span class="svg-icon svg-icon-4 ms-1 me-0">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="18" y="13" width="13" height="2"
                                        rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                    <path
                                        d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                        fill="currentColor" />
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

@endsection

@section('pagescript')

    <script src="{{ asset('assets/js/pages/re-registration.js') }}"></script>
    <script>
        "use strict";

        // Class definition
        var KTCreateAccount = function() {
            // Elements
            var modal;
            var modalEl;

            var stepper;
            var form;
            var formSubmitButton;
            var formContinueButton;

            // Variables
            var stepperObj;
            var validations = [];

            // Private Functions
            var initStepper = function() {
                // Initialize Stepper
                stepperObj = new KTStepper(stepper);

                // Stepper change event
                stepperObj.on('kt.stepper.changed', function(stepper) {
                    if (stepperObj.getCurrentStepIndex() === 4) {
                        formSubmitButton.classList.remove('d-none');
                        formSubmitButton.classList.add('d-inline-block');
                        formContinueButton.classList.add('d-none');
                    } else if (stepperObj.getCurrentStepIndex() === 5) {
                        formSubmitButton.classList.add('d-none');
                        formContinueButton.classList.add('d-none');
                    } else {
                        formSubmitButton.classList.remove('d-inline-block');
                        formSubmitButton.classList.remove('d-none');
                        formContinueButton.classList.remove('d-none');
                    }
                });

                // Validation before going to next page
                stepperObj.on('kt.stepper.next', function(stepper) {
                    console.log('stepper.next');

                    // Validate form before change stepper step
                    var validator = validations[stepper.getCurrentStepIndex() -
                        1]; // get validator for currnt step

                    if (validator) {
                        validator.validate().then(function(status) {
                            console.log('validated!');

                            if (status == 'Valid') {
                                stepper.goNext();

                                KTUtil.scrollTop();
                            } else {
                                Swal.fire({
                                    text: "Sorry, looks like there are some errors detected, please try again.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-light"
                                    }
                                }).then(function() {
                                    KTUtil.scrollTop();
                                });
                            }
                        });
                    } else {
                        stepper.goNext();

                        KTUtil.scrollTop();
                    }
                });

                // Prev event
                stepperObj.on('kt.stepper.previous', function(stepper) {
                    console.log('stepper.previous');

                    stepper.goPrevious();
                    KTUtil.scrollTop();
                });
            }

            var handleForm = function() {
                formSubmitButton.addEventListener('click', function(e) {
                    // Validate form before change stepper step
                    var validator = validations[3]; // get validator for last form

                    validator.validate().then(function(status) {
                        console.log('validated!');

                        if (status == 'Valid') {
                            // Prevent default button action
                            e.preventDefault();

                            // Disable button to avoid multiple click 
                            formSubmitButton.disabled = true;

                            // Show loading indication
                            formSubmitButton.setAttribute('data-kt-indicator', 'on');

                            // Simulate form submission
                            setTimeout(function() {
                                // Hide loading indication
                                formSubmitButton.removeAttribute('data-kt-indicator');

                                // Enable button
                                formSubmitButton.disabled = false;

                                // Redirect
                                if (form.hasAttribute("data-kt-redirect-url")) {
                                    // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                                    Swal.fire({
                                        text: "Your account has been successfully created.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function(result) {
                                        if (result.isConfirmed) {
                                            location.href = form.getAttribute(
                                                'data-kt-redirect-url');
                                        }
                                    });
                                } else {
                                    stepperObj.goNext();
                                }
                            }, 2000);
                        } else {
                            Swal.fire({
                                text: "Sorry, looks like there are some errors detected, please try again.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-light"
                                }
                            }).then(function() {
                                KTUtil.scrollTop();
                            });
                        }
                    });
                });

                // Expiry month. For more info, plase visit the official plugin site: https://select2.org/
                $(form.querySelector('[name="card_expiry_month"]')).on('change', function() {
                    // Revalidate the field when an option is chosen
                    validations[3].revalidateField('card_expiry_month');
                });

                // Expiry year. For more info, plase visit the official plugin site: https://select2.org/
                $(form.querySelector('[name="card_expiry_year"]')).on('change', function() {
                    // Revalidate the field when an option is chosen
                    validations[3].revalidateField('card_expiry_year');
                });

                // Expiry year. For more info, plase visit the official plugin site: https://select2.org/
                $(form.querySelector('[name="business_type"]')).on('change', function() {
                    // Revalidate the field when an option is chosen
                    validations[2].revalidateField('business_type');
                });
            }

            var initValidation = function() {
                // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
                // Step 1
                validations.push(FormValidation.formValidation(
                    form, {
                        fields: {
                            // account_type: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: 'Account type is required'
                            //         }
                            //     }
                            // }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: '.fv-row',
                                eleInvalidClass: '',
                                eleValidClass: ''
                            })
                        }
                    }
                ));

                // Step 2
                validations.push(FormValidation.formValidation(
                    form, {
                        fields: {
                            // 'account_team_size': {
                            //     validators: {
                            //         notEmpty: {
                            //             message: 'Time size is required'
                            //         }
                            //     }
                            // },
                            // 'account_name': {
                            //     validators: {
                            //         notEmpty: {
                            //             message: 'Account name is required'
                            //         }
                            //     }
                            // },
                            // 'account_plan': {
                            //     validators: {
                            //         notEmpty: {
                            //             message: 'Account plan is required'
                            //         }
                            //     }
                            // }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: '.fv-row',
                                eleInvalidClass: '',
                                eleValidClass: ''
                            })
                        }
                    }
                ));

                // Step 3
                validations.push(FormValidation.formValidation(
                    form, {
                        fields: {
                            'business_name': {
                                validators: {
                                    notEmpty: {
                                        message: 'Busines name is required'
                                    }
                                }
                            },
                            'business_descriptor': {
                                validators: {
                                    notEmpty: {
                                        message: 'Busines descriptor is required'
                                    }
                                }
                            },
                            'business_type': {
                                validators: {
                                    notEmpty: {
                                        message: 'Busines type is required'
                                    }
                                }
                            },
                            'business_description': {
                                validators: {
                                    notEmpty: {
                                        message: 'Busines description is required'
                                    }
                                }
                            },
                            'business_email': {
                                validators: {
                                    notEmpty: {
                                        message: 'Busines email is required'
                                    },
                                    emailAddress: {
                                        message: 'The value is not a valid email address'
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: '.fv-row',
                                eleInvalidClass: '',
                                eleValidClass: ''
                            })
                        }
                    }
                ));

                // Step 4
                validations.push(FormValidation.formValidation(
                    form, {
                        fields: {
                            'card_name': {
                                validators: {
                                    notEmpty: {
                                        message: 'Name on card is required'
                                    }
                                }
                            },
                            'card_number': {
                                validators: {
                                    notEmpty: {
                                        message: 'Card member is required'
                                    },
                                    creditCard: {
                                        message: 'Card number is not valid'
                                    }
                                }
                            },
                            'card_expiry_month': {
                                validators: {
                                    notEmpty: {
                                        message: 'Month is required'
                                    }
                                }
                            },
                            'card_expiry_year': {
                                validators: {
                                    notEmpty: {
                                        message: 'Year is required'
                                    }
                                }
                            },
                            'card_cvv': {
                                validators: {
                                    notEmpty: {
                                        message: 'CVV is required'
                                    },
                                    digits: {
                                        message: 'CVV must contain only digits'
                                    },
                                    stringLength: {
                                        min: 3,
                                        max: 4,
                                        message: 'CVV must contain 3 to 4 digits only'
                                    }
                                }
                            }
                        },

                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: '.fv-row',
                                eleInvalidClass: '',
                                eleValidClass: ''
                            })
                        }
                    }
                ));
            }

            return {
                // Public Functions
                init: function() {
                    // Elements
                    modalEl = document.querySelector('#kt_modal_create_account');

                    if (modalEl) {
                        modal = new bootstrap.Modal(modalEl);
                    }

                    stepper = document.querySelector('#kt_create_account_stepper');

                    if (!stepper) {
                        return;
                    }

                    form = stepper.querySelector('#kt_registraion');
                    formSubmitButton = stepper.querySelector('[data-kt-stepper-action="submit"]');
                    formContinueButton = stepper.querySelector('[data-kt-stepper-action="next"]');

                    initStepper();
                    initValidation();
                    handleForm();
                }
            };
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTCreateAccount.init();
        });
    </script>
@stop
