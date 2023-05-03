<?php

namespace App\Http\Controllers\Frontend\User;

use DB;
use Carbon\Carbon;
use Jenssegers\Agent\Facades\Agent;
use App\Http\Controllers\Controller;
use App\Models\RegistrationSchedule;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // $ppdbs = PPDB::where('id_user', auth()->id())->orderBy('updated_at')->get();
        // DISABLED
        // NEW
        // WAITING
        // COMPLETED

        $SQLQuery = "SELECT
            registration_schedules.description AS schedule_name,
            schools.school_name AS school,
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
            END AS REGISTRATION_STATE,
            CASE WHEN ISNULL(payment_formulir.confirmation_status) THEN -1 ELSE payment_formulir.confirmation_status END AS FEE_FORMULIR_CONFIRMATION,
            CASE WHEN ISNULL(payment_administration.confirmation_status) THEN -1 ELSE payment_administration.confirmation_status END AS FEE_ADMINISTRATION_CONFIRMATION,
            ppdb_interviews.interview_result,
            ppdb.*
        FROM ppdb
            INNER JOIN registration_schedules ON ppdb.registration_schedule_id = registration_schedules.id
            INNER JOIN schools ON ppdb.school_site = schools.school_code
            LEFT JOIN ppdb_interviews ON ppdb.id = ppdb_interviews.ppdb_id
            LEFT JOIN payment AS payment_formulir ON ppdb.id = payment_formulir.ppdb_id AND payment_formulir.payment_type = 'FEE_FORMULIR'
            LEFT JOIN payment AS payment_administration ON ppdb.id = payment_administration.ppdb_id AND payment_administration.payment_type = 'FEE_TOTAL'
        WHERE ppdb.id_user = '".auth()->id()."' ORDER BY ppdb.updated_at DESC";

        $ppdbs = DB::select($SQLQuery);

        $carbon = Carbon::now();
        $registration_schedules = RegistrationSchedule::whereDate('date_to', '>=', $carbon)
            ->get();

        $registration_schedule = RegistrationSchedule::whereDate('date_from', '<=', $carbon)
            ->whereDate('date_to', '>=', $carbon)
            ->first();

            if(Agent::isMobile()) {
                return view('frontend.user.dashboardphone', compact('ppdbs', 'registration_schedules', 'registration_schedule'));
            }else {
                return view('frontend.user.dashboard', compact('ppdbs', 'registration_schedules', 'registration_schedule'));
            }
    }
}
