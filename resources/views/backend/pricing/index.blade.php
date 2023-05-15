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
                <a href="{{ route('admin.pricing.check_excel') }}">
                <button id="btn-search" type="submit" class="testing2 btn btn-flex btn-primary">Cek Data Siswa Additional 1</button>
                </a>
            </div>
            <div class="col">
              
            </div>
          </div>   
          
          <div class="row">
            <div>
                <a href="{{ route('admin.pricing.check_payment') }}">
                <button id="btn-search" type="submit" class="testing2 btn btn-flex btn-primary">Cek Data Siswa Payment</button>
                </a>
            </div>
            <div class="col">
              
            </div>
          </div>   

          <div class="row">
            <div>
                <a href="{{ route('admin.pricing.check_excel') }}">
                <button id="btn-search" type="submit" class="testing2 btn btn-flex btn-primary">Cek Data Siswa Additional 1</button>
                </a>
            </div>
            <div class="col">
              
            </div>
          </div>  
    </div>
    <div class="card-header pt-7 pb-7">

        <div class="row">
            <div>
                <a href="{{ route('admin.pricing.check_excel2') }}">
                <button id="btn-search" type="submit" class="testing2 btn btn-flex btn-primary">Cek Data Siswa Additional 2</button>
                </a>
            </div>
            <div class="col">
              
            </div>
          </div>      
    </div>
