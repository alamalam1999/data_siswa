<?php

namespace App\Http\Controllers\Backend\Payment;

use DB;
use Carbon\Carbon;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\FaqsRepository;



class PaymentTableController extends Controller
{
    /**
     * @var \App\Repositories\Backend\FaqsRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\FaqsRepository $faqs
     */
    public function __construct(FaqsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \App\Http\Requests\Backend\Faqs\ManageFaqsRequest $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $Payment = Payment::where('id', '>=', 0);

        $Payment = $Payment->orderBy('created_at', 'desc')->get();

        $search_general = $request->get('search_general');
        $search_status = $request->get('search_status');
        $academic_year = $request->get('academic_year');
        $registration_schedule = $request->get('registration_schedule');
        $school                = $request->get('school');
        $stage                 = $request->get('stage');
        $tipe_pembayaran       = $request->get('tipe_pembayaran');
        $diskon                = $request->get('diskon');
        $status_siswa          = $request->get('status_siswa');

        debug($search_status);

        $innerCondition = [];
        $whereCondition = [];

        // BUILD CRITERIA
        array_push($whereCondition, 'academic_years.id = '.$academic_year);

        if ($registration_schedule != 'ALL') {
            array_push($whereCondition, 'registration_schedules.id = '.$registration_schedule);
        }


        if ($school != 'ALL') {
            array_push($whereCondition, "schools.school_code = '".$school."'");
        } else {
            $schools = schoolAccess();
            $schoolCodes = [];
            foreach ($schools as $item) {
                array_push($schoolCodes, $item->school_code);
            }
            array_push($whereCondition, "schools.school_code IN ('".implode("','", $schoolCodes)."')");
        }

        if ($stage != 'ALL') {
            array_push($whereCondition, "ppdb.stage = '".$stage."'");
        } else {
            $stages = siteAccess();
            $stageCodes = [];
            foreach ($stages as $item) {
                if ($item->enum_site = $school && $item->enum_code == 'STAGE') {
                    array_push($stageCodes, $item->enum_value);
                }
            }
            array_push($whereCondition, "ppdb.stage IN ('".implode("','", $stageCodes)."')");
        }

        if ($diskon != '' && !empty($diskon)) {
            if($diskon == 'all check') {
                array_push($whereCondition, "ppdb.medco_employee != ''");
                array_push($whereCondition, "ppdb.medco_employee_file != ''");
            } else if($diskon == 'Sudah Validasi') {
                array_push($whereCondition, "ppdb.ppdb_discount != ''");
            } else if($diskon == 'Belum Validasi') {
                //array_push($whereCondition, "ppdb.ppdb_discount = ''");
                array_push($whereCondition, "(ppdb.ppdb_discount is null or ppdb.ppdb_discount = '')");
                array_push($whereCondition, "ppdb.medco_employee != ''");   
                array_push($whereCondition, "ppdb.medco_employee_file != ''");   
            }
        }

        if($tipe_pembayaran != '' && !empty($tipe_pembayaran) ) {
            if ($tipe_pembayaran == 'formulir') {
                array_push($whereCondition, "payment.payment_type = 'FEE_FORMULIR'");
            } else if($tipe_pembayaran == 'updanspp'){
                array_push($whereCondition, "payment.payment_type != 'FEE_FORMULIR'");
            }
        }

        if($status_siswa != '' && !empty($status_siswa)) {
            if ($status_siswa == 'siswa dalam') {
                array_push($whereCondition, "ppdb.status_siswa = 'siswa dalam'");
            } else if ($status_siswa == 'siswa luar') {
                array_push($whereCondition, "ppdb.status_siswa = 'siswa luar'");
            }
        }

        if (!empty($search_general) && $search_general != '') {
            array_push($whereCondition, "(ppdb.document_no LIKE '%".$search_general."%' OR ppdb.fullname LIKE '%".$search_general."%')");
        }

        if ($search_status != null && $search_status>=0) {
            array_push($whereCondition, "payment.confirmation_status = ".$search_status);
        }

        $SQLQuery = "SELECT
            registration_schedules.description AS schedule,
            schools.school_name AS school,
            ppdb.id AS ppdb_id,
            ppdb.document_no,
            ppdb.fullname,
            ppdb.stage,
            ppdb.classes,
            ppdb.status_siswa,
            ppdb.medco_employee_file,
            ppdb.ppdb_discount,
            ppdb.id,
            payment.id AS payment_id,
            payment.payment_type,
            payment.confirmation_status,
            payment.date_send
        FROM ppdb
        INNER JOIN payment ON ppdb.id = payment.ppdb_id AND payment.payment_type IN ('FEE_FORMULIR', 'FEE_TOTAL')
        INNER JOIN schools ON ppdb.school_site = schools.school_code
        INNER JOIN registration_schedules ON ppdb.registration_schedule_id = registration_schedules.id
        INNER JOIN academic_years ON registration_schedules.academic_year_id = academic_years.id
        ".implode(' ', $innerCondition)."
        WHERE         
        ".implode(' AND ', $whereCondition).' 
        ORDER BY payment.created_at DESC';

        debug($SQLQuery);

        // $SQLQuery = "SELECT
        //     registration_schedules.description AS schedule_name,
        //     schools.school_name AS school,
        //     Payment.*
        // FROM Payment
        // INNER JOIN registration_schedules ON Payment.registration_schedule_id = registration_schedules.id
        // INNER JOIN schools ON Payment.school_site = schools.school_code";

        $payments = DB::select($SQLQuery);

        return Datatables::of($payments)
            // ->editColumn('schedule', function ($PaymentItem) {
            //     return $PaymentItem->schedule->description;
            // })
            // ->editColumn('school', function ($PaymentItem) {
            //     return $PaymentItem->school->school_name;
            // })
            // ->editColumn('created_at', function ($paymentItem) {
            //     return Carbon::parse($paymentItem->created_at)->toDateString();
            // })
            ->editColumn('date_send', function ($paymentItem) {
                return Carbon::parse($paymentItem->date_send)->toDateString();
            })
            // ->addColumn('actions', function ($PaymentItem) {
            //     return $PaymentItem->action_buttons;
            // })
            ->make(true);
    }


}
