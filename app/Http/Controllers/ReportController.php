<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use DB;
use File;

class ReportController extends Controller
{
    public function ppdb()
    {        
        $SQLQuery = "
        SELECT
            registration_schedules.description AS schedule,
            schools.school_name AS school,
            ppdb.document_no,
            ppdb.document_status,
            ppdb.stage,
            ppdb.classes,
            ppdb.student_status,
            ppdb.fullname,
            ppdb.gender,
            ppdb.place_of_birth,
            ppdb.date_of_birth,
            ppdb.religion,
            ppdb.nationality,
            ppdb.medco_employee,
            ppdb.created_at,
            CASE
                WHEN ppdb.document_status = 0 THEN 'NEW'
                WHEN ppdb.document_status = 1 THEN 'WAITING'
                WHEN ppdb.document_status > 1 THEN 'COMPLETED'
                ELSE 'DISABLED'
            END AS FEE_FORMULIR_STATE,
            CASE
                WHEN ppdb.document_status = 2 THEN 
                    CASE  
                        WHEN ppdb_interviews.interview_result = 2 AND ppdb_interviews.is_submited = 1 THEN 'REJECT' 
                        ELSE 'WAITING' END
                WHEN ppdb.document_status > 2 THEN 'COMPLETED'
                ELSE 'DISABLED'
            END AS INTERVIEW_STATE,
            CASE
                WHEN ppdb.document_status = 3 THEN 'NEW'
                WHEN ppdb.document_status = 4 THEN 'WAITING'
                WHEN ppdb.document_status > 4 THEN 'COMPLETED'
                ELSE 'DISABLED'
            END AS FEE_TOTAL_STATE,
            CASE
                WHEN ppdb.document_status = 5 THEN 'NEW'
                WHEN ppdb.document_status = 6 THEN 'WAITING'
                WHEN ppdb.document_status > 7 THEN 'COMPLETED'
                ELSE 'DISABLED'
            END AS REGISTRATION_STATE
        FROM ppdb
            INNER JOIN schools ON ppdb.school_site = schools.school_code
            INNER JOIN registration_schedules ON ppdb.registration_schedule_id = registration_schedules.id
            INNER JOIN academic_years ON registration_schedules.academic_year_id = academic_years.id
            LEFT JOIN ppdb_interviews ON ppdb.id = ppdb_interviews.ppdb_id
        ORDER BY ppdb.created_at DESC;
        ";

        $ppdbs = DB::select($SQLQuery);

        // Storage::disk('public')->put('report-ppdb.json', json_encode($ppdbs));
        File::put(public_path('json').'\report-ppdb.json', json_encode($ppdbs));

        return 'SUCCESS';
    }
}
