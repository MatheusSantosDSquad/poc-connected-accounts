<?php

namespace App\Models;

use App\Enums\FeeType;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'stripe_account',
        'has_account_details',
        'fee',
        'fee_type',
    ];

    protected $casts = [
        'fee_type' => FeeType::class,
    ];

    # region Helpers
    public function isStripeCustomer(): bool
    {
        return !is_null($this->stripe_id);
    }

    public function hasConnectedAccount(): bool
    {
        return !is_null($this->stripe_account);
    }

    public function hasAccountDetails(): bool
    {
        return $this->has_account_details;
    }

    /**
     * Nesse caso, o valor passado é em centavos, para faciltar
     */
    public function calculateFeeAmount(int $value): int
    {
        if ($this->fee_type == FeeType::VALUE) {
            return $this->getRawOriginal('fee');
        }

        return ($value / 100) * $this->fee;
    }
    # endregion

    # region Accessors / Mutators
    protected function fee(): Attribute
    {
        return Attribute::make(
            get: fn (?int $value) => ($value) ? $value / 100 : null,
            set: fn (mixed $value) => ($value) ? $value * 100 : null
        );
    }
    # endregion
}
