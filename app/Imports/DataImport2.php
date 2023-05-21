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
			'alamat_orang_tua_atau_wali'                                 => $row['ALAMAT_ORANG_TUA_ATAU_WALI'],
			'membayar_uang_pangkal_up_2'                                 => $row['MEMBAYAR_UANG_PANGKAL_UP_2'],     
			'pembayaran_spp_bulan_juli_2023'                             => $row['PEMBAYARAN_SPP_BULAN_JULI_2023'], 
			'pembayaran_spp_setiap_bulannya_selambat'                    => $row['PEMBAYARAN_SPP_SETIAP_BULANNYA_SELAMBAT'], 
			'jika_putra_putri_kami_sudah_melaksanakan_tes'               => $row['JIKA_PUTRA_PUTRI_KAMI_SUDAH_MELAKSANAKAN_TES'], 
			'jika_putra_putri_kami_diterima_di_sekolah_negeri'           => $row['JIKA_PUTRA_PUTRI_KAMI_DITERIMA_DI_SEKOLAH_NEGERI'], 
			'apabila_putra_putri_kami_sudah_bersekolah_di_avicenna'      => $row['APABILA_PUTRA_PUTRI_KAMI_SUDAH_BERSEKOLAH_DI_AVICENNA'],    
			'apabila_putra_putri_kami_sudah_bersekolah_di_avicenna'      => $row['APABILA_PUTRA_PUTRI_KAMI_SUDAH_BERSEKOLAH_DI_AVICENNA'], 
			'kami_akan_mematuhi_seluruh_tata_tertib_sekolah'             => $row['KAMI_AKAN_MEMATUHI_SELURUH_TATA_TERTIB_SEKOLAH'], 
			'seluruh_aktivitas_putra_putri_kami_dalam_photo_video'       => $row['SELURUH_AKTIVITAS_PUTRA_PUTRI_KAMI_DALAM_PHOTO_VIDEO'], 
			'seluruh_hasil_karya_peserta_didik_diijinkan'                => $row['SELURUH_HASIL_KARYA_PESERTA_DIDIK_DIIJINKAN'], 
			'berdasarkan_apa_yang_telah_saya_baca_dan_pahami'            => $row['BERDASARKAN_APA_YANG_TELAH_SAYA_BACA_DAN_PAHAMI'], 
			'nama_calon_murid'                                           => $row['NAMA_CALON_MURID'], 
			'kelas'                                                      => $row['KELAS'], 
			'persetujuan_tata_tertib'                                    => $row['PERSETUJUAN_TATA_TERTIB'], 
			'keadaan_jasmani'                                            => $row['KEADAAN_JASMANI'], 
			'jenis_kelamin_laki'                                         => $row['JENIS_KELAMIN_LAKI'], 
			'jenis_kelamin_perempuan'                                    => $row['JENIS_KELAMIN_PEREMPUAN'], 
			'tempat_lahir'                                               => $row['TEMPAT_LAHIR'], 
			'tanggal_lahir'                                              => $row['TANGGAL_LAHIR'], 
			'berat_badan'                                                => $row['BERAT_BADAN'], 
			'tinggi_badan'                                               => $row['TINGGI_BADAN'], 
			'golongan_darah'                                             => $row['GOLONGAN_DARAH'], 
			'memiliki_catatan_imunisasi'                                 => $row['MEMILIKI_CATATAN_IMUNISASI'], 
			'saat_bayi_mendapatkan_imunisasi'                            => $row['SAAT_BAYI_MENDAPATKAN_IMUNISASI'], 
			'imunisasi_lengkap'                                          => $row['IMUNISASI_LENGKAP'], 
			'ada_gangguan_dan_kelainan'                                  => $row['ADA_GANGGUAN_DAN_KELAINAN'], 
			'tidak_ada_gangguan_dan_kelainan'                            => $row['TIDAK_ADA_GANGGUAN_DAN_KELAINAN'], 
			'berbahaya'                                                  => $row['BERBAHAYA'], 
			'tidak_berbahaya'                                            => $row['TIDAK_BERBAHAYA'], 
			'yang_lain'                                                  => $row['YANG_LAIN'], 
			'normal_tidak_ada_gangguan'                                  => $row['NORMAL_TIDAK_ADA_GANGGUAN'], 
			'ada_kompilasi_ketika_melahirkan'                            => $row['ADA_KOMPILASI_KETIKA_MELAHIRKAN'], 
			'normal_tidak_ada_cacat_bawaan'                              => $row['NORMAL_TIDAK_ADA_CACAT_BAWAAN'], 
			'ada_cacat_bawaan'                                           => $row['ADA_CACAT_BAWAAN'], 
			'normal'                                                     => $row['NORMAL'], 
			'terlambat'                                                  => $row['TERLAMBAT'], 
			'normal'                                                     => $row['NORMAL'], 
			'terlambat'                                                  => $row['TERLAMBAT'], 
			'normal'                                                     => $row['NORMAL'], 
			'terlambat'                                                  => $row['TERLAMBAT'], 
			'normal'                                                     => $row['NORMAL'], 
			'terlambat'                                                  => $row['TERLAMBAT'],
			'normal'                                                     => $row['NORMAL'], 
			'terlambat'                                                  => $row['TERLAMBAT'], 
			'ada'                                                        => $row['ADA'], 
			'tidak_ada'                                                  => $row['TIDAK_ADA'], 
			'ya_pernah'                                                  => $row['YA_PERNAH'], 
			'tidak_pernah'                                               => $row['TIDAK_PERNAH'], 
			'ya_riwayat_kejang_demam'                                    => $row['YA_RIWAYAT_KEJANG_DEMAM'], 
			'tidak_riwayat_kejang_demam'                                 => $row['TIDAK_RIWAYAT_KEJANG_DEMAM'], 
			'memiliki_riwayat_penyakit_diderita'                         => $row['MEMILIKI_RIWAYAT_PENYAKIT_DIDERITA'], 
			'pernah_rawat_rumah_sakit'                                   => $row['PERNAH_RAWAT_RUMAH_SAKIT'], 
			'catatan_lain'                                               => $row['CATATAN_LAIN'], 
			'sekolah_asal'                                               => $row['SEKOLAH_ASAL'], 
			'brand'                                                      => $row['BRAND'], 
			'kegiatan_sekolah'                                           => $row['KEGIATAN_SEKOLAH'], 
			'media_cetak'                                                => $row['MEDIA_CETAK'], 
			'media_elektronik'                                           => $row['MEDIA_ELEKTRONIK'], 
			'media_sosial'                                               => $row['MEDIA_SOSIAL'], 
			'media_sosial'                                               => $row['MEDIA_SOSIAL'], 
			'program_sekolah'                                            => $row['PROGRAM_SEKOLAH'], 
			'fasilitas_pelayanan'                                        => $row['FASILITAS_PELAYANAN'], 
			'jarak'                                                      => $row['JARAK'], 
			'uang_sekolah_terjangkau'                                    => $row['UANG_SEKOLAH_TERJANGKAU'], 
			'fasilitas_sekolah_lengkap'                                  => $row['FASILITAS_SEKOLAH_LENGKAP'], 
			'kebersihan_gedung_sekolah'                                  => $row['KEBERSIHAN_GEDUNG_SEKOLAH'], 
			'pelayanan_informasi'                                        => $row['PELAYANAN_INFORMASI'], 
			'tenaga_pendidik_kompeten'                                   => $row['TENAGA_PENDIDIK_KOMPETEN'], 
			'tidak_pilih_fasilitas_pelayanan'                            => $row['TIDAK_PILIH_FASILITAS_PELAYANAN'], 
			'1km_jarak'                                                  => $row['1KM_JARAK'], 
			'1_sampai_5km'                                               => $row['1_SAMPAI_5KM'], 
			'6_sampai_10km'                                              => $row['6_SAMPAI_10KM'], 
			'11_sampai_20km'                                             => $row['11_SAMPAI_20KM'], 
			'21_sampai_30km'                                             => $row['21_SAMPAI_30KM'], 
			'tidak_pilih_jarak'                                          => $row['TIDAK_PILIH_JARAK'], 
			'uang_pangkal'                                               => $row['UANG_PANGKAL'], 
			'spp'                                                        => $row['SPP'], 
			'tanda_biaya_tambahan'                                       => $row['TANDA_BIAYA_TAMBAHAN'], 
			'tidak_terjangkau_uang_sekolah'                              => $row['TIDAK_TERJANGKAU_UANG_SEKOLAH'], 
			'sederhana_dan_mudah'                                        => $row['SEDERHANA_DAN_MUDAH'], 
			'standar_sama_sekolah_lain'                                  => $row['STANDAR_SAMA_SEKOLAH_LAIN'], 
			'berbelit_belit'                                             => $row['BERBELIT_BELIT'], 
			'uang_sekolah_tidak_murah'                                   => $row['UANG_SEKOLAH_TIDAK_MURAH'], 
			'merepotkan'                                                 => $row['MEREPOTKAN'], 
			'pendapat_saya'                                              => $row['PENDAPAT_SAYA'], 
			'program_7_habits'                                           => $row['PROGRAM_7_HABITS'], 
			'prestasi_sekolah'                                           => $row['PRESTASI_SEKOLAH'], 
			'ekstrakulikuler'                                            => $row['EKSTRAKULIKULER'], 
			'booster_1'                                                  => $row['BOOSTER_1'], 
			'booster_2'                                                  => $row['BOOSTER_2'], 
			'booster_3'                                                  => $row['BOOSTER_3'], 
			'belum_vaksin'                                               => $row['BELUM_VAKSIN'], 
			'ppdb_id'                                                    => $row['PPDB_ID']
        ]);
    }
}