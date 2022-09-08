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
<<<<<<< HEAD
        $orders = Order::whereHas('foods', function ($query) {
            $query->where('user_id', auth()->id());
        })
            ->with('foods')
            ->orderby('id', 'desc')
=======
        $activeUser = Auth::id();

        $orders = Order::join('food_order', 'food_order.order_id', '=', 'orders.id')
            ->join('food', 'food.id', '=', 'food_order.food_id')
            ->where('user_id', $activeUser)
            ->select('orders.*')
            ->orderBy('order_id')
>>>>>>> 59dd4428e5f09ee09a956fbffd924ae5c0adf660
            ->get();

        return view('admin.orderPages.index', compact('orders'));
    }


    public function show($id)
    {
        $order = Order::find($id);

        /*  $foods = Food::whereHas('orders', function ($query) {
            $query->whereIn('user_id', $order_id);
        })
            ->with('orders')
            ->orderby('id', 'desc')
            ->get(); */

        return view('admin.orderPages.show', compact('order'));
    }
}