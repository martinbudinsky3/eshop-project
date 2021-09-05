<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    function productDesigns() {
        return $this->hasMany('App\Models\ProductDesign');
    }

    function products() {
        return $this->belongsToMany('App\Models\Product', 'product_designs', 'color_id', 'product_id');
    }
}
