<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    public function product_design()
    {
        return $this->belongsTo('App\Models\ProductDesign');
    }

    public function cart()
    {
        return $this->belongsTo('App\Models\Cart');
    }
}


