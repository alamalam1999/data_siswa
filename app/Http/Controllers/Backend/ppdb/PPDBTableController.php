<?php

namespace App\Http\Controllers\Backend\ppdb;

use DB;
use Carbon\Carbon;
use App\Models\PPDB;
use App\Models\Dapodik;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RegistrationSchedule;
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

        $academic_years = AcademicYear::all();
        $registration_schedules = RegistrationSchedule::all();

        // BUILD CRITERIA
        if ($academic_year != 'ALL') {
            array_push($whereCondition, 'academic_years.id = ' . $academic_year);
        } else {
            $academicYear = [];
            foreach ($academic_years as $item) {
                array_push($academicYear, $item->id);
            }
            array_push($whereCondition, "academic_years.id IN ('" . implode("','", $academicYear) . "')");
        }

        if ($registration_schedule != 'ALL') {
            array_push($whereCondition, 'registration_schedules.id = ' . $registration_schedule);
        } else {
            $registrationSchedule = [];
            foreach ($registration_schedules as $item) {
                array_push($registrationSchedule, $item->id);
            }
            array_push($whereCondition, "registration_schedules.id IN ('" . implode("','", $registrationSchedule) . "')");
        }

        if ($school != 'ALL') {
            array_push($whereCondition, "schools.school_code = '" . $school . "'");
        } else {
            $schools = schoolAccess();
            $schoolCodes = [];
            foreach ($schools as $item) {
                array_push($schoolCodes, $item->school_code);
            }
            array_push($whereCondition, "schools.school_code IN ('" . implode("','", $schoolCodes) . "')");
        }

        if ($stage != 'ALL') {
            array_push($whereCondition, "ppdb.stage = '" . $stage . "'");
        } else {
            $stages = siteAccess();
            $stageCodes = [];
            foreach ($stages as $item) {
                if ($item->enum_site = $school && $item->enum_code == 'STAGE') {
                    array_push($stageCodes, $item->enum_value);
                }
            }
            array_push($whereCondition, "ppdb.stage IN ('" . implode("','", $stageCodes) . "')");
        }

        if (!empty($search_general) && $search_general != '') {
            array_push($whereCondition, "(ppdb.document_no LIKE '%" . $search_general . "%' OR ppdb.fullname LIKE '%" . $search_general . "%')");
        }

        if ($search_status != '' && $search_status != null) {
            array_push($whereCondition, "document_status = '" . $search_status . "'");
        }

        if ($diskon != '' && !empty($diskon)) {
            if ($diskon == 'all check') {
                array_push($whereCondition, "ppdb.medco_employee != ''");
                array_push($whereCondition, "ppdb.medco_employee_file != ''");
            } else if ($diskon == 'Sudah Validasi') {
                array_push($whereCondition, "ppdb.ppdb_discount != ''");
            } else if ($diskon == 'Belum Validasi') {
                //array_push($whereCondition, "ppdb.ppdb_discount = ''");
                array_push($whereCondition, "(ppdb.ppdb_discount is null or ppdb.ppdb_discount = '')");
                array_push($whereCondition, "ppdb.medco_employee != ''");
                array_push($whereCondition, "ppdb.medco_employee_file != ''");
            }
        }

        if ($status_siswa != '' && !empty($status_siswa)) {
            if ($status_siswa == 'siswa dalam') {
                array_push($whereCondition, "ppdb.status_siswa = 'siswa dalam'");
            } else if ($status_siswa == 'siswa luar') {
                array_push($whereCondition, "ppdb.status_siswa = 'siswa luar'");
            }
        }

        $SQLQuery = 'SELECT
            registration_schedules.description AS schedule,
            schools.school_name AS school,
            ppdb.*,
            data_siswa.nisn,
            data_siswa_2.sekolah,
            data_siswa_2.unit,
            data_siswa_2.kelas_utama,
            data_siswa_2.sub_kelas,
            data_siswa_2.status_siswa,
            data_siswa_2.keterangan
        FROM ppdb
        INNER JOIN schools ON ppdb.school_site = schools.school_code
        INNER JOIN registration_schedules ON ppdb.registration_schedule_id = registration_schedules.id
        INNER JOIN academic_years ON registration_schedules.academic_year_id = academic_years.id
        INNER JOIN data_siswa ON data_siswa.ppdb_id = ppdb.ppdb_id
        INNER JOIN data_siswa_2 ON data_siswa_2.ppdb_id = ppdb.ppdb_id
        ' . implode(' ', $innerCondition) . '
        WHERE
        ppdb.document_status = 7
        AND
        data_siswa_2.status_siswa is null
        AND      
        ' . implode(' AND ', $whereCondition) . ' 
        ORDER BY ppdb.created_at DESC';

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


    public function __Invoke_dapodik(Request $request)
    {
        $dapodik = Dapodik::where('dapodik_id', '>=', 0);
        $dapodik = $dapodik->orderBy('created_at', 'desc')->get();
        $search_general        = $request->get('search_general');
        $registration_schedule = $request->get('registration_schedule');
        $school                = $request->get('school');
        $stage                 = $request->get('stage');
        $search_status         = $request->get('search_status');
        $diskon                = $request->get('diskon');
        $status_siswa          = $request->get('status_siswa');

        $innerCondition = [];
        $whereCondition = [];

        // BUILD CRITERIA
        if ($registration_schedule != 'ALL') {
            array_push($whereCondition, 'registration_schedules.id = ' . $registration_schedule);
        }

        if ($school != 'ALL') {
            array_push($whereCondition, "schools.school_code = '" . $school . "'");
        } else {
            $schools = schoolAccess();
            $schoolCodes = [];
            foreach ($schools as $item) {
                array_push($schoolCodes, $item->school_code);
            }
            array_push($whereCondition, "schools.school_code IN ('" . implode("','", $schoolCodes) . "')");
        }

        if ($stage != 'ALL') {
            array_push($whereCondition, "dapodik.stage = '" . $stage . "'");
        } else {
            $stages = siteAccess();
            $stageCodes = [];
            foreach ($stages as $item) {
                if ($item->enum_site = $school && $item->enum_code == 'STAGE') {
                    array_push($stageCodes, $item->enum_value);
                }
            }
            array_push($whereCondition, "dapodik.stage IN ('" . implode("','", $stageCodes) . "')");
        }

        if (!empty($search_general) && $search_general != '') {
            array_push($whereCondition, "(dapodik.document_no LIKE '%" . $search_general . "%' OR dapodik.fullname LIKE '%" . $search_general . "%')");
        }

        if ($search_status != '' && $search_status != null) {
            array_push($whereCondition, "document_status = '" . $search_status . "'");
        }

        if ($diskon != '' && !empty($diskon)) {
            if ($diskon == 'all check') {
                array_push($whereCondition, "dapodik.medco_employee != ''");
                array_push($whereCondition, "dapodik.medco_employee_file != ''");
            } else if ($diskon == 'Sudah Validasi') {
                array_push($whereCondition, "dapodik.ppdb_discount != ''");
            } else if ($diskon == 'Belum Validasi') {
                //array_push($whereCondition, "dapodik.ppdb_discount = ''");
                array_push($whereCondition, "(dapodik.ppdb_discount is null or dapodik.ppdb_discount = '')");
                array_push($whereCondition, "dapodik.medco_employee != ''");
                array_push($whereCondition, "dapodik.medco_employee_file != ''");
            }
        }

        if ($status_siswa != '' && !empty($status_siswa)) {
            if ($status_siswa == 'siswa dalam') {
                array_push($whereCondition, "dapodik.status_siswa = 'siswa dalam'");
            } else if ($status_siswa == 'siswa luar') {
                array_push($whereCondition, "dapodik.status_siswa = 'siswa luar'");
            }
        }

        $SQLQuery = 'SELECT
            dapodik.*,
            data_siswa.nisn,
            data_siswa_2.sekolah,
            data_siswa_2.unit,
            data_siswa_2.kelas_utama,
            data_siswa_2.sub_kelas,
            data_siswa_2.status_siswa,
            data_siswa_2.keterangan
        FROM dapodik
        INNER JOIN schools ON dapodik.school_site = schools.school_code
        INNER JOIN data_siswa ON data_siswa.dapodik_id = dapodik.id
        INNER JOIN data_siswa_2 ON data_siswa_2.dapodik_id = dapodik.id
        ' . implode(' ', $innerCondition) . '
        WHERE
        data_siswa_2.status_siswa is null
        AND      
        ' . implode(' AND ', $whereCondition) . ' 
        ORDER BY dapodik.created_at DESC';

        $dapodiks = DB::select($SQLQuery);

        return Datatables::of($dapodiks)
            ->editColumn('ppdb_status_label', function ($dapodikItem) {
                return ppdb_status_label($dapodikItem->document_status);
            })
            ->editColumn('ppdb_status_css', function ($dapodikItem) {
                return ppdb_status_css($dapodikItem->document_status);
            })
            ->editColumn('created_at', function ($dapodikItem) {
                return Carbon::parse($dapodikItem->created_at)->toDateString();
            })
            ->make(true);
    }
}
