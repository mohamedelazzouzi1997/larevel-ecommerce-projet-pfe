<?php

namespace App\Http\Controllers;
use Srmklive\PayPal\Services\ExpressCheckout;
use Cart;
use App\Models\Produit;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\Info;
use Illuminate\Http\Request;

class PaypalPaymentController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function handlPayment(Request $request){
         $info = $request;
         
        $data['items'] = [];
        //cat content
        $userID = auth()->user()->id;
        
        foreach(Cart::session($userID)->getContent() as $item){
            array_push($data['items'],[
                'name' => $item->name,
                'price' =>$item->attributes->prix_ttc,
                'desc' => $item->attributes->description,
                'qty' => $item->quantity
            ]);
        }

        $data['invoice_id'] = auth()->user()->id;;
        $data['invoice_description'] = "Order #{$data['invoice_id']}";
        $data['return_url'] = route('success.payment',$info);
        $data['cancel_url'] = route('cancel.payment');

        $total = 0;
        foreach($data['items'] as $item){
            $total += $item['price'] * $item['qty'];
        }

        $data['total'] = $total;
        $paypalModule = new ExpressCheckout;
        $res = $paypalModule->setExpressCheckout($data);
        $res = $paypalModule->setExpressCheckout($data,true);

        return redirect($res['paypal_link']);
    }
//cancel payment
    public function paypalCancel(){
        return redirect()->route('cart_index')->with([
            'info' => 'Payment canceld'
        ]);
    }

//success payment
    public function paypalSuccess(Request $request){
    //  dd($request);
        $userID = auth()->user()->id;
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);

        if(in_array(strtoupper($response['ACK']) ,['SUCCESS','SUCCESSWITHWARNING'])){
            foreach(Cart::session($userID)->getContent() as $item){
              
                Order::create([
                    'user_id' =>auth()->user()->id,
                    'size' =>$item->attributes->size,
                    'color'=> $item->attributes->color,
                    'product_name' => $item->name,
                    'price' => $item->attributes->prix_ttc,
                    'total' => $item->attributes->prix_ttc * $item->quantity,
                    'qty' => $item->quantity,
                    'paid' => 1
                ]);
            }
            Info::create([
                'user_id' =>auth()->user()->id,
                'first_name' =>$request->first_name,
                'last_name'=> $request->last_name,
                'username' => $request->username,
                'address' => $request->address1,
                'email' => auth()->user()->email,
                'country' => $request->country,
                'state' => $request->state,
                'zip' => $request->zip,
            ]);
            Cart::session($userID)->clear();
        }

        return redirect()->route('cart_index')->with([
            'success' => 'Payment success'
        ]);
    }
}
