<?php

namespace App\Imports;

use App\Models\Data_siswa2;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataImport2 implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        return new Data_siswa2([
			'nama_orang_tua'                                             => $row['NAMA_ORANG_TUA'],           
			'alamat_orang_tua'                                			 => $row['ALAMAT_ORANG_TUA_ATAU_WALI'],
			'uang_pangkal_up_2'                                 		 => $row['MEMBAYAR_UANG_PANGKAL_UP_2'],     
			'spp_bulan_juli_2023'                             			 => $row['PEMBAYARAN_SPP_BULAN_JULI_2023'], 
			'spp_setiap_bulan'                    			 			 => $row['PEMBAYARAN_SPP_SETIAP_BULANNYA_SELAMBAT'], 
			'sudah_melaksanakan_tes'               					     => $row['JIKA_PUTRA_PUTRI_KAMI_SUDAH_MELAKSANAKAN_TES'], 
			'diterima_di_sekolah_negeri'           						 => $row['JIKA_PUTRA_PUTRI_KAMI_DITERIMA_DI_SEKOLAH_NEGERI'], 
			'sudah_bersekolah_di_avicenna'      					     => $row['APABILA_PUTRA_PUTRI_KAMI_SUDAH_BERSEKOLAH_DI_AVICENNA'],    
			'sudah_bersekolah_di_avicenna_2'      						 => $row['APABILA_PUTRA_PUTRI_KAMI_SUDAH_BERSEKOLAH_DI_AVICENNA'], //tanda tanya
			'tata_tertib_sekolah'             							 => $row['KAMI_AKAN_MEMATUHI_SELURUH_TATA_TERTIB_SEKOLAH'], 
			'aktivitas_foto_video'       								 => $row['SELURUH_AKTIVITAS_PUTRA_PUTRI_KAMI_DALAM_PHOTO_VIDEO'], 
			'didik_diijinkan'                							 => $row['SELURUH_HASIL_KARYA_PESERTA_DIDIK_DIIJINKAN'], 
			'baca_dan_pahami'            							  	 => $row['BERDASARKAN_APA_YANG_TELAH_SAYA_BACA_DAN_PAHAMI'], 
			'nama_calon_murid'                                           => $row['NAMA_CALON_MURID'], 
			'kelas'                                                      => $row['KELAS'], 
			'persetujuan_tata_tertib'                                    => $row['PERSETUJUAN_TATA_TERTIB'], 
			'jasmani'                                            		 => $row['KEADAAN_JASMANI'], 
			'laki_laki'                                        			 => $row['JENIS_KELAMIN_LAKI'], 
			'perempuan'                                    				 => $row['JENIS_KELAMIN_PEREMPUAN'], 
			'tempat_lahir'                                               => $row['TEMPAT_LAHIR'], 
			'tanggal_lahir'                                              => $row['TANGGAL_LAHIR'], 
			'berat_badan'                                                => $row['BERAT_BADAN'], 
			'tinggi_badan'                                               => $row['TINGGI_BADAN'], 
			'golongan_darah'                                             => $row['GOLONGAN_DARAH'], 
			'catatan_imunisasi'                                 		 => $row['MEMILIKI_CATATAN_IMUNISASI'], 
			'imunisasi'                            						 => $row['SAAT_BAYI_MENDAPATKAN_IMUNISASI'], 
			'imunisasi_lengkap'                                          => $row['IMUNISASI_LENGKAP'], 
			'gangguan_dan_kelainan'                                 	 => $row['ADA_GANGGUAN_DAN_KELAINAN'], 
			'tidak_ada_gangguan'                            			 => $row['TIDAK_ADA_GANGGUAN_DAN_KELAINAN'], 
			'berbahaya'                                                  => $row['BERBAHAYA'], 
			'tidak_berbahaya'                                            => $row['TIDAK_BERBAHAYA'],
			'ppdb_id'                                                    => $row['PPDB_ID']
        ]);
    }
}