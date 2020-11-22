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
    public function productDesign()
    {
        return $this->belongsTo('App\Models\ProductDesign');
    }
    
    public function cart()
    {
        return $this->belongsTo('App\Models\Cart');
    }
    protected $fillable = ['cart_id','product_id','amount','product_design_id'];

    



}


