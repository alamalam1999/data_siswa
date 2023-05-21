<?php

namespace App\Imports;

use App\Models\Payment;
use App\Models\Pricing;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PaymentImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        return new Payment([
            'no'                    => $row['NO'],
            'id'                    => $row['ID'],
            'ppdb_id'               => $row['PPDB_ID'],
            'payment_type'          => $row['PAYMENT_TYPE'],
            'payment_code'          => $row['PAYMENT_CODE'],
            'confirmation_status'   => $row['CONFIRMATION_STATUS'],
            'date_send'             => $row['DATE_SEND'],
            'bank_owner_name'       => $row['BANK_OWNER_NAME'],
            'bank_code'             => $row['BANK_CODE'],
            'account_number'        => $row['ACCOUNT_NUMBER'],
            'cost'                  => $row['COST'],
            'image_confirmation'    => $row['IMAGE_CONFIRMATION'],
            'created_at'            => $row['CREATED_AT'],
            'updated_at'            => $row['UPDATED_AT'],
            'updated_at'            => $row['UPDATED_AT']       
        ]);
    }
}