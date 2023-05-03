<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistrationSchedule extends Model
{
    // public $incrementing = false;
    protected $fillable = [
        'academic_year_id',
        'date_from',
        'date_from',
        'date_to'
    ];

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id', 'id');
    }

    public function ppdb()
    {
        return $this->hasMany(PPDB::class, 'id', 'registration_schedule_id');
    }
}
