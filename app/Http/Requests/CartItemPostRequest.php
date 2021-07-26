<?php

namespace App\Http\Requests;

use App\Rules\ProductDesignExists;
use App\Rules\ProductHasSufficientQuantity;
use Illuminate\Foundation\Http\FormRequest;

class CartItemPostRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

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
            'size' => 'required',
            'color' => 'required',
            'product' => new ProductDesignExists($this->size, $this->color),
            'amount' => [
                'required',
                'integer',
                'min:1',
                new ProductHasSufficientQuantity($this->size, $this->color, $this->product)
            ]
        ];
    }
}
