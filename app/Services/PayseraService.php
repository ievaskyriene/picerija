<?php

namespace App\Services;
use Session;
use App\Product;

class PayseraService
{
    private $config;

    public function _construct(array $config)
    {
        $this->config = $config;
    }
   
    public function buy(Order $order){

        try {
            return redirect(WebToPay::redirectToPayment([
                'projectid'     => $this->config['projectId'],
                'sign_password' => $this->config['sign_password'],
                'orderid'       => $order->id,
                'amount'        => (int) $order->price*100,
                'currency'      => 'EUR',
                'country'       => 'LT',
                'accepturl'     => route('paysera.accept'),
                'cancelurl'     => route('paysera.cancel'),
                'callbackurl'   => route('paysera.callback'),
                'test'          => 1,
                ]));
        } catch (WebToPayException $e) {
            // handle exception
        } 
    }

    public function allGood()
    {
        
            try {
                    $response = WebToPay::checkResponse($_GET, $this->config);
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
            } catch (\Exception $e) {
                    echo get_class($e) . ': ' . $e->getMessage();
            }
           

    }
}