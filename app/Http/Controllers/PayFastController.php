<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayFast\PayFast;

class PayFastController extends Controller
{
    public function createPayment(Request $request)
    {
        $payfast = new PayFast();

        $payfast->setMerchantId(config('payfast.merchant_id'));
        $payfast->setMerchantKey(config('payfast.merchant_key'));
        $payfast->setPassphrase(config('payfast.passphrase'));

        // Payment details
        $payfast->setAmount($request->amount);
        $payfast->setItemName('Your Product Name');
        $payfast->setItemDescription('Description of your product');
        $payfast->setReturnUrl(url('payment/return')); // Your return URL
        $payfast->setCancelUrl(url('payment/cancel')); // Your cancel URL

        // Redirect to PayFast
        return redirect($payfast->generatePaymentUrl());
    }

    public function paymentReturn(Request $request)
    {
        // Handle PayFast return URL response
        $payfast = new PayFast();
        $payfast->setMerchantId(config('payfast.merchant_id'));
        $payfast->setMerchantKey(config('payfast.merchant_key'));
        $payfast->setPassphrase(config('payfast.passphrase'));

        $response = $payfast->verifyTransaction($request->all());

        if ($response->isValid()) {
            // Payment success logic
            return response()->json('Payment successful');
        } else {
            // Payment failed logic
            return response()->json('Payment failed');
        }
    }

    public function paymentCancel()
    {
        // Handle payment cancellation
        return response()->json('Payment cancelled');
    }
}
