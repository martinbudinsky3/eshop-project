<?php

namespace App\Http\Controllers\Auth;

use \Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\Cart;
use App\Models\CartItem;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'between:8,255', 'confirmed'],
            'phone' => ['required', 'string', 'between:10,16'],
            'conditions-check' =>'accepted',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
        ]);
    }

    protected function registered(Request $request, $user)
    {
        // if user is registering from cart before sending order
        if ($request->session()->has('cart')) {
            session()->forget('cart');

            // create new cart in DB
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
