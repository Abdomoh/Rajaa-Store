<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class ClientController extends Controller
{
    public function index()
    {
        $clients = User::latest()->get();
        return view('admin.clients.index', compact('clients'));
    }
    public function show($id)
    {
        $client = User::with('orders')->find($id);

        $subtotal = Order::where('user_id',$id)->sum('total');
       
      


        return view('admin.clients.show', compact('client', 'subtotal'));
    }
}
