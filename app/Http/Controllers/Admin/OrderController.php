<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Food;


class OrderController extends Controller
{
    public function index()
    {
        $activeUser = Auth::id();

        $orders = Food::where('user_id', $activeUser)->join('food_order', 'food.id', '=', 'food_order.food_id')
            ->join('orders', 'food_order.order_id', '=', 'orders.id')
            ->get();

        return view('admin.orderPages.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);

        return view('admin.orderPages.show', compact('order'));
    }
}
