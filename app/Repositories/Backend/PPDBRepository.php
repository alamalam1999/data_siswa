<?php

namespace App\Repositories\Backend;

use Carbon\Carbon;
use Mail;
use App\Events\Backend\PPDB\PPDBCreated;
use App\Events\Backend\PPDB\PPDBDeleted;
use App\Events\Backend\PPDB\PPDBUpdated;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Http\Requests\Frontend\School\PPDBRequest;
use App\Http\Requests\Frontend\School\PPDBAdministrationRequest;
use App\Http\Requests\Backend\Payment\PaymentPermissionRequest;
use App\Http\Requests\Backend\PPDB\PPDBPermissionRequest;
use App\Http\Requests\Backend\Interview\InterviewPermissionRequest;

use App\Models\PPDB;
use App\Models\Payment;
use App\Models\School;
use App\Models\PPDBInterview;
use App\Models\Auth\User;

class PPDBRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = PPDB::class;

    /**
     * Sortable.
     *
     * @var array
     */
    private $sortable = [
        'id',
        'question',
        'answer',
        'status',
        'created_at',
        'updated_at',
    ];

    /**
     * Retrieve List.
     *
     * @var array
     * @return Collection
     */
    public function retrieveList(array $options = [])
    {
        $perPage = isset($options['per_page']) ? (int) $options['per_page'] : 20;
        $orderBy = isset($options['order_by']) && in_array($options['order_by'], $this->sortable) ? $options['order_by'] : 'created_at';
        $order = isset($options['order']) && in_array($options['order'], ['asc', 'desc']) ? $options['order'] : 'desc';
        $query = $this->query()
            ->orderBy($orderBy, $order);

        if ($perPage == -1) {
            return $query->get();
        }

        return $query->paginate($perPage);
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                'registration_schedule_id',
                'document_no',
                'id_user',
                'is_completed_bio',
                'is_completed_document',

                'school_site',
                'stage',
                'classes',
                'student_status',

                'fullname',
                'gender',
                'place_of_birth',
                'date_of_birth',
                'religion',
                'nationality',
                'address',
                'home_phone',
             
                'hand_phone',
                'school_origin',
                'family_card',
                'birth_certificate',
                'last_report',
                'academic_certificate',
                'kia_book',
            ]);
    }

    /**
     * @param array $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function create(array $input)
    {
        $input['created_by'] = auth()->user()->id;
        $input['status'] = $input['status'] ?? 0;

        if ($ppdb = PPDB::create($input)) {
            event(new PPDBCreated($ppdb));

            return $ppdb;
        }

        throw new GeneralException(__('exceptions.backend.ppdbs.create_error'));
    }

    /**
     * @param array $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function uploadFormulir(PPDB $ppdb, PPDBRequest $request)
    {
        debug($request->input('ppdb_id'));

        $user = auth()->user();
        $ppdb = PPDB::where([
            ['id',      '=', $request->input('ppdb_id')],
            ['id_user', '=', $user->id],
        ])->first();

        if (empty($ppdb)) throw new GeneralException('PPDB not found');

        $file = $request->file('photo');
        $gambar = '';

        if ($file) {
            $nama = rand() . $file->getClientOriginalName();

            $path_file = public_path('uploads') . '/ppdb/' . date('Y');
            $path_web_file = 'uploads/ppdb/' . date('Y');
            $file->move($path_file, $nama);
            $gambar = $path_web_file . '/' . $nama;
        }

        $confirm = Payment::where([
            ['ppdb_id',      '=', $ppdb->id],
            ['payment_type', '=', 'FEE_FORMULIR']
        ])->first();

        if (empty($confirm)) $confirm = new Payment();
        
        $confirm->ppdb_id = $ppdb->id;
        $confirm->payment_type = 'FEE_FORMULIR';
        $confirm->payment_code = '';
        $confirm->date_send = date('Y-m-d H:i:s');
        $confirm->bank_owner_name = $request['bank_owner_name'];
        $confirm->bank_code = $request['bank_code'];
        $confirm->account_number = $request['account_number'];
        $confirm->cost = $request['cost'];
        $confirm->image_confirmation = $gambar;
        $confirm->confirmation_status = 0;


        if ($confirm->save()) {
            $ppdb->document_status = 1;

            if ($ppdb->save()) {
                return $ppdb->fresh();
            }
        }



        throw new GeneralException(__('exceptions.backend.ppdbs.update_error'));
    }

    public function administrationPayment(PPDBAdministrationRequest $request)
    {
        $user = auth()->user();
        $ppdb = PPDB::where([
            ['id',      '=', $request->input('ppdb_id')],
            ['id_user', '=', $user->id],
        ])->first();

        if (empty($ppdb)) throw new GeneralException('PPDB not found');
        //medco_employee
        //medco_employee_file_input

        $file = $request->file('photo');
        $gambar = '';

        if ($file) {
            $nama = rand() . $file->getClientOriginalName();

            $path_file = public_path('uploads') . '/ppdb/' . date('Y');
            $path_web_file = 'uploads/ppdb/' . date('Y');
            $file->move($path_file, $nama);
            $gambar = $path_web_file . '/' . $nama;
        }

        $file_pengajuan = $request->file('medco_employee_file_input');
        $gambar_pengajuan = '';

        if ($file_pengajuan) {
            $nama2 = rand() . $file_pengajuan->getClientOriginalName();

            $path_file2 = public_path('uploads') . '/ppdb/' .date('Y');
            $path_web_file2 = 'uploads/ppdb/' . date('Y');
            $file_pengajuan->move($path_file2, $nama2);
            $gambar_pengajuan = $path_web_file2 . '/' . $nama2;
        }

        if (!empty($request['medco_employee']) && !empty($request->file('medco_employee_file_input'))) {
        $payment_pengajuan = Payment::where([
            ['ppdb_id', '=', $ppdb->id],
            ['payment_type', '=' ,'FEE_PENGAJUAN']
        ])->first();

        if (empty($payment_pengajuan)) $payment_pengajuan = new Payment();
        
        $payment_pengajuan->ppdb_id = $ppdb->id;
        $payment_pengajuan->payment_type = 'FEE_PENGAJUAN';
        $payment_pengajuan->payment_code = 'FEE_'.$ppdb->id.'_'.date('Time');
        $payment_pengajuan->date_send = date('Y-m-d H:i:s');
        $payment_pengajuan->bank_owner_name = $request['bank_owner_name'];
        $payment_pengajuan->bank_code = $request['bank_code'];
        $payment_pengajuan->account_number = $request['account_number'];
        $payment_pengajuan->cost = $request['medco_employee'];
        $payment_pengajuan->image_confirmation = $gambar_pengajuan;
        $payment_pengajuan->confirmation_status = 0;
        $payment_pengajuan->save();
        }

        $payment_total = Payment::where([
            ['ppdb_id', '=', $ppdb->id],
            ['payment_type', '=', 'FEE_TOTAL']
        ])->first();
        
        if (empty($payment_total)) $payment_total = new Payment();

        $payment_total->ppdb_id = $ppdb->id;
        $payment_total->payment_type = 'FEE_TOTAL';
        $payment_total->payment_code = '';
        $payment_total->date_send = date('Y-m-d H:i:s');
        $payment_total->bank_owner_name = $request['bank_owner_name'];
        $payment_total->bank_code = $request['bank_code'];
        $payment_total->account_number = $request['account_number'];
        $payment_total->cost = $request['cost'];
        $payment_total->image_confirmation = $gambar;
        $payment_total->confirmation_status = 0;
        $payment_total->save();

        $payment_up = Payment::where([
            ['ppdb_id', '=', $ppdb->id],
            ['payment_type', '=', 'FEE_UP']
        ])->first();
        
        if (empty($payment_up)) $payment_up = new Payment();

        $payment_up->ppdb_id = $ppdb->id;
        $payment_up->payment_type = 'FEE_UP';
        $payment_up->payment_code = $request['fee_up_type'];
        $payment_up->date_send = date('Y-m-d H:i:s');
        $payment_up->bank_owner_name = $request['bank_owner_name'];
        $payment_up->bank_code = $request['bank_code'];
        $payment_up->account_number = $request['account_number'];
        $payment_up->cost = $request['fee_up_amount'];
        $payment_up->image_confirmation = $gambar;
        $payment_up->confirmation_status = 0;
        $payment_up->save();

        $payment_spp = Payment::where([
            ['ppdb_id', '=', $ppdb->id],
            ['payment_type', '=', 'FEE_SPP']
        ])->first();
        
        if (empty($payment_spp)) $payment_spp = new Payment();

        $payment_spp->ppdb_id = $ppdb->id;
        $payment_spp->payment_type = 'FEE_SPP';
        $payment_spp->payment_code = $request['fee_spp_type'];
        $payment_spp->date_send = date('Y-m-d H:i:s');
        $payment_spp->bank_owner_name = $request['bank_owner_name'];
        $payment_spp->bank_code = $request['bank_code'];
        $payment_spp->account_number = $request['account_number'];
        $payment_spp->cost = $request['fee_spp_amount'];
        $payment_spp->image_confirmation = $gambar;
        $payment_spp->confirmation_status = 0;
        $payment_spp->save();

        $ppdb->document_status = 4;

        if ($ppdb->save()) {
            return $ppdb->fresh();
        }

        throw new GeneralException('Terjadi kesalahan saat melakukan konfirmasi');
    }


    public function progressPayment(PaymentPermissionRequest $request)
    {
        $payment = Payment::where('id', $request->id)->first();
        $ppdb = $payment->ppdb()->first();
        $message = '';

        if ($request->action == 'APPROVE') {

            if ($payment->payment_type == 'FEE_TOTAL') {
                Payment::where('ppdb_id', $payment->ppdb_id)
                    ->update(['confirmation_status' => 1,
                              'updated_by' => auth()->user()->id]);
                $ppdb->document_status = 5;
            }

            if ($payment->payment_type == 'FEE_FORMULIR') {
                $payment->confirmation_status = 1;
                $payment->save();

                $PPDBInterviewData = ['ppdb_id' => $ppdb->id];
                PPDBInterview::create($PPDBInterviewData);
                $ppdb->document_status = 2;

                $user = User::where('id', $ppdb->id_user)->first();
                $school = School::where('school_code', $ppdb->school_site)->first();

                $data_mail = [
                    'ppdb_no'           => $ppdb->document_no,
                    'name'              => $ppdb->fullname,
                    'email'             => $user->email,
                    'school'            => $school->school_name,
                    'stage_classes'     => $ppdb->stage . ' - '. $ppdb->classes,
                ];

                debug($data_mail);

                Mail::send('email.payment_formulir', $data_mail, function ($message) use ($data_mail) {
                    $message->from('info@sekolah-avicenna.sch.id', 'Sekolah Avicenna');
                    $message->to([
                        $data_mail['email']
                        ]);
                    $message->subject('Sekolah Avicenna PPDB | Formulir Pendaftaran Confirmation');
                });

            }
            
            $ppdb->save();
            $message = 'Payment has been Approved';
        }

        if ($request->action == 'REJECT') {
            if ($payment->payment_type == 'FEE_TOTAL') {
                Payment::where('ppdb_id', $payment->ppdb_id)
                    ->where('payment_type', 'FEE_FORMULIR')
                    ->update(['confirmation_status' => 9,
                              'updated_by' => auth()->user()->id]);
            }

            if ($payment->payment_type == 'FEE_FORMULIR') {
                $payment->confirmation_status = 2;
                $payment->save();
            }

            // REJECTED PPDB 
            $ppdb->rejected_at = Carbon::now()->timestamp;
            $ppdb->rejected_by = auth()->user()->id;
            $ppdb->save();
            $message = 'Payment has been Reject';
        }

        return [
            'is_success'    => true,
            'message'       => $message,
            'object'        => $payment
        ];
    }

    private function validationInterview(
        PPDB $ppdb, 
        PPDBInterview $ppdbInterview, 
        InterviewPermissionRequest $data)
    {
        $errors = [];
        if($data['is_submit']){

            if($ppdb->stage == "KB" || $ppdb->stage == "TK"){
                if(!($data['observasi_value'] > 0)) array_push($errors, "Nilai Hasil Observasi Siswa tidak boleh kosong");
                if(!(!empty($data['observasi_summary']) && $data['observasi_summary'] != "")) array_push($errors, "Ringkasan Hasil Observasi Siswa tidak boleh kosong");
                if(!(!empty($data['kesiapan_file']) && $data['observasi_file'] != "")) array_push($errors, "Upload hasil Akademik tidak boleh kosong");
                if(!($data['observasi_result'] != "" && $data['observasi_result'] > 0)) array_push($errors, "Hasil Observasi Harus dipilih");
            }


            if($ppdb->stage == "SD"){
                if(!($data['kesiapan_value'] > 0)) array_push($errors, "Hasil CPM (GRADE) tidak boleh kosong");
                if(!(!empty($data['kesiapan_file']) && $data['kesiapan_file'] != "")) array_push($errors, "Hasil CPM (GRADE) tidak boleh kosong");
                if(!($data['kesiapan_result'] != "" && $data['kesiapan_result'] > 0)) array_push($errors, "Hasil NST");
            }

        }

        return [
            'is_success'    => ( count($errors) > 0 ? false : true),
            'message'       => $errors
        ];

    }

    public function updateInterview(InterviewPermissionRequest $request)
    {
        $response_object = [];
        $is_success = false;
        $message = '';   
        $errors = [];     
        $is_submit = false;

        $data = $request->except('_token');
        debug($data);

        if(strtolower(strval($data['is_submit']))=='true') $is_submit = true;

        $data = $request->except('_token');
        $ppdb = PPDB::where('id', $data['ppdb_id'])->first();
        $ppdbInterview = PPDBInterview::where('ppdb_id', $data['ppdb_id'])->first();
        debug($ppdbInterview);



        $interview_code = 'interview-'.strtolower($ppdb->school_site).'-'.strtolower($ppdb->stage);
        $rnd_code = 'rnd-'.strtolower($ppdb->school_site).'-'.strtolower($ppdb->stage);

        $is_interviewer = false;
        $is_rnd = false;

        $interview_code = 'interview-'.strtolower($ppdb->school_site).'-'.strtolower($ppdb->stage);
        $rnd_code = 'rnd-'.strtolower($ppdb->school_site).'-'.strtolower($ppdb->stage);

        if(access()->allow($interview_code)) {
            $is_interviewer = true;
        }

        if(access()->allow($rnd_code)) {
            $is_rnd = true;
        }



        // $validation = $this->validationInterview($ppdb, $ppdbInterview, $request);
        // debug($validation);
        // if(!$validation['is_success']) return $validation;

        if($is_interviewer){



            if($is_submit){

                if(!(!empty($data['interview_parent_summary']) && $data['interview_parent_summary'] != "")) array_push($errors, "Ringkasan Hasil Wawancara Orang Tua Tidak Boleh Kosong");
                if(!(!empty($data['interview_parent_file']) && $data['interview_parent_file'] != "")) array_push($errors, "Upload Hasil Wawancara Tidak Boleh Kosong");
                if(!(!empty($data['interview_parent_result']) && $data['interview_parent_result'] != "" && $data['interview_parent_result'] > 0)) array_push($errors, "Hasil Wawancara Orang Tua Harus Dipilih");

                if($ppdb->stage == "KB" || $ppdb->stage == "TK" || $ppdb->stage == "SD"){
                    if(!($data['observasi_value'] > 0)) array_push($errors, "Nilai Hasil Observasi Siswa tidak boleh kosong");
                    if(!(!empty($data['observasi_summary']) && $data['observasi_summary'] != "")) array_push($errors, "Ringkasan Hasil Observasi Siswa Tidak Boleh Kosong");
                    if(!(!empty($data['observasi_file']) && $data['observasi_file'] != "")) array_push($errors, "Upload hasil Akademik Tidak Boleh Kosong");
                    if(!(!empty($data['observasi_result']) && $data['observasi_result'] != "" && $data['observasi_result'] > 0)) array_push($errors, "Hasil Observasi Harus Dipilih");
                }    

                if($ppdbInterview->school_recomendation_result == 0){
                    if(!(!empty($data['school_recomendation_file']) && $data['school_recomendation_file'] != "")) array_push($errors, "Upload Hasil Rekomendasi Sekolah Tidak Boleh Kosong");
                    if(!(!empty($data['school_recomendation_result']) && $data['school_recomendation_result'] != "" && $data['school_recomendation_result'] > 0)) array_push($errors, "Hasil rekomendasi sekolah harus dipilih");

                    if(!empty($data['school_recomendation_result']) && $data['school_recomendation_result'] != "" && $data['school_recomendation_result'] > 1) {
                        if(!(!empty($data['school_recomendation_note']) && $data['school_recomendation_note'] != "")) array_push($errors, "Note Rekomendasi Sekolah Tidak Boleh Kosong");
                    }
                }
            

            }





            if(count($errors) < 1){
                if(!empty($ppdbInterview)){
                    if ($ppdbInterview->update($data)) {
                        $response_object = $ppdbInterview->fresh();                

                        $is_success = true;
                        $message = 'Interview has been updated';
                    }
                }
            }
        }



        // if(!empty($ppdbInterview)){
        //     if ($ppdbInterview->update($data)) {
        //         $response_object = $ppdbInterview->fresh();                

        //         if(!empty($data['interview_result']) && $data['is_submit']){

        //             if($data['interview_result'] == 1){
        //                 $ppdb = PPDB::where('id', $ppdbInterview->ppdb_id)->first();
        //                 $ppdb->document_status = $ppdb->document_status + 1;
        //                 $ppdb->save();
        //                 $is_submit = true;
        //             }

        //             if($data['interview_result'] == 3){
        //                 $is_submit = true;
        //             }

        //             // if($data['interview_result'] == 2){
        //             //     $ppdb = PPDB::where('id', $ppdbInterview->ppdb_id)->first();
        //             //     $ppdb->document_status = ($ppdb->document_status + 1) * -1;
        //             //     $ppdb->rejected_at = Carbon::now();
        //             //     $ppdb->rejected_by = auth()->user()->id;
        //             //     $ppdb->save();
                        
        //             //     $is_submit = true;
        //             // }
        //         }

        //         $is_success = true;
        //         $message = 'Interview has been updated';
        //     }
        // }

        return [
            'is_success'    => $is_success,
            'is_submit'     => $is_submit,
            'message'       => $errors,
            'object'        => $data
        ];
    }

    public function updateRnD(InterviewPermissionRequest $request)
    {
        $response_object = [];
        $is_success = false;
        $message = '';   
        $errors = [];     
        $is_submit = false;

        $data = $request->except('_token');
        debug($data);
        $ppdb = PPDB::where('id', $data['ppdb_id'])->first();
        $ppdbInterview = PPDBInterview::where('ppdb_id', $data['ppdb_id'])->first();
        debug($ppdbInterview);

        $rnd_code = 'rnd-'.strtolower($ppdb->school_site).'-'.strtolower($ppdb->stage);

        if(access()->allow($rnd_code)) {
            if(!(!empty($data['interview_result_note']) && $data['interview_result_note'] != "")) array_push($errors, "Ringkasan Hasil Penilaian dan Rekomendasi dari R&D YPAP Tidak Boleh Kosong");
            if(!(!empty($data['interview_result_file']) && $data['interview_result_file'] != "")) array_push($errors, "Upload Hasil Penilaian dan Rekomendasi dari R&D YPAP Tidak Boleh Kosong");
            if(!(!empty($data['interview_result']) && $data['interview_result'] != "" && $data['interview_result'] > 0)) array_push($errors, "Hasil Penilaian dan Rekomendasi dari R&D YPAP Harus Dipilih");
        } else {
            array_push($errors, "Anda tidak mempunyai akses untuk mengirimkan hasil Penilaian dan Rekomendasi dari R&D YPAP");
        }

   
        if(count($errors) < 1){
            if(!empty($ppdbInterview)){
                $ppdbInterview->interview_result = $data['interview_result'];
                $ppdbInterview->interview_result_file = $data['interview_result_file'];
                $ppdbInterview->interview_result_note = $data['interview_result_note'];
                $ppdbInterview->is_submited = 0;

                if ($ppdbInterview->save()) {
                    $response_object = $ppdbInterview->fresh();                

                    $is_success = true;
                    $message = 'Interview has been updated';
                }
            }
        }



        return [
            'is_success'    => $is_success,
            'message'       => $errors,
            'object'        => $data
        ];
    }

    public function submit(InterviewPermissionRequest $request)
    {
        $response_object = [];
        $is_success = false;
        $message = '';   
        $errors = [];     
        $is_submit = false;

        $data = $request->except('_token');
        debug($data);
        $ppdb = PPDB::where('id', $data['ppdb_id'])->first();
        $ppdbInterview = PPDBInterview::where('ppdb_id', $data['ppdb_id'])->first();
        debug($ppdbInterview);

        $interview_code = 'interview-'.strtolower($ppdb->school_site).'-'.strtolower($ppdb->stage);
        // debug($interview_code);
        if(!access()->allow($interview_code)) {
            array_push($errors, "Anda tidak mempunyai akses untuk mengkonfirmasi hasil dari kelulusan calon anak didik");
        }

   
        if(count($errors) < 1){
            if(!empty($ppdbInterview)){
                $ppdbInterview->is_submited = 1;

                if ($ppdbInterview->save()) {

                    $result_interview = '';

                    if($ppdbInterview->interview_result == 1){
                        $ppdb->document_status = $ppdb->document_status + 1;                        
                        $result_interview_title = 'SELAMAT';
                        $result_interview = 'Calon peserta didik sudah Berhasil dalam Tes Seleksi';
                        
                    }

                    if($ppdbInterview->interview_result == 2){
                        
                        $ppdb->rejected_at = Carbon::now();
                        $ppdb->rejected_by = auth()->user()->id;
                        $result_interview_title = 'MAAF';
                        $result_interview = 'Calon peserta didik Belum berhasil dalam Tes Seleksi';
                    }

                    $user = User::where('id', $ppdb->id_user)->first();
                    $school = School::where('school_code', $ppdb->school_site)->first();
    
                    $data_mail = [
                        'ppdb_no'           => $ppdb->document_no,
                        'name'              => $ppdb->fullname,
                        'email'             => $user->email,
                        'school'            => $school->school_name,
                        'stage_classes'     => $ppdb->stage . ' - '. $ppdb->classes,
                        'result_interview_title' => $result_interview_title,
                        'result_interview'  => $result_interview
                    ];
    
                    debug($data_mail);
    
                    Mail::send('email.interview_result', $data_mail, function ($message) use ($data_mail) {
                        $message->from('info@sekolah-avicenna.sch.id', 'Sekolah Avicenna');
                        $message->to([
                            $data_mail['email']
                            ]);
                        $message->subject('Sekolah Avicenna PPDB | Formulir Pendaftaran Confirmation');
                    });


                    $ppdb->save();

                    $response_object = $ppdbInterview->fresh();        

                    
                    
                    

                    $is_success = true;
                    $message = 'Interview has been updated';
                }
            }
        }



        return [
            'is_success'    => $is_success,
            'message'       => $errors,
            'object'        => $data
        ];
    }

    /**
     * @param \App\Models\ppdb $ppdb
     * @param array $input
     */
    public function update(ppdb $ppdb, array $input)
    {
        $input['updated_by'] = auth()->user()->id;
        $input['status'] = $input['status'] ?? 0;

        if ($ppdb->update($input)) {
            event(new PPDBUpdated($ppdb));

            return $ppdb->fresh();
        }

        throw new GeneralException(__('exceptions.backend.ppdbs.update_error'));
    }


    /**
     * @param \App\Models\ppdb $ppdb
     * @param array $input
     */
    public function updateDiscountCode(ppdb $ppdb, array $input)
    {
        $ppdb = PPDB::where('id', $input['id'])->first();

        $update['updated_by'] = auth()->user()->id;
        $update['discount_code'] = $input['discount_code'] ?? "";
        $update['status_siswa'] = $input['status_siswa'] ?? "";
        $response = $ppdb->update($update);

        debug($response);

        if ($response) {
            event(new PPDBUpdated($ppdb));

            return $ppdb->fresh();
        }

        throw new GeneralException(__('exceptions.backend.ppdbs.update_error'));
    }



    /**
     * @param \App\Models\ppdb $ppdb
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(ppdb $ppdb)
    {
        if ($ppdb->delete()) {
            event(new PPDBDeleted($ppdb));

            return true;
        }

        throw new GeneralException(__('exceptions.backend.ppdbs.delete_error'));
    }
}
