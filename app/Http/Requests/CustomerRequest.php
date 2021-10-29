<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => ['required', 'min:1'],
            'tel' =>  ['required', 'min:9'],
            'email' => ['required', 'min:6'],
            'address' => ['required', 'min:1'],
        ];
    }

    public function messages() {
        return [
            'name.required' => "Please fill customer name.",
            'tel.required' => "Please fill phone number.",
            'email.required' => "Please fill customer email.",
            'address.required' => "Please fill address.",
            'tel.min' => "Minimun of number is 9 number",
        ];
    }
}
