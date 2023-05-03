<?php

namespace App\Http\Controllers\Frontend\School;

use Mail;
use Error;
use Carbon\Carbon;
use App\Models\PPDB;
use App\Models\School;
use App\Models\EnumData;
use App\Models\Auth\Role;
use App\Models\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ConfirmationPayment;
use App\Http\Controllers\Controller;
use App\Models\RegistrationSchedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Repositories\Frontend\Auth\UserRepository;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use App\Http\Requests\Frontend\School\PPDBRequest;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\RedirectResponse;

use App\Repositories\Backend\PPDBRepository;

// use Illuminate\Database\Seeder;
// use Faker\Factory as Faker;

class PPDBController extends Controller
{
    use RegistersUsers;

    /**
     * @var \App\Repositories\Backend\PPDBRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\PPDBRepository $faq
     */
    public function __construct(PPDBRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $user = new User();
        $carbon = Carbon::now();
        $registration_schedules = RegistrationSchedule::whereDate('date_to', '>=', $carbon)
            ->get();

        $registration_schedule = RegistrationSchedule::whereDate('date_from', '<=', $carbon)
            ->whereDate('date_to', '>=', $carbon)
            ->first();

        $schools = School::All();

        $enum_datas = EnumData::where('enum_group', 'SCHOOL_INFO')->orderBy('enum_order')->get();

        $file_uploaded = [
            ['name' => 'family_card', 'label' => 'Kartu Keluarga'],
            ['name' => 'birth_certificate', 'label' => 'Akte Kelahiran'],
            ['name' => 'last_report', 'label' => 'Raport Terakhir'],
            ['name' => 'academic_certificate', 'label' => 'Sertifikat Akademik'],
            ['name' => 'kia_book', 'label' => 'Buku KIA'],
        ];

        $file_additional = [
            ['name' => 'file_additional_satu', 'label' => 'File Additional Satu'],
            ['name' => 'file_additional_dua', 'label' => 'File Additional Dua'],
            ['name' => 'file_additional_tiga', 'label' => 'File Additional Tiga'],
            ['name' => 'file_additional_empat', 'label' => 'File Additional Empat'],
            ['name' => 'file_additional_lima', 'label' => 'File Additional Lima']
        ];

        $file_tingkat = [
            ['name' => 'tingkat_satu', 'label' => 'Tingkat Satu'],
            ['name' => 'tingkat_dua', 'label' => 'Tingkat Dua'],
            ['name' => 'tingkat_tiga', 'label' => 'Tingkat Tiga'],
            ['name' => 'tingkat_empat', 'label' => 'Tingkat Empat'],
            ['name' => 'tingkat_lima', 'label' => 'Tingkat Lima'],
        ];

        $file_deskripsi = [
            ['name' => 'deskripsi_satu', 'label' => 'Deskripsi Satu'],
            ['name' => 'deskripsi_dua', 'label' => 'Deskripsi Dua'],
            ['name' => 'deskripsi_tiga', 'label' => 'Deskripsi Tiga'],
            ['name' => 'deskripsi_empat', 'label' => 'Deskripsi Empat'],
            ['name' => 'deskripsi_lima', 'label' => 'Deskripsi Lima'],
        ];


        // $this->GeneratePPDBUser();

        return view('frontend.ppdb.index', compact('registration_schedules', 'registration_schedule', 'schools', 'enum_datas', 'file_uploaded', 'file_additional', 'file_tingkat', 'file_deskripsi'));
    }

