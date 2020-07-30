<?php

namespace App\Http\Controllers;

use App\Product;
use App\Image;
use App\Category;
use App\ProductCategory;
use App\Tag;
use App\ProductTag;
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
        $categories = Category::all();
        return view('admin.product.index', ['products' => $products], ['categories' => $categories]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $categories = Category::all();
        $tags = Tag::all();
        // $productCategories = ProductCategory::all();
        return view('admin.product.create')->withCategories($categories)->withTags($tags);
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
        
        $categories = $request->categories;
       
        foreach ($categories as $category){
            $productCategory = new ProductCategory;
            $productCategory->product_id = $product->id;
            $productCategory->category_id = $category;
            $productCategory->save();
        }

        $tags = $request->tags;
    
        // foreach ($request->tags as $tag) {
        //     dd($tag->id);
        //     $productTag = new ProductTag;
           
        //     $productTag->product_id = $product->id;
        //     $productTag->tag_id = $tag->id;
        //     $productTag->save();
        // }

        foreach ($tags as $tag){
        
            $productTag = new ProductTag;
            $productTag->product_id = $product->id;
            $productTag->tag_id = $tag;
            $productTag->save();
        }

        return redirect()->route('product.index')->withTags($tags);
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
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.product.edit', compact('product', 'categories', 'tags'));
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
        // $product->title = $request->product_title;
        // $product->price = $request->product_price;
        // $product->sale = $request->product_sale;
        // $product->descrip = $request->product_description;
        // $product->save();

        // // foreach ($request->file('photo') as $key => $image) {
        // //     $name = $image->getClientOriginalName();
        // //     $destinationPath = public_path('/images');
        // //     $image->move($destinationPath, $name);
        // //     $photo = new Image;
        // //     $photo->image_name = $name;
        // //     $photo->nr = $key;
        // //     $photo->alt = $request->alt;
        // //     $photo->product_id = $product->id;
        // //     $photo->save();
        // // }
       
        // return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
   

        foreach ($product->getImages as $photo)
            {
            $photo->delete();
            }

        foreach ($product->getCategory as $productCat)
        {
            $productCat->delete();
        }

        foreach ($product->getTag as $productTag)
        {
            $productTag->delete();
        }

        $product->delete();
      
        return redirect()->route('product.index');
    }
}
