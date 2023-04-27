<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function checkout()
    {
        header('Content-Type: application/json');
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $checkout_session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                $this->lineItems()
            ],
            'mode' => 'payment',
            'success_url' => 'http://localhost:8000/success',
            'cancel_url' => 'http://localhost:8000/cancel',
        ]);

        //returns session id
        return response()->json(['id' => $checkout_session->id]);
    }

    private function lineItems()
    {
        $cartItems = CartItem::all();
        $lineItems = [];
        foreach ($cartItems as $cartItem) {
            $product['price_data'] = [
                'currency' => 'INR',
                'unit_amount' => $cartItem->price * 100,
                'product_data' => [
                    'name' => $cartItem->product->name,
                    'images' => [$cartItem->product->image],
                ],
            ];
            $product['quantity'] = $cartItem->quantity;
            $lineItems[] = $product;
        }

        return $lineItems;
    }

    public function success()
    {
        CartItem::truncate();
        return view('success');
    }

    public function cancel()
    {
        return view('cancel');
    }
}
