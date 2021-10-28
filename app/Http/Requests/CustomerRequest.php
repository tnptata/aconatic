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
            'add_money' => ['required', 'integer', 'min:1']
        ];
    }

    public function messages()
    {
        return [
            'add_money.required' => 'You have to input the money.',
            'add_money.min' => 'You have to input the money more than zero.'
        ];
    }
}
