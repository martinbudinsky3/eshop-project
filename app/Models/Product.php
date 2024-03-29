<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['name', 'price', 'material', 'brand_id','description'];

    public function cartItems() {
        return $this->hasMany('App\Models\CartItem');
    }

    function categories() {
        return $this->belongsToMany('App\Models\Category', 'product_categories', 'product_id', 'category_id');
    }

    function images() {
        return $this->hasMany('App\Models\Image');
    }

    function productDesigns() {
        return $this->hasMany('App\Models\ProductDesign');
    }

    function brand() {
        return $this->belongsTo('App\Models\Brand');
    }

    function colors() {
        return $this->belongsToMany('App\Models\Color', 'product_designs', 'product_id', 'color_id');
    }
    function orders() {
        return $this->hasMany('App\Models\Order');
    }
}
