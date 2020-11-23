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
        $request->session()->flush();
        $request->session()->put('cartItems',$cartItems); // retrieving the value and remove it from the array       
    }
    
    

  return  back()->with('success', 'Product deleted successfully!');
}

    // public function store($id)
    // {
    //     $product = Product::find($id);

    //     $logged = session()->get('user');

    //     // if cart is empty then this the first product
    //     if($logged){
    //         console.log("prihlaseny")
    //         $cart = $logged->cart
    //     }
    //     else{
    //         console.log("neprihlaseny")
    //         $cart = session()->get('cart');
    //     }
    //     if(!$cart) {

    //         $cart = [
    //                 $id => [
    //                     "name" => $product->name,
    //                     "quantity" => 1,
    //                     "price" => $product->price,
    //                     "photo" => $product->photo
    //                 ]
    //         ];
    //         session()->put('cart', $cart);

    //         return redirect()->back()->with('success', 'Product added to cart successfully!');
    //     }

    //     // if cart not empty then check if this product exist then increment quantity
    //     if(isset($cart[$id])) {

    //         $cart[$id]['quantity']++;

    //         session()->put('cart', $cart);

    //         return redirect()->back()->with('success', 'Product added to cart successfully!');
    //     }

    //     // if item not exist in cart then add to cart with quantity = 1
    //     $cart[$id] = [
    //         "name" => $product->name,
    //         "quantity" => 1,
    //         "price" => $product->price,
    //         "photo" => $product->photo
    //     ];

    //     session()->put('cart', $cart);

    //     return redirect()->back()->with('success', 'Product added to cart successfully!');
    // }
}
