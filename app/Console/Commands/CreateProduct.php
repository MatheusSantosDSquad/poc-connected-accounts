<?php

namespace App\Console\Commands;

use App\Models\Plan;
use Illuminate\Console\Command;
use Laravel\Cashier\Cashier;
use Stripe\Price;
use Stripe\StripeClient;

class CreateProduct extends Command
{
    protected $signature = 'app:create-product';

    protected $description = 'Creates a new product and price on stripe';

    public function handle(): int
    {
        $plan = Plan::first();

        $stripePrice = $this->createPrice($plan);

        $plan->update([
            'stripe_product' => $stripePrice->product,
            'stripe_price'   => $stripePrice->id,
        ]);

        return self::SUCCESS;
    }

    protected function stripe(): StripeClient
    {
        return Cashier::stripe();
    }

    protected function createPrice(Plan $plan): Price
    {
        $data = [
            'currency'       => 'usd',
            'unit_amount'    => $plan->price,
            'billing_scheme' => 'per_unit',
            'product_data'   => [
                'name' => $plan->name,
            ],
        ];

        if ($plan->recurring && !is_null($plan->interval)) {
            $data['recurring'] = [
                'interval'       => $plan->interval?->value,
                'interval_count' => $plan->interval_count,
            ];
        }

        return $this->stripe()
            ->prices
            ->create($data);
    }
}
