<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function store (Request $request)
    {
        $product = Product::findOrFail($request->input('product_id'));
        Cart::add(
            $product->id,
            $product->name,
            $request->input('quantity'),
            $product->price,
        );

        return redirect()->route('welcome')->with('success', 'Success');
    }

    public function remove (Request $request)
    {
        $product = Product::findOrFail($request->input('product_id'));
        $rows  = Cart::content();
        $rowId = $rows->where('id', $product->id)->first()->rowId;
     
        Cart::remove($rowId);
        return redirect()->route('welcome');//->with('success', 'Success');
    }

    public function show ()
    {
        $carts = Cart::content();
        return view('cart', compact('carts'));
    }
}
