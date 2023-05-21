<?php

namespace App\Imports;

use App\Models\PPDB;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PPDBImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        return new PPDB([      
            'id'                         => $row['ID'],
            'registration_schedule_id'   => $row['REGISTRATION_SCHEDULE_ID'],      
            'document_no'                => $row['DOCUMENT_NO'],
            'document_status'            => $row['DOCUMENT_STATUS'],
            'id_user'                    => $row['ID_USER'],
            'school_site'                => $row['SCHOOL_SITE'],
            'stage'                      => $row['STAGE'],
            'classes'                    => $row['CLASSES'],
            'student_status'             => $row['STUDENT_STATUS'],
            'fullname'                   => $row['FULLNAME'],
            'gender'                     => $row['GENDER'],
            'place_of_birth'             => $row['PLACE_OF_BIRTH'],
            'date_of_birth'              => $row['DATE_OF_BIRTH'],
            'religion'                   => $row['RELIGION'],
            'nationality'                => $row['NATIONALITY'],
            'address'                    => $row['ADDRESS'],
            'home_phone'                 => $row['HOME_PHONE'],
            'hand_phone'                 => $row['HAND_PHONE'],
            'school_origin'              => $row['SCHOOL_ORIGIN'],
            'family_card'                => $row['FAMILY_CARD'],
            'birth_certificate'          => $row['BIRTH_CERTIFICATE'],
            'last_report'                => $row['LAST_REPORT'],
            'academic_certificate'       => $row['ACADEMIC_CERTIFICATE'],
            'kia_book'                   => $row['KIA_BOOK'],
            'file_additional'            => $row['FILE_ADDITIONAL'],
            'medco_employee'             => $row['MEDCO_EMPLOYEE'],
            'medco_employee_file'        => $row['MEDCO_EMPLOYEE_FILE'],
            'ppdb_discount'              => $row['PPDB_DISCOUNT'],
            'studied_before'             => $row['STUDIED_BEFORE'],
            'file_additional_satu'       => $row['FILE_ADDITIONAL_SATU'],
            'file_additional_dua'        => $row['FILE_ADDITIONAL_DUA'],
            'file_additional_tiga'       => $row['FILE_ADDITIONAL_TIGA'],
            'file_additional_empat'      => $row['FILE_ADDITIONAL_EMPAT'],
            'file_additional_lima'       => $row['FILE_ADDITIONAL_LIMA'],
            'tingkat_satu'               => $row['TINGKAT_SATU'],
            'tingkat_dua'                => $row['TINGKAT_DUA'],
            'tingkat_tiga'               => $row['TINGKAT_TIGA'],
            'tingkat_empat'              => $row['TINGKAT_EMPAT'],
            'tingkat_lima'               => $row['TINGKAT_LIMA'],
            'deskripsi_satu'             => $row['DESKRIPSI_SATU'],
            'deskripsi_dua'              => $row['DESKRIPSI_DUA'],
            'deskripsi_tiga'             => $row['DESKRIPSI_TIGA'],
            'deskripsi_empat'            => $row['DESKRIPSI_EMPAT'],
            'deskripsi_lima'             => $row['DESKRIPSI_LIMA'],
            'status_siswa'               => $row['STATUS_SISWA'],
            'gaji'                       => $row['GAJI'],
            'slip_gaji_parent'           => $row['SLIP_GAJI_PARENT'],
            'updated_by'                 => $row['UPDATED_BY'],
            'created_at'                 => $row['CREATED_AT'],
            'updated_at'                 => $row['UPDATED_AT'],
            'rejected_at'                => $row['REJECTED_AT'],
            'rejected_by'                => $row['REJECTED_BY']              
        ]);
    }
}