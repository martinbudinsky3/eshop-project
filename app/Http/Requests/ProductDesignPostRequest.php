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
        Log::debug($this);
        return [
            'quantity' => 'required|integer|min:0',
            'size' => 'required|string|max:255',
            'color' => [
                'required',
                'integer',
                'exists:colors,id',
                new UniqueProductDesign($this->size, $this->product->id)
            ]
        ];
    }
}
