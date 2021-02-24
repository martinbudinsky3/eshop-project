<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductPutRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'brand_id' => 'required|integer',
            'material' => 'required|string|max:255',
            'product_designs' => 'required|array',
            'product_designs.*.color' => 'required|integer',
            'product_designs.*.size' => 'required|string',
            'product_designs.*.quantity' => 'required|integer',
            'images' => 'array',
            'images.*' => 'mimes:jpg',
            'deleted_designs' => 'array',
            'deleted_designs.*.id' => 'required|integer',
            'deleted_images' => 'array',
            'deleted_images.*.id' => 'required|integer'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = array();
        foreach ($validator->errors()->toArray() as $key => $value) {
            array_set($errors, $key, $value);
        }

        throw new HttpResponseException(response()->json(['errors' => $errors], 422));
    }
}
