<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductDesign;

class CartController extends Controller
{
    
    //
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show(Request $request)
    {
     //  $request->session()->flush();

         if(Auth::check()){

                $cart = Cart::firstOrCreate([
                    'user_id' => Auth::user()->id,
                ]);

                $cartItems = $cart->cartItems;   
            } 
        else {
            $cartItems = $request->session()->get('cartItems');
            if(!$cartItems) {
                    $request->session()->put('cartItems', []);
                    $cartItems = $request->session()->get('cartItems');
                }
            }
        $final_price = 0;

        foreach($cartItems as $item){
         $final_price = $final_price + $item->amount*$item->productDesign->product->price;
        }
            
        return view('templates.cart')
            ->with('cartItems', $cartItems)
            ->with('final_price', $final_price);
    }
            /**
             * Store a newly created resource in storage.
             *
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
        

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
