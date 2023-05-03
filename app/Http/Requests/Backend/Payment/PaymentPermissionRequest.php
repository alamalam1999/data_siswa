<?php

namespace App\Http\Requests\Backend\Payment;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PPDBPermissionRequest.
 */
class PaymentPermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (
            access()->allow('finance-cnr-sd') ||
            access()->allow('finance-cnr-sma') ||
            access()->allow('finance-cnr-smp') ||
            access()->allow('finance-jgk-sd') ||
            access()->allow('finance-jgk-sma') ||
            access()->allow('finance-jgk-smp') ||
            access()->allow('finance-jgk-tk') ||
            access()->allow('finance-pml-kb')
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'id'        => ['required'],
            // 'action'    => ['required', 'string'],
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'id.required'       => 'Pembayaran tidak ditemukan.',
    //         'action.required'   => 'Approve / Reject harus dipilih.',

    //     ];
    // }
}
