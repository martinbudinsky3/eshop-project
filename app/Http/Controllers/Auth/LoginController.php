<?php

namespace App\Http\Controllers\Auth;

use \Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Cart;
use App\Models\CartItem;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // if user is logging in from cart before sending order
        if ( $request->session()->has('cart') ) {
            session()->forget('cart');

            // get cart if already exists
            $cart = Cart::where('user_id', $user->id);

            // if cart already exists delete it and create new
            if($cart) {
                $cart ->delete();
            }

            $cart = Cart::create([
                'user_id' => $user->id,
            ]);

            // copy cart items from session to DB
            $cartItems = session()->get('cartItems');
            foreach($cartItems as $cartItem) {
                CartItem::create([
                    'product_design_id' => $cartItem->product_design_id,
                    'amount' => $cartItem->amount,
                    'cart_id' => $cart->id,
                ]);
            }

            // delete cart items from session
            session()->forget('cartItems');

            return redirect('/order/create');
        }

        return redirect('/');
    }
}
