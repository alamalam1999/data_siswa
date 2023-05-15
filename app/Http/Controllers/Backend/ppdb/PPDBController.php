<?php

namespace App\Http\Controllers\Backend\ppdb;

use Carbon\Carbon;
use App\Models\PPDB;
use App\Models\School;
use App\Models\Payment;
use App\Models\EnumData;
use App\Models\Auth\User;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Models\PPDBInterview;
use App\Models\ReRegistration;
use Jenssegers\Agent\Facades\Agent;
use App\Http\Controllers\Controller;
use App\Http\Responses\ViewResponse;
use App\Models\RegistrationSchedule;
use Illuminate\Support\Facades\View;
use App\Http\Responses\RedirectResponse;
use App\Repositories\Backend\PPDBRepository;
use App\Http\Requests\Backend\PPDB\PPDBPermissionRequest;
use App\Models\Data_History;
use App\Models\Data_siswa;
use App\Models\MasterKelas;

class PPDBController extends Controller
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

    public function fetchstudents() {

        
            $masterkelas = MasterKelas::all();


            return response()->json([
                'masterkelas'=> $masterkelas
            ]);


            
    }

    /**
     * @param \App\Http\Requests\Backend\Faqs\ManageFaqsRequest $request
     *
     * @return ViewResponse
     */
    public function index(Request $request)
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

        debug($schools);

        $data = [
            'academic_years' => $academic_years,
            'registration_schedules' => $registration_schedules,
            'ppdbs' => $ppdbs,
            'enum_datas' => $enum_datas,
            'schools' => $schools,
            'site_access' => $site_access,
        ];

        return new ViewResponse('backend.ppdb.index', $data);
    }

    /**
     * @param \App\Http\Requests\Backend\PPDB\PPDBPermissionRequest $request
     *
     * @return ViewResponse
     */
    public function create(PPDBPermissionRequest $request)
    {
        return new ViewResponse('backend.ppdb.create');
    }

    /**
     * @param \App\Http\Requests\Backend\PPDB\PPDBPermissionRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(PPDBPermissionRequest $request)
    {
        $this->repository->create($request->except('_token'));

        return new RedirectResponse(route('admin.ppdb.index'), ['flash_success' => __('alerts.backend.ppdb.created')]);
    }

    /**
     * @param \App\Models\Faq $faq
     * @param \App\Http\Requests\Backend\PPDB\PPDBPermissionRequest $request
     *
     * @return ViewResponse
     */
    public function edit(Data_siswa $ppdb, PPDBPermissionRequest $request)
    {
        // debug($ppdb);
        $schools = School::All();
        $enum_datas = EnumData::where('enum_group', 'SCHOOL_INFO')->orderBy('enum_order')->get();
        $discount_groups = EnumData::where('enum_group', 'DISCOUNT_GROUP')->orderBy('enum_order')->get();
        $ppdb_interview = PPDBInterview::where('ppdb_id', $ppdb->id)->first();
        $user_ppdb = User::where('id', $ppdb->id_user)->first();

        //$ppdb_testing = PPDB::where('id_user', $user_ppdb->id)->first();
        $ppdb_testing = $ppdb;


        $is_interviewer = false;
        $is_interviewer_edit = false;
        $is_rnd = false;
        $is_rnd_edit = false;

        $interview_code = 'interview-'.strtolower($ppdb->school_site).'-'.strtolower($ppdb->stage);
        $rnd_code = 'rnd-'.strtolower($ppdb->school_site).'-'.strtolower($ppdb->stage);

        if(access()->allow($interview_code)) {
            $is_interviewer = true;

            if(!empty($ppdb_interview->school_recomendation_result) < 1) $is_interviewer_edit = true;
        }

        if(access()->allow($rnd_code)) {
            $is_rnd = true;
        }

        // if($is_rnd && (!empty($ppdb_interview->school_recomendation_result) < 1) ){
        //     return redirect()->route('admin.interview.index')->withFlashDanger('Anda belum dapat memberikan penilaian untuk calon murid ini');
        // }

        $is_enabled_form = ($ppdb_interview->school_recomendation_result ?? '0') < 1 && $is_interviewer;
        $is_enabled_rnd = (($ppdb_interview->school_recomendation_result ?? '1') > 0 && ($ppdb_interview->interview_result ?? '0') < 1) && $is_rnd;
        $is_enabled_submit = (($ppdb_interview->school_recomendation_result ?? '1') > 0 && ($ppdb_interview->interview_result ?? '1') > 0 && ($ppdb_interview->is_submited ?? '0') < 1) && $is_interviewer;

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

        $file_uploaded = [
            ['name' => 'family_card', 'label' => 'Kartu Keluarga'],
            ['name' => 'birth_certificate', 'label' => 'Akte Kelahiran'],
            ['name' => 'last_report', 'label' => 'Raport Terakhir'],
            ['name' => 'academic_certificate', 'label' => 'Sertifikat Akademik'],
            ['name' => 'kia_book', 'label' => 'Buku KIA'],
        ];

        $file_additional = [];

        if(!empty($ppdb->file_additional) && $ppdb->file_additional != "" && $ppdb->file_additional != "[]"){
            $file_additional = json_decode($ppdb->file_additional);
        }

        return new ViewResponse('backend.ppdb.edit', [
            'ppdb'              => $ppdb,
   
        ]);
    }

    /**
     * @param \App\Models\PPDB $ppdb
     * @param \App\Http\Requests\Backend\PPDB\PPDBPermissionRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(PPDB $ppdb, PPDBPermissionRequest $request)
    {
        $this->repository->update($ppdb, $request->except(['_token', '_method']));

        return new RedirectResponse(route('admin.ppdb.index'), ['flash_success' => __('alerts.backend.ppdb.updated')]);
    }


    /**
     * @param \App\Models\PPDB $ppdb
     * @param \App\Http\Requests\Backend\PPDB\PPDBPermissionRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function updateDiscountCode(PPDB $ppdb, PPDBPermissionRequest $request)
    {
        
        try {
            
            $ppdb = PPDB::where('id', $request->id)->first();
            $ppdb->updated_by = auth()->user()->id;
            $ppdb->updated_at = Carbon::now()->timestamp;
            $ppdb->ppdb_discount = $request->discount_code ?? "";
            $ppdb->status_siswa = $request->status_siswa ?? "";
            $ppdb->save();

            debug($ppdb);
             return new RedirectResponse(route('admin.ppdb.index'), ['flash_success' => $ppdb->document_no." Berhasil disimpan"]);

        } catch (\Exception $e) {
            return $this->respondInternalError($e->getMessage());
        }
    }

     /**
     * @param \App\Models\Data_Siswa $data_siswa
     * @param \App\Http\Requests\Backend\PPDB\PPDBPermissionRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function addInformation(Data_Siswa $data_siswa, PPDBPermissionRequest $request)
    {
        // try {
        //     $data_siswa = new Data_History;

        //     $data_siswa->id_data_siswa = $ppdb->id;
        //     $data_siswa->kelas_utama = $request->
        // }

        return $data_siswa->id;
    }

    /**
     * @param \App\Models\PPDB $ppdb
     * @param \App\Http\Requests\Backend\PPDB\PPDBPermissionRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(PPDB $ppdb, PPDBPermissionRequest $request)
    {
        $this->repository->delete($ppdb);

        return new RedirectResponse(route('admin.ppdb.index'), ['flash_success' => __('alerts.backend.ppdb.deleted')]);
    }
}
