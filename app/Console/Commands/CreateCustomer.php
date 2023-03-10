<?php

namespace App\Console\Commands;

use App\Models\Company;
use Illuminate\Console\Command;
use Laravel\Cashier\Cashier;
use Stripe\Account;

/**
 * @see https://stripe.com/docs/connect/collect-then-transfer-guide?platform=web
 */
class CreateCustomer extends Command
{
    protected $signature = 'app:create-customer';

    protected $description = 'Command description';

    public function handle(): void
    {
        $company = Company::factory()->create();

        $company->createOrGetStripeCustomer();

        $this->createConnectedAccount($company);
    }

    protected function createConnectedAccount(Company $company)
    {
        $account = Cashier::stripe()
            ->accounts
            ->create([
                'type'          => Account::TYPE_EXPRESS,
                'country'       => 'US',
                'email'         => $company->email,
                'business_type' => Account::BUSINESS_TYPE_COMPANY,
                'company'       => [
                    'name' => $company->name,
                ],
            ]);

        $company->update([
            'stripe_account' => $account->id,
        ]);
    }
}
