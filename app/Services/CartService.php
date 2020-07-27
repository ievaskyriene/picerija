<?php

namespace App\Services;
use Session;
use App\Product;

class CartService
{
    public $request;
    public function hell()
    {
        return 'Hello from hell';
    }

    public function get()
    {
        $cart = Session::get('cart', []);
        $count = 0;
        $total = 0;
        $cartProducts = [];
        if(Session::get('cart', []))
        {
            foreach ($cart as $key => $value) 
            {
                $count += $value['count'];
                $total += $value['price'];
                $cartProducts[$key] = Product::where('id', $value['id'])->first();
            }

           
        }
        return compact('count', 'total', 'cartProducts', 'cart');
    }

    public function add()
    {
        $count = (int) $this->request->count;
        $product = Product::where('id', $this->request->product_id)->first();
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

    public function remove()
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$this->request->product_id])) {
            unset($cart[$this->request->product_id]);
        }

        Session::put('cart', $cart);
        return redirect()->back();

    }
}
