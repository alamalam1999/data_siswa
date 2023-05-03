<?php

namespace App\Imports;

use App\Models\Pricing;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PricingImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        return new Pricing([
            'price_code'        => $row['PRICE_CODE'],
            'discount_code'     => $row['DISCOUNT_CODE'],
            'school_code'       => $row['SCHOOL_CODE'],
            'school_stage'      => $row['SCHOOL_STAGE'],
            'school_class'      => $row['SCHOOL_CLASS'],
            'price_value'       => $row['PRICE_VALUE'],
            'percentage_value'  => $row['PERCENTAGE_VALUE'],
            'description'       => $row['DESCRIPTION'],
        ]);
    }
}