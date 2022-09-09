<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class StatisticsController extends Controller
{
    public function index()
    {

        return view('admin.statistics.statistics');
    }
}