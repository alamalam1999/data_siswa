<?php

namespace App\Http\Controllers\Backend\Pricing;

use Carbon\Carbon;
use App\Models\Pricing;
use App\Models\Register;
use App\Models\Data_siswa;
use App\Exports\SiswaExport;
use Illuminate\Http\Request;
use App\Imports\PricingImport;
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


    /**
     * @param \App\Http\Requests\Backend\Pricing\PricingPermissionRequest $request
     *
     * @return ViewResponse
     */
    public function uploadPricing(PricingPermissionRequest $request)
    {

            $data_siswa = [];

            
            $data_siswa = Excel::toArray(new Data_siswa, $request->file('file_pricing'));

            var_dump($data_siswa);

            $data_siswa_insert = [];

            foreach ($data_siswa[0] as $datasiswa) {
                array_push($data_siswa_insert, [
                    'no_formulir'               => $datasiswa['NO_FORMULIR'],           //data1
                    'ppdb_id'                   => $datasiswa['PPDB_ID'],
                    'tahun_ajaran'              => $datasiswa['TAHUN_AJARAN'],          //data2
                    'tanggal_pendaftaran'       => $datasiswa['TANGGAL_PENDAFTARAN'],   //data3
                    'status_siswa'              => $datasiswa['STATUS_SISWA'],          //data4
                    'nama_lengkap'              => $datasiswa['NAMA_LENGKAP'],          //data5
                    'jenis_kelamin'             => $datasiswa['JENIS_KELAMIN'],         //data6
                    'nisn'                      => $datasiswa['NISN'],//7
                    'kitas'                     => $datasiswa['KITAS'],//8
                    'tempat_lahir'              => $datasiswa['TEMPAT_LAHIR'],//9
                    'tanggal_lahir'             => $datasiswa['TANGGAL_LAHIR'],//10
                    'akta_kelahiran'            => $datasiswa['AKTA_KELAHIRAN'],//11
                    'agama'                     => $datasiswa['AGAMA'],//12
                    'kewarganegaraan'           => $datasiswa['KEWARGANEGARAAN'],//13
                    'nama_negara'               => $datasiswa['NAMA_NEGARA'],//14
                    'berkebutuhan_khusus'       => $datasiswa['BERKEBUTUHAN_KHUSUS'],//15 (ganda)
                    'berkebutuhan_khusus'       => $datasiswa['BERKEBUTUHAN_KHUSUS'],//16 (ganda)
                    'alamat_jalan'              => $datasiswa['ALAMAT_JALAN'],//17
                    'rt'                        => $datasiswa['RT'],//18
                    'rw'                        => $datasiswa['RW'],//19
                    'nama_dusun'                => $datasiswa['NAMA_DUSUN'],//20
                    'nama_kelurahan'            => $datasiswa['NAMA_KELURAHAN'],//21 (ganda)
                    'nama_kelurahan'            => $datasiswa['NAMA_KELURAHAN'],//22 (ganda)
                    'kecamatan'                 => $datasiswa['KECAMATAN'],//23
                    'kode_pos'                  => $datasiswa['KODE_POS'],//24
                    'tempat_tinggal'            => $datasiswa['TEMPAT_TINGGAL'],//25
                    'moda_transportasi'         => $datasiswa['MODA_TRANSPORTASI'],//26
                    'nomor_kks'                 => $datasiswa['NOMOR_KKS'],//27
                    'anak_keberapa'             => $datasiswa['ANAK_KEBERAPA'],//28
                    'penerima_kps_pkh'          => $datasiswa['PENERIMA_KPS_PKH'],//29
                    'no_kph_pkh'                => $datasiswa['NO_KPH_PKH'],//30
                    'usulan_dari_sekolah'       => $datasiswa['USULAN_DARI_SEKOLAH'],//31
                    'kip'                       => $datasiswa['KIP'],//32
                    'nomor_kip'                 => $datasiswa['NOMOR_KIP'],//33
                    'nama_kip'                  => $datasiswa['NAMA_KIP'],//34
                    'kartu_KIP'                 => $datasiswa['KARTU_KIP'],//35
                    'alasan_layak_pip'          => $datasiswa['ALASAN_LAYAK_PIP'],//36
                    'bank'                      => $datasiswa['BANK'],//37
                    'no_rekening'               => $datasiswa['NO_REKENING'],//38
                    'rekening_atas_nama'        => $datasiswa['REKENING_ATAS_NAMA'],//39
                    'nama_ayah'                 => $datasiswa['NAMA_AYAH'],//40
                    'nik_ayah'                  => $datasiswa['NIK_AYAH'],//41
                    'tahun_lahir_ayah'          => $datasiswa['TAHUN_LAHIR_AYAH'],//42
                    'pendidikan_ayah'           => $datasiswa['PEKERJAAN_AYAH'],//43
                    'pekerjaan_ayah'            => $datasiswa['PEKERJAAN_AYAH'],//44
                    'penghasilan_bulanan_ayah'  => $datasiswa['PENGHASILAN_BULANAN_AYAH'],//45
                    'berkebutuhan_khusus_ayah'  => $datasiswa['BERKEBUTUHAN_KHUSUS_AYAH'],//46
                    'nama_Ibu'                  => $datasiswa['NAMA_IBU'],//47
                    'nik_Ibu'                   => $datasiswa['NIK_IBU'],//48
                    'tahun_lahir_ibu'           => $datasiswa['TAHUN_LAHIR_IBU'],//49
                    'pendidikan_ibu'            => $datasiswa['PENDIDIKAN_IBU'],//50
                    'pekerjaan_ibu'             => $datasiswa['PEKERJAAN_IBU'],//51
                    'penghasilan_bulanan_ibu'   => $datasiswa['PENGHASILAN_BULANAN_IBU'], //52
                    'berkebutuhan_khusus_ibu'   => $datasiswa['BERKEBUTUHAN_KHUSUS_IBU'],   //data53
                    'nama_wali'                 => $datasiswa['NAMA_WALI'],              //data54
                    'nik_wali'                  => $datasiswa['NIK_WALI'],              //data55
                    'tahun_lahir_wali'          => $datasiswa['TAHUN_LAHIR_WALI'], //new check data56
                    'pendidikan_wali'           => $datasiswa['PENDIDIKAN_WALI'],   //data57
                    'pekerjaan_wali'            => $datasiswa['PEKERJAAN_WALI'],    //58
                    'penghasilan_bulanan_wali'  => $datasiswa['PENGHASILAN_BULANAN_WALI'],  //59
                    'telepon_rumah'             => $datasiswa['TELEPON_RUMAH'], //60
                    'nomor_hp'                  => $datasiswa['NOMOR_HP'], //61
                    'email'                     => $datasiswa['EMAIL'],  //62
                    'jenis_ekstrakulikuler'     => $datasiswa['JENIS_EKSTRAKULIKULER'],  //63
                    'tinggi_badan'              => $datasiswa['TINGGI_BADAN'],  //64
                    'berat_badan'               => $datasiswa['BERAT_BADAN'], //65
                    'jarak_tempat'              => $datasiswa['JARAK_TEMPAT'],  //66
                    'waktu_tempuh'              => $datasiswa['WAKTU_TEMPAT'],  //67
                    'saudara_kandung'           => $datasiswa['SAUDARA_KANDUNG']  //68
                ]);
            }

            // $pricingInserts = [];
            // foreach ($pricings[0] as $pricing) {
            //     array_push($pricingInserts, [
            //         'price_group'       => $pricing['price_group'],
            //         'price_code'        => $pricing['price_code'],
            //         'discount_code'     => $pricing['discount_code'],
            //         'school_code'       => $pricing['school_code'],
            //         'school_stage'      => $pricing['school_stage'],
            //         'school_class'      => $pricing['school_class'],
            //         'price_value'       => $pricing['price_value'],
            //         'percentage_value'  => $pricing['percentage_value'],
            //         'description'       => $pricing['description'],
            //     ]);
            // }

            debug($data_siswa_insert);


            Data_siswa::insert($data_siswa_insert);

            // debug($pricingInserts);


            
            // // Pricing::query()->truncate();
            // Pricing::insert($pricingInserts);

            

            
            
            // $data = [
            //     'pricings' => $pricings,
            // ];
    
            // return new ViewResponse('backend.pricing.index', $data);
            return redirect()->route('admin.pricing.index');

                

    }


    public function export_excel()
	{
		return Excel::download(new SiswaExport, 'pricing.xlsx');
	}

    public function check_excel() {

        $pricings = 'ada';

        $pricings_wave2 = 12;

        $reregistration = Register::all();

        $data = [
            'pricings' => $pricings,
            'pricings_wave2' => $pricings_wave2,
            'reregistration' => $reregistration
        ];

        return new ViewResponse('backend.pricing.check_excel', $data);
    }

    public function check_excel2() {

        $pricings = 'ada';

        $pricings_wave2 = 12;

        $reregistration = Register::all();

        $data = [
            'pricings' => $pricings,
            'pricings_wave2' => $pricings_wave2,
            'reregistration' => $reregistration
        ];

        return new ViewResponse('backend.pricing.check_excel2', $data);
    }



}
