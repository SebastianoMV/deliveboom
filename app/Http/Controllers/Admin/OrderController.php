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