<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDesign extends Model
{
    use HasFactory;

    public function cart_item()
    {
        return $this->hasOne('App\Models\CartItem');
    }


    function product() {
        return $this->belongsTo('App\Models\Product');
    }

    function color() {
        return $this->belongsTo('App\Models\Color');
    }
}
