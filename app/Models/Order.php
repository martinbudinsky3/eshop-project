<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','delivery_id','transport','payment','price'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function orderItems(){
        return $this->hasMany('App\Models\OrderItem');
    }
}
