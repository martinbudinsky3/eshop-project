<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ImagesNotEmpty;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

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
            'brand' => 'required|integer',
            'category' => 'required|integer',
            'material' => 'required|string|max:255',
            'product_designs' => 'required|array',
            'product_designs.id' => 'nullable|exists:product_designs',
            'product_designs.*.color' => 'required|integer',
            'product_designs.*.size' => 'required|string',
            'product_designs.*.quantity' => 'required|integer',
            'images' => 'nullable|array',
            'images.*' => 'mimes:jpg',
            'deleted_designs' => ['nullable', 'array'],
            'deleted_designs.*.id' => 'required|exists:product_designs',
            'deleted_images' => ['nullable', 'array', new ImagesNotEmpty($this->images, 
                $this->route('product'))],
            'deleted_images.*.id' => 'required|exists:images',
            'deleted_images.*.path' => 'required|string'
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

    public function messages()
    {
        return [
            'product_designs.required' => 'Product must have at least 1 design.',
            'product_designs.*.color.required' => 'The color field is required.',
            'product_designs.*.size.required' => 'The size field is required.',
            'product_designs.*.quantity.required' => 'The quantity field is required.',
            'images.*.mimes' => 'The images must be a file of type .jpg.'
        ];
    }
}
