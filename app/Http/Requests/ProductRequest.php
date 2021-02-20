<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'brand_id' => 'required',
            'material' => 'required|max:255',
            'product_designs' => 'required|array',
            'product_designs.*.color' => 'required|array',
            'product_designs.*.size' => 'required',
            'product_designs.*.quantity' => 'required'
        ];
    }
}
