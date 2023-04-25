<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use stripe;

class CustomerController extends Controller
{
    public function create(Request $request)
    {

        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET_KEY')
        );

        /*create product */
        // $product = $stripe->products->create([
        //     'name' => $request->name,
        // ]);

        /*create price */
        // $price = $stripe->prices->create([
        //     'unit_amount' => 3000,
        //     'currency' => 'inr',
        //     'recurring' => ['interval' => 'year'],
        //     'product' => 'prod_NmIYSHrERflWcr',
        // ]);

        /*create coupon */
        // $coupon = $stripe->coupons->create([
        //     'percent_off' => 25.5,
        //     'duration' => 'repeating',
        //     'duration_in_months' => 3,
        // ]);

        /*create promotion code */
        // $promotionCode = $stripe->promotionCodes->create([
        //     'coupon' => $request->coupon,
        // ]);

        /*create shipping rates */
        // $shippingRate = $stripe->shippingRates->create([
        //     'display_name' => 'Ground shipping',
        //     'type' => 'fixed_amount',
        //     'fixed_amount' => [
        //         'amount' => 500,
        //         'currency' => 'inr',
        //     ],
        // ]);

        /* create customer card */
        // $card = $stripe->customers->createSource(
        //     'cus_NmJNk57a8cbZzQ',
        //     ['source' => 'tok_mastercard']
        // );

        // $paymentIntent = $stripe->paymentIntents->create([
        //     'amount' => 2000,
        //     'currency' => 'inr',
        //     'automatic_payment_methods' => [
        //         'enabled' => true,
        //     ],
        // ]);

        /* create subscription */
        // $subscription = $stripe->subscriptions->create([
        //     'customer' => 'cus_NmJNk57a8cbZzQ',
        //     'items' => [
        //         ['price' => 'price_1N0kMDSBSrbWXS3zCJUHphXR'],
        //     ],
        // ]);

        /* create plan */
        // $plan = $stripe->plans->create([
        //     'amount' => 1200,
        //     'currency' => 'inr',
        //     'interval' => 'month',
        //     'product' => 'prod_NmIYSHrERflWcr',
        // ]);

        /* create subscription */
        // $subscriptionItem = $stripe->subscriptionItems->create([
        //     'subscription' => 'sub_1N0jSb2eZvKYlo2CRsLAPuoL',
        //     'price' => 'price_1N0NaC2eZvKYlo2CbmVGb8Wm',
        //     'quantity' => 2,
        // ]);

        /* create customer */
        $customer = $stripe->customers->create([
            'description' => $request->description,
            'email' => $request->email
        ]);

        // $charge = $stripe->charges->create([
        //     'amount' => 2000,
        //     'currency' => 'usd',
        //     'source' => 'tok_mastercard',
        //     'description' => 'My First Test Charge',
        // ]);


        return response()->json([$customer], 200);
    }
    public function get(Request $request, $id)
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET_KEY')
        );
        /* get balance */
        // $balance = $stripe->balance->retrieve([]);

        /* get customer */
        // $customer = $stripe->customers->retrieve(
        //     $request->id
        // );

        /* get payment intent */
        // $paymentIntent = $stripe->paymentIntents->retrieve(
        //     $request->id
        // );

        /* get card */
        // $card = $stripe->customers->retrieveSource(
        //     'cus_NmJNk57a8cbZzQ',
        //     'card_1N0kwrSBSrbWXS3zXYEQcc6A',
        //     []
        // );

        /* get product */
        // $product = $stripe->products->retrieve(
        //     $request->id
        // );

        /* get price */
        // $price = $stripe->prices->retrieve(
        //     $request->id
        // );

        /* get coupon */
        // $coupon = $stripe->coupons->retrieve($request->id);

        /* get promotion code */
        // $promotionCode = $stripe->promotionCodes->retrieve(
        //     $request->id
        // );

        /* get plan*/
        // $plan = $stripe->plans->retrieve(
        //     $request->id
        // );

        /* get subscription*/
        $subscription = $stripe->subscriptions->retrieve(
            $request->id
        );
        return response()->json([$subscription], 201);
    }
}
