<?php

namespace App\Imports;

use App\Models\Users_system;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        return new Users_system([
            'id'                    => $row['ID'],
            'user_id'               => $row['USER_ID'],
            'uuid'                  => $row['UUID'],
            'first_name'            => $row['FIRST_NAME'],
            'last_name'             => $row['LAST_NAME'],
            'email'                 => $row['EMAIL'],
            'phone'                 => $row['PHONE'],
            'avatar_location'       => $row['AVATAR_LOCATION'],
            'avatar_type'           => $row['AVATAR_TYPE'],
            'avatar_location'       => $row['AVATAR_LOCATION'],
            'password'              => $row['PASSWORD'],
            'password_changed_at'   => $row['PASSWORD_CHANGED_AT'],
            'active'                => $row['ACTIVE'],
            'confirmation_code'     => $row['CONFIRMATION_CODE'],
            'confirmed'             => $row['CONFIRMED'],
            'timezone'              => $row['TIMEZONE'],
            'last_login_at'         => $row['LAST_LOGIN_AT'],
            'last_login_ip'         => $row['LAST_LOGIN_IP'],
            'to_be_logged_out'      => $row['TO_BE_LOGGED_OUT'],
            'status'                => $row['STATUS'],
            'created_by'            => $row['CREATED_BY'],
            'updated_by'            => $row['UPDATED_BY'],
            'is_term_accept'        => $row['IS_TERM_ACCEPT'],
            'remember_token'        => $row['REMEMBER_TOKEN'],
            'created_at'            => $row['CREATED_AT'],
            'updated_at'            => $row['UPDATED_AT'],
            'deleted_at'            => $row['DELETED_AT']
        ]);
    }
}