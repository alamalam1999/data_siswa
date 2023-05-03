@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard'))


@section('content')
<form id="form-upload-document" action="{{ route('frontend.user.upload_document') }}">
  <input type="hidden" id="ppdb_id" name="ppdb_id" value="{{ $ppdb->id }}" />
  <div class="card overflow-hidden h-xl-100 mb-10">
    <div class="card-header py-5">
      <!--begin::Title-->
      <h3 class="card-title align-items-start flex-column">
        <span class="card-label fw-bold text-dark">Dokumen Pendukung</span>
        <span class="text-gray-400 mt-1 fw-semibold fs-6">Jika Anda membutuhkan info lebih lanjut, silakan periksa hubungi admin</span>
      </h3>
      <!--end::Title-->
    </div>

    <div class="card-body">
      <!--begin::Wrapper-->
      <div class="w-100">



        <!--begin::Label-->
        <label class="family_card fs-2 fw-bold form-label mb-2">Document Informasi Orang Tua</label>
        <div class="text-muted fw-bold fs-6 mb-5">Jika calon Orang Tua siswa belum melengkapi beberapa document dibawah ini</div>
        <!--end::Label-->

        <!--begin::Step 4-->
        <div data-kt-stepper-element="content">
          <!--begin::Wrapper-->
          <div class="w-100">
           
            <div id="school-grade" class="row mb-3 fv-row">
              <div class="col-md-6">
                <!--begin::Input group-->
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
                <div class=" mb-5">
                  <label class="form-label fw-bolder text-dark fs-6">Nama Ayah</label>
                  <input name="name_father" class="form-control form-control-lg form-control-solid" type="text" value="{{ ($data1 =='' && $data1 == null) ? '' : $data1[0] }}" autocomplete="off"/>
                </div>
                <!--end::Input group-->
              </div>
              <div class="col-md-6">
                <!--begin::Input group-->
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
                <div class=" mb-5">
                  <label class="form-label fw-bolder text-dark fs-6">Nama Ibu</label>
                  <input name="name_mother" class="form-control form-control-lg form-control-solid" type="text" value="{{ ($data1 =='' && $data1 == null) ? '' : $data1[0] }}" autocomplete="off"  />
                </div>
                <!--end::Input group-->
              </div>
            </div>

            <div id="school-grade" class="row mb-3 fv-row">

              <div class="col-md-6">
                <!--begin::Input group-->
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
                <div class=" mb-5">
                  <label class="form-label fw-bolder text-dark fs-6">Pekerjaan Ayah</label>
                  <select name="name_work_father" class="form-select form-select-solid" value="">
                      <option value="{{ ($dataworkfather =='' && $dataworkfather == null) ? '' : $dataworkfather }}" selected>{{ ($dataworkfather =='' && $dataworkfather == null) ? '' : $dataworkfather }}</option>
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
                <div class=" mb-5">
                  <label class="form-label fw-bolder text-dark fs-6">Pekerjaan Ibu</label>
                  <select name="name_work_mother" class="form-select form-select-solid" value="">
                      <option value="{{ ($dataworkmother =='' && $dataworkmother == null) ? '' : $dataworkmother}}" selected>{{ ($dataworkmother =='' && $dataworkmother == null) ? '' : $dataworkmother}}</option>
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

            <div id="school-grade" class="row mb-3 fv-row">
              <div class="col-md-6">
                <!--begin::Input group-->
                <?php
                if ($file_additional_tiga !='' && $file_additional_tiga != null && !empty($file_additional_tiga) && $file_additional_tiga != '[]') { 
                      $array= array_column($file_additional_tiga, 'place_work_father');
                        if ($array != '' && $array != null) { $placeworkfather = $array; } 
                        else { $placeworkfather = ''; }
                    }else {
                      $placeworkfather = '';
                    }
                  ?>
                <div class=" mb-5">
                  <label class="form-label fw-bolder text-dark fs-6">Tempat Pekerjaan Ayah</label>
                  <input name="place_work_father" class="form-control form-control-lg form-control-solid" type="text" value="{{ ($placeworkfather =='' && $placeworkfather == null) ? '' : $placeworkfather[0]}}" />
                </div>
                <!--end::Input group-->
              </div>
              <div class="col-md-6">
                <!--begin::Input group-->
                <?php
                if ($file_additional_tiga !='' && $file_additional_tiga != null && !empty($file_additional_tiga) && $file_additional_tiga != '[]') { 
                  $array= array_column($file_additional_tiga, 'place_work_mother');
                    if ($array != '' && $array != null) { $placeworkmother = $array; } 
                    else { $placeworkmother = ''; }

                  }else {
                    $placeworkmother = '';
                  }
                ?>
                <div class=" mb-5">
                  <label class="form-label fw-bolder text-dark fs-6">Tempat Pekerjaan Ibu</label>
                  <input name="place_work_mother" class="form-control form-control-lg form-control-solid" type="text"  value="{{ ($placeworkmother =='' && $placeworkmother == null) ? '' : $placeworkmother[0]}}" />
                </div>
                <!--end::Input group-->
              </div>
            </div>

            <div id="school-grade" class="row mb-3 fv-row">
              <div class="col-md-6">
                  <!--begin::Input group-->
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
                  <div class=" mb-5">
                    <label class="form-label fw-bolder text-dark fs-6">Jabatan dalam pekerjaan Ayah</label>
                    <select name="title_work_father" class="form-select form-select-solid" value="">
                        <option value="{{ ($titleworkfather =='' && $titleworkfather == null) ? '' : $titleworkfather}}" selected>{{ ($titleworkfather =='' && $titleworkfather == null) ? '' : $titleworkfather}}</option>
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
                <div class=" mb-5">
                  <label class="form-label fw-bolder text-dark fs-6">Jabatan dalam pekerjaan Ibu</label>
                  <select name="title_work_mother" class="form-select form-select-solid" value="">
                      <option value="{{ ($titleworkmother =='' && $titleworkmother == null) ? '' : $titleworkmother}}" selected>{{ ($titleworkmother =='' && $titleworkmother == null) ? '' : $titleworkmother}}</option>
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

            <div id="school-grade" class="row fv-row">
              <div class="col-md-6">
                <div class="row mb-5 fv-row">
                  <div class="col-md-6">
                    <!--begin::Input group-->
                    <?php
                          if ($file_additional_lima !='' && $file_additional_lima != null && !empty($file_additional_lima) && $file_additional_lima != '[]') { 
                            $array= array_column($file_additional_lima, 'gaji_tetap_ayah');
                                if ($array != '' && $array != null) { $gajiworkayah = $array;
                                     } else { $gajiworkayah = ''; }
                                      }else {
                                              $gajiworkayah = '0';
                                            }
                      ?>
                    <div class="fv-row mb-5">
                      <label class="form-label fw-bolder text-dark fs-6">Penghasilan Tetap</label>
                      <input class="form-control form-control-lg form-control-solid" type="number" placeholder="Nominal Tetap" name="gaji_tetap_ayah" value="{{ ($gajiworkayah =='' && $gajiworkayah == null) ? '' : $gajiworkayah[0]}}" autocomplete="off" />
                    </div>
                    <!--end::Input group-->
                  </div>
                  <div class="col-md-6">
                    <!--begin::Input group-->
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
                            } else if ($incomeworkayah[0] == 5) { $incomeworkayah = ' > Rp. 20.000.000'; } 

                        }else {
                            $incomeworkayah = '';
                      }
                      }else {
                          $incomeworkayah = '0';
                        }
                  ?>
                    <div class="fv-row mb-5">
                        <label class="form-label fw-bolder text-dark fs-6">Penghasilan Tidak Tetap</label>
                        <select name="income_work_father" class="form-select form-select-solid" value=""  >
                          <option value="{{ ($incomeworkayah =='' && $incomeworkayah == null) ? '' : $incomeworkayah}}" selected>{{ ($incomeworkayah =='' && $incomeworkayah == null) ? '' : $incomeworkayah}}</option>
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
                    <?php
                      if ($file_additional_lima !='' && $file_additional_lima != null && !empty($file_additional_lima) && $file_additional_lima != '[]') { 
                          $array= array_column($file_additional_lima, 'gaji_tetap_ibu');
                              if ($array != '' && $array != null) { $gajiworkmother = $array;
                                  } else { $gajiworkmother = ''; }       
                                      }else {
                                         $gajiworkmother = '0';
                                            }
                    ?>
                    <div class="fv-row mb-5">
                      <label class="form-label fw-bolder text-dark fs-6">Penghasilan Tetap</label>
                      <input class="form-control form-control-lg form-control-solid" type="number" placeholder="Nominal Tetap" name="gaji_tetap_ibu" value="{{ ($gajiworkmother =='' && $gajiworkmother == null) ? '' : $gajiworkmother[0]}}" autocomplete="off" />
                    </div>
                    <!--end::Input group-->
                  </div>
                  <div class="col-md-6">
                    <!--begin::Input group-->
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
                                            } else if ($incomeworkmother[0] == 5) { $incomeworkmother = ' > Rp. 20.000.000'; } 

                                         }else {
                                             $incomeworkmother = '';
                                                }
                                  }else {
                                        $incomeworkmother = '0';
                                             }
                    ?>
                    <div class="fv-row mb-5">
                      <label class="form-label fw-bolder text-dark fs-6">Penghasilan Tidak Tetap</label>
                      <select name="income_work_mother" class="form-select form-select-solid" value=""  >
                        <option value="{{ ($incomeworkmother =='' && $incomeworkmother == null) ? '' : $incomeworkmother}}" selected>{{ ($incomeworkmother =='' && $incomeworkmother == null) ? '' : $incomeworkmother}}</option>
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

          </div>
          <!--begin::Wrapper-->

          <!--begin::Row-->   
          <div class="row" >
              <?php for ($i = 0; $i < 2;$i++) {  
                if ($slip_gaji_parent != null && $slip_gaji_parent != '' && !empty($slip_gaji_parent)) {
                if ($i == 0) { 
                  $name_gaji = 'Ayah'; $slip = 'father';
                } else { 
                  $name_gaji = 'Ibu';  $slip = 'mother';}  
                      $array = array_column($slip_gaji_parent, 'slip_gaji_'.strtolower($slip));
                      if ($array != '' && $array != null) { $slip_parent = $array;
                      } else { 
                        $slip_parent = ''; }
                } else  { 
                  if ($i == 0) { 
                      $name_gaji = 'Ayah'; $slip = 'father';
                    } else { 
                      $name_gaji = 'Ibu';  $slip = 'mother';}       
                      $name_parent = ''; 
                      $slip_parent[0] = '';
                }
                ?>
              <div class="col">
              <label class="form-label fw-bolder text-dark fs-6">Slip Gaji {{ $name_gaji }}</label>
              <div class="row fv-row fv-plugins-icon-container">
                <!--begin::Col-->
                <div class="col-12">

                  <!--begin::Image input-->
                  <div class="input-group mb-5" style="{{ ($slip_parent[0] != '') ? '' : 'display: none;' }}">
                    <input type="text" class="form-control" value="{{  substr($slip_parent[0], 13, 55)  }}" readonly="">
                    <button type="button" class="btn-remove-file input-group-text btn-danger">
                      <i class="fas fa-trash fs-4 text-danger"></i>
                    </button>
                  </div>
                  <input type="file" class="form-control-file" name="medco_employee_file_input" data-image="medco_employee_file" accept="application/pdf, image/*" style="display: none;">
                  <input type="hidden" value="{{ $slip_parent[0] }}" name="slip_gaji_{{ strtolower($name_gaji) }}">
                  <!--end::Image input-->

                  <!--begin::Dropzone-->
                  <div class="btn-upload-file dropzone" style="{{ ($slip_parent[0] != '') ? 'display: none;' : '' }}">
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
              </div>
              <?php } ?>
              <!--end::Row-->
            </div>
        </div>
      <!--begin::Step 4-->     

        <!--begin::Alert-->
        <div class="alert alert-info d-flex align-items-center p-5 mb-10 mt-7">
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
        <div id="upload-form-document" class="row">

          @foreach ($file_uploaded as $file)

          <!--begin::Col-->
          <div class="col-md-4 fv-row mb-5">
            <!--begin::Label-->
            <label class="{{ $file['name'] == 'family_card' ? 'required':'' }} fs-6 fw-bold form-label mb-2">{{ $file['label'] }}</label>
            <!--end::Label-->

            @if($file['name'] == "Buku KIA")
            <br /><span class="fs-8">(Khusus Pendaftaran TK dan SD)</span>
            @endif


            <!--begin::Row-->
            <div class="row fv-row">
              <!--begin::Col-->
              <div class="col-12">

                <!--begin::Image input-->
                <?php
                $hide = "display: none;";
                if ($file['path'] != '') $hide = "";
                ?>
                <div class="input-group mb-5" style="{{ ($file['path'] != '') ? '': 'display: none;' }}">
                  <input type="text" class="form-control" value="{{ ($file['path'] != '') ? basename($file['path']): '' }}" readonly="">
                  <button type="button" class="btn-remove-file input-group-text btn-danger">
                    <i class="fas fa-trash fs-4 text-danger"></i>
                  </button>
                </div>
                <input type="file" class="form-control-file" name="{{ $file['name'] }}_input" data-image="{{ $file['name'] }}" accept="application/pdf, image/*" style="display: none;">
                <input type="hidden" name="{{ $file['name'] }}" value="{{ $file['path'] }}" />
                <!--end::Image input-->

                <!--begin::Dropzone-->
                <div class="btn-upload-file dropzone" style="{{ ($file['path'] != '') ? 'display: none;': '' }}">
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


        <div class="border-top mb-9 mt-9 border border-primary p-5 border-2 rounded">
          <div class="d-flex w-lg-100">
            <!--begin::Label-->
            <label class="form-check form-switch form-check-custom form-check-solid w-70px">
              <input id="is-employee-medco" class="form-check-input" type="checkbox" value="true" {{ ($ppdb->medco_employee != '' ? "checked" : "") }}>
            </label>
            <div class="me-5">
              <label class="fs-6 fw-semibold form-label">Jika Pendaftar Merupakan Karyawan Medco Group</label>
              <div class="fs-7 fw-semibold text-muted">Dibutuhkan surat keterangan dari tempat bekerja</div>
            </div>
            <!--end::Label-->
          </div>

          <div id="box-employee-medco" class="{{ ($ppdb->medco_employee != '' ? "" : "d-none") }} mt-10">
            <div class="fv-row mb-7 fv-plugins-icon-container">
              <label class="form-label fw-bold text-dark fs-6">Tempat Bekerja &amp; Nama Posisi</label>
              <input name="medco_employee" value="{{ $ppdb->medco_employee }}" class="form-control form-control-lg form-control-solid" type="text" placeholder="Keterangan Pekerjaan" autocomplete="off">
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
                    <div class="input-group mb-5" style="{{ ($ppdb->medco_employee_file != '') ? '': 'display: none;' }}">
                      <input type="text" name="medco_employee_file_label" class="form-control" value="{{ ($ppdb->medco_employee_file != '') ? basename($ppdb->medco_employee_file): '' }}" readonly="" >
                      <button type="button" class="btn-remove-file input-group-text btn-danger">
                        <i class="fas fa-trash fs-4 text-danger"></i>
                      </button>
                    </div>
                    <input type="file" class="form-control-file" name="medco_employee_file_input" data-image="medco_employee_file" accept="application/pdf, image/*" style="display: none;">
                    <input type="hidden" name="medco_employee_file" value="{{ $ppdb->medco_employee_file }}">
                    <!--end::Image input-->

                    <!--begin::Dropzone-->
                    <div class="btn-upload-file dropzone" style="{{ ($ppdb->medco_employee_file != '') ? 'display: none;': '' }}">
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

            @foreach($file_additionals as $additional_item)
            <div class="input-group mb-3">
              <input name="deskripsi_{{ strtolower($additional_item['name'])}}" type="text" class="form-control" placeholder="Contoh juara 1 olimpiade bahasa inggris, global youth action, jakarta" value="{{ $additional_item['deskripsi'] }}" />
            </div>
            @endforeach
          </div>
          {{-- end column first --}}

          {{-- second column --}}
          <div class="col-xl-3">
            <label class="fs-6 fw-bolder form-label text-dark mb-5">Tingkat</label>
            @foreach($file_additionals as $additional_item)

            <div class="mb-3">
              <select name="tingkat_{{ strtolower($additional_item['name'])}}" class="form-select" aria-label=".form-select-lg example">
                <option value="" {{ (empty($tingkat_item)) ? "selected":"" }}>Tingkat</option>
                @foreach($tingkat as $tingkat_item)
                <option value="{{ $tingkat_item }}" {{ ($tingkat_item==$additional_item['tingkat']) ? "selected":"" }}>{{ $tingkat_item }}</option>
                @endforeach
              </select>
            </div>

            @endforeach
          </div>
          {{-- end column second --}}

          {{-- thre column --}}
          <div class="col-xl-4">
            <label class="fs-6 fw-bolder form-label text-dark mb-5">Upload Piagam atau Photo Piala</label>
            @foreach($file_additionals as $additional_item)
            <div class="mb-3">
              @if("File Additional ".strtolower($additional_item['name']) == "File Additional Satu")
              <br /><span class="fs-8">(Khusus Pendaftaran)</span>
              @endif

              <!--begin::Row-->
              <div class="row fv-row">
                <!--begin::Col-->
                <div class="col-12">

                  <!--begin::Image input-->
                  <div class="input-group" style="{{ ($additional_item['file'] != '') ? '': 'display: none;' }}">
                    <input type="text" class="form-control" value="{{ ($additional_item['file'] != '') ? basename($additional_item['file']): '' }}" readonly="">
                    <button type="button" class="btn-remove-file input-group-text btn-danger">
                      <i class="fas fa-trash fs-9 text-danger"></i>
                    </button>
                  </div>
                  <input type="file" class="form-control-file" name="file_additional_{{ strtolower($additional_item['name']) }}_input" data-image="file_additional_{{ strtolower($additional_item['name']) }}" accept="application/pdf, image/*" style="display: none;">
                  <input type="hidden" name="file_additional_{{ strtolower($additional_item['name']) }}" value="{{ $additional_item['file'] }}" />
                  <!--end::Image input-->

                  <button type="button" class="btn-upload-file dropzone btn btn-light-primary border w-100" style="{{ ($additional_item['file'] != '') ? 'display: none;': '' }}">
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

        <div class="row p-10 py-5 border">
          <div class="col-lg-12">
            <label class="family_card fs-4 fw-bold form-label mb-2">Admin PPDB Avicenna</label>
            <div class="text-muted fw-bold fs-6 mb-10">Berikut ini adalah nomor kontak admin sesuai dengan wilayah yang dapat dihubungi</div>

          </div>
          <div class="col-lg-4">
            <a href="https://api.whatsapp.com/send?phone=628111297881&text=" target="_blank" class="d-flex align-items-center">
              <div class="symbol symbol-50px me-3">
                <i class="bi bi-whatsapp text-success fs-3x"></i>
              </div>
              <div class="d-flex justify-content-start flex-column">
                <div class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Sekolah Avicenna Jagakarsa</div>
                <span class="text-gray-400 fw-semibold d-block fs-7">Admin Jagakarsa</span>
              </div>
            </a>
          </div>
          <div class="col-lg-4">
            <a href="https://api.whatsapp.com/send?phone=628111507516&text=" target="_blank" class="d-flex align-items-center">
              <div class="symbol symbol-50px me-3">
                <i class="bi bi-whatsapp text-success fs-3x"></i>
              </div>
              <div class="d-flex justify-content-start flex-column">
                <div class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Sekolah Avicenna Cinere</div>
                <span class="text-gray-400 fw-semibold d-block fs-7">Admin Cinere</span>
              </div>
            </a>
          </div>
          <div class="col-lg-4">
            <a href="https://api.whatsapp.com/send?phone=6281399390497&text=" target="_blank" class="d-flex align-items-center">
              <div class="symbol symbol-50px me-3">
                <i class="bi bi-whatsapp text-success fs-3x"></i>
              </div>
              <div class="d-flex justify-content-start flex-column">
                <div class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Sekolah Avicenna Pamulang</div>
                <span class="text-gray-400 fw-semibold d-block fs-7">Admin Pamulang</span>
              </div>
            </a>
          </div>


        </div>




      </div>
    </div>
    <div class="card-footer d-flex justify-content-end py-6">
      <button id="btn-submit" type="button" class="btn btn-primary btn-lg" data-save="SUBMIT">Submit</button>
    </div>
  </div>
</form>


@endsection



@push('after-scripts')
<input type="hidden" name="uri_image_upload" value="{{ route('file-upload') }}" />
<input type="hidden" name="uri_dashboard" value="{{ route('frontend.user.dashboard') }}" />

<!--begin::Page Custom Javascript(used by this page)-->
<script>
  var URI_UPLOAD_IMAGE = $('input[name="uri_image_upload"]').val();
  var URI_REGISTER = $('input[name="uri_register"]').val();
  var URI_DASHBOARD = $('input[name="uri_dashboard"]').val();


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

<script src="{{ asset('assets/js/pages/update-document.js') }}?v=1.0.1"></script>
@endpush