<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;


class ProductsController extends Controller
{
    public function index ()
    {
        $cart = Cart::content();

        return view('welcome')->with([
            'products' => Product::orderBy('id', 'desc')->get(),
            'categories' => Category::all(),
            'cart'     => $cart,
        ]);
    }

    public function getProductsByCategoryId ($id)
    {
        return view('show-products-by-category')->with([
            'categories' => Category::all(),
            'products' => Product::where('category_id', $id)->get(),
            'cart' => Cart::content(),
        ]);
    }
}
