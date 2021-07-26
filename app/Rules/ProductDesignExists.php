<?php

namespace App\Rules;

use App\Models\ProductDesign;
use Illuminate\Contracts\Validation\Rule;

class ProductDesignExists implements Rule
{
    private $size;
    private $colorId;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($size, $colorId)
    {
        $this->size = $size;
        $this->colorId = $colorId;
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
        $productId = $value;
        return ProductDesign::where('size', $this->size)
            ->where('color_id', $this->colorId)
            ->where('product_id', $productId)
            ->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Zadaný variant produktu neexistuje';
    }
}
