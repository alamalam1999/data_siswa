@extends('backend.layouts.app')

@section('title', app_name() . ' | Pricing Management')

@section('breadcrumb-links')

@endsection
@section('pagestyle')
@stop

@section('content')

<div class="card">
    <div class="card-header pt-7 pb-7">

        <div class="row">
            <div>
                <a href="{{ route('admin.pricing.export_excel') }}">
                <button id="btn-search" type="submit" class="testing2 btn btn-flex btn-primary">CHECK</button>
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
                <th>NO</th>
                <th>NAMA_ORANG_TUA</th>
                <th>ALAMAT_ORANG_TUA_ATAU_WALi</th>
                <th>MEMBAYAR_UANG_PANGKAL_UP</th>
                <th>MEMBAYAR_UANG_PANGKAL_UP_2</th>
                <th>PEMBAYARAN_SPP_BULAN_JULI_2023</th>
                <th>PEMBAYARAN_SPP_SETIAP_BULANNYA_SELAMBAT</th>
                <th>JIKA_PUTRA_PUTRI_KAMI_SUDAH_MELAKSANAKAN_TES</th>
                <th>JIKA_PUTRA_PUTRI_KAMI_DITERIMA_DI_SEKOLAH_NEGERI</th>
                <th>APABILA_PUTRA_PUTRI_KAMI_SUDAH_BERSEKOLAH_DI_AVICENNA</th>
                <th>APABILA_PUTRA_PUTRI_kAMI_SUDAH_BERSEKOLAH_DI_AVICENNA</th>
                <th>KAMI_AKAN_MEMATUHI_SELURUH_TATA_TERTIB_SEKOLAH</th>
                <th>SELURUH_AKTIVITAS_PUTRA_PUTRI_KAMI_DALAM_PHOTO_VIDEO</th>
                <th>SELURUH_HASIL_KARYA_PESERTA_DIDIK_DIIJINKAN</th>
                <th>BERDASARKAN_APA_YANG_TELAH_SAYA_BACA_DAN_PAHAMI</th>
                <th>NAMA_CALON_MURID</th>
                <th>KELAS</th>
                <th>PERSETUJUAN_TATA_TERTIB</th>
                <th>KEADAAN JASMANI</th>
                <th>JENIS_KELAMIN_LAKI-LAKI</th>
                <th>JENIS_KELAMIN_PEREMPUAN</th>
                <th>TEMPAT_LAHIR</th>
                <th>TANGGAL_LAHIR</th>
                <th>BERAT_BADAN</th>
                <th>TINGGI_BADAN</th>
                <th>GOLONGAN_DARAH</th>

               <th>MEMILIKI_CATATAN_IMUNISASI</th>
               <th>SAAT_BAYI_MENDAPATKAN_IMUNISASI</th>
               <th>IMUNISASI_LENGKAP</th>
               <th>ADA_GANGGUAN_DAN_KELAINAN</th>

                <th>Tidak Ada Gangguan dan Kelainan</th>

               <th>BERBAHAYA</th>
               <th>TIDAK_BERBAHAYA</th>
               <th>YANG_LAIN</th>

                <th>Normal, tidak ada gangguan</th>

                <th>ADA_KOMPILASI_KETIKA_MELAHIRKAN</th>
                <th>NORMAL_TIDAK_ADA_CACAT_BAWAAN</th>
                <th>ADA_CACAT_BAWAAN</th>

                <th>Normal</th>

                <th>Terlambat</th>

                <th>Normal</th>

                <th>TERLAMBAT</th>

                <th>Normal</th>

                <th>Terlambat</th>

                <th>Normal</th>

                <th>Terlambat</th>

                <th>Normal</th>

                <th>Terlambat</th>

                <th>Ada</th>
                <th>tidak Ada</th>
                <th>Ya , Pernah</th>

                <th>Tidak Pernah</th>

                <th>Ya, Punya Riwayat kejang demam (tiap demam pasti kejang)</th>
                <th>Tidak ada riwayat kejang demam</th>

                <th>apakah memiliki riwayat penyakit yang di derita</th>
                <th>apakah pernah dirawat di rumah sakit?</th>

                <th>catatan lain jika ada</th>

                <th>Sekolah Asal</th>
                <th>Brand</th>
                <th>Kegiatan Sekolah</th>
                <th>Media Cetak</th>
                <th>Media Elektronik</th>
                <th>Media Sosial</th>
                <th>Internet</th>
                <th>Program Sekolah</th>
                <th>Fasilitas % pelayanan</th>
                <th>Jarak</th>

                <th>Uang Sekolah Terjangkau</th>

                <th>Fasilitas Sekolah lengkap</th>
                <th>Kebersihan Gedung Sekolah</th>
                <th>Pelayanan baik penyampaian informasi cukup jelas</th>
                <th>Tenaga pendidik yang Berkompeten & Profesional</th>
                
                <th>Tidak Memilih Fasilitas & Pelayanan</th>
                <th>1Km dari tempat tinggal</th>
                
                <th>1 - 5 Km dari tempat tinggal</th>

                <th>6 - 10 Km dari tempat Tinggal</th>
                <th>11 - 20 Km dan tempat tinggal</th>
                <th>21 - 30 Km dari tempat tinggal</th>
                <th>Tidak memilih 'Jarak'</th>
                <th>Uang Pangkal</th>
                <th>SPP</th> 

                <th>Tanda Adanya biaya Tambahan</th>

                <th>Tidak Memiliki Uang Sekolah Terjangkau</th>

                <th>Sederhana dan Mudah</th>
                <th>Standar seperti disekolah lain</th>

                <th>Berbelit belit dan perlu disederhanakan</th>
                <th>Tidak Memiliki Uang Sekolah Terjangkau</th>
                <th>Merepotkan</th>

                <th>Pendapat Saya</th>
                <th>Memiliki Program Habits  7 "Leader in Me"</th>
                <th>Prestasi Sekolah</th>
                <th>Ekstrakulikuler</th>
                <th>booster 1</th>

                <th>booster 2</th>
                <th>booster 3</th>
                <th>belum vaksin</th>
            </tr>
            </thead>
            <tbody>

           <?php
           $no = 1;
           ?>   
            @foreach($reregistration as $reregistrations)

            <?php 

                $file_additionalsatu = [];                

                $file_additionalsatu = json_decode($reregistrations->file_additionalsatu);


                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data1= array_column($file_additionalsatu, 'nameparent');
                      if ($data1 != '' && $data1 != null) {
                           $nameparent = $data1;
                          } else {
                           $nameparent = '';
                          }
                          }else {
                           $nameparent = '';
                          }


                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data2= array_column($file_additionalsatu, 'addressparent');
                      if ($data2 != '' && $data2 != null) {
                           $addressparent = $data2;
                          } else {
                           $addressparent = '';
                          }
                          }else {
                           $addressparent = '';
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data2_0= array_column($file_additionalsatu, 'firstpayment');
                      if ($data2_0 != '' && $data2_0 != null) {
                           $firstpayment = $data2_0;
                          } else {
                           $firstpayment = '';
                          }
                          }else {
                           $firstpayment = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data3= array_column($file_additionalsatu, 'firstpayment2');
                      if ($data3 != '' && $data3 != null) {
                           $firstpayment2 = $data3;
                          } else {
                           $firstpayment2 = '';
                          }
                          }else {
                           $firstpayment2 = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data4= array_column($file_additionalsatu, 'datasatu');
                      if ($data4 != '' && $data4 != null) {
                           $datasatu = $data4;
                          } else {
                           $datasatu = '';
                          }
                          }else {
                           $datasatu = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data5= array_column($file_additionalsatu, 'datadua');
                      if ($data5 != '' && $data5 != null) {
                           $datadua = $data5;
                          } else {
                           $datadua = '';
                          }
                          }else {
                           $datadua = '';
                          }
               
                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data6= array_column($file_additionalsatu, 'datatiga');
                      if ($data6 != '' && $data6 != null) {
                           $datatiga = $data6;
                          } else {
                           $datatiga = '';
                          }
                          }else {
                           $datatiga = '';
                          }
                
                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data7= array_column($file_additionalsatu, 'dataempat');
                      if ($data7 != '' && $data7 != null) {
                           $dataempat = $data7;
                          } else {
                           $dataempat = '';
                          }
                          }else {
                           $dataempat = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data8= array_column($file_additionalsatu, 'datalima');
                      if ($data8 != '' && $data8 != null) {
                           $datalima = $data8;
                          } else {
                           $datalima = '';
                          }
                          }else {
                           $datalima = '';
                          } 

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data9= array_column($file_additionalsatu, 'dataenam');
                      if ($data9 != '' && $data9 != null) {
                           $dataenam = $data9;
                          } else {
                           $dataenam = '';
                          }
                          }else {
                           $dataenam = '';
                          } 

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data10= array_column($file_additionalsatu, 'datatujuh');
                      if ($data10 != '' && $data10 != null) {
                           $datatujuh = $data10;
                          } else {
                           $datatujuh = '';
                          }
                          }else {
                           $datatujuh = '';
                          } 

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data11= array_column($file_additionalsatu, 'datadelapan');
                      if ($data11 != '' && $data11 != null) {
                           $datadelapan = $data11;
                          } else {
                           $datadelapan = '';
                          }
                          }else {
                           $datadelapan = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data12= array_column($file_additionalsatu, 'datasembilan');
                      if ($data12 != '' && $data12 != null) {
                           $datasembilan = $data12;
                          } else {
                           $datasembilan = '';
                          }
                          }else {
                           $datasembilan = '';
                          } 

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data13= array_column($file_additionalsatu, 'datasepuluh');
                      if ($data13 != '' && $data13 != null) {
                           $datasepuluh = $data13;
                          } else {
                           $datasepuluh = '';
                          }
                          }else {
                           $datasepuluh = '';
                          } 
                
                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data14= array_column($file_additionalsatu, 'data13');
                      if ($data14 != '' && $data14 != null) {
                           $data13 = $data14;
                          } else {
                           $data13 = '';
                          }
                          }else {
                           $data13 = '';
                          } 

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data15= array_column($file_additionalsatu, 'data14');
                      if ($data15 != '' && $data15 != null) {
                           $data14 = $data15;
                          } else {
                           $data14 = '';
                          }
                          }else {
                           $data14 = '';
                          }  

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data16= array_column($file_additionalsatu, 'data15');
                      if ($data16 != '' && $data16 != null) {
                           $data15 = $data16;
                          } else {
                           $data15 = '';
                          }
                          }else {
                           $data15 = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data17= array_column($file_additionalsatu, 'data16');
                      if ($data17 != '' && $data17 != null) {
                           $data16 = $data17;
                          } else {
                           $data16 = '';
                          }
                          }else {
                           $data16 = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data18= array_column($file_additionalsatu, 'data17');
                      if ($data18 != '' && $data18 != null) {
                           $data17 = $data18;
                          } else {
                           $data17 = '';
                          }
                          }else {
                           $data17 = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data19= array_column($file_additionalsatu, 'data18');
                      if ($data19 != '' && $data19 != null) {
                           $data18 = $data19;
                          } else {
                           $data18 = '';
                          }
                          }else {
                           $data18 = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data20= array_column($file_additionalsatu, 'data19');
                      if ($data20 != '' && $data20 != null) {
                           $data19 = $data20;
                          } else {
                           $data19 = '';
                          }
                          }else {
                           $data19 = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data21= array_column($file_additionalsatu, 'data20');
                      if ($data21 != '' && $data21 != null) {
                           $data20 = $data21;
                          } else {
                           $data20 = '';
                          }
                          }else {
                           $data20 = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data22= array_column($file_additionalsatu, 'data21');
                      if ($data22 != '' && $data22 != null) {
                           $data21 = $data22;
                          } else {
                           $data21 = '';
                          }
                          }else {
                           $data21 = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data23= array_column($file_additionalsatu, 'data22');
                      if ($data23 != '' && $data23 != null) {
                           $data22 = $data23;
                          } else {
                           $data22 = '';
                          }
                          }else {
                           $data22 = '';
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data24= array_column($file_additionalsatu, 'data23');
                      if ($data24 != '' && $data24 != null) {
                           $data23 = $data24;
                          } else {
                           $data23 = '';
                          }
                          }else {
                           $data23 = '';
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data23_0= array_column($file_additionalsatu, 'data24');
                      if ($data23_0 != '' && $data23_0 != null) {
                           $data24 = $data23_0;
                          } else {
                           $data24 = '';
                          }
                          }else {
                           $data24 = '';
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data25_0= array_column($file_additionalsatu, 'data25');
                      if ($data25_0 != '' && $data25_0 != null) {
                           $data25 = $data25_0;
                          } else {
                           $data25 = '';
                          }
                          }else {
                           $data25 = '';
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data26_0= array_column($file_additionalsatu, 'data26');
                      if ($data26_0 != '' && $data26_0 != null) {
                           $data26 = $data26_0;
                          } else {
                           $data26 = '';
                          }
                          }else {
                           $data26 = '';
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data27_0= array_column($file_additionalsatu, 'data27');
                      if ($data27_0 != '' && $data27_0 != null) {
                           $data27 = $data27_0;
                          } else {
                           $data27 = '';
                          }
                          }else {
                           $data27 = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data25_0_0= array_column($file_additionalsatu, 'data28');
                      if ($data25_0_0 != '' && $data25_0_0 != null) {
                           $data28 = $data25_0_0;
                          } else {
                           $data28 = '';
                          }
                          }else {
                           $data28 = '';
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data29_0_0= array_column($file_additionalsatu, 'data29');
                      if ($data29_0_0 != '' && $data29_0_0 != null) {
                           $data29 = $data29_0_0;
                          } else {
                           $data29 = '';
                          }
                          }else {
                           $data29 = '';
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data30_0= array_column($file_additionalsatu, 'data30');
                      if ($data30_0 != '' && $data30_0 != null) {
                           $data30 = $data30_0;
                          } else {
                           $data30 = '';
                          }
                          }else {
                           $data30 = '';
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data31_0= array_column($file_additionalsatu, 'data31');
                      if ($data31_0 != '' && $data31_0 != null) {
                           $data31 = $data31_0;
                          } else {
                           $data31 = '';
                          }
                          }else {
                           $data31 = '';
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data26_10= array_column($file_additionalsatu, 'data32');
                      if ($data26_10 != '' && $data26_10 != null) {
                           $data32 = $data26_10;
                          } else {
                           $data32 = '';
                          }
                          }else {
                           $data32 = '';
                          } 

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data26_0= array_column($file_additionalsatu, 'data33');
                      if ($data26_0 != '' && $data26_0 != null) {
                           $data33 = $data26_0;
                          } else {
                           $data33 = '';
                          }
                          }else {
                           $data33 = '';
                          } 

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data26_1= array_column($file_additionalsatu, 'data34');
                      if ($data26_1 != '' && $data26_1 != null) {
                           $data34 = $data26_1;
                          } else {
                           $data34 = '';
                          }
                          }else {
                           $data34 = '';
                          } 

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data26_2= array_column($file_additionalsatu, 'data35');
                      if ($data26_2 != '' && $data26_2 != null) {
                           $data35 = $data26_2;
                          } else {
                           $data35 = '';
                          }
                          }else {
                           $data35 = '';
                          } 

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data27_10= array_column($file_additionalsatu, 'data36');
                      if ($data27_10 != '' && $data27_10 != null) {
                           $data36 = $data27_10;
                          } else {
                           $data36 = '';
                          }
                          }else {
                           $data36 = '';
                          } 

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data27_0= array_column($file_additionalsatu, 'data37');
                      if ($data27_0 != '' && $data27_0 != null) {
                           $data37 = $data27_0;
                          } else {
                           $data37 = '';
                          }
                          }else {
                           $data37 = '';
                          } 

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data28_0= array_column($file_additionalsatu, 'data38');
                      if ($data28_0 != '' && $data28_0 != null) {
                           $data38 = $data28_0;
                          } else {
                           $data38 = '';
                          }
                          }else {
                           $data38 = '';
                          } 

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data28_1= array_column($file_additionalsatu, 'data39');
                      if ($data28_1 != '' && $data28_1 != null) {
                           $data39 = $data28_1;
                          } else {
                           $data39 = '';
                          }
                          }else {
                           $data39 = '';
                          } 


                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data29_7= array_column($file_additionalsatu, 'data40');
                      if ($data29_7 != '' && $data29_7 != null) {
                           $data40 = $data29_7;
                          } else {
                           $data40 = '';
                          }
                          }else {
                           $data40 = '';
                          } 

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data29_0= array_column($file_additionalsatu, 'data41');
                      if ($data29_0 != '' && $data29_0 != null) {
                           $data41 = $data29_0;
                          } else {
                           $data41 = '';
                          }
                          }else {
                           $data41 = '';
                          } 

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data30_10= array_column($file_additionalsatu, 'data42');
                      if ($data30_10 != '' && $data30_10 != null) {
                           $data42 = $data30_10;
                          } else {
                           $data42 = '';
                          }
                          }else {
                           $data42 = '';
                          } 

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data30_1= array_column($file_additionalsatu, 'data43');
                      if ($data30_1 != '' && $data30_1 != null) {
                           $data43 = $data30_1;
                          } else {
                           $data43 = '';
                          }
                          }else {
                           $data43 = '';
                          }



                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data31_10= array_column($file_additionalsatu, 'data44');
                      if ($data31_10 != '' && $data31_10 != null) {
                           $data44 = $data31_10;
                          } else {
                           $data44 = '';
                          }
                          }else {
                           $data44 = '';
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data31_0= array_column($file_additionalsatu, 'data45');
                      if ($data31_0 != '' && $data31_0 != null) {
                           $data45 = $data31_0;
                          } else {
                           $data45 = '';
                          }
                          }else {
                           $data45 = '';
                          }


               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data31_1= array_column($file_additionalsatu, 'data46');
                      if ($data31_1 != '' && $data31_1 != null) {
                           $data46 = $data31_1;
                          } else {
                           $data46 = '';
                          }
                          }else {
                           $data46 = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data32_0= array_column($file_additionalsatu, 'data47');
                      if ($data32_0 != '' && $data32_0 != null) {
                           $data47 = $data32_0;
                          } else {
                           $data47 = '';
                          }
                          }else {
                           $data47 = '';
                          } 


                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data32_1= array_column($file_additionalsatu, 'data48');
                      if ($data32_1 != '' && $data32_1 != null) {
                           $data48 = $data32_1;
                          } else {
                           $data48 = '';
                          }
                          }else {
                           $data48 = '';
                          } 

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data33_3= array_column($file_additionalsatu, 'data49');
                      if ($data33_3 != '' && $data33_3 != null) {
                           $data49 = $data33_3;
                          } else {
                           $data49 = '';
                          }
                          }else {
                           $data49 = '';
                          } 

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data33_0= array_column($file_additionalsatu, 'data50');
                      if ($data33_0 != '' && $data33_0 != null) {
                           $data50 = $data33_0;
                          } else {
                           $data50 = '';
                          }
                          }else {
                           $data50 = '';
                          }


               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data33_1= array_column($file_additionalsatu, 'data51');
                      if ($data33_1 != '' && $data33_1 != null) {
                           $data51 = $data33_1;
                          } else {
                           $data51 = '';
                          }
                          }else {
                           $data51 = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data34_10= array_column($file_additionalsatu, 'data52');
                      if ($data34_10 != '' && $data34_10 != null) {
                           $data52 = $data34_10;
                          } else {
                           $data52 = '';
                          }
                          }else {
                           $data52 = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data35_10= array_column($file_additionalsatu, 'data53');
                      if ($data35_10 != '' && $data35_10 != null) {
                           $data53 = $data35_10;
                          } else {
                           $data53 = '';
                          }
                          }else {
                           $data53 = '';
                          } 

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data35_0= array_column($file_additionalsatu, 'data54');
                      if ($data35_0 != '' && $data35_0 != null) {
                           $data54 = $data35_0;
                          } else {
                           $data54 = '';
                          }
                          }else {
                           $data54 = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data36_0= array_column($file_additionalsatu, 'data55');
                      if ($data36_0 != '' && $data36_0 != null) {
                           $data55 = $data36_0;
                          } else {
                           $data55 = '';
                          }
                          }else {
                           $data55 = '';
                          }
                
                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data37_10= array_column($file_additionalsatu, 'data56');
                      if ($data37_10 != '' && $data37_10 != null) {
                           $data56 = $data37_10;
                          } else {
                           $data56 = '';
                          }
                          }else {
                           $data56 = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data38_0= array_column($file_additionalsatu, 'data57');
                      if ($data38_0 != '' && $data38_0 != null) {
                           $data57 = $data38_0;
                          } else {
                           $data57 = '';
                          }
                          }else {
                           $data57 = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data39_10= array_column($file_additionalsatu, 'data58');
                      if ($data39_10 != '' && $data39_10 != null) {
                           $data58 = $data39_10;
                          } else {
                           $data58 = '';
                          }
                          }else {
                           $data58 = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data40_0= array_column($file_additionalsatu, 'data59');
                      if ($data40_0 != '' && $data40_0 != null) {
                           $data59 = $data40_0;
                          } else {
                           $data59 = '';
                          }
                          }else {
                           $data59 = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data41_0= array_column($file_additionalsatu, 'data60');
                      if ($data41_0 != '' && $data41_0 != null) {
                           $data60 = $data41_0;
                          } else {
                           $data60 = '';
                          }
                          }else {
                           $data60 = '';
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data42_0= array_column($file_additionalsatu, 'data61');
                      if ($data42_0 != '' && $data42_0 != null) {
                           $data61 = $data42_0;
                          } else {
                           $data61 = '';
                          }
                          }else {
                           $data61 = '';  
                          }  
                          
                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data43_4= array_column($file_additionalsatu, 'data62');
                      if ($data43_4 != '' && $data43_4 != null) {
                           $data62 = $data43_4;
                          } else {
                           $data62 = '';
                          }
                          }else {
                           $data62 = '';  
                          }  

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data44_0= array_column($file_additionalsatu, 'data63');
                      if ($data44_0 != '' && $data44_0 != null) {
                           $data63 = $data44_0;
                          } else {
                           $data63 = '';
                          }
                          }else {
                           $data63 = '';  
                          } 

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data45_10= array_column($file_additionalsatu, 'data64');
                      if ($data45_10 != '' && $data45_10 != null) {
                           $data64 = $data45_10;
                          } else {
                           $data64 = '';
                          }
                          }else {
                           $data64 = '';  
                          } 

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data45_0= array_column($file_additionalsatu, 'data65');
                      if ($data45_0 != '' && $data45_0 != null) {
                           $data65 = $data45_0;
                          } else {
                           $data65 = '';
                          }
                          }else {
                           $data65 = '';  
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data46_34= array_column($file_additionalsatu, 'data66');
                      if ($data46_34 != '' && $data46_34 != null) {
                           $data66 = $data46_34;
                          } else {
                           $data66 = '';
                          }
                          }else {
                           $data66 = '';  
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data47_0= array_column($file_additionalsatu, 'data67');
                      if ($data47_0 != '' && $data47_0 != null) {
                           $data67 = $data47_0;
                          } else {
                           $data67 = '';
                          }
                          }else {
                           $data67 = '';  
                          }
                          
                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data48_10= array_column($file_additionalsatu, 'data68');
                      if ($data48_10 != '' && $data48_10 != null) {
                           $data68 = $data48_10;
                          } else {
                           $data68 = '';
                          }
                          }else {
                           $data68 = '';  
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data49_0= array_column($file_additionalsatu, 'data69');
                      if ($data49_0 != '' && $data49_0 != null) {
                           $data69 = $data49_0;
                          } else {
                           $data69 = '';
                          }
                          }else {
                           $data69 = '';  
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data49_1= array_column($file_additionalsatu, 'data70');
                      if ($data49_1 != '' && $data49_1 != null) {
                           $data70 = $data49_1;
                          } else {
                           $data70 = '';
                          }
                          }else {
                           $data70 = '';  
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data49_2= array_column($file_additionalsatu, 'data71');
                      if ($data49_2 != '' && $data49_2 != null) {
                           $data71 = $data49_2;
                          } else {
                           $data71 = '';
                          }
                          }else {
                           $data71 = '';  
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data50_8= array_column($file_additionalsatu, 'data72');
                      if ($data50_8 != '' && $data50_8 != null) {
                           $data72 = $data50_8;
                          } else {
                           $data72 = '';
                          }
                          }else {
                           $data72 = '';  
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data50_0= array_column($file_additionalsatu, 'data73');
                      if ($data50_0 != '' && $data50_0 != null) {
                           $data73 = $data50_0;
                          } else {
                           $data73 = '';
                          }
                          }else {
                           $data73 = '';  
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data50_1= array_column($file_additionalsatu, 'data74');
                      if ($data50_1 != '' && $data50_1 != null) {
                           $data74 = $data50_1;
                          } else {
                           $data74 = '';
                          }
                          }else {
                           $data74 = '';  
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data50_2= array_column($file_additionalsatu, 'data75');
                      if ($data50_2 != '' && $data50_2 != null) {
                           $data75 = $data50_2;
                          } else {
                           $data75 = '';
                          }
                          }else {
                           $data75 = '';  
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data50_3= array_column($file_additionalsatu, 'data76');
                      if ($data50_3 != '' && $data50_3 != null) {
                           $data76 = $data50_3;
                          } else {
                           $data76 = '';
                          }
                          }else {
                           $data76 = '';  
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data50_4= array_column($file_additionalsatu, 'data77');
                      if ($data50_4 != '' && $data50_4 != null) {
                           $data77 = $data50_4;
                          } else {
                           $data77 = '';
                          }
                          }else {
                           $data77 = '';  
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data50_5= array_column($file_additionalsatu, 'data78');
                      if ($data50_5 != '' && $data50_5 != null) {
                           $data78 = $data50_5;
                          } else {
                           $data78 = '';
                          }
                          }else {
                           $data78 = '';  
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data51_4= array_column($file_additionalsatu, 'data79');
                      if ($data51_4 != '' && $data51_4 != null) {
                           $data79 = $data51_4;
                          } else {
                           $data79 = '';
                          }
                          }else {
                           $data79 = '';  
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data51_1= array_column($file_additionalsatu, 'data80');
                      if ($data51_1 != '' && $data51_1 != null) {
                           $data80 = $data51_1;
                          } else {
                           $data80 = '';
                          }
                          }else {
                           $data80 = '';  
                          }

                          

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data52_0= array_column($file_additionalsatu, 'data81');
                      if ($data52_0 != '' && $data52_0 != null) {
                           $data81 = $data52_0;
                          } else {
                           $data81 = '';
                          }
                          }else {
                           $data81 = '';  
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data53_0= array_column($file_additionalsatu, 'data82');
                      if ($data53_0 != '' && $data53_0 != null) {
                           $data82 = $data53_0;
                          } else {
                           $data82 = '';
                          }
                          }else {
                           $data82 = '';  
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data53_1= array_column($file_additionalsatu, 'data83');
                      if ($data53_1 != '' && $data53_1 != null) {
                           $data83 = $data53_1;
                          } else {
                           $data83 = '';
                          }
                          }else {
                           $data83 = '';  
                          }


               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data53_2= array_column($file_additionalsatu, 'data84');
                      if ($data53_2 != '' && $data53_2 != null) {
                           $data84 = $data53_2;
                          } else {
                           $data84 = '';
                          }
                          }else {
                           $data84 = '';  
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data53_3= array_column($file_additionalsatu, 'data85');
                      if ($data53_3 != '' && $data53_3 != null) {
                           $data85 = $data53_3;
                          } else {
                           $data85 = '';
                          }
                          }else {
                           $data85 = '';  
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data54_0= array_column($file_additionalsatu, 'data86');
                      if ($data54_0 != '' && $data54_0 != null) {
                           $data86 = $data54_0;
                          } else {
                           $data86 = '';
                          }
                          }else {
                           $data86 = '';  
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data55_0= array_column($file_additionalsatu, 'dataschool62');
                      if ($data55_0 != '' && $data55_0 != null) {
                           $dataschool62 = $data55_0;
                          } else {
                           $dataschool62 = '';
                          }
                          }else {
                           $dataschool62 = '';  
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data56_0= array_column($file_additionalsatu, 'dataschool63');
                      if ($data56_0 != '' && $data56_0 != null) {
                           $dataschool63 = $data56_0;
                          } else {
                           $dataschool63 = '';
                          }
                          }else {
                           $dataschool63 = '';  
                          }

                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data57_0= array_column($file_additionalsatu, 'dataschool64');
                      if ($data57_0 != '' && $data57_0 != null) {
                           $dataschool64 = $data57_0;
                          } else {
                           $dataschool64 = '';
                          }
                          }else {
                           $dataschool64 = '';  
                          }


                if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data58_0= array_column($file_additionalsatu, 'datavaksin24');
                      if ($data58_0 != '' && $data58_0 != null) {
                           $datavaksin24 = $data58_0;
                          } else {
                           $datavaksin24 = '';
                          }
                          }else {
                           $datavaksin24 = '';  
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data58_1= array_column($file_additionalsatu, 'datavaksin25');
                      if ($data58_1 != '' && $data58_1 != null) {
                           $datavaksin25 = $data58_1;
                          } else {
                           $datavaksin25 = '';
                          }
                          }else {
                           $datavaksin25 = '';  
                          }


               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data58_2= array_column($file_additionalsatu, 'datavaksin26');
                      if ($data58_2 != '' && $data58_2 != null) {
                           $datavaksin26 = $data58_2;
                          } else {
                           $datavaksin26 = '';
                          }
                          }else {
                           $datavaksin26 = '';  
                          }

               if ($file_additionalsatu !='' && $file_additionalsatu != null && !empty($file_additionalsatu) && $file_additionalsatu != '[]') { 
                     $data58_3= array_column($file_additionalsatu, 'datavaksin27');
                      if ($data58_3 != '' && $data58_3 != null) {
                           $datavaksin27 = $data58_3;
                          } else {
                           $datavaksin27 = '';
                          }
                          }else {
                           $datavaksin27 = '';  
                          }

            ?>
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ ($nameparent =='' && $nameparent == null) ? '' : $nameparent[0] }}</td>
                    <td>{{ ($addressparent =='' && $addressparent == null) ? '' : $addressparent[0] }}</td>
                    <td>{{ ($firstpayment =='' && $firstpayment == null) ? '' : $firstpayment[0] }}</td>
                    <td>{{ ($firstpayment2 =='' && $firstpayment2 == null) ? '' : $firstpayment2[0] }}</td>
                    <td>{{ ($datasatu =='' && $datasatu == null) ? '' : $datasatu[0] }}</td>
                    <td>{{ ($datadua =='' && $datadua == null) ? '' : $datadua[0] }}</td>
                    <td>{{ ($datatiga =='' && $datatiga == null) ? '' : $datatiga[0] }}</td>
                    <td>{{ ($dataempat =='' && $dataempat == null) ? '' : $dataempat[0] }}</td>
                    <td>{{ ($datalima =='' && $datalima == null) ? '' : $datalima[0] }}</td>
                    <td>{{ ($dataenam =='' && $dataenam == null) ? '' : $dataenam[0] }}</td>
                    <td>{{ ($datatujuh =='' && $datatujuh == null) ? '' : $datatujuh[0] }}</td>
                    <td>{{ ($datadelapan =='' && $datadelapan == null) ? '' : $datadelapan[0] }}</td>
                    <td>{{ ($datasembilan =='' && $datasembilan == null) ? '' : $datasembilan[0] }}</td>
                    <td>{{ ($datasepuluh =='' && $datasepuluh == null) ? '' : $datasepuluh[0] }}</td>
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
                    <td>{{ ($dataschool62 =='' && $dataschool62 == null) ? '' : $dataschool62[0] }}</td>
                    <td>{{ ($dataschool63 =='' && $dataschool63 == null) ? '' : $dataschool63[0] }}</td>
                    <td>{{ ($dataschool64 =='' && $dataschool64 == null) ? '' : $dataschool64[0] }}</td>
                    <td>{{ ($datavaksin24 =='' && $datavaksin24 == null) ? '' : $datavaksin24[0] }}</td>
                    <td>{{ ($datavaksin25 =='' && $datavaksin25 == null) ? '' : $datavaksin25[0] }}</td>
                    <td>{{ ($datavaksin26 =='' && $datavaksin26 == null) ? '' : $datavaksin26[0] }}</td>
                    <td>{{ ($datavaksin27 =='' && $datavaksin27 == null) ? '' : $datavaksin27[0] }}</td>
                </tr>  

            @endforeach
            </tbody>
        </table>        
    </div>  
</div>





@endsection

@section('pagescript')
<script> 

    $(document).ready(function() {
    var table = $('#myTable').DataTable( {
        scrollY:        "500px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   {
            left: 2
        }
        } );
    } );


$(".testing").click(function(){
    $("#page-formulir").show();
    $("#gelombangkedua").hide();
  });

$(".testing2").click(function(){
    $("#gelombangkedua").show();
    $("#page-formulir").hide();
  });

$('#pricing-table2 thead tr').clone(true).addClass('filters').appendTo('#pricing-table2 thead');
 
    var table = $('#pricing-table2').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function () {
            var api = this.api();
 
            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
 
                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();
 
                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
    });


</script>
@stop