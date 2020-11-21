<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    use HasFactory;
    
    public function products_categories(){
        return $this->hasMany('App\Models\ProductCategory');
    }

    public function product_designs(){
        return $this->hasMany('App\Models\ProductDesign');
    }
    public function images(){
        return $this->hasMany('App\Models\Image');
    }
    public function brand(){
        return $this->belongsTo('App\Models\Brand');

    }
}
