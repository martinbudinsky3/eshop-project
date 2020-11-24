<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductDesign;
use App\Models\Transport;
use App\Models\Payment;


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
                    session()->put('cartItems', []);
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

    public function delivery(Request $request)
    {
        $pay_id = $request->session()->get('pay');
        $transport_id = $request->session()->get('transport');

        if(!$transport_id) {
            session(['transport' => '1']);
            $transport_id = $request->session()->get('transport');
        }

        if(!$pay_id) {
            session(['pay' => '1']);
            $pay_id = $request->session()->get('pay');
        }

        $transport = Transport::find($transport_id);
        $payment = Payment::find($pay_id);

        $final_price = 0;

            if(Auth::check()){
                $user = Auth::user();
                $cart = $user->cart->first();
                $cartItems = $cart->cartItems;   
            } 
            else {
                $cartItems = $request->session()->get('cartItems');
            }

            $final_price = 0;

            foreach($cartItems as $item){
            $final_price = $final_price + $item->amount*$item->productDesign->product->price;
            }


        return view('templates.cart2')
        ->with('transport', $transport)
        ->with('payment', $payment)
        ->with('final_price', $final_price);
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
