<?php

namespace App\Http\Controllers;
use Session;
use App\Product;
use Illuminate\Http\Request;



class FrontController extends Controller
{
    public function home()
    {
        
        // print_r(Session::get('cart'));

        $cart = Session::get('cart');

        $count = 0;
        $total = 0;
        $cartProducts = [];
        foreach ($cart as $key => $value) {
        
            $count += $value['count'];
            $total += $value['price'];
            $cartProducts[$key] = Product::where('id', $value['id'])->first();
        }


        $products = Product::all();
        return view('front.home', compact('products', 'count', 'total', 'cartProducts', 'cart'));
        // return view('front.home', ['products'=>$products]);
        // return view('front.home');
    }

    public function add(Request $request)
    {
        $count = (int) $request->count;
        $product = Product::where('id', $request->product_id)->first();
        $cart = Session::get('cart', []);
        // $cart[$product->id] = ['count' => $count, 'id' => $product->id, 'price' => $product->price * $count];
        // Session::put('cart', ['count' => $count, 'id' => $product->id,'price' => $product->price * $count ]);
    
        // return redirect()->back();

        if (isset($cart[$product->id])) {
            $cart[$product->id] = 
            [
                'count' => $cart[$product->id]['count'] + $count,
                'id' => $product->id,
                'price'=> $cart[$product->id]['price'] + $product->price * $count
            ];
        }
        else {
            $cart[$product->id] = ['count' => $count, 'id' => $product->id, 'price' => $product->price * $count];
        }
        Session::put('cart', $cart);
        return redirect()->back();
    }

    public function remove(Request $request)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$request->product_id])) {
            unset($cart[$request->product_id]);
        }

        Session::put('cart', $cart);
        return redirect()->back();

    }
}
