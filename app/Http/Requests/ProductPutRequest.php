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
            'brand' => 'required|exists:brands,id',
            'category' => 'required|exists:categories,id',
            'material' => 'required|string|max:255',
            'images' => 'nullable|array',
            'images.*' => 'mimes:jpg',
            'deleted_images' => ['nullable', 'array', new ImagesNotEmpty($this->images,
                $this->route('product'))],
            'deleted_images.*.id' => 'required|exists:images,id',
            'deleted_images.*.path' => 'required|string' // TODO dont send in request
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
            'images.*.mimes' => 'The images must be a file of type .jpg.'
        ];
    }
}
