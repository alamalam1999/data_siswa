<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    public $incrementing = false;
    protected $fillable = [
        'academic_year',
        'academic_label',
        'is_running',
    ];
}
