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
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // get cart items of logged in user from DB
        if(Auth::check()){

            $cart = Auth::user()->cart;
            if(!$cart) {
                $cartItems = collect();
            } else {
                $cartItems = $cart->cartItems;
            }
        }

        // get cart items of guest from session
        else {
            $cartItems = collect(session()->get('cartItems'));
            if(!$cartItems) {
                $cartItems = collect();
            }
        }

        // count price of cart items
        $finalPrice = $cartItems->reduce(function ($sum, $item) {
            return $sum + $item->productDesign->product->price * $item->amount;
        });

        return view('templates.cart')
            ->with('cartItems', $cartItems)
            ->with('finalPrice', $finalPrice);
    }

    public function delivery(Request $request)
    {
        // get selected payment and transport option
        $paymentId = session()->get('payment');
        $transportId = session()->get('transport');

        // if user hasn't selected yet, select default
        if(!$transportId) {
            session(['transport' => 1]);
            $transportId = session()->get('transport');
        }

        if(!$paymentId) {
            session(['payment' => 1]);
            $paymentId = session()->get('payment');
        }

        // get records of selected transport and payment from DB
        $transport = Transport::find($transportId);
        $payment = Payment::find($paymentId);

        // get cart items of logged in user from DB
        if(Auth::check()){
            $cartItems = Auth::user()->cart->cartItems;
        }
        // get cart items of guest from session
        else {
            $cartItems = collect(session()->get('cartItems'));
        }

        // count price of order
        $finalPrice = $cartItems->reduce(function ($sum, $item) {
            return $sum + $item->productDesign->product->price * $item->amount;
        });

        $finalPrice += $transport->price + $payment->price;

        $transports = Transport::all();
        $payments = Payment::all();

        return view('templates.cart2')
            ->with('selectedTransport', $transport)
            ->with('selectedPayment', $payment)
            ->with('finalPrice', $finalPrice)
            ->with('transports', $transports)
            ->with('payments', $payments);
    }

    // login from cart
    public function login() {
        session(['cart' => TRUE]);

        return redirect()->to('/login');
    }
}
