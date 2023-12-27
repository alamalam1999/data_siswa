<?php

namespace App\Http\Controllers\Backend\ppdb;

use Throwable;
use Carbon\Carbon;
use App\Models\PPDB;
use App\Models\Users;
use App\Models\School;
use App\Models\Dapodik;
use App\Models\Payment;
use App\Models\EnumData;
use App\Models\Register;
use App\Models\Auth\User;
use App\Models\Dapodik_id;
use App\Models\Data_kelas;
use App\Models\Data_siswa;
use App\Models\Foto_siswa;
use App\Models\PPDB_check;
use App\Models\Data_siswa1;
use App\Models\Data_siswa2;
use App\Models\Data_siswa3;
use App\Models\Data_siswa4;
use App\Models\MasterKelas;
use App\Models\PPDB_system;
use App\Models\PPDBDapodik;
use App\Models\AcademicYear;
use App\Models\Users_system;
use Illuminate\Http\Request;
use App\Models\PPDBInterview;
use App\Models\Payment_system;
use App\Models\ReRegistration;
use App\Models\datasiswa_system;
use App\Models\Data_siswa_system;
use Illuminate\Support\Facades\DB;
use App\Models\Data_siswa_system_1;
use App\Models\Data_siswa_system_2;
use App\Models\Data_siswa_system_3;
use App\Models\Data_siswa_system_4;
use App\Models\Reregistrasi_system;
use Jenssegers\Agent\Facades\Agent;
use App\Http\Controllers\Controller;
use App\Http\Responses\ViewResponse;
use App\Models\RegistrationSchedule;
use Illuminate\Support\Facades\View;
use App\Models\Ppdb_interviews_system;
use App\Http\Responses\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Mime\Part\DataPart;
use App\Repositories\Backend\PPDBRepository;
use App\Http\Controllers\Backend\ppdb\addClass;
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

    public function fetchstudents()
    {

        $masterkelas = MasterKelas::all();
        return response()->json([
            'masterkelas' => $masterkelas
        ]);
    }

    public function fetchdatakelas()
    {

        $data_kelas = Data_kelas::all();
        return response()->json([
            'data_kelas' => $data_kelas
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
     * @param \App\Http\Requests\Backend\Faqs\ManageFaqsRequest $request
     *
     * @return ViewResponse
     */
    public function dapodik(Request $request)
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

        $schools = schoolAccess();
        $site_access = siteAccess();
        // debug($schools);
        $data = [
            'academic_years' => $academic_years,
            'registration_schedules' => $registration_schedules,
            'enum_datas' => $enum_datas,
            'schools' => $schools,
            'site_access' => $site_access,
        ];

        return new ViewResponse('backend.ppdb.dapodik', $data);
    }

    /**
     * @param \App\Http\Requests\Backend\Faqs\ManageFaqsRequest $request
     *
     * @return ViewResponse
     */
    public function data_siswa(Request $request)
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

        return new ViewResponse('backend.ppdb.aktif', $data);
    }

    public function data_siswa_alazhar(Request $request)
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

        return new ViewResponse('backend.ppdb.aktif_alazhar', $data);
    }

    /**
     * @param \App\Http\Requests\Backend\Faqs\ManageFaqsRequest $request
     *
     * @return ViewResponse
     */
    public function siswa_tidak_aktif(Request $request)
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

        return new ViewResponse('backend.ppdb.tidak_aktif', $data);
    }

    public function siswa_alumni(Request $request)
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

        return new ViewResponse('backend.ppdb.alumni', $data);
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
     * @param \App\Http\Requests\Backend\Faqs\ManageFaqsRequest $request
     *
     * @return ViewResponse
     */
    public function upload_fhoto(Request $request)
    {
        $image = base64_encode(file_get_contents($request->file('fhoto_siswa')));
        $foto_siswa = new Foto_siswa();
        $foto_siswa->fhoto_siswa = $image;
        $foto_siswa->ppdb_id = ($request->id_ppdb) ? $request->id_ppdb : '';
        $foto_siswa->dapodik_id = ($request->dapodik_id) ? $request->dapodik_id : '';
        $foto_siswa->updated_by = auth()->user()->id;
        $foto_siswa->save();
        return redirect()->back()->with(['flash_success' => 'Sudah Berhasil di Upload']);
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
        $user_ppdb = Users_system::where('user_id', $ppdb->id_user)->first();

        $ppdb_testing = PPDB::where('id_user', $user_ppdb->id)->first();
        $ppdb_testing = $ppdb;

        $data_siswa = Data_siswa::where('ppdb_id', $ppdb->id)->first();


        $is_interviewer = false;
        $is_interviewer_edit = false;
        $is_rnd = false;
        $is_rnd_edit = false;

        $interview_code = 'interview-' . strtolower($ppdb->school_site) . '-' . strtolower($ppdb->stage);
        $rnd_code = 'rnd-' . strtolower($ppdb->school_site) . '-' . strtolower($ppdb->stage);

        if (access()->allow($interview_code)) {
            $is_interviewer = true;

            if (!empty($ppdb_interview->school_recomendation_result) < 1) $is_interviewer_edit = true;
        }

        if (access()->allow($rnd_code)) {
            $is_rnd = true;
        }

        $is_enabled_form = ($ppdb_interview->school_recomendation_result ?? '0') < 1 && $is_interviewer;
        $is_enabled_rnd = (($ppdb_interview->school_recomendation_result ?? '1') > 0 && ($ppdb_interview->interview_result ?? '0') < 1) && $is_rnd;
        $is_enabled_submit = (($ppdb_interview->school_recomendation_result ?? '1') > 0 && ($ppdb_interview->interview_result ?? '1') > 0 && ($ppdb_interview->is_submited ?? '0') < 1) && $is_interviewer;

        debug($is_enabled_form);

        if (($ppdb->stage) == "SD") {
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
        } else {
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

        if (!empty($ppdb->file_additional) && $ppdb->file_additional != "" && $ppdb->file_additional != "[]") {
            $file_additional = json_decode($ppdb->file_additional);
        }

        $user_account = Users_system::where('id', $ppdb->id_user)->first();
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
        } else {
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

        if (!empty($reregistration->file_additionaldua) && $reregistration->file_additionaldua != "" && $reregistration->file_additionaldua != "[]") {
            $file_additionaldua = json_decode($reregistration->file_additionaldua);
        }

        if (!empty($reregistration->file_additionaldua) && $reregistration->file_additionaldua != "" && $reregistration->file_additional != "[]") {
            $file_additionaldua = json_decode($reregistration->file_additionaldua);
        }

        $data56 = array_column($file_additionalsatu, 'data56');

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

        $data57 = array_column($file_additionalsatu, 'data57');

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

        $data58 = array_column($file_additionalsatu, 'data58');

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

        $data59 = array_column($file_additionalsatu, 'data59');

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

        $data60 = array_column($file_additionalsatu, 'data60');

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

        $data61 = array_column($file_additionalsatu, 'data61');

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

        if (
            !empty($ppdb_testing->file_additional_satu != "[]")
            || !empty($ppdb_testing->file_additional_dua != "[]")
            || !empty($ppdb_testing->file_additional_tiga != "[]")
            || !empty($ppdb_testing->file_additional_empat != "[]")
            || !empty($ppdb_testing->file_additional_lima != "[]")
            || !empty($ppdb_testing->slip_gaji_parent != "[]")
        ) {
            $file_additional_satu = json_decode($ppdb_testing->file_additional_satu);
            $file_additional_dua   = json_decode($ppdb_testing->file_additional_dua);
            $file_additional_tiga  = json_decode($ppdb_testing->file_additional_tiga);
            $file_additional_empat = json_decode($ppdb_testing->file_additional_empat);
            $file_additional_lima  = json_decode($ppdb_testing->file_additional_lima);
            $slip_gaji_parent      = json_decode($ppdb_testing->slip_gaji_parent);
        }

        $data_kelas  = Data_kelas::where([
            ['ppdb_id', $ppdb->ppdb_id],
            ['show_table', 1]
        ])->first();

        $ppdb_system = PPDB_system::where('ppdb_id', $ppdb->ppdb_id)->first();

        $data_siswa_system = Data_siswa_system::where('ppdb_id', $ppdb->ppdb_id)->first();

        $foto_siswa = Foto_siswa::where('ppdb_id', $ppdb->ppdb_id)->first();

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
            'slip_gaji_parent'          => $slip_gaji_parent,
            'data_siswa'                => $data_siswa,
            'data_kelas'                => $data_kelas,
            'ppdb_system'               => $ppdb_system,
            'data_siswa_system'         => $data_siswa_system,
            'foto_siswa'                => $foto_siswa
        ]);
    }

    public function editppdb(PPDB_check $ppdb, PPDBPermissionRequest $request)
    {
        // debug($ppdb);
        $schools = School::All();
        $enum_datas = EnumData::where('enum_group', 'SCHOOL_INFO')->orderBy('enum_order')->get();
        $discount_groups = EnumData::where('enum_group', 'DISCOUNT_GROUP')->orderBy('enum_order')->get();
        $ppdb_interview = PPDBInterview::where('ppdb_id', $ppdb->ppdb_id)->first();
        $user_ppdb = Users_system::where('user_id', $ppdb->id_user)->first();

        $ppdb_testing = PPDB::where('id_user', $user_ppdb->user_id)->first();
        $ppdb_testing = $ppdb;

        $data_siswa = Data_siswa::where('ppdb_id', $ppdb->ppdb_id)->first();


        $is_interviewer = false;
        $is_interviewer_edit = false;
        $is_rnd = false;
        $is_rnd_edit = false;

        $interview_code = 'interview-' . strtolower($ppdb->school_site) . '-' . strtolower($ppdb->stage);
        $rnd_code = 'rnd-' . strtolower($ppdb->school_site) . '-' . strtolower($ppdb->stage);

        if (access()->allow($interview_code)) {
            $is_interviewer = true;

            if (!empty($ppdb_interview->school_recomendation_result) < 1) $is_interviewer_edit = true;
        }

        if (access()->allow($rnd_code)) {
            $is_rnd = true;
        }

        $is_enabled_form = ($ppdb_interview->school_recomendation_result ?? '0') < 1 && $is_interviewer;
        $is_enabled_rnd = (($ppdb_interview->school_recomendation_result ?? '1') > 0 && ($ppdb_interview->interview_result ?? '0') < 1) && $is_rnd;
        $is_enabled_submit = (($ppdb_interview->school_recomendation_result ?? '1') > 0 && ($ppdb_interview->interview_result ?? '1') > 0 && ($ppdb_interview->is_submited ?? '0') < 1) && $is_interviewer;

        debug($is_enabled_form);

        if (($ppdb->stage) == "SD") {
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
        } else {
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

        if (!empty($ppdb->file_additional) && $ppdb->file_additional != "" && $ppdb->file_additional != "[]") {
            $file_additional = json_decode($ppdb->file_additional);
        }

        $user_account = Users_system::where('user_id', $ppdb->id_user)->first();
        $payment_formulir = Payment::where([
            ['ppdb_id', '=', $ppdb->ppdb_id],
            ['payment_type', '=', 'FEE_FORMULIR']
        ])->first();

        $payment_up_spp = Payment::where([
            ['ppdb_id', '=', $ppdb->ppdb_id],
            ['payment_type', '=', 'FEE_TOTAL']
        ])->first();

        $fee_up = Payment::where([
            ['ppdb_id', '=', $ppdb->ppdb_id],
            ['payment_type', '=', 'FEE_UP']
        ])->first();

        $fee_spp = Payment::where([
            ['ppdb_id', '=', $ppdb->ppdb_id],
            ['payment_type', '=', 'FEE_SPP']
        ])->first();
        $school_stage = "";

        $fee_up_pengajuan = Payment_system::where([
            ['ppdb_id', '=', $ppdb->ppdb_id],
            ['payment_type', '=', 'FEE_UP DILUAR NOMINAL']
        ])->first();

        $diskon_pengajuan = Payment_system::where([
            ['ppdb_id', '=', $ppdb->ppdb_id],
            ['payment_type', '=', 'FEE_PENGAJUAN']
        ])->first();

        if ($ppdb->stage == "TK" || $ppdb->stage == "KB") {
            $school_stage = [
                'Rp.200.000.-',
            ];
        } else {
            $school_stage = [
                'Rp.300.000.-',
            ];
        }

        $reregistration = ReRegistration::where('ppdb_id', $ppdb->ppdb_id)->first();

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

        if (!empty($reregistration->file_additionaldua) && $reregistration->file_additionaldua != "" && $reregistration->file_additionaldua != "[]") {
            $file_additionaldua = json_decode($reregistration->file_additionaldua);
        }

        if (!empty($reregistration->file_additionaldua) && $reregistration->file_additionaldua != "" && $reregistration->file_additional != "[]") {
            $file_additionaldua = json_decode($reregistration->file_additionaldua);
        }

        $data56 = array_column($file_additionalsatu, 'data56');

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

        $data57 = array_column($file_additionalsatu, 'data57');

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

        $data58 = array_column($file_additionalsatu, 'data58');

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

        $data59 = array_column($file_additionalsatu, 'data59');

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

        $data60 = array_column($file_additionalsatu, 'data60');

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

        $data61 = array_column($file_additionalsatu, 'data61');

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

        if (
            !empty($ppdb_testing->file_additional_satu != "[]")
            || !empty($ppdb_testing->file_additional_dua != "[]")
            || !empty($ppdb_testing->file_additional_tiga != "[]")
            || !empty($ppdb_testing->file_additional_empat != "[]")
            || !empty($ppdb_testing->file_additional_lima != "[]")
            || !empty($ppdb_testing->slip_gaji_parent != "[]")
        ) {
            $file_additional_satu = json_decode($ppdb_testing->file_additional_satu);
            $file_additional_dua   = json_decode($ppdb_testing->file_additional_dua);
            $file_additional_tiga  = json_decode($ppdb_testing->file_additional_tiga);
            $file_additional_empat = json_decode($ppdb_testing->file_additional_empat);
            $file_additional_lima  = json_decode($ppdb_testing->file_additional_lima);
            $slip_gaji_parent      = json_decode($ppdb_testing->slip_gaji_parent);
        }

        $data_kelas  = Data_kelas::where([
            ['ppdb_id', $ppdb->ppdb_id],
            ['show_table', 1]
        ])->first();

        $ppdb_system = PPDB_system::where('ppdb_id', $ppdb->ppdb_id)->first();

        $data_siswa_system = Data_siswa_system::where('ppdb_id', $ppdb->ppdb_id)->first();

        $foto_siswa = Foto_siswa::where('ppdb_id', $ppdb->ppdb_id)->first();

        $unitvalue = "";
        $unit = "";
        if ($ppdb->school_site == "PML") {
            $unitvalue = "PAMULANG";
            $unit = "Pamulang";
        } else if ($ppdb->school_site == "JGK") {
            $unitvalue = "JAGAKARSA";
            $unit = "Jagakarsa";
        } else {
            $unitvalue = "CINERE";
            $unit = "Cinere";
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
            'slip_gaji_parent'          => $slip_gaji_parent,
            'data_siswa'                => $data_siswa,
            'data_kelas'                => $data_kelas,
            'ppdb_system'               => $ppdb_system,
            'data_siswa_system'         => $data_siswa_system,
            'foto_siswa'                => $foto_siswa,
            'fee_up_pengajuan'          => $fee_up_pengajuan,
            'diskon_pengajuan'          => $diskon_pengajuan,
            'unitvalue'                 => $unitvalue,
            'unit'                      => $unit
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
    public function addClasses(PPDBPermissionRequest $request)
    { // DAPODIK
        $addingClass = new  addClass();
        if ((!empty($request->status_siswa) && $request->status_siswa != null) && (!empty($request->keterangan) && $request->keterangan != null)) {
            if (!empty($request->ppdb_id) && $request->ppdb_id != "" && $request->ppdb_id != null) {
                return $addingClass->addingClassPPDB($request);
            } else {
                return $addingClass->addingClassDAPODIK($request);
            }
        } else {
            return redirect()->back()->with(['flash_info' => 'Pastikan Field Terisi Dengan Benar di Master']);
        }
    }

    /**
     * @param \App\Models\PPDB $ppdb
     * @param \App\Http\Requests\Backend\PPDB\PPDBPermissionRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function showClasses(PPDBPermissionRequest $request)
    {

        $check_pk = "ppdb_id";

        if (str_contains($request->id_check, '-')) {
            $check_pk = "dapodik_id";
        }

        Data_kelas::where($check_pk, $request->id_check)->update(['show_table' => 0]);
        $data_kelas_update = Data_kelas::where('id', $request->id_classes)->first();
        $data_kelas_update->show_table = 1;
        if ($request->aktivasi == false) {
            $data_kelas_update->show_table = 0;
        }

        $data_kelas_update->unit                 = $request->unit;
        $data_kelas_update->sekolah              = $request->sekolah;
        $data_kelas_update->kelas_utama          = $request->kelas_utama;
        $data_kelas_update->sub_kelas            = $request->sub_kelas;
        $data_kelas_update->nama_kepala_sekolah  = $request->nama_kepala_sekolah;
        $data_kelas_update->nama_wali_kelas      = $request->nama_wali_kelas;
        $data_kelas_update->nama_wali_kelas_2    = $request->nama_wali_kelas_2;
        $data_kelas_update->nisn                 = $request->nisn;
        $data_kelas_update->nis                  = $request->nis;
        $data_kelas_update->nik_siswa            = $request->nik_siswa;
        $data_kelas_update->status_siswa         = $request->status_siswa;
        $data_kelas_update->keterangan           = $request->keterangan;
        $data_kelas_update->save();

        return redirect()->back()->with(['flash_success' => 'Berhasil di Input Ke History']);;
    }

    /**
     * @param \App\Models\PPDB $ppdb
     * @param \App\Http\Requests\Backend\PPDB\PPDBPermissionRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function cekHistory($id)
    {
        $data_kelas_dapodik = Data_kelas::where('dapodik_id', $id)->get();
        $data_kelas_ppdb    = Data_kelas::where('ppdb_id', $id)->get();
        $data_kelas_valid = '';
        if ($data_kelas_dapodik->isEmpty()) {
            $data_kelas_valid = $data_kelas_ppdb;
        } else {
            $data_kelas_valid = $data_kelas_dapodik;
        }
        return new ViewResponse(
            'backend.ppdb.cekhistory',
            [
                'data_kelas_dapodik'     => $data_kelas_dapodik,
                'data_kelas_ppdb'        => $data_kelas_ppdb,
                'data_kelas_valid'       => $data_kelas_valid
            ]
        );
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
            return new RedirectResponse(route('admin.ppdb.index'), ['flash_success' => $ppdb->document_no . " Berhasil disimpan"]);
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

    /**
     * @param \App\Models\Faq $faq
     * @param \App\Http\Requests\Backend\PPDB\PPDBPermissionRequest $request
     *
     * @return ViewResponse
     */
    public function editaktif(PPDB_system $ppdb, PPDBPermissionRequest $request)
    {
        // debug($ppdb);
        $schools = School::All();
        $enum_datas = EnumData::where('enum_group', 'SCHOOL_INFO')->orderBy('enum_order')->get();
        $discount_groups = EnumData::where('enum_group', 'DISCOUNT_GROUP')->orderBy('enum_order')->get();
        $ppdb_interview = Ppdb_interviews_system::where('ppdb_id', $ppdb->ppdb_id)->first();

        // $ppdb_testing = PPDB_system::where('id_user', $ppdb->id)->first();
        $ppdb_testing = $ppdb;

        $data_siswa = Data_siswa_system::where('ppdb_id', $ppdb->ppdb_id)->first();

        $is_interviewer = false;
        $is_interviewer_edit = false;
        $is_rnd = false;
        $is_rnd_edit = false;

        $interview_code = 'interview-' . strtolower($ppdb->school_site) . '-' . strtolower($ppdb->stage);
        $rnd_code = 'rnd-' . strtolower($ppdb->school_site) . '-' . strtolower($ppdb->stage);

        if (access()->allow($interview_code)) {
            $is_interviewer = true;

            if (!empty($ppdb_interview->school_recomendation_result) < 1) $is_interviewer_edit = true;
        }

        if (access()->allow($rnd_code)) {
            $is_rnd = true;
        }

        $is_enabled_form = ($ppdb_interview->school_recomendation_result ?? '0') < 1 && $is_interviewer;
        $is_enabled_rnd = (($ppdb_interview->school_recomendation_result ?? '1') > 0 && ($ppdb_interview->interview_result ?? '0') < 1) && $is_rnd;
        $is_enabled_submit = (($ppdb_interview->school_recomendation_result ?? '1') > 0 && ($ppdb_interview->interview_result ?? '1') > 0 && ($ppdb_interview->is_submited ?? '0') < 1) && $is_interviewer;

        debug($is_enabled_form);

        if (($ppdb->stage) == "SD") {
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
        } else {
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

        if (!empty($ppdb->file_additional) && $ppdb->file_additional != "" && $ppdb->file_additional != "[]") {
            $file_additional = json_decode($ppdb->file_additional);
        }

        $user_account = Users::where('user_id', $ppdb->id_user)->first();
        $payment_formulir = Payment_system::where([
            ['ppdb_id', '=', $ppdb->ppdb_id],
            ['payment_type', '=', 'FEE_FORMULIR']
        ])->first();

        $payment_up_spp = Payment_system::where([
            ['ppdb_id', '=', $ppdb->ppdb_id],
            ['payment_type', '=', 'FEE_TOTAL']
        ])->first();

        $fee_up = Payment_system::where([
            ['ppdb_id', '=', $ppdb->ppdb_id],
            ['payment_type', '=', 'FEE_UP']
        ])->first();

        $fee_up_pengajuan = Payment_system::where([
            ['ppdb_id', '=', $ppdb->ppdb_id],
            ['payment_type', '=', 'FEE_UP DILUAR NOMINAL']
        ])->first();

        $diskon_pengajuan = Payment_system::where([
            ['ppdb_id', '=', $ppdb->ppdb_id],
            ['payment_type', '=', 'FEE_PENGAJUAN']
        ])->first();

        $fee_spp = Payment_system::where([
            ['ppdb_id', '=', $ppdb->ppdb_id],
            ['payment_type', '=', 'FEE_SPP']
        ])->first();
        $school_stage = "";

        if ($ppdb->stage == "TK" || $ppdb->stage == "KB") {
            $school_stage = [
                'Rp.200.000.-',
            ];
        } else {
            $school_stage = [
                'Rp.300.000.-',
            ];
        }

        $reregistration = Reregistrasi_system::where('ppdb_id', $ppdb->ppdb_id)->first();

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

        if (!empty($reregistration->file_additionaldua) && $reregistration->file_additionaldua != "" && $reregistration->file_additionaldua != "[]") {
            $file_additionaldua = json_decode($reregistration->file_additionaldua);
        }

        if (!empty($reregistration->file_additionaldua) && $reregistration->file_additionaldua != "" && $reregistration->file_additional != "[]") {
            $file_additionaldua = json_decode($reregistration->file_additionaldua);
        }

        $data56 = array_column($file_additionalsatu, 'data56');

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

        $data57 = array_column($file_additionalsatu, 'data57');

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

        $data58 = array_column($file_additionalsatu, 'data58');

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

        $data59 = array_column($file_additionalsatu, 'data59');

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

        $data60 = array_column($file_additionalsatu, 'data60');

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

        $data61 = array_column($file_additionalsatu, 'data61');

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

        if (
            !empty($ppdb_testing->file_additional_satu != "[]")
            || !empty($ppdb_testing->file_additional_dua != "[]")
            || !empty($ppdb_testing->file_additional_tiga != "[]")
            || !empty($ppdb_testing->file_additional_empat != "[]")
            || !empty($ppdb_testing->file_additional_lima != "[]")
            || !empty($ppdb_testing->slip_gaji_parent != "[]")
        ) {
            $file_additional_satu = json_decode($ppdb_testing->file_additional_satu);
            $file_additional_dua   = json_decode($ppdb_testing->file_additional_dua);
            $file_additional_tiga  = json_decode($ppdb_testing->file_additional_tiga);
            $file_additional_empat = json_decode($ppdb_testing->file_additional_empat);
            $file_additional_lima  = json_decode($ppdb_testing->file_additional_lima);
            $slip_gaji_parent      = json_decode($ppdb_testing->slip_gaji_parent);
        }

        $data_kelas = Data_kelas::where([
            ['ppdb_id', $ppdb->ppdb_id],
            ['show_table', 1]
        ])->first();

        $ppdb_system = PPDB_system::where('ppdb_id', $ppdb->ppdb_id)->first();

        $data_siswa_system = Data_siswa_system::where('ppdb_id', $ppdb->ppdb_id)->first();

        debug($user_account);

        $foto_siswa = Foto_siswa::where('ppdb_id', $ppdb->ppdb_id)->first();

        return new ViewResponse('backend.ppdb.editaktif', [
            'ppdb'                      => $ppdb,
            'user_account'              => $user_account,
            'schools'                   => $schools,
            'enum_datas'                => $enum_datas,
            'discount_groups'           => $discount_groups,
            'file_uploaded'             => $file_uploaded,
            'file_additional'           => $file_additional,
            'payment_formulir'          => $payment_formulir,
            'payment_up_spp'            => $payment_up_spp,
            'school_stage'              => $school_stage,
            'reregistration'            => $reregistration,
            'file_additionalsatu'       => $file_additionalsatu,
            'medco_employee_file'       => $medco_employee_file,
            'brand'                     => $brand,
            'kegiatan_sekolah'          => $kegiatan_sekolah,
            'media_cetak'               => $media_cetak,
            'media_elektronik'          => $media_elektronik,
            'media_sosial'              => $media_sosial,
            'internet'                  => $internet,
            'ppdb_interview'            => $ppdb_interview,
            'is_enabled_form'           => $is_enabled_form,
            'is_enabled_rnd'            => $is_enabled_rnd,
            'is_enabled_submit'         => $is_enabled_submit,
            'is_interviewer'            => $is_interviewer,
            'is_rnd'                    => $is_rnd,
            'is_rnd_edit'               => $is_rnd_edit,
            'result_interview'          => $result_interview,
            'fee_up'                    => $fee_up,
            'fee_spp'                   => $fee_spp,
            'file_additionaldua'        => $file_additionaldua,
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
            'slip_gaji_parent'          => $slip_gaji_parent,
            'data_siswa'                => $data_siswa,
            'data_kelas'                => $data_kelas,
            'diskon_pengajuan'          => $diskon_pengajuan,
            'fee_up_pengajuan'          => $fee_up_pengajuan,
            'ppdb_system'               => $ppdb_system,
            'data_siswa_system'         => $data_siswa_system,
            'foto_siswa'                => $foto_siswa
        ]);
    }

    public function editaktifalazhar(PPDB_system $ppdb, PPDBPermissionRequest $request)
    {
        return "editaktifalazhar";
    }

    public function editaktifalazhar_dapodik(PPDB_system $ppdb, PPDBPermissionRequest $request)
    {
        return "editaktifalazhar_dapodik";
    }

    public function editaktifdapodik(PPDBDapodik $ppdb, PPDBPermissionRequest $request)
    {
        // debug($ppdb);
        $schools = School::All();
        $enum_datas = EnumData::where('enum_group', 'SCHOOL_INFO')->orderBy('enum_order')->get();
        $discount_groups = EnumData::where('enum_group', 'DISCOUNT_GROUP')->orderBy('enum_order')->get();
        $ppdb_interview = Ppdb_interviews_system::where('dapodik_id', $ppdb->dapodik_id)->first();

        $ppdb_testing = $ppdb;

        $data_siswa = Data_siswa_system::where('dapodik_id', $ppdb->dapodik_id)->first();

        $is_interviewer = false;
        $is_interviewer_edit = false;
        $is_rnd = false;
        $is_rnd_edit = false;

        $interview_code = 'interview-' . strtolower($ppdb->school_site) . '-' . strtolower($ppdb->stage);
        $rnd_code = 'rnd-' . strtolower($ppdb->school_site) . '-' . strtolower($ppdb->stage);

        if (access()->allow($interview_code)) {
            $is_interviewer = true;

            if (!empty($ppdb_interview->school_recomendation_result) < 1) $is_interviewer_edit = true;
        }

        if (access()->allow($rnd_code)) {
            $is_rnd = true;
        }

        $is_enabled_form = ($ppdb_interview->school_recomendation_result ?? '0') < 1 && $is_interviewer;
        $is_enabled_rnd = (($ppdb_interview->school_recomendation_result ?? '1') > 0 && ($ppdb_interview->interview_result ?? '0') < 1) && $is_rnd;
        $is_enabled_submit = (($ppdb_interview->school_recomendation_result ?? '1') > 0 && ($ppdb_interview->interview_result ?? '1') > 0 && ($ppdb_interview->is_submited ?? '0') < 1) && $is_interviewer;

        debug($is_enabled_form);

        if (($ppdb->stage) == "SD") {
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
        } else {
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

        if (!empty($ppdb->file_additional) && $ppdb->file_additional != "" && $ppdb->file_additional != "[]") {
            $file_additional = json_decode($ppdb->file_additional);
        }

        $user_account = Users::where('id', $ppdb->id_user)->first();
        $payment_formulir = Payment_system::where([
            ['dapodik_id', '=', $ppdb->dapodik_id],
            ['payment_type', '=', 'FEE_FORMULIR']
        ])->first();

        $payment_up_spp = Payment_system::where([
            ['dapodik_id', '=', $ppdb->dapodik_id],
            ['payment_type', '=', 'FEE_TOTAL']
        ])->first();

        $fee_up = Payment_system::where([
            ['dapodik_id', '=', $ppdb->dapodik_id],
            ['payment_type', '=', 'FEE_UP']
        ])->first();

        $fee_up_pengajuan = Payment_system::where([
            ['dapodik_id', '=', $ppdb->dapodik_id],
            ['payment_type', '=', 'FEE_UP DILUAR NOMINAL']
        ])->first();

        $diskon_pengajuan = Payment_system::where([
            ['dapodik_id', '=', $ppdb->dapodik_id],
            ['payment_type', '=', 'FEE_PENGAJUAN']
        ])->first();

        $fee_spp = Payment_system::where([
            ['dapodik_id', '=', $ppdb->dapodik_id],
            ['payment_type', '=', 'FEE_SPP']
        ])->first();
        $school_stage = "";

        if ($ppdb->stage == "TK" || $ppdb->stage == "KB") {
            $school_stage = [
                'Rp.200.000.-',
            ];
        } else {
            $school_stage = [
                'Rp.300.000.-',
            ];
        }

        $reregistration = Reregistrasi_system::where('dapodik_id', $ppdb->dapodik_id)->first();

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

        if (!empty($reregistration->file_additionaldua) && $reregistration->file_additionaldua != "" && $reregistration->file_additionaldua != "[]") {
            $file_additionaldua = json_decode($reregistration->file_additionaldua);
        }

        if (!empty($reregistration->file_additionaldua) && $reregistration->file_additionaldua != "" && $reregistration->file_additional != "[]") {
            $file_additionaldua = json_decode($reregistration->file_additionaldua);
        }

        $data56 = array_column($file_additionalsatu, 'data56');

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

        $data57 = array_column($file_additionalsatu, 'data57');

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

        $data58 = array_column($file_additionalsatu, 'data58');

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

        $data59 = array_column($file_additionalsatu, 'data59');

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

        $data60 = array_column($file_additionalsatu, 'data60');

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

        $data61 = array_column($file_additionalsatu, 'data61');

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

        if (
            !empty($ppdb_testing->file_additional_satu != "[]")
            || !empty($ppdb_testing->file_additional_dua != "[]")
            || !empty($ppdb_testing->file_additional_tiga != "[]")
            || !empty($ppdb_testing->file_additional_empat != "[]")
            || !empty($ppdb_testing->file_additional_lima != "[]")
            || !empty($ppdb_testing->slip_gaji_parent != "[]")
        ) {
            $file_additional_satu = json_decode($ppdb_testing->file_additional_satu);
            $file_additional_dua   = json_decode($ppdb_testing->file_additional_dua);
            $file_additional_tiga  = json_decode($ppdb_testing->file_additional_tiga);
            $file_additional_empat = json_decode($ppdb_testing->file_additional_empat);
            $file_additional_lima  = json_decode($ppdb_testing->file_additional_lima);
            $slip_gaji_parent      = json_decode($ppdb_testing->slip_gaji_parent);
        }

        $data_kelas = Data_kelas::where([
            ['dapodik_id', $ppdb->dapodik_id],
            ['show_table', 1]
        ])->first();

        $ppdb_system = PPDB_system::where('dapodik_id', $ppdb->dapodik_id)->first();

        $data_siswa_system = Data_siswa_system::where('dapodik_id', $ppdb->dapodik_id)->first();

        debug($user_account);

        $foto_siswa = Foto_siswa::where('dapodik_id', $ppdb->dapodik_id)->first();

        return new ViewResponse('backend.ppdb.editaktif', [
            'ppdb'                      => $ppdb,
            'user_account'              => $user_account,
            'schools'                   => $schools,
            'enum_datas'                => $enum_datas,
            'discount_groups'           => $discount_groups,
            'file_uploaded'             => $file_uploaded,
            'file_additional'           => $file_additional,
            'payment_formulir'          => $payment_formulir,
            'payment_up_spp'            => $payment_up_spp,
            'school_stage'              => $school_stage,
            'reregistration'            => $reregistration,
            'file_additionalsatu'       => $file_additionalsatu,
            'medco_employee_file'       => $medco_employee_file,
            'brand'                     => $brand,
            'kegiatan_sekolah'          => $kegiatan_sekolah,
            'media_cetak'               => $media_cetak,
            'media_elektronik'          => $media_elektronik,
            'media_sosial'              => $media_sosial,
            'internet'                  => $internet,
            'ppdb_interview'            => $ppdb_interview,
            'is_enabled_form'           => $is_enabled_form,
            'is_enabled_rnd'            => $is_enabled_rnd,
            'is_enabled_submit'         => $is_enabled_submit,
            'is_interviewer'            => $is_interviewer,
            'is_rnd'                    => $is_rnd,
            'is_rnd_edit'               => $is_rnd_edit,
            'result_interview'          => $result_interview,
            'fee_up'                    => $fee_up,
            'fee_spp'                   => $fee_spp,
            'file_additionaldua'        => $file_additionaldua,
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
            'slip_gaji_parent'          => $slip_gaji_parent,
            'data_siswa'                => $data_siswa,
            'data_kelas'                => $data_kelas,
            'diskon_pengajuan'          => $diskon_pengajuan,
            'fee_up_pengajuan'          => $fee_up_pengajuan,
            'ppdb_system'               => $ppdb_system,
            'data_siswa_system'         => $data_siswa_system,
            'foto_siswa'                => $foto_siswa
        ]);
    }

    /**
     * @param \App\Models\Faq $faq
     * @param \App\Http\Requests\Backend\PPDB\PPDBPermissionRequest $request
     *
     * @return ViewResponse
     */
    public function addClass(PPDBPermissionRequest $request)
    {
        if ($request->ppdb_id != null) {
            $ppdb = PPDB::where('ppdb_id', $request->ppdb_id)->first();
            PPDB_system::where('ppdb_id', $ppdb->ppdb_id)->update(['nis' => $request->nis]);
            Data_siswa::where('ppdb_id', $ppdb->ppdb_id)->update(['nisn' => $request->nisn]);
            Data_siswa_system::where('ppdb_id', $ppdb->ppdb_id)->update(['no_seri_ijazah' => $request->no_seri_ijazah]);
            Data_siswa_system_2::where('ppdb_id', $ppdb->ppdb_id)->update([
                'kode_registrasi'               => $ppdb->document_no,
                'unit'                          => $request->unit,
                'sekolah'                       => $request->sekolah,
                'kelas_utama'                   => $request->kelas_utama,
                'sub_kelas'                     => $request->sub_kelas,
                'nama_kepala_sekolah'           => $request->nama_kepala_sekolah,
                'nama_wali_kelas'               => $request->nama_wali_kelas,
                'nama_wali_kelas_2'             => $request->nama_wali_kelas_2,
                'nisn'                          => $request->nisn,
                'nik_siswa'                     => $request->nik_siswa,
                'status_siswa'                  => $request->status_siswa,
                'keterangan'                    => $request->keterangan
            ]);
            $data_kelas = new Data_kelas;
            $data_kelas->ppdb_id              = $ppdb->ppdb_id;
            $data_kelas->kode_registrasi      = $ppdb->document_no;
            $data_kelas->unit                 = $request->unit;
            $data_kelas->sekolah              = $request->sekolah;
            $data_kelas->kelas_utama          = $request->kelas_utama;
            $data_kelas->sub_kelas            = $request->sub_kelas;
            $data_kelas->nama_kepala_sekolah  = $request->nama_kepala_sekolah;
            $data_kelas->nama_wali_kelas      = $request->nama_wali_kelas;
            $data_kelas->nama_wali_kelas_2    = $request->nama_wali_kelas_2;
            $data_kelas->nisn                 = $request->nisn;
            $data_kelas->nis                  = $request->nis;
            $data_kelas->no_seri_ijazah       = $request->no_seri_ijazah;
            $data_kelas->nik_siswa            = $request->nik_siswa;
            $data_kelas->status_siswa         = $request->status_siswa;
            $data_kelas->keterangan           = $request->keterangan;
            $data_kelas->save();
        } else {
            $ppdb = PPDB_system::where('dapodik_id', $request->dapodik_id)->first();
            PPDB_system::where('dapodik_id', $ppdb->dapodik_id)->update(['nis' => $request->nis]);
            Data_siswa::where('dapodik_id', $ppdb->dapodik_id)->update(['nisn' => $request->nisn]);
            Data_siswa_system::where('dapodik_id', $ppdb->dapodik_id)->update(['no_seri_ijazah' => $request->no_seri_ijazah]);
            Data_siswa_system_2::where('dapodik_id', $ppdb->dapodik_id)->update([
                'kode_registrasi'               => 'dapodik-' . $request->nik_siswa,
                'unit'                          => $request->unit,
                'sekolah'                       => $request->sekolah,
                'kelas_utama'                   => $request->kelas_utama,
                'sub_kelas'                     => $request->sub_kelas,
                'nama_kepala_sekolah'           => $request->nama_kepala_sekolah,
                'nama_wali_kelas'               => $request->nama_wali_kelas,
                'nama_wali_kelas_2'             => $request->nama_wali_kelas_2,
                'nisn'                          => $request->nisn,
                'nik_siswa'                     => $request->nik_siswa,
                'status_siswa'                  => $request->status_siswa,
                'keterangan'                    => $request->keterangan
            ]);
            $data_kelas = new Data_kelas;
            $data_kelas->dapodik_id              = $ppdb->dapodik_id;
            $data_kelas->kode_registrasi      = 'dapodik-' . $request->nik_siswa;
            $data_kelas->unit                 = $request->unit;
            $data_kelas->sekolah              = $request->sekolah;
            $data_kelas->kelas_utama          = $request->kelas_utama;
            $data_kelas->sub_kelas            = $request->sub_kelas;
            $data_kelas->nama_kepala_sekolah  = $request->nama_kepala_sekolah;
            $data_kelas->nama_wali_kelas      = $request->nama_wali_kelas;
            $data_kelas->nama_wali_kelas_2    = $request->nama_wali_kelas_2;
            $data_kelas->nisn                 = $request->nisn;
            $data_kelas->nis                  = $request->nis;
            $data_kelas->no_seri_ijazah       = $request->no_seri_ijazah;
            $data_kelas->nik_siswa            = $request->nik_siswa;
            $data_kelas->status_siswa         = $request->status_siswa;
            $data_kelas->keterangan           = $request->keterangan;
            $data_kelas->save();
        }
        return redirect()->back()->with(['flash_success' => 'Sudah Berhasil di Edit di Master']);
    }

    public function indextest()
    {
        $ppdb = PPDB_system::all();
        $SQLQuery =  "SELECT 
            schools.school_name AS school, 
            ppdb_system.id,
            ppdb_system.ppdb_id,
            users_saved.email,
            users_saved.password,
            users_saved.phone,
            users_saved.first_name,
            users_saved.last_name,
            ppdb_system.dapodik_id,
            ppdb_system.registration_schedule_id,
            ppdb_system.document_no,
            ppdb_system.document_status,
            ppdb_system.school_site,
            ppdb_system.stage,
            ppdb_system.classes,
            ppdb_system.student_status,
            ppdb_system.fullname,
            ppdb_system.gender,
            ppdb_system.place_of_birth,
            ppdb_system.date_of_birth,
            ppdb_system.religion,
            ppdb_system.nationality,
            ppdb_system.address,
            ppdb_system.home_phone,
            ppdb_system.hand_phone,
            ppdb_system.school_origin,
            ppdb_system.nis,
            data_siswa_system.nisn, 
            data_siswa_system_2.sekolah, 
            data_siswa_system_2.unit, 
            data_siswa_system_2.kelas_utama, 
            data_siswa_system_2.sub_kelas, 
            data_siswa_system_2.status_siswa, 
            data_siswa_system_2.keterangan, 
            data_siswa_system.nama_ayah, 
            data_siswa_system.pekerjaan_ayah, 
            data_siswa_system.nama_ibu, 
            data_siswa_system.pekerjaan_ibu, 
            data_siswa_system.nama_wali, 
            data_siswa_system.pekerjaan_wali 
          FROM 
            ppdb_system 
            INNER JOIN schools ON ppdb_system.school_site = schools.school_code 
            INNER JOIN data_siswa_system ON (
              data_siswa_system.dapodik_id = ppdb_system.dapodik_id 
              or data_siswa_system.ppdb_id = ppdb_system.ppdb_id
            ) 
            INNER JOIN data_siswa_system_2 ON (
              data_siswa_system_2.dapodik_id = ppdb_system.dapodik_id 
              or data_siswa_system_2.ppdb_id = ppdb_system.ppdb_id
            ) 
            INNER JOIN users_saved ON (
              users_saved.user_id = ppdb_system.id_user
              or users_saved.id = ppdb_system.id_user
            ) 
          WHERE 
            data_siswa_system_2.status_siswa = 'aktif' 
            AND schools.school_code IN ('JGK', 'CNR', 'PML') 
            AND ppdb_system.stage IN (
              'TK', 'TK', 'TK', 'TK', 'SD', 'SD', 'SD', 
              'SD', 'SMP', 'SMP', 'SMP', 'SMP', 'SMA', 
              'SMA', 'SMA', 'SMA', 'SD', 'SD', 'SD', 
              'SD', 'SMP', 'SMP', 'SMP', 'SMP', 'SMA', 
              'SMA', 'SMA', 'SMA', 'KB', 'KB', 'KB', 
              'KB'
            ) 
          ORDER BY 
            ppdb_system.created_at DESC;";

        $ppdb = DB::select($SQLQuery);

        return response()->json(['data' => $ppdb]);
    }

    /**
     * @param \App\Models\Faq $faq
     * @param \App\Http\Requests\Backend\PPDB\PPDBPermissionRequest $request
     *
     * @return ViewResponse
     */
    public function editdapodik(Dapodik $dapodik)
    {
        $schools = School::All();
        $enum_datas = EnumData::where('enum_group', 'SCHOOL_INFO')->orderBy('enum_order')->get();
        $discount_groups = EnumData::where('enum_group', 'DISCOUNT_GROUP')->orderBy('enum_order')->get();
        $ppdb_interview = PPDBInterview::where('dapodik_id', $dapodik->id)->first();

        $ppdb_testing = $dapodik;

        $data_siswa = Data_siswa::where('dapodik_id', $dapodik->id)->first();

        $is_interviewer = false;
        $is_interviewer_edit = false;
        $is_rnd = false;
        $is_rnd_edit = false;

        $interview_code = 'interview-' . strtolower($dapodik->school_site) . '-' . strtolower($dapodik->stage);
        $rnd_code = 'rnd-' . strtolower($dapodik->school_site) . '-' . strtolower($dapodik->stage);

        if (access()->allow($interview_code)) {
            $is_interviewer = true;

            if (!empty($ppdb_interview->school_recomendation_result) < 1) $is_interviewer_edit = true;
        }

        if (access()->allow($rnd_code)) {
            $is_rnd = true;
        }

        $is_enabled_form = ($ppdb_interview->school_recomendation_result ?? '0') < 1 && $is_interviewer;
        $is_enabled_rnd = (($ppdb_interview->school_recomendation_result ?? '1') > 0 && ($ppdb_interview->interview_result ?? '0') < 1) && $is_rnd;
        $is_enabled_submit = (($ppdb_interview->school_recomendation_result ?? '1') > 0 && ($ppdb_interview->interview_result ?? '1') > 0 && ($ppdb_interview->is_submited ?? '0') < 1) && $is_interviewer;

        debug($is_enabled_form);

        if (($dapodik->stage) == "SD") {
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
        } else {
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

        if (!empty($dapodik->file_additional) && $dapodik->file_additional != "" && $dapodik->file_additional != "[]") {
            $file_additional = json_decode($dapodik->file_additional);
        }

        $user_account = Users_system::where('id', $dapodik->id_user)->first();
        debug($user_account);
        $payment_formulir = Payment::where([
            ['dapodik_id', '=', $dapodik->id],
            ['payment_type', '=', 'FEE_FORMULIR']
        ])->first();

        $payment_up_spp = Payment::where([
            ['dapodik_id', '=', $dapodik->id],
            ['payment_type', '=', 'FEE_TOTAL']
        ])->first();

        $fee_up = Payment::where([
            ['dapodik_id', '=', $dapodik->id],
            ['payment_type', '=', 'FEE_UP']
        ])->first();

        $fee_up_pengajuan = Payment::where([
            ['dapodik_id', '=', $dapodik->id],
            ['payment_type', '=', 'FEE_UP DILUAR NOMINAL']
        ])->first();

        $diskon_pengajuan = Payment::where([
            ['dapodik_id', '=', $dapodik->id],
            ['payment_type', '=', 'FEE_PENGAJUAN']
        ])->first();

        $fee_spp = Payment::where([
            ['dapodik_id', '=', $dapodik->id],
            ['payment_type', '=', 'FEE_SPP']
        ])->first();
        $school_stage = "";

        if ($dapodik->stage == "TK" || $dapodik->stage == "KB") {
            $school_stage = [
                'Rp.200.000.-',
            ];
        } else {
            $school_stage = [
                'Rp.300.000.-',
            ];
        }

        $reregistration = ReRegistration::where('dapodik_id', $dapodik->id)->first();

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

        if (!empty($reregistration->file_additionaldua) && $reregistration->file_additionaldua != "" && $reregistration->file_additionaldua != "[]") {
            $file_additionaldua = json_decode($reregistration->file_additionaldua);
        }

        if (!empty($reregistration->file_additionaldua) && $reregistration->file_additionaldua != "" && $reregistration->file_additional != "[]") {
            $file_additionaldua = json_decode($reregistration->file_additionaldua);
        }

        $data56 = array_column($file_additionalsatu, 'data56');

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

        $data57 = array_column($file_additionalsatu, 'data57');

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

        $data58 = array_column($file_additionalsatu, 'data58');

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

        $data59 = array_column($file_additionalsatu, 'data59');

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

        $data60 = array_column($file_additionalsatu, 'data60');

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

        $data61 = array_column($file_additionalsatu, 'data61');

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

        if (
            !empty($ppdb_testing->file_additional_satu != "[]")
            || !empty($ppdb_testing->file_additional_dua != "[]")
            || !empty($ppdb_testing->file_additional_tiga != "[]")
            || !empty($ppdb_testing->file_additional_empat != "[]")
            || !empty($ppdb_testing->file_additional_lima != "[]")
            || !empty($ppdb_testing->slip_gaji_parent != "[]")
        ) {
            $file_additional_satu = json_decode($ppdb_testing->file_additional_satu);
            $file_additional_dua   = json_decode($ppdb_testing->file_additional_dua);
            $file_additional_tiga  = json_decode($ppdb_testing->file_additional_tiga);
            $file_additional_empat = json_decode($ppdb_testing->file_additional_empat);
            $file_additional_lima  = json_decode($ppdb_testing->file_additional_lima);
            $slip_gaji_parent      = json_decode($ppdb_testing->slip_gaji_parent);
        }

        $data_kelas = Data_kelas::where([
            ['dapodik_id', $dapodik->id],
            ['show_table', 1]
        ])->first();

        $ppdb_system = PPDB::where('dapodik_id', $dapodik->id)->first();

        $data_siswa_system = Data_siswa::where('dapodik_id', $dapodik->id)->first();

        debug($user_account);

        $foto_siswa = Foto_siswa::where('dapodik_id', $dapodik->id)->first();

        $unitvalue = "";
        $unit = "";
        if ($dapodik->school_site == "PML") {
            $unitvalue = "PAMULANG";
            $unit = "Pamulang";
        } else if ($dapodik->school_site == "JGK") {
            $unitvalue = "JAGAKARSA";
            $unit = "Jagakarsa";
        } else {
            $unitvalue = "CINERE";
            $unit = "Cinere";
        }


        return new ViewResponse('backend.ppdb.editdapodik', [
            'ppdb'              => $dapodik,
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
            'slip_gaji_parent'          => $slip_gaji_parent,
            'data_siswa'                => $data_siswa,
            'data_kelas'                => $data_kelas,
            'ppdb_system'               => $ppdb_system,
            'data_siswa_system'         => $data_siswa_system,
            'foto_siswa'                => $foto_siswa,
            'unitvalue'                 => $unitvalue,
            'unit'                      => $unit
        ]);

        // return response()->json($ppdb);
    }

    public function deleteDapodikAll(Request $request)
    {
        $ids = $request->ids;
        Dapodik::whereIn('dapodik_id', $ids)->delete();
        return response()->json(["success" => "Siswa have been deleted!"]);
    }

    public function deletePPDBAll(Request $request)
    {
        $ids = $request->ids;
        PPDB::whereIn('ppdb_id', $ids)->delete();
        return response()->json(["success" => "Siswa have been deleted!"]);
    }

    public function updateBiodata(Request $request)
    {
        $result = PPDB::where('ppdb_id', $request->ppdb_id)->first();
        $result->update([
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'religion' => $request->religion,
            'nationality' => $request->nationality,
            'address' => $request->address,
            'home_phone' => $request->home_phone
        ]);
        return redirect()->back()->with(['flash_success' => 'Biodata Berhasil di Upload']);
    }

    public function updateKontak(Request $request)
    {
        $result = PPDB::where('ppdb_id', $request->ppdb_id)->first();
        $users  = Users_system::where('user_id', $result->id_user)->first();
        $users->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        return redirect()->back()->with(['flash_success' => 'Kontak Berhasil di Upload']);
    }

    public function updateBiodataDapodik(Request $request)
    {
        $result = Dapodik::where('dapodik_id', $request->dapodik_id)->first();
        $result->update([
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'religion' => $request->religion,
            'nationality' => $request->nationality,
            'address' => $request->address,
            'home_phone' => $request->home_phone
        ]);

        return redirect()->back()->with(['flash_success' => 'Biodata Berhasil di Upload']);
    }

    public function updateKontakDapodik(Request $request)
    {
        $result = Dapodik::where('id', $request->dapodik_id)->first();
        $users  = Users_system::where('id', $result->id_user)->first();
        $users->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        return redirect()->back()->with(['flash_success' => 'Kontak Berhasil di Upload']);
    }
}
