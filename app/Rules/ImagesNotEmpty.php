<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Image;
use Illuminate\Support\Facades\Log;

class ImagesNotEmpty implements Rule
{
    protected $newImages;
    protected $productId;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($newImages, $productId)
    {
        $this->newImages = $newImages;
        $this->productId = $productId;
    }
    
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $deletedImages)
    {
        Log::debug('test');
        $images = Image::where('product_id', $this->productId)->get();
        if(is_null($this->newImages) && !is_null($deletedImages) && sizeof($deletedImages) >= sizeof($images)) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Product must have at least 1 image';
    }
}
