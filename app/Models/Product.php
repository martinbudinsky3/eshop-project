<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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
}
