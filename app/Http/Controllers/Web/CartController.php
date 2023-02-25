<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProductToCart(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'product_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);
        if (Cart::where('user_id', Auth::user()->id ?? 'None')->where('product_id', $input['product_id'])->count() > 0) {
            toastr()->error('موجود بالعربة');
            return back();
        } else {
            /*  $input['user_id'] = Auth::user()->id ?? 'None';
            $input['total'] = $input['price'] * $input['quantity'];
            $cart = Cart::create($input);
            $cart->save();
            toastr()->success('تمت الاضافة المنتج بنجاح');
            return back();*/
            $cart = Cart::create([
                'product_id' => $request->product_id,
                'user_id' => Auth::user()->id ?? 'None',
                'quantity' => $request->quantity,
                'price' => $request->price,
                'total' => $request['price'] * $request['quantity'],
            ]);
            //$cart->setTotal();
            $cart->save();
            toastr()->success('تمت الاضافة المنتج بنجاح');
            return back();
        }
    }

    public function cartProduct()
    {
        $user_id = Auth::user()->id ?? 'None';
        $products = Cart::with(['product'])->where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate('4');
        //dd($products);
        $subtotal = Cart::sum('total');
        $count_cart = Cart::where('user_id', Auth::user()->id ?? 'None')->count();
        $sum_total = Cart::where('user_id', Auth::user()->id ?? 'None')->sum('total');
        return view('landinpage.cart.cart', (['products' => $products, 'subtotal' => $subtotal, 'count_cart' => number_format($count_cart, 2), 'sum_total' => number_format($sum_total, 2)]));
        return view('landinpage.cart.cart');
    }

    public function updateProductInCart(Request $request, $id)
    {

        $input = $request->all();
        $validator = Validator::make($input, [
            'product_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);
        $cart = Cart::find($id);
        $cart->total = $cart->price * $input['quantity'];
        // dd($cart->total);
        if (!$cart) {
            toastr()->error(' غير موجود بالعربة');
            return back();
        } else {

            $cart = $cart->update($input);
            toastr()->success('تم تحديث العربة ');
            return back();
        }
    }

    public function removeProductInCart($id)
    {
        $product = Cart::where('user_id', Auth::user()->id ?? 'None')->where('product_id', $id)->first();
        if (!$product) {
            toastr()->warning('غير موجود بالعربة  ');
            return back();
        }
        $deleted = $product->delete();
        if ($deleted) {
            toastr()->error('تم الحزف بنجاح');
            return back();
        }
    }
}
