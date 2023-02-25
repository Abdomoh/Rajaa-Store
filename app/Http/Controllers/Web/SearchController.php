<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\VarLikeIdentifier;

class SearchController extends Controller
{
    public function searchProduct(Request $request) 
    {
              
        $search=$request->input('search');
        if(!$search == '') {
        $productsearch = Category::where('name','like','%' .$search .'%')->get();


        }else{
            $productsearch = Category::latest()->paginate(10);
       

        }
        $products = Product::latest()->paginate(6);
        $products_modern = Product::orderBy('created_at','desc')->paginate(3);
        $products_old = Product::orderBy('created_at','asc')->paginate(3);
        $user_id = Auth::user()->id ?? 'None';
        $subtotal = Cart::sum('total');
        $count_cart = Cart::where('user_id', Auth::user()->id ?? 'None')->count();
        $sum_total = Cart::where('user_id', Auth::user()->id ?? 'None')->sum('total'); 
        return view('landinpage.products.search',compact('products','productsearch','products_modern','products_old','count_cart','sum_total'));
    }

     
}
