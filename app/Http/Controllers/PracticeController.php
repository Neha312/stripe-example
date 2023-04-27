<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public  function checkOut()
    {
        //Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51N0eBxSBSrbWXS3zZrrt0bOXph4LFfS4bFAoPxJvNgdNiLLEvEETJUsfJShR3qIsXoasGa1APD2KF5JxFNBLTI5f00Q6MtABqh');

        $amount = 100;
        $amount *= 100;
        $amount = (int)$amount;

        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount,
            'currency' => 'INR',
            'description' => 'Payment From All About Laravel',
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;
        return view('checkout.credit-card', compact('intent'));
    }
    public function afterPayment()
    {
        echo 'Payment Recieved,Thankyou for using our services';
    }
}
