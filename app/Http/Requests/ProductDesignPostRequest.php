<?php

namespace App\Http\Requests;

use App\Rules\UniqueProductDesign;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class ProductDesignPostRequest extends FormRequest
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
            'quantity' => 'required|integer|min:0',
            'size' => 'required|string|max:31',
            'color' => [
                'required',
                'exists:colors,id',
                new UniqueProductDesign($this->size, $this->product->id)
            ]
        ];
    }
}
