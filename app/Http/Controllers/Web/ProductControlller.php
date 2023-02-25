<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function shoping()
    {
        $product_list=Product::with('category')->latest()->paginate(24);
        $categoryies = Category::latest()->paginate(12);
        $product_count=Product::count();
        $user_id = Auth::user()->id ?? 'None';
        $subtotal = Cart::sum('total');
        $count_cart = Cart::where('user_id', Auth::user()->id ?? 'None')->count();
        $sum_total = Cart::where('user_id', Auth::user()->id ?? 'None')->sum('total');
        return view('landinpage.shoping.shoping',compact('product_list','categoryies','product_count','count_cart','sum_total'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $product=Product::with('category')->find($id);
       if (!$product) {
        toastr()->warning('غير موجود');
        return back();
    }
       $product_list=Product::with('category')->get();
       $categoryies = Category::latest()->paginate(10);
       $subtotal = Cart::sum('total');
       $count_cart = Cart::where('user_id', Auth::user()->id ?? 'None')->count();
       $sum_total = Cart::where('user_id', Auth::user()->id ?? 'None')->sum('total');
       return view('landinpage.products.show',compact('product','categoryies','product_list','count_cart','sum_total'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
