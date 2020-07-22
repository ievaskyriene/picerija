<?php

namespace App\Http\Controllers;

use App\Product;
use App\Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->title = $request->product_title;
        $product->price = $request->product_price;
        $product->sale = $request->product_sale;
        $product->descrip = $request->product_description;
        $product->save();

        foreach ($request->file('photo') as $key => $image) {
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $photo = new Image;
            $photo->image_name = $name;
            $photo->nr = $key;
            $photo->alt = $request->alt;
            $photo->product_id = $product->id;
            $photo->save();
        }
       
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->title = $request->product_title;
        $product->price = $request->product_price;
        $product->sale = $request->product_sale;
        $product->descrip = $request->product_description;
        $product->save();

        // foreach ($request->file('photo') as $key => $image) {
        //     $name = $image->getClientOriginalName();
        //     $destinationPath = public_path('/images');
        //     $image->move($destinationPath, $name);
        //     $photo = new Image;
        //     $photo->image_name = $name;
        //     $photo->nr = $key;
        //     $photo->alt = $request->alt;
        //     $photo->product_id = $product->id;
        //     $photo->save();
        // }
       
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
