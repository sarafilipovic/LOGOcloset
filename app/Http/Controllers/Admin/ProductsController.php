<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index')->with('products', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.add')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required',
            'description' => 'required',
            'price'       => 'required|numeric',
            'size'        => 'required',
            'category'    => 'required',
            'image'       => 'required|image|mimes:png,jpg'
        ]);
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move('storage/', $imageName);

        $product = new Product();
        $product->name        = $request->input('name');
        $product->description = $request->input('description');
        $product->price       = $request->input('price');
        $product->category_id = $request->input('category');
        $product->size        = $request->input('size');
        $product->img         = $imageName;

        if ($product->save()) {
            return redirect()->route('admin.products.index')->with('success', 'You have successfully added a product');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.products.edit')->with([
            'product' =>  Product::find($id),
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'        => 'required',
            'description' => 'required',
            'price'       => 'required|numeric',
            'size'        => 'required',
            'category'    => 'required',
            'image'       => 'required|image|mimes:png,jpg'
        ]);

        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move('storage/', $imageName);

        $product = Product::findOrFail($id);
        $product->name        = $request->input('name');
        $product->description = $request->input('description');
        $product->price       = $request->input('price');
        $product->category_id = $request->input('category');
        $product->size        = $request->input('size');
        $product->img         = $imageName;

        if ($product->save()) {
            return redirect()->route('admin.products.index')->with('success', 'You have successfully updated a product');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->delete()) {   
            return redirect()->route('admin.products.index')->with('success', 'You have successfully deleted a product');
        } 
        
    }
}
