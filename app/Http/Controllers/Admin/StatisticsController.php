<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Order;



class StatisticsController extends Controller
{
    public function index(){
        return view('admin.statistics.statistics');

    }


    public function files()
    {
        //  $orders = Order::whereMonth('created_at', $i)
        //   ->whereHas('foods', function ($query) {
        //       $query->where('user_id', auth()->id());
        //  })
        //       ->with('foods')
        //       ->orderby('id', 'desc')
        //       ->get();
        // $ordersCount = count($orders)->groupBy()

        $user = Auth::user();

        $TotalOrderForMonths = [];
        $totalSellForMonths = [];

        for($i = 1; $i <= 12; $i++) {

            $orders = Order::whereMonth('created_at', $i)
            ->whereHas('foods', function ($query) {
                $query->where('user_id', auth()->id());
           })
                ->with('foods')
                ->orderby('id', 'desc')
                ->get();
        //   $ordersCount = count($orders)->groupBy();

            $totalOrder = $orders->count();

            $sum = 0;

            foreach($orders as $order) {

                $sum += $order->total_price;
            }

            array_push($TotalOrderForMonths, $totalOrder);
            array_push($totalSellForMonths, number_format($sum, 2, '.', ''));

        }

        // return response()->json([
        //     'totalOrdersForMonths' => $TotalOrderForMonths,
        //     'totalSellForMonths' => $totalSellForMonths,
        //     'success' => true
        // ]);
        return  response()->json([
            'totalOrdersForMonths' => $TotalOrderForMonths,
            'totalSellForMonths' => $totalSellForMonths,
            'success' => true
        ]);
    }
}
