<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Contracts\View\View;
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

    public function subscribe(Request $request)
    {
        $company = Company::first();
        $company->updateDefaultPaymentMethod($request->payment_method);

        return $request->all();
    }
}
