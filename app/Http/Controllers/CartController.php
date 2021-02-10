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
use App\Models\CartItem;
use App\Models\User;


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
        
        // get cart items of logged in user from DB
        if(Auth::check()){

            $cart = User::with('cart')->find(Auth::user()->id)->cart;
            /*$cart = Cart::firstOrCreate([
                'user_id' => Auth::user()->id,
            ]);*/

            if(!$cart) {
                $cartItems = [];
            } else {
                $cartItems = $cart->cartItems;
            }
        } 

        // get cart items of guest from session
        else {
            $cartItems = session()->get('cartItems');
            if(!$cartItems) {
                $cartItems = [];
            }
        }

        // count price of cart items 
        $final_price = 0;

        foreach($cartItems as $item){
            $final_price = $final_price + $item->amount * $item->productDesign->product->price;
        }
            
        return view('templates.cart')
            ->with('cartItems', $cartItems)
            ->with('final_price', $final_price);
    }


    public function delivery(Request $request)
    {
        // get selected payment and transport option
        $pay_id = $request->session()->get('payment');
        $transport_id = $request->session()->get('transport');

        // if user hasn't selected yet, select default
        if(!$transport_id) {
            session(['transport' => '1']);
            $transport_id = $request->session()->get('transport');
        }

        if(!$pay_id) {
            session(['payment' => '1']);
            $pay_id = $request->session()->get('payment');
        }

        // get records of selected transport and payment from DB
        $transport = Transport::find($transport_id);
        $payment = Payment::find($pay_id);

        // get cart items of logged in user from DB
        if(Auth::check()){
            $cart = Auth::user()->cart->first();
            $cartItems = $cart->cartItems;   
        } 

        // get cart items of guest from session
        else {
            $cartItems = $request->session()->get('cartItems');
        }

        // count price of order
        $final_price = 0;

        foreach($cartItems as $item){
            $final_price = $final_price + $item->amount*$item->productDesign->product->price;
        }

        $final_price += $transport->price + $payment->price;

        $transports = Transport::all();
        $payments = Payment::all();

        return view('templates.cart2')
            ->with('transport', $transport)
            ->with('payment', $payment)
            ->with('final_price', $final_price)
            ->with('transports', $transports)
            ->with('payments', $payments);
    }


    public function update(Request $request, $id) {
        
        // get new quantity of cart item
        $new_quantity = $request->post('quantity-input');

        // find requested cart item of logged user in DB and update it
        if(Auth::check()){
            CartItem::where('id',$id)->update(['amount'=>$new_quantity]);
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


        return redirect()->action([CartController::class, 'show']);
    }

    // login from cart
    public function login() {
        session(['cart' => TRUE]);

        return redirect()->to('/login');
    }
}
