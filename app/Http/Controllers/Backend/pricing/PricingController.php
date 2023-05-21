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
use App\Models\MasterKelas;
use App\Exports\SiswaExport;
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
use App\Http\Requests\Backend\Pricing\PricingPermissionRequest;

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

         $master = MasterKelas::all();

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
    public function uploadPricing(PricingPermissionRequest $request)
    {

        //PPDB DAFTAR ULANG

        $reregister_siswa = [];      
            
        $reregister_siswa = Excel::toArray(new ReregisterImport, $request->file('file_pricing'));

        $reregister_insert = [];

        foreach ($reregister_siswa[5] as $reregister_siswas) {
            array_push($reregister_insert, [        
                'id'                             => $reregister_siswas['id'],
                'file_additionalsatu'            => $reregister_siswas['file_additionalsatu'],
                'file_additionaldua'             => $reregister_siswas['file_additionaldua'],
                'ppdb_id'                        => $reregister_siswas['ppdb_id'],
                'medco_employee_file'            => $reregister_siswas['medco_employee_file'],
                'created_at'                     => $reregister_siswas['created_at'],
                'updated_at'                     => $reregister_siswas['updated_at']
               
            ]);
        }

        debug($reregister_insert);
        register::query()->truncate();

        register::insert($reregister_insert);


        //PPDB INTERVIEW

        $interview_siswa = [];      
            
        $interview_siswa = Excel::toArray(new InterviewImport, $request->file('file_pricing'));

        $interview_insert = [];

        foreach ($interview_siswa[4] as $interview_siswas) {
            array_push($interview_insert, [        
                'id'                                => $interview_siswas['id'],
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

        debug($interview_insert);
        PPDBInterview::query()->truncate();

        PPDBInterview::insert($interview_insert);

        //PAYMENT

        $payment_siswa = [];      
            
        $payment_siswa = Excel::toArray(new PaymentImport, $request->file('file_pricing'));

        $payment_insert = [];

        foreach ($payment_siswa[3] as $payment_siswas) {
            array_push($payment_insert, [        
                    'id'                         => $payment_siswas['id'],  
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

        debug($payment_insert);
        Payment::query()->truncate();

        Payment::insert($payment_insert);

        //PPDB 
        $ppdb_siswa = [];      
            
            $ppdb_siswa = Excel::toArray(new PPDBImport, $request->file('file_pricing'));

            var_dump($ppdb_siswa[0]);  //cek data sudah masuk

            $ppdb_insert = [];

            foreach ($ppdb_siswa[0] as $ppdb_siswas) {
                array_push($ppdb_insert, [        
                        'id'                    => $ppdb_siswas['id'],  
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

            debug($ppdb_insert);
            PPDB::query()->truncate();

            PPDB::insert($ppdb_insert);

        //DATASISWA_1
            $data_siswa = [];      
            
            $data_siswa = Excel::toArray(new DataImport, $request->file('file_pricing'));

            $data_siswa_insert = [];

            foreach ($data_siswa[1] as $datasiswa) {
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
                        'nama_Ibu'                  => $datasiswa['nama_ayah'],
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
                       
                        'jenis_3_0'                   => $datasiswa['jenis_3_0'],
                        'keterangan_3'              => $datasiswa['keterangan_3'],
                        'tahun_mulai_3'             => $datasiswa['tahun_mulai_3'],
                        'tahun_selesai_3'           => $datasiswa['tahun_selesai_3']
                ]);
            }

            debug($data_siswa_insert);

            Data_siswa::query()->truncate();

            Data_siswa::insert($data_siswa_insert);


               //DATASISWA_2
               $data_siswa2 = [];      
            
               $data_siswa2 = Excel::toArray(new DataImport, $request->file('file_pricing'));
   
               $data_siswa2_insert = [];
   
               foreach ($data_siswa2[1] as $data_siswas2) {
                   array_push($data_siswa_insert, [
                           'nama_orang_tua'                                             => $data_siswas2['nama_orang_tua'],           
                           'alamat_orang_tua_atau_wali'                                 => $data_siswas2['alamat_orang_tua_atau_wali'],
                           'membayar_uang_pangkal_up_2'                                 => $data_siswas2['membayar_uang_pangkal_up_2'],     
                           'pembayaran_spp_bulan_juli_2023'                             => $data_siswas2['pembayaran_spp_bulan_juli_2023'], 
                           'pembayaran_spp_setiap_bulannya_selambat'                    => $data_siswas2['pembayaran_spp_setiap_bulannya_selambat'], 
                           'jika_putra_putri_kami_sudah_melaksanakan_tes'               => $data_siswas2['jika_putra_putri_kami_sudah_melaksanakan_tes'], 
                           'jika_putra_putri_kami_diterima_di_sekolah_negeri'           => $data_siswas2['jika_putra_putri_kami_diterima_di_sekolah_negeri'], 
                           'apabila_putra_putri_kami_sudah_bersekolah_di_avicenna'      => $data_siswas2['apabila_putra_putri_kami_sudah_bersekolah_di_avicenna'],    
                           'apabila_putra_putri_kami_sudah_bersekolah_di_avicenna'      => $data_siswas2['apabila_putra_putri_kami_sudah_bersekolah_di_avicenna'], 
                           'kami_akan_mematuhi_seluruh_tata_tertib_sekolah'             => $data_siswas2['kami_akan_mematuhi_seluruh_tata_tertib_sekolah'], 
                           'seluruh_aktivitas_putra_putri_kami_dalam_photo_video'       => $data_siswas2['seluruh_aktivitas_putra_putri_kami_dalam_photo_video'], 
                           'seluruh_hasil_karya_peserta_didik_diijinkan'                => $data_siswas2['seluruh_hasil_karya_peserta_didik_diijinkan'], 
                           'berdasarkan_apa_yang_telah_saya_baca_dan_pahami'            => $data_siswas2['berdasarkan_apa_yang_telah_saya_baca_dan_pahami'], 
                           'nama_calon_murid'                                           => $data_siswas2['nama_calon_murid'], 
                           'kelas'                                                      => $data_siswas2['kelas'], 
                           'persetujuan_tata_tertib'                                    => $data_siswas2['persetujuan_tata_tertib'], 
                           'keadaan_jasmani'                                            => $data_siswas2['keadaan_jasmani'], 
                           'jenis_kelamin_laki'                                         => $data_siswas2['jenis_kelamin_laki'], 
                           'jenis_kelamin_perempuan'                                    => $data_siswas2['jenis_kelamin_perempuan'], 
                           'tempat_lahir'                                               => $data_siswas2[''], 
                           'tanggal_lahir'                                              => $data_siswas2['tanggal_lahir'], 
                           'berat_badan'                                                => $data_siswas2['berat_badan'], 
                           'tinggi_badan'                                               => $data_siswas2['tinggi_badan'], 
                           'golongan_darah'                                             => $data_siswas2['golongan_darah'], 
                           'memiliki_catatan_imunisasi'                                 => $data_siswas2['memiliki_catatan_imunisasi'], 
                           'saat_bayi_mendapatkan_imunisasi'                            => $data_siswas2['saat_bayi_mendapatkan_imunisasi'], 
                           'imunisasi_lengkap'                                          => $data_siswas2['imunisasi_lengkap'], 
                           'ada_gangguan_dan_kelainan'                                  => $data_siswas2['ada_gangguan_dan_kelainan'], 
                           'tidak_ada_gangguan_dan_kelainan'                            => $data_siswas2['tidak_ada_gangguan_dan_kelainan'], 
                           'berbahaya'                                                  => $data_siswas2['berbahaya'], 
                           'tidak_berbahaya'                                            => $data_siswas2['tidak_berbahaya'], 


                           'yang_lain'                                                  => $data_siswas2['yang_lain'], 
                           'normal_tidak_ada_gangguan'                                  => $data_siswas2['normal_tidak_ada_gangguan'], 
                           'ada_kompilasi_ketika_melahirkan'                            => $data_siswas2['ada_kompilasi_ketika_melahirkan'], 
                           'normal_tidak_ada_cacat_bawaan'                              => $data_siswas2['normal_tidak_ada_cacat_bawaan'], 
                           'ada_cacat_bawaan'                                           => $data_siswas2['ada_cacat_bawaan'], 
                           'normal'                                                     => $data_siswas2['normal'], 
                           'terlambat'                                                  => $data_siswas2['terlambat'], 
                           'normal'                                                     => $data_siswas2['normal'], 
                           'terlambat'                                                  => $data_siswas2['terlambat'], 
                           'normal'                                                     => $data_siswas2['normal'], 
                           'terlambat'                                                  => $data_siswas2['terlambat'], 
                           'normal'                                                     => $data_siswas2['normal'], 
                           'terlambat'                                                  => $data_siswas2['terlambat'],
                           'normal'                                                     => $data_siswas2['normal'], 
                           'terlambat'                                                  => $data_siswas2['terlambat'], 
                           'ada'                                                        => $data_siswas2['ada'], 
                           'tidak_ada'                                                  => $data_siswas2['tidak_ada'], 
                           'ya_pernah'                                                  => $data_siswas2['ya_pernah'], 
                           'tidak_pernah'                                               => $data_siswas2['tidak_pernah'], 
                           'ya_riwayat_kejang_demam'                                    => $data_siswas2['ya_riwayat_kejang_demam'], 
                           'tidak_riwayat_kejang_demam'                                 => $data_siswas2['tidak_riwayat_kejang_demam'], 
                           'memiliki_riwayat_penyakit_diderita'                         => $data_siswas2['memiliki_riwayat_penyakit_diderita'], 
                           'pernah_rawat_rumah_sakit'                                   => $data_siswas2['pernah_rawat_rumah_sakit'], 
                           'catatan_lain'                                               => $data_siswas2['catatan_lain'], 
                           'sekolah_asal'                                               => $data_siswas2['sekolah_asal'], 
                           'brand'                                                      => $data_siswas2['brand'], 
                           'kegiatan_sekolah'                                           => $data_siswas2['kegiatan_sekolah'], 
                           'media_cetak'                                                => $data_siswas2['media_cetak'], 
                           'media_elektronik'                                           => $data_siswas2['media_elektronik'], 
                           'media_sosial'                                               => $data_siswas2['media_sosial'], 

                           
                           'media_sosial'                                               => $data_siswas2['media_sosial'], 
                           'program_sekolah'                                            => $data_siswas2['program_sekolah'], 
                           'fasilitas_pelayanan'                                        => $data_siswas2['fasilitas_pelayanan'], 
                           'jarak'                                                      => $data_siswas2['jarak'], 
                           'uang_sekolah_terjangkau'                                    => $data_siswas2['uang_sekolah_terjangkau'], 
                           'fasilitas_sekolah_lengkap'                                  => $data_siswas2['fasilitas_sekolah_lengkap'], 
                           'kebersihan_gedung_sekolah'                                  => $data_siswas2['kebersihan_gedung_sekolah'], 
                           'pelayanan_informasi'                                        => $data_siswas2['pelayanan_informasi'], 
                           'tenaga_pendidik_kompeten'                                   => $data_siswas2['tenaga_pendidik_kompeten'], 
                           'tidak_pilih_fasilitas_pelayanan'                            => $data_siswas2['tidak_pilih_fasilitas_pelayanan'], 
                           '1km_jarak'                                                  => $data_siswas2['1km_jarak'], 
                           '1_sampai_5km'                                               => $data_siswas2['1_sampai_5km'], 
                           '6_sampai_10km'                                              => $data_siswas2['6_sampai_10km'], 
                           '11_sampai_20km'                                             => $data_siswas2['11_sampai_20km'], 
                           '21_sampai_30km'                                             => $data_siswas2['21_sampai_30km'], 
                           'tidak_pilih_jarak'                                          => $data_siswas2['tidak_pilih_jarak'], 
                           'uang_pangkal'                                               => $data_siswas2['uang_pangkal'], 
                           'spp'                                                        => $data_siswas2['spp'], 
                           'tanda_biaya_tambahan'                                       => $data_siswas2['tanda_biaya_tambahan'], 
                           'tidak_terjangkau_uang_sekolah'                              => $data_siswas2['tidak_terjangkau_uang_sekolah'], 
                           'sederhana_dan_mudah'                                        => $data_siswas2['sederhana_dan_mudah'], 
                           'standar_sama_sekolah_lain'                                  => $data_siswas2['standar_sama_sekolah_lain'], 
                           'berbelit_belit'                                             => $data_siswas2['berbelit_belit'], 
                           'uang_sekolah_tidak_murah'                                   => $data_siswas2['uang_sekolah_tidak_murah'], 
                           'merepotkan'                                                 => $data_siswas2['merepotkan'], 
                           'pendapat_saya'                                              => $data_siswas2['pendapat_saya'], 
                           'program_7_habits'                                           => $data_siswas2['program_7_habits'], 
                           'prestasi_sekolah'                                           => $data_siswas2['prestasi_sekolah'], 
                           'ekstrakulikuler'                                            => $data_siswas2['ekstrakulikuler'], 
                           'booster_1'                                                  => $data_siswas2['booster_1'], 
                           'booster_2'                                                  => $data_siswas2['booster_2'], 
                           'booster_3'                                                  => $data_siswas2['booster_3'], 
                           'belum_vaksin'                                               => $data_siswas2['belum_vaksin'], 
                           'ppdb_id'                                                    => $data_siswas2['ppdb_id']

                    
                   ]);
               }
   
               debug($data_siswa_insert);
   
               Data_siswa::query()->truncate();
   
               Data_siswa::insert($data_siswa_insert);
      
               return redirect()->route('admin.pricing.index');    
         

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
