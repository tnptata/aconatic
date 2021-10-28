<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClaimlistRequest extends FormRequest
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
            'damage' => ['required', 'min:2'],
            'repair_condition' => ['required', 'min:2']
        ];
    }
    public function messages(){
        return [
            'damage.required' => 'Please fill damage. ',
            'repair_condition.required' => 'Please fill repair condition.',
            'damage.min' => 'Enter damage at least 2 characters.',
            'repair_condition.min' => 'Enter repair condition at least 2 characters.'
        ];
    }
}
