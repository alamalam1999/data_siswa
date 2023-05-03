<?php

namespace App\Http\Controllers\Backend\Payment;

use App\Models\Faq;
use App\Models\Payment;
use App\Models\School;
use App\Models\EnumData;
use App\Models\Auth\User;
use App\Models\AcademicYear;
use App\Models\PPDB;
use App\Models\PPDBInterview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\ViewResponse;
use App\Models\RegistrationSchedule;
use Illuminate\Support\Facades\View;
use App\Repositories\Backend\PPDBRepository;
use App\Http\Responses\RedirectResponse;
use App\Http\Requests\Backend\Payment\PaymentPermissionRequest;
use Carbon\Carbon;

class PaymentController extends Controller
{
    /**
     * @var \App\Repositories\Backend\PPDBRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\PPDBRepository $ppdb
     */
    public function __construct(PPDBRepository $repository)
    {
        $this->repository = $repository;
        View::share('js', ['faqs']);
    }

    /**
     * @param \App\Http\Requests\Backend\PPDB\PPDBPermissionRequest $request
     *
     * @return ViewResponse
     */
    public function index(PaymentPermissionRequest $request)
    {
        if ($request->has('site')) {
            error_log($request->input('site'));
        }

        if ($request->has('stage')) {
            error_log($request->input('stage'));
        }

        $academic_years = AcademicYear::all();
        $registration_schedules = RegistrationSchedule::all();
        $schools = schoolAccess();
        $site_access = siteAccess();

        $data = [
            'academic_years' => $academic_years,
            'registration_schedules' => $registration_schedules,
            'schools' => $schools,
            'site_access' => $site_access,
        ];

        return new ViewResponse('backend.payment.index', $data);
    }

    /**
     * @param \App\Http\Requests\Backend\PPDB\PPDBPermissionRequest $request
     *
     * @return ViewResponse
     */
    public function getPaymentDetail($id)
    {

        $payment = Payment::where('id', $id)->first();
        $ppdb = $payment->ppdb()->first();
        $school = School::where('school_code', $ppdb->school_site)->first();
        $userDB = User::where('id', $ppdb->id_user)->first();
        $user = [
            'id'        => $userDB->id,
            "email"     => $userDB->email,
            "phone"     => $userDB->phone,
            "full_name" => $userDB->full_name,
        ];

        $payments = [];

        if ($payment->payment_type == 'FEE_FORMULIR') {
            array_push($payments, $payment);
        }

        if ($payment->payment_type == 'FEE_TOTAL') {
            $payment_details = Payment::where([
                ['ppdb_id', '=', $payment->ppdb_id],
                ['payment_type', '!=', 'FEE_FORMULIR'],
                ['payment_type', '!=', 'FEE_TOTAL'],
            ])->get();

            foreach ($payment_details as $payment_detail) {
                array_push($payments, $payment_detail);
            }
            
        }

        $data = [

            'ppdb_documentno'=> $ppdb->document_no,
            'ppdb_school'=> $school->school_name.' ('.$ppdb->stage.'-'.$ppdb->classes.')',
            'ppdb_fullname'=> $ppdb->fullname,
            'payment_id'=> $payment->id,
            'payment_payment_type'=> $payment->payment_type,
            'payment_bank_code'=> $payment->bank_code,
            'payment_account_number'=> $payment->account_number,
            'payment_bank_owner_name'=> $payment->bank_owner_name,
            'payment_image'=> $payment->image_confirmation,
            'payment_cost'=> $payment->cost,
            'payment_detail'=> $payments,
            'payment_total'=> $payment->cost,
        ];

        return $data;
    }

    /**
     * @param \App\Http\Requests\Backend\Payment\PaymentPermissionRequest $request
     *
     * @return ViewResponse
     */
    public function postApprovePayment(PaymentPermissionRequest $request)
    {
        try {
            return $this->repository->progressPayment($request);
        } catch (\Exception $e) {
            debug($e->getMessage());
            return $this->respondInternalError($e->getMessage());
        }
    }



    /**
     * @param \App\Models\Payment $payment
     * @param \App\Http\Requests\Backend\Faqs\ManagePageRequest $request
     *
     * @return ViewResponse
     */
    public function edit(Payment $Payment, PaymentPermissionRequest $request)
    {
        $schools = School::All();
        $enum_datas = EnumData::where('enum_group', 'SCHOOL_INFO')->orderBy('enum_order')->get();
        $file_uploaded = [
            ['name' => 'family_card', 'label' => 'Kartu Keluarga'],
            ['name' => 'birth_certificate', 'label' => 'Akte Kelahiran'],
            ['name' => 'last_report', 'label' => 'Raport Terakhir'],
            ['name' => 'academic_certificate', 'label' => 'Sertifikat Akademik'],
            ['name' => 'kia_book', 'label' => 'Buku KIA'],
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

        $user = User::where('id', $Payment->id_user)->first();

        return new ViewResponse('backend.Payment.edit', ['Payment' => $Payment, 'user' => $user, 'schools' => $schools, 'enum_datas' => $enum_datas, 'file_uploaded' => $file_uploaded, 'file_additional' => $file_additional, 'file_tingkat' => $file_tingkat,'file_deskripsi' => $file_deskripsi]);
    }

}
