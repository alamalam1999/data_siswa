<?php

namespace App\Imports;

use App\Models\Register;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReregisterImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        return new Register([
            'id'                             => $row['ID'],
            'file_additionalsatu'            => $row['FILE_ADDITIONALSATU'],
            'file_additionaldua'             => $row['FILE_ADDITIONALDUA'],
            'ppdb_id'                        => $row['PPDB_ID'],
            'medco_employee_file'            => $row['MEDCO_EMPLOYEE_FILE'],
            'created_at'                     => $row['CREATED_AT'],
            'updated_at'                     => $row['UPDATED_AT']
        ]);
    }
}