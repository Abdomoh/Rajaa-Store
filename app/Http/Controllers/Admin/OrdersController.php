<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatusOrder($id)
    {
        $order = Order::find($id);
        if ($order->status_id == 1) {
            $order->status_id = 2;
        } else {
            $order->status_id = 1;
        }

        $order->update([$order]);
        session::flash('updateStatusOrder', ' تم  تغير حالة الطلب بنجاح');
        return back();
    }


    public function showOrder($id)
    {
        $order = Order::with('status', 'user', 'orderProducts')->find($id);
        //return $order;
        $subtotal = $order->sum('total');
        return view('admin.orders.show', (['order' => $order, 'subtotal' => number_format($subtotal, 2)]));
    }

    public function changeStatusPiadOrder($id)
    {
        $order = Order::find($id);
        if ($order->paid_id == 1) {
            $order->paid_id = 2;
        } else {
            $order->paid_id = 1;
        }
        $order->update([$order]);
        session::flash('changeStatusPiadOrder','تم تغير حالة الدفع بنجاح');
        return back();
       
    }
}
