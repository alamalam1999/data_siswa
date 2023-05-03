<?php

namespace App\Http\Controllers\frontend\school;

use App\Models\PPDB;
use App\Models\Pricing;
use App\Models\EnumData;
use Illuminate\Http\Request;
use App\Models\ConfirmationPayment;
use Jenssegers\Agent\Facades\Agent;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\RedirectResponse;
use App\Repositories\Backend\PPDBRepository;


use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\Frontend\School\PPDBAdministrationRequest;

class PaymentController extends Controller
{
    use RegistersUsers;

    /**
     * @var \App\Repositories\Backend\PPDBRepository
     */
    protected $ppdbRepository;

    /**
     * @param \App\Repositories\Backend\PPDBRepository $faq
     */
    public function __construct(PPDBRepository $ppdbRepository)
    {
        $this->ppdbRepository = $ppdbRepository;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function formulir($id)
    {
        $user = auth()->user();
        $banks = EnumData::where('enum_group', 'BANK')->orderBy('enum_order')->get();

        $ppdb = PPDB::where([
            ['id',      '=', $id],
            ['id_user', '=', $user->id],
        ])->first();

        $school_location = "";

        if ($ppdb->school_site == "JGK") {
            $school_location = [
                'BCA a.n Yay. Pendidikan Avicenna P',
                '5855037006',
                'Formulir TK  : Rp.200.000',
                'Formulir SD  : Rp.300.000',
                'Formulir SMP : Rp.300.000',
                'Formulir SMA : Rp.300.000',
            ];
        } else if ($ppdb->school_site == "CNR") {
            $school_location = [
                'BCA a.n Yay. Pendidikan Avicenna P',
                '5855038380',
                'Formulir SD : Rp.300.000',
                'Formulir SMP : Rp.300.000',
                'Formulir SMA : Rp.300.000',
            ];
        } else {
            $school_location = [
                'BSI a.n    Yayasan Pendidikan Avicenna Prestasi',
                '7074393815',
                'Formulir KB : Rp.200.000',
            ];
        }

        if (empty($ppdb)) throw new GeneralException('PPDB not found');
        debug(json_encode($ppdb)); 

        if(Agent::isMobile()) {
            return new ViewResponse('frontend.payment.formulirphone', ['user' => $user, 'banks' => $banks, 'ppdb' => $ppdb, 'school_location' => $school_location]);
        }else {
            return new ViewResponse('frontend.payment.formulir', ['user' => $user, 'banks' => $banks, 'ppdb' => $ppdb, 'school_location' => $school_location]);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function formulirPost(PPDB $ppdb, Request $request)
    {
        $this->ppdbRepository->uploadFormulir($ppdb, $request);
        return new RedirectResponse(route('frontend.user.dashboard'), ['flash_success' => ' The payment formulir was successfully upload.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function administration($id)
    {
        $user = auth()->user();
        $banks = EnumData::where('enum_group', 'BANK')->orderBy('enum_order')->get();

        $ppdb = PPDB::where([
            ['id',      '=', $id],
            ['id_user', '=', $user->id],
        ])->first();

        if (empty($ppdb)) throw new GeneralException('PPDB not found');

        $pricings = Pricing::where([
            ['price_group',      '=', 'BASE_PRICE'],
            ['school_code',      '=', $ppdb->school_site],
            ['school_stage',     '=', $ppdb->stage],
            ['school_class',     '=', $ppdb->classes],
        ])->get();

        $items = [];
        foreach ($pricings as $pricing) {
            $items[$pricing->price_code] = [
                'PRICE_BASE'    => $pricing->price_value,
                'PRICE_TOTAL'   => $pricing->price_value,
                'DESCRIPTION'   => $pricing->description,
                'DISCOUNT'      => []
            ];
        }

        $discounts = Pricing::where([
            ['price_group',      '=', 'DISCOUNT'],
            ['school_code',      '=', $ppdb->school_site],
            ['school_stage',     '=', $ppdb->stage],
            ['school_class',     '=', $ppdb->classes],
        ])->get();

        foreach ($discounts as $discount) {

            if($ppdb->status_siswa == "Siswa Dalam" && $discount->discount_code == "SISWA_DALAM"){
                if($discount->price_value > 0){
                    $items[$discount->price_code]['DISCOUNT'][$discount->discount_code]['PRICE']        = $discount->price_value;
                    $items[$discount->price_code]['DISCOUNT'][$discount->discount_code]['DESCRIPTION']  = $discount->description;
                    $items[$discount->price_code]['PRICE_TOTAL'] = $items[$discount->price_code]['PRICE_TOTAL'] - $discount->price_value;
                }

                if($discount->percentage_value > 0){
                    $price = ($items[$discount->price_code]['PRICE_TOTAL'] * $discount->percentage_value)/100;
                    $items[$discount->price_code]['DISCOUNT'][$discount->discount_code]['PRICE']        = $price;
                    $items[$discount->price_code]['DISCOUNT'][$discount->discount_code]['DESCRIPTION']  = $discount->description;
                    $items[$discount->price_code]['PRICE_TOTAL'] = $items[$discount->price_code]['PRICE_TOTAL'] - $price;
                }
            }


            if($ppdb->ppdb_discount == $discount->discount_code){
                if($discount->price_value > 0){
                    $items[$discount->price_code]['DISCOUNT'][$discount->discount_code]['PRICE']        = $discount->price_value;
                    $items[$discount->price_code]['DISCOUNT'][$discount->discount_code]['DESCRIPTION']  = $discount->description;
                    $items[$discount->price_code]['PRICE_TOTAL'] = $items[$discount->price_code]['PRICE_TOTAL'] - $discount->price_value;
                }

                if($discount->percentage_value > 0){
                    $price = ($items[$discount->price_code]['PRICE_TOTAL'] * $discount->percentage_value)/100;
                    $items[$discount->price_code]['DISCOUNT'][$discount->discount_code]['PRICE']        = $price;
                    $items[$discount->price_code]['DISCOUNT'][$discount->discount_code]['DESCRIPTION']  = $discount->description;
                    $items[$discount->price_code]['PRICE_TOTAL'] = $items[$discount->price_code]['PRICE_TOTAL'] - $price;
                }
            }

        }


        debug($items);


        $fee_spp = EnumData::where([
            ['enum_group',      '=', 'FEE_SPP'],
            ['enum_site',      '=', $ppdb->school_site],
            ['enum_code',      '=', $ppdb->stage]
        ])->first();

        $fee_spp_12 = EnumData::where([
            ['enum_group',      '=', 'FEE_SPP_12'],
            ['enum_site',      '=', $ppdb->school_site],
            ['enum_code',      '=', $ppdb->stage]
        ])->first();

        $fee_up = EnumData::where([
            ['enum_group',      '=', 'FEE_UP'],
            ['enum_site',      '=', $ppdb->school_site],
            ['enum_code',      '=', $ppdb->stage]
        ])->first();

        $fee_up_lunas = EnumData::where([
            ['enum_group',      '=', 'FEE_UP_LUNAS'],
            ['enum_site',      '=', $ppdb->school_site],
            ['enum_code',      '=', $ppdb->stage]
        ])->first();

        $school_location = "";

        if ($ppdb->school_site == "JGK") {
            $school_location = [
                'BCA a.n Yay. Pendidikan Avicenna P',
                '5855037006',
                'Formulir TK  : Rp.200.000',
                'Formulir SD  : Rp.300.000',
                'Formulir SMP : Rp.300.000',
                'Formulir SMA : Rp.300.000',
            ];
        } else if ($ppdb->school_site == "CNR") {
            $school_location = [
                'BCA a.n Yay. Pendidikan Avicenna P',
                '5855038380',
                'Formulir SD : Rp.300.000',
                'Formulir SMP : Rp.300.000',
                'Formulir SMA : Rp.300.000',
            ];
        } else {
            $school_location = [
                'BSI a.n    Yayasan Pendidikan Avicenna Prestasi',
                '7074393815',
                'Formulir KB : Rp.200.000',
            ];
        }

        $check_status_siswa = $ppdb->status_siswa;
        $check_medco = $ppdb->ppdb_discount;

        if($check_status_siswa == 'Siswa Dalam') {
            $up_lunas = 'UP_SISWA_DALAM_LUNAS';
            $up_cicilan = 'UP_SISWA_DALAM_CICILAN';

        } else {
            $up_lunas = 'UP_NORMAL_LUNAS';
            $up_cicilan =  'UP_NORMAL_CICILAN';
        }

        $registration_wave = '';

        if ($ppdb->registration_schedule_id == 5) {
            $registration_wave = "gelombang 1";
        } else if ($ppdb->registration_schedule_id == 6){
            $registration_wave = "gelombang 2";
        }


        $spp_normal_12bulan =  Pricing::where([
            'school_code' => $ppdb->school_site,
            'school_stage' => $ppdb->stage,
            'school_class'  => $ppdb->classes,
            'discount_code' => 'SPP_NORMAL_12BULAN',
            'price_group'   => $registration_wave
        ])->get();

        if($spp_normal_12bulan[0]->discount_code == 'SPP_NORMAL_12BULAN') {
            $spp_normal_12bulan[0]->price_value = $spp_normal_12bulan[0]->price_value * 11;
        }

        $spp_normal =  Pricing::where([
            'school_code'   => $ppdb->school_site,
            'school_stage'  => $ppdb->stage,
            'school_class'  => $ppdb->classes,
            'price_group'   => $registration_wave,
            'discount_code' => 'SPP_NORMAL'
        ])->get();

     
            if($check_medco == 'BPS' || $check_medco == 'GURU_KARYAWAN' || $check_medco == 'TKIA-19 & SDIA-15') {
                $spp_normal_12bulan[0]->price_value = $spp_normal_12bulan[0]->price_value - (($spp_normal_12bulan[0]->price_value * 50 )/100);
                $spp_normal[0]->price_value = $spp_normal[0]->price_value - (($spp_normal[0]->price_value * 50 )/100);
            } if($check_medco == 'STAFF') {
                $spp_normal_12bulan[0]->price_value = $spp_normal_12bulan[0]->price_value - (($spp_normal_12bulan[0]->price_value * 20 )/100);
                $spp_normal[0]->price_value = $spp_normal[0]->price_value - (($spp_normal[0]->price_value * 20 )/100);
            } else if($check_medco == 'MANAGER') {
                $spp_normal_12bulan[0]->price_value = $spp_normal_12bulan[0]->price_value - (($spp_normal_12bulan[0]->price_value * 10 )/100);
                $spp_normal[0]->price_value = $spp_normal[0]->price_value - (($spp_normal[0]->price_value * 10 )/100);
            } else if($check_medco == 'SUPERVISOR') {
                $spp_normal_12bulan[0]->price_value = $spp_normal_12bulan[0]->price_value - (($spp_normal_12bulan[0]->price_value * 15 )/100);
                $spp_normal[0]->price_value = $spp_normal[0]->price_value - (($spp_normal[0]->price_value * 15 )/100);
            } else if($check_medco == 'DIREKSI') {
                $spp_normal_12bulan[0]->price_value = $spp_normal_12bulan[0]->price_value - 0;
                $spp_normal[0]->price_value = $spp_normal[0]->price_value - 0;
            }
        
        
        $up_normal_lunas =  Pricing::where([
            'school_code' => $ppdb->school_site,
            'school_stage' => $ppdb->stage,
            'school_class'  => $ppdb->classes,
            'discount_code' => $up_lunas,
            'price_group'   => $registration_wave
        ])->get();


        if($up_normal_lunas[0]->discount_code == 'UP_NORMAL_LUNAS') {
            $up_normal_lunas[0]->price_value = $up_normal_lunas[0]->price_value - 500000;
        }

        if($up_normal_lunas[0]->discount_code == 'UP_SISWA_DALAM_LUNAS') {
            $up_normal_lunas[0]->price_value = $up_normal_lunas[0]->price_value - 500000;
        }


        $up_normal_cicilan =  Pricing::where([
            'school_code' => $ppdb->school_site,
            'school_stage' => $ppdb->stage,
            'school_class'  => $ppdb->classes,
            'discount_code' => $up_cicilan,
            'price_group'   => $registration_wave
        ])->get();

        if($up_normal_cicilan[0]->discount_code == 'UP_NORMAL_CICILAN') {
            $up_normal_cicilan[0]->price_value = ($up_normal_cicilan[0]->price_value * 60) / 100;
        }

        if($up_normal_cicilan[0]->discount_code == 'UP_SISWA_DALAM_CICILAN') {
            $up_normal_cicilan[0]->price_value = ($up_normal_cicilan[0]->price_value * 60) / 100;
        }

        if ($check_status_siswa == 'Siswa Dalam' && $ppdb->school_site != 'PML' && ($ppdb->stage != 'TK' && $ppdb->stage != 'KB')) {
            if($check_medco == 'BPS' || $check_medco == 'GURU_KARYAWAN' || $check_medco == 'TKIA-19 & SDIA-15') {
                $up_normal_lunas[0]->price_value = ($up_normal_lunas[0]->price_value - (($up_normal_lunas[0]->price_value * 50 )/100));
                $up_normal_cicilan[0]->price_value = ($up_normal_cicilan[0]->price_value - (($up_normal_cicilan[0]->price_value * 50 )/100));
            } if($check_medco == 'STAFF') {
                $up_normal_lunas[0]->price_value = ($up_normal_lunas[0]->price_value - (($up_normal_lunas[0]->price_value * 20 )/100));
                $up_normal_cicilan[0]->price_value = ($up_normal_cicilan[0]->price_value - (($up_normal_cicilan[0]->price_value * 20 )/100)) ;
            } else if($check_medco == 'MANAGER') {
                $up_normal_lunas[0]->price_value = ($up_normal_lunas[0]->price_value - (($up_normal_lunas[0]->price_value * 10 )/100));
                $up_normal_cicilan[0]->price_value = ($up_normal_cicilan[0]->price_value - (($up_normal_cicilan[0]->price_value * 10 )/100)) ;
            } else if($check_medco == 'SUPERVISOR') {
                $up_normal_lunas[0]->price_value = ($up_normal_lunas[0]->price_value - (($up_normal_lunas[0]->price_value * 15 )/100)) ;
                $up_normal_cicilan[0]->price_value = ($up_normal_cicilan[0]->price_value - (($up_normal_cicilan[0]->price_value * 15 )/100)) ;
            } else if($check_medco == 'DIREKSI') {
                $up_normal_lunas[0]->price_value = ($up_normal_lunas[0]->price_value - (($up_normal_lunas[0]->price_value * 5 )/100)) ;
                $up_normal_cicilan[0]->price_value = ($up_normal_cicilan[0]->price_value - (($up_normal_cicilan[0]->price_value * 5 )/100)) ;
            }else if($check_medco == ''){
                $up_normal_cicilan[0]->price_value;
            }
        }

        if ($check_status_siswa == 'Siswa Luar') {
            if($check_medco == 'BPS' || $check_medco == 'GURU_KARYAWAN' || $check_medco == 'TKIA-19 & SDIA-15') {
                $up_normal_lunas[0]->price_value = $up_normal_lunas[0]->price_value - (($up_normal_lunas[0]->price_value * 50 )/100);
                $up_normal_cicilan[0]->price_value = $up_normal_cicilan[0]->price_value - (($up_normal_cicilan[0]->price_value * 50 )/100);
            } if($check_medco == 'STAFF') {
                $up_normal_lunas[0]->price_value = $up_normal_lunas[0]->price_value - (($up_normal_lunas[0]->price_value * 20 )/100);
                $up_normal_cicilan[0]->price_value = $up_normal_cicilan[0]->price_value - (($up_normal_cicilan[0]->price_value * 20 )/100);
            } else if($check_medco == 'MANAGER') {
                $up_normal_lunas[0]->price_value = $up_normal_lunas[0]->price_value - (($up_normal_lunas[0]->price_value * 10 )/100);
                $up_normal_cicilan[0]->price_value = $up_normal_cicilan[0]->price_value - (($up_normal_cicilan[0]->price_value * 10 )/100);
            } else if($check_medco == 'SUPERVISOR') {
                $up_normal_lunas[0]->price_value = $up_normal_lunas[0]->price_value - (($up_normal_lunas[0]->price_value * 15 )/100);
                $up_normal_cicilan[0]->price_value = $up_normal_cicilan[0]->price_value - (($up_normal_cicilan[0]->price_value * 15 )/100);
            } else if($check_medco == 'DIREKSI') {
                $up_normal_lunas[0]->price_value = $up_normal_lunas[0]->price_value - (($up_normal_lunas[0]->price_value * 5 )/100);
                $up_normal_cicilan[0]->price_value = $up_normal_cicilan[0]->price_value - (($up_normal_cicilan[0]->price_value * 5 )/100);
            }
        }

        debug(json_encode($ppdb));

        if(Agent::isMobile()) {
            return new ViewResponse(
                'frontend.payment.administrationphone',
                [
                    'user' => $user,
                    'banks' => $banks,
                    'items' => $items,
                    'ppdb' => $ppdb,
                    'fee_spp' => $fee_spp,
                    'fee_spp_12' => $fee_spp_12,
                    'fee_up' => $fee_up,
                    'fee_up_lunas' => $fee_up_lunas,
                    'school_location' => $school_location,
                    'spp_normal_12bulan' => $spp_normal_12bulan,
                    'spp_normal'  => $spp_normal,
                    'up_normal_lunas' => $up_normal_lunas,
                    'up_normal_cicilan' => $up_normal_cicilan,
                    'check_medco' => $check_medco,
                    'registration_wave' => $registration_wave
                ]
                 ); 
        }else {
        return new ViewResponse(
                'frontend.payment.administration',
                [
                    'user' => $user,
                    'banks' => $banks,
                    'items' => $items,
                    'ppdb' => $ppdb,
                    'fee_spp' => $fee_spp,
                    'fee_spp_12' => $fee_spp_12,
                    'fee_up' => $fee_up,
                    'fee_up_lunas' => $fee_up_lunas,
                    'school_location' => $school_location,
                    'spp_normal_12bulan' => $spp_normal_12bulan,
                    'spp_normal'  => $spp_normal,
                    'up_normal_lunas' => $up_normal_lunas,
                    'up_normal_cicilan' => $up_normal_cicilan,
                    'check_medco' => $check_medco,
                    'registration_wave' => $registration_wave
                ]
                 );
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function administrationPost(PPDBAdministrationRequest $request)
    {
        $this->ppdbRepository->administrationPayment($request);
        return new RedirectResponse(route('frontend.user.dashboard'), ['flash_success' => ' The Payment Administration was successfully upload.']);
    }
}
