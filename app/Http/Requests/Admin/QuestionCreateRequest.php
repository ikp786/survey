<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class QuestionCreateRequest extends FormRequest
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
            'question'              => 'required',
            'type'                  => 'required|In:basic,advance',
            'select_option_type'    => 'required|In:dropdown,input,number,radio',
            'option'                => 'required_if:select_option_type,dropdown,radio|array',
        ];
    }
}
