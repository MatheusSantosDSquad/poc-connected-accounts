<?php

namespace App\Console\Commands;

use App\Models\Company;
use Illuminate\Console\Command;

class CreateCustomer extends Command
{
    protected $signature = 'app:create-customer';

    protected $description = 'Command description';

    public function handle(): void
    {
        $company = Company::firstOrCreate([
            'name' => 'DevSquad'
        ]);

        $company->createOrGetStripeCustomer();

        dd($company);
    }
}
