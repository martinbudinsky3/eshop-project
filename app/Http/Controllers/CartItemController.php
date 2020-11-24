<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Color;
use App\Models\ProductDesign;
use App\Models\Cart;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class CartItemController extends Controller
{
    
    public function store(Request $request)
    {

        $request->validate([
                'size' => 'required',
                'color' => 'required',
                'amount' => 'required'
        ]);

    $size = $request->post('size');
    $color_id = $request->post('color');
    $product_id = $request->post('product');
    
    $design_id = ProductDesign::where('size', '=', $size)->where('color_id', '=', $color_id)->where('product_id', '=', $product_id)->value('id');
   
    if(Auth::check()){

        Cart::firstOrCreate([
            'user_id' => Auth::user()->id,
        ]);

        $cartItem = CartItem::create([
            'product_design_id' => $design_id,
            'amount' =>$request->amount,
            'cart_id' => Auth::user()->cart()->first()->id,
            ]);
    }

     else {

        $cartItems = session()->get('cartItems');
        if(!$cartItems) {
            session()->put('cartItems', []);
        }
      

        $cartItem = new CartItem([
            'product_design_id' => $design_id,
            'amount' => $request->amount,
        ]);
        
        session()->push('cartItems', ($cartItem));
    }

    return back()->with('success', 'Product added to cart successfully!');

}
public function destroy(Request $request,$item)
{
     
    if(Auth::check()){        
        $cartItem = CartItem::find($item);
        $cartItem->delete(); 
    }

    else {
        $cartItems = session()->get('cartItems');
        array_splice($cartItems, $item, 1);
        session()->flush();
        session()->put('cartItems',$cartItems); // retrieving the value and remove it from the array       
    }

  return  back()->with('success', 'Product deleted successfully!');
}
}
