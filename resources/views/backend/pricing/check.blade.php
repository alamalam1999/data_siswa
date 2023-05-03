<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="card">
        <div class="card-header pt-7 pb-7">
    
            <div class="row">
                <div>
                    <a href="{{ route('admin.pricing.export_excel') }}">
                    <button id="btn-search" type="submit" class="testing2 btn btn-flex btn-primary">Pricing Gelombang 2</button>
                    </a>
                </div>
                <div class="col">
                  
                </div>
              </div>      
        </div>
    </div>
    
    <div>
     <div class="card">
          <table id="myTable">
              <thead>
                 <tr>
                      <th>No</th>
                      <th>NO_FORMULIR</th>         
                      <th>TAHUN_AJARAN</th>
                      <th>TANGGAL_PENDAFTARAN</th>
                      <th>STATUS_SISWA</th>
                      <th>NAMA_LENGKAP</th>
                      <th>JENIS_KELAMIN</th>
                      <th>NISN</th>
                      <th>KITAS</th>
                      <th>TEMPAT_LAHIR</th>
                      <th>TANGGAL_LAHIR</th>
                      <th>AKTA_KELAHIRAN</th>
                      <th>AGAMA</th>
                      <th>KEWARGANEGARAAN</th>
                      <th>NAMA_NEGARA</th>
                      <th>BERKEBUTUHAN_KHUSUS</th>
                      <th>BERKEBUTUHAN_KHUSUS_2</th>
                      <th>ALAMAT_JALAN</th>
                      <th>RT</th>
                      <th>RW</th>
                      <th>NAMA_DUSUN</th>
                      <th>NAMA_KELURAHAN</th>
                      <th>NAMA_KELURAHAN_2</th>
                      <th>KECAMATAN</th>
                      <th>KODE_POS</th>
                      <th>TEMPAT_TINGGAL</th>
                      <th>MODA_TRANSPORTASI</th>
                      <th>NOMOR_KKS</th>
                      <th>ANAK_KEBERAPA</th>
                      <th>PENERIMA_KPS_PKH</th>
                      <th>NO_KPH_PKH</th>
                      <th>USULAN_DARI_SEKOLAH</th>
                      <th>KIP</th>
                      <th>NOMOR_KIP</th>
                      <th>NAMA_KIP</th>
                      <th>KARTU_KIP</th>
                      <th>ALASAN_LAYAK_PIP</th>
                      <th>BANK</th>
                      <th>NO_REKENING</th>
                      <th>REKENING_ATAS_NAMA</th>
                      <th>NAMA_AYAH</th>
                      <th>NIK_AYAH</th>
                      <th>TAHUN_LAHIR_AYAH</th>
                      <th>PENDIDIKAN_AYAH</th>
                      <th>PEKERJAAN_AYAH</th>
                      <th>PENGHASILAN_BULANAN_AYAH</th>
                      <th>BERKEBUTUHAN_KHUSUS_AYAH</th>
                      <th>NAMA_IBU</th>
                      <th>NIK_IBU</th>
                      <th>TAHUN_LAHIR_IBU</th>
                      <th>PENDIDIKAN_IBU</th>
                      <th>PEKERJAAN_IBU</th>
                      <th>PENGHASILAN_BULANAN_IBU</th>
                      <th>BERKEBUTUHAN_KHUSUS_IBU</th>
                      <th>NAMA_WALI</th>
                      <th>NIK_WALI</th>
                      <th>TAHUN_LAHIR_WALI</th>
                      <th>PENDIDIKAN_WALI</th>
                      <th>PEKERJAAN_WALI</th>
                      <th>PENGHASILAN_BULANAN_WALI</th>
                      <th>TELEPON_RUMAH</th>
                      <th>NOMOR_HP</th>
                      <th>EMAIL</th>
                      <th>JENIS_EKSTRAKULIKULER</th>
                      <th>TINGGI_BADAN</th>
                      <th>BERAT_BADAN</th>
                      <th>JARAK_TEMPAT</th>
                      <th>WAKTU_TEMPAT</th>
                      <th>SAUDARA_KANDUNG</th>
  
                      <th>JURUSAN</th>
                      <th>JENIS_PENDAFTARAN</th>
                      <th>NIS</th>
                      <th>TANGGAL_MASUK_SEKOLAH</th>
                      <th>ASAL_SEKOLAH</th>
                      <th>NOMOR_PESERTA_UJIAN</th>
                      <th>NO_SERI_IJAZAH</th>
                      <th>NO_SERI_SKHUN</th>
                      <th>KELUAR_KARENA</th>                   
                      <th>TANGGAL_KELUAR</th>
                      <th>ALASAN</th>
  
                      <th>PERSETUJUAN</th>
  
                      <th>JENIS_1</th>
                      <th>TINGKAT_1</th>
                      <th>NAMA_PRESTASI_1</th>
                      <th>TAHUN_1</th>
                      <th>PENYELENGGARA_1</th>
                      <th>JENIS_2</th>
                      <th>TINGKAT_2</th>
                      <th>NAMA_PRESTASI_2</th>
                      <th>TAHUN_2</th>
                      <th>PENYELENGGARA_2</th>
                      <th>JENIS_3</th>
                      <th>TINGKAT_3</th>
                      <th>NAMA_PRESTASI_3</th>
                      <th>TAHUN_3</th>
                      <th>PENYELENGGARA_3</th>
                      <th>JENIS_1_0</th>
                      <th>KETERANGAN_1</th>
                      <th>TAHUN_MULAI_1</th>
                      <th>TAHUN_SELESAI_1</th>
                      <th>JENIS_2_0</th>
                      <th>KETERANGAN_2</th>
                      <th>TAHUN_MULAI_2</th>
                      <th>TAHUN_SELESAI_2</th>                 
                      <th>JENIS_3_0</th>
                      <th>KETERANGAN_3</th>
                      <th>TAHUN_MULAI_3</th>
                      <th>TAHUN_SELESAI_3</th>
                 </tr>
              </thead>
              <tbody>
  
             <?php
             $no = 1;
             ?>   
              @foreach($reregistration as $reregistrations)
  
              <?php 
  
                  $file_additionaldua = [];                
  
                  $file_additionaldua = json_decode($reregistrations->file_additionaldua);
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data2= array_column($file_additionaldua, 'data1');
                        if ($data2 != '' && $data2 != null) {
                             $data1 = $data2;
                            } else {
                             $data1 = '';
                            }
                            }else {
                             $data1 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data3= array_column($file_additionaldua, 'data2');
                        if ($data3 != '' && $data3 != null) {
                             $data2 = $data3;
                            } else {
                             $data2 = '';
                            }
                            }else {
                             $data2 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data4= array_column($file_additionaldua, 'data3');
                        if ($data4 != '' && $data4 != null) {
                             $data3 = $data4;
                            } else {
                             $data3 = '';
                            }
                            }else {
                             $data3 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data5= array_column($file_additionaldua, 'data4');
                        if ($data5 != '' && $data5 != null) {
                             $data4 = $data5;
                            } else {
                             $data4 = '';
                            }
                            }else {
                             $data4 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data6= array_column($file_additionaldua, 'data5');
                        if ($data6 != '' && $data6 != null) {
                             $data5 = $data6;
                            } else {
                             $data5 = '';
                            }
                            }else {
                             $data5 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data7= array_column($file_additionaldua, 'data6');
                        if ($data7 != '' && $data7 != null) {
                             $data6 = $data7;
                            } else {
                             $data6 = '';
                            }
                            }else {
                             $data6 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data8= array_column($file_additionaldua, 'data7');
                        if ($data8 != '' && $data8 != null) {
                             $data7 = $data8;
                            } else {
                             $data7 = '';
                            }
                            }else {
                             $data7 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data9= array_column($file_additionaldua, 'data8');
                        if ($data9 != '' && $data9 != null) {
                             $data8 = $data9;
                            } else {
                             $data8 = '';
                            }
                            }else {
                             $data8 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data10= array_column($file_additionaldua, 'data9');
                        if ($data10 != '' && $data10 != null) {
                             $data9 = $data10;
                            } else {
                             $data9 = '';
                            }
                            }else {
                             $data9 = '';
                            } 
  
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data11= array_column($file_additionaldua, 'data10');
                        if ($data11 != '' && $data11 != null) {
                             $data10 = $data11;
                            } else {
                             $data10 = '';
                            }
                            }else {
                             $data10 = '';
                            } 
  
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data12= array_column($file_additionaldua, 'data11');
                        if ($data12 != '' && $data12 != null) {
                             $data11 = $data12;
                            } else {
                             $data11 = '';
                            }
                            }else {
                             $data11 = '';
                            } 
  
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data13= array_column($file_additionaldua, 'data12');
                        if ($data13 != '' && $data13 != null) {
                             $data12 = $data13;
                            } else {
                             $data12 = '';
                            }
                            }else {
                             $data12 = '';
                            } 
                  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data14= array_column($file_additionaldua, 'data13');
                        if ($data14 != '' && $data14 != null) {
                             $data13 = $data14;
                            } else {
                             $data13 = '';
                            }
                            }else {
                             $data13 = '';
                            } 
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data15= array_column($file_additionaldua, 'data14');
                        if ($data15 != '' && $data15 != null) {
                             $data14 = $data15;
                            } else {
                             $data14 = '';
                            }
                            }else {
                             $data14 = '';
                            }  
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data16= array_column($file_additionaldua, 'data15');
                        if ($data16 != '' && $data16 != null) {
                             $data15 = $data16;
                            } else {
                             $data15 = '';
                            }
                            }else {
                             $data15 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data17= array_column($file_additionaldua, 'data16');
                        if ($data17 != '' && $data17 != null) {
                             $data16 = $data17;
                            } else {
                             $data16 = '';
                            }
                            }else {
                             $data16 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data18= array_column($file_additionaldua, 'data17');
                        if ($data18 != '' && $data18 != null) {
                             $data17 = $data18;
                            } else {
                             $data17 = '';
                            }
                            }else {
                             $data17 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data19= array_column($file_additionaldua, 'data18');
                        if ($data19 != '' && $data19 != null) {
                             $data18 = $data19;
                            } else {
                             $data18 = '';
                            }
                            }else {
                             $data18 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data20= array_column($file_additionaldua, 'data19');
                        if ($data20 != '' && $data20 != null) {
                             $data19 = $data20;
                            } else {
                             $data19 = '';
                            }
                            }else {
                             $data19 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data21= array_column($file_additionaldua, 'data20');
                        if ($data21 != '' && $data21 != null) {
                             $data20 = $data21;
                            } else {
                             $data20 = '';
                            }
                            }else {
                             $data20 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data22= array_column($file_additionaldua, 'data21');
                        if ($data22 != '' && $data22 != null) {
                             $data21 = $data22;
                            } else {
                             $data21 = '';
                            }
                            }else {
                             $data21 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data23= array_column($file_additionaldua, 'data22');
                        if ($data23 != '' && $data23 != null) {
                             $data22 = $data23;
                            } else {
                             $data22 = '';
                            }
                            }else {
                             $data22 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data24= array_column($file_additionaldua, 'data23');
                        if ($data24 != '' && $data24 != null) {
                             $data23 = $data24;
                            } else {
                             $data23 = '';
                            }
                            }else {
                             $data23 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data25_1= array_column($file_additionaldua, 'data24');
                        if ($data25_1 != '' && $data25_1 != null) {
                             $data24 = $data25_1;
                            } else {
                             $data24 = '';
                            }
                            }else {
                             $data24 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data26_0= array_column($file_additionaldua, 'data25');
                        if ($data26_0 != '' && $data26_0 != null) {
                             $data25 = $data26_0;
                            } else {
                             $data25 = '';
                            }
                            }else {
                             $data25 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data27_0= array_column($file_additionaldua, 'data26');
                        if ($data27_0 != '' && $data27_0 != null) {
                             $data26 = $data27_0;
                            } else {
                             $data26 = '';
                            }
                            }else {
                             $data26 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data28_0= array_column($file_additionaldua, 'data27');
                        if ($data28_0 != '' && $data28_0 != null) {
                             $data27 = $data28_0;
                            } else {
                             $data27 = '';
                            }
                            }else {
                             $data27 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data25_0= array_column($file_additionaldua, 'data28');
                        if ($data25_0 != '' && $data25_0 != null) {
                             $data28 = $data25_0;
                            } else {
                             $data28 = '';
                            }
                            }else {
                             $data28 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data25_2= array_column($file_additionaldua, 'data29');
                        if ($data25_2 != '' && $data25_2 != null) {
                             $data29 = $data25_2;
                            } else {
                             $data29 = '';
                            }
                            }else {
                             $data29 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data25_3= array_column($file_additionaldua, 'data30');
                        if ($data25_3 != '' && $data25_3 != null) {
                             $data30 = $data25_3;
                            } else {
                             $data30 = '';
                            }
                            }else {
                             $data30 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data25_4= array_column($file_additionaldua, 'data31');
                        if ($data25_4 != '' && $data25_4 != null) {
                             $data31 = $data25_4;
                            } else {
                             $data31 = '';
                            }
                            }else {
                             $data31 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data26_0= array_column($file_additionaldua, 'data32');
                        if ($data26_0 != '' && $data26_0 != null) {
                             $data32 = $data26_0;
                            } else {
                             $data32 = '';
                            }
                            }else {
                             $data32 = '';
                            } 
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data26_1= array_column($file_additionaldua, 'data33');
                        if ($data26_1 != '' && $data26_1 != null) {
                             $data33 = $data26_1;
                            } else {
                             $data33 = '';
                            }
                            }else {
                             $data33 = '';
                            } 
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data26_2= array_column($file_additionaldua, 'data34');
                        if ($data26_2 != '' && $data26_2 != null) {
                             $data34 = $data26_2;
                            } else {
                             $data34 = '';
                            }
                            }else {
                             $data34 = '';
                            } 
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data26_3= array_column($file_additionaldua, 'data35');
                        if ($data26_3 != '' && $data26_3 != null) {
                             $data35 = $data26_3;
                            } else {
                             $data35 = '';
                            }
                            }else {
                             $data35 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data27_0= array_column($file_additionaldua, 'data36');
                        if ($data27_0 != '' && $data27_0 != null) {
                             $data36 = $data27_0;
                            } else {
                             $data36 = '';
                            }
                            }else {
                             $data36 = '';
                            }
                            
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data27_1= array_column($file_additionaldua, 'data37');
                        if ($data27_1 != '' && $data27_1 != null) {
                             $data37 = $data27_1;
                            } else {
                             $data37 = '';
                            }
                            }else {
                             $data37 = '';
                            } 
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data28_0= array_column($file_additionaldua, 'data38');
                        if ($data28_0 != '' && $data28_0 != null) {
                             $data38 = $data28_0;
                            } else {
                             $data38 = '';
                            }
                            }else {
                             $data38 = '';
                            } 
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data28_1= array_column($file_additionaldua, 'data39');
                        if ($data28_1 != '' && $data28_1 != null) {
                             $data39 = $data28_1;
                            } else {
                             $data39 = '';
                            }
                            }else {
                             $data39 = '';
                            } 
  
  
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data29_0= array_column($file_additionaldua, 'data40');
                        if ($data29_0 != '' && $data29_0 != null) {
                             $data40 = $data29_0;
                            } else {
                             $data40 = '';
                            }
                            }else {
                             $data40 = '';
                            } 
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data29_1= array_column($file_additionaldua, 'data41');
                        if ($data29_1 != '' && $data29_1 != null) {
                             $data41 = $data29_1;
                            } else {
                             $data41 = '';
                            }
                            }else {
                             $data41 = '';
                            } 
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data30_0= array_column($file_additionaldua, 'data42');
                        if ($data30_0 != '' && $data30_0 != null) {
                             $data42 = $data30_0;
                            } else {
                             $data42 = '';
                            }
                            }else {
                             $data42 = '';
                            } 
  
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data30_2= array_column($file_additionaldua, 'data43');
                        if ($data30_2 != '' && $data30_2 != null) {
                             $data43 = $data30_2;
                            } else {
                             $data43 = '';
                            }
                            }else {
                             $data43 = '';
                            } 
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data31_0= array_column($file_additionaldua, 'data44');
                        if ($data31_0 != '' && $data31_0 != null) {
                             $data44 = $data31_0;
                            } else {
                             $data44 = '';
                            }
                            }else {
                             $data44 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data31_2= array_column($file_additionaldua, 'data45');
                        if ($data31_2 != '' && $data31_2 != null) {
                             $data45 = $data31_2;
                            } else {
                             $data45 = '';
                            }
                            }else {
                             $data45 = '';
                            }
  
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data31_3= array_column($file_additionaldua, 'data46');
                        if ($data31_3 != '' && $data31_3 != null) {
                             $data46 = $data31_3;
                            } else {
                             $data46 = '';
                            }
                            }else {
                             $data46 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data32_0= array_column($file_additionaldua, 'data47');
                        if ($data32_0 != '' && $data32_0 != null) {
                             $data47 = $data32_0;
                            } else {
                             $data47 = '';
                            }
                            }else {
                             $data47 = '';
                            } 
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data32_3= array_column($file_additionaldua, 'data48');
                        if ($data32_3 != '' && $data32_3 != null) {
                             $data48 = $data32_3;
                            } else {
                             $data48 = '';
                            }
                            }else {
                             $data48 = '';
                            } 
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data33= array_column($file_additionaldua, 'data49');
                        if ($data33 != '' && $data33 != null) {
                             $data49 = $data33;
                            } else {
                             $data49 = '';
                            }
                            }else {
                             $data49 = '';
                            } 
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data33_0= array_column($file_additionaldua, 'data50');
                        if ($data33_0 != '' && $data33_0 != null) {
                             $data50 = $data33_0;
                            } else {
                             $data50 = '';
                            }
                            }else {
                             $data50 = '';
                            } 
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data33_1= array_column($file_additionaldua, 'data51');
                        if ($data33_1 != '' && $data33_1 != null) {
                             $data51 = $data33_1;
                            } else {
                             $data51 = '';
                            }
                            }else {
                             $data51 = '';
                            } 
  
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data34_0= array_column($file_additionaldua, 'data52');
                        if ($data34_0 != '' && $data34_0 != null) {
                             $data52 = $data34_0;
                            } else {
                             $data52 = '';
                            }
                            }else {
                             $data52 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data35_0= array_column($file_additionaldua, 'data53');
                        if ($data35_0 != '' && $data35_0 != null) {
                             $data53 = $data35_0;
                            } else {
                             $data53 = '';
                            }
                            }else {
                             $data53 = '';
                            } 
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data35_0= array_column($file_additionaldua, 'data54');
                        if ($data35_0 != '' && $data35_0 != null) {
                             $data54 = $data35_0;
                            } else {
                             $data54 = '';
                            }
                            }else {
                             $data54 = '';
                            } 
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data36_0= array_column($file_additionaldua, 'data55');
                        if ($data36_0 != '' && $data36_0 != null) {
                             $data55 = $data36_0;
                            } else {
                             $data55 = '';
                            }
                            }else {
                             $data55 = '';
                            }
                  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data37_0= array_column($file_additionaldua, 'data56');
                        if ($data37_0 != '' && $data37_0 != null) {
                             $data56 = $data37_0;
                            } else {
                             $data56 = '';
                            }
                            }else {
                             $data56 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data38_0= array_column($file_additionaldua, 'data57');
                        if ($data38_0 != '' && $data38_0 != null) {
                             $data57 = $data38_0;
                            } else {
                             $data57 = '';
                            }
                            }else {
                             $data57 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data39_0= array_column($file_additionaldua, 'data58');
                        if ($data39_0 != '' && $data39_0 != null) {
                             $data58 = $data39_0;
                            } else {
                             $data58 = '';
                            }
                            }else {
                             $data58 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data40_0= array_column($file_additionaldua, 'data59');
                        if ($data40_0 != '' && $data40_0 != null) {
                             $data59 = $data40_0;
                            } else {
                             $data59 = '';
                            }
                            }else {
                             $data59 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data41_0= array_column($file_additionaldua, 'data60');
                        if ($data41_0 != '' && $data41_0 != null) {
                             $data60 = $data41_0;
                            } else {
                             $data60 = '';
                            }
                            }else {
                             $data60 = '';
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data42_0= array_column($file_additionaldua, 'data61');
                        if ($data42_0 != '' && $data42_0 != null) {
                             $data61 = $data42_0;
                            } else {
                             $data61 = '';
                            }
                            }else {
                             $data61 = '';  
                            }  
                            
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data43_0= array_column($file_additionaldua, 'data62');
                        if ($data43_0 != '' && $data43_0 != null) {
                             $data62 = $data43_0;
                            } else {
                             $data62 = '';
                            }
                            }else {
                             $data62 = '';  
                            }  
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data44_0= array_column($file_additionaldua, 'data63');
                        if ($data44_0 != '' && $data44_0 != null) {
                             $data63 = $data44_0;
                            } else {
                             $data63 = '';
                            }
                            }else {
                             $data63 = '';  
                            } 
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data45_0= array_column($file_additionaldua, 'data64');
                        if ($data45_0 != '' && $data45_0 != null) {
                             $data64 = $data45_0;
                            } else {
                             $data64 = '';
                            }
                            }else {
                             $data64 = '';  
                            } 
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data45_1= array_column($file_additionaldua, 'data65');
                        if ($data45_1 != '' && $data45_1 != null) {
                             $data65 = $data45_1;
                            } else {
                             $data65 = '';
                            }
                            }else {
                             $data65 = '';  
                            } 
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data46_0= array_column($file_additionaldua, 'data66');
                        if ($data46_0 != '' && $data46_0 != null) {
                             $data66 = $data46_0;
                            } else {
                             $data66 = '';
                            }
                            }else {
                             $data66 = '';  
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data47_0= array_column($file_additionaldua, 'data67');
                        if ($data47_0 != '' && $data47_0 != null) {
                             $data67 = $data47_0;
                            } else {
                             $data67 = '';
                            }
                            }else {
                             $data67 = '';  
                            }
                            
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data48_0= array_column($file_additionaldua, 'data68');
                        if ($data48_0 != '' && $data48_0 != null) {
                             $data68 = $data48_0;
                            } else {
                             $data68 = '';
                            }
                            }else {
                             $data68 = '';  
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data49_0= array_column($file_additionaldua, 'data69');
                        if ($data49_0 != '' && $data49_0 != null) {
                             $data69 = $data49_0;
                            } else {
                             $data69 = '';
                            }
                            }else {
                             $data69 = '';  
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data49_1= array_column($file_additionaldua, 'data70');
                        if ($data49_1 != '' && $data49_1 != null) {
                             $data70 = $data49_1;
                            } else {
                             $data70 = '';
                            }
                            }else {
                             $data70 = '';  
                            }
  
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data49_2= array_column($file_additionaldua, 'data71');
                        if ($data49_2 != '' && $data49_2 != null) {
                             $data71 = $data49_2;
                            } else {
                             $data71 = '';
                            }
                            }else {
                             $data71 = '';  
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data50_0= array_column($file_additionaldua, 'data72');
                        if ($data50_0 != '' && $data50_0 != null) {
                             $data72 = $data50_0;
                            } else {
                             $data72 = '';
                            }
                            }else {
                             $data72 = '';  
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data50_1= array_column($file_additionaldua, 'data73');
                        if ($data50_1 != '' && $data50_1 != null) {
                             $data73 = $data50_1;
                            } else {
                             $data73 = '';
                            }
                            }else {
                             $data73 = '';  
                            }
  
                   if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data50_2= array_column($file_additionaldua, 'data74');
                        if ($data50_2 != '' && $data50_2 != null) {
                             $data74 = $data50_2;
                            } else {
                             $data74 = '';
                            }
                            }else {
                             $data74 = '';  
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data50_3= array_column($file_additionaldua, 'data75');
                        if ($data50_3 != '' && $data50_3 != null) {
                             $data75 = $data50_3;
                            } else {
                             $data75 = '';
                            }
                            }else {
                             $data75 = '';  
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data50_4= array_column($file_additionaldua, 'data76');
                        if ($data50_4 != '' && $data50_4 != null) {
                             $data76 = $data50_4;
                            } else {
                             $data76 = '';
                            }
                            }else {
                             $data76 = '';  
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data50_5= array_column($file_additionaldua, 'data77');
                        if ($data50_5 != '' && $data50_5 != null) {
                             $data77 = $data50_5;
                            } else {
                             $data77 = '';
                            }
                            }else {
                             $data77 = '';  
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data50_6= array_column($file_additionaldua, 'data78');
                        if ($data50_6 != '' && $data50_6 != null) {
                             $data78 = $data50_6;
                            } else {
                             $data78 = '';
                            }
                            }else {
                             $data78 = '';  
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data51_0= array_column($file_additionaldua, 'data79');
                        if ($data51_0 != '' && $data51_0 != null) {
                             $data79 = $data51_0;
                            } else {
                             $data79 = '';
                            }
                            }else {
                             $data79 = '';  
                            }
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data51_0_1= array_column($file_additionaldua, 'data80');
                        if ($data51_0_1 != '' && $data51_0_1 != null) {
                             $data80 = $data51_0_1;
                            } else {
                             $data80 = '';
                            }
                            }else {
                             $data80 = '';  
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data52_0= array_column($file_additionaldua, 'data81');
                        if ($data52_0 != '' && $data52_0 != null) {
                             $data81 = $data52_0;
                            } else {
                             $data81 = '';
                            }
                            }else {
                             $data81 = '';  
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data53_0= array_column($file_additionaldua, 'data82');
                        if ($data53_0 != '' && $data53_0 != null) {
                             $data82 = $data53_0;
                            } else {
                             $data82 = '';
                            }
                            }else {
                             $data82 = '';  
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data53_2= array_column($file_additionaldua, 'data83');
                        if ($data53_2 != '' && $data53_2 != null) {
                             $data83 = $data53_2;
                            } else {
                             $data83 = '';
                            }
                            }else {
                             $data83 = '';  
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data53_3= array_column($file_additionaldua, 'data84');
                        if ($data53_3 != '' && $data53_3 != null) {
                             $data84 = $data53_3;
                            } else {
                             $data84 = '';
                            }
                            }else {
                             $data84 = '';  
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data53_4= array_column($file_additionaldua, 'data85');
                        if ($data53_4 != '' && $data53_4 != null) {
                             $data85 = $data53_4;
                            } else {
                             $data85 = '';
                            }
                            }else {
                             $data85 = '';  
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data54_0= array_column($file_additionaldua, 'data86');
                        if ($data54_0 != '' && $data54_0 != null) {
                             $data86 = $data54_0;
                            } else {
                             $data86 = '';
                            }
                            }else {
                             $data86 = '';  
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data55_0= array_column($file_additionaldua, 'data87');
                        if ($data55_0 != '' && $data55_0 != null) {
                             $data87 = $data55_0;
                            } else {
                             $data87 = '';
                            }
                            }else {
                             $data87 = '';  
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data56_0= array_column($file_additionaldua, 'data88');
                        if ($data56_0 != '' && $data56_0 != null) {
                             $data88 = $data56_0;
                            } else {
                             $data88 = '';
                            }
                            }else {
                             $data88 = '';  
                            }
  
                  if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data57_0= array_column($file_additionaldua, 'data89');
                        if ($data57_0 != '' && $data57_0 != null) {
                             $data89 = $data57_0;
                            } else {
                             $data89 = '';
                            }
                            }else {
                             $data89 = '';  
                            }
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data58_0= array_column($file_additionaldua, 'data90');
                        if ($data58_0 != '' && $data58_0 != null) {
                             $data90 = $data58_0;
                            } else {
                             $data90 = '';
                            }
                            }else {
                             $data90 = '';  
                            }
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data59_0= array_column($file_additionaldua, 'data91');
                        if ($data59_0 != '' && $data59_0 != null) {
                             $data91 = $data59_0;
                            } else {
                             $data91 = '';
                            }
                            }else {
                             $data91 = '';  
                            }
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data60_0= array_column($file_additionaldua, 'data92');
                        if ($data60_0 != '' && $data60_0 != null) {
                             $data92 = $data60_0;
                            } else {
                             $data92 = '';
                            }
                            }else {
                             $data92 = '';  
                            }
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data61_0= array_column($file_additionaldua, 'data93');
                        if ($data61_0 != '' && $data61_0 != null) {
                             $data93 = $data61_0;
                            } else {
                             $data93 = '';
                            }
                            }else {
                             $data93 = '';  
                            }
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data62_0= array_column($file_additionaldua, 'data94');
                        if ($data62_0 != '' && $data62_0 != null) {
                             $data94 = $data62_0;
                            } else {
                             $data94 = '';
                            }
                            }else {
                             $data94 = '';  
                            }
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data63_0= array_column($file_additionaldua, 'data95');
                        if ($data63_0 != '' && $data63_0 != null) {
                             $data95 = $data63_0;
                            } else {
                             $data95 = '';
                            }
                            }else {
                             $data95 = '';  
                            }
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data64_0= array_column($file_additionaldua, 'data96');
                        if ($data64_0 != '' && $data64_0 != null) {
                             $data96 = $data64_0;
                            } else {
                             $data96 = '';
                            }
                            }else {
                             $data96 = '';  
                            }
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data65_0= array_column($file_additionaldua, 'data97');
                        if ($data65_0 != '' && $data65_0 != null) {
                             $data97 = $data65_0;
                            } else {
                             $data97 = '';
                            }
                            }else {
                             $data97 = '';  
                            }
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data66_0= array_column($file_additionaldua, 'data98');
                        if ($data66_0 != '' && $data66_0 != null) {
                             $data98 = $data66_0;
                            } else {
                             $data98 = '';
                            }
                            }else {
                             $data98 = '';  
                            }
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data67_0= array_column($file_additionaldua, 'data99');
                        if ($data67_0 != '' && $data67_0 != null) {
                             $data99 = $data67_0;
                            } else {
                             $data99 = '';
                            }
                            }else {
                             $data99 = '';  
                            }
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data68_0= array_column($file_additionaldua, 'data100');
                        if ($data68_0 != '' && $data68_0 != null) {
                             $data100 = $data68_0;
                            } else {
                             $data100 = '';
                            }
                            }else {
                             $data100 = '';  
                            }
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data69_0= array_column($file_additionaldua, 'data101');
                        if ($data68_0 != '' && $data69_0 != null) {
                             $data101 = $data69_0;
                            } else {
                             $data101 = '';
                            }
                            }else {
                             $data101 = '';  
                            }
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data70_0= array_column($file_additionaldua, 'data102');
                        if ($data70_0 != '' && $data70_0 != null) {
                             $data102 = $data70_0;
                            } else {
                             $data102 = '';
                            }
                            }else {
                             $data102 = '';  
                            }
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data71_0= array_column($file_additionaldua, 'data103');
                        if ($data71_0 != '' && $data71_0 != null) {
                             $data103 = $data71_0;
                            } else {
                             $data103 = '';
                            }
                            }else {
                             $data103 = '';  
                            }
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data72_0= array_column($file_additionaldua, 'data104');
                        if ($data72_0 != '' && $data72_0 != null) {
                             $data104 = $data72_0;
                            } else {
                             $data104 = '';
                            }
                            }else {
                             $data104 = '';  
                            }
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data73_0= array_column($file_additionaldua, 'data105');
                        if ($data73_0 != '' && $data73_0 != null) {
                             $data105 = $data73_0;
                            } else {
                             $data105 = '';
                            }
                            }else {
                             $data105 = '';  
                            }
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data74_0= array_column($file_additionaldua, 'data106');
                        if ($data74_0 != '' && $data74_0 != null) {
                             $data106 = $data74_0;
                            } else {
                             $data106 = '';
                            }
                            }else {
                             $data106 = '';  
                            }
  
                 if ($file_additionaldua !='' && $file_additionaldua != null && !empty($file_additionaldua) && $file_additionaldua != '[]') { 
                       $data75_0= array_column($file_additionaldua, 'data107');
                        if ($data75_0 != '' && $data75_0 != null) {
                             $data107 = $data75_0;
                            } else {
                             $data107 = '';
                            }
                            }else {
                             $data107 = '';  
                            }
              ?>
                  <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ ($data1 =='' && $data1 == null) ? '' : $data1[0] }}</td>
                      <td>{{ ($data2 =='' && $data2 == null) ? '' : $data2[0] }}</td>
                      <td>{{ ($data3 =='' && $data3 == null) ? '' : $data3[0] }}</td>
                      <td>{{ ($data4 =='' && $data4 == null) ? '' : $data4[0] }}</td>
                      <td>{{ ($data5 =='' && $data5 == null) ? '' : $data5[0] }}</td>
                      <td>{{ ($data6 =='' && $data6 == null) ? '' : $data6[0] }}</td>
                      <td>{{ ($data7 =='' && $data7 == null) ? '' : $data7[0] }}</td>
                      <td>{{ ($data8 =='' && $data8 == null) ? '' : $data8[0] }}</td>
                      <td>{{ ($data9 =='' && $data9 == null) ? '' : $data9[0] }}</td>
                      <td>{{ ($data10 =='' && $data10 == null) ? '' : $data10[0] }}</td>
                      <td>{{ ($data11 =='' && $data11 == null) ? '' : $data11[0] }}</td>
                      <td>{{ ($data12 =='' && $data12 == null) ? '' : $data12[0] }}</td>
                      <td>{{ ($data13 =='' && $data13 == null) ? '' : $data13[0] }}</td>
                      <td>{{ ($data14 =='' && $data14 == null) ? '' : $data14[0] }}</td>
                      <td>{{ ($data15 =='' && $data15 == null) ? '' : $data15[0] }}</td>
                      <td>{{ ($data16 =='' && $data16 == null) ? '' : $data16[0] }}</td>
                      <td>{{ ($data17 =='' && $data17 == null) ? '' : $data17[0] }}</td>
                      <td>{{ ($data18 =='' && $data18 == null) ? '' : $data18[0] }}</td>
                      <td>{{ ($data19 =='' && $data19 == null) ? '' : $data19[0] }}</td>
                      <td>{{ ($data20 =='' && $data20 == null) ? '' : $data20[0] }}</td>
                      <td>{{ ($data21 =='' && $data21 == null) ? '' : $data21[0] }}</td>
                      <td>{{ ($data22 =='' && $data22 == null) ? '' : $data22[0] }}</td>
                      <td>{{ ($data23 =='' && $data23 == null) ? '' : $data23[0] }}</td>
                      <td>{{ ($data24 =='' && $data24 == null) ? '' : $data24[0] }}</td>
                      <td>{{ ($data25 =='' && $data25 == null) ? '' : $data25[0] }}</td>
                      <td>{{ ($data26 =='' && $data26 == null) ? '' : $data26[0] }}</td>
                      <td>{{ ($data27 =='' && $data27 == null) ? '' : $data27[0] }}</td>
                      <td>{{ ($data28 =='' && $data28 == null) ? '' : $data28[0] }}</td>
                      <td>{{ ($data29 =='' && $data29 == null) ? '' : $data29[0] }}</td>
                      <td>{{ ($data30 =='' && $data30 == null) ? '' : $data30[0] }}</td>
                      <td>{{ ($data31 =='' && $data31 == null) ? '' : $data31[0] }}</td>
                      <td>{{ ($data32 =='' && $data32 == null) ? '' : $data32[0] }}</td>
                      <td>{{ ($data33 =='' && $data33 == null) ? '' : $data33[0] }}</td>
                      <td>{{ ($data34 =='' && $data34 == null) ? '' : $data34[0] }}</td>
                      <td>{{ ($data35 =='' && $data35 == null) ? '' : $data35[0] }}</td>
                      <td>{{ ($data36 =='' && $data36 == null) ? '' : $data36[0] }}</td>
                      <td>{{ ($data37 =='' && $data37 == null) ? '' : $data37[0] }}</td>
                      <td>{{ ($data38 =='' && $data38 == null) ? '' : $data38[0] }}</td>
                      <td>{{ ($data39 =='' && $data39 == null) ? '' : $data39[0] }}</td>
                      <td>{{ ($data40 =='' && $data40 == null) ? '' : $data40[0] }}</td>
                      <td>{{ ($data41 =='' && $data41 == null) ? '' : $data41[0] }}</td>
                      <td>{{ ($data42 =='' && $data42 == null) ? '' : $data42[0] }}</td>          
                      <td>{{ ($data43 =='' && $data43 == null) ? '' : $data43[0] }}</td>
                      <td>{{ ($data44 =='' && $data44 == null) ? '' : $data44[0] }}</td>
                      <td>{{ ($data45 =='' && $data45 == null) ? '' : $data45[0] }}</td>
                      <td>{{ ($data46 =='' && $data46 == null) ? '' : $data46[0] }}</td>
                      <td>{{ ($data47 =='' && $data47 == null) ? '' : $data47[0] }}</td>
                      <td>{{ ($data48 =='' && $data48 == null) ? '' : $data48[0] }}</td>
                      <td>{{ ($data49 =='' && $data49 == null) ? '' : $data49[0] }}</td>
                      <td>{{ ($data50 =='' && $data50 == null) ? '' : $data50[0] }}</td>
                      <td>{{ ($data51 =='' && $data51 == null) ? '' : $data51[0] }}</td>
                      <td>{{ ($data52 =='' && $data52 == null) ? '' : $data52[0] }}</td>
                      <td>{{ ($data53 =='' && $data53 == null) ? '' : $data53[0] }}</td>
                      <td>{{ ($data54 =='' && $data54 == null) ? '' : $data54[0] }}</td>
                      <td>{{ ($data55 =='' && $data55 == null) ? '' : $data55[0] }}</td>
                      <td>{{ ($data56 =='' && $data56 == null) ? '' : $data56[0] }}</td>
                      <td>{{ ($data57 =='' && $data57 == null) ? '' : $data57[0] }}</td>
                      <td>{{ ($data58 =='' && $data58 == null) ? '' : $data58[0] }}</td>
                      <td>{{ ($data59 =='' && $data59 == null) ? '' : $data59[0] }}</td>
                      <td>{{ ($data60 =='' && $data60 == null) ? '' : $data60[0] }}</td>
                      <td>{{ ($data61 =='' && $data61 == null) ? '' : $data61[0] }}</td>
                      <td>{{ ($data62 =='' && $data62 == null) ? '' : $data62[0] }}</td>
                      <td>{{ ($data63 =='' && $data63 == null) ? '' : $data63[0] }}</td>
                      <td>{{ ($data64 =='' && $data64 == null) ? '' : $data64[0] }}</td>
                      <td>{{ ($data65 =='' && $data65 == null) ? '' : $data65[0] }}</td>
                      <td>{{ ($data66 =='' && $data66 == null) ? '' : $data66[0] }}</td>
                      <td>{{ ($data67 =='' && $data67 == null) ? '' : $data67[0] }}</td>
                      <td>{{ ($data68 =='' && $data68 == null) ? '' : $data68[0] }}</td>
                      <td>{{ ($data69 =='' && $data69 == null) ? '' : $data69[0] }}</td>
                      <td>{{ ($data70 =='' && $data70 == null) ? '' : $data70[0] }}</td>
                      <td>{{ ($data71 =='' && $data71 == null) ? '' : $data71[0] }}</td>
                      <td>{{ ($data72 =='' && $data72 == null) ? '' : $data72[0] }}</td>
  
                      <td>{{ ($data73 =='' && $data73 == null) ? '' : $data73[0] }}</td>
                      <td>{{ ($data74 =='' && $data74 == null) ? '' : $data74[0] }}</td>
                      <td>{{ ($data75 =='' && $data75 == null) ? '' : $data75[0] }}</td>
                      <td>{{ ($data76 =='' && $data76 == null) ? '' : $data76[0] }}</td>
                      <td>{{ ($data77 =='' && $data77 == null) ? '' : $data77[0] }}</td>
                      <td>{{ ($data78 =='' && $data78 == null) ? '' : $data78[0] }}</td>
  
                      <td>{{ ($data79 =='' && $data79 == null) ? '' : $data79[0] }}</td>
                      <td>{{ ($data80 =='' && $data80 == null) ? '' : $data80[0] }}</td>
                      <td>{{ ($data81 =='' && $data81 == null) ? '' : $data81[0] }}</td>
                      <td>{{ ($data82 =='' && $data82 == null) ? '' : $data82[0] }}</td>
  
                      <td>{{ ($data83 =='' && $data83 == null) ? '' : $data83[0] }}</td>
                      <td>{{ ($data84 =='' && $data84 == null) ? '' : $data84[0] }}</td>
                      <td>{{ ($data85 =='' && $data85 == null) ? '' : $data85[0] }}</td>
                      <td>{{ ($data86 =='' && $data86 == null) ? '' : $data86[0] }}</td>
                      <td>{{ ($data87 =='' && $data87 == null) ? '' : $data87[0] }}</td>
                      <td>{{ ($data88 =='' && $data88 == null) ? '' : $data88[0] }}</td>
  
                      <td>{{ ($data89 =='' && $data89 == null) ? '' : $data89[0] }}</td>
                      <td>{{ ($data90 =='' && $data90 == null) ? '' : $data90[0] }}</td>
  
                      <td>{{ ($data91 =='' && $data91 == null) ? '' : $data91[0] }}</td>
                      <td>{{ ($data92 =='' && $data92 == null) ? '' : $data92[0] }}</td>
                      <td>{{ ($data93 =='' && $data93 == null) ? '' : $data93[0] }}</td>
                      <td>{{ ($data94 =='' && $data94 == null) ? '' : $data94[0] }}</td>
                      <td>{{ ($data95 =='' && $data95 == null) ? '' : $data95[0] }}</td>
                      <td>{{ ($data96 =='' && $data96 == null) ? '' : $data96[0] }}</td>
  
                      <td>{{ ($data97 =='' && $data97 == null) ? '' : $data97[0] }}</td>
                      <td>{{ ($data98 =='' && $data98 == null) ? '' : $data98[0] }}</td>
  
                      <td>{{ ($data99 =='' && $data99 == null) ? '' : $data99[0] }}</td>
                      <td>{{ ($data100 =='' && $data100 == null) ? '' : $data100[0] }}</td>
                      <td>{{ ($data101 =='' && $data101 == null) ? '' : $data101[0] }}</td>
                      <td>{{ ($data102 =='' && $data102 == null) ? '' : $data102[0] }}</td>
                      <td>{{ ($data103 =='' && $data103 == null) ? '' : $data103[0] }}</td>
                      <td>{{ ($data104 =='' && $data104 == null) ? '' : $data104[0] }}</td>
                      <td>{{ ($data105 =='' && $data105 == null) ? '' : $data105[0] }}</td>
                      <td>{{ ($data106 =='' && $data106 == null) ? '' : $data106[0] }}</td>
                      <td>{{ ($data107 =='' && $data107 == null) ? '' : $data107[0] }}</td>
                  </tr>  
  
              @endforeach
              </tbody>
          </table>        
      </div>  
     </div> 
</body>
</html>

