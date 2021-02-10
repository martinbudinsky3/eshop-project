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
        
        // validate cart item object
        $request->validate([
            'size' => 'required',
            'color' => 'required',
            'amount' => 'required'
        ]);

        // get attributes of selected product design
        $size = $request->post('size');
        $color_id = $request->post('color');
        $product_id = $request->post('product');
        
        // find product design by size, color and product_id
        $design_id = ProductDesign::where('size', '=', $size)->where('color_id', '=', $color_id)->where('product_id', '=', $product_id)->value('id');
    
        // get selected amount
        $amount = $request->post('amount');

        // save cart item in DB for logged in user
        if(Auth::check()){

            // get cart if already exists, else create one
            $cart = Cart::firstOrCreate([
                'user_id' => Auth::user()->id,
            ]);

            // create cart item and save it
            $cartItem = CartItem::create([
                'product_design_id' => $design_id,
                'amount' => $amount,
                'cart_id' => $cart->id,
            ]);
        }

        // save cart item in session for guest
        else {
            
            // get cart items from session
            $cartItems = session()->get('cartItems');

            // if guest hasn't add anything to cart yet, create cartItems array
            if(!$cartItems) {
                session()->put('cartItems', []);
            }
        
            // create cart item
            $cartItem = new CartItem([
                'product_design_id' => $design_id,
                'amount' => $amount,
            ]);
            
            // add cart item to cartItems array in session
            session()->push('cartItems', ($cartItem));
        }

        return back()->with('success', 'Product added to cart successfully!');
    }


    public function update(Request $request, $id) {
        
        // get new quantity of cart item
        $new_quantity = $request->post('quantity-input');

        // find requested cart item of logged user in DB and update it
        if(Auth::check()){
            $cartItem = CartItem::find($id);

            $this->authorize('update', $cartItem);

            $cartItem->update(['amount'=>$new_quantity]);
        } 

        // find requested cart item of guest in session and update it
        else {
            $cartItems = session()->get('cartItems');
            session()->forget('cartItems');
                        
            foreach ($cartItems as $key => &$item) {

                if ($key == $id) {
                    $cartItems[$key]['amount'] = $new_quantity;
                    break;
                }
            }

            session()->put('cartItems',$cartItems);      
        }

        return redirect('/cart');
    }


    public function destroy(Request $request, $id)
    {
        // delete cart item of logged in user from DB
        if(Auth::check()){   
  
            $cartItem = CartItem::find($id);

            $this->authorize('delete', $cartItem);

            $cartItem->delete();

            $cart = Cart::where('user_id', Auth::user()->id)->first();
            $cartItems = $cart->cartItems;

            Log::debug($cartItems);
            // if there are no cart items left delete cart
            if($cartItems->isEmpty()) {
                $cart->delete();
                //session()->forget('cartItems');
                session()->forget('payment');
                session()->forget('transport');
            }
        }

        // delete cart item of guest from session
        else {
            $cartItems = session()->get('cartItems');
            array_splice($cartItems, $item, 1);
            session()->forget('cartItems');

            // save cartItems to session only when not empty
            if($cartItems) {
                session()->put('cartItems',$cartItems);
            } 
            
            // delete payment and transport info from session
            else {
                session()->forget('payment');
                session()->forget('transport');
            } 
        }

        return back()->with('success', 'Product deleted successfully!');
    }

}
