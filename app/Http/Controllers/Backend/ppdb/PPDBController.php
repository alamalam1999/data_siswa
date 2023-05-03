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
    public function edit(PPDB $ppdb, PPDBPermissionRequest $request)
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

        $user_account = User::where('id', $ppdb->id_user)->first();
        $payment_formulir = Payment::where([
            ['ppdb_id', '=', $ppdb->id],
            ['payment_type', '=', 'FEE_FORMULIR']
        ])->first();

        $payment_up_spp = Payment::where([ 
            ['ppdb_id', '=', $ppdb->id],
            ['payment_type', '=', 'FEE_TOTAL']
        ])->first();

        $fee_up = Payment::where([ 
            ['ppdb_id', '=', $ppdb->id],
            ['payment_type', '=', 'FEE_UP']
        ])->first();

        $fee_spp = Payment::where([ 
            ['ppdb_id', '=', $ppdb->id],
            ['payment_type', '=', 'FEE_SPP']
        ])->first();
        $school_stage = "";

        if ($ppdb->stage == "TK" || $ppdb->stage == "KB") {
            $school_stage = [
                'Rp.200.000.-',      
            ];
        } else  {
            $school_stage = [
                'Rp.300.000.-',
            ];
        }

        $reregistration = ReRegistration::where('ppdb_id', $ppdb->id)->first();

        $file_additionalsatu = [];
        $file_additionaldua = [];
        $medco_employee_file = [];

        
        $school_recomendation_file = [];
        $interview_result_file = [];
        $kesiapan_file = [];
        $psikotest_file = [];
        $academic_file = [];
        $interview_parent_file = [];
        $interview_student_file = [];
        $observasi_file = [];

        if (!empty($ppdb_interview->school_recomendation_file) && $ppdb_interview->school_recomendation_file != "" && $ppdb_interview->school_recomendation_file != "[]") {
            $school_recomendation_file = json_decode($ppdb_interview->school_recomendation_file);
        }

        if (!empty($ppdb_interview->interview_result_file) && $ppdb_interview->interview_result_file != "" && $ppdb_interview->interview_result_file != "[]") {
            $interview_result_file = json_decode($ppdb_interview->interview_result_file);
        } 

        if (!empty($ppdb_interview->kesiapan_file) && $ppdb_interview->kesiapan_file != "" && $ppdb_interview->kesiapan_file != "[]") {
            $kesiapan_file = json_decode($ppdb_interview->kesiapan_file);
        }

        if (!empty($ppdb_interview->psikotest_file) && $ppdb_interview->psikotest_file != "" && $ppdb_interview->psikotest_file != "[]") {
            $psikotest_file = json_decode($ppdb_interview->psikotest_file);
        }
        
        if (!empty($ppdb_interview->academic_file) && $ppdb_interview->academic_file != "" && $ppdb_interview->academic_file != "[]") {
            $academic_file = json_decode($ppdb_interview->academic_file);
        }
        
        if (!empty($ppdb_interview->interview_parent_file) && $ppdb_interview->interview_parent_file != "" && $ppdb_interview->interview_parent_file != "[]") {
            $interview_parent_file = json_decode($ppdb_interview->interview_parent_file);
        }
        
        if (!empty($ppdb_interview->interview_student_file) && $ppdb_interview->interview_student_file != "" && $ppdb_interview->interview_student_file != "[]") {
            $interview_student_file = json_decode($ppdb_interview->interview_student_file);
        }
        
        if (!empty($ppdb_interview->observasi_file) && $ppdb_interview->observasi_file != "" && $ppdb_interview->observasi_file != "[]") {
            $observasi_file = json_decode($ppdb_interview->observasi_file);
        }

        if (!empty($reregistration->file_additionalsatu) && $reregistration->file_additionalsatu != "" && $reregistration->file_additionalsatu != "[]") {
            $file_additionalsatu = json_decode($reregistration->file_additionalsatu);
        }

        if (!empty($reregistration->medco_employee_file) && $reregistration->medco_employee_file != "" && $reregistration->medco_employee_file != "[]") {
            $medco_employee_file = json_decode($reregistration->medco_employee_file);
        }

        if (!empty($reregistration->file_additionaldua) && $reregistration->file_additionaldua !="" && $reregistration->file_additionaldua != "[]") {
            $file_additionaldua = json_decode($reregistration->file_additionaldua);
        }

        if (!empty($reregistration->file_additionaldua) && $reregistration->file_additionaldua !="" && $reregistration->file_additional != "[]") {
            $file_additionaldua = json_decode($reregistration->file_additionaldua);
        }

        $data56= array_column($file_additionalsatu, 'data56');

        $brand = '';
        if ($data56[0] ?? $data56 == 1) {
            $brand = "Keluarga";
        } else if ($data56[0] ?? $data56 == 2) {
            $brand = "Tetangga";
        } else if ($data56[0] ?? $data56 == 3) {
            $brand = "Teman";
        } else {
            $brand = "Tidak Melalui Brand";
        }

        $data57= array_column($file_additionalsatu, 'data57');

        $kegiatan_sekolah = '';
        if ($data57[0] ?? $data57 == 1) {
            $kegiatan_sekolah = "Open House";
        } else if ($data57[0] ?? $data57 == 2) {
            $kegiatan_sekolah = "Lomba Antar Sekolah";
        } else if ($data57[0] ?? $data57 == 3) {
            $kegiatan_sekolah = "Tidak Melalui Kegiatan Sekolah";
        } else {
            $kegiatan_sekolah = "No Input";
        }

        $data58= array_column($file_additionalsatu, 'data58');

        $media_cetak = '';
        if ($data58[0] ?? $data58 == 1) {
            $media_cetak = "Spanduk";
        } else if ($data58[0] ?? $data58 == 2) {
            $media_cetak = "Brosur";
        } else if ($data58[0] ?? $data58 == 3) {
            $media_cetak = "Koran";
        } else {
            $media_cetak = "Tidak Melalui Media Cetak";
        }

        $data59= array_column($file_additionalsatu, 'data59');

        $media_elektronik = '';
        if ($data59[0] ?? $data59 == 1) {
            $media_elektronik = "Televisi";
        } else if ($data59[0] ?? $data59 == 2) {
            $media_elektronik = "Radio";
        } else if ($data59[0] ?? $data59 == 3) {
            $media_elektronik = "SMS";
        } else {
            $media_elektronik = "Tidak Melalui Media Elektronik";
        }

        $data60= array_column($file_additionalsatu, 'data60');

        $media_sosial = '';
        if ($data60[0] ?? $data60 == 1) {
            $media_sosial = "Instagram";
        } else if ($data60[0] ?? $data60 == 2) {
            $media_sosial = "Facebook";
        } else if ($data60[0] ?? $data60 == 3) {
            $media_sosial = "Twitter";
        } else {
            $media_sosial = "Tidak Melalui Media Sosial";
        }

        $data61= array_column($file_additionalsatu, 'data61');

        $internet = '';
        if ($data61[0] ?? $data61 == 1) {
            $internet = "Website";
        } else if ($data61[0] ?? $data61 == 2) {
            $internet = "Google";
        } else if ($data61[0] ?? $data61 == 3) {
            $internet = "Forum";
        } else {
            $internet = "Tidak Melalui Internet";
        }

        $file_additional_satu = '';
        $file_additional_dua = '';
        $file_additional_tiga = '';
        $file_additional_empat = '';
        $file_additional_lima = '';
        $slip_gaji_parent = '';

        if (!empty($ppdb_testing->file_additional_satu != "[]") 
            || !empty($ppdb_testing->file_additional_dua != "[]")
            || !empty($ppdb_testing->file_additional_tiga != "[]")
            || !empty($ppdb_testing->file_additional_empat != "[]")
            || !empty($ppdb_testing->file_additional_lima != "[]")
            || !empty($ppdb_testing->slip_gaji_parent != "[]")) {
            $file_additional_satu = json_decode($ppdb_testing->file_additional_satu);
            $file_additional_dua   = json_decode($ppdb_testing->file_additional_dua);
            $file_additional_tiga  = json_decode($ppdb_testing->file_additional_tiga);
            $file_additional_empat = json_decode($ppdb_testing->file_additional_empat);
            $file_additional_lima  = json_decode($ppdb_testing->file_additional_lima);
            $slip_gaji_parent      =json_decode($ppdb_testing->slip_gaji_parent);
        }

        return new ViewResponse('backend.ppdb.edit', [
            'ppdb'              => $ppdb,
            'user_account'      => $user_account,
            'schools'           => $schools,
            'enum_datas'        => $enum_datas,
            'discount_groups'   => $discount_groups,
            'file_uploaded'     => $file_uploaded,
            'file_additional'   => $file_additional,
            'payment_formulir'  => $payment_formulir,
            'payment_up_spp'    => $payment_up_spp,
            'school_stage'      => $school_stage,
            'reregistration'    => $reregistration,
            'file_additionalsatu' => $file_additionalsatu,
            'medco_employee_file' => $medco_employee_file,
            'brand'               => $brand,
            'kegiatan_sekolah'    => $kegiatan_sekolah,
            'media_cetak'         => $media_cetak,
            'media_elektronik'    => $media_elektronik,
            'media_sosial'        => $media_sosial,
            'internet'            => $internet,
            'ppdb_interview'      => $ppdb_interview,
            'is_enabled_form'     => $is_enabled_form,
            'is_enabled_rnd'      => $is_enabled_rnd,
            'is_enabled_submit'   => $is_enabled_submit,
            'is_interviewer'      => $is_interviewer,
            'is_rnd'              => $is_rnd,
            'is_rnd_edit'         => $is_rnd_edit,
            'result_interview'    => $result_interview,
            'fee_up'              => $fee_up,
            'fee_spp'             => $fee_spp,
            'file_additionaldua'  => $file_additionaldua,
            'kesiapan_file'             => $kesiapan_file,
            'school_recomendation_file' => $school_recomendation_file,
            'interview_result_file'     => $interview_result_file,
            'psikotest_file'            => $psikotest_file,
            'academic_file'             => $academic_file,
            'interview_parent_file'     => $interview_parent_file,
            'interview_student_file'    => $interview_student_file,
            'observasi_file'            => $observasi_file,
            'file_additional_satu'      => $file_additional_satu,
            'file_additional_dua'       => $file_additional_dua,
            'file_additional_tiga'      => $file_additional_tiga,
            'file_additional_empat'     => $file_additional_empat,
            'file_additional_lima'      => $file_additional_lima,
            'slip_gaji_parent'          => $slip_gaji_parent
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
