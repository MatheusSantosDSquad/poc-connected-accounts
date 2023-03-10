<?php

namespace App\Http\Controllers;

use App\Models\{Company, Plan};
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(): View
    {
        $company = Company::first();

        return view('subscription.index', [
            'intent' => $company->createSetupIntent(),
        ]);
    }

    public function subscribe(Request $request): RedirectResponse
    {
        $company = Company::first();
        $plan    = Plan::first();

        $company->updateDefaultPaymentMethod($request->payment_method);

        $company->newSubscription(
            $plan->name, $plan->stripe_price
        )->create($request->payment_method);

        return redirect()->route('subscription.success');
    }

    public function success(): View
    {
        return view('subscription.success');
    }
}
