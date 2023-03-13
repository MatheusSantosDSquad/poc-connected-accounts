<?php

namespace App\Http\Controllers;

use App\Models\{Company, User};
use Illuminate\Http\Request;
use Laravel\Cashier\{Cashier, Checkout};

/**
 * @see https://stripe.com/docs/connect/collect-then-transfer-guide?platform=web
 */
class CheckoutController extends Controller
{
    public function index(): Checkout
    {
        $company = Company::latest()->first();

        /** @var User $user */
        $user = $company->users()->latest()->first();

        // 100 dolares
        $amount = 10000;

        return $user->checkoutCharge($amount, 'Photos taken on this day', 1, [
            'payment_intent_data' => [
                'application_fee_amount' => $company->calculateFeeAmount($amount),
                'transfer_data'          => [
                    'destination' => $company->stripe_account,
                ],
            ],
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'  => route('checkout.error'),
        ]);
    }

    public function success(Request $request)
    {
        $checkoutSession = Cashier::stripe()
            ->checkout
            ->sessions
            ->retrieve($request->get('session_id'));

        dd($checkoutSession);
    }

    public function checkoutError()
    {
        echo "an error has occurred during the payment process. Please, try again";
    }
}
