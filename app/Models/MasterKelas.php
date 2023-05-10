<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterKelas extends Model
{

    protected $table = 'master_kelas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'kategori',
        'kelas',
        'unit',
        'sekolah',
        'kepala_sekolah',
        'wali_kelas'
    ];

}
