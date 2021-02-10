<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CartItem;
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

    public function delete(User $user, CartItem $cartItem) {
        return $user->cart->id === $cartItem->cart->id;
    }
}
