<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\PPDB;
use App\Models\School;
use App\Models\EnumData;
use App\Models\Auth\Role;
use App\Models\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class AccountController.
 */
class AccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.account');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function upload_document($id)
    {
        $ppdb = PPDB::where('id', $id)->first();
        $errors = [];

        if(empty($ppdb)){
            array_push($errors, "PPDB not found");
        } else {
            if($ppdb->id_user != Auth::id()) array_push($errors, "PPDB not authorize");
            if($ppdb->document_status > 7) array_push($errors, "PPDB cannot update again");
        }

        if(count($errors)>0) return redirect()->route('frontend.user.dashboard')->withFlashDanger($errors[0]);
        debug($ppdb->birth_certificate);

        $file_uploaded = [
            ['name' => 'family_card', 'label' => 'Kartu Keluarga', 'path'   => $ppdb->family_card],
            ['name' => 'birth_certificate', 'label' => 'Akte Kelahiran', 'path'   => $ppdb->birth_certificate],
            ['name' => 'last_report', 'label' => 'Raport Terakhir', 'path'   => $ppdb->last_report],
            ['name' => 'academic_certificate', 'label' => 'Sertifikat Akademik', 'path'   => $ppdb->academic_certificate],
            ['name' => 'kia_book', 'label' => 'Buku KIA', 'path'   => $ppdb->kia_book],
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

        $file_additional_path = json_decode($ppdb->file_additional);
        $files_name = ['Satu', 'Dua', 'Tiga', 'Empat', 'Lima'];

        $file_additionals = [];
        for ($i=0; $i < count($files_name); $i++) { 

            $file_item = [
                'name'      => $files_name[$i],
                'file'      => '',
                'tingkat'   => '',
                'deskripsi' => ''
            ];

            if(!empty($file_additional_path) && count($file_additional_path) > $i){
                $file_path = $file_additional_path[$i];                
                $file_item['file'] = $file_path->file;
                $file_item['tingkat'] = $file_path->tingkat;
                $file_item['deskripsi'] = $file_path->deskripsi;
            }

            array_push($file_additionals, $file_item);
        }

        $slip_gaji_parent = [];

        if (!empty($ppdb->slip_gaji_parent) && $ppdb->slip_gaji_parent != "[]") {
            $slip_gaji_parent = json_decode($ppdb->slip_gaji_parent);
        }

        $file_additional_satu = '';
        $file_additional_dua = '';
        $file_additional_tiga = '';
        $file_additional_empat = '';
        $file_additional_lima = '';

        if (!empty($ppdb->file_additional_satu != "[]") 
            || !empty($ppdb->file_additional_dua != "[]")
            || !empty($ppdb->file_additional_tiga != "[]")
            || !empty($ppdb->file_additional_empat != "[]")
            || !empty($ppdb->file_additional_lima != "[]")
            || !empty($ppdb->slip_gaji_parent != "[]")) {
            $file_additional_satu = json_decode($ppdb->file_additional_satu);
            $file_additional_dua   = json_decode($ppdb->file_additional_dua);
            $file_additional_tiga  = json_decode($ppdb->file_additional_tiga);
            $file_additional_empat = json_decode($ppdb->file_additional_empat);
            $file_additional_lima  = json_decode($ppdb->file_additional_lima);
        }


        $tingkat = ['Internasional', 'Nasional', 'Provinsi', 'Kota/Kabupaten', 'Klub/Komunitas'];

        debug($file_additionals);
        debug($slip_gaji_parent);
        debug($file_additional_satu);
        debug($file_additional_dua);
        debug($file_additional_tiga);
        debug($file_additional_empat);
        debug($file_additional_lima);


        return view('frontend.user.document', compact('ppdb', 'file_additionals', 'tingkat', 'file_uploaded', 'file_additional', 'file_tingkat', 'file_deskripsi', 'slip_gaji_parent', 'file_additional_satu', 'file_additional_dua', 'file_additional_tiga', 'file_additional_empat', 'file_additional_lima'));
    }

    public function upload(Request $request)
    {
        $errors = [];
        $ppdb = new PPDB();

        try {
            $user_id = -1;

            if (auth()->check()) {
                $user_id = auth()->id();
                $user = auth()->user();
            } else {
                array_push($errors, 'Login terlebih dahulu');
            }

            if (empty($request->ppdb_id)) {
                array_push($errors, 'Document PPDB tidak ditemukan');
            } else {
                $ppdb_id = $request->ppdb_id;
                $ppdb = PPDB::where('id', $ppdb_id)->first();
                if(empty($ppdb)){
                    array_push($errors, 'Document PPDB tidak ditemukan');
                } else {
                    if($ppdb->id_user != $user_id){
                        array_push($errors, 'Document PPDB tidak sesuai dengan user yang mendaftarkan');
                    } else {
                        if (empty($request->family_card)) {
                            array_push($errors, 'Belum ada Kartu Keluarga yang di Unggah');
                        }
            
                        if (empty($request->birth_certificate)) {
                            array_push($errors, 'Belum ada Akte Kelahiran yang di Unggah');
                        }
                    }
                }
            }




            if (count($errors) < 1) {

                // $ppdb->medco_employee = $request->medco_employee;
                // $ppdb->medco_employee_file = $request->medco_employee_file;

                $ppdb->family_card = $request->family_card;
                $ppdb->birth_certificate = $request->birth_certificate;
                $ppdb->last_report = $request->last_report;
                $ppdb->academic_certificate = $request->academic_certificate;
                $ppdb->kia_book = $request->kia_book;
                
                $slip_gaji = [];

                if((!empty($request->slip_gaji_ayah) && $request->slip_gaji_ayah != "") || (!empty($request->slip_gaji_ibu) && $request->slip_gaji_ibu != "")) {
                    array_push($slip_gaji, [
                        'slip_gaji_father' => $request->slip_gaji_ayah,
                        'slip_gaji_mother' => $request->slip_gaji_ibu
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

                $ppdb->slip_gaji_parent      = json_encode($slip_gaji);
                $ppdb->file_additional_satu  = json_encode($data_parent);
                $ppdb->file_additional_dua   = json_encode($work_parent);
                $ppdb->file_additional_tiga  = json_encode($place_work_parent);
                $ppdb->file_additional_empat = json_encode($title_work_parent);
                $ppdb->file_additional_lima  = json_encode($income_work_parent);
                $ppdb->file_additional       = json_encode($file_additionals);
                $ppdb->medco_employee = $request->medco_employee;
                $ppdb->medco_employee_file = $request->medco_employee_file;
                $ppdb->save();

                return response()->json([
                    'is_success' => true,
                    'message' => 'Update data calon siswa ' . $ppdb->fullname . ' Berhasil disimpan',
                    'errors' => [],
                    'response_object' => $ppdb
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
                'message' => 'Update data calon siswa Tidak berhasil',
                'errors' => $e->getMessage(),
            ]);
        }
    }
}