</div>
<div id="page-formulir">
    
    <div class="card">
        <form action="{{ route('admin.pricing.upload') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-header pt-7">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Data Siswa</span>
                    <span class="text-gray-400 mt-1 fw-semibold fs-6">List Data Pembayaran</span>
                </h3>
                <!--end::Title-->
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                    <a href="#" class="btn btn-light-success"><i class="bi bi-file-earmark-spreadsheet fs-4 me-2"></i> Download Template</a>
                    <div class="d-flex align-items-center position-relative my-1 ms-15">
                        <input name="file_pricing" class="form-control" type="file" id="formFile">
                    </div>
                    <button id="btn-search" type="submit" class="btn btn-flex btn-primary ms-5">Upload Data Siswa<i class="bi bi-cloud-arrow-up fs-4 ms-4"></i>
                    </button>
                </div>
                <!--end::Toolbar-->
            </div>
        </form>
        
        <div class="card-body">
            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table id="pricing-table" class="table table-striped gy-4 gs-2 border">
                            <thead id="page-formulir">
                                <!--begin::Table row-->
                                <tr  class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th style="width: 100px;">NO</th>	
                                    <th>Id</th>
                                    <th>no_formulir</th>	
                                    <th>ppdb_id</th>	
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
                                <!--end::Table row-->
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                ?>
                                @foreach($data_siswa as $datasiswa)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $datasiswa->id }}</td>
                                    <td>{{ $datasiswa->no_formulir }}</td>
                                    <td>{{ $datasiswa->ppdb_id }}</td>
                                    <td>{{ $datasiswa->tahun_ajaran	 }}</td>
                                    <td>{{ $datasiswa->tanggal_pendaftaran	 }}</td>
                                    <td>{{ $datasiswa->status_siswa	 }}</td>
                                    <td>{{ $datasiswa->nama_lengkap }}</td>
                                    <td>{{ $datasiswa->jenis_kelamin	 }}</td>
                                    <td>{{ $datasiswa->nisn	 }}</td>
                                    <td>{{ $datasiswa->kitas	 }}</td>
                                    <td>{{ $datasiswa->tempat_lahir	 }}</td>
                                    <td>{{ $datasiswa->tanggal_lahir }}</td>
                                    <td>{{ $datasiswa->akta_kelahiran }}</td>
                                    <td>{{ $datasiswa->agama }}</td>
                                    <td>{{ $datasiswa->kewarganegaraan }}</td>
                                    <td>{{ $datasiswa->nama_negara }}</td>
                                    <td>{{ $datasiswa->berkebutuhan_khusus }}</td>
                                    <td>{{ $datasiswa->berkebutuhan_khusus_2 }}</td>
                                    <td>{{ $datasiswa->alamat_jalan }}</td>
                                    <td>{{ $datasiswa->rt }}</td>
                                    <td>{{ $datasiswa->rw }}</td>
                                    <td>{{ $datasiswa->nama_dusun }}</td>
                                    <td>{{ $datasiswa->nama_kelurahan }}</td>
                                    <td>{{ $datasiswa->nama_kelurahan_2 }}</td>
                                    <td>{{ $datasiswa->kecamatan }}</td>
                                    <td>{{ $datasiswa->kode_pos }}</td>
                                    <td>{{ $datasiswa->tempat_tinggal }}</td>
                                    <td>{{ $datasiswa->moda_transportasi }}</td>
                                    <td>{{ $datasiswa->nomor_kks }}</td>
                                    <td>{{ $datasiswa->anak_keberapa }}</td>
                                    <td>{{ $datasiswa->penerima_kps_pkh }}</td>
                                    <td>{{ $datasiswa->no_kph_pkh }}</td>
                                    <td>{{ $datasiswa->usulan_dari_sekolah }}</td>
                                    <td>{{ $datasiswa->kip }}</td>
                                    <td>{{ $datasiswa->nomor_kip }}</td>
                                    <td>{{ $datasiswa->nama_kip	 }}</td>
                                    <td>{{ $datasiswa->kartu_KIP }}</td>
                                    <td>{{ $datasiswa->alasan_layak_pip }}</td>
                                    <td>{{ $datasiswa->bank }}</td>
                                    <td>{{ $datasiswa->no_rekening }}</td>
                                    <td>{{ $datasiswa->rekening_atas_nama }}</td>
                                    <td>{{ $datasiswa->nama_ayah }}</td>
                                    <td>{{ $datasiswa->nik_ayah }}</td>
                                    <td>{{ $datasiswa->tahun_lahir_ayah }}</td>
                                    <td>{{ $datasiswa->pendidikan_ayah }}</td>
                                    <td>{{ $datasiswa->pekerjaan_ayah }}</td>
                                    <td>{{ $datasiswa->penghasilan_bulanan_ayah }}</td>
                                    <td>{{ $datasiswa->berkebutuhan_khusus_ayah }}</td>
                                    <td>{{ $datasiswa->nama_Ibu }}</td>
                                    <td>{{ $datasiswa->nik_Ibu }}</td>
                                    <td>{{ $datasiswa->tahun_lahir_ibu }}</td>
                                    <td>{{ $datasiswa->pendidikan_ibu }}</td>
                                    <td>{{ $datasiswa->pekerjaan_ibu }}</td>
                                    <td>{{ $datasiswa->penghasilan_bulanan_ibu }}</td>
                                    <td>{{ $datasiswa->berkebutuhan_khusus_ibu }}</td>
                                    <td>{{ $datasiswa->nama_wali }}</td>
                                    <td>{{ $datasiswa->nik_wali }}</td>
                                    <td>{{ $datasiswa->tahun_lahir_wali }}</td>
                                    <td>{{ $datasiswa->pendidikan_wali }}</td>
                                    <td>{{ $datasiswa->pekerjaan_wali }}</td>
                                    <td>{{ $datasiswa->penghasilan_bulanan_wali }}</td>
                                    <td>{{ $datasiswa->telepon_rumah }}</td>
                                    <td>{{ $datasiswa->nomor_hp }}</td>
                                    <td>{{ $datasiswa->email }}</td>
                                    <td>{{ $datasiswa->jenis_ekstrakulikuler }}</td>
                                    <td>{{ $datasiswa->tinggi_badan }}</td>
                                    <td>{{ $datasiswa->berat_badan }}</td>
                                    <td>{{ $datasiswa->jarak_tempat }}</td>
                                    <td>{{ $datasiswa->waktu_tempuh }}</td>
                                    <td>{{ $datasiswa->saudara_kandung }}</td>

                                    <td>{{ $datasiswa->jurusan }}</td>
                                    <td>{{ $datasiswa->jenis_pendaftaran }}</td>
                                    <td>{{ $datasiswa->nis }}</td>
                                    <td>{{ $datasiswa->tanggal_masuk_sekolah }}</td>
                                    <td>{{ $datasiswa->asal_sekolah }}</td>

                                    <td>{{ $datasiswa->nomor_peserta_ujian }}</td>
                                    <td>{{ $datasiswa->no_seri_ijazah }}</td>
                                    <td>{{ $datasiswa->no_seri_skhun }}</td>
                                    <td>{{ $datasiswa->keluar_karena }}</td>
                                    <td>{{ $datasiswa->tanggal_keluar }}</td>
                                    <td>{{ $datasiswa->alasan }}</td>
                                    <td>{{ $datasiswa->persetujuan }}</td>

                                    <td>{{ $datasiswa->jenis_1 }}</td>
                                    <td>{{ $datasiswa->tingkat_1 }}</td>
                                    <td>{{ $datasiswa->nama_prestasi_1 }}</td>
                                    <td>{{ $datasiswa->tahun_1 }}</td>
                                    <td>{{ $datasiswa->penyelenggara_1 }}</td>
                                    <td>{{ $datasiswa->jenis_2 }}</td>
                                    <td>{{ $datasiswa->tingkat_2 }}</td>
                                    <td>{{ $datasiswa->nama_prestasi_2 }}</td>
                                    <td>{{ $datasiswa->tahun_2 }}</td>
                                    <td>{{ $datasiswa->penyelenggara_2 }}</td>
                                    <td>{{ $datasiswa->jenis_3 }}</td>
                                    <td>{{ $datasiswa->tingkat_3 }}</td>
                                    <td>{{ $datasiswa->nama_prestasi_3 }}</td>
                                    <td>{{ $datasiswa->tahun_3 }}</td>
                                    <td>{{ $datasiswa->penyelenggara_3 }}</td>
                                    <td>{{ $datasiswa->jenis_1_0 }}</td>
                                    <td>{{ $datasiswa->keterangan_1 }}</td>
                                    <td>{{ $datasiswa->tahun_mulai_1 }}</td>
                                    <td>{{ $datasiswa->tahun_selesai_1 }}</td>
                                    <td>{{ $datasiswa->jenis_2_0 }}</td>
                                    <td>{{ $datasiswa->keterangan_2 }}</td>
                                    <td>{{ $datasiswa->tahun_mulai_2 }}</td>
                                    <td>{{ $datasiswa->tahun_selesai_2 }}</td>
                                    <td>{{ $datasiswa->jenis_3_0 }}</td>
                                    <td>{{ $datasiswa->keterangan_3 }}</td>
                                    <td>{{ $datasiswa->tahun_mulai_3 }}</td>
                                    <td>{{ $datasiswa->tahun_selesai_3 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--col-->
            </div>
            <!--row-->

        </div>
        <!--card-body-->
    </div>  
</div>





@endsection

@section('pagescript')
<script>

$('#pricing-table thead tr').clone(true).addClass('filters').appendTo('#pricing-table thead');
 
    var table = $('#pricing-table').DataTable({
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