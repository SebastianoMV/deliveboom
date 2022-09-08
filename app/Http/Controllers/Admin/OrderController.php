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
        $orders = Order::whereHas('foods', function ($query) {
            $query->where('user_id', auth()->id());
        })
            ->with('foods')
            ->orderby('id', 'desc')
            ->get();

        return view('admin.orderPages.index', compact('orders'));
    }


    public function show($id)
    {

        $culo = $id;
        $order = Order::find($id);

        $foods = Food::join('food_order','food.id', '=', 'food_order.food_id')->where('order_id', $id)->get();

        return view('admin.orderPages.show', compact('order', 'foods'));
    }
}
