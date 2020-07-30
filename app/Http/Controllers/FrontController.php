<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Cart;
use App\Order;
use App\Libs\WebToPay;
use Exception;

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
        $categories = Category::all();
        return view('front.home', array_merge(compact('products'), $cart->get()))->withCategories($categories);
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

    public function buy(CartService $cart, Request $request)
    {  
        $buyCart = $cart->get();
        $order = new Order;
        $order->name = $request->name;
        $order->surname = $request->surname;
        $order->email = $request->email;
        $order->tel = $request->phone;
        $order->price = $buyCart['total'];
        $order->status = 1;
        $order->save();

        foreach($buyCart['cartProducts'] as $product){
            $orderCart = new Cart;
            $orderCart->product_id = $product->id;
            $orderCart->order_id = $order->id;
        }
        try {
          
            return redirect(WebToPay::redirectToPayment(array(
                'projectid'     => 181595,
                'sign_password' => '779955dc72a6648396359fe03ce1f967',
                'orderid'       => $order->id,
                'amount'        => (int) $order->price*100,
                'currency'      => 'EUR',
                'country'       => 'LT',
                'accepturl'     => route('paysera.accept'),
                'cancelurl'     => route('paysera.cancel'),
                'callbackurl'   => route('paysera.callback'),
                'test'          => 1,
            )));
        } catch (WebToPayException $e) {
            // handle exception
        } 
    }

    public function payseraAccept()
    {
        try {
                $response = WebToPay::checkResponse($_GET, array(
                    'projectid'     => 0,
                    'sign_password' => '779955dc72a6648396359fe03ce1f967',
                ));
                // if ($response['test'] !== '0') {
                //     throw new Exception('Testing, real payment was not made');
                // }
                // if ($response['type'] !== 'macro') {
                //     throw new Exception('Only macro payment callbacks are accepted');
                // }
        
                $orderId = $response['orderid'];
                $amount = $response['amount'];
                $currency = $response['currency'];

                $order = Order::where('id', $orderId)->first();

                if($amount == (int)($order->price * 100 ) && 
                $currency == 'EUR' &&
                $order->status == 1
                ){
                    $order->status = 2;
                    $order->save();
                }
               
        
                echo 'OK';
        } catch (Exception $e) {
                echo get_class($e) . ': ' . $e->getMessage();
        }
        return redirect()->route('all.good');
    
    }

    public function allGood()
    {
        return view('front.all-good');

    }
}