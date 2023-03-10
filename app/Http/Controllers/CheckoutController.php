<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;

class CheckoutController extends Controller
{
    public function index()
    {
        $company = Company::latest()->first();
        $user    = User::latest()->first();

        $payment = $user->payWith('', ['card'], [
            'payment_intent_data' => [
                'application_fee_amount' => 2, // O valor que vamos transferir para o marketplace, nesse caso, a glossy finis
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
