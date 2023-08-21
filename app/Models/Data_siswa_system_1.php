<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data_siswa_system_1 extends Model
{

    public $incrementing = false;

    protected $table = 'data_siswa_system_1';

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
	];
}
