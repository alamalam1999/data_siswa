@extends('backend.layouts.app')

@section('title', app_name() . ' | Interview Siswa & Orang Tua')

@section('breadcrumb-links')
@endsection

@section('content')
<div class="card overflow-hidden h-xl-100 mb-10">
    <div class="card-header border-bottom-1">
        <h3 class="card-title text-gray-800 fw-bold">Registration : {{ $ppdb->document_no }}</h3>
    </div>
    <div class="card-body">
        <div class="row border-bottom-1">
            <div class="col-lg-3">
                <div class="card border mb-5">
                    <div class="card-body p-5">
                        <?php
                        $sidebarInfo = [
                            'Nama Siswa' => $ppdb->fullname,
                            'Tanggal Daftar' => $ppdb->created_at,
                            'Gelombang' => $ppdb->schedule_name,
                            'Tujuan Sekolah' => 'Sekolah Avicenna -' . $ppdb->school->school_name,
                            'Jenjang & Kelas' => $ppdb->stage . ' - ' . $ppdb->classes,
                        ];
                        ?>
                        @foreach ($sidebarInfo as $field => $item)
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-transparent" value="{{ $item }}" placeholder="Banawi Usada" readonly>
                            <label for="floatingInput">{{ $field }}</label>
                        </div>
                        @endforeach

                    </div>
                </div>

                <div class="card mb-4 bg-white border">

                    <div class="card-body">
                        <h4 class="card-title">
                            {{ $user_ppdb->name }}<br />
                        </h4>

                        <p class="card-text">
                            <small>
                                <i class="fas fa-envelope"></i> {{ $user_ppdb->email }}<br />
                                <i class="fas fa-calendar-check"></i> @lang('strings.frontend.general.joined')
                                {{ timezone()->convertToLocal($user_ppdb->created_at, 'F jS, Y') }}
                            </small>
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                {{-- ---------------------
                        Psikotes
                        Tes Akademik
                        Wawancara Orang Tua
                        Wawancara Siswa
                        Observasi Siswa
                        Hasil Kelulusan Siswa   

                        TO BE :

                        Tes Kesiapan Sekolah (SD)
                        Psikotes (SMP-SMA)
                        Tes Literasi & Numerasi (SMP-SMA)
                        Wawancara Orang Tua
                        Wawancara Siswa (SMP-SMA)
                        Observasi Siswa (KB,TK,SD)

                        --------------------- --}}

                <div class="card card-flush bg-light rounded p-5">

                    <div class="card-header px-0 min-h-50px">
                        <ul id="nav-interview" class="nav nav-tabs nav-line-tabs fs-6 fw-bolder">

                            @if($ppdb->stage=="SD")
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_interview_kesiapan">Tes Kesiapan Sekolah</a>
                            </li>
                            @endif

                            @if($ppdb->stage=="SMP" || $ppdb->stage=="SMA")
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_interview_psikotest">Psikotes</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_interview_akademik">Tes Literasi & Numerasi</a>
                            </li>
                            @endif

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_interview_wwc_orang_tua">Wawancara Orang Tua</a>
                            </li>

                            @if($ppdb->stage=="SMP" || $ppdb->stage=="SMA")
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_interview_wwc_siswa">Wawancara Siswa</a>
                            </li>
                            @endif

                            @if($ppdb->stage=="KB" || $ppdb->stage=="TK" || $ppdb->stage=="SD")
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_interview_observasi_siswa">Observasi Siswa</a>
                            </li>
                            @endif

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_interview_result">Hasil Kelulusan Siswa</a>
                            </li>
                        </ul>
                    </div>
                    <form id="interview-form">
                        <div id="interview-message" class="bg-white p-2"></div>
                        <div id="interview-message-template" class="d-none">
                            <!--begin::Alert-->
                            <div class="alert alert-dismissible bg-light-success border border-success d-flex flex-column flex-sm-row mb-0">
                                <!--begin::Icon-->
                                <span class="svg-icon svg-icon-2hx svg-icon-success me-4 mb-5 mb-sm-0">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="currentColor"></path>
                                        <path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Icon-->

                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column pe-0 pe-sm-10">
                                    <!--begin::Title-->
                                    <h5 class="mb-1">Form Interview berhasil disimpan</h5>
                                    <!--end::Title-->
                                    <!--begin::Content-->
                                    <span>Form data berikut sudah disimpan, namun belum disubmit dikarenakan anda belum menentukan hasil rekapitulasi penilaian dan keputusan pimpinan sekolah. Silakan pilih tab terakhir untuk menentukan hasil Interview.</span>
                                    <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->

                                <!--begin::Close-->
                                <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                                    <i class="bi bi-x fs-1 text-success"></i>
                                </button>
                                <!--end::Close-->
                            </div>
                            <!--end::Alert-->
                        </div>

                        <input type="hidden" name="ppdb_id" value="{{ $ppdb->id }}" />
                        <div class="tab-content" id="tab-interview">

                            @if($ppdb->stage=="SD")
                            <div class="tab-pane fade" id="kt_tab_interview_kesiapan" role="tabpanel">
                                <div class="card rounded-0">
                                    <div class="card-body">
                                        <div class="mb-10 row">
                                            <div class="col-lg-6">
                                                <label for="kesiapan_value" class="form-label">Hasil CPM (GRADE)</label>
                                                <input name="kesiapan_value" type="number" min="0" max="5" class="check-result-value form-control form-control-solid w-100px" placeholder="CPM" value="{{ $ppdb_interview->kesiapan_value > 0 ? $ppdb_interview->kesiapan_value : ''  }}" {{ $is_interviewer_edit ? '' : 'readonly' }} {{ $is_enabled_form ? '':'readonly' }} />
                                            </div>

                                        </div>

                                        <div class="mb-10 row">
                                            <div class="col-lg-6">
                                                <label for="kesiapan_file_upload" class="form-label">Upload Profile Psikologis Kesiapan Sekolah</label>
                                                <input class="form-control interview-file-upload-teacher interview-file-upload" type="file" name="kesiapan_file_upload" id="kesiapan_file_upload" data-target="kesiapan_file" {{ $is_interviewer_edit ? '' : 'readonly' }}  {{ $is_enabled_form ? '':'readonly' }}>
                                                <input type="hidden" name="kesiapan_file" id="kesiapan_file" value="{{ $ppdb_interview->kesiapan_file }}" />

                                                <div class="d-none interview_file_result">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control bg-light" value="nama file tersebut.jpg" readonly>
                                                        <button id="myButtonDelete1" class="btn btn-danger btn-remove-file-teacher btn-remove-file {{ $is_enabled_form ? '':'d-none' }}" type="button">Delete</button>
                                                    </div>
                                                    <a href="#" target="_blank" class="ms-3">Download File</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-5 row">
                                            <div class="col-lg-6">
                                                <label class="form-label mb-5">Hasil NST</label>
                                                @for ($i = 3; $i < count($result_interview); $i++) <div class="form-check form-check-custom form-check-solid mb-5">
                                                    <input class="check-result form-check-input" type="radio" name="kesiapan_result" value="{{ $i + 1 }}" id="kesiapan_result_{{ $i }}" {{ $ppdb_interview->kesiapan_result == ($i+1) ? 'checked':'' }} {{ $is_enabled_form ? '':'disabled' }} />
                                                    <label class="form-check-label" for="kesiapan_result_{{ $i }}">
                                                        {{ $result_interview[$i] }}
                                                    </label>
                                            </div>
                                            @endfor
                                            <textarea name="kesiapan_result_note" rows="5" class="textarea-teacher form-control form-control-solid" {{ ($ppdb_interview->psikotest_result_note != '' ? '':'readonly') }} {{ $is_enabled_form ? '':'readonly' }}>{{ $ppdb_interview->psikotest_result_note }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end py-6">
                                    <button type="button" class="btn-save btn btn-primary btn-teacher">Save Changes</button>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($ppdb->stage=="SMP" || $ppdb->stage=="SMA")
                        <div class="tab-pane fade" id="kt_tab_interview_psikotest" role="tabpanel">
                            <div class="card rounded-0">
                                <div class="card-body">
                                    <div class="mb-10 row">
                                        <div class="col-lg-6">
                                            <label for="psikotest_value" class="form-label">Hasil Psikotest
                                                (IQ)</label>
                                            <input name="psikotest_value" type="number" class="check-result-value form-control form-control-solid w-100px" placeholder="IQ" value="{{ $ppdb_interview->psikotest_value > 0 ? $ppdb_interview->psikotest_value : ''  }}" {{ $is_interviewer_edit ? '' : 'readonly' }} {{ $is_enabled_form ? '':'readonly' }} />
                                        </div>

                                    </div>

                                    <div class="mb-10 row">
                                        <div class="col-lg-6">
                                            <label for="psikotest_file_upload" class="form-label">Upload Hasil
                                                Psikotest</label>
                                            <input class="form-control interview-file-upload-teacher interview-file-upload" type="file" name="psikotest_file_upload" id="psikotest_file_upload" data-target="psikotest_file" {{ $is_enabled_form ? '':'readonly' }}>
                                            <input type="hidden" name="psikotest_file" id="psikotest_file" value="{{ $ppdb_interview->psikotest_file }}" {{ $is_enabled_form ? '':'readonly' }} />

                                            <div class="d-none interview_file_result">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control bg-light" value="nama file tersebut.jpg" readonly>

                                                    <button class="btn btn-danger btn-remove-file-teacher btn-remove-file {{ $is_enabled_form ? '':'d-none' }}" type="button">Delete</button>
                                                </div>
                                                <a href="#" target="_blank" class="ms-3">Download File</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-5 row">
                                        <div class="col-lg-6">
                                            <label class="form-label mb-5">Hasil Psikotest</label>
                                            @for ($i = 0; $i < count($result_interview); $i++) <div class="form-check form-check-custom form-check-solid mb-5">
                                                <input class="check-result form-check-input" type="radio" name="psikotest_result" value="{{ $i + 1 }}" id="psikotest_result_{{ $i }}" {{ $ppdb_interview->psikotest_result == ($i+1) ? 'checked':'' }} {{ $is_enabled_form ? '':'disabled' }} />
                                                <label class="form-check-label" for="psikotest_result_{{ $i }}">
                                                    {{ $result_interview[$i] }}
                                                </label>
                                        </div>
                                        @endfor
                                        <textarea name="psikotest_result_note" rows="5" class="textarea-teacher form-control form-control-solid" {{ ($ppdb_interview->psikotest_result_note != '' ? '':'readonly') }} {{ $is_enabled_form ? '':'readonly' }}>{{ $ppdb_interview->psikotest_result_note }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end py-6">
                                <button type="button" class="btn-save btn btn-primary btn-teacher">Save Changes</button>
                            </div>
                        </div>

                </div>

                <div class="tab-pane fade" id="kt_tab_interview_akademik" role="tabpanel">

                    <div class="card rounded-0">
                        <div class="card-body">
                            <div class="mb-10 row">
                                <div class="col-lg-4">
                                    <label for="academic_value" class="form-label">Hasil Tes
                                        Literasi & Numerasi</label>
                                    <input name="academic_value" id="academic_value" type="number" class="check-result-value form-control form-control-solid w-150px" placeholder="Hasil" value="{{ $ppdb_interview->academic_value > 0 ? $ppdb_interview->academic_value : ''  }}" {{ $is_enabled_form ? '':'readonly' }} />
                                </div>

                            </div>

                            <div class="mb-10 row">
                                <div class="col-lg-6">
                                    <label for="academic_file_upload" class="form-label">Upload Hasil
                                        Literasi & Numerasi</label>
                                    <input class="form-control interview-file-upload-teacher interview-file-upload" type="file" name="academic_file_upload" id="academic_file_upload" data-target="academic_file" {{ $is_enabled_form ? '':'readonly' }}>
                                    <input type="hidden" name="academic_file" id="academic_file" value="{{ $ppdb_interview->academic_file }}" />

                                    <div class="d-none interview_file_result">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control bg-light" value="nama file tersebut.jpg" readonly>

                                            <button class="btn btn-danger btn-remove-file-teacher btn-remove-file {{ $is_enabled_form ? '':'d-none' }}" type="button">Delete</button>
                                        </div>
                                        <a href="#" target="_blank" class="ms-3">Download File</a>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5 row">
                                <div class="col-lg-6">
                                    <label class="form-label mb-5">Hasil Literasi & Numerasi</label>
                                    @for ($i = 0; $i < count($result_interview); $i++) <div class="form-check form-check-custom form-check-solid mb-5">
                                        <input class="check-result form-check-input" type="radio" name="academic_result" value="{{ $i + 1 }}" id="academic_result_{{ $i }}" {{ $ppdb_interview->academic_result == ($i+1) ? 'checked':'' }} {{ $is_enabled_form ? '':'disabled' }} />
                                        <label class="form-check-label" for="academic_result_{{ $i }}">
                                            {{ $result_interview[$i] }}
                                        </label>
                                </div>
                                @endfor
                                <textarea name="academic_result_note" rows="5" class="textarea-teacher form-control form-control-solid" {{ ($ppdb_interview->academic_result_note != '' ? '':'readonly') }} {{ $is_enabled_form ? '':'readonly' }}>{{ $ppdb_interview->academic_result_note }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end py-6">
                        <button type="button" class="btn-save btn btn-primary btn-teacher">Save Changes</button>
                    </div>
                </div>


            </div>
            @endif

            <div class="tab-pane fade" id="kt_tab_interview_wwc_orang_tua" role="tabpanel">

                <div class="card rounded-0">
                    <div class="card-body">
                        <div class="mb-10">
                            <label for="interview_parent_summary" class="form-label">Ringkasan
                                Hasil Wawancara Orang Tua</label>
                            <textarea rows="8" name="interview_parent_summary" id="interview_parent_summary" class="textarea-teacher form-control" placeholder="Tuliskan Ringkasannya" {{ $is_enabled_form ? '':'readonly' }}>{{ $ppdb_interview->interview_parent_summary }}</textarea>
                        </div>


                        <div class="mb-10 row">

                            <div class="col-lg-6">
                                <label for="interview_parent_file_upload" class="form-label">Upload
                                    Hasil
                                    Wawancara</label>
                                <input id="inputUpload2" class="form-control interview-file-upload-teacher interview-file-upload" type="file" name="interview_parent_file_upload" id="interview_parent_file_upload" data-target="interview_parent_file" {{ $is_enabled_form ? '':'readonly' }}>
                                <input type="hidden" name="interview_parent_file" id="interview_parent_file" value="{{ $ppdb_interview->interview_parent_file }}" />

                                <div class="d-none interview_file_result">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control bg-light" value="nama file tersebut.jpg" readonly>

                                        <button id="myButtonDelete2" class="btn btn-danger btn-remove-file-teacher btn-remove-file  {{ $is_enabled_form ? '':'d-none' }}" type="button">Delete</button>
                                    </div>
                                    <a href="#" target="_blank" class="ms-3">Download File</a>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5 row">

                            <div class="col-lg-6">
                                <label class="form-label mb-5">Hasil Interview Orang Tua</label>
                                @for ($i = 0; $i < count($result_interview_parent_sd); $i++) <div class="form-check form-check-custom form-check-solid mb-5">
                                    <input class="check-result form-check-input" type="radio" name="interview_parent_result" value="{{ $i + 1 }}" id="interview_parent_result_{{ $i }}" {{ $ppdb_interview->interview_parent_result == ($i+1) ? 'checked':'' }} {{ $is_enabled_form ? '':'disabled' }} />
                                    <label class="form-check-label" for="interview_parent_result_{{ $i }}">
                                        {{ $result_interview_parent_sd[$i] }}
                                    </label>
                            </div>
                            @endfor
                            <textarea name="interview_parent_result_note" rows="5" class="textarea-teacher form-control form-control-solid" {{ ($ppdb_interview->interview_parent_result_note != '' ? '':'readonly') }} {{ $is_enabled_form ? '':'readonly' }}>{{ $ppdb_interview->interview_parent_result_note }}</textarea>

                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end py-6">
                @if($ppdb_interview->school_recomendation_result < 1)
                <button type="button" class="btn-save btn btn-primary btn-teacher">Save Changes</button>
                @endif
                    
                </div>
            </div>


        </div>

        @if($ppdb->stage=="SMP" || $ppdb->stage=="SMA")
        <div class="tab-pane fade" id="kt_tab_interview_wwc_siswa" role="tabpanel">

            <div class="card rounded-0">
                <div class="card-body">
                    <div class="mb-10">
                        <label for="interview_student_summary" class="form-label">Ringkasan
                            Hasil Wawancara Siswa</label>
                        <textarea rows="8" class="textarea-teacher form-control" name="interview_student_summary" id="interview_student_summary" placeholder="Tuliskan Ringkasannya" {{ $is_enabled_form ? '':'readonly' }}>{{ $ppdb_interview->interview_student_summary }}</textarea>
                    </div>

                    <div class="mb-10 row">

                        <div class="col-lg-6">
                            <label for="interview_student_file_upload" class="form-label">Upload
                                Hasil
                                Wawancara</label>
                            <input class="form-control interview-file-upload-teacher interview-file-upload" type="file" name="interview_student_file_upload" id="interview_student_file_upload" data-target="interview_student_file" {{ $is_enabled_form ? '':'readonly' }}>
                            <input type="hidden" name="interview_student_file" id="interview_student_file" value="{{ $ppdb_interview->interview_student_file }}" />

                            <div class="d-none interview_file_result">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control bg-light" value="nama file tersebut.jpg" readonly>

                                    <button class="btn btn-danger btn-remove-file-teacher btn-remove-file {{ $is_enabled_form ? '':'d-none' }}" type="button">Delete</button>
                                </div>
                                <a href="#" target="_blank" class="ms-3">Download File</a>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5 row">

                        <div class="col-lg-6">
                            <label class="form-label mb-5">Hasil Interview Siswa</label>
                            @for ($i = 0; $i < count($result_interview); $i++) <div class="form-check form-check-custom form-check-solid mb-5">
                                <input class="check-result form-check-input" type="radio" name="interview_student_result" value="{{ $i + 1 }}" id="interview_student_result_{{ $i }}" {{ $ppdb_interview->interview_student_result == ($i+1) ? 'checked':'' }} {{ $is_enabled_form ? '':'disabled' }} />
                                <label class="form-check-label" for="interview_student_result_{{ $i }}">
                                    {{ $result_interview[$i] }}
                                </label>
                        </div>
                        @endfor
                        <textarea name="interview_student_result_note" rows="5" class="textarea-teacher form-control form-control-solid" {{ ($ppdb_interview->interview_student_result_note != '' ? '':'readonly') }}>{{ $ppdb_interview->interview_student_result_note }}</textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end py-6">
            @if($ppdb_interview->school_recomendation_result < 1)
                <button type="button" class="btn-save btn btn-primary btn-teacher">Save Changes</button>
                @endif
            </div>
        </div>


    </div>
    @endif

    @if($ppdb->stage=="KB" || $ppdb->stage=="TK" || $ppdb->stage=="SD")
    <div class="tab-pane fade" id="kt_tab_interview_observasi_siswa" role="tabpanel">

        <div class="card rounded-0">
            <div class="card-body">
                <div class="mb-10 row">
                    <div class="col-lg-5">
                        <label for="observasi_value" class="form-label">Nilai Hasil
                            Observasi Siswa<span class="text-danger">*</span></label>
                        <input name="observasi_value" id="observasi_value" type="number" class="check-result-value form-control form-control-solid w-150px" placeholder="Hasil Akademik" value="{{ $ppdb_interview->observasi_value }}" {{ $is_enabled_form ? '':'readonly' }} />
                    </div>

                </div>

                <div class="mb-10">
                    <label for="observasi_summary" class="form-label">Ringkasan
                        Hasil Observasi Siswa</label>
                    <textarea rows="5" class="textarea-teacher form-control" name="observasi_summary" id="observasi_summary" placeholder="Tuliskan Ringkasannya" {{ $is_enabled_form ? '':'readonly' }}>{{ $ppdb_interview->observasi_summary }}</textarea>
                </div>

                <div class="mb-10 row">
                    <div class="col-lg-6">
                        <label for="observasi_file_upload" class="form-label">Upload Hasil
                            Akademik</label>
                        <input id="inputUpload3" class="form-control interview-file-upload-teacher interview-file-upload" type="file" name="observasi_file_upload" id="observasi_file_upload" data-target="observasi_file" {{ $is_enabled_form ? '':'readonly' }}>
                        <input type="hidden" name="observasi_file" id="observasi_file" value="{{ $ppdb_interview->observasi_file }}" />

                        <div class="d-none interview_file_result">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control bg-light" value="nama file tersebut.jpg" readonly>
                                <button id="myButtonDelete3" class="btn btn-danger btn-remove-file-teacher btn-remove-file {{ $is_enabled_form ? '':'d-none' }}" type="button">Delete</button>
                            </div>
                            <a href="#" target="_blank" class="ms-3">Download File</a>
                        </div>
                    </div>
                </div>

                <div class="mb-5 row">
                    <div class="col-lg-6">
                        <label class="form-label mb-5">Hasil Observasi Siswa</label>
                        @for ($i = 0; $i < count($result_interview_parent_sd); $i++) <div class="form-check form-check-custom form-check-solid mb-5">
                            <input class="check-result form-check-input" type="radio" name="observasi_result" value="{{ $i + 1 }}" id="observasi_result_{{ $i }}" {{ $ppdb_interview->observasi_result == ($i+1) ? 'checked':'' }} {{ $is_enabled_form ? '':'disabled' }} />
                            <label class="form-check-label" for="observasi_result_{{ $i }}">
                                {{ $result_interview_parent_sd[$i] }}
                            </label>
                    </div>
                    @endfor
                    <textarea name="observasi_result_note" rows="5" class="textarea-teacher form-control form-control-solid" {{ ($ppdb_interview->observasi_result_note != '' ? '':'readonly') }} {{ $is_enabled_form ? '':'readonly' }}>{{ $ppdb_interview->observasi_result_note }}</textarea>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end py-6">
        @if($ppdb_interview->school_recomendation_result < 1)
            <button type="button" class="btn-save btn btn-primary">Save Changes</button>
            @endif
        </div>
    </div>
</div>
@endif

<div class="tab-pane fade" id="kt_tab_interview_result" role="tabpanel">

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
                                    <a href="#" target="_blank" id="value" class="initest fs-6">view</a>
                                </div>
                            </td>
                            <td>
                                <input name="kesiapan_value_result" id="kesiapan_value_result" type="number" class="form-control form-control-solid w-100px form-control-transparent" value="{{ $ppdb_interview->kesiapan_value }}" readonly />

                            </td>
                            <td id="kesiapan_value_label">
                                <?php
                                if ($ppdb_interview->kesiapan_result == 4) echo '<div style="text-align: center;"  class="mt-3 fw-bold fs-5"><span class="badge badge-success">Siap Sekolah</span>';
                                if ($ppdb_interview->kesiapan_result == 5) echo '<div style="text-align: center;" class="mt-3 fw-bold fs-5"><span class="badge badge-danger">Tidak Direkomendasikan</span></div>';
                                if ($ppdb_interview->kesiapan_result == 6) echo '<div class="mt-3 fw-bold fs-5"><span class="badge badge-warning">Dipertimbangkan dengan cacatan</span></div>';
                                ?>
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
                                    <a href="#" target="_blank" id="value" class="initest fs-6">view</a>
                                </div>
                            </td>
                            <td>
                                <input name="psikotest_value_result" id="psikotest_value_result" type="number" class="form-control form-control-solid w-100px form-control-transparent" value="{{ $ppdb_interview->psikotest_value }}" readonly />
                            </td>
                            <td id="psikotest_value_label" class="mt-4 fw-bold fs-1">
                                <?php
                                if ($ppdb_interview->psikotest_result == 1) echo '<div style="text-align: center;"  class="mt-3 fw-bold fs-5"><span class="badge badge-success">Direkomendasikan</span>';
                                if ($ppdb_interview->psikotest_result == 2) echo '<div style="text-align: center;" class="mt-3 fw-bold fs-5"><span class="badge badge-danger">Tidak Direkomendasikan</span></div>';
                                if ($ppdb_interview->psikotest_result == 3) echo '<div class="mt-3 fw-bold fs-5"><span class="badge badge-warning">Dipertimbangkan dengan cacatan</span></div>';
                                ?>
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
                                    <a href="#" target="_blank" id="value" class="initest fs-6">view</a>
                                </div>
                            </td>
                            <td>
                                <input name="academic_value_result" id="academic_value_result" type="number" class="form-control form-control-solid w-150px form-control-transparent" value="{{ $ppdb_interview->academic_value }}" readonly />
                            </td>
                            <td id="academic_value_label">
                                <?php
                                if ($ppdb_interview->academic_result == 1) echo '<div style="text-align: center;"  class="mt-3 fw-bold fs-5"><span class="badge badge-success">Direkomendasikan</span>';
                                if ($ppdb_interview->academic_result == 2) echo '<div style="text-align: center;" class="mt-3 fw-bold fs-5"><span class="badge badge-danger">Tidak Direkomendasikan</span></div>';
                                if ($ppdb_interview->academic_result == 3) echo '<div class="mt-3 fw-bold fs-5"><span class="badge badge-warning">Dipertimbangkan dengan cacatan</span></div>';
                                ?>
                            </td>
                        </tr>
                        @endif

                        <tr>
                            <td class="fs-5 fw-bold">Wawancara Orang Tua</td>
                            <td>
                                <div class="mt-4 fw-bold fs-5">
                                    <a href="#" target="_blank" id="value" class="initest fs-6">view</a>
                                </div>
                            </td>
                            <td>
                                <input id="interview_parent" type="text" class="form-control form-control-solid w-150px form-control-transparent d-none" value="" readonly />
                            </td>
                            <td id="interview_parent_value_label">
                                <?php
                                if ($ppdb_interview->interview_parent_result == 1) echo '<div style="text-align: center;"  class="mt-3 fw-bold fs-5"><span class="badge badge-success">Direkomendasikan</span>';
                                if ($ppdb_interview->interview_parent_result == 2) echo '<div style="text-align: center;" class="mt-3 fw-bold fs-5"><span class="badge badge-danger">Tidak Direkomendasikan</span></div>';
                                if ($ppdb_interview->interview_parent_result == 3) echo '<div class="mt-3 fw-bold fs-5"><span class="badge badge-warning">Dipertimbangkan dengan cacatan</span></div>';
                                ?>
                            </td>
                        </tr>
                        @if($ppdb->stage=="SMP" || $ppdb->stage=="SMA")
                        <tr>
                            <td class="fs-5 fw-bold">Wawancara Siswa</td>
                            <td>
                                <div class="mt-4 fw-bold fs-5">
                                    <a href="#" target="_blank" id="value" class="initest fs-6">view</a>
                                </div>
                            </td>
                            <td>
                                <input id="interview_student_value_result" type="text" class="form-control form-control-solid w-150px form-control-transparent d-none" value="" readonly />
                            </td>
                            <td id="interview_student_value_label">
                                <?php
                                if ($ppdb_interview->interview_student_result == 1) echo '<div style="text-align: center;"  class="mt-3 fw-bold fs-5"><span class="badge badge-success">Direkomendasikan</span>';
                                if ($ppdb_interview->interview_student_result == 2) echo '<div style="text-align: center;" class="mt-3 fw-bold fs-5"><span class="badge badge-danger">Tidak Direkomendasikan</span></div>';
                                if ($ppdb_interview->interview_student_result == 3) echo '<div class="mt-3 fw-bold fs-5"><span class="badge badge-warning">Dipertimbangkan dengan cacatan</span></div>';
                                ?>
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
                                    <a href="#" target="_blank" id="value" class="initest fs-6">view</a>
                                </div>
                            </td>
                            <td>
                                <input name="observasi_value_result" id="observasi_value_result" type="number" class="form-control form-control-solid w-150px form-control-transparent" value="{{ $ppdb_interview->observasi_value }}" readonly />
                            </td>
                            <td id="observasi_value_label">
                                <?php
                                if ($ppdb_interview->observasi_result == 1) echo '<div style="text-align: center;"  class="mt-3 fw-bold fs-5"><span class="badge badge-success">Direkomendasikan</span>';
                                if ($ppdb_interview->observasi_result == 2) echo '<div style="text-align: center;" class="mt-3 fw-bold fs-5"><span class="badge badge-danger">Tidak Direkomendasikan</span></div>';
                                if ($ppdb_interview->observasi_result == 3) echo '<div class="mt-3 fw-bold fs-5"><span class="badge badge-warning">Dipertimbangkan dengan cacatan</span></div>';
                                ?>
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
                        <input type="hidden" name="school_recomendation_file" id="school_recomendation_file" value="{{ $ppdb_interview->school_recomendation_file }}" />

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
                        <label class="btn bg-white btn-outline-secondary text-gray-800 text-hover-white text-active-white btn-outline btn-active-success min-w-300px {{ $ppdb_interview->school_recomendation_result == 1 ? 'active':'' }}" data-kt-button="true">
                            <!--begin::Input-->
                            <input class="btn-check" type="radio" name="school_recomendation_result" value="1" {{ $ppdb_interview->school_recomendation_result == 1 ? 'checked':'' }}  {{ $is_enabled_form ? '':'disabled' }} />
                            <!--end::Input-->
                            Direkomendasikan
                        </label>
                        <!--end::Radio-->

                        <!--begin::Radio-->
                        <label class="btn bg-white btn-outline-secondary text-gray-800 text-hover-white text-active-white btn-outline btn-active-danger min-w-300px {{ $ppdb_interview->school_recomendation_result == 2 ? 'active':'' }}" data-kt-button="true">
                            <!--begin::Input-->
                            <input class="btn-check" type="radio" name="school_recomendation_result" value="2" {{ $ppdb_interview->school_recomendation_result == 2 ? 'checked':'' }} {{ $is_enabled_form ? '':'disabled' }} />
                            <!--end::Input-->
                            Tidak direkomendasikan
                        </label>
                        <!--end::Radio-->

                        <!--begin::Radio-->
                        <label class="btn bg-white btn-outline-secondary text-gray-800 text-hover-white text-active-white btn-outline btn-active-warning min-w-300px fs-6 {{ $ppdb_interview->school_recomendation_result == 3 ? 'active':'' }}" data-kt-button="true">
                            <!--begin::Input-->
                            <input class="btn-check" type="radio" name="school_recomendation_result" value="3" {{ $ppdb_interview->school_recomendation_result == 3 ? 'checked':'' }} {{ $is_enabled_form ? '':'disabled' }} />
                            <!--end::Input-->
                            Di pertimbangkan
                        </label>
                        <!--end::Radio-->

                    </div>
                    <!--end::Radio group-->
                </div>

                <div class="mb-5 ps-5">
                    <label class="form-label">Note</label>
                    <textarea name="school_recomendation_note" rows="5" class="textarea-teacher form-control" {{ $is_enabled_form ? '':'readonly' }}>{{ $ppdb_interview->school_recomendation_note }}</textarea>
                </div>

            </div>


            @if($is_enabled_form)
            <div class="bg-light-warning mb-5 ps-5 d-flex flex-stack w-lg-100 p-5 rounded px-10">
                <!--begin::Label-->
                <div class="me-5">
                    <label class="fs-6 fw-bolder text-gray-900 form-label">Konfirmasi Persetujuan</label>
                    <div class="fs-7 fw-semibold text-gray-700">Saya sudah memastikan bahwa hasil penilaian dan rekomendasi dari sekolah sebagai tertera diatas</div>
                </div>
                <!--end::Label-->

                <!--begin::Switch-->
                <label class="form-check form-switch form-check-custom form-check-solid">
                    <input id="form-confirmation" class="form-check-input" type="checkbox" value="1">
                </label>
                <!--end::Switch-->
            </div>
            @endif


            @if($ppdb_interview->school_recomendation_result > 0)
            <div class="border-top my-5 border border-success p-5 border-2 rounded bg-light-success">
                <div class="fs-5 fw-bolder form-label px-5">Berikut ini adalah penilaian dan rekomendasi dari R&D YPAP :</div>

                <div class="mb-10 px-5">
                    <!--begin::Radio group-->
                    <div class="btn-group w-100"  {{ $is_enabled_rnd ? 'data-kt-buttons=true data-kt-buttons-target=[data-kt-button]':''}}>
                        <!--begin::Radio-->
                        <label class="btn bg-white btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success min-w-300px {{ $ppdb_interview->interview_result == 1 ? 'active':'' }}" data-kt-button="true">
                            <!--begin::Input-->
                            <input class="btn-check" type="radio" name="interview_result" value="1" {{ $ppdb_interview->interview_result == 1 ? 'checked':'' }} {{ $is_enabled_rnd ? 'disabled':''}} />
                            <!--end::Input-->
                            Lulus
                        </label>
                        <!--end::Radio-->

                        <!--begin::Radio-->
                        <label class="btn bg-white btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-danger min-w-300px {{ $ppdb_interview->interview_result == 2 ? 'active':'' }}" data-kt-button="true">
                            <!--begin::Input-->
                            <input class="btn-check" type="radio" name="interview_result" value="2" {{ $ppdb_interview->interview_result == 2 ? 'checked':'' }} {{ $is_enabled_rnd ? 'disabled':''}}  />
                            <!--end::Input-->
                            Tidak Lulus
                        </label>
                        <!--end::Radio-->

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

                @if($is_enabled_rnd)
                <div class="bg-light-warning mb-5 ps-5 d-flex flex-stack w-lg-100 p-5 rounded px-10">
                    <!--begin::Label-->
                    <div class="me-5">
                        <label class="fs-6 fw-bolder text-gray-900 form-label">Konfirmasi Persetujuan</label>
                        <div class="fs-7 fw-semibold text-gray-700">Saya sudah memastikan bahwa hasil penilaian dan rekomendasi dari sekolah sebagai tertera diatas</div>
                    </div>
                    <!--end::Label-->

                    <!--begin::Switch-->
                    <label class="form-check form-switch form-check-custom form-check-solid">
                        <input id="form-confirmation" class="form-check-input" type="checkbox" value="1">
                    </label>
                    <!--end::Switch-->
                </div>
                @endif

            @endif




            @if($is_enabled_submit)
            <div class="bg-success mb-5 ps-5 d-flex flex-stack w-lg-100 p-5 rounded px-10">
                <!--begin::Label-->
                <div class="me-5">
                    <label class="fs-6 fw-bolder text-white form-label">Konfirmasi Persetujuan</label>
                    <div class="fs-7 fw-semibold text-white">Saya sudah memastikan bahwa hasil rekapitulasi penilaian dan keputusan adalah sebagai tertera diatas</div>
                </div>
                <!--end::Label-->

                <!--begin::Switch-->
                <label class="form-check form-switch form-check-custom form-check-solid">
                    <input id="form-confirmation-submit" class="form-check-input" type="checkbox" value="1">
                </label>
                <!--end::Switch-->
            </div>
            @endif




        </div>
        @if(($is_interviewer && $ppdb_interview->school_recomendation_result < 1) || ($is_rnd && $ppdb_interview->school_recomendation_result > 0))
        <div class="card-footer d-flex justify-content-end py-6">
            <button id="btn-submit" type="button" class="btn-save btn btn-success" data-save="SUBMIT" disabled>Submit</button>
        </div>
        @endif

        @if($is_enabled_submit)
        <div class="card-footer d-flex justify-content-end py-6">
            <button id="btn-submit-confirmation" type="button" class="btn btn-primary" data-save="SUBMIT" disabled>Submit</button>
        </div>
        @endif

    </div>
</div>

</div>
</form>

</div>




</div>
</div>
</div>
</div>
@endsection

@section('pagestyle')
<style>
    .swal2-popup {
        width: 50em;
    }
</style>
@stop


@section('pagescript')
<input type="hidden" name="URI_UPLOAD_IMAGE" value="{{ route('admin.interview.upload') }}" />
<input type="hidden" name="URI_INTERVIEW_LIST" value="{{ route('admin.interview.index') }}" />
<input type="hidden" name="URI_INTERVIEW_STORE" value="{{ route('admin.interview.store') }}" />
<input type="hidden" name="URI_INTERVIEW_SUBMIT" value="{{ route('admin.interview.submit') }}" />


<script>
    var result_interview = <?php echo json_encode($result_interview); ?>;

    var URI_UPLOAD_IMAGE = $('input[name="URI_UPLOAD_IMAGE"]').val();
    var URI_INTERVIEW_LIST = $('input[name="URI_INTERVIEW_LIST"]').val();
    var URI_INTERVIEW_STORE = $('input[name="URI_INTERVIEW_STORE"]').val();
    var URI_INTERVIEW_SUBMIT = $('input[name="URI_INTERVIEW_SUBMIT"]').val();

</script>

@if($is_rnd)
<input type="hidden" name="URI_INTERVIEW_RND" value="{{ route('admin.interview.rnd') }}" />
<script>
    var URI_INTERVIEW_RND = $('input[name="URI_INTERVIEW_RND"]').val();
</script>
<script src="{{ asset('assets/js/pages/admin/rnd.form.js') }}?v=1.0.1"></script>
@else
<script src="{{ asset('assets/js/pages/admin/interview.form.js') }}?v=1.0.1"></script>
@endif


@stop