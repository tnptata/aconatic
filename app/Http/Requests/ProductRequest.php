<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'name' => ['required'],
            'cost' => ['required', 'integer', 'min:1'],
            'amount' => ['required', 'integer', 'min:1'],
            'detail' => ['required'],
            'type' => [Rule::in(Product::$product_types)],
        ];
    }

    public function messages() {
        return [
            'name.required' => "Please fill product name.",
            'cost.required' => "Please fill price.",
            'cost.min' => "Minimun of price is 1",
            'amount.required' => "Please fill quantity.",
            'amount.min' => "Minimun of quantity is 1",
            'detail.required' => "Please fill product detail.",
            'type.required' => "Please select product type.",
            'product_image.required' => "Please choose product photo."
        ];
    }
}
