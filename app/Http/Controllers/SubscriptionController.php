<?php

namespace App\Http\Controllers;

use App\Models\{Company, Plan};
use Illuminate\Contracts\View\View;
use Illuminate\Http\{JsonResponse, RedirectResponse, Request};

class SubscriptionController extends Controller
{
    public function index(): View
    {
        $company = Company::first();

        return view('subscription.index', [
            'intent' => $company->createSetupIntent(),
        ]);
    }

    public function subscribe(Request $request): JsonResponse
    {
        $company = Company::latest()->first();
        $plan    = Plan::first();

        $company->updateDefaultPaymentMethod($request->payment_method);

        $company->newSubscription(
            $plan->name,
            $plan->stripe_price
        )->create($request->payment_method);

        return response()->json(status: 201);
    }
}
