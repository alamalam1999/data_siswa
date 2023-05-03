<?php

namespace App\Http\Requests\Backend\Pricing;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PPDBPermissionRequest.
 */
class PricingPermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (
            access()->allow('upload-pricing')
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
        ];
    }
}
