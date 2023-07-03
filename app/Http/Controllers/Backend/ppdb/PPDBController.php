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
use App\Models\Data_kelas;
use App\Models\Data_siswa;
use App\Models\Data_siswa2;
use App\Models\Data_siswa3;
use App\Models\Data_siswa4;
use App\Models\Data_siswa_system;
use App\Models\Data_siswa_system_2;
use App\Models\Data_siswa_system_3;
use App\Models\Data_siswa_system_4;
use App\Models\MasterKelas;
use App\Models\datasiswa_system;
use App\Models\PPDB_system;

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

    public function fetchdatakelas() {

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
    public function data_siswa(Request $request) {

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

    /**
     * @param \App\Http\Requests\Backend\Faqs\ManageFaqsRequest $request
     *
     * @return ViewResponse
     */
    public function siswa_tidak_aktif(Request $request) {

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

    public function siswa_alumni(Request $request) {

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
    public function upload_fhoto(Request $request){

        $savefhoto = PPDB::where('id',$request->id_ppdb)->first();

        $image = base64_encode(file_get_contents($request->file('fhoto_siswa')));


        $savefhoto->fhoto_siswa = $image;

        $savefhoto->save();

        return redirect()->back()->with(['flash_success' => 'Sudah Berhasil di Upload']);;
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

        $ppdb_testing = PPDB::where('id_user', $user_ppdb->id)->first();
        $ppdb_testing = $ppdb;

        $data_siswa = Data_siswa::where('ppdb_id', $ppdb->id)->first();


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

        $data_kelas = Data_kelas::where([['ppdb_id',$ppdb->id],
                                        ['show_table', 1]    
                                        ])->first();

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
            'data_kelas'                => $data_kelas
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
    public function addClasses(PPDBPermissionRequest $request) {

                $ppdb = PPDB::where('id', $request->id)->first();
                        //ppdb system
                $ppdb_system = new  PPDB_system;
                $ppdb_system->id = $ppdb->id;
                $ppdb_system->registration_schedule_id = $ppdb->registration_schedule_id;
                $ppdb_system->document_no = $ppdb->document_no;
                $ppdb_system->document_status =  $ppdb->document_status;
                $ppdb_system->id_user = $ppdb->id_user;
                $ppdb_system->school_site = $ppdb->school_site;
                $ppdb_system->stage = $ppdb->stage;
                $ppdb_system->classes = $ppdb->classes;
                $ppdb_system->student_status = $ppdb->student_status;
                $ppdb_system->fullname = $ppdb->fullname;
                $ppdb_system->gender = $ppdb->gender;
                $ppdb_system->place_of_birth = $ppdb->place_of_birth;
                $ppdb_system->date_of_birth = $ppdb->date_of_birth;
                $ppdb_system->religion = $ppdb->religion;
                $ppdb_system->nationality = $ppdb->nationality;
                $ppdb_system->address = $ppdb->address;
                $ppdb_system->home_phone = $ppdb->home_phone;
                $ppdb_system->hand_phone = $ppdb->hand_phone;
                $ppdb_system->school_origin = $ppdb->school_origin;
                $ppdb_system->family_card = $ppdb->family_card;
                $ppdb_system->birth_certificate = $ppdb->birth_certificate;
                $ppdb_system->last_report = $ppdb->last_report;
                $ppdb_system->academic_certificate = $ppdb->academic_certificate;
                $ppdb_system->kia_book = $ppdb->kia_book;
                $ppdb_system->file_additional = $ppdb->file_additional;
                $ppdb_system->medco_employee = $ppdb->medco_employee;
                $ppdb_system->medco_employee_file = $ppdb->medco_employee_file;
                $ppdb_system->ppdb_discount = $ppdb->ppdb_discount;
                $ppdb_system->studied_before = $ppdb->studied_before;
                $ppdb_system->rejected_at = $ppdb->rejected_at;
                $ppdb_system->rejected_by = $ppdb->rejected_by;
                $ppdb_system->gaji = $ppdb->gaji;
                $ppdb_system->status_siswa = $ppdb->status_siswa;
                $ppdb_system->slip_gaji_parent = $ppdb->slip_gaji_parent;
                $ppdb_system->file_additional_satu = $ppdb->file_additional_satu;
                $ppdb_system->file_additional_dua = $ppdb->file_additional_dua;
                $ppdb_system->file_additional_tiga = $ppdb->file_additional_tiga;
                $ppdb_system->file_additional_empat = $ppdb->file_additional_empat;
                $ppdb_system->file_additional_lima = $ppdb->file_additional_lima;
                $ppdb_system->save();


                $data_siswa = Data_siswa::where('ppdb_id', $ppdb->id)->first();
                //data siswa
                $data_siswa->nisn                           = $request->nisn;
                $data_siswa->save();

                $datasiswa_system = new Data_siswa_system;

                $datasiswa_system->nama_lengkap              = $data_siswa->nama_lengkap;
                $datasiswa_system->jenis_kelamin             = $data_siswa->jenis_kelamin;
                $datasiswa_system->nisn                      = $data_siswa->nisn;
                $datasiswa_system->tempat_lahir              = $data_siswa->tempat_lahir;
                $datasiswa_system->tanggal_lahir             = $data_siswa->tanggal_lahir;
                $datasiswa_system->ppdb_id                   = $data_siswa->ppdb_id; 
                $datasiswa_system->agama                     = $data_siswa->agama;
                $datasiswa_system->alamat_jalan              = $data_siswa->alamat_jalan;
                $datasiswa_system->rt                        = $data_siswa->rt;
                $datasiswa_system->rw                        = $data_siswa->rw;
                $datasiswa_system->nama_dusun                = $data_siswa->nama_dusun;
                $datasiswa_system->nama_kelurahan            = $data_siswa->nama_kelurahan;
                $datasiswa_system->kecamatan                 = $data_siswa->kecamatan;
                $datasiswa_system->kode_pos                  = $data_siswa->kode_pos;
                $datasiswa_system->tempat_tinggal            = $data_siswa->tempat_tinggal;
                $datasiswa_system->moda_transportasi         = $data_siswa->moda_transportasi;
                $datasiswa_system->telepon_rumah             = $data_siswa->telepon_rumah;
                $datasiswa_system->nomor_hp                  = $data_siswa->nomor_hp;
                $datasiswa_system->email                     = $data_siswa->email;
                $datasiswa_system->no_seri_skhun             = $data_siswa->no_seri_skhun;
                $datasiswa_system->nama_ayah                 = $data_siswa->nama_ayah;
                $datasiswa_system->tahun_lahir_ayah          = $data_siswa->tahun_lahir_ayah;
                $datasiswa_system->pendidikan_ayah           = $data_siswa->pendidikan_ayah;
                $datasiswa_system->pekerjaan_ayah            = $data_siswa->pekerjaan_ayah;
                $datasiswa_system->penghasilan_bulanan_ayah  = $data_siswa->penghasilan_bulanan_ayah;
                $datasiswa_system->nik_ayah                  = $data_siswa->nik_ayah;
                $datasiswa_system->nama_Ibu                  = $data_siswa->nama_Ibu;
                $datasiswa_system->tahun_lahir_ibu           = $data_siswa->tahun_lahir_ibu;
                $datasiswa_system->pendidikan_ibu            = $data_siswa->pendidikan_ibu;
                $datasiswa_system->pekerjaan_ibu             = $data_siswa->pekerjaan_ibu;
                $datasiswa_system->penghasilan_bulanan_ibu   = $data_siswa->penghasilan_bulanan_ibu;
                $datasiswa_system->nik_Ibu                   = $data_siswa->nik_Ibu;
                $datasiswa_system->nama_wali                 = $data_siswa->nama_wali;
                $datasiswa_system->tahun_lahir_wali          = $data_siswa->tahun_lahir_wali;
                $datasiswa_system->pendidikan_wali           = $data_siswa->pendidikan_wali;
                $datasiswa_system->pekerjaan_wali            = $data_siswa->pekerjaan_wali;
                $datasiswa_system->penghasilan_bulanan_wali  = $data_siswa->penghasilan_bulanan_wali;
                $datasiswa_system->nik_wali                  = $data_siswa->nik_wali;
                $datasiswa_system->no_seri_ijazah            = $data_siswa->no_seri_ijazah;
                $datasiswa_system->kip                       = $data_siswa->kip;
                $datasiswa_system->nomor_kip                 = $data_siswa->nomor_kip;
                $datasiswa_system->nama_kip                  = $data_siswa->nama_kip;
                $datasiswa_system->nomor_kks                 = $data_siswa->nomor_kks;
                $datasiswa_system->akta_kelahiran            = $data_siswa->akta_kelahiran;
                $datasiswa_system->bank                      = $data_siswa->bank;
                $datasiswa_system->no_rekening               = $data_siswa->no_rekening;
                $datasiswa_system->rekening_atas_nama        = $data_siswa->rekening_atas_nama;
                $datasiswa_system->alasan_layak_pip          = $data_siswa->alasan_layak_pip;
                $datasiswa_system->berkebutuhan_khusus       = $data_siswa->berkebutuhan_khusus;
                $datasiswa_system->asal_sekolah              = $data_siswa->asal_sekolah;
                $datasiswa_system->anak_keberapa             = $data_siswa->anak_keberapa;
                $datasiswa_system->berat_badan               = $data_siswa->berat_badan;
                $datasiswa_system->tinggi_badan              = $data_siswa->tinggi_badan;
                $datasiswa_system->saudara_kandung           = $data_siswa->saudara_kandung;
                $datasiswa_system->jarak_tempat              = $data_siswa->jarak_tempat;
                $datasiswa_system->penerima_kps_pkh          = $data_siswa->penerima_kps_pkh;
                $datasiswa_system->tahun_ajaran              = $data_siswa->tahun_ajaran;
                $datasiswa_system->tanggal_pendaftaran       = $data_siswa->tanggal_pendaftaran;
                $datasiswa_system->status_siswa              = $data_siswa->status_siswa;
                $datasiswa_system->no_formulir               = $data_siswa->no_formulir;
                $datasiswa_system->kitas                     = $data_siswa->kitas;
                $datasiswa_system->kewarganegaraan           = $data_siswa->kewarganegaraan;
                $datasiswa_system->nama_negara               = $data_siswa->nama_negara;
                $datasiswa_system->no_kph_pkh                = $data_siswa->no_kph_pkh;
                $datasiswa_system->usulan_dari_sekolah       = $data_siswa->usulan_dari_sekolah;
                $datasiswa_system->kartu_KIP                 = $data_siswa->kartu_KIP;
                $datasiswa_system->berkebutuhan_khusus_ayah  = $data_siswa->berkebutuhan_khusus_ayah;
                $datasiswa_system->berkebutuhan_khusus_ibu   = $data_siswa->berkebutuhan_khusus_ibu;
                $datasiswa_system->jenis_ekstrakulikuler     = $data_siswa->jenis_ekstrakulikuler;
                $datasiswa_system->waktu_tempuh              = $data_siswa->waktu_tempuh;
                $datasiswa_system->berkebutuhan_khusus_2     = $data_siswa->berkebutuhan_khusus_2;
                $datasiswa_system->nama_kelurahan_2          = $data_siswa->nama_kelurahan_2;
                $datasiswa_system->jurusan                   = $data_siswa->jurusan;
                $datasiswa_system->jenis_pendaftaran         = $data_siswa->jenis_pendaftaran;
                $datasiswa_system->nis                       = $data_siswa->nis;
                $datasiswa_system->tanggal_masuk_sekolah     = $data_siswa->tanggal_masuk_sekolah;
                $datasiswa_system->nomor_peserta_ujian       = $data_siswa->nomor_peserta_ujian;
                $datasiswa_system->keluar_karena             = $data_siswa->keluar_karena;
                $datasiswa_system->tanggal_keluar            = $data_siswa->tanggal_keluar;
                $datasiswa_system->alasan                    = $data_siswa->alasan;
                $datasiswa_system->persetujuan               = $data_siswa->persetujuan;
                $datasiswa_system->jenis_1                   = $data_siswa->jenis_1;
                $datasiswa_system->tingkat_1                 = $data_siswa->tingkat_1;
                $datasiswa_system->nama_prestasi_1           = $data_siswa->nama_prestasi_1;
                $datasiswa_system->tahun_1                   = $data_siswa->tahun_1;
                $datasiswa_system->penyelenggara_1           = $data_siswa->penyelenggara_1;
                $datasiswa_system->jenis_2                   = $data_siswa->jenis_2;
                $datasiswa_system->tingkat_2                 = $data_siswa->tingkat_2;
                $datasiswa_system->nama_prestasi_2           = $data_siswa->nama_prestasi_2;
                $datasiswa_system->tahun_2                   = $data_siswa->tahun_2;
                $datasiswa_system->penyelenggara_2           = $data_siswa->penyelenggara_2;
                $datasiswa_system->jenis_3                   = $data_siswa->jenis_3;
                $datasiswa_system-> tingkat_3                = $data_siswa->tingkat_3;
                $datasiswa_system->nama_prestasi_3           = $data_siswa->nama_prestasi_3;
                $datasiswa_system->tahun_3                   = $data_siswa->tahun_3;
                $datasiswa_system->penyelenggara_3           = $data_siswa->penyelenggara_3;
                $datasiswa_system->jenis_1_0                 = $data_siswa->jenis_1_0;
                $datasiswa_system->keterangan_1              = $data_siswa->keterangan_1;
                $datasiswa_system->tahun_mulai_1             = $data_siswa->tahun_mulai_1;
                $datasiswa_system->tahun_selesai_1           = $data_siswa->tahun_selesai_1;
                $datasiswa_system->jenis_2_0                 = $data_siswa->jenis_2_0;
                $datasiswa_system->keterangan_2              = $data_siswa->keterangan_2;
                $datasiswa_system->tahun_mulai_2             = $data_siswa->tahun_mulai_2;
                $datasiswa_system->tahun_selesai_2           = $data_siswa->tahun_selesai_2;
                $datasiswa_system->jenis_3_0                 = $data_siswa->jenis_3_0;
                $datasiswa_system->keterangan_3              = $data_siswa->keterangan_3;
                $datasiswa_system->tahun_mulai_3             = $data_siswa->tahun_mulai_3;
                $datasiswa_system->tahun_selesai_3           = $data_siswa->tahun_selesai_3;
                $datasiswa_system->sekolah                   = $data_siswa->sekolah;
                $datasiswa_system->unit                      = $data_siswa->unit;
                $datasiswa_system->input_by                  = $data_siswa->input_by;
                $datasiswa_system->created_at                = $data_siswa->created_at;
                $datasiswa_system->updated_at                = $data_siswa->updated_at;
                $datasiswa_system->save();

                

                $data_siswa2 = Data_siswa2::where('ppdb_id', $ppdb->id)->first(); 
                        //data siswa 2   
                
                $data_siswa2->kode_registrasi      = $ppdb->document_no;
                $data_siswa2->unit                 = $request->unit;
                $data_siswa2->sekolah              = $request->sekolah;
                $data_siswa2->kelas_utama          = $request->kelas_utama;
                $data_siswa2->sub_kelas            = $request->sub_kelas;
                $data_siswa2->nama_kepala_sekolah  = $request->nama_kepala_sekolah;
                $data_siswa2->nama_wali_kelas      = $request->nama_wali_kelas;

                $data_siswa2->nama_wali_kelas_2    = $request->nama_wali_kelas_2;

                $data_siswa2->nisn                 = $request->nisn;
                $data_siswa2->nik_siswa            = $request->nik_siswa;
                $data_siswa2->status_siswa         = $request->status_siswa;
                $data_siswa2->keterangan           = $request->keterangan;
                $data_siswa2->save();
    
                $data_kelas = new Data_kelas;
                $data_kelas->ppdb_id              = $ppdb->id;
                $data_kelas->kode_registrasi      = $ppdb->document_no;
                $data_kelas->unit                 = $request->unit;
                $data_kelas->sekolah              = $request->sekolah;
                $data_kelas->kelas_utama          = $request->kelas_utama;
                $data_kelas->sub_kelas            = $request->sub_kelas;
                $data_kelas->nama_kepala_sekolah  = $request->nama_kepala_sekolah;
                $data_kelas->nama_wali_kelas      = $request->nama_wali_kelas;

                $data_kelas->nama_wali_kelas_2    = $request->nama_wali_kelas_2;

                $data_kelas->nisn                 = $request->nisn;
                $data_kelas->nik_siswa            = $request->nik_siswa;
                $data_kelas->status_siswa         = $request->status_siswa;
                $data_kelas->keterangan           = $request->keterangan;
                $data_kelas->save();

                $data_siswa_system_2 = new Data_siswa_system_2();

                $data_siswa_system_2->id                                = $data_siswa2->id;
                $data_siswa_system_2->ppdb_id                           = $data_siswa2->ppdb_id;
                $data_siswa_system_2->email                             = $data_siswa2->email;
                $data_siswa_system_2->nama_orang_tua                    = $data_siswa2->nama_orang_tua;
                $data_siswa_system_2->alamat_orang_tua                  = $data_siswa2->alamat_orang_tua;
                $data_siswa_system_2->uang_pangkal_up_2                 = $data_siswa2->uang_pangkal_up_2;
                $data_siswa_system_2->spp_bulan_juli_2023               = $data_siswa2->spp_bulan_juli_2023;
                $data_siswa_system_2->spp_setiap_bulan                  = $data_siswa2->spp_setiap_bulan;
                $data_siswa_system_2->sudah_melaksanakan_tes            = $data_siswa2->sudah_melaksanakan_tes;
                $data_siswa_system_2->diterima_di_sekolah_negeri        = $data_siswa2->diterima_di_sekolah_negeri;
                $data_siswa_system_2->sudah_bersekolah_di_avicenna      = $data_siswa2->sudah_bersekolah_di_avicenna;
                $data_siswa_system_2->sudah_bersekolah_di_avicenna_2    = $data_siswa2->sudah_bersekolah_di_avicenna_2;
                $data_siswa_system_2->tata_tertib_sekolah               = $data_siswa2->tata_tertib_sekolah;
                $data_siswa_system_2->aktivitas_foto_video              = $data_siswa2->aktivitas_foto_video;
                $data_siswa_system_2->didik_diijinkan                   = $data_siswa2->didik_diijinkan;
                $data_siswa_system_2->baca_dan_pahami                   = $data_siswa2->baca_dan_pahami;
                $data_siswa_system_2->nama_calon_murid                  = $data_siswa2->nama_calon_murid;
                $data_siswa_system_2->kelas                             = $data_siswa2->kelas;
                $data_siswa_system_2->persetujuan_tata_tertib           = $data_siswa2->persetujuan_tata_tertib;
                $data_siswa_system_2->jasmani                           = $data_siswa2->jasmani;
                $data_siswa_system_2->laki_laki                         = $data_siswa2->laki_laki;
                $data_siswa_system_2->perempuan                         = $data_siswa2->perempuan;
                $data_siswa_system_2->tempat_lahir                      = $data_siswa2->tempat_lahir;
                $data_siswa_system_2->tanggal_lahir                     = $data_siswa2->tanggal_lahir;
                $data_siswa_system_2->berat_badan                       = $data_siswa2->berat_badan;
                $data_siswa_system_2->tinggi_badan                      = $data_siswa2->tinggi_badan;
                $data_siswa_system_2->golongan_darah                    = $data_siswa2->golongan_darah;
                $data_siswa_system_2->catatan_imunisasi                 = $data_siswa2->catatan_imunisasi;
                $data_siswa_system_2->imunisasi                         = $data_siswa2->imunisasi;
                $data_siswa_system_2->imunisasi_lengkap                 = $data_siswa2->imunisasi_lengkap;
                $data_siswa_system_2->gangguan_dan_kelainan             = $data_siswa2->gangguan_dan_kelainan;
                $data_siswa_system_2->tidak_ada_gangguan                = $data_siswa2->tidak_ada_gangguan;
                $data_siswa_system_2->berbahaya                         = $data_siswa2->berbahaya;
                $data_siswa_system_2->tidak_berbahaya                   = $data_siswa2->tidak_berbahaya;
                $data_siswa_system_2->kode_registrasi                   = $data_siswa2->kode_registrasi;
                $data_siswa_system_2->unit                              = $data_siswa2->unit;
                $data_siswa_system_2->sekolah                           = $data_siswa2->sekolah;
                $data_siswa_system_2->kelas_utama                       = $data_siswa2->kelas_utama;
                $data_siswa_system_2->sub_kelas                         = $data_siswa2->sub_kelas;
                $data_siswa_system_2->nama_kepala_sekolah               = $data_siswa2->nama_kepala_sekolah;
                $data_siswa_system_2->nama_wali_kelas                   = $data_siswa2->nama_wali_kelas;
                $data_siswa_system_2->nama_wali_kelas_2                 = $data_siswa2->nama_wali_kelas_2;
                $data_siswa_system_2->nisn                              = $data_siswa2->nisn;
                $data_siswa_system_2->nik_siswa                         = $data_siswa2->nik_siswa;
                $data_siswa_system_2->status_siswa                      = $data_siswa2->status_siswa;
                $data_siswa_system_2->keterangan                        = $data_siswa2->keterangan;
                $data_siswa_system_2->show_table                        = $data_siswa2->show_table;
                $data_siswa_system_2->updated_at                        = $data_siswa2->updated_at;
                $data_siswa_system_2->updated_by                        = $data_siswa2->updated_by;
                $data_siswa_system_2->created_at                        = $data_siswa2->created_at;
                $data_siswa_system_2->save();

                $data_siswa3 = Data_siswa3::where('ppdb_id', $ppdb->id)->first(); 

                $data_siswa_system_3                                = new Data_siswa_system_3();
        
                $data_siswa_system_3->ppdb_id                       = $data_siswa3->ppdb_id;
                $data_siswa_system_3->yang_lain                     = $data_siswa3->yang_lain;
                $data_siswa_system_3->normal_tidak_gangguan         = $data_siswa3->normal_tidak_gangguan;
                $data_siswa_system_3->kompilasi_ketika_melahirkan   = $data_siswa3->kompilasi_ketika_melahirkan;
                $data_siswa_system_3->tidak_ada_cacat               = $data_siswa3->tidak_ada_cacat;
                $data_siswa_system_3->cacat_bawaan                  = $data_siswa3->cacat_bawaan;
                $data_siswa_system_3->normal_1                      = $data_siswa3->normal_1;
                $data_siswa_system_3->terlambat_1                   = $data_siswa3->terlambat_1;
                $data_siswa_system_3->normal_2                      = $data_siswa3->normal_2;
                $data_siswa_system_3->terlambat_2                   = $data_siswa3->terlambat_2;
                $data_siswa_system_3->normal_3                      = $data_siswa3->normal_3;
                $data_siswa_system_3->terlambat_3                   = $data_siswa3->terlambat_3;
                $data_siswa_system_3->normal_4                      = $data_siswa3->normal_4;
                $data_siswa_system_3->terlambat_4                   = $data_siswa3->terlambat_4;
                $data_siswa_system_3->normal_5                      = $data_siswa3->normal_5;
                $data_siswa_system_3->terlambat_5                   = $data_siswa3->terlambat_5;
                $data_siswa_system_3->ada                           = $data_siswa3->ada;
                $data_siswa_system_3->tidak_ada                     = $data_siswa3->tidak_ada;
                $data_siswa_system_3->ya_pernah                     = $data_siswa3->ya_pernah;
                $data_siswa_system_3->tidak_pernah                  = $data_siswa3->tidak_pernah;
                $data_siswa_system_3->ya_riwayat_kejang             = $data_siswa3->ya_riwayat_kejang;
                $data_siswa_system_3->riwayat_penyakit_diderita     = $data_siswa3->riwayat_penyakit_diderita;
                $data_siswa_system_3->rawat_rumah_sakit             = $data_siswa3->rawat_rumah_sakit;
                $data_siswa_system_3->catatan_lain                  = $data_siswa3->catatan_lain;
                $data_siswa_system_3->sekolah_asal                  = $data_siswa3->sekolah_asal;
                $data_siswa_system_3->brand                         = $data_siswa3->brand;
                $data_siswa_system_3->kegiatan_sekolah              = $data_siswa3->kegiatan_sekolah;
                $data_siswa_system_3->media_cetak                   = $data_siswa3->media_cetak;    
                $data_siswa_system_3->media_elektronik              = $data_siswa3->media_elektronik;
                $data_siswa_system_3->media_sosial                  = $data_siswa3->media_sosial;
                $data_siswa_system_3->created_at                    = $data_siswa3->created_at;
                $data_siswa_system_3->save();


                $data_siswa4 = Data_siswa4::where('ppdb_id', $ppdb->id)->first();

                $satu_km_jarak                  = Data_siswa4::select(['1km_jarak'])->where('ppdb_id', $ppdb->id)->first();   
                $satu_sampai_lima_km            = Data_siswa4::select(['1_sampai_5km'])->where('ppdb_id', $ppdb->id)->first(); 
                $enam_sampai_sepuluh_km         = Data_siswa4::select(['6_sampai_10km'])->where('ppdb_id', $ppdb->id)->first();
                $eleven_sampai_twentykm         = Data_siswa4::select(['11_sampai_20km'])->where('ppdb_id', $ppdb->id)->first();
                $twentyone_sampai_thirdtykm     = Data_siswa4::select(['21_sampai_30km'])->where('ppdb_id', $ppdb->id)->first();

                $values = array(
                    'id'                                =>  $data_siswa4->id,
                    'ppdb_id'                           =>  $data_siswa4->ppdb_id,
                    'media_sosial_2'                    =>  $data_siswa4->media_sosial_2,
                    'program_sekolah'                   =>  $data_siswa4->program_sekolah,
                    'fasilitas_pelayanan'               =>  $data_siswa4->fasilitas_pelayanan,
                    'jarak'                             =>  $data_siswa4->jarak,
                    'uang_sekolah_terjangkau'           =>  $data_siswa4->uang_sekolah_terjangkau,
                    'fasilitas_lengkap'                 =>  $data_siswa4->fasilitas_lengkap,
                    'kebersihan'                        =>  $data_siswa4->kebersihan,
                    'pelayanan_informasi'               =>  $data_siswa4->pelayanan_informasi,
                    'tenaga_pendidik_kompeten'          =>  $data_siswa4->tenaga_pendidik_kompeten,
                    'tidak_pilih_fasilitas_pelayanan'   =>  $data_siswa4->tidak_pilih_fasilitas_pelayanan,
                    '1km_jarak'                         =>  $satu_km_jarak[0],
                    '1_sampai_5km'                      =>  $satu_sampai_lima_km[0],
                    '6_sampai_10km'                     =>  $enam_sampai_sepuluh_km[0],
                    '11_sampai_20km'                    =>  $eleven_sampai_twentykm[0],
                    '21_sampai_30km'                    =>  $twentyone_sampai_thirdtykm[0],
                    'tidak_pilih_jarak'                 =>  $data_siswa4->tidak_pilih_jarak,
                    'uang_pangkal'                      =>  $data_siswa4->uang_pangkal,
                    'spp'                               =>  $data_siswa4->spp,
                    'tanda_biaya_tambahan'              =>  $data_siswa4->tanda_biaya_tambahan,
                    'tidak_terjangkau'                  =>  $data_siswa4->tidak_terjangkau,
                    'sederhana_dan_mudah'               =>  $data_siswa4->sederhana_dan_mudah,
                    'standar_sama'                      =>  $data_siswa4->standar_sama,
                    'berbelit_belit'                    =>  $data_siswa4->berbelit_belit,
                    'tidak_murah'                       =>  $data_siswa4->tidak_murah,
                    'merepotkan'                        =>  $data_siswa4->merepotkan,
                    'pendapat_saya'                     =>  $data_siswa4->pendapat_saya,
                    'program_7_habits'                  =>  $data_siswa4->program_7_habits,
                    'prestasi_sekolah'                  =>  $data_siswa4->prestasi_sekolah,
                    'ekstrakulikuler'                   =>  $data_siswa4->ekstrakulikuler,
                    'booster_1'                         =>  $data_siswa4->booster_1,
                    'booster_2'                         =>  $data_siswa4->booster_2,
                    'booster_3'                         =>  $data_siswa4->booster_3,
                    'belum_vaksin'                      =>  $data_siswa4->belum_vaksin,
                    'created_at'                        =>  $data_siswa4->created_at           
                );


                $data_siswa_system_4  = new Data_siswa_system_4();
                $data_siswa_system_4->insert($values);

                                                    
                


            
                

                debug($ppdb);

                debug($data_siswa);

                return redirect()->back()->with(['flash_success' => 'Sudah Berhasil di Edit di Master']);

    }

    /**
     * @param \App\Models\PPDB $ppdb
     * @param \App\Http\Requests\Backend\PPDB\PPDBPermissionRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function showClasses(PPDBPermissionRequest $request) {

        $data_kelas_update = Data_kelas::where('id',$request->id_classes)->first();      
        $data_kelas_update->show_table = 1;
        if($request->aktivasi == false)
        {
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
        $data_kelas_update->nik_siswa            = $request->nik_siswa;
        $data_kelas_update->status_siswa         = $request->status_siswa;
        $data_kelas_update->keterangan           = $request->keterangan;
        $data_kelas_update->save();

        return redirect()->back()->with(['flash_success' => 'cek testing']);;

    }

     /**
     * @param \App\Models\PPDB $ppdb
     * @param \App\Http\Requests\Backend\PPDB\PPDBPermissionRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function cekHistory($id) {

        $ppdb       = PPDB::where('id', $id)->first();
        $data_kelas = Data_kelas::where('ppdb_id', $id)->first();
        $data_kelas_for = Data_kelas::where('ppdb_id', $id)->get();

        return new ViewResponse('backend.ppdb.cekhistory', 
        [
            'data_kelas'            => $data_kelas,
            'ppdb'                  => $ppdb,
            'data_kelas_for'        => $data_kelas_for
        ]);
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
