<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $subtotal = Cart::sum('total');
        $count_cart = Cart::where('user_id', Auth::user()->id ?? 'None')->count();
        $sum_total = Cart::where('user_id', Auth::user()->id ?? 'None')->sum('total');
        $orders=Order::with('status')->where
        ('user_id', Auth::user()->id ?? 'None')->orderBy('created_at')->get();
        //dd($orders->status->id);
        return view('landinpage.order.index',compact('subtotal','sum_total','count_cart','orders'));
    }

    public function show($id)
    {
        $order=Order::with('status')->where
        ('user_id', Auth::user()->id ?? 'None')->find($id);
        
        if (!$order) {
            toastr()->warning('غير موجود');
            return back();
        }
        $subtotal = Cart::sum('total');
        $count_cart = Cart::where('user_id', Auth::user()->id ?? 'None')->count();
        $sum_total = Cart::where('user_id', Auth::user()->id ?? 'None')->sum('total');
       
        return view('landinpage.order.show',compact('subtotal','sum_total','count_cart','order'));
    }
}
