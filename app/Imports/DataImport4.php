<?php

namespace App\Imports;

use App\Models\Data_siswa4;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataImport4 implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        return new Data_siswa4([
            'media_sosial_2'                                               => $row['media_sosial'], 
            'program_sekolah'                                            => $row['program_sekolah'], 
            'fasilitas_pelayanan'                                        => $row['fasilitas_pelayanan'], 
            'jarak'                                                      => $row['jarak'], 
            'uang_sekolah_terjangkau'                                    => $row['uang_sekolah_terjangkau'], 
            'fasilitas_lengkap'                                  => $row['fasilitas_sekolah_lengkap'], 
            'kebersihan'                                  => $row['kebersihan_gedung_sekolah'], 
            'pelayanan_informasi'                                        => $row['pelayanan_informasi'], 
            'tenaga_pendidik_kompeten'                                   => $row['tenaga_pendidik_kompeten'], 
            'tidak_pilih_fasilitas_pelayanan'                            => $row['tidak_pilih_fasilitas_pelayanan'], 
            '1km_jarak'                                                  => $row['1km_jarak'], 
            '1_sampai_5km'                                               => $row['1_sampai_5km'], 
            '6_sampai_10km'                                              => $row['6_sampai_10km'], 
            '11_sampai_20km'                                             => $row['11_sampai_20km'], 
            '21_sampai_30km'                                             => $row['21_sampai_30km'], 
            'tidak_pilih_jarak'                                          => $row['tidak_pilih_jarak'], 
            'uang_pangkal'                                               => $row['uang_pangkal'], 
            'spp'                                                        => $row['spp'], 
            'tanda_biaya_tambahan'                                       => $row['tanda_biaya_tambahan'], 
            'tidak_terjangkau'                              => $row['tidak_terjangkau_uang_sekolah'], 
            'sederhana_dan_mudah'                                        => $row['sederhana_dan_mudah'], 
            'standar_sama'                                  => $row['standar_sama_sekolah_lain'], 
            'berbelit_belit'                                             => $row['berbelit_belit'], 
            'tidak_murah'                                   => $row['uang_sekolah_tidak_murah'], 
            'merepotkan'                                                 => $row['merepotkan'], 
            'pendapat_saya'                                              => $row['pendapat_saya'], 
            'program_7_habits'                                           => $row['program_7_habits'], 
            'prestasi_sekolah'                                           => $row['prestasi_sekolah'], 
            'ekstrakulikuler'                                            => $row['ekstrakulikuler'], 
            'booster_1'                                                  => $row['booster_1'], 
            'booster_2'                                                  => $row['booster_2'], 
            'booster_3'                                                  => $row['booster_3'], 
            'belum_vaksin'                                               => $row['belum_vaksin'], 
            'ppdb_id'                                                    => $row['ppdb_id']
        ]);
    }
}