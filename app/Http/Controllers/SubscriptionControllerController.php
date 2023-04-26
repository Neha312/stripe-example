<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SubscriptionControllerController extends Controller
{
    public function processPlan()
    {
        $user = auth()->user();
        // $user->createOrGetStripeCustomer();

    }
}
