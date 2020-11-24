<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductDesign;
use App\Models\Transport;
use App\Models\Payment;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Delivery;






class OrderController extends Controller
{
    
    public function create(Request $request){
      //$request->session()->flush();
        $data = [];
         if(Auth::check()){
                $logged = Auth::user();
                $cart = $logged->cart->first();
                $data = array(
                "name" => $logged->name,
                'email' => $logged->email,
                'phone' => $logged->phone,
                );
                $cartItems = $cart->cartItems;   
            } 
        else {
            $cartItems = $request->session()->get('cartItems');
        }
        
        $pay_id = $request->post('pay');
        $transport_id = $request->post('delivery');
        
        session(['transport' => $transport_id]);
        session(['payment' => $pay_id]);

        $transport = Transport::find($transport_id);
        $payment = Payment::find($pay_id);

        $payment_price = 0;
        $transport_price = 4.60;

        $items_price = 0;

        foreach($cartItems as $item){
        $items_price = $items_price + $item->amount*$item->productDesign->product->price;
        }
        
        $final_price = $items_price + $payment_price + $transport_price;

        session(['final_price' => $final_price]);


        return view('templates.cart3')
        ->with('transport', $transport)
        ->with('payment', $payment)
        ->with('payment_price', $payment_price)
        ->with('transport_price', $transport_price)
        ->with('items_price', $items_price)
        ->with('final_price', $final_price)
        ->with('data',$data);
        ;
    }

    public function store(Request $request){
 
        if(Auth::check()){
            $logged = Auth::user();
            $cart = $logged->cart->first();
            $cartItems = $cart->cartItems;   
            $cart->delete();

        } 
        else {
            $cartItems = $request->session()->get('cartItems');
        }

        $delivery = Delivery::create([
                    'user_id' => (!$logged) ? '1' : $logged->id,
                    'name' => $request->post('name'),
                    'email' =>$request->post('email'),
                    'street' =>$request->post('street'),
                    'town' => $request->post('town'),
                    'country' => $request->post('country'),
                    'house_number' => $request->post('numb'),
                    'phone_number' => $request->post('phone')
        ]);

        $order = Order::create([
                 'user_id' => (!$logged) ? '1' : $logged->id,
                 'delivery_id' => $delivery->id,
                 'transport' => $request->session()->get('transport'),
                 'payment' => $request->session()->get('payment'),
                 'price' => $request->session()->get('final_price'),
                 ]);

        foreach($cartItems as $item){
           $orderitem =  OrderItem::create([
                    'product_id' => $item->productDesign->product->id,
                    'amount' => $item->amount,
                    'order_id' => $order->id,
            ]);
        }

        session()->flush();

        return view('/');
    }
}
