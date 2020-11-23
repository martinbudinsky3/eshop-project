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
            'size' => 'required',
            'color' => 'required',
            'amount' => 'required'
    ]);

    $size = $request->post('size');
    $color_id = $request->post('color');

    $design_id = ProductDesign::where('size', $size)->andWhere('color_id', $color)->andWhere('product_id', $product)->value('id');

    if(Auth::check()){
        $cart = Auth::user()->cart;
        if(!$cart) {
            $cart = Cart::create([
                'user_id' => Auth::user()->id,
            ]);
        }

        $cartItem = CartItem::create([
            'product_design_id' => $design_id,
            'amount' =>$request->amount,
            'cart_id' =>$cart->id
            ]);
    } else {
        $cartItems = session()->get('cartItems');
        if(!$cartItems) {
            session()->put('cartItems', []);
        }

        $cartItem = new CartItem([
            'product_design_id' => $design_id,
            'amount' => $request->amount,
        ]);

        session()->push('cartItems', $cartItem);
    }


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
