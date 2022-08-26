<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = config('orders');

        foreach ($orders as $order) {
            $new_order = new Order();
            $new_order->name = $order['name'];
            $new_order->email = $order['email'];
            $new_order->address = $order['address'];
            $new_order->phone = $order['phone'];
            $new_order->total_price = $order['total_price'];
            $new_order->status_payment = $order['status_payment'];

            $new_order->save();

        };

    }
}
