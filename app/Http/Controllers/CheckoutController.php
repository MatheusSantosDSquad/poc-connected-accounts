<?php

namespace App\Http\Controllers;

use App\Models\{Company, User};

class CheckoutController extends Controller
{
    public function index()
    {
        $company = Company::latest()->first();
        $user    = User::latest()->first();

        // 100 dolares
        $amount = 10000;

        $payment = $user->payWith($amount, ['card'], [
            'payment_intent_data' => [
                // O valor que vamos transferir para o marketplace, nesse caso, a glossy finish
                'application_fee_amount' => $company->calculateFeeAmount($amount),
                'transfer_data'          => [
                    'destination' => $company->stripe_account,
                ],
            ],
        ]);

        return view('checkout.index', [
            'intent' => $payment->clientSecret(),
        ]);
    }
}
