<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;


class CartItemPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function delete(?User $user, CartItem $cartItem) {
        Log::debug($cartItem);

        //return optional($user)->cart->id === $cartItem->cart->id;
        return true;
    }
}
