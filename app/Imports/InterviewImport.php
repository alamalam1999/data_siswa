<?php

namespace App\Imports;

use App\Models\PPDBInterview;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InterviewImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        return new PPDBInterview([
            'id'                                => $row['ID'],
            'ppdb_id'                           => $row['PPDB_ID'],
            'school_recomendation_result'       => $row['SCHOOL_RECOMENDATION_RESULT'],
            'school_recomendation_file'         => $row['SCHOOL_RECOMENDATION_FILE'],
            'school_recomendation_note'         => $row['SCHOOL_RECOMENDATION_NOTE'],
            'is_submited'                       => $row['IS_SUBMITED'],
            'interview_result'                  => $row['INTERVIEW_RESULT'],
            'interview_result_file'             => $row['INTERVIEW_RESULT_FILE'],
            'interview_result_note'             => $row['INTERVIEW_RESULT_NOTE'],
            'kesiapan_file'                     => $row['KESIAPAN_FILE'],
            'kesiapan_result'                   => $row['KESIAPAN_RESULT'],
            'kesiapan_result_note'              => $row['KESIAPAN_RESULT_NOTE'],
            'academic_value'                    => $row['ACADEMIC_VALUE'],
            'academic_file'                     => $row['ACADEMIC_FILE'],
            'academic_result'                   => $row['ACADEMIC_RESULT'],
            'academic_result_note'              => $row['ACADEMIC_RESULT_NOTE'],
            'interview_parent_summary'          => $row['INTERVIEW_PARENT_SUMMARY'],
            'interview_parent_file'             => $row['INTERVIEW_PARENT_FILE'],
            'interview_parent_result_note'      => $row['INTERVIEW_PARENT_RESULT_NOTE'],
            'interview_student_summary'         => $row['INTERVIEW_STUDENT_SUMMARY'],
            'interview_student_result'          => $row['INTERVIEW_STUDENT_RESULT'],
            'observasi_value'                   => $row['OBSERVASI_VALUE'],
            'observasi_summary'                 => $row['OBSERVASI_SUMMARY'],
            'observasi_file'                    => $row['OBSERVASI_FILE'],
            'observasi_result'                  => $row['OBSERVASI_RESULT'],
            'observasi_result_note'             => $row['OBSERVASI_RESULT_NOTE'],
            'created_at'                        => $row['CREATED_AT'],
            'updated_at'                        => $row['UPDATED_AT'],
            'deleted_at'                        => $row['DELETED_AT'] 
        ]);
    }
}