<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ProductDesign extends Model
{
    use HasFactory;

    function product() {
        return $this->belongsTo('App\Models\Product');
    }

    function color() {
        return $this->belongsTo('App\Models\Color');
    }
}
