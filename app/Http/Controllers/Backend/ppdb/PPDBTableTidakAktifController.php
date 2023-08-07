<?php

namespace App\Http\Controllers\Backend\ppdb;

use DB;
use Carbon\Carbon;
use App\Models\PPDB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\FaqsRepository;



class PPDBTableTidakAktifController extends Controller
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
    public function __Invoke_tidak_aktif(Request $request)
    {
        $ppdb = PPDB::where('ppdb_id', '>=', 0);

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
            array_push($whereCondition, "ppdb_system.stage = '".$stage."'");
        } else {
            $stages = siteAccess();
            $stageCodes = [];
            foreach ($stages as $item) {
                if ($item->enum_site = $school && $item->enum_code == 'STAGE') {
                    array_push($stageCodes, $item->enum_value);
                }
            }
            array_push($whereCondition, "ppdb_system.stage IN ('".implode("','", $stageCodes)."')");
        }
    
        if (!empty($search_general) && $search_general != '') {
            array_push($whereCondition, "(ppdb_system.document_no LIKE '%".$search_general."%' OR ppdb_system.fullname LIKE '%".$search_general."%')");
        }

        if ($search_status != '' && $search_status != null ) {
            array_push($whereCondition, "document_status = '".$search_status."'");
        }

        if ($diskon != '' && !empty($diskon)) {
            if($diskon == 'all check') {
                array_push($whereCondition, "ppdb_system.medco_employee != ''");
                array_push($whereCondition, "ppdb_system.medco_employee_file != ''");
            } else if($diskon == 'Sudah Validasi') {
                array_push($whereCondition, "ppdb_system.ppdb_discount != ''");
            } else if($diskon == 'Belum Validasi') {
                //array_push($whereCondition, "ppdb_system.ppdb_discount = ''");
                array_push($whereCondition, "(ppdb_system.ppdb_discount is null or ppdb_system.ppdb_discount = '')");
                array_push($whereCondition, "ppdb_system.medco_employee != ''");   
                array_push($whereCondition, "ppdb_system.medco_employee_file != ''");   
            }
        }

        if($status_siswa != '' && !empty($status_siswa)) {
            if ($status_siswa == 'siswa dalam') {
                array_push($whereCondition, "ppdb_system.status_siswa = 'siswa dalam'");
            } else if ($status_siswa == 'siswa luar') {
                array_push($whereCondition, "ppdb_system.status_siswa = 'siswa luar'");
            }
        }

        $SQLQuery = 'SELECT 
            schools.school_name AS school,
            ppdb_system.*,
            data_siswa_system.nisn,
            data_siswa_system_2.sekolah,
            data_siswa_system_2.unit,
            data_siswa_system_2.kelas_utama,
            data_siswa_system_2.sub_kelas,
            data_siswa_system_2.status_siswa,
            data_siswa_system_2.keterangan
        FROM ppdb_system
        INNER JOIN schools ON ppdb_system.school_site = schools.school_code
        INNER JOIN data_siswa_system ON (data_siswa_system.dapodik_id = ppdb_system.dapodik_id or data_siswa_system.ppdb_id = ppdb_system.ppdb_id)
        INNER JOIN data_siswa_system_2 ON (data_siswa_system_2.dapodik_id = ppdb_system.dapodik_id or data_siswa_system_2.ppdb_id = ppdb_system.ppdb_id)
        '.implode(' ', $innerCondition).'
        WHERE
        data_siswa_system_2.status_siswa = "tidak aktif"
        AND      
        '.implode(' AND ', $whereCondition).' 
        ORDER BY ppdb_system.created_at DESC';

        debug($SQLQuery);

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
