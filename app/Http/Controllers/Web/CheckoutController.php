<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Statu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function checkout()
    {

        $products = Cart::with(['product'])->where('user_id', Auth::user()->id ?? '')->orderBy('created_at', 'desc')->paginate('4');
        $subtotal = Cart::sum('total');
        $count_cart = Cart::where('user_id', Auth::user()->id ?? 'None')->count();
        $sum_total = Cart::where('user_id', Auth::user()->id ?? 'None')->sum('total');
        return view('landinpage.checkout.checkout', compact('products', 'count_cart', 'sum_total', 'subtotal'));
    }

    public function placeOrder(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'paid_way' => 'required',
        ]);

        if ($validator->fails()) {
            $message = implode("\n", $validator->errors()->all());

            return back()->withErrors($message)->withInput();
        }

        $products = Cart::where('user_id', Auth::user()->id ?? '')->get();
        if ($products->count() > 0) {

            $order_uniq = Order::orderBy('id', 'desc')->pluck('id')->first();
            if ($order_uniq == null or $order_uniq == "") {
                $order_uniq = 1;
            } else {
                $order_uniq = $order_uniq + 1;
            }

            $order = new Order();
            $order->order_no = 'ORD' . $order_uniq;
            $order->user_id = Auth::user()->id ?? '';
            $order->paid_way = $request->paid_way;
            if ($request->file('image')) {
                $image_name = md5($order->id . "app" . $order->id . rand(1, 1000));

                $image_ext = $request->file('image')->getClientOriginalExtension(); // example: png, jpg ... etc

                $image_full_name = $image_name . '.' . $image_ext;

                $uploads_folder =  getcwd() . '/uploads/';

                if (!file_exists($uploads_folder)) {
                    mkdir($uploads_folder, 0777, true);
                }
                $request->file('image')->move($uploads_folder, $image_name  . '.' . $image_ext);
                $order->image = $image_full_name;
            }
            $order->save();


            $products = Cart::where('user_id', Auth::user()->id ?? '')->get();
            foreach ($products as $itme) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $itme['product_id'],
                    'quantity' => $itme['quantity'],
                    'price' => $itme['price'],
                ]);
            }
            $orderProduct = OrderProduct::where('order_id', $order->id)
                ->select(OrderProduct::raw('sum(quantity * price) as total'))->first();
            $order->total = $orderProduct->total;
            $order->save();
            if (Auth::user()->adress == null) {
                $user = User::where('id', Auth::user()->id ?? '')->first();
                $user->name = $request->name;
                $user->last_name = $request->last_name;
                $user->phone = $request->phone;
                $user->countriy = $request->countriy;
                $user->adress = $request->adress;
                $user->city = $request->city;
                $user->state = $request->state;
                $user->update();
            }
            toastr()->success('تمت الاضافة  بنجاح');
            return back();
        } else {
            toastr()->warning('العربة فارغة لايمكن اكمال الطلب');
            return back()->withInput();
        }
    }
    
}