    public function store(Request $request)
    {
        $errors = [];
        debug($request);

        try {
            $user_id = -1;

            if (auth()->check()) {
                $user_id = auth()->id();
                $user = auth()->user();
            } else {
                $user = User::where('email', $request->email)->first();

                if (!empty($user)) {
                    array_push($errors, 'Email sudah pernah terdaftar');
                }
            }

            $carbon = Carbon::now();

            if (!auth()->check()) {
                $user = User::where('email', $request->email)->first();

                if (!empty($user)) {
                    array_push($errors, 'Email sudah pernah terdaftar');
                }
            }

            $full_name = $request->first_name . ' ' . $request->last_name;

            if (empty($request->first_name) || empty($request->last_name)) {
                array_push($errors, 'Nama Depan dan Belakang wajib diisi');
            }

            $registration_schedule = RegistrationSchedule::whereDate('date_from', '<=', $carbon)
                ->whereDate('date_to', '>=', $carbon)
                ->first();

            if (empty($registration_schedule)) {
                array_push($errors, 'Belum ada jadwal registrasi');
            }

            if (empty($request->family_card)) {
                array_push($errors, 'Belum ada Kartu Keluarga yang di Unggah');
            }

            if (empty($request->birth_certificate)) {
                array_push($errors, 'Belum ada Akte Kelahiran yang di Unggah');
            }

            if (count($errors) < 1) {
                $count_pendaftaran = PPDB::where(DB::raw('YEAR(created_at)'), '=', date('Y'))->count();
                $ppdb_no = $request->school_site . '-' . $request->stage . '-' . date('Y') . (sprintf('%03d', $count_pendaftaran + 1));
                $guid = str_replace('-', '', strtolower($this->GUID()));

                DB::beginTransaction();

                if (!auth()->check()) {

                    $user = new user();
                    $user->first_name = $request->first_name;
                    $user->last_name = $request->last_name;
                    $user->email = $request->email;
                    $user->password = bcrypt($request->password);
                    $user->phone = $request->phone;
                    $user->confirmation_code = md5(uniqid(mt_rand(), true));
                    $user->confirmed = !(config('access.users.requires_approval') || config('access.users.confirm_email'));

                    if ($user->save()) {
                        //Attach new roles
                        if ($roles = Role::where('name', config('access.users.default_role'))->get()->pluck('id')->toArray()) {
                            $user->attachRoles($roles);
                        }

                        if (config('access.users.confirm_email')) {
                        }

                        $user_id = $user->id;
                        error_log(json_encode($user));
                    }
                }

                $ppdb = new PPDB();
                $ppdb->gaji = $request->gaji;
                $ppdb->registration_schedule_id = $registration_schedule->id;
                $ppdb->document_no = $ppdb_no;
                $ppdb->document_status = 0;
                $ppdb->id_user = $user_id;
                $ppdb->school_site = $request->school_site;
                $ppdb->stage = $request->stage;
                $ppdb->classes = $request->grade;
                $ppdb->student_status = $request->student_status;
                $ppdb->fullname = $request->fullname;
                $ppdb->gender = $request->gender;
                $ppdb->place_of_birth = $request->place_of_birth;
                $ppdb->date_of_birth = $request->date_of_birth;
                $ppdb->religion = $request->religion;
                $ppdb->nationality = $request->nationality;
                $ppdb->address = $request->address;
                $ppdb->home_phone = $request->home_phone;
                $ppdb->hand_phone = $request->phone;
                $ppdb->school_origin = $request->school_origin;
                $ppdb->medco_employee = $request->medco_employee;
                $ppdb->medco_employee_file = $request->medco_employee_file;        

                $ppdb->family_card = $request->family_card;
                $ppdb->birth_certificate = $request->birth_certificate;
                $ppdb->last_report = $request->last_report;
                $ppdb->academic_certificate = $request->academic_certificate;
                $ppdb->kia_book = $request->kia_book;


                //$ppdb->slip_gaji_father = $request->slip_gaji_father;
                $slip_gaji_parent = [];

                if ((!empty($request->slip_gaji_father) && $request->slip_gaji_father != "") || !empty($request->slip_gaji_mother) && $request->slip_gaji_mother != "") {
                    array_push($slip_gaji_parent, [
                        'slip_gaji_father'      => $request->slip_gaji_father,
                        'slip_gaji_mother'      => $request->slip_gaji_mother,
                    ]);
                }

                $data_parent = [];
                
                if ((!empty($request->name_father) && $request->name_father != "") || !empty($request->name_mother) && $request->name_mother != "") {
                    array_push($data_parent, [
                        'name_father'      => $request->name_father,
                        'name_mother'      => $request->name_mother,
                    ]);
                }

                $work_parent = [];

                if ((!empty($request->name_work_father) && $request->name_work_father != "") || !empty($request->name_work_mother) && $request->name_work_mother != "") {
                    array_push($work_parent, [
                        'name_work_father'  => $request->name_work_father,
                        'name_work_mother'  => $request->name_work_mother,
                    ]);
                }

                $place_work_parent = [];

                if ((!empty($request->place_work_father) && $request->place_work_father != "") || !empty($request->place_work_mother) && $request->place_work_mother != "") {
                    array_push($place_work_parent, [
                        'place_work_father' => $request->place_work_father,
                        'place_work_mother' => $request->place_work_mother
                    ]);        
                }

                $title_work_parent = [];

                if ((!empty($request->title_work_father) && $request->title_work_father != "") || !empty($request->title_work_mother) && $request->title_work_mother != "") {
                    array_push($title_work_parent, [
                        'title_work_father' => $request->title_work_father,
                        'title_work_mother' => $request->title_work_mother
                    ]);        
                }

                $income_work_parent = [];

                if (((!empty($request->income_work_father) && $request->income_work_father != "") || !empty($request->income_work_mother) && $request->income_work_mother != "") || 
                     (!empty($request->gaji_tetap_ayah) && $request->gaji_tetap_ayah != "") || !empty($request->gaji_tetap_ibu) && $request->gaji_tetap_ibu != "") {
                    array_push($income_work_parent, [
                        'income_work_father' => $request->income_work_father,
                        'income_work_mother' => $request->income_work_mother,
                        'gaji_tetap_ayah'   => $request->gaji_tetap_ayah,
                        'gaji_tetap_ibu'    => $request->gaji_tetap_ibu
                    ]);        
                }

                $file_additionals = [];

                if(!empty($request->file_additional_satu) && $request->file_additional_satu != ""){
                    array_push($file_additionals, [
                        'file'      => $request->file_additional_satu,
                        'tingkat'   => $request->tingkat_satu,
                        'deskripsi' => $request->deskripsi_satu,
                    ]);
                }

                if(!empty($request->file_additional_dua) && $request->file_additional_dua != ""){
                    array_push($file_additionals, [
                        'file'      => $request->file_additional_dua,
                        'tingkat'   => $request->tingkat_dua,
                        'deskripsi' => $request->deskripsi_dua,
                    ]);
                }

                if(!empty($request->file_additional_tiga) && $request->file_additional_tiga != ""){
                    array_push($file_additionals, [
                        'file'      => $request->file_additional_tiga,
                        'tingkat'   => $request->tingkat_tiga,
                        'deskripsi' => $request->deskripsi_tiga,
                    ]);
                }

                if(!empty($request->file_additional_empat) && $request->file_additional_empat != ""){
                    array_push($file_additionals, [
                        'file'      => $request->file_additional_empat,
                        'tingkat'   => $request->tingkat_empat,
                        'deskripsi' => $request->deskripsi_empat,
                    ]);
                }

                if(!empty($request->file_additional_lima) && $request->file_additional_lima != ""){
                    array_push($file_additionals, [
                        'file'      => $request->file_additional_lima,
                        'tingkat'   => $request->tingkat_lima,
                        'deskripsi' => $request->deskripsi_lima,
                    ]);
                }

                $ppdb->file_additional       = json_encode($file_additionals);

                $ppdb->file_additional_satu  = json_encode($data_parent);

                $ppdb->file_additional_dua   = json_encode($work_parent);

                $ppdb->file_additional_tiga  = json_encode($place_work_parent);

                $ppdb->file_additional_empat = json_encode($title_work_parent);

                $ppdb->file_additional_lima  = json_encode($income_work_parent);

                $ppdb->slip_gaji_parent  = json_encode($slip_gaji_parent);

                $ppdb->status_siswa = $request->status_siswa;  //add new
                $ppdb->save();

                if (!auth()->check()) {
                    $link = route('frontend.auth.account.confirm', $user->confirmation_code);
                    $this->MessageBlast($request->phone, $full_name, $request->email, $link);
                }

                DB::commit();

                return response()->json([
                    'is_success' => true,
                    'message' => 'Pendaftaran untuk ' . $full_name . ' Berhasil disimpan',
                    'errors' => [],
                ]);
            }

            return response()->json([
                'is_success' => false,
                'message' => $errors[0],
                'errors' => $errors,
            ]);
        } catch (\Exception $e) {
            // \Session::flash('gagal', 'Maaf No tersebut sudah pernah di daftarkan');
            debug($e->getMessage());
            // error_log($request);

            return response()->json([
                'is_success' => false,
                'message' => 'Pendaftaran Tidak berhasil',
                'errors' => $e->getMessage(),
            ]);
        }
    }

