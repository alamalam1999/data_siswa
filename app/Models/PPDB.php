<?php

namespace App\Models;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;

class PPDB extends Model
{
    protected $table = 'ppdb';

    public $incrementing = false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'registration_schedule_id',
        'document_no',
        'document_status',
        'id_user',
        'school_site',
        'stage',
        'classes',
        'student_status',

        'fullname',
        'gender',
        'place_of_birth',
        'date_of_birth',
        'religion',
        'nationality',
        'address',
        'home_phone',
    
        'hand_phone',
        'school_origin',
        'family_card',
        'birth_certificate',
        'last_report',
        'academic_certificate',
        'kia_book',
        'file_additional',
        'medco_employee',
        'medco_employee_file',
        'ppdb_discount',
        'studied_before',
        'rejected_at',
        'rejected_by',
        'gaji',
        'slip_gaji_parent',
        'file_additional_satu',
        'file_additional_dua',
        'file_additional_tiga',
        'file_additional_empat',
        'file_additional_lima'

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function school()
    {
        return $this->belongsTo(School::class, 'school_site', 'school_code');
    }

    public function schedule()
    {
        return $this->belongsTo(RegistrationSchedule::class, 'registration_schedule_id', 'id');
    }
}
