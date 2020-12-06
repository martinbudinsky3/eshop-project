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

        $data = [];

        // get cart items and some personal info from logged user
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

        // get cart items from guest
        else {
            $cartItems = $request->session()->get('cartItems');
        }
        
        // get payment and transport from request if they are selected else default values
        $pay_id = $request->post('pay', 1);
        $transport_id = $request->post('delivery', 1);
        
        // save payment and transport to session
        session(['payment' => $pay_id]);
        session(['transport' => $transport_id]);

        // get info about selected payment and transport
        $payment = Payment::find($pay_id);
        $transport = Transport::find($transport_id);

        $payment_price = $payment->price;
        $transport_price = $transport->price;

        // count price of order
        $items_price = 0;

        foreach($cartItems as $item){
            $items_price = $items_price + $item->amount*$item->productDesign->product->price;
        }
        
        $final_price = $items_price + $payment_price + $transport_price;

        session(['final_price' => $final_price]);
        Log::debug($request->session()->get('transport'));

        return view('templates.cart3')
            ->with('payment_price', $payment_price)
            ->with('transport_price', $transport_price)
            ->with('items_price', $items_price)
            ->with('final_price', $final_price)
            ->with('data', $data);
    }

    public function store(Request $request){
 
        Log::debug($request->session()->get('transport'));

        // get cart items from logged user
        $cartItems = [];
        if(Auth::check()){
            $logged = Auth::user();
            $cart = $logged->cart->first();
            $cartItems = $cart->cartItems;   
            $cart->delete();
        } 

        // get cart items from guest
        else {
            $cartItems = $request->session()->get('cartItems');
        }

        // create delivery record
        $delivery = Delivery::create([
            'user_id' => (!Auth::check()) ? null : Auth::user()->id,
            'name' => $request->post('name'),
            'email' =>$request->post('email'),
            'street' =>$request->post('street'),
            'town' => $request->post('town'),
            'country' => $request->post('country'),
            'house_number' => $request->post('numb'),
            'phone_number' => $request->post('phone')
        ]);
        
        // create order
        $order = Order::create([
            'user_id' =>(!Auth::check()) ? null : Auth::user()->id,
            'delivery_id' => $delivery->id,
            'transport_id' => $request->session()->get('transport'),
            'payment_id' => $request->session()->get('payment'),
            'price' => $request->session()->get('final_price'),
        ]);

        // create all cart items
        foreach($cartItems as $item){
           $orderitem =  OrderItem::create([
                'product_id' => $item->productDesign->product->id,
                'amount' => $item->amount,
                'order_id' => $order->id,
            ]);
        }

        // delete cart items, payment and delivery info from session
        session()->forget('cartItems');
        session()->forget('payment');
        session()->forget('transport');
        
        return redirect('/');
    }
}
