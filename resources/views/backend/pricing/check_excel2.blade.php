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
                <a href="{{ route('admin.import.export_excel') }}">
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
                    <th>No</th>
                    <th>NAMA_LENGKAP</th>
                    <th>NIPD</th> {{-- baru  --}}
                    <th>JENIS_KELAMIN</th>
                    <th>NISN</th>       
                    <th>TEMPAT_LAHIR</th>
                    <th>TANGGAL_LAHIR</th>
                    <th>NIK</th> {{-- baru --}}
                    <th>AGAMA</th>
                    <th>ALAMAT_JALAN</th>
                    <th>RT</th>
                    <th>RW</th>
                    <th>NAMA_DUSUN</th>
                    <th>NAMA_KELURAHAN</th>
                    <th>NAMA_KELURAHAN</th>
                    <th>KECAMATAN</th>
                    <th>KODE_POS</th>
                    <th>TEMPAT_TINGGAL</th>
                    <th>MODA_TRANSPORTASI</th>
                    <th>TELEPON_RUMAH</th>
                    <th>NOMOR_HP</th>
                    <th>EMAIL</th>
                    <th>NO_SERI_SKHUN</th>                   
                    <th>PENERIMA_KPS_PKH</th>  
                    <th>NO_KPS</th> {{-- baru --}}
                    <th>NAMA_AYAH</th>
                    <th>TAHUN_LAHIR_AYAH</th> 
                    <th>PENDIDIKAN_AYAH</th> 
                    <th>PEKERJAAN_AYAH</th> 
                    <th>PENGHASILAN_BULANAN_AYAH</th> 
                    <th>NIK_AYAH</th>
                    <th>NAMA_IBU</th>
                    <th>TAHUN_LAHIR_IBU</th>
                    <th>PENDIDIKAN_IBU</th>
                    <th>PEKERJAAN_IBU</th>
                    <th>PENGHASILAN_BULANAN_IBU</th>  
                    <th>NIK_IBU</th>
                    <th>NAMA_WALI</th> 
                    <th>TAHUN_LAHIR_WALI</th>
                    <th>PENDIDIKAN_WALI</th>
                    <th>PEKERJAAN_WALI</th>
                    <th>PENGHASILAN_BULANAN_WALI</th>
                    <th>NIK_WALI</th>
                    <th>ROMBEL_SAAT_INI</th> {{-- baru --}}
                    <th>NO_PESERTA_UN</th> {{-- baru --}}
                    <th>NO_SERI_IJAZAH</th>
                    <th>KIP</th> 
                    <th>NOMOR_KIP</th>
                    <th>NAMA_KIP</th>
                    <th>NOMOR_KKS</th>
                    <th>AKTA_KELAHIRAN</th> 
                    <th>BANK</th>
                    <th>NO_REKENING</th>
                    <th>REKENING_ATAS_NAMA</th>   
                    <th>ALASAN_LAYAK_PIP</th>            
                    <th>BERKEBUTUHAN_KHUSUS</th> 
                    <th>BERKEBUTUHAN_KHUSUS</th> 
                    <th>ASAL_SEKOLAH</th>           
                    <th>ANAK_KEBERAPA</th> 
                    <th>LINTANG</th> {{-- baru --}}
                    <th>BUJUR</th> {{--  baru --}}
                    <th>NO_KK</th> {{-- baru --}}
                    <th>BERAT_BADAN</th> 
                    <th>TINGGI_BADAN</th>
                    <th>LINGKAR_KEPALA</th> {{-- baru --}}
                    <th>SAUDARA_KANDUNG</th>                                            
                    <th>JARAK_TEMPAT</th>                  
                                     
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
                     $data33_49= array_column($file_additionaldua, 'data49');
                      if ($data33_49 != '' && $data33_49 != null) {
                           $data49 = $data33_49;
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
                    <td>{{ ($data5 =='' && $data5 == null) ? '' : $data5[0] }}</td>
                    <td>{{-- baru --}}</td>
                    <td>{{ ($data6 =='' && $data6 == null) ? '' : $data6[0] }}</td>
                    <td>{{ ($data7 =='' && $data7 == null) ? '' : $data7[0] }}</td>     
                    <td>{{ ($data9 =='' && $data9 == null) ? '' : $data9[0] }}</td>
                    <td>{{ ($data10 =='' && $data10 == null) ? '' : $data10[0] }}</td>
                    <td>{{-- baru --}}</td>
                    <td>{{ ($data12 =='' && $data12 == null) ? '' : $data12[0] }}</td>
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
                    <td>{{ ($data60 =='' && $data60 == null) ? '' : $data60[0] }}</td>
                    <td>{{ ($data61 =='' && $data61 == null) ? '' : $data61[0] }}</td>
                    <td>{{ ($data62 =='' && $data62 == null) ? '' : $data62[0] }}</td>
                    <td>{{ ($data76 =='' && $data76 == null) ? '' : $data76[0] }}</td>                
                    <td>{{ ($data29 =='' && $data29 == null) ? '' : $data29[0] }}</td>
                    <td>{{-- baru --}}</td> 
                    <td>{{ ($data40 =='' && $data40 == null) ? '' : $data40[0] }}</td>
                    <td>{{ ($data42 =='' && $data42 == null) ? '' : $data42[0] }}</td>        
                    <td>{{ ($data43 =='' && $data43 == null) ? '' : $data43[0] }}</td>
                    <td>{{ ($data44 =='' && $data44 == null) ? '' : $data44[0] }}</td>
                    <td>{{ ($data45 =='' && $data45 == null) ? '' : $data45[0] }}</td>
                    <td>{{ ($data41 =='' && $data41 == null) ? '' : $data41[0] }}</td>
                    <td>{{ ($data47 =='' && $data47 == null) ? '' : $data47[0] }}</td>
                    <td>{{ ($data49 =='' && $data49 == null) ? '' : $data49[0] }}</td>
                    <td>{{ ($data50 =='' && $data50 == null) ? '' : $data50[0] }}</td>
                    <td>{{ ($data51 =='' && $data51 == null) ? '' : $data51[0] }}</td>
                    <td>{{ ($data52 =='' && $data52 == null) ? '' : $data52[0] }}</td>
                    <td>{{ ($data48 =='' && $data48 == null) ? '' : $data48[0] }}</td>
                    <td>{{ ($data54 =='' && $data54 == null) ? '' : $data54[0] }}</td>
                    <td>{{ ($data56 =='' && $data56 == null) ? '' : $data56[0] }}</td>
                    <td>{{ ($data57 =='' && $data57 == null) ? '' : $data57[0] }}</td>
                    <td>{{ ($data58 =='' && $data58 == null) ? '' : $data58[0] }}</td>
                    <td>{{ ($data59 =='' && $data59 == null) ? '' : $data59[0] }}</td>
                    <td>{{ ($data55 =='' && $data55 == null) ? '' : $data55[0] }}</td>
                    <td>{{-- baru --}}</td>
                    <td>{{-- baru --}}</td>
                    <td>{{ ($data75 =='' && $data75 == null) ? '' : $data75[0] }}</td>
                    <td>{{ ($data32 =='' && $data32 == null) ? '' : $data32[0] }}</td>
                    <td>{{ ($data33 =='' && $data33 == null) ? '' : $data33[0] }}</td>
                    <td>{{ ($data34 =='' && $data34 == null) ? '' : $data34[0] }}</td>
                    <td>{{ ($data27 =='' && $data27 == null) ? '' : $data27[0] }}</td>
                    <td>{{ ($data11 =='' && $data11 == null) ? '' : $data11[0] }}</td>
                    <td>{{ ($data37 =='' && $data37 == null) ? '' : $data37[0] }}</td>
                    <td>{{ ($data38 =='' && $data38 == null) ? '' : $data38[0] }}</td>
                    <td>{{ ($data39 =='' && $data39 == null) ? '' : $data39[0] }}</td>
                    <td>{{ ($data15 =='' && $data15 == null) ? '' : $data15[0] }}</td>
                    <td>{{ ($data36 =='' && $data36 == null) ? '' : $data36[0] }}</td>
                    <td>{{ ($data16 =='' && $data16 == null) ? '' : $data16[0] }}</td>
                    <td>{{ ($data73 =='' && $data73 == null) ? '' : $data73[0] }}</td>                         
                    <td>{{ ($data28 =='' && $data28 == null) ? '' : $data28[0] }}</td>
                    <td>{{-- baru --}}</td>
                    <td>{{-- baru --}}</td>
                    <td>{{-- baru --}}</td>
                    <td>{{ ($data65 =='' && $data65 == null) ? '' : $data65[0] }}</td>
                    <td>{{ ($data64 =='' && $data64 == null) ? '' : $data64[0] }}</td>
                    <td> {{-- baru --}}</td>
                    <td>{{ ($data68 =='' && $data68 == null) ? '' : $data68[0] }}</td>
                    <td>{{ ($data66 =='' && $data66 == null) ? '' : $data66[0] }}</td>
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
        scrollY:        "800px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   {
            left: 3
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