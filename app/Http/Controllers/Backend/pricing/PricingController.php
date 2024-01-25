<?php

namespace App\Http\Controllers\Backend\Pricing;

use Carbon\Carbon;
use App\Models\PPDB;
use App\Models\Users;
use App\Models\Dapodik;
use App\Models\Payment;
use App\Models\Pricing;
use App\Models\Register;
use App\Models\Data_siswa;
use App\Imports\DataImport;
use App\Imports\PPDBImport;
use App\Imports\UserImport;
use App\Models\Data_siswa1;
use App\Models\Data_siswa2;
use App\Models\Data_siswa3;
use App\Models\Data_siswa4;
use App\Models\MasterKelas;
use App\Models\PPDB_system;
use App\Exports\SiswaExport;
use App\Imports\DataImport2;
use App\Imports\DataImport3;
use App\Imports\DataImport4;
use App\Models\Users_system;
use Illuminate\Http\Request;
use App\Models\PPDBInterview;
use App\Imports\DapodikImport;
use App\Imports\PaymentImport;
use App\Imports\PricingImport;
use App\Models\Dapodik_system;
use App\Models\Payment_system;
use App\Models\ReRegistration;
use App\Imports\InterviewImport;
use App\Imports\ReregisterImport;
use App\Models\Data_siswa_system;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use App\Models\Data_siswa_system_1;
use App\Models\Data_siswa_system_2;
use App\Models\Data_siswa_system_3;
use App\Models\Data_siswa_system_4;
use App\Models\Reregistrasi_system;
use App\Http\Controllers\Controller;
use App\Http\Responses\ViewResponse;
use App\Models\RegistrationSchedule;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Ppdb_interviews_system;
use Illuminate\Support\Facades\Storage;
use App\Http\Responses\RedirectResponse;
use App\Repositories\Backend\PPDBRepository;
use Symfony\Component\VarDumper\Cloner\Data;
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
        $pricings_wave2 = Pricing::where([
            ['price_group',      '=', 'gelombang 2'],
        ])->get();
        $data = [
            'pricings_wave2' => $pricings_wave2
        ];
        return new ViewResponse('backend.pricing.indexwave2', $data);
    }


    public function master()
    {
        $master = MasterKelas::orderBy('sekolah', 'ASC')->get();
        $data = [
            'master' => $master
        ];
        return new ViewResponse('backend.pricing.master', $data);
    }

    public function masterstore()
    {
        $master = "storedush";
        $master = DB::table('ppdb')->where([
            ['school_site', '=', 'PML'],
            ['stage', '=', 'TK']
        ])->get()->unique('classes');
        $data = [
            'master' => $master
        ];
        return new ViewResponse('backend.pricing.masterstore', $data);
    }

    public function masterinsert(Request $request)
    {
        $masterinsert = new MasterKelas;
        $masterinsert->kategori = $request->kategori_kelas;
        $masterinsert->kelas = $request->nama_kelas;
        $masterinsert->unit = $request->unit;
        $masterinsert->sekolah = $request->sekolah;
        $masterinsert->kepala_sekolah = $request->kepala_sekolah;
        $masterinsert->wali_kelas = $request->wali_kelas;
        $masterinsert->save();
        return redirect()->back()->withFlashSuccess(__('alerts.backend.access.users.session_insert'));
    }

    public function masterDelete(Request $request)
    {
        $masterdelete = MasterKelas::where('id', $request->item_value)->first();
        $masterdelete->delete();
        return redirect()->back()->withFlashSuccess(__('alerts.backend.access.users.session_deleted'));
    }

    public function masterdone(Request $request)
    {
        $masterupdate = MasterKelas::where('id', $request->id_item)->first();
        $masterupdate->kategori = $request->kategori_kelas;
        $masterupdate->kelas = $request->nama_kelas;
        $masterupdate->unit = $request->unit;
        $masterupdate->sekolah = $request->sekolah;
        $masterupdate->kepala_sekolah = $request->kepala_sekolah;
        $masterupdate->wali_kelas = $request->wali_kelas;
        $masterupdate->save();
        return redirect()->back()->withFlashSuccess(__('alerts.backend.access.users.session_updated'));
    }

    public function masterUpdate($id)
    {
        $masterupdate = MasterKelas::where('id', $id)->first();
        $data = ['masterupdate' => $masterupdate];
        return new ViewResponse('backend.pricing.masterupdate', $data);
    }

    /**
     * @param \App\Http\Requests\Backend\Pricing\PricingPermissionRequest $request
     *
     * @return ViewResponse
     */
    public function uploadDatasiswa(PricingPermissionRequest $request)
    {
        try {
            //PPDB DAFTAR ULANG
            $datasiswa_upload = [];
            $datasiswa_upload = Excel::toArray(new ReregisterImport, $request->file('file_pricing'));
            $reregister_insert = [];
            foreach ($datasiswa_upload[5] as $datasiswa_uploads) {
                $existing_register = register::where('ppdb_id', $datasiswa_uploads['ppdb_id'])->first();
                if (!$existing_register) {
                    array_push($reregister_insert, [
                        'file_additionalsatu'            => $datasiswa_uploads['file_additionalsatu'],
                        'file_additionaldua'             => $datasiswa_uploads['file_additionaldua'],
                        'ppdb_id'                        => $datasiswa_uploads['ppdb_id'],
                        'medco_employee_file'            => $datasiswa_uploads['medco_employee_file'],
                        'created_at'                     => $datasiswa_uploads['created_at'],
                        'updated_at'                     => $datasiswa_uploads['updated_at']
                    ]);
                }
            }

            //PPDB INTERVIEW
            $interview_insert = [];
            foreach ($datasiswa_upload[4] as $datasiswa_uploads) {
                $existing_interview = PPDBInterview::where('ppdb_id', $datasiswa_uploads['ppdb_id'])->first();
                if (!$existing_interview) {
                    array_push($interview_insert, [
                        'ppdb_id'                           => $datasiswa_uploads['ppdb_id'],
                        'school_recomendation_result'       => $datasiswa_uploads['school_recomendation_result'],
                        'school_recomendation_file'         => $datasiswa_uploads['school_recomendation_file'],
                        'school_recomendation_note'         => $datasiswa_uploads['school_recomendation_note'],
                        'is_submited'                       => $datasiswa_uploads['is_submited'],
                        'interview_result'                  => $datasiswa_uploads['interview_result'],
                        'interview_result_file'             => $datasiswa_uploads['interview_result_file'],
                        'interview_result_note'             => $datasiswa_uploads['interview_result_note'],
                        'kesiapan_file'                     => $datasiswa_uploads['kesiapan_file'],
                        'kesiapan_result'                   => $datasiswa_uploads['kesiapan_result'],
                        'kesiapan_result_note'              => $datasiswa_uploads['kesiapan_result_note'],
                        'academic_value'                    => $datasiswa_uploads['academic_value'],
                        'academic_file'                     => $datasiswa_uploads['academic_file'],
                        'academic_result'                   => $datasiswa_uploads['academic_result'],
                        'academic_result_note'              => $datasiswa_uploads['academic_result_note'],
                        'interview_parent_summary'          => $datasiswa_uploads['interview_parent_summary'],
                        'interview_parent_file'             => $datasiswa_uploads['interview_parent_file'],
                        'interview_parent_result_note'      => $datasiswa_uploads['interview_parent_result_note'],
                        'interview_student_summary'         => $datasiswa_uploads['interview_student_summary'],
                        'interview_student_result'          => $datasiswa_uploads['interview_student_result'],
                        'observasi_value'                   => $datasiswa_uploads['observasi_value'],
                        'observasi_summary'                 => $datasiswa_uploads['observasi_summary'],
                        'observasi_file'                    => $datasiswa_uploads['observasi_file'],
                        'observasi_result'                  => $datasiswa_uploads['observasi_result'],
                        'observasi_result_note'             => $datasiswa_uploads['observasi_result_note'],
                        'created_at'                        => $datasiswa_uploads['created_at'],
                        'updated_at'                        => $datasiswa_uploads['updated_at'],
                        'deleted_at'                        => $datasiswa_uploads['deleted_at']
                    ]);
                }
            }

            //PAYMENT
            $payment_insert = [];
            foreach ($datasiswa_upload[3] as $datasiswa_uploads) {
                $existing_payment = Payment::where('ppdb_id', $datasiswa_uploads['ppdb_id'])->first();
                if (!$existing_payment) {
                    array_push($payment_insert, [
                        'ppdb_id'                    => $datasiswa_uploads['ppdb_id'],
                        'payment_type'               => $datasiswa_uploads['payment_type'],
                        'payment_code'               => $datasiswa_uploads['payment_code'],
                        'confirmation_status'        => $datasiswa_uploads['confirmation_status'],
                        'date_send'                  => $datasiswa_uploads['date_send'],
                        'bank_owner_name'            => $datasiswa_uploads['bank_owner_name'],
                        'bank_code'                  => $datasiswa_uploads['bank_code'],
                        'account_number'             => $datasiswa_uploads['account_number'],
                        'cost'                       => $datasiswa_uploads['cost'],
                        'image_confirmation'         => $datasiswa_uploads['image_confirmation'],
                        'created_at'                 => $datasiswa_uploads['created_at'],
                        'updated_at'                 => $datasiswa_uploads['updated_at']
                    ]);
                }
            }

            //PPDB 
            $ppdb_insert = [];
            foreach ($datasiswa_upload[0] as $datasiswa_uploads) {
                $existing_ppdb = PPDB::where('ppdb_id', $datasiswa_uploads['ppdb_id'])->first();
                if (!$existing_ppdb) {
                    array_push($ppdb_insert, [
                        'ppdb_id'                    => $datasiswa_uploads['ppdb_id'],
                        'registration_schedule_id'   => $datasiswa_uploads['registration_schedule_id'],
                        'document_no'                => $datasiswa_uploads['document_no'],
                        'document_status'            => $datasiswa_uploads['document_status'],
                        'id_user'                    => $datasiswa_uploads['id_user'],
                        'school_site'                => $datasiswa_uploads['school_site'],
                        'stage'                      => $datasiswa_uploads['stage'],
                        'classes'                    => $datasiswa_uploads['classes'],
                        'student_status'             => $datasiswa_uploads['student_status'],
                        'fullname'                   => $datasiswa_uploads['fullname'],
                        'gender'                     => $datasiswa_uploads['gender'],
                        'place_of_birth'             => $datasiswa_uploads['place_of_birth'],
                        'date_of_birth'              => $datasiswa_uploads['date_of_birth'],
                        'religion'                   => $datasiswa_uploads['religion'],
                        'nationality'                => $datasiswa_uploads['nationality'],
                        'address'                    => $datasiswa_uploads['address'],
                        'home_phone'                 => $datasiswa_uploads['home_phone'],
                        'hand_phone'                 => $datasiswa_uploads['hand_phone'],
                        'school_origin'              => $datasiswa_uploads['school_origin'],
                        'family_card'                => $datasiswa_uploads['family_card'],
                        'birth_certificate'          => $datasiswa_uploads['birth_certificate'],
                        'last_report'                => $datasiswa_uploads['last_report'],
                        'academic_certificate'       => $datasiswa_uploads['academic_certificate'],
                        'kia_book'                   => $datasiswa_uploads['kia_book'],
                        'file_additional'            => $datasiswa_uploads['file_additional'],
                        'medco_employee'             => $datasiswa_uploads['medco_employee'],
                        'medco_employee_file'        => $datasiswa_uploads['medco_employee_file'],
                        'ppdb_discount'              => $datasiswa_uploads['ppdb_discount'],
                        'studied_before'             => $datasiswa_uploads['studied_before'],
                        'file_additional_satu'       => $datasiswa_uploads['file_additional_satu'],
                        'file_additional_dua'        => $datasiswa_uploads['file_additional_dua'],
                        'file_additional_tiga'       => $datasiswa_uploads['file_additional_tiga'],
                        'file_additional_empat'      => $datasiswa_uploads['file_additional_empat'],
                        'file_additional_lima'       => $datasiswa_uploads['file_additional_lima'],
                        'tingkat_satu'               => $datasiswa_uploads['tingkat_satu'],
                        'tingkat_dua'                => $datasiswa_uploads['tingkat_dua'],
                        'tingkat_tiga'               => $datasiswa_uploads['tingkat_tiga'],
                        'tingkat_empat'              => $datasiswa_uploads['tingkat_empat'],
                        'tingkat_lima'               => $datasiswa_uploads['tingkat_lima'],
                        'deskripsi_satu'             => $datasiswa_uploads['deskripsi_satu'],
                        'deskripsi_dua'              => $datasiswa_uploads['deskripsi_dua'],
                        'deskripsi_tiga'             => $datasiswa_uploads['deskripsi_tiga'],
                        'deskripsi_empat'            => $datasiswa_uploads['deskripsi_empat'],
                        'deskripsi_lima'             => $datasiswa_uploads['deskripsi_lima'],
                        'status_siswa'               => $datasiswa_uploads['status_siswa'],
                        'gaji'                       => $datasiswa_uploads['gaji'],
                        'slip_gaji_parent'           => $datasiswa_uploads['slip_gaji_parent'],
                        'updated_by'                 => $datasiswa_uploads['updated_by'],
                        'created_at'                 => $datasiswa_uploads['created_at'],
                        'updated_at'                 => $datasiswa_uploads['updated_at'],
                        'rejected_at'                => $datasiswa_uploads['rejected_at'],
                        'rejected_by'                => $datasiswa_uploads['rejected_by']
                    ]);
                }
            }

            //DATASISWA    
            $data_siswa_insert = [];
            foreach ($datasiswa_upload[1] as $datasiswa_uploads) {
                $existing_data_siswa = Data_siswa::where('ppdb_id', $datasiswa_uploads['ppdb_id'])->first();
                if (!$existing_data_siswa) {
                    array_push($data_siswa_insert, [
                        'nama_lengkap'      => $datasiswa_uploads['nama_lengkap'],
                        'jenis_kelamin'     => $datasiswa_uploads['jenis_kelamin'],
                        'nisn'              => $datasiswa_uploads['nisn'],
                        'tempat_lahir'      => $datasiswa_uploads['tempat_lahir'],
                        'tanggal_lahir'     => $datasiswa_uploads['tanggal_lahir'],
                        'ppdb_id'           => $datasiswa_uploads['ppdb_id'],
                        'agama'             => $datasiswa_uploads['agama'],
                        'alamat_jalan'      => $datasiswa_uploads['alamat_jalan'],
                        'rt'                => $datasiswa_uploads['rt'],
                        'rw'                => $datasiswa_uploads['rw'],
                        'nama_dusun'        => $datasiswa_uploads['nama_dusun'],
                        'nama_kelurahan'    => $datasiswa_uploads['nama_kelurahan'],
                        'kecamatan'         => $datasiswa_uploads['kecamatan'],
                        'kode_pos'          => $datasiswa_uploads['kode_pos'],
                        'tempat_tinggal'    => $datasiswa_uploads['tempat_tinggal'],
                        'moda_transportasi' => $datasiswa_uploads['moda_transportasi'],
                        'telepon_rumah'     => $datasiswa_uploads['telepon_rumah'],
                        'nomor_hp'          => $datasiswa_uploads['nomor_hp'],
                        'email'             => $datasiswa_uploads['email'],
                        'no_seri_skhun'     => $datasiswa_uploads['no_seri_skhun'],
                        'nama_ayah'         => $datasiswa_uploads['nama_ayah'],
                        'tahun_lahir_ayah'  => $datasiswa_uploads['tahun_lahir_ayah'],
                        'pendidikan_ayah'   => $datasiswa_uploads['pendidikan_ayah'],
                        'pekerjaan_ayah'    => $datasiswa_uploads['pekerjaan_ayah'],
                        'penghasilan_bulanan_ayah' => $datasiswa_uploads['penghasilan_bulanan_ayah'],
                        'nik_ayah'          => $datasiswa_uploads['nik_ayah'],
                        'nama_ibu'          => $datasiswa_uploads['nama_ibu'],
                        'tahun_lahir_ibu'   => $datasiswa_uploads['tahun_lahir_ibu'],
                        'pendidikan_ibu'    => $datasiswa_uploads['pendidikan_ibu'],
                        'pekerjaan_ibu'     => $datasiswa_uploads['pekerjaan_ibu'],
                        'penghasilan_bulanan_ibu' => $datasiswa_uploads['penghasilan_bulanan_ibu'],
                        'nik_ibu'           => $datasiswa_uploads['nik_ibu'],
                        'nama_wali'         => $datasiswa_uploads['nama_wali'],
                        'tahun_lahir_wali'  => $datasiswa_uploads['tahun_lahir_wali'],
                        'pendidikan_wali'   => $datasiswa_uploads['pendidikan_wali'],
                        'pekerjaan_wali'    => $datasiswa_uploads['pekerjaan_wali'],
                        'penghasilan_bulanan_wali' => $datasiswa_uploads['penghasilan_bulanan_wali'],
                        'nik_wali'          => $datasiswa_uploads['nik_wali'],
                        'no_seri_ijazah'    => $datasiswa_uploads['no_seri_ijazah'],
                        'kip'               => $datasiswa_uploads['kip'],
                        'nomor_kip'         => $datasiswa_uploads['nomor_kip'],
                        'nama_kip'          => $datasiswa_uploads['nama_kip'],
                        'nomor_kks'         => $datasiswa_uploads['nomor_kks'],
                        'akta_kelahiran'    => $datasiswa_uploads['akta_kelahiran'],
                        'bank'              => $datasiswa_uploads['bank'],
                        'no_rekening'       => $datasiswa_uploads['no_rekening'],
                        'rekening_atas_nama' => $datasiswa_uploads['rekening_atas_nama'],
                        'alasan_layak_pip'  => $datasiswa_uploads['alasan_layak_pip'],
                        'berkebutuhan_khusus' => $datasiswa_uploads['berkebutuhan_khusus'],
                        'asal_sekolah'      => $datasiswa_uploads['asal_sekolah'],
                        'anak_keberapa'     => $datasiswa_uploads['anak_keberapa']
                    ]);
                }
            }

            //DATASISWA_1
            $data_siswa1_insert = [];
            foreach ($datasiswa_upload[1] as $datasiswa_uploads) {
                $existing_data_siswa1 = Data_siswa1::where('ppdb_id', $datasiswa_uploads['ppdb_id'])->first();
                if (!$existing_data_siswa1) {
                    array_push($data_siswa1_insert, [
                        'ppdb_id' => $datasiswa_uploads['ppdb_id'],
                        'berat_badan' => $datasiswa_uploads['berat_badan'],
                        'tinggi_badan' => $datasiswa_uploads['tinggi_badan'],
                        'saudara_kandung' => $datasiswa_uploads['saudara_kandung'],
                        'jarak_tempat' => $datasiswa_uploads['jarak_tempat'],
                        'penerima_kps_pkh' => $datasiswa_uploads['penerima_kps_pkh'],
                        'tahun_ajaran' => $datasiswa_uploads['tahun_ajaran'],
                        'tanggal_pendaftaran' => $datasiswa_uploads['tanggal_pendaftaran'],
                        'status_siswa' => $datasiswa_uploads['status_siswa'],
                        'no_formulir' => $datasiswa_uploads['no_formulir'],
                        'kitas' => $datasiswa_uploads['kitas'],
                        'kewarganegaraan' => $datasiswa_uploads['kewarganegaraan'],
                        'nama_negara' => $datasiswa_uploads['nama_negara'],
                        'no_kph_pkh' => $datasiswa_uploads['no_kph_pkh'],
                        'usulan_dari_sekolah' => $datasiswa_uploads['usulan_dari_sekolah'],
                        'berkebutuhan_khusus_ayah' => $datasiswa_uploads['berkebutuhan_khusus_ayah'],
                        'berkebutuhan_khusus_ibu' => $datasiswa_uploads['berkebutuhan_khusus_ibu'],
                        'jenis_ekstrakulikuler' => $datasiswa_uploads['jenis_ekstrakulikuler'],
                        'berkebutuhan_khusus_2' => $datasiswa_uploads['berkebutuhan_khusus_2'],
                        'nama_kelurahan_2' => $datasiswa_uploads['nama_kelurahan_2'],
                        'jurusan' => $datasiswa_uploads['jurusan'],
                        'jenis_pendaftaran' => $datasiswa_uploads['jenis_pendaftaran'],
                        'nis' => $datasiswa_uploads['nis'],
                        'tanggal_masuk_sekolah' => $datasiswa_uploads['tanggal_masuk_sekolah'],
                        'nomor_peserta_ujian' => $datasiswa_uploads['nomor_peserta_ujian'],
                        'keluar_karena' => $datasiswa_uploads['keluar_karena'],
                        'tanggal_keluar' => $datasiswa_uploads['tanggal_keluar'],
                        'alasan' => $datasiswa_uploads['alasan'],
                        'persetujuan' => $datasiswa_uploads['persetujuan'],
                        'jenis_1' => $datasiswa_uploads['jenis_1'],
                        'tingkat_1' => $datasiswa_uploads['tingkat_1'],
                        'nama_prestasi_1' => $datasiswa_uploads['nama_prestasi_1'],
                        'tahun_1' => $datasiswa_uploads['tahun_1'],
                        'penyelenggara_1' => $datasiswa_uploads['penyelenggara_1'],
                        'jenis_2' => $datasiswa_uploads['jenis_2'],
                        'tingkat_2' => $datasiswa_uploads['tingkat_2'],
                        'nama_prestasi_2' => $datasiswa_uploads['nama_prestasi_2'],
                        'tahun_2' => $datasiswa_uploads['tahun_2'],
                        'penyelenggara_2' => $datasiswa_uploads['penyelenggara_2'],
                        'jenis_3' => $datasiswa_uploads['jenis_3'],
                        'tingkat_3' => $datasiswa_uploads['tingkat_3'],
                        'nama_prestasi_3' => $datasiswa_uploads['nama_prestasi_3'],
                        'tahun_3' => $datasiswa_uploads['tahun_3'],
                        'penyelenggara_3' => $datasiswa_uploads['penyelenggara_3'],
                        'jenis_1_0' => $datasiswa_uploads['jenis_1_0'],
                        'keterangan_1' => $datasiswa_uploads['keterangan_1'],
                        'tahun_mulai_1' => $datasiswa_uploads['tahun_mulai_1'],
                        'tahun_selesai_1' => $datasiswa_uploads['tahun_selesai_1'],
                        'jenis_2_0' => $datasiswa_uploads['jenis_2_0'],
                        'keterangan_2' => $datasiswa_uploads['keterangan_2'],
                        'tahun_mulai_2' => $datasiswa_uploads['tahun_mulai_2'],
                        'tahun_selesai_2' => $datasiswa_uploads['tahun_selesai_2'],
                        'jenis_3_0' => $datasiswa_uploads['jenis_3_0'],
                        'keterangan_3' => $datasiswa_uploads['keterangan_3'],
                        'tahun_mulai_3' => $datasiswa_uploads['tahun_mulai_3'],
                        'tahun_selesai_3' => $datasiswa_uploads['tahun_selesai_3']
                    ]);
                }
            }

            //DATASISWA_2      
            $data_siswa2_insert = [];
            foreach ($datasiswa_upload[2] as $datasiswa_uploads) {
                $existing_data_siswa2 = Data_siswa2::where('ppdb_id', $datasiswa_uploads['ppdb_id'])->first();
                if (!$existing_data_siswa2) {
                    array_push($data_siswa2_insert, [
                        'nama_orang_tua'                                             => $datasiswa_uploads['nama_orang_tua'],
                        'alamat_orang_tua'                                           => $datasiswa_uploads['alamat_orang_tua_atau_wali'],
                        'uang_pangkal_up_2'                                          => $datasiswa_uploads['membayar_uang_pangkal_up_2'],
                        'spp_bulan_juli_2023'                                        => $datasiswa_uploads['pembayaran_spp_bulan_juli_2023'],
                        'spp_setiap_bulan'                                           => $datasiswa_uploads['pembayaran_spp_setiap_bulannya_selambat'],
                        'sudah_melaksanakan_tes'                                     => $datasiswa_uploads['jika_putra_putri_kami_sudah_melaksanakan_tes'],
                        'diterima_di_sekolah_negeri'                                 => $datasiswa_uploads['jika_putra_putri_kami_diterima_di_sekolah_negeri'],
                        'sudah_bersekolah_di_avicenna'                               => $datasiswa_uploads['apabila_putra_putri_kami_sudah_bersekolah_di_avicenna'],
                        'sudah_bersekolah_di_avicenna_2'                             => $datasiswa_uploads['apabila_putra_putri_kami_sudah_bersekolah_di_avicenna'],  //tanda tanya
                        'tata_tertib_sekolah'                                        => $datasiswa_uploads['kami_akan_mematuhi_seluruh_tata_tertib_sekolah'],
                        'aktivitas_foto_video'                                       => $datasiswa_uploads['seluruh_aktivitas_putra_putri_kami_dalam_photo_video'],
                        'didik_diijinkan'                                            => $datasiswa_uploads['seluruh_hasil_karya_peserta_didik_diijinkan'],
                        'baca_dan_pahami'                                            => $datasiswa_uploads['berdasarkan_apa_yang_telah_saya_baca_dan_pahami'],
                        'nama_calon_murid'                                           => $datasiswa_uploads['nama_calon_murid'],
                        'kelas'                                                      => $datasiswa_uploads['kelas'],
                        'persetujuan_tata_tertib'                                    => $datasiswa_uploads['persetujuan_tata_tertib'],
                        'jasmani'                                                    => $datasiswa_uploads['keadaan_jasmani'],
                        'laki_laki'                                                  => $datasiswa_uploads['jenis_kelamin_laki'],
                        'perempuan'                                                  => $datasiswa_uploads['jenis_kelamin_perempuan'],
                        'tempat_lahir'                                               => $datasiswa_uploads['tempat_lahir'],
                        'tanggal_lahir'                                              => $datasiswa_uploads['tanggal_lahir'],
                        'berat_badan'                                                => $datasiswa_uploads['berat_badan'],
                        'tinggi_badan'                                               => $datasiswa_uploads['tinggi_badan'],
                        'golongan_darah'                                             => $datasiswa_uploads['golongan_darah'],
                        'catatan_imunisasi'                                          => $datasiswa_uploads['memiliki_catatan_imunisasi'],
                        'imunisasi'                                                  => $datasiswa_uploads['saat_bayi_mendapatkan_imunisasi'],
                        'imunisasi_lengkap'                                          => $datasiswa_uploads['imunisasi_lengkap'],
                        'gangguan_dan_kelainan'                                      => $datasiswa_uploads['ada_gangguan_dan_kelainan'],
                        'tidak_ada_gangguan'                                         => $datasiswa_uploads['tidak_ada_gangguan_dan_kelainan'],
                        'berbahaya'                                                  => $datasiswa_uploads['berbahaya'],
                        'tidak_berbahaya'                                            => $datasiswa_uploads['tidak_berbahaya'],
                        'ppdb_id'                                                    => $datasiswa_uploads['ppdb_id']
                    ]);
                }
            }

            //DATASISWA_3
            $data_siswa3_insert = [];
            foreach ($datasiswa_upload[2] as $datasiswa_uploads) {
                $existing_data_siswa3 = Data_siswa3::where('ppdb_id', $datasiswa_uploads['ppdb_id'])->first();
                if (!$existing_data_siswa3) {
                    array_push($data_siswa3_insert, [
                        'ppdb_id'                                                    => $datasiswa_uploads['ppdb_id'],
                        'yang_lain'                                                  => $datasiswa_uploads['yang_lain'],
                        'normal_tidak_gangguan'                                      => $datasiswa_uploads['normal_tidak_ada_gangguan'],
                        'kompilasi_ketika_melahirkan'                                => $datasiswa_uploads['ada_kompilasi_ketika_melahirkan'],
                        'tidak_ada_cacat'                                            => $datasiswa_uploads['normal_tidak_ada_cacat_bawaan'],
                        'cacat_bawaan'                                               => $datasiswa_uploads['ada_cacat_bawaan'],
                        'normal_1'                                                   => $datasiswa_uploads['normal_1'],
                        'terlambat_1'                                                => $datasiswa_uploads['terlambat_1'],
                        'normal_2'                                                   => $datasiswa_uploads['normal_2'],
                        'terlambat_2'                                                => $datasiswa_uploads['terlambat_2'],
                        'normal_3'                                                   => $datasiswa_uploads['normal_3'],
                        'terlambat_3'                                                => $datasiswa_uploads['terlambat_3'],
                        'normal_4'                                                   => $datasiswa_uploads['normal_4'],
                        'terlambat_4'                                                => $datasiswa_uploads['terlambat_4'],
                        'normal_5'                                                   => $datasiswa_uploads['normal_5'],
                        'terlambat_5'                                                => $datasiswa_uploads['terlambat_5'],
                        'ada'                                                        => $datasiswa_uploads['ada'],
                        'tidak_ada'                                                  => $datasiswa_uploads['tidak_ada'],
                        'ya_pernah'                                                  => $datasiswa_uploads['ya_pernah'],
                        'tidak_pernah'                                               => $datasiswa_uploads['tidak_pernah'],
                        'ya_riwayat_kejang'                                          => $datasiswa_uploads['ya_riwayat_kejang_demam'],
                        'tidak_riwayat_kejang'                                       => $datasiswa_uploads['tidak_riwayat_kejang_demam'],
                        'riwayat_penyakit_diderita'                                  => $datasiswa_uploads['memiliki_riwayat_penyakit_diderita'],
                        'rawat_rumah_sakit'                                          => $datasiswa_uploads['pernah_rawat_rumah_sakit'],
                        'catatan_lain'                                               => $datasiswa_uploads['catatan_lain'],
                        'sekolah_asal'                                               => $datasiswa_uploads['sekolah_asal'],
                        'brand'                                                      => $datasiswa_uploads['brand'],
                        'kegiatan_sekolah'                                           => $datasiswa_uploads['kegiatan_sekolah'],
                        'media_cetak'                                                => $datasiswa_uploads['media_cetak'],
                        'media_elektronik'                                           => $datasiswa_uploads['media_elektronik'],
                        'media_sosial'                                               => $datasiswa_uploads['media_sosial']
                    ]);
                }
            }

            //USERS
            $users_system_insert = [];
            foreach ($datasiswa_upload[6] as $datasiswa_uploads) {
                $existing_users_system = Users_system::where('user_id', $datasiswa_uploads['user_id'])->first();
                if (!$existing_users_system) {
                    array_push($users_system_insert, [
                        'user_id'                             => $datasiswa_uploads['user_id'],
                        'uuid'                                => $datasiswa_uploads['uuid'],
                        'first_name'                          => $datasiswa_uploads['first_name'],
                        'last_name'                           => $datasiswa_uploads['last_name'],
                        'email'                               => $datasiswa_uploads['email'],
                        'phone'                               => $datasiswa_uploads['phone'],
                        'avatar_type'                         => $datasiswa_uploads['avatar_type'],
                        'avatar_location'                     => $datasiswa_uploads['avatar_location'],
                        'password'                            => $datasiswa_uploads['password'],
                        'password_changed_at'                 => $datasiswa_uploads['password_changed_at'],
                        'active'                              => $datasiswa_uploads['active'],
                        'confirmation_code'                   => $datasiswa_uploads['confirmation_code'],
                        'confirmed'                           => $datasiswa_uploads['confirmed'],
                        'timezone'                            => $datasiswa_uploads['timezone'],
                        'last_login_at'                       => $datasiswa_uploads['last_login_at'],
                        'last_login_ip'                       => $datasiswa_uploads['last_login_ip'],
                        'to_be_logged_out'                    => $datasiswa_uploads['to_be_logged_out'],
                        'status'                              => $datasiswa_uploads['status'],
                        'created_by'                          => $datasiswa_uploads['created_by'],
                        'updated_by'                          => $datasiswa_uploads['updated_by'],
                        'is_term_accept'                      => $datasiswa_uploads['is_term_accept'],
                        'remember_token'                      => $datasiswa_uploads['remember_token'],
                        'created_at'                          => $datasiswa_uploads['created_at'],
                        'updated_at'                          => $datasiswa_uploads['updated_at'],
                        'deleted_at'                          => $datasiswa_uploads['deleted_at']
                    ]);
                }
            }

            //DATASISWA_4
            $data_siswa4_insert = [];
            foreach ($datasiswa_upload[2] as $datasiswa_uploads) {
                $existing_data_siswa4 = Data_siswa4::where('ppdb_id', $datasiswa_uploads['ppdb_id'])->first();
                if (!$existing_data_siswa4) {
                    array_push($data_siswa4_insert, [
                        'media_sosial_2'                                             => $datasiswa_uploads['media_sosial'],
                        'program_sekolah'                                            => $datasiswa_uploads['program_sekolah'],
                        'fasilitas_pelayanan'                                        => $datasiswa_uploads['fasilitas_pelayanan'],
                        'jarak'                                                      => $datasiswa_uploads['jarak'],
                        'uang_sekolah_terjangkau'                                    => $datasiswa_uploads['uang_sekolah_terjangkau'],
                        'fasilitas_lengkap'                                          => $datasiswa_uploads['fasilitas_sekolah_lengkap'],
                        'kebersihan'                                                 => $datasiswa_uploads['kebersihan_gedung_sekolah'],
                        'pelayanan_informasi'                                        => $datasiswa_uploads['pelayanan_informasi'],
                        'tenaga_pendidik_kompeten'                                   => $datasiswa_uploads['tenaga_pendidik_kompeten'],
                        'tidak_pilih_fasilitas_pelayanan'                            => $datasiswa_uploads['tidak_pilih_fasilitas_pelayanan'],
                        '1km_jarak'                                                  => $datasiswa_uploads['1km_jarak'],
                        '1_sampai_5km'                                               => $datasiswa_uploads['1_sampai_5km'],
                        '6_sampai_10km'                                              => $datasiswa_uploads['6_sampai_10km'],
                        '11_sampai_20km'                                             => $datasiswa_uploads['11_sampai_20km'],
                        '21_sampai_30km'                                             => $datasiswa_uploads['21_sampai_30km'],
                        'tidak_pilih_jarak'                                          => $datasiswa_uploads['tidak_pilih_jarak'],
                        'uang_pangkal'                                               => $datasiswa_uploads['uang_pangkal'],
                        'spp'                                                        => $datasiswa_uploads['spp'],
                        'tanda_biaya_tambahan'                                       => $datasiswa_uploads['tanda_biaya_tambahan'],
                        'tidak_terjangkau'                                           => $datasiswa_uploads['tidak_terjangkau_uang_sekolah'],
                        'sederhana_dan_mudah'                                        => $datasiswa_uploads['sederhana_dan_mudah'],
                        'standar_sama'                                               => $datasiswa_uploads['standar_sama_sekolah_lain'],
                        'berbelit_belit'                                             => $datasiswa_uploads['berbelit_belit'],
                        'tidak_murah'                                                => $datasiswa_uploads['uang_sekolah_tidak_murah'],
                        'merepotkan'                                                 => $datasiswa_uploads['merepotkan'],
                        'pendapat_saya'                                              => $datasiswa_uploads['pendapat_saya'],
                        'program_7_habits'                                           => $datasiswa_uploads['program_7_habits'],
                        'prestasi_sekolah'                                           => $datasiswa_uploads['prestasi_sekolah'],
                        'ekstrakulikuler'                                            => $datasiswa_uploads['ekstrakulikuler'],
                        'booster_1'                                                  => $datasiswa_uploads['booster_1'],
                        'booster_2'                                                  => $datasiswa_uploads['booster_2'],
                        'booster_3'                                                  => $datasiswa_uploads['booster_3'],
                        'belum_vaksin'                                               => $datasiswa_uploads['belum_vaksin'],
                        'ppdb_id'                                                    => $datasiswa_uploads['ppdb_id']
                    ]);
                }
            }
            register::insert($reregister_insert);
            PPDBInterview::insert($interview_insert);
            Payment::insert($payment_insert);
            PPDB::insert($ppdb_insert);
            Data_siswa::insert($data_siswa_insert);
            Data_siswa1::insert($data_siswa1_insert);
            Data_siswa2::insert($data_siswa2_insert);
            Data_siswa3::insert($data_siswa3_insert);
            Users_system::insert($users_system_insert);
            Data_siswa4::insert($data_siswa4_insert);

            return redirect()->route('admin.import.index')->with(['flash_success' => 'Berhasil di Import Data PPDB']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function uploadDapodik(PricingPermissionRequest $request)
    {
        //PPDB DAFTAR ULANG
        $dapodik_siswa = [];
        date_default_timezone_set('Asia/Jakarta');
        $dapodik_siswa = Excel::toArray(new DapodikImport, $request->file('file_dapodik'));
        if ($dapodik_siswa[0][1][0] != '') {
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
            } else if (str_contains($dapodik_siswa[0][1][0], 'PAUD')) {
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

            foreach (array_slice($dapodik_siswa[0], 6, null, true) as $dapodik_siswas) {
                $users_system_check = Users_system::where([['first_name', '=', ($dapodik_siswas[24]) ? $dapodik_siswas[24] : $dapodik_siswas[30]], ['phone', '=', $dapodik_siswas[19]], ['status_data', '=', $dapodik_siswas[2] . '-' . $dapodik_siswas[4]], ['email', '=', $dapodik_siswas[20]]])->first();
                $users_system = new Users_system();
                if (!$users_system_check) {
                    $users_system->first_name   = ($dapodik_siswas[24]) ? $dapodik_siswas[24] : $dapodik_siswas[30];
                    $users_system->phone        = $dapodik_siswas[19];
                    $users_system->email        = $dapodik_siswas[20];
                    $users_system->password     = '$2a$12$12ZRIH0QqGq.BERNvCn79uRiBNtBt/u6TZkV16bSpc6X/LX/ARS4a';
                    $users_system->confirmed    = '1';
                    $users_system->status_data  = $dapodik_siswas[2] . '-' . $dapodik_siswas[4];
                    $users_system->save();
                }
                $data_parent = [];
                array_push($data_parent, ['name_father' => $dapodik_siswas[24], 'name_mother' => $dapodik_siswas[30], 'wali' => $dapodik_siswas[36]]);
                $class = "";
                if (str_contains(strtolower($dapodik_siswa[0][2][0]), 'pamulang') && str_contains($dapodik_siswa[0][1][0], 'TK')) {
                    $class = $dapodik_siswas[42];
                } else if (str_contains(strtolower($dapodik_siswa[0][2][0]), 'pamulang') && str_contains($dapodik_siswa[0][1][0], 'SD')) {
                    $class = $dapodik_siswas[42];
                } else if ($dapodik_siswas[42] == null || str_contains(strtolower($dapodik_siswa[0][2][0]), 'pamulang') || !$dapodik_siswas[42]) {
                    $class = 'KB';
                } else if (str_contains($dapodik_siswas[42], 'A') && strlen($dapodik_siswas[42]) <= 2 && str_contains(strtolower($dapodik_siswa[0][2][0]), 'jagakarsa') && str_contains($dapodik_siswa[0][1][0], 'TK')) {
                    $class = "TK - A";
                } else if (str_contains($dapodik_siswas[42], 'B') && strlen($dapodik_siswas[42]) == 2 && str_contains(strtolower($dapodik_siswa[0][2][0]), 'jagakarsa') && str_contains($dapodik_siswa[0][1][0], 'TK')) {
                    $class = "TK - B";
                } else if (str_contains($dapodik_siswas[42], '1') && strlen($dapodik_siswas[42]) == 2) {
                    $class = '1';
                } else if (str_contains($dapodik_siswas[42], '2') && strlen($dapodik_siswas[42]) == 2) {
                    $class = '2';
                } else if (str_contains($dapodik_siswas[42], '3') && strlen($dapodik_siswas[42]) == 2) {
                    $class = '3';
                } else if (str_contains($dapodik_siswas[42], '4')) {
                    $class = '4';
                } else if (str_contains($dapodik_siswas[42], '5')) {
                    $class = '5';
                } else if (str_contains($dapodik_siswas[42], '6')) {
                    $class = '6';
                } else if (str_contains($dapodik_siswas[42], '7')) {
                    $class = '7';
                } else if (str_contains($dapodik_siswas[42], '8')) {
                    $class = '8';
                } else if (str_contains($dapodik_siswas[42], '9')) {
                    $class = '9';
                } else if (str_contains($dapodik_siswas[42], '10')) {
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
                $ppdb = new Dapodik();
                if ($users_system->id) {
                    $ppdb->id_user        = $users_system->id;
                    $ppdb->dapodik_id     = $dapodik_siswas[2] . '-' . $dapodik_siswas[4];
                    $ppdb->fullname       = $dapodik_siswas[1];
                    $ppdb->school_site    = $unit;
                    $ppdb->nis            = $dapodik_siswas[2];
                    $ppdb->gender         = $gender_check;
                    $ppdb->place_of_birth = $dapodik_siswas[5];
                    $ppdb->date_of_birth  = $dapodik_siswas[6];
                    $ppdb->religion       = $dapodik_siswas[8];
                    $ppdb->address        = $dapodik_siswas[9];
                    $ppdb->home_phone     = $dapodik_siswas[18];
                    $ppdb->hand_phone     = $dapodik_siswas[19];
                    $ppdb->stage          = $stag;
                    $ppdb->classes        = $class;
                    $ppdb->school_origin  = $dapodik_siswas[56];
                    $ppdb->file_additional_satu     = json_encode($data_parent);
                    $ppdb->created_at     = date("Y-m-d H:i:s");
                    $ppdb->save();
                }

                $ppdb_interviews = new PPDBInterview();
                if ($ppdb->id) {
                    $ppdb_interviews->dapodik_id = $ppdb->id;
                    $ppdb_interviews->save();
                }

                $data_siswa = new Data_siswa();
                if ($ppdb->id) {
                    $data_siswa->dapodik_id                 = $ppdb->id;
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
                    $data_siswa->nik_siswa                  = $dapodik_siswas[7];
                    $data_siswa->nomor_kps                  = $dapodik_siswas[23];
                    $data_siswa->save();
                }
                $data_siswa_1 =  new Data_siswa1();
                if ($ppdb->id) {
                    $data_siswa_1->dapodik_id                 = $ppdb->id;
                    $data_siswa_1->berat_badan                = $dapodik_siswas[61];
                    $data_siswa_1->tinggi_badan               = $dapodik_siswas[62];
                    $data_siswa_1->saudara_kandung            = $dapodik_siswas[64];
                    $data_siswa_1->jarak_tempat               = $dapodik_siswas[65];
                    $data_siswa_1->nis                        = $dapodik_siswas[2];
                    $data_siswa_1->penerima_kps_pkh           = $dapodik_siswas[22];
                    $data_siswa_1->save();
                }
                $data_siswa_2 =  new Data_siswa2();
                if ($ppdb->id) {
                    $data_siswa_2->dapodik_id               = $ppdb->id;
                    $data_siswa_2->rombel_saat_ini          = $dapodik_siswas[42];
                    $data_siswa_2->no_peserta_un            = $dapodik_siswas[43];
                    $data_siswa_2->lintang                  = $dapodik_siswas[58];
                    $data_siswa_2->bujur                    = $dapodik_siswas[59];
                    $data_siswa_2->no_kk                    = $dapodik_siswas[60];
                    $data_siswa_2->layak_pip_usulan_sekolah = $dapodik_siswas[53];
                    $data_siswa_2->save();
                }
                $data_siswa_3 = new Data_siswa3();
                if ($ppdb->id) {
                    $data_siswa_3->dapodik_id = $ppdb->id;
                    $data_siswa_3->save();
                }
                $data_siswa_4 = new Data_siswa4();
                if ($ppdb->id) {
                    $data_siswa_4->dapodik_id = $ppdb->id;
                    $data_siswa_4->save();
                }
                $payment = new Payment();
                if ($ppdb->id) {
                    $payment->dapodik_id = $ppdb->id;
                    $payment->save();
                }
                $reregister = new ReRegistration();
                if ($ppdb->id) {
                    $reregister->dapodik_id = $ppdb->id;
                    $reregister->save();
                }
            }
            return redirect()->route('admin.import.index')->with(['flash_success' => 'Berhasil di Import Data Dapodik']);
        } else {
            return redirect()->route('admin.import.index')->with(['flash_info' => 'Data di Import Tidak Sesuai']);
        }
    }


    public function export_excel()
    {
        return Excel::download(new SiswaExport, 'data_siswa.xlsx');
    }

    public function check_excel()
    {

        $pricings = 'ada';

        $pricings_wave2 = 12;

        $reregistration = Register::where('ppdb.document_status', 7)
            ->join('ppdb', 'ppdb.id', '=', 'reregister.ppdb_id')
            ->select('reregister.*')
            ->get();

        foreach ($reregistration as $reregistrations) {
            $something = $reregistrations;
        }

        $data = [
            'pricings' => $pricings,
            'pricings_wave2' => $pricings_wave2,
            'reregistration' => $reregistration
        ];

        return new ViewResponse('backend.pricing.check_excel', $data);
    }


    public function check_excel2()
    {

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

    public function check_payment()
    {
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

    public function deleteDapodik()
    {
        Users_system::where('id', '!=', '')->delete();
        PPDB::where('id', '!=', '')->delete();
        PPDBInterview::where('id', '!=', '')->delete();
        Payment::where('id', '!=', '')->delete();
        Register::where('id', '!=', '')->delete();
        Data_siswa::where('id', '!=', '')->delete();
        Data_siswa1::where('id', '!=', '')->delete();
        Data_siswa2::where('id', '!=', '')->delete();
        Data_siswa3::where('id', '!=', '')->delete();
        Data_siswa4::where('id', '!=', '')->delete();
        Dapodik::where('id', '!=', '')->delete();
        return redirect()->route('admin.import.index')->with(['flash_success' => 'Berhasil Menghapus semua data']);
    }

    public function deleteSystem()
    {
        Users::where('id', '!=', '')->delete();
        PPDB_system::where('id', '!=', '')->delete();
        Ppdb_interviews_system::where('id', '!=', '')->delete();
        Payment_system::where('id', '!=', '')->delete();
        Reregistrasi_system::where('id', '!=', '')->delete();
        Data_siswa_system::where('id', '!=', '')->delete();
        Data_siswa_system_1::where('id', '!=', '')->delete();
        Data_siswa_system_2::where('id', '!=', '')->delete();
        Data_siswa_system_3::where('id', '!=', '')->delete();
        Data_siswa_system_4::where('id', '!=', '')->delete();
        return redirect()->route('admin.import.index')->with(['flash_success' => 'Berhasil Menghapus semua data Aktif']);
    }
}
