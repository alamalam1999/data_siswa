<?php

namespace App\Http\Controllers\frontend\school;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\File;
use App\Http\Responses\RedirectResponse;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ReRegistration;

use App\Imports\PernyataanOrangTuaImport;

use App\Models\PPDB;

class ReregistrationController extends Controller
{
    use RegistersUsers;


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


       $data = [
           'ppdb'  => $ppdb,
           'file_additional' => $file_additional,
           'reregistration'  => $reregistration
       ];

       //debug($pernyataan_orang_tua_questions);

       return view('frontend.registration.reregistration',$data);
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
                    var_dump(" masuk ke reregistration ".$reregistration);
                }


                    $file = $request->file('photo');
            
                    $gambar = '';

                    if ($file) {
                        $nama = rand() . $file->getClientOriginalName();

                        $path_file = public_path('uploads') . '/ppdb/' . date('Y');
                        $path_web_file = 'uploads/ppdb/' . date('Y');
                        $file->move($path_file, $nama);
                        $gambar = $path_web_file . '/' . $nama;
                        var_dump("di dalam".$gambar);
                    }



                var_dump($ppdb->id);

                $reregistration->ppdb_id = $ppdb->id;
                
                $file_additionals = [];

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

                if(!empty($request->data13) && $request->data13 != ""){
                    array_push($file_additionals, [
                        'data13'      => $request->data13
                    ]);
                }

                
                if(!empty($request->data14) && $request->data14 != ""){
                    array_push($file_additionals, [
                        'data14'      => $request->data14
                    ]);
                }


                if(!empty($request->data15) && $request->data15 != ""){
                    array_push($file_additionals, [
                        'data15'      => $request->data15
                    ]);
                }

                if(!empty($request->data16) && $request->data16 != ""){
                    array_push($file_additionals, [
                        'data16'      => $request->data16
                    ]);
                }

                if(!empty($request->data17) && $request->data17 != ""){
                    array_push($file_additionals, [
                        'data17'      => $request->data17
                    ]);
                }

                if(!empty($request->data18) && $request->data18 != ""){
                    array_push($file_additionals, [
                        'data18'      => $request->data18
                    ]);
                }

                if(!empty($request->data19) && $request->data19 != ""){
                    array_push($file_additionals, [
                        'data19'      => $request->data19
                    ]);
                }

                if(!empty($request->data20) && $request->data20 != ""){
                    array_push($file_additionals, [
                        'data20'      => $request->data20
                    ]);
                }

                if(!empty($request->data21) && $request->data21 != ""){
                    array_push($file_additionals, [
                        'data21'      => $request->data21
                    ]);
                }

                if(!empty($request->data22) && $request->data22 != ""){
                    array_push($file_additionals, [
                        'data22'      => $request->data22
                    ]);
                }

                if(!empty($request->data23) && $request->data23 != ""){
                    array_push($file_additionals, [
                        'data23'      => $request->data23
                    ]);
                }
                if(!empty($request->data24) && $request->data24 != ""){
                    array_push($file_additionals, [
                        'data24'      => $request->data24
                    ]);
                }

                if(!empty($request->data25) && $request->data25 != ""){
                    array_push($file_additionals, [
                        'data25'      => $request->data25
                    ]);
                }

                if(!empty($request->data26) && $request->data26 != ""){
                    array_push($file_additionals, [
                        'data26'      => $request->data26
                    ]);
                }

                if(!empty($request->data27) && $request->data27 != ""){
                    array_push($file_additionals, [
                        'data27'      => $request->data27
                    ]);
                }

                if(!empty($request->data28) && $request->data28 != ""){
                    array_push($file_additionals, [
                        'data28'      => $request->data28
                    ]);
                }
                
                if(!empty($request->data29) && $request->data29 != ""){
                    array_push($file_additionals, [
                        'data29'      => $request->data29
                    ]);
                }

                if(!empty($request->data30) && $request->data30 != ""){
                    array_push($file_additionals, [
                        'data30'      => $request->data30
                    ]);
                }

                if(!empty($request->data31) && $request->data31 != ""){
                    array_push($file_additionals, [
                        'data31'      => $request->data31
                    ]);
                }

                if(!empty($request->data32) && $request->data32 != ""){
                    array_push($file_additionals, [
                        'data32'      => $request->data32
                    ]);
                }

                if(!empty($request->data33) && $request->data33 != ""){
                    array_push($file_additionals, [
                        'data33'      => $request->data33
                    ]);
                }
                if(!empty($request->data34) && $request->data34 != ""){
                    array_push($file_additionals, [
                        'data34'      => $request->data34
                    ]);
                }

                if(!empty($request->data35) && $request->data35 != ""){
                    array_push($file_additionals, [
                        'data35'      => $request->data35
                    ]);
                }

                if(!empty($request->data36) && $request->data36 != ""){
                    array_push($file_additionals, [
                        'data36'      => $request->data36
                    ]);
                }

                if(!empty($request->data37) && $request->data37 != ""){
                    array_push($file_additionals, [
                        'data37'      => $request->data37
                    ]);
                }

                if(!empty($request->data38) && $request->data38 != ""){
                    array_push($file_additionals, [
                        'data38'      => $request->data38
                    ]);
                }

                if(!empty($request->data39) && $request->data39 != ""){
                    array_push($file_additionals, [
                        'data39'      => $request->data39
                    ]);
                }

                if(!empty($request->data40) && $request->data40 != ""){
                    array_push($file_additionals, [
                        'data40'      => $request->data40
                    ]);
                }

                if(!empty($request->data41) && $request->data41 != ""){
                    array_push($file_additionals, [
                        'data41'      => $request->data41
                    ]);
                }

                if(!empty($request->data41) && $request->data41 != ""){
                    array_push($file_additionals, [
                        'data41'      => $request->data41
                    ]);
                }

                if(!empty($request->data42) && $request->data42 != ""){
                    array_push($file_additionals, [
                        'data42'      => $request->data42
                    ]);
                }

                if(!empty($request->data43) && $request->data43 != ""){
                    array_push($file_additionals, [
                        'data43'      => $request->data43
                    ]);
                }

                if(!empty($request->data44) && $request->data44 != ""){
                    array_push($file_additionals, [
                        'data44'      => $request->data44
                    ]);
                }

                if(!empty($request->data45) && $request->data45 != ""){
                    array_push($file_additionals, [
                        'data45'      => $request->data45
                    ]);
                }

                if(!empty($request->data46) && $request->data46 != ""){
                    array_push($file_additionals, [
                        'data46'      => $request->data46
                    ]);
                }

                if(!empty($request->data47) && $request->data47 != ""){
                    array_push($file_additionals, [
                        'data47'      => $request->data47
                    ]);
                }

                if(!empty($request->data48) && $request->data48 != ""){
                    array_push($file_additionals, [
                        'data48'      => $request->data48
                    ]);
                }

                if(!empty($request->data49) && $request->data49 != ""){
                    array_push($file_additionals, [
                        'data49'      => $request->data49
                    ]);
                }
                if(!empty($request->data50) && $request->data50 != ""){
                    array_push($file_additionals, [
                        'data50'      => $request->data50
                    ]);
                }
                if(!empty($request->data51) && $request->data51 != ""){
                    array_push($file_additionals, [
                        'data51'      => $request->data51
                    ]);
                }
                if(!empty($request->data52) && $request->data52 != ""){
                    array_push($file_additionals, [
                        'data52'      => $request->data52
                    ]);
                }

                if(!empty($request->data53) && $request->data53 != ""){
                    array_push($file_additionals, [
                        'data53'      => $request->data53
                    ]);
                }

                if(!empty($request->data54) && $request->data54 != ""){
                    array_push($file_additionals, [
                        'data54'      => $request->data54
                    ]);
                }

                if(!empty($request->data55) && $request->data55 != ""){
                    array_push($file_additionals, [
                        'data55'      => $request->data55
                    ]);
                }

                if(!empty($request->data56) && $request->data56 != ""){
                    array_push($file_additionals, [
                        'data56'      => $request->data56
                    ]);
                }


                if(!empty($request->data57) && $request->data57 != ""){
                    array_push($file_additionals, [
                        'data57'      => $request->data57
                    ]);
                }

                if(!empty($request->data58) && $request->data58 != ""){
                    array_push($file_additionals, [
                        'data58'      => $request->data58
                    ]);
                }

                if(!empty($request->data59) && $request->data59 != ""){
                    array_push($file_additionals, [
                        'data59'      => $request->data59
                    ]);
                }

                if(!empty($request->data60) && $request->data60 != ""){
                    array_push($file_additionals, [
                        'data60'      => $request->data60
                    ]);
                }

                if(!empty($request->data61) && $request->data61 != ""){
                    array_push($file_additionals, [
                        'data61'      => $request->data61
                    ]);
                }
                if(!empty($request->data62) && $request->data62 != ""){
                    array_push($file_additionals, [
                        'data62'      => $request->data62
                    ]);
                }
                if(!empty($request->data63) && $request->data63 != ""){
                    array_push($file_additionals, [
                        'data63'      => $request->data63
                    ]);
                }
                if(!empty($request->data64) && $request->data64 != ""){
                    array_push($file_additionals, [
                        'data64'      => $request->data64
                    ]);
                }
                if(!empty($request->data65) && $request->data65 != ""){
                    array_push($file_additionals, [
                        'data65'      => $request->data65
                    ]);
                }

                if(!empty($request->data66) && $request->data66 != ""){
                    array_push($file_additionals, [
                        'data66'      => $request->data66
                    ]);
                }
                if(!empty($request->data67) && $request->data67 != ""){
                    array_push($file_additionals, [
                        'data67'      => $request->data67
                    ]);
                }

                if(!empty($request->data68) && $request->data68 != ""){
                    array_push($file_additionals, [
                        'data68'      => $request->data68
                    ]);
                }

                if(!empty($request->data69) && $request->data69 != ""){
                    array_push($file_additionals, [
                        'data69'      => $request->data69
                    ]);
                }

                if(!empty($request->data70) && $request->data70 != ""){
                    array_push($file_additionals, [
                        'data70'      => $request->data70
                    ]);
                }

                if(!empty($request->data71) && $request->data71 != ""){
                    array_push($file_additionals, [
                        'data71'      => $request->data71
                    ]);
                }

                if(!empty($request->data72) && $request->data72 != ""){
                    array_push($file_additionals, [
                        'data72'      => $request->data72
                    ]);
                }
                if(!empty($request->data73) && $request->data73 != ""){
                    array_push($file_additionals, [
                        'data73'      => $request->data73
                    ]);
                }


                if(!empty($request->data74) && $request->data74 != ""){
                    array_push($file_additionals, [
                        'data74'      => $request->data74
                    ]);
                }

                if(!empty($request->data75) && $request->data75 != ""){
                    array_push($file_additionals, [
                        'data75'      => $request->data75
                    ]);
                }

                if(!empty($request->data76) && $request->data76 != ""){
                    array_push($file_additionals, [
                        'data76'      => $request->data76
                    ]);
                }
                if(!empty($request->data77) && $request->data77 != ""){
                    array_push($file_additionals, [
                        'data77'      => $request->data77
                    ]);
                }

                if(!empty($request->data74) && $request->data78 != ""){
                    array_push($file_additionals, [
                        'data78'      => $request->data78
                    ]);
                }

                if(!empty($request->data79) && $request->data79 != ""){
                    array_push($file_additionals, [
                        'data79'      => $request->data79
                    ]);
                }

                if(!empty($request->data80) && $request->data80 != ""){
                    array_push($file_additionals, [
                        'data80'      => $request->data80
                    ]);
                }
                if(!empty($request->data81) && $request->data81 != ""){
                    array_push($file_additionals, [
                        'data81'      => $request->data81
                    ]);
                }

                if(!empty($request->data82) && $request->data82 != ""){
                    array_push($file_additionals, [
                        'data82'      => $request->data82
                    ]);
                }

                if(!empty($request->data83) && $request->data83 != ""){
                    array_push($file_additionals, [
                        'data83'      => $request->data83
                    ]);
                }
                if(!empty($request->data84) && $request->data84 != ""){
                    array_push($file_additionals, [
                        'data84'      => $request->data84
                    ]);
                }


                if(!empty($request->data85) && $request->data85 != ""){
                    array_push($file_additionals, [
                        'data85'      => $request->data85
                    ]);
                }
                if(!empty($request->data86) && $request->data86 != ""){
                    array_push($file_additionals, [
                        'data86'      => $request->data86
                    ]);
                }



                if (!empty($request->datatigabelas) && $request->datatigabelas != "") {
                    array_push($file_additionals, [
                        'datatigabelas'     => $request->datatigabelas
                    ]);
                }
                

                $reregistration->medco_employee_file = $gambar;
                
                $reregistration->file_additionalsatu = json_encode($file_additionals);

                $reregistration->save();  

                $ppdb->document_status = 6;

                $ppdb->save();

             
                return new RedirectResponse(route('frontend.user.dashboard'), ['flash_success' => ' Daftar Ulang Berhasil Silahkan Menunggu']);

           
        } catch (\Exception $e) {
            // \Session::flash('gagal', 'Maaf No tersebut sudah pernah di daftarkan');
            debug($e->getMessage());
            // error_log($request);
            return response()->json([
                'is_success' => false,
                'message' => 'Pendaftaran Tidak berhasil' .$ppdb,
                'errors' => $e->getMessage(),
            ]);
        }
    }


}
