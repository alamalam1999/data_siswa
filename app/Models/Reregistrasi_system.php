<?php

namespace App\Models;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;

class Reregistrasi_system extends Model
{
    protected $table = 'reregister_system';

    public $incrementing = false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'file_additionalsatu',
        'ppdb_id',
        'medco_employee_file'
    ];
}
