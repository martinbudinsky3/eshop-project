<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDesign extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function color()
    {
        return $this->belongsTo('App\Models\Color');
    }
    
    public function cart_item()
    {
        return $this->hasOne('App\Models\CartItem');
    }
}
