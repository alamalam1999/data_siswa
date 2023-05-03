<?php

namespace App\Http\Controllers\Backend\ppdb;

use DB;
use Carbon\Carbon;
use App\Models\PPDB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\FaqsRepository;



class PPDBTableController extends Controller
{
    /**
     * @var \App\Repositories\Backend\FaqsRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\FaqsRepository $faqs
     */
    public function __construct(FaqsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \App\Http\Requests\Backend\Faqs\ManageFaqsRequest $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $ppdb = PPDB::where('id', '>=', 0);

        $ppdb = $ppdb->orderBy('created_at', 'desc')->get();

        $search_general        = $request->get('search_general');
        $academic_year         = $request->get('academic_year');
        $registration_schedule = $request->get('registration_schedule');
        $school                = $request->get('school');
        $stage                 = $request->get('stage');
        $search_status         = $request->get('search_status');
        $diskon                = $request->get('diskon');
        $status_siswa          = $request->get('status_siswa');

        debug($academic_year);
        debug($registration_schedule);
        debug($school);
        debug($stage);

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

        if ($search_status != '' && $search_status != null ) {
            array_push($whereCondition, "document_status = '".$search_status."'");
        }

        if ($diskon != '' && !empty($diskon)) {
            if($diskon == 'all check') {
                array_push($whereCondition, "ppdb.medco_employee != ''");
                array_push($whereCondition, "ppdb.medco_employee_file != ''");
            } else if($diskon == 'Sudah Validasi') {
                array_push($whereCondition, "ppdb.ppdb_discount != ''");
            } else if($diskon == 'Belum Validasi') {
                //array_push($whereCondition, "ppdb.ppdb_discount = ''");
                array_push($whereCondition, "(ppdb.ppdb_discount is null or ppdb.ppdb_discount = '')");
                array_push($whereCondition, "ppdb.medco_employee != ''");   
                array_push($whereCondition, "ppdb.medco_employee_file != ''");   
            }
        }

        if($status_siswa != '' && !empty($status_siswa)) {
            if ($status_siswa == 'siswa dalam') {
                array_push($whereCondition, "ppdb.status_siswa = 'siswa dalam'");
            } else if ($status_siswa == 'siswa luar') {
                array_push($whereCondition, "ppdb.status_siswa = 'siswa luar'");
            }
        }

        $SQLQuery = 'SELECT
            registration_schedules.description AS schedule,
            schools.school_name AS school,
            ppdb.*
        FROM ppdb
        INNER JOIN schools ON ppdb.school_site = schools.school_code
        INNER JOIN registration_schedules ON ppdb.registration_schedule_id = registration_schedules.id
        INNER JOIN academic_years ON registration_schedules.academic_year_id = academic_years.id
        '.implode(' ', $innerCondition).'
        WHERE  
        '.implode(' AND ', $whereCondition).' 
        ORDER BY ppdb.created_at DESC';

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
            ->editColumn('ppdb_status_label', function ($ppdbItem) {
                return ppdb_status_label($ppdbItem->document_status);
            })
            ->editColumn('ppdb_status_css', function ($ppdbItem) {
                return ppdb_status_css($ppdbItem->document_status);
            })
            ->editColumn('created_at', function ($ppdbItem) {
                return Carbon::parse($ppdbItem->created_at)->toDateString();
            })
            // ->addColumn('actions', function ($ppdbItem) {
            //     return $ppdbItem->action_buttons;
            // })
            ->make(true);
    }


}
