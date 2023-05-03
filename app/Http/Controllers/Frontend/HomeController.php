<?php

namespace App\Http\Controllers\Frontend;

use view;

use Carbon\Carbon;
use Jenssegers\Agent\Facades\Agent;
use App\Http\Controllers\Controller;
use App\Models\RegistrationSchedule;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    public function __construct()
    {
        $this->carbon = Carbon::now();
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $carbon = Carbon::now();
        $registration_schedules = RegistrationSchedule::whereDate('date_to', '>=', $carbon)
            ->get();

        $registration_schedule = RegistrationSchedule::whereDate('date_from', '<=', $carbon)
            ->whereDate('date_to', '>=', $carbon)
            ->first();

            if(Agent::isMobile()) {
                return view('frontend.indexphone', compact('registration_schedules', 'registration_schedule'));
            }else {
                return view('frontend.index', compact('registration_schedules', 'registration_schedule'));
            }
        
    }
}
