<?php

namespace App\Http\Controllers\Backend\Interview;


use App\Models\PPDB;
use App\Models\School;
use App\Models\EnumData;
use App\Models\Auth\User;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\ViewResponse;
use App\Models\RegistrationSchedule;
use Illuminate\Support\Facades\View;
use App\Http\Responses\RedirectResponse;
use App\Repositories\Backend\PPDBRepository;
use App\Http\Requests\Backend\PPDB\PPDBPermissionRequest;
use App\Http\Requests\Backend\Interview\InterviewPermissionRequest;
use App\Models\PPDBInterview;
use DB;

class InterviewController extends Controller
{
    /**
     * @var \App\Repositories\Backend\PPDBRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\PPDBRepository $ppdb
     */
    public function __construct(PPDBRepository $repository)
    {
        $this->repository = $repository;
        View::share('js', ['faqs']);
    }

    /**
     * @param \App\Http\Requests\Backend\PPDB\PPDBPermissionRequest $request
     *
     * @return ViewResponse
     */
    public function index(InterviewPermissionRequest $request)
    {
        if ($request->has('site')) {
            error_log($request->input('site'));
        }

        if ($request->has('stage')) {
            error_log($request->input('stage'));
        }

        $academic_years = AcademicYear::all();
        $registration_schedules = RegistrationSchedule::all();
        $enum_datas = EnumData::where('enum_group', 'SCHOOL_INFO')->orderBy('enum_order')->get();
        $ppdbs = '';

        $schools = schoolAccess();
        $site_access = siteAccess();

        $is_interviewer = false;
        $is_rnd = false;

        if (
            access()->allow('interview-jgk-sd') ||
            access()->allow('interview-jgk-sma') ||
            access()->allow('interview-jgk-smp') ||
            access()->allow('interview-jgk-tk') ||
            access()->allow('interview-cnr-sd') ||
            access()->allow('interview-cnr-sma') ||
            access()->allow('interview-cnr-smp') ||
            access()->allow('interview-pml-kb')
        ){
            $is_interviewer = true;
        }


        if (
            access()->allow('rnd-jgk-sd') ||
            access()->allow('rnd-jgk-sma') ||
            access()->allow('rnd-jgk-smp') ||
            access()->allow('rnd-jgk-tk') ||
            access()->allow('rnd-cnr-sd') ||
            access()->allow('rnd-cnr-sma') ||
            access()->allow('rnd-cnr-smp') ||
            access()->allow('rnd-pml-kb')
        ){
            $is_rnd = true;
        }




        $data = [
            'academic_years' => $academic_years,
            'registration_schedules' => $registration_schedules,
            'ppdbs' => $ppdbs,
            'enum_datas' => $enum_datas,
            'schools' => $schools,
            'site_access' => $site_access,
            'is_interviewer'    => $is_interviewer,
            'is_rnd'    => $is_rnd
        ];

        return new ViewResponse('backend.interview.index', $data);
    }

    /**
     * @param \App\Http\Requests\Backend\PPDB\PPDBPermissionRequest $request
     *
     * @return ViewResponse
     */
    public function create($id)
    {
        $ppdb = PPDB::where('id', $id)->first();
        $ppdb_interview = PPDBInterview::where('ppdb_id', $id)->first();
        $user_ppdb = User::where('id', $ppdb->id_user)->first();

        $is_interviewer = false;
        $is_interviewer_edit = false;
        $is_rnd = false;
        $is_rnd_edit = false;


        $interview_code = 'interview-'.strtolower($ppdb->school_site).'-'.strtolower($ppdb->stage);
        $rnd_code = 'rnd-'.strtolower($ppdb->school_site).'-'.strtolower($ppdb->stage);

        if(access()->allow($interview_code)) {
            $is_interviewer = true;

            if($ppdb_interview->school_recomendation_result < 1) $is_interviewer_edit = true;
        }


        if(access()->allow($rnd_code)) {
            $is_rnd = true;
        }

        if($is_rnd && ($ppdb_interview->school_recomendation_result < 1) ){
            return redirect()->route('admin.interview.index')->withFlashDanger('Anda belum dapat memberikan penilaian untuk calon murid ini');
        }


        $is_enabled_form = $ppdb_interview->school_recomendation_result < 1 && $is_interviewer;
        $is_enabled_rnd = ($ppdb_interview->school_recomendation_result > 0 && $ppdb_interview->interview_result < 1) && $is_rnd;
        $is_enabled_submit = ($ppdb_interview->school_recomendation_result > 0 && $ppdb_interview->interview_result > 0 && $ppdb_interview->is_submited < 1) && $is_interviewer;

        debug($is_enabled_form);




        if(($ppdb->stage)=="SD")
        {
            $result_interview = [
                '',
                '',
                '',
                'Siap sekolah',
                'Belum Siap Sekolah',
                'Ragu (masih perlu dikembangkan)'
            ];

            $result_interview_parent_sd = [
                'Direkomendasikan',
                'Tidak Direkomendasikan',
                'Dipertimbangkan dengan cacatan'
            ];
        }else {
            $result_interview = [
                'Direkomendasikan',
                'Tidak Direkomendasikan',
                'Dipertimbangkan dengan cacatan'
            ];

            $result_interview_parent_sd = [
                'Direkomendasikan',
                'Tidak Direkomendasikan',
                'Dipertimbangkan dengan cacatan'
            ];
        }
        // change result_interview text

        $data = [
            'ppdb'                          => $ppdb,
            'ppdb_interview'                => $ppdb_interview,
            'user_ppdb'                     => $user_ppdb,
            'result_interview'              => $result_interview,
            'result_interview_parent_sd'    => $result_interview_parent_sd,
            'is_interviewer'                => $is_interviewer,
            'is_interviewer_edit'           => $is_interviewer_edit,
            'is_rnd'                        => $is_rnd,
            'is_rnd_edit'                   => $is_rnd_edit,

            'is_enabled_form'               => $is_enabled_form,
            'is_enabled_rnd'                => $is_enabled_rnd,
            'is_enabled_submit'             => $is_enabled_submit
        ];

        // user_ppdb
        return new ViewResponse('backend.interview.create', $data);
    }

    /**
     * @param \App\Http\Requests\Backend\Interview\InterviewPermissionRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(InterviewPermissionRequest $request)
    {
        try
        {
            return $this->repository->updateInterview($request);
        } catch (\Exception $e) {
            return $this->respondInternalError($e->getMessage());
        }
    }

    public function updateRnd(InterviewPermissionRequest $request)
    {
        try
        {
            return $this->repository->updateRnD($request);
        } catch (\Exception $e) {
            return $this->respondInternalError($e->getMessage());
        }
    }

    public function submit(InterviewPermissionRequest $request)
    {
        try
        {
            return $this->repository->submit($request);
        } catch (\Exception $e) {
            return $this->respondInternalError($e->getMessage());
        }
    }


    /**
     * @param \App\Http\Requests\Backend\PPDB\PPDBPermissionRequest $request
     *
     * @return ViewResponse
     */
    public function report()
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


        return $ppdbs;
    }

}
