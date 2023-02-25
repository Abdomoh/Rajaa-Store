<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostControlller extends Controller
{


    public function show($id)
    {
        $post = Post::with('user')->find($id);
        if (!$post) {
            toastr()->warning('غير موجود');
            return back();
        }
        $count_cart = Cart::where('user_id', Auth::user()->id ?? 'None')->count();
        $sum_total = Cart::where('user_id', Auth::user()->id ?? 'None')->sum('total');
        return view('landinpage.post.show', compact('post', 'count_cart', 'sum_total'));
    }
}
