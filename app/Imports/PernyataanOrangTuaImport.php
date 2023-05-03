<?php

namespace App\Imports;

use App\Models\EnumData;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PernyataanOrangTuaImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        return new EnumData([
            'enum_site' => $row['school_code'],
            'enum_code' => $row['stage'],
            'enum_group' => 'PERNYATAAN_ORANG_TUA',
            'enum_order' => $row['sequence'],
            'enum_value' => $row['pertanyaan'],

            // '',
            // '',
            // '',
            // '',
            // '',
            // 'enum_label',


        ]);
    }
}