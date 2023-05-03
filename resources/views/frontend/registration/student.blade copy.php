@extends('frontend.layouts.app')
@section('title', app_name() . ' | ' . 'PPDB Payment Administration')



@section('content')

    <div class="card">
        <!--begin::Card body-->
        <div class="card-body">
            <!--begin::Stepper-->
            <div class="stepper stepper-links d-flex flex-column pt-15" id="kt_create_account_stepper">
                <!--begin::Nav-->
                <div class="stepper-nav mb-5">
                    <!--begin::Step 1-->
                    <div class="stepper-item current" data-kt-stepper-element="nav">
                        <h3 class="stepper-title">Pernyataan Orang Tua</h3>
                    </div>
                    <!--end::Step 1-->
                    <!--begin::Step 2-->
                    <div class="stepper-item" data-kt-stepper-element="nav">
                        <h3 class="stepper-title">Persetujuan Tata Tertib</h3>
                    </div>
                    <!--end::Step 2-->
                    <!--begin::Step 3-->
                    <div class="stepper-item" data-kt-stepper-element="nav">
                        <h3 class="stepper-title">Form Kesehatan</h3>
                    </div>
                    <!--end::Step 3-->
                    <!--begin::Step 4-->
                    <div class="stepper-item" data-kt-stepper-element="nav">
                        <h3 class="stepper-title">Angket</h3>
                    </div>
                    <!--end::Step 4-->
                    <!--begin::Step 5-->
                    <div class="stepper-item" data-kt-stepper-element="nav">
                        <h3 class="stepper-title">Formulir Biodata</h3>
                    </div>
                    <!--end::Step 5-->
                    <!--begin::Step 6-->
                    <div class="stepper-item" data-kt-stepper-element="nav">
                        <h3 class="stepper-title">Selesai</h3>
                    </div>
                    <!--end::Step 6-->
                </div>
                <!--end::Nav-->
                <!--begin::Form-->
                <form class="mx-auto mw-800px w-100 pt-15 pb-10" novalidate="novalidate" id="kt_create_account_form">
                    <!--begin::Angket-->
                    <div class="current" data-kt-stepper-element="content">
                        <!--begin::Wrapper-->
                        <div class="w-100">
                            <div class="table-responsive">
                                <table class="table gs-7 gy-7 gx-7">
                                    <thead>
                                        <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                            <th>Pernyataan Orang Tua</th>
                                            <th class="w-100px">Persetujuan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < count($pernyataan_orang_tua_questions); $i++)
                                            <tr>
                                                <td><label for="pernyataan_ortu_{{ $i }}"
                                                        class="fs-6 fw-semibold text-gray-800 form-label">{{ $pernyataan_orang_tua_questions[$i] }}</label>
                                                </td>
                                                <td>
                                                    <label
                                                        class="form-check form-switch form-check-custom form-check-solid">
                                                        <input id="pernyataan_ortu_{{ $i }}"
                                                            class="form-check-input" type="checkbox" value="1" />
                                                    </label>
                                                </td>
                                            </tr>
                                        @endfor


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Angket-->
                    <!--begin::Step 2-->
                    <div data-kt-stepper-element="content">
                        <!--begin::Wrapper-->
                        <div class="w-100">
                            <!--begin::Heading-->
                            <div class="pb-10 pb-lg-15">
                                <!--begin::Title-->
                                <h2 class="fw-bold text-dark">Account Info</h2>
                                <!--end::Title-->
                                <!--begin::Notice-->
                                <div class="text-muted fw-semibold fs-6">If you need more info, please check out
                                    <a href="#" class="link-primary fw-bold">Help Page</a>.
                                </div>
                                <!--end::Notice-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center form-label mb-3">Specify Team Size
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="Provide your team size to help us setup your billing"></i></label>
                                <!--end::Label-->
                                <!--begin::Row-->
                                <div class="row mb-2" data-kt-buttons="true">
                                    <!--begin::Col-->
                                    <div class="col">
                                        <!--begin::Option-->
                                        <label
                                            class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                            <input type="radio" class="btn-check" name="account_team_size"
                                                value="1-1" />
                                            <span class="fw-bold fs-3">1-1</span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col">
                                        <!--begin::Option-->
                                        <label
                                            class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4 active">
                                            <input type="radio" class="btn-check" name="account_team_size"
                                                checked="checked" value="2-10" />
                                            <span class="fw-bold fs-3">2-10</span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col">
                                        <!--begin::Option-->
                                        <label
                                            class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                            <input type="radio" class="btn-check" name="account_team_size"
                                                value="10-50" />
                                            <span class="fw-bold fs-3">10-50</span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col">
                                        <!--begin::Option-->
                                        <label
                                            class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                            <input type="radio" class="btn-check" name="account_team_size"
                                                value="50+" />
                                            <span class="fw-bold fs-3">50+</span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Hint-->
                                <div class="form-text">Customers will see this shortened version of your statement
                                    descriptor</div>
                                <!--end::Hint-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="form-label mb-3">Team Account Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-lg form-control-solid"
                                    name="account_name" placeholder="" value="" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-0 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center form-label mb-5">Select Account Plan
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="Monthly billing will be based on your account plan"></i></label>
                                <!--end::Label-->
                                <!--begin::Options-->
                                <div class="mb-0">
                                    <!--begin:Option-->
                                    <label class="d-flex flex-stack mb-5 cursor-pointer">
                                        <!--begin:Label-->
                                        <span class="d-flex align-items-center me-2">
                                            <!--begin::Icon-->
                                            <span class="symbol symbol-50px me-6">
                                                <span class="symbol-label">
                                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-gray-600">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z"
                                                                fill="currentColor" />
                                                            <path opacity="0.3"
                                                                d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                            <!--end::Icon-->
                                            <!--begin::Description-->
                                            <span class="d-flex flex-column">
                                                <span class="fw-bold text-gray-800 text-hover-primary fs-5">Company
                                                    Account</span>
                                                <span class="fs-6 fw-semibold text-muted">Use images to enhance your post
                                                    flow</span>
                                            </span>
                                            <!--end:Description-->
                                        </span>
                                        <!--end:Label-->
                                        <!--begin:Input-->
                                        <span class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" type="radio" name="account_plan"
                                                value="1" />
                                        </span>
                                        <!--end:Input-->
                                    </label>
                                    <!--end::Option-->
                                    <!--begin:Option-->
                                    <label class="d-flex flex-stack mb-5 cursor-pointer">
                                        <!--begin:Label-->
                                        <span class="d-flex align-items-center me-2">
                                            <!--begin::Icon-->
                                            <span class="symbol symbol-50px me-6">
                                                <span class="symbol-label">
                                                    <!--begin::Svg Icon | path: icons/duotune/graphs/gra006.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-gray-600">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13 5.91517C15.8 6.41517 18 8.81519 18 11.8152C18 12.5152 17.9 13.2152 17.6 13.9152L20.1 15.3152C20.6 15.6152 21.4 15.4152 21.6 14.8152C21.9 13.9152 22.1 12.9152 22.1 11.8152C22.1 7.01519 18.8 3.11521 14.3 2.01521C13.7 1.91521 13.1 2.31521 13.1 3.01521V5.91517H13Z"
                                                                fill="currentColor" />
                                                            <path opacity="0.3"
                                                                d="M19.1 17.0152C19.7 17.3152 19.8 18.1152 19.3 18.5152C17.5 20.5152 14.9 21.7152 12 21.7152C9.1 21.7152 6.50001 20.5152 4.70001 18.5152C4.30001 18.0152 4.39999 17.3152 4.89999 17.0152L7.39999 15.6152C8.49999 16.9152 10.2 17.8152 12 17.8152C13.8 17.8152 15.5 17.0152 16.6 15.6152L19.1 17.0152ZM6.39999 13.9151C6.19999 13.2151 6 12.5152 6 11.8152C6 8.81517 8.2 6.41515 11 5.91515V3.01519C11 2.41519 10.4 1.91519 9.79999 2.01519C5.29999 3.01519 2 7.01517 2 11.8152C2 12.8152 2.2 13.8152 2.5 14.8152C2.7 15.4152 3.4 15.7152 4 15.3152L6.39999 13.9151Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                            <!--end::Icon-->
                                            <!--begin::Description-->
                                            <span class="d-flex flex-column">
                                                <span class="fw-bold text-gray-800 text-hover-primary fs-5">Developer
                                                    Account</span>
                                                <span class="fs-6 fw-semibold text-muted">Use images to your post
                                                    time</span>
                                            </span>
                                            <!--end:Description-->
                                        </span>
                                        <!--end:Label-->
                                        <!--begin:Input-->
                                        <span class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" type="radio" checked="checked"
                                                name="account_plan" value="2" />
                                        </span>
                                        <!--end:Input-->
                                    </label>
                                    <!--end::Option-->
                                    <!--begin:Option-->
                                    <label class="d-flex flex-stack mb-0 cursor-pointer">
                                        <!--begin:Label-->
                                        <span class="d-flex align-items-center me-2">
                                            <!--begin::Icon-->
                                            <span class="symbol symbol-50px me-6">
                                                <span class="symbol-label">
                                                    <!--begin::Svg Icon | path: icons/duotune/graphs/gra008.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-gray-600">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13 10.9128V3.01281C13 2.41281 13.5 1.91281 14.1 2.01281C16.1 2.21281 17.9 3.11284 19.3 4.61284C20.7 6.01284 21.6 7.91285 21.9 9.81285C22 10.4129 21.5 10.9128 20.9 10.9128H13Z"
                                                                fill="currentColor" />
                                                            <path opacity="0.3"
                                                                d="M13 12.9128V20.8129C13 21.4129 13.5 21.9129 14.1 21.8129C16.1 21.6129 17.9 20.7128 19.3 19.2128C20.7 17.8128 21.6 15.9128 21.9 14.0128C22 13.4128 21.5 12.9128 20.9 12.9128H13Z"
                                                                fill="currentColor" />
                                                            <path opacity="0.3"
                                                                d="M11 19.8129C11 20.4129 10.5 20.9129 9.89999 20.8129C5.49999 20.2129 2 16.5128 2 11.9128C2 7.31283 5.39999 3.51281 9.89999 3.01281C10.5 2.91281 11 3.41281 11 4.01281V19.8129Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                            <!--end::Icon-->
                                            <!--begin::Description-->
                                            <span class="d-flex flex-column">
                                                <span class="fw-bold text-gray-800 text-hover-primary fs-5">Testing
                                                    Account</span>
                                                <span class="fs-6 fw-semibold text-muted">Use images to enhance time travel
                                                    rivers</span>
                                            </span>
                                            <!--end:Description-->
                                        </span>
                                        <!--end:Label-->
                                        <!--begin:Input-->
                                        <span class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" type="radio" name="account_plan"
                                                value="3" />
                                        </span>
                                        <!--end:Input-->
                                    </label>
                                    <!--end::Option-->
                                </div>
                                <!--end::Options-->
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
                                <h2 class="fw-bold text-dark">Business Details</h2>
                                <!--end::Title-->
                                <!--begin::Notice-->
                                <div class="text-muted fw-semibold fs-6">If you need more info, please check out
                                    <a href="#" class="link-primary fw-bold">Help Page</a>.
                                </div>
                                <!--end::Notice-->
                            </div>
                            <!--end::Heading-->
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
                                <div class="form-text">Customers will see this shortened version of your statement
                                    descriptor</div>
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
                                        <option value="Memiliki Program 7 Habits "Leader In Me"">Memiliki Program 7 Habits
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
                                <div class="fs-6 text-gray-600 mb-5">Writing headlines for blog posts is as much an art as
                                    it is a science and probably warrants its own post, but for all advise is with what
                                    works for your great &amp; amazing audience.</div>
                                <!--end::Text-->
                                <!--begin::Alert-->
                                <!--begin::Notice-->
                                <div
                                    class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
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
                    <div class="d-flex flex-stack pt-15">
                        <!--begin::Wrapper-->
                        <div class="mr-2">
                            <button type="button" class="btn btn-lg btn-light-primary me-3"
                                data-kt-stepper-action="previous">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                <span class="svg-icon svg-icon-4 me-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="6" y="11" width="13"
                                            height="2" rx="1" fill="currentColor" />
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
                                        <rect opacity="0.5" x="18" y="13" width="13"
                                            height="2" rx="1" transform="rotate(-180 18 13)"
                                            fill="currentColor" />
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
            <!--end::Stepper-->
        </div>
        <!--end::Card body-->
    </div>

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

                    form = stepper.querySelector('#kt_create_account_form');
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
