<?php

namespace App\Http\Controllers;

use App\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home(CartService $cart)
    {
        // print_r(Session::get('cart'));
       

        // $cart = Session::get('cart');
        // $count = 0;
        // $total = 0;
        // $cartProducts = [];
        // if(Session::get('cart'))
        // {
        //     foreach ($cart as $key => $value) 
        //     {
        //         $count += $value['count'];
        //         $total += $value['price'];
        //         $cartProducts[$key] = Product::where('id', $value['id'])->first();
        //     }
        // }

        $products = Product::all();
        return view('front.home', array_merge(compact('products'), $cart->get()));
        // return view('front.home', ['products'=>$products]);
        // return view('front.home');
    }

    public function add(CartService $cart)
    {
     
        $cart->add();
        return redirect()->back();
    }

  
    public function addJs(CartService $cart)
    {
        $cart->add();
        $miniCartHtml = view('front.mini-cart', $cart->get())->render();
        
        return response()->json([
            'html' => $miniCartHtml,
            'cart' => 'OK',
        ]);
    }


    public function remove(CartService $cart)
    {
        $cart->remove();
        return redirect()->back();

    }
}