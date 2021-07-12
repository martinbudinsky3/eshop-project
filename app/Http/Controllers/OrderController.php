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
    public function show(Order $order)
    {
        $orderItems = $order->orderItems;

        $productsPrice = $orderItems->reduce(function ($sum, $item) {
            return $sum + $item->price * $item->amount;
        });

        $transport = $order->transport;
        $payment = $order->payment;

        return view('templates.profile.order')
                ->with('order', $order)
                ->with('orderItems', $orderItems)
                ->with('finalPrice', $productsPrice + $order->transport_price + $order->payment_price)
                ->with('transport', $transport)
                ->with('payment', $payment);
    }

    public function create(Request $request)
    {
        $delivery = null;

        // get cart items from logged user
        if(Auth::check()){
            $logged = Auth::user();
            $cart = $logged->cart->first();
            $cartItems = $cart->cartItems;
            $delivery = $logged->delivery;
        }

        // get cart items from guest
        else {
            $cartItems = $request->session()->get('cartItems');
        }

        // get payment from request if parameter exists
        if($request->has('pay')) {
            $pay_id = $request->get('pay');
            session(['payment' => $pay_id]);
        }

        // if payment hasn't been selected yet set it to default value
        else if(!$request->session()->has('payment')) {
            session(['payment' => 1]);
        }

        // get transport from request if parameter exists
        if($request->has('delivery')) {
            $transport_id = $request->get('delivery');
            session(['transport' => $transport_id]);
        }

        // if transport hasn't been selected yet set it to default value
        else if(!$request->session()->has('transport')) {
            session(['transport' => 1]);
        }

        // get final transport and payment
        $pay_id = session()->get('payment');
        $transport_id = session()->get('transport');

        // get info about selected payment and transport
        $payment = Payment::find($pay_id);
        $transport = Transport::find($transport_id);

        $payment_price = $payment->price;
        $transport_price = $transport->price;

        // count price of order
        $items_price = 0;

        foreach($cartItems as $item){
            $items_price = $items_price + $item->amount * $item->productDesign->product->price;
        }

        $final_price = $items_price + $payment_price + $transport_price;

        return view('templates.cart3')
            ->with('payment_price', $payment_price)
            ->with('transport_price', $transport_price)
            ->with('items_price', $items_price)
            ->with('final_price', $final_price)
            ->with('delivery', $delivery);
    }


    public function store(Request $request)
    {
        // TODO test transaction

        // validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'street' => 'required|string|max:255',
            'town' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'numb' => 'required|string|max:15',
            'phone' => 'required|string|max:255',
            'zip' => 'required|string|max:15',
        ]);

        DB::transaction(function() use ($request) {
            // get cart items from logged user
            if(Auth::check()){
                $cart = Auth::user()->cart;
                $cartItems = $cart->cartItems;
                $cart->delete();
            }

            // get cart items from guest
            else {
                $cartItems = $request->session()->get('cartItems');
            }

            // create delivery record
            $delivery = Delivery::create([
                'name' => $request->post('name'),
                'email' =>$request->post('email'),
                'street' =>$request->post('street'),
                'town' => $request->post('town'),
                'country' => $request->post('country'),
                'house_number' => $request->post('numb'),
                'phone_number' => $request->post('phone'),
                'zip' => $request->post('zip')
            ]);

            $transport = Transport::find(session()->get('transport', 1));
            $payment = Payment::find(session()->get('payment', 1));

            // create order
            $order = Order::create([
                'user_id' =>(Auth::check()) ? Auth::id() : null,
                'delivery_id' => $delivery->id,
                'transport_id' => $transport->id,
                'payment_id' => $payment->id,
                'transport_price' => $transport->price,
                'payment_price' => $payment->price,
            ]);

            // create order items
            foreach($cartItems as $item) {
                OrderItem::create([
                    'product_design_id' => $item->productDesign->id,
                    'amount' => $item->amount,
                    'order_id' => $order->id,
                    'price' => $item->productDesign->product->price
                ]);
            }
        });

        // delete cart items, payment and transport info from session
        session()->forget('cartItems');
        session()->forget('payment');
        session()->forget('transport');

        session()->flash('success', 'Objednávka bola zaznamenaná.');

        return redirect('/profile/orders');
    }
}