    public function user()
    {
        return redirect()->intended(route('frontend.ppdb'));
    }

    /**
     * @param \App\Models\School $ppdb
     * @param \App\Http\Requests\Backend\School\PPDBRequest $request
     *
     * @return ViewResponse
     */
    public function paymentFormulir($id)
    {
        $user = auth()->user();
        $banks = EnumData::where('enum_group', 'BANK')->orderBy('enum_order')->get();

        $ppdb = PPDB::where([
            ['id',      '=', $id],
            ['id_user', '=', $user->id],
        ])->first();

        debug(json_encode($ppdb));


        return new ViewResponse('frontend.ppdb.payment', ['user' => $user, 'banks' => $banks, 'ppdb' => $ppdb]);
    }

    public function postPaymentFormulir(PPDB $ppdb, PPDBRequest $request)
    {
        // debug($request->input());
        $this->repository->uploadFormulir($ppdb, $request);
        // return new ViewResponse('frontend.ppdb.payment');
        return new RedirectResponse(route('frontend.user.dashboard'), ['flash_success' => ' The payment formulir was successfully upload.']);
        
        // return new RedirectResponse(route('frontend.user.ppdb.payment.formulir', 1), ['flash_success' => __('alerts.backend.faqs.updated')]);

        //   if (!empty($user)) {
        //     $ppdb = PPDB::where([
        //       ['id_user',   '=', $user->id_user],
        //       ['is_verify', '=', 0]
        //     ])->first();



        //     try {
        //       DB::beginTransaction();
        //       $file = $request->file('photo');
        //       $gambar = '';


        //       if ($file) {
        //         $nama = rand() . $file->getClientOriginalName();
        //         $file->move('uploads', $nama);
        //         $gambar = $nama;
        //       }




        //       $confirm = new ConfirmationPayment();
        //       $confirm->nama_siswa = $ppdb->fullname;
        //       $confirm->ppdb_id = $ppdb->id;
        //       $confirm->date_send = date('Y-m-d H:i:s');
        //       $confirm->bank_owner_name = $request->nm_pengirim;
        //       $confirm->bank_code = $request->bank_id;
        //       $confirm->account_number = $request->account_number;
        //       $confirm->cost = $request->nominal;
        //       $confirm->image_confirmation = $gambar;
        //       $confirm->confirmation_status = 0;




        //       $confirm->save();


        //       User::where(['id_user' => $user->id_user])->update(['active' => 1]);
        //       DB::commit();
        //       \Session::flash('berhasil', 'Konfirmasi akun berhasil dilakukan, silahkan lakukan melakukan login.');
        //       return redirect('login');
        //     } catch (\Exception $e) {
        //       \Session::flash('gagal', $e->getMessage() . '-' . $e->getLine());
        //       return redirect()->back();
        //     }
        //   }


        //   return view('ppdb.confirmation', compact('user', 'banks'));
    }

