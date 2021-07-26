<?php

namespace App\Rules;

use App\Models\ProductDesign;
use Illuminate\Contracts\Validation\Rule;

class ProductHasSufficientQuantity implements Rule
{
    private $size;
    private $colorId;
    private $productId;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($size, $colorId, $productId)
    {
        $this->size = $size;
        $this->colorId = $colorId;
        $this->productId = $productId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $amount = $value;
        $productDesign = ProductDesign::where('size', $this->size)
            ->where('color_id', $this->colorId)
            ->where('product_id', $this->productId)
            ->first();

        return $productDesign->quantity - $amount >= 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Requested amount of product is not currently available in stock';
    }
}
