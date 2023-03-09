<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Contracts\View\View;

class SubscriptionController extends Controller
{
    public function index(): View
    {
        $company = Company::first();

        return view('subscription.index', [
            'intent' => $company->createSetupIntent(),
        ]);
    }
}
