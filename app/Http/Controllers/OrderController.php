<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Auth;

class OrderController extends Controller
{
    public function index ()
    {
        $user = User::find(Auth::user()->id);
      
        $orders = $user->orders;
        return view('order')->with('orders', $orders);
    }
}
