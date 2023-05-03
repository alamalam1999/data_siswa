<?php

namespace App\Http\Requests\Backend\Interview;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class InterviewPermissionRequest.
 */
class InterviewPermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (
            access()->allow('interview-cnr-sd') ||
            access()->allow('interview-cnr-sma') ||
            access()->allow('interview-cnr-smp') ||
            access()->allow('interview-jgk-sd') ||
            access()->allow('interview-jgk-sma') ||
            access()->allow('interview-jgk-smp') ||
            access()->allow('interview-jgk-tk') ||
            access()->allow('interview-pml-kb') ||

            access()->allow('rnd-cnr-sd') ||
            access()->allow('rnd-cnr-sma') ||
            access()->allow('rnd-cnr-smp') ||
            access()->allow('rnd-jgk-sd') ||
            access()->allow('rnd-jgk-sma') ||
            access()->allow('rnd-jgk-smp') ||
            access()->allow('rnd-jgk-tk') ||
            access()->allow('rnd-pml-kb')
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
