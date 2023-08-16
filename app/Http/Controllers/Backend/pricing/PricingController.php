<?php

namespace App\Http\Controllers\Backend\Pricing;

use Carbon\Carbon;
use App\Models\PPDB;
use App\Models\Payment;
use App\Models\Pricing;
use App\Models\Register;
use App\Models\Data_siswa;
use App\Imports\DataImport;
use App\Imports\PPDBImport;
use App\Models\Data_siswa2;
use App\Models\Data_siswa3;
use App\Models\Data_siswa4;
use App\Models\MasterKelas;
use App\Exports\SiswaExport;
use App\Imports\DataImport2;
use App\Imports\DataImport3;
use App\Imports\DataImport4;
use Illuminate\Http\Request;
use App\Models\PPDBInterview;
use App\Imports\PaymentImport;
use App\Imports\PricingImport;
use App\Imports\InterviewImport;
use App\Imports\ReregisterImport;
use App\Http\Controllers\Controller;
use App\Http\Responses\ViewResponse;
use App\Models\RegistrationSchedule;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Http\Responses\RedirectResponse;
use App\Repositories\Backend\PPDBRepository;
use Symfony\Component\VarDumper\Cloner\Data;
use App\Http\Requests\Backend\Pricing\PricingPermissionRequest;
use App\Imports\DapodikImport;
use App\Imports\UserImport;
use App\Models\Dapodik;
use App\Models\Dapodik_system;
use App\Models\ReRegistration;
use App\Models\Users_system;
use Illuminate\Support\Facades\Date;

class PricingController extends Controller
{

    /**
     * @param \App\Http\Requests\Backend\PPDB\PPDBPermissionRequest $request
     *
     * @return ViewResponse
     */
    public function index(Request $request)
    {
        // $pricings = Pricing::all();
        // debug($pricings);


        $pricings = Pricing::where([
            ['price_group',      '=', 'gelombang 1'],
        ])->get();

        $pricings_wave2 = Pricing::where([
            ['price_group',      '=', 'gelombang 2'],
        ])->get();

        debug($pricings);


        $data_siswa = Data_siswa::all();

        $data = [
            'data_siswa' => $data_siswa,
            'pricings' => $pricings,
            'pricings_wave2' => $pricings_wave2
        ];

        return new ViewResponse('backend.pricing.index', $data);
    }

    public function indexwave2(Request $request)
    {
         // $pricings = Pricing::all();
        // debug($pricings);


        $pricings_wave2 = Pricing::where([
            ['price_group',      '=', 'gelombang 2'],
        ])->get();

        $data = [
            'pricings_wave2' => $pricings_wave2
        ];

        return new ViewResponse('backend.pricing.indexwave2', $data);
    }


    public function master() {

         $master = MasterKelas::orderBy('sekolah', 'ASC')->get();

        $data = [
            'master' => $master
        ];
        return new ViewResponse('backend.pricing.master', $data);
    }

    public function masterstore() {

        $master = "storedush";
        $data = [
            'master' => $master
        ];
        return new ViewResponse('backend.pricing.masterstore', $data);
    }

    public function masterinsert(Request $request) {

        $masterinsert = new MasterKelas;

        $masterinsert->kategori = $request->kategori_kelas;
        $masterinsert->kelas = $request->nama_kelas;
        $masterinsert->unit = $request->unit;
        $masterinsert->sekolah = $request->sekolah;
        $masterinsert->kepala_sekolah = $request->kepala_sekolah;
        $masterinsert->wali_kelas = $request->wali_kelas;

        $masterinsert ->save();

        return redirect()->back()->withFlashSuccess(__('alerts.backend.access.users.session_insert'));
    }

    public function masterDelete (Request $request) {
        $masterdelete = MasterKelas::where('id', $request->item_value)->first();

        $masterdelete->delete();

        return redirect()->back()->withFlashSuccess(__('alerts.backend.access.users.session_deleted'));
    }

    public function masterdone(Request $request) {

        $masterupdate = MasterKelas::where('id', $request->id_item)->first();

        $masterupdate->kategori = $request->kategori_kelas;
        $masterupdate->kelas = $request->nama_kelas;
        $masterupdate->unit = $request->unit;
        $masterupdate->sekolah = $request->sekolah;
        $masterupdate->kepala_sekolah = $request->kepala_sekolah;
        $masterupdate->wali_kelas = $request->wali_kelas;

        $masterupdate ->save();

        return redirect()->back()->withFlashSuccess(__('alerts.backend.access.users.session_updated'));
    }

    public function masterUpdate($id)
    {
        $masterupdate = MasterKelas::where('id', $id)->first();

        $data = [
            'masterupdate'=> $masterupdate
        ];
        return new ViewResponse('backend.pricing.masterupdate', $data);
    }

