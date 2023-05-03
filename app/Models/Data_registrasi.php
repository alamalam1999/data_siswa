<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data_registrasi extends Model
{
    protected $table = 'data_registrasi';

    protected $primaryKey = 'id';

    protected $fillable = [
            'jurusan',
            'ppdb_id',
            'jenis_pendaftaran',
            'nis',
            'tanggal_masuk_sekolah',
            'asal_sekolah',
            'nomor_peserta_ujian',
            'no_seri_ijazah',
            'no_seri_skhun',
            'keluar_karena',
            'tanggal_keluar',
            'alasan',
            'golongan_darah',
            'catatan_imunisasi',
            'dapat_imunisasi',
            'imunisasi_lengkap',
            'sertifikat_imunisasi',
            'riwayat_vaksin',
            'booster1',
            'booster2',
            'booster3',
            'belum_vaksin',
            'sertifikat_vaksin',
            'kelainan',
            'tidak_ada_kelainan',
            'berbahaya',
            'tidak_berbahaya',
            'yang_lain',
            'normal',
            'komplikasi_melahirkan',
            'normal_tidak_cacat',
            'ada_cacat_bawaan',
            'miring',
            'tengkurap',
            'merangkak',
            'duduk',
            'kemampuan_bicara',
            'ada_cacat_fisik',
            'pernah_penyakit',
            'riwayat_kejang',
            'riwayat_penyakit',
            'pernah_dirawat',
            'catatan_lain',
            'sekolah_asal',
            'brand',
            'kegiatan_sekolah',
            'media_cetak',
            'media_elektronik',
            'media_sosial',
            'internet'
    ];
}
