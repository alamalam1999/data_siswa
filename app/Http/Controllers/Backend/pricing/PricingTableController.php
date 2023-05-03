<?php

namespace App\Http\Controllers\Backend\Pricing;

use DB;
use Carbon\Carbon;
use App\Models\Pricing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;



class PricingTableController extends Controller
{


    /**
     * @param \App\Http\Requests\Backend\Faqs\ManageFaqsRequest $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $Pricing = Pricing::where('id', '>=', 0);

        $Pricing = $Pricing->orderBy('created_at', 'desc')->get();

        $search_general = $request->get('search_general');
        $search_status = $request->get('search_status');
        $academic_year = $request->get('academic_year');
        $registration_schedule = $request->get('registration_schedule');
        $school = $request->get('school');
        $stage = $request->get('stage');

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

        
        if (!empty($search_general) && $search_general != '') {
            array_push($whereCondition, "(ppdb.document_no LIKE '%".$search_general."%' OR ppdb.fullname LIKE '%".$search_general."%')");
        }

        if ($search_status != null && $search_status>=0) {
            array_push($whereCondition, "Pricing.confirmation_status = ".$search_status);
        }

        $SQLQuery = "SELECT
            registration_schedules.description AS schedule,
            schools.school_name AS school,
            ppdb.id AS ppdb_id,
            ppdb.document_no,
            ppdb.fullname,
            ppdb.stage,
            ppdb.classes,
            Pricing.id AS Pricing_id,
            Pricing.Pricing_type,
            Pricing.confirmation_status,
            Pricing.date_send
        FROM ppdb
        INNER JOIN Pricing ON ppdb.id = Pricing.ppdb_id AND Pricing.Pricing_type IN ('FEE_FORMULIR', 'FEE_TOTAL')
        INNER JOIN schools ON ppdb.school_site = schools.school_code
        INNER JOIN registration_schedules ON ppdb.registration_schedule_id = registration_schedules.id
        INNER JOIN academic_years ON registration_schedules.academic_year_id = academic_years.id
        ".implode(' ', $innerCondition)."
        WHERE         
        ".implode(' AND ', $whereCondition).' 
        ORDER BY Pricing.created_at DESC';

        debug($SQLQuery);

        // $SQLQuery = "SELECT
        //     registration_schedules.description AS schedule_name,
        //     schools.school_name AS school,
        //     Pricing.*
        // FROM Pricing
        // INNER JOIN registration_schedules ON Pricing.registration_schedule_id = registration_schedules.id
        // INNER JOIN schools ON Pricing.school_site = schools.school_code";

        $Pricings = DB::select($SQLQuery);

        return Datatables::of($Pricings)
            // ->editColumn('schedule', function ($PricingItem) {
            //     return $PricingItem->schedule->description;
            // })
            // ->editColumn('school', function ($PricingItem) {
            //     return $PricingItem->school->school_name;
            // })
            // ->editColumn('created_at', function ($PricingItem) {
            //     return Carbon::parse($PricingItem->created_at)->toDateString();
            // })
            ->editColumn('date_send', function ($PricingItem) {
                return Carbon::parse($PricingItem->date_send)->toDateString();
            })
            // ->addColumn('actions', function ($PricingItem) {
            //     return $PricingItem->action_buttons;
            // })
            ->make(true);
    }


}
