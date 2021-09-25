<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function handlePayment()
    {
        $data = [];
        $data['items'] = [];
        foreach (Cart::content() as $item) {
            array_push($data['items'], [

                'name' => $item->name,
                'price' => (int) ($item->price / 9),
                'desc'  => $item->options->desc,
                'qty' => $item->qty,
            ]);
        }

        $data['invoice_id'] = auth()->user()->id;
        $data['invoice_description'] = "Order #{$data['invoice_id']}";
        $data['return_url'] = route('payment_success');
        $data['cancel_url'] = route('cancel_payment');

        $total = 0;
        foreach ($data['items'] as $item) {
            $total += $item['price'] * $item['qty'];
        }

        $data['total'] = $total;

        //give a discount of 10% of the order amount
        // $data['shipping_discount'] = round((10 / 100) * $total, 2);
        $paypalModule = new ExpressCheckout;
        $res = $paypalModule->setExpressCheckout($data);
        $res = $paypalModule->setExpressCheckout($data, true);
        return redirect($res['paypal_link']);
    }
    public function PaymentCancel()
    {
        return redirect()->route('cart.index')->with([
            'info' => 'you cancel the payment',
        ]);
    }
    public function Paymentsuccess(Request $request)
    {
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            foreach (Cart::content() as $item) {
                Order::create([
                    'user_id' => auth()->user()->id,
                    'product_name' => $item->name,
                    'qentity' => $item->qty,
                    'price' => $item->price,
                    'price_total' => $item->subtotal,
                    'paid' => 1,
                ]);
                Cart::destroy();
            }
        }
        return redirect()->route('cart.index')->with([
            'success' => 'Your payment success',
        ]);
    }
}