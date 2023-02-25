<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {


        $date = Carbon::now();
        $new = date('m', strtotime('month', strtotime($date)));
        $categoryies = Category::count();
        $products = Product::count();
        $orders=Order::count();
        $approved_order=Order::where('status_id', 1 )->count();
        $wetting_order=Order::where('status_id', 2 )->count();
        $cash_order=Order::where('paid_way', 0 )->count();
        $total_order_daily=Order::where('created_at', now())->sum('total');
        $total_order_monthly=Order::where('created_at',$new )->sum('total');
        return view('dashboard', compact('categoryies', 'products','orders','approved_order','wetting_order','cash_order','total_order_daily','total_order_monthly'));
    }

    public function accessDenid()
    {
        return view('access-denid');
    }
}
