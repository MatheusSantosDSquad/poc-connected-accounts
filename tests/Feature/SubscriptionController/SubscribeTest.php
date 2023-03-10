<?php

use App\Models\Company;
use App\Models\Plan;
use Laravel\Cashier\Subscription;
use Laravel\Cashier\SubscriptionItem;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\postJson;
use function PHPUnit\Framework\assertTrue;

it('should attach a new payment method on customer', function () {
    $company = Company::first();
    $plan    = Plan::first();

    postJson(route('subscription.subscribe'), ['payment_method' => 'pm_1MjowVBsO6X9dLQ6cs8T4siH'])
        ->assertRedirectToRoute('subscription.success');

    $company->refresh();

    assertTrue($company->hasPaymentMethod());
    assertTrue($company->hasDefaultPaymentMethod());

    assertDatabaseHas(Subscription::class, [
        'name'         => $plan->name,
        'stripe_price' => $plan->stripe_price,
    ]);

    assertDatabaseHas(SubscriptionItem::class, [
        'stripe_product' => $plan->stripe_product,
        'stripe_price'   => $plan->stripe_price,
    ]);
});
