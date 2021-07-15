<?php

namespace App\Rules;

use App\Models\ProductDesign;
use Illuminate\Contracts\Validation\Rule;

class UniqueProductDesign implements Rule
{
    private $productId;
    private $productDesignId;
    private $size;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($size, $productId, $productDesignId=null)
    {
        $this->size = $size;
        $this->productId = $productId;
        $this->productDesignId = $productDesignId;
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
        return $this->size == null ||
            !ProductDesign::where('id', '!=', $this->productDesignId)
            ->where('product_id', $this->productId)
            ->where('color_id', $value)
            ->where('size', $this->size)
            ->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Design of product must have unique combination of color and size';
    }
}
