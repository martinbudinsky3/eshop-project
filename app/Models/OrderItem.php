<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    
    protected $fillable = ['order_id','amount','product_design_id', 'price'];

    
    public function productDesign()
    {
        return $this->belongsTo('App\Models\ProductDesign');
    }
    
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

}
