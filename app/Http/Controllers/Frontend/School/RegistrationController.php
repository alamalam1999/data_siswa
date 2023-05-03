<?php

namespace App\Http\Controllers\frontend\school;

use Redirect;
use App\Models\PPDB;
use Illuminate\Http\Request;
use App\Models\ReRegistration;
use Jenssegers\Agent\Facades\Agent;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Responses\RedirectResponse;
use App\Imports\PernyataanOrangTuaImport;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegistrationController extends Controller
{
    use RegistersUsers;


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function student($id)
    {
        $ppdb = PPDB::find($id);
        // debug(File::get(storage_path('app\private\pernyataan_orang_tua.xlsx')));
        $pernyataan_orang_tua = (new PernyataanOrangTuaImport)->toArray(storage_path('app\private\pernyataan_orang_tua.xls'));

        $pernyataan_orang_tua_questions = [];
        foreach ($pernyataan_orang_tua[0] as $item) {
            if($ppdb->school_site == $item['school_code'] && $ppdb->stage == $item['stage']){
                array_push($pernyataan_orang_tua_questions, $item['pertanyaan']);
            }
        }

        debug($pernyataan_orang_tua_questions);

        return view('frontend.registration.student', ['ppdb' => $ppdb, 'pernyataan_orang_tua_questions' => $pernyataan_orang_tua_questions]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function studentPost()
    {

        return new RedirectResponse(route('frontend.registration.student'), ['flash_success' => ' The administration was successfully upload.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function reregistration($id)
    {
        $ppdb = PPDB::find($id);

        $reregistration = ReRegistration::where('ppdb_id',$ppdb->id)->first();

        if ($reregistration != '' && $reregistration != null){

        }

        $file_additional = [];

       if(!empty($reregistration->file_additionalsatu) && $reregistration->file_additionalsatu != "" && $reregistration->file_additionalsatu != "[]"){
           $file_additional = json_decode($reregistration->file_additionalsatu);
       }

       $file_additionaldua = [];

       if(!empty($reregistration->file_additionaldua) && $reregistration->file_additionaldua != "" && $reregistration->file_additionaldua != "[]"){
            $file_additionaldua = json_decode($reregistration->file_additionaldua);
       }

       $data = [
           'ppdb'  => $ppdb,
           'file_additional'    => $file_additional,
           'reregistration'     => $reregistration,
           'file_additionaldua' => $file_additionaldua
       ];

       //debug($pernyataan_orang_tua_questions);

       if(Agent::isMobile()) {
            return view('frontend.registration.reregistrationphone',$data);
        }else {
            return view('frontend.registration.reregistration',$data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function acceptreregistration($id)
    {

        $ppdb = PPDB::find($id);

        if ($ppdb->document_status == 7) {

            return new RedirectResponse( route('admin.ppdb.edit', $ppdb->id), ['flash_success' => 'Sudah Berhasil di Konfirmasi']);
        } else if ($ppdb->document_status == 6){

            $ppdb->document_status = 7;
            $ppdb->save();

            return new RedirectResponse( route('admin.ppdb.edit', $ppdb->id), ['flash_success' => ' Berhasil di Konfirmasi']);
        }

    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function recheckreregistration($id)
    {
        $ppdb = PPDB::find($id);

        if ($ppdb->document_status == 6) {

            $ppdb->document_status = 5;
            $ppdb->save();
            return new RedirectResponse( route('admin.ppdb.edit', $ppdb->id), ['flash_success' => 'Akses Pengecekan Ulang Telah Dibuka kembali Pada Dashboard Orang Tua']);
        } else {

            return new RedirectResponse( route('admin.ppdb.edit', $ppdb->id), ['flash_success' => 'Murid Sudah di konfirmasi, Tidak Dapat melakukan Akses Pengecekan Ulang']);
        }
    }

    public function storedetail(Request $request) {
        $errors = [];
        debug($request);

        try{

        $user_id = auth()->id();

                $ppdb = PPDB::where('id_user',$user_id)->orderBy('id','desc')->take(1)->first();

                $reregistration = '';

                $reregistration = ReRegistration::where('ppdb_id',$ppdb->id)->first();

                if (empty($reregistration)) {

                    $reregistration = new ReRegistration();
                    var_dump(" masuk ke reregistration ".$reregistration);
                }

                $reregistration->ppdb_id = $ppdb->id;

                $file_additionals_dua = [];

                for ($i = 1; $i <= 107; $i++) {
                    $count = $i;
                    $datacount = 'data'.$count;
                            if (!empty($request->$datacount) && $request->$datacount != "") {
                                array_push($file_additionals_dua, [
                                    $datacount      => $request->$datacount
                                ]);
                            }

                }

                $reregistration->file_additionaldua = json_encode($file_additionals_dua);

                $reregistration->save();

                // return response()->json([
                //     'is_success' => true,
                //     'message' => 'DAFTAR BERHASIL' .$ppdb
                // ]);

                return new RedirectResponse(route('frontend.user.reregistration', $ppdb->id), ['flash_success' => ' Lanjut Tahap Berikutnya']);

                // return redirect()->with('alert','hello');


            } catch(\Exception $e) {
                    debug($e->getMessage());
                    // error_log($request);
                    return response()->json([
                        'is_success' => false,
                        'message' => 'DAFTAR ULANG TIDAK BERHASIL' .$ppdb,
                        'errors' => $e->getMessage(),
                    ]);
            }
    }

    public function store(Request $request)
    {
        $errors = [];
        debug($request);

        try {

            $user_id = auth()->id();

                $ppdb = PPDB::where('id_user',$user_id)->orderBy('id','desc')->take(1)->first();

                $reregistration = '';

                $reregistration = ReRegistration::where('ppdb_id',$ppdb->id)->first();

                if (empty($reregistration)) {

                    $reregistration = new ReRegistration();
                    //var_dump(" masuk ke reregistration ".$reregistration);
                }


                    $file = $request->file('photo');

                    $gambar = '';

                    if ($file) {
                        $nama = rand() . $file->getClientOriginalName();

                        $path_file = public_path('uploads') . '/ppdb/' . date('Y');
                        $path_web_file = 'uploads/ppdb/' . date('Y');
                        $file->move($path_file, $nama);
                        $gambar = $path_web_file . '/' . $nama;
                        //var_dump("di dalam".$gambar);
                    }

                    $filevaksin = $request->file('vaksinphoto');

                    $gambarvaksin = '';

                    if ($filevaksin) {
                        $namavaksin = rand() . $filevaksin->getClientOriginalName();

                        $path_filevaksin = public_path('uploads') . '/ppdb/' . date('Y');
                        $path_web_filevaksin = 'uploads/ppdb/' . date('Y');
                        $filevaksin->move($path_filevaksin, $namavaksin);
                        $gambarvaksin = $path_web_filevaksin . '/' . $namavaksin;
                        //var_dump("di dalam".$gambarvaksin);
                    }

                // var_dump($ppdb->id);

                $reregistration->ppdb_id = $ppdb->id;

                $file_additionals = [];

                for ($i = 13; $i <= 86; $i++) {
                    $count = $i;
                    $datacount = 'data'.$count;
                            if (!empty($request->$datacount) && $request->$datacount != "") {
                                array_push($file_additionals, [
                                    $datacount      => $request->$datacount
                                ]);
                            }

                }

                if(!empty($request->nameparent) && $request->nameparent != ""){
                    array_push($file_additionals, [
                        'nameparent'      => $request->nameparent
                    ]);
                }

                if(!empty($request->addressparent) && $request->addressparent != ""){
                    array_push($file_additionals, [
                        'addressparent'      => $request->addressparent
                    ]);
                }

                if(!empty($request->firstpayment) && $request->firstpayment != ""){
                    array_push($file_additionals, [
                        'firstpayment'      => $request->firstpayment
                    ]);
                }

                if(!empty($request->firstpayment2) && $request->firstpayment2 != ""){
                    array_push($file_additionals, [
                        'firstpayment2'      => $request->firstpayment2
                    ]);
                }

                if(!empty($request->datasatu) && $request->datasatu != ""){
                    array_push($file_additionals, [
                        'datasatu'      => $request->datasatu
                    ]);
                }

                if(!empty($request->datadua) && $request->datadua != ""){
                    array_push($file_additionals, [
                        'datadua'      => $request->datadua
                    ]);
                }

                if(!empty($request->datatiga) && $request->datatiga != ""){
                    array_push($file_additionals, [
                        'datatiga'      => $request->datatiga
                    ]);
                }

                if(!empty($request->dataempat) && $request->dataempat != ""){
                    array_push($file_additionals, [
                        'dataempat'      => $request->dataempat
                    ]);
                }

                if(!empty($request->datalima) && $request->datalima != ""){
                    array_push($file_additionals, [
                        'datalima'      => $request->datalima
                    ]);
                }

                if(!empty($request->dataenam) && $request->dataenam != ""){
                    array_push($file_additionals, [
                        'dataenam'      => $request->dataenam
                    ]);
                }

                if(!empty($request->datatujuh) && $request->datatujuh != ""){
                    array_push($file_additionals, [
                        'datatujuh'      => $request->datatujuh
                    ]);
                }

                if(!empty($request->datadelapan) && $request->datadelapan != ""){
                    array_push($file_additionals, [
                        'datadelapan'      => $request->datadelapan
                    ]);
                }

                if(!empty($request->datasembilan) && $request->datasembilan != ""){
                    array_push($file_additionals, [
                        'datasembilan'      => $request->datasembilan
                    ]);
                }

                if(!empty($request->datasepuluh) && $request->datasepuluh != ""){
                    array_push($file_additionals, [
                        'datasepuluh'      => $request->datasepuluh
                    ]);
                }

                if(!empty($request->datasebelas) && $request->datasebelas != ""){
                    array_push($file_additionals, [
                        'datasebelas'      => $request->datasebelas
                    ]);
                }

                if(!empty($request->dataduabelas) && $request->dataduabelas != ""){
                    array_push($file_additionals, [
                        'dataduabelas'      => $request->dataduabelas
                    ]);
                }

                

                if(!empty($request->dataschool62) && $request->dataschool62 != ""){
                    array_push($file_additionals, [
                        'dataschool62'      => $request->dataschool62
                    ]);
                }

                if(!empty($request->dataschool63) && $request->dataschool63 != ""){
                    array_push($file_additionals, [
                        'dataschool63'      => $request->dataschool63
                    ]);
                }

                if(!empty($request->dataschool64) && $request->dataschool64 != ""){
                    array_push($file_additionals, [
                        'dataschool64'      => $request->dataschool64
                    ]);
                }

                if(!empty($request->dataschool65) && $request->dataschool65 != ""){
                    array_push($file_additionals, [
                        'dataschool65'      => $request->dataschool65
                    ]);
                }



                if (!empty($request->datatigabelas) && $request->datatigabelas != "") {
                    array_push($file_additionals, [
                        'datatigabelas'     => $request->datatigabelas
                    ]);
                }

                if(!empty($request->datavaksin24) && $request->datavaksin24 != ""){
                    array_push($file_additionals, [
                        'datavaksin24'      => $request->datavaksin24
                    ]);
                }

                if(!empty($request->datavaksin25) && $request->datavaksin25 != ""){
                    array_push($file_additionals, [
                        'datavaksin25'      => $request->datavaksin25
                    ]);
                }

                if(!empty($request->datavaksin26) && $request->datavaksin26 != ""){
                    array_push($file_additionals, [
                        'datavaksin26'      => $request->datavaksin26
                    ]);
                }

                if(!empty($request->datavaksin27) && $request->datavaksin27 != ""){
                    array_push($file_additionals, [
                        'datavaksin27'      => $request->datavaksin27
                    ]);
                }

                $file_additionals_image = [];

                if(!empty($gambar) && $gambar != ""){
                    array_push($file_additionals_image, [
                        'gambar'      => $gambar
                    ]);
                }

                if(!empty($gambarvaksin) && $gambarvaksin != ""){
                    array_push($file_additionals_image, [
                        'gambarvaksin'      => $gambarvaksin
                    ]);
                }

                $reregistration->medco_employee_file = json_encode($file_additionals_image);

                $reregistration->file_additionalsatu = json_encode($file_additionals);

                $reregistration->save();

                $ppdb->document_status = 6;

                $ppdb->save();


                return new RedirectResponse(route('frontend.user.dashboard'), ['flash_success' => ' Daftar Ulang Berhasil Silahkan Menunggu']);


        } catch (\Exception $e) {
            // \Session::flash('gagal', 'Maaf No tersebut sudah pernah di daftarkan');
            debug($e->getMessage());
            // // error_log($request);
            // return response()->json([
            //     'is_success' => false,
            //     'message' => 'Pendaftaran Tidak berhasil' .$ppdb,
            //     'errors' => $e->getMessage(),
            // ]);
            return redirect()->back() ->with('alert', 'Pendaftaran tidak berhasil ,silahkan coba kembali \n '.$e->getMessage());
        }
    }

}
