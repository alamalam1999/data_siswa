<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data_siswa_system extends Model
{

    public $incrementing = false;

    protected $table = 'data_siswa_system';

    protected $primaryKey = 'id';

    protected $fillable = [
        'no_formulir',
        'ppdb_id',
    	'tahun_ajaran',
    	'tanggal_pendaftaran',
    	'status_siswa',
    	'nama_lengkap',
    	'jenis_kelamin',
    	'nisn',
    	'kitas',
    	'tempat_lahir',
    	'tanggal_lahir',
    	'akta_kelahiran',
    	'agama',
    	'kewarganegaraan',
    	'nama_negara',
    	'berkebutuhan_khusus',
		'berkebutuhan_khusus_2',
    	'alamat_jalan',
    	'rt',
    	'rw',
    	'nama_dusun',
        'nama_kelurahan',
		'nama_kelurahan_2',
    	'kecamatan',
    	'kode_pos',
    	'tempat_tinggal',
    	'moda_transportasi',
    	'nomor_kks',
    	'anak_keberapa',
    	'penerima_kps_pkh',
    	'no_kph_pkh',
    	'usulan_dari_sekolah',
    	'kip',
    	'nomor_kip',
        'nama_kip',
    	'kartu_KIP',
    	'alasan_layak_pip',
    	'bank',
    	'no_rekening',
    	'rekening_atas_nama',
    	'nama_ayah',
    	'nik_ayah',
    	'tahun_lahir_ayah',
    	'pendidikan_ayah',
    	'pekerjaan_ayah',	
    	'penghasilan_bulanan_ayah',
    	'berkebutuhan_khusus_ayah',
        'nama_Ibu',
    	'nik_Ibu',
        'tahun_lahir_ibu',	
    	'pendidikan_ibu',
    	'pekerjaan_ibu',
        'penghasilan_bulanan_ibu',	
    	'berkebutuhan_khusus_ibu',
    	'nama_wali',
    	'nik_wali',
    	'tahun_lahir_wali',
    	'pendidikan_wali',
    	'pekerjaan_wali',

		'penghasilan_bulanan_wali', 
		'telepon_rumah',
		'nomor_hp',
		'email', 
		'jenis_ekstrakulikuler',  
		'tinggi_badan',  
		'berat_badan', 
		'jarak_tempat', 
		'waktu_tempuh',  
		'saudara_kandung',

		'jurusan',
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

		'persetujuan',
		
		'jenis_1',
		'tingkat_1',
		'nama_prestasi_1',
		'tahun_1',
		'penyelenggara_1',
		'jenis_2',
		'tingkat_2',
		'nama_prestasi_2',
		'tahun_2',
		'penyelenggara_2',
		'jenis_3',
		'tingkat_3',
		'nama_prestasi_3',
		'tahun_3',
		'penyelenggara_3',
		'jenis_1_0',
		'keterangan_1',
		'tahun_mulai_1',
		'tahun_selesai_1',
		'jenis_2_0',
		'keterangan_2',
		'tahun_mulai_2',
		'tahun_selesai_2',
		'jenis_3_0',
		'keterangan_3',
		'tahun_mulai_3',
		'tahun_selesai_3',
		'ppdb_id'
    ];
}