<?php

namespace App\Http\Controllers\Backend\ppdb;

use App\Models\PPDB;
use App\Models\Users;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\PPDB\PPDBPermissionRequest;
use App\Http\Responses\RedirectResponse;
use App\Models\Dapodik;
use App\Models\Data_kelas;
use App\Models\Data_siswa;
use App\Models\Data_siswa1;
use App\Models\Data_siswa2;
use App\Models\Data_siswa3;
use App\Models\Data_siswa4;
use App\Models\Data_siswa_system;
use App\Models\Data_siswa_system_1;
use App\Models\Data_siswa_system_2;
use App\Models\Data_siswa_system_3;
use App\Models\Data_siswa_system_4;
use App\Models\Payment;
use App\Models\Payment_system;
use App\Models\Ppdb_interviews_system;
use App\Models\PPDB_system;
use App\Models\PPDBInterview;
use App\Models\Register;
use App\Models\Reregistrasi_system;
use App\Models\ReRegistration;
use App\Models\Users_system;

class addClass extends Controller
{
    public function addingClassPPDB(PPDBPermissionRequest $request)
    {
        $users_check = PPDB::where('ppdb_id', $request->ppdb_id)->first();
        $users = Users::where('user_id', $users_check->id_user)->first();
        if ($users == null && $users == "" && empty($users)) {
            $ppdb_system = PPDB_system::where('ppdb_id', $request->ppdb_id)->first();
            $ppdb = PPDB::where('ppdb_id', $request->ppdb_id)->first();
            if ($ppdb_system == null && $ppdb_system == "" && empty($ppdb_system)) {
                //ppdb system
                $ppdb_system = new PPDB_system;
                $ppdb_system->ppdb_id = $ppdb->ppdb_id;
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
                $ppdb_system->nis = $request->nis;
                $ppdb_system->save();
            } else {
                $ppdb_system = new  PPDB_system;
                $ppdb_system->nis = $request->nis;
                $ppdb_system->ppdb_id = $ppdb->ppdb_id;
                $ppdb_system->save();
            }

            $data_siswa = Data_siswa::where('ppdb_id', $ppdb->ppdb_id)->first();
            //data siswa
            $data_siswa->nisn                           = $request->nisn;
            $data_siswa->save();

            $data_siswa_system = Data_siswa_system::where('ppdb_id', $request->ppdb_id)->first();
            if ($data_siswa_system == null && $data_siswa_system == "" && empty($data_siswa_system)) {
                $no_seri_ijazah = '';
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
                if ($data_siswa->no_seri_ijazah == "" && $data_siswa->no_seri_ijazah == null && empty($data_siswa->no_seri_ijazah)) {
                    $no_seri_ijazah = $request->no_seri_ijazah;
                }
                $datasiswa_system->no_seri_ijazah            = $no_seri_ijazah;
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
                $datasiswa_system->save();
            }

            $data_siswa1 = Data_siswa1::where('ppdb_id', $ppdb->ppdb_id)->first();

            $data_siswa1_check = Data_siswa_system_1::where('ppdb_id', $ppdb->ppdb_id)->first();
            if ($data_siswa1_check == null && $data_siswa1_check == "" && empty($data_siswa1_check)) {
                $datasiswa_system_1 = new Data_siswa_system_1;
                $datasiswa_system_1->dapodik_id                = $data_siswa1->dapodik_id;
                $datasiswa_system_1->berat_badan               = $data_siswa1->berat_badan;
                $datasiswa_system_1->tinggi_badan              = $data_siswa1->tinggi_badan;
                $datasiswa_system_1->saudara_kandung           = $data_siswa1->saudara_kandung;
                $datasiswa_system_1->jarak_tempat              = $data_siswa1->jarak_tempat;
                $datasiswa_system_1->penerima_kps_pkh          = $data_siswa1->penerima_kps_pkh;
                $datasiswa_system_1->tahun_ajaran              = $data_siswa1->tahun_ajaran;
                $datasiswa_system_1->tanggal_pendaftaran       = $data_siswa1->tanggal_pendaftaran;
                $datasiswa_system_1->status_siswa              = $data_siswa1->status_siswa;
                $datasiswa_system_1->no_formulir               = $data_siswa1->no_formulir;
                $datasiswa_system_1->kitas                     = $data_siswa1->kitas;
                $datasiswa_system_1->kewarganegaraan           = $data_siswa1->kewarganegaraan;
                $datasiswa_system_1->nama_negara               = $data_siswa1->nama_negara;
                $datasiswa_system_1->no_kph_pkh                = $data_siswa1->no_kph_pkh;
                $datasiswa_system_1->usulan_dari_sekolah       = $data_siswa1->usulan_dari_sekolah;
                $datasiswa_system_1->kartu_KIP                 = $data_siswa1->kartu_KIP;
                $datasiswa_system_1->berkebutuhan_khusus_ayah  = $data_siswa1->berkebutuhan_khusus_ayah;
                $datasiswa_system_1->berkebutuhan_khusus_ibu   = $data_siswa1->berkebutuhan_khusus_ibu;
                $datasiswa_system_1->jenis_ekstrakulikuler     = $data_siswa1->jenis_ekstrakulikuler;
                $datasiswa_system_1->waktu_tempuh              = $data_siswa1->waktu_tempuh;
                $datasiswa_system_1->berkebutuhan_khusus_2     = $data_siswa1->berkebutuhan_khusus_2;
                $datasiswa_system_1->nama_kelurahan_2          = $data_siswa1->nama_kelurahan_2;
                $datasiswa_system_1->jurusan                   = $data_siswa1->jurusan;
                $datasiswa_system_1->jenis_pendaftaran         = $data_siswa1->jenis_pendaftaran;
                $datasiswa_system_1->nis                       = $data_siswa1->nis;
                $datasiswa_system_1->tanggal_masuk_sekolah     = $data_siswa1->tanggal_masuk_sekolah;
                $datasiswa_system_1->nomor_peserta_ujian       = $data_siswa1->nomor_peserta_ujian;
                $datasiswa_system_1->keluar_karena             = $data_siswa1->keluar_karena;
                $datasiswa_system_1->tanggal_keluar            = $data_siswa1->tanggal_keluar;
                $datasiswa_system_1->alasan                    = $data_siswa1->alasan;
                $datasiswa_system_1->persetujuan               = $data_siswa1->persetujuan;
                $datasiswa_system_1->jenis_1                   = $data_siswa1->jenis_1;
                $datasiswa_system_1->tingkat_1                 = $data_siswa1->tingkat_1;
                $datasiswa_system_1->nama_prestasi_1           = $data_siswa1->nama_prestasi_1;
                $datasiswa_system_1->tahun_1                   = $data_siswa1->tahun_1;
                $datasiswa_system_1->penyelenggara_1           = $data_siswa1->penyelenggara_1;
                $datasiswa_system_1->jenis_2                   = $data_siswa1->jenis_2;
                $datasiswa_system_1->tingkat_2                 = $data_siswa1->tingkat_2;
                $datasiswa_system_1->nama_prestasi_2           = $data_siswa1->nama_prestasi_2;
                $datasiswa_system_1->tahun_2                   = $data_siswa1->tahun_2;
                $datasiswa_system_1->penyelenggara_2           = $data_siswa1->penyelenggara_2;
                $datasiswa_system_1->jenis_3                   = $data_siswa1->jenis_3;
                $datasiswa_system_1->tingkat_3                = $data_siswa1->tingkat_3;
                $datasiswa_system_1->nama_prestasi_3           = $data_siswa1->nama_prestasi_3;
                $datasiswa_system_1->tahun_3                   = $data_siswa1->tahun_3;
                $datasiswa_system_1->penyelenggara_3           = $data_siswa1->penyelenggara_3;
                $datasiswa_system_1->jenis_1_0                 = $data_siswa1->jenis_1_0;
                $datasiswa_system_1->keterangan_1              = $data_siswa1->keterangan_1;
                $datasiswa_system_1->tahun_mulai_1             = $data_siswa1->tahun_mulai_1;
                $datasiswa_system_1->tahun_selesai_1           = $data_siswa1->tahun_selesai_1;
                $datasiswa_system_1->jenis_2_0                 = $data_siswa1->jenis_2_0;
                $datasiswa_system_1->keterangan_2              = $data_siswa1->keterangan_2;
                $datasiswa_system_1->tahun_mulai_2             = $data_siswa1->tahun_mulai_2;
                $datasiswa_system_1->tahun_selesai_2           = $data_siswa1->tahun_selesai_2;
                $datasiswa_system_1->jenis_3_0                 = $data_siswa1->jenis_3_0;
                $datasiswa_system_1->keterangan_3              = $data_siswa1->keterangan_3;
                $datasiswa_system_1->tahun_mulai_3             = $data_siswa1->tahun_mulai_3;
                $datasiswa_system_1->tahun_selesai_3           = $data_siswa1->tahun_selesai_3;
                $datasiswa_system_1->sekolah                   = $data_siswa1->sekolah;
                $datasiswa_system_1->unit                      = $data_siswa1->unit;
                $datasiswa_system_1->input_by                  = $data_siswa1->input_by;
                $datasiswa_system_1->created_at                = $data_siswa1->created_at;
                $datasiswa_system_1->updated_at                = $data_siswa1->updated_at;
                $datasiswa_system_1->save();
                $data_siswa->save();
            } else {
                $data_siswa_1 =  new Data_siswa1();
                $data_siswa_1->dapodik_id                 = $data_siswa1_check->dapodik_id;
                $data_siswa->save();
            }

            $data_siswa2 = Data_siswa2::where('ppdb_id', $ppdb->ppdb_id)->first();
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
            $data_kelas = new Data_kelas(); //DATA KELAS DOING START
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
            $data_kelas->nik_siswa            = $request->nik_siswa;
            $data_kelas->status_siswa         = $request->status_siswa;
            $data_kelas->keterangan           = $request->keterangan;
            $data_kelas->save(); //DATA KELAS DOING END

            $data_siswa_system_2 = Data_siswa_system_2::where('ppdb_id', $request->ppdb_id)->first();
            if ($data_siswa_system_2 == '' && $data_siswa_system_2 == null && empty($data_siswa_system_2)) {
                $data_siswa_system_2 = new Data_siswa_system_2();
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
            }

            $data_siswa_system_3 = Data_siswa_system_3::where('ppdb_id', $request->ppdb_id)->first();
            $data_siswa3 = Data_siswa3::where('ppdb_id', $ppdb->ppdb_id)->first();
            if ($data_siswa_system_3 == '' && $data_siswa_system_3 == null && empty($data_siswa_system_3)) {
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
            }

            $data_siswa4 = Data_siswa4::where('ppdb_id', $ppdb->ppdb_id)->first();
            $jarak_satu                     = Data_siswa4::select(['1km_jarak as jarak_satu'])->where('ppdb_id', $ppdb->ppdb_id)->first();
            $jarak_dua                      = Data_siswa4::select(['1_sampai_5km as jarak_dua'])->where('ppdb_id', $ppdb->ppdb_id)->first();
            $jarak_tiga                     = Data_siswa4::select(['6_sampai_10km as jarak_tiga'])->where('ppdb_id', $ppdb->ppdb_id)->first();
            $jarak_empat                    = Data_siswa4::select(['11_sampai_20km as jarak_empat'])->where('ppdb_id', $ppdb->ppdb_id)->first();
            $jarak_lima                     = Data_siswa4::select(['21_sampai_30km as jarak_lima'])->where('ppdb_id', $ppdb->ppdb_id)->first();
            $jarak1 = ($jarak_satu->jarak_satu   == null ? 'kosong' : $jarak_satu->jarak_satu);
            $jarak2 = ($jarak_dua->jarak_dua     == null ? 'kosong' : $jarak_dua->jarak_dua);
            $jarak3 = ($jarak_tiga->jarak_tiga   == null ? 'kosong' : $jarak_tiga->jarak_tiga);
            $jarak4 = ($jarak_empat->jarak_empat == null ? 'kosong' : $jarak_empat->jarak_empat);
            $jarak5 = ($jarak_lima->jarak_lima   == null ? 'kosong' : $jarak_lima->jarak_lima);
            $values = array(
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
                '1km_jarak'                         =>  $jarak1,
                '1_sampai_5km'                      =>  $jarak2,
                '6_sampai_10km'                     =>  $jarak3,
                '11_sampai_20km'                    =>  $jarak4,
                '21_sampai_30km'                    =>  $jarak5,
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

            $data_siswa_system_4 = Data_siswa_system_4::where('ppdb_id', $request->ppdb_id)->first();
            if ($data_siswa_system_4 == '' && $data_siswa_system_4 == null && empty($data_siswa_system_4)) {
                $data_siswa_system_4  = new Data_siswa_system_4();
                $data_siswa_system_4->insert($values);
            }

            $ppdb_interviews_system = Ppdb_interviews_system::where('ppdb_id', $request->ppdb_id)->first();
            $ppdb_interviews_check                      =  PPDBInterview::where('ppdb_id', $ppdb->ppdb_id)->first();
            if ($ppdb_interviews_system == '' && $ppdb_interviews_system == null && empty($ppdb_interviews_system)) {
                $ppdb_interviews_system                                 = new Ppdb_interviews_system();
                $ppdb_interviews_system->ppdb_id                        = $ppdb_interviews_check->ppdb_id;
                $ppdb_interviews_system->school_recomendation_result    = $ppdb_interviews_check->school_recomendation_result;
                $ppdb_interviews_system->school_recomendation_file      = $ppdb_interviews_check->school_recomendation_file;
                $ppdb_interviews_system->school_recomendation_note      = $ppdb_interviews_check->school_recomendation_note;
                $ppdb_interviews_system->is_submited                    = $ppdb_interviews_check->is_submited;
                $ppdb_interviews_system->interview_result               = $ppdb_interviews_check->interview_result;
                $ppdb_interviews_system->interview_result_note          = $ppdb_interviews_check->interview_result_note;
                $ppdb_interviews_system->interview_result_file          = $ppdb_interviews_check->interview_result_file;
                $ppdb_interviews_system->kesiapan_value                 = $ppdb_interviews_check->kesiapan_value;
                $ppdb_interviews_system->kesiapan_file                  = $ppdb_interviews_check->kesiapan_file;
                $ppdb_interviews_system->kesiapan_result                = $ppdb_interviews_check->kesiapan_result;
                $ppdb_interviews_system->kesiapan_result_note           = $ppdb_interviews_check->kesiapan_result_note;
                $ppdb_interviews_system->psikotest_value                = $ppdb_interviews_check->psikotest_value;
                $ppdb_interviews_system->psikotest_file                 = $ppdb_interviews_check->psikotest_file;
                $ppdb_interviews_system->psikotest_result               = $ppdb_interviews_check->psikotest_result;
                $ppdb_interviews_system->psikotest_result_note          = $ppdb_interviews_check->psikotest_result_note;
                $ppdb_interviews_system->academic_value                 = $ppdb_interviews_check->academic_value;
                $ppdb_interviews_system->academic_file                  = $ppdb_interviews_check->academic_file;
                $ppdb_interviews_system->academic_result                = $ppdb_interviews_check->academic_result;
                $ppdb_interviews_system->academic_result_note           = $ppdb_interviews_check->academic_result_note;
                $ppdb_interviews_system->interview_parent_summary       = $ppdb_interviews_check->interview_parent_summary;
                $ppdb_interviews_system->interview_parent_file          = $ppdb_interviews_check->interview_parent_file;
                $ppdb_interviews_system->interview_parent_result        = $ppdb_interviews_check->interview_parent_result;
                $ppdb_interviews_system->interview_parent_result_note   = $ppdb_interviews_check->interview_parent_result_note;
                $ppdb_interviews_system->interview_student_summary      = $ppdb_interviews_check->interview_student_summary;
                $ppdb_interviews_system->interview_student_file         = $ppdb_interviews_check->interview_student_file;
                $ppdb_interviews_system->interview_student_result       = $ppdb_interviews_check->interview_student_result;
                $ppdb_interviews_system->interview_student_result_note  = $ppdb_interviews_check->interview_student_result_note;
                $ppdb_interviews_system->observasi_value                = $ppdb_interviews_check->observasi_value;
                $ppdb_interviews_system->observasi_summary              = $ppdb_interviews_check->observasi_summary;
                $ppdb_interviews_system->observasi_file                 = $ppdb_interviews_check->observasi_file;
                $ppdb_interviews_system->observasi_result               = $ppdb_interviews_check->observasi_result;
                $ppdb_interviews_system->observasi_result_note          = $ppdb_interviews_check->observasi_result_note;
                $ppdb_interviews_system->save();
            }

            $payment_system = Payment_system::where('ppdb_id', $request->ppdb_id)->first();
            $payment = Payment::where('ppdb_id', $ppdb->ppdb_id)->get();
            if ($payment_system == '' && $payment_system == null && empty($payment_system)) {
                foreach ($payment as $object) {
                    $payment_system                         = new Payment_system();
                    $payment_system->ppdb_id                = $object->ppdb_id;
                    $payment_system->payment_type           = $object->payment_type;
                    $payment_system->payment_code           = $object->payment_code;
                    $payment_system->confirmation_status    = $object->confirmation_status;
                    $payment_system->date_send              = $object->date_send;
                    $payment_system->bank_owner_name        = $object->bank_owner_name;
                    $payment_system->bank_code              = $object->bank_code;
                    $payment_system->account_number         = $object->account_number;
                    $payment_system->cost                   = $object->cost;
                    $payment_system->image_confirmation     = $object->image_confirmation;
                    $payment_system->created_at             = $object->created_at;
                    $payment_system->updated_at             = $object->updated_at;
                    $payment_system->updated_by             = $object->updated_by;
                    $payment_system->save();
                }
            }
            if ($users == null && $users == "" && empty($users)) {
                $users = Users_system::where('user_id', $ppdb->id_user)->first();
                $user                               = new Users();
                $user->user_id                      = $users->user_id;
                $user->uuid                         = $users->uuid;
                $user->first_name                   = $users->first_name;
                $user->last_name                    = $users->last_name;
                $user->email                        = $users->email;
                $user->phone                        = $users->phone;
                $user->avatar_type                  = $users->avatar_type;
                $user->avatar_location              = $users->avatar_location;
                $user->password                     = $users->password;
                $user->password_changed_at          = $users->password_changed_at;
                $user->active                       = $users->active;
                $user->confirmation_code            = $users->confirmation_code;
                $user->confirmed                    = $users->confirmed;
                $user->timezone                     = $users->timezone;
                $user->last_login_at                = $users->last_login_at;
                $user->last_login_ip                = $users->last_login_ip;
                $user->to_be_logged_out             = $users->to_be_logged_out;
                $user->status                       = $users->status;
                $user->created_by                   = $users->created_by;
                $user->updated_by                   = $users->updated_by;
                $user->is_term_accept               = $users->is_term_accept;
                $user->remember_token               = $users->remember_token;
                $user->created_at                   = $users->created_at;
                $user->updated_at                   = $users->updated_at;
                $user->deleted_at                   = $users->deleted_at;
                $user->save();
            }

            $reregistrasi_system = Reregistrasi_system::where('ppdb_id', $request->id)->first();
            if ($reregistrasi_system == null && $reregistrasi_system == "" && empty($reregistrasi_system)) {
                $reregister = ReRegistration::where('ppdb_id', $ppdb->ppdb_id)->first();
                $reregister_system = new Reregistrasi_system();
                $reregister_system->file_additionalsatu     = $reregister->file_additionalsatu;
                $reregister_system->file_additionaldua      = $reregister->file_additionaldua;
                $reregister_system->ppdb_id                 = $reregister->ppdb_id;
                $reregister_system->medco_employee_file     = $reregister->medco_employee_file;
                $reregister_system->created_at              = $reregister->created_at;
                $reregister_system->updated_at              = $reregister->updated_at;
                $reregister_system->save();
            }
            debug($ppdb_interviews_system);
            debug($ppdb_interviews_system);
            debug($payment_system);
            debug($data_siswa_system_4);
            debug($ppdb);
            debug($data_siswa);
            return redirect()->back()->with(['flash_success' => 'Sudah Berhasil di Edit di Master']);
        } else {
            Users_system::where('user_id', $users_check->id_user)->delete();
            PPDB::where('ppdb_id', $users_check->ppdb_id)->delete();
            PPDBInterview::where('ppdb_id', $users_check->ppdb_id)->delete();
            Payment::where('ppdb_id', $users_check->ppdb_id)->delete();
            Register::where('ppdb_id', $users_check->ppdb_id)->delete();
            Data_siswa::where('ppdb_id', $users_check->ppdb_id)->delete();
            Data_siswa2::where('ppdb_id', $users_check->ppdb_id)->delete();
            Data_siswa3::where('ppdb_id', $users_check->ppdb_id)->delete();
            Data_siswa4::where('ppdb_id', $users_check->ppdb_id)->delete();
            return new RedirectResponse(route('admin.ppdb.index'), ['flash_warning' => 'Data Sudah Pernah di Input']);
        }
    }

    public function addingClassDAPODIK(PPDBPermissionRequest $request)
    {
        $users_check = Dapodik::where('id', $request->id)->first();

        $users = Users::where('id', $users_check->id_user)->first();
        if ($users == null && $users == "" && empty($users)) {
            $ppdb_system = PPDB_system::where('dapodik_id', $request->id)->first(); // check
            $dapodik = Dapodik::where('id', $request->id)->first(); // take value

            if ($ppdb_system == null && $ppdb_system == "" && empty($ppdb_system)) {
                $ppdb_system = new  PPDB_system;
                $ppdb_system->dapodik_id = $dapodik->id;
                $ppdb_system->registration_schedule_id = $dapodik->registration_schedule_id;
                $ppdb_system->document_no = $dapodik->document_no;
                $ppdb_system->document_status =  $dapodik->document_status;
                $ppdb_system->id_user = $dapodik->id_user;
                $ppdb_system->school_site = $dapodik->school_site;
                $ppdb_system->stage = $dapodik->stage;
                $ppdb_system->classes = $dapodik->classes;
                $ppdb_system->student_status = $dapodik->student_status;
                $ppdb_system->fullname = $dapodik->fullname;
                $ppdb_system->gender = $dapodik->gender;
                $ppdb_system->place_of_birth = $dapodik->place_of_birth;
                $ppdb_system->date_of_birth = $dapodik->date_of_birth;
                $ppdb_system->religion = $dapodik->religion;
                $ppdb_system->nationality = $dapodik->nationality;
                $ppdb_system->address = $dapodik->address;
                $ppdb_system->home_phone = $dapodik->home_phone;
                $ppdb_system->hand_phone = $dapodik->hand_phone;
                $ppdb_system->school_origin = $dapodik->school_origin;
                $ppdb_system->family_card = $dapodik->family_card;
                $ppdb_system->birth_certificate = $dapodik->birth_certificate;
                $ppdb_system->last_report = $dapodik->last_report;
                $ppdb_system->academic_certificate = $dapodik->academic_certificate;
                $ppdb_system->kia_book = $dapodik->kia_book;
                $ppdb_system->file_additional = $dapodik->file_additional;
                $ppdb_system->medco_employee = $dapodik->medco_employee;
                $ppdb_system->medco_employee_file = $dapodik->medco_employee_file;
                $ppdb_system->ppdb_discount = $dapodik->ppdb_discount;
                $ppdb_system->studied_before = $dapodik->studied_before;
                $ppdb_system->rejected_at = $dapodik->rejected_at;
                $ppdb_system->rejected_by = $dapodik->rejected_by;
                $ppdb_system->gaji = $dapodik->gaji;
                $ppdb_system->status_siswa = $dapodik->status_siswa;
                $ppdb_system->slip_gaji_parent = $dapodik->slip_gaji_parent;
                $ppdb_system->file_additional_satu = $dapodik->file_additional_satu;
                $ppdb_system->file_additional_dua = $dapodik->file_additional_dua;
                $ppdb_system->file_additional_tiga = $dapodik->file_additional_tiga;
                $ppdb_system->file_additional_empat = $dapodik->file_additional_empat;
                $ppdb_system->file_additional_lima = $dapodik->file_additional_lima;
                $ppdb_system->nis = $request->nis;
                $ppdb_system->save();
            } else {
                $ppdb_system = new  PPDB_system;
                $ppdb_system->nis = $request->nis;
                $ppdb_system->dapodik_id = $dapodik->id;
                $ppdb_system->save();
            }

            $data_kelas = new Data_kelas(); //DATA KELAS DOING START
            $data_kelas->dapodik_id           = $dapodik->id;
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
            $data_kelas->nik_siswa            = $request->nik_siswa;
            $data_kelas->status_siswa         = $request->status_siswa;
            $data_kelas->keterangan           = $request->keterangan;
            $data_kelas->save(); //DATA KELAS DOING END

            $data_siswa = Data_siswa::where('dapodik_id', $dapodik->id)->first();
            $data_siswa->nisn                           = $request->nisn;
            $data_siswa->save();

            $data_siswa_system = Data_siswa_system::where('dapodik_id', $request->id)->first(); //check
            if ($data_siswa_system == null && $data_siswa_system == "" && empty($data_siswa_system)) {
                $no_seri_ijazah = '';
                $datasiswa_system = new Data_siswa_system;
                $datasiswa_system->nama_lengkap              = $data_siswa->nama_lengkap;
                $datasiswa_system->jenis_kelamin             = $data_siswa->jenis_kelamin;
                $datasiswa_system->nisn                      = $data_siswa->nisn;
                $datasiswa_system->tempat_lahir              = $data_siswa->tempat_lahir;
                $datasiswa_system->tanggal_lahir             = $data_siswa->tanggal_lahir;
                $datasiswa_system->dapodik_id                = $users_check->id;
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

                if ($data_siswa->no_seri_ijazah == "" && $data_siswa->no_seri_ijazah == null && empty($data_siswa->no_seri_ijazah)) {
                    $no_seri_ijazah = $request->no_seri_ijazah;
                }
                $datasiswa_system->no_seri_ijazah            = $no_seri_ijazah;
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
                $datasiswa_system->save();
            }

            $data_siswa_1 = Data_siswa1::where('dapodik_id', $request->id)->first(); //take value

            $data_siswa_system_1 = Data_siswa_system_1::where('dapodik_id', $request->id)->first(); //check
            if ($data_siswa_system_1 == null && $data_siswa_system_1 == "" && empty($data_siswa_system_1)) {
                $data_siswa_system_1 = new Data_siswa_system_1;
                $data_siswa_system_1->dapodik_id                = $users_check->id;
                $data_siswa_system_1->tahun_ajaran              = $data_siswa_1->tahun_ajaran;
                $data_siswa_system_1->tanggal_pendaftaran       = $data_siswa_1->tanggal_pendaftaran;
                $data_siswa_system_1->status_siswa              = $data_siswa_1->status_siswa;
                $data_siswa_system_1->no_formulir               = $data_siswa_1->no_formulir;
                $data_siswa_system_1->kitas                     = $data_siswa_1->kitas;
                $data_siswa_system_1->kewarganegaraan           = $data_siswa_1->kewarganegaraan;
                $data_siswa_system_1->nama_negara               = $data_siswa_1->nama_negara;
                $data_siswa_system_1->no_kph_pkh                = $data_siswa_1->no_kph_pkh;
                $data_siswa_system_1->usulan_dari_sekolah       = $data_siswa_1->usulan_dari_sekolah;
                $data_siswa_system_1->kartu_KIP                 = $data_siswa_1->kartu_KIP;
                $data_siswa_system_1->berkebutuhan_khusus_ayah  = $data_siswa_1->berkebutuhan_khusus_ayah;
                $data_siswa_system_1->berkebutuhan_khusus_ibu   = $data_siswa_1->berkebutuhan_khusus_ibu;
                $data_siswa_system_1->jenis_ekstrakulikuler     = $data_siswa_1->jenis_ekstrakulikuler;
                $data_siswa_system_1->waktu_tempuh              = $data_siswa_1->waktu_tempuh;
                $data_siswa_system_1->berkebutuhan_khusus_2     = $data_siswa_1->berkebutuhan_khusus_2;
                $data_siswa_system_1->nama_kelurahan_2          = $data_siswa_1->nama_kelurahan_2;
                $data_siswa_system_1->jurusan                   = $data_siswa_1->jurusan;
                $data_siswa_system_1->jenis_pendaftaran         = $data_siswa_1->jenis_pendaftaran;
                $data_siswa_system_1->tanggal_masuk_sekolah     = $data_siswa_1->tanggal_masuk_sekolah;
                $data_siswa_system_1->nomor_peserta_ujian       = $data_siswa_1->nomor_peserta_ujian;
                $data_siswa_system_1->keluar_karena             = $data_siswa_1->keluar_karena;
                $data_siswa_system_1->tanggal_keluar            = $data_siswa_1->tanggal_keluar;
                $data_siswa_system_1->alasan                    = $data_siswa_1->alasan;
                $data_siswa_system_1->persetujuan               = $data_siswa_1->persetujuan;
                $data_siswa_system_1->jenis_1                   = $data_siswa_1->jenis_1;
                $data_siswa_system_1->tingkat_1                 = $data_siswa_1->tingkat_1;
                $data_siswa_system_1->nama_prestasi_1           = $data_siswa_1->nama_prestasi_1;
                $data_siswa_system_1->tahun_1                   = $data_siswa_1->tahun_1;
                $data_siswa_system_1->penyelenggara_1           = $data_siswa_1->penyelenggara_1;
                $data_siswa_system_1->jenis_2                   = $data_siswa_1->jenis_2;
                $data_siswa_system_1->tingkat_2                 = $data_siswa_1->tingkat_2;
                $data_siswa_system_1->nama_prestasi_2           = $data_siswa_1->nama_prestasi_2;
                $data_siswa_system_1->tahun_2                   = $data_siswa_1->tahun_2;
                $data_siswa_system_1->penyelenggara_2           = $data_siswa_1->penyelenggara_2;
                $data_siswa_system_1->jenis_3                   = $data_siswa_1->jenis_3;
                $data_siswa_system_1->tingkat_3                = $data_siswa_1->tingkat_3;
                $data_siswa_system_1->nama_prestasi_3           = $data_siswa_1->nama_prestasi_3;
                $data_siswa_system_1->tahun_3                   = $data_siswa_1->tahun_3;
                $data_siswa_system_1->penyelenggara_3           = $data_siswa_1->penyelenggara_3;
                $data_siswa_system_1->jenis_1_0                 = $data_siswa_1->jenis_1_0;
                $data_siswa_system_1->keterangan_1              = $data_siswa_1->keterangan_1;
                $data_siswa_system_1->tahun_mulai_1             = $data_siswa_1->tahun_mulai_1;
                $data_siswa_system_1->tahun_selesai_1           = $data_siswa_1->tahun_selesai_1;
                $data_siswa_system_1->jenis_2_0                 = $data_siswa_1->jenis_2_0;
                $data_siswa_system_1->keterangan_2              = $data_siswa_1->keterangan_2;
                $data_siswa_system_1->tahun_mulai_2             = $data_siswa_1->tahun_mulai_2;
                $data_siswa_system_1->tahun_selesai_2           = $data_siswa_1->tahun_selesai_2;
                $data_siswa_system_1->jenis_3_0                 = $data_siswa_1->jenis_3_0;
                $data_siswa_system_1->keterangan_3              = $data_siswa_1->keterangan_3;
                $data_siswa_system_1->tahun_mulai_3             = $data_siswa_1->tahun_mulai_3;
                $data_siswa_system_1->tahun_selesai_3           = $data_siswa_1->tahun_selesai_3;
                $data_siswa_system_1->sekolah                   = $data_siswa_1->sekolah;
                $data_siswa_system_1->unit                      = $data_siswa_1->unit;
                $data_siswa_system_1->input_by                  = $data_siswa_1->input_by;
                $data_siswa_system_1->created_at                = $data_siswa_1->created_at;
                $data_siswa_system_1->updated_at                = $data_siswa_1->updated_at;
                $data_siswa_system_1->save();
            }

            $data_siswa2 = Data_siswa2::where('dapodik_id', $dapodik->id)->first(); // take value
            $data_siswa2->kode_registrasi      = $dapodik->document_no;
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

            $data_siswa_system_2 = Data_siswa_system_2::where('dapodik_id', $request->id)->first(); // check

            if ($data_siswa_system_2 == '' && $data_siswa_system_2 == null && empty($data_siswa_system_2)) {
                $data_siswa_system_2 = new Data_siswa_system_2();
                $data_siswa_system_2->dapodik_id                        = $users_check->id;
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
            }

            $data_siswa_system_3 = Data_siswa_system_3::where('dapodik_id', $request->id)->first(); //check
            $data_siswa3 = Data_siswa3::where('dapodik_id', $dapodik->id)->first();  //take value          
            if ($data_siswa_system_3 == '' && $data_siswa_system_3 == null && empty($data_siswa_system_3)) {
                $data_siswa_system_3                                = new Data_siswa_system_3();
                $data_siswa_system_3->dapodik_id                    = $users_check->id;
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
            }

            $data_siswa4 = Data_siswa4::where('dapodik_id', $dapodik->id)->first(); //take value       
            $jarak1 = 'kosong';
            $jarak2 = 'kosong';
            $jarak3 = 'kosong';
            $jarak4 = 'kosong';
            $jarak5 = 'kosong';

            $values = array(
                'dapodik_id'                        =>  $users_check->id,
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
                '1km_jarak'                         =>  $jarak1,
                '1_sampai_5km'                      =>  $jarak2,
                '6_sampai_10km'                     =>  $jarak3,
                '11_sampai_20km'                    =>  $jarak4,
                '21_sampai_30km'                    =>  $jarak5,
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

            $data_siswa_system_4 = Data_siswa_system_4::where('dapodik_id', $request->id)->first(); //check

            if ($data_siswa_system_4 == '' && $data_siswa_system_4 == null && empty($data_siswa_system_4)) {
                $data_siswa_system_4  = new Data_siswa_system_4();
                $data_siswa_system_4->insert($values);
            }

            $ppdb_interviews_system = Ppdb_interviews_system::where('dapodik_id', $request->id)->first(); //check
            $ppdb_interviews_check  =  PPDBInterview::where('dapodik_id', $dapodik->id)->first(); //take value

            if ($ppdb_interviews_system == '' && $ppdb_interviews_system == null && empty($ppdb_interviews_system)) {
                $ppdb_interviews_system                                 = new Ppdb_interviews_system();
                $ppdb_interviews_system->dapodik_id                     = $users_check->dapodik_id;
                $ppdb_interviews_system->school_recomendation_result    = $ppdb_interviews_check->school_recomendation_result;
                $ppdb_interviews_system->school_recomendation_file      = $ppdb_interviews_check->school_recomendation_file;
                $ppdb_interviews_system->school_recomendation_note      = $ppdb_interviews_check->school_recomendation_note;
                $ppdb_interviews_system->is_submited                    = $ppdb_interviews_check->is_submited;
                $ppdb_interviews_system->interview_result               = $ppdb_interviews_check->interview_result;
                $ppdb_interviews_system->interview_result_note          = $ppdb_interviews_check->interview_result_note;
                $ppdb_interviews_system->interview_result_file          = $ppdb_interviews_check->interview_result_file;
                $ppdb_interviews_system->kesiapan_value                 = $ppdb_interviews_check->kesiapan_value;
                $ppdb_interviews_system->kesiapan_file                  = $ppdb_interviews_check->kesiapan_file;
                $ppdb_interviews_system->kesiapan_result                = $ppdb_interviews_check->kesiapan_result;
                $ppdb_interviews_system->kesiapan_result_note           = $ppdb_interviews_check->kesiapan_result_note;
                $ppdb_interviews_system->psikotest_value                = $ppdb_interviews_check->psikotest_value;
                $ppdb_interviews_system->psikotest_file                 = $ppdb_interviews_check->psikotest_file;
                $ppdb_interviews_system->psikotest_result               = $ppdb_interviews_check->psikotest_result;
                $ppdb_interviews_system->psikotest_result_note          = $ppdb_interviews_check->psikotest_result_note;
                $ppdb_interviews_system->academic_value                 = $ppdb_interviews_check->academic_value;
                $ppdb_interviews_system->academic_file                  = $ppdb_interviews_check->academic_file;
                $ppdb_interviews_system->academic_result                = $ppdb_interviews_check->academic_result;
                $ppdb_interviews_system->academic_result_note           = $ppdb_interviews_check->academic_result_note;
                $ppdb_interviews_system->interview_parent_summary       = $ppdb_interviews_check->interview_parent_summary;
                $ppdb_interviews_system->interview_parent_file          = $ppdb_interviews_check->interview_parent_file;
                $ppdb_interviews_system->interview_parent_result        = $ppdb_interviews_check->interview_parent_result;
                $ppdb_interviews_system->interview_parent_result_note   = $ppdb_interviews_check->interview_parent_result_note;
                $ppdb_interviews_system->interview_student_summary      = $ppdb_interviews_check->interview_student_summary;
                $ppdb_interviews_system->interview_student_file         = $ppdb_interviews_check->interview_student_file;
                $ppdb_interviews_system->interview_student_result       = $ppdb_interviews_check->interview_student_result;
                $ppdb_interviews_system->interview_student_result_note  = $ppdb_interviews_check->interview_student_result_note;
                $ppdb_interviews_system->observasi_value                = $ppdb_interviews_check->observasi_value;
                $ppdb_interviews_system->observasi_summary              = $ppdb_interviews_check->observasi_summary;
                $ppdb_interviews_system->observasi_file                 = $ppdb_interviews_check->observasi_file;
                $ppdb_interviews_system->observasi_result               = $ppdb_interviews_check->observasi_result;
                $ppdb_interviews_system->observasi_result_note          = $ppdb_interviews_check->observasi_result_note;
                $ppdb_interviews_system->save();
            }

            $payment_system = Payment_system::where('dapodik_id', $request->id)->first(); //check
            $payment = Payment::where('dapodik_id', $dapodik->id)->get(); //take value
            if ($payment_system == '' && $payment_system == null && empty($payment_system)) {
                foreach ($payment as $object) {
                    $payment_system                         = new Payment_system();
                    $payment_system->dapodik_id             = $users_check->id;
                    $payment_system->payment_type           = $object->payment_type;
                    $payment_system->payment_code           = $object->payment_code;
                    $payment_system->confirmation_status    = $object->confirmation_status;
                    $payment_system->date_send              = $object->date_send;
                    $payment_system->bank_owner_name        = $object->bank_owner_name;
                    $payment_system->bank_code              = $object->bank_code;
                    $payment_system->account_number         = $object->account_number;
                    $payment_system->cost                   = $object->cost;
                    $payment_system->image_confirmation     = $object->image_confirmation;
                    $payment_system->created_at             = $object->created_at;
                    $payment_system->updated_at             = $object->updated_at;
                    $payment_system->updated_by             = $object->updated_by;
                    $payment_system->save();
                }
            }
            if ($users == null && $users == "" && empty($users)) {
                $users = Users_system::where('id', $dapodik->id_user)->first();
                $user                               = new Users();
                $user->id                           = $users->id;
                $user->status_data                  = $users->status_data;
                $user->uuid                         = $users->uuid;
                $user->first_name                   = $users->first_name;
                $user->last_name                    = $users->last_name;
                $user->email                        = $users->email;
                $user->phone                        = $users->phone;
                $user->avatar_type                  = $users->avatar_type;
                $user->avatar_location              = $users->avatar_location;
                $user->password                     = $users->password;
                $user->password_changed_at          = $users->password_changed_at;
                $user->active                       = $users->active;
                $user->confirmation_code            = $users->confirmation_code;
                $user->confirmed                    = $users->confirmed;
                $user->timezone                     = $users->timezone;
                $user->last_login_at                = $users->last_login_at;
                $user->last_login_ip                = $users->last_login_ip;
                $user->to_be_logged_out             = $users->to_be_logged_out;
                $user->status                       = $users->status;
                $user->created_by                   = $users->created_by;
                $user->updated_by                   = $users->updated_by;
                $user->is_term_accept               = $users->is_term_accept;
                $user->remember_token               = $users->remember_token;
                $user->created_at                   = $users->created_at;
                $user->updated_at                   = $users->updated_at;
                $user->deleted_at                   = $users->deleted_at;
                $user->save();
            }

            $reregistrasi_system = Reregistrasi_system::where('dapodik_id', $request->id)->first(); //check

            if ($reregistrasi_system == null && $reregistrasi_system == "" && empty($reregistrasi_system)) {
                $reregister = ReRegistration::where('dapodik_id', $dapodik->id)->first();  //take value
                $reregister_system = new Reregistrasi_system();
                $reregister_system->file_additionalsatu     = $reregister->file_additionalsatu;
                $reregister_system->file_additionaldua      = $reregister->file_additionaldua;
                $reregister_system->dapodik_id              = $users_check->id;
                $reregister_system->medco_employee_file     = $reregister->medco_employee_file;
                $reregister_system->created_at              = $reregister->created_at;
                $reregister_system->updated_at              = $reregister->updated_at;
                $reregister_system->save();
            }

            debug($ppdb_interviews_system);
            debug($ppdb_interviews_system);
            debug($payment_system);
            debug($data_siswa_system_4);
            debug($dapodik);
            debug($data_siswa);

            return redirect()->back()->with(['flash_success' => 'Sudah Berhasil di Edit di Master']);
        } else {
            Users_system::where('id', $users_check->id_user)->delete();
            Dapodik::where('id_user', $users_check->id_user)->delete();
            PPDBInterview::where('dapodik_id', $users_check->id)->delete();
            Payment::where('dapodik_id', $users_check->id)->delete();
            Register::where('dapodik_id', $users_check->id)->delete();
            Data_siswa::where('dapodik_id', $users_check->id)->delete();
            Data_siswa2::where('dapodik_id', $users_check->id)->delete();
            Data_siswa3::where('dapodik_id', $users_check->id)->delete();
            Data_siswa4::where('dapodik_id', $users_check->id)->delete();
            return new RedirectResponse(route('admin.ppdb.dapodik'), ['flash_warning' => 'Data Import di hapus karena Sudah Pernah di Input']);
        }
    }
}