    /**
     * @param \App\Http\Requests\Backend\Pricing\PricingPermissionRequest $request
     *
     * @return ViewResponse
     */
    public function uploadDatasiswa(PricingPermissionRequest $request)
    {      
        //PPDB DAFTAR ULANG
        $reregister_siswa = [];             
        $reregister_siswa = Excel::toArray(new ReregisterImport, $request->file('file_pricing'));
        $reregister_insert = [];
        foreach ($reregister_siswa[5] as $reregister_siswas) {
            $existing_register = register::where('ppdb_id', $reregister_siswas['ppdb_id'])->first();
            if ( ! $existing_register) {
                array_push($reregister_insert, [        
                    'file_additionalsatu'            => $reregister_siswas['file_additionalsatu'],
                    'file_additionaldua'             => $reregister_siswas['file_additionaldua'],
                    'ppdb_id'                        => $reregister_siswas['ppdb_id'],
                    'medco_employee_file'            => $reregister_siswas['medco_employee_file'],
                    'created_at'                     => $reregister_siswas['created_at'],
                    'updated_at'                     => $reregister_siswas['updated_at']
                
                ]);
            }
        }
        debug($reregister_insert);
        register::insert($reregister_insert);

        //PPDB INTERVIEW
        $interview_siswa = [];           
        $interview_siswa = Excel::toArray(new InterviewImport, $request->file('file_pricing'));
        $interview_insert = [];
        foreach ($interview_siswa[4] as $interview_siswas) {
            $existing_interview = PPDBInterview::where('ppdb_id', $interview_siswas['ppdb_id'])->first();
            if ( ! $existing_interview) {
                    array_push($interview_insert, [        
                        'ppdb_id'                           => $interview_siswas['ppdb_id'],
                        'school_recomendation_result'       => $interview_siswas['school_recomendation_result'],
                        'school_recomendation_file'         => $interview_siswas['school_recomendation_file'],
                        'school_recomendation_note'         => $interview_siswas['school_recomendation_note'],
                        'is_submited'                       => $interview_siswas['is_submited'],
                        'interview_result'                  => $interview_siswas['interview_result'],
                        'interview_result_file'             => $interview_siswas['interview_result_file'],
                        'interview_result_note'             => $interview_siswas['interview_result_note'],
                        'kesiapan_file'                     => $interview_siswas['kesiapan_file'],
                        'kesiapan_result'                   => $interview_siswas['kesiapan_result'],
                        'kesiapan_result_note'              => $interview_siswas['kesiapan_result_note'],
                        'academic_value'                    => $interview_siswas['academic_value'],
                        'academic_file'                     => $interview_siswas['academic_file'],
                        'academic_result'                   => $interview_siswas['academic_result'],
                        'academic_result_note'              => $interview_siswas['academic_result_note'],
                        'interview_parent_summary'          => $interview_siswas['interview_parent_summary'],
                        'interview_parent_file'             => $interview_siswas['interview_parent_file'],
                        'interview_parent_result_note'      => $interview_siswas['interview_parent_result_note'],
                        'interview_student_summary'         => $interview_siswas['interview_student_summary'],
                        'interview_student_result'          => $interview_siswas['interview_student_result'],
                        'observasi_value'                   => $interview_siswas['observasi_value'],
                        'observasi_summary'                 => $interview_siswas['observasi_summary'],
                        'observasi_file'                    => $interview_siswas['observasi_file'],
                        'observasi_result'                  => $interview_siswas['observasi_result'],
                        'observasi_result_note'             => $interview_siswas['observasi_result_note'],
                        'created_at'                        => $interview_siswas['created_at'],
                        'updated_at'                        => $interview_siswas['updated_at'],
                        'deleted_at'                        => $interview_siswas['deleted_at']               
                    ]);
            }
        }
        debug($interview_insert);
        PPDBInterview::insert($interview_insert);

        //PAYMENT
        $payment_siswa = [];             
        $payment_siswa = Excel::toArray(new PaymentImport, $request->file('file_pricing'));
        $payment_insert = [];
        foreach ($payment_siswa[3] as $payment_siswas) {
                $existing_payment = Payment::where('ppdb_id', $payment_siswas['ppdb_id'])->first();
                if ( ! $existing_payment ) {
                    array_push($payment_insert, [        
                            'ppdb_id'                    => $payment_siswas['ppdb_id'],      
                            'payment_type'               => $payment_siswas['payment_type'],  
                            'payment_code'               => $payment_siswas['payment_code'],  
                            'confirmation_status'        => $payment_siswas['confirmation_status'],  
                            'date_send'                  => $payment_siswas['date_send'],  
                            'bank_owner_name'            => $payment_siswas['bank_owner_name'],  
                            'bank_code'                  => $payment_siswas['bank_code'],  
                            'account_number'             => $payment_siswas['account_number'],  
                            'cost'                       => $payment_siswas['cost'],  
                            'image_confirmation'         => $payment_siswas['image_confirmation'], 
                            'created_at'                 => $payment_siswas['created_at'], 
                            'updated_at'                 => $payment_siswas['updated_at']                    
                    ]);
                }
        }
        debug($payment_insert);
        Payment::insert($payment_insert);

            //PPDB 
            $ppdb_siswa = [];        
            $ppdb_siswa = Excel::toArray(new PPDBImport, $request->file('file_pricing'));
            // var_dump($ppdb_siswa[0]);  //cek data sudah masuk
            $ppdb_insert = [];
            foreach ($ppdb_siswa[0] as $ppdb_siswas) {
                $existing_ppdb = PPDB::where('ppdb_id', $ppdb_siswas['ppdb_id'])->first();
                if ( ! $existing_ppdb) {
                        array_push($ppdb_insert, [        
                                'ppdb_id'                    => $ppdb_siswas['ppdb_id'],  
                                'registration_schedule_id'   => $ppdb_siswas['registration_schedule_id'],      
                                'document_no'                => $ppdb_siswas['document_no'],
                                'document_status'            => $ppdb_siswas['document_status'],
                                'id_user'                    => $ppdb_siswas['id_user'],
                                'school_site'                => $ppdb_siswas['school_site'],
                                'stage'                      => $ppdb_siswas['stage'],
                                'classes'                    => $ppdb_siswas['classes'],
                                'student_status'             => $ppdb_siswas['student_status'],
                                'fullname'                   => $ppdb_siswas['fullname'],
                                'gender'                     => $ppdb_siswas['gender'],
                                'place_of_birth'             => $ppdb_siswas['place_of_birth'],
                                'date_of_birth'              => $ppdb_siswas['date_of_birth'],
                                'religion'                   => $ppdb_siswas['religion'],
                                'nationality'                => $ppdb_siswas['nationality'],
                                'address'                    => $ppdb_siswas['address'],
                                'home_phone'                 => $ppdb_siswas['home_phone'],
                                'hand_phone'                 => $ppdb_siswas['hand_phone'],
                                'school_origin'              => $ppdb_siswas['school_origin'],
                                'family_card'                => $ppdb_siswas['family_card'],
                                'birth_certificate'          => $ppdb_siswas['birth_certificate'],
                                'last_report'                => $ppdb_siswas['last_report'],
                                'academic_certificate'       => $ppdb_siswas['academic_certificate'],
                                'kia_book'                   => $ppdb_siswas['kia_book'],
                                'file_additional'            => $ppdb_siswas['file_additional'],
                                'medco_employee'             => $ppdb_siswas['medco_employee'],
                                'medco_employee_file'        => $ppdb_siswas['medco_employee_file'],
                                'ppdb_discount'              => $ppdb_siswas['ppdb_discount'],
                                'studied_before'             => $ppdb_siswas['studied_before'],
                                'file_additional_satu'       => $ppdb_siswas['file_additional_satu'],
                                'file_additional_dua'        => $ppdb_siswas['file_additional_dua'],
                                'file_additional_tiga'       => $ppdb_siswas['file_additional_tiga'],
                                'file_additional_empat'      => $ppdb_siswas['file_additional_empat'],
                                'file_additional_lima'       => $ppdb_siswas['file_additional_lima'],
                                'tingkat_satu'               => $ppdb_siswas['tingkat_satu'],
                                'tingkat_dua'                => $ppdb_siswas['tingkat_dua'],
                                'tingkat_tiga'               => $ppdb_siswas['tingkat_tiga'],
                                'tingkat_empat'              => $ppdb_siswas['tingkat_empat'],
                                'tingkat_lima'               => $ppdb_siswas['tingkat_lima'],
                                'deskripsi_satu'             => $ppdb_siswas['deskripsi_satu'],
                                'deskripsi_dua'              => $ppdb_siswas['deskripsi_dua'],
                                'deskripsi_tiga'             => $ppdb_siswas['deskripsi_tiga'],
                                'deskripsi_empat'            => $ppdb_siswas['deskripsi_empat'],
                                'deskripsi_lima'             => $ppdb_siswas['deskripsi_lima'],
                                'status_siswa'               => $ppdb_siswas['status_siswa'],
                                'gaji'                       => $ppdb_siswas['gaji'],
                                'slip_gaji_parent'           => $ppdb_siswas['slip_gaji_parent'],
                                'updated_by'                 => $ppdb_siswas['updated_by'],
                                'created_at'                 => $ppdb_siswas['created_at'],
                                'updated_at'                 => $ppdb_siswas['updated_at'],
                                'rejected_at'                => $ppdb_siswas['rejected_at'],
                                'rejected_by'                => $ppdb_siswas['rejected_by']              
                        ]);
                    }
            }
            debug($ppdb_insert);
            PPDB::insert($ppdb_insert);

                    //DATASISWA_1
                    $data_siswa = [];      
                    $data_siswa = Excel::toArray(new DataImport, $request->file('file_pricing'));
                    $data_siswa_insert = [];
                    foreach ($data_siswa[1] as $datasiswa) {
                    $existing_data_siswa = Data_siswa::where('ppdb_id', $datasiswa['ppdb_id'])->first();
                            if( ! $existing_data_siswa ) {
                                    array_push($data_siswa_insert, [
                                            'no_formulir'               => $datasiswa['no_formulir'],           
                                            'ppdb_id'                   => $datasiswa['ppdb_id'],
                                            'tahun_ajaran'              => $datasiswa['tahun_ajaran'],        
                                            'tanggal_pendaftaran'       => $datasiswa['tanggal_pendaftaran'],   
                                            'status_siswa'              => $datasiswa['status_siswa'],         
                                            'nama_lengkap'              => $datasiswa['nama_lengkap'],       
                                            'jenis_kelamin'             => $datasiswa['jenis_kelamin'],       
                                            'nisn'                      => $datasiswa['nisn'],
                                            'kitas'                     => $datasiswa['kitas'],
                                            'tempat_lahir'              => $datasiswa['tempat_lahir'],
                                            'tanggal_lahir'             => $datasiswa['tanggal_lahir'],
                                            'akta_kelahiran'            => $datasiswa['akta_kelahiran'],
                                            'agama'                     => $datasiswa['agama'],
                                            'kewarganegaraan'           => $datasiswa['kewarganegaraan'],
                                            'nama_negara'               => $datasiswa['nama_negara'],
                                            'berkebutuhan_khusus'       => $datasiswa['berkebutuhan_khusus'],
                                            'berkebutuhan_khusus_2'     => $datasiswa['berkebutuhan_khusus_2'],
                                            'alamat_jalan'              => $datasiswa['alamat_jalan'],
                                            'rt'                        => $datasiswa['rt'],
                                            'rw'                        => $datasiswa['rw'],
                                            'nama_dusun'                => $datasiswa['nama_dusun'],
                                            'nama_kelurahan'            => $datasiswa['nama_kelurahan'],
                                            'nama_kelurahan_2'          => $datasiswa['nama_kelurahan_2'],
                                            'kecamatan'                 => $datasiswa['kecamatan'],
                                            'kode_pos'                  => $datasiswa['kode_pos'],
                                            'tempat_tinggal'            => $datasiswa['tempat_tinggal'],
                                            'moda_transportasi'         => $datasiswa['moda_transportasi'],
                                            'nomor_kks'                 => $datasiswa['nomor_kks'],
                                            'anak_keberapa'             => $datasiswa['anak_keberapa'],
                                            'penerima_kps_pkh'          => $datasiswa['penerima_kps_pkh'],
                                            'no_kph_pkh'                => $datasiswa['no_kph_pkh'],
                                            'usulan_dari_sekolah'       => $datasiswa['usulan_dari_sekolah'],
                                            'kip'                       => $datasiswa['kip'],
                                            'nomor_kip'                 => $datasiswa['nomor_kip'],
                                            'nama_kip'                  => $datasiswa['nama_kip'],
                                            'kartu_KIP'                 => $datasiswa['kartu_kip'],
                                            'alasan_layak_pip'          => $datasiswa['alasan_layak_pip'],
                                            'bank'                      => $datasiswa['bank'],
                                            'no_rekening'               => $datasiswa['no_rekening'],
                                            'rekening_atas_nama'        => $datasiswa['rekening_atas_nama'],
                                            'nama_ayah'                 => $datasiswa['nama_ayah'],
                                            'nik_ayah'                  => $datasiswa['nik_ayah'],
                                            'tahun_lahir_ayah'          => $datasiswa['tahun_lahir_ayah'],
                                            'pendidikan_ayah'           => $datasiswa['pendidikan_ayah'],
                                            'pekerjaan_ayah'            => $datasiswa['pekerjaan_ayah'],
                                            'penghasilan_bulanan_ayah'  => $datasiswa['penghasilan_bulanan_ayah'],
                                            'berkebutuhan_khusus_ayah'  => $datasiswa['berkebutuhan_khusus_ayah'],
                                            'nama_Ibu'                  => $datasiswa['nama_ibu'],
                                            'nik_Ibu'                   => $datasiswa['nik_ibu'],
                                            'tahun_lahir_ibu'           => $datasiswa['tahun_lahir_ibu'],
                                            'pendidikan_ibu'            => $datasiswa['pendidikan_ibu'],
                                            'pekerjaan_ibu'             => $datasiswa['pekerjaan_ibu'],
                                            'penghasilan_bulanan_ibu'   => $datasiswa['penghasilan_bulanan_ibu'], 
                                            'berkebutuhan_khusus_ibu'   => $datasiswa['berkebutuhan_khusus_ibu'],   
                                            'nama_wali'                 => $datasiswa['nama_wali'],             
                                            'nik_wali'                  => $datasiswa['nik_wali'],            
                                            'tahun_lahir_wali'          => $datasiswa['tahun_lahir_wali'], 
                                            'pendidikan_wali'           => $datasiswa['pendidikan_wali'],  
                                            'pekerjaan_wali'            => $datasiswa['pekerjaan_wali'],   
                                            'penghasilan_bulanan_wali'  => $datasiswa['penghasilan_bulanan_wali'], 
                                            'telepon_rumah'             => $datasiswa['telepon_rumah'],
                                            'nomor_hp'                  => $datasiswa['nomor_hp'],
                                            'email'                     => $datasiswa['email'], 
                                            'jenis_ekstrakulikuler'     => $datasiswa['jenis_ekstrakulikuler'],  
                                            'tinggi_badan'              => $datasiswa['tinggi_badan'],  
                                            'berat_badan'               => $datasiswa['berat_badan'], 
                                            'jarak_tempat'              => $datasiswa['jarak_tempat'], 
                                            'waktu_tempuh'              => $datasiswa['waktu_tempat'],  
                                            'saudara_kandung'           => $datasiswa['saudara_kandung'],
                                            'jurusan'                   => $datasiswa['jurusan'],                  
                                            'jenis_pendaftaran'         => $datasiswa['jenis_pendaftaran'],
                                            'nis'                       => $datasiswa['nis'],
                                            'tanggal_masuk_sekolah'     => $datasiswa['tanggal_masuk_sekolah'],
                                            'asal_sekolah'              => $datasiswa['asal_sekolah'],
                                            'nomor_peserta_ujian'       => $datasiswa['nomor_peserta_ujian'],                       
                                            'no_seri_ijazah'            => $datasiswa['no_seri_ijazah'],
                                            'no_seri_skhun'             => $datasiswa['no_seri_skhun'],
                                            'keluar_karena'             => $datasiswa['keluar_karena'],
                                            'tanggal_keluar'            => $datasiswa['tanggal_keluar'],
                                            'alasan'                    => $datasiswa['alasan'],
                                            'persetujuan'               => $datasiswa['persetujuan'],                         
                                            'jenis_1'                   => $datasiswa['jenis_1'],
                                            'tingkat_1'                 => $datasiswa['tingkat_1'],
                                            'nama_prestasi_1'           => $datasiswa['nama_prestasi_1'],
                                            'tahun_1'                   => $datasiswa['tahun_1'],
                                            'penyelenggara_1'           => $datasiswa['penyelenggara_1'],                   
                                            'jenis_2'                   => $datasiswa['jenis_2'],
                                            'tingkat_2'                 => $datasiswa['tingkat_2'],
                                            'nama_prestasi_2'           => $datasiswa['nama_prestasi_2'],
                                            'tahun_2'                   => $datasiswa['tahun_2'],
                                            'penyelenggara_2'           => $datasiswa['penyelenggara_2'],               
                                            'jenis_3'                   => $datasiswa['jenis_3'],
                                            'tingkat_3'                 => $datasiswa['tingkat_3'],
                                            'nama_prestasi_3'           => $datasiswa['nama_prestasi_3'],
                                            'tahun_3'                   => $datasiswa['tahun_3'],
                                            'penyelenggara_3'           => $datasiswa['penyelenggara_3'],                          
                                            'jenis_1_0'                 => $datasiswa['jenis_1_0'],
                                            'keterangan_1'              => $datasiswa['keterangan_1'],
                                            'tahun_mulai_1'             => $datasiswa['tahun_mulai_1'],
                                            'tahun_selesai_1'           => $datasiswa['tahun_selesai_1'],
                                            'jenis_2_0'                 => $datasiswa['jenis_2_0'],                    
                                            'keterangan_2'              => $datasiswa['keterangan_2'],
                                            'tahun_mulai_2'             => $datasiswa['tahun_mulai_2'],
                                            'tahun_selesai_2'           => $datasiswa['tahun_selesai_2'],                           
                                            'jenis_3_0'                 => $datasiswa['jenis_3_0'],
                                            'keterangan_3'              => $datasiswa['keterangan_3'],
                                            'tahun_mulai_3'             => $datasiswa['tahun_mulai_3'],
                                            'tahun_selesai_3'           => $datasiswa['tahun_selesai_3']
                                    ]);
                                }
                            }

                debug($data_siswa_insert);
                Data_siswa::insert($data_siswa_insert);

               //DATASISWA_2
               $data_siswa2 = [];      
               $data_siswa2 = Excel::toArray(new DataImport2, $request->file('file_pricing'));
               $data_siswa2_insert = [];
   
               foreach ($data_siswa2[2] as $data_siswas2) {
                $existing_data_siswa2 = Data_siswa2::where('ppdb_id', $data_siswas2['ppdb_id'])->first();
                if ( ! $existing_data_siswa2) {
                        array_push($data_siswa2_insert, [
                                'nama_orang_tua'                                             => $data_siswas2['nama_orang_tua'],           
                                'alamat_orang_tua'                                           => $data_siswas2['alamat_orang_tua_atau_wali'],
                                'uang_pangkal_up_2'                                          => $data_siswas2['membayar_uang_pangkal_up_2'],     
                                'spp_bulan_juli_2023'                                        => $data_siswas2['pembayaran_spp_bulan_juli_2023'], 
                                'spp_setiap_bulan'                                           => $data_siswas2['pembayaran_spp_setiap_bulannya_selambat'], 
                                'sudah_melaksanakan_tes'                                     => $data_siswas2['jika_putra_putri_kami_sudah_melaksanakan_tes'], 
                                'diterima_di_sekolah_negeri'                                 => $data_siswas2['jika_putra_putri_kami_diterima_di_sekolah_negeri'], 
                                'sudah_bersekolah_di_avicenna'                               => $data_siswas2['apabila_putra_putri_kami_sudah_bersekolah_di_avicenna'],    
                                'sudah_bersekolah_di_avicenna_2'                             => $data_siswas2['apabila_putra_putri_kami_sudah_bersekolah_di_avicenna'],  //tanda tanya
                                'tata_tertib_sekolah'                                        => $data_siswas2['kami_akan_mematuhi_seluruh_tata_tertib_sekolah'], 
                                'aktivitas_foto_video'                                       => $data_siswas2['seluruh_aktivitas_putra_putri_kami_dalam_photo_video'], 
                                'didik_diijinkan'                                            => $data_siswas2['seluruh_hasil_karya_peserta_didik_diijinkan'], 
                                'baca_dan_pahami'                                            => $data_siswas2['berdasarkan_apa_yang_telah_saya_baca_dan_pahami'], 
                                'nama_calon_murid'                                           => $data_siswas2['nama_calon_murid'], 
                                'kelas'                                                      => $data_siswas2['kelas'], 
                                'persetujuan_tata_tertib'                                    => $data_siswas2['persetujuan_tata_tertib'], 
                                'jasmani'                                                    => $data_siswas2['keadaan_jasmani'], 
                                'laki_laki'                                                  => $data_siswas2['jenis_kelamin_laki'], 
                                'perempuan'                                                  => $data_siswas2['jenis_kelamin_perempuan'], 
                                'tempat_lahir'                                               => $data_siswas2['tempat_lahir'], 
                                'tanggal_lahir'                                              => $data_siswas2['tanggal_lahir'], 
                                'berat_badan'                                                => $data_siswas2['berat_badan'], 
                                'tinggi_badan'                                               => $data_siswas2['tinggi_badan'], 
                                'golongan_darah'                                             => $data_siswas2['golongan_darah'], 
                                'catatan_imunisasi'                                          => $data_siswas2['memiliki_catatan_imunisasi'], 
                                'imunisasi'                                                  => $data_siswas2['saat_bayi_mendapatkan_imunisasi'], 
                                'imunisasi_lengkap'                                          => $data_siswas2['imunisasi_lengkap'], 
                                'gangguan_dan_kelainan'                                      => $data_siswas2['ada_gangguan_dan_kelainan'], 
                                'tidak_ada_gangguan'                                         => $data_siswas2['tidak_ada_gangguan_dan_kelainan'], 
                                'berbahaya'                                                  => $data_siswas2['berbahaya'], 
                                'tidak_berbahaya'                                            => $data_siswas2['tidak_berbahaya'], 
                                'ppdb_id'                                                    => $data_siswas2['ppdb_id']    
                        ]);
                    }
               }
               debug($data_siswa2_insert);
               Data_siswa2::insert($data_siswa2_insert);

                //DATASISWA_3
                $data_siswa3 = [];      
                $data_siswa3 = Excel::toArray(new DataImport3, $request->file('file_pricing'));
                $data_siswa3_insert = [];
    
                foreach ($data_siswa3[2] as $data_siswas3) {
                    $existing_data_siswa3 = Data_siswa3::where('ppdb_id', $data_siswas3['ppdb_id'])->first();
                    if ( ! $existing_data_siswa3) {
                            array_push($data_siswa3_insert, [
                                'ppdb_id'                                                    => $data_siswas3['ppdb_id'],
                                'yang_lain'                                                  => $data_siswas3['yang_lain'], 
                                'normal_tidak_gangguan'                                      => $data_siswas3['normal_tidak_ada_gangguan'], 
                                'kompilasi_ketika_melahirkan'                                => $data_siswas3['ada_kompilasi_ketika_melahirkan'], 
                                'tidak_ada_cacat'                                            => $data_siswas3['normal_tidak_ada_cacat_bawaan'], 
                                'cacat_bawaan'                                               => $data_siswas3['ada_cacat_bawaan'], 
                                'normal_1'                                                   => $data_siswas3['normal_1'], 
                                'terlambat_1'                                                => $data_siswas3['terlambat_1'], 
                                'normal_2'                                                   => $data_siswas3['normal_2'], 
                                'terlambat_2'                                                => $data_siswas3['terlambat_2'], 
                                'normal_3'                                                   => $data_siswas3['normal_3'], 
                                'terlambat_3'                                                => $data_siswas3['terlambat_3'], 
                                'normal_4'                                                   => $data_siswas3['normal_4'], 
                                'terlambat_4'                                                => $data_siswas3['terlambat_4'],
                                'normal_5'                                                   => $data_siswas3['normal_5'], 
                                'terlambat_5'                                                => $data_siswas3['terlambat_5'], 
                                'ada'                                                        => $data_siswas3['ada'], 
                                'tidak_ada'                                                  => $data_siswas3['tidak_ada'], 
                                'ya_pernah'                                                  => $data_siswas3['ya_pernah'], 
                                'tidak_pernah'                                               => $data_siswas3['tidak_pernah'], 
                                'ya_riwayat_kejang'                                          => $data_siswas3['ya_riwayat_kejang_demam'], 
                                'tidak_riwayat_kejang'                                       => $data_siswas3['tidak_riwayat_kejang_demam'], 
                                'riwayat_penyakit_diderita'                                  => $data_siswas3['memiliki_riwayat_penyakit_diderita'], 
                                'rawat_rumah_sakit'                                          => $data_siswas3['pernah_rawat_rumah_sakit'], 
                                'catatan_lain'                                               => $data_siswas3['catatan_lain'], 
                                'sekolah_asal'                                               => $data_siswas3['sekolah_asal'], 
                                'brand'                                                      => $data_siswas3['brand'], 
                                'kegiatan_sekolah'                                           => $data_siswas3['kegiatan_sekolah'], 
                                'media_cetak'                                                => $data_siswas3['media_cetak'], 
                                'media_elektronik'                                           => $data_siswas3['media_elektronik'], 
                                'media_sosial'                                               => $data_siswas3['media_sosial']     
                            ]);
                        }
                }
    
                debug($data_siswa3_insert);
                Data_siswa3::insert($data_siswa3_insert);

                //USERS
                $users_systems = [];
                $users_systems = Excel::toArray(new UserImport, $request->file('file_pricing'));
                $users_system_insert = [];
                foreach ($users_systems[6] as $users_system) {
                    $existing_users_system = Users_system::where('user_id', $users_system['user_id'])->first();
                    if ( ! $existing_users_system) {
                            array_push($users_system_insert, [
                                'user_id'                             => $users_system['user_id'],
                                'uuid'                                => $users_system['uuid'],
                                'first_name'                          => $users_system['first_name'],
                                'last_name'                           => $users_system['last_name'],
                                'email'                               => $users_system['email'],
                                'phone'                               => $users_system['phone'],  
                                'avatar_type'                         => $users_system['avatar_type'],
                                'avatar_location'                     => $users_system['avatar_location'],
                                'password'                            => $users_system['password'],
                                'password_changed_at'                 => $users_system['password_changed_at'],
                                'active'                              => $users_system['active'],
                                'confirmation_code'                   => $users_system['confirmation_code'],
                                'confirmed'                           => $users_system['confirmed'],
                                'timezone'                            => $users_system['timezone'],
                                'last_login_at'                       => $users_system['last_login_at'],
                                'last_login_ip'                       => $users_system['last_login_ip'],
                                'to_be_logged_out'                    => $users_system['to_be_logged_out'],
                                'status'                              => $users_system['status'],
                                'created_by'                          => $users_system['created_by'],
                                'updated_by'                          => $users_system['updated_by'],
                                'is_term_accept'                      => $users_system['is_term_accept'],
                                'remember_token'                      => $users_system['remember_token'],
                                'created_at'                          => $users_system['created_at'],
                                'updated_at'                          => $users_system['updated_at'],
                                'deleted_at'                          => $users_system['deleted_at']                      
                            ]);
                        }
                }
                debug($users_system_insert);
                Users_system::insert($users_system_insert);

                //DATASISWA_4
                $data_siswa4 = [];         
                $data_siswa4 = Excel::toArray(new DataImport4, $request->file('file_pricing'));
                $data_siswa4_insert = [];
    
                foreach ($data_siswa4[2] as $data_siswas4) {
                    $existing_data_siswa4 = Data_siswa4::where('ppdb_id', $data_siswas4['ppdb_id'])->first();
                    if ( ! $existing_data_siswa4) {
                            array_push($data_siswa4_insert, [
                                'media_sosial_2'                                             => $data_siswas4['media_sosial'], 
                                'program_sekolah'                                            => $data_siswas4['program_sekolah'], 
                                'fasilitas_pelayanan'                                        => $data_siswas4['fasilitas_pelayanan'], 
                                'jarak'                                                      => $data_siswas4['jarak'], 
                                'uang_sekolah_terjangkau'                                    => $data_siswas4['uang_sekolah_terjangkau'], 
                                'fasilitas_lengkap'                                          => $data_siswas4['fasilitas_sekolah_lengkap'], 
                                'kebersihan'                                                 => $data_siswas4['kebersihan_gedung_sekolah'], 
                                'pelayanan_informasi'                                        => $data_siswas4['pelayanan_informasi'], 
                                'tenaga_pendidik_kompeten'                                   => $data_siswas4['tenaga_pendidik_kompeten'], 
                                'tidak_pilih_fasilitas_pelayanan'                            => $data_siswas4['tidak_pilih_fasilitas_pelayanan'], 
                                '1km_jarak'                                                  => $data_siswas4['1km_jarak'], 
                                '1_sampai_5km'                                               => $data_siswas4['1_sampai_5km'], 
                                '6_sampai_10km'                                              => $data_siswas4['6_sampai_10km'], 
                                '11_sampai_20km'                                             => $data_siswas4['11_sampai_20km'], 
                                '21_sampai_30km'                                             => $data_siswas4['21_sampai_30km'], 
                                'tidak_pilih_jarak'                                          => $data_siswas4['tidak_pilih_jarak'], 
                                'uang_pangkal'                                               => $data_siswas4['uang_pangkal'], 
                                'spp'                                                        => $data_siswas4['spp'], 
                                'tanda_biaya_tambahan'                                       => $data_siswas4['tanda_biaya_tambahan'], 
                                'tidak_terjangkau'                                           => $data_siswas4['tidak_terjangkau_uang_sekolah'], 
                                'sederhana_dan_mudah'                                        => $data_siswas4['sederhana_dan_mudah'], 
                                'standar_sama'                                               => $data_siswas4['standar_sama_sekolah_lain'], 
                                'berbelit_belit'                                             => $data_siswas4['berbelit_belit'], 
                                'tidak_murah'                                                => $data_siswas4['uang_sekolah_tidak_murah'], 
                                'merepotkan'                                                 => $data_siswas4['merepotkan'], 
                                'pendapat_saya'                                              => $data_siswas4['pendapat_saya'], 
                                'program_7_habits'                                           => $data_siswas4['program_7_habits'], 
                                'prestasi_sekolah'                                           => $data_siswas4['prestasi_sekolah'], 
                                'ekstrakulikuler'                                            => $data_siswas4['ekstrakulikuler'], 
                                'booster_1'                                                  => $data_siswas4['booster_1'], 
                                'booster_2'                                                  => $data_siswas4['booster_2'], 
                                'booster_3'                                                  => $data_siswas4['booster_3'], 
                                'belum_vaksin'                                               => $data_siswas4['belum_vaksin'], 
                                'ppdb_id'                                                    => $data_siswas4['ppdb_id']                    
                            ]);
                        }
                }
                debug($data_siswa4_insert);
                Data_siswa4::insert($data_siswa4_insert);

               return redirect()->route('admin.pricing.index')->with(['flash_success' => 'Berhasil di Import Data PPDB']);       
    }

