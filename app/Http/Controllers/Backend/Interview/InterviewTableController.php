<?php

namespace App\Http\Controllers\Backend\Interview;

use DB;
use Carbon\Carbon;
use App\Models\PPDB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\PPDBRepository;



class InterviewTableController extends Controller
{
    /**
     * @var \App\Repositories\Backend\PPDBRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\PPDBRepository $ppdbs
     */
    public function __construct(PPDBRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \App\Http\Requests\Backend\PPDB\PPDBPermissionRequest $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $ppdb = PPDB::where('id', '>=', 0);

        $ppdb = $ppdb->orderBy('created_at', 'desc')->get();

        $search_general = $request->get('search_general');
        $searchreview = $request->get('search_status');
        $academic_year = $request->get('academic_year');
        $registration_schedule = $request->get('registration_schedule');
        $school = $request->get('school');
        $stage = $request->get('stage');

        debug($academic_year);
        debug($registration_schedule);
        debug($school);
        debug($stage);
        debug($searchreview);

        $innerCondition = [];
        $whereCondition = [];

        // BUILD CRITERIA
        array_push($whereCondition, 'academic_years.id = '.$academic_year);

        if ($registration_schedule != 'ALL') {
            array_push($whereCondition, 'registration_schedules.id = '.$registration_schedule);
        }

        if ($school != 'ALL') {
            array_push($whereCondition, "schools.school_code = '".$school."'");
        } else {
            $schools = schoolAccess();
            $schoolCodes = [];
            foreach ($schools as $item) {
                array_push($schoolCodes, $item->school_code);
            }
            array_push($whereCondition, "schools.school_code IN ('".implode("','", $schoolCodes)."')");
        }

        if ($stage != 'ALL') {
            array_push($whereCondition, "ppdb.stage = '".$stage."'");
        } else {
            $stages = siteAccess();
            $stageCodes = [];
            foreach ($stages as $item) {
                if ($item->enum_site = $school && $item->enum_code == 'STAGE') {
                    array_push($stageCodes, $item->enum_value);
                }
            }
            array_push($whereCondition, "ppdb.stage IN ('".implode("','", $stageCodes)."')");
        }
     
        if (!empty($search_general) && $search_general != '') {
            array_push($whereCondition, "(ppdb.document_no LIKE '%".$search_general."%' OR ppdb.fullname LIKE '%".$search_general."%')");
        }

      
            
        if (!empty($searchreview) && $searchreview != '' && $searchreview != 2 && $searchreview != 4) {
            $search_status = 0;
            $is_submited = 0;
            if ($searchreview == 1) {
                $search_status = 1;
                $is_submited = 1;
            }    
            if ($searchreview == 3) {
                $search_status = 2;
                $is_submited = 1;
            }
            array_push($whereCondition, "interview_result = ".$search_status." AND is_submited = ".$is_submited."");    
        }
        
        if($searchreview == 2) {
            array_push($whereCondition, "interview_result in ('2','1') AND is_submited = 0 ");
        }
        if ($searchreview == 4) {
            $search_status = 3;
            array_push($whereCondition, "interview_result = ".$search_status."");
        }
        if ($searchreview == 5) {
            $search_status = 1;
            array_push($whereCondition, "school_recomendation_result = ".$search_status."");
        }
        if ($searchreview == 6) {
            $search_status = 0;
            array_push($whereCondition, "school_recomendation_result = ".$search_status."");
        }     

        $SQLQuery = 'SELECT
            registration_schedules.description AS schedule,
            schools.school_name AS school,
            ppdb_interviews.school_recomendation_result,
            ppdb_interviews.interview_result,
            ppdb_interviews.is_submited,
            ppdb_interviews.deleted_at,
            ppdb.*
        FROM ppdb_interviews
        INNER JOIN ppdb ON ppdb_interviews.ppdb_id = ppdb.id
        INNER JOIN schools ON ppdb.school_site = schools.school_code
        INNER JOIN registration_schedules ON ppdb.registration_schedule_id = registration_schedules.id
        INNER JOIN academic_years ON registration_schedules.academic_year_id = academic_years.id
        '.implode(' ', $innerCondition).'
        WHERE         
        '.implode(' AND ', $whereCondition).' 
        ORDER BY ppdb_interviews.created_at DESC';

        debug($SQLQuery);

        // $SQLQuery = "SELECT
        //     registration_schedules.description AS schedule_name,
        //     schools.school_name AS school,
        //     ppdb.*
        // FROM ppdb
        // INNER JOIN registration_schedules ON ppdb.registration_schedule_id = registration_schedules.id
        // INNER JOIN schools ON ppdb.school_site = schools.school_code";

        $ppdbs = DB::select($SQLQuery);

        return Datatables::of($ppdbs)
            // ->editColumn('schedule', function ($ppdbItem) {
            //     return $ppdbItem->schedule->description;
            // })
            // ->editColumn('school', function ($ppdbItem) {
            //     return $ppdbItem->school->school_name;
            // })
            ->editColumn('created_at', function ($ppdbItem) {
                return Carbon::parse($ppdbItem->created_at)->toDateString();
            })
            // ->addColumn('actions', function ($ppdbItem) {
            //     return $ppdbItem->action_buttons;
            // })
            ->make(true);
    }


}
