<?php

namespace App\Console\Commands;

use App\Models\Company;
use App\Models\User;
use Illuminate\Console\Command;

class CreateUserCustomer extends Command
{
    protected $signature = 'app:create-user-customer';

    protected $description = 'Command description';

    public function handle(): void
    {
        $company = Company::latest()->first();

        $user = User::factory()->create([
            'company_id' => $company->id,
        ]);

        $user->createAsStripeCustomer();
    }
}
