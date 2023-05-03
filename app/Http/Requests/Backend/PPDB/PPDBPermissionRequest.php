<?php

namespace App\Http\Requests\Backend\PPDB;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PPDBPermissionRequest.
 */
class PPDBPermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (
            access()->allow('ppdb-cnr-sd') ||
            access()->allow('ppdb-cnr-sma') ||
            access()->allow('ppdb-cnr-smp') ||
            access()->allow('ppdb-jgk-sd') ||
            access()->allow('ppdb-jgk-sma') ||
            access()->allow('ppdb-jgk-smp') ||
            access()->allow('ppdb-jgk-tk') ||
            access()->allow('ppdb-pml-kb')
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }
}
