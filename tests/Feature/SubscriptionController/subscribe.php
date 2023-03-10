<?php

use App\Models\Company;
use function Pest\Laravel\postJson;
use function PHPUnit\Framework\assertTrue;

it('should attach a new payment method on customer', function () {
    $company = Company::first();

    postJson(route('subscription.subscribe'), ['payment_method' => 'pm_1MjowVBsO6X9dLQ6cs8T4siH']);

    $company->refresh();

    assertTrue($company->hasPaymentMethod());
    assertTrue($company->hasDefaultPaymentMethod());

    dd($company->defaultPaymentMethod());
});
