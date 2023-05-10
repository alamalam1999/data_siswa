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
use App\Imports\DataImport;
use App\Models\MasterKelas;

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

            $data_siswa = [];      
            
            $data_siswa = Excel::toArray(new DataImport, $request->file('file_pricing'));

            var_dump($data_siswa);  //cek data sudah masuk

            $data_siswa_insert = [];

            foreach ($data_siswa[0] as $datasiswa) {
                array_push($data_siswa_insert, [
                        'no_formulir'               => $datasiswa['no_formulir'],           
                        'ppdb_id'                   => "manual",
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

        $reregistration = Register::all();

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



}
