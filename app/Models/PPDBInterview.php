<?php

namespace App\Models;

use App\Models\Traits\ModelAttributes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PPDBInterview extends BaseModel
{
    use ModelAttributes, SoftDeletes;

    protected $table = 'ppdb_interviews';

    protected $fillable = [
        'ppdb_id',
        'school_recomendation_result',
        'school_recomendation_file',
        'school_recomendation_note',
        'is_submited',
        'interview_result',
        'interview_result_note',  
        'interview_result_file', 
        'kesiapan_value', 
        'kesiapan_file', 
        'kesiapan_result', 
        'kesiapan_result_note', 
        'psikotest_value', 
        'psikotest_file', 
        'psikotest_result', 
        'psikotest_result_note', 
        'academic_value', 
        'academic_file', 
        'academic_result', 
        'academic_result_note', 
        'interview_parent_summary', 
        'interview_parent_file', 
        'interview_parent_result', 
        'interview_parent_result_note', 
        'interview_student_summary', 
        'interview_student_file', 
        'interview_student_result', 
        'interview_student_result_note', 
        'observasi_value', 
        'observasi_summary', 
        'observasi_file', 
        'observasi_result', 
        'observasi_result_note'
    ];

    protected $casts = [
        'slug' => 'array',
    ];

    // protected $fillable = ['ppdb_id'];

    // /**
    //  * The guarded field which are not mass assignable.
    //  *
    //  * @var array
    //  */
    // protected $guarded = ['id'];

    // /**
    //  * The default values for attributes.
    //  *
    //  * @var array
    //  */
    // protected $attributes = [
    //     'created_by' => 1,
    // ];

}
