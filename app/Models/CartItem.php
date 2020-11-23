<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['cart_id','amount','product_design_id'];

    
    public function productDesign()
    {
        return $this->belongsTo('App\Models\ProductDesign');
    }
    
    public function cart()
    {
        return $this->belongsTo('App\Models\Cart');
    }
    



}


