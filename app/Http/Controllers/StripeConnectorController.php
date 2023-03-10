<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Laravel\Cashier\Cashier;

/**
 * @see https://stripe.com/docs/connect/collect-then-transfer-guide?platform=web
 */
class StripeConnectorController extends Controller
{
    public function index()
    {
        $company = Company::latest()
            ->first();

        $accountLink = Cashier::stripe()
            ->accountLinks
            ->create([
                'account'     => $company->stripe_account,
                'refresh_url' => route('stripe-connector.index'),
                'return_url'  => route('stripe-connector.return'),
                'type'        => 'account_onboarding',
            ]);

        return redirect()->to(
            $accountLink->url
        );
    }

    public function return()
    {
        $company = Company::latest()
            ->first();

        $account = Cashier::stripe()
            ->accounts
            ->retrieve($company->stripe_account);

        if (!$account->details_submitted && !$account->charges_enabled) {
            // Neste caso, devemos mandar ele novamente para a tela do stripe para que complete o fluxo
            return view('stripe-connector.return', ['message' => 'Seu onboarding não está completo. Por favor, repita a operação']);
        }

        $company->update([
            'has_account_details' => true,
        ]);

        return view('stripe-connector.return', ['message' => 'Você fez o onboarding no stripe. Parabéns!']);
    }
}
