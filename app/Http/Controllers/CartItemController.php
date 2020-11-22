<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Color;
use App\Models\ProductDesign;


class CartItemController extends Controller
{
    //
    public function store(Request $request, $product)
    {

    $request->validate([
            'size_selector' => 'required',
            'color_selector' => 'required',
            'amount' => 'required'
    ]);

    $logged = session()->get('user');

    if($logged){
        $cart = $logged->cart;
    }
    else{
        $cart = session()->get('cart');
    }
    

    $size = $request->post("size_selector");

    $color_name = $request->post("color_selector");

    $color = Color::where('name',$color_name)->value('id');

    $design_id = ProductDesign::where('size',$size)->value('id');


    $CartItem = CartItem::create([
                                  'product_id' => $product,
                                  'product_design_id' => $design_id,// $request->product_design_id,
                                  'amount' =>$request->amount,
                                  'cart_id' =>$cart->id
                                  ]);

    return redirect()->back()->with('success', 'Product added to cart successfully!');

}
public function destroy(Request $request,$item)
{
    $cartItem = CartItem::find($item);

    $cartItem->delete();    

    return  redirect()->back()->with('success', 'Product deleted successfully!');
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