    public function uploadDapodik(PricingPermissionRequest $request) {
            //PPDB DAFTAR ULANG
            $dapodik_siswa = [];   
            date_default_timezone_set('Asia/Jakarta');
            
            $dapodik_siswa = Excel::toArray(new DapodikImport, $request->file('file_dapodik'));
            $dapodik_insert = [];   
            $users_insert   = [];
            
            $stag = "";
            if (str_contains($dapodik_siswa[0][1][0], 'SD')) {
                $stag = "SD";
            } else if (str_contains($dapodik_siswa[0][1][0], 'SMP')) {
                $stag = "SMP";
            } else if (str_contains($dapodik_siswa[0][1][0], 'SMAS')) {
                $stag = "SMA";
            } else if (str_contains($dapodik_siswa[0][1][0], 'TK')) {
                $stag = "TK";
            } else if (str_contains($dapodik_siswa[0][1][0], 'KB')) {
                $stag = "KB";
            } else if(str_contains($dapodik_siswa[0][1][0], 'PAUD')){
                $stag = "KB";
            }
            
            $unit = "";
            if (str_contains(strtolower($dapodik_siswa[0][2][0]), 'jagakarsa')) {
                $unit = "JGK";
            } else if (str_contains(strtolower($dapodik_siswa[0][2][0]), 'cinere')) {
                $unit = "CNR";
            } else if (str_contains(strtolower($dapodik_siswa[0][2][0]), 'pamulang')) {
                $unit = "PML";
            } else {
                $unit = "kosong";
            }

            foreach(  array_slice($dapodik_siswa[0], 6, null, true) as $dapodik_siswas) {            
                $users_system_check = Users_system::where('status_data', $dapodik_siswas[2].'-'.$dapodik_siswas[4])->first();
                    if ( ! $users_system_check) {
                            $users_system = new Users_system();
                            $users_system->first_name   = $dapodik_siswas[24];
                            $users_system->phone        = $dapodik_siswas[19];
                            $users_system->password     = '$2a$12$6OxTbMRjrx7lEOj6tmNlbeaUGKuZdQJXpOke4QCiQbyWtACrH3ZpK';
                            $users_system->confirmed    = '1';
                            $users_system->status_data  = $dapodik_siswas[2].'-'.$dapodik_siswas[4];
                            $users_system->save();
                    }
                $data_parent = [];     
                    array_push($data_parent, [
                        'name_father'      => $dapodik_siswas[24],
                        'name_mother'      => $dapodik_siswas[30],
                        'wali'             => $dapodik_siswas[36]
                    ]);
                $work_parent = [];
                    array_push($work_parent, [
                        'name_work_father'  => $dapodik_siswas[27],
                        'name_work_mother'  => $dapodik_siswas[33],
                        'name_work_wali'    => $dapodik_siswas[39]
                    ]);                     
                $place_work_parent = [];
                    array_push($place_work_parent, [
                        'place_work_father' => 'kosong',
                        'place_work_mother' => 'kosong',
                        'place_work_wali'   => 'kosong'
                    ]);                 
                $title_work_parent = [];
                    array_push($title_work_parent, [
                        'title_work_father' => 'kosong',
                        'title_work_mother' => 'kosong',
                        'title_work_wali'   => 'kosong'
                    ]);             
                $income_work_parent = [];
                    array_push($income_work_parent, [
                        'income_work_father' => 'kosong',
                        'income_work_mother' => 'kosong',
                        'income_work_mother' => 'kosong',
                        'gaji_tetap_ayah'    => $dapodik_siswas[28],
                        'gaji_tetap_ibu'     => $dapodik_siswas[34],
                        'gaji_tetap_wali'    => $dapodik_siswas[40]
                    ]); 
                $class = "";
                if ($dapodik_siswas[42] == null || str_contains(strtolower($dapodik_siswa[0][2][0]), 'pamulang') || !$dapodik_siswas[42]) {
                    $class = 'KB';
                }else if(str_contains($dapodik_siswas[42], 'A') && strlen($dapodik_siswas[42]) <= 2 && str_contains(strtolower($dapodik_siswa[0][2][0]), 'jagakarsa') && str_contains($dapodik_siswa[0][1][0], 'TK')) {
                    $class = "TK - A";
                }else if(str_contains($dapodik_siswas[42], 'B') && strlen($dapodik_siswas[42]) == 2 && str_contains(strtolower($dapodik_siswa[0][2][0]), 'jagakarsa') && str_contains($dapodik_siswa[0][1][0], 'TK')) {
                    $class = "TK - B";
                }else if (str_contains($dapodik_siswas[42], '1') && strlen($dapodik_siswas[42]) == 2 ) {
                    $class = '1';
                } else if (str_contains($dapodik_siswas[42], '2') && strlen($dapodik_siswas[42]) == 2) {
                    $class = '2';
                } else if (str_contains($dapodik_siswas[42], '3') && strlen($dapodik_siswas[42]) == 2) {
                    $class = '3';
                }else if (str_contains($dapodik_siswas[42], '4')) {
                    $class = '4';
                } else if (str_contains($dapodik_siswas[42], '5')) {
                    $class = '5';
                } else if (str_contains($dapodik_siswas[42], '6')) {
                    $class = '6';
                }else if (str_contains($dapodik_siswas[42], '7')) {
                    $class = '7';
                } else if (str_contains($dapodik_siswas[42], '8')) {
                    $class = '8';
                } else if (str_contains($dapodik_siswas[42], '9')) {
                    $class = '9';
                }else if (str_contains($dapodik_siswas[42], '10')) {
                    $class = '10';
                } else if (str_contains($dapodik_siswas[42], '11')) {
                    $class = '11';
                } else if (str_contains($dapodik_siswas[42], '12')) {
                    $class = '12';
                } 

                    $gender_check = '';
                if ($dapodik_siswas[3] == 'L') {
                    $gender_check = 'Laki-Laki';
                } else {
                    $gender_check = 'Perempuan';
                }
              
                $ppdb_check = Dapodik::where('dapodik_id', $dapodik_siswas[2].'-'.$dapodik_siswas[4])->first();
                if ( ! $ppdb_check) {
                    $ppdb = new Dapodik();
                    $ppdb->id_user                  = $dapodik_siswas[2].'-'.$dapodik_siswas[4];
                    $ppdb->dapodik_id               = $dapodik_siswas[2].'-'.$dapodik_siswas[4];
                    $ppdb->fullname                 = $dapodik_siswas[1];
                    $ppdb->school_site              = $unit;                                             
                    $ppdb->nis                      = $dapodik_siswas[2];
                    $ppdb->gender                   = $gender_check;
                    $ppdb->place_of_birth           = $dapodik_siswas[5]; 
                    $ppdb->date_of_birth            = $dapodik_siswas[6];
                    $ppdb->religion                 = $dapodik_siswas[8];   
                    $ppdb->address                  = $dapodik_siswas[9];
                    $ppdb->home_phone               = $dapodik_siswas[18];
                    $ppdb->hand_phone               = $dapodik_siswas[19];
                    $ppdb->stage                    = $stag;
                    $ppdb->classes                  = $class;
                    $ppdb->file_additional_satu     = json_encode($data_parent);
                    $ppdb->created_at               = date("Y-m-d H:i:s");
                    $ppdb->save();
                }

                $ppdbinterview_check = PPDBInterview::where('dapodik_id', $dapodik_siswas[2].'-'.$dapodik_siswas[4])->first();
                if ( ! $ppdbinterview_check) {
                    $ppdb_interviews = new PPDBInterview();
                    $ppdb_interviews->dapodik_id = $dapodik_siswas[2].'-'.$dapodik_siswas[4];
                    $ppdb_interviews->save();
                }

                $data_siswa_check = Data_siswa::where('dapodik_id', $dapodik_siswas[2].'-'.$dapodik_siswas[4])->first();
                if ( ! $data_siswa_check) {
                    $data_siswa = new Data_siswa();
                    $data_siswa->dapodik_id                 = $dapodik_siswas[2].'-'.$dapodik_siswas[4];
                    $data_siswa->nisn                       = $dapodik_siswas[4];
                    $data_siswa->nama_lengkap               = $dapodik_siswas[1];
                    $data_siswa->jenis_kelamin              = $dapodik_siswas[3];
                    $data_siswa->tempat_lahir               = $dapodik_siswas[5];
                    $data_siswa->tanggal_lahir              = $dapodik_siswas[6];
                    $data_siswa->agama                      = $dapodik_siswas[8];
                    $data_siswa->alamat_jalan               = $dapodik_siswas[9];
                    $data_siswa->rt                         = $dapodik_siswas[10];
                    $data_siswa->rw                         = $dapodik_siswas[11];
                    $data_siswa->nama_dusun                 = $dapodik_siswas[12];
                    $data_siswa->nama_kelurahan             = $dapodik_siswas[13];
                    $data_siswa->kecamatan                  = $dapodik_siswas[14];
                    $data_siswa->kode_pos                   = $dapodik_siswas[15];
                    $data_siswa->tempat_tinggal             = $dapodik_siswas[16];
                    $data_siswa->moda_transportasi          = $dapodik_siswas[17];   
                    $data_siswa->telepon_rumah              = $dapodik_siswas[18];
                    $data_siswa->nomor_hp                   = $dapodik_siswas[19];
                    $data_siswa->email                      = $dapodik_siswas[20];
                    $data_siswa->no_seri_skhun              = $dapodik_siswas[21];
                    $data_siswa->nama_ayah                  = $dapodik_siswas[24];
                    $data_siswa->tahun_lahir_ayah           = $dapodik_siswas[25];
                    $data_siswa->pendidikan_ayah            = $dapodik_siswas[26];
                    $data_siswa->pekerjaan_ayah             = $dapodik_siswas[27];
                    $data_siswa->penghasilan_bulanan_ayah   = $dapodik_siswas[28];
                    $data_siswa->nik_ayah                   = $dapodik_siswas[29];
                    $data_siswa->nama_ibu                   = $dapodik_siswas[30];
                    $data_siswa->tahun_lahir_ibu            = $dapodik_siswas[31];
                    $data_siswa->pendidikan_ibu             = $dapodik_siswas[32];
                    $data_siswa->pekerjaan_ibu              = $dapodik_siswas[33];
                    $data_siswa->penghasilan_bulanan_ibu    = $dapodik_siswas[34];
                    $data_siswa->nik_ibu                    = $dapodik_siswas[35];
                    $data_siswa->nama_wali                  = $dapodik_siswas[36];
                    $data_siswa->tahun_lahir_wali           = $dapodik_siswas[37];
                    $data_siswa->pendidikan_wali            = $dapodik_siswas[38];
                    $data_siswa->pekerjaan_wali             = $dapodik_siswas[39];
                    $data_siswa->penghasilan_bulanan_wali   = $dapodik_siswas[40];
                    $data_siswa->nik_wali                   = $dapodik_siswas[41];
                    $data_siswa->no_seri_ijazah             = $dapodik_siswas[44];
                    $data_siswa->kip                        = $dapodik_siswas[45];
                    $data_siswa->nomor_kip                  = $dapodik_siswas[46];
                    $data_siswa->nama_kip                   = $dapodik_siswas[47];
                    $data_siswa->nomor_kks                  = $dapodik_siswas[48];
                    $data_siswa->akta_kelahiran             = $dapodik_siswas[49];
                    $data_siswa->bank                       = $dapodik_siswas[50];
                    $data_siswa->no_rekening                = $dapodik_siswas[51];
                    $data_siswa->rekening_atas_nama         = $dapodik_siswas[52];  
                    $data_siswa->alasan_layak_pip           = $dapodik_siswas[54];
                    $data_siswa->berkebutuhan_khusus        = $dapodik_siswas[55];
                    $data_siswa->asal_sekolah               = $dapodik_siswas[56];
                    $data_siswa->anak_keberapa              = $dapodik_siswas[57];      
                    $data_siswa->berat_badan                = $dapodik_siswas[61];
                    $data_siswa->tinggi_badan               = $dapodik_siswas[62];
                    $data_siswa->saudara_kandung            = $dapodik_siswas[64];
                    $data_siswa->jarak_tempat               = $dapodik_siswas[65];
                    $data_siswa->nis                        = $dapodik_siswas[2];
                    $data_siswa->nik_siswa                  = $dapodik_siswas[7];
                    $data_siswa->penerima_kps_pkh           = $dapodik_siswas[22];
                    $data_siswa->nomor_kps                  = $dapodik_siswas[23];
                    $data_siswa->save();
                }

                $data_siswa2_check = Data_siswa2::where('dapodik_id', $dapodik_siswas[2].'-'.$dapodik_siswas[4])->first();
                if ( ! $data_siswa2_check) {
                    $data_siswa_2 =  new Data_siswa2();
                    $data_siswa_2->dapodik_id               = $dapodik_siswas[2].'-'.$dapodik_siswas[4];
                    $data_siswa_2->rombel_saat_ini          = $dapodik_siswas[42];
                    $data_siswa_2->no_peserta_un            = $dapodik_siswas[43];
                    $data_siswa_2->lintang                  = $dapodik_siswas[58];
                    $data_siswa_2->bujur                    = $dapodik_siswas[59];
                    $data_siswa_2->no_kk                    = $dapodik_siswas[60];
                    $data_siswa_2->layak_pip_usulan_sekolah = $dapodik_siswas[53];           
                    $data_siswa_2->save();
                }

                $data_siswa3_check = Data_siswa3::where('dapodik_id', $dapodik_siswas[2].'-'.$dapodik_siswas[4])->first();
                if ( ! $data_siswa3_check) {
                    $data_siswa_3 = new Data_siswa3();
                    $data_siswa_3->dapodik_id = $dapodik_siswas[2].'-'.$dapodik_siswas[4];
                    $data_siswa_3->save();
                }

                $data_siswa4_check = Data_siswa4::where('dapodik_id', $dapodik_siswas[2].'-'.$dapodik_siswas[4])->first();
                if ( ! $data_siswa4_check) {
                    $data_siswa_4 = new Data_siswa4();
                    $data_siswa_4->dapodik_id = $dapodik_siswas[2].'-'.$dapodik_siswas[4];
                    $data_siswa_4->save();
                }

                $payment_check = Payment::where('dapodik_id', $dapodik_siswas[2].'-'.$dapodik_siswas[4])->first();
                if ( ! $payment_check) {
                    $payment = new Payment();
                    $payment->dapodik_id = $dapodik_siswas[2].'-'.$dapodik_siswas[4];
                    $payment->save();
                }

                $reregistration_check = ReRegistration::where('dapodik_id', $dapodik_siswas[2].'-'.$dapodik_siswas[4])->first();
                if ( ! $reregistration_check) {
                    $reregister = new ReRegistration();
                    $reregister->dapodik_id = $dapodik_siswas[2].'-'.$dapodik_siswas[4];
                    $reregister->save();
                }
            }         
            return redirect()->route('admin.pricing.index')->with(['flash_success' => 'Berhasil di Import Data PPDB']);         
    }


