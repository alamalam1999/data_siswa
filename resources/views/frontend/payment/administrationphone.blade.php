@extends('frontend.layouts.app')
@section('title', app_name() . ' | ' . 'PPDB Payment Administration')



@section('content')
    <form id="form-payment-administration" role="form" method="post"
        action="{{ route('frontend.user.payment.administration_post') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" class="form-control" name="ppdb_id" value="{{ $ppdb->id }}" required="">
        <div class="card">
            <!--begin::Body-->
            <div class="card-body p-lg-20">
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-xl-row">

                    <div class="flex-lg-row-fluid mb-10 mb-xl-0  me-xl-18">
                        <!--begin::Invoice 2 content-->
                        <div class="mt-n1">
                            <!--begin::Top-->
                            <div class="d-flex flex-stack pb-10">
                                <!--begin::Logo-->
                                <a href="#">
                                    <img alt="Logo" class="h-50px"
                                        src="https://jagakarsa.sekolah-avicenna.sch.id/wp-content/uploads/2019/09/IMG-20190917-WA0012.jpg">
                                </a>
                                <!--end::Logo-->
                            </div>
                            <!--end::Top-->
                            <!--begin::Wrapper-->
                            <div class="m-0">
                                <!--begin::Label-->
                                <div class="fw-bold fs-3 text-gray-800 mb-8">Tagihan #{{ $ppdb->document_no }}</div>
                                <!--end::Label-->
                                <!--begin::Row-->

                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="row g-5 mb-3">
                                    <!--end::Col-->
                                    <div class="col-sm-6">
                                        <!--end::Label-->
                                        <div class="fw-semibold fs-7 text-gray-600 mb-3">Pembayaran Untuk : <strong>{{ $ppdb->fullname }}.</strong> </div>
                                        <div class="fw-semibold fs-7 text-gray-600 mb-3">Alamat : <strong> {{ $ppdb->address }}</strong></div>
                                        <div class="fw-semibold fs-7 text-gray-600 mb-3">Status Pekerja Medco :
                                            <?php
                                            if ($ppdb->ppdb_discount == 'BPS') {
                                                $ppdb->ppdb_discount = 'YPAP / Avicenna / TKIA-19 / SDIA-15';
                                            } 
                                        ?><Strong>{{ $ppdb->ppdb_discount ? $ppdb->ppdb_discount."." : '-' }}</Strong>    
                                        </div>
                                        <div class="fw-semibold fs-7 text-gray-600 mb-3">Status Siswa : <strong>{{ $ppdb->status_siswa ? $ppdb->status_siswa."." : '-' }}</strong></div>
                                        <div class="fw-semibold fs-7 text-gray-600 mb-3">Kelas : <strong>{{ $ppdb->classes ? $ppdb->classes."." : '-' }}</strong></div>      
                                        <div class="fw-semibold fs-7 text-gray-600 mb-3">Tanggal Konfirmasi: <strong>{{ now()->toDateString() }}</strong></div>      
                                        <?php 
                                        $discount = '';
                                        if($ppdb->ppdb_discount == 'YPAP / Avicenna / TKIA-19 / SDIA-15') {
                                            $discount = '50%';
                                        }else if($ppdb->ppdb_discount == 'STAFF') {
                                            $discount = '20%';
                                        }else if($ppdb->ppdb_discount == 'MANAGER') {
                                            $discount = '10%';
                                        }else if($ppdb->ppdb_discount == 'SUPERVISOR') {
                                            $discount = '15%';
                                        }else if($ppdb->ppdb_discount == 'DIREKSI') {
                                            $discount = '5%';
                                        }
                                        ?>
                                        <div class="fw-semibold fs-7 text-gray-600 mb-3">Diskon (Medco Group): <strong>{{ $discount }}</strong></div>     
                                        <div class="fw-semibold fs-7 text-gray-600 mb-3">Diskon UP Bayar Lunas: <strong>Rp.500.000</strong></div>
                                        <div class="fw-semibold fs-7 text-gray-600 mb-3">Pendaftaran siswa Gelombang ke: <strong> {{ $registration_wave ? $registration_wave."." : '-' }} </strong></div>
                                        </div>
                                    </div>
                                </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Content-->
                                <div class="flex-grow-1">
                                    <!--begin::Table-->
                                    <div class="table-responsive border-bottom mb-9">


                                    <!--begin::Radio group-->

                                    <!--end::Radio group-->


                                        <table class="table mb-3">
                                            <thead>
                                                <tr class="border-bottom fs-6 fw-bold text-muted">
                                                    <th class="min-w-175px pb-2">Informasi Uang Pangkal</th>
                                                    <th class="min-w-80px text-end pb-2">Biaya</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                    <td class="d-flex align-items-center pt-6">
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input" name="fee_up" type="radio"
                                                                value="{{ $up_normal_lunas[0]->price_value }}" id="FEE_UP_LUNAS">
                                                            <label class="form-check-label" for="FEE_UP_LUNAS">Lunas</label>
                                                        </div>
                                                    </td>
                                                    <td class="pt-6 fs-9">@currency($up_normal_lunas[0]->price_value)</td>      
                                                </tr>
                                                
                                                <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                    <td class="d-flex align-items-center pt-6">
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input" name="fee_up" type="radio"
                                                                value="{{ $up_normal_cicilan[0]->price_value }}" id="FEE_UP">
                                                            <label class="form-check-label" for="FEE_UP">
                                                                Cicilan Pertama
                                                            </label>    
                                                            <td class="d-flex align-items-center pt-6">
                                                                <div class=" px-2 fs-9">
                                                                    <span style="color:red">* Presentase Cicilan pertama: 60%</span> 
                                                                </div>
                                                            </td>
                                                        </div>
                                                    </td>

                                                    <td class="pt-6 fs-9">@currency($up_normal_cicilan[0]->price_value)</td>
                                                    
                                                </tr>
                                                <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                    <td colspan="3" class="h-20px"></td>



                                                </tr>
                                                <tr class="fw-bold text-gray-700 fs-5">
                                                    <td rowspan="2" class="pt-6 text-dark fw-bolder"
                                                    style="vertical-align: middle;" id="fee_up_amount_display"></td>
                                                </tr>                                 

                                            </tbody>

                                            <thead>
                                                <tr class="border-bottom fs-6 fw-bold text-muted">
                                                    <th class="min-w-175px pb-2">Informasi Uang SPP</th>

                                                    <th class="min-w-80px text-end pb-2"></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                    <td class="d-flex align-items-center pt-6">
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input" name="fee_spp" type="radio"
                                                                value="{{ $spp_normal[0]->price_value }}" id="FEE_SPP">
                                                            <label class="form-check-label" for="FEE_SPP">SPP Bulan
                                                                Juli 2023</label>
                                                        </div>
                                                    </td>

                                                    <td class="pt-6 fs-9">@currency($spp_normal[0]->price_value)</td>
                                                </tr>
                                                <tr class="fw-bold text-gray-700 fs-5 text-end">

                                                    <td class="d-flex align-items-center pt-6">
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input" name="fee_spp" type="radio"
                                                            value="{{ $spp_normal_12bulan[0]->price_value }}" id="FEE_SPP_12">
                                                            <label class="form-check-label" for="FEE_SPP_12">SPP 12
                                                                Bulan</label>
                                                        </div>
                                                    </td>

                                                    <td class="pt-6 fs-9">@currency($spp_normal_12bulan[0]->price_value)</td>
                                                </tr>
                                                <tr class="fw-bold text-gray-700 fs-5">

                                                    <td class="d-flex align-items-center pt-6">
                                                        <div class=" px-2 fs-9">
                                                            <span style="color:red">* Pembayaran SPP 12 bulan Diskon 1 bulan SPP (hanya berlaku sampai Bulan Juni 2023)</span> 
                                                        </div>
                                                    </td>
                                                        <td class="pt-6 px-2 fs-9"></td>
                                                </tr>
                                                <tr class="fw-bold text-gray-700 fs-5">
                                                    <td rowspan="2" class="pt-6 text-dark fw-bolder"
                                                    style="vertical-align: middle;" id="fee_spp_amount_display"></td>
                                                </tr>                                                                                             

                                            </tbody>


                                        </table>
                                        <input type="hidden" name="fee_total" value="0" />
                                    </div>
                                    <!--end::Table-->
                                        <!--end::Table-->
                                        <div class="border-top mb-6 border border-primary p-5 border-2 rounded">
                                            <div class="d-flex w-lg-100">
                                                <!--begin::Label-->
                                                    <label class="form-check form-switch form-check-custom form-check-solid w-70px">
                                                        <input id="is-employee-medco" class="form-check-input" type="checkbox" value="true">
                                                    </label>
                                                <div class="me-5">
                                                    <label class="fs-6 fw-semibold form-label">Diskon melalui surat pengajuan</label>
                                                    <div class="fs-7 fw-semibold text-muted">Dibutuhkan surat persetujuan pengajuan diskon dari YPAP atau Sekolah Avicenna</div>
                                                </div>
                                                <!--end::Label-->
                                            </div>

                                            <div id="box-employee-medco" class="d-none mt-10">
                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                    <label class="form-label fw-bold text-dark fs-6">Besaran Nominal Diskon yang disetujui</label>
                                                    <input name="medco_employee" class="form-control form-control-lg form-control-solid" type="number" placeholder="Masukkan Nominal" autocomplete="off">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                    <label class="form-label fw-bold text-dark fs-6">Surat persetujuan pengajuan diskon</label>
                                                    <input type="file" class="form-control form-control-lg form-control-solid" name="medco_employee_file_input" data-image="medco_employee_file" accept="application/pdf, image/*">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <div class="btn btn-secondary w-100">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen016.svg-->
                                                    <!--end::Svg Icon-->Hitung
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                    <!--begin::Container-->
                                    <div class="d-flex justify-content-end">
                                        <!--begin::Section-->
                                        <div class="mw-300px">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack">
                                                <!--begin::Code-->
                                                <div class="fw-semibold pe-10 text-gray-600 fs-2">Total : </div>
                                                <!--end::Code-->
                                                <!--begin::Label-->
                                                <div class="text-end fw-bolder fs-2 text-gray-900" id="fee_total_display">
                                                    0
                                                </div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                     <!--begin::Alert-->
                                        <div class="alert alert-info d-flex align-items-center p-5 mt-4 mb-2">
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
                                            <h4 class="mb-1 text-dark">Informasi Pembayaran</h4>
                                            <!--end::Title-->
                                            <!--begin::Content-->
                                            <span>Sebelum melakukan pembayaran, harap konfirmasi jumlah UP & SPP melalui Kontak Keuangan Sekolah.</span>
                                            <!--end::Content-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Alert-->
                                    <!--end::Wrapper-->
                                    <!--end::Container-->
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Invoice 2 content-->
                    </div>
                    <!--begin::Sidebar-->
                    <div class="m-0">
                        <!--begin::Invoice 2 sidebar-->
                        <div
                            class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 min-w-md-400px p-9 bg-lighten">
                            <h6 class="mb-5 fw-bolder text-gray-800 text-hover-primary">INFORMASI PEMBAYARAN</h6>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Metode Pembayaran</div>
                                <div class="fw-bold fs-6 text-gray-800">Transfer Bank</div>
                            </div>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Bank Tujuan</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $school_location[0] }}</div>
                            </div>
                            <div class="mb-10">
                                <div class="fw-semibold text-gray-600 fs-7">Nomor Rekening</div>
                                <div class="fw-bold fs-6 text-gray-800 d-flex align-items-center">{{ $school_location[1] }}</div>
                            </div>
                            <!--begin::Title-->
                            <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">DETAIL PEMBAYARAN</h6>
                            <!--end::Title-->

                            <div class="form-floating mb-3">
                                <select class="form-control required" name="bank_code" data-control="select2"
                                    data-placeholder="Pilih Bank" required="">
                                    <option value="" selected>Pilih Bank</option>
                                    @foreach ($banks as $bk)
                                        <option value="{{ $bk->enum_value }}">{{ $bk->enum_label }}</option>
                                    @endforeach
                                    <option value="OTHERS">Bank Lainnya</option>
                                </select>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control required" name="bank_owner_name"
                                    placeholder="Atas Nama" required="">
                                <label for="floatingInput">Atas nama <span style="color: red">
                                        *</span></label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control required" name="account_number"
                                    placeholder="Nomor Rekening" required="">
                                <label for="account_number">Nomor Rekening <span style="color: red">
                                        *</span></label>
                            </div>


                            <div class="form-floating mb-5">
                                <input type="number" id="payment-cost" class="form-control required" name="cost"
                                    placeholder="Nominal" required="">
                                <label for="floatingInput">Nominal harus sesuai Total <span style="color: red">
                                        *</span></label>
                            </div>

                            <div class="mb-5">
                                <label class="form-label fs-7 fw-bold text-gray-500">Upload Foto Bukti <span
                                        style="color: red">
                                        *</span></label>
                                <input type="file" name="photo" class="form-control" id="exampleInputFile"
                                    required="">
                                <span class="glyphicon glyphicon-file form-control-feedback"></span>
                            </div>

                            <hr>

                            <div class="card-text text-center mb-6">

                                <button type="submit" class="btn btn-secondary w-100" id="btn-submit-payment" disabled>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen016.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.43 8.56949L10.744 15.1395C10.6422 15.282 10.5804 15.4492 10.5651 15.6236C10.5498 15.7981 10.5815 15.9734 10.657 16.1315L13.194 21.4425C13.2737 21.6097 13.3991 21.751 13.5557 21.8499C13.7123 21.9488 13.8938 22.0014 14.079 22.0015H14.117C14.3087 21.9941 14.4941 21.9307 14.6502 21.8191C14.8062 21.7075 14.9261 21.5526 14.995 21.3735L21.933 3.33649C22.0011 3.15918 22.0164 2.96594 21.977 2.78013C21.9376 2.59432 21.8452 2.4239 21.711 2.28949L15.43 8.56949Z"
                                                fill="currentColor"></path>
                                            <path opacity="0.3"
                                                d="M20.664 2.06648L2.62602 9.00148C2.44768 9.07085 2.29348 9.19082 2.1824 9.34663C2.07131 9.50244 2.00818 9.68731 2.00074 9.87853C1.99331 10.0697 2.04189 10.259 2.14054 10.4229C2.23919 10.5869 2.38359 10.7185 2.55601 10.8015L7.86601 13.3365C8.02383 13.4126 8.19925 13.4448 8.37382 13.4297C8.54839 13.4145 8.71565 13.3526 8.85801 13.2505L15.43 8.56548L21.711 2.28448C21.5762 2.15096 21.4055 2.05932 21.2198 2.02064C21.034 1.98196 20.8409 1.99788 20.664 2.06648Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->BAYAR SEKARANG
                                </button>

                            </div>
                            <hr>
                            <h6 class="mb-5 fw-bolder text-gray-800 text-hover-primary">CONTACT</h6>
                            <div class="card-text"> 
                                <tr>
                                    <td>
                                        <a href="https://api.whatsapp.com/send?phone=628111297882&text=" target="_blank" class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-3 mb-7">
                                                <i class="bi bi-whatsapp text-success fs-3x"></i>
                                            </div>
                                            <div class="d-flex justify-content-start flex-column mb-7">
                                                <div class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Sekolah Avicenna Jagakarsa</div>
                                                <span class="text-gray-400 fw-semibold d-block fs-7">Keuangan Jagakarsa</span>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="text-end">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="https://api.whatsapp.com/send?phone=628111546953&text=" target="_blank" class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-3 mb-7">
                                                <i class="bi bi-whatsapp text-success fs-3x"></i>
                                            </div>
                                            <div class="d-flex justify-content-start flex-column mb-7">
                                                <div class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Sekolah Avicenna Cinere</div>
                                                <span class="text-gray-400 fw-semibold d-block fs-7">Keuangan Cinere</span>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="text-end">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="https://api.whatsapp.com/send?phone=6282124239980&text=" target="_blank" class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-3 mb-7">
                                                <i class="bi bi-whatsapp text-success fs-3x"></i>
                                            </div>
                                            <div class="d-flex justify-content-start flex-column mb-7">
                                                <div class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Sekolah Avicenna Pamulang</div>
                                                <span class="text-gray-400 fw-semibold d-block fs-7">Keuangan Pamulang</span>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="text-end">
                                    </td>
                                </tr>
                            </div>
                        </div>
                        <!--end::Invoice 2 sidebar-->
                    </div>
                    <!--end::Sidebar-->

                    <!--begin::Content-->

                    <!--end::Content-->
                </div>
                <!--end::Layout-->
            </div>
            <!--end::Body-->
        </div>
        <input type="hidden" name="fee_up_type" value="" />
        <input type="hidden" name="fee_up_amount" value="0" />

        <input type="hidden" name="fee_spp_type" value="" />
        <input type="hidden" name="fee_spp_amount" value="0" />

        <input type="hidden" name="medco_employee_type" value="" />
        <input type="hidden" name="medco_employee" value="0" />

        <input type="hidden" name="fee_total" value="0" />

    </form>


@endsection

@section('pagescript')
    <script src="{{ asset('assets/js/pages/payment-administration.js') }}"></script>
@stop
