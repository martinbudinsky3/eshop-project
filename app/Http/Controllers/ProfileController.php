<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\Delivery;


class ProfileController extends Controller
{
    public function orders()
    {
        $orders = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->select(
                'orders.id',
                'orders.created_at',
                'orders.transport_price',
                'orders.payment_price',
                DB::raw('sum(order_items.amount * order_items.price) AS order_items_price')
            )
            ->groupBy('orders.id')
            ->orderBy('created_at', 'desc')
            ->where('user_id', Auth::id())->get();

        foreach ($orders as $order)
            $order->created_at = Carbon::parse($order->created_at);

        return view('templates.profile.orders')
            ->with('orders', $orders);
    }

    public function info()
    {
        $user = Auth::user();
        $delivery = $user->delivery;

        return view('templates.profile.info')
            ->with('user', $user)
            ->with('delivery', $delivery);
    }
}
