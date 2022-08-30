<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('admin.orderPages.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);

        return view('admin.orderPages.show', compact('order'));
    }
}
