<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{

    public $incrementing = false;
    protected $primaryKey = 'school_code';
    protected $fillable = [
        'school_code',
        'school_name',
        'address',
        'school_image'

    ];
}
