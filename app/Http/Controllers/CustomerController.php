<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
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
        // return response()->json([$product], 200);


        /*create price */
        // $price = $stripe->prices->create([
        //     'unit_amount' => 3000,
        //     'currency' => 'inr',
        //     'recurring' => ['interval' => 'year'],
        //     'product' => 'prod_NmIYSHrERflWcr',
        // ]);
        // return response()->json([$price], 200);

        /*create coupon */
        // $coupon = $stripe->coupons->create([
        //     'percent_off' => 50.00,
        //     'duration' => 'repeating',
        //     'duration_in_months' => 5,
        // ]);
        // return response()->json([$coupon], 200);

        /*create promotion code */
        // $promotionCode = $stripe->promotionCodes->create([
        //     'coupon' => $request->coupon,
        // ]);
        // return response()->json([$promotionCode], 200);

        /*create shipping rates */
        // $shippingRate = $stripe->shippingRates->create([
        //     'display_name' => 'Ground shipping',
        //     'type' => 'fixed_amount',
        //     'fixed_amount' => [
        //         'amount' => 500,
        //         'currency' => 'inr',
        //     ],
        // ]);
        // return response()->json([$shippingRate], 200);

        /* create customer card */
        // $card = $stripe->customers->createSource(
        //     'cus_NmJYQB2h8C8s6X',
        //     ['source' => 'tok_visa']
        // );
        // return response()->json([$card], 200);

        // $paymentIntent = $stripe->paymentIntents->create([
        //     'amount' => 2000,
        //     'currency' => 'inr',
        //     'automatic_payment_methods' => [
        //         'enabled' => true,
        //     ],
        // ]);
        // return response()->json([$paymentIntent], 200);

        /* create subscription */
        // $subscription = $stripe->subscriptions->create([
        //     'customer' => 'cus_NmJNk57a8cbZzQ',
        //     'items' => [
        //         ['price' => 'price_1N0kDcSBSrbWXS3zZDs83bVS'],
        //     ],
        // ]);
        // return response()->json([$subscription], 200);

        /* create plan */
        // $plan = $stripe->plans->create([
        //     'amount' => 1200,
        //     'currency' => 'inr',
        //     'interval' => 'month',
        //     'product' => 'prod_NmIYSHrERflWcr',
        // ]);
        // return response()->json([$plan], 200);

        /* create customer */
        $customer = $stripe->customers->create([
            'description' => $request->description,
            'email' => $request->email
        ]);
        return response()->json([$customer], 200);

        /* create subscription item*/
        // $subscriptionItem = $stripe->subscriptionItems->create([
        //     'subscription' => 'sub_1N1492SBSrbWXS3zSQqKlVVz',
        //     'price' => 'price_1N0lCISBSrbWXS3zHv4k2NHy',
        //     'quantity' => 2,
        // ]);
        // return response()->json([$subscriptionItem], 200);

        // $charge = $stripe->charges->create([
        //     'amount' => 2000,
        //     'currency' => 'inr',
        //     'source' => 'tok_mastercard',
        //     'description' => 'My First Test Charge',
        // ]);
        // return response()->json([$charge], 200);
    }
    public function get(Request $request, $id)
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET_KEY')
        );
        /* get balance */
        // $balance = $stripe->balance->retrieve([]);
        // return response()->json([$balance], 200);

        /* get customer */
        // $customer = $stripe->customers->retrieve(
        //     $request->id
        // );
        // return response()->json([$customer], 200);

        /* get payment intent */
        // $paymentIntent = $stripe->paymentIntents->retrieve(
        //     $request->id
        // );
        // return response()->json([$paymentIntent], 200);

        /* get card */
        // $card = $stripe->customers->retrieveSource(
        //     'cus_NmJNk57a8cbZzQ',
        //     'card_1N0kwrSBSrbWXS3zXYEQcc6A',
        //     []
        // );
        // return response()->json([$card], 200);

        /* get product */
        // $product = $stripe->products->retrieve(
        //     $request->id
        // );
        // return response()->json([$product], 200);

        /* get price */
        // $price = $stripe->prices->retrieve(
        //     $request->id
        // );
        // return response()->json([$price], 200);

        /* get coupon */
        // $coupon = $stripe->coupons->retrieve($request->id);
        // return response()->json([$coupon], 200);

        /* get promotion code */
        // $promotionCode = $stripe->promotionCodes->retrieve(
        //     $request->id
        // );
        // return response()->json([$promotionCode], 200);

        /* get plan*/
        // $plan = $stripe->plans->retrieve(
        //     $request->id
        // );
        // return response()->json([$plan], 200);

        /* get subscription*/
        $subscription = $stripe->subscriptions->retrieve(
            $request->id
        );
        return response()->json([$subscription], 200);
    }
    public function list()
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET_KEY')
        );
        /* list of balance */
        // $balance = $stripe->balanceTransactions->all(['limit' => 3]);
        // return response()->json([$balance], 200);

        /* list of customer */
        // $customer = $stripe->customers->all(['limit' => 3]);
        // return response()->json([$customer], 200);

        /* list of product */
        // $product = $stripe->products->all(['limit' => 3]);
        // return response()->json([$product], 200);

        /* list of price */
        // $price = $stripe->prices->all(['limit' => 3]);
        // return response()->json([$price], 200);

        /* list of coupon */
        // $coupon = $stripe->coupons->all(['limit' => 3]);
        // return response()->json([$coupon], 200);

        /* list of promotion code */
        // $promotionCode = $stripe->promotionCodes->all(['limit' => 3]);
        // return response()->json([$promotionCode], 200);

        /* list of plan*/
        // $plan = $stripe->plans->all(['limit' => 3]);
        // return response()->json([$plan], 200);

        /* list of subscription*/
        // $subscription = $stripe->subscriptions->all(['limit' => 3]);
        // return response()->json([$subscription], 200);

        /* list of payment intent*/
        // $paymentIntent = $stripe->paymentIntents->all(['limit' => 3]);
        // return response()->json([$paymentIntent], 200);

        /* list of card */
        $card = $stripe->customers->allSources(
            'cus_NmJNk57a8cbZzQ',
            ['object' => 'card', 'limit' => 3]
        );
        return response()->json([$card], 200);
    }
    public function update()
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET_KEY')
        );

        /* update customer detail*/
        // $customer = $stripe->customers->update(
        //     'cus_NmJNk57a8cbZzQ',
        //     ['metadata' => ['order_id' => '9854']],

        // );
        // return response()->json([$customer], 200);

        /* update customer card detail*/
        // $card = $stripe->customers->updateSource(
        //     'cus_NmJNk57a8cbZzQ',
        //     'card_1N0kwrSBSrbWXS3zXYEQcc6A',
        //     ['name' => 'Thakur Akankshya']
        // );
        // return response()->json([$card], 200);

        /* update product detail*/
        // $product = $stripe->products->update(
        //     'prod_NmJWJNoNQMGN10',
        //     ['metadata' => ['order_id' => '9854']]
        // );
        // return response()->json([$product], 200);

        /* update price detail*/
        // $price = $stripe->prices->update(
        //     'price_1N0ktnSBSrbWXS3zdMfmXNCO',
        //     ['metadata' => ['order_id' => '6735']]
        // );
        // return response()->json([$price], 200);

        /* update coupon detail*/
        // $coupon = $stripe->coupons->update(
        //     '0KUQ76lc',
        //     ['metadata' => ['order_id' => '6735']]
        // );
        // return response()->json([$coupon], 200);

        /* update promotion code detail*/
        // $promotionCode = $stripe->promotionCodes->update(
        //     'promo_1N0kRpSBSrbWXS3zAJRm8ihk',
        //     ['metadata' => ['order_id' => '6735']]
        // );
        // return response()->json([$promotionCode], 200);

        /* update plan detail*/
        // $plan = $stripe->plans->update(
        //     'price_1N0kMDSBSrbWXS3zCJUHphXR',
        //     ['metadata' => ['order_id' => '6735']]
        // );
        // return response()->json([$plan], 200);

        /* update subscription detail*/
        // $subscription = $stripe->subscriptions->update(
        //     'sub_1N0l3HSBSrbWXS3zOhklBi3i',
        //     ['metadata' => ['order_id' => '6735']]
        // );
        // return response()->json([$subscription], 200);

        /* update paymant intent detail*/
        $paymentIntent = $stripe->paymentIntents->update(
            'pi_3N0lTYSBSrbWXS3z1NzAP4IC',
            ['metadata' => ['order_id' => '6735']]
        );
        return response()->json([$paymentIntent], 200);
    }
    public function search()
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET_KEY')
        );
        $customer = $stripe->customers->search([
            'query' => 'name:\'fakename\' AND metadata[\'foo\']:\'bar\'',
        ]);
        return response()->json([$customer], 200);
    }
    public function delete(Request $request, $id)
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET_KEY')
        );
        /* delete customer */
        // $customer = $stripe->customers->delete(
        //     $request->id
        // );
        // return response()->json([$customer], 200);

        /* delete card */
        // $card = $stripe->customers->deleteSource(
        //     'cus_NmJYQB2h8C8s6X',
        //     'card_1N130ISBSrbWXS3zy3tkbDTb',
        //     []
        // );
        // return response()->json([$card], 200);

        /* delete product */
        // $product = $stripe->products->delete(
        //     $request->id
        // );
        // return response()->json([$product], 200);

        /* delete coupon */
        // $coupon = $stripe->coupons->delete($request->id);
        // return response()->json([$coupon], 200);

        /* delete plan */
        $plan = $stripe->plans->delete(
            $request->id
        );
        return response()->json([$plan], 200);
    }
}
