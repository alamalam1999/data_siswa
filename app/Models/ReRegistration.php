<?php

namespace App\Models;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;

class ReRegistration extends Model
{
    protected $table = 'reregister';

    public $incrementing = false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'file_additionalsatu',
        'ppdb_id',
        'medco_employee_file'
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
