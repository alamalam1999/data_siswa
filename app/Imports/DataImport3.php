<?php

namespace App\Imports;

use App\Models\Data_siswa3;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataImport3 implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        return new Data_siswa3([
                            'ppdb_id'                                       =>['ppdb_id'],
			               'yang_lain'                                                  => $row['yang_lain'], 
                           'normal_tidak_gangguan'                                  => $row['normal_tidak_ada_gangguan'], 
                           'kompilasi_ketika_melahirkan'                                => $row['ada_kompilasi_ketika_melahirkan'], 
                           'tidak_ada_cacat'                                            => $row['normal_tidak_ada_cacat_bawaan'], 
                           'cacat_bawaan'                                               => $row['ada_cacat_bawaan'], 
                           'normal_1'                                                     => $row['normal_1'], 
                           'terlambat_1'                                                  => $row['terlambat_1'], 
                           'normal_2'                                                     => $row['normal_2'], 
                           'terlambat_2'                                                  => $row['terlambat_2'], 
                           'normal_3'                                                     => $row['normal_3'], 
                           'terlambat_3'                                                  => $row['terlambat_3'], 
                           'normal_4'                                                     => $row['normal_4'], 
                           'terlambat_4'                                                  => $row['terlambat_4'],
                           'normal_5'                                                     => $row['normal_5'], 
                           'terlambat_5'                                                  => $row['terlambat_5'], 
                           'ada'                                                        => $row['ada'], 
                           'tidak_ada'                                                  => $row['tidak_ada'], 
                           'ya_pernah'                                                  => $row['ya_pernah'], 
                           'tidak_pernah'                                               => $row['tidak_pernah'], 
                           'ya_riwayat_kejang'                                    => $row['ya_riwayat_kejang_demam'], 
                           'tidak_riwayat_kejang'                                 => $row['tidak_riwayat_kejang_demam'], 
                           'riwayat_penyakit_diderita'                                  => $row['memiliki_riwayat_penyakit_diderita'], 
                           'rawat_rumah_sakit'                                   => $row['pernah_rawat_rumah_sakit'], 
                           'catatan_lain'                                               => $row['catatan_lain'], 
                           'sekolah_asal'                                               => $row['sekolah_asal'], 
                           'brand'                                                      => $row['brand'], 
                           'kegiatan_sekolah'                                           => $row['kegiatan_sekolah'], 
                           'media_cetak'                                                => $row['media_cetak'], 
                           'media_elektronik'                                           => $row['media_elektronik'], 
                           'media_sosial'                                               => $row['media_sosial']
        ]);
    }
}