    public function postConfirmation(Request $request, $token)
    {
        error_log($token);
        $banks = EnumData::where('enum_group', 'BANK')->orderBy('enum_order')->get();
        $user = User::where('remember_token', $token)->first();
        error_log($user->id_user);

        if (!empty($user)) {
            $ppdb = PPDB::where([
                ['id_user',   '=', $user->id_user],
                ['is_verify', '=', 0],
            ])->first();

            try {
                DB::beginTransaction();
                $file = $request->file('photo');
                $gambar = '';

                if ($file) {
                    $nama = rand() . $file->getClientOriginalName();
                    $file->move('uploads', $nama);
                    $gambar = $nama;
                }

                $confirm = new ConfirmationPayment();
                $confirm->nama_siswa = $ppdb->fullname;
                $confirm->ppdb_id = $ppdb->id;
                $confirm->date_send = date('Y-m-d H:i:s');
                $confirm->bank_owner_name = $request->nm_pengirim;
                $confirm->bank_code = $request->bank_id;
                $confirm->account_number = $request->account_number;
                $confirm->cost = $request->nominal;
                $confirm->image_confirmation = $gambar;
                $confirm->confirmation_status = 0;

                $confirm->save();

                User::where(['id_user' => $user->id_user])->update(['active' => 1]);
                DB::commit();
                \Session::flash('berhasil', 'Konfirmasi akun berhasil dilakukan, silahkan lakukan melakukan login.');

                return redirect('login');
            } catch (\Exception $e) {
                \Session::flash('gagal', $e->getMessage() . '-' . $e->getLine());

                return redirect()->back();
            }
        }

        return view('ppdb.confirmation', compact('user', 'banks'));
    }

