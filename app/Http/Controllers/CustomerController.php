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

        /* create tax rate */
        // $taxRate = $stripe->taxRates->create([
        //     'display_name' => 'sales_tax',
        //     'description' => 'India',
        //     'jurisdiction' => 'IN',
        //     'percentage' => 20,
        //     'inclusive' => true,
        //     'tax_type' => 'sales_tax'
        // ]);
        // return response()->json([$taxRate], 200);

        /* create sources */
        // $source = $stripe->sources->create([
        //     "type" => "ach_credit_transfer",
        //     "currency" => "usd",
        //     "owner" => [
        //         "email" => "ak@gmail.com"
        //     ]
        // ]);
        // return response()->json([$source], 200);

        /* create invoice */
        // $invoice = $stripe->invoices->create([
        //     'customer' => 'cus_NmJYQB2h8C8s6X',
        // ]);
        // return response()->json([$invoice], 200);

        /* create customer balance transaction  */
        // $customerBalance = $stripe->customers->createBalanceTransaction(
        //     'cus_NmJYQB2h8C8s6X',
        //     ['amount' => +1000, 'currency' => 'inr']
        // );
        // return response()->json([$customerBalance], 200);

        /* create charge */
        // $charge = $stripe->charges->create([
        //     'amount' => 2000,
        //     'currency' => 'usd',
        //     'source' => 'tok_mastercard',
        //     'description' => 'My First Test Charge (created for API docs at https://www.stripe.com/docs/api)',
        // ]);
        // return response()->json([$charge], 200);

        /* create payment link */
        // $paymentlink = $stripe->paymentLinks->create([
        //     'line_items' => [
        //         [
        //             'price' => 'price_1N0lAdSBSrbWXS3zrOoh0mcv',
        //             'quantity' => 1,
        //         ],
        //     ],
        // ]);
        // return response()->json([$paymentlink], 200);

        /* create webhook */
        // $webhook = $stripe->webhookEndpoints->create([
        //     'url' => 'https://example.com/webhook/endpoint',
        //     'enabled_events' => [
        //         'charge.succeeded',
        //         'charge.failed',
        //         'customer.created',
        //     ],
        // ]);
        // return response()->json([$webhook], 200);

        /* create cardholder */
        // $cardHolder = $stripe->issuing->cardholders->create([
        //     'type' => 'individual',
        //     'name' => 'Neha',
        //     'email' => 'neha1@example.com',
        //     'phone_number' => '9871542164',
        //     'billing' => [
        //         'address' => [
        //             'line1' => '1234 Main Street',
        //             'city' => 'Surat',
        //             'state' => 'Gujarat',
        //             'country' => 'IN',
        //             'postal_code' => '365412',
        //         ],
        //     ],
        // ]);
        // return response()->json([$cardHolder], 200);

        /* create subscription schedule */
        // $subscriptionSchedule = $stripe->subscriptionSchedules->create([
        //     'customer' => 'cus_NmJNk57a8cbZzQ',
        //     'start_date' => 1682656383,
        //     'end_behavior' => 'release',
        //     'phases' => [
        //         [
        //             'items' => [
        //                 [
        //                     'price' => 'price_1N0kDcSBSrbWXS3zZDs83bVS',
        //                     'quantity' => 1,
        //                 ],
        //             ],
        //             'iterations' => 12,
        //         ],
        //     ],
        // ]);
        // return response()->json([$subscriptionSchedule], 200);
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
        // $subscription = $stripe->subscriptions->retrieve(
        //     $request->id
        // );
        // return response()->json([$subscription], 200);

        /* get tax rate*/
        // $taxRate = $stripe->taxRates->retrieve(
        //     $request->id
        // );
        // return response()->json([$taxRate], 200);

        /* get sources */
        // $sources = $stripe->sources->retrieve(
        //     $request->id
        // );
        // return response()->json([$sources], 200);

        /* get invoice */
        // $invoice = $stripe->invoices->retrieve(
        //     $request->id
        // );
        // return response()->json([$invoice], 200);

        /* get customer balance */
        // $customerBalance = $stripe->customers->retrieveBalanceTransaction(
        //     'cus_NmJYQB2h8C8s6X',
        //     'cbtxn_1N1kznSBSrbWXS3zCwaZUnpr',
        //     []
        // );
        // return response()->json([$customerBalance], 200);

        /* get subscription schedule detail */
        // $subscriptionSchedule = $stripe->subscriptionSchedules->retrieve(
        //     $request->id
        // );
        // return response()->json([$subscriptionSchedule], 200);

        /* get charge */
        // $charge = $stripe->charges->retrieve(
        //     'ch_17LZ0E2eZvKYlo2C9VlL32EW',
        //     []
        // );
        // return response()->json([$charge], 200);

        /* get payment link */
        // $paymentlink = $stripe->paymentLinks->retrieve(
        //     $request->id
        // );
        // return response()->json([$paymentlink], 200);

        /* get webhook */
        $webhook = $stripe->webhookEndpoints->retrieve(
            $request->id
        );
        return response()->json([$webhook], 200);
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
        // $card = $stripe->customers->allSources(
        //     'cus_NmJNk57a8cbZzQ',
        //     ['object' => 'card', 'limit' => 3]
        // );
        // return response()->json([$card], 200);

        /* list of tax rate */
        // $taxRate = $stripe->taxRates->all(['limit' => 3]);
        // return response()->json([$taxRate], 200);

        /* list of invoice */
        // $invoices = $stripe->invoices->all(['limit' => 5]);
        // return response()->json([$invoices], 200);

        /* list of customer balance transaction */
        // $customerBalance = $stripe->customers->allBalanceTransactions(
        //     'cus_NmJYQB2h8C8s6X',
        //     ['limit' => 5]
        // );
        // return response()->json([$customerBalance], 200);

        /* list of subcription schedule detail */
        // $subscriptionSchedule = $stripe->subscriptionSchedules->all([
        //     'limit' => 3,
        // ]);
        // return response()->json([$subscriptionSchedule], 200);

        /* list of payment link */
        // $paymentLink = $stripe->paymentLinks->all(['limit' => 3]);
        // return response()->json([$paymentLink], 200);

        /* list of webhook */
        $webhook = $stripe->webhookEndpoints->all(['limit' => 3]);
        return response()->json([$webhook], 200);
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
        // $paymentIntent = $stripe->paymentIntents->update(
        //     'pi_3N0lTYSBSrbWXS3z1NzAP4IC',
        //     ['metadata' => ['order_id' => '6735']]
        // );
        // return response()->json([$paymentIntent], 200);

        /* update tax rate detail*/
        // $taxRate = $stripe->taxRates->update(
        //     'txr_1N1RGiSBSrbWXS3z9FgetfUa',
        //     ['active' => false]
        // );
        // return response()->json([$taxRate], 200);

        /* update source detail */
        // $sources = $stripe->sources->update(
        //     'src_1N1RkuSBSrbWXS3z3PVlEjbB',
        //     ['metadata' => ['order_id' => '6735']]
        // );
        // return response()->json([$sources], 200);

        /* update customer balance transaction */
        // $customerBalance = $stripe->customers->updateBalanceTransaction(
        //     'cus_NmJYQB2h8C8s6X',
        //     'cbtxn_1N1kznSBSrbWXS3zCwaZUnpr',
        //     ['metadata' => ['order_id' => '6735']]
        // );
        // return response()->json([$customerBalance], 200);

        /* update charge */
        // $charge = $stripe->charges->update(
        //     'ch_3N1ouYDk2w6KFIXY3Unes5ec',
        //     ['metadata' => ['name' => 'neha']]
        // );
        // return response()->json([$charge], 200);

        /* update payment link */
        // $paymentlink = $stripe->paymentLinks->update(
        //     'plink_1N2pwxSBSrbWXS3ziCRXUY98',
        //     ['active' => false]
        // );
        // return response()->json([$paymentlink], 200);

        /* update webhook */
        $webhook = $stripe->webhookEndpoints->update(
            'we_1N2qhzSBSrbWXS3zsqyv7G5S',
            ['url' => 'https://example.com/new_endpoint']
        );
        return response()->json([$webhook], 200);
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
        // $plan = $stripe->plans->delete(
        //     $request->id
        // );
        // return response()->json([$plan], 200);

        /* cancel subscription */
        // $subscription = $stripe->subscriptions->cancel(
        //     $request->id
        // );
        // return response()->json([$subscription], 200);

        /* delete webhook */
        $webhook = $stripe->webhookEndpoints->delete(
            $request->id
        );
        return response()->json([$webhook], 200);
    }
    public function resume()
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET_KEY')
        );
        $resume = $stripe->subscriptions->resume(
            'sub_1N1oShSBSrbWXS3zooBtNvyv',
            ['billing_cycle_anchor' => 'now']
        );
        return response()->json([$resume], 200);
    }
    public function attach()
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET_KEY')
        );
        $attach = $stripe->customers->createSource(
            'cus_NmJNk57a8cbZzQ',
            [
                'source' => 'src_1N1RkuSBSrbWXS3z3PVlEjbB',
            ]
        );
        return response()->json([$attach], 200);
    }
    public function detach()
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET_KEY')
        );
        $detach = $stripe->customers->deleteSource(
            'cus_NmJNk57a8cbZzQ',
            'src_1N1RkuSBSrbWXS3z3PVlEjbB'
        );
        return response()->json([$detach], 200);
    }
    public function pay(Request $request, $id)
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET_KEY')
        );
        $pay = $stripe->invoices->pay($request->id);
        return response()->json([$pay], 200);
    }
    public function finalize(Request $request, $id)
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET_KEY')
        );
        $finalize = $stripe->invoices->finalizeInvoice(
            $request->id
        );
        return response()->json([$finalize], 200);
    }
    public function upcomingInvoice()
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET_KEY')
        );
        $upcommingInvoice = $stripe->invoices->upcoming([
            'customer' => 'cus_NmJYQB2h8C8s6X',
        ]);
        return response()->json([$upcommingInvoice], 200);
    }
    public function sendInvoice(Request $request, $id)
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET_KEY')
        );
        $sendinvoice = $stripe->invoices->sendInvoice(
            $request->id
        );
        return response()->json([$sendinvoice], 200);
    }
    public function allUpcomingInvoice()
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET_KEY')
        );
        $allInvoice = $stripe->invoices->upcomingLines([
            'customer' => 'cus_NmJYQB2h8C8s6X',
            'limit' => 5,
        ]);
        return response()->json([$allInvoice], 200);
    }
    public function releaseSubcription(Request $request, $id)
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET_KEY')
        );
        $releaseSubscription = $stripe->subscriptionSchedules->release(
            $request->id
        );
        return response()->json([$releaseSubscription], 200);
    }
    public function cancelSubscription(Request $request, $id)
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET_KEY')
        );
        $cancelSubscription = $stripe->subscriptionSchedules->cancel(
            $request->id
        );
        return response()->json([$cancelSubscription], 200);
    }
    public function draftInvoiceDelete(Request $request, $id)
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET_KEY')
        );
        $drafInvoiceDelete = $stripe->invoices->delete(
            $request->id
        );
        return response()->json([$drafInvoiceDelete], 200);
    }
    public function captureCharge(Request $request, $id)
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET_KEY')
        );
        $charge = $stripe->charges->capture(
            $request->id
        );
        return response()->json([$charge], 200);
    }
}
