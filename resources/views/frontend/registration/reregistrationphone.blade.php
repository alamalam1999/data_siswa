@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard'))


@section('content')
        <div class="row row-cols-1 row-cols-md-5 mb-3 text-center">
            <div class="col">
              <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-body">
                  <button type="button" class="btnreregister w-100 btn btn-lg btn-secondary">Formulir Daftar Ulang</button>
                </div>
              </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                  <div class="card-body">
                    <button type="button" class="btnparent w-100 btn btn-lg btn-secondary">Pernyataan Orang Tua</button>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                  <div class="card-body">
                    <button type="button" class="btnrules w-100 btn btn-lg btn-secondary">Persejuan Tata Tertib</button>
                  </div>
                </div>
              </div>
            <div class="col">
              <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-body mb-3">
                  <button type="button" class="btnconditionstudent w-100 btn btn-lg btn-secondary mt-4">Keadaan Jasmani</button>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-body mb-3">
                  <button type="button" class="btnangket w-100 btn btn-lg btn-secondary mt-4">Angket</button>
                </div>
              </div>
            </div>
          </div>

          <form  method="POST" action="{{ route('frontend.user.registration.storedetail') }}"enctype="multipart/form-data" class="register">
            {{ csrf_field() }}
            {{-- register 1 --}}
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
                  <input name="data1" type="text" class="form-control" id="noformulir" placeholder="Masukkan No Formulir" value="{{ ($data1 =='' && $data1 == null) ? '' : $data1[0] }}">
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
                  <input name="data2" type="text" class="form-control" id="tahunajaran" placeholder="Tahun Ajaran" value="{{ ($data2 =='' && $data2 == null) ? '' : $data2[0] }}">
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
                  <input name="data3" type="date" class="form-control" id="tanggalpendaftaran" placeholder="Tanngal Pendaftaran" value="{{ ($data3 =='' && $data3 == null) ? '' : $data3[0] }}">
                </div>

                <div class="form-group mb-4">
                  <?php
                      $array= array_column($file_additionaldua, 'data4');
                      if ($array != '' && $array != null) {
                        $data4 = $array;
                      } else {
                        $data4 = '';
                      }
                  ?>
                  <label for="exampleFormControlInput1">Status Siswa</label>
                  <select name="data4" id="statussiswa" class="form-control">
                    <option value="{{ ($data4 =='' && $data4 == null) ? '' : $data4[0] }}">{{ ($data4 =='' && $data4 == null) ? 'Pilih' : $data4[0] }}</option>
                    <option value="1">Peserta didik Baru</option>
                    <option value="2">Peserta didik Pindahan</option>
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
                  <input name="data5" type="text" class="form-control" id="namalengkap" placeholder="Masukkan Lengkap" value="{{ ($data5 =='' && $data5 == null) ? '' : $data5[0] }}">
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
                  ?>
                  <label for="exampleFormControlInput1">Jenis Kelamin</label>
                  <select name="data6" id="statussiswa" class="form-control">
                    <option value="{{ ($data6 =='' && $data6 == null) ? '' : $data6[0] }}">{{ ($data6 =='' && $data6 == null) ? 'Pilih' : $data6[0] }}</option>
                    <option value="1">Perempuan</option>
                    <option value="2">Laki - Laki</option>
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
                  <input name="data7" type="text" class="form-control" id="nisn" placeholder="Masukkan Nisn" value="{{ ($data7 =='' && $data7 == null) ? '' : $data7[0] }}">
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
                  <input name="data8" type="text" class="form-control" id="nik" placeholder="Masukkan Nik / Kitas" value="{{ ($data8 =='' && $data8 == null) ? '' : $data8[0] }}">
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
                  <input name="data9" type="text" class="form-control" id="tempatlahir" placeholder="Masukkan Tempat Lahir" value="{{ ($data9 =='' && $data9 == null) ? '' : $data9[0] }}">
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
                  <input name="data10" type="date" class="form-control" id="tanggallahir" placeholder="Tanngal Lahir" value="{{ ($data10 =='' && $data10 == null) ? '' : $data10[0] }}">
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
                  <input name="data11" type="text" class="form-control" id="noregistrasiaktakelahiran" placeholder="No Registrasi Akta Kelahiran" value="{{ ($data11 =='' && $data11 == null) ? '' : $data11[0] }}">
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
                  ?>
                  <label for="exampleFormControlInput1">Agama & Kepercayaan</label>
                  <select name="data12" id="agamadankepercayaan" class="form-control">
                    <option value="{{ ($data12 =='' && $data12 == null) ? '' : $data12[0] }}">{{ ($data12 =='' && $data12 == null) ? 'Pilih' : $data12[0] }}</option>
                    <option value="1">Islam</option>
                    <option value="2">Kristen / Protestan</option>
                    <option value="3">Katholik</option>
                    <option value="4">Hindu</option>
                    <option value="5">Budha</option>
                    <option value="6">Khong Hu Chu</option>
                    <option value="7">Kepercayaan Kpd Tuhan YME</option>
                    <option value="8">Lainnya</option>
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
                  ?>
                  <label for="exampleFormControlInput1">Kewarganegaraan</label>
                  <select name="data13" id="agamadankepercayaan" class="form-control">
                    <option value="{{ ($data13 =='' && $data13 == null) ? '' : $data13[0] }}">{{ ($data13 =='' && $data13 == null) ? 'Pilih' : $data13[0] }}</option>
                    <option value="1">Indonesia</option>
                    <option value="2">Asing (WNA)</option>
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
                  <input name="data14" type="text" class="form-control" placeholder="Masukkan Nama Negara" value="{{ ($data14 =='' && $data14 == null) ? '' : $data14[0] }}">
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
                  ?>
                    <label for="">Berkebutuhan Khusus</label>
                  <div class="row">
                    <div class="col-sm">
                      <select name="data15" id="berkebutuhankhusus1" class="form-control">
                        <option value="{{ ($data15 =='' && $data15 == null) ? '' : $data15[0] }}">{{ ($data15 =='' && $data15 == null) ? 'Pilih' : $data15[0] }}</option>
                        <option value="1">Tidak</option>
                        <option value="2">Netra</option>
                        <option value="3">Rungu</option>
                        <option value="4">Grahita Ringan</option>
                        <option value="5">Grahita Sedang</option>
                        <option value="6">Daksa Ringan</option>
                        <option value="7">Daksa Sedang</option>
                        <option value="8">Laras</option>
                        <option value="9">Wicara F</option>
                        <option value="10">Tuna Ganda</option>
                        <option value="11">Hiper Aktif</option>
                        <option value="12">Cerdas Istimewa</option>
                        <option value="13">Bakat Istimewa</option>
                        <option value="14">Kesulitan Belajar</option>
                        <option value="15">Narkoba</option>
                        <option value="16">Indigo</option>
                        <option value="17">Down Sindrome</option>
                        <option value="18">Autis</option>
                      </select>
                    </div>
                    <?php
                          $array= array_column($file_additionaldua, 'data16');
                          if ($array != '' && $array != null) {
                            $data16 = $array;
                          } else {
                            $data16 = '';
                          }
                      ?>
                    <div class="col-sm">
                      <select name="data16" id="berkebutuhankhusus2" class="form-control">
                        <option value="{{ ($data16 =='' && $data16 == null) ? '' : $data16[0] }}">{{ ($data16 =='' && $data16 == null) ? 'Pilih' : $data16[0] }}</option>
                        <option value="1">Tidak</option>
                        <option value="2">Netra</option>
                        <option value="3">Rungu</option>
                        <option value="4">Grahita Ringan</option>
                        <option value="5">Grahita Sedang</option>
                        <option value="6">Daksa Ringan</option>
                        <option value="7">Daksa Sedang</option>
                        <option value="8">Laras</option>
                        <option value="9">Wicara F</option>
                        <option value="10">Tuna Ganda</option>
                        <option value="11">Hiper Aktif</option>
                        <option value="12">Cerdas Istimewa</option>
                        <option value="13">Bakat Istimewa</option>
                        <option value="14">Kesulitan Belajar</option>
                        <option value="15">Narkoba</option>
                        <option value="16">Indigo</option>
                        <option value="17">Down Sindrome</option>
                        <option value="18">Autis</option>
                      </select>
                    </div>
                  </div>
                  <p style="color: #c003ff" class="fs-8">Kebutuhan khusus yang disandang oleh peserta didik, Dapat dipilih lebih dari satu</p>
                </div>

                <span class="buttonregister1 btn btn-lg btn-primary me-3 indicator-label mb-12">Selanjutnya</span>
              </div>
              {{-- endregister1 --}}


              {{-- register2 --}}
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
                        <textarea name="data17" class="form-control" id="alamatjalan" placeholder="Masukkan Alamat Jalan" rows="3">{{ ($data17 =='' && $data17 == null) ? '' : $data17[0] }}</textarea>
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
                            <input name="data18" type="text" class="form-control" id="rt" placeholder="Masukkan No Rt" value="{{ ($data18 =='' && $data18 == null) ? '' : $data18[0] }}">
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
                            <input name="data19" type="text" class="form-control" id="rw" placeholder="Masukkan No Rw" value="{{ ($data19 =='' && $data19 == null) ? '' : $data19[0] }}">
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
                        <input name="data20" type="text" class="form-control" id="namadusun" placeholder="Masukkan nama dusun" value="{{ ($data20 =='' && $data20 == null) ? '' : $data20[0] }}">
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
                        <input name="data21" type="text" class="form-control" id="namakelurahandesa" placeholder="Masukkan nama Kelurahan atau desa" value="{{ ($data21 =='' && $data21 == null) ? '' : $data21[0] }}">
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
                        <input name="data22" type="text" class="form-control" id="namakelurahandesa" placeholder="Masukkan nama Kelurahan atau desa" value="{{ ($data22 =='' && $data22 == null) ? '' : $data22[0] }}">
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
                        <input name="data23" type="text" class="form-control" id="kecamatan" placeholder="Masukkan nama Kecamatan" value="{{ ($data23 =='' && $data23 == null) ? '' : $data23[0] }}">
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
                        <input name="data24" type="text" class="form-control" id="kodepos" placeholder="Masukkan Kode Pos" value="{{ ($data24 =='' && $data24 == null) ? '' : $data24[0] }}">
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
                              ?>
                        <label for="">Tempat Tinggal</label>
                        <select name="data25" id="tempattinggal" class="form-control">
                          <option value="{{ ($data25 =='' && $data25 == null) ? '' : $data25[0] }}">{{ ($data25 =='' && $data25 == null) ? 'pilih' : $data25[0] }}</option>
                          <option value="1">Bersama Orang Tua</option>
                          <option value="2">Wali</option>
                          <option value="3">Kos</option>
                          <option value="4">Asrama</option>
                          <option value="5">Panti Asuhan</option>
                          <option value="6">Pesantren</option>
                          <option value="7">Lainnya</option>
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
                              ?>
                        <label for="">Moda Transportasi</label>
                        <select name="data26" id="modatransportasi" class="form-control">
                          <option value="{{ ($data26 =='' && $data26 == null) ? '' : $data26[0] }}">{{ ($data26 =='' && $data26 == null) ? 'pilih' : $data26[0] }}</option>
                          <option value="1">Jalan Kaki</option>
                          <option value="2">Kendaraan Pribadi</option>
                          <option value="3">Kendaraan Umum/angkot/pete-pete</option>
                          <option value="4">Jemputan Sekolah</option>
                          <option value="5">Kereta Api</option>
                          <option value="6">Ojek</option>
                          <option value="7">Andong/Bendi/Sado/Dokar/Delman/Beca</option>
                          <option value="8">Lainnya</option>
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
                        <input name="data27" type="text" id="nomorkks" class="form-control" placeholder="Masukkan Nomor KKS" value="{{ ($data27 =='' && $data27 == null) ? '' : $data27[0] }}">
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
                        <input name="data28" type="text" id="anakkeberapa" class="form-control" placeholder="Masukkan sesuai dengan Kartu Keluarga" value="{{ ($data28 =='' && $data28 == null) ? '' : $data28[0] }}">
                      </div>

                      <div class="form-group mb-4">
                        <?php
                              $array= array_column($file_additionaldua, 'data29');
                              if ($array != '' && $array != null) {
                                $data29 = $array;
                              } else {
                                $data29 = '';
                              }
                          ?>
                         <label for="">Penerima KPS/PKH</label>
                         <select name="data29" id="penerimakpspkh" class="form-control">
                          <option value="{{ ($data29 =='' && $data29 == null) ? '' : $data29[0] }}">{{ ($data29 =='' && $data29 == null) ? 'Pilih' : $data29[0] }}</option>
                          <option value="1">Ya</option>
                          <option value="2">TIdak</option>
                         </select>
                         <p style="color: #c003ff" class="fs-8">Status peserta didik sebagai penerima manfaat KPS (Kartu Perlindungan Sosial)/PKH(Program Keluarga Harapan).
                          Peserta didik dinyatakan sebagai penerima KPS/PKH apabila tercantum di dalam kartu keluarga dengan kepala keluarga pemegang KPS/PKH Sebagai
                          contoh, peserta didik tercantum pada KK dengan kepada keluarganya adalah kakek. Apabila kakek didik peserta didik disebut pemegang KPS/PKH,
                          maka peserta didik yang bersangkutan dinyatakan penerima KPS/PKH</p>
                      </div>


                      <div class="row">
                        <div style="text-align: center" class="col-sm">
                          <span class="buttonregisterback1 btn btn-lg btn-primary me-3 indicator-label mb-12">Sebelumnya</span>
                        </div>
                        <div class="col-sm">

                        </div>
                        <div style="text-align: center" class="col-sm">
                          <span class="buttonregister2 btn btn-lg btn-primary me-3 indicator-label mb-12">Selanjutnya</span>

                        </div>
                      </div>
              </div>

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
                  <input name="data30" type="text" id="nokphpkh" class="form-control" placeholder="Masukkan Nomor KPH/PKH (apabila penerima)" value="{{ ($data30 =='' && $data30 == null) ? '' : $data30[0] }}">
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
                          ?>
                  <div class="row">
                    <div class="col-sm">
                      <label for="">Usulan dari Sekolah (layak PIP)</label>
                      <select name="data31" id="penerimakpspkh" class="form-control">
                       <option value="{{ ($data31 =='' && $data31 == null) ? '' : $data31[0] }}">{{ ($data31 =='' && $data31 == null) ? 'Pilih' : $data31[0] }}</option>
                       <option value="1">Ya</option>
                       <option value="2">TIdak</option>
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
                        ?>
                      <label for="">Penerima KIP (Kartu Indonesia Pintar)</label>
                      <select name="data32" id="penerimakip" class="form-control">
                       <option value="{{ ($data32 =='' && $data32 == null) ? '' : $data32[0] }}">{{ ($data32 =='' && $data32 == null) ? 'Pilih' : $data32[0] }}</option>
                       <option value="1">Ya</option>
                       <option value="2">TIdak</option>
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
                  <input name="data33" type="text" id="nomorkip" class="form-control" placeholder="Masukkan Nomor KIP" value="{{ ($data33 =='' && $data33 == null) ? '' : $data33[0] }}">
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
                  <input name="data34" type="text" id="namakip" class="form-control" placeholder="Masukkan Nama KIP" value="{{ ($data34 =='' && $data34 == null) ? '' : $data34[0] }}">
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
                        ?>
                  <label for="">Terima fisik Kartu (KIP)</label>
                  <select name="data35" id="terimakip" class="form-control">
                   <option value="{{ ($data35 =='' && $data35 == null) ? '' : $data35[0] }}">{{ ($data35 =='' && $data35 == null) ? 'Pilih' : $data35[0] }}</option>
                   <option value="1">Ya</option>
                   <option value="2">TIdak</option>
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
                        ?>
                  <label for="">Alasan layak PIP</label>
                  <select name="data36" id="layakpip" class="form-control">
                    <option value="{{ ($data36 =='' && $data36 == null) ? '' : $data36[0] }}">{{ ($data36 =='' && $data36 == null) ? 'Pilih' : $data36[0] }}</option>
                    <option value="1">Pemegang PKH/LPS/KIP</option>
                    <option value="2">Penerima BSM 2014 </option>
                    <option value="3">Yatim Piatu/ Panti Asuhan/ Panti Sosial</option>
                    <option value="4">Dampak Bencana</option>
                    <option value="5">Pernah Drop Out</option>
                    <option value="6">Siswa Miskin/Rentan Miskin</option>
                    <option value="7">Daerah Konflik</option>
                    <option value="8">Keluarga Terpidana</option>
                    <option value="9">Kelainan Fisik</option>
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
                  <input name="data37" type="text" id="bank" class="form-control" placeholder="Diisi oleh Pusat" value="{{ ($data37 =='' && $data37 == null) ? '' : $data37[0] }}">
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
                  <input name="data38" type="text" id="norekening" class="form-control" placeholder="Diisi oleh Pusat" value="{{ ($data38 =='' && $data38 == null) ? '' : $data38[0] }}">
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
                  <input name="data39" type="text" id="rekatasnama" class="form-control" placeholder="Diisi oleh Pusat" value="{{ ($data39 =='' && $data39 == null) ? '' : $data39[0] }}">
                  <p style="color: #c003ff" class="fs-8">Untuk menampilkan data bank terkait penyaluran manfaat PIP (Program Indonesia Pintar) .Data pada bagian ini di isi oleh Kemendikbud</p>
                </div>


                <div class="row">
                  <div style="text-align: center" class="col-sm">
                    <span class="buttonregisterback2 btn btn-lg btn-primary me-3 indicator-label mb-12">Sebelumnya</span>
                  </div>
                  <div class="col-sm">

                  </div>
                  <div style="text-align: center" class="col-sm">
                    <span class="buttonregister3 btn btn-lg btn-primary me-3 indicator-label mb-12">Selanjutnya</span>
                  </div>
                </div>

              </div>

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
                    <input name="data40" type="text" id="namaayah" class="form-control" placeholder="Masukkan Nama Ayah" value="{{ ($data40 =='' && $data40 == null) ? '' : $data40[0] }}">
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
                    <input name="data41" type="text" id="nikayah" class="form-control" placeholder="Masukkan NIK Ayah" value="{{ ($data41 =='' && $data41 == null) ? '' : $data41[0] }}">
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
                    <input name="data42" type="text" id="tahunlahir" class="form-control" placeholder="Masukkan Tahun Lahir" value="{{ ($data42 =='' && $data42 == null) ? '' : $data42[0] }}">
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
                    ?>
                    <label for="">Pendidikan</label>
                    <select name="data43" id="pendidikanayah" class="form-control">
                      <option value="{{ ($data43 =='' && $data43 == null) ? '' : $data43[0] }}">{{ ($data43 =='' && $data43 == null) ? 'Pilih' : $data43[0] }}</option>
                      <option value="1">Tidak Sekolah</option>
                      <option value="2">Putus SD</option>
                      <option value="3">SD Sederajat</option>
                      <option value="4">SMP Sederajat</option>
                      <option value="5">SMA Sederajat</option>
                      <option value="6">D1</option>
                      <option value="7">D2</option>
                      <option value="8">D3</option>
                      <option value="9">D4/S1</option>
                      <option value="10">S2</option>
                      <option value="11">S3</option>
                      <option value="12">S4</option>
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
                    ?>
                    <label for="">Pekerjaan</label>
                    <select name="data44" id="pekerjaanayah" class="form-control">
                      <option value="{{ ($data44 =='' && $data44 == null) ? '' : $data44[0] }}">{{ ($data44 =='' && $data44 == null) ? 'Pilih' : $data44[0] }}</option>
                      <option value="1">Tidak Bekerja</option>
                      <option value="2">Nelayan</option>
                      <option value="3">Petani</option>
                      <option value="4">Peternak</option>
                      <option value="5">PNS/TNI/POLRI</option>
                      <option value="6">Karyawan Swasta</option>
                      <option value="7">Pedagang Kecil</option>
                      <option value="8">Pedagang Besar</option>
                      <option value="9">Wiraswasta</option>
                      <option value="10">Wirausaha</option>
                      <option value="11">Buruh</option>
                      <option value="12">Pensiunan</option>
                      <option value="13">Meninggal Dunia</option>
                      <option value="14">Lain - Lain</option>
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
                    ?>
                    <label for="">Penghasilan bulanan</label>
                    <select name="data45" id="penghasilanayah" class="form-control">
                      <option value="{{ ($data45 =='' && $data45 == null) ? '' : $data45[0] }}">{{ ($data45 =='' && $data45 == null) ? 'Pilih' : $data45[0] }}</option>
                      <option value="1">2 juta - 5 juta</option>
                      <option value="2">5 juta - 10 juta</option>
                      <option value="3">10 juta - 20 juta</option>
                      <option value="4">lebih dari 20 juta</option>
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
                    ?>
                    <label for="">Berkebutuhan Khusus</label>
                    <select name="data46" id="berkebutuhankhusus3" class="form-control">
                      <option value="{{ ($data46 =='' && $data46 == null) ? '' : $data46[0] }}">{{ ($data46 =='' && $data46 == null) ? 'Pilih' : $data46[0] }}</option>
                      <option value="1">Tidak</option>
                      <option value="2">Netra</option>
                      <option value="3">Rungu</option>
                      <option value="4">Grahita Ringan</option>
                      <option value="5">Grahita Sedang</option>
                      <option value="6">Daksa Ringan</option>
                      <option value="7">Daksa Sedang</option>
                      <option value="8">Laras</option>
                      <option value="9">Wicara F</option>
                      <option value="10">Tuna Ganda</option>
                      <option value="11">Hiper Aktif</option>
                      <option value="12">Cerdas Istimewa</option>
                      <option value="13">Bakat Istimewa</option>
                      <option value="14">Kesulitan Belajar</option>
                      <option value="15">Narkoba</option>
                      <option value="16">Indigo</option>
                      <option value="17">Down Sindrome</option>
                      <option value="18">Autis</option>
                    </select>
                    <p style="color: #c003ff" class="fs-8">Kebutuhan khusus yang disandang oleh ayah peserta didik . Dapat dipilih lebih dari satu</p>
                  </div>

                  <div class="row">
                    <div style="text-align: center" class="col-sm">
                      <span class="buttonregisterback3 btn btn-lg btn-primary me-3 indicator-label mb-12">Sebelumnya</span>
                    </div>
                    <div class="col-sm">

                    </div>
                    <div style="text-align: center" class="col-sm">
                      <span class="buttonregister4 btn btn-lg btn-primary me-3 indicator-label mb-12">Selanjutnya</span>
                    </div>
                  </div>

              </div>

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
                  <input name="data47" type="text" id="namaibu" class="form-control" placeholder="Masukkan Nama Ibu" value="{{ ($data47 =='' && $data47 == null) ? '' : $data47[0] }}">
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
                  <input name="data48" type="text" id="nikibu" class="form-control" placeholder="Masukkan NIK Ibu" value="{{ ($data48 =='' && $data48 == null) ? '' : $data48[0] }}">
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
                  <input name="data49" type="text" id="tahunlahiribu" class="form-control" placeholder="Masukkan Tahun Lahir" value="{{ ($data49 =='' && $data49 == null) ? '' : $data49[0] }}">
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
                  ?>
                  <label for="">Pendidikan</label>
                  <select name="data50" id="pendidikanibu" class="form-control">
                    <option value="{{ ($data50 =='' && $data50 == null) ? '' : $data50[0] }}">{{ ($data50 =='' && $data50 == null) ? 'Pilih' : $data50[0] }}</option>
                    <option value="1">Tidak Sekolah</option>
                    <option value="2">Putus SD</option>
                    <option value="3">SD Sederajat</option>
                    <option value="4">SMP Sederajat</option>
                    <option value="5">SMA Sederajat</option>
                    <option value="6">D1</option>
                    <option value="7">D2</option>
                    <option value="8">D3</option>
                    <option value="9">D4/S1</option>
                    <option value="10">S2</option>
                    <option value="11">S3</option>
                    <option value="12">S4</option>
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
                      ?>
                  <label for="">Pekerjaan</label>
                  <select name="data51" id="pekerjaanibu" class="form-control" >
                    <option value="{{ ($data51 =='' && $data51 == null) ? '' : $data51[0] }}">{{ ($data51 =='' && $data51 == null) ? 'Pilih' : $data51[0] }}</option>
                    <option value="1">Tidak Bekerja</option>
                    <option value="2">Nelayan</option>
                    <option value="3">Petani</option>
                    <option value="4">Peternak</option>
                    <option value="5">PNS/TNI/POLRI</option>
                    <option value="6">Karyawan Swasta</option>
                    <option value="7">Pedagang Kecil</option>
                    <option value="8">Pedagang Besar</option>
                    <option value="9">Wiraswasta</option>
                    <option value="10">Wirausaha</option>
                    <option value="11">Buruh</option>
                    <option value="12">Pensiunan</option>
                    <option value="13">Meninggal Dunia</option>
                    <option value="14">Lain - Lain</option>
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
                      ?>
                  <label for="">Penghasilan bulanan</label>
                  <select name="data52" id="penghasilanibu" class="form-control">
                    <option value="{{ ($data52 =='' && $data52 == null) ? '' : $data52[0] }}">{{ ($data52 =='' && $data52 == null) ? 'Pilih' : $data52[0] }}</option>
                    <option value="1">2 juta - 5 juta</option>
                    <option value="2">5 juta - 10 juta</option>
                    <option value="3">10 juta - 20 juta</option>
                    <option value="4">lebih dari 20 juta</option>
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
                      ?>
                  <label for="">Berkebutuhan Khusus</label>
                  <select name="data53" id="berkebutuhankhusus4" class="form-control">
                    <option value="{{ ($data53 =='' && $data53 == null) ? '' : $data53[0] }}">{{ ($data53 =='' && $data53 == null) ? 'Pilih' : $data53[0] }}</option>
                    <option value="1">Tidak</option>
                    <option value="2">Netra</option>
                    <option value="3">Rungu</option>
                    <option value="4">Grahita Ringan</option>
                    <option value="5">Grahita Sedang</option>
                    <option value="6">Daksa Ringan</option>
                    <option value="7">Daksa Sedang</option>
                    <option value="8">Laras</option>
                    <option value="9">Wicara F</option>
                    <option value="10">Tuna Ganda</option>
                    <option value="11">Hiper Aktif</option>
                    <option value="12">Cerdas Istimewa</option>
                    <option value="13">Bakat Istimewa</option>
                    <option value="14">Kesulitan Belajar</option>
                    <option value="15">Narkoba</option>
                    <option value="16">Indigo</option>
                    <option value="17">Down Sindrome</option>
                    <option value="18">Autis</option>
                  </select>
                  <p style="color: #c003ff" class="fs-8">Kebutuhan khusus yang disandang oleh ibu peserta didik . Dapat dipilih lebih dari satu</p>
                </div>


                <div class="row">
                  <div style="text-align: center" class="col-sm">
                    <span class="buttonregisterback4 btn btn-lg btn-primary me-3 indicator-label mb-12">Sebelumnya</span>
                  </div>
                  <div class="col-sm">

                  </div>
                  <div style="text-align: center" class="col-sm">
                    <span class="buttonregister5 btn btn-lg btn-primary me-3 indicator-label mb-12">Selanjutnya</span>
                  </div>
                </div>

            </div>

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
                <input name="data54" type="text" id="namawali" class="form-control" placeholder="Masukkan Nama wali" value="{{ ($data54 =='' && $data54 == null) ? '' : $data54[0] }}">
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
                <input name="data55" type="text" id="nikwali" class="form-control" placeholder="Masukkan NIK Wali" value="{{ ($data55 =='' && $data55 == null) ? '' : $data55[0] }}">
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
                <input name="data56" type="text" id="tahunlahiribu" class="form-control" placeholder="Masukkan Tahun Lahir" value="{{ ($data56 =='' && $data56 == null) ? '' : $data56[0] }}">
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
                ?>
                <label for="">Pendidikan</label>
                <select name="data57" id="pendidikanwali" class="form-control" >
                  <option value="{{ ($data57 =='' && $data57 == null) ? '' : $data57[0] }}">{{ ($data57 =='' && $data57 == null) ? 'Pilih' : $data57[0] }}</option>
                  <option value="1">Tidak Sekolah</option>
                  <option value="2">Putus SD</option>
                  <option value="3">SD Sederajat</option>
                  <option value="4">SMP Sederajat</option>
                  <option value="5">SMA Sederajat</option>
                  <option value="6">D1</option>
                  <option value="7">D2</option>
                  <option value="8">D3</option>
                  <option value="9">D4/S1</option>
                  <option value="10">S2</option>
                  <option value="11">S3</option>
                  <option value="12">S4</option>
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
                ?>
                <label for="">Pekerjaan</label>
                <select name="data58" id="pekerjaanwali" class="form-control">
                  <option value="{{ ($data58 =='' && $data58 == null) ? '' : $data58[0] }}">{{ ($data58 =='' && $data58 == null) ? 'Pilih' : $data58[0] }}</option>
                  <option value="1">Tidak Bekerja</option>
                  <option value="2">Nelayan</option>
                  <option value="3">Petani</option>
                  <option value="4">Peternak</option>
                  <option value="5">PNS/TNI/POLRI</option>
                  <option value="6">Karyawan Swasta</option>
                  <option value="7">Pedagang Kecil</option>
                  <option value="8">Pedagang Besar</option>
                  <option value="9">Wiraswasta</option>
                  <option value="10">Wirausaha</option>
                  <option value="11">Buruh</option>
                  <option value="12">Pensiunan</option>
                  <option value="13">Meninggal Dunia</option>
                  <option value="14">Lain - Lain</option>
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
                ?>
                <label for="">Penghasilan bulanan</label>
                <select name="data59" id="penghasilanwali" class="form-control">
                  <option value="{{ ($data59 =='' && $data59 == null) ? '' : $data59[0] }}">{{ ($data59 =='' && $data59 == null) ? 'Pilih' : $data59[0] }}</option>
                  <option value="1">2 juta - 5 juta</option>
                  <option value="2">5 juta - 10 juta</option>
                  <option value="3">10 juta - 20 juta</option>
                  <option value="4">lebih dari 20 juta</option>
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
                  <input name="data60" type="text" id="nomortelepon" class="form-control" placeholder="Masukkan Nomor Telepon Rumah" value="{{ ($data60 =='' && $data60 == null) ? '' : $data60[0] }}">
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
                <input name="data61" type="text" id="nomorhandphone" class="form-control" placeholder="Masukkan Nomor Handphone" value="{{ ($data61 =='' && $data61 == null) ? '' : $data61[0] }}">
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
                <input name="data62" type="text" id="email" class="form-control" placeholder="Masukkan Email" value="{{ ($data62 =='' && $data62 == null) ? '' : $data62[0] }}">
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
                ?>
                <label for="">Jenis Ekstrakulikuler</label>
                <select name="data63" id="ekstrakulikuler" class="form-control">
                  <option value="{{ ($data63 =='' && $data63 == null) ? '' : $data63[0] }}">{{ ($data63 =='' && $data63 == null) ? 'Pilih' : $data63[0] }}</option>
                  <option value="1">Bahasa</option>
                  <option value="2">Karya Ilmiah Remaja/Sains KIR</option>
                  <option value="3">Kerohanian</option>
                  <option value="4">Komputer dan teknologi</option>
                  <option value="5">Olahraga / Beladiri</option>
                  <option value="6">Otomotif / Bengkel / Bikers</option>
                  <option value="7">Palang Merah Remaja(PMR)</option>
                  <option value="8">Paskibra</option>
                  <option value="9">Palang Keamanan Sekolah (PKS)</option>
                  <option value="10">Pencipta Alam</option>
                  <option value="11">Pramuka</option>
                  <option value="12">Seni Media, Jurnalistik</option>
                  <option value="13">Seni Musik</option>
                  <option value="14">Seni Tari dan Peran</option>
                  <option value="15">Unit Kesehatan Sekolah (UKS)</option>
                  <option value="16">Wirausaha/Koperasi/Keterampilan produktif</option>
                </select>
              </div>


              <div class="row">
                <div style="text-align: center" class="col-sm">
                  <span class="buttonregisterback5 btn btn-lg btn-primary me-3 indicator-label mb-12">Sebelumnya</span>
                </div>
                <div class="col-sm">

                </div>
                <div style="text-align: center" class="col-sm">
                  <span class="buttonregister6 btn btn-lg btn-primary me-3 indicator-label mb-12">Selanjutnya</span>
                </div>
              </div>

            </div>
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
                <input name="data64" type="text" id="tinggibadan" class="form-control" placeholder="Masukkan Tinggi Badan" value="{{ ($data64 =='' && $data64 == null) ? '' : $data64[0] }}">
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
                <input name="data65" type="text" id="beratbadan" class="form-control" placeholder="Masukkan Berat Badan" value="{{ ($data65 =='' && $data65 == null) ? '' : $data65[0] }}">
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
                <input name="data66" type="text" id="jaraktempat" class="form-control" placeholder="Masukkan jarak tempat" value="{{ ($data66 =='' && $data66 == null) ? '' : $data66[0] }}">
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
                <input name="data67" type="text" id="waktutempuh" class="form-control" placeholder="Masukkan waktu Tempat" value="{{ ($data67 =='' && $data67 == null) ? '' : $data67[0] }}">
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
                <input name="data68" type="text" id="saudarakandung" class="form-control" placeholder="Masukkan jumlah Saudara Kandung" value="{{ ($data68 =='' && $data68 == null) ? '' : $data68[0] }}">
                <p style="color: #c003ff" class="fs-8">Jumlah saudara yang dimiliki peserta didik. jumlah saudara kandung dihitung tanpa menyertakan peserta didik , dangan rumus jumlah kakak ditambah jumlah adik, isikan 0 apabila anak tunggal</p>
              </div>


              <div class="row">
                <div style="text-align: center" class="col-sm">
                  <span class="buttonregisterback6 btn btn-lg btn-primary me-3 indicator-label mb-12">Sebelumnya</span>
                </div>
                <div class="col-sm">

                </div>
                <div style="text-align: center" class="col-sm">
                  <span class="buttonregister7 btn btn-lg btn-primary me-3 indicator-label mb-12">Selanjutnya</span>
                </div>
              </div>

            </div>

            <div class="register8">
              <div style="color:rgb(255, 255, 255); background-color: #dd00ff; text-align:center;" class="mb-4 mt-3">PRESTASI</div>

              <div class="form-group mb-4">

                  {{-- column 1 --}}
                <div class="row">
                    <div class="col-sm">
                      <?php
                          $array= array_column($file_additionaldua, 'data81');
                          if ($array != '' && $array != null) {
                            $data81 = $array;
                          } else {
                            $data81 = '';
                          }
                      ?>
                      <select name="data81" id="tingkat" class="form-control">
                        <option value="{{ ($data81 =='' && $data81 == null) ? '' : $data81[0] }}">{{ ($data81 =='' && $data81 == null) ? 'Pilih Jenis' : $data81[0] }}</option>
                        <option value="1">Sains</option>
                        <option value="2">Seni</option>
                        <option value="3">Olahraga</option>
                        <option value="4">Lain - Lain</option>
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
                      ?>
                      <select name="data82" id="namaprestasi" class="form-control">
                        <option value="{{ ($data82 =='' && $data82 == null) ? '' : $data82[0] }}">{{ ($data82 =='' && $data82 == null) ? 'Pilih Tingkat' : $data82[0] }}</option>
                        <option value="1">Sekolah</option>
                        <option value="2">Kecamatan</option>
                        <option value="3">Kabupaten</option>
                        <option value="4">Provinsi</option>
                        <option value="5">Nasional</option>
                        <option value="6">Internasional</option>
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
                      <input placeholder="Nama Prestasi" name="data83" class="form-control" type="text" value="{{ ($data83 =='' && $data83 == null) ? '' : $data83[0] }}">
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
                      <input placeholder="Tahun" name="data84" class="form-control" type="text" value="{{ ($data84 =='' && $data84 == null) ? '' : $data84[0] }}">
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
                      <input placeholder="Penyelengara" name="data85" class="form-control" type="text" value="{{ ($data85 =='' && $data85 == null) ? '' : $data85[0] }}">
                    </div>
                </div>
                {{-- end column 1 --}}
                <hr style="width:100%;text-align:left;margin-left:0">
                {{-- column 2 --}}
                <div class="row">
                  <div class="col-sm">
                    <?php
                            $array= array_column($file_additionaldua, 'data86');
                            if ($array != '' && $array != null) {
                              $data86 = $array;
                            } else {
                              $data86 = '';
                            }
                        ?>
                    <select name="data86" id="tingkat" class="form-control">
                      <option value="{{ ($data86 =='' && $data86 == null) ? '' : $data86[0] }}">{{ ($data86 =='' && $data86 == null) ? 'Pilih Jenis' : $data86[0] }}</option>
                      <option value="1">Sains</option>
                      <option value="2">Seni</option>
                      <option value="3">Olahraga</option>
                      <option value="4">Lain - Lain</option>
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
                    ?>
                    <select name="data87" id="namaprestasi" class="form-control">
                      <option value="{{ ($data87 =='' && $data87 == null) ? '' : $data87[0] }}">{{ ($data87 =='' && $data87 == null) ? 'Pilih Tingkat' : $data87[0] }}</option>
                      <option value="1">Sekolah</option>
                      <option value="2">Kecamatan</option>
                      <option value="3">Kabupaten</option>
                      <option value="4">Provinsi</option>
                      <option value="5">Nasional</option>
                      <option value="6">Internasional</option>
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
                    <input placeholder="Nama Prestasi" name="data88" class="form-control" type="text" value="{{ ($data88 =='' && $data88 == null) ? '' : $data88[0] }}">
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
                    <input placeholder="Tahun" name="data89" class="form-control" type="text" value="{{ ($data89 =='' && $data89 == null) ? '' : $data89[0] }}">
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
                    <input placeholder="Penyelengara" name="data90" class="form-control" type="text" value="{{ ($data90 =='' && $data90 == null) ? '' : $data90[0] }}">
                  </div>
              </div>
              {{-- end column 2 --}}
              <hr style="width:100%;text-align:left;margin-left:0">
              {{-- column 3 --}}
              <div class="row">
                <div class="col-sm">
                  <?php
                        $array= array_column($file_additionaldua, 'data91');
                        if ($array != '' && $array != null) {
                          $data91 = $array;
                        } else {
                          $data91 = '';
                        }
                    ?>
                  <select name="data91" id="tingkat" class="form-control" >
                    <option value="{{ ($data91 =='' && $data91 == null) ? '' : $data91[0] }}">{{ ($data91 =='' && $data91 == null) ? 'Pilih Jenis' : $data91[0] }}</option>
                    <option value="1">Sains</option>
                    <option value="2">Seni</option>
                    <option value="3">Olahraga</option>
                    <option value="4">Lain - Lain</option>
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
                    ?>
                  <select name="data92" id="namaprestasi" class="form-control">
                    <option value="{{ ($data92 =='' && $data92 == null) ? '' : $data92[0] }}">{{ ($data92 =='' && $data92 == null) ? 'Pilih Tingkat' : $data92[0] }}</option>
                    <option value="1">Sekolah</option>
                    <option value="2">Kecamatan</option>
                    <option value="3">Kabupaten</option>
                    <option value="4">Provinsi</option>
                    <option value="5">Nasional</option>
                    <option value="6">Internasional</option>
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
                  <input placeholder="Nama Prestasi" name="data93" class="form-control" type="text" value="{{ ($data93 =='' && $data93 == null) ? '' : $data93[0] }}">
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
                  <input placeholder="Tahun" name="data94" class="form-control" type="text" value="{{ ($data94 =='' && $data94 == null) ? '' : $data94[0] }}">
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
                  <input placeholder="Penyelengara" name="data95" class="form-control" type="text" value="{{ ($data95 =='' && $data95 == null) ? '' : $data95[0] }}">
                </div>
              </div>
              {{-- end column 3 --}}

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

                <div class="row">
                    <div class="col-sm">
                      <?php
                        $array= array_column($file_additionaldua, 'data96');
                        if ($array != '' && $array != null) {
                          $data96 = $array;
                        } else {
                          $data96 = '';
                        }
                    ?>
                      <select name="data96" id="tingkat" class="form-control">
                        <option value="{{ ($data96 =='' && $data96 == null) ? '' : $data96[0] }}">{{ ($data96 =='' && $data96 == null) ? 'Pilih Jenis' : $data96[0] }}</option>
                        <option value="1">Anak Berprestasi</option>
                        <option value="2">Kurang Mampu</option>
                        <option value="3">Pendidikan</option>
                        <option value="4">Unggulan</option>
                        <option value="5">Lain - Lain</option>
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
                      <input placeholder="Keterangan" name="data97" class="form-control" type="text" value="{{ ($data97 =='' && $data97 == null) ? '' : $data97[0] }}">
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
                      <input placeholder="Tahun Mulai" name="data98" class="form-control" type="text" value="{{ ($data98 =='' && $data98 == null) ? '' : $data98[0] }}">
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
                      <input placeholder="Tahun Selesai" name="data99" class="form-control" type="text" value="{{ ($data98 =='' && $data98 == null) ? '' : $data98[0] }}">
                    </div>

                </div>
                <hr style="width:100%;text-align:left;margin-left:0">
                <div class="row">
                  <div class="col-sm">
                    <?php
                          $array= array_column($file_additionaldua, 'data100');
                          if ($array != '' && $array != null) {
                            $data100 = $array;
                          } else {
                            $data100 = '';
                          }
                      ?>
                    <select name="data100" id="tingkat" class="form-control" >
                      <option value="{{ ($data100 =='' && $data100 == null) ? '' : $data100[0] }}">{{ ($data100 =='' && $data100 == null) ? 'Pilih Jenis' : $data100[0] }}</option>
                      <option value="1">Anak Berprestasi</option>
                      <option value="2">Kurang Mampu</option>
                      <option value="3">Pendidikan</option>
                      <option value="4">Unggulan</option>
                      <option value="5">Lain - Lain</option>
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
                    <input placeholder="Keterangan" name="data101" class="form-control" type="text" value="{{ ($data101 =='' && $data101 == null) ? '' : $data101[0] }}">
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
                    <input placeholder="Tahun Mulai" name="data102" class="form-control" type="text" value="{{ ($data102 =='' && $data102 == null) ? '' : $data102[0] }}">
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
                    <input placeholder="Tahun Selesai" name="data103" class="form-control" type="text" value="{{ ($data103 =='' && $data103 == null) ? '' : $data103[0] }}">
                  </div>

                </div>
                <hr style="width:100%;text-align:left;margin-left:0">
                <div class="row">
                  <div class="col-sm">
                    <?php
                        $array= array_column($file_additionaldua, 'data104');
                        if ($array != '' && $array != null) {
                          $data104 = $array;
                        } else {
                          $data104 = '';
                        }
                    ?>
                    <select name="data104" id="tingkat" class="form-control" >
                      <option value="{{ ($data104 =='' && $data104 == null) ? '' : $data104[0] }}">{{ ($data104 =='' && $data104 == null) ? 'Pilih Jenis' : $data104[0] }}</option>
                      <option value="1">Anak Berprestasi</option>
                      <option value="2">Kurang Mampu</option>
                      <option value="3">Pendidikan</option>
                      <option value="4">Unggulan</option>
                      <option value="5">Lain - Lain</option>
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
                    <input placeholder="Keterangan" name="data105" class="form-control" type="text" value="{{ ($data105 =='' && $data105 == null) ? '' : $data105[0] }}">
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
                    <input placeholder="Tahun Mulai" name="data106" class="form-control" type="text" value="{{ ($data106 =='' && $data106 == null) ? '' : $data106[0] }}">
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
                    <input placeholder="Tahun Selesai" name="data107" class="form-control" type="text" value="{{ ($data107 =='' && $data107 == null) ? '' : $data107[0] }}">
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

              <div class="row">
                <div style="text-align: center" class="col-sm">
                  <span class="buttonregisterback7 btn btn-lg btn-primary me-3 indicator-label mb-12">Sebelumnya</span>
                </div>
                <div class="col-sm">

                </div>
                <div style="text-align: center" class="col-sm">
                  <span class="buttonregister8 btn btn-lg btn-primary me-3 indicator-label mb-12">Selanjutnya</span>
                </div>
              </div>

            </div>

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
                <input name="data69" type="text" class="form-control" value="{{ ($data69 =='' && $data69 == null) ? '' : $data69[0] }}">
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
                ?>
                <select name="data70" id="jenispendaftaran" class="form-control">
                  <option value="{{ ($data70 =='' && $data70 == null) ? '' : $data70[0] }}">{{ ($data70 =='' && $data70 == null) ? 'Pilih' : $data70[0] }}</option>
                  <option value="1">Siswa Baru</option>
                  <option value="2">Pindahan</option>
                  <option value="3">Kembali Bersekolah</option>
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
                <input name="data71" type="text" class="form-control" value="{{ ($data71 =='' && $data71 == null) ? '' : $data71[0] }}">
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
                <input name="data72" type="date" class="form-control" value="{{ ($data72 =='' && $data72 == null) ? '' : $data72[0] }}">
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
                <input name="data73" type="text" class="form-control" value="{{ ($data73 =='' && $data73 == null) ? '' : $data73[0] }}">
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
                <input name="data74" type="text" class="form-control" value="{{ ($data74 =='' && $data74 == null) ? '' : $data74[0] }}">
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
                <input name="data75" type="text" class="form-control" value="{{ ($data75 =='' && $data75 == null) ? '' : $data75[0] }}">
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
                <input name="data76" type="text" class="form-control" value="{{ ($data76 =='' && $data76 == null) ? '' : $data76[0] }}">
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
                  ?>
                <label for="">Keluar Karena</label>
                <select name="data77" id="keluarkarena" class="form-control">
                  <option value="{{ ($data77 =='' && $data77 == null) ? '' : $data77[0] }}">{{ ($data77 =='' && $data77 == null) ? 'Pilih' : $data77[0] }}</option>
                  <option value="1">Lulus</option>
                  <option value="2">Mutasi</option>
                  <option value="3">Dikeluarkan</option>
                  <option value="4">Mengundurkan diri</option>
                  <option value="5">Putus Sekolah</option>
                  <option value="6">Wafat</option>
                  <option value="7">Hilang</option>
                  <option value="8">Lainnya</option>
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
                <input name="data78" type="date" class="form-control" value="{{ ($data78 =='' && $data78 == null) ? '' : $data78[0] }}">
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
                <textarea name="data79" id="alasan" cols="30" rows="2" class="form-control">{{ ($data79 =='' && $data79 == null) ? '' : $data79[0] }}</textarea>
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
                        <input name="data80" type="checkbox" class="finalcheck custom-control-input" id="customSwitch1" {{ ($data80 =='' && $data80 == null) ? '' : 'checked' }}>
                      </div>
                    </div>
                    <div class="col-sm-11">
                      <label class="custom-control-label fs-5" for="customSwitch1">Saya menyetujui akan semua persyaratan yang telah dibuat dan saya akan bertanggung jawab akan apa yang telah saya cantumkan apabila terjadi hal atau sesuatu dikemudian hari</label>
                    </div>
                  </div>
              </div>

              <div class="row">
                <div style="text-align: center" class="col-sm">
                  <span class="buttonregisterback8 btn btn-lg btn-primary me-3 indicator-label mb-12">Sebelumnya</span>
                </div>
                <div class="col-sm">

                </div>
                {{-- <div style="text-align: center" class="col-sm">
                  <span class="buttonregister9 btn btn-lg btn-primary me-3 indicator-label mb-12">Selanjutnya</span>
                </div> --}}
                <div style="text-align: center" class="col-sm">
                <button type="submit" class="buttonregister9 btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
                  <span class="indicator-label">Kirim</span>
                </button>
              </div>
              </div>

            </div>
          </form>

            <form  method="POST" action="{{ route('frontend.user.registration.store') }}"enctype="multipart/form-data">

              <div class="test2">
               {{ csrf_field() }}
                <div class="form-group mb-4">
                  <label for="exampleFormControlInput1">Nama Orang Tua / Wali</label>
                  <input name="nameparent" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda">
                </div>

                <div class="form-group mb-4">
                    <label for="exampleFormControlInput1">Alamat Orang Tua / Wali</label>
                    <input name="addressparent" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="{{ $ppdb->address }}">
                </div>

                <div class="bg-white rounded-3 form-group mb-4">
                  <div class="mb-3">
                        <label for="exampleFormControlSelect1">Membayar Uang Pangkal (UP) sesuai yang tertera pada Prosedur Penerimaan Peserta Didik Baru secara</label>
                  </div>
                  <div class="form-check mb-2">
                    <?php
                    $array= array_column($file_additional, 'firstpayment');
                    if ($array != '' && $array != null) {
                      $result = $array;
                    } else {
                      $result = '';
                    }
                ?>
                    <input name="firstpayment" class="checkbox1 form-check-input" type="checkbox" value="Lunas" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                    <label class="form-check-label" for="defaultCheck1">
                      Lunas
                    </label>
                  </div>
                  <div class="form-check">
                    <?php
                    $array= array_column($file_additional, 'firstpayment2');
                    if ($array != '' && $array != null) {
                      $result = $array;
                    } else {
                      $result = '';
                    }
                ?>
                    <input name="firstpayment2" class="checkbox2 form-check-input" type="checkbox" value="cicilan" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
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
                          $array= array_column($file_additional, 'datasatu');
                          if ($array != '' && $array != null) {
                            $result = $array;
                          } else {
                            $result = '';
                          }
                      ?>
                      <input id="datasatu" name="datasatu" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }} >
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
                          $array= array_column($file_additional, 'datadua');
                          if ($array != '' && $array != null) {
                            $result = $array;
                          } else {
                            $result = '';
                          }
                      ?>
                      <input id="datadua" name="datadua" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }} >
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
                          $array= array_column($file_additional, 'datatiga');
                          if ($array != '' && $array != null) {
                            $result = $array;
                          } else {
                            $result = '';
                          }
                      ?>
                      <input id="datatiga" name="datatiga" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                      <label class="form-check-label" for="defaultCheck1">
                        Setuju
                      </label>
                    </div>
                </div>

                @if($ppdb->stage == 'SD' || $ppdb->stage == 'SMP' || $ppdb->stage == 'SMA')
                <div class="bg-white rounded-3 form-group mb-4">
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1"> <strong>4 .</strong> Jika Putra-putri kami diterima di Sekolah Negeri dan Kami membayar lunas UP, maka UP kami hanya dikembalikan sebesar 50%</label>
                    </div>
                    <div class="form-check">
                      <?php
                          $array= array_column($file_additional, 'dataempat');
                          if ($array != '' && $array != null) {
                            $result = $array;
                          } else {
                            $result = '';
                          }
                      ?>
                      <input id="dataempat" name="dataempat" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
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
                          $array= array_column($file_additional, 'datalima');
                          if ($array != '' && $array != null) {
                            $result = $array;
                          } else {
                            $result = '';
                          }
                      ?>
                      <input id="datalima" name="datalima" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" {{ ($result == '' && $result == null) ? '' : 'checked' }}>
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
                          $array= array_column($file_additional, 'dataenam');
                          if ($array != '' && $array != null) {
                            $result = $array;
                          } else {
                            $result = '';
                          }
                      ?>
                      <input id="dataenam" name="dataenam" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" {{ ($result == '' && $result == null) ? '' : 'checked' }}>
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
                          $array= array_column($file_additional, 'datatujuh');
                          if ($array != '' && $array != null) {
                            $result = $array;
                          } else {
                            $result = '';
                          }
                      ?>
                      <input id="datatujuh" name="datatujuh" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" {{ ($result == '' && $result == null) ? '' : 'checked' }}>
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
                          $array= array_column($file_additional, 'datadelapan');
                          if ($array != '' && $array != null) {
                            $result = $array;
                          } else {
                            $result = '';
                          }
                      ?>
                      <input id="datadelapan" name="datadelapan" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" {{ ($result == '' && $result == null) ? '' : 'checked' }}>
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
                          $array= array_column($file_additional, 'datasembilan');
                          if ($array != '' && $array != null) {
                            $result = $array;
                          } else {
                            $result = '';
                          }
                      ?>
                      <input id="datasembilan" name="datasembilan" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" {{ ($result == '' && $result == null) ? '' : 'checked' }}>
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
                      $array= array_column($file_additional, 'datasepuluh');
                      if ($array != '' && $array != null) {
                        $result = $array;
                      } else {
                        $result = '';
                      }
                  ?>
                      <input name="datasepuluh" class="form-check-input" type="checkbox" value="Saya menyetujui seluruh pernyataan saya di atas" id="defaultCheck1" {{ ($result == '' && $result == null) ? '' : 'checked' }}>
                      <label class="form-check-label" for="defaultCheck1">
                        Saya menyetujui seluruh pernyataan saya di atas
                      </label>
                    </div>
                </div>
                @endif

                @if($ppdb->stage == 'TK' || $ppdb->stage == 'KB')
                <div class="bg-white rounded-3 form-group mb-4">
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1"> <strong>4 .</strong>Jika kami masih memiliki tunggakan cicilan UP sampai dengan bulan Mei 2023 ,maka kami bersedia dianggap mengundurkan diri dari Sekolah Avicenna</label>
                    </div>
                    <div class="form-check">
                      <?php
                      $array= array_column($file_additional, 'dataempat');
                      if ($array != '' && $array != null) {
                        $result = $array;
                      } else {
                        $result = '';
                      }
                  ?>
                      <input name="dataempat" class="form-check-input" type="checkbox" value="Setuju" id="defaultCheck1" {{ ($result == '' && $result == null) ? '' : 'checked' }}>
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
                      $array= array_column($file_additional, 'datalima');
                      if ($array != '' && $array != null) {
                        $result = $array;
                      } else {
                        $result = '';
                      }
                  ?>
                      <input name="datalima" class="form-check-input" type="checkbox" value="Setuju" id="defaultCheck1" {{ ($result == '' && $result == null) ? '' : 'checked' }}>
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
                      $array= array_column($file_additional, 'dataenam');
                      if ($array != '' && $array != null) {
                        $result = $array;
                      } else {
                        $result = '';
                      }
                  ?>
                      <input name="dataenam" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" {{ ($result == '' && $result == null) ? '' : 'checked' }}>
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
                      $array= array_column($file_additional, 'datatujuh');
                      if ($array != '' && $array != null) {
                        $result = $array;
                      } else {
                        $result = '';
                      }
                  ?>
                      <input name="datatujuh" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" {{ ($result == '' && $result == null) ? '' : 'checked' }}>
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
                      $array= array_column($file_additional, 'datadelapan');
                      if ($array != '' && $array != null) {
                        $result = $array;
                      } else {
                        $result = '';
                      }
                  ?>
                      <input name="datadelapan" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" {{ ($result == '' && $result == null) ? '' : 'checked' }}>
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
                      $array= array_column($file_additional, 'datasembilan');
                      if ($array != '' && $array != null) {
                        $result = $array;
                      } else {
                        $result = '';
                      }
                  ?>
                      <input name="datasembilan" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" {{ ($result == '' && $result == null) ? '' : 'checked' }}>
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
                      $array= array_column($file_additional, 'datasepuluh');
                      if ($array != '' && $array != null) {
                        $result = $array;
                      } else {
                        $result = '';
                      }
                  ?>
                      <input name="datasepuluh" class="form-check-input" type="checkbox" value="Setuju" id="defaultCheck1" {{ ($result == '' && $result == null) ? '' : 'checked' }}>
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
                      $array= array_column($file_additional, 'datasebelas');
                      if ($array != '' && $array != null) {
                        $result = $array;
                      } else {
                        $result = '';
                      }
                  ?>
                      <input name="datasebelas" class="form-check-input" type="checkbox" value="Setuju" id="defaultCheck1" {{ ($result == '' && $result == null) ? '' : 'checked' }}>
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
                      $array= array_column($file_additional, 'dataduabelas');
                      if ($array != '' && $array != null) {
                        $result = $array;
                      } else {
                        $result = '';
                      }
                  ?>
                      <input name="dataduabelas" class="form-check-input" type="checkbox" value="Saya memahami dan menyetujui seluruh pernyataan di atas" id="defaultCheck1" {{ ($result == '' && $result == null) ? '' : 'checked' }}>
                      <label class="form-check-label" for="defaultCheck1">
                        Saya memahami dan menyetujui seluruh pernyataan di atas
                      </label>
                    </div>
                </div>
                @endif

                <div class="row">
                  <div style="text-align: center" class="col-sm">
                    <span class="btnceksatusebelumnya btn btn-lg btn-primary me-3 indicator-label mb-12">Sebelumnya</span>
                  </div>
                  <div class="col-sm">

                  </div>
                  <div style="text-align: center" class="col-sm">
                    <span class="btnceksatu btn btn-lg btn-primary me-3 indicator-label">Selanjutnya</span>
                  </div>
                </div>

              </div>
              {{-- change 1 --}}

               <div class="test3">
                  <div class="form-group mb-4">
                    <label for="exampleFormControlInput1">Nama Orang Tua / Wali</label>
                    <input name="nameparent" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" >
                  </div>

                  <div class="form-group mb-4">
                    <?php
                        $array= array_column($file_additional, 'data13');
                        if ($array != '' && $array != null) {
                          $result = $array;
                        } else {
                          $result = '';
                        }
                    ?>
                      <label for="exampleFormControlInput1">Nama Calon Murid</label>
                      <input name="data13" type="text" class="required1 form-control" id="exampleFormControlInput1" value="{{  !empty($result[0]) ? $result[0] : $result }}" placeholder="Jawaban Anda" required>
                  </div>

                  <div class="bg-white rounded-3 form-group mb-4">
                    <div class="mb-3">
                          <label for="exampleFormControlSelect1">Kelas</label>
                    </div>
                    <div class="mb-2">
                              <?php
                              $array= array_column($file_additional, 'data14');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                              ?>
                          @if($ppdb->stage == "SD")
                          <select name="data14" id="" class="form-control">
                            <option value="{{ !empty($result[0]) ? $result[0] :  $result  }}">{{ !empty($result[0]) ? $result[0] : 'Pilih' }}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                          </select>
                          @endif


                          @if($ppdb->stage == "TK" || $ppdb->stage == "KB")
                          <select name="data14" id="" class="form-control">
                            <option value="{{ !empty($result[0]) ? $result[0] :  $result  }}">{{ !empty($result[0]) ? $result[0] : 'Pilih' }}</option>
                            <option value="{{ $ppdb->stage == "KB" ? 'KB-A' : 'TK-A' }}">{{ $ppdb->stage == "KB" ? 'KB-A' : 'TK-A' }}</option>
                            <option value="{{ $ppdb->stage == "KB" ? 'KB-B' : 'TK-B' }}">{{ $ppdb->stage == "KB" ? 'KB-B' : 'TK-B' }}</option>
                          </select>
                          @endif

                          @if($ppdb->stage == "SMP" || $ppdb->stage == "SMA")
                          <select name="data14" id="" class="form-control">
                            <option value="{{  !empty($result[0]) ? $result[0] :  $result  }}">{{ !empty($result[0]) ? $result[0] : 'Pilih' }}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>
                          @endif
                    </div>
                  </div>

                  <div class="bg-white rounded-3 form-group mb-4">
                      <div class="mb-3">
                          <label for="exampleFormControlSelect1"> Dengan ini telah membaca dan menyetujui Tata Tertib yang berlaku untuk putra/putri kai selama bersekolah di Sekolah Avicenna</label>
                      </div>
                          <div class="form-check">
                            <?php
                            $array= array_column($file_additional, 'data15');
                            if ($array != '' && $array != null) {
                              $result = $array;
                            } else {
                              $result = '';
                            }
                        ?>
                        <input id="datadua" name="data15" class="form-check-input" type="checkbox" value="setuju" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }} >
                        <label class="form-check-label" for="defaultCheck1">
                          Ya saya Setuju
                        </label>
                      </div>
                  </div>

                    <div class="row">
                      <div style="text-align: center;"  class="col-sm">
                        <span class="btncekduasebelumnya btn btn-lg btn-primary me-3 indicator-label">Sebelumnya</span>
                      </div>

                      <div style="text-align: center;"  class="col-sm">
                        <span class="btncekdua btn btn-lg btn-primary me-3 indicator-label">Selanjutnya</span>
                      </div>
                    </div>
                </div>
               <div class="test4">
                        <div class="form-group mb-4">
                          <?php
                              $array= array_column($file_additional, 'data16');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                          ?>
                          <label for="exampleFormControlInput1">Nama Lengkap Peserta Didik</label>
                          <input name="data16" type="text" class="required2 form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="{{  !empty($result[0]) ? $result[0] :  $result  }}" required>
                        </div>



                        <div class="bg-white rounded-3 form-group mb-4">
                          <div class="mb-3">
                                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                          </div>
                          <div class="form-check mb-2">
                            <?php
                            $array= array_column($file_additional, 'data17');
                            if ($array != '' && $array != null) {
                              $result = $array;
                            } else {
                              $result = '';
                            }
                        ?>
                            <input name="data17" class="checkboxsex1 form-check-input" type="checkbox" value="Laki-laki" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                            <label class="form-check-label" for="defaultCheck1">
                              Laki-laki
                            </label>
                          </div>
                          <div class="form-check">
                            <?php
                            $array= array_column($file_additional, 'data18');
                            if ($array != '' && $array != null) {
                              $result = $array;
                            } else {
                              $result = '';
                            }
                        ?>
                            <input name="data18" class="checkboxsex2 form-check-input" type="checkbox" value="Perempuan" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                            <label class="form-check-label" for="defaultCheck2">
                              Perempuan
                            </label>
                          </div>
                        </div>

                        <div class="form-group mb-4">
                          <?php
                              $array= array_column($file_additional, 'data19');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                          ?>
                          <label for="exampleFormControlInput1">Tempat Lahir</label>
                          <input name="data19" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="{{  !empty($result[0]) ? $result[0] :  $result  }}">
                        </div>

                        <div class="form-group mb-4">
                          <?php
                              $array= array_column($file_additional, 'data20');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                          ?>
                          <label for="exampleFormControlInput1">Tanggal Lahir</label>
                          <input name="data20" type="date" class="required4 form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="{{  !empty($result[0]) ? $result[0] :  $result  }}" required>
                        </div>

                        <div class="form-group mb-4">
                          <?php
                              $array= array_column($file_additional, 'data21');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                           ?>
                          <label for="exampleFormControlInput1">Berat Badan (kg)</label>
                          <input name="data21" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="{{  !empty($result[0]) ? $result[0] :  $result  }}">
                        </div>

                      <div class="form-group mb-4">
                        <?php
                              $array= array_column($file_additional, 'data22');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                           ?>
                        <label for="exampleFormControlInput1">Tinggi Badan (cm)</label>
                        <input name="data22" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="{{  !empty($result[0]) ? $result[0] :  $result  }}">
                      </div>

                      <div class="form-group mb-4">
                        <?php
                        $array= array_column($file_additional, 'data23');
                        if ($array != '' && $array != null) {
                          $result = $array;
                        } else {
                          $result = '';
                        }
                     ?>
                        <label for="exampleFormControlInput1">Golongan Darah</label>
                        <input name="data23" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="{{  !empty($result[0]) ? $result[0] :  $result  }}">
                      </div>

                    @if($ppdb->stage == 'TK' || $ppdb->stage == 'KB')
                      {{-- RIWAYAT IMUNISASI --}}
                      <div class="bg-white rounded-3 form-group mb-4">
                        <label class="form-label fs-6 fw-bolder text-dark">Riwayat Imunisasi (Khusus TK, KB dan SD)</label>
                        <div class="mb-3">
                              <label for="exampleFormControlSelect1">Status Imunisasi (Boleh lebih dari satu)</label>
                        </div>
                        <div class="form-check mb-2">
                          <?php
                              $array= array_column($file_additional, 'data24');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                          ?>
                          <input name="data24" class=" form-check-input" type="checkbox" value="1" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                          <label class="form-check-label" for="defaultCheck1">
                            Memiliki catatan imunisasi
                          </label>
                        </div>
                        <div class="form-check mb-2">
                          <?php
                                $array= array_column($file_additional, 'data25');
                                if ($array != '' && $array != null) {
                                  $result = $array;
                                } else {
                                  $result = '';
                                }
                          ?>
                          <input name="data25" class=" form-check-input" type="checkbox" value="2" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                          <label class="form-check-label" for="defaultCheck2">
                            Saat bayi mendapatkan imunisasi
                          </label>
                        </div>
                        <div class="form-check">
                          <?php
                                $array= array_column($file_additional, 'data26');
                                if ($array != '' && $array != null) {
                                  $result = $array;
                                } else {
                                  $result = '';
                                }
                          ?>
                          <input name="data26" class=" form-check-input" type="checkbox" value="3" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                          <label class="form-check-label" for="defaultCheck2">
                            imunisasi lengkap
                          </label>
                        </div>
                      </div>
                      {{--  --}}

                      <div class="fv-row mb-10 has-feedback">
                        <label class="form-label fs-6 fw-bolder text-dark">sertifikat Imunisasi</label>

                        <input type="file" name="photo" class="required5 form-control" id="exampleInputFile" required>

                        {{-- <span>Your File</span> <input type="text" class="form-control" name="photo" value="{{ $reregistration->medco_employee_file }}" />
                           <input type="hidden" name="photo" class="form-control" id="exampleInputFile" value="{{ $reregistration->medco_employee_file }}">
                           <a href="{{ 'http://127.0.0.1:8000/'.$reregistration->medco_employee_file }}" rel="noopener noreferrer" target="_blank" >Check File</a> --}}
                      </div>
                      @endif

                      {{-- RIWAYAT VAKSIN --}}
                      <div class="bg-white rounded-3 form-group mb-4">
                        <label class="form-label fs-6 fw-bolder text-dark">Riwayat Vaksin</label>
                        <div class="mb-3">
                              <label for="exampleFormControlSelect1">Status Vaksin (Boleh lebih dari satu)</label>
                        </div>
                        <div class="form-check mb-2">
                          <?php
                              $array= array_column($file_additional, 'datavaksin24');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                          ?>
                          <input name="datavaksin24" class=" form-check-input" type="checkbox" value="1" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                          <label class="form-check-label" for="defaultCheck1">
                            booster 1
                          </label>
                        </div>
                        <div class="form-check mb-2">
                          <?php
                                $array= array_column($file_additional, 'datavaksin25');
                                if ($array != '' && $array != null) {
                                  $result = $array;
                                } else {
                                  $result = '';
                                }
                          ?>
                          <input name="datavaksin25" class=" form-check-input" type="checkbox" value="2" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                          <label class="form-check-label" for="defaultCheck2">
                            booster 2
                          </label>
                        </div>
                        <div class="form-check mb-2">
                          <?php
                                $array= array_column($file_additional, 'datavaksin26');
                                if ($array != '' && $array != null) {
                                  $result = $array;
                                } else {
                                  $result = '';
                                }
                          ?>
                          <input name="datavaksin26" class=" form-check-input" type="checkbox" value="3" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                          <label class="form-check-label" for="defaultCheck2">
                            booster 3
                          </label>
                        </div>
                        <div class="form-check">
                          <?php
                                $array= array_column($file_additional, 'datavaksin27');
                                if ($array != '' && $array != null) {
                                  $result = $array;
                                } else {
                                  $result = '';
                                }
                          ?>
                          <input name="datavaksin27" class=" form-check-input" type="checkbox" value="4" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                          <label class="form-check-label" for="defaultCheck2">
                            belum vaksin
                          </label>
                        </div>
                      </div>
                      {{--  --}}

                      <div class="fv-row mb-10 has-feedback">
                        <label class="form-label fs-6 fw-bolder text-dark">Sertifikat Vaksin</label>

                        <input type="file" name="vaksinphoto" class="required3 form-control" id="exampleInputFile">

                        {{-- <span>Your File</span> <input type="text" class="form-control" name="photo" value="{{ $reregistration->medco_employee_file }}" />
                           <input type="hidden" name="photo" class="form-control" id="exampleInputFile" value="{{ $reregistration->medco_employee_file }}">
                           <a href="{{ 'http://127.0.0.1:8000/'.$reregistration->medco_employee_file }}" rel="noopener noreferrer" target="_blank" >Check File</a> --}}
                      </div>
                          {{--  --}}
                          <div class="form-group mb-4">
                            <label for="exampleFormControlInput1">Catatan riwayat kesehatan anak dalam kendungan anak untuk melihat adanya kelainan kogenital untuk penyakit bawaan pada anak terutama yang harus diwaspadai atau butuh pengawasan khusus</label>
                            {{-- <input name="addressparent" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" > --}}
                          </div>
                          <div class="bg-white rounded-3 form-group mb-4">
                            <div class="mb-3">
                                  <label for="exampleFormControlSelect1">(Keadaan pada waktu anak dalam kandungan ) apakah ada keterangan kelainnan bayi ketika berada dalam kandungan ? jika iya apakah berbahaya? (boleh dijawab lebih dari satu)</label>
                            </div>
                            <div class="form-check mb-2">
                              <?php
                                  $array= array_column($file_additional, 'data27');
                                  if ($array != '' && $array != null) {
                                    $result = $array;
                                  } else {
                                    $result = '';
                                  }
                              ?>
                              <input name="data27" class="form-check-input" type="checkbox" value="1" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                              <label class="form-check-label" for="defaultCheck1">
                                Ada Gangguan dan Kelainan
                              </label>
                            </div>
                            <div class="form-check mb-2">
                              <?php
                                    $array= array_column($file_additional, 'data28');
                                    if ($array != '' && $array != null) {
                                      $result = $array;
                                    } else {
                                      $result = '';
                                    }
                              ?>
                              <input name="data28" class="form-check-input" type="checkbox" value="2" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                              <label class="form-check-label" for="defaultCheck2">
                                Tidak Ada Gangguan dan Kelainan
                              </label>
                            </div>
                            <div class="form-check mb-2">
                              <?php
                                    $array= array_column($file_additional, 'data29');
                                    if ($array != '' && $array != null) {
                                      $result = $array;
                                    } else {
                                      $result = '';
                                    }
                              ?>
                              <input name="data29" class="form-check-input" type="checkbox" value="3" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                              <label class="form-check-label" for="defaultCheck2">
                                Berbahaya
                              </label>
                            </div>

                            <div class="form-check mb-2">
                              <?php
                                    $array= array_column($file_additional, 'data30');
                                    if ($array != '' && $array != null) {
                                      $result = $array;
                                    } else {
                                      $result = '';
                                    }
                              ?>
                              <input name="data30" class="form-check-input" type="checkbox" value="4" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                              <label class="form-check-label" for="defaultCheck2">
                                Tidak Berbahaya
                              </label>
                            </div>

                            <div class="form-check mb-2">
                              <?php
                                    $array= array_column($file_additional, 'data31');
                                    if ($array != '' && $array != null) {
                                      $result = $array;
                                    } else {
                                      $result = '';
                                    }
                              ?>
                              <input name="data31" class="form-check-input" type="checkbox" value="4" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                              <label class="form-check-label" for="defaultCheck2">
                                Yang Lain
                              </label>
                            </div>
                          </div>
                          {{--  --}}

                                {{--  --}}
                          <div class="bg-white rounded-3 form-group mb-4">
                            <div class="mb-3">
                                  <label for="exampleFormControlSelect1">Bagaimana gambaran Waktu Kelahiran anak dan kondisi anak ketika dilahirkan? (Boleh dijawab lebih dari satu)</label>
                            </div>
                            <div class="form-check mb-2">
                              <?php
                                  $array= array_column($file_additional, 'data32');
                                  if ($array != '' && $array != null) {
                                    $result = $array;
                                  } else {
                                    $result = '';
                                  }
                              ?>
                              <input name="data32" class="form-check-input" type="checkbox" value="1" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                              <label class="form-check-label" for="defaultCheck1">
                                Normal, tidak ada gangguan
                              </label>
                            </div>
                            <div class="form-check mb-2">
                              <?php
                                    $array= array_column($file_additional, 'data33');
                                    if ($array != '' && $array != null) {
                                      $result = $array;
                                    } else {
                                      $result = '';
                                    }
                              ?>
                              <input name="data33" class="form-check-input" type="checkbox" value="2" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                              <label class="form-check-label" for="defaultCheck2">
                                Ada komplikasi ketika melahirkan
                              </label>
                            </div>
                            <div class="form-check mb-2">
                              <?php
                                    $array= array_column($file_additional, 'data34');
                                    if ($array != '' && $array != null) {
                                      $result = $array;
                                    } else {
                                      $result = '';
                                    }
                              ?>
                              <input name="data34" class="form-check-input" type="checkbox" value="3" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                              <label class="form-check-label" for="defaultCheck2">
                                Normal tidak ada cacat bawaan
                              </label>
                            </div>

                            <div class="form-check">
                              <?php
                                    $array= array_column($file_additional, 'data35');
                                    if ($array != '' && $array != null) {
                                      $result = $array;
                                    } else {
                                      $result = '';
                                    }
                              ?>
                              <input name="data35" class="form-check-input" type="checkbox" value="4" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                              <label class="form-check-label" for="defaultCheck2">
                                Ada Cacat bawaan
                              </label>
                            </div>
                          </div>
                          {{--  --}}

                            {{--  --}}
                            <div class="bg-white rounded-3 form-group mb-4">
                              <div style="text-align: center;" class="mb-3">
                                    <label for="exampleFormControlSelect1 "><strong>Bagaimana gambaran Pertumbuhan anak pada 12 bulan pertama</strong></label>
                              </div>

                              {{-- MIRING --}}
                              <div class="container">
                                <div class="row">
                                  <div class="col-sm">
                                    Miring :
                                  </div>
                                  <div class="col-sm">
                                    <div class="form-check mb-2">
                                      <?php
                                      $array= array_column($file_additional, 'data36');
                                      if ($array != '' && $array != null) {
                                        $result = $array;
                                      } else {
                                        $result = '';
                                      }
                                  ?>
                                      <input name="data36" class="checkboxnormalon form-check-input" type="checkbox" value="Normal" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                                      <label class="form-check-label" for="defaultCheck1">
                                        Normal
                                      </label>
                                    </div>

                                  </div>
                                  <div class="col-sm">
                                    <div class="form-check">
                                      <?php
                                      $array= array_column($file_additional, 'data37');
                                      if ($array != '' && $array != null) {
                                        $result = $array;
                                      } else {
                                        $result = '';
                                      }
                                  ?>
                                      <input name="data37" class="checkboxnormaloff form-check-input" type="checkbox" value="Terlambat" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                                      <label class="form-check-label" for="defaultCheck2">
                                        Terlambat
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              {{-- end MIRING --}}

                              {{-- Tenkurap --}}
                              <div class="container">
                                <div class="row">
                                  <div class="col-sm">
                                    Tengkurap :
                                  </div>
                                  <div class="col-sm">
                                    <div class="form-check mb-2">
                                      <?php
                                      $array= array_column($file_additional, 'data38');
                                      if ($array != '' && $array != null) {
                                        $result = $array;
                                      } else {
                                        $result = '';
                                      }
                                  ?>
                                      <input name="data38" class="checkboxtengkurapon form-check-input" type="checkbox" value="Normal" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                                      <label class="form-check-label" for="defaultCheck1">
                                        Normal
                                      </label>
                                    </div>

                                  </div>
                                  <div class="col-sm">
                                    <div class="form-check">
                                      <?php
                                      $array= array_column($file_additional, 'data39');
                                      if ($array != '' && $array != null) {
                                        $result = $array;
                                      } else {
                                        $result = '';
                                      }
                                  ?>
                                      <input name="data39" class="checkboxtengkurapoff form-check-input" type="checkbox" value="Terlambat" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                                      <label class="form-check-label" for="defaultCheck2">
                                        Terlambat
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              {{-- end Tengkurap --}}

                              {{-- Merangkak --}}
                              <div class="container">
                                <div class="row">
                                  <div class="col-sm">
                                    Merangkak :
                                  </div>
                                  <div class="col-sm">
                                    <div class="form-check mb-2">
                                      <?php
                                      $array= array_column($file_additional, 'data40');
                                      if ($array != '' && $array != null) {
                                        $result = $array;
                                      } else {
                                        $result = '';
                                      }
                                  ?>
                                      <input name="data40" class="checkboxmerangkakon form-check-input" type="checkbox" value="Normal" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                                      <label class="form-check-label" for="defaultCheck1">
                                        Normal
                                      </label>
                                    </div>

                                  </div>
                                  <div class="col-sm">
                                    <div class="form-check">
                                      <?php
                                      $array= array_column($file_additional, 'data41');
                                      if ($array != '' && $array != null) {
                                        $result = $array;
                                      } else {
                                        $result = '';
                                      }
                                  ?>
                                      <input name="data41" class="checkboxmerangkakoff form-check-input" type="checkbox" value="Terlambat" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                                      <label class="form-check-label" for="defaultCheck2">
                                        Terlambat
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              {{-- end Merangkak --}}

                              {{-- Duduk --}}
                              <div class="container">
                                <div class="row">
                                  <div class="col-sm">
                                    Duduk :
                                  </div>
                                  <div class="col-sm">
                                    <div class="form-check mb-2">
                                      <?php
                                      $array= array_column($file_additional, 'data42');
                                      if ($array != '' && $array != null) {
                                        $result = $array;
                                      } else {
                                        $result = '';
                                      }
                                  ?>
                                      <input name="data42" class="checkboxdudukon form-check-input" type="checkbox" value="Normal" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                                      <label class="form-check-label" for="defaultCheck1">
                                        Normal
                                      </label>
                                    </div>

                                  </div>
                                  <div class="col-sm">
                                    <div class="form-check">
                                      <?php
                                      $array= array_column($file_additional, 'data43');
                                      if ($array != '' && $array != null) {
                                        $result = $array;
                                      } else {
                                        $result = '';
                                      }
                                  ?>
                                      <input name="data43" class="checkboxdudukoff form-check-input" type="checkbox" value="Terlambat" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                                      <label class="form-check-label" for="defaultCheck2">
                                        Terlambat
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              {{-- end Duduk --}}

                              {{-- Kemampuan Bicara dan Bahasa --}}
                              <div class="container">
                                <div class="row">
                                  <div class="col-sm">
                                    Kemampuan Bicara dan Bahasa :
                                  </div>
                                  <div class="col-sm">
                                    <div class="form-check mb-2">
                                      <?php
                                      $array= array_column($file_additional, 'data44');
                                      if ($array != '' && $array != null) {
                                        $result = $array;
                                      } else {
                                        $result = '';
                                      }
                                  ?>
                                      <input name="data44" class="checkboxspeakon form-check-input" type="checkbox" value="Normal" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                                      <label class="form-check-label" for="defaultCheck1">
                                        Normal
                                      </label>
                                    </div>

                                  </div>
                                  <div class="col-sm">
                                    <div class="form-check">
                                      <?php
                                      $array= array_column($file_additional, 'data45');
                                      if ($array != '' && $array != null) {
                                        $result = $array;
                                      } else {
                                        $result = '';
                                      }
                                  ?>
                                      <input name="data45" class="checkboxspeakoff form-check-input" type="checkbox" value="Terlambat" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                                      <label class="form-check-label" for="defaultCheck2">
                                        Terlambat
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              {{-- end Kemampuan bicara dan Bahasa --}}
                            </div>
                            {{--  --}}
                              <div class="bg-white rounded-3 form-group mb-4">
                                      <div class="mb-3">
                                        <label for="exampleFormControlSelect1"> catatan riwayat penyakit</label>
                                      </div>
                                      <div class="mb-3">
                                          <label for="exampleFormControlSelect1"> Apakah ada cacat fisik</label>
                                      </div>

                                  {{--  --}}
                                    <div class="form-check mb-2">
                                      <?php
                                      $array= array_column($file_additional, 'data46');
                                      if ($array != '' && $array != null) {
                                        $result = $array;
                                      } else {
                                        $result = '';
                                      }
                                  ?>
                                      <input name="data46" class="checkboxfisik1 form-check-input" type="checkbox" value="Ada" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                                      <label class="form-check-label" for="defaultCheck1">
                                        Ada
                                      </label>
                                    </div>

                                    <div class="form-check">
                                      <?php
                                      $array= array_column($file_additional, 'data47');
                                      if ($array != '' && $array != null) {
                                        $result = $array;
                                      } else {
                                        $result = '';
                                      }
                                  ?>
                                      <input name="data47" class="checkboxfisik2 form-check-input" type="checkbox" value="Tidak Ada" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                                      <label class="form-check-label" for="defaultCheck2">
                                        Tidak Ada
                                      </label>
                                    </div>
                                    {{--  --}}
                              </div>

                          {{--  --}}
                        <div class="bg-white rounded-3 form-group mb-4">
                          <div class="mb-3">
                                <label for="exampleFormControlSelect1">apakah pernah mengalami kejang ketika demam atau memiliki riwayat kejang demam ?( Jawaban boleh lebih dari satu )</label>
                          </div>
                          <div class="form-check mb-2">
                            <?php
                                $array= array_column($file_additional, 'data48');
                                if ($array != '' && $array != null) {
                                  $result = $array;
                                } else {
                                  $result = '';
                                }
                            ?>
                            <input name="data48" class="form-check-input" type="checkbox" value="1" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                            <label class="form-check-label" for="defaultCheck1">
                             Ya , Pernah
                            </label>
                          </div>
                          <div class="form-check mb-2">
                            <?php
                                  $array= array_column($file_additional, 'data49');
                                  if ($array != '' && $array != null) {
                                    $result = $array;
                                  } else {
                                    $result = '';
                                  }
                            ?>
                            <input name="data49" class="form-check-input" type="checkbox" value="2" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                            <label class="form-check-label" for="defaultCheck2">
                              Tidak Pernah
                            </label>
                          </div>
                          <div class="form-check mb-2">
                            <?php
                                  $array= array_column($file_additional, 'data50');
                                  if ($array != '' && $array != null) {
                                    $result = $array;
                                  } else {
                                    $result = '';
                                  }
                            ?>
                            <input name="data50" class="form-check-input" type="checkbox" value="3" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                            <label class="form-check-label" for="defaultCheck2">
                             Ya, Punya Riwayat kejang demam (tiap demam pasti kejang)
                            </label>
                          </div>

                          <div class="form-check mb-2">
                            <?php
                                  $array= array_column($file_additional, 'data51');
                                  if ($array != '' && $array != null) {
                                    $result = $array;
                                  } else {
                                    $result = '';
                                  }
                            ?>
                            <input name="data51" class="form-check-input" type="checkbox" value="4" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                            <label class="form-check-label" for="defaultCheck2">
                              Tidak ada riwayat kejang demam
                            </label>
                          </div>
                        </div>
                        {{--  --}}

                      {{--  --}}
                      <div class="form-group mb-4">
                        <?php
                              $array= array_column($file_additional, 'data52');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                           ?>
                        <label for="exampleFormControlInput1"> apakah memiliki riwayat penyakit yang di derita ? penyakit apa,pada usia berapa ketika mengalami sakit ? lama sakitnya ? apakah masih menjalani medikasi sampai saat ini ? , apakah penyakit ini kambuhan?</label>
                        <input name="data52" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="{{  !empty($result[0]) ? $result[0] :  $result  }}">
                      </div>
                      {{--  --}}

                  {{--  --}}
                  <div class="form-group mb-4">
                    <?php
                          $array= array_column($file_additional, 'data53');
                          if ($array != '' && $array != null) {
                            $result = $array;
                          } else {
                            $result = '';
                          }
                       ?>
                    <label for="exampleFormControlInput1"> apakah pernah dirawat di rumah sakit? karena sakit apa ? tahun berapa ?</label>
                    <input name="data53" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="{{  !empty($result[0]) ? $result[0] :  $result  }}">
                  </div>
                  {{--  --}}

                        {{--  --}}
                        <div class="form-group mb-4">
                          <?php
                                $array= array_column($file_additional, 'data54');
                                if ($array != '' && $array != null) {
                                  $result = $array;
                                } else {
                                  $result = '';
                                }
                             ?>
                          <label for="exampleFormControlInput1"> catatan lain jika ada</label>
                          <input name="data54" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="{{  !empty($result[0]) ? $result[0] :  $result  }}">
                        </div>
                        {{--  --}}

                          <div class="row">
                            <div  style="text-align: center;" class="row">
                                <div class="col-sm">
                                    <span class="btncektigasebelumnya btn btn-lg btn-primary me-3 indicator-label">Sebelumnya</span>
                                </div>
                                <div class="col-8">

                                </div>
                                <div class="col-sm">
                                  <span class="btncektiga btn btn-lg btn-primary me-3 indicator-label">Selanjutnya</span>
                                </div>
                            </div>              
                          </div>
                </div>

                <div class="test5">


                  {{--  --}}
                  <div class="form-group mb-4">
                    <?php
                          $array= array_column($file_additional, 'data55');
                          if ($array != '' && $array != null) {
                            $result = $array;
                          } else {
                            $result = '';
                          }
                       ?>
                    <label for="exampleFormControlInput1">Sekolah Asal</label>
                    <input name="data55" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="{{  !empty($result[0]) ? $result[0] :  $result  }}">
                  </div>
                  {{--  --}}

                  <div class="form-group mb-4">
                    <label for="exampleFormControlInput1">Saya Mengetahui sekolah Avicenna melalui ?</label>
                    {{-- <input name="addressparent" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" > --}}
                  </div>

                  {{--  --}}

                  <div class="bg-white rounded-3 form-group mb-4">
                    <div class="mb-3">
                          <label for="exampleFormControlSelect1">A. Brand</label>
                    </div>
                    <div class="mb-2">
                              <?php
                              $array= array_column($file_additional, 'data56');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                              ?>

                          <select name="data56" id="" class="form-control">
                            <option value="{{ !empty($result[0]) ? $result[0] :  $result  }}">{{ !empty($result[0]) ? $result[0] : 'Pilih' }}</option>
                            <option value="1">Keluarga</option>
                            <option value="2">Tetangga</option>
                            <option value="3">Teman</option>
                            <option value="4">Tidak Melalui Brand</option>
                          </select>

                    </div>
                  </div>

                  <div class="bg-white rounded-3 form-group mb-4">
                    <div class="mb-3">
                          <label for="exampleFormControlSelect1">B. Kegiatan Sekolah</label>
                    </div>
                    <div class="mb-2">
                              <?php
                              $array= array_column($file_additional, 'data57');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                              ?>

                          <select name="data57" id="" class="form-control">
                            <option value="{{ !empty($result[0]) ? $result[0] :  $result  }}">{{ !empty($result[0]) ? $result[0] : 'Pilih' }}</option>
                            <option value="1">Open House</option>
                            <option value="2">Lomba antar Sekolah</option>
                            <option value="3">Tidak Melalui Kegiatan Sekolah</option>
                          </select>

                    </div>
                  </div>

                  <div class="bg-white rounded-3 form-group mb-4">
                    <div class="mb-3">
                          <label for="exampleFormControlSelect1">C. Media Cetak</label>
                    </div>
                    <div class="mb-2">
                              <?php
                              $array= array_column($file_additional, 'data58');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                              ?>

                          <select name="data58" id="" class="form-control">
                            <option value="{{ !empty($result[0]) ? $result[0] :  $result  }}">{{ !empty($result[0]) ? $result[0] : 'Pilih' }}</option>
                            <option value="1">Spanduk</option>
                            <option value="2">Brosur</option>
                            <option value="3">Koran</option>
                            <option value="4">Tidak Melalui Media Cetak</option>
                          </select>

                    </div>
                  </div>

                  <div class="bg-white rounded-3 form-group mb-4">
                    <div class="mb-3">
                          <label for="exampleFormControlSelect1">D. Media Elektronik</label>
                    </div>
                    <div class="mb-2">
                              <?php
                              $array= array_column($file_additional, 'data59');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                              ?>

                          <select name="data59" id="" class="form-control">
                            <option value="{{ !empty($result[0]) ? $result[0] :  $result  }}">{{ !empty($result[0]) ? $result[0] : 'Pilih' }}</option>
                            <option value="1">Televisi</option>
                            <option value="2">Radio</option>
                            <option value="3">SMS</option>
                            <option value="4">Tidak Melalui Media Elektronik</option>
                          </select>

                    </div>
                  </div>


                  <div class="bg-white rounded-3 form-group mb-4">
                    <div class="mb-3">
                          <label for="exampleFormControlSelect1">E. Media Sosial</label>
                    </div>
                    <div class="mb-2">
                              <?php
                              $array= array_column($file_additional, 'data60');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                              ?>

                          <select name="data60" id="" class="form-control">
                            <option value="{{ !empty($result[0]) ? $result[0] :  $result  }}">{{ !empty($result[0]) ? $result[0] : 'Pilih' }}</option>
                            <option value="1">Instagram</option>
                            <option value="2">Facebook</option>
                            <option value="3">Twitter</option>
                            <option value="4">Linkedin</option>
                            <option value="5">Tidak Melalui Media Sosial</option>
                          </select>

                    </div>
                  </div>

                  <div class="bg-white rounded-3 form-group mb-4">
                    <div class="mb-3">
                          <label for="exampleFormControlSelect1">F. Internet</label>
                    </div>
                    <div class="mb-2">
                              <?php
                              $array= array_column($file_additional, 'data61');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                              ?>

                          <select name="data61" id="" class="form-control">
                            <option value="{{ !empty($result[0]) ? $result[0] :  $result  }}">{{ !empty($result[0]) ? $result[0] : 'Pilih' }}</option>
                            <option value="1">Website</option>
                            <option value="2">Google</option>
                            <option value="3">Forum</option>
                            <option value="4">Tidak Melalui Internet</option>
                          </select>

                    </div>
                  </div>

                  {{--  --}}

                   {{--  --}}
                   <div class="bg-white rounded-3 form-group mb-4">
                    <div class="mb-3">
                          <label for="exampleFormControlSelect1">Hal Membuat saya memilih sekolah Avicenna ?</label>
                    </div>
                    <div class="form-check mb-2">
                      <?php
                          $array= array_column($file_additional, 'data62');
                          if ($array != '' && $array != null) {
                            $result = $array;
                          } else {
                            $result = '';
                          }
                      ?>
                      <input name="data62" class="form-check-input" type="checkbox" value="1" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                      <label class="form-check-label" for="defaultCheck1">
                        Program Sekolah
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <?php
                            $array= array_column($file_additional, 'data63');
                            if ($array != '' && $array != null) {
                              $result = $array;
                            } else {
                              $result = '';
                            }
                      ?>
                      <input name="data63" class="form-check-input" type="checkbox" value="2" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                      <label class="form-check-label" for="defaultCheck2">
                        Fasilitas % pelayanan
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <?php
                            $array= array_column($file_additional, 'data64');
                            if ($array != '' && $array != null) {
                              $result = $array;
                            } else {
                              $result = '';
                            }
                      ?>
                      <input name="data64" class="form-check-input" type="checkbox" value="3" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                      <label class="form-check-label" for="defaultCheck2">
                        Jarak
                      </label>
                    </div>

                    <div class="form-check mb-2">
                      <?php
                            $array= array_column($file_additional, 'data65');
                            if ($array != '' && $array != null) {
                              $result = $array;
                            } else {
                              $result = '';
                            }
                      ?>
                      <input name="data65" class="form-check-input" type="checkbox" value="4" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                      <label class="form-check-label" for="defaultCheck2">
                        Uang Sekolah Terjangkau
                      </label>
                    </div>
                  </div>
                  {{--  --}}

                    {{--  --}}
                    <div class="bg-white rounded-3 form-group mb-4">
                      <div class="mb-3">
                            <label for="exampleFormControlSelect1">Alasan memilih program Sekolah ?</label>
                      </div>
                      <div class="form-check mb-2">
                        <?php
                            $array= array_column($file_additional, 'dataschool62');
                            if ($array != '' && $array != null) {
                              $result = $array;
                            } else {
                              $result = '';
                            }
                        ?>
                        <input name="dataschool62" class="form-check-input" type="checkbox" value="1" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                        <label class="form-check-label" for="defaultCheck1">
                          Memiliki Program Habits  7 "Leader in Me"
                        </label>
                      </div>
                      <div class="form-check mb-2">
                        <?php
                              $array= array_column($file_additional, 'dataschool63');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                        ?>
                        <input name="dataschool63" class="form-check-input" type="checkbox" value="2" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                        <label class="form-check-label" for="defaultCheck2">
                          Prestasi Sekolah
                        </label>
                      </div>
                      <div class="form-check mb-2">
                        <?php
                              $array= array_column($file_additional, 'dataschool64');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                        ?>
                        <input name="dataschool64" class="form-check-input" type="checkbox" value="3" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                        <label class="form-check-label" for="defaultCheck2">
                         Ekstrakulikuler
                        </label>
                      </div>

                      <div class="form-check mb-2">
                        <?php
                              $array= array_column($file_additional, 'dataschool65');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                        ?>
                        <input name="dataschool65" class="form-check-input" type="checkbox" value="4" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                        <label class="form-check-label" for="defaultCheck2">
                          Tidak Memilih Program
                        </label>
                      </div>
                    </div>
                    {{--  --}}


                  {{--  --}}
                  <div class="bg-white rounded-3 form-group mb-4">
                    <div class="mb-3">
                          <label for="exampleFormControlSelect1">Alasan memilih "Fasilitas dan Pelayanan" ?</label>
                    </div>
                    <div class="form-check mb-2">
                      <?php
                          $array= array_column($file_additional, 'data66');
                          if ($array != '' && $array != null) {
                            $result = $array;
                          } else {
                            $result = '';
                          }
                      ?>
                      <input name="data66" class="form-check-input" type="checkbox" value="1" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                      <label class="form-check-label" for="defaultCheck1">
                        Fasilitas Sekolah lengkap
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <?php
                            $array= array_column($file_additional, 'data67');
                            if ($array != '' && $array != null) {
                              $result = $array;
                            } else {
                              $result = '';
                            }
                      ?>
                      <input name="data67" class="form-check-input" type="checkbox" value="2" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                      <label class="form-check-label" for="defaultCheck2">
                        Kebersihan Gedung Sekolah
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <?php
                            $array= array_column($file_additional, 'data68');
                            if ($array != '' && $array != null) {
                              $result = $array;
                            } else {
                              $result = '';
                            }
                      ?>
                      <input name="data68" class="form-check-input" type="checkbox" value="3" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                      <label class="form-check-label" for="defaultCheck2">
                       Pelayanan baik penyampaian informasi cukup jelas
                      </label>
                    </div>

                    <div class="form-check mb-2">
                      <?php
                            $array= array_column($file_additional, 'data69');
                            if ($array != '' && $array != null) {
                              $result = $array;
                            } else {
                              $result = '';
                            }
                      ?>
                      <input name="data69" class="form-check-input" type="checkbox" value="4" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                      <label class="form-check-label" for="defaultCheck2">
                        Tenaga pendidik yang Berkompeten & Profesional
                      </label>
                    </div>

                    <div class="form-check mb-2">
                      <?php
                            $array= array_column($file_additional, 'data70');
                            if ($array != '' && $array != null) {
                              $result = $array;
                            } else {
                              $result = '';
                            }
                      ?>
                      <input name="data70" class="form-check-input" type="checkbox" value="4" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                      <label class="form-check-label" for="defaultCheck2">
                        Tidak Memilih Fasilitas & Pelayanan
                      </label>
                    </div>
                  </div>
                  {{--  --}}


                     {{--  --}}
                     <div class="bg-white rounded-3 form-group mb-4">
                      <div class="mb-3">
                            <label for="exampleFormControlSelect1">Alasan memilih Jarak ?</label>
                      </div>
                      <div class="form-check mb-2">
                        <?php
                            $array= array_column($file_additional, 'data71');
                            if ($array != '' && $array != null) {
                              $result = $array;
                            } else {
                              $result = '';
                            }
                        ?>
                        <input name="data71" class="form-check-input" type="checkbox" value="1" id="defaultdata71" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                        <label class="form-check-label" for="defaultCheck1">
                          < 1Km dari tempat tinggal
                        </label>
                      </div>
                      <div class="form-check mb-2">
                        <?php
                              $array= array_column($file_additional, 'data72');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                        ?>
                        <input name="data72" class="form-check-input" type="checkbox" value="2" id="defaultdata72" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                        <label class="form-check-label" for="defaultCheck2">
                          1 - 5 Km dari tempat tinggal
                        </label>
                      </div>
                      <div class="form-check mb-2">
                        <?php
                              $array= array_column($file_additional, 'data73');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                        ?>
                        <input name="data73" class="form-check-input" type="checkbox" value="3" id="defaultdata73" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                        <label class="form-check-label" for="defaultCheck3">
                         6 - 10 Km dari tempat Tinggal
                        </label>
                      </div>

                      <div class="form-check mb-2">
                        <?php
                              $array= array_column($file_additional, 'data74');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                        ?>
                        <input name="data74" class="form-check-input" type="checkbox" value="4" id="defaultdata74" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                        <label class="form-check-label" for="defaultCheck4">
                          11 - 20 Km dan tempat tinggal
                        </label>
                      </div>

                      <div class="form-check mb-2">
                        <?php
                              $array= array_column($file_additional, 'data75');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                        ?>
                        <input name="data75" class="form-check-input" type="checkbox" value="5" id="defaultdata75" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                        <label class="form-check-label" for="defaultCheck5">
                          21 - 30 Km dari tempat tinggal
                        </label>
                      </div>


                      <div class="form-check mb-2">
                        <?php
                              $array= array_column($file_additional, 'data76');
                              if ($array != '' && $array != null) {
                                $result = $array;
                              } else {
                                $result = '';
                              }
                        ?>
                        <input name="data76" class="form-check-input" type="checkbox" value="6" id="defaultdata76" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                        <label class="form-check-label" for="defaultCheck6">
                          Tidak memilih 'Jarak'
                        </label>
                      </div>
                    </div>
                    {{--  --}}

                  {{--  --}}
                  <div class="bg-white rounded-3 form-group mb-4">
                    <div class="mb-3">
                          <label for="exampleFormControlSelect1">Alasan memilih uang Sekolah Terjangkau ?</label>
                    </div>
                    <div class="form-check mb-2">
                      <?php
                          $array= array_column($file_additional, 'data77');
                          if ($array != '' && $array != null) {
                            $result = $array;
                          } else {
                            $result = '';
                          }
                      ?>
                      <input name="data77" class="form-check-input" type="checkbox" value="1" id="defaultCheck1" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                      <label class="form-check-label" for="defaultCheck1">
                        Uang Pangkal
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <?php
                            $array= array_column($file_additional, 'data78');
                            if ($array != '' && $array != null) {
                              $result = $array;
                            } else {
                              $result = '';
                            }
                      ?>
                      <input name="data78" class="form-check-input" type="checkbox" value="2" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                      <label class="form-check-label" for="defaultCheck2">
                        SPP
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <?php
                            $array= array_column($file_additional, 'data79');
                            if ($array != '' && $array != null) {
                              $result = $array;
                            } else {
                              $result = '';
                            }
                      ?>
                      <input name="data79" class="form-check-input" type="checkbox" value="3" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                      <label class="form-check-label" for="defaultCheck2">
                      Tanda Adanya biaya Tambahan
                      </label>
                    </div>

                    <div class="form-check mb-2">
                      <?php
                            $array= array_column($file_additional, 'data80');
                            if ($array != '' && $array != null) {
                              $result = $array;
                            } else {
                              $result = '';
                            }
                      ?>
                      <input name="data80" class="form-check-input" type="checkbox" value="4" id="defaultCheck2" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                      <label class="form-check-label" for="defaultCheck2">
                        Tidak Memiliki Uang Sekolah Terjangkau
                      </label>
                    </div>
                  </div>
                  {{--  --}}

                  {{--  --}}
                  <div class="bg-white rounded-3 form-group mb-4">
                    <div class="mb-3">
                          <label for="exampleFormControlSelect1">Bagaimana Prosedur penerima PPDB sekolah Avicenna ?</label>
                    </div>
                    <div class="form-check mb-2">
                      <?php
                          $array= array_column($file_additional, 'data81');
                          if ($array != '' && $array != null) {
                            $result = $array;
                          } else {
                            $result = '';
                          }
                      ?>
                      <input name="data81" class="form-check-input" type="checkbox" value="1" id="defaultdata81" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                      <label class="form-check-label" for="defaultCheck1">
                        Sederhana dan Mudah
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <?php
                            $array= array_column($file_additional, 'data82');
                            if ($array != '' && $array != null) {
                              $result = $array;
                            } else {
                              $result = '';
                            }
                      ?>
                      <input name="data82" class="form-check-input" type="checkbox" value="2" id="defaultdata82" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                      <label class="form-check-label" for="defaultCheck2">
                        Standar seperti disekolah lain
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <?php
                            $array= array_column($file_additional, 'data83');
                            if ($array != '' && $array != null) {
                              $result = $array;
                            } else {
                              $result = '';
                            }
                      ?>
                      <input name="data83" class="form-check-input" type="checkbox" value="3" id="defaultdata83" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                      <label class="form-check-label" for="defaultCheck2">
                      Berbelit belit dan perlu disederhanakan
                      </label>
                    </div>

                    <div class="form-check mb-2">
                      <?php
                            $array= array_column($file_additional, 'data84');
                            if ($array != '' && $array != null) {
                              $result = $array;
                            } else {
                              $result = '';
                            }
                      ?>
                      <input name="data84" class="form-check-input" type="checkbox" value="4" id="defaultdata84" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                      <label class="form-check-label" for="defaultCheck3">
                        Tidak Memiliki Uang Sekolah Terjangkau
                      </label>
                    </div>

                    <div class="form-check mb-2">
                      <?php
                            $array= array_column($file_additional, 'data85');
                            if ($array != '' && $array != null) {
                              $result = $array;
                            } else {
                              $result = '';
                            }
                      ?>
                      <input name="data85" class="form-check-input" type="checkbox" value="5" id="defaultdata85" {{ ($result =='' && $result == null) ? '' : 'checked' }}>
                      <label class="form-check-label" for="defaultCheck4">
                        Merepotkan
                      </label>
                    </div>
                  </div>


                    {{--  --}}
                    <div class="form-group mb-4">
                      <?php
                            $array= array_column($file_additional, 'data86');
                            if ($array != '' && $array != null) {
                              $result = $array;
                            } else {
                              $result = '';
                            }
                         ?>
                      <label for="exampleFormControlInput1">Pendapat Saya</label>
                      <input name="data86" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jawaban Anda" value="{{  !empty($result[0]) ? $result[0] :  $result  }}">
                    </div>
                    {{--  --}}


                    <div class="container">
                      <div style="text-align: center;" class="row">
                        <div class="col-sm">
                          <span class="btncekempatsebelumnya btn btn-lg btn-primary me-3 indicator-label">Sebelumnya</span>
                        </div>
                        <div class="col-8">

                        </div>
                        <div class="col-sm">
                          <button type="submit" class="btncekempat btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
                            <span class="indicator-label">Kirim</span>
                          </button>
                        </div>
                      </div>
                    </div>



                </div>
               </form>


@endsection



@push('after-scripts')
<script>

$(document).ready(function() {

    $('.btncekempat').click(function(){
        if($('.required1').val() == ''){
            alert('<i>HTML</i> <u>example</u>'," You can use <b>bold text</b>, <a href='//github.com'>links</a> and other HTML tags ",'success');
        }
      });

      $('.btncekempat').click(function(){
        if($('.required2').val() == ''){
            alert('Nama Lengkap Peserta Didik belum di isi');
        }
      });


      $('.btncekempat').click(function(){
        if($('.required4').val() == ''){
            alert('Tanggal Lahir belum di isi');
        }
      });
      
      $('.btncekempat').click(function(){
        if($('.required5').val() == ''){
            alert('Tanggal Lahir belum di isi');
        }
      });


    $('.test2').hide();

    $('.test3').hide();

    $('.test4').hide();

    $('.test5').hide();

    $('.register2').hide();
    $('.register3').hide();
    $('.register4').hide();
    $('.register5').hide();
    $('.register6').hide();
    $('.register7').hide();
    $('.register8').hide();
    $('.register9').hide();

// button back
    $('.buttonregisterback1').click( function() {
      $('.register1').show();
      $('.register2').hide();
    })

    $('.buttonregisterback2').click( function() {
      $('.register2').show();
      $('.register1').hide();
      $('.register3').hide();
    })

    $('.buttonregisterback3').click( function() {
      $('.register3').show();
      $('.register4').hide();
      $('.register1').hide();
      $('.register2').hide();
    })

    $('.buttonregisterback4').click( function() {
      $('.register4').show();
      $('.register5').hide();
      $('.register3').hide();
      $('.register1').hide();
      $('.register2').hide();
    })

    $('.buttonregisterback5').click( function() {
      $('.register5').show();
      $('.register6').hide();
      $('.register4').hide();
      $('.register3').hide();
      $('.register1').hide();
      $('.register2').hide();
    })

    $('.buttonregisterback6').click( function() {
      $('.register6').show();
      $('.register7').hide();
      $('.register5').hide();
      $('.register4').hide();
      $('.register3').hide();
      $('.register1').hide();
      $('.register2').hide();
    })

    $('.buttonregisterback7').click( function() {
      $('.register7').show();
      $('.register8').hide();
      $('.register6').hide();
      $('.register5').hide();
      $('.register4').hide();
      $('.register3').hide();
      $('.register1').hide();
      $('.register2').hide();
    })

    $('.buttonregisterback8').click( function() {
      $('.register8').show();
      $('.register9').hide();
      $('.register7').hide();
      $('.register6').hide();
      $('.register5').hide();
      $('.register4').hide();
      $('.register3').hide();
      $('.register1').hide();
      $('.register2').hide();
    })

    // $('.buttonregisterback9').click( function() {
    //   $('.register9').show();
    //   $('.register8').hide();
    //   $('.register7').hide();
    //   $('.register6').hide();
    //   $('.register5').hide();
    //   $('.register4').hide();
    //   $('.register3').hide();
    //   $('.register1').hide();
    //   $('.register2').hide();
    //   $('.btnparent').hide();

    // })

    $('.btnreregister').removeClass('btn-secondary').addClass('btn-success');

    $('.buttonregister1').click( function() {
      $('.register2').show();
      $('.register1').hide();
    });

    $('.buttonregister2').click( function() {
      $('.register3').show();
      $('.register1').hide();
      $('.register2').hide();
    })

    $('.buttonregister3').click( function() {
      $('.register4').show();
      $('.register3').hide();
      $('.register1').hide();
      $('.register2').hide();
    })

    $('.buttonregister4').click( function() {
      $('.register5').show();
      $('.register4').hide();
      $('.register3').hide();
      $('.register1').hide();
      $('.register2').hide();
    })

    $('.buttonregister5').click( function() {

      $('.register6').show();
      $('.register5').hide();
      $('.register4').hide();
      $('.register3').hide();
      $('.register1').hide();
      $('.register2').hide();
    })

    $('.buttonregister6').click( function() {
      $('.register7').show();
      $('.register6').hide();
      $('.register5').hide();
      $('.register4').hide();
      $('.register3').hide();
      $('.register1').hide();
      $('.register2').hide();
    })

    $('.buttonregister7').click( function() {
      $('.register8').show();
      $('.register7').hide();
      $('.register6').hide();
      $('.register5').hide();
      $('.register4').hide();
      $('.register3').hide();
      $('.register1').hide();
      $('.register2').hide();
    })

    $('.buttonregister8').click( function() {
      $('.register9').show();
      $('.register8').hide();
      $('.register7').hide();
      $('.register6').hide();
      $('.register5').hide();
      $('.register4').hide();
      $('.register3').hide();
      $('.register1').hide();
      $('.register2').hide();
    })

    $('.buttonregister9').click( function() {
      $('.test2').show();
      $('.register9').hide();
      $('.register8').hide();
      $('.register7').hide();
      $('.register6').hide();
      $('.register5').hide();
      $('.register4').hide();
      $('.register3').hide();
      $('.register1').hide();
      $('.register2').hide();
      $('.btnreregister').removeClass('btn-success').addClass('btn-secondary');
      $('.btnparent').removeClass('btn-secondary').addClass('btn-success');
    })


    $('.btnceksatu').click( function() {
        $('.test3').show();
        $('.test2').hide();
        $('.test4').hide();
        $('.test5').hide();
        $('.btnparent').removeClass('btn-success').addClass('btn-secondary');
        $('.btnrules').removeClass('btn-secondary').addClass('btn-success');
    })

    $('.btncekdua').click( function() {
        $('.test4').show();
        $('.test2').hide();
        $('.test3').hide();
        $('.test5').hide();
        $('.btnconditionstudent').removeClass('btn-secondary').addClass('btn-success');
        $('.btnrules').removeClass('btn-success').addClass('btn-secondary');
        $('.btnparent').removeClass('btn-success').addClass('btn-secondary');
    })


    $('.btncektiga').click( function() {
        $('.test5').show();
        $('.test2').hide();
        $('.test3').hide();
        $('.test4').hide();
        $('.btnangket').removeClass('btn-secondary').addClass('btn-success');
        $('.btnconditionstudent').removeClass('btn-success').addClass('btn-secondary');
        $('.btnparent').removeClass('btn-success').addClass('btn-secondary');
        $('.btnrules').removeClass('btn-success').addClass('btn-secondary');
    })

    $('.btnceksatusebelumnya').click( function() {
      $('.register9').show();
      $('.test2').hide();
        $('.btnrules').removeClass('btn-success').addClass('btn-secondary');
        $('.btnparent').removeClass('btn-success').addClass('btn-secondary');
        $('.btnreregister').removeClass('btn-secondary').addClass('btn-success');
    })

    $('.btncekduasebelumnya').click( function() {
        $('.test2').toggle();
        $('.test3').hide();
        $('.test4').hide();
        $('.test5').hide();
        $('.btnparent').removeClass('btn-secondary').addClass('btn-success');
        $('.btnrules').removeClass('btn-success').addClass('btn-secondary');
    })

    $('.btncektigasebelumnya').click( function() {
        $('.test3').toggle();
        $('.test2').hide();
        $('.test4').hide();
        $('.test5').hide();
        $('.btnrules').removeClass('btn-secondary').addClass('btn-success');
        $('.btnconditionstudent').removeClass('btn-success').addClass('btn-secondary');
    })

    $('.btncekempatsebelumnya').click( function() {
      $('.test4').toggle();
        $('.test2').hide();
        $('.test3').hide();
        $('.test5').hide();
        $('.btnconditionstudent').removeClass('btn-secondary').addClass('btn-success');
        $('.btnangket').removeClass('btn-success').addClass('btn-secondary');

    })



    $('.checkbox1').click(function() {
      $('.checkbox2').prop("checked", false);
    })

    $('.checkbox2').click(function() {
      $('.checkbox1').prop("checked", false);
    })

    $('.checkboxsex1').click(function() {
      $('.checkboxsex2').prop("checked",false);
    })

    $('.checkboxsex2').click(function() {
      $('.checkboxsex1').prop("checked",false);
    })

    $('.checkboxfisik1').click(function() {
      $('.checkboxfisik2').prop("checked",false);
    })

    $('.checkboxfisik2').click(function() {
      $('.checkboxfisik1').prop("checked",false);
    })

    //normal

    $('.checkboxnormalon').click(function() {
      $('.checkboxnormaloff').prop("checked", false);
    })

    $('.checkboxnormaloff').click(function() {
      $('.checkboxnormalon').prop("checked", false);
    })

    // tengkurap

    $('.checkboxtengkurapon').click(function() {
      $('.checkboxtengkurapoff').prop("checked", false);
    })

    $('.checkboxtengkurapoff').click(function() {
      $('.checkboxtengkurapon').prop("checked", false);
    })

    // merangkak

    $('.checkboxmerangkakon').click(function() {
      $('.checkboxmerangkakoff').prop("checked", false);
    })

    $('.checkboxmerangkakoff').click(function() {
      $('.checkboxmerangkakon').prop("checked", false);
    })


    // duduk

    $('.checkboxdudukon').click(function() {
      $('.checkboxdudukoff').prop("checked", false);
    })

    $('.checkboxdudukoff').click(function() {
      $('.checkboxdudukon').prop("checked", false);
    })


     // speak

     $('.checkboxspeakon').click(function() {
      $('.checkboxspeakoff').prop("checked", false);
    })

    $('.checkboxspeakoff').click(function() {
      $('.checkboxspeakon').prop("checked", false);
    })


    $('.vaksin').click(function() {
      $('.imunisasi1').prop("checked", false);
      $('.imunisasi2').prop("checked", false);
      $('.imunisasi3').prop("checked", false);
    })

    $('.imunisasi1').click(function() {
      $('.vaksin').prop("checked", false);
    })

    $('.imunisasi2').click(function() {
      $('.vaksin').prop("checked", false);
    })

    $('.imunisasi3').click(function() {
      $('.vaksin').prop("checked", false);
    })

    if ($('.finalcheck').is(':checked')) {
      $('.test2').show();
      $('.register9').hide();
      $('.register8').hide();
      $('.register7').hide();
      $('.register6').hide();
      $('.register5').hide();
      $('.register4').hide();
      $('.register3').hide();
      $('.register1').hide();
      $('.register2').hide();
      $('.btnreregister').removeClass('btn-success').addClass('btn-secondary');
      $('.btnparent').removeClass('btn-secondary').addClass('btn-success');
    }

});

</script>
@endpush

