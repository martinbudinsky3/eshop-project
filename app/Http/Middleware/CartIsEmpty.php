<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class CartIsEmpty
{
    /**
     * Check if user has empty cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && !Auth::user()->cart || !Auth::check() && !session()->get('cartItems')) {
            return redirect('cart');
        }

        return $next($request);
    }
}