    private function MessageBlast($phone, $name, $email, $link)
    {
        // $dt = User::where('id_registrasi',$id_reg)->first();

        $pesan = "Terima kasih telah melakukan Pendaftaran Peserta Didik Baru.\n\n";
        $pesan .= '- Nama : *' . $name . "*\n";
        $pesan .= '- Email : *' . $email . "*\n";
        $pesan .= '- Phone : *' . $phone . "*\n";
        $pesan .= "Setelah anda melakukan verifikasi pendaftaran, silakan ada melakukan login._ \n\n";
        $pesan .= "Lanjutkan untuk melengkapi biodata untuk Penerimaan Peserta Didik Baru : \n\n";
        $pesan .= "_Klik disini untuk melakukan verifikasi akun_ \n\n";
        $pesan = '<a href=' . $link . '>' . $link . '</a>';

        // $curl = curl_init();
        // $token = "4GImrUuLNSGGxjqyJjypHke8o2CHjILBUAg9xWHZ7U1dM6WsJH8uOwIbzj4YY46R";

        $data = [
            'phone' => $phone,
            'message' => $pesan,
        ];

        // error_log($link);

        $dataMail = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'link' => $link,
        ];

        Mail::send('email.register', $dataMail, function ($message) use ($dataMail) {
            $message->from('info@sekolah-avicenna.sch.id', 'Sekolah Avicenna');
            $message->to($dataMail['email']);
            $message->subject('Sekolah Avicenna PPDB | Penerimaan Peserta Didik Baru: Confirm your account');
        });
    }

    public function confirmation($id)
    {
        $ppdb = PPDB::where('id', $id)->first();
        $user = auth()->user();
        $banks = EnumData::where('enum_group', 'BANK')->orderBy('enum_order')->get();

        return view('frontend.ppdb.payment', compact('ppdb', 'user', 'banks'));
    }

    public function confirmationPost(Request $request)
    {
        $banks = EnumData::where('enum_group', 'BANK')->orderBy('enum_order')->get();
        $user = auth()->user();

        if (auth()->check()) {
            $ppdb = PPDB::where('id', $request->id)->first();

            try {
                DB::beginTransaction();
                $file = $request->file('photo');
                $gambar = '';

                if ($file) {
                    $nama = rand() . $file->getClientOriginalName();
                    $file->move('uploads', $nama);
                    $gambar = $nama;
                }

                $confirm = new ConfirmationPayment();
                $confirm->nama_siswa = $ppdb->fullname;
                $confirm->ppdb_id = $ppdb->id;
                $confirm->date_send = date('Y-m-d H:i:s');
                $confirm->bank_owner_name = $request->nm_pengirim;
                $confirm->bank_code = $request->bank_id;
                $confirm->account_number = $request->account_number;
                $confirm->cost = $request->nominal;
                $confirm->image_confirmation = $gambar;
                $confirm->confirmation_status = 0;
                $confirm->save();

                DB::commit();
                \Session::flash('berhasil', 'Konfirmasi akun berhasil dilakukan, silahkan lakukan melakukan login.');

                return redirect(route('frontend.user.dashboard'));
            } catch (\Exception $e) {
                \Session::flash('gagal', $e->getMessage() . '-' . $e->getLine());

                return redirect()->back();
            }
        }

        return view('frontend.ppdb.payment', compact('ppdb', 'user', 'banks'));
    }

    public function GUID()
    {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }


    // public function GeneratePPDBUser(){
    //     $carbon = Carbon::now();
    //     $roles = Role::where('name', config('access.users.default_role'))->get()->pluck('id')->toArray();
    //     $registration_schedule = RegistrationSchedule::whereDate('date_from', '<=', $carbon)
    //     ->whereDate('date_to', '>=', $carbon)
    //     ->first();

    //     $student_status = ['Peserta Didik Baru', 'Peserta Didik Pindahan'];

    //     $enum_datas = EnumData::where([
    //         ['enum_group', '=', 'SCHOOL_INFO'],
    //         ['enum_code', '<>', 'STAGE']
    //     ])->orderBy('enum_order')->get();

    //     // debug(count($enum_datas));
    //     debug($enum_datas);

    //     $faker  = Faker::create('id_ID');
    //     for($i=1; $i <= 200; $i++){

    //         $user = new user();
    //         $user->first_name = $faker->firstName;
    //         $user->last_name = $faker->lastName;
    //         $user->email = $faker->email;
    //         $user->password = bcrypt('p@ssw0rd123');
    //         $user->phone = $faker->phoneNumber;
    //         $user->confirmation_code = md5(uniqid(mt_rand(), true));
    //         $user->confirmed = ! (config('access.users.requires_approval') || config('access.users.confirm_email'));
    //         $user->save();
    //         $user->attachRoles($roles);


    //         $school_site = $enum_datas[rand(0, count($enum_datas)-1)];

    //         $count_pendaftaran = PPDB::where(DB::raw('YEAR(created_at)'), '=', date('Y'))->count();
    //         $ppdb_no = $school_site->enum_site.'-'.$school_site->enum_code.'-'.date('Y').(sprintf('%03d', $count_pendaftaran + 1));
    //         $guid = str_replace('-', '', strtolower($this->GUID()));

    //         $ppdb = new PPDB();
    //         $ppdb->registration_schedule_id = $registration_schedule->id;
    //         $ppdb->document_no = $ppdb_no;
    //         $ppdb->id_user = $user->id;
    //         $ppdb->school_site = $school_site->enum_site;
    //         $ppdb->stage = $school_site->enum_code;
    //         $ppdb->classes = $school_site->enum_value;
    //         $ppdb->student_status = 'Peserta Didik Baru';
    //         $ppdb->fullname = $user->first_name.' '.$user->last_name;
    //         $ppdb->gender = 'Laki-Laki';
    //         $ppdb->place_of_birth = 'Jakarta';
    //         $ppdb->date_of_birth = $faker->date($format = 'D-m-y', $max = '2012',$min = '1990');
    //         $ppdb->religion = 'ISLAM';
    //         $ppdb->nationality = 'WNI';
    //         $ppdb->address = $faker->address;
    //         $ppdb->home_phone = $faker->phoneNumber;
    //         $ppdb->hand_phone = $faker->phoneNumber;
    //         $ppdb->school_origin = '';
    //         $ppdb->family_card = '';
    //         $ppdb->birth_certificate = '';
    //         $ppdb->last_report = '';
    //         $ppdb->academic_certificate = '';
    //         $ppdb->kia_book = '';
    //         $ppdb->save();           


    //     }



    // }


}
