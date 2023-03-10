<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;

class Company extends Model
{
    use Billable;
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'stripe_account'
    ];

    public function isStripeCustomer(): bool
    {
        return !is_null($this->stripe_id);
    }

    public function hasConnectedAccount(): bool
    {
        return !is_null($this->stripe_account);
    }
}
