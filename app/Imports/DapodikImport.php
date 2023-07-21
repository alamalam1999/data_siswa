<?php

namespace App\Imports;

use App\Models\Dapodik;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMappedCells;

class DapodikImport implements ToModel, WithMappedCells
{
    use Importable;

    public function mapping(): array
    {
        return [
            'No'                => 'A6',
            'Nama'              => 'B6',
            'NIPD'              => 'C6',
            'JK'                => 'D6',
            'NISN'              => 'E6',
            'Tempat Lahir'      => 'D6', 
            'Tanggal Lahir'     => 'F6',
            'NIK'               => 'G6',
            'Agama'             => 'H6',   
            'Alamat'            => 'I6',
            'RT'                => 'J6',
            'RW'                => 'K6',
            'Dusun'             => 'L6',
            'Kelurahan'         => 'M6',
            'Kecamatan'         => 'N6'
        ];
    }
    
    public function model(array $row)
    {
        return new Dapodik([
            'no'                => $row['No'],
            'nama'              => $row['Nama'],
            'nipd'              => $row['Nipd'],
            'jk'                => $row['JK'],
            'nisn'              => $row['NISN'],
            'tempat_lahir'      => $row['Tempat Lahir'], 
            'tanggal_lahir'     => $row['Tanggal Lahir'],
            'nik'               => $row['NIK'],
            'agama'             => $row['Agama'],   
            'alamat'            => $row['Alamat'],
            'rt'                => $row['RT'],
            'rw'                => $row['RW'],
            'dusun'             => $row['Dusun'],
            'kelurahan'         => $row['Kelurahan'],
            'kecamatan'         => $row['Kecamatan']
        ]);
    }
    
}