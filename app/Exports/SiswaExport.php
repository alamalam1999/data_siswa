<?php

namespace App\Exports;

use App\Models\Register;
use Illuminate\Contracts\View\View;
use App\Http\Responses\ViewResponse;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiswaExport implements FromView
{
    public function view(): View
    {

        $pricings = 'ada';

        $pricings_wave2 = 12;

        $reregistration = Register::all();
        
        return view('backend.pricing.check', [
            'pricings' => $pricings,
            'pricings_wave2' => $pricings_wave2,
            'reregistration' => $reregistration
            
        ]);

    }
}
