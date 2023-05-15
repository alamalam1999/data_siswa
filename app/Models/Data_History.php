<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data_History extends Model
{
    protected $table = 'data_history';
 
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_data_siswa ',
        'kelas_utama',
        'sub_kelas',
        'status_siswa',
        'keterangan',
        'kode_siswa',
        'additional'
    ];

}