    public function export_excel()
	{
		return Excel::download(new SiswaExport, 'data_siswa.xlsx');
	}

    public function check_excel() {

        $pricings = 'ada';

        $pricings_wave2 = 12;

        $reregistration = Register::where('ppdb.document_status', 7)
        ->join('ppdb', 'ppdb.id', '=', 'reregister.ppdb_id')   
        ->select('reregister.*')
        ->get();

        foreach($reregistration as $reregistrations){
            $something = $reregistrations;
        }

        $data = [
            'pricings' => $pricings,
            'pricings_wave2' => $pricings_wave2,
            'reregistration' => $reregistration
        ];

        return new ViewResponse('backend.pricing.check_excel', $data);
    }


    public function check_excel2() {

        // FILE ADDITIONAL 2

        $pricings = 'ada';

        $pricings_wave2 = 12;

        //$reregistration = Register::all();

        $reregistration = Register::where('ppdb.document_status', 7)
        ->join('ppdb', 'ppdb.id', '=', 'reregister.ppdb_id')   
        ->select('reregister.*')
        ->get();

        debug($reregistration);

        $data = [
            'pricings' => $pricings,
            'pricings_wave2' => $pricings_wave2,
            'reregistration' => $reregistration
        ];

        return new ViewResponse('backend.pricing.check_excel2', $data);
    }

    public function check_payment() {
        // FILE PAYMENT
        $pricings = 'ada';
        $pricings_wave2 = 12;

        $reregistration = Register::where('ppdb.document_status', 7)
        ->join('ppdb', 'ppdb.id', '=', 'reregister.ppdb_id')   
        ->select('reregister.*')
        ->get();

        $payment_reregistration = Payment::where('ppdb.document_status', 7)
        ->join('ppdb', 'ppdb.id', '=', 'payment.ppdb_id')
        ->select('payment.*')
        ->get();

        debug($payment_reregistration);
        $data = [
            'pricings' => $pricings,
            'pricings_wave2' => $pricings_wave2,
            'payment_reregistration' => $payment_reregistration
        ];

        return new ViewResponse('backend.pricing.check_payment', $data);
    }



}
