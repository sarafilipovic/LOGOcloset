<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Auth;

class CheckoutController extends Controller
{
    public function index ()
    {
        return view('checkout');
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'address' => 'required|min:5',
            'city' => 'required|min:2',
            'state' => 'required|min:2',
            'zip' => 'required'
        ]);
        
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'total'   => Cart::subtotal(),
            'address'   => $request->input('address'),
            'city'   => $request->input('city'),
            'state'   => $request->input('state'),
            'zip'   => $request->input('zip'),
        ]);

        // Insert into order_products
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id'   => $order->id,
                'product_id' => $item->id,
                'quantity'   => $item->qty
            ]);
        }
        Cart::destroy();

        return redirect()->route('welcome')->with('success', 'Success');
    }
}
