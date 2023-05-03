<?php

namespace App\Http\Requests\Frontend\School;

use Illuminate\Foundation\Http\FormRequest;
use App\Helpers\Auth\SocialiteHelper;
use Illuminate\Validation\Rule;

class PPDBAdministrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fee_up_type'   => ['required', 'string'],
            'fee_up_amount' => ['required', 'integer'],
            'fee_spp_type'  => ['required', 'string'],
            'fee_spp_amount'    => ['required', 'integer'],
            'fee_total'     => ['required', 'integer'],

            'bank_code'     => ['required', 'string'],
            'bank_owner_name'   => ['required', 'string'],
            'account_number'    => ['required', 'string'],
            'cost'          => ['required', 'integer'],
            'photo'         => ['required', 'mimes:jpeg,png,jpg,gif,xls,xlsx,pdf', 'max:2048'],
            'medco_employee' => ['','integer'],
            'medco_employee_file_input' => ['', 'mimes:jpeg,png,jpg,gif,xls,xlsx,pdf', 'max:2048']
        ];
    }


    /**
     * Show the Messages for rules above.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'fee_up_type.required' => 'Tipe Uang Pangkal dibutuhkan.',
            'fee_up_amount.required' => 'Uang pangkal harus dipilih.',
            'fee_spp_type.required' => 'Tipe SPP Pangkal dibutuhkan.',
            'fee_spp_amount.required' => 'Uang SPP harus dipilih.',
            'fee_total.required' => 'Total Biaya Administrasi belum ada.',

            'bank_code.required' => 'Pilihan Bank dibutuhkan.',
            'bank_owner_name.required' => 'Nama Pengirim dibutuhkan.',
            'account_number.required' => 'Nomor Rekening dibutuhkan.',
            'cost.required' => 'Nominal yang ditransfer dibutuhkan.',
            'photo.required' => 'Bukti Pembayaran dibutuhkan.',

        ];
    }
}
