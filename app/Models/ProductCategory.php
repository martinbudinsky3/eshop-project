<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// TODO remove
class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','product_id'];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
