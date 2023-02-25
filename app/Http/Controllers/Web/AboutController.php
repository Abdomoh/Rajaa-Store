<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    public function about()
    {
        $user_id = Auth::user()->id ?? 'None';
        $subtotal = Cart::sum('total');
        $count_cart = Cart::where('user_id', Auth::user()->id ?? 'None')->count();
        $sum_total = Cart::where('user_id', Auth::user()->id ?? 'None')->sum('total');
        return view('contact', compact( 'count_cart', 'sum_total'));
       
    } 

    public function store(Request $request)
    {
        $input = $request->all();
        $validtor=Validator::make($input,[
            'name' =>'required',
            'email' =>'required',
            'subject' =>'required',
        ]);
        $about=About::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' =>$request->subject,  
        ]);
        toastr()->success('شكرا لتواصلك معنا');
        return back();
    }
}
